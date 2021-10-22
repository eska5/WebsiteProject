<?php
    session_start();
	
	if ((!isset($_POST['login'])) || (!isset($_POST['haslo'])))
	{
		header('Location: zaloguj.php');
		exit();
    }
    
    $login=isset($_POST["login"])?$_POST["login"]:'';
    $haslo=isset($_POST["haslo"])?$_POST["haslo"]:'';

    $manager = new MongoDB\Driver\Manager('mongodb://wai_web:w%40i_w3b@127.0.0.1:27017/wai');
    $filter=array();
    $options=array();
    $query = new MongoDB\Driver\Query($filter,$options);
    $rows = $manager->executeQuery('wai.users',$query);
    $iftrue=0;
    foreach ($rows as $r)
            {
                    if(($r->login==$login)&&(password_verify($haslo,$r->haslo))){
                    $iftrue=1;
                    unset($_SESSION['blad']);
                    $_SESSION["id"]=$login;
                    }
            }
    if($iftrue==1)
    {
        $_SESSION['zalogowany'] = true;
        header("Location: text.php");
    }
    else
    {
        $komunikat='Niepoprawny identyfikator lub hasło';
    	$_SESSION['blad'] = '<span style="color:red">Nieprawidłowy login lub hasło!</span>';
    header("Location: zaloguj.php");
    }
?>