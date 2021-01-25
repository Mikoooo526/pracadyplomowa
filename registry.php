<?php
include "head.php";
include "database.php";
?>
<?php

  if (isset($_POST['submit'])) {
 
      $username = mysqli_real_escape_string($conn, $_POST['username']);
      $email    = mysqli_real_escape_string($conn, $_POST['email']);
      $password = mysqli_real_escape_string($conn, $_POST['password']);
      
      
      $sql = "SELECT * FROM accounts WHERE email = '$email'";
      $execute = mysqli_query($conn, $sql);
        
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
          $errorMsg = "Błędny adres email!";
      }else if(strlen($password) < 6) {
          $errorMsg  = "Hasło powinno mieć conajmniej 6 znaków!";
      }else if($execute->num_rows == 1){
          $errorMsg = "Ten adres email jest juz uzywany!";
      }else{
          $password = password_hash($password, PASSWORD_DEFAULT);
          $query= "INSERT INTO accounts(username,email,password,isAdmin) 
                  VALUES('$username','$email','$password','0')";
          $result = mysqli_query($conn, $query);
          $score = "INSERT INTO highscore(user,score) 
          VALUES('$username','0')";
          $set = mysqli_query($conn, $score);

      if ($result == true) {
          header("Location:login.php");
      }else{
          $errorMsg  = "Błedne dane. Spróbuj ponownie!";
      }
    }
  }
  if (isset($errorMsg)) {
    echo "<script>alert('$errorMsg'); location.href='registry.php';</script>";
  }
  ?>


<main>
	<h1>Rejestracja</h1>
		<div class="container">
			
    			<form action="" method="POST">	
					<label>Login</label>
					<input type="text" class="answer"  name="username" placeholder="Login" required>
					<label>Hasło</label>
					<input type="password" class="answer"  name="password" placeholder="Hasło" required >
					<label>Email</label>
					<input type="text" class="answer"  name="email" placeholder="Email" required>
					<input type="submit" name="submit" id="submit" value="Zarejestruj" class="button" required>
                    <p>Jeśli masz już konto to <a href="login.php">Zaloguj</a></p>

				</form>
		</div>
	</main>