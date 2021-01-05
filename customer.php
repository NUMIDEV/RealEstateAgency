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

if (isset($_GET['btn'])) {





 $Nom=$_GET['Nom'];
$Ntel=$_GET['Ntel'];
$Mention=$_GET['Mention'];
 $Prix=$_GET['Prix'];
 $typedebien=$_GET['typedebien'];
$typedannonce=$_GET['typedannonce'];
$wilaya=$_GET['wilaya'];

if ($wilaya>0) {
$commune =$_GET['commune'];

}else{
  $commune = 0;
}



             $reqannonce="INSERT INTO `customer`( `Nom`, `Ntel`, `Typedebien`, `Typedannonce`, `Mention`, `Prix`,`Wilaya`, `Commune`,`Date`) VALUES 
               ('$Nom','$Ntel','$typedebien','$typedannonce','$Mention','$Prix','$wilaya','$commune','$date') ";
             $queryannonce=mysqli_query($con,$reqannonce);




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
}
.center{
position: relative;
top: 20%;

}
img {
    max-width: 100%;
    max-height: 100%;
}


button::-moz-focus-inner {
   border: 0;
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
  <a href="home.php"> <i style="position: absolute;size: 70px;opacity: 1; size: 70px;color: red;font-size: 30px;margin:10px;" class="fas fa-arrow-circle-left"></i></a>



  <div class="center hide" style="position: relative;z-index: 2;height: 100%;vertical-align: middle;">

  <form method="get" action="<?php echo $_SERVER['PHP_SELF'] ;?>"><center>
 <table class="hide">
 	<tr><td style="color: white;padding-left: 20px ; direction: rtl;">Nom</td><td><input type="text" name="Nom" required></td></tr>
 	<tr><td style="color: white;padding-left: 20px ; direction: rtl;">Ntel</td><td><input type="text" name="Ntel" required></td></tr>
 	<tr><td style="color: white;padding-left: 20px ; direction: rtl;">Prix en DA</td><td><input type="text" name="Prix" required></td></tr>
 	<tr><td style="color: white;padding-left: 20px ; direction: rtl;">Mention</td><td>  <select name="Mention" required><option value="0">-------------</option><option value="1" required>Négociable</option><option value="0">Non négociable</option></select></td></tr>
 	 <tr><td style="color: white;direction: rtl;">TYPE D'ANNONCE </td><td><select name="typedannonce">
           <option value="0" >-----------</option>
            <option value="1">Achat</option>
            <option value="2">Location</option>
        </select></td><td></td><td></td>
       </tr>
      


   <tr><td style="color: white;padding-left: 20px"><span style="color: white;padding-left: 20px">TYPE DE BIEN </span></td><td><select name="typedebien"> 
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
<br><br>
<center><a href="customer.php"><button style="background-color: red; border: none;padding: 5px;text-decoration: none;" name="btn" ><dt> Inscrire un client</dt></button></a></center>
</center></form><br>


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



</script>

  







</body>
</html>