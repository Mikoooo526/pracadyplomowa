<?php
  include "head.php";
  include "database.php";
  session_start();
if (!isset($_SESSION['id'])) {
  header("Location:login.php");
}
$user = $_SESSION['username'];
  ?>
  <html>
<body>
<?php

$query = "SELECT * FROM `highscore`WHERE user='$user'";


echo '<h1>Twoje wyniki </h1>
    <table> 
      <tr> 
          <td> Użytkownik </td> 
          <td> Wynik </td> 
      </tr>';

if ($result = $conn->query($query)) {
    while ($row = $result->fetch_assoc()) {
        $user = $row["user"];
        $wynik = $row["score"];
        
       

        echo '<tr> 
                  <td>'.$user.'</td> 
                  <td>'.$wynik.'</td>      
              </tr>';
    }
    
    
    $result->free();
} 
?>
</body>
</html>