<?php
require_once '../../config.php';
        global $CFG, $DB, $USER;
        require_once("{$CFG->libdir}/completionlib.php");  // Custom code






// Custom code (start)

function checkCourseCompletion($cid) {
    global $CFG, $DB, $USER;
    // ACCORDING TO MODULE COMPLETIONS
    $coursecount = 0;
    
    $sql_fetchcoursemodules = "
			SELECT cm.id, m.name
			FROM {course_modules} cm
			JOIN {modules} m ON m.id = cm.module
			WHERE cm.course = $cid AND cm.completion > 0
			";
    
    if($modules = $DB->get_records_sql($sql_fetchcoursemodules)){
        $str_completionmodules = "";
        foreach ($modules as $key_modules) {
            $str_completionmodules .= $key_modules->id . ",";
        }
    }
        
        $str_completionmodules = rtrim($str_completionmodules, ",");
        
        
    if ($str_completionmodules!="") {    
    $sql_coursecompletioncriteria = "
			SELECT * FROM {course_completion_criteria} WHERE course = $cid AND moduleinstance IN (" . $str_completionmodules . ")";
        
         //echo "<br/>$sql_coursecompletioncriteria<br/>";
        if($coursecompletioncriteria = $DB->get_records_sql($sql_coursecompletioncriteria)){
            
/*            echo "<pre>";
            print_r($coursecompletioncriteria);
            echo "</pre>"; */
            
            $modulestocomplete = count($coursecompletioncriteria);
            $str_coursecompletioncriteria = "";
            foreach ($coursecompletioncriteria as $key_coursecompletioncriteria) {
                    $str_coursecompletioncriteria .= $key_coursecompletioncriteria->moduleinstance . ",";
                }
        }
        
        $str_coursecompletioncriteria = rtrim($str_coursecompletioncriteria, ",");
        

                  $sql_userscoursemodulecompletion = "SELECT count(*) as modulescompletedbyuser FROM {course_modules_completion} cmc WHERE cmc.userid = $USER->id AND cmc.coursemoduleid in (" . $str_coursecompletioncriteria . ")  AND completionstate = 1";

                    if($arr_completions = $DB->get_record_sql($sql_userscoursemodulecompletion)){
                        $modulescompletedbyuser = $arr_completions->modulescompletedbyuser;
                    }
            
            //echo $modulestocomplete . "  " . $modulescompletedbyuser;
    
                    if ($modulestocomplete == $modulescompletedbyuser) {
                        return true;
                    } else {
                        return false;
                    }
    }

}

