<?php
    namespace App\controler;
    class IndexController{
        // Index
        public static function index($c, $req, $rsp, $args){
            // if login true
            // return var_dump($_SESSION);
            // $countQuery = $stmt->prepare('SELECT COUNT(*) FROM tbl_customers INNER JOIN tbl_agents USING(AGENT_CODE)');
            // $dataQuery = $stmt->prepare('SELECT * FROM tbl_customer LIMIT :limit OFFSET :offset');
            // $dataQuery->bindValue(':limit', $limit, \PDO::PARAM_INT); 
            // $dataQuery->bindValue(':offset', $offset, \PDO::PARAM_INT); 

            // try {
            //     $count = $countQuery->execute();
            //     $data = $dataQuery->execute();
            // } catch(PDOException $e) {
            //     die('Error.');
            // }
            // $app->render('data.html', array(
            //     'data' => $data,
            //     'count' => $count
            // ));
            // $offset = $args['offset'];
            // $limit = $args['limit'];
            // $page = $args['page'];
            // $count = $c->db->count("tbl_customers",[
            //     "[><]tbl_agents"=>["AGENT_CODE"=>"AGENT_CODE"]
            // ],[
            //     "tbl_customers.ID"
            // ]);
            
            $data = $c->db->select("tbl_customers",[
                "[><]tbl_agents"=>["AGENT_CODE"=>"AGENT_CODE"]
            ],'*',[
                "ORDER"=> "CUST_CODE"
                // "LIMIT"=>[$offset, $limit]
            ]);
            $agent = $c->db->select("tbl_agents","*");
            // return var_dump($data);
            // return json_encode($data);
            if($args['hasLogin'] == true){
                $c->view->render($rsp, 'index.html',[
                    'hasLogin'=>true,
                    'name'=>$_SESSION['name'],
                    'data'=>$data,
                    'agent'=>$agent
                ]);
            }else{
                $c->view->render($rsp, 'index.html',[
                    'hasLogin'=>false,
                    'name'=>$_SESSION['name'],
                    'data'=>$data,
                    'agent'=>$agent
                ]);
            }
        }
        // enter login or register mode based on args
        public static function log($c, $req, $rsp, $args){
            $c->view->render($rsp, 'login.html',[
                'mode'=>$args['data']
            ]);
            // return var_dump($args['data']);
        }
        // delete
        public static function delete($c, $req, $rsp, $args){
            $data = $args['data']['id'];
            // return var_dump($data);
            $del = $c->db->delete('tbl_customers',[
                "ID_CUST" => $data
            ]);
            // return var_dump($del);
        }
        // register post 
        public static function register($c, $req, $rsp, $args){
            // get data
            $data_reg = $args['data'];
            // hash password
            $pass = md5($data_reg['pass']);
            // insert new user
            $dAwal = $c->db->select('tbl_users',"user",[
                "USER"=>$data_reg['user']
            ]);
            // return var_dump($dAwal == null);
            // if not exist
            if($dAwal == null){
                $d = $c->db->insert('tbl_users',[
                    "USER"=>$data_reg['user'],
                    "FIRST_NAME"=>$data_reg['firstName'],
                    "LAST_NAME"=>$data_reg['lastName'],
                    "PASSWORD"=>$pass,
                ]);
                $inserted_id = $c->db->id();
                // return var_dump($inserted_id);
                $c->view->render($rsp, 'login.html',[
                    'mode'=>"login",
                    "hasRegistered" => true,
                    "idReg" => $inserted_id
                ]);
            // if exist
            }else{
                // go back
                $c->view->render($rsp, 'login.html',[
                    'mode'=>"register",
                    "hasData" => true
                ]);
            }
        }
        // login post
        public static function login($c, $req, $rsp, $args){
            // get data
            $data_log = $args['data'];
            // hash password
            $pass = md5($data_log['pass']);
            // Check the user database
            $d = $c->db->select('tbl_users','*',[
                "USER"=>$data_log['user'],
                'PASSWORD'=>md5($data_log['pass'])
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
                // session_start();
                // return var_dump($d[0]['first_name']);
                $_SESSION['name'] = $d[0]['FIRST_NAME'];
                return IndexController::index($c,$req,$rsp,[
                        'hasLogin'=>true,
                        'name'=>$_SESSION['name']
                    ]);
            }
        }

        public static function edit($c,$req,$rsp,$args){
            $data_edit = $args['data'];
            // return var_dump($data_edit);
            $update = $c->db->update('tbl_customers',[
                'CUST_NAME'=>$data_edit['cust_fullname'],
                'WORKING_AREA'=>$data_edit['cust_workingArea'],
                'CUST_COUNTRY'=>$data_edit['cust_country'],
                "GRADE"=>$data_edit['grade'],
                "OPENING_AMT"=>$data_edit['openingAMT'],
                "RECEIVE_AMT"=>$data_edit['receiveAMT'],
                "PAYMENT_AMT"=>$data_edit['paymentAMT'],
                "OUTSTANDING_AMT"=>$data_edit['outstandingAMT'],
                "PHONE_NO"=>$data_edit['cust_phone'],
                "AGENT_CODE"=>$data_edit['cust_agent'],
            ],[
                "ID_CUST"=>$data_edit['id']
            ]);
            // console.log($data_edit);
        }
    }
?>