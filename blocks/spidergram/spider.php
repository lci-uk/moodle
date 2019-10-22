<?php


	require_once '../config.php';


   	global $CFG, $DB, $USER;
   	
	require_once("{$CFG->libdir}/completionlib.php");  // Custom code 
	
	$CR = "<br /><br />";
	$LF = "<br />";
	$target = 'target="_blank"';
	$time = time();
	$fielddata = array();
	$credit = array();
	$level2  = array();
	$fieldcount = 0;
	$passcounter = 0;
	$recordcount = 0;
	$fieldcount = 0;
	$read = 0;
	$nextid = 1;
	$recordflag = 0;
	$done =  0;


	$usercompanysql = "
			
			SELECT *
			FROM {user_info_data} uid
			WHERE uid.userid = $USER->id AND uid.fieldid = 1
			
			";
			$usercompanys = $DB->get_records_sql($usercompanysql);
			
			foreach($usercompanys AS $usercompany){
				$userscompany = $usercompany->data;
			}
	
	$sql1d = "
			SELECT *
			FROM {user_info_data} ui
			JOIN {user} u ON u.id = ui.userid 
			WHERE $USER->id = ui.userid AND ui.fieldid = 6
			";
			$users5 = $DB->get_records_sql($sql1d);	
			$c = 0;
			foreach($users5 as $user5){
			$c++;
			$initiallevels[$user5->id] = $user5->data;	
			}
	
	$initiallevel = $initiallevels[$user5->id];

	$initiallevel = intval(substr($initiallevel, -1));
//	echo 'Initial level:'.$initiallevel;
	
	$sql1d2 = "
			SELECT *
			FROM {user_info_data} ui
			
			WHERE $USER->id = ui.userid AND ui.fieldid = 7
			";
			$users6 = $DB->get_records_sql($sql1d2);	
			$c = 0;
			foreach($users6 as $user6){
			$c++;
			$leancompetencys[$user6->id] = $user6->data;	
			}
	
	$leancompetency = $leancompetencys[$user6->id];
	if(strpos($leancompetency,"."))
	{$leancompetency = intval(substr($leancompetency, -3));}
	else {$leancompetency = intval(substr($leancompetency, -1));}
//	echo ' Lean competency:'.$leancompetency;
		
	
	
	// Check whether $USER->id has a entry data_records else set $initiallevel
	
	$sql1e ="
			SELECT *
			FROM {data_records} dr
			";
			if($hasrecords = $DB->get_records_sql($sql1e)){
			foreach($hasrecords AS $hasrecord){	
			if($hasrecord->userid == $USER->id){
			//read in contentrecord	
			$read = 1;
			//echo 'Read in!';
			}
			
			
			}//each record
			
			}// has records	
			if($read == 0){
			//echo 'New record! ';	
			//INSERT new datarecord
			$datarecord = new stdClass();
			$datarecord->userid = $USER->id;
			$datarecord->groupid = 0;
			$datarecord->dataid = 1;
			$datarecord->timecreated = time();
			$datarecord->timemodified = time();
			$datarecord->approved = 1;
			$lastdatainsertid = $DB->insert_record('data_records', $datarecord, false);
			
			
			
			// get field id from data_records
			
	$sql1f ="
			SELECT *
			FROM {data_records} dr2
			WHERE $USER->id = dr2.userid
			";
			if($hasrecords2 = $DB->get_records_sql($sql1f)){
			foreach($hasrecords2 AS $hasrecord2)
			$lastinsertid = $hasrecord2->id;
			
			}
			
//			echo $lastinsertid.':: ';
	$sql1g ="
			SELECT *
			FROM {data_fields} df
			";
			if($datafields = $DB->get_records_sql($sql1g)){
			foreach($datafields AS $datafield){
			$fieldcount ++;	
//			echo $datafield->id.':';	
			$contentrecord = new stdClass();
			$contentrecord->fieldid = $datafield->id;
			$contentrecord->recordid = $lastinsertid;
			//echo 'New content!';
			if($fieldcount == 1){
			$contentrecord->content = time();
			$contentrecord->content1 = NULL;
			$contentrecord->content2 = NULL;
			$contentrecord->content3 = NULL;
			$contentrecord->content4 = NULL;
			$lastcontentinsertid = $DB->insert_record('data_content', $contentrecord, false);	
			}
			elseif ($fieldcount == 11)    {
			$contentrecord->content = 0;
			$contentrecord->content1 = NULL;
			$contentrecord->content2 = NULL;
			$contentrecord->content3 = NULL;
			$contentrecord->content4 = NULL;
			$lastcontentinsertid = $DB->insert_record('data_content', $contentrecord, false);	
			}	
			else{
			$contentrecord->content = $initiallevel;
			$contentrecord->content1 = NULL;
			$contentrecord->content2 = NULL;
			$contentrecord->content3 = NULL;
			$contentrecord->content4 = NULL;
			$lastcontentinsertid = $DB->insert_record('data_content', $contentrecord, false);
			}
			
			}// each datafield
			}// datafields
			}// write both
			
	
