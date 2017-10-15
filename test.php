<?php

	$addr = $_GET['p'];
	$str = file("https://github.com/PastFantasy1640/jubeon_pro/wiki/" . $addr);


	$html_str = "";
	$str_linenum = count($str);
	$end_pattern = '/<\/div>/';
	//362行目から、<div id="wiki-footer" class="wiki-footer">が出てくる直前まで
	for($i = 362; $i < $str_linenum; $i++){
		$html_str .= $str[$i] . "\n";
		if(preg_match($end_pattern, $str[$i])) break;
	}

	
?>

<html>
<head>
</head>
<body>
<?php //var_dump($str); ?>
<?php echo $html_str; ?>
<?php //echo htmlspecialchars($str); ?>
<body>
</html>
