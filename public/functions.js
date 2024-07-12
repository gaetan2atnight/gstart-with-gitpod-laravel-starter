//****************************************************Initialisation****************************************************
function init(){
	var user = document.id_form.idUser.value;
	//Focus sur la recherche google
	$('recherche_google').focus();
	changeDisplay();
	showCalendar();
}

function initQSlide(){
	var scroller = new QScroller('slider',{
		slides: 'qslide2',
		duration: 800,
		buttons: {next:'go-left',prev:'go-right'},
		transition: Fx.Transitions.Expo.easeOut
	});
	scroller.load();
}

/*Affiche le calendrier*/
function showCalendar(){
	try{
	//Création
	myCal3 = new Calendar({ date1: 'd/m/Y' }, {
		classes: ['base'],
		direction: 0,
		offset: 1,
		days: ['Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi'],
		months: ["Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet", "Août", "Septembre", "Octobre", "Novembre", "Décembre"]
	});
	//Affichage
	$('date1').style.display = "";
	$('date1').focus();
	$('date1').style.display = "none";
	updateSize();
	}catch(e){}
}

//****************************************************Gestion des favoris****************************************************

//Affiche le formulaire pour créer un nouveau favoris
function showHideAdd(){
	//Cache le formulaire d'ajout de dossier si il est ouvert
	if($("add_folder_form").style.display == ""){
		showHideAddFolder();
	}
	var div_add = $("add_form");
	if(div_add.style.display == "none"){
		div_add.style.display = "";
	}else{
		div_add.style.display = "none";
		//Nettoyage des champs de saisie
		$("in_label").value = "";
		$("in_url").value = "http://";
		$('in_parent').selectedIndex = 0;
	}
}

//Affiche le formulaire pour créer un nouveau dossier
function showHideAddFolder(){
	//Cache le formulaire d'ajout de favoris si il est ouvert
	if($("add_form").style.display == ""){
		showHideAdd();
	}
	var div_add = $("add_folder_form");
	if(div_add.style.display == "none"){
		div_add.style.display = "";
	}else{
		div_add.style.display = "none";
		//Nettoyage des champs de saisie
		$("in_label_folder").value = "";
		$('in_parent_folder').selectedIndex = 0;
	}
}

//Affiche le formulaire pour editer un favoris ou un dossier
function showEdit(index){
	var div_edit = $("edit_form_"+index);
	if(div_edit.style.display == "none"){
		div_edit.style.display = "";
	}else{
		div_edit.style.display = "none";
	}
}

//Ajoute un favoris
function addFavoris(){
	var user = document.id_form.idUser.value;
	var label = trim($("in_label").value);
	if(label.indexOf('"', 0) != -1 || label.indexOf("'", 0) != -1){
		alert('Erreur : pas de " ou de \'');
		return;
	}
	var url = trim($("in_url").value);
	if(url.indexOf('"', 0) != -1 || url.indexOf("'", 0) != -1){
		alert('Erreur : pas de " ou de \'');
		return;
	}
	var parent = $('in_parent').options[$('in_parent').selectedIndex].value;
	if(url != ""){
		//On réactualise le tree
		if(document.forms.display_form.rb_display[0].checked)
			ajaxCall("tree_favoris", "tree.php?idUser="+encodeURIComponent(user)+"&add=add&label="+encodeURIComponent(label)+"&url="+encodeURIComponent(url)+"&parent="+encodeURIComponent(parent));
		else if(document.forms.display_form.rb_display[1].checked)
			ajaxCall("thumbs", "thumbs.php?idUser="+encodeURIComponent(user)+"&add=add&label="+encodeURIComponent(label)+"&url="+encodeURIComponent(url)+"&parent="+encodeURIComponent(parent));
		else{
			ajaxCall("tree_favoris", "tree.php?idUser="+encodeURIComponent(user)+"&add=add&label="+encodeURIComponent(label)+"&url="+encodeURIComponent(url)+"&parent="+encodeURIComponent(parent));
			(function(){ajaxCall("thumbs", "thumbs.php?idUser="+encodeURIComponent(user))}).delay(500);
		}
	}
}

