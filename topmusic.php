<?php
$artist=$_GET['artist'];
$page=$_GET['page'];
$feed_url='http://ws.audioscrobbler.com/2.0/?method=artist.gettoptracks&artist='.urlencode($artist).'&api_key=b25b959554ed76058ac220b7b2e0a026&limit=5&page='.$page;
$feed=file_get_contents($feed_url);
$feed_doc=new DOMDocument();
$feed_doc->loadXML($feed);
$item_index=0;
$items=$feed_doc->getElementsByTagName("track");
			$items_count=$items->length;
foreach($items as $item)
	{
		$title=$item->getElementsByTagName("name")->item(0)->childNodes->item(0)->nodeValue;
		$yt_search_url='https://gdata.youtube.com/feeds/api/videos?q='.urlencode($artist.' - '.$title).'&v=2&max-results=1';
		$yt_search_results=file_get_contents($yt_search_url);
		$yt_feed_doc=new DOMDocument();
		$yt_feed_doc->loadXML($yt_search_results);
		$entries=$yt_feed_doc->getElementsByTagName("entry");
		if($entries)
		{
			$entry=$entries->item(0);
			if(!$entry)break;
			$id_string=$entry->getElementsByTagName("id")->item(0)->childNodes->item(0)->nodeValue;
			$thumb_url=$entry->getElementsByTagName("thumbnail")->item(0)->getAttribute("url");
			$split_id=explode(':',$id_string);
			$id=$split_id[3];
			?>
			<a class="vid-links" href="#" id="<?php echo $id ?>"><div class="vid-item"><img class="vid-thumb" src="<?php echo $thumb_url;?>"/><p class="vid-title"><?php echo $title ?></p><img class="play-icon play-icon-hidden" src="play.png"/></div></a>
			<?php
		}
	}
?>
