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
            $chassis=$_POST["chassis_number"];
            
            $sql="SELECT cycle_info.chassis_number,name,cycle_owner.nid,brand_name,model_number FROM `user` NATURAL JOIN cycle_owner NATURAL JOIN cycle_info WHERE chassis_number='$chassis'";
            
            $result = $db->query($sql);

            $res = $result->fetch_assoc();
            
            if(!$res)
            {
                echo'
                    <div class="Heading">
                       <h2>Cycle Not Found</h2>
                    </div>';
            }
            else
            {
                $name=$res['name'];
                $nid=$res['nid'];
                $brand=$res['brand_name'];
                $model=$res['model_number'];
                echo'
                    <div class="Heading">
                       <h2>Match Found</h2>
                    </div>';
                
                echo '
                <div class="table_div">
                    <table class="table_body">
                        <tr>
                            <td>Owner Name</td>
                            <td>' . $name . '</td>
                        </tr>
                        <tr>
                            <td>Owner NID</td>
                            <td>'.$nid.'</td>
                        </tr>
                        <tr>
                            <td>Chassis Number</td>
                            <td>'.$chassis.'</td>
                        </tr>
                        <tr>
                            <td>Brand</td>
                            <td>'.$brand.'</td>
                        </tr>
                        <tr>
                            <td>Model</td>
                            <td>'.$model.'</td>
                        </tr>
                    </table>
                </div>';
               
                
                
            }
         
        ?>
        
        
        
        
    </body>
</html>
