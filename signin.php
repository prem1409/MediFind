
<html>
<head>
 <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <link  rel="icon" href="MediIcon.png">

<meta name="viewport" content="width=device-width, initial-scale=1">

<style type="text/css">
 input{
 border:1px solid olive;
 border-radius:5px;
 }
 h1{
  color:darkgreen;
  font-size:22px;
  text-align:center;
 }
span{
  color:red;

 }
 .container{
 float: center;
 }
 img{
 float:left;
 }
 
</style>
<title>MediFind</title>
</head>
<body background="home_pic.jpg">

 <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="Home.php">MediFind</a>
    </div>
    <ul class="nav navbar-nav">
      <li ><a href="signup.php">Sign Up</a></li>
      <li><a href="#">About Us</a></li>
      <li><a href="#">Search Stores</a></li>
      <li><a href="#">Search Medicines</a></li>
      <li><a href="#">Search Drugs</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
	    <ul class="nav navbar-nav navbar-right">
	    
				<li><a href="signup.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
						
	     
	      
    </ul>
    </ul>
  </div>
</nav>

<div class="row"><img src="MediFind.png">
<div class="page-header "><font size=60>MediFind</font></div>
<div class="panel-body">Your GateWay To World Of Quick Medicine Search!</div>
<div class="container">  
    <div class="row">  
        <div class="col-md-4 col-md-offset-4">  
            <div class="login-panel panel panel-success">  
                <div class="panel-heading">  
                    <h3 class="panel-title">Sign In</h3>  
                </div>  
                <div class="panel-body">  
                    <form role="form" method="post" action="#">  
                        <fieldset>  
                            <div class="form-group"  >  
                                <input class="form-control" placeholder="E-mail" name="name" type="email" autofocus>  
                            </div>  
                            <div class="form-group">  
                                <input class="form-control" placeholder="Password" name="pwd" type="password" value="">  
                            </div>  
                             <div class="form-group">  
                            <input type='checkbox' name='remember' /> <span>Remember me</span><br>
                             </div>
                             <div class="form-group"  >  
                              <span><a href="forgot.php">Forgot password</a></span>
  								</div>
                                <input class="btn btn-lg btn-success btn-block" type="submit" value="submit" name="submit" >  
  
                            <!-- Change this to a button or input when using this as a form -->  
                          <!--  <a href="index.html" class="btn btn-lg btn-success btn-block">Login</a> -->  
                        </fieldset>  
                    </form>  
                               </div>  
            </div>  
        </div>  
    </div>   

                    
<?php
session_start();
//your values are stored in cookies, then you can login without validate
if(isset($_COOKIE['name']) && isset($_COOKIE['pwd']))
{
	echo $_COOKIE['name'];
	$_SESSION['name']=$_COOKIE['name'];
   header('location:userHome.php');
}
// login validation in php
if(isset($_POST['submit']))
{
$con= mysqli_connect('localhost','root','KNOWledge','MediFind') or die(mysql_error());
 
 $name=$_POST['name'];
 $pwd=$_POST['pwd'];

 if($name!=''&&$pwd!='')
 {
 	//echo $name;
 	//echo $pwd;
 	
 
 	$query=mysqli_query($con,"select password from main where email='$name'")  or die("error".mysql_error());
 	$res=mysqli_fetch_assoc($query);
 	
 	//echo $res["password"];
 	//echo "\n";
 //echo crypt($pwd,$res["password"]);
   if(strcmp($res['password'],crypt($pwd,$res['password']))==0)
   {
   
    if(isset($_POST['remember']))
    {
   setcookie('name',$name, time() + (60*60*24*1));
   setcookie('pwd',$pwd, time() + (60*60*24*1));
     }
    $_SESSION['name']=$name;
    header('location:userHome.php');
   }
   else
   {
    echo 'You  entered username or password is incorrect';
   }
 }
 else
 {
  echo'Enter both username and password';
 }
}
?>
     

</body>
</html>
