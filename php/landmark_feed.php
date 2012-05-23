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

	$landmarks = $_POST['data'];
	
	
	stripslashes($landmarks); 

	
	$counter = 1;
	

	echo '<div style="width:351px; height:80px;"> <hr style="border:3px solid #df1c53;" /><img src="/images/announcement.png" style="float:left; margin-left: 8;" /> <div id="innertext" style="width:299px; height:75; float:left; margin-left: 7; margin-top:-5;"><p2>Announcement</p2> </br> <p style="margin-top:2px; " > This version of Tidepools Social WiFi in Red Hook, Brooklyn is hosted on the Internet, while the actual map is hosted locally, on a community server. </p></div> <hr></div>';
		

	foreach($landmarks as $i){
	
	
		foreach($i as $c){
		

			if ($c['stats'] !== null){
			
				
				if ($c['name'] == "flora"){
				
				
					continue;
				
				}
				
				
				else {
			
					
					$idVal = "'".$c['_id']['$id']."'";
				
					echo '<div style="width:97%; margin-left: -13px; margin-top: 15px; margin-bottom: 15px;">';
				
					echo '<div style="cursor:pointer; margin-left:7px;" onclick="landmarkWindow('.$idVal.')">';
					
					echo '<img src="/images/'.$c['stats']['avatar'].'"style="float:left; max-width:42px; margin-left: 8;"/>';//
					
					echo '<div id="innertext" style=" width:286px;  height:65; float:left; margin-left: 7; margin-top:0; margin-bottom:10">';
					
					$name = stripslashes($c['name']);
					
					echo "<p5><span style='color:#7f275b'> ".$counter."</span> . ".$name."</p5>";  
					
					$descrip = stripslashes($c['description']);
					

					echo "<p style='margin-top:2px;'>".$descrip."</p>";
					
					
					if ($c['feed'] !== null){
					
						$result = array_reverse($c['feed']); 
						
						echo "<img src='/images/comment.png'/><p4 style='margin-bottom:7px;'>".$result[0]['words']."</p4>";
										
					}
					
					echo '</div></br><hr></div></div>';
					
					
					$counter++;
					
				}

			
			}
			

			
						
		}
		
		
		
		
	}
	
	echo '</div>';
	





?>
	