//	$level = $initiallevel;
// 	$leancompetencyarray=(explode(".",$leancompetency));
	$level = $leancompetency;
	
//	echo ' Lean competency:'.$leancompetency;
//	echo ' Level:'.$level;
	
	// courses
		
	// users enrolled
/*		$sql2 = "
			SELECT *
			FROM {enrol} e 
			JOIN {user_enrolments} ue ON ue.enrolid = e.id
			WHERE e.courseid = $course->id
			";
			
			if($enrolements = $DB->get_records_sql($sql2)){
			foreach($enrolements AS $enrolement){
			//echo count($enrolements).$LF;	
			//echo $enrolement->userid.$LF;	*/
			
			$sql2 = "
			SELECT *
			FROM {user_enrolments} ue
			JOIN {enrol} e ON ue.enrolid = e.id
			
			WHERE ue.userid = $user5->id
			ORDER BY e.courseid";
			
			// User enrolments with ' No courses' case
			if($enrolments = $DB->get_records_sql($sql2)){
				$coursecount = 0;
				
				
				foreach($enrolments as $enrol){	
				    
			
		$sql3 = "
			SELECT *
			FROM {course} c
			WHERE c.id = $enrol->courseid AND c.visible = 1
			";
			//$coursecount = 0;
			if($courses = $DB->get_records_sql($sql3)){
			foreach($courses as $course){	
			$coursecount++; 
			
			
		$sql3h = "
			SELECT cm.id, m.name
			FROM {course_modules} cm
			JOIN {modules} m ON m.id = cm.module
			WHERE cm.course = $course->id AND cm.module <> 24 AND cm.module <> 12 AND cm.module <> 15 AND cm.module <> 23
			";
			
			
			if($modules = $DB->get_records_sql($sql3h)){
			foreach($modules as $module){
			    
		$sqli = "
			SELECT *
			FROM {course_modules_completion} cmc
			WHERE cmc.userid = $user5->id AND cmc.coursemoduleid = $module->id AND completionstate = 1
			";
			if($completions = $DB->get_records_sql($sqli)){
			    
			   
			    
				foreach($completions as $completion){
					
		$sqlj = "
			SELECT *
			FROM {competency_modulecomp} cym
			WHERE cym.cmid = $module->id
			";			
			if($compmodules = $DB->get_records_sql($sqlj)){
			foreach($compmodules as $compmodule){
					
		$sqlk = "
			SELECT *
			FROM {competency} cy
			WHERE cy.id = $compmodule->competencyid
			";			
			if($competencies = $DB->get_records_sql($sqlk)){
			foreach($competencies as $competency){
				if($compmodule->competencyid == $competency->id){				
				//$competency->shortname is sub-level
				$levelcomp = $competency->shortname;
			/*	
			Course ids
			 
			Level LC  
			1: 10 Starter Guide  
			
			  
						 
			
			Level 2 LC
			1: 62 Lean Construction 
			2: 53 5S Workplace Organisation 
			3: 64 Lean construction and waste 
			4: x Collaborative planning
			5: 63 Problem Solving	
			6: x Standardised work
			7: x Value stream mapping
			8: 65 Visual management
			9: 50 Lean Project (on the job)
			4: 66 Collaborative planning L3 
			6: 68  Standardised work L3
			7: 67  Value stream mapping L3 
			
			 * Level 3 LC

			9: 51 Lean Project L3
			 
			stand-alone
			1: ?? Lean construction in the round
			* 2: 53 5S Workplace Organisation						ok
			2: 152 5S Workplace Organisation eL2
			* 1: 62 lean in construction 							ok
			* 1: 10 starter guide									Ok
			4: 4 collaborative planning and production control
			5: 1 problem-solving and continuous improvement
			* 5 Standardised work									ok
			* 8 Value stream Mapping								ok
			8: 9 visual management
			*/
			
			// Stand-alone courses
			
			// 77 dianostic

			if($course->id == 77){
				$credit[1] = $levelcomp; 
				$credit[2] = $levelcomp; 
				$credit[3] = $levelcomp; 
				$credit[4] = $levelcomp; 
				$credit[5] = $levelcomp; 
				$credit[6] = $levelcomp; 
				$credit[7] = $levelcomp; 
				$credit[8] = $levelcomp; 
				$credit[9] = $levelcomp; 
				$writedb = 3;}

			if($course->id == 152){$credit[2] = $levelcomp;}	
			if($course->id == 4){$credit[4] = $levelcomp;}	
			if($course->id == 1){$credit[5] = $levelcomp;}
			if($course->id == 9){$credit[8] = $levelcomp;}				
			
			// Level 1 courses
			if ($level == 1) {
			if($course->id == 10){
				$credit[1] = $levelcomp; 
				$credit[2] = $levelcomp; 
				$credit[3] = $levelcomp; 
				$credit[4] = $levelcomp; 
				$credit[5] = $levelcomp; 
				$credit[6] = $levelcomp; 
				$credit[7] = $levelcomp; 
				$credit[8] = $levelcomp; 
				$credit[9] = $levelcomp; 
				$writedb = 2;
			} 
			
			}
			// Level 2 courses
/*			if ($level == 2){
				$writedb = 2;
			}  */
			
			if ($level == 2) {

			if($course->id == 77) {}
			else {

			if($course->id == 62){$credit[1] = $levelcomp;}
			if($course->id == 53){$credit[2] = $levelcomp;}
			if($course->id == 64){$credit[3] = $levelcomp;}
			if($course->id == 66){$credit[4] = $levelcomp;}
			if($course->id == 63){$credit[5] = $levelcomp;}
			if($course->id == 68){$credit[6] = $levelcomp;}
			if($course->id == 67){$credit[7] = $levelcomp;}
			if($course->id == 65){$credit[8] = $levelcomp;}
			if($course->id == 50){
				$credit[1] = 3; 
				$credit[2] = 3; 
				$credit[3] = 3; 
				$credit[4] = 3; 
				$credit[5] = 3; 
				$credit[6] = 3; 
				$credit[7] = 3; 
				$credit[8] = 3; 
				$credit[9] = 3; 
				$writedb = 3;		
			}	


			
			}
			
			}
// Level 3 courses
			
			if ($level == 3){
				$writedb = 3;
			}

			if (($level == 3) OR ($level == 2)) {
			if($course->id == 28){$credit[4] = $levelcomp;}	
			if($course->id == 5){$credit[6] = $levelcomp;}	
			if($course->id == 8){$credit[7] = $levelcomp;}
			if($course->id == 51){$credit[9] = $levelcomp;}		
			
			}				
			}			
			
			}// each $competency
			}// if $competencies 								
			}// each compmodule 
			}// if compmodules	
			}// each completion
			}// if completions
			}// each module
			}//	if modules			
			}// each course			
			}// if courses
			}// for each enrol	
			}// if enrolements					
			
