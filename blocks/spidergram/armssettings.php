<?php

global $CFG, $DB,$OUTPUT, $PAGE;
require_once '../../config.php';

    require_login();
    $context = context_system::instance();
    $PAGE->set_context($context);
    $PAGE->set_pagelayout('standard');
	$PAGE->set_url($CFG->wwwroot . '/blocks/spidergram/armssettings.php');
        error_reporting(0);
if(!is_siteadmin()){
    header('location: '.$CFG->wwwroot);
}
$message = "";

// FETCH DATA ID 
$sql_dataid ="SELECT id FROM {data} WHERE name='Spider updates'";

if($arr_dataid = $DB->get_record_sql($sql_dataid)){
    $dataid = $arr_dataid->id;
} else {
    $dataid = 0;
}

// FETCH MyLeanCompetency FIELD ID 
$fldids ="";
$sql_fldids ="SELECT id FROM {data_fields} WHERE dataid=" . $dataid . " AND name NOT IN ('Date','Email sent')";

if($arr_fldids = $DB->get_records_sql($sql_fldids)){
    foreach($arr_fldids as $key_fldids) {
        $fldids .= $key_fldids->id . ",";
    }

    $fldids = rtrim($fldids,",");
} 

if(isset($_GET['delete'])){
    $id = $_GET['delete'];

    $DB->execute("delete from {levelgraph_data} where id=".$id);
    
    echo "<script>
    alert('Delete successfully.');
    window.location.href='armssettings.php';
    </script>";
}

// Save record
        if(isset($_POST['submit'])){
            $fieldid = $_POST['fieldid'];
            $level = $_POST['level'];
            
            
            if( $fieldid > 0 && $level > 0 ){
                
                ## check entry
                $checkEntry = $DB->get_record_sql("select count(*) as allcount from {levelgraph_data} where fieldid=".$fieldid." and level=".$level);
                $count = $checkEntry->allcount;
                
                // Courses
                $course_arr = array();
                foreach($_POST['courses'] as $course){
                  
                    $course_arr[] = $course;
                }
                
                $course_str = 0;
                if(count($course_arr)){
                    $course_str = implode(",",$course_arr);
                }
                
                
                if($count == 0){
                    
                    $insertLevel_data = "INSERT INTO {levelgraph_data}(level,fieldid,courses,coursecompletion) VALUES(".$level.",".$fieldid.",'".$course_str."','0')";
                    $DB->execute($insertLevel_data);
                    
                    $message = "Saved successfully.";
                    echo "<script>
                    alert('Saved successfully.');
                    window.location.href='armssettings.php';
                    </script>";
                }
            }
        }

// Update record
if(isset($_POST['eSubmit'])){
            $fieldid = $_POST['fieldid'];
            $level = $_POST['level'];
            
            $editid = 0;
            if(isset($_GET['edit'])){
                $editid = $_GET['edit'];
            }
    
            if( $fieldid > 0 && $level > 0 && $editid > 0){
                
                
                ## check entry
                $checkEntry = $DB->get_record_sql("select count(*) as allcount from {levelgraph_data} where fieldid=".$fieldid." and level=".$level);
                $count = $checkEntry->allcount;
                
                // Courses
                $course_arr = array();
                foreach($_POST['courses'] as $course){
                  
                    $course_arr[] = $course;
                }
                
                $course_str = 0;
                if(count($course_arr)){
                    $course_str = implode(",",$course_arr);
                }
                
                
                // if($count == 0){
                    
                    $updateLevel_data = "Update {levelgraph_data} set fieldid=".$fieldid.",courses = '".$course_str."' where id=".$editid;
                    $DB->execute($updateLevel_data);
                    
                 
                    echo "<script>
                    alert('Updated successfully.');
                    window.location.href='armssettings.php';
                    </script>";
                // }
            }
        }
        
        
echo $OUTPUT->header();

## Lean data (start)
$fieldData_arr = array();
$data_fieldsData = $DB->get_records_sql("select * from {data_fields} where id in (" . $fldids . ")" );
                        foreach($data_fieldsData as $fielddata){
                              $fieldid = $fielddata->id;
                              $fieldname = $fielddata->name;
                              
                             $fieldData_arr[$fieldid] = $fieldname;
                        }
## Lean data (end)

## Current level (start)
$currentLevel = 1;
if(isset($_GET['level'])){
    $currentLevel = $_GET['level'];
}
## Current level (end)

## edit record (start)
$edit_courses = array();
$edit_fielid = 0;
if(isset($_GET['edit'])){
    $editid = $_GET['edit'];
    
    $records = $DB->get_records_sql("select * from {levelgraph_data} WHERE id=".$editid);
    $data = array();
                        
    foreach($records as $record){
        
        $edit_fielid = $record->fieldid;  
        $edit_courses = explode(",",$record->courses);
                        
    }
     
  
}
## edit record (end)
?>

