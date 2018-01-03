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
    </head>
    <body>
        <?php
        session_start();
        $chassis = $_SESSION['chassis'];
        $filename = "pictures/$chassis.jpg";
        if (file_exists($filename)) {
            unlink($filename);
        }
        //echo "sakib";
        function uploadPhoto() {
               
            $chassis = $_SESSION['chassis'];

            $src = $_FILES["photo"]["tmp_name"];
            if (getimagesize($src) === false)
                return false;
            
            $target = "pictures/$chassis.jpg";
            move_uploaded_file($src, $target);
        }

        uploadPhoto();
        header('Location: cycleInfo.php');
       
        ?>
    </body>
</html>
