<?php
require_once($_SERVER['DOCUMENT_ROOT']."/classes/functions.php");
require_once($_SERVER['DOCUMENT_ROOT']."/classes/users.php");

//Traitement si besoin
$idUser=urldecode($_GET["idUser"]);
$userClass = new Users();
include 'treeActions.php';
$arrayFavoris = $userClass->getAllFavoris($idUser);
foreach($arrayFavoris as $label => $url){
	echo "<div class='thumb arroundBox' title='".$label."'>";
	echo "<img src='http://free.pagepeeker.com/v2/thumbs.php?size=m&url=".$url."' border='0' class='img_thumb' onclick='window.open(\"".$url."\")'/>";
	//echo "<img src='http://images.thumbshots.com/image.aspx?cid=GFPjl%2femoRY%3d&v=1&w=150&url=".$url."' border='0' class='img_thumb' onclick='window.open(\"".$url."\")'/>";
	//echo "<img src='http://images.shrinktheweb.com/xino.php?stwembed=1&stwaccesskeyid=f1c956e522b51c2&stwsize=sm&stwurl=www.google.fr'/>";
	echo "<img border='0' alt='Supprimer le favoris' src='/design/images/delete.png' onclick=\"deleteFavoris('".$label."')\"/>";
	echo "<div class='labelThumb'>".$label."</div>";
	echo "</div>";
}
?>
