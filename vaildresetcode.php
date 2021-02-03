<?php
session_start();
include("connection.php");

$code = $_REQUEST["code"];

$id = $_REQUEST['id'];

$_SESSION['id'] = $id ;

$sql = "SELECT code FROM task3 WHERE id='$id'";

$result = mysqli_query($conn, $sql);

$count = mysqli_num_rows($result);

if($count == 1){
    foreach($result as $row){
       $code1 = $row['code'];
    }
 
    if($code1 === $code){

        $query = "UPDATE task3 SET code = '0' WHERE id = '$id'";

        $res = mysqli_query($conn,$query);

        $cou = mysqli_affected_rows($conn);

        if($cou == 1){
            header("location:forgetPassword.php");
        }{
            header("location:forgetPassword.php");  
        }
        
    }else{
        echo "your link is expired !";
    }
}else{
    echo "Something is wrong . ";
}