//Ajout d'un dossier
function addFolder(){
	var user = document.id_form.idUser.value;
	var label = trim($("in_label_folder").value);
	if(label.indexOf('"', 0) != -1 || label.indexOf("'", 0) != -1){
		alert('Erreur : pas de " ou de \'');
		return;
	}
	var parent = $('in_parent_folder').options[$('in_parent_folder').selectedIndex].value;
	if(label != ""){
		//On réactualise le tree
		if(document.forms.display_form.rb_display[0].checked)
			ajaxCall("tree_favoris", "tree.php?idUser="+encodeURIComponent(user)+"&add=add&label="+encodeURIComponent(label)+"&url=folder&parent="+encodeURIComponent(parent));
		else if(document.forms.display_form.rb_display[1].checked)
			ajaxCall("thumbs", "thumbs.php?idUser="+encodeURIComponent(user)+"&add=add&label="+encodeURIComponent(label)+"&url=folder&parent="+encodeURIComponent(parent));
		else
			ajaxCall("tree_favoris", "tree.php?idUser="+encodeURIComponent(user)+"&add=add&label="+encodeURIComponent(label)+"&url=folder&parent="+encodeURIComponent(parent));
	}
}

//Modif d'un favoris(pas dossier)
function editFavoris(index){
	var user = document.id_form.idUser.value;
	var label = trim($("in_label_"+index).value);
	if(label.indexOf('"', 0) != -1 || label.indexOf("'", 0) != -1){
		alert('Erreur : pas de " ou de \'');
		return;
	}
	var url = trim($("in_url_"+index).value);
	if(url.indexOf('"', 0) != -1 || url.indexOf("'", 0) != -1){
		alert('Erreur : pas de " ou de \'');
		return;
	}
	var oldLabel = trim($("oldLabel_"+index).value);
	var parent = trim($("parent_"+index).value);
	if(url != ""){
		if(label == ""){
			label = url;
		}
		//On réactualise le tree
		if(document.forms.display_form.rb_display[0].checked)
			ajaxCall("tree_favoris", "tree.php?idUser="+encodeURIComponent(user)+"&edit=edit&label="+encodeURIComponent(label)+"&url="+encodeURIComponent(url)+"&oldLabel="+encodeURIComponent(oldLabel)+"&parent="+encodeURIComponent(parent));
		else if(document.forms.display_form.rb_display[2].checked){
			ajaxCall("tree_favoris", "tree.php?idUser="+encodeURIComponent(user)+"&edit=edit&label="+encodeURIComponent(label)+"&url="+encodeURIComponent(url)+"&oldLabel="+encodeURIComponent(oldLabel)+"&parent="+encodeURIComponent(parent));
			(function(){ajaxCall("thumbs", "thumbs.php?idUser="+encodeURIComponent(user))}).delay(500);
		}
	}
}

//Modif d'un dossier(step1)
function editFolder(index){
	$("folder_name_"+index).style.display = "none";
	$("folder_input_"+index).style.display = "";
	$("folder_input_"+index).focus();
}

//Modif d'un dossier(step2)
function renameFolder(index, cookieLabel){
	var user = document.id_form.idUser.value;
	var label = trim($("folder_input_"+index).value);
	if(label.indexOf('"', 0) != -1 || label.indexOf("'", 0) != -1){
		alert('Erreur : pas de " ou de \'');
		return;
	}
	var oldLabel = trim($("oldLabel_"+index).value);
	if(label != "folder_"+oldLabel){//Modification
		//On réactualise le tree
		ajaxCall("tree_favoris", "tree.php?idUser="+encodeURIComponent(user)+"&edit=edit&label=folder_"+encodeURIComponent(label)+"&url=folder&oldLabel="+encodeURIComponent(oldLabel)+"&cookie="+encodeURIComponent(cookieLabel));
	}else{//Pas de modif
		$("folder_name_"+index).style.display = "";
		$("folder_input_"+index).style.display = "none";
	}
}

//Suppression d'un favoris(pas dossier)
function deleteFavoris(label){
	if(window.confirm('Êtes-vous sûr de vouloir supprimer ce favoris ?')){
		var user = document.id_form.idUser.value;
		//On supprime le favoris
		ajaxCall("tree_favoris", "tree.php?idUser="+encodeURIComponent(user)+"&delete=delete&label="+encodeURIComponent(label));
		//On réactualise le tree
		if(document.forms.display_form.rb_display[1].checked || document.forms.display_form.rb_display[2].checked)
			(function(){ajaxCall("thumbs", "thumbs.php?idUser="+encodeURIComponent(user))}).delay(500);
	}
}

