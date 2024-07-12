<?php
if(isset($_GET["add"])){//Ajout d'un favoris ou d'un dossier
	$label = urldecode($_GET["label"]);
	$url = urldecode($_GET["url"]);
	$parent = urldecode($_GET["parent"]);
	$errorCode = $userClass->addFavoris($idUser, $label, $url, $parent);
	if($errorCode != '0'){
		//Affichage de l'erreur
		echo "<script type='text/javascript'>alert(\"".$errorCode."\");</script>";
	}else{//Si on ajoute un dossier on met à jour les listes de dossiers
		if($url == "folder"){
			echo "<script type='text/javascript'>
			$('in_parent').options[$('in_parent').options.length] = new Option('".$label."', '".$label."');
			$('in_parent_folder').options[$('in_parent_folder').options.length] = new Option('".$label."', '".$label."');
			showHideAddFolder();
			</script>";
		}else{
			echo "<script type='text/javascript'>
			showHideAdd();
			</script>";
		}
	}
}

if(isset($_GET["delete"])){//Supression d'un favoris ou d'un dossier
	$label = urldecode($_GET["label"]);
	if(isset($_GET["cookie"]))
		$cookie = urldecode($_GET["cookie"]);
	$userClass->deleteFavoris($idUser, $label);
	if(substr($label, 0, 7) == "folder_"){//Si on supprime un dossier on met à jour les listes de dossiers et on supprime le cookie
		$folder = substr($label, 7, strlen($label)-7);
		echo "<script type='text/javascript'>
		var Obj = $('in_parent');
		for (var i=0; i < Obj.options.length; i++){	
			if(Obj.options[i].value == '".$folder."'){
				Obj.removeChild(Obj.options[i]);
				break;
			}
		}		
		var Obj = $('in_parent_folder');
		for (var i=0; i < Obj.options.length; i++){
			if(Obj.options[i].value == '".$folder."'){
				Obj.removeChild(Obj.options[i]);
				break;
			}
		}
		//On supprime le cookie
		deleteCookie('".$cookie."');
		</script>";
	}
}

if(isset($_GET["edit"])){//Modification d'un favoris ou d'un dossier
	$label = urldecode($_GET["label"]);
	$url = urldecode($_GET["url"]);
	$oldLabel = urldecode($_GET["oldLabel"]);
	if(isset($_GET["cookie"]))
		$cookie = urldecode($_GET["cookie"]);
	if(isset($_GET["parent"]))
		$parent = urldecode($_GET["parent"]);
	if($url == "folder"){//Modification d'un dossier
		$userClass->renameFolder($idUser, $oldLabel, $label);
		//Si on modifie un dossier on met à jour les listes de dossiers
		$old_folder = substr($oldLabel, 7, strlen($oldLabel)-7);
		$new_folder = substr($label, 7, strlen($label)-7);
		echo "<script type='text/javascript'>
		var Obj = $('in_parent');
		for (var i=0; i < Obj.options.length; i++){
			if(Obj.options[i].value == '".$old_folder."'){
				Obj.options[i].value = '".$new_folder."';
				Obj.options[i].text = '".$new_folder."';
				break;
			}
		}		
		var Obj = $('in_parent_folder');
		for (var i=0; i < Obj.options.length; i++){
			if(Obj.options[i].value == '".$old_folder."'){
				Obj.options[i].value = '".$new_folder."';
				Obj.options[i].text = '".$new_folder."';
				break;
			}
		}
		//On supprime le cookie
		deleteCookie('".$cookie."');
		</script>";
	}else{//Modification d'un favoris
		$userClass->deleteFavoris($idUser, $oldLabel);
		$errorCode = $userClass->addFavoris($idUser, $label, $url, $parent);
		if($errorCode != '0'){
			//Affichage de l'erreur
			echo "<script type='text/javascript'>alert(\"".$errorCode."\");</script>";
		}
	}
}
?>