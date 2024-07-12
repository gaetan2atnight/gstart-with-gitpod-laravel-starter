<?php
require_once($_SERVER['DOCUMENT_ROOT']."/classes/functions.php");
require_once($_SERVER['DOCUMENT_ROOT']."/classes/users.php");

//Traitement de l'inscription
if(isset($_POST['btnValider'])){
	//Récupération des saisies
	$mail = trim($_POST['mail']);
	if(empty($mail)){
		$error = "Veuillez saisir votre adresse mail!";
	}else{
		if(!isValidEmail($mail)){
			$error = "L'adresse mail que vous avez saisi est invalide!";
		}else{
			$userClass = new Users();
			if($userClass->isExistingEmail($mail)){
				$userClass->sendInfosByMail($mail);
				$error = "Votre identifiant de connexion à GStart vous a été envoyé par mail.<br/>".
				"Connectez-vous sur votre boîte de messagerie pour récupérer votre identifiant et changer votre mot de passe.<br/>".
				"Si vous ne voyez pas le mail dans votre boîte de réception, pensez à vérifier dans le dossier \"SPAM\".";				
			}else{
				$error = "Désolé, cette adresse mail n'a jamais été enregistrée pour créer un compte GStart!";
			}
		}
	}
}

getHead("GStart -> Renvoi des identifiants");
?>
<div id="maintextarea" class="arroundBox">
	<!-----------------Formulaire de renvoi des identifiants----------------->
	<center>
	<div class="titre">Renvoi des identifiants</div><br/>
	<form name="renvoimdp" action="" method="POST">
		<table>
			<tr>
				<td align="right">
					@Mail : 
				</td>
				<td>
					<input type="text" title="Adresse mail" name="mail" value="" maxlength="100" size="30"/>
				</td>
			</tr>
		</table>
		<input type="submit" value="Envoyer" name="btnValider"/>
	</form><br/>
	<div class="error"><?php if(isset($error)) echo $error; ?></div>
	</center>
</div>
<div id="leftContent" class="arroundBox">
	<center>
		<div id="speechbubble" style="margin-top: 25px">
			<div id="speechbubblescrollbar">
				<ul class="text_left" style="margin-left: -20px;">
					<li>Saisissez votre adresse mail.</li>
					<li>Cliquez sur le bouton "Envoyer".</li>
					<li>Vos identifiants de connexion à GStart vous seront renvoyés par mail.</li>
				</ul>
			</div>
		</div>
		<img src="/design/images/mascotte.png" alt="Mascotte du site"></img><br/><br/>
		<a href="/">Retour à l'accueil</a>
		<br/>
	</center>
</div>
<?php getFoot(); ?>