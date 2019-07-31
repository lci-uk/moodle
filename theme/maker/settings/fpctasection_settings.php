 <?php   
    
    
    
    defined('MOODLE_INTERNAL') || die();
	
	/* Frontpage CTA Section */
	$page = new admin_settingpage('theme_maker_ctasection', get_string('ctasectionheading', 'theme_maker'));
	$page->add(new admin_setting_heading('theme_maker_ctasectionheadingsub', get_string('ctasectionheadingsub', 'theme_maker'),
            format_text(get_string('ctasectionheadingsubdesc' , 'theme_maker'), FORMAT_MARKDOWN)));
    
    // Enable CTA Section
    $name = 'theme_maker/usectasection';
    $title = get_string('usectasection', 'theme_maker');
    $description = get_string('usectasectiondesc', 'theme_maker');
    $default = true;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default, true, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // CTA Section Title
    $name = 'theme_maker/ctasectiontitle';
    $title = get_string('ctasectiontitle', 'theme_maker');
    $description = get_string('ctasectiontitledesc', 'theme_maker');
    $default = 'Ready to learn new skills online?';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // CTA Section Content
    $name = 'theme_maker/ctasectioncontent';
    $title = get_string('ctasectioncontent', 'theme_maker');
    $description = get_string('ctasectioncontentdesc', 'theme_maker');
    $default = '<p>You can access your courses on your computer, mobile or tablets. This is the perfect training solution for businesses, universities, government, and more. Lorem ipsum dolor sit amet, consectetuer adipiscing elit <a href="#">link example</a> aenean commodo ligula eget dolor.</p>';
    $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // CTA Section CTA Button Text
    $name = 'theme_maker/ctasectionbuttontext';
    $title = get_string('ctasectionbuttontext', 'theme_maker');
    $description = get_string('ctasectionbuttontextdesc', 'theme_maker');
    $default = 'Join Now';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // CTA Section CTA Button URL
    $name = 'theme_maker/ctasectionbuttonurl';
    $title = get_string('ctasectionbuttonurl', 'theme_maker');
    $description = get_string('ctasectionbuttonurldesc', 'theme_maker');
    $default = '#link';
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // URL open in new window    
    $name = 'theme_maker/ctasectionbuttonurlopennew';
    $title = get_string('opennew', 'theme_maker');
    $description = get_string('opennewdesc', 'theme_maker');
    $default = false;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default, true, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
        
    // Add the page
    $settings->add($page);