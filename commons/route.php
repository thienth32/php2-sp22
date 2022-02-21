<?php

use App\Controllers\CompanyController;
use App\Controllers\LoginController;
use App\Controllers\QuizController;
use App\Controllers\SubjectController;
use Phroute\Phroute\RouteCollector;

function applyRoute($url){
    $router = new RouteCollector();

    $router->get('companies', [CompanyController::class, 'index']);
    $router->get('companies/xoa/{id}', [CompanyController::class, 'xoa']);
    $router->get('companies/tao', [CompanyController::class, 'taoForm']);
    $router->post('companies/tao', [CompanyController::class, 'luuTao']);
    $router->get('companies/sua/{id}', [CompanyController::class, 'suaForm']);
    $router->post('companies/sua/{id}', [CompanyController::class, 'luuSua']);

    $router->get('employees', [EmployeeController::class, 'index']);
    $router->get('employees/xoa/{id}', [EmployeeController::class, 'xoa']);
    $router->get('employees/tao', [EmployeeController::class, 'taoForm']);
    $router->post('employees/tao', [EmployeeController::class, 'luuTao']);
    $router->get('employees/sua/{id}', [EmployeeController::class, 'suaForm']);
    $router->post('employees/sua/{id}', [EmployeeController::class, 'luuSua']);


    $router->get('danh-sach-quiz', [QuizController::class, 'index']);
    $router->get('lam-quiz/{id}', [QuizController::class, 'lamQuiz']);
    $router->post('lam-quiz/{id}', [QuizController::class, 'ketQua']);
    

    // // đăng nhập 
    // // đăng xuất => LoginController và hàm logout
    // $router->any('logout', [LoginController::class, 'logout']);
    // // danh sách môn học - mon-hoc
    // // SubjectController => index
    // $router->get('mon-hoc', [SubjectController::class, 'index']);
    // // {id} vị trí tham số đường dẫn
    // $router->get('mon-hoc/xoa/{id}', [SubjectController::class, 'xoa']);

    // // các bài quiz của môn học
    // $router->get('bai-quiz', [QuizController::class, 'index']);
    // $router->get('bai-quiz/tao-moi', [QuizController::class, 'addForm']);
    // $router->post('bai-quiz/tao-moi', [QuizController::class, 'saveAdd']);
    // $router->get('bai-quiz/cap-nhat/{id}', [QuizController::class, 'editForm']);
    // $router->post('bai-quiz/cap-nhat/{id}', [QuizController::class, 'saveEdit']);
    // $router->get('bai-quiz/xoa/{id}', [QuizController::class, 'remove']);
    // các câu hỏi của 1 bài quiz
    // $router->get('cau-hoi', [QuestionController::class, 'index']);



    $dispatcher = new Phroute\Phroute\Dispatcher($router->getData());
    $response = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], parse_url($url, PHP_URL_PATH));
    // Print out the value returned from the dispatched function
    echo $response;
}


?>