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
            $hasRegistered  = isset($_SESSION['hasRegistered']);
            unset($_SESSION['hasRegistered']);
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
                // $inserted_id = $c->db->id();
                // return var_dump($inserted_id);
                $mode = $_SESSION['mode'] = "login";
                $hasRegistered = $_SESSION['hasRegistered'] = true;
                return $rsp->withRedirect('/login');
                // $c->view->render($rsp, 'login.html',[
                //     'mode'=>"login",
                //     "hasRegistered" => true,
                //     "idReg" => $inserted_id
                // ]);
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
                $_SESSION['hasLogin'] = true;
                $name = $_SESSION['name'] = $d[0]['FIRST_NAME'];

                return $rsp->withRedirect('/');
            }
        }
        public static function select($c, $req, $rsp, $args){
            $data = $c->db->select("tbl_customers",[
                "[><]tbl_agents"=>"AGENT_CODE"
            ],'*',[
                "ORDER"=> "CUST_CODE"
            ]);
            $columns = array(
                0=>'index',
            );
            
            
            $totalfilter = $totaldata = count($data);
            $limit = $req->getParam('length');
            $start = $req->getParam('start');
            $order = $req->getParam('order');
            $order = $columns[$order[0]['column']];
            $dir = $req->getParam('order');
            $dir = $dir[0]['dir'];

            $condition = [
                "LIMIT" => [$start, $limit],
                "ORDER"=> "CUST_CODE"
            ];
            if(!empty($req->getParam('search')['value'])){
                $search = $req->getParam('search')['value'];
                $condition['OR'] =[
                    'tbl_customers.CUST_NAME[~]'=> '%'.$search.'%',
                    'tbl_customers.CUST_CODE[~]'=> '%'.$search.'%',
                    'tbl_customers.CUST_COUNTRY[~]'=> '%'.$search.'%'
                ];
            }

            $showData = $c->db->select('tbl_customers',[
                "[><]tbl_agents"=>"AGENT_CODE"
            ],'*',$condition);
            // var_dump($showData)
;            $data = array();

            if(!empty($showData)){
                $index = $req->getParam('start') + 1;
                foreach ($showData as $d){
                    $each['#'] = $index.'.';
                    $each['Cust_Name'] = $d['CUST_NAME'];
                    $each['Cust_Code'] = $d['CUST_CODE'];
                    $each['Action'] = 
                    '<button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#viewMore" data-bs-whatever="'.$d['ID_CUST'].'">
                    View More
                </button>
                <button class="btn btn-danger delete_items" data-bs-whatever="'.$d['ID_CUST'].'" id="delete" >Delete Data</button>'
                ;
                    $data[] = $each;
                    $index++;
                }
            }

            $json_data = array(
                "draw"=>intval($req->getParam('draw')),
                "recordsTotal"=>intval($totaldata),
                "recordsFiltered"=>intval($totalfilter),
                "data"=>$data
            );
            echo json_encode($json_data);

        // // return var_
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
        public static function insert($c,$req,$rsp,$args){
            $data_insert = $args['data'];
            // return var_dump($data_insert);
            $insert = $c->db->insert('tbl_customers',[
                "CUST_CODE"=>$data_insert['cust_id'],
                'CUST_NAME'=>$data_insert['cust_fullname'],
                'WORKING_AREA'=>$data_insert['cust_workingArea'],
                'CUST_COUNTRY'=>$data_insert['cust_country'],
                "GRADE"=>$data_insert['grade'],
                "OPENING_AMT"=>$data_insert['openingAMT'],
                "RECEIVE_AMT"=>$data_insert['receiveAMT'],
                "PAYMENT_AMT"=>$data_insert['paymentAMT'],
                "OUTSTANDING_AMT"=>$data_insert['outstandingAMT'],
                "PHONE_NO"=>$data_insert['cust_phone'],
                "AGENT_CODE"=>$data_insert['cust_agent'],
            ]);
            // return $response->withJson(array('succes'=> true));
            // console.log($data_insert);
        }
    }
?>