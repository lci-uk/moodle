<?php 
	
	
	defined('MOODLE_INTERNAL') || die();
	
	
	/* Footer Section */
	$page = new admin_settingpage('theme_maker_footer', get_string('footerheading', 'theme_maker'));
	
	/* Footer Social Media Links */
	$page->add(new admin_setting_heading('theme_maker_footersocial', get_string('footersocialheadingsub', 'theme_maker'),
            format_text(get_string('footersocialdesc' , 'theme_maker'), FORMAT_MARKDOWN)));
 
     // Enable social media 
    $name = 'theme_maker/usefootersocial';
    $title = get_string('usefootersocial', 'theme_maker');
    $description = get_string('usefootersocialdesc', 'theme_maker');
    $default = true;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default, true, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // Social Media Section Title
    $name = 'theme_maker/socialsectiontitle';
    $title = get_string('socialsectiontitle', 'theme_maker');
    $description = get_string('socialsectiontitledesc', 'theme_maker');
    $default = 'Connect With Us';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    
    /* Footer Blocks */
    $page->add(new admin_setting_heading('theme_maker_footerblocks', get_string('footerblocksheadingsub', 'theme_maker'),
            format_text(get_string('footerblocksdesc' , 'theme_maker'), FORMAT_MARKDOWN)));
    
    //Enable Footer Blocks.
    $name = 'theme_maker/usefooterblocks';
    $title = get_string('usefooterblocks', 'theme_maker');
    $description = get_string('usefooterblocksdesc', 'theme_maker');
    $default = false;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default, true, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
	
	//Footer Block One.
	$name = 'theme_maker/footerblock1';
    $title = get_string('footerblock1', 'theme_maker');
    $description = get_string('footerblock1desc', 'theme_maker');
    $default = '';
    $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    //Footer Block Two.
	$name = 'theme_maker/footerblock2';
    $title = get_string('footerblock2', 'theme_maker');
    $description = get_string('footerblock2desc', 'theme_maker');
    $default = '';
    $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    //Footer Block Three.
	$name = 'theme_maker/footerblock3';
    $title = get_string('footerblock3', 'theme_maker');
    $description = get_string('footerblock3desc', 'theme_maker');
    $default = '';
    $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    //Footer Block Four.
	$name = 'theme_maker/footerblock4';
    $title = get_string('footerblock4', 'theme_maker');
    $description = get_string('footerblock4desc', 'theme_maker');
    $default = '';
    $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    
    /* Footer Blocks */
    $page->add(new admin_setting_heading('theme_maker_footerwidget', get_string('footerwidgetheadingsub', 'theme_maker'),
            format_text(get_string('footerwidgetdesc' , 'theme_maker'), FORMAT_MARKDOWN)));
    
    
     // Enable footerwidget
    $name = 'theme_maker/usefooterwidget';
    $title = get_string('usefooterwidget', 'theme_maker');
    $description = get_string('usefooterwidgetdesc', 'theme_maker');
    $default = false;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default, true, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // Footerwidget title setting.
    $name = 'theme_maker/footerwidgettitle';
    $title = get_string('footerwidgettitle', 'theme_maker');
    $description = get_string('footerwidgettitledesc', 'theme_maker');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // Footerwidget setting.
    $name = 'theme_maker/footerwidget';
    $title = get_string('footerwidget', 'theme_maker');
    $description = get_string('footerwidgetdesc', 'theme_maker');
    $default = '';
    $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // Footer Copyright setting.
    $name = 'theme_maker/copyright';
    $title = get_string('copyright', 'theme_maker');
    $description = get_string('copyrightdesc', 'theme_maker');
    $default = 'Copyright &copy; Company Name';
    $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
           
            
    // Add the page
    $settings->add($page);