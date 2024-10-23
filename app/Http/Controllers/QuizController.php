<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Quiz;
use App\Models\Question;

class QuizController extends Controller
{
    public function convert($string)
    {
        $slug = Str::slug($string); 
        $slug = str_replace('-', '_', $slug);
        return $slug;
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
    public function show($code)
    {
        return 1;
    }
}




