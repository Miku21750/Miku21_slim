<?php

use Slim\App;
use Slim\Http\Request;
use Slim\Http\Response;
use App\controler\IndexController;
use App\middleware\auth;

return function (App $app) {
    $container = $app->getContainer();

    $app->get('/login', function (Request $request, Response $response, array $args) use ($container) {
        return IndexController::log($container,$request,$response,[
            "data"=>"login"
        ]);
    });
    $app->post('/login', function (Request $request, Response $response, array $args) use ($container) {
        // return var_dump($request->getParsedBody()['user']);
        $log = $request->getParsedBody();
        return IndexController::login($container,$request,$response,[
            "data"=>$log
        ]);
        
    });
    $app->get('/logout', function (Request $request, Response $response, array $args) use ($container) {
        session_destroy();
        $container->view->render($response, 'login.html',[
            'mode'=>"login"
        ]);
    });
    $app->get('/register', function (Request $request, Response $response, array $args) use ($container) {
        return IndexController::log($container,$request,$response,[
            "data"=>"register"
        ]);
    });
    $app->post('/register', function (Request $request, Response $response, array $args) use ($container) {
        $log = $request->getParsedBody();
        return IndexController::register($container,$request,$response,[
            "data"=>$log
        ]);
    });
    $app->get('/', function (Request $request, Response $response, array $args) use ($container) {
        return IndexController::index($container,$request,$response,$args);
    })->add(new Auth());
};