//Suppression d'un dossier
function deleteFolder(label, cookieLabel){
	if (window.confirm('Êtes-vous sûr de vouloir supprimer ce dossier ainsi que tout son contenu ?')){
		var user = document.id_form.idUser.value;
		//On réactualise le tree
		if(document.forms.display_form.rb_display[0].checked)
			ajaxCall("tree_favoris", "tree.php?idUser="+encodeURIComponent(user)+"&delete=delete&label="+encodeURIComponent(label)+"&cookie="+encodeURIComponent(cookieLabel));
		else if(document.forms.display_form.rb_display[2].checked){
			ajaxCall("tree_favoris", "tree.php?idUser="+encodeURIComponent(user)+"&delete=delete&label="+encodeURIComponent(label)+"&cookie="+encodeURIComponent(cookieLabel));
			(function(){ajaxCall("thumbs", "thumbs.php?idUser="+encodeURIComponent(user))}).delay(500);
		}
	}
}

function tree_mouse_over(index){
	$("delete_"+index).style.display = "";
	$("edit_"+index).style.display = "";
	if($("facebook_"+index))
		$("facebook_"+index).style.display = "";
	if($("twitter_"+index))
		$("twitter_"+index).style.display = "";
}

function tree_mouse_out(index){
	$("delete_"+index).style.display = "none";
	$("edit_"+index).style.display = "none";
	if($("facebook_"+index))
		$("facebook_"+index).style.display = "none";
	if($("twitter_"+index))
		$("twitter_"+index).style.display = "none";
}

function setHomePageFF() {
	document.location.href="setHomePage.php" 
}

function favoris(){
	if(navigator.appName != 'Microsoft Internet Explorer')
		window.sidebar.addPanel("GStart - Vos favoris en ligne","http://www.gstart.fr/","");
	else
		window.external.AddFavorite("http://www.gstart.fr/", "GStart - Vos favoris en ligne");
} 


function changeDisplay(){
	var user = document.id_form.idUser.value;
	if(document.forms.display_form.rb_display[0].checked){
		$("tree_favoris").style.display = "";
		$("thumbs").style.display = "none";
		ajaxCall("tree_favoris", "tree.php?idUser="+encodeURIComponent(user));
	}else if(document.forms.display_form.rb_display[1].checked){
		$("tree_favoris").style.display = "none";
		$("thumbs").style.display = "";
		ajaxCall("thumbs", "thumbs.php?idUser="+encodeURIComponent(user));
	}else{
		$("tree_favoris").style.display = "";
		$("thumbs").style.display = "";
		ajaxCall("tree_favoris", "tree.php?idUser="+encodeURIComponent(user));
		ajaxCall("thumbs", "thumbs.php?idUser="+encodeURIComponent(user));
	}
}

function setNote(){
	var user = document.id_form.idUser.value;
	var note = $('ta_note').value;
	//MAJ de la taille de la textarea
	var nbLignes = Math.floor(note.length/22)+1;
	if(nbLignes>15){
		$('ta_note').rows = nbLignes;
	}
	//Envoi de la requête
	var page = "saveNote.php?note="+encodeURIComponent(note);
	if(document.all){
        var XhrObj = new ActiveXObject("Microsoft.XMLHTTP");
    }else{
        var XhrObj = new XMLHttpRequest();
    }
    XhrObj.open("POST", page);
  	XhrObj.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
    XhrObj.send(null);
}

//****************************************************Fonctions Utiles****************************************************
function newWindow(url){
	window.open(url, '_blank');
}

function trim(str){
	var whitespace = ' \n\r\t\f\x0b\xa0\u2000\u2001\u2002\u2003\u2004\u2005\u2006\u2007\u2008\u2009\u200a\u200b\u2028\u2029\u3000';
	for (var i = 0; i < str.length; i++) {
		if (whitespace.indexOf(str.charAt(i)) === -1) {
			str = str.substring(i);
			break;
		}
	}
	for (i = str.length - 1; i >= 0; i--) {
		if (whitespace.indexOf(str.charAt(i)) === -1) {
			str = str.substring(0, i + 1);
			break;
		}
	}
	return whitespace.indexOf(str.charAt(0)) === -1 ? str : '';
}

