<!DOCTYPE html>
<!-- saved from url=(0041)http://www.chicagolobbyists.org/lobbyists -->
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<!-- Title -->
	<title>2013</title>
  <link rel="Shortcut Icon" href="http://www.chicagolobbyists.org/favicon.ico" type="image/x-icon">
  
	<!-- Info -->
	
  <!-- webmaster-tools <meta name="google-site-verification" content="6oHOT6PXw490mF1qyuiToMoG96gA85-kTbNYyL3UtTo" /> -->
  <meta name="google-site-verification" content="LjG-SeitOaHlivMGUN2L6jXAu_iRkxIfkqDMo0tlZAk">
	
	<!-- Styles -->
	<link rel="stylesheet" type="text/css" media="all" href="./scientists - Chicago Ripoff_files/master.css">

	<!-- JavaScript -->
  <script type="text/javascript" async="" src="./scientists - Chicago Ripoff_files/ga.js"></script><script src="./scientists - Chicago Ripoff_files/jquery.min.js" type="text/javascript"></script>
  <script src="./scientists - Chicago Ripoff_files/jquery-ui-1.8.16.custom.min.js" type="text/javascript"></script>
	<script src="./scientists - Chicago Ripoff_files/jquery.ezpz_hint.min.js" type="text/javascript"></script>
	<script src="./scientists - Chicago Ripoff_files/jquery.dataTables.js" type="text/javascript"></script>
	<script src="./scientists - Chicago Ripoff_files/dataTables.sorting.js" type="text/javascript"></script>
	<script src="./scientists - Chicago Ripoff_files/jquery.formatCurrency-1.4.0.min.js" type="text/javascript"></script>
	<script src="./scientists - Chicago Ripoff_files/listing.bars.js" type="text/javascript"></script>
  <script src="./scientists - Chicago Ripoff_files/js" type="text/javascript"></script><script src="./scientists - Chicago Ripoff_files/main.js" type="text/javascript"></script>
  <script src="./scientists - Chicago Ripoff_files/analytics_lib.js" type="text/javascript"></script>
	
	<script type="text/javascript">
    var geocoder = new google.maps.Geocoder();
    var map = null;
    var map_bounds = new google.maps.LatLngBounds();

    function defineMap(latlng) {
      var myOptions = {
        zoom: 13,
        center: latlng,
        mapTypeId: google.maps.MapTypeId.ROADMAP,
        mapTypeControl: false,
        scrollwheel: false,
        
      };
      map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
      
      var city_hall_latLang = new google.maps.LatLng(41.883205,-87.630204);
      var city_hall_MarkerImage = 'http://chicagolobbyists.org/images/city-hall.png';
      var city_hall = new google.maps.Marker({
          map: map,
          position: city_hall_latLang,
          icon: city_hall_MarkerImage,
          title: 'City Hall'
        });
    }

    function geocode(address) {
      geocoder.geocode( { 'address': address}, function(results, status) {
        if (status == google.maps.GeocoderStatus.OK) {
          if (map != null) {
            map.setCenter(results[0].geometry.location);
            var marker = new google.maps.Marker({
              map: map,
              position: results[0].geometry.location
            });
            map_bounds.extend(results[0].geometry.location);
            map.fitBounds(map_bounds);

            if (map.zoom > 13) {
              map.setZoom(13);
            }
          } else {
            alert("Geocode was not successful for the following reason: " + status);
          }
        }
      });
    }
  </script>
<script type="text/javascript" charset="UTF-8" src="./scientists - Chicago Ripoff_files/{common,util,geocoder}.js"></script><style type="text/css"></style><script type="text/javascript" charset="UTF-8" src="./scientists - Chicago Ripoff_files/{stats}.js"></script></head>
<body>

<div id="nav">
  <div id="nav-content">
    <ul>
      <li class=""><a href="http://www.chicagolobbyists.org/">Home</a></li>
      <li class=""><a href="http://www.chicagolobbyists.org/about">About</a></li>
      <li><a href="http://blog.chicagolobbyists.org/">Blog</a></li>
    </ul>
  </div>
  <div class="clear"></div>
</div>

<!-- Content -->
<div id="content">
  <!-- Header -->
