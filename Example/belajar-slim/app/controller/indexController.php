<?php
    namespace App\controller;
    class IndexController{
        // public static function index(){
        //     echo 'Controller Index';
        // }
        public static function index($app, $req, $rsp, $args){
            // return var_dump($req->getParams());
            $app->get('renderer')->render($rsp, 'index.phtml',$args);
        }
        public static function showTwig($c, $req, $rsp, $args){
            // $data = [
            //     'name' => 'Miku21',
            //     'usia' => 25
            // ];
            $data = ["medan","bali","makasar","bandung"];
            // $data = [
            //     "name"=> "bima",
            //     'usia'=> 'sl3'
            // ];
            $c->view->render($rsp, 'home.html',[
                'data' => $data
            ]);
        }
    }
?>