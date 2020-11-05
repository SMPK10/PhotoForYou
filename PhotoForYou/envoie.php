<?php
require('login.php');

$nom = $_POST['nom'];

$prenom = $_POST['prenom'];

$email = $_POST['email'];

$type = $_POST['choixType'];

$mdp = password_hash($_POST['motdepasse1'], PASSWORD_DEFAULT);

$donnees = $base->prepare('SELECT COUNT(IdUsers) AS ID FROM users');
$donnees->execute();
foreach($donnees as $value){
	$value = $value;
}
$id = $value[0]+1;

$insertion = $base->prepare('INSERT INTO users (NomUsers,PrenomUsers,EmailUsers,mdpUsers,Credit) VALUES (:nom,:prenom,:email,:mdp,:credit)');
$insertion->execute(array(':nom'=>$nom,':prenom'=>$prenom,':email'=>$email,':mdp'=>$mdp,':credit'=>0));

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