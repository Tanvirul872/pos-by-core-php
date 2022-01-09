<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<?php include "connection.php" ;  ?>

<!DOCTYPE html>
<html>

<head>
    <title>My Awesome Login Page</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
</head>
<!--Coded with love by Mutiullah Samim-->
<body>
<div class="container h-100">
    <div class="d-flex justify-content-center h-100">
        <div class="user_card">
            <div class="d-flex justify-content-center">
                <div class="brand_logo_container">
                    <img src="https://cdn.freebiesupply.com/logos/large/2x/pinterest-circle-logo-png-transparent.png" class="brand_logo" width="200px" height="200px" alt="Logo">
                </div>
            </div>
            <div class="d-flex justify-content-center form_container">
                <form action="" class="form-vertical" name="form1" method="post" >
                    <div class="input-group mb-3">
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                        </div>
                        <input type="text" name="username" class="form-control input_user" value="" placeholder="username">
                    </div>
                    <div class="input-group mb-2">
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="fas fa-key"></i></span>
                        </div>
                        <input type="password" name="password" class="form-control input_pass" value="" placeholder="password">
                    </div>



                    <div class="d-flex justify-content-center mt-3 login_container">
                        <input type="submit" name="submit1" value="login" class="btn btn-success">
<!--                        <button type="button" name="button" class="btn login_btn">Login</button>-->
                    </div>
                </form>

            </div>
            <?php
            if(isset($_POST['submit1'])){

                $username = mysqli_escape_string($link,$_POST["username"]);
                $password = mysqli_escape_string($link,$_POST["password"]);

                $count = 0 ;
                $res=mysqli_query($link,"select * from user_registration where username='$username' && password='$password' && status='active'");
                $count=mysqli_num_rows($res);

                if($count>0){ ?>

                    <script type="text/javascript" >
                        window.location="demo.php" ;
                    </script>

                <?php }else{ ?>

                    <div class="alert alert-danger">
                        <strong> Wrog Password! </strong> Please try again with right password!
                    </div>

                <?php  }
            }
            ?>

        </div>
    </div>
</div>
</body>
</html>
