<?php
include('connect.php');
 
        if($_SERVER["REQUEST_METHOD"]=="POST")
        {
              $xfname= mysqli_real_escape_string($db,$_POST['fname']);
              $xmname= mysqli_real_escape_string($db,$_POST['mname']);
              $xlname= mysqli_real_escape_string($db,$_POST['lname']);
              $xage= mysqli_real_escape_string($db,$_POST['age']);
              $xemail= mysqli_real_escape_string($db,$_POST['email']);
              $xgender= mysqli_real_escape_string($db,$_POST['gender']);
              $xpassword= mysqli_real_escape_string($db,$_POST['password']);
              $xcpassword= mysqli_real_escape_string($db,$_POST['cpassword']);
              $xphno= mysqli_real_escape_string($db,$_POST['phno']);

              if(empty($xfname)|| empty($xlname) || empty($xpassword) || empty($xcpassword) || empty($xemail) )
              {
                  $er="<font color = 'red' size='4'><center><u> You did not fill out the required fields.</u></center></font>";
              }
              else 
                {


                    $sql = "SELECT email FROM main WHERE email='$xemail'";
                    $result = mysqli_query($db,$sql);
                    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
					
                    if(mysqli_num_rows($result) == 1)
                    {
                        $er= "<font size='5' color = black><center> Sorry.. This email id already exist.!!</center></font>";
                    }
                    else if ($xpassword!=$xcpassword)
                    {
                        $er= "<font size='5' color = black><center> Passwords do not match.!!</center></font>";
                    }

                    else
                    {   
                        //Encryption code
                    	$salt = mcrypt_create_iv(22, MCRYPT_DEV_URANDOM);
   $salt = base64_encode($salt);
   $salt = str_replace('+', '.', $salt);
   $hash = crypt($password, '$2y$10$'.$salt.'$');
  	                        $query = mysqli_query($db,"INSERT INTO main VALUES('$xfname','$xmname','$xlname','$xage','$xphno','$xgender','$xemail','$hash')") or die("error".mysqli_error());
                        if($query)
                        {
                            require 'send-email.php';
                            require 'getemail.php';
                        }
{                           

                         $ec="<font size='5' color = black><center> Thank You! you are now registered.!!</center></font>
                         <font size='5' color = black><center> Go to Home Page to Sign In!<a href='Home.php'>Home</a></center></font>";
}
                    }
                }
        }
        
?>
<html>
    <head>
      <link  rel="icon" href="MediIcon.png">
      <link rel="stylesheet" href="bootstrap-3.3.6-dist/css/bootstrap.min.css">
    
     <link rel="stylesheet" href="style.css">
      <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="bootstrap.min.js"></script>
  <style type="text/css">
  .container{
	background-color: #e6f9ff;
	
}span{
  color:red;

 }
 table{
 width: 100%;
 }
 
 label{
 font-size: 15;
 font-family: serif;
 
 }
 
  </style>
    </head>
    <body>
 
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="Home.php">MediFind</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="#">Sign Up</a></li>
      <li><a href="AboutUs.php">About Us</a></li>
      <li><a href="StoreSearch.php">Search Stores</a></li>
      <li><a href="MedicineSearch.php">Search Medicines</a></li>
      <li><a href="DrugSearch.php">Search Drugs</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
	      <li><a href="signin.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
    </ul>
  </div>
</nav>
   <div class="row">
<div class="page-header "><img src="MediFind.png"><font size=60>MediFind</font></div>
<div class="panel-body">Your GateWay To World Of Quick Medicine Search!</div>
</div>


    <span><?php echo $er;?></span>
    <br><br>
    <div class="container">
            <form method="POST" action="signup.php" role="form" class="sform" >
            <fieldset>
            <br>
            
		        <div class="form-group">
		            <label for="fname"> <font color="red">*</font>First Name:</label><br>
		            <input type="text" class="form-group" placeholder="Enter Your First Name" name="fname">
		        </div>
		        <div class="form-group">
		            <label for="mname">Middle Name:</label><br>
		            <input type="text" class="form-group" placeholder="Enter Your Middle Name" name="mname">
		          </div>
		       <div class="form-group">
		            <label for="mname"> <font color="red">*</font>Last Name</label><br> 
		            <input class="form-group" placeholder="Enter Your Last Name" type="text" name="lname"><br>
		       </div>
		       <div class="form-group">     
		            <label for="age"> <font color="red">*</font>Age</label><br>
		            <input type="number" name="age" maxlength="3" class="form-group" placeholder="Enter age"><br>
		       </div>
		        <div class="form-group">
		        <label for="mname"> <font color="red">*</font>Phone Number</label><br> <input class="form-group" placeholder="Enter Your Phone no" type="number" name="phno" maxlength="10"></div>
		        <div class="radiobutton">
		            <label for="gender"> <font color="red">*</font>Gender</label><br>
		            <table cellspacing=5><tr>
		            <td><input type="radio" class="radiobutton" name="gender" value="Male" checked> Male</td>
		            <td><input type="radio" class="radiobutton" name="gender" value="Female"> Female<br></td></tr></table></div><br>
		        <div class="form-group">    
		            <label for="email"> <font color="red">*</font>Email ID</label><br> <input class="form-group" placeholder="Enter Your email" type="email" name="email"></div>
		        <div class="form-group">    
		        <label for="pass"> <font color="red">*</font>Password</label><br> <input  class="form-group" placeholder="Enter Your passowrd" type="password" name="password">
		         </div>
		         <div class="form-group">
		            <label for="cpass"> <font color="red">*</font>Confirm Password</label><br> <input class="form-group" placeholder="Enter Your Confirm Passowrd" type="password" name="cpassword"><br>
		            <input type="submit" name="submit" value="Submit">
		            </div>
		         </fieldset>
        </form> 
       </div>
    </body>
</html>