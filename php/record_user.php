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

try 
{
    $m = new Mongo(); // connect
    $db = $m->selectDB("RedHook");
=======
 *  along with Tidepools.  If not, see <http://www.gnu.org/licenses/>.
 */

require('tidepools_variables.php');

try 
{
    $m = new Mongo(); // connect
    $db = $m->selectDB($DBname);
>>>>>>> origin/cleanup
}
catch ( MongoConnectionException $e ) 
{
    echo '<p>Couldn\'t connect to mongodb, is the "mongo" process running?</p>';
    exit();
}

	//if $_POST['landmark']=='buildings', etc. to pass correct landmark value
	
	$type = 'people';

<<<<<<< HEAD

	$collection = $db->$type;
	
=======
	$collection = $db->$type;
>>>>>>> origin/cleanup

	$marktype = $_POST['marktype'];
	

<<<<<<< HEAD

=======
>>>>>>> origin/cleanup
	//------ Landmark Stats -----------//
	
	$avatar = $marktype.'.png'; //avatar based on user selection
	$expires = 'never';
	$checkIn = array();
	$imGoing = array();
<<<<<<< HEAD

=======
>>>>>>> origin/cleanup
	
	$stats = array(	
		'expires'=>$expires,
		'avatar'=>$avatar,
		'level'=>1,
		'reputation'=>0,
		'likes'=>0,
		'buzz'=>0,
		'checkIn'=>$checkIn,
		'imGoing'=>$imGoing
	);
	
	//---------- Landmarks Inside Landmark --------//
	
	$insideStatus = 0;
	$landmarksInside = array();
	
	$insides = array(
		'insideAlready'=> $insideStatus,
		'landmarksInside'=> $landmarksInside
	);
	
	//---------- News & Annoucements --------//
	
	$post = array(
		'sticky'=>0,
		'global'=>0,
		'post'=>'...',
		'likes'=>0
	);
	
	$feed = array(
			
	);
	
	//---------- Permissions --------//
	
	$viewers = array();
	$admins = array();
	//hidden = not on global map aggregation
	
	$permissions = array(
		'hidden' => 0,
		'viewers' => $viewers,
		'openedit' => 0,
		'admins' => $admins	
	);
	
	//------------------------------//


<<<<<<< HEAD

	if($_POST['name']) {
	
	    
=======
	if($_POST['name']) {
	
>>>>>>> origin/cleanup
		$name = $_POST['name'];
	    $description = $_POST['description'];
		
	    
	    $lat = floatval($_POST['lat']); //converting from string to floats
<<<<<<< HEAD
	    
=======
>>>>>>> origin/cleanup
	    $lng = floatval($_POST['lng']); //...^
	    
		
		$loc = array($lng,$lat);
<<<<<<< HEAD
		
		$map = 'Map_objectID'; //which map was this posted to? global map or personal map? 
		

			
=======
		$map = 'Map_objectID'; //which map was this posted to? global map or personal map? 

>>>>>>> origin/cleanup
	    //------ MONGO DB ESCAPE STRING -------//
	   /* 
		$pattern = '$';
		$replacement = '\$';
		echo preg_replace($pattern, $replacement, $description); 
		*/
		//------------------------------------//
<<<<<<< HEAD
		
		


	    
=======

>>>>>>> origin/cleanup
	   	//----Landmark JSON Object------//
						
		$landmark = array(
		 
		    'name'=>$name,
		    'description'=>$description,
		    'loc'=>$loc,
		    'map'=>$map,
		    'stats'=>$stats,
		    'insides'=>$insides,
		    'feed'=>$feed,
		    'permissions'=>$permissions
<<<<<<< HEAD

		);
		
		//---------------------------//
		

		insertLandmark($landmark,$collection);	
	    
	    
=======
		);
		
		//---------------------------//

		insertLandmark($landmark,$collection);	
>>>>>>> origin/cleanup
	}

	
	function insertLandmark($landmark,$collection){
<<<<<<< HEAD
			
		$safe_insert = true;
		
		$collection->insert($landmark,$safe_insert);
		
		$collection->ensureIndex(array("loc" => "2d"));


	}


=======
		//$safe_insert = true;
		$collection->insert($landmark);
		$collection->ensureIndex(array("loc" => "2d"));
	}

>>>>>>> origin/cleanup
?>