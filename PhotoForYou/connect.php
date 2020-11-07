<?php
require('login.php');

// Récupération des information des champs de la page de connexion
$emailuser = $_POST['emailuser'];
$p = 0;

// On récupère les données de l'utilisateur avec l'email
$donnees = $base->prepare('SELECT IdUsers, EmailUsers, mdpUsers FROM users WHERE EmailUsers = :email');
$resultat = array();
$donnees->execute(array(':email'=>$emailuser));

// on met les données dans la variables résultats
foreach($donnees as $resultat){
	echo '';
}

// S'il n'y à pas de résultat, la variabe p, qui sera utilisé plus tard, sera égale à 3.
// Sinon, on compare le mot de passe de la page de connexion et le mot de passe dans la base de données
if(!$resultat){
	$p = 3;
}
else{
	$CorrectPassword = password_verify($_POST['userpw'], $resultat['mdpUsers']);
}

else
{
	// Si le mot de passe est correcte, la variable p est égale à 1 et on identifie si l'utilisateur est un client ou un photographe
	// Sinon, la variable p est égale à 2
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
      	// Si p = 1, on affiche un message de bienvenue
      	// Sinon, on affiche un message d'erreur qui explique ce qui va pas
      	$donnees = $base->prepare('SELECT * FROM Users WHERE IdUsers = '.$resultat['IdUsers']);
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