//			$writedb = 0;
//			if ($credit[9] == 1){$writedb = 2;}
//			if ($credit[9] == 2){$writedb = 3;}
					
	$sql1 = "
			SELECT *
			FROM {course} c
			WHERE c.id = 42
			";
			//$coursecount = 0;
			if($courses = $DB->get_records_sql($sql1)){
			foreach($courses as $course){	
				//echo $course->id.': '.$course->shortname.$LF;
			}// each course
			}// if courses			
		
		
	$sql3m = "
			SELECT *
			FROM {user} u
			WHERE u.id = $USER->id
			";
			//$coursecount = 0;
			if($users = $DB->get_records_sql($sql3m)){
			foreach($users as $user){	
//				echo $user->id.': '.$user->firstname.': '.$user->lastname.$LF;



			if (($writedb == 2)){
				$updatecredit = 2;
			}
			
			if (($writedb == 3)){
				$updatecredit = 3;
			}
			
			
	$sql4 = "
			SELECT *
			FROM {data_records} dr
			WHERE dr.userid = $user->id
			";
			//$coursecount = 0;
			if($records = $DB->get_records_sql($sql4)){
			$recordflag = 1;	
			foreach($records as $record){
//			echo $record->id;

		$sql5 = "
			SELECT *
			FROM {data_content} dc
			WHERE dc.recordid = $record->id
			";
			//$coursecount = 0;
			if($fields = $DB->get_records_sql($sql5)){
			//$passcounter = 0; 
			$fieldcount = 0;	
			foreach($fields as $field){
			    
			    
			$passcounter ++; //echo $passcounter;
			if($passcounter < 12){							
			if ($field->content > 20){}		
//			else {
			if($field->content == 0){
//				$field->content = 1;
			}
			
			$fieldcount ++; 
			$fielddata[$fieldcount] = $field->content; //echo $fieldcount.': '.$fielddata[$fieldcount].'<br/>';
			if(($credit[$fieldcount-1] <> '') AND ($field->content <> $level.$credit[$fieldcount-1])){
//			if(($credit[$fieldcount-1] <> '')){
			$updatecredit = $level.$credit[$fieldcount-1];
			
			
			if (($writedb == 2)){
				$updatecredit = 2;
			}
			
			if (($writedb == 3)){
				$updatecredit = 3;
			}
			
/*			if (($credit[9] == .2) AND ($course– >id == 50)){
				$updatecredit = 3;
			}*/
			
//			echo 'Updatecredit '.$updatecredit;
				
			// arms accumulate
			//list($int,$dec)=explode('.', $num);
//			list($int,$dec)=explode('.', $field->content);
//			$credit[$fieldcount-1] = $credit[$fieldcount-1] + $dec;
			
//			echo 'Update: '.$field->id.' - '.$fieldcount.' - '.$level.$credit[$fieldcount-1].'...';

			$contentrecord = new stdClass();
			$contentrecord->id = $field->id;
  			$contentrecord->content = $updatecredit;
			$lastcontentupdatedid = $DB->update_record('data_content', $contentrecord, false);
			
			$updatecredit = 0;	
			}
//			}	
			}  // $passcounter
				

						
			} //echo $LF; each field
			//$level[3] = 2.2;
//			 $fielddata[2] = $fielddata[2].$credit[1]; $fielddata[3] = $fielddata[3].$credit[2]; $fielddata[4] = $fielddata[4].$credit[3]; $fielddata[5] = $fielddata[5].$credit[4]; $fielddata[6] = $fielddata[6].$credit[5]; $fielddata[7] = $fielddata[7].$credit[6]; $fielddata[8] = $fielddata[8].$credit[7]; $fielddata[9] = $fielddata[9].$credit[8]; $fielddata[10] = $fielddata[10].$credit[9]; 


			 $fielddata[2] = $level.$credit[1]; 
			 $fielddata[3] = $level.$credit[2]; 
			 $fielddata[4] = $level.$credit[3]; 
			 $fielddata[5] = $level.$credit[4]; 
			 $fielddata[6] = $level.$credit[5]; 
			 $fielddata[7] = $level.$credit[6]; 
			 $fielddata[8] = $level.$credit[7]; 
			 $fielddata[9] = $level.$credit[8]; 
			 $fielddata[10] = $level.$credit[9]; 
			 
			
			
			if (($writedb == 2)){

				$fielddata[1] = 2;		
				$fielddata[2] = 2;	
				$fielddata[3] = 2;
				$fielddata[4] = 2;
				$fielddata[5] = 2;
				$fielddata[6] = 2;
				$fielddata[7] = 2;
				$fielddata[8] = 2;
				$fielddata[9] = 2;
				$fielddata[10] = 2;
				$level = 2;
				
			}
								
			if (($writedb == 3)){
					
				$fielddata[1] = 3;		
				$fielddata[2] = 3;	
				$fielddata[3] = 3;
				$fielddata[4] = 3;
				$fielddata[5] = 3;
				$fielddata[6] = 3;
				$fielddata[7] = 3;
				$fielddata[8] = 3;
				$fielddata[9] = 3;
				$fielddata[10] = 3;
			
				$level = 3;
			}

/*			if (($credit[9] == .2) AND ($course– >id == 50)){
				
				$fielddata[1] = 3;		
				$fielddata[2] = 3;	
				$fielddata[3] = 3;
				$fielddata[4] = 3;
				$fielddata[5] = 3;
				$fielddata[6] = 3;
				$fielddata[7] = 3;
				$fielddata[8] = 3;
				$fielddata[9] = 3;
				$fielddata[10] = 3;
				
				$level = 3;
				$currentlevel = 3;
			}*/
					
			} //$fieldcount = 0; //$passcounter = 0; //if fields					
			
			}// each record
			} if($recordflag == 0) {//$level = $initiallevel;
			
			$fielddata[2] = $level; $fielddata[3] = $level; $fielddata[4] = $level; $fielddata[5] = $level; $fielddata[6] = $level; $fielddata[7] = $level; $fielddata[8] = $level; $fielddata[9] = $level; $fielddata[1] = $level;
//			if ($totalcredits == 1){$currentlevel = 3.0;}
			// INSERT ContentRecord

			
			}// no records
			
			}// each user
			}// if users
			


			//echo "LEVEL = " . $level;
			
			
			
			if (($totalcredits > .8) AND ($credit[9] <> 1) AND ($credit[9] <> 2)){$totalcredits = .8;}
			
			if(($totalcredits == 0) AND ($leancompetency == $initiallevel)){
				$currentlevel = $leancompetency;
			} 

			if (($writedb == 2)){	
				$currentlevel = 2; 
				$credit[1] = 2;
				$credit[2] = 2;
				$credit[3] = 2;
				$credit[4] = 2;
				$credit[5] = 2;
				$credit[6] = 2;
				$credit[7] = 2;
				$credit[8] = 2;
				$credit[9] = 2;
//			echo ' Currentlevel 1 '.$currentlevel;	
				$level = 2;
			}//if level up TO Level 2
			
				
			if (($writedb == 3)){
				$currentlevel = 3; 
				$credit[1] = 3;
				$credit[2] = 3;
				$credit[3] = 3;
				$credit[4] = 3;
				$credit[5] = 3;
				$credit[6] = 3;
				$credit[7] = 3;
				$credit[8] = 3;
				$credit[9] = 3;
				$level = 3;
			} //if level up to Level 3
			
