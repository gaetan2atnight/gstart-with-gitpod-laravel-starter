<?php
	$note = $userClass->getNote($idUser);
?>
<div id="rightToHide">
	<div id="rightContent">
		<img src="/design/images/notes_haut.png" alt="notes haut" border=0 style="border: 0px"></img>
		<div style="background:url(/design/images/notes_corps.png) repeat-y; border:0;">
			<textarea id="ta_note" cols="20" rows="15" name="ta_note" style="background-color :transparent; border:0; margin-left:5px;" class="flext growme" onBlur='setNote()'><?php echo $note; ?></textarea> 
		</div>
		<img src="/design/images/notes_bas.png" alt="notes haut"></img>
		<br/>
	</div>
	<div id="slideRight" onclick="showHideRight();">
		<img id="imgShowHideRight" src="/design/images/onglet_notes.png" alt="Masquer/Afficher le bloc-notes" title="Masquer/Afficher le bloc-notes" style="cursor: pointer;"></img>
		<img id="imgArrowRight" src="/design/images/arrow_right.png" alt="Masquer/Afficher le bloc-notes" title="Masquer/Afficher le bloc-notes" style="cursor: pointer;"></img>
	</div>
</div>
<?php 
	if(existCookie("displayRight")){
		if($_COOKIE["displayRight"] == 'close')
			echo "<script type='text/javascript'>showHideRight();</script>";
	}else{
		//Par défaut le dossier est ouvert
		echo "<script type='text/javascript'>setRawCookie('displayRight', 'open', 24*3600*31);</script>";
	}
?>
