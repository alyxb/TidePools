<?php
	
	//Temporary handler for generating iframe content
	
	//generate IFRAME if it's an external link
	
	$class = $_POST['class'];
	$type = $_POST['type'];	
	$mapID = $_POST['mapID'];	
	$landmarkID = $_POST['landmarkID'];	
	$userID = $_POST['userID'];	
	$adminMap = $_POST['adminMap'];	
	$popWidth = $_POST['popWidth'];
	$popHeight = $_POST['popHeight'];
	
	
	if ($class == 'status'){

		if ($type == 'landmarkstatus'){  //
			
			echo '<div id="landmarkpopup" style="height:'.$popHeight.'; width:'.$popWidth.';">';
			echo '<div id="dropzone" style="width:175px; height:42px; position:relative; float:left; margin-left:9; margin-bottom:5px; background-image:url(../images/dropzone.png); z-index:1;"></div>';
			echo '<div id="landmarklike" style="width:32px; height:28px; position:relative; margin-left:10px; float:left; display:inline-block; cursor:pointer; background-image:url(../images/like.png); z-index:1;" onclick="likeLandmark('.$landmarkID.');"></div>';
			echo '<div id="follow" style="width:66px; height:27px; position:relative; margin-right:4; float:left; display:inline-block; cursor:pointer; background-image:url(../images/follow.png); z-index:1; margin-left:5px;" onclick="followLandmark('.$landmarkID.');"></div>';
		
			if ($mapID !== $adminMap){ //NOT a secure method for protected maps!
			
				echo '<div id="delete" style="width:66px; height:27px; position:relative; float:left; display:inline-block; cursor:pointer; background-image:url(../images/delete.png); z-index:1; margin-left:5px;" onclick="deleteLandmark('.$landmarkID.');"></div><br>';
				
			}
		
			echo '<div id="formfont" style="padding-left:12; padding-right:12;">';
			echo '</br>';
			echo '<p style="color:#7f275b; font-size:14; margin-left:-30px; position:relative; display:inline-block; margin-top:24;margin-bottom:-35;"><b>Add Comment</b></p>';
			echo '</br><hr style="border:2px solid #7f275b;" />';
			echo '<form id="newComment" action="php/record_comment.php" method="post" onsubmit="this.commentSubmit(); return false;">';
			echo '</select></br>';
			echo '<p style="margin-bottom:2px;">Name / Nickname</p><input type="text" id="name" value="AMC Participant" name="name" maxlength="20"/>';
			echo '<p style="margin-bottom:1px;">Comment</p><textarea name="description" class="clearme" id="description" maxlength="300"></textarea></br>';
			echo '<input type="hidden" id="userID" name="userID" value="'.$userID.'" />';
			echo '<input type="hidden" id="landmarkID" name="landmarkID" value="'.$landmarkID.'" />';
			echo '</br>';
			echo '<input type="button" id="commentSubmit" value="Post" onsubmit="this.commentSubmit(); " />';
			echo '<input type="button" id="commentSubmit" value="Cancel" onClick="window.location.reload()" />';
			echo '</form>';
			echo '<hr style="border:2px solid #7f275b;" />';
			echo '</div>';
	
		}
	}
	
	
	if ($class == 'record'){
	
		echo '<p style="color:#7f275b; font-size:14;  position:relative; display:inline-block; margin-top:-8;margin-bottom:9;"><b>New '.$type.'</b></p>';
		echo '<form id="newPost" action="php/record_landmark.php" method="post" onsubmit="this.submit(); return false;">';

		if ($type == 'event'){

			echo 'Event Title</br><input type="text" id="name" name="name" maxlength="50" value=""/></br>';
			echo 'What"s happening?</br> <textarea name="description" id="description" maxlength="300"></textarea></br>';
			echo '<input type="button" id="submit" value="Save" onsubmit="this.submit(); " />';
			echo '<input type="button" id="submit" value="Cancel" onClick="window.location.reload()" />';
			echo '</br><hr>';
			echo '</br><b>When is it? (landmark will appear/disappear during this time period) </b></br>';
			echo '<input type="radio" name="timespec" value="none" checked> None <input type="radio" name="timespec" value="once"> Once <input type="radio" name="timespec" value="daily"> Daily ';
			echo '<input type="radio" name="timespec" value="weekly"> Weekly';
			echo '</br>Start Date/Time  <input type="text" name="startdatetimepicker" id="startdatetimepicker" value="Click Here" />';
			echo '</br>End Date/Time  <input type="text" name="enddatetimepicker" id="enddatetimepicker" value="Click Here" />';
		}
		
		else if ($type == 'memory'){
		
			echo 'Title</br><input type="text" id="name" name="name" maxlength="50" value=""/></br>';
			echo 'What happened?</br> <textarea name="description" id="description" maxlength="300"></textarea></br>';
			echo '<input type="button" id="submit" value="Save" onsubmit="this.submit(); " />';
			echo '<input type="button" id="submit" value="Cancel" onClick="window.location.reload()" />';
			echo '</br><hr>';
			echo '</br>When was it?  <input type="text" name="datetimepicker" id="datetimepicker" value="Click Here" />';
		}
		
		else if ($type == 'friend'){

			echo 'Their name/nickname?</br><input type="text" id="name" name="name" maxlength="50" value=""/></br>';
			echo 'Anything else?</br> <textarea name="description" id="description" maxlength="300"></textarea></br>';
			echo '<input type="button" id="submit" value="Save" onsubmit="this.submit(); " />';
			echo '<input type="button" id="submit" value="Cancel" onClick="window.location.reload()" />';	
			echo '</br><hr>';
		}
		
		else if ($type == 'group'){

			echo 'Group Name</br><input type="text" id="name" name="name" maxlength="50" value=""/></br>';
			echo 'What do you/they do?</br> <textarea name="description" id="description" maxlength="300"></textarea></br>';
			echo '<input type="button" id="submit" value="Save" onsubmit="this.submit(); " />';
			echo '<input type="button" id="submit" value="Cancel" onClick="window.location.reload()" />';
			echo '</br><hr>';
			echo '</br><b>When do you/they meet?</b></br>';
			echo '<input type="radio" name="timespec" value="none" checked> None <input type="radio" name="timespec" value="once"> Once <input type="radio" name="timespec" value="daily"> Daily ';
			echo '<input type="radio" name="timespec" value="weekly"> Weekly';
			echo '</br>Choose Date/Time  <input type="text" name="datetimepicker" id="datetimepicker" value="Click Here" />';
		}
		
		else if ($type == 'alert'){

			echo 'What kind?</br><input type="text" id="name" name="name" maxlength="50" value=""/></br>';
			echo 'What happened/will happen?</br> <textarea name="description" id="description" maxlength="300"></textarea></br>';
			echo '<input type="button" id="submit" value="Save" onsubmit="this.submit(); " />';
			echo '<input type="button" id="submit" value="Cancel" onClick="window.location.reload()" />';
			echo '</br><hr>';
			echo '</br><b>When?</b></br>';
			echo '<input type="radio" name="timespec" value="none" checked> None <input type="radio" name="timespec" value="once"> Once <input type="radio" name="timespec"  value="daily"> Daily ';
			echo '<input type="radio" name="timespec" value="weekly"> Weekly';
			echo '</br>Choose Date/Time  <input type="text" name="datetimepicker" id="datetimepicker" value="Click Here" />';
		}
		
		
		else if ($type == 'fixthis'){

			echo 'What"s wrong?</br><input type="text" id="name" name="name" maxlength="50" value=""/></br>';
			echo 'Description</br> <textarea name="description" id="description" maxlength="300"></textarea></br>';
			echo '<input type="button" id="submit" value="Save" onsubmit="this.submit(); " />';
			echo '<input type="button" id="submit" value="Cancel" onClick="window.location.reload()" />';
			echo '</br><hr>';
			echo '</br><b>When did you notice it?</b></br>';
			echo '</br>Choose Date/Time  <input type="text" name="datetimepicker" id="datetimepicker" value="Click Here" />';

		}
		
		else if ($type == 'food'){

			echo 'What kind of food?</br><input type="text" id="name" name="name" maxlength="50" value=""/></br>';
			echo 'Recommendations/Deals?</br> <textarea name="description" id="description" maxlength="300"></textarea></br>';
			echo '<input type="button" id="submit" value="Save" onsubmit="this.submit(); " />';
			echo '<input type="button" id="submit" value="Cancel" onClick="window.location.reload()" />';
			echo '</br><hr>';
			echo '</br><b>When is it open?</b></br>';
			echo '<input type="radio" name="timespec" value="none" checked> None <input type="radio" name="timespec" value="once"> Once <input type="radio" name="timespec" value="daily"> Daily ';
			echo '<input type="radio" name="timespec" value="weekly"> Weekly';
			echo '</br>Choose Date/Time  <input type="text" name="datetimepicker" id="datetimepicker" value="Click Here" />';

		}
		
		else {

			echo 'Title/Name</br><input type="text" id="name" name="name" maxlength="50" value=""/></br>';
			echo 'Anything else?</br> <textarea name="description" id="description" maxlength="300"></textarea></br>';
			echo '<input type="button" id="submit" value="Save" onsubmit="this.submit(); " />';
			echo '<input type="button" id="submit" value="Cancel" onClick="window.location.reload()" />';
			echo '</br><hr>';
			echo '</br><b>When is it? (landmark will appear/disappear during this time period) </b></br>';
			echo '<input type="radio" name="timespec" value="none" checked> None <input type="radio" name="timespec" value="once"> Once <input type="radio" name="timespec" value="daily"> Daily ';
			echo '<input type="radio" name="timespec" value="weekly"> Weekly';
			echo '</br>Start Date/Time  <input type="text" name="startdatetimepicker" id="startdatetimepicker" value="Click Here" />';
			echo '</br>End Date/Time  <input type="text" name="enddatetimepicker" id="enddatetimepicker" value="Click Here" />';

		}
		
			echo '<br>Add to Map (optional): <select id="maplist" name="maplist">';
			echo '<input type="hidden" id="lat" name="lat" value="0" />';
			echo '<input type="hidden" id="lng" name="lng" value="0" />';
			echo '<input type="hidden" id="marktype" name="marktype" value="0" />';
			echo '<input type="hidden" id="landmarkAdmin" name="landmarkAdmin" value="0" />';
			echo '<input type="hidden" id="mapID" name="mapID" value="0" />';
			echo '</form>';
	
	}
	



?>