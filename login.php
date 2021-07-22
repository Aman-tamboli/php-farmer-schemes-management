<?php
$login = false;
$showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include 'dbconnect.php';
    $username = $_POST["username"];
    $password = $_POST["password"]; 
   $sql = "Select * from login where username='$username'";
    $result = pg_query($con, $sql);
    $num = pg_num_rows($result);
     echo var_dump($num);  
       if ($num == 1){
        while($row=pg_fetch_array($result)){
         
            if(password_verify($password,$row['password'])){
                $login = true;
                session_start();
                echo "done";
                $_SESSION['loggedin'] = true;
                $_SESSION['username'] = $username;
                header("location: home.php");
            }
        }
    } 
    else{
        $showError = "Invalid Credentials";
    }
}

    ?>





<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- latest compiled and minified CSS -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css">
    <!-- jquery library -->
    <script type="text/javascript" src="bootstrap/js/jquery-3.2.1.min.js"></script>
    <!-- Latest compiled and minified javascript -->
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- External CSS -->
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <title>Document</title>
    <style>

    </style>
</head>

<body>
    <?php
    if($login){
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Success</strong> You are logged in!
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
    }
    if($showError){
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Password do not match</strong> '. $showError.'
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
    }
    ?>
    <center>
        <div class="logincontainer container">
            <main class="form-signin container">
                <form action="/fams/login.php" method="post">
                    <img class="mb-4" src="/docs/5.0/assets/brand/bootstrap-logo.svg" alt="" width="72" height="57">
                    <h1 class="h3 mb-3 fw-normal">Please sign in</h1>
                    <label for="inputEmail" class="visually-hidden">Email address</label>
                    <input type="text" name="username" id="inputEmail" class="form-control" placeholder="Email address"
                        required="" autofocus="">
                    <label for="inputPassword" class="visually-hidden">Password</label>
                    <input type="password" name="password" id="inputPassword" class="form-control"
                        placeholder="Password" required="">
                    <div class="checkbox mb-3">
                        <label>
                            <input type="checkbox" value="remember-me"> Remember me
                        </label>
                    </div>
                    <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
                    <p class="mt-5 mb-3 text-muted">© 2021</p>
                </form>
            </main>
        </div>
    </center>
  
  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>