<?php 
require 'connect.php';
require 'arriereplan.php';
if (isset($_GET['id'])) {
$s=$_GET['id'];
echo $s;
$req="SELECT * FROM gestion where Id='$s'";
$query=mysqli_query($con,$req);
while ( $row=mysqli_fetch_assoc($query)) {
$allow1=$row['AllowClient'];
$allow2=$row['AllowSeller'];
$allow3=$row['AllowShow'];

}
}
 ?>



<!DOCTYPE html>
<html>
<head>
	<title></title>

	<style type="text/css">
		html, body {
  height: 90%;
  width:100%;
overflow: hidden;
}
	.center {
		position: relative;
		top: 50%;
		left: 40%;
	}
	</style>
</head>
<body >
<div style="position: relative;z-index: 2" class="center">
<table style="height: 100%;color: white; border: 3px solid; padding :20px">

    <?php

     if ($allow1==1){ ?>
		<tr><td><a href="Seller.php"><button style="height:60px;width:200px;color: black;border: none;"><h3>Inscrire un bien</h3></button></a> </td></tr><?php } ?>
	<?php if ($allow2==1) { ?>	<tr><td><a href="customer.php"><button style="height:60px;width: 200px;color: black;border: none;"><h3>Inscrire un client</h3></button></a></td></tr><?php } ?>
	<?php if ($allow3==1) { ?>	<tr><td><a href="home.php"><button style="height:60px;width: 200px;color: black;border: none;"><h3>
Vente et présentation des biens</h3></button></a></td></tr><?php } ?>

	
	</table>
</div>
</body>
</html>