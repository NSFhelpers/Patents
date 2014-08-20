<!DOCTYPE html>
<!-- saved from url=(0032)http://www.chicagolobbyists.org/ -->
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<!-- Title -->
	<title>TJHSST</title>
	<link rel="Shortcut Icon" href="http://www.chicagolobbyists.org/favicon.ico" type="image/x-icon">
	
	<!-- Info -->
	
  <!-- webmaster-tools <meta name="google-site-verification" content="6oHOT6PXw490mF1qyuiToMoG96gA85-kTbNYyL3UtTo" /> -->
  <meta name="google-site-verification" content="LjG-SeitOaHlivMGUN2L6jXAu_iRkxIfkqDMo0tlZAk">	<!-- Styles -->
	<link rel="stylesheet" type="text/css" media="all" href="./Chicago Lobbyists_files/master.css">

	<!-- JavaScript -->
  <script src="./Chicago Lobbyists_files/jquery-ui-1.8.16.custom.min.js" type="text/javascript"></script>
	<script src="./Chicago Lobbyists_files/jquery.ezpz_hint.min.js" type="text/javascript"></script>
	<script src="./Chicago Lobbyists_files/jquery.dataTables.js" type="text/javascript"></script>
	<script src="./Chicago Lobbyists_files/dataTables.sorting.js" type="text/javascript"></script>
	<script src="./Chicago Lobbyists_files/jquery.formatCurrency-1.4.0.min.js" type="text/javascript"></script>
	<script src="./Chicago Lobbyists_files/listing.bars.js" type="text/javascript"></script>
  <script src="./Chicago Lobbyists_files/js" type="text/javascript"></script><script src="./Chicago Lobbyists_files/main.js" type="text/javascript"></script>
  <script src="./Chicago Lobbyists_files/analytics_lib.js" type="text/javascript"></script>
	
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
<script type="text/javascript" charset="UTF-8" src="./Chicago Lobbyists_files/{common,util,geocoder}.js"></script><script type="text/javascript" charset="UTF-8" src="./Chicago Lobbyists_files/{stats}.js"></script></head>
<body>

<div id="nav">
  <div id="nav-content">
    <ul>
      <li class="current"><a href="./Chicago Lobbyists_files/Chicago Lobbyists.htm">Home</a></li>
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
  <div id="logo"><a href="./Chicago Lobbyists_files/Chicago Lobbyists.htm"><img alt="Chicago Lobbyists" src="./cfa_brigade_logo.png"></a></div>
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

    $con = new mysqli('localhost', 'root', '', 'nsf' /*YOUR DATABASE NAME*/ );
    if (mysqli_connect_errno()) 
    {
      die('Could not connect: ' . mysqli_error());
    }

    $sth = mysqli_query($con, "SELECT * FROM stats WHERE qyear = 2013 AND querytype = 'P'");

    while( $r = mysqli_fetch_array($sth) )
    {
      echo "<li class=\"\"><a class=\"stat\"><strong>" . $r['PI'] . "</strong> Scientists </a></li>";
      echo "<li class=\"\"><a class=\"stat\"><strong>" . $r['Institution'] . "</strong> Institutions </a></li>";
      echo "<li id = \"paid\"><span class=\"stat\"><strong>" . $r['TotalPatents'] . "</strong> Total Patents in " . $r['QYear'] . "</span></li>";
      echo "<li class=\"\"><a class=\"stat\"><strong>" . $r['Directorate'] . "</strong> Directorates </a></li>";
      echo "<li class=\"\"><a class=\"stat\"><strong>" . $r['Division'] . "</strong> Divisions </a></li>";
    }
        
    
    
    mysqli_close($con);
  ?>
