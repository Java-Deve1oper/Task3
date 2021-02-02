<?php

session_start();
include("connection.php");
// Array with names


// get the q parameter from URL
$q = $_REQUEST["q"];

$sql = "SELECT id from task3 WHERE username = '$q'";

$result = mysqli_query($conn, $sql);

$count = mysqli_num_rows($result);

$hint = "";

$_SESSION["forget_user_id"] = "";

// lookup all hints from array if $q is different from ""
if ($count == 1) {
    $hint = "found";
  foreach($result as $row) {
    $_SESSION["forget_user_id"] = $row["id"];
  }

  
}



// Output "no suggestion" if no hint was found or output correct values
echo $hint == "" ? "not found"  : $hint;
?>