<div class='container'>
    
    <div class='row'>
        <div class='col-md-12' style='text-align: center;'>
            <form method='get' action='' id='levelForm' style='display: inline;width: 80%;'>
            <span style='display: inline-block;'><b>Level : </b></span><select style='margin: 0 auto; width: 200px;display: inline-block;' name='level' onchange='document.getElementById("levelForm").submit();' id='level' class='form-control' required>
                        <option value=''>-- Select Level --</option>
                <?php 
                for($level=1;$level<=5;$level++){
                    $selected = "";
                    if($currentLevel == $level){
                        $selected = "selected";
                    }
                    echo "<option value='".$level."' ".$selected." >Level ".$level."</option>";
                }
                ?>
            </select>
            </form>
            
            <div style='display: inline-block; width: 200px;'>
                <?php if(!isset($_GET['add']) && !isset($_GET['edit']) ){ ?>
                <a href='armssettings.php?level=<?= $currentLevel ?>&add=1' class='btn btn-sm btn-info'>Add record</a>
                <?php } ?>
                <?php if(isset($_GET['add']) || isset($_GET['edit'])){ ?>
                <a href='armssettings.php?level=<?= $currentLevel ?>' class='btn btn-sm btn-info'>List</a>
                <?php } ?>
            </div>
        </div>
    </div>
    
    <!-- List (start) -->
    <?php if(!isset($_GET['add']) && !isset($_GET['edit'])){ ?>
    <div class='row'>
        <div class='col-md-12' ><b>Entries : </b></div>
        <div class='col-md-12' >
            <!-- Table -->
            <table width='100%' border='1' style='border-collapse: collapse;'>
                <thead>
                    <tr>
                        <th>Lean</th>
                        <th>Level</th>
                        <th>Course IDs</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    
                    <?php 
                        
                        $records = $DB->get_records_sql("select * from {levelgraph_data} WHERE level=".$currentLevel." order by fieldid");
                        $data = array();
                        
                        foreach($records as $record){
                            
                            echo "<tr>";
                            echo "<td>".$fieldData_arr[$record->fieldid]."</td>";
                            echo "<td>".$record->level."</td>";
                            echo "<td>".$record->courses."</td>";
                            echo "<td><a href='armssettings.php?edit=".$record->id ."&level=".$currentLevel."' >Edit</a>&nbsp;<a href='armssettings.php?delete=".$record->id ."' style='color: red;' >Delete</a></td>";
                            echo "</tr>";
                        }
                        
                 
                    ?>
                    
                </tbody>
            </table>
        </div>
    </div>
    <?php } ?>
    <!-- List (end) -->
    
    <!-- Add Entry (start) -->
    <?php if(isset($_GET['add']) || isset($_GET['edit']) ){ ?>
    <div class='row'>
        <div class='col-md-12' ><b>Add Entry : </b></div>
        <?php 
            echo $message;
        ?>
        <form method='post' action='' onsubmit="return validateMyForm();">
            <table>
                <tr>
                    <td>Lean</td>
                    <td>
                        <select name='fieldid' id='fieldid' class='form-control' required>
                            <option value=''>-- Select Lean --</option>
                            <?php 
                            $data_fieldsData = $DB->get_records_sql("select * from {data_fields} where id in (" . $fldids . ")");
                            foreach($data_fieldsData as $fielddata){
                                  $fieldid = $fielddata->id;
                                  $fieldname = $fielddata->name;
                                  
                                  $selected = "";
                                  if($edit_fielid == $fieldid ){
                                      $selected = "selected";
                                  }
                                  echo "<option value='".$fieldid."' ".$selected." >".$fieldname."</option>";
                            }
                            ?>
                        </select>
                    </td>
                </tr>
            
            
                <tr>
                    <td>Courses</td>
                    <td>
                        <input type='hidden' value='<?= $currentLevel ?>' name='level'>
                        <select name='courses[]' id='courses' class='form-control' multiple >
                            <option value=''>-- Select a course --</option>
                            <?php 
                            $course_data = $DB->get_records_sql("select * from {course} where visible=1 and idnumber like '%L".$currentLevel."%'");
        
                            $response = array();
                            foreach($course_data as $cdata){
                                
                                $selected = "";
                                if(in_array($cdata->id,$edit_courses)){
                                   $selected = "selected"; 
                                }
                                echo "<option value='".$cdata->id."' ".$selected." >".$cdata->fullname."</option>";
                            }
                            ?>
                        </select>
                  </td>
                </tr>
            
                <tr>
                  <td>&nbsp;</td>
                  <td>
                      <br><br>
                        <?php if(isset($_GET['add'])){ ?>
                        <input type="submit" name="submit" class='btn btn-info' value='Submit'>
                        <?php } ?>
                        <?php if(isset($_GET['edit'])){ ?>
                        <input type="submit" name="eSubmit" class='btn btn-info' value='Submit'>
                        <?php } ?>
                  </td>
                </tr>
            </table>
        </form>
        </div>
    </div>
    <?php } ?>
    <!-- Add Entry (end) -->
    
</div>



<?php
echo $OUTPUT->footer();
?>

<script type='text/javascript'>

$(document).ready(function(){
    
    
            
    $('#level').change(function(){
        var level = $(this).val();
        console.log('level : ' + level);
        
        $.ajax({
            url: 'armssettings.php',
            type: 'post',
            data: {ajax: 1,request:1,level:level},
            dataType: 'json',
            success: function(response){
                console.log('success : ' + JSON.stringify(response) );
                
                $('#courses').find('option').not(':first').remove();
                var len = response.length;
                for(var i=0; i<len; i++){
                    var id = response[i].id;
                    var name = response[i].name;
     
    
                    var option = "<option value='"+id+"'>"+name+"</option>";
    
                    $("#courses").append(option);
                }

            },
            error:function(data){
                console.log('error : ' + JSON.stringify(data) );
            }
        });
    });
});

function validateMyForm(){
    
    var level = $('#level').val();
    var fieldid = $('#fieldid').val();
    
    console.log('level : ' + level + ', field : ' + fieldid);
    if(level > 0 && fieldid >0){
        return true;
    }
    return false;
}
</script>












	