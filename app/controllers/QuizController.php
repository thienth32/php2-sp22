<?php
namespace App\Controllers;

use App\Models\Quiz;
use App\Models\Subject;

class QuizController{
    public function index(){
        $quizs = Quiz::all();
        return view('quiz.index', [
            'quizs' => $quizs
        ]);
    }

    public function addForm(){
        // lấy toàn bộ các subject ra ngoài
        $subjects = Subject::all();
        return view('quiz.add-form', [
            'subjects' => $subjects
        ]);
    }

    public function saveAdd(){
        Quiz::create($_POST);
        header('location: ' . BASE_URL . 'bai-quiz');
    }


}
?>