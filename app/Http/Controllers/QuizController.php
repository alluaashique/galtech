<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Exception;
use Illuminate\Support\Facades\Storage;


use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Quiz;
use App\Models\Question;
use App\Models\Option;

class QuizController extends Controller
{
    public function convert($string)
    {
        $slug = Str::slug($string); 
        $slug = str_replace('-', '_', $slug);
        return $slug;
    }
    public function createe(Request $request,$slug)
    {

        $array = Http::get('https://the-trivia-api.com/api/questions?categories='.$slug.'&limit=15&difficulty=easy');

        $quiz_uuid = Str::uuid()->toString();
        $questions = [];
        $array = json_decode($array, true);
        foreach ($array as $key => $value) {
            // Log::info($value);            
            $correctAnswer = array($value['correctAnswer']);
            // Log::info($correctAnswer);
            // Log::info($value['incorrectAnswers']);
            $options = array_merge($value['incorrectAnswers'], $correctAnswer);
            shuffle($options);
            $questions[] = [
                "questionId" => $value['id'],
                "question" => $value['question'],
                "options" => $options,
                "correctAnswer" => $value['correctAnswer'],
                "difficulty" => $value['difficulty'],
                "optedAnswer" => null,
                "isAnswered" => false,
                "iscorrect" => false
            ];            
        }
        $quiz = array(
            "code" => $quiz_uuid,
            "userId" => Auth::user()->id,
            "questions" => $questions,
            "isAttended" => false,
            "totalQuestion" => count($questions),
            "rightAnwser" => 0
        );

        // Log::info($quiz);

        $jsonData = json_encode($quiz); 

        $fileName = 'quiz_' . $quiz_uuid . '.json';
        Storage::disk('public')->put('quizzes/' . $fileName, $jsonData);
        return redirect()->route('quiz.show', $quiz_uuid);

        // $array = json_decode($array, true);
        // DB::beginTransaction();
        // try{
        //     $count = Quiz::where('user_id', Auth::user()->id)->count();
        //     $count++;    
        //     $quiz = Quiz::create([
        //         'name' => "Quiz ".$count,
        //         'total' => 15,
        //         'user_id' => Auth::user()->id,
        //         'right' => 0,
        //     ]);            
        //     foreach ($array as $key => $value) {            
        //         $quiz->questions()->create([
        //             'question_id' => $value['id'],
        //         ]);
        //     }

        //     DB::commit();
        //     return redirect()->route('quiz.show', $quiz->code);
        // }
        // catch(Exception $e){
        //     DB::rollBack();
        //     Log::info($e);
        //     return back();
        // }
       


        // https://the-trivia-api.com/api/questions?categories=film_and_tv&limit=15&difficulty=easy


    }
    public function create(Request $request,$slug)
    {

        $array = Http::get('https://the-trivia-api.com/api/questions?categories='.$slug.'&limit=15&difficulty=easy');
        Log::info($array);

        $array = json_decode($array, true);
        DB::beginTransaction();
        try{
            $count = Quiz::where('user_id', Auth::user()->id)->count();
            $count++;    
            $quiz = Quiz::create([
                'name' => "Quiz ".$count,
                'user_id' => Auth::user()->id,
                'is_attended' => false,
                'total_question' => 15,
                'right_anwser' => 0,
            ]);      
            
            foreach ($array as $key => $value) {
                $correctAnswer = array($value['correctAnswer']);
                $options = array_merge($value['incorrectAnswers'], $correctAnswer);
                $correctAnswer = $value['correctAnswer'];
                shuffle($options);
                $questions = Question::create([
                    'quiz_id' => $quiz->id,
                    'question_id' => $value['id'],
                    'question' => $value['question'],
                    "is_answered" => false,
                    "is_correct" => false
                ]);
                if($quiz->questions())
                {
                    foreach ($options  as  $value) {

                        $is_correct = ($correctAnswer == $value) ? true : false;
                        Option::create([
                            'quiz_id' => $quiz->id,
                            'question_id' => $questions->id,
                            'option' => $value,
                            "is_answered" => false,
                            "is_correct" => $is_correct
                        ]);
                    }
                }                
            }

            DB::commit();
            return redirect()->route('quiz.show', $quiz->code);
        }
        catch(Exception $e){
            DB::rollBack();
            Log::info($e);
            return back();
        }

    }
    public function create1(Request $request,$slug)
    {

        $array = Http::get('https://the-trivia-api.com/api/questions?categories='.$slug.'&limit=15&difficulty=easy');
        Log::info($array);

        $array = json_decode($array, true);
        DB::beginTransaction();
        try{
            $count = Quiz::where('user_id', Auth::user()->id)->count();
            $count++;    
            $quiz = Quiz::create([
                'name' => "Quiz ".$count,
                'total' => 15,
                'user_id' => Auth::user()->id,
                'right' => 0,
            ]);            
            foreach ($array as $key => $value) {            
                $quiz->questions()->create([
                    'question_id' => $value['id'],
                ]);
            }

            DB::commit();
            return redirect()->route('quiz.show', $quiz->code);
        }
        catch(Exception $e){
            DB::rollBack();
            Log::info($e);
            return back();
        }
       


        // https://the-trivia-api.com/api/questions?categories=film_and_tv&limit=15&difficulty=easy


    }
    public function show($quiz_uuid)
    {

        $updateOption = Option::where('id', "!=",0)->update(['is_answered' => false]);
        $updateQuestion = Question::where('id', "!=",0)->update(['is_answered' => false]);

        $quiz = Quiz::with('questions','questions.options')
                    ->where('code', $quiz_uuid)->first();
        // $quiz = Quiz::where('code', $quiz_uuid)->first();
        if($quiz)
        {
            $data = [
                'quiz_uuid' => $quiz_uuid,
                'quiz_name' => $quiz->name,
                'qn_no' => 1,
                'qn_total' => $quiz->total_question,
                'qn' => $quiz->questions()->first(),
                'qn_options' => $quiz->questions()->first()->options
            ];
            // return  $data;
            return view('quiz.show', $data);
        }
        else
        {
            return redirect()->route('dashboard');
        }
    }

