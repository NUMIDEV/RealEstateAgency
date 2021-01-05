              

<?php

session_start();
require "connect.php";
$sSQL= 'SET CHARACTER SET utf8'; 
mysqli_query($con,$sSQL) 
or die ('Can\'t charset in DataBase');
$req="select * from wilaya";
$query=mysqli_query($con,$req);
$tabSrc = array();
$tabId = array();
$req3="select * from img";
$query3=mysqli_query($con,$req3);


$req2="select * from seller";
$query2=mysqli_query($con,$req2);
$x=0;$i=0;
while ( $row2=mysqli_fetch_assoc($query2)) {
  $x=$x+1;
 
  $srcid=$row2['Id'];

$query3=mysqli_query($con,$req3);
  while ( $row3=mysqli_fetch_assoc($query3)) {
  if ($srcid===$row3['Nid'] ) {
if($row3['Id']==1){
    $srcimg=$row3['Img'];
    $tabSrc["$i"] = $srcimg;
    $tabId["$i"] = $srcid;

   $i=$i+1;
  }

  } 
  }  

}



  $compteur=0;$i1=0;
$s=0;
$tabimglength=0;

 
    $tabId1=2;
  
  if (isset($_REQUEST["Id"])) {
    $tabId1=$_REQUEST["Id"];
}
$tabSrc1 = array();
$req3="select * from img";
$query3=mysqli_query($con,$req3);
while ($row3=mysqli_fetch_assoc($query3)) {
if ($row3['Nid']==$tabId1) {
    $tabimglength=$tabimglength+1;
$tabSrc1["$s"]=$row3['Img'];
$s=$s+1;
  }  
}




                    if ( $s>2) {
                   echo "<button onclick='myFunctionadd1()' class='i' style='background:transparent;border:none; outline: none;margin-top: 3%;position: relative;z-index: 3;left: 0;top:0'>  <i class='fas fa-chevron-circle-up' style='font-size:  100px ;'></i></button>";  } ?>
     
                      </h3></center><br>
                      <div style=" border: 2px solid white">


<?php 


  echo "<div class='firstdivlist1'><div style='background:white; margin-left:20px' >";

for ($j=0; $j <= 2 ; $j++) { 
     echo " <div class='pic'  style='width: 100%;height: 100px;background:  white ; '>";
if ($compteur<=2 and $j<$s ) {
echo "<img src=".$tabSrc1["$j"]." class='myImg' >";
$compteur=$compteur+1;
}
echo "</div>";

}
 

echo "</div>";


?>
<div class='minus1'><div style='width: 100%;background:green;margin-left:20px ' >";
 <?php

  $compteur=0;
$i1=$i1+1;
if ($i1>$s-2) {
 $i1=$i1-1;
 }
for ($j=$i1; $j <= $i1+2 ; $j++) { 
     echo " <div class='pic'  style='width: 100%;height: 100px;background: red ; '>";
if ($compteur<=2 and $j<$s) {
echo "<img src=".$tabSrc1["$j"]." class='myImg' >";
$compteur=$compteur+1;
}echo "</div>";
}
echo "</div>";



?>
<div class='add1'><div style='width: 100%;background:green;margin-left:20px ' >";
 <?php  


  $compteur=0;
$i1=$i1-1;
if ($i1<0) {
  $i1=0;
}
for ($j=$i1; $j <= $i1+2 ; $j++) {
    echo " <div class='pic'  style='width: 100%;height: 100px;background: green ; '>";
if ($compteur<=2 ) {
echo "<img src=".$tabSrc1["$j"]." class='myImg' >";
$compteur=$compteur+1;
}echo "</div>";
}
echo "</div>";?>
    
                          <center><br><h3>
<?php  
  if ( $s>2) {//executez que si la longueur du tas est sup à3
                             echo "<button onclick='myFunctionminus1()' class='i' style='background:transparent;border:none; outline: none;margin-top: 0px;position: relative;z-index: 3;right: 0;'>  <i class='fas fa-chevron-circle-down' style='font-size:  100px ;'></i></button> "; 
}

?>