/*				if (($credit[9] == 2) AND ($level == 2)){
				$$currentlevel = 3; 
				$credit[1] = 3;
				$credit[2] = 3;
				$credit[3] = 3;
				$credit[4] = 3;
				$credit[5] = 3;
				$credit[6] = 3;
				$credit[7] = 3;
				$credit[8] = 3;
				$credit[9] = 3;
			
			}*/ //if level up to Level 3
			
/*			if (($credit[9] == 2) AND ($level ==3)){
				$currentlevel = 3; 
				$credit[1] = 3;
				$credit[2] = 3;
				$credit[3] = 3;
				$credit[4] = 3;
				$credit[5] = 3;
				$credit[6] = 3;
				$credit[7] = 3;
				$credit[8] = 3;
				$credit[9] = 3;
			
			} */ //if level up to Level 3
			
			$average = ($fielddata[2]+$fielddata[3]+$fielddata[4]+$fielddata[5]+$fielddata[6]+$fielddata[7]+$fielddata[8]+$fielddata[9]+$fielddata[10])/9;
			// never beyond 2.8/2.9	
			$totalcredits = $credit[1]+$credit[2]+$credit[3]+$credit[4]+$credit[5]+$credit[6]+$credit[7]+$credit[8]+$credit[9];
//			echo ' Totalcredits'.'&nbsp;'.$totalcredits;
			if (($writedb == 2 ) OR ($credit[9] == 3)){}
			else {$totalcredits = ltrim($totalcredits, '0');}				
