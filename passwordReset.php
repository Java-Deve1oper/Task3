<html>

<head>
    <title>
        Password Reset
    </title>
    <style>
        .resetpassform {
            padding-left: 460px;
            padding-top: 80px;
            column-gap: 40px;
        }

        #oldpass {
            padding-top: 50px;
        }

        #newpass {
            padding-top: 20px;
        }

        #cnfpass {
            padding-top: 20px;
        }

        #submitbtn {
            padding-top: 20px;
            padding-left: 10px;

        }

        #submit {
            font-size: 16px;
            border-radius: 12px;
            margin: 4px 2px;
            padding: 7px 22px;
        }

        label {
            font-size: 18px;
            font-family: Arial, Helvetica, sans-serif;
            ;
        }
    </style>
</head>

<body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <div class="resetpassform">
        <form>
            <div class="column" id="oldpass">
                <label for="old password">Old Password : </label>
                <input name="oldPass" id="oldpassword" placeholder="Old Password.....">
            </div>
            <div class="column" id="newpass">
                <label for="New password">New Password : </label>
                <input name="newPass" id="newpassword" placeholder="New Password.....">
                <span id="message"></span>
            </div>
           
            <div class="column" id="cnfpass">
                <label for="Confirm password">Confirm Password : </label>
                <input name="cnfPass" id="confirmpassword" placeholder="Confirm Password.....">
                <span id="cnfmessage"></span>
            </div>
            <div class="btn" id="submitbtn">
                <button name="submit" id="submit">Submit</button>
            </div>
        </form>
    </div>

    <script>
        $('#oldpassword, #newpassword').on('keyup', function() {
            if ($('#oldpassword').val() == $('#newpassword').val()) {
                $('#message').html('New password should not match with old one !!!!').css('color', 'red');
            } else
                $('#message').html('').css('color', 'green');
        });
       
    </script>
</body>

</html>








<?php

session_start();




?>