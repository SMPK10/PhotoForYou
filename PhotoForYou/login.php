<?php
try {
	$base = new PDO('mysql:host=localhost; dbname=pfy; charset=utf8','root','');
} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}
?>