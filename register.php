<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Document</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>

    <?php
            $hostName = "localhost";
            $userName = "root";
            $password = "root";
            $dbName = "form-registration";
            $conn = new mysqli($hostName,$userName,$password,$dbName);


//    $sql = "SELECT id, username, email, password FROM users";
//
//    $result = mysqli_query($conn, $sql);

    if(isset($_POST['sub'])) {

        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $sql = "INSERT user ( username, email, password) VALUES ('$username','$email','$password')";

        if ($conn->query($sql)) {
            echo "New record created successfully";
            header("Location: main.php");
        } else {
            echo "This password or username is used";
        }
    };


     ?>

        <div class="container">
            <form class="form-signin"  method="POST">
                <h2>Form Registration</h2>
                <input type="text" name="username" class="form-control" placeholder="Username" required />
                <input type="email" name="email" class="form-control " placeholder="email" required />
                <input type="password" name="password" class="form-control " placeholder="Password" required />
                <button class="btn btn-lg btn-primary btn-block" type="submit" name="sub" value="Button1">Register</button>
                <a href="login.php">Login</a>
            </form>
        </div>


       <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </body>
    </html>