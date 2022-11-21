<?php

use Slim\App;
use Slim\Http\Request;
use Slim\Http\Response;
use App\middleware\Auth;
use App\controller\IndexController;
use Medoo\Medoo;
// session_start();
return function (App $app) {
    $container = $app->getContainer();
    // konfigurasi medoo
    

    // $app->get('/[{name}]', function (Request $request, Response $response, array $args) use ($container) {
    //     // Sample log message
    //     $container->get('logger')->info("Slim-Skeleton '/' route");

    //     // Render index view
    //     return $container->get('renderer')->render($response, 'index.phtml', $args);
    // });

    // Get, mengambil data
    // $app->get('/p', function (Request $request, Response $response, array $args) use ($container){
    //     return $container-> get('renderer')->render($response, 'about.phtml',$args);
    // });

    // Post untuk create resource

    // Delete untuk delete data

    // Any, request apapun bisa
    // $app->any('/p', function (Request $request, Response $response, array $args) use ($container){
    //     return $container-> get('renderer')->render($response, 'about.phtml',$args);
    // });

    // Multiple http method
    // $app->map(['GET','POST'],'/p', function (Request $request, Response $response, array $args) use ($container){
    //     return $container-> get('renderer')->render($response, 'about.phtml',$args);
    // });

    // Group Method
    // $app->group('/p',function (App $app) use ($container){
    //     $app->get('/admin',function (Request $request, Response $response, array $args) use ($container){
    //         return $container->get('renderer')->render($response, 'admin.phtml',$args);
    //     });
    //     $app->get('/about',function (Request $request, Response $response, array $args) use ($container){
    //         return $container-> get('renderer')->render($response, 'about.phtml',$args);
    //     });
    // })->add(new Auth());
    // Login, and add middleware
    // $app->get('/login', function (Request $request, Response $response, array $args) use ($container){
    //     return $container-> get('renderer')->render($response, 'login.phtml',$args);
    // });

    //parameter
    // $app->get('/{n_param}',function (Request $request, Response $response, array $args) use ($container){
    //     return $container->get('renderer')->render($response, 'hello.phtml',$args);
    // });
    // Alternatif
    // $app->get('/{n_param}/p',function (Request $request, Response $response, array $args){
    // ISI 
    // });

    // Parameter opsional
    // $app->get('[/{param:.*}]',function (Request $request, Response $response, array $args) use ($container){
    //     return $container->get('renderer')->render($response, 'hello.phtml',$args);
    // })->add(new Auth());

    // Unlimited parameter
    // $app->get('[/{n_param:.*}]',function (Request $request, Response $response, array $args) use ($container){
    //     $params = explode('/',$args['param']);
    //     return $container->get('renderer')->render($response, 'hello.phtml',$args);
    // });

    // Parameter Pattern
    // Parameter validasi angka
    // $app->get('[/{param:[0-9]+}]',function (Request $request, Response $response, array $args) use ($container){
    //     return $container->get('renderer')->render($response, 'hello.phtml',$args);
    // });
    // Parameter validasi huruf
    // $app->get('[/{param:[a-zA-Z]+}]',function (Request $request, Response $response, array $args) use ($container){
    //     return $container->get('renderer')->render($response, 'hello.phtml',$args);
    // });
    
    // penulisan route urutan yang salah
    // $app->get('[/{param:.*}]',function (Request $request, Response $response, array $args) use ($container){
    //     return $container->get('renderer')->render($response, 'hello.phtml',$args);
    // });
    // $app->get('/post/{param:.*}',function (Request $request, Response $response, array $args) use ($container){
    //     return $container->get('renderer')->render($response, 'about.phtml',$args);
    // });
    // penulisan route yang benar (dari atas)
    // $app->get('/post/{param:.*}',function (Request $request, Response $response, array $args) use ($container){
    //     return $container->get('renderer')->render($response, 'about.phtml',$args);
    // });
    // $app->get('[/{param:.*}]',function (Request $request, Response $response, array $args) use ($container){
    //     return $container->get('renderer')->render($response, 'hello.phtml',$args);
    // });
    
    // // Isi request
    // Penerapan parameter
    // $app->get('/login',function (Request $request, Response $response, array $args) use ($container){
    //     return var_dump($request->getParam('uname'));
    // });
    // $app->get('[/{param:.*}]',function (Request $request, Response $response, array $args) use ($container){
    //     // return var_dump($request);

    //     // Mendapatkan daftar parameter dalam url
    //     $request->getParam('uname');
    // });

    // $app->get('/form',function (Request $request, Response $response, array $args) use ($container){
    //     return $container->get('renderer')->render($response, 'form.phtml',$args);
    // });
    // $app->post('/form-process',function(Request $request, Response $response, array $args) use ($container){
    //     return var_dump($request->getParsedBody());
    //     // gambar
    //     // return var_dump($request->getUploadedFiles());
    // });

    // $app->get('/about', function(Request $request, Response $response, array $args) use ($container){
    //     $data =[
    //         'name' => 'Miku21',
    //         'usia' => 25,
    //     ];
    //     // return $container->get('renderer')->render($response, 'about.phtml',$data);
    //     // alternatif
    //     // return $container->get('renderer')->render($response, 'about.phtml',[
    //     //     'name' => 'Miku21',
    //     //     'usia' => 25,
    //     // ]);
    //     // Return with JSON
    //     return $response->withJSON($data);
    // });
    // Cara 1
    // $app->get('/index','\App\Controller\IndexController:index');
    // Cara 2
    // $app->get('/index', IndexController::class . ':index');
    // Cara 3 (passing Variable route)
    // $app->get('/index', function($req,$rsp,array $args=[]) use ($container){
    //     return IndexController::index($this, $req, $rsp, $args);
    // });

    // SELECT database
    // $app->db->select('select * from users where active = ?', [1]);
    
    // $app->get('[/{param:.*}]',function(Request $request, Response $response, array $args) use ($container){
    //     $data = $app->db->select('user_details',[
    //         'name',
    //         'gender'
    //     ],[
    //         'user_id' => 2
    //     ]);
        
    // });

        // Fungsi Custom
    $app->get('/login',function(Request $request, Response $response, array $args) use ($container){
        return $container->get('renderer')->render($response, 'login.phtml',$args);
    });
    $app->post('/login-process',function(Request $request, Response $response, array $args) use ($container){
        $_SESSION['name'] = $request->getParam('name');
        
        return $container->get('renderer')->render($response, 'login-process.phtml',$_SESSION);
        // gambar
        // return var_dump($request->getUploadedFiles());
    });
    $app->get('/register',function(Request $request, Response $response, array $args) use ($container){
        return $container->get('renderer')->render($response, 'register.phtml',$args);
    });
    $app->get('/logout-process',function(Request $request, Response $response, array $args) use ($container){
        session_destroy();
        return $container->get('renderer')->render($response, '/login',$args);
        
    });
    // $app->get('/{id}/update', function(Request $request, Response $response, array $args) use ($container){
    //     $id = $args['id'];
        
    // });
    $app->get('/{id}/select', function(Request $request, Response $response, array $args) use ($container){
        $id = $args['id'];
        $data = $container->db->select("customer",'*');
        $column = $container->db->query("select COLUMN_NAME from INFORMATION_SCHEMA.COLUMNS where TABLE_NAME='customer' AND TABLE_SCHEMA = 'data_sampel'");
        $search = $container->db->select("customer", '*', [
            "CUST_CODE" => $id
        ]);
        return $container->get('renderer')->render($response, 'index.phtml',[
            'id'=>$id,
            'data'=> $data,
            'search'=> $search,
            'column'=> $column,
            'spesific'=>true
        ]);
    })->add(new Auth());
    $app->get('/{id}/update', function(Request $request, Response $response, array $args) use ($container){
        $id = $args['id'];
        $data = $container->db->select("customer",'*');
        $column = $container->db->query("select COLUMN_NAME from INFORMATION_SCHEMA.COLUMNS where TABLE_NAME='customer' AND TABLE_SCHEMA = 'data_sampel'");
        $search = $container->db->select("customer", '*', [
            "CUST_CODE" => $id
        ]);
        return $container->get('renderer')->render($response, 'index.phtml',[
            'data'=> $data,
            'search'=> $search,
            'column'=> $column,
            'update'=>true
        ]);
    })->add(new Auth());
    $app->post('/update', function(Request $request, Response $response, array $args) use ($container){
        // return var_dump($request->getParsedBody()['CUST_CODE']);
        $id = $request->getParsedBody()['CUST_CODE'];
        $data = $request->getParsedBody();
        $container->db->update("customer",[
            "CUST_NAME" => $data['CUST_NAME'],
            "CUST_CITY" => $data['CUST_CITY'],
            "WORKING_AREA" => $data['WORKING_AREA'],
            "CUST_COUNTRY" => $data["CUST_COUNTRY"],
            "GRADE" => $data["GRADE"],
            "OPENING_AMT"=> $data["OPENING_AMT"],
            "RECEIVE_AMT"=> $data["RECEIVE_AMT"],
            "PAYMENT_AMT"=> $data["PAYMENT_AMT"],
            "OUTSTANDING_AMT"=> $data["OUTSTANDING_AMT"],
            "PHONE_NO"=> $data["PHONE_NO"],
            "AGENT_CODE"=> $data["AGENT_CODE"]
        ],[
            "CUST_CODE"=> $data["CUST_CODE"]
        ]);
        return $response->withRedirect('/');
    })->add(new Auth());
    $app->get('/insert', function(Request $request, Response $response, array $args) use ($container){
        $data = $container->db->select("customer",'*');
        $column = $container->db->query("select COLUMN_NAME from INFORMATION_SCHEMA.COLUMNS where TABLE_NAME='customer' AND TABLE_SCHEMA = 'data_sampel'");
        return $container->get('renderer')->render($response, 'index.phtml',[
            'data'=> $data,
            // 'search'=> $search,
            'column'=> $column,
            'insert'=>true
        ]);
    });
    $app->post('/insert', function(Request $request, Response $response, array $args) use ($container){
        // return var_dump($request->getParsedBody()['CUST_CODE']);
        $id = $container->db->query("SELECT (CAST(SUBSTRING(`CUST_CODE`,2,99) AS INT)+1) AS ID FROM customer")->fetchAll();
        $idInsert = end($id);
        $idCheck = strlen((string)$idInsert[0]);
        $idStart ="";
        // return var_dump($idCheck);
        if($idCheck == 1){
            $idStart = "C0000";
        }else if($idCheck == 2){
            $idStart = "C000";
            // return var_dump($idStart);
        }else if($idCheck = 3){
            $idStart == "C00";
            // return var_dump($idStart);
        }else if($idCheck = 4){
            $idStart == "C0";
            // return var_dump($idStart);
        }else if($idCheck = 5){
            $idStart == "C";
            // return var_dump($idStart);
        } 
        $idNew = $idStart . (string)$idInsert[0];

        $container->db->insert('customer',[
            "CUST_CODE" => $idNew,
            "CUST_NAME" => $request->getParsedBody()['CUST_NAME'],
            "CUST_CITY" => $request->getParsedBody()['CUST_CITY'],
            "WORKING_AREA" => $request->getParsedBody()['WORKING_AREA'],
            "CUST_COUNTRY" => $request->getParsedBody()["CUST_COUNTRY"],
            "GRADE" => $request->getParsedBody()["GRADE"],
            "OPENING_AMT"=> $request->getParsedBody()["OPENING_AMT"],
            "RECEIVE_AMT"=> $request->getParsedBody()["RECEIVE_AMT"],
            "PAYMENT_AMT"=> $request->getParsedBody()["PAYMENT_AMT"],
            "OUTSTANDING_AMT"=> $request->getParsedBody()["OUTSTANDING_AMT"],
            "PHONE_NO"=> $request->getParsedBody()["PHONE_NO"],
            "AGENT_CODE"=> $request->getParsedBody()["AGENT_CODE"]
        ]);
        return $response->withRedirect('/');
    })->add(new Auth());
    $app->get('/{id}/delete', function(Request $request, Response $response, array $args) use ($container){
        // return var_dump($args['id']);

        $data = $container->db->delete('customer',[
            "CUST_CODE" => $args['id']
        ]);
    });

    $app->get('/twig', function(Request $request, Response $response, array $args) use ($container){
        // return $container->view->render($response, 'home.html',$args);
        return IndexController::showTwig($container, $request, $response, $args);
    });

    $app->get('[/{param:.*}]',function(Request $request, Response $response, array $args) use ($container){
        $data = $container->db->select("customer",'*');
        // Mengambil 1 data dari atas
        // $data = $container->db->get("customer",'*');
        // return var_dump($data);
        
        // Insert data
        // $container->db->insert('agents',[
        //     'AGENT_CODE' => 'A013',
        //     'AGENT_NAME' => 'Miku21 Margareth',
        //     'WORKING_AREA' => 'Java',
        //     'COMMISSION' => 0.13,
        //     'PHONE_NO' => '087731137123',
        //     'COUNTRY' => 'ID',
        // ]);
        // Menampilkan data yang barusan diinput
        // $inserted_id = $container->db->id();
        // return var_dump($inserted_id);

        // Update Data
        // $container->db->update('agents',[
        //     'WORKING_AREA' => 'Jawa'
        // ],[
        //     "AGENT_CODE" => "A013"
        // ]);

        // Delete Data
        // $data = $container->db->delete('agents',[
        //     "AGENT_CODE" => "A013"
        // ]);

        // Debug in  medoo
        // $data = $container->db->debug()->update("customer",[
        //     'CUST_COUNTRY' => 'ID'
        // ],[
        //     'CUST_CODE' => 'A015'
        // ]);

        //Advance WHERE clause
        // $data = $container->db->select('customer',
        //     // beetween clause
        //     // 'id[<>]' => [1,6]
        //     // Not Beetween clause
        //     // 'id[><]' => [1,6]
        //     // Not clause
        //     // 'id[!]' => [2]
        //     // IN clause
        //     // 'id' => [2,6]
        //     // NOT IN clause
        //     // 'id[!]' => [2,6]
        //     // LIKE clause
        //     // 'name[~]' => "b%"

        //     // GROUP BY clause
        //     // 'total' => Medoo::raw("COUNT(id)"),
        //     // 'divisi'

            // 'AGENT_NAME',
            // 'WORKING_AREA'
        // [

        // ],[
        //     // GROUP BY CLAUSE
        //     'GROUP' => 'COUNTRY',

        //     // HAVING CLAUSE
        //     'HAVING' =>[
        //         'id[>]' => 4
        //     ]

        //     // LIMIT clause
        //     // 'LIMIT' => [3,5]

        //     // ORDER clause
        //     // 'ORDER' =>[
        //     //     'WORKING_AREA' => "ASC"
        //     // ]
        // ]);
        // return var_dump($data);




        if(isset($_SESSION['name'])){
            return $container->get('renderer')->render($response, 'index.phtml',[
                'data'=> $data
            ]);
        }else{
        //     echo "<script>
        //     alert('kamu belum login')
        //  </script>";
            return $container->get('renderer')->render($response, 'login.phtml',[
                'fcLogin'=> true
            ]);
        }
    })->add(new Auth());

};
