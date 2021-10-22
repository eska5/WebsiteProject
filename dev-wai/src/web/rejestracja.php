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





<h1>Rejestracja</h1>
<form action="rejestracja.php" method="POST">
<table>
<tr><td><p>Email:</td><td><input name="email" type="text"></p></td></tr>
<tr><td><p>Login:</td><td><input name="login" type="text"></p></td></tr>
<tr><td><p>Hasło:</td><td><input name="haslo" type="password"></p></td></tr>
<tr><td><p>Powtórz hasło:</td><td><input name="haslo2" type="password"></p></td></tr>
</table>
<input type="submit" value="submit" name="submit">
<?php
if(isset($_POST["submit"])) {
    $email=isset($_POST["email"])?$_POST["email"]:'';
    $login=isset($_POST["login"])?$_POST["login"]:'';
    $haslo=isset($_POST["haslo"])?$_POST["haslo"]:'';
    $haslo2=isset($_POST["haslo2"])?$_POST["haslo2"]:'';

    if(($email!="")&&($haslo2!="")&&($login!="")&&($haslo!=""))
    {
    $manager = new MongoDB\Driver\Manager('mongodb://wai_web:w%40i_w3b@127.0.0.1:27017/wai');
    $filter=array();
    $options=array();
    $query = new MongoDB\Driver\Query($filter,$options);
    $rows = $manager->executeQuery('wai.users',$query);
    $iftrue=1;
    if($haslo!=$haslo2)
    {
        $iftrue=0;
        echo "błędne hasło";
    }
    foreach ($rows as $r)
            {
                    if($r->login==$login){
                    $iftrue=0;
                    echo "login zajęty";
                    }
            }
    if($iftrue==1)
    {
    $bulk = new MongoDB\Driver\BulkWrite;
    $bulk->insert(['login'=>$login, 'email'=>$email,'haslo'=>password_hash($haslo,PASSWORD_DEFAULT)]);
    $manager->executeBulkWrite('wai.users',$bulk);
    echo "zarejestrowano pomyślnie";
    }
}
else
{
    echo "uzupełnij wszystkie pola";
}
}
?>
<a href="zaloguj.php">Login</a>
</form><br>

</body>