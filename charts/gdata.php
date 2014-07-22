<?php
$con = mysql_connect("localhost","[ username ]","[ password ]");

if (!$con) {
  die('Could not connect: ' . mysql_error());
}

mysql_select_db("nsf", $con);

$sth = mysql_query("select count(distinct a.awardid) as Count, year(AwardEffectiveDate) as Year from Award a,P2A p where a.awardid=p.awardid group by Year;");
$rows = array();
$rows['name'] = 'Grants';

$axis = array();
$axis['name'] = 'Axis';

while($r = mysql_fetch_array($sth)) {
	
	$block = array();
	
	$block['y'] = $r['Count'];
	$block['url'] = "https://duckduckgo.com/?q=" . $r['Year'];
	
	$rows['data'][] = $block;
	
	$axis['categories'][] = $r['Year'];
}

$result = array();
array_push($result, $axis);
array_push($result,$rows);


print json_encode($result, JSON_NUMERIC_CHECK);

mysql_close($con);
?>
