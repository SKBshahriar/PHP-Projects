<!DOCTYPE html>

-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
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
        
        $chassis=$_POST["chassis_number"];
        
        $sql = "SELECT * FROM `cycle_info` WHERE chassis_number='$chassis'";
        
       
        
        
        $result = $db->query($sql);

        $res = $result->fetch_assoc();
        
        $nid=$_SESSION['nid'];
        
        
        if($res)
            echo '
                    <div class="Heading">
                        <h2>Cycle Already Exist</h2>
                    </div>';
        else {
           
            $brand=$_POST["brand_name"];
            $model=$_POST["model_number"];
            $price=$_POST["price"];
            $date_of_buy=$_POST["date_of_buy"];
            
            
            if($nid=="" || $brand=="" || $model=="" || $price=="" || $date_of_buy=="")
            {
                echo"Fill all the fields";
            }
            else
            {
                
                $sql="INSERT INTO cycle_info(chassis_number,brand_name,model_number,price,date_of_sale,for_sale) VALUES ('$chassis','$brand','$model','$price','$date_of_buy','0')";
            
                $result=$db->query($sql);
                
                $sql="INSERT INTO cycle_owner(chassis_number,nid) VALUES ('$chassis','$nid')";
                
                $result=$db->query($sql);
                
                $sql="SELECT number_of_cycle from user where nid='$nid'";
                
                $result=$db->query($sql);
                
                $res=$result->fetch_assoc();
                
                $temp=$res['number_of_cycle'];
                
                $temp++;
                
                $sql="UPDATE user SET number_of_cycle='$temp' where nid='$nid'";
                
                $result=$db->query($sql);
            
                echo '
                    <div class="Heading">
                        <h2>Cycle Added</h2>
                    </div>';
            }
        }
        
        ?>
    </body>
</html>
