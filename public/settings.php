<?php
require_once($_SERVER['DOCUMENT_ROOT']."/classes/functions.php");
require_once($_SERVER['DOCUMENT_ROOT']."/classes/users.php");
require_once($_SERVER['DOCUMENT_ROOT'].'/classes/cookies.php');

$userClass = new Users();
$idUser = $userClass->getConnectedUser();
if($idUser == false){
	//redirection ver l'index
	header('Location: /');
}else{
	//Mise à jour des paramètres
	if(isset($_POST['btnValider'])){
		$newWebmail = trim($_POST['webmail']);
		$newBank = trim($_POST['bank']);
		$newTV = trim($_POST['tv']);
		$newMeteo = trim($_POST['meteo']);
		$userClass->updateFavoris($newWebmail, $newBank, $newTV, $newMeteo, $idUser);
		$display = $_POST['rb_display_settings'];
		$userClass->setDisplayTree($idUser, ($display == "tree" || $display == "treethumbs"));
		$userClass->setDisplayThumbs($idUser, ($display == "thumbs" || $display == "treethumbs"));
		$userClass->setDisplayCal($idUser, (isset($_POST["cb_display_cal"])));
		$userClass->setThemeCal($idUser, ($_POST["rb_caltheme"]));
		header('Location: /');
	}
	//Chargement des préférences
	$arrayIconsFavoris = $userClass->getIconsFavoris($idUser);
	$displayTree = $userClass->getDisplayTree($idUser);
	$displayThumbs = $userClass->getDisplayThumbs($idUser);
	$displayCal = $userClass->getDisplayCal($idUser);
	$calTheme = $userClass->getThemeCal($idUser);
}

getHead("GStart -> Paramètres"); ?>
<div id="connect">
	<a href="help.php">Aide</a>
</div>
<div id="maintextarea" class="arroundBox">
	<!-----------------Formulaire d'inscription----------------->
	<center>
		<div class="titre">Paramètres</div><br/>
	</center>
	<form name="settings" action="" method="POST">
		<table>
			<tr>
				<td>
					<img src="/design/images/mail.png" alt="logo de la boîte mail">
				</td>
				<td>
					<input type="text" title="adresse de votre webmail" name="webmail" value="<?php echo $arrayIconsFavoris['lb_webmail']; ?>" maxlength="500" size="70"/>
				</td>
			</tr>
			<tr>
				<td>
					<img src="/design/images/money.png" alt="logo de la banque">
				</td>
				<td>
					<input type="text" title="adresse de votre banque" name="bank" value="<?php echo $arrayIconsFavoris['lb_bank']; ?>" maxlength="500" size="70"/>
				</td>
			</tr>
			<tr>
				<td>
					<img src="/design/images/tv.png" alt="logo du programme TV">
				</td>
				<td>
					<input type="text" title="adresse du programme TV" name="tv" value="<?php echo $arrayIconsFavoris['lb_tv']; ?>" maxlength="500" size="70"/>
				</td>
			</tr>
			<tr>
				<td>
					<img src="/design/images/meteo.png" alt="logo de la météo">
				</td>
				<td>
					<input type="text" title="adresse de votre météo" name="meteo" value="<?php echo $arrayIconsFavoris['lb_meteo']; ?>" maxlength="500" size="70"/>
				</td>
			</tr>
		</table>
		<br/>
		<hr/>
		<br/>
		<table>
			<tr>
				<td>
					<img src="/design/images/display.png" alt="Affichage">
				</td>
				<td>
					<input type="radio" name="rb_display_settings" value="tree" <?php if($displayTree == true && $displayThumbs == false){ echo 'checked="checked"'; } ?>> Arborescence<br/>
					<input type="radio" name="rb_display_settings" value="thumbs" <?php if($displayThumbs == true && $displayTree == false){ echo 'checked="checked"'; } ?>> Aperçus<br/>
					<input type="radio" name="rb_display_settings" value="treethumbs" <?php if($displayThumbs == true && $displayTree == true){ echo 'checked="checked"'; } ?>> Arborescence+Aperçus
				</td>
			</tr>
		</table>
		<br/>
		<hr/>
		<br/>
		<table>
			<tr>
				<td>
					<img src="/design/images/key.png" alt="logo changer de mot de passe">
				</td>
				<td>
					<a href="changePwd.php" style="margin-left: 5px;">Changer de mot de passe</a>
				</td>
			</tr>
		</table>
		<br/>
		<hr/>
		<br/>
		<table>
			<tr>
				<td>
					<img src="/design/images/calendar.png" alt="Calendrier">
				</td>
				<td>
					<input type="checkbox" title="Afficher le calendrier" name="cb_display_cal" value="checkbox" <?php if($displayCal == true){ echo 'checked="checked"'; } ?>>Afficher le calendrier
				</td>
			</tr>
			<tr>
				<td>Thème : </td>
				<td>
					<input type="radio" name="rb_caltheme" value="1" <?php if($calTheme == 1){ echo 'checked="checked"'; } ?>> Nature<br/>
					<input type="radio" name="rb_caltheme" value="2" <?php if($calTheme == 2){ echo 'checked="checked"'; } ?>> Voitures<br/>
				</td>
			</tr>
			<tr>
				<td colspan="3">D'autres thèmes à venir...</td>
			</tr>
		</table>
		<br/>
		<center>
			<input type="submit" value="Appliquer" name="btnValider"/>
		</center><br/>
	</form>
</div>
<div id="leftContent" class="arroundBox">
	<center>
		<div id="speechbubble" style="margin-top: 25px">
			<div id="speechbubblescrollbar">
				<p class="text_center">
					Les paramètres définit ici vous permettent de personnaliser votre page d'accueil.
				</p>
			</div>
		</div>
		<img src="/design/images/mascotte.png" alt="Mascotte du site"></img><br/><br/>
		<a href="/">Retour à l'accueil</a>
		<br/>
	</center>
</div>
<?php getFoot(); ?>