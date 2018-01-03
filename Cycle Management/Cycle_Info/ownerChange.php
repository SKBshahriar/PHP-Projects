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
        
        if(isset($_POST['change']))
        {
            $chassis=$_SESSION['chassis'];
            
             $server = "localhost";
             $user = "root";
             $password = "";
             $db_name = "cycle_record_and_management";
             $db = new mysqli($server, $user, $password, $db_name);
             
             $nid=$_POST['nid'];
             $pass=$_POST['pass'];
             $sql="select * from user where nid='$nid'";
             $result=$db->query($sql);
             $res = $result->fetch_assoc();
             if($_SESSION['pass']!=$pass)
             {
                  echo'
                    <div class="Heading">
                    <h2>Password Did Not Match</h2>
                    </div>
                    <a class="btn  btn-primary info_button" href="cycleInfo.php">Back</a>
                    <div class="owner">
                        <form action="ownerChange.php" method="POST">
                            <label for="nid">New Owner NID:</label>
                            <input type="text" class="form-control" id="nid" name="nid">
                            <label for="pass">Your Password:</label>
                            <input type="password" class="form-control" id="pass" name="pass">
                            <input type="submit" class="btn btn-primary info_button" name="change" value="Transfer Ownership">
                        </form>
                    </div>
                    ';
             }
             
             else if(!$res)
             {
                echo'
                    <div class="Heading">
                    <h2>New NID Does Not Exist</h2>
                    </div>
                    <a class="btn  btn-primary info_button" href="cycleInfo.php">Back</a>
                    <div class="owner">
                        <form action="ownerChange.php" method="POST">
                            <label for="nid">New Owner NID:</label>
                            <input type="text" class="form-control" id="nid" name="nid">
                            <label for="pass">Your Password:</label>
                            <input type="password" class="form-control" id="pass" name="pass">
                            <input type="submit" class="btn btn-primary info_button" name="change" value="Transfer Ownership">
                        </form>
                    </div>
                    ';
             }
             else 
             {
                $sql = "UPDATE cycle_owner SET nid='$nid' where chassis_number='$chassis'";

                $result = $db->query($sql);
                
                $nid2=$_SESSION['nid'];
                
                $sql="select * from user where nid='$nid'";
                $result=$db->query($sql);
                $res = $result->fetch_assoc();
                $temp=$res['number_of_cycle'];
                
                $temp++;
                
                $sql = "UPDATE user SET number_of_cycle='$temp' where nid='$nid'";
                $result=$db->query($sql);
                
                $sql="select * from user where nid='$nid2'";
                $result=$db->query($sql);
                $res = $result->fetch_assoc();
                $temp=$res['number_of_cycle'];
                
                $temp--;
                
                $sql = "UPDATE user SET number_of_cycle='$temp' where nid='$nid2'";
                $result=$db->query($sql);

                echo'
                    <div class="Heading">
                    <h2>Ownership Changed</h2>
                    </div>
                    <a 
                    ';
                echo'<a class="btn  btn-primary info_button" href="UserPanel.php">Back TO Home</a>';
             }
              
        }
        else
        {
             echo'
                    
                    <div class="Heading">
                        <h2>Change Ownership</h2>
                    </div>
                    <a class="btn  btn-primary info_button" href="UserPanel.php">Back TO Home</a>
                    <div class="owner">
                        <form action="ownerChange.php" method="POST">
                            <label for="nid">New Owner NID:</label>
                            <input type="text" class="form-control" id="nid" name="nid">
                            <label for="pass">Your Password:</label>
                            <input type="password" class="form-control" id="pass" name="pass">
                            <input type="submit" class="btn btn-primary info_button" name="change" value="Transfer Ownership">
                        </form>
                    </div>
                    ';
        }
        
         

        ?>
    </body>
</html>
