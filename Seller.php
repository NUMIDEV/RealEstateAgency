<?php 


require "connect.php";
require "arriereplan.php";
$sSQL= 'SET CHARACTER SET utf8'; 
mysqli_query($con,$sSQL) 
or die ('Can\'t charset in DataBase');
$req="select * from wilaya";
$query=mysqli_query($con,$req);
$tabSrc = array();
$tabId = array();




$date = date("d/m/y");  

if (isset($_POST['btn'])) {









 $Nom=$_POST['Nom'];
$Ntel=$_POST['Ntel'];
 $Prix=$_POST['Prix'];
 $typedebien=$_POST['typedebien'];
$typedannonce=$_POST['typedannonce'];
$Description=$_POST['Description'];
 $Surface=$_POST['Surface'];
$wilaya=$_POST['wilaya'];

if ($wilaya>0) {
$commune =$_POST['commune'];

}else{
  $commune = 0;
}



             $reqannonce="INSERT INTO `seller`( `Nom`, `Ntel`, `Typedebien`, `Typedannonce`, `Prix`,`Wilaya`, `Commune`,`Date`,Description,Surface) VALUES 
               ('$Nom','$Ntel','$typedebien','$typedannonce','$Prix','$wilaya','$commune','$date','$Description','$Surface') ";
             $queryannonce=mysqli_query($con,$reqannonce);

$req2="select * from seller";
$query2=mysqli_query($con,$req2);
while($row2=mysqli_fetch_assoc($query2)){
$date2=$row2['Date'];
$Nom2=$row2['Nom'];
$Ntel2=$row2['Ntel'];
$Typedebien2=$row2['Typedebien'];
$Typedannonce2=$row2['Typedannonce'];
$Prix2=$row2['Prix'];
$Surface2=$row2['Surface'];
$Wilaya2=$row2['Wilaya'];
$Commune2=$row2['Commune'];
$Description=$row2['Description'];


if($date2==$date&&
$Nom2==$Nom &&
$Ntel2==$Ntel &&
$Typedebien2==$typedebien &&
$Typedannonce2==$typedannonce &&
$Prix2==$Prix &&
$Surface2==$Surface &&

$Wilaya2==$wilaya &&
$Commune2==$commune &&
$Description==$Description

){
  $Id2=$row2['Id'];

}

}

 $countfiles = count($_FILES['image']['name']);
$date22 = date("dmy"); 
$time=date("hisa");
for($i=0;$i<$countfiles;$i++){
  $ext = pathinfo($_FILES['image']['name'][$i], PATHINFO_EXTENSION);
  $image=$date22.$time.$i.".".$ext;
  
    $chemin="img/".basename($image);
$chemin2='img/'.$image;

  if($i==0){
$req1="UPDATE `seller` SET `Src`='$chemin' WHERE `Ntel`='$Ntel'";

}
   $reqannonce2="INSERT INTO `img`( Img,Nid,Id) VALUES 
               ('$chemin2','$Id2',$i+1) ";
             $queryannonce2=mysqli_query($con,$reqannonce2);



$query1=mysqli_query($con,$req1);
  if (isset($query1)){
    move_uploaded_file($_FILES['image']['tmp_name'][$i],'img/'.$image);
  }else{
    echo"<script>alert('ERREUR');</script>";
  }}

}





 ?>
<!DOCTYPE html>
<html>
<head>
  <title>Agence immobilière</title>
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
  overflow: hidden;
}
.center{
position: relative;
top: 5%;

}



button::-moz-focus-inner {
   border: 0;
}    


       
i{
   opacity: 0.2;
     
}
         i:hover {

 opacity: 0.7;
 
}
           
  </style>





<body>


  <a href="home.php"> <i style="position: absolute;size: 70px;opacity: 1;color: red;font-size: 30px;margin:10px;" class="fas fa-arrow-circle-left"></i></a>


  <div class="center " style="position: relative;z-index: 2;height: 100%;vertical-align: middle;">

  <form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ;?>" enctype="multipart/form-data" ><center>
 <table class="hide">
  <tr style="font-size:150%;height: 80px;"><td style="direction: rtl;color:yellow">Inscription</td><td style="color: yellow"> d'un bien</td></tr>

 	<tr><td style="color: white;padding-left: 20px ; direction: rtl;">Nom</td><td><input type="text" name="Nom" required></td></tr>
 	<tr><td style="color: white;padding-left: 20px ; direction: rtl;">Ntel</td><td><input type="text" name="Ntel" required></td></tr>
 	<tr><td style="color: white;padding-left: 20px ; direction: rtl;">Prix en DA</td><td><input type="text" name="Prix" required></td>
</tr>
  <tr><td style="color: white;padding-left: 20px ; direction: rtl;">Surface en m²</td><td><input type="text" name="Surface" required></td>
</tr>
 <tr><td style="color: white;padding-left: 20px ; direction: rtl;">Description</td><td><input type="text" name="Description" ></td>
</tr>
 	 <tr><td style="color: white;direction: rtl;" >TYPE D'ANNONCE </td><td><select id="typedannonce" name="typedannonce" onchange=" showclient(this.value)">
           <option value="0" >-----------</option>
            <option value="1">Vente</option>
            <option value="2">Location</option>
        </select></td><td></td><td></td>
       </tr>
      


   <tr><td style="color: white;padding-left: 20px"><span style="color: white;padding-left: 20px">TYPE DE BIEN </span></td><td><select name="typedebien" id="typedebien" onchange=" showclient(this.value) "> 
     <option value="0">-----------</option>
   <option value="1">Appartement</option>
   <option value="2">Maison</option>
   <option value="3">Villa</option>
   <option value="4">Hôtel particulier</option>
   
    </select></td><td></td><td></td>
   </tr>
   <tr><td style="color: white;padding-left: 20px ; direction: rtl;">
    Wilaya </td><td>
    <select name="wilaya" onchange="showcommune(this.value)">
      <option value="0">-----------</option>
  <?php while( $row=mysqli_fetch_assoc($query)){ ?>
  <?php echo "<option value=". $row['Id']." >";?><?php echo $row['Fr']; ?></option>
  <?php } ?>
 </select></td><br><br><td  id=txtHint style="color: white;padding-left: 20px">
 </td><td ></td></tr><br><br>
</table>
<br>
<input type="file" name="image[]" style="color: white"  multiple><div style="background-color: yellow;width: 10%;">Note:Sélectionner tous les images à la fois en utilisant la touche ' ctrl '</div>

<br>
<center><button style="background-color: red; border: none;padding: 5px;text-decoration: none;" name="btn" type="submit"><dt> Inscription d'un bien</dt></button></center>
</center>


</form><br>
<div style="position: absolute;top:30%;width: 20%;background: white">
  <div id="txtHint2" style="background-color: white"></div>
</div>
<br>




  </div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script>
function showcommune(str) {
  var xhttp;  
  if (str == "") {
    document.getElementById("txtHint").innerHTML = "";
    return;
  }
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("txtHint").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "getcommune.php?q="+str, true);
  xhttp.send();
}
     
function showclient(str2) {
  var xhttp;  
  if (str2 == "") {
    document.getElementById("txtHint2").innerHTML = "";
    return;
  }
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("txtHint2").innerHTML = this.responseText;
    }
  };
  var bien=document.getElementById("typedebien").value;
  var annonce=document.getElementById("typedannonce").value;

  xhttp.open("GET", "getclient.php?bien="+bien+"&annonce="+annonce, true);
  xhttp.send();
}


</script>

  







</body>
</html>