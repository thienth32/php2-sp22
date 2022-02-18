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

    public function editForm($id){
        $model = Quiz::find($id); // lấy dữ liệu 1 bản ghi dựa vào id
        $subjects = Subject::all();
        return view('quiz.edit-form', [
            'model' => $model,
            'subjects' => $subjects
        ]);
    }


}
?>