/*				if (($credit[9] == 2) AND ($leancompetency <> 3) AND ($level == 2)){
				$currentlevel = $level + 1;
			
			}*/ //if level up to Level 3

//			echo ' Credit 9 '.$credit[9];
			if (($level.$totalcredits < 2.9) AND ($credit[9] <> 1) AND ($credit[9] <> 2) AND ($credit[9] <> 3)) {
				$currentlevel = $level.$totalcredits; //echo  ' Level'.'&nbsp;'.$level.$totalcredits;
//				echo $level.$totalcredits; echo ':'.$fielddata[11];
			}
			
//			if($leancompetency == $initiallevel){$currentlevel = $initiallevel;} else {$currentlevel = $level.$totalcredits;}
			
			if (($writedb == 2)){
					$currentlevel = 2;			
					
				}
			
			if (($writedb == 3)){
					$currentlevel = 3;			
					
				}
		
			$leancompetency = $currentlevel;
//			echo  ' leancompetency'.'&nbsp;'.$leancompetency;
//			echo ' Currentlevel 2 '.$currentlevel;
//			echo ' Totalcredits'.'&nbsp;'.$totalcredits;
			

	$sql1d3 = "
			SELECT *
			FROM {user_info_data} ui
			
			WHERE $USER->id = ui.userid AND ui.fieldid = 7
			";
			$users7 = $DB->get_records_sql($sql1d3);	
			$c = 0;
			foreach($users7 as $user7){
			$c++;
			$leancompetencys[$user7->id] = $user7->data;	
			}
			
			// CHANGE PROFILE
			$contentrecord = new stdClass();
			$contentrecord->id = $user7->id;
			$contentrecord->userid = $USER->id;
			$contentrecord->fieldid = 7;
	  		$contentrecord->data = 'Level '.$leancompetency;
			$lastcontentupdatedid = $DB->update_record('user_info_data', $contentrecord, false);
			
	// data fields/records
	// $clean = ltrim($clean, '0');
	$levelsubject = 'Level 3';
	$test_URL = 'https://leanconstructionschool.com/course/view.php?id=50';
	// <a href="http://www.yahoo.com">here</a>
	//$test_URL ='To go this module, click this link'."https://leanconstructionportal.org/local/staticpage/view.php?page=Course_5S_Workplace_Organisation>".'link'.'</a>';
	$user = $USER;