/*
echo $checkCourseCompletion = checkCourseCompletion(62);
echo "<br/>";
echo $checkCourseCompletion = checkCourseCompletion(53);
echo "<br/>";
echo $checkCourseCompletion = checkCourseCompletion(63);
echo "<br/>";
echo $checkCourseCompletion = checkCourseCompletion(64);
echo "<br/>";
echo $checkCourseCompletion = checkCourseCompletion(66);
echo "<br/>";
echo $checkCourseCompletion = checkCourseCompletion(65);
echo "<br/>";
echo $checkCourseCompletion = checkCourseCompletion(68);
echo "<br/>";
echo $checkCourseCompletion = checkCourseCompletion(67);
echo "<br/>";
echo $checkCourseCompletion = checkCourseCompletion(50);
exit;
*/
## Find level (start)
            $leveldata = $DB->get_records_sql("select distinct level from {levelgraph_data} order by level");

                $chkuserinfodata = "SELECT * FROM {user_info_data} WHERE userid=" . $USER->id . " AND fieldid=7";

                $chkuserinfodata_arr = $DB->get_record_sql($chkuserinfodata);

                $level_pieces = explode(" ",$chkuserinfodata_arr->data);
                    $currentLevel = $level_pieces[1];
                    
                    //echo "CL = " . $currentLevel; 

                if ($currentLevel==0 || $currentLevel=="") {
                    $currentLevel = 1;
                }
                
                
            // Check whether $USER->id has a entry data_records else set $currentLevel

            $chkUserHasEntry ="
            SELECT *
            FROM {data_records} dr
            ";
            if($hasrecords = $DB->get_records_sql($chkUserHasEntry)){
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

                $sql_getfieldid ="
            SELECT *
            FROM {data_records} dr2
            WHERE $USER->id = dr2.userid
            ";
                if($hasrecords2 = $DB->get_records_sql($sql_getfieldid)){
                    foreach($hasrecords2 AS $hasrecord2)
                        $lastinsertid = $hasrecord2->id;

                }

//          echo $lastinsertid.':: ';
                $sql_alldatafields ="
            SELECT *
            FROM {data_fields} df
            ";
                if($datafields = $DB->get_records_sql($sql_alldatafields)){
                    foreach($datafields AS $datafield){
                        $fieldcount ++;
//          echo $datafield->id.':';
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
                            $contentrecord->content = $currentlevel;
                            $contentrecord->content1 = NULL;
                            $contentrecord->content2 = NULL;
                            $contentrecord->content3 = NULL;
                            $contentrecord->content4 = NULL;
                            $lastcontentinsertid = $DB->insert_record('data_content', $contentrecord, false);
                        }

                    }// each datafield
                }// datafields
            }// write both                
                

            //LEVELWISE COMPLETION ARM 
            $sql_completionarm = 'SELECT id AS datafieldid FROM {data_fields} WHERE name = "On the job"';

            if($arr_completionarm = $DB->get_record_sql($sql_completionarm)){
                $datafieldid = $arr_completionarm->datafieldid;
            }



            

            // LEVEL - 1
            $arr_compcourseids = array();
            $str_compcourseids = "";
            $sql_level1completioncourse = 'SELECT courses FROM  {levelgraph_data} WHERE level = 1';
            if($arr_level1completioncourse = $DB->get_record_sql($sql_level1completioncourse)){
                $level1completioncourseid = $arr_level1completioncourse->courses;
                $arr_compcourseids[$level1completioncourseid] = 1;
                $str_compcourseids .= $level1completioncourseid;
            }

            
            // LEVEL - 2 AND ABOVE
            $sql_levelcompletioncourse = 'SELECT * FROM  {levelgraph_data} WHERE fieldid = ' . $datafieldid;
            
            if($arr_levelcompletioncourse = $DB->get_records_sql($sql_levelcompletioncourse)){
                foreach ($arr_levelcompletioncourse as $key_levelcompletioncourse) {
                    $arr_compcourseids[$key_levelcompletioncourse->courses] = $key_levelcompletioncourse->level;
                        $str_compcourseids .= "," . $key_levelcompletioncourse->courses;
                }
            }
/*
            echo "<pre>";
            print_r($arr_compcourseids);
            echo "</pre>";
             */   
            $sql_userenrolments = "
			SELECT *
			FROM {user_enrolments} ue
			JOIN {enrol} e ON ue.enrolid = e.id
			
			WHERE ue.userid = $USER->id
			ORDER BY e.courseid";

            // User enrolments with ' No courses' case
            if($enrolments = $DB->get_records_sql($sql_userenrolments)){
                
                foreach($enrolments as $enrol){
                    
                    $sql_coursesenroled = "SELECT * FROM {course} c WHERE c.id = $enrol->courseid AND c.visible = 1 AND c.id in (" . $str_compcourseids . ")";
                    //$coursecount = 0;
                    if($courses = $DB->get_records_sql($sql_coursesenroled)){
                        
                        foreach ($courses as $key_courses) {
                            // echo "<br/>" . $key_courses->id . " " . $key_courses->idnumber . " " . $key_courses->shortname . " " . $key_courses->fullname . "<br/>";
                            
                            

                            $courseObj = new stdClass();
                            $courseObj->id = $key_courses->id;
                            $cinfo = new completion_info($courseObj);
                            //$iscomplete = $cinfo->is_course_complete($USER->id);

                            $iscomplete = checkCourseCompletion($key_courses->id);

                            if($iscomplete){
                                $lastcourseidcompleted = $key_courses->id;
                            }
                        
                
                //$currentLevel++;
            
                            
                        }
                        
                    }
                                    
                }
                
                
            }
            
                if ($currentLevel < $arr_compcourseids[$lastcourseidcompleted] + 1) { 
                $currentLevel = $arr_compcourseids[$lastcourseidcompleted] + 1;
                }
                

            foreach($leveldata as $ldata){
                $level = $ldata->level;

                // Check level course completion
                $levelcourse_data = $DB->get_records_sql("select * from {levelgraph_data} where level=".$level);


                foreach($levelcourse_data as $lcoursedata){
                    $courses = $lcoursedata->courses;

                    // On the job courses
                    $coursecompletions = "";
                    $leveljobcourse_data = $DB->get_records_sql("select * from {levelgraph_data} where fieldid=" . $datafieldid . " and level=".$level);
                    

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
                            //$iscomplete = $cinfo->is_course_complete($USER->id);

                            $iscomplete = checkCourseCompletion($coursecom);

                            if(!$iscomplete){
                                break 3;
                            }
                        }
                    }else{
                        foreach($explode_courses as $course){
                            $courseObj = new stdClass();
                            $courseObj->id = $course;
                            $cinfo = new completion_info($courseObj);
                            //$iscomplete = $cinfo->is_course_complete($USER->id);

                            $iscomplete = checkCourseCompletion($course);

                            if(!$iscomplete){
                                break 3;
                            }
                        }
                    }



                }
                //$currentLevel++;
            }

