<?php
session_start();
$showAlert = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include 'dbconnect.php';
        $bname=$_POST["bname"];
        $back_acno=$_POST["bank_acno"];
        $ac_holder_name=$_POST["ac_holder_name"];
        $ifs_code=$_POST["ifs_code"];
        $branch_name=$_POST["branch_name"];
        $username=$_SESSION['username'];
        
        //write sql insert query 
        $sql = "insert into bank values('$bname',$back_acno,'$ac_holder_name',$ifs_code,'$branch_name','$username');";
        $result = pg_query($con, $sql);
        if($result){
            // echo "success";
            header("location: /fams/home.php");
        
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

    <title>Bank</title>
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
                <center>Bank Details Form</h1></b></center><br>
        <form class="row g-3" method="POST" action="/fams/bank.php">



            <div class="col-md-6">
                <label for="inputbankName" class="form-label"><b>Bank Name/बँकेचे नाव</b></label>
                <input type="text" name="bname" class="form-control" id="inputbankName" placeholder="Type Bank Name">
            </div>
            <div class="col-md-6">
                <label for="inputacno" class="form-label"><b>Bank Account Number/बँक खाते क्रमांक</b></label>
                <input type="Number" name="bank_acno" class="form-control" id="inputacno"
                    placeholder="Type Account Number">
            </div>
            <div class="col-md-12">
                <label for="inputname" class="form-label"><b>Name of Account Holder As per passbook/पासबुक नुसार खाते
                        धारकाचे नाव</b></label>
                <input type="text" name="ac_holder_name" class="form-control" id="inputname"
                    placeholder="Type Account Holder Name">
            </div>
            <div class="col-md-6">
                <label for="inputifscode" class="form-label"><b>Bank IFS Code/बँक आयएफएस कोड</b></label>
                <input type="text" name="ifs_code" class="form-control" id="inputifscode"
                    placeholder="Type Bank IFS code">
            </div>
            <div class="col-md-6">
                <label for="inputbranch" class="form-label"><b>Branch Name/शाखेचे नाव</b></label>
                <input type="text" name="branch_name" class="form-control" id="inputbranch"
                    placeholder="Type Branch Name">
            </div>
            <div class="col-12">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="gridCheck">
                    <label class="form-check-label" for="gridCheck">
                        Confirm to save - जतन करण्याची पुष्टी करा
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