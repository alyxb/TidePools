<?php
	
/**
 *	TidePools Social WiFi
 *  Copyright (C) 2012 Jonathan Baldwin <jrbaldwin@gmail.com>
 *
 *	This file is part of TidePools <http://www.tidepools.co>

 *  TidePools is free software: you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation, either version 3 of the License, or
 *  (at your option) any later version.

 *  TidePools is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.

 *  You should have received a copy of the GNU General Public License
 *  along with TidePools.  If not, see <http://www.gnu.org/licenses/>.
 */
 

try 
{

    $m = new Mongo(); // connect
    $db = $m->selectDB("RedHook");
}
catch ( MongoConnectionException $e ) 
{
    echo '<p>Couldn\'t connect to mongodb, is the "mongo" process running?</p>';
    exit();
}

	//if $_POST['landmark']=='buildings', etc. to pass correct landmark value
	
	$type = 'landmarks';
	$coll = $db->$type;
	
	$nelat = floatval($_GET['nelat']); //remember to query lower right, then upper right
	$nelng = floatval($_GET['nelng']);
	$swlat = floatval($_GET['swlat']);
	$swlng = floatval($_GET['swlng']);
	
	
	
	//-------- IS THERE A FILTER ? ---------//

	$filter = null;
	
	if($_GET['filter']){
	
		$filter = $_GET['filter'];
		
	}
	
	//---------------------------------------//
	
	

	
	
	$maps = $_GET['mapIDs'];


	
	$nelat = $nelat + 0.00020; //fixing boundary to compensate for a bit off screen
	$nelng = $nelng + 0.00020;
	$swlat = $swlat - 0.00020;
	$swlng = $swlng - 0.00020;


	
	$box = array(array($swlng,$swlat),array($nelng,$nelat));
	

	
	//need to query for all map ids, sort which ones are public
	
	
	$final = array();

		
	
	if($filter !== null){
	

		foreach($maps as $i){
		
					
			$cursor = $coll->find(array(
			    'loc' => array('$within' => array('$box' => $box)),
			    'type' => $filter,
			    'mapID' => $i
			)); 
	
			
			$cursor->sort(array('_id' => -1));  //sort landmarks by creation, newest first
			
				
			$cursor = iterator_to_array($cursor);
				
				
			array_push($final, $cursor);
			
		}
		
	
		
	}
		
		
		
	else {
		

			foreach($maps as $i){


				$cursor = $coll->find(array(
				
					
					'loc' => array('$within' => array('$box' => $box)),
					'mapID' => $i


			  	)); 
			  	
				
				$cursor->sort(array('_id' => -1)); 
				
				
				
				$cursor = iterator_to_array($cursor);
				

				
				array_push($final, $cursor);
					
			}
			
	}
	


		$final = json_encode($final);
	
		print_r($final);



?>