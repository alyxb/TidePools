<?php
<<<<<<< HEAD

/**
 *	TidePools Social WiFi
 *  Copyright (C) 2012 Jonathan Baldwin <jrbaldwin@gmail.com>
 *
 *	This file is part of TidePools <http://www.tidepools.co>

 *  TidePools is free software: you can redistribute it and/or modify
=======
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
>>>>>>> origin/cleanup
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation, either version 3 of the License, or
 *  (at your option) any later version.

<<<<<<< HEAD
 *  TidePools is distributed in the hope that it will be useful,
=======
 *  Tidepools is distributed in the hope that it will be useful,
>>>>>>> origin/cleanup
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.

 *  You should have received a copy of the GNU General Public License
<<<<<<< HEAD
 *  along with TidePools.  If not, see <http://www.gnu.org/licenses/>.
 */

=======
 *  along with Tidepools.  If not, see <http://www.gnu.org/licenses/>.
 */

 
require('tidepools_variables.php');
>>>>>>> origin/cleanup

try 
{
    $m = new Mongo(); // connect
<<<<<<< HEAD
    $db = $m->selectDB("RedHook");
=======
    $db = $m->selectDB($DBname);
>>>>>>> origin/cleanup
}
catch ( MongoConnectionException $e ) 
{
    echo '<p>Couldn\'t connect to mongodb, is the "mongo" process running?</p>';
    exit();
}

<<<<<<< HEAD
	
	$type = 'landmarks';


	$collection = $db->$type;
	
		
	$landmarkID = $_GET['landmarkID'];
	
	$landmarkID = new MongoID($landmarkID);


=======
	$type = 'landmarks';

	$collection = $db->$type;
	$landmarkID = $_GET['landmarkID'];
	$landmarkID = new MongoID($landmarkID);

>>>>>>> origin/cleanup
	$collection->remove(array('_id'=>$landmarkID));
	
	echo 'success';
	
<<<<<<< HEAD


=======
>>>>>>> origin/cleanup
?>