//	echo ' Field data 11: '.$fielddata[11];
//	echo ' Email Pre-checks...';
//	echo $level.$totalcredits; echo ':'.$fielddata[11];
	if (($level.$totalcredits == 2.8) AND ($fielddata[11] == 0)){
	//echo ' Email fired...';	
//	emailer($levelsubject, $test_URL, $user);
	
		$sql6 = "
			SELECT *
			FROM {data_records} dr
			WHERE dr.userid = $USER->id
			";
			//$coursecount = 0;
			if($records = $DB->get_records_sql($sql6)){//echo ' Logged in user has a data record!';
			$recordflag = 1;	
			foreach($records as $record){//echo ' Logged in user record ID: '.($record->id);
				
	$sql7 = "
			SELECT *
			FROM {data_content} dc
			WHERE dc.recordid = $record->id AND dc.fieldid = 15
			";
			//$coursecount = 0;
			if($contents = $DB->get_records_sql($sql7)){//echo ' Logged in user has data content!';
			$recordflag = 1;	
			foreach($contents as $content){	//echo ' Logged in user entry ID: '.$content->id;		
			
//echo 'Email sent';
	
			$contentrecord = new stdClass();
			$contentrecord->id = $content->id;
//			$contentrecord->recordid =  $record->id;
	  		$contentrecord->content = 2;
			$lastcontentupdatedid = $DB->update_record('data_content', $contentrecord, false);
			
	}
			}
			}// each record
			}// if record
	
		
	}  //echo ' Email  not sent!';
//email_to_user($user, $contact, $subject, $messagetext, $messagehtml);
	
function emailer($level, $test_URL, $user){
global $CFG, $DB, $USER;	
$br = '<br />';
$lf = $br.$br;	
$ER = "\n\n";
$EF = "\n";	
$counter = 0;
$body='';
//echo 'Emailer v1.1<br />';
	
include('SMTPconfig.php');
include('SMTPClass.php');	

//send user emails

// 			$to = 'davidjgregg@gmail.com';
			$to = $USER->email;
			$from = 'noreply@leanconstructionportal.org';
			$subject = 'Complete this test to get your certificate for '.$level;
			$body .= 'You are now recorded as approaching the next level up of the Lean Competency Framework. To make the final step to the next level, and receive the Certificate which will attest to your achievement, you need to undertake a final project and pass a final assessment (achieving at least 80%).'.$EF.$EF;
			$body .= "To go this module, click the link below, or copy and paste it in your browser and then select the 'Enrol me’ button when the page opens.".$EF.$EF;
			$body .= $test_URL.$EF.$EF;
			//$body .= 'Please note this is a temporary test URL and not the actual test.'.$EF.$EF;
			//$body .= 'If you have any questions or a technical issue, please contact martin.jones@learningconstruct.eu'.$EF;
			$body .= 'Good luck!'.$EF;
			$body .= 'Admin support'.$EF;
//			$body .= 'http://lms.rbkc.gov.uk/'.$ER;

//			$addresses = file('addresses.txt');
//			foreach($addresses as $address){
//				$to = trim($address);
//				echo'Sending an email to: '.$to.'<br />';
				$SMTPMail = new SMTPClient ($SmtpServer, $SmtpPort, $SmtpUser, $SmtpPass, $from, $to, $subject, $body);
				$SMTPChat = $SMTPMail->SendMail();	
				//echo 'Email sent!';
//			}
		}	
	

// Custom code (start)	

## Find level (start)
$leveldata = $DB->get_records_sql("select distinct level from {levelgraph_data} order by level");

$currentLevel = 1;
foreach($leveldata as $ldata){
    $level = $ldata->level;
    
    // Check level course completion
    $levelcourse_data = $DB->get_records_sql("select * from {levelgraph_data} where level=".$level);

    foreach($levelcourse_data as $lcoursedata){
        $courses = $lcoursedata->courses;
        
        // On the job courses 
        $coursecompletions = "";
        $leveljobcourse_data = $DB->get_records_sql("select * from {levelgraph_data} where fieldid=14 and level=".$level);
        foreach($leveljobcourse_data as $ljobcourse){
            $coursecompletions = $ljobcourse->courses;
           
        }
        
        
        $explode_courses = explode(",",$courses);
        $explode_coursecompletion = explode(",",$coursecompletions);
        
        // Check course completion available
        $isCourseCompletionAvailable = false;
        foreach($explode_coursecompletion as $coursecom){
            if($coursecom > 0){
                $isCourseCompletionAvailable = true;
                break;
            }
        }
        
        if($isCourseCompletionAvailable){
          
            foreach($explode_coursecompletion as $coursecom){
                if($coursecom == 0){
                    continue;
                }
                $courseObj = new stdClass();
                $courseObj->id = $coursecom;
                $cinfo = new completion_info($courseObj);
                $iscomplete = $cinfo->is_course_complete($USER->id);
                
                if(!$iscomplete){
                    break 3;
                }
            }
        }else{
            foreach($explode_courses as $course){
                $courseObj = new stdClass();
                $courseObj->id = $course;
                $cinfo = new completion_info($courseObj);
                $iscomplete = $cinfo->is_course_complete($USER->id);
                
                if(!$iscomplete){
                    break 3;
                }
            }
        }

        

    }
    $currentLevel++;
}

// Check if course 77 complete or not
$courseObj = new stdClass();
$courseObj->id = 77;
$cinfo = new completion_info($courseObj);
$iscomplete = $cinfo->is_course_complete($USER->id);
                
