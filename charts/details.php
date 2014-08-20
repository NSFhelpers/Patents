<!DOCTYPE html>
<!-- saved from url=(0060)http://www.chicagolobbyists.org/lobbyists/theodore-brunsvold -->
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8"><style type="text/css">.gm-style .gm-style-cc span,.gm-style .gm-style-cc a,.gm-style .gm-style-mtc div{font-size:10px}</style><link type="text/css" rel="stylesheet" href="./Theodore Brunsvold - Lobbyist - Chicago Lobbyists_files/css"><style type="text/css">@media print {  .gm-style .gmnoprint, .gmnoprint {    display:none  }}@media screen {  .gm-style .gmnoscreen, .gmnoscreen {    display:none  }}</style><style type="text/css">.gm-style{font-family:Roboto,Arial,sans-serif;font-size:11px;font-weight:400;text-decoration:none}</style>
	<!-- Title -->
	<title>Theodore Brunsvold - Lobbyist - Chicago Lobbyists</title>
	<link rel="Shortcut Icon" href="http://www.chicagolobbyists.org/favicon.ico" type="image/x-icon">
	
	<!-- Info -->
	
  <!-- webmaster-tools <meta name="google-site-verification" content="6oHOT6PXw490mF1qyuiToMoG96gA85-kTbNYyL3UtTo" /> -->
  <meta name="google-site-verification" content="LjG-SeitOaHlivMGUN2L6jXAu_iRkxIfkqDMo0tlZAk">
	
	<!-- Styles -->
	<link rel="stylesheet" type="text/css" media="all" href="./Theodore Brunsvold - Lobbyist - Chicago Lobbyists_files/master.css">

	<!-- JavaScript -->
  <script type="text/javascript" async="" src="./Theodore Brunsvold - Lobbyist - Chicago Lobbyists_files/ga.js"></script><script src="./Theodore Brunsvold - Lobbyist - Chicago Lobbyists_files/jquery.min.js" type="text/javascript"></script>
  <script src="./Theodore Brunsvold - Lobbyist - Chicago Lobbyists_files/jquery-ui-1.8.16.custom.min.js" type="text/javascript"></script>
	<script src="./Theodore Brunsvold - Lobbyist - Chicago Lobbyists_files/jquery.ezpz_hint.min.js" type="text/javascript"></script>
	<script src="./Theodore Brunsvold - Lobbyist - Chicago Lobbyists_files/jquery.dataTables.js" type="text/javascript"></script>
	<script src="./Theodore Brunsvold - Lobbyist - Chicago Lobbyists_files/dataTables.sorting.js" type="text/javascript"></script>
	<script src="./Theodore Brunsvold - Lobbyist - Chicago Lobbyists_files/jquery.formatCurrency-1.4.0.min.js" type="text/javascript"></script>
	<script src="./Theodore Brunsvold - Lobbyist - Chicago Lobbyists_files/listing.bars.js" type="text/javascript"></script>
  <script src="./Theodore Brunsvold - Lobbyist - Chicago Lobbyists_files/js" type="text/javascript"></script><script src="./Theodore Brunsvold - Lobbyist - Chicago Lobbyists_files/main.js" type="text/javascript"></script>
  <script src="./Theodore Brunsvold - Lobbyist - Chicago Lobbyists_files/analytics_lib.js" type="text/javascript"></script>
	
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
<script type="text/javascript" async="" src="./Theodore Brunsvold - Lobbyist - Chicago Lobbyists_files/embed.js"></script><style type="text/css"></style><script type="text/javascript" charset="UTF-8" src="./Theodore Brunsvold - Lobbyist - Chicago Lobbyists_files/{common,util,geocoder,map,marker}.js"></script><script type="text/javascript" charset="UTF-8" src="./Theodore Brunsvold - Lobbyist - Chicago Lobbyists_files/{onion}.js"></script><script type="text/javascript" charset="UTF-8" src="./Theodore Brunsvold - Lobbyist - Chicago Lobbyists_files/{controls,stats}.js"></script></head>
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
  <div id="logo"><a href="http://www.chicagolobbyists.org/"><img alt="Chicago Lobbyists" src="./cfa_brigade_logo.png"></a></div>
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
		$con = new mysqli('localhost', 'root', '', 'nsf');
		
		if (mysqli_connect_errno()) {
			die('Could not connect: ' . mysqli_error());
		}
		
		$yr = $_GET['year'];
		$str = "SELECT * FROM Stats WHERE qyear = " . $yr . " AND querytype = \"" . $_GET['type'] . "\";";
		
		$sth = mysqli_query($con, $str);
		
		while( $r = mysqli_fetch_array($sth) ) {
		  echo "<li class=\"\"><a href=\"lists.php?type=" . $_GET['type'] . "&year=" . $yr . "&category=Scientist\" class=\"stat\"><strong>" . $r['PI'] . "</strong> Scientists </a></li>";
		  echo "<li class=\"\"><a href=\"lists.php?type=" . $_GET['type'] . "&year=" . $yr . "&category=Institution\" class=\"stat\"><strong>" . $r['Institution'] . "</strong> Institutions </a></li>";
		  echo "<li id = \"paid\"><span class=\"stat\"><strong>" . $r['TotalPatents'] . "</strong> Total Patents in " . $r['QYear'] . "</span></li>";
		  echo "<li class=\"\"><a href=\"lists.php?type=" . $_GET['type'] . "&year=" . $yr . "&category=Directorate\" class=\"stat\"><strong>" . $r['Directorate'] . "</strong> Directorates </a></li>";
		  echo "<li class=\"\"><a href=\"lists.php?type=" . $_GET['type'] . "&year=" . $yr . "&category=Division\" class=\"stat\"><strong>" . $r['Division'] . "</strong> Divisions </a></li>";
		}
		
		mysqli_close($con);
	  ?>
  </ul>
