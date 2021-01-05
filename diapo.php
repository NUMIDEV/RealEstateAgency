<?php 
require "connect.php";
$sSQL= 'SET CHARACTER SET utf8'; 
mysqli_query($con,$sSQL) 
or die ('Can\'t charset in DataBase');
$var=$_REQUEST['Id'];   
$req="SELECT * FROM seller where Id=$var";
$query=mysqli_query($con,$req);
$row=mysqli_fetch_assoc($query);

 ?>
<!DOCTYPE html>
<html>
<head>

	<title></title>
<meta charset="utf-8">
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>


  <link href="fontawesome/css/fontawesome.css" rel="stylesheet">
  <link href="fontawesome/css/brands.css" rel="stylesheet">
  <link href="fontawesome/css/solid.css" rel="stylesheet">

</head>  
<style type="text/css">
html{
	width: 100%;
	height: 90%;
}
body{

	height: 90%;
}
img {
    max-width: 100%;
    max-height: 100%;
}

.center{
	position: relative;
	top: 20%;
}
		

		 #MainImages {
                width: 100%;
                height: 800px;
             }
                 #MainImages img {
                     cursor: pointer;
                     height: 70%;
                 }
            #Fullscreen {
                 width: 100%;
                 display: none;
                 position:fixed;
                 top:0;
                 right:0;
                 bottom:0;
                 left:0;
                 /* I made a 50% opacity black tile background for this 
                 div so it would seem more... modal-y*/
                 background: transparent url('../Images/bgTile_black50.png') repeat; 
             }
             #Fullscreen img {
                display: block;
                height: 100%;
                margin: 0 auto;
             }
i{
	 opacity: 0.2;
     
}
         i:hover {

 opacity: 0.7;
 
}
       </style>    

<body>

                 




<?php 
  $compteur=0;$i1=0;
$s=0;
$tabimglength=0;

 
$tabSrc1 = array();
$req3="select * from img";
$query3=mysqli_query($con,$req3);
while ($row3=mysqli_fetch_assoc($query3)) {
if ($row3['Nid']==$var) {
    $tabimglength=$tabimglength+1;
$tabSrc1["$s"]=$row3['Img'];
$s=$s+1;
  }  
}

?>

<table><tr><td>  <div style="height: 400px; overflow: scroll;"> 


<?php








echo "<div class='minus1'><div style='width: 100%;' >";

for ($i=0; $i <$s; $i++) { 
 echo "<div  style='width:auto;height: 100px; '>";


     echo " <img src='".$tabSrc1["$i"]."' class='myImg' >";
    echo "</div >" ;
 } echo "</div>";

echo "</div >" ;



 ?>




                   </td>

                   <td style='position:absolute;'> 
<?php


echo "<div style=''><h3>Détails:</h3> <br>";

echo "Nom: ".$row['Nom']."<br>";
echo "N°Tel: ".$row['Ntel']."<br>";
echo "Prix: ".$row['Prix']."DA<br>";
echo "Surface: ".$row['Surface']."m²<br>";
echo "Date: ".$row['Date']."<br>";

?> 

</div>
</td></tr></table>

<button style="background-color: red;float: right;border: none;">Acheter</button>





</body>
</html>