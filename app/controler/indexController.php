<?php
    namespace App\controler;
    class IndexController{
        // Index
        public static function index($c, $req, $rsp, $args){
            // if login true
            $c->view->render($rsp, 'index.html',[
                'name'=>$data_log['user']
            ]);
        }
        // enter login or register mode based on args
        public static function log($c, $req, $rsp, $args){
            $c->view->render($rsp, 'login.html',[
                'mode'=>$args['data']
            ]);
            // return var_dump($args['data']);
        }
        // register post 
        public static function register($c, $req, $rsp, $args){
            // get data
            $data_reg = $args['data'];
            // hash password
            $pass = md5($data_reg['pass']);
            // insert new user
            $d = $c->db->insert('user_details',[
                "username"=>$data_reg['user'],
                "first_name"=>$data_reg['firstName'],
                "last_name"=>$data_reg['lastName'],
                "gender"=>$data_reg['gender'],
                "password"=>$pass,
                "status"=>1
            ]);
            $inserted_id = $c->db->id();
            return var_dump($inserted_id);
        }
        // login post
        public static function login($c, $req, $rsp, $args){
            // get data
            $data_log = $args['data'];
            // hash password
            $pass = md5($data_log['pass']);
            // Check the user database
            $d = $c->db->select('user_details','*',[
                "username"=>$data_log['user'],
                'password'=>md5($data_log['pass'])
            ]);
            // if not exist
            if($d == null){
                $c->view->render($rsp, 'login.html',[
                    'mode'=>"login",
                    "notValidate" => true
                ]);
            // if exist
            }else{
                // go into index
                $c->view->render($rsp, 'index.html',[
                    'name'=>$data_log['user']
                ]);
            }
        }
    }
?>