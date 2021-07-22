<?php
// error_reporting (E_ALL ^ E_NOTICE);
session_start();
$showAlert = false;
// echo "You logged in under name: ".$_SESSION['username'];
if($_SERVER["REQUEST_METHOD"] == "POST" ){
    include 'dbconnect.php';
    
    $username=$_SESSION['username'];
        $fname=$_POST["Fname"];
        $mname=$_POST["Mname"];
        $lname=$_POST["Lname"];
        $mnum=$_POST["Mnumber"];
        $email=$_POST["Email"];
        $DOB = date('Y-m-d', strtotime($_POST['DOB']));
        $gender=$_POST["gender"];
        $address=$_POST["Address"];
        $address2=$_POST["Address2"];
        $city=$_POST["City"];
        $state=$_POST["state"];
        $pincode=$_POST["Pincode"];
        $adharno=$_POST["Adhar"];
        $pan_no=$_POST["Pan"];
        $cast=$_POST["cast"];
        $subcaste=$_POST["SubCast"];
        $tmember=$_POST["Tmember"];
        $ftype=$_POST["Ftype"];
        //write sql insert query 
        $sql = "insert into profile values('$fname','$mname','$lname',$mnum,'$email','$DOB','$gender','$address','$city','$state',$pincode,$adharno,'$pan_no','$cast','$subcaste',$tmember,'$ftype','$username');";
        $result = pg_query($con, $sql);
        if($result){
            // echo "success";
            header("location: /fams/document.php");
        
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

    <!-- <link rel="stylesheet" href="/fams/css/style.css"> -->
    <title>Profile Page</title>
    <style>
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

    form {
        /* color: #999; */
        border-radius: 10px;
        margin-top: 15px;
        margin-bottom: 15px;
        background: #91ffd6;
        box-shadow: 0px 1px 2px 2px rgba(0.3, 0, 0, 0.3);
        padding: 30px;
        border: 2px solid #bdebf2;
        background-image: none;
        opacity: 0.799999;
    }

    .box11 {
        /* background: #6dfcc8; */
        margin: auto;
        width: 75vw;
    }

    /* .cc{
        border: 2px solid #ad476b;
    } */
    </style>

</head>
<!-- style="background-color:#a5b1c2" -->

<body>
  <?php  if($showAlert){
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Information not inserted try after some time</strong> 
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    
    }
    ?>
    <div class="box11">


        <div>
            <h1><b>
                    <center>Profile page</h1>
            </center></b><br>
            <form class="brd row g-3" id="11" method="POST" action="/fams/profile.php">





                <div class="col-md-4">
                    <label for="inputName" class="form-label"><b>First Name/पहिले नाव</b></label>
                    <input type="text" name="Fname" class="form-control" id="inputName" placeholder="Type first Name">
                </div>
                <div class="col-md-4">
                    <label for="inputName" class="form-label"><b>Middle Name/मधले नाव</b></label>
                    <input type="text" name="Mname" class="form-control" id="inputName" placeholder="Type Middle Name">
                </div>
                <div class="col-md-4">
                    <label for="inputName" class="form-label"><b>Last Name/शेवटचे नाव</b></label>
                    <input type="text" name="Lname" class="form-control" id="inputName" placeholder="Type Last Name">
                </div>
                <div class="col-md-4">
                    <label for="inputEmail4" class="form-label"><b>Email/ईमेल</b></label>
                    <input type="email" name="Email" class="form-control" id="inputEmail4">
                </div>
                <div class="col-md-4">
                    <label for="inputMobno" class="form-label"><b>Mobile Number/फोन नंबर</b></label>
                    <input type="number" name="Mnumber" class="form-control" id="inputMobno">
                </div>
                <div class="col-md-4">
                    <label for="inputdob" class="form-label"><b>Date Of Birth/जन्म दिनांक</b></label>
                    <input type="datetime-local" name="DOB" class="form-control" id="inputdob">
                </div>
                <div class="col-md-6">
                    <label for="inputgender" class="form-label"><b>Gender</b></label>
                    <select id="inputgender" name="gender" class="form-select">
                        <option selected>Choose...</option>
                        <option>Male</option>
                        <option>Female</option>
                        <option>TransGender</option>
                    </select>
                </div>
                <div class="col-6">
                    <label for="inputAddress" class="form-label"><b>Address/पत्ता</b></label>
                    <input type="text" name="Address" class="form-control" id="inputAddress" placeholder="1234 Main St">
                </div>
                <div class="col-12">
                    <label for="inputAddress2" class="form-label"><b>Address 2/पत्ता</b></label>
                    <input type="text" name="Address2" class="form-control" id="inputAddress2"
                        placeholder="Apartment, studio, or floor">
                </div>
                <div class="col-md-6">
                    <label for="inputCity" class="form-label"><b>City/शहर</b></label>
                    <input type="text" name="City" class="form-control" id="inputCity">
                </div>
                <div class="col-md-4">
                    <label for="inputState" class="form-label"><b>State/राज्य</b></label>
                    <select id="inputState" name="state" class="form-select">


                        <option value="Andhra pradesh">Andhra pradesh</option>
                        <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                        <option value="">Assam</option>
                        <option value="">Bihar</option>
                        <option value="">Chhattisgarh</option>
                        <option value="">Goa</option>
                        <option value="">Gujarat</option>
                        <option value="">Jammu and Kashmir</option>
                        <option value="">Jharkhand</option>
                        <option value="">West Bengal</option>
                        <option value="">Karnataka</option>
                        <option value="">Kerla</option>
                        <option value="">Madhya Pradesh</option>
                        <option value="Maharashtra">Maharashtra</option>
                        <option value="">Manipur</option>
                        <option value="">Meghalaya</option>
                        <option value="">Mizoram</option>
                        <option value="">Nagaland</option>
                        <option value="">Orissa</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <label for="inputPincode" class="form-label"><b>Pincode/पिन कोड</b></label>
                    <input type="text" name="Pincode" class="form-control" id="inputZip">
                </div>
                <div class="col-md-6">
                    <label for="inputAadhar" class="form-label"><b>Aadhar Number/आधार कार्ड क्रमांक</b></label>
                    <input type="number" name="Adhar" class="form-control" id="inputAadhar">
                </div>
                <div class="col-md-6">
                    <label for="inputPan" class="form-label"><b>Pan card number/पॅन कार्ड क्रमांक</b></label>
                    <input type="number" name="Pan" class="form-control" id="inputPan">
                </div>
                <div class="col-md-4">
                    <label for="inputcast" class="form-label"><b>Cast/जात</b></label>
                    <input type="text" name="cast" class="form-control" id="inputcast">
                </div>
                <div class="col-md-4">
                    <label for="inputsubcast" class="form-label"><b>Subcast/उपजात</b></label>
                    <input type="text" name="SubCast" class="form-control" id="inputsubcast">
                </div>
                <div class="col-md-4">
                    <label for="inputmem" class="form-label"><b>Total Family Member/एकुण कुटुंब सदस्य</b></label>
                    <input type="number" name="Tmember" class="form-control" id="inputmem">
                </div>
                <div class="col-md-6">
                    <label for="inputfarming" class="form-label"><b>Farming Type/शेती प्रकार</b></label>
                    <input type="text" name="Ftype" class="form-control" id="inputfarming">
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
                    <button type="submit" value="submit" class="btn btn-primary">Save</button>
                </div>
                <div class="col-12">
                    <button type="reset" class="btn btn-primary" onclick="goBack()">Back</button>
                </div>
            </form>
        </div>
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
    <script src="js/back.js"></script>

</body>

</html>