</ul>
<hr>

  
  <script type="text/javascript">
    $(function(){
    	setUlBarWidthByNumber('home-lobbyists');
    	setUlBarWidthByNumber('home-firms');
    	setUlBarWidthByNumber('home-clients');
    	setUlBarWidthByNumber('home-agencies');
    });
    
  </script>
  
  <div class="clear"></div>
  
  <div id="dashboard">
    <div class="c2l">
      <div class="section">
        <h2>Most Productive Scientists <a href="http://www.chicagolobbyists.org/lobbyists">All Scientists »</a></h2>
        <ul class="chartlist" id="home-lobbyists">
          <?php

			//$con = mysql_connect('localhost','root', '');
			$con = new mysqli('localhost', 'root', '', 'nsf' /*YOUR DATABASE NAME*/ );
			
			//if (!$con) {
			if (mysqli_connect_errno()) {
			  die('Could not connect: ' . mysqli_error());
			}
			
			//mysql_select_db("test", $con);
			
			$sth = mysqli_query($con, "select count(*) as Count, OrganizationDivision from award a, p2a p where a.awardid=p.awardid  and year(AwardEffectiveDate)=2003 group by OrganizationDivision order by Count desc limit 5;");
			
			while($r = mysqli_fetch_array($sth)) {
				$num = $r['Count'];
				$name = $r['OrganizationDivision'];
				echo "<li><a href=\"http://www.chicagolobbyists.org/agencies/city-council\">" . $name . "</a><span class=\"index\" style=\"width: 100%;\"></span><span class=\"count\">" . $num ."</span></li>";
				
			}		
			mysqli_close($con);
			?>
        </ul>
      </div>
      
      <div class="section">
        <h2>Division <a href="http://www.chicagolobbyists.org/clients">All Divisions »</a></h2>
        <ul class="chartlist" id="home-clients">
          <?php

			//$con = mysql_connect('localhost','root', '');
			$con = new mysqli('localhost', 'root', '', 'nsf' /*YOUR DATABASE NAME*/ );
			
			//if (!$con) {
			if (mysqli_connect_errno()) {
			  die('Could not connect: ' . mysqli_error());
			}
			
			//mysql_select_db("test", $con);
			
			$sth = mysqli_query($con, "select count(*) as Count, OrganizationDirectorate from award a, p2a p where a.awardid=p.awardid  and year(AwardEffectiveDate)=2003 group by OrganizationDirectorate order by Count desc limit 5;");
			
			while($r = mysqli_fetch_array($sth)) {
				$num = $r['Count'];
				$name = $r['OrganizationDirectorate'];
				echo "<li><a href=\"http://www.chicagolobbyists.org/agencies/city-council\">" . $name . "</a><span class=\"index\" style=\"width: 100%;\"></span><span class=\"count\">" . $num ."</span></li>";
				
			}		
			mysqli_close($con);
			?>
        </ul>
      </div>
    </div>
    
    <div class="c2r">
      <div class="section">
        <h2>Coolest Institute<a href="http://www.chicagolobbyists.org/firms">All Institutions »</a></h2>
        <ul class="chartlist" id="home-firms">
          <?php

			//$con = mysql_connect('localhost','root', '');
			$con = new mysqli('localhost', 'root', '', 'nsf' /*YOUR DATABASE NAME*/ );
			
			//if (!$con) {
			if (mysqli_connect_errno()) {
			  die('Could not connect: ' . mysqli_error());
			}
			
			//mysql_select_db("test", $con);
			
			$sth = mysqli_query($con, "select Name, Count(name) as Count from institution where awardid in (select a.awardid from award a, p2a p where a.awardid=p.awardid and year(a.AwardEffectiveDate)=2003) group by name order by Count desc limit 5");
			
			while($r = mysqli_fetch_array($sth)) {
				$num = $r['Count'];
				$name = $r['Name'];
				echo "<li><a href=\"http://www.chicagolobbyists.org/agencies/city-council\">" . $name . "</a><span class=\"index\" style=\"width: 100%;\"></span><span class=\"count\">" . $num ."</span></li>";
				
			}		
			mysqli_close($con);
			?>
        </ul>
      </div>
      
      <div class="section">
        <h2>Most patented scientst<a href="http://www.chicagolobbyists.org/agencies">All Scientist »</a></h2>
        <ul class="chartlist" id="home-agencies">
          	<?php

			//$con = mysql_connect('localhost','root', '');
			$con = new mysqli('localhost', 'root', '', 'nsf' /*YOUR DATABASE NAME*/ );
			
			//if (!$con) {
			if (mysqli_connect_errno()) {
			  die('Could not connect: ' . mysqli_error());
			}
			
			//mysql_select_db("test", $con);
			
			$sth = mysqli_query($con, "select concat( LastName, ' ', FirstName ) as Name, count( concat(FirstName,' ', LastName) ) as Count from PI i, P2A p where i.AwardID = p.AwardID and Year(StartDate)=2003 group by firstname, lastname order by Count desc limit 5");
			
			while($r = mysqli_fetch_array($sth)) {
				$num = $r['Count'];
				$name = $r['Name'];
				echo "<li><a href=\"http://www.chicagolobbyists.org/agencies/city-council\">" . $name . "</a><span class=\"index\" style=\"width: 100%;\"></span><span class=\"count\">" . $num ."</span></li>";

			}		
			mysqli_close($con);
			?>

            
        </ul>
      </div>
    </div>
    <div class="clear"></div>
  </div>
  
  <hr>
  <div class="content-secondary">
  	<script src="./Chicago Lobbyists_files/widget.js"></script>
<script>
new TWTR.Widget({
  version: 2,
  type: 'profile',
  rpp: 1,
  interval: 6000,
  width: 'auto',
  height: 300,
  theme: {
    shell: {
      background: '#B8E4F5',
      color: '#027ab6'
    },
    tweets: {
      background: '#ffffff',
      color: '#000000',
      links: '#027BB6'
    }
  },
  features: {
    scrollbar: false,
    loop: false,
    live: false,
    hashtags: true,
    timestamp: true,
    avatars: true,
    behavior: 'all'
  }
}).render().setUser('chilobbyists').start();
</script>
  </div>
  <h2>About this project</h2>
    <p>No <a href="http://http://www.tjhsst.edu/"> TJ</a> </p>

<h2>Contact us</h2>
    <p>If you have any comments, questions, or feature suggestions, you can email us at <a href="mailto:joiecwang@gmail.com">cool@gmail.com</a>.</p>
  
  <!-- Footer -->
<div id="footer">
  <p>Chicago Lobbyists designed and developed by <a href="http://opencityapps.org/">Open City</a>. Copyright © 2012.</p>
</div>
<!-- /Footer -->

</div>
<!-- /Content -->



</body></html>
