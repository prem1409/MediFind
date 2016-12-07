<?php session_start();
header("Cache-Control: max-age=300, must-revalidate");

if(isset($_COOKIE["name"])&&isset($_COOKIE["pwd"]))
{
$_SESSION["name"]=$_COOKIE["name"];
}
?>
<!DOCTYPE html>
<html>
  <head>
  <title>Store Search-Maps</title>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    <link rel="stylesheet" type="text/css" href="style.css" />
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false&key=AIzaSyD0X4v7eqMFcWCR-VZAJwEMfb47id9IZao">
    </script>
      <link rel="stylesheet" href="bootstrap-3.3.6-dist/css/bootstrap.min.css">
      <link rel="stylesheet" href="bootstrap-3.3.6-dist/js/bootstrap.min.js">
    
    <style type="text/css">
    span{
    color:red;
    }.glyphicon ,.glyphicon-user{
    color:red;
    }
    #container,#map_canvas
    {
    width:100%;
    height:600px; margin:10px;
	padding :100px;
    }
    label{
    font-size: :14;
    }
    
    #sidebar{
    width:100%;
    height:600px;
    margin:10px;
    padding-left: 15px;
    padding-right: 15px;
  
    }  
    submit
	{
    background:none repeat scroll 0% 0% #8FCB73;
    display: inline-block;
    width:100%;
    padding: 5px 10px;
    line-height: 1.05em;
    box-shadow: 1px 2px 3px #8FCB73;
    border-radius: 8px;
    border: 1px solid #8FCB73;
    text-decoration: none;
    opacity: 0.9;
    cursor: pointer;
 color:white;
	}  
    </style>
    <script type="text/javascript">
	var map;
	$(document).ready(function () {
			
			//draw a map centered at Empire State Building Newyork
		    var latlng = new google.maps.LatLng(19.014782, 72.841719);
	        var myOptions = {
	            zoom: 13,
	            center: latlng,
	            mapTypeId: google.maps.MapTypeId.ROADMAP
	        };
	        map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
	
			$("#submit").click(function(){
				//Convert Address Into LatLng and Retrieve Address Near by
				convertAddressToLatLng($("#txtAddress").val());
				$('.result').show();
			});
	});				  
      
	function convertAddressToLatLng(address){
	 	var geocoder = new google.maps.Geocoder();
		
		geocoder.geocode({ 'address': address }, function (results, status) {
			if (status == google.maps.GeocoderStatus.OK) {
				//Empty div before re-populating
				$("#divStores").html('');
			    searchStores(results[0].geometry.location);
			} else {
			 	$("#divStores").html(getEmbedHTML('No Stores Found','',''));
			}
		});
	}
	
	function searchStores(location){
		var latlng = new google.maps.LatLng(location.lat(),location.lng());
	    var myOptions = {
	    	zoom: 13,
	        center: latlng,
	        mapTypeId: google.maps.MapTypeId.ROADMAP
	    };
	    map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);	
		
		//Marker at the address typed in
		//var image = 'images/townhouse.png'
        var marker = new google.maps.Marker({
                position: latlng,
                map: map,
                animation:google.maps.Animation.BOUNCE
                
        });		
		
		//hard coded the radius to 10 miles, if you get the value from a field if required
		var parameters = 'lat='+ location.lat() + '&lng=' + location.lng() + '&radius=10';  
	
		$.ajax({  
			type: "POST",  
			dataType: 'json',
			url: "store_locator.php",  
			data: parameters,  
			success: function(msg) {  
			//	alert(msg);
				displayStores(msg);
			},
			error:function (xhr, ajaxOptions, thrownError){
            	alert(thrownError);
            }    
		});  /* $.ajax({  */
	}
	
	function displayStores(result){
		if (result.length > 0){
			for (i=0;i<result.length;i++){
				//Append Store Address on Sidebar
				var html = getEmbedHTML(i+1,result[i].name,result[i].address,result[i].contact,result[i].distance);
				$("#divStores").append(html);
				//place a marker
			//	var image = 'images/number_' + parseInt(i+1) + '.png';
				var latlng = new google.maps.LatLng(result[i].lat,result[i].lng);
				var marker = new google.maps.Marker({
					position: latlng,
					map: map,
			//		icon: image
				});	
				
				var msg = 'Store Name : ' + result[i].name + '<br/> ';
			msg +=  'Address : ' + result[i].address + '<br/> ';
			msg +=  'Contact : ' + result[i].contact + '<br/> ';
            	attachMessage(marker, msg);
			}
		} else {
			$("#divStores").html(getEmbedHTML("","No results","","",""));
		}
	}
	
	function attachMessage(marker, msg) {
		var infowindow = new google.maps.InfoWindow({
			content: msg,
			
		});
		google.maps.event.addListener(marker, 'click', function () {
			infowindow.open(map, marker);
		});
	}
	
	function getEmbedHTML(seqno,name,address,contact,distance) {
		var	strhtml = '<div class="result">';
		strhtml  =  strhtml + '<label>' + name + '</label><br/>'
		strhtml  =  strhtml + '<span>' + address + '<span><br/>'
		strhtml += '<span>' + contact + '<span><br/>'
		strhtml  =  strhtml + '<span> Distance : ' + parseFloat(distance).toFixed(2) + ' miles<span><br/>'
		strhtml  =  strhtml + '</div><div class="separator"></div>';
		
		return strhtml;
	}
    </script>
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<style type="text/css">
span{color:red;}
</style>
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <link  rel="icon" href="MediIcon.png">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
   <link rel="stylesheet" href="style.css">
      <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap-3.3.6-dist/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="bootstrap.min.js"></script>

<meta name="viewport" content="width=device-width, initial-scale=1">
    
  </head>
  <body>
  
 <nav role="navigation" class="navbar navbar-inverse navbar-fixed-top" offset="500" tolerance="5">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="Home.php">MediFind</a>
    </div>
    <ul class="nav navbar-nav">
  
      <li><a href=AboutUs.html">About Us</a></li>
      <li class=active><a href="#">Search Stores</a></li>
      <li><a href="Search.php">Search Medicines</a></li>
      <li><a href="Search.php">Search Drugs</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
	    <ul class="nav navbar-nav navbar-right">
	    
				<li><a href="userHome.php"><span class="glyphicon glyphicon-user"></span><?php echo $_SESSION["name"];?></a></li>
						
	      <li><a href="sessionunset.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
	     
    </ul>
    </ul>
  </div>

</nav><br><br>

<div class="row">
<div class="page-header "><img src="MediFind.png"><font size=60>MediFind</font></div>
<div class="panel-body">Your GateWay To World Of Quick Medicine Search!</div>
</div>
  
    <div class="container" >
          <div class="row shadow" style="background:#E3EDFA; margin:10px " >
       
				
	            <label for="Search">Search</label><br>
		          <input class="form-group" placeholder="Eg:Marol,Mumbai" type="text" name="search" id="txtAddress"><br><br>
		      
		         <input type="submit" name="submit" id="submit" value="Submit">
		       
            </div>
            <div id="map_canvas" class="shadow"></div>
        
       <div id="sidebar" class="shadow">
         <font face="Liberation Serif" size=20>Search Results:</font>
            <div class="result" style="padding:10px;"></div>
            <div class="separator"></div>
            
			<div id="divStores">
			<!--
			<div class="row">
				<label>Store 1<label><br/>
				<span> Address Here<span>
            </div>
            <div class="separator"></div>
			-->			
			</div>
 </div>     
  
    </div>
  </body>
</html>