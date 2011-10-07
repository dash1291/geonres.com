<?php
function db_query($query)
{
	$db_host="geonres.db.8046490.hostedresource.com";
	$db_user="geonres";
	$db_pass="Dubey@111";
	$db_name="geonres";
	$con=mysql_connect($db_host,$db_user,$db_pass);
	$select_state=mysql_select_db($db_name,$con);
	if(!$con || !$select_state) return 0;
	else
	{
		$results=mysql_query($query);
	}
	if(!$results) return 0;
	mysql_close($con);
	return $results;
}
function find_artists($country,$limit,$page)
{
	$skip=$limit*($page-1);
	$query="SELECT * FROM artists WHERE country = '$country' ORDER BY(listeners) DESC LIMIT ".$skip.", 5";
	$results=db_query($query);
	$array=array();
	if($results)
	{
		$index=0;
		while($index!=$limit)
		{
			$row=mysql_fetch_array($results);
			if(!$row) return 0;
			$artist=array('name'=>$row['name'],'country'=>$row['country'],'listeners'=>$row['listeners']);
			array_push($array,$artist);
			$index++;
		}
		return $array;
	}
	else return 0;
}
?>
