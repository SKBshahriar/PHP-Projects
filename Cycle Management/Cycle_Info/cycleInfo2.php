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
        
        $chassis=$_POST['chassis'];
        $_SESSION['chassis']=$chassis;
        
        $server = "localhost";
        $user = "root";
        $password = "";
        $db_name = "cycle_record_and_management";

        $db = new mysqli($server, $user, $password, $db_name);
        
        $sql="select * from cycle_info natural join cycle_owner natural join user where chassis_number='$chassis'";
        
        $result = $db->query($sql);

        $res = $result->fetch_assoc();
        
        
        $chassis=$res["chassis_number"];
        $brand=$res["brand_name"];
        $model=$res["model_number"];
        $price=$res['price'];
        $date_of_sale=$res['date_of_sale'];
        $for_sale=$res['for_sale'];
        $name=$res['name'];
        $district=$res['district'];
        $thana=$res['thana'];
        $phone=$res['phone'];
              echo '
                 <div class="Heading">
                    <h2>Cycle Details</h2>
                </div>';
                $filename="pictures/$chassis.jpg";
                if (file_exists($filename))
                {
                    echo'
                        <div class="img_div">
                            <img src="pictures/'.$chassis.'.jpg" style="width:304px;height:228px;">
                            
                        </div>';
                }
                else
                {
                    echo'
                        <div class="img_div">
                            <img src="pictures/no_image.jpg" style="width:304px;height:228px;">                           
                        </div>';
                }
            echo'   
                <div class="table_div">
                    <table class="table_body">
                        
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
            *           <tr>
                            <td>Price</td>
                            <td>' . $price . '</td>
                        </tr>
                        <tr>
                            <td>Date Of Sale</td>
                            <td>'.$date_of_sale.'</td>
                        </tr>
                        <tr>
                            <td>Owner Name</td>
                            <td>'.$name.'</td>
                        </tr>
                        <tr>
                            <td>Phone No</td>
                            <td>'.$phone.'</td>
                        </tr>
                        <tr>
                            <td>District</td>
                            <td>'.$district.'</td>
                        </tr>
                        <tr>
                            <td>Thana</td>
                            <td>'.$thana.'</td>
                        </tr>
                    </table>
                </div>';
        
         
        ?>
        
    </body>
    
</html>
