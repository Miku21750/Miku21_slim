<?php
 $host = 'localhost';
 $user = 'root';
 $pass = '';
 $db = 'data_sampel';

 $conn = mysqli_connect($host, $user,$pass,$db);
 if($conn){

 }else{
    echo "fail connect";
 }
?>