// Check if course 77 complete or not
/*
            $courseObj = new stdClass();
            $courseObj->id = 50;
            $cinfo = new completion_info($courseObj);
            $iscomplete = $cinfo->is_course_complete($USER->id);


            if($iscomplete){
                $currentLevel = 3;
                $compmod = true;
            } else {
                $currentLevel = 2.8;
                $compmod = false;
            }
*/
// Initial credit
            $credits = 1;
            if($currentLevel > 1){
                $credits = floor($currentLevel);            // WLK
            }
            


## Find level (end)

## data_fields data (start)
            $fieldNames_arr = array();
            $myleancompetency = "My lean competency";

            $fieldNames_arr[1] = "'".$myleancompetency."'";

           //$fieldData_arr[1] = round($currentLevel,2);
           $fieldData_arr[1] = $credits;
           
            // echo $currentLevel . " // " . $fieldData_arr[1];
            
                    ## Add to cohort if $currentLevel.8
                    if ($fieldData_arr[1]==2) {
                        
                    ## check completion
                            $courseObjL1 = new stdClass();
                            $courseObjL1->id = $course;
                            $cinfoL1 = new completion_info($courseObjL1);
                            //$iscompleteL1 = $cinfoL1->is_course_complete($USER->id);
                            $iscompleteL1 = checkCourseCompletion($course);
                        
                    if ($iscompleteL1) {
                    $sqlcohortdata = "select * from {cohort} WHERE name='Level ". floor($fieldData_arr[1]) . "'";
                    
                                                       
                    $getcohort_data = $DB->get_record_sql($sqlcohortdata);

                        $cohortid = $getcohort_data->id;
                        
                        $ctnuserincohort = 0;
                        
                        $sqluserincohort = "select count(*)  as ctnuserincohort from {cohort_members} WHERE cohortid=". $cohortid ." && userid=" . $USER->id;

                        $chkuserincohort = $DB->get_record_sql($sqluserincohort);
                        
                        $ctnuserincohort = $chkuserincohort->ctnuserincohort;
                        
                        if ($ctnuserincohort==0) {
                        
                        //INSERT new datarecord
                        $cohortdata = new stdClass();
                        $cohortdata->cohortid = $cohortid;
                        $cohortdata->userid = $USER->id;
                        $cohortdata->timeadded = time();
                        
                        
                        $lastinsertid = $DB->insert_record('cohort_members', $cohortdata, true);

                        }
                    }
                    }
                    

            $data_fieldsData = $DB->get_records_sql("select * from {data_fields} where id between 2 and " . $datafieldid);

            foreach($data_fieldsData as $fielddata){
                $fieldname = $fielddata->name;

                $fieldNames_arr[$fielddata->id] = "'".$fieldname."'";
                $fieldData_arr[$fielddata->id] = $credits;
            }


## data_fields data (end)

