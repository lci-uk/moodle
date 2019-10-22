<?php 
	
	
	defined('MOODLE_INTERNAL') || die();
	
	/* Frontpage Hero Slideshow Settings */
    $page = new admin_settingpage('theme_maker_slideshow', get_string('slideshowheading', 'theme_maker'));
    
    $page->add(new admin_setting_heading('theme_maker_slideshowheadingsub', get_string('slideshowheadingsub', 'theme_maker'),
            format_text(get_string('slideshowheadingsubdesc' , 'theme_maker'), FORMAT_MARKDOWN)));


    // Enable Hero Slideshow    
    $name = 'theme_maker/useheroslideshow';
    $title = get_string('useheroslideshow', 'theme_maker');
    $description = get_string('useheroslideshowdesc', 'theme_maker');
    $default = true;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default, true, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    
    // Enable Hero Slideshow Course Search   
    $name = 'theme_maker/usesearch';
    $title = get_string('usesearch', 'theme_maker');
    $description = get_string('usesearchdesc', 'theme_maker');
    $default = false;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default, true, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    
    //Hero Slideshow Item Height
    $name = 'theme_maker/slideshowheight';
	$title = get_string('slideshowheight', 'theme_maker');
	$description = get_string('slideshowheightdesc', 'theme_maker');;
	$default = '460px';
	$choices = array(
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
    
    
    // Hero Headline
    $name = 'theme_maker/heroheadline';
    $title = get_string('heroheadline', 'theme_maker');
    $description = get_string('heroheadlinedesc', 'theme_maker');
    $default = 'Learn new skills online <br> anytime anywhere';
    $setting = new admin_setting_confightmleditor($name, $title, $description, $default);    
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    
    // Hero Summary
    $name = 'theme_maker/herosummary';
    $title = get_string('herosummary', 'theme_maker');
    $description = get_string('herosummarydesc', 'theme_maker');
    $default = 'Get unlimited access to 2000+ courses';
    $setting = new admin_setting_confightmleditor($name, $title, $description, $default);    
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Hero CTA
    $name = 'theme_maker/herocta';
    $title = get_string('herocta', 'theme_maker');
    $description = get_string('heroctadesc', 'theme_maker');
    $default = 'Join Now';
    $setting = new admin_setting_configtext($name, $title, $description, $default);    
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Hero CTA URL.
    $name = 'theme_maker/herourl';
    $title = get_string('herourl', 'theme_maker');
    $description = get_string('herourldesc', 'theme_maker');
    $default = '#link';
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // URL open in new window    
    $name = 'theme_maker/herourlopennew';
    $title = get_string('opennew', 'theme_maker');
    $description = get_string('opennewdesc', 'theme_maker');
    $default = false;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default, true, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    //Enable Hero Video
    $name = 'theme_maker/useherovideo';
    $title = get_string('useherovideo', 'theme_maker');
    $description = get_string('useherovideodesc', 'theme_maker');
    $default = false;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default, true, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // Hero Video Link Text
    $name = 'theme_maker/herovideo';
    $title = get_string('herovideo', 'theme_maker');
    $description = get_string('herovideodesc', 'theme_maker');
    $default = 'Watch video';
    $setting = new admin_setting_configtext($name, $title, $description, $default);    
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    //Hero Video Type Switcher
    $name = 'theme_maker/herovideoswitcher';
    $title = get_string('herovideoswitcher', 'theme_maker');
    $description = get_string('herovideoswitcherdesc', 'theme_maker');
    $default = '1';
    $choices = array(
        '1' => 'YouTube Video',
        '2' => 'Vimeo Video'
    );
    $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    
    //Hero Video ID
    $name = 'theme_maker/herovideoid';
    $title = get_string('herovideoid', 'theme_maker');
    $description = get_string('herovideoiddesc', 'theme_maker');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);    
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);



    /* Slide 1 */

    // Description for Slide 1
    $name = 'theme_maker/slide1info';
    $heading = get_string('slide1', 'theme_maker');
    $information = get_string('slideinfodesc', 'theme_maker');
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);

    // Image
    $name = 'theme_maker/slide1image';
    $title = get_string('slideimage', 'theme_maker');
    $description = get_string('slideimagedesc', 'theme_maker');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'slide1image');
    $setting->set_updatedcallback('theme_reset_all_caches');    
    $page->add($setting);


    /* Slide 2 */
     
    // Description for Slide 2
    $name = 'theme_maker/slide2info';
    $heading = get_string('slide2', 'theme_maker');
    $information = get_string('slideinfodesc', 'theme_maker');
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);

    // Image
    $name = 'theme_maker/slide2image';
    $title = get_string('slideimage', 'theme_maker');
    $description = get_string('slideimagedesc', 'theme_maker');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'slide2image');
    $setting->set_updatedcallback('theme_reset_all_caches');    
    $page->add($setting);

    
    /* Slide 3 */
     
    // Description for Slide 3
    $name = 'theme_maker/slide3info';
    $heading = get_string('slide3', 'theme_maker');
    $information = get_string('slideinfodesc', 'theme_maker');
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);

    // Image
    $name = 'theme_maker/slide3image';
    $title = get_string('slideimage', 'theme_maker');
    $description = get_string('slideimagedesc', 'theme_maker');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'slide3image');
    $setting->set_updatedcallback('theme_reset_all_caches');    
    $page->add($setting);
    
    /* Slide 4 */
     
    // Description for Slide 4
    $name = 'theme_maker/slide4info';
    $heading = get_string('slide4', 'theme_maker');
    $information = get_string('slideinfodesc', 'theme_maker');
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);

    // Image
    $name = 'theme_maker/slide4image';
    $title = get_string('slideimage', 'theme_maker');
    $description = get_string('slideimagedesc', 'theme_maker');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'slide4image');
    $setting->set_updatedcallback('theme_reset_all_caches');    
    $page->add($setting);

    
    // Add the page
    $settings->add($page);