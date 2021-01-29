<?php
require("connection.php");
session_start();



if ($_SESSION['login_user'] != null) {

    if ($_SESSION['logging'] == 1) {

        if ($_REQUEST['deleteData'] == "delete") {

            $product_id = $_REQUEST["id"];
            $user_id = $_SESSION["user_id"];

            // echo "Product ID => ".$product_id." User ID => ".$user_id;
            $sql = "DELETE FROM products WHERE pid=$product_id AND userid=$user_id";

            // echo $sql;
            $result = mysqli_query($conn, $sql);

            $count = mysqli_num_rows($result);

            // echo "count is : ".$count;
            $uname = $_REQUEST['uname'];
            header("location:panel.php");
            // header("Refresh: 0");


        } else {
?>
            <html>

            <body>
                <script>
                    alert("Something went wrong ! . Try again  !!!!");
                    // document.getElementById("error").innerHTML = "First you should log in !!!!";
                    setTimeout(function() {
                        window.location.replace("panel.php");
                    }, 0);
                </script>
            </body>

            </html>

    <?php
        }
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