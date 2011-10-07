<?php
$artist=$_GET['artist'];
$page=$_GET['page'];
$response=file_get_contents('http://ashishdubey.info/geonresnew/topmusic.php?page='.$page.'&artist='.urlencode($artist));
echo $response;
?>
