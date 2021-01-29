<?php

session_start();

if($_SESSION["login_user"] != null){
    $_SESSION["logging"] = 0 ;
    header("location:login.php");
}else{
    header("location:login.php");
}
