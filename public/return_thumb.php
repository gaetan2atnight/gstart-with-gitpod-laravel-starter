<?php
require_once($_SERVER['DOCUMENT_ROOT']."/classes/functions.php");

if(isset($_GET["site"]) && isset($_GET["site"])){
  $imagePath = "http://free.pagepeeker.com/v2/thumbs.php?size=s&code=973c738474&url=".$_GET["site"];

  // Détermine le type MIME de l'image
  $mimeType = mime_content_type($imagePath);

  // Définit l'en-tête du contenu pour le type MIME de l'image
  header('Content-Type: ' . $mimeType);

  // Définir l'en-tête pour dire au navigateur qu'il s'agit d'une image
  header('Content-Disposition: inline; filename="' . basename($imagePath) . '"');

  // Lit le contenu du fichier et l'envoie au navigateur
  readfile($imagePath);
}

?>