<?php 
	
	
	defined('MOODLE_INTERNAL') || die();
	
	
	/* Header Section */
	$page = new admin_settingpage('theme_maker_header', get_string('headerheading', 'theme_maker'));
	
	
	/* Header Social Media Links */
	$page->add(new admin_setting_heading('theme_maker_headersocial', get_string('headersocialheadingsub', 'theme_maker'),
            format_text(get_string('headersocialdesc' , 'theme_maker'), FORMAT_MARKDOWN)));
            
    // Enable social media 
    $name = 'theme_maker/useheadersocial';
    $title = get_string('useheadersocial', 'theme_maker');
    $description = get_string('useheadersocialdesc', 'theme_maker');
    $default = true;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default, true, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    
    
    /* Header Alerts */
	$page->add(new admin_setting_heading('theme_maker_alerts', get_string('alertheadingsub', 'theme_maker'),
            format_text(get_string('alertdesc' , 'theme_maker'), FORMAT_MARKDOWN)));
    
    // Enable Alert 
    $name = 'theme_maker/usealert';
    $title = get_string('usealert', 'theme_maker');
    $description = get_string('usealertdesc', 'theme_maker');
    $default = false;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default, true, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    

    // Alert Content
    $name = 'theme_maker/alertcontent';
    $title = get_string('alertcontent', 'theme_maker');
    $description = get_string('alertcontentdesc', 'theme_maker');
    $default = '<p><strong>Alert content goes here!</strong> Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</p>';
    $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    
    // Alert background colour
    $name = 'theme_maker/alertbgcolor';
    $title = get_string('alertbgcolor', 'theme_maker');
    $description = get_string('alertbgcolordesc', 'theme_maker');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
        
    
    
    // Add the page
    $settings->add($page);