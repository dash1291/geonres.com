<?php
include dirname(__FILE__).'/database.php';
$country = $_GET['country'];
$view = $_GET['view'];
$page = $_GET['page'];
$artists = find_artists($country,5,$page);
$response = array();
if($artists)
{
	foreach($artists as $artist)
	{
		$item = array('name' => $artist['name']);
		array_push($response, $item);
	}
	/*	<a href=#" id="<?php echo $artist['name']?>" class="artist-link"><div class="artist-item"><p class="artist-title"><?php echo $artist['name']?></p><img class="play-icon play-icon-hidden" src="play.png"/></div></a>*/
	$json = json_encode($response);
	header('Content-Type: application/json');
	echo $json;
}
?>
