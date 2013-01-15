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


	$landmarks = $_POST['data'];
	
	stripslashes($landmarks); 

	$counter = 1;
	
	foreach($landmarks as $i){
	
		foreach($i as $c){

			if ($c['stats'] !== null){
			
				if ($c['name'] == "flora"){
					continue;
				}
				
				else {

					if ($c['feed'] !== null){
		
						foreach($c['feed'] as $x){

							$idVal = "'".$c['_id']['$id']."'";
		
							echo '<div style="width:100%; margin-left: -7px; margin-top: 42px; margin-bottom: 5px;" onclick="landmarkWindow('.$idVal.')">';

							$num = rand(1, 3);
							
							echo '<img src="images/people/person'.$num.'.png" style="float:left; max-width:42px; margin-left: 8; margin-right:11;"/>';//
							
							echo '<div id="innertext" style=" width:348px;  height:39;  margin-left: 12; margin-top:1; margin-bottom:8">';
							
							$name = stripslashes($x['name']);
							
							echo "<p5><span style='color:#7f275b'></span>".$name."</p5>";  //plug into CSS here...
							
							$descrip = stripslashes($x['words']);
							
							echo "<p style='margin-top:2px;'>".$descrip."</p>";
				
							echo '</br><hr></div></div>';
						}
					}
				}
			}
		}
	}
	echo '</div>';
?>
	

	
			


