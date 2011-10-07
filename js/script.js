/* Author: 

*/

var currentTracksPage=0;
var currentArtistsPage=0;
var marker=0;
var nowplayingid;
      google.load("swfobject", "2.1");
 var params = {allowScriptAccess:"always",wmode:'transparent'};
    var atts = {id:"ytplayer"};
    swfobject.embedSWF("http://www.youtube.com/e/JByDbPn6A1o?version=3&enablejsapi=1&autoplay=0","ytapiplayer", "568", "320", "8", null, null, params, atts);
var ytplayer;
function init()
{
	var latlng;
	var geocoder = new google.maps.Geocoder();
	marker=0;
	latlng = new google.maps.LatLng(0,0);
   	var myOptions = {zoom: 2,center: latlng,mapTypeId: google.maps.MapTypeId.ROADMAP};
    var map = new google.maps.Map(document.getElementById("maps"),myOptions);
	
	google.maps.event.addListener(map, 'click', function(event)
	{	
		geocoder.geocode({'latLng': event.latLng},function (results,status)
		{
			country=results[results.length-1].formatted_address;
if(marker!=0) marker.setMap(null);
marker = new google.maps.Marker({
        position: event.latLng, 
        map: map,
        title:country});

			document.getElementById("top-artists-container").innerHTML='<img src="spinner.gif" class="spinner-icon spinner-icon-hidden"/>';
			$("#top-artists-container .spinner-icon").removeClass("spinner-icon-hidden");
			currentArtistsPage=1;
			$("#top-artists-container").load("http://geonres.com/artists.php?page="+currentArtistsPage+"&country="+encodeURI(country),function()
			{
				$("#top-artists-container .spinner-icon").addClass("spinner-icon-hidden");
				document.getElementById("top-artists-container").scrollTop=0;
				$("#top-artists-container").scroll(0);
				$(".artist-link").click(function()
				{
					document.getElementById("videolist").innerHTML='<img src="spinner.gif" class="spinner-icon spinner-icon-hidden"/>';
					$("#videolist .spinner-icon").removeClass("spinner-icon-hidden");
					$("#top-artists-container .play-icon").addClass("play-icon-hidden");
					$(this).children(".artist-item").children(".play-icon").removeClass("play-icon-hidden");
					artist=this.id;
	document.getElementById("state").innerHTML="music by "+artist;
					currentTracksPage=1;
					$("#videolist").load("http://geonres.com/topmusic.php?page="+currentTracksPage+"&artist="+encodeURI(artist),function()
					{
						$("#videolist .spinner-icon").addClass("spinner-icon-hidden");
						document.getElementById("videolist").scrollTop=0;
						$(".vid-links").click(function()
						{
							$("#videolist .play-icon").addClass("play-icon-hidden");
							$(this).children(".vid-item").children(".play-icon").removeClass("play-icon-hidden");
							nowplayingid=this.id;
							ytplayer.loadVideoById(nowplayingid);
							$("#watch-video").click();
						});
						$(".vid-links").first().click();
					});
				});
				
			});
		});
			
	});
	$("#videolist").scroll(function(event)
	{

		position=this.scrollHeight-this.scrollTop;

		if(position<310)
		{
			loadMoreTracks();
		}
	});
	$("#top-artists-container").scroll(function(event)
	{
		position=this.scrollHeight-this.scrollTop;
		if(position<145)
		{
			loadMoreArtists();
			
		}
	});
}
$(document).ready(function()
{
$("#browse-map").click(function()
{
	//	$("#player").css('opacity','0');
		$("#ytplayer").css('opacity','0');
		$("#maps").css('opacity','1');
		$("#player-tab-head").css('opacity','0');
		$("#map-tab-head").css('opacity','1');				
		$("#view-container .tab").css({'-webkit-transform':'translate(0px,0)','-moz-transform':'translate(0px,0)'});
		
	});
$("#watch-video").click(function()
	{
	$("#maps").css('opacity','0');
		$("#ytplayer").css('opacity','1');
		//$("#player").css('opacity','1');
		$("#player-tab-head").css('opacity','1');
		$("#map-tab-head").css('opacity','0');				
		$("#view-container .tab").css({'-webkit-transform':'translate(-568px,0)','-moz-transform':'translate(-568px,0)'});
	
	});
	


init();
});
function loadMoreTracks()
{
	currentTracksPage++;
	$.get("http://geonres.com/topmusic.php?page="+currentTracksPage+"&artist="+encodeURI(artist),function(data)
	{
		document.getElementById("videolist").innerHTML+=data;
		$(".vid-links").click(function()
		{
			$("#videolist .play-icon").addClass("play-icon-hidden");
			$(this).children(".vid-item").children(".play-icon").removeClass("play-icon-hidden");
			nowplayingid=this.id;
			ytplayer.loadVideoById(nowplayingid);
			$("#watch-video").click();
		});

	});
	//TODO load more tracks using AJAX pass the page to load and store the page retrived in currentTracksPage
}
function loadMoreArtists()
{
	currentArtistsPage++;
	$.get("http://geonres.com/artists.php?page="+currentArtistsPage+"&country="+encodeURI(country),function(data)
		{
			document.getElementById("top-artists-container").innerHTML+=data;
			$(".artist-link").click(function()
				{

					document.getElementById("videolist").innerHTML='<img src="spinner.gif" class="spinner-icon spinner-icon-hidden"/>';
					$("#videolist .spinner-icon").removeClass("spinner-icon-hidden");
					$("#top-artists-container .play-icon").addClass("play-icon-hidden");
					$(this).children(".artist-item").children(".play-icon").removeClass("play-icon-hidden");
					artist=this.id;
	document.getElementById("state").innerHTML="music by "+artist;
					currentTracksPage=1;

					$("#videolist").load("http://geonres.com/topmusic.php?page="+currentTracksPage+"&artist="+encodeURI(artist),function()
					{
						document.getElementById("videolist").scrollTop=0;
						$(".vid-links").click(function()
						{
							$("#videolist .play-icon").addClass("play-icon-hidden");
							$(this).children(".vid-item").children(".play-icon").removeClass("play-icon-hidden");
							nowplayingid=this.id;
							ytplayer.loadVideoById(nowplayingid);
							$("#watch-video").click();
						});
						$(".vid-links").first().click();
					});
				});
		});
	//TODO load more artists using AJAX pass the page to load(next 5) and store the page retrived in currentTracksPage
}
function playnextvideo()
{
	next=$(document.getElementById(nowplayingid)).next();
	if(next) next.click();
}
function onstatechangelistener(state)
{
	if(state==0) playnextvideo();
}
function onYouTubePlayerReady()
{
	ytplayer=document.getElementById("ytplayer");
	ytplayer.addEventListener("onStateChange","onstatechangelistener");
}
