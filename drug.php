<html>
<head>
<title>Drug</title>
</head>
<body>
<?php include 'connect.php';
$sql = "SELECT Chemist,Address,Medicine_name,Quantity,Manufacturer FROM Medicine_info,Chemist_Has,Chemist where drug=drug1 or drug=drug2 or drug=drug3 ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
     
     while($row = $result->fetch_assoc()) {
         echo "<br> Chemist Name". $row["Chemist"]. " <br>Address". $row["Address"]. "<br>Medicine Name " . $row["Medicine_name"] . "<br> Quantity". $row["Quantity"] . "<br> Manufacturer". $row["Manufacturer"] .<"br">;
     }
} else {
     echo "0 results";
}

$conn->close();
?>  

</body>