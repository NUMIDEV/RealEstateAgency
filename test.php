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

$b=0;
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
 .hidee{
	display: none !important;
}
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
    
   .Fullscreen {
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
     #MainImages {
                width: 100%;
                height: 800px;
             }
                 #MainImages img {
                     cursor: pointer;
                     height: 70%;
                 }
           
             .Fullscreen img {
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






  <div class="center " style="position: relative;z-index: 2;height: 100%;vertical-align: middle;">
<center>
 <table class="hide">
    <tr><td style="color: white;direction: rtl;">TYPE D'ANNONCE </td><td><select name="typedannonce">
           <option value="0" >-----------</option>
            <option value="1">Vente</option>
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

</center><br><br><br><br>
<hr class="hide">



  

<table style="width: 100%;position: absolute;" class="hide"><tr><td  style="width: 500%;"><?php echo "<button onclick='myFunctionadd()' class='i' style='background:transparent;border:none; outline: none;margin-top: 3%;position: relative;z-index: 3;left: 0;top:0'>  <i class='fas fa-chevron-circle-left' style='font-size:  100px ;'></i></button>
   ";   ?></td>
   <td style="width: 50%;">
<?php echo "<button onclick='myFunctionminus()' class='i' style='background:transparent;border:none; outline: none;margin-top: 15%;position: relative;z-index: 3;right: 0;'>  <i class='fas fa-chevron-circle-right' style='font-size:  100px ;'></i></button>
 "; ?></td></tr></table>




<?php

 
  $compteur=0;$i1=0;


  echo "<div  class='firstdivlist' style=' margin-left:20px' >";

for ($j=$i1; $j < $x ; $j++) { 
if ($compteur<=4) { ?>



<button class=' session1' value="<?php echo $tabId[$j]; ?>" onclick="showlink(this.value)" style="width: 19%;height: 40%;background: white;position: relative;" >

 

<?php
$compteur=$compteur+1;
echo $j;
echo "<img src=".$tabSrc["$j"]." class='myImg hide'  >";

?>






<center>
  <div  class="" style="position: absolute;z-index:3;top:0">
  	<?php 


  	 ?>
         <div  style="height: 100%;width: 100%"class="Fullscreen">

<?php echo $j; ?>
          <table  style="width: 100%;height: 90%;position:relative; top:0 ">
            <tr style="width: 100%;height: 100%;">
             <center> <td  style="width: 80%; " >
                        <div class="img1" style=" border: 2px solid white;width: 80%; background-color: white;float: right" >     <img style="vertical-align: middle;height: 403px" src="" alt=""  />  </div> 
                        
                    </td>
                  <td style=" position:relative;height: 403px  ;">
                   <center>

          
       <div class="count"  style=" border: 2px solid white;width: auto;height: 401px;background-color: white;float:left">


<?php 
echo $j;
$s=0;
$tabimglength=0;
$a=0;
 
$tabSrc2 = array();
$req3="select * from img";
$query3=mysqli_query($con,$req3);
while ($row3=mysqli_fetch_assoc($query3)) {
if ($row3['Nid']==$tabId[$j]) {
	echo $tabId[$j];
    $tabimglength=$tabimglength+1;
$tabSrc2["$s"]=$row3['Img'];
$s=$s+1;
  }  
}

if ($s>3) {
	?>

<center>
<table class=" " style="position: absolute; height: 403px; "><tr style="padding: 0"><td style="padding-left:25%;vertical-align: middle"><?php 
       echo "<center><button  onclick='myFunctionadd1()' style='width:auto; margin-left:40px; border:none; outline: none;background:transparent;position: absolute;z-index: 5;top:0'>  <i class='fas fa-chevron-circle-up myFunctionadd1' style='font-size:  60px ;'></i></button></center>";  
                      ?> </td></tr><tr><td style="position: relative;bottom:0;padding-left:25%;">
                        <?php  
 //executez que si la longueur du tas est sup à3
                             echo "<center><button onclick='myFunctionminus1()'  style='border:none; outline: none;position: absolute;z-index: 5;bottom:0;margin-left:40px; background:transparent;'>  <i class='fas fa-chevron-circle-down myFunctionminus1' style='font-size:  60px ;'></i></button></center> "; 
?></center></td></tr></table></center>



<?php

}

echo "<div class='minus1 '><div style='width: 100%;background:red' >";
$a=$a+1;
if ($a>$s-4) {
	$a=$a-1;
}
for ($i=$a; $i <$a+4; $i++) { 
 echo "<div  style='width:auto;height: 100px; '>";

if($i<=$s-1){
     echo " <img src='".$tabSrc2["$i"]."' class='myImg' >";}
    echo "</div >" ;
 } echo "</div>";

echo "</div >" ;


echo "<div class='add1 ' style='display:none'><div style='width: 100%;background:green;' >";
$a=$a-1;
if ($a<0) {
	$a=$a+1;
}
for ($i=$a+1; $i <$a+5 ; $i++) { 
 echo "<div  style='width:auto;height: 100px; '>";

if($i<=$s-1){
     echo " <img src='".$tabSrc2["$i"]."' class='myImg' >";}
    echo "</div >" ; 
 }echo "</div>";

echo "</div >" ;





 ?>
</div>

                       </center>



                     </td>
              
           </center> </tr><tr> <button class="close1" style="background: none;color: white ; height: auto;float: right"><h3>Fermé</h3></button></tr>
          </table>
      </div>
  </div>
</center>



<?php







echo  "</button>";





 ?>



<?php	
}

}

echo "</div>";

 ?>
  



<?php 






















  echo "<div class='minus' style=' margin-left:20px' >";$compteur=0;
$i1=$i1+1;
for ($j=$i1; $j < $x ; $j++) { 
if ($compteur<=4) {
    echo "<a  href='home.php?Id=".$tabId[$j]."'></a><div class='hide' style='width: 19%;height: 40%;background: white; bottom: 0; float: left;margin-right: 2px;position:relative'>";
echo "<img src=".$tabSrc["$j"]." class='myImg' ></div>";
$compteur=$compteur+1;
}


 
}

echo "</div>";

  echo "<div class='add' style=' margin-left:20px' >";$compteur=0;
$i1=$i1-1;
for ($j=$i1; $j < $x ; $j++) { 
if ($compteur<=4) {
    echo "<a  href='#home.php?Id=".$tabId[$j]."'></a><div class='hide' style='width: 19%;height: 40%;background: white; bottom: 0; float: left;margin-right: 2px;position:relative'>";
echo "<img src=".$tabSrc["$j"]." class='myImg' ></div>";
$compteur=$compteur+1;
}


 
}

echo "</div>";

?>




</button></div>



 ?>






<br style="clear: both;">
<hr class="hide" style="clear: both;">


















  

  



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

function showpic(str) {
  var xhttp;  
  if (str == "") {
    document.getElementById("txtHint2").innerHTML = "";
    return;
  }
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("txtHint2").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "getcommune.php?q="+str, true);
  xhttp.send();
}



  function addState() { 
            let stateObj = { id: "100" }; 
              
            window.history.pushState(stateObj, 
                     "Page 2", "/agenceimmobiliere/home.php?Id=3"); 
        } 





