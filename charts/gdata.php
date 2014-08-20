

<?php
$con = mysqli_connect("localhost", "root", "", "nsf");

if( mysqli_connect_errno() ) {
	die('Could not connect: ' . mysqli_error() );
}

$sth = mysqli_query($con, "select count(distinct a.awardid) as Count, year(AwardEffectiveDate) as Year from Award a,P2A p where a.awardid=p.awardid group by Year;");
$rows = array();
$rows['name'] = 'Grants';

$axis = array();
$axis['name'] = 'Axis';

while($r = mysqli_fetch_array($sth)) {
	
	$block = array();
	
	$block['y'] = $r['Count'];
	$block['url'] = "minfo.php?type=G&year=" . $r['Year'];
	
	$rows['data'][] = $block;
	
	$axis['categories'][] = $r['Year'];
}

$result = array();
array_push($result, $axis);
array_push($result,$rows);


print json_encode($result, JSON_NUMERIC_CHECK);

mysqli_close($con);
?>

