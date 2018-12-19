<html>

<head>
<title>Home</title>
</head>

<body>
    <form action="index.php" method="POST">
        <input type="email" name = "email"><br>
        <input type="submit" name="sub">
    </form>

</body>
</html>

<?php
if(isset($_POST['sub'])){
    $email = $_POST['email'];
    $url = "http://localhost/api/api.php?email=".$email;
    $result = file_get_contents($url);
    echo $result;
}


?>