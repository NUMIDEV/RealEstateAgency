<center>
  <div  class="hidee " style="position: absolute;z-index:3;top:0">
         <div class="Fullscreen" style="height: 100%;width: 100%">


          <table  style="width: 100%;height: 90%;position:relative; top:0 ">
            <tr style="width: 100%;height: 100%;">
             <center> <td  style="width: 80%; ">
                        <div class="img1" style=" border: 2px solid white;width: 80%; background-color: white;float: right" >     <img style="vertical-align: middle;height: 403px" src="" alt="" />  </div> 
                        
                    </td>
                  <td style=" position:relative;height: 403px  ;">
                   <center>

          
       <div  style=" border: 2px solid white;width: auto;height: 401px;background-color: white;float:left">


<?php 
$s=0;
$tabimglength=0;
$a=0;
 
$tabSrc2 = array();
$req3="select * from img";
$query3=mysqli_query($con,$req3);
while ($row3=mysqli_fetch_assoc($query3)) {
if ($row3['Nid']==$tabId[$j]) {
    $tabimglength=$tabimglength+1;
$tabSrc2["$s"]=$row3['Img'];
$s=$s+1;
  }  
}
if ($s>3) {
	?>

<center>
<table style="position: absolute; height: 403px; "><tr style="padding: 0"><td style="padding-left:25%;vertical-align: middle"><?php 
       echo "<center><button  class='myFunctionadd1' style='width:auto; margin-left:40px; border:none; outline: none;background:transparent;position: absolute;z-index: 5;top:0'>  <i class='fas fa-chevron-circle-up myFunctionadd1' style='font-size:  60px ;'></i></button></center>";  
                      ?> </td></tr><tr><td style="position: relative;bottom:0;padding-left:25%;">
                        <?php  
 //executez que si la longueur du tas est sup à3
                             echo "<center><button class='myFunctionminus1'  style='border:none; outline: none;position: absolute;z-index: 5;bottom:0;margin-left:40px; background:transparent;'>  <i class='fas fa-chevron-circle-down myFunctionminus1' style='font-size:  60px ;'></i></button></center> "; 
?></center></td></tr></table></center>



<?php

}

echo "<div class='minus1'><div style='width: 100%;background:red' >";
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


echo "<div class='add1' style='display:none'><div style='width: 100%;background:green;' >";
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
