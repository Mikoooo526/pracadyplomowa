<?php
include "head.php";

session_start();
if (!isset($_SESSION['id'])) {
  header("Location:login.php");
}
?>

    <div class='container'> 
        <div id="home" class="flex-centre flex-column">
        <h1 id="quiz">Quiz</h1>
        <a class="button" href="/game.html">Graj</a>
        <a class="button" href="/show_highscore.php">Najlepsze wyniki</a>
        <a class="button" href="/showquestions2.php">Pytania</a>
    </div>


    </div>
</body>
</html> 