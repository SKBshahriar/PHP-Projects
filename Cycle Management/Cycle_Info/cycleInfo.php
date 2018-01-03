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
        <div class="Heading">
            <h2>Cycle Details</h2>
        </div>
        <a class="btn  btn-primary btn-lg" href="myCycles.php">Back</a>
        <div class="inline2">
            <div class="inner1">
                <?php
                
                session_start();
                
                if(isset($_POST['details']))
                {
                    $chassis = $_POST['chassis'];
                    $_SESSION['chassis'] = $chassis;
                     
                }
                else
                {
                   $chassis= $_SESSION['chassis'];
                }
                $server = "localhost";
                $user = "root";
                $password = "";
                $db_name = "cycle_record_and_management";

                $db = new mysqli($server, $user, $password, $db_name);
                
                
                if(isset($_POST['update']))
                {
                     $temp=$_POST['price'];
                     $sql="UPDATE cycle_info SET price='$temp' where chassis_number='$chassis'";
                     $rs=$db->query($sql);
                }
                
                if (isset($_POST['sell'])) {
                    $sql = "select * from cycle_info where chassis_number='$chassis'";

                    $result = $db->query($sql);

                    $res = $result->fetch_assoc();
                    
                    $sale=$res['for_sale'];
                    
                    if($sale=='0')
                    {
                        $sql="UPDATE cycle_info SET for_sale='1' where chassis_number='$chassis'";
                        $rs=$db->query($sql);
                    }
                    else
                    {
                        $sql="UPDATE cycle_info SET for_sale='0' where chassis_number='$chassis'";
                        $rs=$db->query($sql);
                    }
                }
                $sql = "select * from cycle_info where chassis_number='$chassis'";

                $result = $db->query($sql);

                $res = $result->fetch_assoc();


                $chassis = $res["chassis_number"];
                $brand = $res["brand_name"];
                $model = $res["model_number"];
                $price = $res['price'];
                $date_of_sale = $res['date_of_sale'];
                $for_sale = $res['for_sale'];



                
                $filename = "pictures/$chassis.jpg";
                if (file_exists($filename)) {
                    echo'
                        <div class="img_div">
                            <img src="pictures/' . $chassis . '.jpg" style="width:304px;height:228px;">
                            <form enctype="multipart/form-data" method="POST" action="uploadImg.php">
                                <input type="file" name="photo">
                                <input type="submit" name="submit" value="Upload Photo">
                            </form>
                        </div>';
                } else {
                    echo'
                        <div class="img_div">
                            <img src="pictures/no_image.jpg" style="width:304px;height:228px;">
                            <form enctype="multipart/form-data" method="POST" action="uploadImg.php">
                                <input type="file" name="photo">
                                <input type="submit" name="submit" value="Upload Photo">
                            </form>
                        </div>';
                }
                echo'   
                <div class="table_div">
                    <table class="table_body">
                        
                        <tr>
                            <td>Chassis Number</td>
                            <td>' . $chassis . '</td>
                        </tr>
                        <tr>
                            <td>Brand</td>
                            <td>' . $brand . '</td>
                        </tr>
                        <tr>
                            <td>Model</td>
                            <td>' . $model . '</td>
                        </tr>
            *           <tr>
                            <td>Price</td>
                            <td>' . $price . '</td>
                        </tr>
                        <tr>
                            <td>Date Of Sale</td>
                            <td>' . $date_of_sale . '</td>
                        </tr>
                    </table>
                </div>';
                
                ?>
            </div>
            <div class="inner2">
               <?php
               

                if(isset($_POST['details']))
                {
                    $chassis = $_POST['chassis'];
                    $_SESSION['chassis'] = $chassis;
                     
                }
                else
                {
                  $chassis= $_SESSION['chassis'];
                }

                $server = "localhost";
                $user = "root";
                $password = "";
                $db_name = "cycle_record_and_management";

                $db = new mysqli($server, $user, $password, $db_name);

                $sql = "select * from cycle_info where chassis_number='$chassis'";

                $result = $db->query($sql);

                $res = $result->fetch_assoc();

                    
                $chassis = $res["chassis_number"];
                $brand = $res["brand_name"];
                $model = $res["model_number"];
                $price = $res['price'];
                $date_of_sale = $res['date_of_sale'];
                $for_sale = $res['for_sale'];
                
                if($for_sale=='0')
                {
                    echo '
                        <form action="cycleInfo.php" method="POST" class="temp">
                            <label for="sale">For Sale:</label>
                            <input type="submit" class="btn  btn-danger btn-lg on_off_button" value="ON" id="sale" name="sell">
                        </form>
                        <div class="inner2_1">                          
                            <form action="cycleInfo.php" method="POST">
                                <input type="text" class="form-control" name="price">
                                <input type="hidden" name = "chassis" value='.$chassis.'>
                                <input type="submit" class="btn  btn-primary btn-lg info_button" value="Update Price" name="update">
                            </form>
                            <a class="btn  btn-primary info_button" href="ownerChange.php">Change OwnerShip</a>
                        </div>';
                }
                else
                {
                    echo '
                        <form action="cycleInfo.php" method="POST" class="temp">
                            <label for="sale">For Sale:</label>
                            <input type="submit" class="btn  btn-success btn-lg on_off_button" value="OFF" id="sale" name="sell">
                        </form>
                        <div class="inner2_1">
                            
                            <form action="cycleInfo.php" method="POST">
                                <input type="text" class="form-control" name="price">
                                <input type="hidden" name = "chassis" value='.$chassis.'>
                                <input type="submit" class="btn  btn-primary btn-lg info_button" value="Update Price" name="update">
                            </form>
                            <a class="btn  btn-primary info_button" href="ownerChange.php">Change OwnerShip</a>
                        </div>';
                }
                 
               ?>
                
            </div>
        </div>
    </body>

</html>
