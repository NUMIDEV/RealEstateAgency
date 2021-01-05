<?php 
require 'connect.php';
require 'arriereplan.php';
$s=$_GET['id'];
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
	<div style="position:absolute;z-index: 2;width: auto;height: 100%;background:white" > <a href="home"><button style="height:60px;width:200px;color: black;border: none;"><h3>Acceuil</h3></button></a><br> <button  style="height:60px;width:200px;color: black;border: none;"><h3>Gestion des comptes</h3></button><br><button style="height:60px;width:200px;color: black;border: none;"><h3>Historique </h3></button><br><button style="height:60px;width:200px;color: black;border: none;"><h3>Trésorerie</h3></button></div>
<div style="position: relative;z-index: 2" class="center">
<table style="height: 100%;color: white; border: 3px solid; padding :20px">


		<tr><td><a href="Seller.php"><button style="height:60px;width:200px;color: black;border: none;"><h3>Inscrire un bien</h3></button></a> </td></tr>	<tr><td><a href="customer.php"><button style="height:60px;width: 200px;color: black;border: none;"><h3>Inscrire un client</h3></button></a></td></tr>	<tr><td><a href="home.php"><button style="height:60px;width: 200px;color: black;border: none;"><h3>
Vente et présentation des biens</h3></button></a></td></tr>

	
	</table>
</div>
</body>
</html>