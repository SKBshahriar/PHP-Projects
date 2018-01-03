<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="style2.css" type="text/css">
    </head>
    <body>
        <?php
            session_start();
            $_SESSION['flg']=0;
            if(isset($_POST['buttonSignin']))
            {
                $_SESSION['flg']=1;
                $_SESSION['email']= $_POST['email'];
                $_SESSION['pass']=$_POST['pass'];
                header('Location: Userpanel.php');
            }
            if(isset($_POST['logout']))
            {
                session_destroy();
                $_SESSION['flg']=0;
            }
        ?>
        <div class="Heading">
            <h2>User Login</h2>
        </div>
        <div action="Signin.php" class="form_signin_signup">
            <form  method="POST">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
                <label for="pwd">Password:</label>
                <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pass">
                <button type="submit" class="btn btn-primary btn-lg login" name="buttonSignin" >Login</button>
                <form/>     
        </div>
    </body>
</html>
