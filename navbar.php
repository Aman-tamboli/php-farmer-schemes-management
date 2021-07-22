<?php
$loggedin=false;
session_start();
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
    $loggedin=true;
}
echo '<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto mb-2 mb-lg-0">';
                   
                
     if($loggedin){          
             echo   '<li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="profile.php">profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="document.php">document</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="bank.php">bank</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="scheme.php">scheme</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="user_info.php">scheme</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Logout</a>
                    </li>';
                }        
                

                if(!$loggedin){
            echo        '<li class="nav-item">
                        <a class="nav-link" href="login.php">Login</a>
                    </li>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="signup.php">Sign up</a>
                    </li>';
                  
                }
               
        echo            '</ul>
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>';


    ?>