<?php
session_start();

include("connection.php");
$statusMsg = '';

$productname = $_POST["product_name"];
$productmodel = $_POST["product_model"];
$productprice = $_POST["product_price"];
$productstatus = $_POST["product_status"];
$uid = $_SESSION["user_id"];
$pid = $_POST["product_id"];
$maxsize    = 2097152;




// if($productmodel == ""){
//     echo $productmodel;
//     echo "product model missing 1 !!!!";
// }else{
//     echo $productmodel;
//     echo "product model missing 2 !!!!";
// }

// $sql = "SELECT pid FROM products WHERE userid='$uid' and pname = '$productname' and pmodel = '$productmodel'";
// $result = mysqli_query($conn, $sql);
// $count = mysqli_num_rows($result);

if ($_SESSION['login_user'] != null) {
    if ($_SESSION['logging'] == 1) {
        // // File upload path
        $targetDir = "uploads/";
        $fileName = basename($_FILES["file"]["name"]);
        $targetFilePath = $targetDir . $fileName;
        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

        if (isset($_POST["submit"]) && !empty($_FILES["file"]["name"])) {

            // Allow certain file formats
            $allowTypes = array('jpg', 'png', 'jpeg', 'gif', 'pdf');
            if (in_array($fileType, $allowTypes)) {
                // Upload file to server
                if (($_FILES['file']['size'] >= $maxsize) || ($_FILES["file"]["size"] == 0)) {
                    $statusMsg = 'File too large. File must be less than 2 megabytes.';
                    echo "kya bolu";
                } else {
                    if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)) {

                        if ($productname == "" && $productmodel == "" && $productprice == "" && $productstatus == "") {
                            $query = "UPDATE products SET pimage='" . $fileName . "' WHERE userid=$uid and pid =$pid ";
                        } else if ($productname != "" && $productmodel == "" && $productprice == "" && $productstatus == "") {
                            $query = "UPDATE products SET pimage='" . $fileName . "' and pname='" . $productname . "' WHERE userid=$uid and pid =$pid ";
                        } else if ($productname != "" && $productmodel != "" && $productprice == "" && $productstatus == "") {
                            $query = "UPDATE products SET pimage='" . $fileName . "' and pname='" . $productname . "' and pmodel='" . $productmodel . "'  WHERE userid=$uid and pid =$pid ";
                        } else if ($productname != "" && $productmodel != "" && $productprice != "" && $productstatus == "") {
                            $query = "UPDATE products SET pimage='" . $fileName . "' and pname='" . $productname . "' and pmodel='" . $productmodel . "' and prate='" . $productprice . "'  WHERE userid=$uid and pid =$pid ";
                        } else if ($productname != "" && $productmodel != "" && $productprice != "" && $productstatus != "") {
                            $query = "UPDATE products SET pimage='" . $fileName . "' , pname='" . $productname . "' , pmodel='" . $productmodel . "' , prate='" . $productprice . "' , pstatus='" . $productstatus . "'  WHERE userid=$uid and pid =$pid ";
                        } else if ($productname == "" && $productmodel != "" && $productprice == "" && $productstatus == "") {
                            $query = "UPDATE products SET pimage='" . $fileName . "' and pmodel='" . $productmodel . "'  WHERE userid=$uid and pid =$pid ";
                        } else if ($productname == "" && $productmodel != "" && $productprice != "" && $productstatus == "") {
                            $query = "UPDATE products SET pimage='" . $fileName . "' and  pmodel='" . $productmodel . "' and prate='" . $productprice . "'   WHERE userid=$uid and pid =$pid ";
                        } else if ($productname == "" && $productmodel != "" && $productprice != "" && $productstatus != "") {
                            $query = "UPDATE products SET pimage='" . $fileName . "' and pmodel='" . $productmodel . "' and prate='" . $productprice . "' and pstatus='" . $productstatus . "'  WHERE userid=$uid and pid =$pid ";
                        } else if ($productname == "" && $productmodel == "" && $productprice != "" && $productstatus == "") {
                            $query = "UPDATE products SET pimage='" . $fileName . "'  and prate='" . $productprice . "'  WHERE userid=$uid and pid =$pid ";
                        } else if ($productname == "" && $productmodel == "" && $productprice != "" && $productstatus != "") {
                            $query = "UPDATE products SET pimage='" . $fileName . "'  and prate='" . $productprice . "' and pstatus='" . $productstatus . "'  WHERE userid=$uid and pid =$pid ";
                        } else if ($productname == "" && $productmodel == "" && $productprice == "" && $productstatus != "") {
                            $query = "UPDATE products SET pimage='" . $fileName . "' and pstatus='" . $productstatus . "'  WHERE userid=$uid and pid =$pid ";
                        }

                        // Insert image file name into database
  
                         

                        $result =  mysqli_query($conn, $query);

                        $user = $_SESSION["login_user"];

                        header("location:panel.php");
                    } else {

                        //  $statusMsg = "Sorry, there was an error uploading your file.";
?>
                        <html>

                        <body>
                            <script>
                                alert("Sorry, there was an error uploading your file.");
                                // document.getElementById("error").innerHTML = "First you should log in !!!!";
                                setTimeout(function() {
                                    window.location.replace("panel.php");
                                }, 0);
                            </script>
                        </body>

                        </html>

                <?php

                    }
                }
            } else {
                //  $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';


                ?>
                <!-- <html>

                <body>
                    <script>
                        alert("Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.");
                        // document.getElementById("error").innerHTML = "First you should log in !!!!";
                        setTimeout(function() {
                            window.location.replace("panel.php");
                        }, 0);
                    </script>
                </body>

                </html> -->

            <?php
            }
        } else {

            if ($productname != "" && $productmodel == "" && $productprice == "" && $productstatus == "") {
                $query = "UPDATE products SET  pname='" . $productname . "' WHERE userid=$uid and pid =$pid ";
            } else if ($productname != "" && $productmodel != "" && $productprice == "" && $productstatus == "") {
                $query = "UPDATE products SET  pname='" . $productname . "' and pmodel='" . $productmodel . "'  WHERE userid=$uid and pid =$pid ";
            } else if ($productname != "" && $productmodel != "" && $productprice != "" && $productstatus == "") {
                $query = "UPDATE products SET  pname='" . $productname . "' and pmodel='" . $productmodel . "' and prate='" . $productprice . "'  WHERE userid=$uid and pid =$pid ";
            } else if ($productname != "" && $productmodel != "" && $productprice != "" && $productstatus != "") {
                $query = "UPDATE products SET  pname='" . $productname . "' , pmodel='" . $productmodel . "', prate='" . $productprice . "' , pstatus='" . $productstatus . "'  WHERE userid=$uid and pid =$pid ";
            } else if ($productname == "" && $productmodel != "" && $productprice == "" && $productstatus == "") {
                $query = "UPDATE products SET  pmodel='" . $productmodel . "'  WHERE userid=$uid and pid =$pid ";
            } else if ($productname == "" && $productmodel != "" && $productprice != "" && $productstatus == "") {
                $query = "UPDATE products SET   pmodel='" . $productmodel . "' and prate='" . $productprice . "'   WHERE userid=$uid and pid =$pid ";
            } else if ($productname == "" && $productmodel != "" && $productprice != "" && $productstatus != "") {
                $query = "UPDATE products SET  pmodel='" . $productmodel . "' and prate='" . $productprice . "' and pstatus='" . $productstatus . "'  WHERE userid=$uid and pid =$pid ";
            } else if ($productname == "" && $productmodel == "" && $productprice != "" && $productstatus == "") {
                $query = "UPDATE products SET  prate='" . $productprice . "'  WHERE userid=$uid and pid =$pid ";
            } else if ($productname == "" && $productmodel == "" && $productprice != "" && $productstatus != "") {
                $query = "UPDATE products SET  prate='" . $productprice . "' and pstatus='" . $productstatus . "'  WHERE userid=$uid and pid =$pid ";
            } else if ($productname == "" && $productmodel == "" && $productprice == "" && $productstatus != "") {
                $query = "UPDATE products SET  pstatus='" . $productstatus . "'  WHERE userid=$uid and pid =$pid ";
            } else {
            
            ?>
                <html>
            
                <body>
                    <script>
                        alert("Sorry, there was an error to update your data.");
                        // document.getElementById("error").innerHTML = "First you should log in !!!!";
                        setTimeout(function() {
                            window.location.replace("panel.php");
                        }, 0);
                    </script>
                </body>
            
                </html>
            
            <?php
            }
            
            $result = mysqli_query($conn, $query)or die("Query failed.");



            $count = mysqli_affected_rows($conn);

             if($count == 1){
              $user = $_SESSION["login_user"];
          
            header("location:panel.php");
             }
            
            
            //  $statusMsg = "Sorry, there was an error uploading your file.";
            }

        // Display status message
        echo $statusMsg;
    } else {
        header("location:login.php");
    }
} else {

    ?>
    <html>

    <body>
        <script>
            alert("First you should log in !!!!");
            // document.getElementById("error").innerHTML = "First you should log in !!!!";
            setTimeout(function() {
                window.location.replace("login.php");
            }, 500);
        </script>
    </body>

    </html>

<?php
}
?>