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
            <h2>BuY Cycle</h2>
        </div>
        <a class="btn  btn-primary btn-lg" href="UserPanel.php">Back TO Home</a>
        <div class="select_div">
            
            <form action="buyCycle.php" method="POST">
                <label for="price1">Lower Limit:</label>
                <select class="selectpicker" id="price1" name="price1" style="width: 20%;height:30px;">
                    <?php
                    for ($i = 1000; $i < 100000; $i = $i + 1000) {
                        echo '<option>' . $i . '</option>';
                    }
                    ?>
                </select>
                <label for="price2">Higher Limit:</label>
                <select class="selectpicker" id="price2" name="price2" style="width: 20%;height:30px;">
                    <?php
                    for ($i = 100000; $i >=1000; $i = $i - 1000) {
                        echo '<option>' . $i . '</option>';
                    }
                    ?>
                </select>
                <label for="dis">District:</label>
                <select class="selectpicker" name="district" id="dis"style="width: 20%;height:30px;">
                    <?php
                    $server = "localhost";
                    $user = "root";
                    $password = "";
                    $db_name = "cycle_record_and_management";

                    $db = new mysqli($server, $user, $password, $db_name);

                    $sql = "SELECT DISTINCT district FROM cycle_owner NATURAL JOIN user ";

                    $result = $db->query($sql);

                    $res = $result->fetch_assoc();

                    while ($res) {
                        $district = $res['district'];
                        echo '<option>' . $district . '</option>';
                        $res = $result->fetch_assoc();
                    }
                    
                    ?>
                </select>
                <input type="submit" class=" btn btn-sm btn-warning" value="serach" name="buy">
            </form>
        </div>
         
        <?php
        if(isset($_POST['buy']))
        {
            $price1=$_POST['price1'];
            $price2=$_POST['price2'];
            $district=$_POST['district'];
            
            $server = "localhost";
            $user = "root";
            $password = "";
            $db_name = "cycle_record_and_management";
            $db = new mysqli($server, $user, $password, $db_name);
            
            $sql = "select * from cycle_info natural join cycle_owner natural join user where price>='$price1' and price<='$price2' and district='$district' and for_sale='1'";

            $result = $db->query($sql);

            $res = $result->fetch_assoc();
            
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
                                <form action="cycleInfo2.php" method="POST" class="a">
                                    <input type="submit" class="btn btn-primary btn-sm dtlbutton" value="view details">
                                    <input type="hidden" name = "chassis" value='.$chassis.'>
                                </form>
                            </p>
                            <p>Mode:  '.$model.'</p>
                            <p>Price:  '.$price.'</p>
                            
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
                                <form action="cycleInfo2.php" method="POST" class="a">
                                    <input type="submit" class="btn btn-primary btn-sm dtlbutton" value="view details">
                                    <input type="hidden" name = "chassis" value='.$chassis.'>
                                </form>
                            </p>
                            <p>Mode:  '.$model.'</p>
                            <p>Price:  '.$price.'</p>
                            
                        </div>
                        
                    </div>
                    
                    ';
                }
                $res=$result->fetch_assoc();
            }
            
        }
         
        ?>
    </body>
</html>
