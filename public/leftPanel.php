<?php
	$displayTree = $userClass->getDisplayTree($idUser);
	$displayThumbs = $userClass->getDisplayThumbs($idUser);
	$displayCal = $userClass->getDisplayCal($idUser);
	if($displayCal == true){
		echo '<script type="text/javascript" src="calendar/calendar-comp.js"></script>
		<link href="calendar/calendar.css" rel="stylesheet" type="text/css"/>
		<link href="calendar/base.css" rel="stylesheet" type="text/css"/>
		<link href="calendar/images/'.$userClass->getThemeCal($idUser).'/'.$userClass->getThemeCal($idUser).'.css" rel="stylesheet" type="text/css"/>';
		preLoadCalendarImages($userClass->getThemeCal($idUser));
	}
?>
<div id="leftToHide">
	<div id="leftContentAppli" class="arroundBox">
		<br/>
		<center>
			<b>AFFICHAGE RAPIDE</b><br/><br/>
		</center>
		<div style="margin-left:18px">
			<form name="display_form">
				<input type="radio" name="rb_display" value="tree" <?php if($displayTree == true && $displayThumbs == false){ echo 'checked="checked"'; } ?> onclick="changeDisplay()"> Arborescence<br/>
				<input type="radio" name="rb_display" value="thumbs" <?php if($displayThumbs == true && $displayTree == false){ echo 'checked="checked"'; } ?> onclick="changeDisplay()"> Aperçus<br/>
				<input type="radio" name="rb_display" value="treethumbs" <?php if($displayThumbs == true && $displayTree == true){ echo 'checked="checked"'; } ?> onclick="changeDisplay()"> Arborescence+Aperçus
			</form>
		</div>
		<br/>
		<center>
		<a href="settings.php">Changez l'affichage par défaut</a>
		</center>
		<br/>
		<hr width="100%">
		<center>
			<b>FONCTIONNALITES</b><br/><br/>
			<a href="javascript:" onclick="if(window.navigator.appName == 'Microsoft Internet Explorer'){javascript:this.style.behavior='url(#default#homepage)';this.setHomePage('http://www.gstart.fr');}else{setHomePageFF();}">Définir comme page d'accueil</a><br/>
			<a href="javascript:void(favoris());">Ajouter GStart à vos favoris</a><br/>
			<br/>
			<a href="conseil.php"><b>Conseiller GStart à un ami</b></a><br/>
		</center>
		<br/>
	</div>
</div>
<div id="div_calendar">
	<input type="text" name="date2" id="date1" readonly="" style="display:none;" />
</div>
