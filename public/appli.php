<?php
require_once($_SERVER['DOCUMENT_ROOT']."/classes/functions.php");
require_once($_SERVER['DOCUMENT_ROOT']."/classes/users.php");

//Chargement des 4 images-favoris
$arrayIconsFavoris = $userClass->getIconsFavoris($idUser);
//Chargement des folders
$arrayFolders = $userClass->getFolders($idUser);
?>
<!--
<div id="news" class="arroundBox">
	Nouveau : partagez vos favoris sur Facebook et Twitter !<br/>
	Cliquez sur les logos situés à côté de vos favoris pour les partager avec vos amis.<br/>
	<img src="/design/images/facebook.png" alt="Icone Facebook"/>
	<img src="/design/images/twitter.png" alt="Icone Facebook"/>
</div>
-->
<div id="maintextarea" class="arroundBox">
	<!--------------------------------Identifiant de l'utilisateur-------------------------------->
	<form name="id_form">
		<input type="hidden" value="<?php echo $idUser; ?>" name="idUser">
	</form>
	<!--------------------------------Grandes icones-------------------------------->
	<div style="margin-left: 130px">
		<div class="logo_space arroundBox sprite-image sprite-mail" onclick="newWindow('<?php echo $arrayIconsFavoris['lb_webmail']; ?>')" title="Webmail"></div>
		<div class="logo_space arroundBox sprite-image sprite-money" onclick="newWindow('<?php echo $arrayIconsFavoris['lb_bank']; ?>')" title="Banque"></div>
		<div class="logo_space arroundBox sprite-image sprite-tv" onclick="newWindow('<?php echo $arrayIconsFavoris['lb_tv']; ?>')" title="Programme TV"></div>
		<div class="logo_space arroundBox sprite-image sprite-meteo" onclick="newWindow('<?php echo $arrayIconsFavoris['lb_meteo']; ?>')" title="Météo"></div>
	</div>
	<div class="spacer"></div>
	<br/>
	<div onclick="showHideAdd()" class="button arroundBox" style="float:left; margin-left:128px">
		<div class="btn_img btn_add"></div>
		<div class="btn_text">
			<b>Ajouter un favoris</b>
		</div>
	</div>
	<div onclick="showHideAddFolder()" class="button arroundBox" style="float:left; margin-left:5px">
		<div class="btn_img btn_addf"></div>
		<div class="btn_text">
			<b>Ajouter un dossier</b>
		</div>
	</div>
	<div class="spacer"></div>
	<div id="add_form" style="display:none;margin-top:5px;background-color:#E6E6FA">
		<table><tr><td align="right">
		Nom : 
		</td><td>
			<input id="in_label" type="text" title="Nom du favoris" size="25" maxlength="50"/> (facultatif)<br/>
		</td></tr><tr><td align="right" nowrap="nowrap">
		Adresse(URL) : 
		</td><td>
			<input id="in_url" type="text" title="Adresse du favoris" size="50" maxlength="500" value="http://"/><br/>
		</td></tr><tr><td align="right" nowrap="nowrap">
		Dossier parent : 
		</td><td>
			<select id="in_parent" name='select'  size='1' >
				<option value="root">-</option>
				<?php
				foreach($arrayFolders as $cpt => $label){
					$label_to_show = substr($label, 7, strlen($label)-1);
					echo "<option value='".$label_to_show."'>".$label_to_show."</option>"; 
				}
				?>
			</select>
			<br/>
		</td></tr></table>
		<div id="end_add_form">
			<center>
				<input type="button" value="Valider" name="btnValider" onclick="addFavoris()"/>
				<input type="button" value="Annuler" name="btnAnnuler" onclick="showHideAdd()"/>
			</center>
		</div>
	</div>
	<div id="add_folder_form" style="display:none;margin-top:5px;background-color:#E6E6FA">
		<table><tr><td align="right">
		Nom : 
		</td><td>
			<input id="in_label_folder" type="text" title="Nom du dossier" size="25" maxlength="93"/><br/>
		</td></tr><tr><td align="right" nowrap="nowrap">
		Dossier parent : 
		</td><td>
			<select id="in_parent_folder" name='select'  size='1' >
				<option value="root">-</option>
				<?php
				foreach($arrayFolders as $cpt => $label){
					$label_to_show = substr($label, 7, strlen($label)-1);
					echo "<option value='".$label_to_show."'>".$label_to_show."</option>"; 
				}
				?>
			</select><br/>
		</td></tr></table>
		<div id="end_add_form">
			<center>
				<input type="button" value="Valider" name="btnValider" onclick="addFolder()"/>
				<input type="button" value="Annuler" name="btnAnnuler" onclick="showHideAddFolder()"/>
			</center>
		</div>
	</div>
	<div id="content">
		<div id="tree_favoris"></div>
		<div id="thumbs"></div>
		<div class="spacer"></div>
	</div>
</div>