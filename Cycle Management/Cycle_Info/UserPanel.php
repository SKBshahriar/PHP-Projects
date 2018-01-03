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
        <link rel="stylesheet" href="style.css" type="text/css">

    </head>

    <body>
        <?php
        session_start();
        if($_SESSION['flg']==0)
        {
            header('Location: Signin.php');
        }
        else {
            $server = "localhost";
            $user = "root";
            $password = "";
            $db_name = "cycle_record_and_management";

            $db = new mysqli($server, $user, $password, $db_name);

            $email = $_SESSION["email"];
            $pass = $_SESSION["pass"];

            $sql = "SELECT * FROM `user` WHERE email='$email' and password='$pass'";

            $result = $db->query($sql);

            $res = $result->fetch_assoc();

            if ($res) {

                $name = $res["name"];
                $thana = $res["thana"];
                $nid = $res["nid"];
                $district = $res["district"];
                $number_of_cycle = $res["number_of_cycle"];
                $_SESSION['nid'] = $nid;
                $_SESSION['pass']=$pass;

                echo
                    '  </div>
                            <div class="Heading">
                            <p4>'.$name.'</p4>
                            <h2>Cycle Record & Management</h2>
                            
                        </div>
                       
                        <div class="search">
                        <form action="search.php" method="POST">
                
                            <input type="text" class="form-control" id="chassis" placeholder="Chassis Number" name="chassis_number">
                            <button type="submit" class="btn btn-primary btn-lg search_button">Search</button>
                        </form>
                    </div>
                    
                    <div class="function_div">
            
                        <div class="button_div">
                            <a  class="btn btn-primary btn-lg myButton" href="buyCycle.php">Buy Cycle </a>

                            <a  class="btn btn-primary btn-lg myButton" href="cycleForm.php" >Add Cycle </a>

                            <a  class="btn btn-primary btn-lg myButton" href="myCycles.php" >My Cycles </a>
                            
                            <a  class="btn btn-primary btn-lg myButton" href="new.php" >My Profile </a>
                            <a  class="btn btn-primary btn-lg myButton1" href="searchUser.php" >Search User </a>
                            <form action="Signin.php" method="POST">
                                <input type="submit" class="btn btn-primary btn-lg myButton2"value="Sign  Out" name="logout">
                            </form>
                
                    </div>
            
          
                    
                    ';
            }
            else {
                echo '<div class="Heading">
                    <h2>Invalid email or password</h2>
                   </div>';
            }
        }
         
        ?>
        
        





    </body>
</html>
