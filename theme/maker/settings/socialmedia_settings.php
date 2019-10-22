<?php 
	
	
	defined('MOODLE_INTERNAL') || die();
	
	
	/* Social Media Links */
	$page = new admin_settingpage('theme_maker_social', get_string('socialheading', 'theme_maker'));
	$page->add(new admin_setting_heading('theme_maker_socialmediaheadingsub', get_string('socialmediaheadingsub', 'theme_maker'),
            format_text(get_string('socialmediaheadingsubdesc' , 'theme_maker'), FORMAT_MARKDOWN)));

    
    // Social Media Section Title
    $name = 'theme_maker/socialsectiontitle';
    $title = get_string('socialsectiontitle', 'theme_maker');
    $description = get_string('socialsectiontitledesc', 'theme_maker');
    $default = 'Connect With Us';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    //Website url settings
    $name = 'theme_maker/website';
    $title = get_string('website', 'theme_maker');
    $description = get_string('websitedesc', 'theme_maker');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
            
    // Twitter url setting.
    $name = 'theme_maker/twitter';
    $title = get_string('twitter', 'theme_maker');
    $description = get_string('twitterdesc', 'theme_maker');
    $default = '#twitter-link';
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // Facebook url setting.
    $name = 'theme_maker/facebook';
    $title = get_string('facebook', 'theme_maker');
    $description = get_string('facebookdesc', 'theme_maker');
    $default = '#facebook-link';
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // Google+ url setting.
    $name = 'theme_maker/googleplus';
    $title = get_string('googleplus', 'theme_maker');
    $description = get_string('googleplusdesc', 'theme_maker');
    $default = '#google-link';
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // LinkedIn url setting.
    $name = 'theme_maker/linkedin';
    $title = get_string('linkedin', 'theme_maker');
    $description = get_string('linkedindesc', 'theme_maker');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // YouTube url setting.
    $name = 'theme_maker/youtube';
    $title = get_string('youtube', 'theme_maker');
    $description = get_string('youtubedesc', 'theme_maker');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // Vimeo url setting.
    $name = 'theme_maker/vimeo';
    $title = get_string('vimeo', 'theme_maker');
    $description = get_string('vimeodesc', 'theme_maker');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    
    // Instagram url setting.
    $name = 'theme_maker/instagram';
    $title = get_string('instagram', 'theme_maker');
    $description = get_string('instagramdesc', 'theme_maker');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    
    // Pinterest url setting.
    $name = 'theme_maker/pinterest';
    $title = get_string('pinterest', 'theme_maker');
    $description = get_string('pinterestdesc', 'theme_maker');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    
    // Flickr url setting.
    $name = 'theme_maker/flickr';
    $title = get_string('flickr', 'theme_maker');
    $description = get_string('flickrdesc', 'theme_maker');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);


    //Tumblr url setting.
    $name = 'theme_maker/tumblr';
    $title = get_string('tumblr', 'theme_maker');
    $description = get_string('tumblrdesc', 'theme_maker');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    //Slideshare url setting.
    $name = 'theme_maker/slideshare';
    $title = get_string('slideshare', 'theme_maker');
    $description = get_string('slidesharedesc', 'theme_maker');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // Skype account setting.
    $name = 'theme_maker/skype';
    $title = get_string('skype', 'theme_maker');
    $description = get_string('skypedesc', 'theme_maker');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    

    // Weibo account setting.
    $name = 'theme_maker/weibo';
    $title = get_string('weibo', 'theme_maker');
    $description = get_string('weibodesc', 'theme_maker');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // RSS url setting.
    $name = 'theme_maker/rss';
    $title = get_string('rss', 'theme_maker');
    $description = get_string('rssdesc', 'theme_maker');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
	
	
	/* Custom Social Media Links */
	$page->add(new admin_setting_heading('theme_maker_customsocial', get_string('customsocialheadingsub', 'theme_maker'),
            format_text(get_string('customsocialdesc' , 'theme_maker'), FORMAT_MARKDOWN)));
	
	// Custom social url setting 1.
	$name = 'theme_maker/social1';
	$title = get_string('sociallink', 'theme_maker');
	$description = get_string('sociallinkdesc', 'theme_maker');
	$default = '';
	$setting = new admin_setting_configtext($name, $title, $description, $default);
	$setting->set_updatedcallback('theme_reset_all_caches');
	$page->add($setting);
	
	// Social icon setting 1.
	$name = 'theme_maker/socialicon1';
	$title = get_string('sociallinkicon', 'theme_maker');
	$description = get_string('sociallinkicondesc', 'theme_maker');
	$default = '';
	$setting = new admin_setting_configtext($name, $title, $description, $default);
	$page->add($setting);

	
	// Custom social url setting 2.
	$name = 'theme_maker/social2';
	$title = get_string('sociallink', 'theme_maker');
	$description = get_string('sociallinkdesc', 'theme_maker');
	$default = '';
	$setting = new admin_setting_configtext($name, $title, $description, $default);
	$setting->set_updatedcallback('theme_reset_all_caches');
	$page->add($setting);
	
	// Social icon setting 2.
	$name = 'theme_maker/socialicon2';
	$title = get_string('sociallinkicon', 'theme_maker');
	$description = get_string('sociallinkicondesc', 'theme_maker');
	$default = '';
	$setting = new admin_setting_configtext($name, $title, $description, $default);
	$page->add($setting);
	
	// Custom social url setting 3.
	$name = 'theme_maker/social3';
	$title = get_string('sociallink', 'theme_maker');
	$description = get_string('sociallinkdesc', 'theme_maker');
	$default = '';
	$setting = new admin_setting_configtext($name, $title, $description, $default);
	$setting->set_updatedcallback('theme_reset_all_caches');
	$page->add($setting);
	
	// Social icon setting 3.
	$name = 'theme_maker/socialicon3';
	$title = get_string('sociallinkicon', 'theme_maker');
	$description = get_string('sociallinkicondesc', 'theme_maker');
	$default = '';
	$setting = new admin_setting_configtext($name, $title, $description, $default);
	$page->add($setting);

	
	
	
	// Add the page
    $settings->add($page);