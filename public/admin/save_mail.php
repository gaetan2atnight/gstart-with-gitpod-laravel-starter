<?php 
require_once($_SERVER['DOCUMENT_ROOT']."/classes/mailing.php");

$mailingClass = new Mailing();

if(isset($_POST['titre']) && isset($_POST['contenu'])){
	if($mailingClass->saveMailing($_POST['titre'], $_POST['contenu']))
		echo "Mailing correctement sauvegardé !";
	else
		echo "Erreur de sauvegarde du mailing ! (Erreur 1)";
}else{
	echo "Erreur de sauvegarde du mailing ! (Erreur 2)";
}
?>