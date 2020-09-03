<!DOCTYPE html>
<html>
<style>
    body {
        font-family: Arial, Helvetica, sans-serif;
    }

    * {
        box-sizing: border-box;
    }

    /* Full-width input fields */
    input[type=text],
    input[type=password],
    input[type=email],
    input[type=tel] {
        width: 100%;
        padding: 15px;
        margin: 5px 0 22px 0;
        display: inline-block;
        border: none;
        background: #f1f1f1;
    }

    .select {
        width: 100%;
        padding: 15px;
        margin: 5px 0 22px 0;
        display: inline-block;
        border: none;
        background: #f1f1f1;
    }

    .select:focus {
        background-color: #ddd;
        outline: none;
    }

    /* Add a background color when the inputs get focus */
    input[type=text]:focus,
    input[type=password]:focus,
    input[type=email]:focus,
    input[type=tel]:focus {
        background-color: #ddd;
        outline: none;
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
        opacity: 0.9;
    }

    button:hover {
        opacity: 1;
    }

    /* Extra styles for the cancel button */
    .cancelbtn {
        padding: 14px 20px;
        background-color: #f44336;
    }

    /* Float cancel and signup buttons and add an equal width */
    .cancelbtn,
    .signupbtn {
        float: left;
        width: 50%;
    }

    /* Add padding to container elements */
    .container {
        padding: 16px;
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
        background-color: #474e5d;
        padding-top: 50px;
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

    /* Style the horizontal ruler */
    hr {
        border: 1px solid #f1f1f1;
        margin-bottom: 25px;
    }

    /* The Close Button (x) */
    .close {
        position: absolute;
        right: 35px;
        top: 15px;
        font-size: 40px;
        font-weight: bold;
        color: #f1f1f1;
    }

    .close:hover,
    .close:focus {
        color: #f44336;
        cursor: pointer;
    }

    /* Clear floats */
    .clearfix::after {
        content: "";
        clear: both;
        display: table;
    }

    /* Change styles for cancel button and signup button on extra small screens */
    @media screen and (max-width: 300px) {

        .cancelbtn,
        .signupbtn {
            width: 100%;
        }
    }
</style>

<body>

    <?php
    // $a = 1;
    // if ($a == 1) {
    if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['phone']) && isset($_POST['plan'])) {
    ?>
        <h2>Your Details</h2>
        <div class="container modal-content">
            <h1>Details</h1>
            <p>Please check if your details are correct.</p>
            <hr>
            <div class="container ">
                <label for="email"><b>Name: </b></label> <?php echo $_POST['name'] ?>
                <br><br>
                <label for="email"><b>Email: </b></label> <?php echo $_POST['email'] ?>
                <br><br>
                <label for="email"><b>Phone: </b></label> <?php echo $_POST['phone'] ?>
                <br><br>
                <label for="psw"><b>Plan: </b></label> <?php echo $_POST['plan'] ?>
            </div>
            <div class=" clearfix">
                <button type="button" onclick="location.href='question_5.php'" class="cancelbtn">NO</button>
                <button type="button" onclick="location.href='question_5.php?p=success'" class="signupbtn">Yes</button>
            </div>
        </div>

    <?php


    } else if (isset($_REQUEST['p'])) {
    ?>
        <h2 style="text-align: center; height: 100%; width: 100%; display: flex; position: fixed; align-items: center;justify-content: center;">You have successfully registered.</h2>
        <h3><a href="question_5.php" style="color: red;">Back</a></h3>
    <?php

    } else {


    ?>


        <h2>Signup Form</h2>

        <form class="modal-content" action="question_5.php" onsubmit="return check_pass()" method="post">
            <div class="container">
                <h1>Sign Up</h1>
                <p>Please fill in this form to create an account.</p>
                <hr>
                <label for="email"><b>Name</b></label>
                <input type="text" placeholder="Enter Name" name="name" required>

                <label for="email"><b>Email</b></label>
                <input type="email" placeholder="Enter Email" name="email" required>

                <label for="email"><b>Phone</b></label>
                <input type="tel" placeholder="E.g 016-1234567" name="phone" pattern="([0-9]{3}-[0-9]{7})|([0-9]{3}-[0-9]{8})|([0-9]{10})" required>

                <label for="psw"><b>Plan</b></label>
                <select name="plan" class="select" required>
                    <option value="">Select Plan</option>
                    <option value="Plan 1">Plan 1</option>
                    <option value="Plan 2">Plan 2</option>
                </select>

                <label for="psw"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="pass" id="pass" required>

                <label for="psw-repeat"><b>Repeat Password </b></label><span style="color:red;" id="get_msg"></span>
                <input type="password" placeholder="Repeat Password" name="re_pass" id="re_pass" required>

                <div class=" clearfix">
                    <button type="reset" class="cancelbtn">Reset</button>
                    <button type="submit" class="signupbtn">Sign Up</button>
                </div>
            </div>
        </form>


        <script>
            function check_pass() {
                var pass = document.getElementById('pass').value;
                var re_pass = document.getElementById('re_pass').value;

                if (pass != re_pass) {
                    document.getElementById('get_msg').innerHTML = 'Repeat password is incorrect'
                    return false;
                } else {
                    document.getElementById('get_msg').innerHTML = "";
                    return true;
                }
            }
        </script>
    <?php
    }
    ?>
</body>

</html>