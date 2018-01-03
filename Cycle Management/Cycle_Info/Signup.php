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
            $server = "localhost";
            $user = "root";
            $password = "";
            $db_name = "cycle_record_and_management";

            $db = new mysqli($server, $user, $password, $db_name);

            $email = $_POST["email"];
            $pass = $_POST["pass"];
            $name = $_POST["name"];
            $thana = $_POST["thana"];
            $nid = $_POST["nid"];
            $district = $_POST["district"];
            $phone=$_POST["phone"];
            
            if($name=="" || $email=="" || $pass=="" || $thana=="" || $nid=="" || $district=="")
            {
                echo'
                    <div class="Heading">
                       <h2>Fill All The Fields</h2>
                    </div>';
            }
            else
            {
               $sql="SELECT * FROM `user` WHERE nid='$nid' or email='$email'";
               $result = $db->query($sql);
               $res = $result->fetch_assoc();
               
               if($res)
               {
                   echo'
                    <div class="Heading">
                       <h2>NID Or Email Already Exists</h2>
                    </div>';
               }
               else
               {
                   $sql="INSERT INTO user (nid,name,email,district,thana,password,number_of_cycle,phone) VALUES ('$nid','$name','$email','$district','$thana','$pass','0',$phone)";
                   $result = $db->query($sql);
                   
                   
                    echo'
                    <div class="Heading">
                       <h2>Account Created</h2>
                    </div>
                    <a class="btn  btn-primary btn-lg" href="Signin.php">Sign In</a>
                ';
                    
               }
            }
           
            
        ?>
        
    </body>
</html>
