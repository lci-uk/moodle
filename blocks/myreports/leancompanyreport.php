<?php

    require_once(dirname(dirname(__FILE__)).'../../config.php');
	global $CFG, $DB, $USER, $OUTPUT, $PAGE;

    require_login();
    error_reporting(0);
    $mode = optional_param('mode', '', PARAM_TEXT);


    $context = context_system::instance();
    
    $roleshortname = "";

    $roles = get_user_roles($context, $USER->id, false);
    if ($roles) {
    $role = key($roles);
    $roleid = $roles[$role]->roleid;
    $roleshortname = $roles[$role]->shortname;
    }
    
    if ($mode=="company") {
        if (!is_siteadmin() && !$roleshortname=="programme-manager" && !$roleshortname=="company-manager" && !$roleshortname=="project-manager") {
            //echo "not site admin";
            header("location:" . $CFG->wwwroot);
            exit;
        }
    }
	
	// COURSE CATEGORIES UNDER PROJECTS
    $sql_project1fieldid = "SELECT id,param1 FROM {user_info_field} WHERE shortname =  'Project1'";
    if ($arr_project1fieldid = $DB->get_record_sql($sql_project1fieldid)) {
        $project1fieldid = $arr_project1fieldid->id;
    }

    $sql_project2fieldid = "SELECT id,param1 FROM {user_info_field} WHERE shortname =  'Project2'";
    if ($arr_project2fieldid = $DB->get_record_sql($sql_project2fieldid)) {
        $project2fieldid = $arr_project2fieldid->id;
    }
    
    $sql_usersproject1value = "SELECT data FROM {user_info_data} WHERE userid=" . $USER->id . " AND fieldid=" . $project1fieldid;;
    if ($arr_usersproject1value = $DB->get_record_sql($sql_usersproject1value)) {
            $project1fieldname = $arr_usersproject1value->data;
        }

    $sql_usersproject2value = "SELECT data FROM {user_info_data} WHERE userid=" . $USER->id . " AND fieldid=" . $project2fieldid;;
    if ($arr_usersproject2value = $DB->get_record_sql($sql_usersproject2value)) {
            $project2fieldname = $arr_usersproject2value->data;
        }
        
    // USERS WITH PROFILE HAVING PROJECT NAMES
    $userswithprojects = "";

    if ($project1fieldname=="None" && $project2fieldname=="None") {
    $sql_userswithprojects = "SELECT * FROM {user_info_data} WHERE data IN ('" . $project1fieldname . "','" . $project2fieldname . "')";
    }
    if ($project1fieldname!="None" && $project2fieldname!="None") {
    $sql_userswithprojects = "SELECT * FROM {user_info_data} WHERE data IN ('" . $project1fieldname . "','" . $project2fieldname . "')";
    }
    if ($project1fieldname!="None" && $project2fieldname=="None") {
    $sql_userswithprojects = "SELECT * FROM {user_info_data} WHERE data = '" . $project1fieldname . "'";
    }
    if ($project1fieldname=="None" && $project2fieldname!="None") {
    $sql_userswithprojects = "SELECT * FROM {user_info_data} WHERE data = '" . $project2fieldname . "'";
    }

    //echo $sql_userswithprojects . "<br/>";

    if ($arr_userswithprojects = $DB->get_records_sql($sql_userswithprojects)) {
        foreach($arr_userswithprojects as $key_userswithprojects) {
            $userswithprojects .= $key_userswithprojects->userid . ",";
        }
        $userswithprojects = rtrim($userswithprojects,",");
        }

        //echo "<br/>" . $userswithprojects . "<br/>";
            
    // COMPANY FIELD ID
    $sql_companyfieldid = "SELECT id,param1 FROM {user_info_field} WHERE shortname =  'Company'";
    if ($arr_companyfieldid = $DB->get_record_sql($sql_companyfieldid)) {
        $companyfieldid = $arr_companyfieldid->id;
    }
 
    // COMPANY JOB FIELD ID
    $sql_companyjobfieldid = "SELECT id,param1 FROM {user_info_field} WHERE shortname =  'CompanyJob'";
    if ($arr_companyjobfieldid = $DB->get_record_sql($sql_companyjobfieldid)) {
        $companyjobfieldid = $arr_companyjobfieldid->id;
    }
    
    // COMPANY GENDER FIELD ID
    $sql_genderfieldid = "SELECT id,param1 FROM {user_info_field} WHERE shortname =  'Gender'";
    if ($arr_genderfieldid = $DB->get_record_sql($sql_genderfieldid)) {
        $genderfieldid = $arr_genderfieldid->id;
    }
    
    // COMPANY AGE FIELD ID
    $sql_agefieldid = "SELECT id,param1 FROM {user_info_field} WHERE shortname =  'Age'";
    if ($arr_agefieldid = $DB->get_record_sql($sql_agefieldid)) {
        $agefieldid = $arr_agefieldid->id;
    }
    
    // InitialLevel ID
    $sql_initiallevelfieldid = "SELECT id,param1 FROM {user_info_field} WHERE shortname =  'InitialLevel'";
    if ($arr_initiallevelfieldid = $DB->get_record_sql($sql_initiallevelfieldid)) {
        $initiallevelfieldid = $arr_initiallevelfieldid->id;
    }
    
    // MyLeanCompetency ID
    $sql_mlcfieldid = "SELECT id,param1 FROM {user_info_field} WHERE shortname =  'MyLeanCompetency'";
    if ($arr_mlcfieldid = $DB->get_record_sql($sql_mlcfieldid)) {
        $mlcfieldid = $arr_mlcfieldid->id;
    }

    //Manager NE FIELD ID
    $sql_managernefieldid = "SELECT id FROM {role} WHERE name =  'Manager NE'";
    if ($arr_managernefieldid = $DB->get_record_sql($sql_managernefieldid)) {
        $managernefieldid = $arr_managernefieldid->id;
    }

    // PROGRAMMES (CATEGORIES) HAVING SUFFIX OF PROJECT

     $sql_categoriesunderproject = "SELECT id,name FROM {course_categories} WHERE name  LIKE '%" . $project1fieldname . "%' UNION SELECT id,name FROM {course_categories} WHERE name LIKE '%" . $project2fieldname . "%'";

    
    $catidsforprojectmanager = "";
    
    if ($arr_categoriesunderproject = $DB->get_records_sql($sql_categoriesunderproject)) {
        foreach ($arr_categoriesunderproject as $key_categoriesunderproject) {
            if ($key_categoriesunderproject!="None") {
            $catidsforprojectmanager .= $key_categoriesunderproject->id . ",";
            }
        }
    }
    
    $catidsforprojectmanager = rtrim($catidsforprojectmanager, ",");
    

