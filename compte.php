
<?php 
require 'connect.php';

$i=1;
require "arriereplan.php";
 $idindex=$_GET['id']; 

if(isset($_POST['env'])){
$i=0;

$password=$_POST['pass'];
$reqpass="SELECT * FROM gestion";
$querypass=mysqli_query($con,$reqpass);
while ( $rowpass=mysqli_fetch_assoc($querypass)) {
if($rowpass['Id']==1){
$getnewpass1=$rowpass['Password'];
}

if($rowpass['Id']==2){
$getnewpass2=$rowpass['Password'];
}
if($rowpass['Id']==3){
$getnewpass3=$rowpass['Password'];
}
}
	

if($idindex==1){
if ( $password===$getnewpass1) {
	header("Location:home.php?id=1.php");
}else{
	$s=1;
}
}

if($idindex==2){
if ( $password===$getnewpass2) {
	header("Location:User.php?id=2.php");
}else{
	$s=1;
}}

if($idindex==3){
if ( $password===$getnewpass3) {
	header("Location:User.php?id=3.php");
}else{
	$s=1;
}}


}



 ?>

<!DOCTYPE html>
 <html>
 <head>
 	<title></title>
<style type="text/css">
html, body {
  height: 90%;
}
	.center {
		position: relative;
		top: 35%;
	}


</style><a href=""></a>
 </head>
 <body>
<div style="position: relative;z-index: 2" class="center">
<center>	
	<?php $idindex=$_GET['id']; ?>
	<form method="POST" action="compte.php?id=<?php echo $idindex ?>"><table style="height: 100%;color: white; border: 3px solid; padding :20px">

<?php 
if(isset($s))
echo "<h1   Style='color:red;position :relative;z-index:2'>Erreur</h1>";  ?>

		<br><br><tr><td><dt><h3>Mot de passe</h3></dt> </td><td><input type="password" name="pass"></td></tr>
		<tr><td></td><td><button name="env">Connexion</button></td></tr>
		<?php if ($i==1) {
 	
$i=0;

 	 
 	echo "<input type='hidden' name='idindex' value= " .$idindex. ">" ; } ?>
	</table></form></center>


 </div>
 
 </body>
 </html>


