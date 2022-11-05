
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
    session_start();
    $hostName = "localhost";
    $userName = "root";
    $password = "root";
    $dbName = "form-registration";
    $conn = new mysqli($hostName,$userName,$password,$dbName);


    if(isset($_POST['username']) && isset($_POST['password'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $sql = "select * from users where username='".$username."' AND password='".$password."' limit 1";

        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            if($row['username'] === $username && $row['password'] === $password) {
                echo "ottin bolam";
                echo "Hello $username";
            } else {
                header("Location: index.php");
            }
        } else {
            header("Location: idwndex.php?error+=Incorect User or password");
            exit();
        }

    } else {
            $error = "Your Login Name or Password is invalid";
        }

?>

<div class="container">
    <form class="form-signin"  method="POST">
        <h2>Login</h2>
        <?php if(isset($smsg)){?> <div class="alert alert-success" role="alert"> <?php echo $smsg; ?> </div><?php } ?>
        <?php if(isset($fsmsg)){?> <div class="alert alert-danger" role="alert"> <?php echo $fsmsg; ?> </div><?php } ?>

        <input type="text" name="username" class="form-control" placeholder="Username" required />
        <input type="password" name="password" class="form-control " placeholder="Password" required />
        <button class="btn btn-lg btn-primary btn-block" type="submit" name="sub" value="Button1">Login</button>
        <a href="index.php">Register</a>
    </form>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>