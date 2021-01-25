<?php
	include "database.php";
?>

<?php
$getid=$_GET['id'];
if(isset($getid) && $getid!='')
    {
        $delete_q = "DELETE  FROM `choices_tak` where id=$getid"; 
        $result = $conn->query($delete_q) or die($conn->error.__LINE__);
    }
    include "phptojson.php";
    header("Location: showquestions2.php");
 ?>