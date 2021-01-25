<?php
session_start();
if (!isset($_SESSION['id'])) {
    header("Location:login.php");
}
$user = $_SESSION['username'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
 

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz</title>
    <link rel="stylesheet" href="style.css">
    <?php
      $points =$_COOKIE['wynik'];
    ?>
    
    
    
</head>
  <body>
    <div class="container">
      <div id="end" class="flex-center flex-column">
        <h1 >Wynik: <?php echo($points); ?></h1>
        <form action="savescore.php" method="post">
          <input type="hidden" value="<?php echo $user ?>" name="username" /> 
          <input type="submit" name="submit" id="submit" value="Zapisz" class="button">
          </button>
        </form>
        <a class="button" href="/game.html">Zagraj ponownie</a>
        <a class="button" href="/index.php">Powrót</a>
        
    </div>
    
  </body>
</html>