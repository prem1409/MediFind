<html>
    <head>
      
      
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="js/jquery.tablesorter.min.js" type="text/javascript"></script> 
<script type="text/javascript"> 
$(document).ready(function() { 
  $("#mytable").tablesorter(); 
}); 
</script>
</script> 
    </head>
    <body>
        <table class="tablesorter" border=5 color="black"id="mytable" >
           <tr><th>ID</th><th>Name</th><th>Address</th><th>Medicine</th><th>Quantity</th>
<?php
$text1 = $_POST['text1'];
session_start();
include("connect.php");

	echo "Medicine Name=";
	echo $text1;
	$sql = "Select Chemist_Name,Drug_1,Drug_2,Drug_3,Manufacturer, Drug_Quantity, Price, Quantity from Chemist, Medicine_info where Medicine_Name= '".$text1."' and Chemist.Chemist=Medicine_Info.Chemist_ID";
	$result = $db->query($sql);
	echo "<br>";
	if ($result->num_rows > 0) {
               // echo "<table border=5 color=black";
		echo "<tr><th>Chemist Name</th><th>Drug 1</th><th>Drug 2</th><th>Drug 3</th><th>Manufacturer</th><th>Quantity of Drug</th><th>Price of Medicine</th>Quantity of Medicine<th></th>";
		while($row = $result->fetch_assoc()) {
			echo "<font size = '5'><tr><td>".$row["Chemist_Name"]."</td><br>";
                         echo "<td>".$row["Drug_1"]."</td>";
                        echo "<td>".$row["Drug_2"]."</td>";
                        echo "<td>".$row["Drug_3"]."</td><br>";
                        echo "<td>".$row["Manufacturer"]."</td>
                        echo "<td>".$row["Drug_Quantity"]."</td>
                        echo "<td>".$row["Price"]."</td>
                        echo "<td>".$row["Quantity"]."</td>
</tr><br></font></center>";
                        

		}
                echo "</table>";
	} else {
		echo "<center><font size = 6px>Data not found</font></center>";
	}
	$db->close();

?>
  </head>
</html>