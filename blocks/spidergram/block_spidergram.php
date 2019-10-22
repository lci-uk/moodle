<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Block Spidergram is defined here.
 *
 * @package     block_spidergram
 * @copyright   2019 Shubhendra Doiphode, doiphode.sunny@gmail.com
 * @license     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */


class block_spidergram extends block_base {

    /**
     * Initializes class member variables.
     */
    public function init() {
        // Needed by Moodle to differentiate between blocks.
        $this->title = get_string('plugintitle', 'block_spidergram');
    }

    /**
     * Returns the block contents.
     *
     * @return stdClass The block contents.
     */
    public function get_content() {
        global $CFG, $DB, $USER;
        require_once("{$CFG->libdir}/completionlib.php");  // Custom code
        error_reporting(0);
        if ($this->content !== null) {
            return $this->content;
        }

        if (empty($this->instance)) {
            $this->content = '';
            return $this->content;
        }

        $this->content = new stdClass();
        $this->content->items = array();
        $this->content->icons = array();
        $this->content->footer = '';

        if (!empty($this->config->text)) {
            $this->content->text = $this->config->text;
        } else {




// Custom code (start)
if ($USER->id>1) {
// FETCH DATA ID 
$sql_dataid ="SELECT id FROM {data} WHERE name='Spider updates'";

if($arr_dataid = $DB->get_record_sql($sql_dataid)){
    $dataid = $arr_dataid->id;
} else {
    $dataid = 0;
}

// FETCH FIELD IDs
$fldids ="";
$sql_fldids ="SELECT id FROM {data_fields} WHERE dataid=" . $dataid . " AND name NOT IN ('Date','Email sent')";

if($arr_fldids = $DB->get_records_sql($sql_fldids)){
    foreach($arr_fldids as $key_fldids) {
        $fldids .= $key_fldids->id . ",";
    }

    $fldids = rtrim($fldids,",");
} 


// FETCH DATA ID 
$sql_dataid ="SELECT id FROM {data} WHERE name='Spider updates'";

if($arr_dataid = $DB->get_record_sql($sql_dataid)){
    $dataid = $arr_dataid->id;
} else {
    $dataid = 0;
}

// FETCH MyLeanCompetency FIELD ID 
$sql_mlcid ="SELECT id FROM {user_info_field} WHERE shortname='MyLeanCompetency'";

if($arr_mlcid = $DB->get_record_sql($sql_mlcid)){
    $mlcid = $arr_mlcid->id;
} else {
    $mlcid = 0;
}

// FETCH Initial Level
$sql_inilevelid ="SELECT id FROM {user_info_field} WHERE shortname='InitialLevel'";

if($arr_inilevelid = $DB->get_record_sql($sql_inilevelid)){
    $inilevelid = $arr_inilevelid->id;
}
//Fetch Users Initial Level
$sql_usersinilevel ="SELECT data FROM {user_info_data} WHERE fieldid=" . $inilevelid . " AND userid=" . $USER->id;

if($arr_usersinilevel = $DB->get_record_sql($sql_usersinilevel)){
    $inilevel = $arr_usersinilevel->data;
} else {
    $inilevel = "Level 1";
    $contentrecordi = new stdClass();
    $contentrecordi->userid = $USER->id;
    $contentrecordi->fieldid = $inilevelid;
    $contentrecordi->data = $inilevel;
    $lastcontentiupdatedid = $DB->insert_record('user_info_data', $contentrecordi, false);
    
    
    $sqlcohortdata = "select * from {cohort} WHERE name='Level 1'";
    
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

$pieces_inilevel = explode(" ", $inilevel);

$initiallevel = $pieces_inilevel[1];


// FETCH Company FIELD ID 
$sql_companyid ="SELECT id FROM {user_info_field} WHERE shortname='Company'";

if($arr_companyid = $DB->get_record_sql($sql_companyid)){
    $companyid = $arr_companyid->id;
} else {
    $companyid = 0;
}

// CHECK WHETHER USER HAS Company FIELD CREATED OR NOT
$sql_chkcompany ="SELECT * FROM {user_info_data} WHERE fieldid=" . $companyid . " AND userid=" . $USER->id;
if($arr_chkcompany = $DB->get_record_sql($sql_chkcompany)){
    $company = $arr_chkcompany->data;
} else {
    $company = "";
}

if ($company=="") {
    $contentrecord0 = new stdClass();
    $contentrecord0->userid = $USER->id;
    $contentrecord0->fieldid = $companyid;
    $contentrecord0->data = "None";
    $lastcontent0updatedid = $DB->insert_record('user_info_data', $contentrecord0, false);
}


$lastcourseidcompleted = 0;



if ($dataid>0) {    


function checkCourseCompletion($cid) {
    global $CFG, $DB, $USER;
    // ACCORDING TO MODULE COMPLETIONS
    $coursecount = 0;
    $str_completionmodules = "";
    $sql_fetchcoursemodules = "
			SELECT cm.id, m.name
			FROM {course_modules} cm
			JOIN {modules} m ON m.id = cm.module
			WHERE cm.course = $cid AND cm.completion > 0
			";
			
			//echo $sql_fetchcoursemodules . "<br/> ";
    
    if($modules = $DB->get_records_sql($sql_fetchcoursemodules)){
        $str_completionmodules = "";
        foreach ($modules as $key_modules) {
            $str_completionmodules .= $key_modules->id . ",";
        }
    }
        
        $str_completionmodules = rtrim($str_completionmodules, ",");
        
        //echo $cid . " " .  $str_completionmodules . "<br/>";
        
    if ($str_completionmodules!="") {    
    $sql_coursecompletioncriteria = "
			SELECT * FROM {course_completion_criteria} WHERE course = $cid AND moduleinstance IN (" . $str_completionmodules . ")";
        
         //echo "<br/>$sql_coursecompletioncriteria<br/>";
         $str_coursecompletioncriteria = "0,";
         $modulestocomplete = 0;
        if($coursecompletioncriteria = $DB->get_records_sql($sql_coursecompletioncriteria)){
            
/*            echo "<pre>";
            print_r($coursecompletioncriteria);
            echo "</pre>"; */
            
            $modulestocomplete = count($coursecompletioncriteria);

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

                    if ($modulestocomplete == $modulescompletedbyuser && $modulestocomplete!=0) {
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

                $chkuserinfodata = "SELECT * FROM {user_info_data} WHERE userid=" . $USER->id . " AND fieldid=" . $mlcid;

                $chkuserinfodata_arr = $DB->get_record_sql($chkuserinfodata);

                $level_pieces = explode(" ",$chkuserinfodata_arr->data);
                
                if ($level_pieces[0]=="<p>None</p>") {
                    $currentLevel = 1;
                } else {
                    $currentLevel = $level_pieces[1];
                }
                
                    
//                    echo "CL = " . $currentLevel; 

                if ($currentLevel==0 || $currentLevel=="") {
                    $currentLevel = 1;
                }
                
                
            // Check whether $USER->id has a entry data_records else set $currentLevel

            $chkUserHasEntry ="
            SELECT *
            FROM {data_records} dr
            WHERE dataid=" . $dataid;
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
                $datarecord->dataid = $dataid;
                $datarecord->timecreated = time();
                $datarecord->timemodified = time();
                $datarecord->approved = 1;
                $lastdatainsertid = $DB->insert_record('data_records', $datarecord, false);

                // get field id from data_records

                $sql_getfieldid ="
            SELECT *
            FROM {data_records} dr2
            WHERE $USER->id = dr2.userid AND dataid = " . $dataid;
                if($hasrecords2 = $DB->get_records_sql($sql_getfieldid)){
                    foreach($hasrecords2 AS $hasrecord2)
                        $lastinsertid = $hasrecord2->id;

                }

//          echo $lastinsertid.':: ';
                $sql_alldatafields ="
            SELECT *
            FROM {data_fields} df WHERE dataid=" . $dataid;
                if($datafields = $DB->get_records_sql($sql_alldatafields)){
                    foreach($datafields AS $datafield){
                        $fieldcount ++;
//          echo $datafield->id.':';
                        $contentrecord = new stdClass();
                        $contentrecord->fieldid = $datafield->id;
                        $contentrecord->recordid = $lastinsertid;
                        //echo 'New content!';
//                        if($fieldcount == 1){
                        if($datafield->name == "Date"){
                            $contentrecord->content = time();
                            $contentrecord->content1 = NULL;
                            $contentrecord->content2 = NULL;
                            $contentrecord->content3 = NULL;
                            $contentrecord->content4 = NULL;
                            $lastcontentinsertid = $DB->insert_record('data_content', $contentrecord, false);
                        }
//                        elseif ($fieldcount == 11)    {
                        if($datafield->name == "Email sent"){
                            $contentrecord->content = 0;
                            $contentrecord->content1 = NULL;
                            $contentrecord->content2 = NULL;
                            $contentrecord->content3 = NULL;
                            $contentrecord->content4 = NULL;
                            $lastcontentinsertid = $DB->insert_record('data_content', $contentrecord, false);
                        }

//                        else{
                        if($datafield->name != "Date" && $datafield->name != "Email sent"){
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
            $sql_completionarm = 'SELECT id AS datafieldid FROM {data_fields} WHERE name = "On the job" AND dataid=' . $dataid;
//echo $sql_completionarm;
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

            
            // LEVEL - 2
            $sql_levelcompletioncourse = 'SELECT * FROM  {levelgraph_data} WHERE fieldid = ' . $datafieldid . ' AND level=2';
            
            if($arr_levelcompletioncourse = $DB->get_records_sql($sql_levelcompletioncourse)){
                foreach ($arr_levelcompletioncourse as $key_levelcompletioncourse) {
                    $arr_compcourseids[$key_levelcompletioncourse->courses] = $key_levelcompletioncourse->level;
                        $str_compcourseids .= "," . $key_levelcompletioncourse->courses;
                }
            }

echo "<div style='display:none;'>";
            echo "<pre>";
            print_r($arr_compcourseids);
            echo "</pre>";
            echo "</div>";
                
             //echo $str_compcourseids;
             
            $sql_userenrolments = "
			SELECT *
			FROM {user_enrolments} ue
			JOIN {enrol} e ON ue.enrolid = e.id
			
			WHERE ue.userid = $USER->id
			ORDER BY e.courseid";

            // User enrolments with ' No courses' case
            if($enrolments = $DB->get_records_sql($sql_userenrolments)){
                
                foreach($enrolments as $enrol){
                
                    //$sql_coursesenroled = "SELECT * FROM {course} c WHERE c.id = $enrol->courseid AND c.visible = 1 AND c.id in (" . $str_compcourseids . ")";
                    
                    $sql_coursesenroled = "SELECT * FROM {course} c WHERE c.id = $enrol->courseid AND c.visible = 1";
                    
                    //$coursecount = 0;
                    //echo $sql_coursesenroled . "<br/>";
                    
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
            
echo "<div style='display:none;'>xx" . $lastcourseidcompleted . "</div>";
            
            if (strpos($lastcourseidcompleted, ",")>0) {
                $pieces_lastcourseidcompleted = explode(",", $lastcourseidcompleted);
                
                        echo "<div style='display:none;'>xx" . $pieces_lastcourseidcompleted[1] . "</div>";
                
            }
            
            

            if ($lastcourseidcompleted!=0) {
                if ($currentLevel < $arr_compcourseids[$lastcourseidcompleted] + 1) { 
                $currentLevel = $arr_compcourseids[$lastcourseidcompleted] + 1;
                }
                
            } else {
                $currentLevel = 1;
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

//                    print_r($explode_coursecompletion);
                    $reqcoursecom = count($explode_coursecompletion);
                    $totcoursecom = 0;
                    foreach($explode_coursecompletion as $coursecom){
                        //echo $coursecom;
                        if($coursecom > 0){
                            $isCourseCompletionAvailable = true;
//                            break;
                        }
                    
                    if($isCourseCompletionAvailable){
                        
                        //echo $reqcoursecom . " ";

                            if($coursecom == 0){
                                continue;
                            }
                            $courseObj = new stdClass();
                            $courseObj->id = $coursecom;
                            $cinfo = new completion_info($courseObj);

                            $iscomplete = checkCourseCompletion($coursecom);

                            if ($iscomplete) {
                                $totcoursecom++;
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
//echo "y " . $totcoursecom . " " . $reqcoursecom . " / ";
                        if ($totcoursecom==$reqcoursecom) {
                            $levCourseCom = $level;
                            //$currentLevel = $level;
                        } 
                       // echo $totcoursecom . " " . $reqcoursecom .  " " . $level . " / ";

                }
                //$currentLevel++;
            }

                    echo "<div style='display:none'><pre>";
print_r($currentLevel);
echo "</pre></div>";


            $sql_l2completionmodule = "SELECT id from {course} WHERE shortname= 'L2CompletionModule'";

            if($arr_l2completionmodule = $DB->get_record_sql($sql_l2completionmodule)){
                $l2cm = $arr_l2completionmodule->id;
            }
            
            $l2iscomplete = checkCourseCompletion($l2cm);
            
            if ($l2iscomplete) {
                $currentLevel=3;
            }


// Check if course 77 complete or not

//L3Diagnostic

            $sql_l3diagnostic = "SELECT id from {course} WHERE shortname= 'L3Diagnostic'";

            if($arr_l3diagnostic = $DB->get_record_sql($sql_l3diagnostic)){
                $l3d = $arr_l3diagnostic->id;
            }

            $iscompleteL3 = checkCourseCompletion($l3d);
//echo " .. " . $iscompleteL3;
            if($iscompleteL3){
                $currentLevel = 3;
                $compmod = true;
                
                
                $chkuserinfodata = "SELECT * FROM {user_info_data} WHERE userid=" . $USER->id . " AND fieldid=" . $mlcid;

                $chkuserinfodata_arr = $DB->get_record_sql($chkuserinfodata);
                
                $contentrecord = new stdClass();
                $contentrecord->id = $chkuserinfodata_arr->id;
                $contentrecord->userid = $USER->id;
                $contentrecord->fieldid = $mlcid;
                $contentrecord->data = 'Level 3';
                $lastcontentupdatedid = $DB->update_record('user_info_data', $contentrecord, false);
                
            } 
//            else {
//                $currentLevel = 2.8;
//                $compmod = false;
//            }

// Initial credit
            $credits = 1;
            if($currentLevel > 1){
                $credits = floor($currentLevel);            // WLK
            }
            if ($initiallevel>$currentLevel) {
                $credits = $initiallevel;
            }

## Find level (end)

## data_fields data (start)
            $fieldNames_arr = array();
            $myleancompetency = "My lean competency";

            $fieldNames_arr[1] = "'".$myleancompetency."'";

           //$fieldData_arr[1] = round($currentLevel,2);
           $fieldData_arr[1] = $credits;
           
           //echo $fieldData_arr[1];
           
             //echo $currentLevel . " // " . $fieldData_arr[1] . "<br/>";
            
                    ## Add to cohort if $currentLevel.8
                    if ($fieldData_arr[1]==2) {
                        
                    ## check completion
                            $courseObjL1 = new stdClass();
                            $courseObjL1->id = $course;
                            $cinfoL1 = new completion_info($courseObjL1);
                            //$iscompleteL1 = $cinfoL1->is_course_complete($USER->id);
                            $iscompleteL1 = checkCourseCompletion($course);
                        //echo $iscompleteL1;
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
                    

             $data_fieldsData = $DB->get_records_sql("select * from {data_fields} where dataid=" . $dataid . " AND id in (" . $fldids . ")");
//print_r($data_fieldsData);
//            $data_fieldsData = $DB->get_records_sql("select * from {data_fields} where id between 2 and " . $datafieldid);

            foreach($data_fieldsData as $fielddata){
                $fieldname = $fielddata->name;

                $fieldNames_arr[$fielddata->id] = "'".$fieldname."'";
                $fieldData_arr[$fielddata->id] = $credits;
            }


## data_fields data (end)

## Level Arms (start)

            $levelarmData = $DB->get_records_sql("select * from {levelgraph_data} WHERE level=".floor($currentLevel)." order by fieldid");
            
//            print_r($levelarmData);

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

                            echo "<div style='display:none;'>" . $fieldData_arr[$larmdata->fieldid] . "</div>";
                            
                        if(isset($fieldData_arr[$larmdata->fieldid])){


                            ## check completion
                            $courseObj = new stdClass();
                            $courseObj->id = $course;
                            $cinfo = new completion_info($courseObj);
                            //$iscomplete = $cinfo->is_course_complete($USER->id);
                            $iscomplete = checkCourseCompletion($course);

                            //$larmdata->fieldid . " " .  "<br/>";
                            

                            
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


                            } 
                            
//                            else {
                                
                                if ($larmdata->fieldid==$datafieldid && $fieldData_arr[1]>(floor($currentLevel) + 0.8)) {
//                                if ($larmdata->fieldid==$datafieldid && $fieldData_arr[1]>(floor($currentLevel) + 1)) {
                                    

                                    $fieldData_arr[1] = floor($currentLevel) + 1;
                                    $point8cohort = floor($currentLevel) + 0.8;
                                    //$fieldData_arr[1] = floor($currentLevel) + 0.8;
                                    
                                    
                    ## Add to cohort if $currentLevel.8
                    $sqlcohortdata = "select * from {cohort} WHERE name='Level ". $point8cohort . "'";
                    //echo $sqlcohortdata . " ";
                                                       
                    $getcohort_data = $DB->get_record_sql($sqlcohortdata);

                        $cohortid = $getcohort_data->id;

                        $ctnuserincohort = 0;
                        
                        if ($cohortid!="") {
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
//                            }



                        }

                    }
                    
                    //$currentLevel = $currentLevel + $totcredit;
                    
                }

                // CHANGE PROFILE NEW
                 $chkuserinfodata = "SELECT * FROM {user_info_data} WHERE userid=" . $USER->id . " AND fieldid=" . $mlcid;
                $chkuserinfodata_arr = $DB->get_record_sql($chkuserinfodata);

                $level_pieces = explode(" ",$chkuserinfodata_arr->data);
                if (count($level_pieces)>0) {
                $currlevel = $level_pieces[1];
                } else {
                    $currlevel = 1;
                }
                /*
                echo "<pre>";
                print_r($chkuserinfodata_arr);
                echo "</pre>";
                exit;*/
//echo $currentLevel . " " . $fieldData_arr[1] . " // " ;
                // ($currlevel < $fieldData_arr[1]) {
                if ($chkuserinfodata_arr->id) {
                $contentrecord = new stdClass();
                $contentrecord->id = $chkuserinfodata_arr->id;
                $contentrecord->userid = $USER->id;
                $contentrecord->fieldid = $mlcid;
                $contentrecord->data = 'Level '.$fieldData_arr[1];
                $lastcontentupdatedid = $DB->update_record('user_info_data', $contentrecord, false);
                } else {
                    

                $contentrecord = new stdClass();
                $contentrecord->userid = $USER->id;
                $contentrecord->fieldid = $mlcid;
                $contentrecord->data = $inilevel;
                $lastcontentupdatedid = $DB->insert_record('user_info_data', $contentrecord, false);
                }
                //}
            }


## Level Arms (end)

## Check if credit exceed length for level2 (start)
            $sendEmail = false;

            $userRData = $DB->get_record_sql("select * from {data_records} WHERE userid=".$USER->id . " AND dataid=" . $dataid);

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

                // CHANGE PROFILE CHECK BETWEEN 
                 $chkuserinfodata = "SELECT * FROM {user_info_data} WHERE userid=" . $USER->id . " AND fieldid=" . $mlcid;
                $chkuserinfodata_arr = $DB->get_record_sql($chkuserinfodata);

                $level_pieces = explode(" ",$chkuserinfodata_arr->data);
                if (count($level_pieces)>0) {
                $currlevel = $level_pieces[1];
                } else {
                    $currlevel = 1;
                }
//echo " * " . $currentLevel . " - " . $fieldData_arr[1] . " - " . $currlevel . " # ";
//                if ($currentLevel > $currlevel) {
                $contentrecord = new stdClass();
                $contentrecord->id = $chkuserinfodata_arr->id;
                $contentrecord->userid = $USER->id;
                $contentrecord->fieldid = $mlcid;
//                $contentrecord->data = 'Level '.$currentLevel;
                $contentrecord->data = 'Level '.$fieldData_arr[1];
                $lastcontentupdatedid = $DB->update_record('user_info_data', $contentrecord, false);
//                }

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
                
                $subject = get_string('emailsubject', 'block_spidergram');
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
          
                $sql_usersdatarecords = "SELECT * FROM {data_records} udr WHERE udr.userid = $USER->id AND dataid=" . $dataid;

                $isEmailSent = true;
                
                $arr_recordid = $DB->get_record_sql($sql_usersdatarecords);
                
                if ($arr_recordid) {
                $recordid = $arr_recordid->id;
                }
                
                $sql_emailsentfieldid = "SELECT * FROM {data_fields} WHERE name = 'Email sent' AND dataid=" . $dataid;
                
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
                    //$message = new stdClass();
                    $message = new \core\message\message();
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
$htmltext = "";
/*            $htmltext = '<a href="javascript:void(window.open(\'https://lean.learningconstruct.uk/pages/spider.html\', \'Find out more\', \'width=1450em,height=700em\'));" >
                <button class="button">
                <span class="button--inner">Find out more</span>
                </button>
                </a>'; */
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
    
            //$htmltext = 'write codes here';
            $this->content->text = $htmltext;

            if (is_siteadmin()) { 
                $this->content->footer = "<hr><p style='text-align:center;margin-bottom:0px;z-index:100000'><a href='" . $CFG->wwwroot . "/blocks/spidergram/armssettings.php'>Settings</a></p>"; 
            }
        }

}

        return $this->content;
        
    }
        
    }

    /**
     * Defines configuration data.
     *
     * The function is called immediatly after init().
     */
    public function specialization() {

        // Load user defined title and make sure it's never empty.
        if (empty($this->config->title)) {
            $this->title = "<span style='color:#E85B56'>" . get_string('plugintitle', 'block_spidergram') . "</span>";
        } else {
            $this->title = $this->config->title;
        }
    }

    /**
     * Enables global configuration of the block in settings.php.
     *
     * @return bool True if the global configuration is enabled.
     */
    function has_config() {
        return true;
    }

    /**
     * Locations where block can be displayed.
     *
     * @return array
     */
    public function applicable_formats() {
        return array('my' => true);
    }

}