function showlink1(str1,a) {

  var xhttp;  
  if (str1 == "") {
    document.getElementById("txtHint3").innerHTML = "";
    return;                 
  }
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("txtHint3").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "diapo.php?Id="+str1+"&a="+a, true);
  xhttp.send();
 $('.minus1').hide();
   $('.add1').hide(); 

}


</script>

    <script>
            $(document).ready(function(){
            
      $('.Fullscreen').hide();
                 //your code for stuff should go here
                 $('.Fullscreen').css('height');
                 //for when you click on an image
               $("body").on( "click",".myImg", function(){
                     var src = $(this).attr('src'); //get the source attribute of the clicked image
                     $('.img1 img').attr('src', src); //assign it to the tag for your fullscreen div
                     $('.Fullscreen').show();
                     $('.Fullscreen').fadeIn();
                     $('body').css("max-height","0px"); 
                      $('.hide').hide();
  document.getElementById(".hidee").style.display = "block";
                      $('.hidee').show();
                      
                 });



 $(document).on( "click",".myFunctionadd1", function(){
  $(".add1").replaceAll($(".add1"));
                     $(".minus1").css("display", "none");
                      $(".add1").css("display", "block");

                 });


       

                        $(document).on( "click",".myFunctionminus1", function(){
                      $("document").replaceAll($(".minus1"));
                      $(".add1").css("display", "none");
                      $(".minus1").css("display", "block");

                    });
                 
                







                 $('.close1').click(function(){

                     $('.Fullscreen').hide(); //this will hide the fullscreen div if you click away from the image. 
               
                 $('.hide').show();
                 $('body').css("max-height","100%"); 

                
                 });

           });


             $('.firstdivlist').show(); 
  $('.minus').hide();
   $('.add').hide(); 
function  myFunctionadd(){
  $('.firstdivlist').hide(); //this will hide the fullscreen div if you click away from the image.           
  $('.minus').hide();
 $('.add').show();
}

function myFunctionminus(){
  $('.firstdivlist').hide(); //this will hide the fullscreen div if you click away from the image. 
                 $('.minus').show();
                   $('.add').hide(); //this will hide the fullscreen div if you click away from the image. 
           } 



        </script>




</body>
</html>