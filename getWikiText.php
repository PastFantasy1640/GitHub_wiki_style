<?php

function getWikiText($user_name, $repository_name, $page){
	//result strings
	$html_str = "";
	if(isset($user) && isset($rep)){
		$str = file("https://github.com/" . $user . "/" . $rep . "/" . $addr);
		$str_linenum = count($str);
		$end_pattern = '/<\/div>/';
		//from 363line to the word : "</div>"
		for($i = 363; $i < $str_linenum; $i++){
			if(preg_match($end_pattern, $str[$i])) break;
			$html_str .= $str[$i] . "\n";
		}
	}
	
	return $html_str;
}

