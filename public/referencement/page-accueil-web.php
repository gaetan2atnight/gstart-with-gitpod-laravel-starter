<?php
require_once($_SERVER['DOCUMENT_ROOT']."/classes/functions.php");

getHead("GStart -> Page d'accueil web", false, false, "Utilisez GStart comme page d'accueil web pour vous faciliter la navigation sur internet.Accédez en un clic à tous vos sites préférés dès l'ouverture de votre navigateur.Que vous soyez chez vous, chez un ami, au travail, ayez toujours tous vos favoris à portée de main.GStart est la page d'accueil qui vous ressemble et qui centralise tout ce dont vous avez besoin lorsque vous êtes sur internet:-un champ de recherche pour effectuer toutes vos recherches-tous vos sites internet favoris présentés de manière intuitive et organisée-un bloc-note pour ne plus oublier tout ce que vous avez à faireChacun de vos favoris peuvent être représentés par un aperçu de la page créé automatiquement.Vous pouvez choisir d'afficher tous vos favoris sous forme d'une liste avec les dossiers et sous dossiers ou bien d'afficher tous les favoris par leur aperçu pour mieux les visualiser."); ?>
<div id="bigmaintextarea" class="arroundBox" style="text-align: center">
	<h1 class="titre">Page d'accueil web</h1><br/><br/>
	Utilisez <b>GStart</b> comme <b>page d'accueil web</b> pour vous faciliter la navigation sur internet.<br/><br/>
	Accédez en un clic à tous vos sites préférés dès l'ouverture de votre navigateur.<br/><br/>
	Que vous soyez chez vous, chez un ami, au travail, ayez toujours tous vos <b>favoris</b> à portée de main.<br/><br/>
	<b>GStart</b> est la page d'accueil qui vous ressemble et qui centralise tout ce dont vous avez besoin lorsque vous êtes sur internet:<br/>
	-un <b>champ de recherche</b> pour effectuer toutes vos recherches<br/>
	-tous vos <b>sites internet favoris</b> présentés de manière intuitive et organisée<br/>
	-un <b>bloc-note</b> pour ne plus oublier tout ce que vous avez à faire<br/><br/>
	Chacun de vos <b>favoris</b> peuvent être représentés par un aperçu de la page créé automatiquement.<br/><br/>
	Vous pouvez choisir d'afficher tous vos <b>favoris</b> sous forme d'une liste avec les dossiers et sous dossiers ou bien d'afficher tous les <b>favoris</b> par leur aperçu pour mieux les visualiser.<br/><br/>
	<table align="center" class="arroundBox" style="background-color: lightBlue;"><tr><td>
	<a href="/inscription.php"><img src="/design/images/signin.png" alt="logo inscription" align="top" border="0"></a>
	</td><td>
		<p><b><a id="fleche" href="/inscription.php" style="margin-right: 7px">Inscrivez-vous gratuitement</a></b></p>
	</td></tr></table><br/>
	<img src="/design/images/page-accueil-web.png" alt="page d'accueil web" align="center"><br/>
	<b>Gstart : La page d'accueil web qui vous ressemble.</b><br/><br/>
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