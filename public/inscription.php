<?php
require_once($_SERVER['DOCUMENT_ROOT']."/classes/functions.php");
require_once($_SERVER['DOCUMENT_ROOT']."/classes/users.php");
require_once($_SERVER['DOCUMENT_ROOT'].'/classes/cookies.php');
	
//Traitement de l'inscription
if(isset($_POST['identifiant'])){
	//Récupération des saisies
	$id = trim($_POST['identifiant']);
	$mdp1 = trim($_POST['pass']);
	$mdp2 = trim($_POST['pass2']);
	$mail = trim($_POST['mail']);
	if(empty($id) or empty($mdp1) or empty($mdp2) or empty($mail)){
		$error = "Veuillez remplir tous les champs!";
	}else{
		if($mdp1 != $mdp2){
			$error = "Veuillez rentrer deux fois le même mot de passe!";
		}else{
			if(!isValidEmail($mail)){
				$error = "L'adresse mail que vous avez saisi est invalide!";
			}else{
				$userClass = new Users();
				if($userClass->isExistingEmail($mail)){
					$error = "L'adresse mail que vous avez saisi est déjà utilisée pour un compte GStart!<br/>";
				}else{
					if($userClass->isExistingUSer($id)){
						$error = "Désolé, l'identifiant que vous avez saisi est déjà utilisé, veuillez en choisir un autre!";
					}else{
						if((strpos($id, ' ') != false) || (strpos($mdp1, ' ') != false)){
							$error = "L'identifiant et le mot de passe ne doivent pas contenir d'espaces!";
						}else{
							//Création du compte
							$userClass->createUser($id, $mdp1, $mail);
							//Création des cookies nécéssaires à la connexion
							createCookie('idUser', $id);
							createCookie('pass', $mdp1);
							//Redirection vers l'accueil
							header('Location: /');
						}
					}
				}
			}
		}
	}
}

getHead("GStart -> Inscription"); ?>
<div id="bigmaintextarea" class="arroundBox">
	<!-----------------Formulaire d'inscription----------------->
	<center>
	<div class="titre">Inscription</div><br/>
	<form name="inscription" action="" method="POST">
		<table>
			<tr>
				<td align="right">
					Identifiant : 
				</td>
				<td>
					<input type="text" title="identifiant" name="identifiant" value="" maxlength="100" size="30" style="width: 200px;"/> 
				</td>
			</tr>
			<tr>
				<td align="right">
					Mot de passe : 
				</td>
				<td>
					<input type="password" title="Mot de passe" name="pass" value="" maxlength="100" size="30"  style="width: 200px;"/> 
				</td>
			</tr>
			<tr>
				<td align="right">
					Ressaisir Mot de passe : 
				</td>
				<td>
					<input type="password" title="Ressaisir mot de passe" name="pass2" value="" maxlength="100" size="30" style="width: 200px;"/> 
				</td>
			</tr>
			<tr>
				<td align="right">
					@Mail : 
				</td>
				<td>
					<input type="text" title="Adresse mail" name="mail" value="" maxlength="100" size="30" style="width: 200px;"/><b> *</b>
				</td>
			</tr>
		</table>
		*Saisissez une adresse email valide, elle sera utilisée pour vous renvoyer vos identifiants de connexion si vous les oubliez.<br/><br/>
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
					<b>Note sur la sécurité : </b><br/>Aucune des informations que vous saisissez sur ce site ne seront divulgués ni utilisés hors de cette application.
				</p>
			</div>
		</div>
		<img src="/design/images/mascotte.png" alt="Mascotte du site"></img><br/><br/>
		<a href="/">Retour à l'accueil</a>
		<br/>
	</center>
</div>
<?php getFoot(); ?>