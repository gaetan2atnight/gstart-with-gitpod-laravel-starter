<?php
require_once($_SERVER['DOCUMENT_ROOT']."/classes/users.php");

$userClass = new Users();
$userClass->setNote(urldecode($userClass->getConnectedUser()), urldecode($_GET['note']));
?>