## Level Arms (start)


            $levelarmData = $DB->get_records_sql("select * from {levelgraph_data} WHERE level=".floor($currentLevel)." order by fieldid");
            
            //print_r($levelarmData);

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
                            //$iscomplete = $cinfo->is_course_complete($USER->id);
                            $iscomplete = checkCourseCompletion($course);

                            $larmdata->fieldid . " " .  "<br/>";

                            if($iscomplete){

                                // echo "Complete";

                                $fieldData_arr[$larmdata->fieldid] = $fieldData_arr[$larmdata->fieldid] + ($ccdata->shortname*1);

                                if ($larmdata->fieldid>1) {

                                    
                                    $fieldData_arr[1] = $fieldData_arr[1] + ($ccdata->shortname*1);

                                    $totcredit = $totcredit + ($ccdata->shortname*1);
                                    
                                    if ($totcredit + ($ccdata->shortname*1) > floor($currentLevel) + 0.8) {
                                        $fieldData_arr[1] = floor($currentLevel) + 0.8;
                                    }
                                    if ($fieldData_arr[1]==1.8) {
                                        $fieldData_arr[1] = 1;
                                    } 
                                }


                            } else {
                                if ($larmdata->fieldid==$datafieldid && $fieldData_arr[1]>(floor($currentLevel) + 0.8)) {
                                    $fieldData_arr[1] = floor($currentLevel) + 0.8;
                                    
                                    
                    ## Add to cohort if $currentLevel.8
                    $sqlcohortdata = "select * from {cohort} WHERE name='Level ". $fieldData_arr[1] . "'";
                    
                                                       
                    $getcohort_data = $DB->get_record_sql($sqlcohortdata);

                        $cohortid = $getcohort_data->id;
                        
                        $ctnuserincohort = 0;
                        
                        $sqluserincohort = "select count(*)  as ctnuserincohort from {cohort_members} WHERE cohortid=". $cohortid ." && userid=" . $USER->id;

                        $chkuserincohort = $DB->get_record_sql($sqluserincohort);
                        
                        $ctnuserincohort = $chkuserincohort->ctnuserincohort;
                        
                        if ($ctnuserincohort==0) {
                        
                        //INSERT new datarecord
                        $cohortdata = new stdClass();
                        $cohortdata->cohortid = $cohortid;
                        $cohortdata->userid = $USER->id;
                        $cohortdata->timeadded = time();
                        
                        
                        $lastinsertid = $DB->insert_record('cohort_members', $cohortdata, true);

                        }
                                    
                                    
                                }
                            }



                        }

                    }
                    
                    //$currentLevel = $currentLevel + $totcredit;
                    
                }

                // CHANGE PROFILE NEW
                $chkuserinfodata = "SELECT * FROM {user_info_data} WHERE userid=" . $USER->id . " AND fieldid=7";

                $chkuserinfodata_arr = $DB->get_record_sql($chkuserinfodata);

                $level_pieces = explode(" ",$chkuserinfodata_arr->data);
                $currlevel = $level_pieces[1];
                /*
                echo "<pre>";
                print_r($fieldData_arr);
                echo "</pre>";
                */
                // ($currlevel < $fieldData_arr[1]) {

                $contentrecord = new stdClass();
                $contentrecord->id = $chkuserinfodata_arr->id;
                $contentrecord->userid = $USER->id;
                $contentrecord->fieldid = 7;
                $contentrecord->data = 'Level '.$fieldData_arr[1];
                $lastcontentupdatedid = $DB->update_record('user_info_data', $contentrecord, false);

                //}
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

                $userCData = $DB->get_records_sql("select * from {data_content} WHERE recordid=".$ucd_recordid . " AND fieldid = " . $key);

                // print_r($userCData);
                if ($key>1) {

                    foreach($userCData as $userc){
                        $ucd_contentrecord = new stdClass();
                        $ucd_contentrecord->id = $userc->id;
                        $ucd_contentrecord->content = $fdata;
                           
                        $ucd_lastcontentupdatedid = $DB->update_record('data_content', $ucd_contentrecord, false);
                    } 
                    
                }

