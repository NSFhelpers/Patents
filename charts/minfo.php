<!DOCTYPE html>
<!-- saved from url=(0032)http://www.chicagolobbyists.org/ -->
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<!-- Title -->
	<title>Chicago Lobbyists</title>
	<link rel="Shortcut Icon" href="http://www.chicagolobbyists.org/favicon.ico" type="image/x-icon">
	
	<!-- Info -->
	
  <!-- webmaster-tools <meta name="google-site-verification" content="6oHOT6PXw490mF1qyuiToMoG96gA85-kTbNYyL3UtTo" /> -->
  <meta name="google-site-verification" content="LjG-SeitOaHlivMGUN2L6jXAu_iRkxIfkqDMo0tlZAk">
	
	<!-- Styles -->
	<link rel="stylesheet" type="text/css" media="all" href="./minfo_files/master.css">

	<!-- JavaScript -->
  <script type="text/javascript" async="" src="./minfo_files/ga.js" style=""></script><script src="./minfo_files/jquery.min.js" type="text/javascript"></script>
  <script src="./minfo_files/jquery-ui-1.8.16.custom.min.js" type="text/javascript"></script>
	<script src="./minfo_files/jquery.ezpz_hint.min.js" type="text/javascript"></script>
	<script src="./minfo_files/jquery.dataTables.js" type="text/javascript"></script>
	<script src="./minfo_files/dataTables.sorting.js" type="text/javascript"></script>
	<script src="./minfo_files/jquery.formatCurrency-1.4.0.min.js" type="text/javascript"></script>
	<script src="./minfo_files/listing.bars.js" type="text/javascript"></script>
  <script src="./minfo_files/js" type="text/javascript"></script><script src="./minfo_files/main.js" type="text/javascript"></script>
  <script src="./minfo_files/analytics_lib.js" type="text/javascript"></script>
	
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
<script type="text/javascript" charset="UTF-8" src="./minfo_files/{common,util,geocoder}.js"></script><script type="text/javascript" charset="UTF-8" src="./minfo_files/{stats}.js"></script></head>
<body>

<div id="nav">
  <div id="nav-content">
    <ul>
      <li class="current"><a href="./minfo_files/minfo.php">Home</a></li>
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
  <div id="logo"><a href="./minfo_files/minfo.php"><img alt="Chicago Lobbyists" src="./minfo_files/logo.png"></a></div>
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
  <li class=""><a class="stat" href="http://www.chicagolobbyists.org/lobbyists"><strong>448</strong> Lobbyists</a></li>
  <li class=""><a class="stat" href="http://www.chicagolobbyists.org/firms"><strong>239</strong>Lobbying firms</a></li>
  <li id="paid"><span class="stat"><strong>$11,422,846</strong> Paid to lobbyists in 2010</span></li>
    <li class=""><a class="stat" href="http://www.chicagolobbyists.org/clients"><strong>1,004</strong>Clients</a></li>
  <li class=""><a class="stat" href="http://www.chicagolobbyists.org/agencies"><strong>3,171</strong>Actions sought</a></li>
