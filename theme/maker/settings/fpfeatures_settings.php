<?php 
	
	
	defined('MOODLE_INTERNAL') || die();
	
    /* Frontpage Featured Blocks */	
	$page = new admin_settingpage('theme_maker_homeblocks', get_string('homeblocksheading', 'theme_maker'));
	$page->add(new admin_setting_heading('theme_maker_homeblocksheadingsub', get_string('homeblocksheadingsub', 'theme_maker'),
            format_text(get_string('homeblocksheadingsubdesc' , 'theme_maker'), FORMAT_MARKDOWN)));
            
            
	//Enable Featured Blocks.
    $name = 'theme_maker/usehomeblocks';
    $title = get_string('usehomeblocks', 'theme_maker');
    $description = get_string('usehomeblocksdesc', 'theme_maker');
    $default = true;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default, true, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // Featured Section Title
    $name = 'theme_maker/featuredsectiontitle';
    $title = get_string('featuredsectiontitle', 'theme_maker');
    $description = get_string('featuredsectiontitledesc', 'theme_maker');
    $default = 'Top Courses';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    //Home Block Height
    $name = 'theme_maker/homeblockheight';
	$title = get_string('homeblockheight', 'theme_maker');
	$description = get_string('homeblockheightdesc', 'theme_maker');;
	$default = 'auto';
	$choices = array(
		    'auto' => 'auto',
	        '300px' => '300px',
	        '320px' => '320px',
	        '340px' => '340px',
	        '360px' => '360px',
	        '380px' => '380px',
	        '400px' => '400px',
	        '420px' => '420px',
	        '440px' => '440px',
	        '460px' => '460px',
		    '480px' => '480px',
		    '500px' => '500px',
	    );
	$setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
	$setting->set_updatedcallback('theme_reset_all_caches');
	$page->add($setting);

	/* Home Block 1 */	
    $name = 'theme_maker/homeblock1info';
    $heading = get_string('homeblock1info', 'theme_maker');
    $information = get_string('homeblock1desc', 'theme_maker');
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);
	
	$name = 'theme_maker/homeblock1title';
    $title = get_string('homeblocktitle', 'theme_maker');
    $description = get_string('homeblocktitledesc', 'theme_maker');
    $default = 'Heading One';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_maker/homeblock1image';
    $title = get_string('homeblockimage', 'theme_maker');
    $description = get_string('homeblockimagedesc', 'theme_maker');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'homeblock1image');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_maker/homeblock1content';
    $title = get_string('homeblockcontent', 'theme_maker');
    $description = get_string('homeblockcontentdesc', 'theme_maker');
    $default = 'Block 1 content goes here Lorem ipsum dolor sit amet, consectetur adipiscing elit.';
    $setting = new admin_setting_configtextarea($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    
    $name = 'theme_maker/homeblock1url';
    $title = get_string('homeblockurl', 'theme_maker');
    $description = get_string('homeblockbuttonurldesc', 'theme_maker');
    $default = '#link1';
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_maker/homeblock1label';
    $title = get_string('homeblocklabel', 'theme_maker');
    $description = get_string('homeblocklabeldesc', 'theme_maker');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    /* Home Block 2 */    
    $name = 'theme_maker/homeblock2info';
    $heading = get_string('homeblock2info', 'theme_maker');
    $information = get_string('homeblock2desc', 'theme_maker');
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);   
    
	$name = 'theme_maker/homeblock2title';
    $title = get_string('homeblocktitle', 'theme_maker');
    $description = get_string('homeblocktitledesc', 'theme_maker');
    $default = 'Heading Two';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_maker/homeblock2image';
    $title = get_string('homeblockimage', 'theme_maker');
    $description = get_string('homeblockimagedesc', 'theme_maker');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'homeblock2image');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_maker/homeblock2content';
    $title = get_string('homeblockcontent', 'theme_maker');
    $description = get_string('homeblockcontentdesc', 'theme_maker');
    $default = 'Block 2 content goes here Lorem ipsum dolor sit amet, consectetur adipiscing elit.';
    $setting = new admin_setting_configtextarea($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_maker/homeblock2url';
    $title = get_string('homeblockurl', 'theme_maker');
    $description = get_string('homeblockbuttonurldesc', 'theme_maker');
    $default = '#link2';
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_maker/homeblock2label';
    $title = get_string('homeblocklabel', 'theme_maker');
    $description = get_string('homeblocklabeldesc', 'theme_maker');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    /* Home Block 3 */        
    $name = 'theme_maker/homeblock3info';
    $heading = get_string('homeblock3info', 'theme_maker');
    $information = get_string('homeblock3desc', 'theme_maker');
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);
    
	$name = 'theme_maker/homeblock3title';
    $title = get_string('homeblocktitle', 'theme_maker');
    $description = get_string('homeblocktitledesc', 'theme_maker');
    $default = 'Heading Three';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_maker/homeblock3image';
    $title = get_string('homeblockimage', 'theme_maker');
    $description = get_string('homeblockimagedesc', 'theme_maker');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'homeblock3image');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_maker/homeblock3content';
    $title = get_string('homeblockcontent', 'theme_maker');
    $description = get_string('homeblockcontentdesc', 'theme_maker');
    $default = 'Block 3 content goes here Lorem ipsum dolor sit amet, consectetur adipiscing elit.';
    $setting = new admin_setting_configtextarea($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_maker/homeblock3url';
    $title = get_string('homeblockurl', 'theme_maker');
    $description = get_string('homeblockbuttonurldesc', 'theme_maker');
    $default = '#link3';
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_maker/homeblock3label';
    $title = get_string('homeblocklabel', 'theme_maker');
    $description = get_string('homeblocklabeldesc', 'theme_maker');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    /* Home Block 4 */    
    $name = 'theme_maker/homeblock4info';
    $heading = get_string('homeblock4info', 'theme_maker');
    $information = get_string('homeblock4desc', 'theme_maker');
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);
    
	$name = 'theme_maker/homeblock4title';
    $title = get_string('homeblocktitle', 'theme_maker');
    $description = get_string('homeblocktitledesc', 'theme_maker');
    $default = 'Heading Four';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_maker/homeblock4image';
    $title = get_string('homeblockimage', 'theme_maker');
    $description = get_string('homeblockimagedesc', 'theme_maker');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'homeblock4image');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_maker/homeblock4content';
    $title = get_string('homeblockcontent', 'theme_maker');
    $description = get_string('homeblockcontentdesc', 'theme_maker');
    $default = 'Block 4 content goes here Lorem ipsum dolor sit amet, consectetur adipiscing elit.';
    $setting = new admin_setting_configtextarea($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_maker/homeblock4url';
    $title = get_string('homeblockurl', 'theme_maker');
    $description = get_string('homeblockbuttonurldesc', 'theme_maker');
    $default = '#link4';
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_maker/homeblock4label';
    $title = get_string('homeblocklabel', 'theme_maker');
    $description = get_string('homeblocklabeldesc', 'theme_maker');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    
    /* Home Block 5 */    
    $name = 'theme_maker/homeblock5info';
    $heading = get_string('homeblock5info', 'theme_maker');
    $information = get_string('homeblock5desc', 'theme_maker');
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);
    
	$name = 'theme_maker/homeblock5title';
    $title = get_string('homeblocktitle', 'theme_maker');
    $description = get_string('homeblocktitledesc', 'theme_maker');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_maker/homeblock5image';
    $title = get_string('homeblockimage', 'theme_maker');
    $description = get_string('homeblockimagedesc', 'theme_maker');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'homeblock5image');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_maker/homeblock5content';
    $title = get_string('homeblockcontent', 'theme_maker');
    $description = get_string('homeblockcontentdesc', 'theme_maker');
    $default = '';
    $setting = new admin_setting_configtextarea($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_maker/homeblock5url';
    $title = get_string('homeblockurl', 'theme_maker');
    $description = get_string('homeblockbuttonurldesc', 'theme_maker');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);    
    
    $name = 'theme_maker/homeblock5label';
    $title = get_string('homeblocklabel', 'theme_maker');
    $description = get_string('homeblocklabeldesc', 'theme_maker');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    /* Home Block 6 */   
    $name = 'theme_maker/homeblock6info';
    $heading = get_string('homeblock6info', 'theme_maker');
    $information = get_string('homeblock6desc', 'theme_maker');
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);
     
	$name = 'theme_maker/homeblock6title';
    $title = get_string('homeblocktitle', 'theme_maker');
    $description = get_string('homeblocktitledesc', 'theme_maker');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_maker/homeblock6image';
    $title = get_string('homeblockimage', 'theme_maker');
    $description = get_string('homeblockimagedesc', 'theme_maker');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'homeblock6image');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_maker/homeblock6content';
    $title = get_string('homeblockcontent', 'theme_maker');
    $description = get_string('homeblockcontentdesc', 'theme_maker');
    $default = '';
    $setting = new admin_setting_configtextarea($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_maker/homeblock6url';
    $title = get_string('homeblockurl', 'theme_maker');
    $description = get_string('homeblockbuttonurldesc', 'theme_maker');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);    
    
    $name = 'theme_maker/homeblock6label';
    $title = get_string('homeblocklabel', 'theme_maker');
    $description = get_string('homeblocklabeldesc', 'theme_maker');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    /* Home Block 7 */   
    $name = 'theme_maker/homeblock7info';
    $heading = get_string('homeblock7info', 'theme_maker');
    $information = get_string('homeblock7desc', 'theme_maker');
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);
     
	$name = 'theme_maker/homeblock7title';
    $title = get_string('homeblocktitle', 'theme_maker');
    $description = get_string('homeblocktitledesc', 'theme_maker');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_maker/homeblock7image';
    $title = get_string('homeblockimage', 'theme_maker');
    $description = get_string('homeblockimagedesc', 'theme_maker');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'homeblock7image');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_maker/homeblock7content';
    $title = get_string('homeblockcontent', 'theme_maker');
    $description = get_string('homeblockcontentdesc', 'theme_maker');
    $default = '';
    $setting = new admin_setting_configtextarea($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_maker/homeblock7url';
    $title = get_string('homeblockurl', 'theme_maker');
    $description = get_string('homeblockbuttonurldesc', 'theme_maker');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);    
    
    $name = 'theme_maker/homeblock7label';
    $title = get_string('homeblocklabel', 'theme_maker');
    $description = get_string('homeblocklabeldesc', 'theme_maker');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    /* Home Block 8 */ 
    $name = 'theme_maker/homeblock8info';
    $heading = get_string('homeblock8info', 'theme_maker');
    $information = get_string('homeblock8desc', 'theme_maker');
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);
       
	$name = 'theme_maker/homeblock8title';
    $title = get_string('homeblocktitle', 'theme_maker');
    $description = get_string('homeblocktitledesc', 'theme_maker');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_maker/homeblock8image';
    $title = get_string('homeblockimage', 'theme_maker');
    $description = get_string('homeblockimagedesc', 'theme_maker');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'homeblock8image');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_maker/homeblock8content';
    $title = get_string('homeblockcontent', 'theme_maker');
    $description = get_string('homeblockcontentdesc', 'theme_maker');
    $default = '';
    $setting = new admin_setting_configtextarea($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_maker/homeblock8url';
    $title = get_string('homeblockurl', 'theme_maker');
    $description = get_string('homeblockbuttonurldesc', 'theme_maker');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);    
    
    $name = 'theme_maker/homeblock8label';
    $title = get_string('homeblocklabel', 'theme_maker');
    $description = get_string('homeblocklabeldesc', 'theme_maker');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    
     /* Home Block 9 */ 
     $name = 'theme_maker/homeblock9info';
    $heading = get_string('homeblock9info', 'theme_maker');
    $information = get_string('homeblock9desc', 'theme_maker');
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);
       
	$name = 'theme_maker/homeblock9title';
    $title = get_string('homeblocktitle', 'theme_maker');
    $description = get_string('homeblocktitledesc', 'theme_maker');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_maker/homeblock9image';
    $title = get_string('homeblockimage', 'theme_maker');
    $description = get_string('homeblockimagedesc', 'theme_maker');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'homeblock9image');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_maker/homeblock9content';
    $title = get_string('homeblockcontent', 'theme_maker');
    $description = get_string('homeblockcontentdesc', 'theme_maker');
    $default = '';
    $setting = new admin_setting_configtextarea($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_maker/homeblock9url';
    $title = get_string('homeblockurl', 'theme_maker');
    $description = get_string('homeblockbuttonurldesc', 'theme_maker');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);    
    
    $name = 'theme_maker/homeblock9label';
    $title = get_string('homeblocklabel', 'theme_maker');
    $description = get_string('homeblocklabeldesc', 'theme_maker');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
     
     /* Home Block 10 */ 
     $name = 'theme_maker/homeblock10info';
    $heading = get_string('homeblock10info', 'theme_maker');
    $information = get_string('homeblock10desc', 'theme_maker');
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);
       
	$name = 'theme_maker/homeblock10title';
    $title = get_string('homeblocktitle', 'theme_maker');
    $description = get_string('homeblocktitledesc', 'theme_maker');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_maker/homeblock10image';
    $title = get_string('homeblockimage', 'theme_maker');
    $description = get_string('homeblockimagedesc', 'theme_maker');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'homeblock10image');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_maker/homeblock10content';
    $title = get_string('homeblockcontent', 'theme_maker');
    $description = get_string('homeblockcontentdesc', 'theme_maker');
    $default = '';
    $setting = new admin_setting_configtextarea($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_maker/homeblock10url';
    $title = get_string('homeblockurl', 'theme_maker');
    $description = get_string('homeblockbuttonurldesc', 'theme_maker');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);    
    
    $name = 'theme_maker/homeblock10label';
    $title = get_string('homeblocklabel', 'theme_maker');
    $description = get_string('homeblocklabeldesc', 'theme_maker');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
     
     /* Home Block 11 */
     $name = 'theme_maker/homeblock11info';
    $heading = get_string('homeblock11info', 'theme_maker');
    $information = get_string('homeblock11desc', 'theme_maker');
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);
       
	$name = 'theme_maker/homeblock11title';
    $title = get_string('homeblocktitle', 'theme_maker');
    $description = get_string('homeblocktitledesc', 'theme_maker');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_maker/homeblock11image';
    $title = get_string('homeblockimage', 'theme_maker');
    $description = get_string('homeblockimagedesc', 'theme_maker');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'homeblock11image');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_maker/homeblock11content';
    $title = get_string('homeblockcontent', 'theme_maker');
    $description = get_string('homeblockcontentdesc', 'theme_maker');
    $default = '';
    $setting = new admin_setting_configtextarea($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_maker/homeblock11url';
    $title = get_string('homeblockurl', 'theme_maker');
    $description = get_string('homeblockbuttonurldesc', 'theme_maker');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);    
    
    $name = 'theme_maker/homeblock11label';
    $title = get_string('homeblocklabel', 'theme_maker');
    $description = get_string('homeblocklabeldesc', 'theme_maker');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
     
     /* Home Block 12 */
    $name = 'theme_maker/homeblock12info';
    $heading = get_string('homeblock12info', 'theme_maker');
    $information = get_string('homeblock12desc', 'theme_maker');
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);
       
	$name = 'theme_maker/homeblock12title';
    $title = get_string('homeblocktitle', 'theme_maker');
    $description = get_string('homeblocktitledesc', 'theme_maker');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_maker/homeblock12image';
    $title = get_string('homeblockimage', 'theme_maker');
    $description = get_string('homeblockimagedesc', 'theme_maker');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'homeblock12image');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_maker/homeblock12content';
    $title = get_string('homeblockcontent', 'theme_maker');
    $description = get_string('homeblockcontentdesc', 'theme_maker');
    $default = '';
    $setting = new admin_setting_configtextarea($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_maker/homeblock12url';
    $title = get_string('homeblockurl', 'theme_maker');
    $description = get_string('homeblockbuttonurldesc', 'theme_maker');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);    
    
    $name = 'theme_maker/homeblock12label';
    $title = get_string('homeblocklabel', 'theme_maker');
    $description = get_string('homeblocklabeldesc', 'theme_maker');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    
    
    // Add the page
    $settings->add($page);