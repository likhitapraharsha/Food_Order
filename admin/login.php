<?php include('../config/constants.php'); ?>

<html>
    <head>
        <title>Login - Food order system</title>
        <link rel="stylesheet" href="../css/admin.css">
    </head>

    <body>

        <div class="login">
            <h1 class="text-center">Login</h1>
            <br><br>

            <?php
                if(isset($_SESSION['login'])){
                      echo $_SESSION['login'];
                       unset($_SESSION['login']);
                }

                if(isset($_SESSION['no-login-message'])){
                    echo $_SESSION['no-login-message'];
                    unset($_SESSION['no-login-message']);
                }

                ?>
                <br><br>

            <!-- login form starts here-->
            <form action="" method="POST" class="text-center">
                Username: <br>
                <input type="text" name="username" placeholder="enter username"><br><br>

                Password: <br>
                <input type="password" name="password" placeholder="enter password"><br><br>

                <input type="submit" name="submit" value="Login" class="btn-primary">

                <br><br>
            </form>
           <!-- login form ends-->

 

            <!--<p class="text-center"> Created by-->  
        </div>


    </body>
</html>

<?php

    //check if submit button is clicked
    if(isset($_POST['submit'])){
        //process for login
        //1. get data from login

        $username = $_POST['username'];
        $password = md5($_POST['password']);
        
        //2. sql to check if user with username and password exists or not
        $sql = "SELECT * FROM admin WHERE username='$username' AND password='$password'";

        //3. execute the query
        $res = mysqli_query($conn, $sql);

        //4. count rows to check if the user exists or not

        $count = mysqli_num_rows($res);
 
        if($count==1){

            //user available nd login success

            $_SESSION['login'] = "<div class='success'>Login successful.</div>";
            $_SESSION['user'] = $username; //to check if the user is logged in or not and logout will unset it. 
            //redirect to home page/dashboard
            header('location:'.SITEURL.'admin/index.php');
        }
        else{
            //user not available and login fail
            $_SESSION['login'] = "<div class='error text-center'>Username or password did not match.</div>";

            //redirect to home page/dashboard
            header('location:'.SITEURL.'admin/login.php');

        }
    }

?>