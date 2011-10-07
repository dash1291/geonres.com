<?php
$server_name=$_SERVER['SERVER_NAME'];
if($server_name=='www.geonres.com')
{
	header('Location: http://geonres.com');
}
?>
<!doctype html>
<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

  <title>Geonres - Geographical Approach to Music Discovery</title>
  <meta name="description" content="">
  <meta name="author" content="">

  <meta name="viewport" content="width=device-width,initial-scale=1">
<link href='http://fonts.googleapis.com/css?family=Comfortaa' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Love+Ya+Like+A+Sister' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="buttons/styles.css">
  <!-- CSS concatenated and minified via ant build script-->
  <link rel="stylesheet" href="css/style.css">
  <!-- end CSS-->

  <script src="js/libs/modernizr-2.0.6.min.js"></script>
</head>

<body>
    <header>
<div id="logo"><span class="logo normal">Ge</span><span class="logo" id="o">o</span><span class="logo normal">nres</span></div>
    </header>

  <div id="container">
    <div id="main" role="main">
		<div id="view-container">
			<div class="tab" id="map">
				<div class="tab-head" id="map-tab-head">
					<p class="tab-head-label">World Map</p><a id="watch-video" href="#" title="Switch to Video Player" class="icon icon69 switch-button"><span>Label</span></a>
				</div>
				<div id="maps">
				</div>
			</div>
			<div class="tab" id="player">
				<div class="tab-head" id="player-tab-head">
					<p class="tab-head-label" id="player-tab-head-label">Video Player</p><a id="browse-map" title="Switch to World Map" href="#" class="icon icon6 switch-button"><span>Label</span></a>
				</div>
				<div id="ytapiplayer">
				</div>
			</div>
		</div>

		<div id="videos"><p class="open-label" id="state">Click on the map for a music travel!</p><div id="videolist"><p class="info">select an artist</p><img src="spinner.gif" class="spinner-icon spinner-icon-hidden"/></div>
<div id="sharebox"><span class="info">Share this among your friends </span><br/><span  class='st_sharethis_hcount' displayText='ShareThis'></span><span  class='st_twitter_hcount' displayText='Tweet'></span><span  class='st_fblike_hcount' ></span><span  class='st_plusone_hcount' ></span></div>
		</div>
		
		<div id="artist-container">
			<div id="artist-tabs-container">
				<div class="tab" id="top-artists">
					<div class="tab-head" id="top-artists-tab-head">
						<p class="tab-head-label" id="top-artists-title">Top Artists</p>
					</div>
					<div class="artist-tab" id="top-artists-container"><!--TODO-->
						<p class="info">select a location</p>
						<img src="spinner.gif" class="spinner-icon spinner-icon-hidden"/>
					</div>
				</div>
			</div>
			<!--<div id="artist-mode-container">Show Random</div>-->
		</div>
		
    </div>
	<div id="powered-by-container">
		<p class="open-label">Powered by cool services that you might have heard before. That is,</p>
		<p class="open-label"><a href="http://last.fm">Last.fm</a> + <a href="http://youtube.com">YouTube</a> + <a href="http://maps.google.com">Google Maps</a> + <a href="http://developer.yahoo.com/geo/placemaker/">Yahoo Placemaker</a> = Geonres</p>
		
		
	</div>
    <footer>
		<p id="creator">Created By <b><a id="myname" href="http://www.ashishdubey.info">Ashish Dubey</a></b></p>
    </footer>
  </div> <!--! end of #container -->


  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
  <script>window.jQuery || document.write('<script src="js/libs/jquery-1.6.2.min.js"><\/script>')</script>
<script type="text/javascript">var switchTo5x=true;</script><script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script><script type="text/javascript">stLight.options({publisher:'e6d0924c-7d55-477a-9716-764d75bcdc0d'});</script>
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=true&language=en"></script>
	<script src="http://www.google.com/jsapi"></script> 
	<script src="http://ajax.googleapis.com/ajax/libs/swfobject/2.2/swfobject.js"></script>
  <!-- scripts concatenated and minified via ant build script-->
	
  <script defer src="js/plugins.js"></script>
  <script defer src="js/script.js"></script>
  <!-- end scripts-->


  <script> // Change UA-XXXXX-X to be your site's ID
    window._gaq = [['_setAccount','UA-24206813-2'],['_trackPageview'],['_trackPageLoadTime']];
    Modernizr.load({
      load: ('https:' == location.protocol ? '//ssl' : '//www') + '.google-analytics.com/ga.js'
    });
  </script>


  <!--[if lt IE 7 ]>
    <script src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.3/CFInstall.min.js"></script>
    <script>window.attachEvent('onload',function(){CFInstall.check({mode:'overlay'})})</script>
  <![endif]-->
  
</body>
</html>
