<?php 
	
	
	defined('MOODLE_INTERNAL') || die();
	
	
	/* Frontpage Logos */
	$page = new admin_settingpage('theme_maker_logos', get_string('logosheading', 'theme_maker'));
	$page->add(new admin_setting_heading('theme_maker_logosheadingsub', get_string('logosheadingsub', 'theme_maker'),
            format_text(get_string('logosheadingsubdesc' , 'theme_maker'), FORMAT_MARKDOWN)));
    
    // Enable logos Section
    $name = 'theme_maker/uselogos';
    $title = get_string('uselogos', 'theme_maker');
    $description = get_string('uselogosdesc', 'theme_maker');
    $default = false;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default, true, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // Logos Section Title
    $name = 'theme_maker/logossectiontitle';
    $title = get_string('logossectiontitle', 'theme_maker');
    $description = get_string('logossectiontitledesc', 'theme_maker');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    
    /* Logo 1 */
    
    // Description for logo One
    $name = 'theme_maker/logo1info';
    $heading = get_string('logo1', 'theme_maker');
    $information = get_string('logo1desc', 'theme_maker');
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);
    
    
    // Logo Image 
    
    $name = 'theme_maker/logo1image';
    $title = get_string('logoimage', 'theme_maker');
    $description = get_string('logoimagedesc', 'theme_maker');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'logo1image');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    
    //logo Image Alt Text
    $name = 'theme_maker/logo1alttext';
    $title = get_string('logoalttext', 'theme_maker');
    $description = get_string('logoalttextdesc', 'theme_maker');
    $default = 'logo';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    

    // Logo URL
    $name = 'theme_maker/logo1url';
    $title = get_string('logourl', 'theme_maker');
    $description = get_string('logourldesc', 'theme_maker');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    
    /* Logo 2 */
    
    // Description for logo Two
    $name = 'theme_maker/logo2info';
    $heading = get_string('logo2', 'theme_maker');
    $information = get_string('logo2desc', 'theme_maker');
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);
    
    // Logo Image 
    $name = 'theme_maker/logo2image';
    $title = get_string('logoimage', 'theme_maker');
    $description = get_string('logoimagedesc', 'theme_maker');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'logo2image');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    //logo Image Alt Text
    $name = 'theme_maker/logo2alttext';
    $title = get_string('logoalttext', 'theme_maker');
    $description = get_string('logoalttextdesc', 'theme_maker');
    $default = 'logo';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Logo URL
    $name = 'theme_maker/logo2url';
    $title = get_string('logourl', 'theme_maker');
    $description = get_string('logourldesc', 'theme_maker');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    
    /* Logo 3 */
    
    // Description for logo Three
    $name = 'theme_maker/logo3info';
    $heading = get_string('logo3', 'theme_maker');
    $information = get_string('logo3desc', 'theme_maker');
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);
    
    // Logo Image 
    $name = 'theme_maker/logo3image';
    $title = get_string('logoimage', 'theme_maker');
    $description = get_string('logoimagedesc', 'theme_maker');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'logo3image');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    //logo Image Alt Text
    $name = 'theme_maker/logo3alttext';
    $title = get_string('logoalttext', 'theme_maker');
    $description = get_string('logoalttextdesc', 'theme_maker');
    $default = 'logo';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Logo URL
    $name = 'theme_maker/logo3url';
    $title = get_string('logourl', 'theme_maker');
    $description = get_string('logourldesc', 'theme_maker');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    /* Logo 4 */
    
    // Description for logo Four
    $name = 'theme_maker/logo4info';
    $heading = get_string('logo4', 'theme_maker');
    $information = get_string('logo4desc', 'theme_maker');
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);
    
    // Logo Image 
    $name = 'theme_maker/logo4image';
    $title = get_string('logoimage', 'theme_maker');
    $description = get_string('logoimagedesc', 'theme_maker');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'logo4image');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    //logo Image Alt Text
    $name = 'theme_maker/logo4alttext';
    $title = get_string('logoalttext', 'theme_maker');
    $description = get_string('logoalttextdesc', 'theme_maker');
    $default = 'logo';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Logo URL
    $name = 'theme_maker/logo4url';
    $title = get_string('logourl', 'theme_maker');
    $description = get_string('logourldesc', 'theme_maker');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    /* Logo 5 */
    
    // Description for logo Five
    $name = 'theme_maker/logo5info';
    $heading = get_string('logo5', 'theme_maker');
    $information = get_string('logo5desc', 'theme_maker');
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);
    
    // Logo Image 
    $name = 'theme_maker/logo5image';
    $title = get_string('logoimage', 'theme_maker');
    $description = get_string('logoimagedesc', 'theme_maker');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'logo5image');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    //logo Image Alt Text
    $name = 'theme_maker/logo5alttext';
    $title = get_string('logoalttext', 'theme_maker');
    $description = get_string('logoalttextdesc', 'theme_maker');
    $default = 'logo';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Logo URL
    $name = 'theme_maker/logo5url';
    $title = get_string('logourl', 'theme_maker');
    $description = get_string('logourldesc', 'theme_maker');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    /* Logo 6 */
    
    // Description for logo Six
    $name = 'theme_maker/logo6info';
    $heading = get_string('logo6', 'theme_maker');
    $information = get_string('logo6desc', 'theme_maker');
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);
    
    // Logo Image 
    $name = 'theme_maker/logo6image';
    $title = get_string('logoimage', 'theme_maker');
    $description = get_string('logoimagedesc', 'theme_maker');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'logo6image');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    //logo Image Alt Text
    $name = 'theme_maker/logo6alttext';
    $title = get_string('logoalttext', 'theme_maker');
    $description = get_string('logoalttextdesc', 'theme_maker');
    $default = 'logo';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Logo URL
    $name = 'theme_maker/logo6url';
    $title = get_string('logourl', 'theme_maker');
    $description = get_string('logourldesc', 'theme_maker');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
	
	
	// Add the page
    $settings->add($page);