//    print_r($catidsforprojectmanager);
    
    function projectnamebycatid($catid) {
        global $DB;
        $projectname = "";
        if ($catid!="") {
        $sql_projectname = "SELECT name FROM {course_categories} WHERE id = " . $catid;
        if ($arr_projectname = $DB->get_record_sql($sql_projectname)) {
            $projectname = $arr_projectname->name;
        }
        }
        return $projectname;
    }
    
    $PAGE->set_context($context);
    $PAGE->set_pagelayout('standard');

?>

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css">

    <script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>

<?php

   	// VARIABLES FOR COMPARISON TO ELIMINATE STATIC IDs STARTS
    $FacilitatorsForum = 0;
    $sql_facilitatorsforum ="SELECT id FROM {course} WHERE shortname = 'FacilitatorsForum'";
    if ($arr_facilitatorsforum = $DB->get_record_sql($sql_facilitatorsforum)) {
        $FacilitatorsForum = $arr_facilitatorsforum->id;
    }
        	
   	$L3Diagnostic = 0;
   	$sql_l3diagnostic ="SELECT id FROM {course} WHERE shortname = 'L3Diagnostic'";
    if ($arr_l3diagnostic = $DB->get_record_sql($sql_l3diagnostic)) {
        $L3Diagnostic = $arr_l3diagnostic->id;
    }
    
    $ignoreuid = 3;             // CHANGE IT ON PRODUCTION SITE TO 2
   	
   	
    // CREATE VARIABLES OF module id TO IGNORE
   	$sql_modulestoignore ="SELECT * FROM {modules} WHERE name in ( 'folder','label','page','hvp','customcert' )";
   	
   	if ($arr_modulestoignore = $DB->get_records_sql($sql_modulestoignore)) {
   	    foreach ($arr_modulestoignore as $key_modulestoignore) {
   	    $vname = "v" . $key_modulestoignore->name;
        $$vname = $key_modulestoignore->id;
        
        //echo "VARIABLE NAME " . $vname . " " . $$vname . "<br/>";
   	    }
    }

//    $modulenotin_1 = $vfolder . "," . $vcustomcert;
    $modulenotin_1 = $vfolder;
    $modulenotin_1 .= ",";
    $modulenotin_1 .=  $vlabel;
    $modulenotin_1 .= ",";
    $modulenotin_1 .= $vpage;
    if ($vhvp!="") {
    $modulenotin_1 .= ",";
    $modulenotin_1 .= $vhvp;
    }
    if ($vcustomcert!="") {    
    $modulenotin_1 .= ",";
    $modulenotin_1 .= $vcustomcert; 
    }
    
    $modulenotin_2 = $modulenotin_1; 

   	// VARIABLES FOR COMPARISON TO ELIMINATE STATIC IDs ENDS
   	
   	$CR = "<br /><br />";
	$LF = "<br />";
	$target = 'target="_blank"';
	
	$month = 2629743;
	$week = 604800;
	
	$companies = array();
	$jobs = array();
	$ages = array();
	$genders = array();
	$initiallevels = array();
	$foruma = array();
	$time = time();
	$dividercount = 0;
	$Initial = '';
	$currentlevel = '';
	$currentlevelg = '';
	$levelcomp = '';
	$compadd = 0;
	$fielddata = array();
	$fieldcount = 0;
	$credit = array();
	
 		$sql_role ="
        	SELECT *
        	FROM {role_assignments} r
        	WHERE r.userid = $USER->id
        	ORDER BY r.userid
        	";
			if($roles = $DB->get_records_sql($sql_role)){
			foreach($roles as $role){
			if ($role->roleid == $managernefieldid){$userrole = 'Manager NE';}	
			}
			}

	$sql_usercompany = "
			
			SELECT *
			FROM {user_info_data} uid
			WHERE uid.userid = $USER->id AND uid.fieldid = " . $companyfieldid;
			$usercompanys = $DB->get_records_sql($sql_usercompany);
			
			foreach($usercompanys AS $usercompany){
				$userscompany = $usercompany->data;
			}

	//$context = context_course::instance(SITEID);
	//$PAGE->set_context($context);
	$PAGE->set_url($CFG->wwwroot . '/blocks/myreports/leancompanyreport.php');
	echo $OUTPUT->header();
