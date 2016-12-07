<?php
 session_start();
 header("Cache-Control: max-age=300, must-revalidate");
 include 'connect.php';
 $_SESSION['name']=$_POST['name'];

 if($_SERVER["REQUEST_METHOD"]=="POST")
 {
 $text1 = mysqli_real_escape_string($db,$_POST['text1']);
  $_SESSION['next2']= mysqli_real_escape_string($db,$_POST['text2']);
 
 
 
 }
 else 
     {
     echo "No Post";
}
 


?>

<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="Style.css">
  <link  rel="icon" href="MediIcon.png">
      <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="bootstrap.min.js"></script>
  <style type="text/css">
  .container{
	background-color: #e6f9ff;
	
}
  </style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

</script>
<style>
   
    .button{
        font-size: 30px;
        border: none;
        padding: 15px 32px;
            text-decoration: blink;
         font-family: arial;
             display: inline-block;
             border-radius: 10px;
       
             


    }
    .gobutton{
        font-size: 15px;
        font-style: italic;
        border: none;
        padding: 15px 32px;
            text-decoration: none;
         font-family: arial;
             display: inline-block;
              border-radius: 10px;
              
    }
    .text
    {
        padding: 15px 32px;
        font-size: 15px;
        font-style: italic;
        
    }
    </style>
    <title>Search Medicines,Drugs,Stores</title>
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="">MediFind</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="#">Sign Up</a></li>
      <li><a href="#">About Us</a></li>
      <li><a href="#">Search Stores</a></li>
      <li><a href="#">Search Medicines</a></li>
      <li><a href="#">Search Drugs</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
	      <li><a href="Home.php"><span class="glyphicon glyphicon-log-in"></span> <?php echo $_SESSION['name'];?></a></li>
    </ul>
  </div>
</nav>
    <a href="Home.php">
    <img alt="MediFind" src="MediFind.png" onclick="Home.php"></a>
     <font size=35 face="Liberation Serif">Search.... </font>

    <div class="main">
        <form action="searchbymed.php" method="post">
        <button id="showmed" class="button">Search By Medicine</button><br>
    

    <input type="text" id="appear1" placeholder="Enter the medicine" name="text1" class="text">
    
    <input type="submit" value="Submit" id="go1" class="gobutton">
    
        </form>
     
<br>
<form action="searchbystore.php" method="POST">
<button id="showstore" class="button">Search By Store</button><br>
<input type="text" id="appear2" placeholder="Enter the store" name="text2" class="text">
<input type="submit" value="Submit" id="go2" class="gobutton">
</form>
<br>


    </div>
</body>
</html>
