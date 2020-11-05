<?php
require('login.php');

$emailuser = $_POST['emailuser'];
$p = 0;

$donnees = $base->prepare('SELECT IdUsers, EmailUsers, mdpUsers FROM users WHERE EmailUsers = :email');
$resultat = array();
$donnees->execute(array(':email'=>$emailuser));
foreach($donnees as $resultat){
	echo '';
}
if(!$resultat){
	echo '';
}
else{
	$CorrectPassword = password_verify($_POST['userpw'], $resultat['mdpUsers']);
}
if(!$resultat)
{
	$p = 3;
}

else
{
	if($CorrectPassword)
	{
		$p = 1;
		session_start();
		$donnees = $base->prepare('SELECT IdPhotographe FROM photographes');
		$donnees->execute();
		foreach($donnees as $id){
			if($id['IdPhotographe'] == $resultat['IdUsers']){
				$_SESSION['type']='photographe';
			}
			else{
				$_SESSION['type']='client';
			}
		}
	$donnees = $base->prepare('SELECT * FROM Users WHERE IdUsers = '.$resultat['IdUsers']);
	}

	else
	{
		$p = 2;
	}
}
?>
<head>
	<meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
<body>
  <?php
    include ("header.inc.php");
  ?>
  <div class="container">
    <div class="jumbotron">
      <h1 class="display-4">
      	<?php
      	if($p == 1){
      		echo 'Connexion réussis';
      	}
      	else{
      		echo 'Connexion échouer';
      	}
      	?>
      </h1>
      <hr class="my-4">
      <p>
      	<?php
      	if($p == 1){
      		$donnees->execute();
      		foreach($donnees as $name){
      			echo 'Bon retour parmis nous '.$name['NomUsers'].' '.$name['PrenomUsers'].'.';
      		}
      	}
      	else{
      		if($p == 2){
      			echo 'Le mot de passe est incorrect';
      		}
      		else{
      			echo 'L\'adresse mail n\'éxiste pas';
      		}
      	}
      	?>
      </p>
    </div>
</body>