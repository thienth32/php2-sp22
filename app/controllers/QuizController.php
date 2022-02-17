<?php
namespace App\Controllers;

use App\Models\Quiz;

class QuizController{
    public function index(){
        $quizs = Quiz::all();
        return view('quiz.index', [
            'quizs' => $quizs
        ]);
    }


}
?>