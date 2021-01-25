<?php

include "head.php";
include "database.php";

session_start();
if (isset($_SESSION['id'])){
	header("Location:profile.php");
}
if (isset($_POST['submit'])) {

	$errorMsg = "";

	$email    = mysqli_real_escape_string($conn, $_POST['email']);
	$password = mysqli_real_escape_string($conn, $_POST['password']); 
	
if (!empty($email) || !empty($password)) {
	  $query  = "SELECT * FROM accounts WHERE email = '$email'";
	  $result = mysqli_query($conn, $query);
	  if(mysqli_num_rows($result) == 1){
		while ($row = mysqli_fetch_assoc($result)) {
		  if (password_verify($password, $row['password'])) {
			  $_SESSION['id'] = $row['id'];
			  $_SESSION['username'] = $row['username'];
			  header("Location:profile.php");
		  }else{
			  $errorMsg = "Email lub hasło jest błędne.";
		  }    
		}
	  }else{
		$errorMsg = "Brak użytkownika o tym haśle.";
	  } 
  }
}

if (isset($errorMsg)) {
    echo "<script>alert('$errorMsg'); location.href='login.php';</script>";
  }
?>

<!DOCTYPE html>
<html>
	
	<body>
		
			<h1>Logowanie</h1>
			<form  action="" method="POST">
				<div class="login">
				<input type="email" name="email" placeholder="Email"  required>
				
                <input type="password" name="password" placeholder="Hasło"  required>
                </div>
                <input type="submit" name="submit" class="button" value="Zaloguj" >
                <p>Jesteś nowym użytkownikiem? <a href="registry.php">Rejestracja</a></p>
			</form>
		
	</body>
</html>