?>
<script>
$.noConflict();
</script>
<script>
    $(document).ready(function() {
        $('#company').DataTable( {
            "order": [],
            ordering: true,
            dom: 'frtipB',
            bFilter: false, 
            bInfo: false,
            bPaginate: true,
            buttons: [
            {
                extend: 'excel',
                title: 'Report <?php echo $mode; ?>'
            },
            {
                extend: 'pdf',
                title: 'Report <?php echo $mode; ?>',
                orientation: 'landscape'                
            }
            ]
            
        } );
    } );
</script>

<script>
$(document).ready(function() {
    
$("input:checkbox:not(:checked)").each(function() {
    var column = "table ." + $(this).attr("name");
    $(column).hide();
});

} );

$(document).on("click",".cbjob", function(){
    var column1 = "table .job";
    $(column1).toggle();
});
$(document).on("click",".cbage", function(){
    var column2 = "table .age";
    $(column2).toggle();
});
$(document).on("click",".cbgender", function(){
    var column3 = "table .gender";
    $(column3).toggle();
});
$(document).on("click",".cbuserid", function(){
    var column4 = "table .userid";
    $(column4).toggle();
});

$(document).on("click", ".paginate_button", function(){
    
  var column1 = "table .job";
  var column2 = "table .age";
  var column3 = "table .gender";
  var column4 = "table .userid";
  
  if($('.cbjob').is(':checked')) {
    $(column1).show();
  } else {
    $(column1).hide();
  }
  
  if($('.cbage').is(':checked')) {
    $(column2).show();
  } else {
    $(column2).hide();
  }

  if($('.cbgender').is(':checked')) {
    $(column3).show();
  } else {
    $(column3).hide();
  }
  
  if($('.cbuserid').is(':checked')) {
    $(column4).show();
  } else {
    $(column4).hide();
  }
    
    
});

</script>


<?php	
		echo '<style>
	body {
    font-family: Arial;
}

h5 {
    font-size: 18;
} 

a {
    cursor: pointer;
    color: #3174c7;
    text-decoration: none;
}

div.dt-buttons {
    margin-top: 5px;
}

.ptChk {
    cursor:pointer;
}

