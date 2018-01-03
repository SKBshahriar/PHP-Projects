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
            <h2>Profile</h2>
        </div>
        <a class="btn  btn-primary btn-lg" href="UserPanel.php">Back To Home</a>
        <div class="inline2">
            <div class="inner1">
                <?php
                session_start();
           
                $nid=$_SESSION['nid'];
                
                $server = "localhost";
                
                $user = "root";
                $password = "";
                $db_name = "cycle_record_and_management";

                $db = new mysqli($server, $user, $password, $db_name);
                
                
                if(isset($_POST['update']))
                {
                     $temp=$_POST['phone'];
                     $sql="UPDATE user SET phone='$temp' where nid='$nid'";
                     $rs=$db->query($sql);
                }
                if(isset($_POST['update1']))
                {
                     $temp=$_POST['name'];
                     $sql="UPDATE user SET name='$temp' where nid='$nid'";
                     $rs=$db->query($sql);
                }
                if(isset($_POST['update2']))
                {
                     $temp=$_POST['district'];
                     $sql="UPDATE user SET district='$temp' where nid='$nid'";
                     $rs=$db->query($sql);
                }
                if(isset($_POST['update3']))
                {
                     $temp=$_POST['thana'];
                     $sql="UPDATE user SET thana='$temp' where nid='$nid'";
                     $rs=$db->query($sql);
                }
                
                
                $sql = "select * from user where nid='$nid'";

                $result = $db->query($sql);

                $res = $result->fetch_assoc();


               
                
                $name=$res['name'];
                $email=$res['email'];
                $district=$res['district'];
                $thana=$res['thana'];
                $phone=$res['phone'];
                $number_of_cycle=$res['number_of_cycle'];



                
                $filename = "pictures2/$nid.jpg";
                if (file_exists($filename)) {
                    echo'
                        <div class="img_div">
                            <img src="pictures2/'.$nid.'.jpg" style="width:304px;height:228px;">
                            <form enctype="multipart/form-data" method="POST" action="uploadImg2.php">
                                <input type="file" name="photo">
                                <input type="submit" name="submit" value="Upload Photo">
                            </form>
                        </div>';
                } else {
                    echo'
                        <div class="img_div">
                            <img src="pictures2/no_image.jpg" style="width:304px;height:228px;">
                            <form enctype="multipart/form-data" method="POST" action="uploadImg2.php">
                                <input type="file" name="photo">
                                <input type="submit" name="submit" value="Upload Photo">
                            </form>
                        </div>';
                }
                echo'   
                <div class="table_div">
                    <table class="table_body">
                        
                        <tr>
                            <td>Name</td>
                            <td>' . $name . '</td>
                        </tr>
                        <tr>
                            <td>NID</td>
                            <td>' . $nid . '</td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>' . $email . '</td>
                        </tr>
            *           <tr>
                            <td>Phone</td>
                            <td>' . $phone . '</td>
                        </tr>
                        <tr>
                            <td>District</td>
                            <td>' . $district . '</td>
                        </tr>
                        <tr>
                            <td>Thana</td>
                            <td>' . $thana . '</td>
                        </tr>
                    </table>
                </div>';
                ?>
            </div>
            <div class="inner2">
               <?php
               

               $nid=$_SESSION['nid'];

                $server = "localhost";
                $user = "root";
                $password = "";
                $db_name = "cycle_record_and_management";

                $db = new mysqli($server, $user, $password, $db_name);

                $sql = "select * from user where nid='$nid'";

                $result = $db->query($sql);

                $res = $result->fetch_assoc();


                $name=$res['name'];
                $email=$res['email'];
                $district=$res['district'];
                $thana=$res['thana'];
                $phone=$res['phone'];
                $number_of_cycle=$res['number_of_cycle'];
                
                echo '
                        
                        <div class="inner2_2">
                            <p5>Update Your Profile<p5>
                            <form action="new.php" method="POST">
                                <input type="text" class="form-control" name="phone">
                                <input type="submit" class="btn  btn-primary btn-lg info_button2" value="Update Phone Number" name="update">
                            </form>
                            <form action="new.php" method="POST">
                                <input type="text" class="form-control" name="name">
                                <input type="submit" class="btn  btn-primary btn-lg info_button2" value="Update Name" name="update1">
                            </form>
                            <form action="new.php" method="POST">
                                <input type="text" class="form-control" name="district">
                                <input type="submit" class="btn  btn-primary btn-lg info_button2" value="Update District" name="update2">
                            </form>
                             <form action="new.php" method="POST">
                                <input type="text" class="form-control" name="thana">
                                <input type="submit" class="btn  btn-primary btn-lg info_button2" value="Update Thana" name="update3">
                            </form>
                        </div>';
                
               ?>
                
            </div>
        </div>
    </body>

</html>
