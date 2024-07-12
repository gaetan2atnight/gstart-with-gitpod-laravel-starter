<?php
require_once($_SERVER['DOCUMENT_ROOT']."/classes/functions.php");

getHead("GStart -> Aide");
?>
<div id="maintextarea" class="arroundBox">
	<!-----------------Formulaire d'inscription----------------->
	<center>
		<div class="titre">Aide</div>
		<br/>
		<table width="500px">
		<tr>
			<td><img alt="image question" src="/design/images/question.png"/></td>
			<td><b style="padding-left: 25px;">Comment configurer l'affichage de ses favoris?</b></td>
		</tr>
		<tr>
			<td>
			<img alt="image reponse" src="/design/images/reponse.png"/>
			</td>
			<td>
			<ul><li>Une fois que vous êtes connectés, cliquez sur "paramètres" (en haut à droite).</li>
			<li>Si vous souhaitez toujours voir l'affichage de vos favoris sous forme d'arborescence, cochez l'option "arborescence".</li>
			<li>Si vous souhaitez toujours voir l'affichage de vos favoris sous forme de vignettes d'aperçus, cochez l'option "aperçus".</li>
			<li>Cliquez ensuite sur le bouton "Appliquer" pour enregistrer vos choix.</li></ul>
			</td>
		</tr>
		</table>
		<hr/>
		<table width="500px">
		<tr>
			<td><img alt="image question" src="/design/images/question.png"/></td>
			<td><b style="padding-left: 25px;">Comment ajouter un favoris?</b></td>
		</tr>
		<tr>
			<td>
			<img alt="image reponse" src="/design/images/reponse.png"/>
			</td>
			<td>
			<ul><li>Une fois que vous êtes connectés, cliquez sur le bouton "Ajouter un favoris".</li>
			<li>Remplissez les champs.</li>
			<li>Cliquez sur "Valider".</li></ul>
			</td>
		</tr>
		</table>
		<hr/>
		<table width="500px">
		<tr>
			<td><img alt="image question" src="/design/images/question.png"/></td>
			<td><b style="padding-left: 25px;">Comment changer mon mot de passe?</b></td>
		</tr>
		<tr>
			<td>
			<img alt="image reponse" src="/design/images/reponse.png"/>
			</td>
			<td>
			<ul><li>Une fois que vous êtes connectés, cliquez sur "paramètres" (en haut à droite).</li>
			<li>Cliquez ensuite sur "Changer de mot de passe".</li>
			<li>Entrez deux fois votre nouveau mote de passe dans les champs de saisie.</li>
			<li>Cliquez sur "Valider".</li></ul>
			</td>
		</tr>
		</table>
		<hr/>
		<table width="500px">
		<tr>
			<td><img alt="image question" src="/design/images/question.png"/></td>
			<td><b style="padding-left: 25px;">Pourquoi GStart ne s'affiche pas correctement sur mon écran?</b></td>
		</tr>
		<tr>
			<td>
			<img alt="image reponse" src="/design/images/reponse.png"/>
			</td>
			<td>
			<ul>
				<li>Si vous rencontrez des problèmes d'affichage de GStart sur votre ordinateur, c'est probablement que le navigateur que vous utilisez est trop ancien.</li>
				<li>Afin d'afficher correctement GStart, vous devez mettre à jour votre navigateur en téléchargeant la dernière version de votre navigateur.</li>
				<li>Les navigateurs suivants vous permettront une utilisation idéale de GStart :</li>
				<ul>
					<li>Mozilla Firefox</li>
					<li>Internet Explorer 7 - et versions supérieures</li>
					<li>Safari</li>
					<li>Google Chrome</li>
				</ul>
			</ul>
			</td>
		</tr>
		</table>
	</center>
</div>
<div id="leftContent" class="arroundBox">
	<center>
		<div id="speechbubble" style="margin-top: 25px">
			<div id="speechbubblescrollbar">
				<p class="text_center">
					Si ces réponses ne vous aident pas à résoudre votre problème, 
					<a href="contact.php">cliquez ici</a> pour envoyer un mail au responsable de ce site.
				</p>
			</div>
		</div>
		<img src="/design/images/mascotte.png" alt="Mascotte du site"></img><br/><br/>
		<a href="/">Retour à l'accueil</a>
		<br/>
	</center>
</div>
<?php getFoot(); ?>