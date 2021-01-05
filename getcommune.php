<?php 
session_start();
// Include the database config file 
include 'connect.php'; 
$sSQL= 'SET CHARACTER SET utf8'; 

mysqli_query($con,$sSQL) 
or die ('Can\'t charset in DataBase');
$q=$_REQUEST['q'];




$sql1 = "SELECT Fr,Id,Nid
FROM commune WHERE Id = $q";
$query1=mysqli_query($con,$sql1);

echo "<span>Commune </span>";
echo'<select name=\'commune\' > <option value=\'0\'>-----------</option>';

while ($row1=mysqli_fetch_assoc($query1) ){
	

		

	
		

	echo 	'<option value='.$row1['Nid'].'>'. $row1['Fr'].'</option>';
   
 

	
} echo '</select> ';



 

?>