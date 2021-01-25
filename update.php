<?php
	include "head.php";
	include "database.php";
?>

<?php
$getid=$_GET['id'];
if(isset($getid) && $getid!='')
    {
        $op_sql = "SELECT * FROM `choices_tak` where id=$getid"; 
        $result = $conn->query($op_sql); 
        if (mysqli_num_rows($result) > 0) 
        {  
            $row = $result->fetch_assoc();
        ?>
        <h1>Zmiana pytania</h1>
           <form action="update_question.php" method="post">
           <input type="hidden" name="id" value="<?php echo $getid ;?>" />
           
           <label>Treść pytania</label>
			<input type="text" id="question" name="question_text" value="<?php echo $row['question']; ?>">
			<div class="label-grid">
			<label>Odpowiedź 1.</label>
			<input type="text" class="answer" id='answer1' name="answer1" value="<?php echo $row['choice1']; ?>">
			<label>Odpowiedź 2.</label>
			<input type="text" class="answer" id='answer2' name="answer2" value="<?php echo $row['choice2']; ?>">
			<label>Odpowiedź 3.</label>
			<input type="text" class="answer" id='answer3' name="answer3" value="<?php echo $row['choice3']; ?>">
			<label>Odpowiedź 4.</label>
			<input type="text" class="answer" id='answer4' name="answer4" value="<?php echo $row['choice4']; ?>">
			</div>
			<label for="trueanswer">Która odpowiedź jest poprawna?</label>

			<label class ="label2"name="trueanswer" id="trueanswer"> </label>
			<input type="number" class ="number" name="correct_choice" min="1" max="4" value="<?php echo $row['answer']; ?>" required/>
					<label>Kategoria</label>
					<select id="category" name="category">
    				<option value="dodawanie_odejmowanie">Dodawanie i odejmowanie</option>
    				<option value="mnozenie">Mnożenie</option>
    				<option value="nierownosci">Nierowności</option>
  					</select>
					
			<input type="submit" name="update" id="submit" value="Zapisz zmiany" class="button">

        <?php

        }
    }