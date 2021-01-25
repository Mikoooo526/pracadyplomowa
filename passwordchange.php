<?php
  include "head.php";
  include "database.php";
  session_start();
if (!isset($_SESSION['id'])) {
  header("Location:login.php");
}

  if (isset($_POST['submit'])) {

    $id = $_SESSION['id'];
	$errorMsg = "";

	$new    = mysqli_real_escape_string($conn, $_POST['newpassword']);
	$new1 = mysqli_real_escape_string($conn, $_POST['newpassword2']); 
	if ($new!==$new1){
        $errorMsg = "Hasła nie są identyczne";
    }
    else if(strlen($new) < 6) {
        $errorMsg  = "Hasło powinno mieć conajmniej 6 znaków!";
    }
    else
    {
       $password = password_hash($new, PASSWORD_DEFAULT);
       $update_pass = "UPDATE `accounts`SET password='$password' WHERE id='$id'";
       $result = mysqli_query($conn, $update_pass);
      if ($result == true) {
          header("Location:profile.php");
      }
        else{
            $errorMsg  = "Błedne dane. Spróbuj ponownie!";
        }
    }

}

if (isset($errorMsg)) {
    echo "<script>alert('$errorMsg'); location.href='passwordchange.php';</script>";
  }
?>
<main>
	<h1>Rejestracja</h1>
		<div class="container">
			
    			<form action="" method="POST">	
					
					<label>Nowe hasło</label>
					<input type="password" class="answer"  name="newpassword" placeholder="Nowe hasło" required >
					<label>Powtórz hasło</label>
					<input type="password" class="answer"  name="newpassword2" placeholder="Powtórz hasło" required>
					<input type="submit" name="submit" id="submit" value="Zmień hasło" class="button" required>
                    <p>Jeśli nie chcesz zmieniać hasła to <a href="profile.php">Cofnij</a></p>

				</form>
		</div>
	</main>
    