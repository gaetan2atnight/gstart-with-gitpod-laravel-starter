<?php header("Content-Type:text/html; charset=utf-8");?>
<script type="text/javascript" src="functions.js"></script>
<?php
require_once($_SERVER['DOCUMENT_ROOT']."/classes/functions.php");
require_once($_SERVER['DOCUMENT_ROOT']."/classes/users.php");
require_once($_SERVER['DOCUMENT_ROOT'].'/classes/cookies.php');

$userClass = new Users();
$idUser = $userClass->getConnectedUser();
if($idUser == false)
	header('Location: /');

include 'treeActions.php';

function displayTree($idUser, $decalage, $folder_name){
	$userClass = new Users();
	$arrayFavoris = $userClass->getFavorisInFolder($idUser, $folder_name);
	$i=0;
	foreach($arrayFavoris as $label => $url){
		$id = $folder_name.$i;
		if($url == "folder"){
			$label_to_show = substr($label, 7, strlen($label)-1);
			$labelCookie = str_replace(CHR(32), "", $label_to_show);
			//Emplacement du folder
			echo "<div style='height:20px;margin-left:".$decalage."px' onmouseover=\"style.backgroundColor='#E6E6FA';tree_mouse_over('".$id."')\" onmouseout=\"style.backgroundColor='';tree_mouse_out('".$id."')\">";
			echo "<img src='/design/images/folder";
			if(!existCookie($labelCookie) || $_COOKIE[utf8_decode($labelCookie)] == 'close')
				echo "_close";
			echo ".png' id='image_".$id."' border='0' alt='Image du dossier' class='favicon' style='cursor:pointer' onclick=\"hideShowDiv('content_folder_".$id."', '".$id."', '".$labelCookie."')\"/>";
			echo "<b id='folder_name_".$id."' class='folder_node' style='float:left;margin-top:2px;cursor:pointer;' onclick=\"hideShowDiv('content_folder_".$id."', '".$id."', '".$labelCookie."')\">".$label_to_show."</b>";
			echo "<input type='hidden' value='".$label."' id='oldLabel_".$id."'/>";
			echo "<input id='folder_input_".$id."' type='text' title='Renommer le dossier' size='15' maxlength='100' value='".$label_to_show."' style='display:none' onBlur=\"renameFolder('".$id."', '".$labelCookie."')\"/>";
			echo "<img id='delete_".$id."' src='/design/images/delete.png' border='0' alt='Supprimer le dossier' class='tree_icon' style='display:none' onclick=\"deleteFolder('".$label."', '".$labelCookie."')\">";
			echo "<img id='edit_".$id."' src='/design/images/edit.png' border='0' alt='Modifier le nom du dossier' class='tree_icon' style='display:none' onclick=\"editFolder('".$id."')\">";
			echo "</div>";
			echo "<div id='content_folder_".$id."'";
			if(existCookie($labelCookie)){
				if($_COOKIE[utf8_decode($labelCookie)] == 'close')
					echo " style='display:none;' ";
				echo ">";
			}else{
				echo " style='display:none;' ";
				echo ">";
				//Par défaut le dossier est fermé
				echo "<script type='text/javascript'>setRawCookie('".$labelCookie."', 'close', 24*3600*31);</script>";
			}
			displayTree($idUser, $decalage+20, $label);
			echo "</div>";
		}else{
			//Emplacement du favicon
			echo "<div style='height:20px;margin-left:".$decalage."px' onmouseover=\"style.backgroundColor='#E6E6FA';tree_mouse_over('".$id."')\" onmouseout=\"style.backgroundColor='';tree_mouse_out('".$id."')\"><div id='div_favicon_".$id."' class='favicon'><img src=\"favicon.php?url=".$url."\" title='icone du favoris' width='20px' height='20px'/></div>";
				echo "<div style='overflow:hidden;height:100%;max-width:340px;float:left'><a style='float:left;' href='".$url."' target='_blank'>".$label."</a></div>";
				echo "<img id='delete_".$id."' src='/design/images/delete.png' border='0' title='Supprimer' alt='Supprimer' class='tree_icon' style='display:none' onclick=\"deleteFavoris('".$label."')\">";
				echo "<img id='edit_".$id."' src='/design/images/edit.png' border='0' title='Modifier' alt='Modifier' class='tree_icon' style='display:none' onclick=\"showEdit('".$id."')\">";
				echo "</div>";
			?>
			<div id="edit_form_<?php echo $id; ?>" style="background-color:#E6E6FA;display:none">
				<input type="hidden" value="<?php echo $label; ?>" id="oldLabel_<?php echo $id; ?>"/>
				<input type="hidden" value="<?php echo $folder_name; ?>" id="parent_<?php echo $id; ?>"/>
				<table><tr><td align="right">
				Nom : 
				</td><td>
					<input id="in_label_<?php echo $id; ?>" type="text" title="Nom du favoris" size="35" maxlength="50" value="<?php echo $label; ?>"/><br/>
				</td></tr><tr><td align="right" nowrap="nowrap">
				Adresse : 
				</td><td>
					<input id="in_url_<?php echo $id; ?>" type="text" title="Adresse du favoris" size="50" maxlength="500" value="<?php echo $url; ?>"/><br/>
				</td></tr></table>
				<div id="end_add_form">
					<center>
						<input type="button" value="Valider" name="btnValider" onclick="editFavoris('<?php echo $id; ?>')"/>
						<input type="button" value="Annuler" name="btnAnnuler" onclick="showEdit('<?php echo $id; ?>')"/>
					</center>
				</div>
			</div>
		<?php
		}
		$i++;
	}
}

//Affichage du tree
echo "<div id='content_tree'>";
	displayTree($idUser, 0, "root");
echo "</div>";
?>