<div id="header">
  <div id="logo"><a href="./Chicago Ripoff_files/Chicago Ripoff.htm"><img alt="Chicago Lobbyists" src="./cfa_brigade_logo.png"></a></div>
  <div id="search">
  	<form action="http://www.chicagolobbyists.org/search" method="get">
	    <input class="hint" type="text" title="Find…" name="q">
	    <input type="submit" value="Search">
	  </form>
  </div>
  <div class="clear"></div>
</div>
<!-- /Header -->
  <ul id="stats">
  <?php
    $yr = $_GET["year"];
    $con = new mysqli('localhost', 'root', '', 'nsf' /*YOUR DATABASE NAME*/ );
    if (mysqli_connect_errno()) 
    {
      die('Could not connect: ' . mysqli_error());
    }

    $sth = mysqli_query($con, "SELECT * FROM stats WHERE qyear =" . $yr . " AND querytype = 'P'");
	
	$cur = array();
	$cur[0] = $cur[1] = $cur[2] = $cur[3] = '\"\"';
	switch( $_GET['category'] ) {
		case 'Scientist':
			$cur[0] = "current";
			break;
		case 'Institution':
			$cur[1] = "current";
			break;
		case 'Directorate':
			$cur[2] = "current";
			break;
		case 'Division':
			$cur[3] = "current";
			break;
	}
	
    while( $r = mysqli_fetch_array($sth) )
    {
		echo "<li class=" . $cur[0] . "><a href=\"lists.php?type=" . $_GET['type'] . "&year=" . $yr . "&category=Scientist\" class=\"stat\"><strong>" . $r['PI'] . "</strong> Scientists </a></li>";
		echo "<li class=" . $cur[1] . "><a href=\"lists.php?type=" . $_GET['type'] . "&year=" . $yr . "&category=Institution\" class=\"stat\"><strong>" . $r['Institution'] . "</strong> Institutions </a></li>";
		echo "<li id = \"paid\"><span class=\"stat\"><strong>" . $r['TotalPatents'] . "</strong> Total Patents in " . $r['QYear'] . "</span></li>";
		echo "<li class=" . $cur[2] . "><a href=\"lists.php?type=" . $_GET['type'] . "&year=" . $yr . "&category=Directorate\" class=\"stat\"><strong>" . $r['Directorate'] . "</strong> Directorates </a></li>";
		echo "<li class=" . $cur[3] . "><a href=\"lists.php?type=" . $_GET['type'] . "&year=" . $yr . "&category=Division\" class=\"stat\"><strong>" . $r['Division'] . "</strong> Divisions </a></li>";
    }
        
    
    
    mysqli_close($con);
  ?>