</ul>
<hr>

  
  <script type="text/javascript">
    $(function(){
    	setUlBarWidthByCurrency('home-lobbyists');
    	setUlBarWidthByCurrency('home-firms');
    	setUlBarWidthByCurrency('home-clients');
    	setUlBarWidthByNumber('home-agencies');
    });
    
  </script>
  
  <div class="clear"></div>
  
  <div id="dashboard">
    <div class="c2l">
      <div class="section">
        <h2> Directorate <a href="http://www.chicagolobbyists.org/lobbyists">All directorates »</a></h2>
        <ul class="chartlist" id="home-agencies">
			<?php
				$con = mysql_connect("localhost","[ username ]","[ password ]");
				if (!$con) {
				  die('Could not connect: ' . mysql_error());
				}
				
				mysql_select_db("nsf", $con);
				
				$yr = $_GET['year'];
				$str = "select Count(OrganizationDirectorate) as Count, OrganizationDirectorate from Award a, P2A p, Patent_All pa where a.awardid=p.awardid and p.patno=pa.patentno and year(pa.patpubdate)=" . $yr . " group by OrganizationDirectorate order by Count desc limit 5;";
				
				$sth = mysql_query($str);
				
				while($r = mysql_fetch_array($sth)) {
					$num = $r['Count'];
					$name = $r['OrganizationDirectorate'];
					
					echo "<li><a href = \"http://www.duckduckgo.com/?q=" . $name . "\">" . $name . "</a><span class=\"index\"> style=\"width: 100%;\"></span><span class=\"count\">" . $num ."</span></li>";
					
				}
				
				mysql_close($con);
			?>
        </ul>
      </div>
      
      <div class="section">
        <h2> Division <a href="http://www.chicagolobbyists.org/clients">All divisions »</a></h2>
        <ul class="chartlist" id="home-agencies">
			<?php
				$con = mysql_connect("localhost","[ username ]","[ password ]");
				if (!$con) {
				  die('Could not connect: ' . mysql_error());
				}
				
				mysql_select_db("nsf", $con);
				
				$yr = $_GET['year'];
				$str = "select Count(OrganizationDivision) as Count, OrganizationDivision from Award a, P2A p, Patent_All pa where a.awardid=p.awardid and p.patno=pa.patentno and year(pa.patpubdate)=" . $yr . " group by OrganizationDivision order by Count desc limit 5;";
				
				$sth = mysql_query($str);
				
				while($r = mysql_fetch_array($sth)) {
					$num = $r['Count'];
					$name = $r['OrganizationDivision'];
					
					echo "<li><a href = \"http://www.duckduckgo.com/?q=" . $name . "\">" . $name . "</a><span class=\"index\"> style=\"width: 100%;\"></span><span class=\"count\">" . $num ."</span></li>";
					
				}
				
				mysql_close($con);
			?>
        </ul>
      </div>
    </div>
    
    <div class="c2r">
      <div class="section">
        <h2>Highest-paid lobbying firms <a href="http://www.chicagolobbyists.org/firms">All firms »</a></h2>
        <ul class="chartlist" id="home-firms">
          <?php
			
          ?>
          <li><a href="http://www.chicagolobbyists.org/firms/illinois-governmental-consulting-group-llc">" . $name .  "</a><span class="index" style="width: 100%;"></span><span class="count">$983,000</span></li>
          
          <li><a href="http://www.chicagolobbyists.org/firms/johnson-research-group">Johnson Research Group</a><span class="index" style="width: 85.24923702950153%;"></span><span class="count">$838,000</span></li>
          
          <li><a href="http://www.chicagolobbyists.org/firms/jay-d-doherty-and-associates">Jay D. Doherty &amp; Associates</a><span class="index" style="width: 78.50966429298067%;"></span><span class="count">$771,750</span></li>
          
          <li><a href="http://www.chicagolobbyists.org/firms/all-circo-inc">ALL-CIRCO, Inc.</a><span class="index" style="width: 68.64191251271617%;"></span><span class="count">$674,750</span></li>
          
          <li><a href="http://www.chicagolobbyists.org/firms/dla-piper-rudnick-gray-cary">DLA Piper Rudnick Gray Cary</a><span class="index" style="width: 68.26042726347914%;"></span><span class="count">$671,000</span></li>
          
        </ul>
      </div>
      
      <div class="section">
        <h2>Most lobbied city agencies <a href="http://www.chicagolobbyists.org/agencies">All agencies »</a></h2>
        <ul class="chartlist" id="home-agencies">
          
            <li><a href="http://www.chicagolobbyists.org/agencies/city-council">City Council</a><span class="index" style="width: 100%;"></span><span class="count">587</span></li>
          
            <li><a href="http://www.chicagolobbyists.org/agencies/dept-of-zoning-and-land-use-policy">Dept of Zoning and Land Use Policy</a><span class="index" style="width: 81.09028960817717%;"></span><span class="count">476</span></li>
          
            <li><a href="http://www.chicagolobbyists.org/agencies/dept-of-transportation">Dept of Transportation</a><span class="index" style="width: 42.759795570698465%;"></span><span class="count">251</span></li>
          
            <li><a href="http://www.chicagolobbyists.org/agencies/dept-of-community-development">Dept of Community Development</a><span class="index" style="width: 39.3526405451448%;"></span><span class="count">231</span></li>
          
            <li><a href="http://www.chicagolobbyists.org/agencies/dept-of-law">Dept of Law</a><span class="index" style="width: 24.020442930153322%;"></span><span class="count">141</span></li>
          
        </ul>
      </div>
    </div>
    <div class="clear"></div>
  </div>
  
  <hr>
  <div class="content-secondary">
  	<script src="./minfo_files/widget.js"></script>
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
    <p>ChicagoLobbyists.org is an open data, open government, and open source project by <a href="http://opencityapps.org/">Open City</a> intended to improve the transparency of interactions between the City of Chicago and lobbyists and their clients. All data comes from the <a href="http://data.cityofchicago.org/">City of Chicago Data Portal</a>. <a href="http://www.chicagolobbyists.org/about">Read more »</a></p>

<h2>Contact us</h2>
    <p>If you have any comments, questions, feature suggestions, or want to set this platform up for your city or municipality, you can email us at <a href="mailto:chi.lobbyists@gmail.com">chi.lobbyists@gmail.com</a> or tweet us at <a href="https://twitter.com/#!/chilobbyists">@chilobbyists</a>.</p>
  
  <!-- Footer -->
<div id="footer">
  <p>Chicago Lobbyists designed and developed by <a href="http://opencityapps.org/">Open City</a>. Copyright © 2012.</p>
</div>
<!-- /Footer -->

</div>
<!-- /Content -->



</body></html>
