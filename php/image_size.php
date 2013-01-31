<?php
	list($w, $h) = getimagesize('../images/'.$_GET['landmark']); //should have non local URL image option too...
	$size = json_encode(array($w,$h));
	print_r($size);
?>