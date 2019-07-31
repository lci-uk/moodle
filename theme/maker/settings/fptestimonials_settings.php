<?php
	
	defined('MOODLE_INTERNAL') || die();
	
    /* Frontpage Testimonials */
   
	$page = new admin_settingpage('theme_maker_testimonials', get_string('testimonialsheading', 'theme_maker'));
	$page->add(new admin_setting_heading('theme_maker_testimonialsheadingsub', get_string('testimonialsheadingsub', 'theme_maker'),
            format_text(get_string('testimonialsheadingsubdesc' , 'theme_maker'), FORMAT_MARKDOWN)));
    
    // Enable Testimonials section
    $name = 'theme_maker/usetestimonials';
    $title = get_string('usetestimonials', 'theme_maker');
    $description = get_string('usetestimonialsdesc', 'theme_maker');
    $default = true;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default, true, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    
    // Testimonial Section Title
    $name = 'theme_maker/testimonialsectiontitle';
    $title = get_string('testimonialsectiontitle', 'theme_maker');
    $description = get_string('testimonialsectiontitledesc', 'theme_maker');
    $default = 'What are people saying';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    //Testimonial Item Height
    $name = 'theme_maker/testimonialitemheight';
	$title = get_string('testimonialitemheight', 'theme_maker');
	$description = get_string('testimonialitemheightdesc', 'theme_maker');;
	$default = 'auto';
	$choices = array(
		    'auto' => 'auto',
		    '200px' => '200px',
	        '220px' => '220px',
	        '240px' => '240px',
	        '260px' => '260px',
	        '280px' => '280px',
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
    
    
    /* Testimonial 1 */
    
    // Description for Testimonial 1
    $name = 'theme_maker/testimonial1info';
    $heading = get_string('testimonial1', 'theme_maker');
    $information = get_string('testimonial1desc', 'theme_maker');
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);
    
    // Testimonial Image 
    $name = 'theme_maker/testimonial1image';
    $title = get_string('testimonialimage', 'theme_maker');
    $description = get_string('testimonialimagedesc', 'theme_maker');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'testimonial1image');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // Testimonial Profile Name
    $name = 'theme_maker/testimonial1name';
    $title = get_string('testimonialname', 'theme_maker');
    $description = get_string('testimonialnamedesc', 'theme_maker');
    $default = 'James Chapman';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // Testimonial Profile Meta
    $name = 'theme_maker/testimonial1meta';
    $title = get_string('testimonialmeta', 'theme_maker');
    $description = get_string('testimonialmetadesc', 'theme_maker');
    $default = 'London, UK';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // Testimonial Content 
    $name = 'theme_maker/testimonial1content';
    $title = get_string('testimonialcontent', 'theme_maker');
    $description = get_string('testimonialcontentdesc', 'theme_maker');
    $default = '<p>Testimonial 1 goes here. You can add up to 6 testimonials. Lorem ipsum dolor sit amet consectetur adipiscing elit. Integer suscipit, elit sed placerat aliquam, velit nulla semper lectus.</p>';
    $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    /* Testimonial 2 */
    
    // Description for Testimonial 2
    $name = 'theme_maker/testimonial2info';
    $heading = get_string('testimonial2', 'theme_maker');
    $information = get_string('testimonial2desc', 'theme_maker');
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);
    
    // Testimonial Image 
    $name = 'theme_maker/testimonial2image';
    $title = get_string('testimonialimage', 'theme_maker');
    $description = get_string('testimonialimagedesc', 'theme_maker');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'testimonial2image');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // Testimonial Profile Name
    $name = 'theme_maker/testimonial2name';
    $title = get_string('testimonialname', 'theme_maker');
    $description = get_string('testimonialnamedesc', 'theme_maker');
    $default = 'Olivia Castro';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // Testimonial Profile Meta
    $name = 'theme_maker/testimonial2meta';
    $title = get_string('testimonialmeta', 'theme_maker');
    $description = get_string('testimonialmetadesc', 'theme_maker');
    $default = 'San Francisco, US';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // Testimonial Content 
    $name = 'theme_maker/testimonial2content';
    $title = get_string('testimonialcontent', 'theme_maker');
    $description = get_string('testimonialcontentdesc', 'theme_maker');
    $default = '<p>Testimonial 2 goes here. You can add up to 6 testimonials. Lorem ipsum dolor sit amet consectetur adipiscing elit. Integer suscipit, elit sed placerat aliquam, velit nulla semper lectus.</p>';
    $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    /* Testimonial 3 */
    
    // Description for Testimonial 3
    $name = 'theme_maker/testimonial3info';
    $heading = get_string('testimonial3', 'theme_maker');
    $information = get_string('testimonial3desc', 'theme_maker');
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);
    
    // Testimonial Image 
    $name = 'theme_maker/testimonial3image';
    $title = get_string('testimonialimage', 'theme_maker');
    $description = get_string('testimonialimagedesc', 'theme_maker');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'testimonial3image');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // Testimonial Profile Name
    $name = 'theme_maker/testimonial3name';
    $title = get_string('testimonialname', 'theme_maker');
    $description = get_string('testimonialnamedesc', 'theme_maker');
    $default = 'Jason Lee';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // Testimonial Profile Meta
    $name = 'theme_maker/testimonial3meta';
    $title = get_string('testimonialmeta', 'theme_maker');
    $description = get_string('testimonialmetadesc', 'theme_maker');
    $default = 'Berlin, Germany';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // Testimonial Content 
    $name = 'theme_maker/testimonial3content';
    $title = get_string('testimonialcontent', 'theme_maker');
    $description = get_string('testimonialcontentdesc', 'theme_maker');
    $default = '<p>Testimonial 3 goes here. You can add up to 6 testimonials. Lorem ipsum dolor sit amet consectetur adipiscing elit. Integer suscipit, elit sed placerat aliquam, velit nulla semper lectus.</p>';
    $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    /* Testimonial 4 */
    
    // Description for Testimonial 4
    $name = 'theme_maker/testimonial4info';
    $heading = get_string('testimonial4', 'theme_maker');
    $information = get_string('testimonial4desc', 'theme_maker');
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);
    
    // Testimonial Image 
    $name = 'theme_maker/testimonial4image';
    $title = get_string('testimonialimage', 'theme_maker');
    $description = get_string('testimonialimagedesc', 'theme_maker');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'testimonial4image');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // Testimonial Profile Name
    $name = 'theme_maker/testimonial4name';
    $title = get_string('testimonialname', 'theme_maker');
    $description = get_string('testimonialnamedesc', 'theme_maker');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // Testimonial Profile Meta
    $name = 'theme_maker/testimonial4meta';
    $title = get_string('testimonialmeta', 'theme_maker');
    $description = get_string('testimonialmetadesc', 'theme_maker');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    
    // Testimonial Content 
    $name = 'theme_maker/testimonial4content';
    $title = get_string('testimonialcontent', 'theme_maker');
    $description = get_string('testimonialcontentdesc', 'theme_maker');
    $default = '';
    $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    
    /* Testimonial 5 */
    
    // Description for Testimonial 5
    $name = 'theme_maker/testimonial5info';
    $heading = get_string('testimonial5', 'theme_maker');
    $information = get_string('testimonial5desc', 'theme_maker');
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);
    
    // Testimonial Image 
    $name = 'theme_maker/testimonial5image';
    $title = get_string('testimonialimage', 'theme_maker');
    $description = get_string('testimonialimagedesc', 'theme_maker');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'testimonial5image');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // Testimonial Profile Name
    $name = 'theme_maker/testimonial5name';
    $title = get_string('testimonialname', 'theme_maker');
    $description = get_string('testimonialnamedesc', 'theme_maker');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // Testimonial Profile Meta
    $name = 'theme_maker/testimonial5meta';
    $title = get_string('testimonialmeta', 'theme_maker');
    $description = get_string('testimonialmetadesc', 'theme_maker');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // Testimonial Content 
    $name = 'theme_maker/testimonial5content';
    $title = get_string('testimonialcontent', 'theme_maker');
    $description = get_string('testimonialcontentdesc', 'theme_maker');
    $default = '';
    $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    /* Testimonial 6 */
    
    // Description for Testimonial 6
    $name = 'theme_maker/testimonial6info';
    $heading = get_string('testimonial6', 'theme_maker');
    $information = get_string('testimonial6desc', 'theme_maker');
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);
    
    // Testimonial Image 
    $name = 'theme_maker/testimonial6image';
    $title = get_string('testimonialimage', 'theme_maker');
    $description = get_string('testimonialimagedesc', 'theme_maker');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'testimonial6image');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // Testimonial Profile Name
    $name = 'theme_maker/testimonial6name';
    $title = get_string('testimonialname', 'theme_maker');
    $description = get_string('testimonialnamedesc', 'theme_maker');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // Testimonial Profile Title
    $name = 'theme_maker/testimonial6meta';
    $title = get_string('testimonialmeta', 'theme_maker');
    $description = get_string('testimonialmetadesc', 'theme_maker');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // Testimonial Content 
    $name = 'theme_maker/testimonial6content';
    $title = get_string('testimonialcontent', 'theme_maker');
    $description = get_string('testimonialcontentdesc', 'theme_maker');
    $default = '';
    $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // Add the page
    $settings->add($page);