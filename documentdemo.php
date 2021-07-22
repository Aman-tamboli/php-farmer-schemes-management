<?php 
  // require 'dbconfi/config.php'; 
?>
<!DOCTYPE html>
<html>
<head>
<title>Document Page</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body style="background-color:#b2bec3">

     <div id="document">
         <center>
		   <h2>Document Form</h2>
		   
		   </center>

      
    <form class="myform" action="register.php" method="post">
	     <label><b><center>Aadhar Card Number:</label><br></center>
		 <center><input type="text" class="inputvalues" placeholder="Type Aadhar Card Number" required/><br></center>
		 
		 <label><b><center>Ration Card Number:</label><br></center>
		 <center><input type="password" class="inputvalues" placeholder="Type Ration Card Number" required/><br></center>
		 
		 <label><b><center>Pan Card Number:</label><br></center>
		 <center><input class="inputvalues" placeholder="Type Pan Card Number" required/><br></center>

         <label><b><center>Mobile Number As per Adhar card:</label><br></center>
		 <center><input class="inputvalues" placeholder="Type Mobile Number" required/><br></center>

         <label><b><center>Total Income:</label><br></center>
		 <center><input class="inputvalues" placeholder="Type total income" required/><br></center>

		 <label><b><center>Domicile certificate number:</label><br></center>
		 <center><input class="inputvalues" placeholder="Type Domicile number" required/><br></center>

		 <label><b><center>Country:</label><br></center>
		 <center><input class="inputvalues" placeholder="Type country name" required/><br></center>

		 <label><b><center>7/12 Certificate Number:</label><br></center>
		 <center><input class="inputvalues" placeholder="Type 7/12 certificate number" required/><br></center>

		 <label><b><center>Any education certificate if applicable:</label><br></center>
		 <center><input class="inputvalues" placeholder="Type education certificate" required/><br></center>

		 <label><b><center>Total Family Member:</label><br></center>
		 <center><input class="inputvalues" placeholder="Type family member" required/><br></center>

		 <label><b><center>Farming Type:</label><br></center>
		 <center><input class="inputvalues" placeholder="Type farming type" required/><br></center>
		 
		 
		 <center><a href="profile.php"> <input type="button" id="back_btn" value="back"/></center>
		 <center><a href="bank.php"> <input type="button" id="save_btn" value="save"/></center>
		 </form>
		 <?php
		      if(isset($_post['submit_btn']))
			  {
				  echo'<script type="text/javascript"> alert("sign up botton clicked") </script>';
				  $username = $_POST['username'];
				  $password = $_POST['password'];
				  $cpassword = $_POST['cpassword'];
				  
				  if($password==$cpassword)
				  {
					 $query= "select * from user where username='$username'";
					 $query_run= mysqli_query($con,$query);
					 
					 if(mysqli_num_rows($query_run)>0)
					 {
						 echo'<script type="text/javascript"> alert("user already exists...try another username") </script>';
					 }
					 else
					 {
						 $query="insert into user values('$username','$password')";
						 $query_run=mysqli_query($con,$query);
						 
						 if($query_run)
						 {
							 echo'<script type="text/javascript"> alert("User registered....Go to login page") </script>';
						 }
						 else
						 {
							 echo'<script type="text/javascript"> alert("Error") </script>';
						 }
					 }
				  }
				  else{
					  echo'<script type="text/javascript"> alert("password and confirm password does not match!") </script>';
				  }
			  }
			  ?>
		 </div>
</body>
</html>
