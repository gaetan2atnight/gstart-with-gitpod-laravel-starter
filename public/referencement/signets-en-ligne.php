<?php
require_once($_SERVER['DOCUMENT_ROOT']."/classes/functions.php");

getHead("GStart -> Signets en ligne", false, false, "Utilisez GStart pour stocker et gérer vos signets en ligne.Accédez de n'importe quel ordinateur à tous vos favoris par login/mot de passe.GStart permet de gérer ses signets en ligne par dossier et sous dossiers."); ?>
<div id="bigmaintextarea" class="arroundBox" style="text-align: center">
	<h1 class="titre">Signets en ligne</h1><br/><br/>
	Utilisez <b>GStart</b> pour stocker et gérer vos <b>signets en ligne</b>.<br/><br/>
	Accédez de n'importe quel ordinateur à tous vos <b>favoris</b> par login/mot de passe.<br/><br/>
	<b>GStart</b> permet de gérer ses <b>signets en ligne</b> par dossier et sous dossiers.<br/><br/>
	<table align="center" class="arroundBox" style="background-color: lightBlue;"><tr><td>
	<a href="/inscription.php"><img src="/design/images/signin.png" alt="logo inscription" align="top" border="0"></a>
	</td><td>
		<p><b><a id="fleche" href="/inscription.php" style="margin-right: 7px">Inscrivez-vous gratuitement</a></b></p>
	</td></tr></table><br/>
	<img src="/design/images/signets-en-ligne.png" alt="signets en ligne" align="center"><br/>
	<b>Gérez vos signets en ligne par dossier et sous dossiers.</b><br/><br/>
	<div>
		<p style="text-align: center">
			<?php getLinks();?>
		</p>
	</div>
</div>
<div id="leftContent" class="arroundBox">
	<center>
		<img src="/design/images/mascotte.png" alt="Mascotte du site"></img><br/><br/>
		<a href="/">Retour à l'accueil</a>
		<br/>
	</center>
</div>
<?php getFoot(); ?>