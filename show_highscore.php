<?php
	include "head.php";
	include "database.php";
?>
<html>
<body>
<?php 

$query = "SELECT * FROM `highscore`ORDER BY score DESC";


echo '<h1>Najlepsze wyniki </h1>
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