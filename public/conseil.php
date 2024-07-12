<?php
require_once($_SERVER['DOCUMENT_ROOT']."/classes/functions.php");
require_once($_SERVER['DOCUMENT_ROOT']."/classes/users.php");

//Traitement de l'inscription
if(isset($_POST['btnValider'])){
	//Récupération des saisies
	$nom = trim($_POST['nom']);
	$mail = trim($_POST['mail']);
	if(empty($nom) or empty($mail)){
		$error = "Veuillez remplir tous les champs!";
	}else{
		if(!isValidEmail($mail)){
			$error = "L'adresse mail que vous avez saisi est invalide!";
		}else{
			$userClass = new Users();
			//Création du compte et redirection vers l'accueil
			$userClass->conseil($nom, $mail);
			$error = "Envoi réussi!<br/>Nous vous remercions de contribuer à faire connaître GStart.";
		}
	}
}

getHead("GStart -> Conseiller GStart à un ami"); ?>
<div id="maintextarea" class="arroundBox">
	<!-----------------Formulaire d'inscription----------------->
	<center>
	<div class="titre">Conseiller GStart à un ami</div><br/>
	<form name="inscription" action="" method="POST">
		<table>
			<tr>
				<td align="right">
					Votre nom : 
				</td>
				<td>
					<input type="text" title="Votre nom" name="nom" value="" maxlength="100" size="30" style="width: 200px;"/>
				</td>
			</tr>
			<tr>
				<td align="right">
					@Mail : 
				</td>
				<td>
					<input type="text" title="Adresse mail" name="mail" value="" maxlength="100" size="30" style="width: 200px;"/>
				</td>
			</tr>
		</table><br/><br/>
		<input type="submit" value="Valider" name="btnValider"/>
	</form><br/>
	<div class="error"><?php if(isset($error)) echo $error; ?></div>
	</center>
</div>
<div id="leftContent" class="arroundBox">
	<center>
		<div id="speechbubble" style="margin-top: 25px">
			<div id="speechbubblescrollbar">
				<p class="text_center">
					Entrez l'adresse mail de la personne à qui vous voulez conseiller d'utiliser GStart et cliquez sur le bouton "Valider".
				</p>
			</div>
		</div>
		<img src="/design/images/mascotte.png" alt="Mascotte du site"></img><br/><br/>
		<a href="/">Retour à l'accueil</a>
		<br/>
	</center>
</div>
<?php getFoot(); ?>