<?php
/**
 *.---.      .                    .     
 *  |  o     |                    |     
 *  |  .  .-.| .-. .,-.  .-.  .-. | .--.
 *  |  | (   |(.-' |   )(   )(   )| `--.
 *  '-' `-`-'`-`--'|`-'  `-'  `-' `-`--' v0.2
 
 *  Copyright (C) 2012-2013 Open Technology Institute <tidepools@opentechinstitute.org>
 *	Lead: Jonathan Baldwin
 *	This file is part of Tidepools <http://www.tidepools.co>

 *  Tidepools is free software: you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation, either version 3 of the License, or
 *  (at your option) any later version.

 *  Tidepools is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.

 *  You should have received a copy of the GNU General Public License
 *  along with Tidepools.  If not, see <http://www.gnu.org/licenses/>.
 */

 
require('tidepools_variables.php');

try 
{
    $m = new Mongo(); // connect
    $db = $m->selectDB($DBname);
}
catch ( MongoConnectionException $e ) 
{
    echo '<p>Couldn\'t connect to mongodb, is the "mongo" process running?</p>';
    exit();
}

	$type = 'landmarks';

	$collection = $db->$type;
	$landmarkID = $_GET['landmarkID'];
	$landmarkID = new MongoID($landmarkID);

	$collection->remove(array('_id'=>$landmarkID));
	
	echo 'success';
	
?>