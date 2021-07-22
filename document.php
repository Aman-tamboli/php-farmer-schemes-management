<?php
session_start();
$showAlert = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include 'dbconnect.php';
        $rationno=$_POST["ration_no"];
        $income=$_POST["income"];
        $issuedatei = date('Y-m-d', strtotime($_POST['issue_datei']));
        $domicileno=$_POST["domicile_no"];
        $issuedated = date('Y-m-d', strtotime($_POST['issue_dated']));
        $a712_no=$_POST["seven12"];
        $castno=$_POST["cast_no"];
        $educational_certificate=$_POST["educational_certificate"];
        $username=$_SESSION['username'];
        
        //write sql insert query 
        $sql = "insert into document values( $rationno, $income,'$issuedatei',$domicileno,'$issuedated',$a712_no,$castno,'$username');";
        $result = pg_query($con, $sql);
        if($result){
            // echo "success";
            header("location: /fams/scheme.php");
        
        }
        else{
            $showAlert = true;
        }
}

?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <title>Document</title>
    <style>
    form {
        /* color: #999; */
        border-radius: 10px;
        margin-top: 15px;
        margin-bottom: 15px;
        background: #91ffd6;
        box-shadow: 0px 1px 2px 2px rgba(0.3, 0, 0, 0.3);
        padding: 30px;
        border: 2px solid #341f97;
        opacity: 0.799999;
    }

    .box11 {
        /* background: #6dfcc8; */
        margin: auto;
        width: 75vw;
    }

    body {
        background-image: url("https://images.unsplash.com/photo-1495975832350-f46e82f0ceb6?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1050&q=80");

        background-color: aqua;
        /* filter: blur(8px); */
        /* -webkit-filter: blur(8px); */

        /* Full height */
        height: 100%;

        /* Center and scale the image nicely */
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
    }
    </style>
</head>

<body>
    <?php  if($showAlert){
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Information not inserted try after some time</strong> 
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    
    }
    ?>
    <div class="box11">
        <h1><b>
                <center>Document page</h1></b></center><br>
        <form class="row g-3" method="POST" action="/fams/document.php">

            <div class="col-md-12">
                <label for="inputName" class="form-label"><b>Full Name As per Aadhar Card/आधार कार्ड नुसार पूर्ण
                        नाव</b></label>
                <input type="text" name="fullname" class="form-control" id="inputName"
                    placeholder="Type Full Name as per aadhar card">
            </div>
            <div class="col-md-6">
                <label for="inputano" class="form-label"><b>Aadhar card number/आधार कार्ड क्रमांक</b></label>
                <input type="Number" name="aadhar_no" class="form-control" id="inputano"
                    placeholder="Type Aadhar card number">
            </div>
            <div class="col-md-6">
                <label for="inputdob" class="form-label"><b>Date of Birth/जन्म तारीख</b></label>
                <input type="datetime-local" name="DOB" class="form-control" id="inputdob"
                    placeholder="Type Date of birth">
            </div>
            <div class="col-md-6">
                <label for="inputpan" class="form-label"><b>Pan card number/पॅन कार्ड क्रमांक</b></label>
                <input type="text" name="pan_no" class="form-control" id="inputpan" placeholder="Type pan card number">
            </div>
            <div class="col-md-6">
                <label for="inputration" class="form-label"><b>Ration card number/रेशन कार्ड क्रमांक</b></label>
                <input type="number" name="ration_no" class="form-control" id="inputration"
                    placeholder="Type ration card number">
            </div>
            <div class="col-md-6">
                <label for="inputincome" class="form-label"><b>Total Income/एकूण उत्पन्न</b></label>
                <input type="number" name="income" class="form-control" id="inputincome" placeholder="Type income">
            </div>
            <div class="col-6">
                <label for="inputincome" class="form-label"><b>Issue Date/जारी तारीख</b></label>
                <input type="date" name="issue_datei" class="form-control" id="inputAddress" placeholder="Issue date">
            </div>
            <div class="col-6">
                <label for="inputdomicile" class="form-label"><b>Domicile Certificate Number/अधिवास प्रमाणपत्र
                        क्रमांक</b></label>
                <input type="number" name="domicile_no" class="form-control" id="inputdomicile"
                    placeholder="Type domicile certificate number">
            </div>
            <div class="col-md-6">
                <label for="inputdomicile" class="form-label"><b>Issue Date/जारी तारीख</b></label>
                <input type="date" name="issue_dated" class="form-control" id="inputdomicile">
            </div>
            <div class="col-md-6">
                <label for="input7/12" class="form-label"><b>7/12 Certificate Number/7/12 प्रमाणपत्र क्रमांक</b></label>
                <input type="number" name="seven12" class="form-control" id="input7/12"
                    placeholder="Type 7/12 certificate number">
            </div>
            <div class="col-md-6">
                <label for="input7/12" class="form-label"><b>Cast Certificate Number/जात प्रमाणपत्र कमांक</b></label>
                <input type="number" name="cast_no" class="form-control" id="input7/12"
                    placeholder="Type cast certificate number">
            </div>
            <div class="col-md-12">
                <label for="inputother" class="form-label"><b>Any educational Certificate name if applicable/लागू
                        असल्यास कोणतेही शैक्षणिक प्रमाणपत्र नाव</b></label>
                <input type="text" name="educational_certificate" class="form-control" id="inputother">
            </div>


            <div class="col-12">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="gridCheck">
                    <label class="form-check-label" for="gridCheck">
                        Confirm to save
                    </label>
                </div>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
            <div class="col-12">
                <button type="reset" class="btn btn-primary" onclick="goBack()">Back</button>
            </div>
        </form>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
    -->
    <script src="/fams/js/back.js"></script>
</body>

</html>