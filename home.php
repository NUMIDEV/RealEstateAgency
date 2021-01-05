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



if (isset($_GET['btn'])) {


 $typedebien=$_GET['typedebien'];
$typedannonce=$_GET['typedannonce'];
$wilaya=$_GET['wilaya'];

if ($wilaya>0) {
$commune =$_GET['commune'];

}else{
  $commune = 0;
}












$reqannonce="";






if ($typedebien!=0) {
    if ($typedannonce!=0) {
        if ($wilaya!=0) {

             if ($commune!=0) {

               $reqannonce="select * From seller where Typedebien='$typedebien' and Typedannonce='$typedannonce' and Wilaya='$wilaya' and Commune='$commune' ";
             }
             else{
               $reqannonce="select * From seller where Typedebien='$typedebien' and Typedannonce='$typedannonce' and Wilaya='$wilaya' ";
             }

        }
        else{
               $reqannonce="select * From seller where Typedebien='$typedebien' and Typedannonce='$typedannonce'";
        }     
    }
    else{
        if ($wilaya!=0) {
             if ($commune!=0) {

               $reqannonce="select * From seller where Typedebien='$typedebien'  and Wilaya='$wilaya' and Commune='$commune' ";
             }
             else{
               $reqannonce="select * From seller where Typedebien='$typedebien'  and Wilaya='$wilaya' ";
             }

        }
        else{
          $reqannonce="select * From seller where Typedebien='$typedebien'   ";
        }     


    }

      


}
else{

   if ($typedannonce!=0) {
        if ($wilaya!=0) {
             if ($commune!=0) {

               $reqannonce="select * From seller where  Typedannonce='$typedannonce' and Wilaya='$wilaya' and Commune='$commune' ";
             }
             else{
               $reqannonce="select * From seller where  Typedannonce='$typedannonce' and Wilaya='$wilaya' ";
             }

        }
        else{
               $reqannonce="select * From seller where  Typedannonce='$typedannonce'";
        }     
    }
    else{
        if ($wilaya!=0) {
             if ($commune!=0) {

               $reqannonce="select * From seller where  Wilaya='$wilaya' and Commune='$commune' ";
             }
             else{
               $reqannonce="select * From seller where  Wilaya='$wilaya' ";
             }

        }
        else{
          $reqannonce="select * From seller ";
        

        }     


    }

}



$tabannonce = array();
$queryannonce=mysqli_query($con,$reqannonce);

$i3=0;
for ($i=0; $i <$x ; $i++) { 
 $rowannonce=mysqli_fetch_assoc($queryannonce);
$tabannonce["$i3"]=$rowannonce['Id'];
$i3=$i3+1;
}

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

.firstdivlist{
  padding: 0;
  margin: 0;
   overflow-y: hidden; 
  overflow-x:scroll ;
 
    white-space: nowrap;
}
   .session1{

   }

  </style>





<body>





  <div class="center hide" style="position: relative;z-index: 2;height: 100%;vertical-align: middle;">

  <form method="get" action="<?php echo $_SERVER['PHP_SELF'] ;?>"><center>
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
<br><br>
<center><input type="submit" name="btn" value="Recherche"></center>
</center></form><br>

<center>
	<a href="customer.php"><button style="background-color: red; border: none;padding: 5px;text-decoration: none;"  ><dt> Inscrire un client</dt></button></a>

<a href="Seller.php"><button style="background-color: red; border: none;padding: 5px;text-decoration: none;"  ><dt> Inscrire un bien immobilier</dt></button></a>
</center>
<br>
<hr class="hide">

<?php
if(isset($i3)){}else{
  $i3=0;
}


$tabSrc2=array();$i2=0;
$reqsrc2="SELECT * FROM seller";
$querysrc2=mysqli_query($con,$reqsrc2);
while ($rowsrc2=mysqli_fetch_assoc($querysrc2)) {
  for ($i=0; $i <$i3 ; $i++) { 
 if($rowsrc2["Id"]==$tabannonce["$i"]){
      $tabSrc2["$i"]=$rowsrc2["Src"];
$i2=$i2+1;
 }
} }

  
?>


 



 <?php 
 if($i2==0){
 echo "<div class='session1'   style=' height: 30%;background:white;position:relative;' ></div>";
 
 }
  $compteur=0;$i1=0;



  echo "<div  class='firstdivlist' style=' position:relative;' >";

for ($j=$i1; $j < $i2 ; $j++) { 

?>




<button class='hide session1' id="s" value="<?php echo $tabannonce["$j"]; ?>" onclick="showlink(this.value)" style="width: 19%;background: white;position:relative;" >

<?php
echo "<img src=".$tabSrc2["$j"]." class='myImg' style='height: 130px;'></button>";
  

$compteur=$compteur+1;



 
}

echo "</div>";

  echo "<div class='minus' style=' margin-left:20px;background:white' >";$compteur=0;
$i1=$i1+1;
for ($j=$i1; $j < $i2 ; $j++) { 
if ($compteur<=4) {?>
   <button class='hide session1' id="s" value="<?php echo $tabannonce["$j"]; ?>" onclick="showlink(this.value)" style="width: 19%;height: 40%;background: white;position: relative;" >

<?php

echo "<img src=".$tabSrc2["$j"]." class='myImg' ></button>";
$compteur=$compteur+1;
}


 
}

echo "</div>";

  echo "<div class='add' style=' margin-left:20px;background:white' >";$compteur=0;
$i1=$i1-1;
for ($j=$i1; $j < $i2; $j++) { 
if ($compteur<=4) {?>
  <button class='hide session1' id="s" value="<?php echo $tabannonce["$j"]; ?>" onclick="showlink(this.value)" style="width: 19%;height: 40%;background: white;position: relative;" >

<?php

echo "<img src=".$tabSrc2["$j"]." class='myImg' ></button>";
$compteur=$compteur+1;
}


 
}

echo "</div>";

?>




</button>


<hr class="hide" style="clear: both;">


</div>


       





  <div  id="hidee " style="position: absolute;z-index:3;top:0;">
         <div id="Fullscreen" style="height: 100%;width: 100%">


          <table  style="width: 100%;height: 90%;position:relative; top:0 ;">
            <tr style="width: 100%;height: 100%;">
              <td  style="width: 65%;">
                        <div class="img1" style=" border: 2px solid white;width: 90%; background-color: white;float: right" >     <img style="vertical-align: middle;height: 403px" src="" alt="" />  </div> 
                        
                    </td>
                  <td style=" position:relative;height: 403px ;">
                  

          
       <div id="txtHint3"style=" border: 2px solid white;width: 95%;height: 401px;background-color: white;float:left">

  </div>




                     </td>
              
           </tr><tr> <button class="close1" style="background: none;color: white ; height: auto;float: right"><h3>Fermé</h3></button></tr>
          </table>
      </div>
  </div>




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





function showlink(str1,a) {

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
            
                 //your code for stuff should go here
                 $('#Fullscreen').css('height');
                 //for when you click on an image
               $("body").on( "click",".myImg", function(){
                     var src = $(this).attr('src'); //get the source attribute of the clicked image
                     $('.img1 img').attr('src', src); //assign it to the tag for your fullscreen div
                     $('#Fullscreen').fadeIn();
                     $('body').css("max-height","0px"); 
                      $('.hide').hide();
  document.getElementById("#hidee").style.display = "block";
                     
                      
                 });



                 $('.close1').click(function(){

                     $('#Fullscreen').hide(); //this will hide the fullscreen div if you click away from the image. 
               
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