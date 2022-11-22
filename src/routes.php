<?php

use Slim\App;
use Slim\Http\Request;
use Slim\Http\Response;
use App\controler\IndexController;
use App\middleware\auth;

return function (App $app) {
    $container = $app->getContainer();
    $app->post('/delete', function(Request $request, Response $response, array $args) use ($container){
        $data = $request->getParsedBody();
        $del = $container->db->delete('tbl_users',[
            "user_id" => $data
        ]);
        return var_dump($data);
    });
    $app->post('/edit', function(Request $request, Response $response, array $args) use ($container){
        $data = $request->getParsedBody();
        $update = $container->db->update('tbl_users',[
            "first_name" => $data['first_name'],
            "last_name"=>$data['last_name'],
            "gender"=>$data['gender']
        ],[
            "user_id"=>$data['id']
        ]);
        // return var_dump($data);
    });
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
    $app->get('/{id}/select', function(Request $request, Response $response, array $args) use ($container){
        $id = $args['id'];
        // return var_dump($args);
        $search = $container->db->select("tbl_customers",[
            "[><]tbl_agents"=>"AGENT_CODE"
        ],'*',[
            "tbl_customers.ID"=>$id,
            "ORDER"=> "CUST_CODE"
        ]);

        return $response->withJson($search);
    })->add(new Auth());
    $app->get('/select', function (Request $request, Response $response, array $args) use ($container) {
        $data = $container->db->select("tbl_customers",[
            "[><]tbl_agents"=>"AGENT_CODE"
        ],'*',[
            "ORDER"=> "CUST_CODE"
        ]);
        // return var_dump($data);
        return $response->withJson($data);
    });
    $app->get('/', function (Request $request, Response $response, array $args) use ($container) {
        $page = (isset($_GET['page']) && $_GET['page'] > 0) ? $_GET['page'] : 1;
        $limit = isset($_GET['limit']) ? $_GET['limit'] : 5;
        $offset = (--$page) * $limit;
        return IndexController::index($container,$request,$response,[
            'hasLogin'=>false,
            'page'=>$page,
            'limit'=>$limit,
            'offset'=>$offset
        ]);
    })->add(new Auth());
};
