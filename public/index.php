<?php
require_once($_SERVER['DOCUMENT_ROOT']."/classes/functions.php");
require_once($_SERVER['DOCUMENT_ROOT'].'/classes/cookies.php');
require_once($_SERVER['DOCUMENT_ROOT']."/classes/users.php");
if($_SERVER['REQUEST_URI'] == "/index.php" || $_SERVER['REQUEST_URI'] == "/index.html"){
	header("HTTP/1.1 301 Moved Permanently");
	header("Location: https://www.gstart.fr/");
	exit;
	die("Redirection");
}
	
$showHome = true;
$userClass = new Users();
$idUser = $userClass->getConnectedUser();
if($idUser != false)
	$showHome = false;
else
	$bad = (isset($_COOKIE["idUser"]) && isset($_COOKIE["pass"]));
getHead("GStart - Vos favoris en ligne", true, $showHome); ?>
<div id="connect">
	<?php if($showHome == false){
		echo '<b>'.$idUser.'</b>'." |"; ?>
		<a href="settings.php">Paramètres</a> | 
		<a href="contact.php">Contact</a> | 
		<a href="help.php">Aide</a>
	<?php }
	if($showHome == false){
	?>
		 | 
		<a href="deconnect.php">Déconnexion</a>
	<?php } ?>
</div>
<?php
if($showHome == true){
	include 'accueil.html';
	include 'connect.html';
}else{
	include 'searchBar.html';
	include 'appli.php';
	include 'leftPanel.php';
	include 'rightPanel.php';
}
getFoot();
?>
