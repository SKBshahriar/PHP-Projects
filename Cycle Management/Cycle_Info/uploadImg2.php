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
        $nid = $_SESSION['nid'];
        $filename = "pictures2/$nid.jpg";
        if (file_exists($filename)) {
            unlink($filename);
        }
        //echo "sakib";
        function uploadPhoto() {
               
            $nid = $_SESSION['nid'];

            $src = $_FILES["photo"]["tmp_name"];
            if (getimagesize($src) === false)
                return false;
            
            $target = "pictures2/$nid.jpg";
            move_uploaded_file($src, $target);
        }

        uploadPhoto();
        header('Location: new.php');
        ?>
    </body>
</html>
