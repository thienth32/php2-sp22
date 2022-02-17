<?php

use App\Controllers\LoginController;
use App\Controllers\QuizController;
use App\Controllers\SubjectController;
use Phroute\Phroute\RouteCollector;

function applyRoute($url){
    $router = new RouteCollector();

    // đăng nhập 
    // đăng xuất => LoginController và hàm logout
    $router->any('logout', [LoginController::class, 'logout']);
    // danh sách môn học - mon-hoc
    // SubjectController => index
    $router->get('mon-hoc', [SubjectController::class, 'index']);
    // {id} vị trí tham số đường dẫn
    $router->get('mon-hoc/xoa/{id}', [SubjectController::class, 'xoa']);

    // các bài quiz của môn học
    $router->get('bai-quiz', [QuizController::class, 'index']);
    // các câu hỏi của 1 bài quiz
    // $router->get('cau-hoi', [QuestionController::class, 'index']);



    $dispatcher = new Phroute\Phroute\Dispatcher($router->getData());
    $response = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], parse_url($url, PHP_URL_PATH));
    // Print out the value returned from the dispatched function
    echo $response;
}


?>