if($iscomplete){
    $currentLevel = 3;
}

// Initial credit
$credits = 1;
if($currentLevel > 1){
    $credits = $currentLevel;            
}
            
## Find level (end)

## data_fields data (start)
$fieldNames_arr = array();
$myleancompetency = "My lean competency";

$fieldNames_arr[1] = "'".$myleancompetency."'";

$fieldData_arr[1] = round($currentLevel,2);
$data_fieldsData = $DB->get_records_sql("select * from {data_fields} where id between 2 and 14");
foreach($data_fieldsData as $fielddata){
    $fieldname = $fielddata->name;
    
    $fieldNames_arr[$fielddata->id] = "'".$fieldname."'";
    $fieldData_arr[$fielddata->id] = $credits;
}

## data_fields data (end)

## Level Arms (start)



$levelarmData = $DB->get_records_sql("select * from {levelgraph_data} WHERE level=".$currentLevel." order by fieldid");

$totcredit = 0;

foreach($levelarmData as $larmdata){
    
    $courses = $larmdata->courses;
 //   $coursecompletion = $larmdata->coursecompletion;
    
    // Field name
    $fieldData = $DB->get_record_sql("select * from {data_fields} WHERE id=".$larmdata->fieldid);
    $fieldname = $fieldData->name;
    
    $fieldNames_arr[$larmdata->fieldid] = "'".$fieldname."'";
    
    // Courses ( Credits )
    $explode_courses = explode(",",$courses);
            
    foreach($explode_courses as $course){
        
        $competency_coursecomp = $DB->get_records_sql("select c.shortname from {competency_coursecomp} cc LEFT JOIN {competency} c ON cc.competencyid=c.id where cc.courseid=".$course);
        /*
        echo "<pre>";
        print_r($competency_coursecomp);
        echo "</pre>";
        */

        
        foreach($competency_coursecomp as $ccdata){
            
            if($currentLevel == 2){
                // $credits = 2;
            }
            
            
            if(isset($fieldData_arr[$larmdata->fieldid])){
                
                ## check completion
                $courseObj = new stdClass();
                $courseObj->id = $course;
                $cinfo = new completion_info($courseObj);
                $iscomplete = $cinfo->is_course_complete($USER->id);
                
               $larmdata->fieldid . " " .  "<br/>";
                
                if($iscomplete){
                    
                   // echo "Complete";
                    
                    $fieldData_arr[$larmdata->fieldid] = $fieldData_arr[$larmdata->fieldid] + ($ccdata->shortname*1);

                                        if ($larmdata->fieldid>1) {
                                            
                                                                            $fieldData_arr[1] = $fieldData_arr[1] + ($ccdata->shortname*1);
                                            
                                            $totcredit = $totcredit + ($ccdata->shortname*1);
                                        }
                                        
                                
                } else {
                            if ($larmdata->fieldid==14 && $fieldData_arr[1]>($currentLevel + 0.8)) {
                                    $fieldData_arr[1] = $currentLevel + 0.8;        
                            }
                }
                
                
                
            }
            
        }
        
    }
    
            // CHANGE PROFILE NEW
            $chkuserinfodata = "SELECT * FROM {user_info_data} WHERE userid=" . $USER->id . " AND fieldid=7";
            
            $chkuserinfodata_arr = $DB->get_record_sql($chkuserinfodata);
            
			$contentrecord = new stdClass();
			$contentrecord->id = $chkuserinfodata_arr->id;
			$contentrecord->userid = $USER->id;
			$contentrecord->fieldid = 7;
	  		$contentrecord->data = 'Level '.$fieldData_arr[1];
			$lastcontentupdatedid = $DB->update_record('user_info_data', $contentrecord, false);

  
}


## Level Arms (end)

## Check if credit exceed length for level2 (start)
$sendEmail = false;

$userRData = $DB->get_record_sql("select * from {data_records} WHERE userid=".$USER->id);
     
$ucd_recordid = $userRData->id;
$ucd_dataid = $userRData->dataid;

foreach($fieldData_arr as $key=>$fdata){
    
//    echo $key . " " . $fdata . "<br/>";
    
    //

$userCData = $DB->get_record_sql("select * from {data_content} WHERE recordid=".$ucd_recordid . " AND fieldid = " . $key);
     
    // print_r($userCData);
     if ($key>1) {
    $ucd_contentrecord = new stdClass();
	$ucd_contentrecord->id = $userCData->id;
  	$ucd_contentrecord->content = $fdata;
	$ucd_lastcontentupdatedid = $DB->update_record('data_content', $ucd_contentrecord, false);
     }

//print_r($ucd_contentrecord);
   
    if($currentLevel >= 2){
        $maxCredit = $currentLevel+0.8;
        
        if($fdata >= $maxCredit && $fdata < ($currentLevel+1)){
            $fieldData_arr[$key] = $maxCredit;
            $sendEmail = true;
        }

    }
}



