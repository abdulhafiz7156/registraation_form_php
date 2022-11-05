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
        $id = $_POST['id'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $sql = "INSERT users (id, username, email, password) VALUES ('$id','$username','$email','$password')";

        if ($conn->query($sql)) {
            echo "New record created successfully";
            header("Location: ".$_SERVER['REQUEST_URI']);
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    };


     ?>

        <div class="container">
            <form class="form-signin"  method="POST">
                <h2>Form Registration</h2>
                <?php if(isset($smsg)){?> <div class="alert alert-success" role="alert"> <?php echo $smsg; ?> </div><?php } ?>
                <?php if(isset($fsmsg)){?> <div class="alert alert-danger" role="alert"> <?php echo $fsmsg; ?> </div><?php } ?>

                <input type="number" name="id" class="form-control " placeholder="Id" required />
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