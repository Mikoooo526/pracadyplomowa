
<?php
	include "head.php";
    include "database.php";
    session_start();
if (!isset($_SESSION['id'])) {
  header("Location:login.php");
}
?>
<html>
<body>
<?php 

$query = "SELECT * FROM `choices_tak` WHERE category = 'dodawanie_odejmowanie'";
if(isset($_POST['submit'])) {
    $category = $_POST['category'];
    $query = "SELECT * FROM `choices_tak` WHERE category = '$category'";
}


echo '<h1>Wszystkie pytania </h1>
    <table> 
      <tr> 
          <td> id </td> 
          <td> Pytanie </td> 
          <td> Odpowiedz #1 </td> 
          <td> Odpowiedz #2 </td> 
          <td> Odpowiedz #3 </td>
          <td> Odpowiedz #4 </td>
          <td> Poprawna odpowidź </td>
          
          
      </tr>';

if ($result = $conn->query($query)) {
    while ($row = $result->fetch_assoc()) {
        $id = $row["id"];
        $question = $row["question"];
        $choice1 = $row["choice1"];
        $choice2 = $row["choice2"];
        $choice3 = $row["choice3"];
        $choice4 = $row["choice4"];
        $answer = $row["answer"];
        $edit = "<a href='update.php?id=".$row['id']."'>Edytuj</a>";
        $delete = "<a href='delete.php?id=".$row['id']."'>Usuń</a>";
        $category = $row["category"];
       

        echo '<tr> 
                  <td>'.$id.'</td> 
                  <td>'.$question.'</td> 
                  <td>'.$choice1.'</td> 
                  <td>'.$choice2.'</td> 
                  <td>'.$choice3.'</td>
                  <td>'.$choice4.'</td>
                  <td>'.$answer.'</td>
                  <td>'.$edit.'</td>
                  <td>'.$delete.'</td> 
                  
                  
                  
                  
              </tr>'

              
              ;
    }
    
    
    
    $result->free();
} 
?>
<form name="form1" method="post" action="">
          <label>Kategoria:</label>
          <select id="category" name="category">
          <option value="dodawanie_odejmowanie">Dodawanie i odejmowanie</option>
          <option value="mnozenie">Mnożenie</option>
          <option value="nierownosci">Nierowności</option>
          </select>
          <input type="submit" name="submit" value="Filtruj" >
</form>
</body>


</html>