</style>';
	
	if($mode == 'all'){
	$heading = 'All companies and learners report at ';
	$joinid = 'ui.userid';
	$whereid = 'u.id';
	$wheretail1 = '';
	$wheretail2 = '';
	}
	
	if($mode == 'user'){
	$heading = 'My training report at ';
	$joinid = 'ui.userid';
	$whereid = $USER->id;
//	$whereid = 'u.id';
	$wheretail1 = '';
	$wheretail2 = '';
	}
	
	if($mode == 'gt'){
	$heading = 'Learner report for Galliford Try at ';
	$joinid = 'ui.userid';
	$whereid = 'u.id';
	$wheretail1 = "AND ui.data = 'Galliford Try'";
	$wheretail2 = '';
	}
	
	if($mode == 'cg'){
	$heading = 'Learner report for Costain Group at ';
	$joinid = 'ui.userid';
	$whereid = 'u.id';
	$wheretail1 = "AND ui.data = 'Costain Group'";
	$wheretail2 = '';
	}
	
	if($mode == 'company'){
	$heading = 'Learner report at ';
	$joinid = 'ui.userid';
	$whereid = 'u.id';
	
	if ($roleshortname=="programme-manager") {
	$wheretail1 = "";
	}
	if (is_siteadmin() || $roleshortname=="company-manager") {
	$wheretail1 = "AND ui.data = '".$userscompany."'";
	}

	$wheretail2 = '';
	}
		
	if($mode == 'active'){
	$heading = 'Active users report at ';
	$joinid = 'ui.userid';
	$whereid = 'u.id';
	$wheretail1 = "AND u.lastaccess > ($time-$month) AND u.id > $ignoreuid";
	$wheretail2 = 'AND u.id > $ignoreuid';
	}
	
	if($mode == 'inactive'){
	$heading = 'Inactive users report at ';
	$joinid = 'ui.userid';
	$whereid = 'u.id';
	$wheretail1 = "AND u.lastaccess < ($time-$month) AND u.lastaccess > 0 AND u.id > $ignoreuid";
	$wheretail2 = "AND u.lastaccess < ($time-$month) AND u.lastaccess > 0 AND u.id > $ignoreuid";
	}
	
	if($mode == 'nologin'){
	$heading = 'Users who have never logged in report at ';
	$joinid = 'ui.userid';
	$whereid = 'u.id';
	$wheretail1 = "AND u.lastaccess = 0 AND u.lastaccess = 0 AND u.id > $ignoreuid";
	$wheretail2 = "AND u.lastaccess = 0 AND u.lastaccess = 0 AND u.id > $ignoreuid";
	}

	if($mode == 'cactive'){
	$heading = 'Active users report at ';
	$joinid = 'ui.userid';
	$whereid = 'u.id';
	$wheretail1 = "AND u.lastaccess > ($time-$month) AND ui.data = '".$userscompany."' AND u.id <> $USER->id";
	$wheretail2 = "AND u.lastaccess > ($time-$month) AND ui.data = '".$userscompany."' AND u.id <> $USER->id";
	}
	
	if($mode == 'cinactive'){
	$heading = 'Inactive users report at ';
	$joinid = 'ui.userid';
	$whereid = 'u.id';
	$wheretail1 = "AND u.lastaccess < ($time-$month) AND u.lastaccess > 0 AND ui.data = '".$userscompany."' AND u.id <> $USER->id";
	$wheretail2 = "AND u.lastaccess < ($time-$month) AND u.lastaccess > 0 AND ui.data = '".$userscompany."' AND u.id <> $USER->id";
	}
	
	if($mode == 'cnologin'){
	$heading = 'Users who have never logged in report at ';
	$joinid = 'ui.userid';
	$whereid = 'u.id';
	$wheretail1 = "AND u.lastaccess = 0 AND u.lastaccess = 0 AND ui.data = '".$userscompany."' AND u.id <> $USER->id";
	$wheretail2 = "AND u.lastaccess = 0 AND u.lastaccess = 0 AND ui.data = '".$userscompany."' AND u.id <> $USER->id";
	}	
		
	//AND ui.data = '".$userscompany."'
	
	echo $OUTPUT->heading($heading.userdate($time));
	
	
	echo '<p>   <label class="ptChk"><input type="checkbox" name="job" class="cbjob"> Job</label> &nbsp; 
                <label class="ptChk"><input type="checkbox" name="age" class="cbage"> Age</label> &nbsp; 
                <label class="ptChk"><input type="checkbox" name="gender" class="cbgender"> Gender</label> &nbsp; 
                <label class="ptChk"><input type="checkbox" name="userid" class="cbuserid"> User ID</label></p>';
	
	if ($mode=="user") {
	$initialhd = "My initial level";
	$currenthd = "My current level";
	} else {
	$initialhd = "Initial level";
	$currenthd = "Current level";	    
	}

    echo '<table id="company" class="display table-bordered style="width:100%; font-size:14px;">';
    
	echo '<thead>';
	echo '<th align="left">Company</th>
	        <th align="left" class="job" data-priority="1">Job</th>
	        <th align="left" class="age" data-priority="2">Age</th>
	        <th align="left" class="gender" data-priority="3">Gender</th>
	        <th align="left" class="userid" data-priority="4">User ID</th>
	        <th align="left">Firstname</th>
	        <th align="left">Lastname</th>
	        <th align="left">Last visit</th>
	        <th align="left">' . $initialhd . '</th>
	        <th align="left">' . $currenthd . '</th>';
	        
	if ($roleshortname=="project-manager") {
        echo '<th align="left" class="project">Project</th>';
    }
	        
	echo '<th align="left">Course List</th>
	        <th align="left">Course completion</th>
	    </thead>';

	// Loading Company, Job, Gender and Age arrays		
	$sql_persodetails = "
			SELECT *
			FROM {user_info_data} ui
			JOIN {user} u ON u.id = $joinid 
			WHERE $whereid = ui.userid AND ui.fieldid = " . $companyfieldid . " $wheretail1
			ORDER BY ui.data";
			
			if ($userswithprojects!="") {
	$sql_persodetails = "
			SELECT *
			FROM {user_info_data} ui
			JOIN {user} u ON u.id = $joinid 
			WHERE $whereid = ui.userid AND ui.userid in (" . $userswithprojects . ") AND ui.fieldid = " . $companyfieldid . " $wheretail1
			ORDER BY ui.data";
			} else {
	$sql_persodetails = "
			SELECT *
			FROM {user_info_data} ui
			JOIN {user} u ON u.id = $joinid 
			WHERE $whereid = ui.userid AND ui.fieldid = " . $companyfieldid . " $wheretail1
			ORDER BY ui.data";			    
			}
			
			$users1 = $DB->get_records_sql($sql_persodetails);
			$c = 0;
			foreach($users1 as $user1){
			$c ++;
			$companies[$user1->id] = $user1->data;	
			}
			
			//echo $sql_persodetails;

	$sql_persodetails_a = "
			SELECT *
			FROM {user_info_data} ui
			JOIN {user} u ON u.id = ui.userid 
			WHERE $whereid = ui.userid AND ui.fieldid = " . $companyjobfieldid . " $wheretail2
			";
			$users2 = $DB->get_records_sql($sql_persodetails_a);	
			$c = 0;
			foreach($users2 as $user2){
			$c++;
			$jobs[$user2->id] = $user2->data;	
			}	
			
	$sql_persodetails_b = "
			SELECT *
			FROM {user_info_data} ui
			JOIN {user} u ON u.id = ui.userid 
			WHERE $whereid = ui.userid AND ui.fieldid = " . $genderfieldid . " $wheretail2
			";
			$users3 = $DB->get_records_sql($sql_persodetails_b);	
			$c = 0;
			foreach($users3 as $user3){
			$c++;
			$genders[$user3->id] = $user3->data;	
			}	
			
	$sql_persodetails_c = "
			SELECT *
			FROM {user_info_data} ui
			JOIN {user} u ON u.id = ui.userid 
			WHERE $whereid = ui.userid AND ui.fieldid = " . $agefieldid . " $wheretail2
			";
			$users4 = $DB->get_records_sql($sql_persodetails_c);	
			$c = 0;
			foreach($users4 as $user4){
			$c++;
			$ages[$user4->id] = $user4->data;	
			}
			
			
	$sql_persodetails_d = "
			SELECT *
			FROM {user_info_data} ui
			JOIN {user} u ON u.id = ui.userid 
			WHERE $whereid = ui.userid AND ui.fieldid = " . $initiallevelfieldid . " $wheretail2
			";
			$users5 = $DB->get_records_sql($sql_persodetails_d);	
			$c = 0;
			foreach($users5 as $user5){
			$c++;
			$initiallevels[$user5->id] = $user5->data;	
			}
			
	$sql_persodetails_d2 = "
			SELECT *
			FROM {user_info_data} ui
			JOIN {user} u ON u.id = ui.userid 
			WHERE $whereid = ui.userid AND ui.fieldid = " . $mlcfieldid . " $wheretail2
			";
			$users6 = $DB->get_records_sql($sql_persodetails_d2);	
			$c = 0;
			foreach($users6 as $user6){
			$c++;
			$leancompetencys[$user6->id] = $user6->data;
//			echo ' $user6->data '.$user6->data;
			}
	
				
			$c = 0;
			foreach($users1 as $user1){
			$NE = '';	
	$sql_roleassignment ="
        	SELECT r.id, r.roleid
        	FROM {role_assignments} r
        	WHERE r.userid = $user1->id
        	ORDER BY r.userid
        	";
			if($roles = $DB->get_records_sql($sql_roleassignment)){
			foreach($roles as $role){
			if ($role->roleid == $managernefieldid){
			$NE = 'Manager NE';
			}	
			}
			}
			
			if ($NE == 'Manager NE'){}
			else {				
				
			$c ++;
			$company = $companies[$user1->id];
			$d = $c + 2;	
			$job = $jobs[$user1->id];
			$age = $ages[$user1->id];
			$gender = $genders[$user1->id];
			$initiallevel = $initiallevels[$user1->id];
			$leancompetency = $leancompetencys[$user1->id];
//			echo 'Lastname '.$user1->lastname;
//			echo ' Lean competency '.$leancompetency;
			if(strpos($leancompetency,"."))
			{$leancompetencylevel = intval(substr($leancompetency, -3));}
			else {$leancompetencylevel = intval(substr($leancompetency, -1));}
//			echo ' Lean competency level '.$leancompetencylevel.$LF;
			$currentlevel = $leancompetency;
//			echo 'Current level '.$currentlevel;
//			echo 'Initial:'.$initiallevel;
//			echo ' Lean competency:'.$leancompetency;						
//			$Initial = $initiallevel;
			

			// Table content begins			

			echo '<tr>';

			// Calculate and tweak last access
			if($user1->lastaccess == 0){$lastaccess = 'Never';} else {$lastaccess = format_time(time() - $user1->lastaccess);}
			if($lastaccess == 'now'){$lastaccess = 'Now';}
			
			//Company and User fields to Last Access
			
			echo   '<td>'.$company.'</td>
			        <td class="job">'.$job.'</td>
			        <td class="age">'.$age.'</td>
			        <td class="gender">'.$gender.'</td>
			        <td class="userid"><a href=' . $CFG->wwwroot . '/user/profile.php?id='.$user1->id.' target="_blank" >'.$user1->id.'</a>'.'</td>
			        <td>'.$user1->firstname.'</td>
			        <td>'.$user1->lastname.'</td>
			        <td>'.$lastaccess.'</td>';	
		

			//Stores User's ID
			$useridn = $user1->id;		
			
	$sql_userenrolment = "
			SELECT *
			FROM {user_enrolments} ue
			JOIN {enrol} e ON ue.enrolid = e.id
			
			WHERE ue.userid = $user1->id
			ORDER BY e.courseid";
			

			// User enrolments with ' No courses' case
			if($enrolments = $DB->get_records_sql($sql_userenrolment)){

				} else 
				{ 
				    echo '<td>'. $initiallevel.'</td>
				          <td>'.$leancompetency.'</td>';
        	        if ($roleshortname=="project-manager") {
                    echo '<td class="project">&nbsp;</td>';
                    }
				    echo  '<td>'.'No courses'.'</td>
				          <td>'.'&nbsp;'.'</td>
				          </tr>';
				          
				}
				$coursecount = 0;
				foreach($enrolments as $enrol){
			// Use each enrolmement to find its course and add it to table row as hyperlink to course
	$sql_userenrolment_cid = "
			SELECT *
			FROM {course} c
			WHERE c.id = $enrol->courseid AND c.visible = 1
			";
			
			if ($roleshortname=="project-manager") {
	        $sql_userenrolment_cid = "
			SELECT *
			FROM {course} c
			WHERE c.id = $enrol->courseid AND c.category in (" . $catidsforprojectmanager . ")  AND c.visible = 1
			";
/*			$sql_userenrolment_cid = "
			SELECT *
			FROM {course} c
			WHERE c.id = $enrol->courseid AND c.visible = 1
			";
			$sql_userenrolment_cid = "
			SELECT *
			FROM {course} c
			WHERE c.id = $enrol->courseid AND c.fullname like '%$project1fieldname%' AND c.visible = 1
			";
*/			
			
	        }
			
			
			//$coursecount = 0;
			if($courses = $DB->get_records_sql($sql_userenrolment_cid)){
			foreach($courses as $course){	
			if ($course->id == $L3Diagnostic){
				$diagnostic = 1;
			} else {$diagnostic = 0;}
			}
			
			
			foreach($courses as $course){
			
			// ADDED STARTS
			$coursecat = $course->category;
			$sql_coursecategory = "SELECT * FROM {course_categories} WHERE id = $coursecat";
			if($coursecategory = $DB->get_record_sql($sql_coursecategory)){
			    $programname = $coursecategory->name;
			}
			// ADDED ENDS
			
			    
			$coursecount++; //echo $course{count};
				if ($coursecount < 2){$coursedata = "<a href=" . $CFG->wwwroot . "/course/view.php?id=".$course->id." target='_blank' >".$course->shortname."</a>";}
				if ($coursecount > 1){$coursedata = "<a href=" . $CFG->wwwroot . "/course/view.php?id=".$course->id." target='_blank' >".$course->shortname."</a>";}
				
	//User's parsed group
	
	$sql_usersgroup = "
			SELECT *
			FROM {groups} g
			JOIN {groups_members} gm ON g.id = gm.groupid
			WHERE g.courseid = $course->id AND gm.userid = $user1->id
			";
			
			//$coursecount = 0;
			if($groups = $DB->get_records_sql($sql_usersgroup)){
			foreach($groups as $group){

				if (count ($groups) == 1){
					// Simple parse
					$Initial = $initiallevel;}
				if (count ($groups) > 1){
					// Simple parse
					$currentlevelg = 'Multiple';}
				
// calculate sub-levels - HAS user completed each course module?
$currentlevel = '';

$sql_coursemodules = "
			SELECT cm.id, m.name
			FROM {course_modules} cm
			JOIN {modules} m ON m.id = cm.module
			WHERE cm.course = $course->id AND m.id NOT IN ( $modulenotin_1 )";
			if($modules = $DB->get_records_sql($sql_coursemodules)){
			foreach($modules as $module){
				
$sql_coursemodules_completed = "
			SELECT *
			FROM {course_modules_completion} cmc
			WHERE cmc.userid = $user1->id AND cmc.coursemoduleid = $module->id AND completionstate = 1
			";
			if($completions = $DB->get_records_sql($sql_coursemodules_completed)){
				foreach($completions as $completion){

$sql_coursemodules_competency = "
			SELECT *
			FROM {competency_modulecomp} cym
			WHERE cym.cmid = $module->id
			";			
			if($compmodules = $DB->get_records_sql($sql_coursemodules_competency)){
			foreach($compmodules as $compmodule){

$currentlevel = ''; $compadd = 0;
				
$sql_coursemodules_competencyvalue = "
			SELECT *
			FROM {competency} cy
			WHERE cy.id = $compmodule->competencyid
			";			
			if($competencies = $DB->get_records_sql($sql_coursemodules_competencyvalue)){
			foreach($competencies as $competency){
				if($compmodule->competencyid == $competency->id){				
				//$competency->shortname is sub-level
				$levelcomp = '<strong>'.$competency->shortname.'</strong>';
				
				}			
			
			} // each $competency
			} // if $competencies	
			} // each $compmodule		
			} // if $compmodules
			} // each $completion
			} // else {$currentlevel = $Initial;} // if $completions	
			} // each $module
			} // if $modules				
				
			if (($currentlevel == '') AND ($currentlevelg == '')){$currentlevel = $leancompetency;}	
			if (($currentlevel == '') AND ($currentlevelg <> '')){$currentlevel = $leancompetency;}
			if (($currentlevel <> '') AND ($currentlevelg <>'')){$currentlevel = $leancompetency;}
			if ($currentlevel <> '') {$currentlevel = $leancompetency;}

//			echo 'Current level: '.$currentlevel;
			
	$sql_datarecords ="
			SELECT *
			FROM {data_records} dr
			WHERE dr.userid = $user1->id
			";
			if($hasrecords = $DB->get_records_sql($sql_datarecords)){
			foreach($hasrecords AS $hasrecord){
				
	$sql_datacontent ="
			SELECT *
			FROM {data_content} dc
			WHERE dc.recordid = $hasrecord->id
			";
			if($hasdata = $DB->get_records_sql($sql_datacontent)){
			foreach($hasdata AS $hasentry){		
			$fieldcount ++;
			$fielddata[$fieldcount] = $hasentry->content;
			if(($fielddata[$fieldcount] == $initiallevel) AND ($fieldcount <> 1)){$credit[$fieldcount] = 0;} 
			else {$credit[$fieldcount] = substr($fielddata[$fieldcount], 1);}// trim to credit only
			} 
			$totalcredits = $credit[2]+$credit[3]+$credit[4]+$credit[5]+$credit[6]+$credit[7]+$credit[8]+$credit[9]+$credit[10];

			if($totalcredits == 0){$currentlevel = $initiallevel;} else {

				$currentlevel = $currentlevel.trim($totalcredits, '0');
				if ($currentlevel == 'Level 11') {$currentlevel = ' Level 2';}
				if ($currentlevel == 'Level 21') {$currentlevel = ' Level 3';}
				//echo $user1->id.': '.$currentlevel.$LF;

			}
			$fieldcount = 0;// has entry
			} // has data
			} // has record
			
			}      // has records
			
			
			
			//$levelcomp = '';				
			} // in a group
			} else {$Initial = '&nbsp;'; $currentlevel = '&nbsp;';} //not in a group
	
	// spacers need $Initial and $currentlevel
	
//	echo "Y" . $coursecount . "X" . $Initial . "X" . "<br>";

			if ($coursecount > 1 )
			    {
			        $Initial = "";
			        $Initial .= '<td>' . '&nbsp;'.'</td>';
			        $Initial .= '<td class="job">'.'&nbsp;'.'</td>
			                    <td class="age">'.'&nbsp;'.'</td>
			                    <td class="gender">'.'&nbsp;'.'</td>
			                    <td class="userid">'.'&nbsp;'.'</td>
			                    <td>'.'&nbsp;'.'</td>
			                    <td>'.'&nbsp;'.'</td>
			                    <td>'.'&nbsp;'.'</td>';
			    } else {
			         $Initial = $initiallevels[$user1->id];      // ADDED 
			    }
			
		
	
	// User's % completion

	// Retrieve the activity names of all the User's Activities
	$sql_activitynames = "
			SELECT cm.id, m.name
			FROM {course_modules} cm
			JOIN {modules} m ON m.id = cm.module
			WHERE cm.course = $course->id AND m.id NOT IN ( $modulenotin_2 ) AND cm.course <> $FacilitatorsForum
			";
			$NoOfModules = 0; //$forumtrip = 0;
			$several = 0; $CompletionCount = 0;
			if($modules = $DB->get_records_sql($sql_activitynames)){
				$NoOfModules = count($modules);
//				echo $course->id.':'.$NoOfModules.$LF;
			foreach($modules as $module){
			if($module->name == 'scorm'){$mname = 'Interactive';}
			elseif($module->name == 'url'){$mname = 'Video';}
			elseif($module->name == 'label'){$mname = 'Study';} 
			elseif($module->name == 'forum'){$mname = 'Discussion';}
			else {$mname = $module->name;}	
			// Allow for more than one activity

			
			if (($module->name == 'forum') AND ($NoOfModules == 1)){
							
	$sql_forumdiscussions = "
			SELECT *
			FROM {forum_discussions} fd
			WHERE fd.course = $course->id AND fd.userid = $user1->id AND fd.course <> $FacilitatorsForum
			";						
			if($ForumPosts = $DB->get_records_sql($sql_forumdiscussions)){
			foreach($ForumPosts as $ForumPost){
			if ($coursecount > 1){$currentlevel = '&nbsp;';}
			if ($coursecount < 2){$currentlevel = $currentlevel;}
			{
			    echo '<td>'.$Initial.'</td>
			    <td>'.$currentlevel.'</td>';

        	        if ($roleshortname=="project-manager") {
                        echo '<td class="project">' . projectnamebycatid($coursecat) . '</td>';
                    } 

			         echo  '<td>'.$coursedata.'</td>
			    <td>Posted</td>
			    </tr>';}
			//<td>'.$coursedata.'</td>
			}					
			}else {
				if ($coursecount > 1){$currentlevel = '&nbsp;';} 
				echo '<td>'.$Initial.'</td>
				<td>'.$currentlevel.'</td>';

        	        if ($roleshortname=="project-manager") {
                        echo '<td class="project">' . projectnamebycatid($coursecat) . '</td>';
                    } 

			         echo  '<td>'.$coursedata.'</td>
				<td>No post</td>
				</tr>';
			}
			}
			
			if (($module->name == 'scorm') AND ($NoOfModules == 1)){	
			if ($coursecount > 1){$currentlevel = '&nbsp;';}
	$sql_scormactivity = "
			SELECT *
			FROM {scorm} s
			WHERE s.course = $course->id
			";	
			if($interactives = $DB->get_records_sql($sql_scormactivity)){
			foreach($interactives AS $interactive){
				
			
	$sql_scormtrack = "
			SELECT *
			FROM {scorm_scoes_track} t
			WHERE t.userid = $user1->id AND $interactive->id = t.scormid
			";	
			if($scores = $DB->get_records_sql($sql_scormtrack)){
				$repeat = 0; //$ScoreCounter = 0;
				foreach($scores AS $score){
				$ScoreCount = count($scores);
				if($score->element == 'cmi.core.score.raw')	{$score->value = intval($score->value);}
				if(($score->element == 'cmi.core.score.raw') AND ($score->value > 79)){
					if ($coursecount < 2){$currentlevel = $leancompetency;}
						echo    '<td>'.$Initial.'</td>
						        <td>'.$currentlevel.'</td>';

        	        if ($roleshortname=="project-manager") {
                        echo '<td class="project">' . projectnamebycatid($coursecat) . '</td>';
                    } 

			         echo  '<td>'.$coursedata.'</td>
						        <td>Passed</td>
						 </tr>';
					}
				if(($score->element == 'cmi.core.score.raw') AND ($score->value < 80)){
				    echo '<td>'.$Initial.'</td>
				            <td>'.$currentlevel.'</td>';

        	        if ($roleshortname=="project-manager") {
                        echo '<td class="project">' . projectnamebycatid($coursecat) . '</td>';
                    } 

			         echo  '<td>'.$coursedata.'</td>
				            <td>Not passed</td>
				            </tr>';
				        }
					else if(($score->element == 'cmi.core.lesson_status') AND ($score->value == 'incomplete'))
					    {
					        echo    '<td>'.$Initial.'</td>
					                <td>'.$currentlevel.'</td>';

        	        if ($roleshortname=="project-manager") {
                        echo '<td class="project">' . projectnamebycatid($coursecat) . '</td>';
                    } 

			         echo  '<td>'.$coursedata.'</td>
					                <td>Started</td>
					                </tr>';
					    }
					else if(($score->element == 'cmi.core.lesson_status') AND ($score->value == 'failed') AND ($ScoreCount == 8)) 
					    {
					    echo    '<td>'.$Initial.'</td>
					             <td>'.$currentlevel.'</td>';

        	        if ($roleshortname=="project-manager") {
                        echo '<td class="project">' . projectnamebycatid($coursecat) . '</td>';
                    } 

			         echo  '<td>'.$coursedata.'</td>
					             <td>Not passed</td>
					             </tr>';
					    }
					else if(($score->element == 'cmi.core.lesson_status') AND ($score->value == 'completed') AND ($ScoreCount == 8)) 
					    {
					    if ($coursecount < 2)
					        {
					            $currentlevel = $currentlevel;
					        } 
					        echo    '<td>'.$Initial.'</td>
					                <td>'.$currentlevel.'</td>';

        	        if ($roleshortname=="project-manager") {
                        echo '<td class="project">' . projectnamebycatid($coursecat) . '</td>';
                    } 

			         echo  '<td>'.$coursedata.'</td>
					                <td>Passed</td>
					                </tr>';}
					else if(($score->element == 'cmi.core.lesson_status') AND ($score->value == 'completed') AND ($ScoreCount < 8)) 
					    {
					        echo   '<td>'.$Initial.'</td>
					                <td>'.$currentlevel.'</td>';

        	        if ($roleshortname=="project-manager") {
                        echo '<td class="project">' . projectnamebycatid($coursecat) . '</td>';
                    } 

			         echo  '<td>'.$coursedata.'</td>
					                <td>No score</td></tr>';
					    }
			}// each score			
			}// has a score

			else {
			        echo   '<td>'.$Initial.'</td>
			                <td>'.$currentlevel.'</td>';

        	        if ($roleshortname=="project-manager") {
                        echo '<td class="project">' . projectnamebycatid($coursecat) . '</td>';
                    } 

			         echo  '<td>'.$coursedata.'</td>
			                <td>Not started</td></tr>';
			}
			}// each scorm record
			}// if Course in Scorm table
			}// if name == scorm
			
			elseif($NoOfModules > 1){
	
	$sql_coursemodulecompletion = "
			SELECT *
			FROM {course_modules_completion} cmc
			WHERE cmc.userid = $user1->id AND cmc.coursemoduleid = $module->id AND completionstate = 1
			";
			if($completions = $DB->get_records_sql($sql_coursemodulecompletion)){
				foreach($completions as $completion){
				$CompletionCount ++;	
				}
				}
				
			$several ++;
			
			if ($several == $NoOfModules){
				$MultipleNoOfModules = $NoOfModules;// news forum deleted
				$grade = bcdiv((($CompletionCount/$MultipleNoOfModules)*100),1,0);
				
				if ($coursecount < 2){
				$currentlevel = $leancompetency;
				}
				if ($coursecount > 1){$currentlevel = '&nbsp;';}
				if ($coursecount < 2){$currentlevel = $leancompetency;}
				if($grade == 0)
				    {
				        echo   '<td>'.$Initial.'</td>
				                <td>'.$currentlevel.'</td>';

        	        if ($roleshortname=="project-manager") {
                        echo '<td class="project">' . projectnamebycatid($coursecat) . '</td>';
                    } 

			         echo  '<td>'.$coursedata.'</td>
				                <td>Not started</td>
				                </tr>';
				    }
				if(($grade < 100) AND ($grade > 0))
				    {
				        echo   '<td>'.$Initial.'</td>
				                <td>'.$currentlevel.'</td>';

        	        if ($roleshortname=="project-manager") {
                        echo '<td class="project">' . projectnamebycatid($coursecat) . '</td>';
                    } 

			         echo  '<td>'.$coursedata.'</td>
				                <td>'.$grade.' %</td>
				                </tr>';
				    }

				if (!$leancompetency){$leancompetency = $Initial;}
				if($grade == 100)
				    {
				        if ($coursecount < 2)
				            {
				                $currentlevel = $leancompetency;
				            }
				            echo   '<td>'.$Initial.'</td>
				                    <td>'.$currentlevel.'</td>';

        	        if ($roleshortname=="project-manager") {
                        echo '<td class="project">' . projectnamebycatid($coursecat) . '</td>';
                    } 

			         echo  '<td>'.$coursedata.'</td>
				                    <td>Passed</td>
				                    </tr>';
				    }
						
			}// several equals no of modules	
			}// if more than 1 module							
			}// each module 
			}// if there are modules
			}// next course
		} //each course
		} //each enrolled course 
		} //each user1 enrolment not a manager
		} $coursecount = 0;  //echo '</tr>';  //each user1

	echo '</table>'.$LF;


	echo $OUTPUT->footer();
?>