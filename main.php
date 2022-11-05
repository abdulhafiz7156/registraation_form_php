<?php
    echo "This is main page";

            $hostName = "localhost";
            $userName = "root";
            $password = "root";
            $dbName = "form-registration";
            $conn = new mysqli($hostName, $userName, $password, $dbName);

 ?>


<div>
    <a href="register.php">Register</a>
    <a href="login.php">Login</a>

</div>
