<?php
    $conn = require "config.php";
    $mes = "";
    if(isset($_POST["register"])) {
        $userName = $_POST["username"];
        $pass = $_POST["pswd"];
        $repass = $_POST["repswd"];
        if($userName!=null && $pass!=null && $repass!=null) {
            if($pass == $repass) {
                
            }
            $tsql = $conn->prepare("SELECT username FROM logins"); 
            $tsql->execute();
            $results = $tsql->fetchAll(PDO::FETCH_ASSOC);
            foreach($results as $un) {
                if($userName == $un) {
                    $GLOBALS["mes"] = "Tai khoan da ton tai";
                }
            }
        } else {
            $GLOBALS["mes"] = "Vui long nhap day du thong tin";
        }

    }



?>











<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        .form-group {
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        input[type = "text"],input[type="password"] {
            margin-left: calc(50% - 100px);
            width: 200px !important;
        }
    </style>
</head>
<body class="bg-dark">
    <div class="container mt-5 border rounded w-25  bg-warning">
        <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="POST" class="text-center p-3">
            <h3 class="text-center">REGISTER</h3>
            <div class="form-group">
                <label for="">Phone number Or Email</label>
                <input type="text" name="username" class="form-control">
            </div>
            <div class="form-group mb-3">
                <label for="">Password</label>
                <input type="password" name="pswd" class="form-control">
            </div>
            <div class="form-group mb-3">
                <label for="">Repassword</label>
                <input type="password" name="repswd" class="form-control">
            </div>
            <input type="submit" class="btn btn-primary" value="register" name="register">
            <p class="text-center"><a href="login.php">Login</a> if  you have account.</p>
        </form>
        <p class="text-center"><?php  echo $mes  ?></p>
    </div>
</body>
</html>