    public function answer(Request $request)
    {
        Log::info($request->all());

        $userId = $request->userId;
        $quizId = $request->quizId;
        $questionId = $request->questionId;
        $questionNo = (int) $request->questionNo;
        $answerId = (int) $request->answerId;


      

        // $quiz = Quiz::with('questions','questions.options')
        // ->where('code', $quizId)->first();
        $quiz = Quiz::where('code', $quizId)->first();
        if($quiz)
        {
            Log::info("aaaaaaa");
            Quiz::where('id', $quiz->id)->update(['is_attended' => true]);
            $question = Question::where('question_id', $questionId)
                        ->where('quiz_id', $quiz->id)
                        ->first();
            if($question)
            {
                Log::info("bbbbbbbbbbbb");

                $is_answered = $answerId > 0 ? true : false;
                $updateOption = Option::where('id', $answerId)
                        ->where('question_id', $question->id)
                        ->where('quiz_id', $quiz->id)
                        ->update(['is_answered' => $is_answered]);
                // if($updateOption)
                // {
                    
                    Log::info("ccccccccccc");
                    $updateQuestion = Question::where('id', $question->id)
                        ->where('quiz_id', $quiz->id)
                        ->update(['is_answered' => true]);                   
                // }
            }
        }


        $quiz = Quiz::with('questions','questions.options')
                    ->where('code', $quizId)->first();
        if($quiz)
        {
            $attended_question = Question::where('quiz_id', $quiz->id)
                    ->where('is_answered', true)
                    ->count();
            $question = Question::where('quiz_id', $quiz->id)
                    ->where('is_answered', false)
                    ->first();
            if($question)
            {
                $options = Option::where('question_id', $question->id)
                        ->where('quiz_id', $quiz->id)
                        ->get();
                $data = [
                            'quiz_uuid' => $quizId,
                            'quiz_name' => $quiz->name,
                            'qn_no' => $attended_question + 1,
                            'qn_total' => $quiz->total_question,
                            'qn' => $question,
                            'qn_options' => $options,
                            'is_end' => false
                        ];
                return  $data;
            }
        }

        $data = [
            'quiz_uuid' => $quizId,
            'quiz_name' => null,
            'qn_no' => null,
            'qn_total' => null,
            'qn' => null,
            'qn_options' => null,
            'is_end' => true
        ];
        return  $data;          
           
    }

    public function result(Request $request,$quizId)
    {       
        $quiz = Quiz::with('questions','questions.options')
                    ->where('code', $quizId)->first();

        if($quiz)
        {
            $right_options = Option::where([
                            'quiz_id' => $quiz->id,
                            'is_answered' => true,
                            'is_correct' => true
                        ])
                        ->where('quiz_id', $quiz->id)
                        ->count();
            $total_question = $quiz->total_question;
            $percentage = ($right_options / $total_question) * 100;

            if($percentage < 40)
                $result = "Fail";
            else if($percentage >= 40 && $percentage <= 60)
                $result = "Better";
            else
                $result = "Winner";

           
            // ::where('quiz_id', $quiz->id)->count();

            $quiz->right_anwser = $right_options;
            $quiz->percentage = $percentage;
            $quiz->result = $result;
            $data['quiz'] = $quiz;
           
            Log::info("quiz");
            Log::info($quiz);
            return view('quiz.result', $data);
        }
        else
        {
            return redirect()->route('dashboard');
        }

    }
}