<hr>

  
  <script type="text/javascript">
	    $(function(){
	      setBarWidthByCurrency();
	      $('.tabs').tabs();
	    });
  </script>
  
  <div class="clear"></div>
  
  <div id="bio">
    <div> <!-- id="bio-primary"> -->
      <h1>
		<?php
			$str = $_GET['category'];
			
			if( $str == 'dir' ) {
				$str = $_GET['orgdir'];
			}
			else if( $str == 'div' ) {
				$str = $_GET['orgdiv'];
			}
			else if ($str == 'inst') {
				$str = $_GET['name'];
			}
			else {
				$str = $_GET['firstname'] . ' ' . $_GET['lastname'];
			}
		?>
	  </h1>
      <div> <!--class="c2l"-->
	      <ul class="stats">
			<?php
				$con = new mysqli('localhost', 'root', '', 'nsf');
				if( mysqli_connect_errno() ) {
					die('Could not connect: ' . mysqli_error() );
				}
				
				$yr = $_GET['year'];
				$str = $_GET['category'];
				$pat = ( $_GET['type'] == 'P' ) ? 1 : 0;
				
				if( $str == 'dir' ) {
					if($pat) {
						$str = "select count(*) from award a, p2a p,patent_all pa where a.awardid=p.awardid and pa.patentno=p.patno and year(PatPubDate)=" . $yr . " and OrganizationDirectorate=\"" . $_GET['orgdir'] . "\";";
					}
					else {
						$str = "select count(*) from award a, p2a p,patent_all pa where a.awardid=p.awardid and pa.patentno=p.patno and year(AwardEffectiveDate)=" . $yr . " and OrganizationDirectorate=\"" . $_GET['orgdir'] . "\";";
					}
					echo "<li><strong>" . $_GET['orgdir'] . "</strong></li>";
				}
				else if( $str == 'div' ) {
					if($pat) {
						$str = "select count(*) from award a, p2a p,patent_all pa where a.awardid=p.awardid and pa.patentno=p.patno and year(PatPubDate)=" . $yr . " and OrganizationDivision=\"" . $_GET['orgdiv'] . "\";";
					}
					else {
						$str = "select count(*) from award a, p2a p,patent_all pa where a.awardid=p.awardid and pa.patentno=p.patno and year(AwardEffectiveDate)=" . $yr . " and OrganizationDivision=\"" . $_GET['orgdiv'] . "\";";
					}
					echo "<li><strong>" . $_GET['orgdiv'] . "</strong></li>";
				}
				else if ($str == 'inst') {
					if($pat) {
						$str = "select count(*) from award a, p2a p,patent_all pa,institution i where a.awardid = i.awardid and p.awardid=i.awardid and pa.patentno=p.patno and year(PatPubDate)=" . $yr . " and i.name=\"" . $_GET['name'] . "\";";
					}
					else {
						$str = "select count(*) from award a, p2a p,patent_all pa,institution i where a.awardid = i.awardid and p.awardid=i.awardid and pa.patentno=p.patno and year(AwardEffectiveDate)=" . $yr . " and i.name=\"" . $_GET['name'] . "\";";
					}
					echo "<li><strong>" . $_GET['name'] . "</strong></li>";
				}
				else {
					if($pat) {
						$str = "select count(*) from award a, p2a p,patent_all pa,pi where a.awardid = pi.awardid and p.awardid=pi.awardid and pa.patentno=p.patno and year(PatPubDate)=" . $yr . " and FirstName=\"" . $_GET['firstname'] . "\" and LastName=\"" . $_GET['lastname'] . "\";";
					}
					else {
							$str = "select count(*) from award a, p2a p,patent_all pa,pi where a.awardid = pi.awardid and p.awardid=pi.awardid and pa.patentno=p.patno and year(AwardEffectiveDate)=" . $yr . " and FirstName=\"" . $_GET['firstname'] . "\" and LastName=\"" . $_GET['lastname'] . "\";";
					}
					echo "<li><strong>" . $_GET['firstname'] . " " . $_GET['lastname'] . "</strong></li>";
				}
				$sth = mysqli_query($con, $str);
				
				while( $r = mysqli_fetch_array($sth) ) {
					echo "<li><strong>" . $r['count(*)'] . "</strong> ";
					if($pat) {
						echo "Patents granted in the year " . $_GET['year'];
					}
					else {
						echo "Grants awarded in the year " . $_GET['year'];
					}
					echo " </li>";
				}
				
				//echo $str;
				
				mysqli_close($con);
			?>
	      </ul>
      </div>
      
      
      <div class="clear"></div>
      
      <div class="tabs ui-tabs ui-widget ui-widget-content ui-corner-all">
        <ul class="tab-nav ui-tabs-nav ui-helper-reset ui-helper-clearfix ui-widget-header ui-corner-all">
        	<li class="ui-state-default ui-corner-top ui-tabs-selected ui-state-active"><a href="http://www.chicagolobbyists.org/lobbyists/theodore-brunsvold#tab-payments">Awards</a></li>
        </ul>
        
      
      	<div class="tab-content ui-tabs-panel ui-widget-content ui-corner-bottom" id="tab-payments">
	      <script type="text/javascript">
		    $(function(){
		      $("#payments-table").dataTable({
		        "aoColumns": [
		          null,
		          { "sType": "num-html" }
		        ],
		        "aaSorting": [[1, "desc"]],
		        "bFilter": true,
		        "bInfo": false,
		        "bPaginate": false
		      });
		    });
	      </script>
	      
	      <h2 class="table-head">NSF Awards</h2>
	      <table id="payments-table" class="datatable">
	        <thead>
			<?php
				$pat = ( $_GET['type'] == 'P' ) ? 1 : 0;
				if($pat) {
					echo "<tr><th class=\"sorting\" rowspan=\"1\" colspan=\"1\" style=\"width: 359px;\"><span>Patent</span></th><th class=\"sorting_desc\" rowspan=\"1\" colspan=\"1\" style=\"width: 280px;\"><span>Origin Grant</span></th></tr>";
				}
				else {
					echo "<tr><th class=\"sorting\" rowspan=\"1\" colspan=\"1\" style=\"width: 359px;\"><span>Grant</span></th><th class=\"sorting_desc\" rowspan=\"1\" colspan=\"1\" style=\"width: 280px;\"><span>Patent created</span></th></tr>";
				}
	        ?>
			</thead>
	        
	      <tbody>
				<?php
					$con = new mysqli('localhost', 'root', '', 'nsf');
					if( mysqli_connect_errno() ) {
						die("Could not connect: " . mysqli_error() );
					}
					
					$yr = $_GET['year'];
					$str = $_GET['category'];
					$pat = ($_GET['type'] == 'P') ? 1 : 0;
					
					if( $str == 'dir' ) 
					{
						if($pat) {
							$str = "select a.AwardTitle as aT,a.awardID as aID,pa.title as pT,pa.patentno as pNo from award a, p2a p,patent_all pa where a.awardid=p.awardid and pa.patentno=p.patno and year(PatPubDate)=" . $yr . " and OrganizationDirectorate=\"" . $_GET['orgdir'] . "\";";
						}
						else {
							$str = "select a.AwardTitle as aT,a.awardID as aID,pa.title as pT,pa.patentno as pNo from award a, p2a p,patent_all pa where a.awardid=p.awardid and pa.patentno=p.patno and year(AwardEffectiveDate)=" . $yr . " and OrganizationDirectorate=\"" . $_GET['orgdir'] . "\";";
						}
					}
					else if( $str == 'div' ) 
					{
						if($pat) {
							$str = "select a.AwardTitle as aT,a.awardID as aID,pa.title as pT,pa.patentno as pNo from award a, p2a p,patent_all pa where a.awardid=p.awardid and pa.patentno=p.patno and year(PatPubDate)=" . $yr . " and OrganizationDivision=\"" . $_GET['orgdiv'] . "\";";
						}
						else {
							$str = "select a.AwardTitle as aT,a.awardID as aID,pa.title as pT,pa.patentno as pNo from award a, p2a p,patent_all pa where a.awardid=p.awardid and pa.patentno=p.patno and year(AwardEffectiveDate)=" . $yr . " and OrganizationDivision=\"" . $_GET['orgdiv'] . "\";";
						}
					}
					else if ($str == 'inst') 
					{
						if($pat) {
							$str = "select a.AwardTitle as aT,a.awardID as aID,pa.title as pT,pa.patentno as pNo from award a, p2a p,patent_all pa,institution i where a.awardid = i.awardid and p.awardid=i.awardid and pa.patentno=p.patno and year(PatPubDate)=" . $yr . " and i.name=\"" . $_GET['name'] . "\";";
						}
						else {
							$str = "select a.AwardTitle as aT,a.awardID as aID,pa.title as pT,pa.patentno as pNo from award a, p2a p,patent_all pa,institution i where a.awardid = i.awardid and p.awardid=i.awardid and pa.patentno=p.patno and year(AwardEffectiveDate)=" . $yr . " and i.name=\"" . $_GET['name'] . "\";";
						}
					}
					else 
					{
						if($pat) {
							$str = "select a.AwardTitle as aT,a.awardID as aID,pa.title as pT,pa.patentno as pNo from award a, p2a p,patent_all pa,pi where a.awardid = pi.awardid and p.awardid=pi.awardid and pa.patentno=p.patno and year(PatPubDate)=" . $yr . " and FirstName=\"" . $_GET['firstname'] . "\" and LastName=\"" . $_GET['lastname'] . "\";";
						}
						else {
							$str = "select a.AwardTitle as aT,a.awardID as aID,pa.title as pT,pa.patentno as pNo from award a, p2a p,patent_all pa,pi where a.awardid = pi.awardid and p.awardid=pi.awardid and pa.patentno=p.patno and year(AwardEffectiveDate)=" . $yr . " and FirstName=\"" . $_GET['firstname'] . "\" and LastName=\"" . $_GET['lastname'] . "\";";
						}
					}
					
					$sth = mysqli_query($con, $str);
					
					//echo $str;
					
					$r = 0;
					$odd = 1;
					while( $r = mysqli_fetch_array($sth) ) {
						$trc = ($odd) ? "odd" : "even";
						echo "<tr class=" . $trc . ">";
						
						echo "<td class=nb>";
					
						if($pat) {
							echo "<a href = http://www.google.com/patents/US" . $r['pNo'] . ">" . substr( $r['pT'], 0, 35 ) . "... (" . $r['pNo'] . ") </a>";
						}
						else {
							echo "<a href = http://www.nsf.gov/awardsearch/showAward?AWD_ID=" . $r['aID'] . "&HistoricalAwards=false>" . substr( $r['aT'], 0, 35 ) . "... (" . $r['aID'] . ") </a>";
						}
						echo "</td><td class=nb>";
						
						if($pat) {
							echo "<a href = http://www.nsf.gov/awardsearch/showAward?AWD_ID=" . $r['aID'] . "&HistoricalAwards=false>" . substr( $r['aT'], 0, 35 ) . "... (" . $r['aID'] . ") </a>";
						}
						else {
							echo "<a href = http://www.google.com/patents/US" . $r['pNo'] . ">" . substr( $r['pT'], 0, 35 ) . "... (" . $r['pNo'] . ") </a>";
						}
						
						echo "</td></tr>";
						
						$odd = ($odd + 1) % 2;
					}
					
					mysqli_close($con);
				?>
			</tbody>
		</table>
	</div>
</div><!-- end tab-payments-->
	    
      </div><!-- end tabs-->
    </div><!-- end bio-primary-->
     
  </div><!-- /.bio -->
  
  <div class="clear"></div>
  
  <!-- Footer -->
<div id="footer">
  <p>Chicago Lobbyists designed and developed by <a href="http://opencityapps.org/">Open City</a>. Copyright © 2012.</p>
</div>
<!-- /Footer -->

</div>
<!-- /Content -->



</body></html>