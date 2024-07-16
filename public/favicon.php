<?php
require_once($_SERVER['DOCUMENT_ROOT']."/classes/logs.php");

$expires = 60*60*24;
header("Pragma: public");
header("Cache-Control: maxage=".$expires);
header('Expires: ' . gmdate('D, d M Y H:i:s', time()+$expires) . ' GMT');

/*
function getFavicon($url) {
	if(substr(strtolower($url),0,4) != "http")
		return false;
	$handle = @fopen($url, "rb");
	if($handle){
		$html = stream_get_contents($handle);
		fclose($handle);
		if (preg_match('/<link[^>]+rel="(?:shortcut )?icon"[^>]+?href="([^"]+?)"/si', $html, $matches)) {
			$linkUrl = html_entity_decode($matches[1]); 
			if (substr($linkUrl, 0, 1) == '/') {
				$urlParts = parse_url($url); 
				$faviconURL = $urlParts['scheme'].'://'.$urlParts['host'].$linkUrl; 
			} elseif (substr($linkUrl, 0, 7) == 'http://') { 
				$faviconURL = $linkUrl; 
			} elseif (substr($url, -1, 1) == '/') { 
				$faviconURL = $url.$linkUrl; 
			} else { 
				$faviconURL = $url.'/'.$linkUrl; 
			} 
		}else{
			$urlParts = parse_url($url); 
			$faviconURL = $urlParts['scheme'].'://'.$urlParts['host'].'/favicon.ico';
		}
		$HTTPRequest = @fopen($faviconURL, 'r'); 
		if ($HTTPRequest) {
			return $faviconURL;
		}
	}
	return false;
}
*/

function getDomainFromUrl($url) {
  // Vérifier et ajouter http si l'URL ne contient pas de schéma
  if (!preg_match('~^(?:f|ht)tps?://~i', $url)) {
      $url = 'http://' . $url;
  }

  // Utiliser parse_url pour analyser l'URL
  $parsedUrl = parse_url($url);

  // Vérifier si l'URL contient un composant 'host'
  if (isset($parsedUrl['host'])) {
      return $parsedUrl['host'];
  } else {
      return null;
  }
}

/* Test de la fonction fournie par chatGPT */
function getFavicon($url) {
  $domain = getDomainFromUrl($url);
  return "https://www.google.com/s2/favicons?domain=".$domain;
}

$icon = getFavicon($_GET["url"]);
if($icon == false)
{
	header("Content-Type: image/png");
	readfile("design/images/favicon.png");
}
else
{
	header("Content-Type: image/x-icon");
	readfile($icon);
}
?>