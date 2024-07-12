<?php
require_once($_SERVER['DOCUMENT_ROOT']."/classes/functions.php");
require_once($_SERVER['DOCUMENT_ROOT']."/classes/users.php");

//Traitement de l'inscription
if(isset($_POST['btnEnvoyer'])){
	//Récupération des saisies
	$mail = trim($_POST['ta_message']);
	if(empty($mail)){
		$error = "Veuillez saisir un message!";
	}else{
		$userClass = new Users();
		$mail = str_replace("\n", "<br/>", $mail);
		//Envoi le mail au support
		htmlMail("contact.gstart@gmail.com", $userClass->getMail($_COOKIE['idUser']), "Question sur GStart", $mail);
		//Avertit l'admin d'un nouvelle question
		htmlMail("gaetan.azema@gmail.com", "no-reply@gstart.fr", "Question sur GStart", "Question de l'utilisateur : ".$_COOKIE['idUser']);
		$error = "Votre message a bien été envoyé ! <br/>L'équipe GStart vous répondra le plus rapidement possible.";			
	}
}

getHead("GStart -> Contact");
?>
<div id="maintextarea" class="arroundBox">
	<!-----------------Formulaire d'inscription----------------->
	<center>
	<div class="titre">Contact</div>
	<br/>
	<form name="envoiMessage" action="" method="POST">
	Saisissez votre message : <br/>
	<textarea rows="10" cols="50" name="ta_message" id="ta_message"></textarea><br/>
	<input type="submit" value="Envoyer" name="btnEnvoyer"/>
	<br/>
	<div class="error"><?php if(isset($error)) echo $error; ?></div>
	</center>
</div>
<div id="leftContent" class="arroundBox">
	<center>
		<div id="speechbubble" style="margin-top: 25px">
			<div id="speechbubblescrollbar">
				<p class="text_center">
					Expliquez clairement le problème que vous rencontrez et le responsable du site vous répondra le plus rapidement possible.
				</p>
			</div>
		</div>
		<img src="/design/images/mascotte.png" alt="Mascotte du site"></img><br/><br/>
		<a href="/">Retour à l'accueil</a>
		<br/>
	</center>
</div>
<?php getFoot(); ?>