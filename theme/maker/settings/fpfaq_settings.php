<?php 
	
	
	defined('MOODLE_INTERNAL') || die();
	
	
	/* Frontpage FAQ  */
	$page = new admin_settingpage('theme_maker_faq', get_string('faqheading', 'theme_maker'));
	
	$page->add(new admin_setting_heading('theme_maker_faqheadingsub', get_string('faqheadingsub', 'theme_maker'),
            format_text(get_string('faqheadingsubdesc' , 'theme_maker'), FORMAT_MARKDOWN)));
    
    // Enable FAQ Section
    $name = 'theme_maker/usefaq';
    $title = get_string('usefaq', 'theme_maker');
    $description = get_string('usefaqdesc', 'theme_maker');
    $default = true;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default, true, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // FAQ Section Title
    $name = 'theme_maker/faqsectiontitle';
    $title = get_string('faqsectiontitle', 'theme_maker');
    $description = get_string('faqsectiontitledesc', 'theme_maker');
    $default = 'Frequently Asked Questions';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    
    // FAQ 1
    
    // Description
    $name = 'theme_maker/faq1info';
    $heading = get_string('faq1info', 'theme_maker');
    $information = get_string('faq1desc', 'theme_maker');
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);
   
    
    // Question
    $name = 'theme_maker/faq1title';
    $title = get_string('faq1title', 'theme_maker');
    $description = get_string('faq1titledesc', 'theme_maker');
    $default = 'Question one heading goes here?';
    $setting = new admin_setting_configtext($name, $title, $description, $default);    
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // Answer
    $name = 'theme_maker/faq1content';
    $title = get_string('faq1content', 'theme_maker');
    $description = get_string('faq1contentdesc', 'theme_maker');
    $default = '<p>Answer 1 goes here. You can add up to 10 FAQs. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et <a href="#link">link example</a> magnis dis parturient montes, nascetur ridiculus mus. </p>';
    $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
   
	// FAQ 2
	// Description
    $name = 'theme_maker/faq2info';
    $heading = get_string('faq2info', 'theme_maker');
    $information = get_string('faq2desc', 'theme_maker');
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);
   
    
    // Question
    $name = 'theme_maker/faq2title';
    $title = get_string('faq2title', 'theme_maker');
    $description = get_string('faq2titledesc', 'theme_maker');
    $default = 'Question two heading goes here?';
    $setting = new admin_setting_configtext($name, $title, $description, $default);    
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // Answer
    $name = 'theme_maker/faq2content';
    $title = get_string('faq2content', 'theme_maker');
    $description = get_string('faq2contentdesc', 'theme_maker');
    $default = '<p>Answer 2 goes here. You can add up to 10 FAQs. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et <a href="#link">link example</a> magnis dis parturient montes, nascetur ridiculus mus. </p>';
    $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
	
	// FAQ 3
	// Description
    $name = 'theme_maker/faq3info';
    $heading = get_string('faq3info', 'theme_maker');
    $information = get_string('faq3desc', 'theme_maker');
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);
   
    
    // Question
    $name = 'theme_maker/faq3title';
    $title = get_string('faq3title', 'theme_maker');
    $description = get_string('faq3titledesc', 'theme_maker');
    $default = 'Question three heading goes here?';
    $setting = new admin_setting_configtext($name, $title, $description, $default);    
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // Answer
    $name = 'theme_maker/faq3content';
    $title = get_string('faq3content', 'theme_maker');
    $description = get_string('faq3contentdesc', 'theme_maker');
    $default = '<p>Answer 3 goes here. You can add up to 10 FAQs. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et <a href="#link">link example</a> magnis dis parturient montes, nascetur ridiculus mus. </p>';
    $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
	
	// FAQ 4
	// Description
    $name = 'theme_maker/faq4info';
    $heading = get_string('faq4info', 'theme_maker');
    $information = get_string('faq4desc', 'theme_maker');
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);
   
    
    // Question
    $name = 'theme_maker/faq4title';
    $title = get_string('faq4title', 'theme_maker');
    $description = get_string('faq4titledesc', 'theme_maker');
    $default = 'Question four heading goes here?';
    $setting = new admin_setting_configtext($name, $title, $description, $default);    
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // Answer
    $name = 'theme_maker/faq4content';
    $title = get_string('faq4content', 'theme_maker');
    $description = get_string('faq4contentdesc', 'theme_maker');
    $default = '<p>Answer 4 goes here. You can add up to 10 FAQs. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et <a href="#link">link example</a> magnis dis parturient montes, nascetur ridiculus mus. </p>';
    $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
	
	// FAQ 5
	// Description
    $name = 'theme_maker/faq5info';
    $heading = get_string('faq5info', 'theme_maker');
    $information = get_string('faq5desc', 'theme_maker');
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);
   
    
    // Question
    $name = 'theme_maker/faq5title';
    $title = get_string('faq5title', 'theme_maker');
    $description = get_string('faq5titledesc', 'theme_maker');
    $default = 'Question five heading goes here?';
    $setting = new admin_setting_configtext($name, $title, $description, $default);    
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // Answer
    $name = 'theme_maker/faq5content';
    $title = get_string('faq5content', 'theme_maker');
    $description = get_string('faq5contentdesc', 'theme_maker');
    $default = '<p>Answer 5 goes here. You can add up to 10 FAQs. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et <a href="#link">link example</a> magnis dis parturient montes, nascetur ridiculus mus. </p>';
    $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
	
	// FAQ 6
	// Description
    $name = 'theme_maker/faq6info';
    $heading = get_string('faq6info', 'theme_maker');
    $information = get_string('faq6desc', 'theme_maker');
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);
   
    
    // Question
    $name = 'theme_maker/faq6title';
    $title = get_string('faq6title', 'theme_maker');
    $description = get_string('faq6titledesc', 'theme_maker');
    $default = 'Question six heading goes here?';
    $setting = new admin_setting_configtext($name, $title, $description, $default);    
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // Answer
    $name = 'theme_maker/faq6content';
    $title = get_string('faq6content', 'theme_maker');
    $description = get_string('faq6contentdesc', 'theme_maker');
    $default = '<p>Answer 6 goes here. You can add up to 10 FAQs. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et <a href="#link">link example</a> magnis dis parturient montes, nascetur ridiculus mus. </p>';
    $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
	
	// FAQ 7
	// Description
    $name = 'theme_maker/faq7info';
    $heading = get_string('faq7info', 'theme_maker');
    $information = get_string('faq7desc', 'theme_maker');
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);
   
    
    // Question
    $name = 'theme_maker/faq7title';
    $title = get_string('faq7title', 'theme_maker');
    $description = get_string('faq7titledesc', 'theme_maker');
    $default = 'Question seven heading goes here?';
    $setting = new admin_setting_configtext($name, $title, $description, $default);    
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // Answer
    $name = 'theme_maker/faq7content';
    $title = get_string('faq7content', 'theme_maker');
    $description = get_string('faq7contentdesc', 'theme_maker');
    $default = '<p>Answer 7 goes here. You can add up to 10 FAQs. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et <a href="#link">link example</a> magnis dis parturient montes, nascetur ridiculus mus. </p>';
    $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
	
	// FAQ 8
	// Description
    $name = 'theme_maker/faq8info';
    $heading = get_string('faq8info', 'theme_maker');
    $information = get_string('faq8desc', 'theme_maker');
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);
   
    
    // Question
    $name = 'theme_maker/faq8title';
    $title = get_string('faq8title', 'theme_maker');
    $description = get_string('faq8titledesc', 'theme_maker');
    $default = 'Question eight heading goes here?';
    $setting = new admin_setting_configtext($name, $title, $description, $default);    
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // Answer
    $name = 'theme_maker/faq8content';
    $title = get_string('faq8content', 'theme_maker');
    $description = get_string('faq8contentdesc', 'theme_maker');
    $default = '<p>Answer 8 goes here. You can add up to 10 FAQs. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et <a href="#link">link example</a> magnis dis parturient montes, nascetur ridiculus mus. </p>';
    $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
	
	// FAQ 9
	// Description
    $name = 'theme_maker/faq9info';
    $heading = get_string('faq9info', 'theme_maker');
    $information = get_string('faq9desc', 'theme_maker');
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);
   
    
    // Question
    $name = 'theme_maker/faq9title';
    $title = get_string('faq9title', 'theme_maker');
    $description = get_string('faq9titledesc', 'theme_maker');
    $default = 'Question nine heading goes here?';
    $setting = new admin_setting_configtext($name, $title, $description, $default);    
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // Answer
    $name = 'theme_maker/faq9content';
    $title = get_string('faq9content', 'theme_maker');
    $description = get_string('faq9contentdesc', 'theme_maker');
    $default = '<p>Answer 9 goes here. You can add up to 10 FAQs. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et <a href="#link">link example</a> magnis dis parturient montes, nascetur ridiculus mus. </p>';
    $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
	
	// FAQ 10
	// Description
    $name = 'theme_maker/faq10info';
    $heading = get_string('faq10info', 'theme_maker');
    $information = get_string('faq10desc', 'theme_maker');
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);
   
    
    // Question
    $name = 'theme_maker/faq10title';
    $title = get_string('faq10title', 'theme_maker');
    $description = get_string('faq10titledesc', 'theme_maker');
    $default = 'Question ten heading goes here?';
    $setting = new admin_setting_configtext($name, $title, $description, $default);    
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // Answer
    $name = 'theme_maker/faq10content';
    $title = get_string('faq10content', 'theme_maker');
    $description = get_string('faq10contentdesc', 'theme_maker');
    $default = '<p>Answer 10 goes here. You can add up to 10 FAQs. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et <a href="#link">link example</a> magnis dis parturient montes, nascetur ridiculus mus. </p>';
    $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    
    // FAQ Section CTA Button Text
    $name = 'theme_maker/faqsectionbuttontext';
    $title = get_string('faqsectionbuttontext', 'theme_maker');
    $description = get_string('faqsectionbuttontextdesc', 'theme_maker');
    $default = 'View More';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // FAQ Section CTA Button URL
    $name = 'theme_maker/faqsectionbuttonurl';
    $title = get_string('faqsectionbuttonurl', 'theme_maker');
    $description = get_string('faqsectionbuttonurldesc', 'theme_maker');
    $default = '#link';
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // URL open in new window    
    $name = 'theme_maker/faqsectionbuttonurlopennew';
    $title = get_string('opennew', 'theme_maker');
    $description = get_string('opennewdesc', 'theme_maker');
    $default = false;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default, true, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

	
	// Add the page
    $settings->add($page);