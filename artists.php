<?php
include dirname(__FILE__).'/database.php';
$country=$_GET['country'];
$view=$_GET['view'];
$page=$_GET['page'];
$artists=find_artists($country,5,$page);
if($artists)
{
	foreach($artists as $artist)
	{
		?>
		<a href=#" id="<?php echo $artist['name']?>" class="artist-link"><div class="artist-item"><p class="artist-title"><?php echo $artist['name']?></p><img class="play-icon play-icon-hidden" src="play.png"/></div></a>
		<?php
	}
}
?>

