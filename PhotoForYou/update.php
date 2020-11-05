<?php

require('login.php');

$mdpauto = password_hash('fdg', PASSWORD_DEFAULT);

echo $mdpauto.'</br></br>';

?>