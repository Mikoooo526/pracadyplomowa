<?php
include "head.php";
include "database.php";
session_start();
if (!isset($_SESSION['id'])) {
  header("Location:login.php");
}
?>
<?php
	if(isset($_POST['submit'])) {
	
		$question_number = $_POST['question_number'];
		$question_text = $_POST['question_text'];
		$correct_choice = $_POST['correct_choice'];
	
		$choice1 = $_POST['answer1'];
		$choice2 = $_POST['answer2'];
		$choice3 = $_POST['answer3'];
		$choice4 = $_POST['answer4'];
		$category = $_POST['category'];
		
		$sql = "INSERT INTO `choices_tak`(question,choice1,choice2,choice3,choice4,answer,category)
			VALUES('$question_text','$choice1','$choice2','$choice3','$choice4','$correct_choice','$category')";
	
        $insert_row = $conn->query($sql) or die($conn->error.__LINE__);
		
        
	}
	
	
?>
<?php
include "phptojson.php";
?>
<body>
	<main>
	<h1>Dodaj Pytanie</h1>
		<div class="container">
			
    			<form class="contact-form"  name="form1" method="post" action="add_new2.php">
				<input type="hidden"  name="question_number" required />
       			 <label>Treść pytania</label>
					<input type="text" id="question" name="question_text">
					<div class="label-grid">
					<label>Odpowiedź 1.</label>
					<input type="text" class="answer" id='answer1' name="answer1">
					<label>Odpowiedź 2.</label>
					<input type="text" class="answer" id='answer2' name="answer2">
					<label>Odpowiedź 3.</label>
					<input type="text" class="answer" id='answer3' name="answer3">
					<label>Odpowiedź 4.</label>
					<input type="text" class="answer" id='answer4' name="answer4">
					</div>
					<label for="trueanswer">Która odpowiedź jest poprawna?</label>

					<label class ="label2"name="trueanswer" id="trueanswer"> </label>
					<input type="number" class ="number" name="correct_choice" min="1" max="4" required/>
					<label>Kategoria</label>
					<select id="category" name="category">
    				<option value="dodawanie_odejmowanie">Dodawanie i odejmowanie</option>
    				<option value="mnozenie">Mnożenie</option>
    				<option value="nierownosci">Nierowności</option>
  					</select>
					
					<input type="submit" name="submit" id="submit" value="Dodaj" class="button">

				</form>
		</div>
	</main>

	
</body>
</html>
