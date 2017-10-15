<?php

function getWikiText(){
	//GET method
	$user = $_GET['u'];	//username
	$rep = $_GET['r'];		//repository name
	//when GET['p'] is not set, home wiki is shown instead.
	$addr = (isset($_GET['p']) ? $_GET['p'] : "");	//page id
	
	//result strings
	$html_str = "";
	if(isset($user) && isset($rep)){
		$str = file("https://github.com/" . $user . "/" . $rep . "/" . $addr);
		$str_linenum = count($str);
		$end_pattern = '/<\/div>/';
		//362行目から、<div id="wiki-footer" class="wiki-footer">が出てくる直前まで
		for($i = 362; $i < $str_linenum; $i++){
			$html_str .= $str[$i] . "\n";
			if(preg_match($end_pattern, $str[$i])) break;
		}
	}
	
	return $html_str;
}

?>

