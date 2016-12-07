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
  <link rel="stylesheet" href="bootstrap-3.3.6-dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="Style.css">
  <link  rel="icon" href="MediIcon.png">
      <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="bootstrap.min.js"></script>
  <script type="text/javascript" src="sortable.js"></script>

</script>
</script> 
  <style type="text/css">
  span{
  color:red;
  }
  /* Sortable tables */
table.sortable thead {
    background-color:#eee;
    color:#666666;
    font-weight: bold;
    cursor: pointer;
}
  </style>
    <title>MediFind</title>
</head>
<body>

 <nav role="navigation" class="navbar navbar-inverse navbar-fixed-top" offset="500" tolerance="5">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="userHome.php">MediFind</a>
    </div>
    <ul class="nav navbar-nav">
  
      <li><a href="AboutUs.php">About Us</a></li>
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
    
<div class="row"><img src="MediFind.png">
<div class="page-header "><font size=60>MediFind</font></div>
<div class="panel-body">Your GateWay To World Of Quick Medicine Search!</div>
</div>
<div class="container">
           <table class="sortable table" border=5 color="black"id="mytable" >
           <tr><th>Chemist</th><th>Name</th><th>Quantity Available</th><th>Drug Quantity</th><<th>Drug 1</th><th>Drug 2</th><th>Drug 3</th><th>Price</th><th>Manufacturer</th>
<?php


$text1=$_POST["text1"];
include("connect.php");
	$sql = "Select name, Medicine_Name, Drug_1,Drug_2,Drug_3,Manufacturer, Drug_Quantity,Quantity ,Price from markers, Medicine_Info ,Chemist_Has where Medicine_Info.Medicine_Name='".$text1."'and Medicine_Info.Medicine_Name=Chemist_Has.medicine and Chemist_Has.id=markers.id  ";
	$result = $db->query($sql);
	
	if ($result->num_rows > 0) {
               // echo "<table border=5 color=black class=tablesorter id=table";
		//echo "<tr><th>ID</th><th>Name</th><th>Address</th><th>Medicine</th><th>Quantity</th>";
		while($row = $result->fetch_assoc()) {
			if($row["Drug_2"]=="")
			{
				$row["Drug_2"]="-";
			}
			if($row["Drug_3"]=="")
			{
				$row["Drug_3"]="-";
			}
				
			echo "<font size = '5'><tr><td>".$row["name"]."</td><br>";
                         echo "<td>".$row["Medicine_Name"]."</td>";
                         echo "<td>".$row["Quantity"]."</td>";
                        echo "<td>".$row["Drug_Quantity"]."</td>";
                        echo "<td>".$row["Drug_1"]."</td>";
                        echo "<td>".$row["Drug_2"]."</td>";
                        echo "<td>".$row["Drug_3"]."</td><br>";
                        echo "<td>".$row["Price"]."</td><br>";
                        echo "<td>".$row["Manufacturer"]."</td></tr><br></font></center>";
                        

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
