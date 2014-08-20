<?php
$con = mysql_connect("localhost","root","dk6211");

if (!$con) {
  die('Could not connect: ' . mysql_error());
}

mysql_select_db("test", $con);

$sth = mysql_query("SELECT revenue FROM projections_sample");
$rows = array();
$rows['name'] = 'Revenue';
while($r = mysql_fetch_array($sth)) {
	
	$block = array();
	
	$block['y'] = $r['revenue'];
	$block['url'] = "http://duckduckgo.com";
	
	$rows['data'][] = $block;
}

$sth = mysql_query("SELECT overhead FROM projections_sample");
$rows1 = array();
$rows1['name'] = 'Overhead';
while($rr = mysql_fetch_assoc($sth)) {
    $rows1['data'][] = $rr['overhead'];
}

$result = array();
array_push($result,$rows);
array_push($result,$rows1);


print json_encode($result, JSON_NUMERIC_CHECK);

mysql_close($con);
?>
