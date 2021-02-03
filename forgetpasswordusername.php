<html>

<head>
    <title>
        Forget Password
    </title>
    <style>
        .fheading {
            padding-left: 70px;
            padding-top: 100px;
            font-family: Arial, Helvetica, sans-serif;
            font-size: 20px;

        }

        #forgetpasswordfrompass {
            padding-left: 460px;
        }

        #forgetpasswordfromusername {
            padding-left: 460px;
        }

        .forgetpassbtn {
            font-size: 16px;
            border-radius: 12px;
            margin: 4px 2px;
            padding: 7px 22px;
        }

        .input-forgetpass {
            font-size: 18px;
            font-family: "Lucida Console", "Courier New", monospace;
        }
    </style>



</head>

<body>


    <div id="forgetpasswordfromusername">
        <form action="#" method="post">

            <div class="fheading">
                <h3>Forget Password</h3>
            </div>
            <div class="input-forgetpass">
                <label for="enter your username"><b>Email :</b></label>
                <input type="text" id="Useremail" value="" name="email" placeholder="enter your email...">
            </div>

            <br>
            <div class="forgetpassbtnfield">
                <button class="forgetpassbtn" id="btn-submit" name="Submit" value="forgetpassform">Submit</button>
            </div>
        </form>
    </div>



</body>

</html>



<?php

session_start();
include("connection.php");


if ($_REQUEST["Submit"] == "forgetpassform") {

    $email = $_REQUEST['email'];

    $sql = "SELECT id from task3 WHERE email = '$email'";

    $result = mysqli_query($conn, $sql);

    $count = mysqli_num_rows($result);

    if ($count == 1) {
        foreach ($result as $row) {
            $id = $row['id'];
        }

        $random = rand(1000, 9000);

        $query = "UPDATE task3 SET code = '$random' WHERE id = '$id'";

        $res = mysqli_query($conn, $query);

        $cou = mysqli_affected_rows($conn);

        if ($cou == 1) {
            $_SESSION['id'] = $id;
            $_SESSION['code'] = $random;
            $_SESSION['email'] = $email;
            header("Location: forgetPasswordEmail.php");
        }
    } else {
?>

        <script>
            alert("Email not Matched ! Please Check .");
        </script>
<?php
        // header("Location: forgetpasswordusername.php");
    }
}


?>