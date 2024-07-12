<?php
require_once($_SERVER['DOCUMENT_ROOT']."/libs/PHPMailer/class.phpmailer.php");
require_once($_SERVER['DOCUMENT_ROOT'].'/conf.php');
function getHead($title, $isIndex = false, $showHome = false, $description = ""){
	//Encodage UTF-8
	header("Content-Type:text/html; charset=utf-8");
	if($description == "")
		$description = "GStart est une application internet qui vous permet de gérer vos sites favoris(bookmarks, signets) en ligne afin d'y avoir accès à partir de n'importe quel ordinateur relié à internet. En faisant de GStart votre page d'acceuil personnalisée de votre navigateur vous accédez dès l'ouverture de votre navigateur à toutes les informations qui vous sont utiles (favoris, bloc-note, champ de recherche sur internet).";
	echo '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
		<html xmlns="http://www.w3.org/1999/xhtml">
		<head>
		<link rel="shortcut icon" href="/design/images/favicon.png">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="keywords" content="favoris en ligne, bookmarks en ligne, signets en ligne, gérer ses favoris, gestion de favoris, 
		sauvegarder bookmarks, sauvegarder favoris, page d\'accueil web, page d\'accueil internet, page d\'accueil personnalisée, 
		enregistrer ses favoris, stocker ses favoris, organiser ses favoris, page de démarrage internet, page de démarrage web, 
		accueil navigateur, page démarrage navigateur, page démarrage web, partage favoris facebook twitter"/>
		<meta name="description" content="'.$description.'"/>
		<link rel="image_src" href="/design/images/logo_base_40.png" />
		<title>'.$title.'</title>
		<link href="/design/styles.css" rel="stylesheet" type="text/css"/>';
	if($isIndex){
		echo'
		<!-- Si le Javscript est désactivé -->
		<noscript>
			<meta http-equiv="refresh" content="0;URL=nojs.html">
		</noscript>
		<!-- MooTools -->
		<script language="javascript" type="text/javascript" src="/libs/mootools/mootools-core-1.4.1-full-compat.js"></script>
		<!-- My files -->
		<script type="text/javascript" src="/functions.js"></script>
		<!--Redimensionnement textarea-->
		<script type="text/javascript" src="/libs/flext/flext-comp.js"></script>
		<!--Redimensionnement textarea-->
		<script type="text/javascript" src="/libs/qslide/qslide.js"></script>
		';
	}
	echo '</head><body ';
	if($isIndex && !$showHome)
		echo 'OnLoad="init()"';
	if($isIndex && $showHome)
		echo 'OnLoad="initQSlide()"';
	echo '>';
	/*
	echo "
	<script type=\"text/javascript\">
	  var _gaq = _gaq || [];
	  _gaq.push(['_setAccount', 'UA-7461678-2']);
	  _gaq.push(['_setDomainName', '.gstart.fr']);
	  _gaq.push(['_trackPageview']);
	  (function() {
		var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
		ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
		var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	  })();
	</script>";
	*/
	echo "
	<!-- Google tag (gtag.js) -->
	<script async src=\"https://www.googletagmanager.com/gtag/js?id=G-JRV8XJ3YMK\"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());
	
	  gtag('config', 'G-JRV8XJ3YMK');
	</script>
	";
	echo '<a href="http://www.gstart.fr" style="text-decoration:none;"><img src="/design/images/logo_base_40.png" alt="logo de l\'application" style="position:absolute;left:10px;top:5px;" border="0" title="GStart - version '.VERSION_APPLI.'"></img><h1 style="position:absolute;top:-3px;left:50px">GStart</h1></a>';
}
function getFoot(){
	echo '<div id="footer">
		<span>Copyright &copy; '.date("Y").' - <a href="http://www.gstart.fr/">GStart</a> - All Rights Reserved</span><br/>
		<span>Partenaires : 
		<a href="http://www.thumbshots.com" target="_blank" title="Thumbnails Screenshots by Thumbshots">Thumbnail Screenshots by Thumbshots</a>
		</span>
	</div>';
	echo '</body>
	</html>';
}
function getHeadAdmin(){
	//Encodage UTF-8
	header("Content-Type:text/html; charset=utf-8");
	echo '
	<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
	<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>GStart | Administration</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		<!-- MooTools -->
		<script language="javascript" type="text/javascript" src="/libs/mootools/mootools-core-1.4.1-full-compat.js"></script>
		<style type="text/css">
		<!--
			body{background-color:#00BFFF;font-size:1.1em;}
			h2{font-size:1.3em;text-decoration:underline;}
			#head{height:50px;text-align:center;font-size:2em;font-family:serif;font-weight:bold;}
			.width{width:980px;margin:auto;}
		-->
		</style>
	</head>
	<body>
		<div class="width">
	';
}
function getFootAdmin(){
	echo '</div></body></html>';
}
function getLinks(){
	echo '<a href="/referencement/favoris-en-ligne.php">Favoris en ligne</a>
		 - <a href="/referencement/bookmarks-en-ligne.php">Bookmarks en ligne</a>
		 - <a href="/referencement/signets-en-ligne.php">Signets en ligne</a>
		 - <a href="/referencement/gestion-de-favoris.php">Gestion de favoris</a>
		 - <a href="/referencement/page-accueil-web.php">Page d\'accueil web</a>
		 - <a href="/referencement/page-accueil-internet.php">Page d\'accueil internet</a>
		 - <a href="/referencement/page-accueil-personnalisee.php">Page d\'accueil personnalisée</a>
		 - <a href="/referencement/enregistrer-stocker-favoris.php">Enregistrer et stocker ses favoris</a>
		 - <a href="/referencement/partager-vos-sites-favoris.php">Partager vos sites favoris</a>';
}
function isValidEmail($email){
	$atom   = '[-a-z0-9!#$%&\'*+\\/=?^_`{|}~]';   // caractères autorisés avant l'arobase
	$domain = '([a-z0-9]([-a-z0-9]*[a-z0-9]+)?)'; // caractères autorisés après l'arobase (nom de domaine)
	$regex = '/^' . $atom . '+' .   // Une ou plusieurs fois les caractères autorisés avant l'arobase
	'(\.' . $atom . '+)*' .         // Suivis par zéro point ou plus
									// séparés par des caractères autorisés avant l'arobase
	'@' .                           // Suivis d'un arobase
	'(' . $domain . '{1,63}\.)+' .  // Suivis par 1 à 63 caractères autorisés pour le nom de domaine
									// séparés par des points
	$domain . '{2,63}$/i';          // Suivi de 2 à 63 caractères autorisés pour le nom de domaine
	// test de l'adresse e-mail
	if (preg_match($regex, $email)) {
		return true;
	} else {
		return false;
	}
}
function htmlMail($to,$from,$subject,$html){
    $boundary = "_".md5(uniqid(rand()));
    $entete = "MIME-Version: 1.0\n";
    $entete .= "X-Mailer: GStart\n";
    $entete .= "Return-Path: $from\n";
    $entete .= "Reply-to: $from\n";
    $entete .= "From: $from\n";
       
    // Rajout pour éviter spam GMail
    $entete .= "Organization: ".$_SERVER['HTTP_HOST']."\n";
    $entete .= "X-Priority: 1\n";
    $entete .= "Date: ".date('D, d M Y H:i:s')." +0200\n";
   
    $message = "--" . $boundary . "\n";
    $message.= "This is a multi-part message in MIME format.\n\n";
    $message .= "Content-Type: text/plain; charset=\"utf-8\"\n";
    $message .= "Content-Transfer-Encoding: quoted-printable\n\n";
    $message .= strip_tags(str_replace("<br/>","\n",$html));
    $message .= "\n\n";
    $message .= "--" . $boundary . "\n";
    $message .= "Content-Type: text/html; charset=\"utf-8\"\n";
    $message .= "Content-Transfer-Encoding: quoted-printable\n\n";
    //$message .= str_replace("\n","<br/>",str_replace("=","=3D",$html));
    $message .= str_replace("=","=3D",$html);
    $message .= "\n\n";
    $entete .= "Content-Type: multipart/alternative; boundary=\"$boundary\"";
   
    return mail($to,$subject,$message,$entete);
}
/*Formatte les éléments avant insertion dans la BD*/
function qs($value, $forceString = false){
	if(strtoupper($value) == "NULL")
		return $value;
	if (get_magic_quotes_gpc())
		$value = stripslashes($value);
	// Protection si ce n'est pas un entier
	if ($forceString || !is_numeric($value))
		$value = "'" . $value . "'";
	return $value;
}
/*Mise en cache des images du calendrier*/
function preLoadCalendarImages($idTheme){
	echo '<p style="display:none">';
	for($cpt=1; $cpt<=12; $cpt++){
		echo '<img src="calendar/images/'.$idTheme.'/'.$cpt.'.jpg" alt=""/>';
	}
	echo '</p>';
}
/*Envoi de mail*/
function sendMail($to, $subject, $content){
	global $error;
	$mail = new PHPMailer();  
	$mail->CharSet = "UTF-8";
	$mail->IsSMTP();
	$mail->Mailer = "smtp";
	$mail->Host = SMTP;
	$mail->Port = SMTP_PORT;
	$mail->SMTPAuth = true;
	$mail->Username = SMTP_FROM;
	$mail->Password = SMTP_PWD;
	$mail->SetFrom(SMTP_FROM, SMTP_NAME);
	$mail->IsHTML(true);
	
	$content_debut = MAIL_CONTENT_DEBUT;
	$content_fin = MAIL_CONTENT_FIN;
	
	$mail->AddAddress($to);  
	$mail->Subject  = $subject;
	$mail->Body     = $content_debut.$content.$content_fin;
	$mail->WordWrap = 100;  
	 
	if(!$mail->Send()){
		$error = $mail->ErrorInfo;
		return false;
	}else
		return true;
}
/*
Error Code
 -1 not an adress mail
 -2 can't connect to SMTP
 -3 no mx server found
 -4 connection rejected
 -5 our adress has been rejected
 -6 this adress isn't valid
 -7 problem with EHLO command
*/
function mailTester($mail){
 if(preg_match("#^(.*)@(.*\.[a-z]{2,4})$#i",$mail,$ret)){
  $socket = socket_create(AF_INET, SOCK_STREAM, 0);
  getmxrr($ret[2],$r);
  if(count($r)==0)
  {//try to connect directly to the server
   @fsockopen($ret[2],"25",$er1,$er2,0.5); //can't use it with socket :s
   if($er1>0)
    return -3;//no mx server and no smtp server
   $r[0]=$ret[2];
  }
 
  if(!socket_connect($socket,$r[0],"25"))
   return -2;//can't connect
   
  socket_recv($socket,$retour,1024,0);
  $ret=getCodeMsg($retour);
  if($ret[0]!=220)
   return -4;
   
  socket_write($socket,"EHLO google.com\n");
  socket_recv($socket,$retour,1024,0);
  $ret=getCodeMsg($retour);
 
  if($ret[0]!=250)
   return -7;
   
  socket_write($socket,"MAIL FROM: <mailchecker@gmail.com>\n");
  socket_recv($socket,$retour,1024,0);
  $ret=getCodeMsg($retour);
 
  if($ret[0]!=250)
   return -5;
 
  socket_write($socket,"RCPT TO: <".$mail.">\n");
  socket_recv($socket,$retour,1024,0);
  socket_write($socket,"quit\n");//bisou
  $ret =getCodeMsg($retour);
  socket_close($socket);
  if($ret[0]==250)
   return 1;
  else
   return -6;
 }
 return -1;//not an adress mail
}
 
function getCodeMsg($ret){
	preg_match("#^([0-9]+) (.*)$#im",$ret,$tab);
	array_shift($tab);
	return $tab;
}
?>
