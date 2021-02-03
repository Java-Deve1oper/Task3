<?php

session_start();
include("connection.php");

$pass = $_REQUEST['password'];

$id = $_SESSION['id'];



$res = mysqli_query($conn, "SELECT username from task3 WHERE id = '$id' AND passcode= '$pass'");

$cou = mysqli_num_rows($res);

if($cou == 0){

    echo $pass ."<br>";
    echo $id;
    
    $result = mysqli_query($conn, "UPDATE task3 SET passcode = '$pass' WHERE id = '$id'");

    $count = mysqli_affected_rows($conn);

    echo $count;
    
    if($count == 1){
        ?>
         
     <script>
         alert("Successfully Updated !!! Login now ... ");
         setTimeout(function() {
                    window.location.replace("login.php");
                }, 500);
     </script>
    
    <?php
    }


}else{
    ?>
         
     <script>
         alert("ALERT !!! You entered the older password . ");
         setTimeout(function() {
                    window.location.replace("login.php");
                }, 500);
     </script>
    
    <?php

}



?>
