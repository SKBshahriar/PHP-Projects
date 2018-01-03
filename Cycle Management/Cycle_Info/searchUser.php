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
            <h2>Search User</h2>
        </div>
        <a class="btn  btn-primary btn-lg" href="UserPanel.php">Back TO Home</a>
        <div class="search_user">
            <form action="searchUser.php" method="POST">

                <input type="text" class="form-control" id="name" placeholder="User Name" name="name">
                <button type="submit" class="btn btn-primary btn-lg search_button" name="search">Search</button>
            </form>
        </div>
        <?php
        session_start();
        if (isset($_POST['search'])) {
            $name = $_POST['name'];
            $_SESSION['name'] = $name;
            $server = "localhost";
            $user = "root";
            $password = "";
            $db_name = "cycle_record_and_management";

            $db = new mysqli($server, $user, $password, $db_name);

            $sql = "SELECT * FROM `user` WHERE name like '%$name%'";

            $result = $db->query($sql);

            $res = $result->fetch_assoc();

            

            while ($res) {

                $name = $res['name'];
                $district = $res['district'];
                $number_of_cycle = $res['number_of_cycle'];

                $nid = $res['nid'];

                $filename = "pictures2/$nid.jpg";
                if (file_exists($filename)) {
                    echo'
                        
                    <div  id="inline" href="signin.html">
                    <div class ="one">
                        <img src="pictures2/' . $nid . '.jpg" style="width:150px;height:100px;">
                    </div>
                        <div  class="two">
                            <p>Name:  ' . $name . '
                                <form action="userCycle.php" method="POST" class="a">
                                    <input type="submit" class="btn btn-primary btn-sm dtlbutton" value="view cycles" name="details">
                                    <input type="hidden" name = "nid" value=' . $nid . '>
                                </form>
                            </p>
                            <p>District:  ' . $district . '</p>
                            <p>Number OF Cycle:  ' . $number_of_cycle . '</p>
                            
                        </div>
                        
                    </div>
                    
                    ';
                } else {
                    echo'
                        
                    <div  id="inline" href="signin.html">
                    <div class ="one">
                        <img src="pictures2/no_image.jpg" style="width:150px;height:100px;">
                    </div>
                        <div  class="two">
                            <p>Name:  ' . $name . '
                                <form action="userCycle.php" method="POST" class="a">
                                    <input type="submit" class="btn btn-primary btn-sm dtlbutton" value="view cycles" name="details">
                                    <input type="hidden" name = "nid" value=' . $nid . '>
                                </form>
                            </p>
                            <p>District:  ' . $district . '</p>
                            <p>Number OF Cycle:  ' . $number_of_cycle . '</p>
                            
                        </div>
                        
                    </div>
                    
                    ';
                }
                $res = $result->fetch_assoc();
            }
            
        } else {
            //$name = $_SESSION['name'];
        }

         
        ?>
    </body>
</html>