function hideShowDiv(ident, imageId, label){
	var state = 'open';
	if($(ident).style.display == ""){
		$(ident).style.display = "none";
		$("image_"+imageId).src = "/design/images/folder_close.png";
		state = 'close';
	}else{
		$(ident).style.display = "";
		$("image_"+imageId).src = "/design/images/folder.png";
	}
	//Mémorisation de l'état du dossier en cookie
	setRawCookie(label, state, 31);
}

function execJS(node){
	var bSaf = (navigator.userAgent.indexOf('Safari') != -1);
	var bOpera = (navigator.userAgent.indexOf('Opera') != -1);
	var bMoz = (navigator.appName == 'Netscape');
	var st = node.getElementsByTagName('SCRIPT');
	var strExec;
	for(var i=0;i<st.length; i++){
		if(bSaf){
			strExec = st[i].innerHTML;
		}else if(bOpera){
			strExec = st[i].text;
		}else if(bMoz){
			strExec = st[i].textContent;
		}else{
			strExec = st[i].text;
		}
		try{
			eval(strExec);
		}catch(e){
			alert(e);
		}
	}
}

function ajaxCall(div, page, nocache){
	if(nocache == null) nocache = true;
	if(nocache == true)
		page = page+"&dummy="+Math.random();
	var e = $(div);
	new Request.HTML({url: page, method: 'post', evalScripts: true, update: e}).post({});
	
}

function loadFavicon(divname, url){
	ajaxCall(divname, "favicon.php?url="+url, false);
}

function showHideRight(){
	if($("rightToHide").getStyle("margin-right") != "-190px"){
		new Fx.Tween($("rightToHide")).start("margin-right", "-190px");
		$('imgArrowRight').setProperty('src', '/design/images/arrow_left.png');
		setRawCookie('displayRight', 'close', 24*3600*31);
	}else{
		new Fx.Tween($("rightToHide")).start("margin-right", "5px");
		$('imgArrowRight').setProperty('src', '/design/images/arrow_right.png');
		setRawCookie('displayRight', 'open', 24*3600*31);
	}
}

function switchSearch(id){
	if(!$('onglet_'+id).hasClass("onglet_actif")){
		//Onglet
		$('onglets').getChildren().each(function(item, index){
		    $(item).removeClass("onglet_actif");
		});
		$('onglet_'+id).addClass("onglet_actif");
		//Contenu
		$('searchContent').getChildren().each(function(item, index){
		    $(item).setStyle("display", "none");
		});
		$('search_'+id).setStyle("display", "block");
		//Traitement spécifique
		if(id=="telechargements")
			$('onglet_telechargements').setStyle("background-image", "url(/design/images/onglet_select_90.png)");
		else
			$('onglet_telechargements').setStyle("background-image", "url(/design/images/onglet_90.png)");
	}
}

//****************************************************Gestion des cookies****************************************************

function setRawCookie(name, value, expires){
	Cookie.write(name, value, {duration: expires});
}

function deleteCookie(nom){
	Cookie.dispose(nom);
}

//****************************************************Gestion de la taille des pages****************************************************

function updateSize() {
	var larg = (document.body.clientWidth);
	if(larg < 1015){
		if ($('leftToHide') != null)
			$('leftToHide').setStyle('display', 'none');
		if ($('rightToHide') != null)
			$('rightToHide').setStyle('display', 'none');
		if ($$('div.base')[0] != null){
			$$('div.base')[0].setStyle('display', 'none');
			$('div_calendar').setStyle('display', 'none');
		}
	}else{
		if ($('leftToHide') != null)
			$('leftToHide').setStyle('display', '');
		if ($('rightToHide') != null)
			$('rightToHide').setStyle('display', '');
		if ($$('div.base')[0] != null){
			$$('div.base')[0].setStyle('display', '');
			$('div_calendar').setStyle('display', '');
		}
	}
};
window.addEvent('domready',function() {
	updateSize();
});
window.addEvent('resize',function(){
	updateSize();
});

