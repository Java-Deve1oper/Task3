<?php
session_start();
require("connection.php");


if ($_SESSION["login_user"] != null) {

    if ($_SESSION['logging'] == 1) {
?>

        <html>

        <head>
            <title>
                Welcome <?php echo $_SESSION["login_user"]; ?>
            </title>
            <style>
                .header {
                    overflow: hidden;
                    background-color: #f1f1f1;
                    padding: 20px 10px;
                }

                .header a {
                    float: left;
                    color: black;
                    text-align: center;
                    padding: 12px;
                    text-decoration: none;
                    font-size: 18px;
                    line-height: 25px;
                    border-radius: 4px;
                }

                .header a.logo {
                    font-size: 25px;
                    font-weight: bold;
                }

                .header a:hover {
                    background-color: #ddd;
                    color: black;
                }

                .header a.active {
                    background-color: dodgerblue;
                    color: white;
                }

                .header-right {
                    float: right;
                }

                @media screen and (max-width: 500px) {
                    .header a {
                        float: none;
                        display: block;
                        text-align: left;
                    }

                    .header-right {
                        float: none;
                    }
                }


                /*  --------------------------------------- Pop up insert form CSS ------------------------------- */
                .open-button {
                    background-color: #555;
                    color: white;
                    padding: 16px 20px;
                    border: none;
                    cursor: pointer;
                    opacity: 0.8;
                    position: fixed;
                    bottom: 23px;
                    right: 28px;
                    width: 140px;
                }

                .open-editbutton {
                    background-color: #4CAF50;
                    color: white;
                    padding: 16px 20px;
                    border: none;
                    cursor: pointer;
                    opacity: 0.8;
                    position: fixed;
                    bottom: 23px;
                    right: 170px;
                    width: 140px;
                }

                /* The popup form - hidden by default */
                .form-popup {
                    display: none;
                    position: fixed;
                    bottom: 0;
                    right: 15px;
                    border: 3px solid #f1f1f1;
                    z-index: 9;
                }

                /* Add styles to the form container */
                .form-container {
                    max-width: 300px;
                    padding: 10px;
                    background-color: white;
                }

                /* Full-width input fields */
                .form-container input[type=text],
                .form-container input[type=password] {
                    width: 100%;
                    padding: 15px;
                    margin: 5px 0 22px 0;
                    border: none;
                    background: #f1f1f1;
                }

                /* When the inputs get focus, do something */
                .form-container input[type=text]:focus,
                .form-container input[type=password]:focus {
                    background-color: #ddd;
                    outline: none;
                }

                /* Set a style for the submit/login button */
                .form-container .btn {
                    background-color: #4CAF50;
                    color: white;
                    padding: 16px 20px;
                    border: none;
                    cursor: pointer;
                    width: 100%;
                    margin-bottom: 10px;
                    opacity: 0.8;
                }

                /* Add a red background color to the cancel button */
                .form-container .cancel {
                    background-color: red;
                }

                /* Add some hover effects to buttons */
                .form-container .btn:hover,
                .open-button:hover {
                    opacity: 1;
                }

                /* --------------------------------------Data Table CSS------------------------------------ */

                #customers {
                    font-family: Arial, Helvetica, sans-serif;
                    border-collapse: collapse;
                    width: 100%;
                }

                #customers td,
                #customers th {
                    border: 1px solid #ddd;
                    padding: 8px;
                }

                #customers tr:nth-child(even) {
                    background-color: #f2f2f2;
                }

                #customers tr:hover {
                    background-color: #ddd;
                }

                #customers th {
                    padding-top: 12px;
                    padding-bottom: 12px;
                    text-align: center;
                    background-color: #4CAF50;
                    color: white;
                }

                #table {
                    display: block;
                    width: auto;
                    height: auto;
                    overflow: visible;
                }

                td {
                    text-align: center;
                }

                /* PoP up edit form  CSS */

                /* Full-width input fields */
                input[type=text],
                input[type=password] {
                    width: 100%;
                    padding: 12px 20px;
                    margin: 8px 0;
                    display: inline-block;
                    border: 1px solid #ccc;
                    box-sizing: border-box;
                }

                /* Set a style for all buttons */
                button {
                    background-color: #4CAF50;
                    color: white;
                    padding: 14px 20px;
                    margin: 8px 0;
                    border: none;
                    cursor: pointer;
                    width: 100%;
                }

                button:hover {
                    opacity: 0.8;
                }

                /* Extra styles for the cancel button */
                .cancelbtn {
                    width: auto;
                    padding: 10px 18px;
                    background-color: #f44336;
                }

                /* Center the image and position the close button */
                .imgcontainer {
                    text-align: center;
                    margin: 24px 0 12px 0;
                    position: relative;
                }

                img.avatar {
                    width: 20%;
                    height: 20%;
                    border-radius: 20%;
                }

                .container {
                    padding: 16px;
                }

                span.psw {
                    float: right;
                    padding-top: 16px;
                }

                /* The Modal (background) */
                .modal {
                    display: none;
                    /* Hidden by default */
                    position: fixed;
                    /* Stay in place */
                    z-index: 1;
                    /* Sit on top */
                    left: 0;
                    top: 0;
                    width: 100%;
                    /* Full width */
                    height: 100%;
                    /* Full height */
                    overflow: auto;
                    /* Enable scroll if needed */
                    background-color: rgb(0, 0, 0);
                    /* Fallback color */
                    background-color: rgba(0, 0, 0, 0.4);
                    /* Black w/ opacity */
                    padding-top: 60px;
                }

                /* Modal Content/Box */
                .modal-content {
                    background-color: #fefefe;
                    margin: 5% auto 15% auto;
                    /* 5% from the top, 15% from the bottom and centered */
                    border: 1px solid #888;
                    width: 80%;
                    /* Could be more or less, depending on screen size */
                }

                /* The Close Button (x) */
                .close {
                    position: absolute;
                    right: 25px;
                    top: 0;
                    color: #000;
                    font-size: 35px;
                    font-weight: bold;
                }

                .close:hover,
                .close:focus {
                    color: red;
                    cursor: pointer;
                }

                /* Add Zoom Animation */
                .animate {
                    -webkit-animation: animatezoom 0.6s;
                    animation: animatezoom 0.6s
                }

                @-webkit-keyframes animatezoom {
                    from {
                        -webkit-transform: scale(0)
                    }

                    to {
                        -webkit-transform: scale(1)
                    }
                }

                @keyframes animatezoom {
                    from {
                        transform: scale(0)
                    }

                    to {
                        transform: scale(1)
                    }
                }

                /* Change styles for span and cancel button on extra small screens */
                @media screen and (max-width: 300px) {
                    span.psw {
                        display: block;
                        float: none;
                    }

                    .cancelbtn {
                        width: 100%;
                    }
                }
            </style>

        </head>

        <body>
            <!-- //---------------------------------------- Header ----------------------------------------------- -->
            <div class="header">
                <a href="#default" class="logo"><?php echo ucfirst($_SESSION["login_user"]); ?></a>
                <div class="header-right">
                    <a class="active" href="#home">Home</a>
                    <a href="passwordReset.php">Password reset</a>
                    <a href="logout.php?uname=<?php $_SESSION['login_user'] ?>">logout</a>
                </div>
            </div>
            <!-- //---------------------------------Data Visulatization In Table form ----------------------------- -->
            <div id="table">
                <table id="customers">
                    <tr>
                        <th>S.No</th>
                        <th>Product Image</th>
                        <th>Product Name</th>
                        <th>Product Model</th>
                        <th>Product Price</th>
                        <th>Product Status</th>
                        <th>Product Modification</th>
                    </tr>
                    <?php

                    $query = "SELECT * FROM products Where userid = " . $_SESSION['user_id'];
                    $result = mysqli_query($conn, $query);

                    $count = mysqli_num_rows($result);
                    if ($count > 0) {
                        foreach ($result as $row) {

                            $Qid = $row["pid"];
                            $Qimage = $row['pimage'];
                            $Qname = $row["pname"];
                            $Qmodel = $row["pmodel"];
                            $Qrate = $row["prate"];
                            $Qstatus = $row["pstatus"];




                            echo '
                         <tr >
                            <td  onclick="myFunction(' . $Qid . ',' . "'uploads/$Qimage'" . ',' . "'$Qname'" . ',' . "'$Qmodel'" . ',' . "'$Qrate'" . ',' . "'$Qstatus'" . ')">' . $row["pid"] . '</td>
                            <td>' . '<img src="uploads/' . $row['pimage'] . '" height="100" width="100"/>' . '</td>
                            <td>' . $row["pname"] . '</td>
                            <td>' . $row["pmodel"] . '</td>
                            <td>' . $row["prate"] . ".00 ₹" . '</td>
                            <td>' . $row["pstatus"] . '</td>
                            <td>' . '<a href="deleteData.php?uname=' . $_SESSION["login_user"] . '&deleteData=delete&id=' . $row["pid"] . '" onclick="return confirm(\'Are you sure to delete?\')" >Delete</a>' . '</td>
                          </tr>';
                        }
                    }
                    //|| ' . '<a href="editData(' . $row["pid"] . ')">Edit</a>' 
                    ?>
                </table>
            </div>

            <script>
                function confirmation() {
                    var result = confirm("Are you sure to delete?");
                    if (result) {
                        // Delete logic goes here
                    }
                }

                function myFunction(id, image, name, model, rate, status) {
                    document.getElementById("myId").value = id;
                    document.getElementById("myImg").src = image;
                    document.getElementById("name").value = name;
                    document.getElementById("model").value = model;
                    document.getElementById("price").value = rate;
                    document.getElementById("status").value = status;

                    document.getElementById('id01').style.display = 'block';
                }
            </script>
            <!-- //--------------------------------- POP UP Insert Button ------------------------------------------ -->

            <button class="open-button" onclick="openForm()">Insert Data</button>

            <div class="form-popup" id="myForm">
                <form action="insertData.php" class="form-container" method="post" enctype='multipart/form-data'>
                    <h1>Insert Product Data</h1>

                    <label for="psw"><b>Upload Product Image</b></label>
                    <br>
                    <input type="file" name="file" />
                    <br>
                    <br>

                    <label for="product-name"><b>Product Name</b></label>
                    <input type="text" placeholder="Enter Product Name" name="product_name" required>


                    <label for="product-model"><b>Product Model</b></label>
                    <input type="text" placeholder="Enter Product Model" name="product_model" required>

                    <label for="product-price"><b>Product Price</b></label>
                    <input type="text" placeholder="Enter Product Price" name="product_price" oninput="this.value = this.value.replace(/[^0-9.]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');" required>

                    <label for="product-status"><b>Product Status</b></label>
                    <input type="text" placeholder="Enter Product Status" name="product_status" required>

                    <button type="submit" class="btn" name="submit" value="Upload">Insert Data</button>
                    <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
                </form>
            </div>

            <!-- ================== Edit form ====================== -->

            <div id="id01" class="modal">

                <form class="modal-content animate" action="insertEditData.php" method="post">
                    <div class="imgcontainer">
                        <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
                        <img id="myImg" src="" alt="Avatar" class="avatar">
                    </div>
                    <div class="container">
                        
                        <label for="Product-ID"><b>Product ID</b></label>
                        <input type="text" placeholder="Dont Change this" id="myId" name="product_id" required>
                        <label for="Product-Image"><b>Product Image</b></label>
                        <input type="file" name="file" />
                        <label for="Product-Name"><b>Product Name</b></label>
                        <input type="text" placeholder="Enter Product Name" id="name" name="product_name" required>
                        <label for="Product-Model"><b>Product Model</b></label>
                        <input type="text" placeholder="Enter Product Model" id="model" name="product_model" required>
                        <label for="Product-Price"><b>Product Price</b></label>
                        <input type="text" placeholder="Enter Product Price" id="price" name="product_price" required>

                        <label for="Product-Status"><b>Product Status</b></label>
                        <input type="text" placeholder="Enter Product Status" id="status" name="product_status" required>

                        <button type="submit" class="btn" name="submit" value="Edit">Update</button>

                    </div>

                    <div class="container" style="background-color:#f1f1f1">
                        <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
                    </div>
                </form>
            </div>



            <script>
                var modal = document.getElementById('id01');

                // When the user clicks anywhere outside of the modal, close it
                window.onclick = function(event) {
                    if (event.target == modal) {
                        modal.style.display = "none";
                    }
                }






                //==================================================================================



                function validateForm() {

                    var z = document.forms["myEditForm"]["product_price"].value;

                    if (!/^[0-9]+$/.test(z)) {
                        alert("Please only enter numeric characters only for your Age! (Allowed input:0-9)")
                    }

                }



                function openForm() {
                    document.getElementById("myForm").style.display = "block";
                }

                function closeForm() {
                    document.getElementById("myForm").style.display = "none";
                }
            </script>
        </body>

        </html>


<?php



    } else {

        header("location:login.php");
    }
} else {

    header("location:login.php");
}




?>