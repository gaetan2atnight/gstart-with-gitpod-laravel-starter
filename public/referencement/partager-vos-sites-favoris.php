<?php
require_once($_SERVER['DOCUMENT_ROOT']."/classes/functions.php");

getHead("GStart -> Partager vos sites favoris", false, false, "Utilisez GStart pour partager vos sites préférés sur les réseaux sociaux Facebook et Twitter en un simple clic."); ?>
<div id="bigmaintextarea" class="arroundBox" style="text-align: center">
	<h1 class="titre">Partager vos sites favoris</h1><br/><br/>
	Utilisez <b>GStart</b> pour <b>partager</b> vos sites préférés sur les réseaux sociaux <b>Facebook</b> et <b>Twitter</b> en un simple clic.<br/><br/>
	Accédez de n'importe quel ordinateur à tous vos <b>favoris</b> par login/mot de passe.<br/><br/>
	<b>GStart</b> permet de gérer ses <b>favoris en ligne</b> par dossier et sous dossiers.<br/><br/>
	Chacun de vos <b>favoris</b> peuvent être représentés par un aperçu de la page créé automatiquement.<br/><br/>
	Vous pouvez choisir d'afficher tous vos favoris sous forme d'une liste avec les dossiers et sous dossiers ou bien d'afficher tous les favoris par leur aperçu pour mieux les visualiser.<br/><br/>
	<table align="center" class="arroundBox" style="background-color: lightBlue;"><tr><td>
	<a href="/inscription.php"><img src="/design/images/signin.png" alt="logo inscription" align="top" border="0"></a>
	</td><td>
		<p><b><a id="fleche" href="/inscription.php" style="margin-right: 7px">Inscrivez-vous gratuitement</a></b></p>
	</td></tr></table><br/>
	<img src="/design/images/partager-vos-sites-favoris.png" alt="gestion de favoris" align="center"><br/>
	<b>Partagez vos sites favorid sur Facebook et Twitter.</b><br/><br/>
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