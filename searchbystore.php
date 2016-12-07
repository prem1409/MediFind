<?php 
 session_start();
 header("Cache-Control: max-age=300, must-revalidate");
 
 if(isset($_COOKIE["name"])&&isset($_COOKIE["pwd"]))
 {
 	$_SESSION["name"]=$_COOKIE["name"];
 }
 
 include 'connect.php';

 ?>
<html>
    <head>
      
      
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="js/jquery.tablesorter.min.js" type="text/javascript"></script> 
  <link  rel="icon" href="MediIcon.png">
    <script type="text/javascript" src="sortable.js"></script>
  
      <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap-3.3.6-dist/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="bootstrap.min.js"></script>

</script>
</script> 
  <style type="text/css">span{color:red;}</style>
    <title>MediFind</title>
</head>
<body>

 <nav role="navigation" class="navbar navbar-inverse navbar-fixed-top" offset="500" tolerance="5">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">MediFind</a>
    </div>
    <ul class="nav navbar-nav">
  
      <li><a href="#">About Us</a></li>
      <li><a href="StoreSearch.php">Search Stores</a></li>
      <li><a href="Search.php">Search Medicines</a></li>
      <li><a href="Search.php">Search Drugs</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
	    <ul class="nav navbar-nav navbar-right">
	    
				<li class=active><a href="userHome.php"><span class="glyphicon glyphicon-user "></span><?php echo $_SESSION["name"];?></a></li>
						
	      <li><a href="sessionunset.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
	     
    </ul>
    </ul>
  </div>

</nav><br><br>
    <div class="row">
<div class="page-header "><font size=60>MediFind</font>
<div class="panel-body">Your GateWay To World Of Quick Medicine Search!</div>
</div>
</div>
    
 <div class="container">
        <table class="sortable table" border=5 color="black"id="mytable" >
           <tr><th>ID</th><th>Name</th><th>Address</th><th>Medicine</th><th>Quantity</th>
<?php

$text2 = $_POST['text2'];

include("connect.php");

	
	$sql = "SELECT * FROM markers,Chemist_Has WHERE markers.name='".$text2."' and markers.id = Chemist_Has.id";
	$result = $db->query($sql);
	echo "<br>";
	if ($result->num_rows > 0) {
               // echo "<table border=5 color=black class=tablesorter id=table";
		//echo "<tr><th>ID</th><th>Name</th><th>Address</th><th>Medicine</th><th>Quantity</th>";
		while($row = $result->fetch_assoc()) {
			echo "<font size = '5'><tr><td>".$row["id"]."</td><br>";
                         echo "<td>".$row["name"]."</td>";
                        echo "<td>".$row["address"]."</td>";
                        echo "<td>".$row["Medicine"]."</td><br>";
                        echo "<td>".$row["Quantity"]."</td></tr><br></font></center>";
                        

		}
                echo "</table>";
	} else {
		echo "<center><font size = 6px>Data not found</font></center>";
	}
	$db->close();

?>
 </div>
</body>
</html>
