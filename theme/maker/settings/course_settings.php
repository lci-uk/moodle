<?php 
	
	
	defined('MOODLE_INTERNAL') || die();
	
	
	/* General Settings */
	$page = new admin_settingpage('theme_maker_course', get_string('courseheading', 'theme_maker'));
	
	/* Header Social Media Links */
	$page->add(new admin_setting_heading('theme_maker_course', get_string('courseheadingsub', 'theme_maker'),
            format_text(get_string('courseheadingsubdesc' , 'theme_maker'), FORMAT_MARKDOWN)));
            
    // Course List Display Style
    $name = 'theme_maker/coursedisplaystyle';
	$title = get_string('coursedisplaystyle', 'theme_maker');
	$description = get_string('coursedisplaystyledesc', 'theme_maker');;
	$default = '1';
	$choices = array(
		    '1' => 'Default',
		    '2' => 'Cards',
		    '3' => 'Masonry',
	);
	$setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
	$setting->set_updatedcallback('theme_reset_all_caches');
	$page->add($setting);
	
	
	// Enable Course Summary Trim
    $name = 'theme_maker/usecoursesummarytrim';
    $title = get_string('usecoursesummarytrim', 'theme_maker');
    $description = get_string('usecoursesummarytrimdesc', 'theme_maker');
    $default = true;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default, true, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

            
    // Course Summary length
    $name = 'theme_maker/coursesummarylength';
	$title = get_string('coursesummarylength', 'theme_maker');
	$description = get_string('coursesummarylengthdesc', 'theme_maker');;
	$default = '200';
	$choices = array(
		    '100' => '100',
		    '150' => '150',
	        '200' => '200',
	        '250' => '250',
	        '300' => '300',
	        '350' => '350',
	        '400' => '400',
	        '450' => '450',
	        '500' => '500',
	        '550' => '550',
	        '600' => '600',
	        '999999999999999999999' => 'Unlimited',
	    );
	$setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
	$setting->set_updatedcallback('theme_reset_all_caches');
	$page->add($setting);

	
	
	// Enable Course Header Image
    $name = 'theme_maker/usecourseheaderimage';
    $title = get_string('usecourseheaderimage', 'theme_maker');
    $description = get_string('usecourseheaderimagedesc', 'theme_maker');
    $default = true;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default, true, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    //Course Header Image Height
    $name = 'theme_maker/courseheaderimageheight';
	$title = get_string('courseheaderimageheight', 'theme_maker');
	$description = get_string('courseheaderimageheightdesc', 'theme_maker');;
	$default = '360px';
	$choices = array(
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
		    '520px' => '520px',
		    '530px' => '530px',
		    '540px' => '540px',
		    '560px' => '560px',
		    '580px' => '580px',
		    '600px' => '600px',
	    );
	$setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
	$setting->set_updatedcallback('theme_reset_all_caches');
	$page->add($setting);
	
    
    $settings->add($page);
