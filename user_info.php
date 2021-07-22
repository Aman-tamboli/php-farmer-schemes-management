<?php
session_start();
$username = $_SESSION['username'];
include 'dbconnect.php';

function profile($username){
$sql = "Select * from profile where username='$username'";
$result = pg_query($con, $sql);
$num = pg_num_rows($result);
if ($num == 1){
   
    while($row=pg_fetch_array($result)){
        $_SESSION["fname"]= $row["fname"];
        $_SESSION['mname']= $row['mname'];
        $_SESSION['lname']= $row['lname'];
        $_SESSION['mnumber']= $row['mnumber'];
        $_SESSION['email']= $row['email'];
        $_SESSION['address']= $row['address'];
        $_SESSION['adhar']= $row['adhar'];
        $_SESSION['ftype']= $row['ftype'];
        // $_SESSION['']= $row[''];
       
       
    }
}
}

function scheme($username){
    include 'dbconnect.php';
$sql = "Select * from schemes where username='$username'";
$result = pg_query($con, $sql);
$num = pg_num_rows($result);
if ($num == 1){
       while($row=pg_fetch_array($result)){
        $_SESSION["scheme_name"]= $row["scheme_name"];
        $_SESSION['dept']= $row['dept'];
        }
}

}
 scheme($username);

?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <title>Info</title>
    <style>
        .container {}

        .title1 {
            font-size: 35px;
            font-weight: bolder;
        }
    </style>
</head>

<body>
    <Div class="p-3 border bg-light container">
        <div class="box">
            <center class="title1">User Info</center>
            <?php echo  '       <b> Name: </b>' . $_SESSION["fname"].' '.$_SESSION["mname"].' '.$_SESSION["lname"].'
        <br> <b> Email: </b>  '  .$_SESSION['email'].'
         <br> <b> Mobile: </b>'  .$_SESSION['mnumber'].'
         <br> <b> Address: </b>'  .$_SESSION['address'].'
         <br> <b> Adhar No: </b>'  .$_SESSION['adhar'].'
         <br> <b> Farming Type: </b>'  .$_SESSION['ftype'].'

      </div>
    </Div>';
    ?>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col"></th>
                        <th scope="col">Applied Scheme Name</th>
                        <th scope="col">Department</th>
                        <th scope="col">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td><?php  echo $_SESSION["scheme_name"]; ?></td>
                        <td><?php  echo $_SESSION["dept"]; ?></td>
                        <td>Pending</td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td></td>
                        <td></td>

                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td ></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
            <!-- Optional JavaScript; choose one of the two! -->

            <!-- Option 1: Bootstrap Bundle with Popper -->
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"
                crossorigin="anonymous">
                </script>

            <!-- Option 2: Separate Popper and Bootstrap JS -->
            <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    -->
</body>

</html>