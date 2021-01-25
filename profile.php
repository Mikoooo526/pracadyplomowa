<?php
  include "head.php";
  include "database.php";
  session_start();
if (!isset($_SESSION['id'])) {
  header("Location:login.php");
}
?>

<body>
<h1>Witaj <?php echo ucwords($_SESSION['username']); ?>!</h1>
<div class='profile'>
<div class="flex-centre flex-column">
<a href="index.php" class="button">Zagraj</a>
<a href="passwordchange.php" class="button">Zmiana hasła</a>
<a href="yourscore.php" class="button">Twoje wyniki</a>
<a href="logout.php" class="button">Wyloguj</a>
</div>
</div>
</body>