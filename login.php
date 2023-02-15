<?php
    
    $conn = require "config.php";
    $mes = "";

    if(!empty($_POST)) {
        $userName = $_POST['username'];
        $passWord = $_POST['pswd'];
        $tsql = $conn->prepare("SELECT * FROM logins WHERE username = '".$userName."' AND passwd = '".$passWord."' ");
        $tsql->execute();
        $count = 0;
        $results =  $tsql->fetchAll(PDO::FETCH_ASSOC);
        if(count($results)>0) {
            $count++;
            if(session_id() === '') {
                session_start();
                $a = $_COOKIE["PHPSESSID"];
                setcookie("NAMEID",$a, time() + 600,"/");
                setcookie("user_name",$userName, time() + 10000,"/");
                header("location: manage.php"); 
            }
        }
        if($count == 0) {
            $mes = "Sai thong tin dang nhap";
        }       
    }
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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
        .container {
            width: 400px !important;
        }
    </style>
</head>
<body class="bg-dark">
    <div class="container mt-5 border rounded  bg-warning">
        <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="POST" class="text-center p-3">
            <h3 class="text-center">LOGIN</h3>
            <div class="form-group">
                <label for="">User Name</label>
                <input type="text" name="username" class="form-control">
            </div>
            <div class="form-group mb-3">
                <label for="">Password</label>
                <input type="password" name="pswd" class="form-control">
            </div>
            <input type="submit" class="btn btn-primary" value="Login" name="login">
            <p class="text-center"><a href="register.php">Register</a> if  you haven't account.</p>
        </form>
        <p class="text-center"><?php  echo $mes  ?></p>
    </div>
</body>
</html>