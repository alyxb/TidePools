<?php
	
/**
<<<<<<< HEAD
 *	TidePools Social WiFi
 *  Copyright (C) 2012 Jonathan Baldwin <jrbaldwin@gmail.com>
 *
 *	This file is part of TidePools <http://www.tidepools.co>

 *  TidePools is free software: you can redistribute it and/or modify
=======
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
<<<<<<< HEAD


	$curr = "";

	//if $_POST['landmark']=='buildings', etc. to pass correct landmark value
	
=======
	$curr = "";

>>>>>>> origin/cleanup
	$type = 'landmarks';
	$coll = $db->$type;
	
	$nelat = floatval($_GET['nelat']); //remember to query lower right, then upper right
	$nelng = floatval($_GET['nelng']);
	$swlat = floatval($_GET['swlat']);
	$swlng = floatval($_GET['swlng']);
	
	
<<<<<<< HEAD
	
	//-------- IS THERE A FILTER ? ---------//

	$filter = null;
	
	if($_GET['filter']){
	
		$filter = $_GET['filter'];
		
	}
	
	//---------------------------------------//
	
	

	
	
	$maps = $_GET['mapIDs'];


	
=======
	//-------- IS THERE A FILTER ? ---------//
	$filter = null;
	
	if($_GET['filter']){
		$filter = $_GET['filter'];
	}
	//---------------------------------------//
	
	$maps = $_GET['mapIDs'];

>>>>>>> origin/cleanup
	$nelat = $nelat + 0.00020; //fixing boundary to compensate for a bit off screen
	$nelng = $nelng + 0.00020;
	$swlat = $swlat - 0.00020;
	$swlng = $swlng - 0.00020;

<<<<<<< HEAD

	
	$box = array(array($swlng,$swlat),array($nelng,$nelat));
	

	
	//need to query for all map ids, sort which ones are public
	
	
	$final = array();

		
	
	if($filter !== null){
	

		foreach($maps as $i){
		
					
=======
	$box = array(array($swlng,$swlat),array($nelng,$nelat));
	
	//need to query for all map ids, sort which ones are public
	$final = array();
	
	if($filter !== null){
	
		foreach($maps as $i){
		
>>>>>>> origin/cleanup
			$cursor = $coll->find(array(
			    'loc' => array('$within' => array('$box' => $box)),
			    'type' => $filter,
			    'mapID' => $i
			)); 
	
<<<<<<< HEAD
			
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
				
				
				//array_push($final, $cursor);

				
				
				//var_dump($cursor);
				
				
				
				foreach($cursor as $z){
				
					$currentID = $z['_id'];
						
					$currentID = (string)$currentID;
					
					//$type = $z['type'];
				
				
=======
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

				foreach($cursor as $z){
				
					$currentID = $z['_id'];
					$currentID = (string)$currentID;
	
					//---- TIME HANDLER STATIC RIGHT NOW, THESE ITEMS HANDLE TIME -----//
					
>>>>>>> origin/cleanup
					if ($z['type'] == "event" 
						||$z['type'] == "A" 
						||$z['type'] == "B" 
						||$z['type'] == "C" 
						||$z['type'] == "AUD" 
						||$z['type'] == "154" 
						||$z['type'] == "156"
						||$z['type'] == "157"
						||$z['type'] == "1243"
						||$z['type'] == "2242"
						||$z['type'] == "BC"
						||$z['type'] == "E"
						||$z['type'] == "FG"
						||$z['type'] == "H"
						||$z['type'] == "I"
						||$z['type'] == "J"
						||$z['type'] == "L"
						||$z['type'] == "M"
						||$z['type'] == "north"
					){
					
						$timeNow = timeExists($z);
						
<<<<<<< HEAD
						
						if ( $z['stats']['time']['start'] == "Click Here" || $z['stats']['time']['end'] == "Click Here"){
						
							
							$nestArray = array(	
							
								$currentID => $z
						
							);
	
							array_push($final, $nestArray);
						
						}
						
						
				
						
						if ($timeNow == "1"){
						

							$nestArray = array(	
							
								$currentID => $z
						
							);
	
							array_push($final, $nestArray);

=======
						if ( $z['stats']['time']['start'] == "Click Here" || $z['stats']['time']['end'] == "Click Here"){
							
							$nestArray = array(	
								$currentID => $z
							);
							array_push($final, $nestArray);
						}
						
						if ($timeNow == "1"){

							$nestArray = array(	
								$currentID => $z
							);
							array_push($final, $nestArray);
>>>>>>> origin/cleanup
						}
						
						if ($timeNow == "0"){
						
<<<<<<< HEAD
							//echo "no";
						}
						

					
					}

					
					else {
					
						$nestArray2 = array(	
						
								$currentID => $z
						
							);
	
						array_push($final, $nestArray2);
						
						
					
						//array_push($final, $z);

					}
					
		
				}

		
								
				
	
					
			}
			
	}
	


=======
							//nothing
						}
					}
					
					//-------------------------------------------------------------//

					else {
						$nestArray2 = array(	
								$currentID => $z
							);
	
						array_push($final, $nestArray2);
					}
				}
			}
	}
	
>>>>>>> origin/cleanup
		$final = json_encode($final);
	
		print_r($final);
		
		
		function checkTime($cursor){
	
			foreach($cursor as $z){
<<<<<<< HEAD
			
				//echo "1";
			
				//echo $i['name']."<br>";
				
				
				//echo $z['stats'];
				
				//var_dump($z['stats']['time']['start']);
				
				//echo $z['stats']['time']['start']."<br>";
				
				//echo $z['stats']['time']['end']."<br>";
				
				//var_dump($z['stats']['time']['start']);
				
				$stringed = (string)$z['stats']['time']['start'];
				
				//echo $stringed;
			
				
				//echo "<br>";
				
				
				if($stringed !== "0.00000000 0"){
				
					//var_dump($z['stats']['time']['start']);
					
					//echo "<br>";
				
					//echo "hej fredrika<br>";
					
					$curr = "test";
					
					//return timeExists($z);
				
				
				}
				
				else{
				
					return "none";
				
				}
	
			}


		
		}
		
		
	
	
=======

				$stringed = (string)$z['stats']['time']['start'];

				if($stringed !== "0.00000000 0"){

					$curr = "test";
				}
				
				else{
					return "none";
				}
			}
		}
		

>>>>>>> origin/cleanup
		function timeExists($z){
			
			$start = $z['stats']['time']['start'];
			$end = $z['stats']['time']['end'];
<<<<<<< HEAD
			
			
=======
>>>>>>> origin/cleanup

			//----- Start process -----//
			$start = (string)$start;
			
			$pattern = "/0.00000000 /";
			$replacement = "";
			
			$start = preg_replace($pattern, $replacement, $start);
		
			//echo $start;
			
			if ($start == null){
				//return;
			}
			
			//------ End process -----//
			
			$end = (string)$end;
			
			$pattern = "/0.00000000 /";
			$replacement = "";
			
<<<<<<< HEAD
			
=======
>>>>>>> origin/cleanup
			$end = preg_replace($pattern, $replacement, $end);
			
			$end1 = intval($end);
			$start1 = intval($start);
			
			if ($end == null){
				//return;
			}
			
			//----------------------//	
			
<<<<<<< HEAD
			
=======
>>>>>>> origin/cleanup
			$now = strtotime("now");

			$start = intval($start);
			$end = intval($end);
<<<<<<< HEAD
			
			//var_dump($start);
=======

>>>>>>> origin/cleanup

			
			if(dateRange($start, $end, $now)){
			
			  return "1";
<<<<<<< HEAD
			  
			 // $currentTime = "1";
			    
			} else {
			
			  return "0";
			  
			 // $currentTime = "0";
			    
			}
			
	}
	
	
	
=======

			} else {
			
			  return "0";

			}
	}

>>>>>>> origin/cleanup
		
	function dateRange($start, $end, $now){
	
	  return (($now >= $start) && ($now <= $end));
	
	}




?>