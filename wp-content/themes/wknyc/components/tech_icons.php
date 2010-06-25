<?php


$themedir = "http://" . $_SERVER['HTTP_HOST'] . "/wp-content/themes/moontemplate/";
$techIconsString = get_post_meta(get_the_ID(), 'tech_icons', true);

if($techIconsString != ""){
	$techIconsString = str_replace (" ", "", $techIconsString);
	$techIconsArray = split(",", $techIconsString);
	
	$arduino->imageFile= "ARDUINO.png";
	$arduino->wikiurl = "http://en.wikipedia.org/wiki/Arduino";
	$arduino->tagslink = "http://localhost:8888/?s=arduino";
	$iconObjects->ARDUINO = $arduino;
	
	$pingpong->imageFile= "PINGPONG.png";
	$pingpong->wikiurl = "http://en.wikipedia.org/wiki/Pingpong";
	$pingpong->tagslink = "http://localhost:8888/?s=test";
	$iconObjects->PINGPONG = $pingpong;
	
	$buttons->imageFile= "BUTTONS.png";
	$buttons->wikiurl = "http://en.wikipedia.org/wiki/Push-button";
	$buttons->tagslink = "http://localhost:8888/?s=test";
	$iconObjects->BUTTONS = $buttons;
	
	$leddisplay->imageFile= "LEDDISPLAY.png";
	$leddisplay->wikiurl = "http://en.wikipedia.org/wiki/Led_display";
	$leddisplay->tagslink = "http://localhost:8888/?s=test";
	$iconObjects->LEDDISPLAY = $leddisplay;
	
	$rfid->imageFile= "RFID.png";
	$rfid->wikiurl = "http://en.wikipedia.org/wiki/RFID";
	$rfid->tagslink = "http://localhost:8888/?s=test";
	$iconObjects->RFID = $rfid;
		
	
	echo "<div id='techIcons'>";
	
	for ( $i = 0; $i < count($techIconsArray); $i++) {
		$iconName = $techIconsArray[$i];
		$iconWikiLink = $iconObjects->$iconName->wikiurl;
		$iconImage = $iconObjects->$iconName->imageFile;
		
		echo "<a href='".$iconWikiLink."'>";
		echo "<img class='pic' src='".$themedir."images/".$iconImage."' />";
		echo "</a>";
		if($i != (count($techIconsArray)-1) ){
			echo "<img class='plus' src='".$themedir."images/plus.gif' />";
		}
	}
	
	echo "</div>";

}

?>