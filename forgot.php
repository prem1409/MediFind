<html>
<head>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
   <link rel="stylesheet" href="style.css">
      <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="bootstrap.min.js"></script>
  
<style type="text/css">
 body {

 font-size:14px;
 alignent:center;
 }
 span{
  color:red;

 }		
 .contact {
    text-align:left;
  /*  background: none repeat scroll 0% 0% #8FBF73;*/
    padding: 20px 10px;
    box-shadow: 1px 2px 1px #8FBF73;
    border-radius: 10px;
    width:100%;
 
 }

#er {
    color: #F00;
    text-align: center;
    margin: 10px 0px;
    font-size: 17px;
}
</style>
</head>
<body	>
<?php
 error_reporting('E_ALL ^ E_NOTICE');
 if(isset($_POST['submit']))
 {
  mysql_connect('localhost','root','KNOWledge') or die(mysql_error());
  mysql_select_db('MediFind') or die(mysql_error());
  $name=$_POST['email'];
  $password=$_POST['password'];
  $mail=$_POST['mail'];
  $q=mysql_query("select * from main where email='".$name."' ") or die(mysql_error());
  $n=mysql_fetch_row($q);
  if($n>0)
  {
   $salt = mcrypt_create_iv(22, MCRYPT_DEV_URANDOM);
   $salt = base64_encode($salt);
   $salt = str_replace('+', '.', $salt);
   $hash = crypt($password, '$2y$10$'.$salt.'$');
  	
   $insert=mysql_query("UPDATE main SET password='$hash' WHERE email='$name' ");
   if($insert)
   {
    $er='Password updated successfully';
   }
  
  }
  else
  {
   
    $er='User not registered';
   
  }
 }
?>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">MediFind</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="#">Sign Up</a></li>
      <li><a href="#">About Us</a></li>
      <li><a href="#">Search Stores</a></li>
      <li><a href="#">Search Medicines</a></li>
      <li><a href="#">Search Drugs</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
	      <li><a href="Home.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
    </ul>
  </div>
</nav>
<h1 align="center">Forgot Password?</h1>
<div class="contact">


     <div id="er"><?php echo $er?></div>
     
     <div class="container">
            <form method="POST" action="#" role="form" class="fform" >
            <fieldset>
            <br>
            
		        <div class="form-group">
		            <label for="email"> <font color="red">*</font>UserName</label><br>
		            <input type="text" class="form-group" placeholder="Enter Your UserName" name="email" id="email">
		        </div>
		        <div class="form-group">
		            <label for="password"> <font color="red">*</font>Password</label><br>
		            <input type="password" class="form-group" placeholder="Enter password"  name="password" id="password">
		          </div>
		       <div class="form-group">
		            <label for="cpass"> <font color="red">*</font>Confirm Password</label><br> 
		            <input class="form-group" placeholder="Confirm Password" type="password" name="cpass" id="cpass"><br>
		       </div>
		       <div class="form-group">
		         <input type="submit" name="submit" id="submit" value="Submit">
		            </div>
		       </fieldset>
        </form> 
</div>


<script type="text/javascript">
$(document).ready(function() {
$('#submit').click(function() {
var name=document.getElementById('email').value;
var password=document.getElementById('password').value;
var cpass=document.getElementById('cpass').value;
var chk = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
if(name=='')
{
 $('#er').html('Enter your name');
 return false;
}
if(password=='')
{
 $('#er').html('Enter your password');
 return false;
}

if(cpass=='')
{
 $('#er').html('Enter confirm password');
 return false;
}
if(cpass!=password)
{
	$('#er').html('Passwords Do not match');
	 return false;
		
}
});
});
</script>
</body>

</html>