/*
echo "<pre>";
print_r($fieldNames_arr);
echo "</pre>";
*/

//echo $totcredit .  " AGGR : " . $aggr_myleancomp;

## Check if credit exceed length for level2 (end)

$fieldData_str = implode(",",$fieldData_arr);

## Field labels (start)
$fieldlabels = implode(",",$fieldNames_arr);
## Field labels (end)


## Send email (start)
if($sendEmail){
    
    // Get completion course from "On the job"
    $test_URL = '';
    $leveljobcourse_data = $DB->get_records_sql("select * from {levelgraph_data} where fieldid=14 and level=".$currentLevel);
    $comcourses_arr = array();
    foreach($leveljobcourse_data as $ljobcourse){
        $comcourses_arr = explode(",",$ljobcourse->courses);
        
        foreach($comcourses_arr as $ccourse){
            if($ccourse == 0) continue;
            $test_URL .= 'https://leanconstructionschool.com/course/view.php?id='.$ccourse.', ';
        }
        
    }
    $test_URL = rtrim($test_URL,", ");
    
    $br = '<br />';
    $lf = $br.$br;	
    $ER = "\n\n";
    $EF = "\n";	
    $counter = 0;
    $subject = 'Complete this test to get your certificate for '.$currentLevel;
			$body = 'You are now recorded as approaching the next level up of the Lean Competency Framework. To make the final step to the next level, and receive the Certificate which will attest to your achievement, you need to undertake a final project and pass a final assessment (achieving at least 80%).'.$EF.$EF;
			$body .= "To go this module, click the link below, or copy and paste it in your browser and then select the 'Enrol me’ button when the page opens.".$EF.$EF;
			$body .= $test_URL.$EF.$EF;
			//$body .= 'Please note this is a temporary test URL and not the actual test.'.$EF.$EF;
			//$body .= 'If you have any questions or a technical issue, please contact martin.jones@learningconstruct.eu'.$EF;
			$body .= 'Good luck!'.$EF;
			$body .= 'Admin support'.$EF;

	
	####
	
	$fromUser = $DB->get_record_sql("SELECT * FROM {user} WHERE id=2");
     
    // Check email already sent or not Today
    $notification_data = $DB->get_records_sql("select DATE_FORMAT(FROM_UNIXTIME(`timecreated`), '%e-%m-%Y') AS 'timecreated' from {notifications} where subject like '%Complete this test to get your certificate for%' and component='mod_quiz' and eventtype='submission' and useridto=".$USER->id." order by id desc limit 1");
    
    $isEmailSent = false;
    foreach($notification_data as $ndata){
        $timecreated = $ndata->timecreated;
        $currentdate = date("d-m-Y");
       
        // echo "created : ".$timecreated." , current : ".$currentdate;
        
        if($timecreated == $currentdate){
            $isEmailSent = true;
        }
      
    }
	######
	if(!$isEmailSent){
	    $message = new stdClass();
        $message->component         = 'mod_quiz'; //your component name
        $message->name              = 'submission'; //this is the message name from messages.php
        $message->userfrom          = $fromUser;
        $message->userto            = $USER;
        $message->subject           = $subject;
        $message->fullmessage       = $body;
        $message->fullmessageformat = FORMAT_PLAIN;
        $message->fullmessagehtml   = '';
        $message->smallmessage      = '';
        $message->notification      = 1; //this is only set to 0 for personal messages between users
   //     message_send($message);
	}else{
	  //  echo "Message already sent";
	}
	
	######

}
## Send email (end)

?>
<body>

<?php

$htmltext = '<div style="position: relative; height:23em; width:46em; margin-top: -10em; margin-left: 0em; margin-bottom: 0em">
<canvas id="myChart"></canvas>
</div>';
?>

</body>

<?php
$htmltext .= "<script src='https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js'></script>
    <script type="text/javascript">
    var ctx = document.getElementById('myChart').getContext('2d');
    Chart.defaults.global.defaultFontFamily = 'Arial';

	var chart = new Chart(ctx, {

    type: 'radar',


   data: {
    labels: [" . $fieldlabels . "],
    datasets: [{
    	label: 'Level',
    	pointBackgroundColor: '#E85852', 
      
        data: [" . $fieldData_str . ">]
    }]
    },

    options: {
    	
    	scale: {
    		responsive: true,
    		pointLabels :{
               fontSize: 16,
               fontWeight: 'lighter',
               fontColor: '#808080',
            },
        ticks: {
            beginAtZero: true,
            max: 5
            
        }
    }
    }
});
</script>";

echo $htmltext;