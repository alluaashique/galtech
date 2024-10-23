<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

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



        // https://the-trivia-api.com/api/questions?categories=film_and_tv&limit=15&difficulty=easy


    }
}




