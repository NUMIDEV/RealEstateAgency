<?php 
require "connect.php";
$bien=$_REQUEST['bien'];


$annonce=$_REQUEST['annonce'];










 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title></title>
 	<style type="text/css">
 	
 		.overflow1{
height: 200px !important;
overflow:scroll;
 		}
 	</style>
 </head>
 <body>
 <div class="overflow1">

 	

 		
 		<center><dt>Liste des clients:</dt></center>

 	
 <?php 
$req="SELECT * FROM customer";
$query=mysqli_query($con,$req);
while ($row=mysqli_fetch_assoc($query)) {


	if($bien==0 Xor $annonce==0){
          if ($bien==0) {
          		if(  $row['Typedannonce']==$annonce){
	echo "<table><tr><td>Nom:</td><td>".$row['Nom']."</td></tr>";
	echo "<tr><td>N°Tel:</td><td>".$row['Ntel']."</td></tr>";
	echo "<tr><td>Prix:</td><td>".$row['Prix']."DA</td></tr>";
	echo "<tr><td>Date:</td><td>".$row['Date']."</td></tr></table><hr>";}
          }
          if ($annonce==0) {
          		if($row['Typedebien']==$bien ){
	echo "<table><tr><td>Nom:</td><td>".$row['Nom']."</td></tr>";
	echo "<tr><td>N°Tel:</td><td>".$row['Ntel']."</td></tr>";
	echo "<tr><td>Prix:</td><td>".$row['Prix']."DA</td></tr>";
	echo "<tr><td>Date:</td><td>".$row['Date']."</td></tr></table><hr>";}
          }
	}else{
	if($row['Typedebien']==$bien &&  $row['Typedannonce']==$annonce){
	echo "<table><tr><td>Nom:</td><td>".$row['Nom']."</td></tr>";
	echo "<tr><td>N°Tel:</td><td>".$row['Ntel']."</td></tr>";
	echo "<tr><td>Prix:</td><td>".$row['Prix']."DA</td></tr>";
	echo "<tr><td>Date:</td><td>".$row['Date']."</td></tr></table><hr>";}
}
}


  ?></div>
 </body>
 </html>