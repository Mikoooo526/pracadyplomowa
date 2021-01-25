<?php
	
	include "database.php";
?>
<?php

if(isset($_POST['update']))
    {
        $postid=$_POST['id'];
        $question_text = $_POST['question_text'];
		$correct_choice = $_POST['correct_choice'];
		
		$choice1 = $_POST['answer1'];
		$choice2 = $_POST['answer2'];
		$choice3 = $_POST['answer3'];
        $choice4 = $_POST['answer4'];
        $category = $_POST['category'];
        
        $uptade_q = "UPDATE `choices_tak`SET question='$question_text',choice1='$choice1',choice2='$choice2',choice3='$choice3',choice4='$choice4',answer='$correct_choice',category = '$category' WHERE id='$postid'";
					
		
        $insert_row = $conn->query($uptade_q) or die($conn->error.__LINE__);
        // update user set Name=$_POST['Name'],.... where id=$_POST['id'];

    }
    include "phptojson.php";
    header("Location: showquestions2.php");
?>
<