//print_r($ucd_contentrecord);
//echo $currentLevel . "<br/>";
                if($currentLevel >= 2){
                    $maxCredit = floor($currentLevel)+0.8;

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
            $fieldlabels = str_replace(" and ", " and ", $fieldlabels);
## Field labels (end)


## Send email (start)

            if($sendEmail){

                // Get completion course from "On the job"
                $test_URL = '';
                $leveljobcourse_data = $DB->get_records_sql("select * from {levelgraph_data} where fieldid=" . $datafieldid . " and level=".$currentLevel);
                $comcourses_arr = array();
                foreach($leveljobcourse_data as $ljobcourse){
                    $comcourses_arr = explode(",",$ljobcourse->courses);

                    foreach($comcourses_arr as $ccourse){
                        if($ccourse == 0) continue;
//                        $test_URL .= 'https://leanconstructionschool.com/course/view.php?id='.$ccourse.', ';
                          $CFG->wwwroot . '/course/view.php?id='.$ccourse;

                    }

                }
                $test_URL = rtrim($test_URL,", ");

                $br = '<br />';
                $lf = $br.$br;
                $ER = "\n\n";
                $EF = "\n";
                $counter = 0;
                
                $subject = get_string('emailsubject', 'block_spidergram') .$level;
                $body .= get_string('emailpara1', 'block_spidergram').$EF.$EF;
                $body .= get_string('emailpara2', 'block_spidergram').$EF.$EF;
                $body .= $test_URL.$EF.$EF;
                //$body .= 'Please note this is a temporary test URL and not the actual test.'.$EF.$EF;
                //$body .= 'If you have any questions or a technical issue, please contact martin.jones@learningconstruct.eu'.$EF;
                $body .= get_string('goodluck', 'block_spidergram').$EF;
                $body .= get_string('emailsign', 'block_spidergram').$EF;
                
            
                ####

                $fromUser = $DB->get_record_sql("SELECT * FROM {user} WHERE id=2");

                // Check email already sent or not Today
          
                $sql_usersdatarecords = "SELECT * FROM {data_records} udr WHERE udr.userid = $USER->id";

                $isEmailSent = true;
                
                $arr_recordid = $DB->get_record_sql($sql_usersdatarecords);
                
                if ($arr_recordid) {
                $recordid = $arr_recordid->id;
                }
                
                $sql_emailsentfieldid = "SELECT * FROM {data_fields} WHERE name = 'Email sent'";
                
                $arr_emailsentfieldid = $DB->get_record_sql($sql_emailsentfieldid);
                
                $emailsentfieldid = $arr_emailsentfieldid->id;

                $sql_usersdatacontent = "SELECT * FROM {data_content} dc WHERE dc.recordid = $recordid AND dc.fieldid = " . $emailsentfieldid;
                
                $arr_usersdatacontent = $DB->get_record_sql($sql_usersdatacontent);
                /*
                echo "<pre>";
                print_r($arr_usersdatacontent);
                echo "</pre>";
                */
                if ($arr_usersdatacontent) {
                    
                      $sql_usersdatacontentcountcurrent = "SELECT * FROM {data_content} dc WHERE dc.recordid = $recordid AND dc.fieldid = " . $emailsentfieldid . " AND content=" . $currentLevel;
                     
                        $usersdatacontentcountcurrent = $DB->get_record_sql($sql_usersdatacontentcountcurrent);
                        
                        if ($usersdatacontentcountcurrent) {
                            $isEmailSent = true;
                        } else {
                            
                                $sql_usersdatacontentcurrent = "SELECT * FROM {data_content} dc WHERE dc.recordid = $recordid AND dc.fieldid = " . $emailsentfieldid;
                                $usersdatacontentcurrent = $DB->get_record_sql($sql_usersdatacontentcurrent);
                            
                                $contentrecord = new stdClass();
                                $contentrecord->id = $usersdatacontentcurrent->id;
                                $contentrecord->content = $currentLevel;
                                $lastcontentupdatedid = $DB->update_record('data_content', $contentrecord, false);
                                $isEmailSent = false;
                        }
                    
                }
                
//exit;
                
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
                    $message->notification      = '1'; //this is only set to 0 for personal messages between users
                         message_send($message);
                }else{
                    //  echo "Message already sent";
                }

                ######

            }
## Send email (end)

            $htmltext = '<a href="javascript:void(window.open(\'https://lean.learningconstruct.uk/pages/spider.html\', \'Find out more\', \'width=1450em,height=700em\'));" >
                <button class="button">
                <span class="button--inner">Find out more</span>
                </button>
                </a>';
            $htmltext .= '<div style="position: relative; height:450px; width:900px; margin-left:-70px">
<canvas id="myChart" style="width:900px; height:450px; position:absolute;"></canvas>
</div>';
    
                $htmltext .= "<script src='https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js'></script>
    <script type='text/javascript'>
    
    var ctx = document.getElementById('myChart').getContext('2d');
    Chart.defaults.global.defaultFontFamily = 'Arial';

    var chart = new Chart(ctx, {

    type: 'radar',


   data: {
    labels: [" . $fieldlabels . "],
    datasets: [{
        label: '',
        pointBackgroundColor: '#E85852', 
      
        data: [" . $fieldData_str . "]
    }]
    },

    options: {
    legend: {
            display: false,
    },

        scale: {
            responsive: true,
            aspectRatio: 2,
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

