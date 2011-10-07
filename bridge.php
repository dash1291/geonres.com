<?php
$country=$_GET['country'];
$page=$_GET['page'];
$response=file_get_contents('http://ashishdubey.info/geonresnew/artists.php?page='.$page.'&country='.urlencode($country));
echo $response;
?>

