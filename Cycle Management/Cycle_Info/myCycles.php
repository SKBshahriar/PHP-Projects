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
            
            $server = "localhost";
            $user = "root";
            $password = "";
            $db_name = "cycle_record_and_management";

            $db = new mysqli($server, $user, $password, $db_name);
            
            
            $nid=$_SESSION['nid'];
            
            $sql="Select * from cycle_owner natural join cycle_info where nid='$nid'";
            
            $result=$db->query($sql);
            
            $res=$result->fetch_assoc();
            
            $_POST['email']=$_SESSION['email'];
            $_POST['pass']=$_SESSION['pass'];
            
            if(!$res)
            {
                echo'
                    <div class="Heading">
                        <h2>No Cycle Is Added Yet</h2>
                    </div>
                    <a class="btn  btn-primary btn-lg" href="UserPanel.php">Back TO Home</a>
                    ';
            }
            else
            {
                echo'<div class="Heading">

                        <h2>All Cycles</h2>
                    </div>
                    <a class="btn  btn-primary btn-lg" href="UserPanel.php">Back TO Home</a>
                    ';
            }
            while($res)
            {
                
                $chassis=$res["chassis_number"];
                $brand=$res["brand_name"];
                $model=$res["model_number"];
                $price=$res['price'];
                $date_of_sale=$res['date_of_sale'];
                $for_sale=$res['for_sale'];
                $filename="pictures/$chassis.jpg";
                if (file_exists($filename))
                {
                    echo'
                        
                    <div  id="inline" href="signin.html">
                    <div class ="one">
                        <img src="pictures/'.$chassis.'.jpg" style="width:150px;height:100px;">
                    </div>
                        <div  class="two">
                            <p>Brand:  '.$brand.'
                                <form action="cycleInfo.php" method="POST" class="a">
                                    <input type="submit" class="btn btn-primary btn-sm dtlbutton" value="view details" name="details">
                                    <input type="hidden" name = "chassis" value='.$chassis.'>
                                </form>
                            </p>
                            <p>Model:  '.$model.'</p>
                            <p>Chassis Number:  '.$chassis.'</p>
                            
                        </div>
                        
                    </div>
                    
                    ';
                }
                else
                {
                    echo'
                        
                    <div  id="inline" href="signin.html">
                    <div class ="one">
                        <img src="pictures/no_image.jpg" style="width:150px;height:100px;">
                    </div>
                        <div  class="two">
                            <p>Brand:  '.$brand.'
                                <form action="cycleInfo.php" method="POST" class="a">
                                    <input type="submit" class="btn btn-primary btn-sm dtlbutton" value="view details" name="details">
                                    <input type="hidden" name = "chassis" value='.$chassis.'>
                                </form>
                            </p>
                            <p>Model:  '.$model.'</p>
                            <p>Chassis Number:  '.$chassis.'</p>
                            
                        </div>
                        
                    </div>
                    
                    ';
                }
                $res=$result->fetch_assoc();
            }
             $db->close();
        ?>
        
        
        
    </body>
</html>
