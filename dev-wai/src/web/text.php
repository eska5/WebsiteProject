<?php
	session_start();
	if(!isset($_SESSION['id']))
	{
	        header("Location: zaloguj.php");
	}
	else
	{
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



<form action="text.php" method="post" enctype="multipart/form-data">
   <center> <input type="file" name="fileToUpload" id="fileToUpload"> </center>
    <p>tytul<input type="text" name="tytul"></p>
    <p>autor<input type="text" name="autor" value="<?php echo $_SESSION['id'] ?>"></p>
    <p>znak wodny<input type="text" name="watermark" required></p>
    <p> private<input type="radio" name="radioButn" value="<?php echo $_SESSION['id'] ?>" ></p>
    <p> public<input type="radio" name="radioButn" value="0" checked></p>
    <center><input type="submit" value="submit" name="submit"> </center>
</form>


<?php

include 'upload.php';


include 'galery.php';
            ?>
            </br>
            <center><a href="wyloguj.php">wyloguj</a><center>
            <?php
        }
            ?>