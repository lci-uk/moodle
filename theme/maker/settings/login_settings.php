<?php 
	
	
	defined('MOODLE_INTERNAL') || die();
	
	
	/* Advanced Settings */
	$page = new admin_settingpage('theme_maker_login', get_string('loginheading', 'theme_maker'));
	$page->add(new admin_setting_heading('theme_maker_loginheadingsub', get_string('loginheadingsub', 'theme_maker'),
            format_text(get_string('loginheadingsubdesc' , 'theme_maker'), FORMAT_MARKDOWN)));

    
    // Login page background image
    $name = 'theme_maker/loginbgimage';
    $title = get_string('loginbgimage', 'theme_maker');
    $description = get_string('loginbgimagedesc', 'theme_maker');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'loginbgimage');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    
     // Use background mask
    $name = 'theme_maker/useloginbgmask';
    $title = get_string('useloginbgmask', 'theme_maker');
    $description = get_string('useloginbgmaskdesc', 'theme_maker');
    $default = true;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default, true, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    
    // Add the page
    $settings->add($page);