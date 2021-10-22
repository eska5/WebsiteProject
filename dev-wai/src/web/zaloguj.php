<?php
	session_start();
	
	if ((isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany']==true))
	{
		header('Location: text.php');
		exit();
	}
?>


<!DOCTYPE html>
<html lang="en">
    <head>
            <link rel="stylesheet" type="text/css" href="style1.css">

        <title>
            Gry komputerowe
        </title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
            <div class="header">
                    <h1>Competitive Gaming</h1>
                   
                  </div>
                  
                  <div class="topnav">
                    <a href="index.html" >Games</a>
                    <a href="Events.html">Contact me</a>
                    <a href="#" class="active">Galeria</a>
                    <a href="tickrate.html">Reaction Test</a>
                    <a href="search.html">Search img</a>
                  </div>

<h1>Logowanie</h1>
<form action="zaloguj2.php" method="POST">
<table><p>
<tr><td><p>Login:</td><td><input name="login" type="text"></p></td></tr>
<tr><td><p>Hasło:</td><td><input name="haslo" type="password"></p></td></tr>
</table>
<input type="submit" value="submit" name="submit">
<a href="rejestracja.php">Rejestracja</a>
<?php
 if(isset($_SESSION['blad']))   
  echo $_SESSION['blad'];
?>
</form><br>
</body>