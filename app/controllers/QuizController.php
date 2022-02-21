<?php
namespace App\Controllers;

use App\Models\Answer;
use App\Models\Question;
use App\Models\Quiz;
use App\Models\Subject;

class QuizController{
    public function index(){
        // $quizs = Quiz::all();
        // $quizs = Quiz::select('quizs.*', 'subjects.name as subject_name')
        //     ->join('subjects', 'subjects.id', '=', 'quizs.subject_id')
        //     ->get();
        // echo "<pre>";
        // var_dump($quizs);
        // die;
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

    public function saveEdit($id){
        $model = Quiz::find($id);
        $model->fill($_POST);
        $model->status = isset($_POST['status']) ? 1 : 0;
        $model->is_shuffle = isset($_POST['is_shuffle']) ? 1 : 0;
        $model->save();
        header('location: ' . BASE_URL . 'bai-quiz');
    }

    public function remove($id){
        $questions = Question::where('quiz_id', $id)->get();
        foreach ($questions as $q) {
            $answers = Answer::where('question_id', $q->id)->get();
            foreach ($answers as $ans) {
                Answer::destroy($ans->id);
            }
            Question::destroy($q->id);
        }
        Quiz::destroy($id);
        header('location: ' . BASE_URL . 'bai-quiz');
    }


}
?>