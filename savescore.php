<?php
include "database.php";
?>
<?php
$name = $_POST['username'];

$old= "SELECT score FROM highscore WHERE user='$name'";
$oldscore = $conn->query($old) or die($conn->error.__LINE__);

$new = $_COOKIE['wynik'];

$row = $oldscore->fetch_assoc();
$counter = (int) $row["score"];
 

if(isset($_POST['submit'])&& isset($_POST['username']))
{
    if($new >= $counter)
    {
        
        if ($counter==0){
            $savescore = "INSERT INTO `highscore`(user,score)VALUES ('$name','$new')";
            $insert_row = $conn->query($savescore) or die($conn->error.__LINE__);
            header("Location: end.php");

        }
        else{
            $savescore = "UPDATE `highscore`SET score='$new'WHERE user='$name'";
            $insert_row = $conn->query($savescore) or die($conn->error.__LINE__);
            
            header("Location: end.php");
        }
    }
   
 
    else
    {
        echo "<script>alert('Twój wynik jest niższy niż twój najlepszy'); location.href='end.php';</script>";
        
    }
    
}
?>