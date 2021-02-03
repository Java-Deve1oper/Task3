<?php
session_start();


?>

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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <div id="forgetpasswordfrompass">
        <div class="fheading">
            <h3>Forget Password</h3>
        </div>
        <form method="POST" action="changepassword.php">
            <div class="input-forgetpass">
                <label for="forgetPass1"><b>New Password &nbsp;&nbsp;&nbsp; : </b> </label>
                <input name="password" id="password" type="password" placeholder="Enter new Pass...">
            </div>
            <br>
            <div class="input-forgetpass">
                <label for="cnfforgetPass1"><b>Confirm Password : </b></label>
                <input type="password" name="confirm_password" id="confirm_password" placeholder="Enter your confirm Pass...">
                <span id='message'></span>
            </div>
            <br>
            <div class="forgetpassbtnfield">
                <button class="forgetpassbtn" name="Submit" value="forgetpassform">Submit</button>
            </div>
        </form>
    </div>

    <script>
        $('#password, #confirm_password').on('keyup', function() {
            if ($('#password').val() == $('#confirm_password').val()) {
                $('#message').html('Matched').css('color', 'green');
            } else
                $('#message').html('Not Matching').css('color', 'red');
        });


       
    </script>


    
</body>

</html>