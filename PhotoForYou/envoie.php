<?php
require('login.php');

// Enregistrer les informations des champs du formulaire d'inscription
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$email = $_POST['email'];
$type = $_POST['choixType'];

// Hachage du mot de passe pour plus de sécuriter
$mdp = password_hash($_POST['motdepasse1'], PASSWORD_DEFAULT);

// Compter le nombre d'ID dans la table users. Ca servira pour plus tard
$donnees = $base->prepare('SELECT COUNT(IdUsers) AS ID FROM users');
$donnees->execute();
foreach($donnees as $value){
	$value = $value;
}
$id = $value[0]+1;

// Insertion des données du formulaire dans la table users
$insertion = $base->prepare('INSERT INTO users (NomUsers,PrenomUsers,EmailUsers,mdpUsers,Credit) VALUES (:nom,:prenom,:email,:mdp,:credit)');
$insertion->execute(array(':nom'=>$nom,':prenom'=>$prenom,':email'=>$email,':mdp'=>$mdp,':credit'=>0));

// Insertion de l'id du nouveau inscrit dans la table client ou photographe dépendant du type d'utilisateur choisie
if ($type == "Photographe") {
	
	$insertionID = $base->prepare('INSERT INTO photographes (IdPhotographe) VALUES ('.$id.')');
	$insertionID->execute();
	echo "vous êtes un photographe </br>";
}

else {
	
	$insertionID = $base->prepare('INSERT INTO client (IdClient) VALUES ('.$id.')');
	$insertionID->execute();
	echo "vous êtes un client </br>"; 
} 

echo '<p style="color:green;"> vos données ont été enregistrées</p>';

//echo $nom.' '.$prenom.' '.$email.' '.$mdp.' '.$date;
?>
<head>

</head>
<body>
  <?php
    include ("header.inc.php");
  ?>
</body>