</ul>
<hr>

  
  <script type="text/javascript">
    $(function(){
      setBarWidthByNumber();

      $("#listing").dataTable({
        "aoColumns": [
          null,
          { "sSortDataType": "dom-text", "sType": "number" }
        ],
        "aaSorting": [[1, "desc"], [0, "asc"]],
        "bFilter": false,
        "bInfo": false,
        "bPaginate": false
      });
    });
    
  </script>
  
  <div class="clear"></div>
     
    <?php

    $yr = $_GET["year"];
    $category = $_GET["category"];
    $name = 'Name';
    $pat = ( $_GET['type'] == 'P' ) ? 1 : 0;
	
    echo "<h1>" . $category . "s</h1>";
    echo "<div class=\"dataTables_wrapper\" id=\"listing_wrapper\"><table id=\"listing\" class=\"listing\">";
    echo "<thead><tr><th class=\"sorting_asc\" rowspan=\"1\" colspan=\"1\" style=\"width: 472px;\">";
    echo "<span>" . $category . "</span></th><th class=\"sorting_desc\" rowspan=\"1\" colspan=\"1\" style=\"width: 472px;\">";
    
	if($pat) {
		echo "<span>Patents in " . $yr . "</span></th></tr></thead><tbody>";
	}
	else {
		echo "<span>Grants in " . $yr . "</span></th></tr></thead><tbody>";
	}

	
    $con = new mysqli('localhost', 'root', '', 'nsf');
    if (mysqli_connect_errno()) 
    {
      die('Could not connect: ' . mysqli_error());
    }

    switch($category)
    {
      case "Directorate":
        if($_GET['type'] == 'P') {
			$category = "select Count(OrganizationDirectorate) as Count, OrganizationDirectorate from Award a, P2A p, Patent_All pa where a.awardid=p.awardid and p.patno=pa.patentno and year(pa.patpubdate)=" . $yr . " group by OrganizationDirectorate order by Count desc;";
		}
		else {
			$category = "select count(*) as Count, OrganizationDirectorate from Award a, P2A p where a.awardid=p.awardid  and year(AwardEffectiveDate)=" . $yr . " group by OrganizationDirectorate order by Count desc;";
		}
        $name = "OrganizationDirectorate";
        break;
      case "Division":
        if($_GET['type'] == 'P') {
			$category = "select Count(OrganizationDivision) as Count, OrganizationDivision from Award a, P2A p, Patent_All pa where a.awardid=p.awardid and p.patno=pa.patentno and year(pa.patpubdate)=" . $yr . " group by OrganizationDivision order by Count desc;";
		}
		else {
			$category = "select count(*) as Count, OrganizationDivision from Award a, P2A p where a.awardid=p.awardid  and year(AwardEffectiveDate)=" . $yr . " group by OrganizationDivision order by Count desc;";
		}
        $name = "OrganizationDivision";
        break;
      case "Scientist":
        if($_GET['type'] == 'P') {
			$category = "select FirstName as firstname, LastName as lastname, concat( FirstName,' ',LastName) as Name, count( concat(FirstName,' ',LastName )) as Count  from PI, P2A, Patent_All p where year(patpubdate)=" . $yr . " and patno=patentno and PI.AwardID=P2A.awardid group by Name order by Count desc;";
		}
		else {
			$category = "select FirstName as firstname, LastName as lastname, concat( FirstName, ' ', LastName ) as Name, count( concat(FirstName,' ', LastName) ) as Count from PI i, P2A p where i.AwardID = p.AwardID and Year(StartDate)=" . $yr . " group by firstname, lastname order by Count desc;";
		}
		break;
      case "Institution":
		if($_GET['type'] == 'P') {
			$category = "select Name, Count(name) as Count from Institution i, P2A,Patent_All p where year(patpubdate)=" . $yr . " and patno=patentno and i.awardid=P2A.awardid group by Name order by Count desc;";
		}
		else {
			$category = "select Name, Count(name) as Count from Institution where AwardID in (select a.awardid from Award a, P2A p where a.awardid=p.awardid and year(a.AwardEffectiveDate)=" . $yr . ") group by name order by Count desc;";
		}
        break;
    }

    $sth = mysqli_query($con, $category);
    $i = 0;
    
	echo $category;
	
    while( $r = mysqli_fetch_array($sth) )
    {

      echo "<tr class = \"";
      if($i % 2 == 0)
      {
        echo "odd\"";
      }
      else
      {
        echo "even\"";
      }
        
      echo "><td class=\" sorting_2\"><h3>";
	
	$encoded = urlencode( $r[$name] );
	
	$hlink = "<a href = details.php?type=" . $_GET['type'] . "&year=" . $yr . "&category=";
	
	switch($_GET['category'])
    {
      case "Directorate":
        $hlink = $hlink . "dir&orgdir=" . $encoded;
        break;
      case "Division":
        $hlink = $hlink . "div&orgdiv=" . $encoded;
        break;
      case "Scientist":
        $hlink = $hlink . "pi&firstname=" . urlencode( $r['firstname'] ) . "&lastname=" . urlencode( $r['lastname'] );
        break;
      case "Institution":
        $hlink = $hlink .  "inst&name=" . $encoded;
        break;
    }
	$hlink = $hlink . ">" . $r[$name] . "</a>";
	
	echo $hlink;
    
	echo "</h3></td><td class=\"bar sorting_1\"><span style=\"width: 100%;\"><strong>";
    echo $r['Count'] . "</strong></span></td></tr>"; 

      $i++;
    }
        
    
    echo "</tbody>";
    
    mysqli_close($con);

    ?>
    
    

  </table>
</div>

  <!-- Footer -->
<div id="footer">
  <p>Chicago Lobbyists designed and developed by <a href="http://opencityapps.org/">Open City</a>. Copyright © 2012.</p>
</div>
<!-- /Footer -->

</div>
<!-- /Content -->



</body></html>