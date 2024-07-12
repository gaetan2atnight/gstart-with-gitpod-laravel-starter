<?php
require_once($_SERVER['DOCUMENT_ROOT']."/classes/functions.php");

getHead("GStart -> enregistrer et stocker ses sites et liens favoris", false ,false, "Utilisez GStart afin d'enregistrer, stocker, organiser tous vos site et liens favoris.Accédez à tous ses favoris à partir de n'importe où.Que vous soyez chez vous, chez un ami, au travail, ayez toujours tous vos favoris internet à portée de main.Lorsque vous enregistrez et stockez vos favoris sur GStart, vous mettez tous vos liens vers vos sites favoris à l'abri d'une panne de votre navigateur ou de votre ordinateur.Vous n'avez qu'à vous connecter sur GStart à partir de n'importe quel ordinateur relié à internet et vous accédez à tous vos favoris."); ?>
<div id="bigmaintextarea" class="arroundBox" style="text-align: center">
	<h1 class="titre">Enregistrer et stocker ses sites et liens favoris</h1><br/><br/>
	Utilisez <b>GStart</b> afin d'enregistrer, stocker, organiser tous vos site et liens favoris.<br/><br/>
	Accédez à tous ses <b>favoris</b> à partir de n'importe où.<br/><br/>
	Que vous soyez chez vous, chez un ami, au travail, ayez toujours tous vos <b>favoris internet</b> à portée de main.<br/><br/>
	Lorsque vous <b>enregistrez</b> et <b>stockez</b> vos <b>favoris</b> sur <b>GStart</b>, vous mettez tous vos <b>liens</b> vers vos <b>sites favoris</b> à l'abri d'une panne de votre navigateur ou de votre ordinateur.<br/><br/>
	Vous n'avez qu'à vous connecter sur <b>GStart</b> à partir de n'importe quel ordinateur relié à internet et vous accédez à tous vos <b>favoris</b>.<br/><br/>
	<table align="center" class="arroundBox" style="background-color: lightBlue;"><tr><td>
	<a href="/inscription.php"><img src="/design/images/signin.png" alt="logo inscription" align="top" border="0"></a>
	</td><td>
		<p><b><a id="fleche" href="/inscription.php" style="margin-right: 7px">Inscrivez-vous gratuitement</a></b></p>
	</td></tr></table><br/>
	<img src="/design/images/enregistrer-stocker-favoris.png" alt="enregistrer et stocker vos favoris" align="center"><br/>
	<b>Sauvegardez et organisez tous ses favoris en ligne.</b><br/><br/>
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