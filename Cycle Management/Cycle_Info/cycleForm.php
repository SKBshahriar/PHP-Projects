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
        echo '
         <div class="Heading">
            <h2>Add New Cycle</h2>
        </div>
        <div class="form_signin_signup">
            <form action="addCycle.php" method="POST">
                <label for="brand">Brand:</label>
                <input type="text" class="form-control" id="brand" placeholder="Brand" name="brand_name">
                <label for="chassis">Chassis Number:</label>
                <input type="text" class="form-control" id="chassis" placeholder="Chassis Number" name="chassis_number">
                <label for="model">Model Number:</label>
                <input type="text" class="form-control" id="model" placeholder="Model Number" name="model_number">
                <label for="price">Price:</label>
                <input type="text" class="form-control" id="price" placeholder="Price" name="price">
                <label for="date">Date Of Buy:</label>
                <input type="text" class="form-control" id="date" placeholder="Date Of Buy" name="date_of_buy">
                <button type="submit" class="btn btn-primary btn-lg login" name="buttonSignUp" >Add</button>
                
            </form>
        </div>';
        ?>
         
    </body>
</html>
