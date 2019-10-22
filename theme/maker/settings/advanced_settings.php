<?php 
	
	
	defined('MOODLE_INTERNAL') || die();
	
	
	/* Advanced Settings */
	$page = new admin_settingpage('theme_maker_advanced', get_string('advancedheading', 'theme_maker'));

	
	/* Custom SCSS & CSS */
	$page->add(new admin_setting_heading('theme_maker_customcss', get_string('customcssheadingsub', 'theme_maker'),
            format_text(get_string('customcssdesc' , 'theme_maker'), FORMAT_MARKDOWN)));
       
    // Raw SCSS to include before the content.
    $setting = new admin_setting_scsscode('theme_maker/scsspre',
        get_string('rawscsspre', 'theme_maker'), get_string('rawscsspre_desc', 'theme_maker'), '', PARAM_RAW);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Raw SCSS to include after the content.
    $setting = new admin_setting_scsscode('theme_maker/scss', get_string('rawscss', 'theme_maker'),
        get_string('rawscss_desc', 'theme_maker'), '', PARAM_RAW);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    /* Analytics Settings */
	$page->add(new admin_setting_heading('theme_maker_analytics', get_string('analyticsheadingsub', 'theme_maker'),
            format_text(get_string('analyticsdesc' , 'theme_maker'), FORMAT_MARKDOWN)));
    
    
    // Google Analytics ID
    $name = 'theme_maker/analyticsid';
    $title = get_string('analyticsid', 'theme_maker');
    $description = get_string('analyticsiddesc', 'theme_maker');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    
    /* iOS Homescreen Icons */
            
    //Description for iOS Icons
    $name = 'theme_maker/iosiconinfo';
    $heading = get_string('iosicon', 'theme_maker');
    $information = get_string('iosicondesc', 'theme_maker');
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);
    
    // iPhone Icon.
    $name = 'theme_maker/iphoneicon';
    $title = get_string('iphoneicon', 'theme_maker');
    $description = get_string('iphoneicondesc', 'theme_maker');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'iphoneicon');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // iPhone Retina Icon.
    $name = 'theme_maker/iphoneretinaicon';
    $title = get_string('iphoneretinaicon', 'theme_maker');
    $description = get_string('iphoneretinaicondesc', 'theme_maker');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'iphoneretinaicon');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // iPad Icon.
    $name = 'theme_maker/ipadicon';
    $title = get_string('ipadicon', 'theme_maker');
    $description = get_string('ipadicondesc', 'theme_maker');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'ipadicon');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // iPad Retina Icon.
    $name = 'theme_maker/ipadretinaicon';
    $title = get_string('ipadretinaicon', 'theme_maker');
    $description = get_string('ipadretinaicondesc', 'theme_maker');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'ipadretinaicon');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    
    
    
    $settings->add($page);