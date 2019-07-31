<?php 
	
	
	defined('MOODLE_INTERNAL') || die();
	
	
	/* Frontpage Promo Carousel Settings */	
	$page = new admin_settingpage('theme_maker_promocarousel', get_string('promocarouselheading', 'theme_maker'));
	$page->add(new admin_setting_heading('theme_maker_promocarouselheadingsub', get_string('promocarouselheadingsub', 'theme_maker'),
            format_text(get_string('promocarouselheadingsubdesc' , 'theme_maker'), FORMAT_MARKDOWN)));
	
	
	
	//Enable Promo Carousel
    $name = 'theme_maker/usepromocarousel';
    $title = get_string('usepromocarousel', 'theme_maker');
    $description = get_string('usepromocarouseldesc', 'theme_maker');
    $default = true;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default, true, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
     //Carousel Item Height
    $name = 'theme_maker/carouselitemheight';
	$title = get_string('carouselitemheight', 'theme_maker');
	$description = get_string('carouselitemheightdesc', 'theme_maker');;
	$default = '360px';
	$choices = array(
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
    

	/* Carousel Item 1 */	
	$name = 'theme_maker/carouselitem1info';
    $heading = get_string('carouselitem1info', 'theme_maker');
    $information = get_string('carouselitem1desc', 'theme_maker');
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);
	
	$name = 'theme_maker/carouselitem1';
    $title = get_string('carouselitemtitle', 'theme_maker');
    $description = get_string('carouselitemtitledesc', 'theme_maker');
    $default = 'Heading One';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_maker/carouselitem1image';
    $title = get_string('carouselitemimage', 'theme_maker');
    $description = get_string('carouselitemimagedesc', 'theme_maker');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'carouselitem1image');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    
    $name = 'theme_maker/carouselitem1content';
    $title = get_string('carouselitemcontent', 'theme_maker');
    $description = get_string('carouselitemcontentdesc', 'theme_maker');
    $default = '<p>You can add up to 6 carousel items to promote your content or courses. You also have the option to add YouTube or Vimeo videos to each carousel item. It is a great way to catch your visitors\' attention and interest!</p>';
    $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_maker/carouselitem1buttontext';
    $title = get_string('carouselitembuttontext', 'theme_maker');
    $description = get_string('carouselitembuttontextdesc', 'theme_maker');
    $default = 'Find out more';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_maker/carouselitem1buttonurl';
    $title = get_string('carouselitembuttonurl', 'theme_maker');
    $description = get_string('carouselitembuttonurldesc', 'theme_maker');
    $default = '#link1';
    $setting = new admin_setting_configtext($name, $title, $description, '', PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // URL open in new window    
    $name = 'theme_maker/carouselitem1buttonurlopennew';
    $title = get_string('opennew', 'theme_maker');
    $description = get_string('opennewdesc', 'theme_maker');
    $default = false;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default, true, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    //Enable Carousel Item 1 Video
    $name = 'theme_maker/usecarouselitem1video';
    $title = get_string('usecarouselitemvideo', 'theme_maker');
    $description = get_string('usecarouselitemvideodesc', 'theme_maker');
    $default = false;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default, true, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    //Carousel Item 1 Video Type Switcher
    $name = 'theme_maker/carouselitem1videoswitcher';
    $title = get_string('carouselitemvideoswitcher', 'theme_maker');
    $description = get_string('carouselitemvideoswitcherdesc', 'theme_maker');
    $default = '1';
    $choices = array(
        '1' => 'YouTube Video',
        '2' => 'Vimeo Video'
    );
    $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    
    //Carousel Item 1 Video ID
    $name = 'theme_maker/carouselitem1videoid';
    $title = get_string('carouselitemvideoid', 'theme_maker');
    $description = get_string('carouselitemvideoiddesc', 'theme_maker');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);    
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    
    /* Carousel Item 2 */   
    $name = 'theme_maker/carouselitem2info';
    $heading = get_string('carouselitem2info', 'theme_maker');
    $information = get_string('carouselitem2desc', 'theme_maker');
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);
    
	$name = 'theme_maker/carouselitem2';
    $title = get_string('carouselitemtitle', 'theme_maker');
    $description = get_string('carouselitemtitledesc', 'theme_maker');
    $default = 'Heading Two';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_maker/carouselitem2image';
    $title = get_string('carouselitemimage', 'theme_maker');
    $description = get_string('carouselitemimagedesc', 'theme_maker');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'carouselitem2image');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    
    $name = 'theme_maker/carouselitem2content';
    $title = get_string('carouselitemcontent', 'theme_maker');
    $description = get_string('carouselitemcontentdesc', 'theme_maker');
    $default = '<p>You can add up to 6 carousel items to promote your content or courses. You also have the option to add YouTube or Vimeo videos to each carousel item. It is a great way to catch your visitors\' attention and interest!</p>';
    $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_maker/carouselitem2buttontext';
    $title = get_string('carouselitembuttontext', 'theme_maker');
    $description = get_string('carouselitembuttontextdesc', 'theme_maker');
    $default = 'Find out more';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_maker/carouselitem2buttonurl';
    $title = get_string('carouselitembuttonurl', 'theme_maker');
    $description = get_string('carouselitembuttonurldesc', 'theme_maker');
    $default = '#link2';
    $setting = new admin_setting_configtext($name, $title, $description, '', PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // URL open in new window    
    $name = 'theme_maker/carouselitem2buttonurlopennew';
    $title = get_string('opennew', 'theme_maker');
    $description = get_string('opennewdesc', 'theme_maker');
    $default = false;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default, true, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    //Enable Carousel Item 2 Video
    $name = 'theme_maker/usecarouselitem2video';
    $title = get_string('usecarouselitemvideo', 'theme_maker');
    $description = get_string('usecarouselitemvideodesc', 'theme_maker');
    $default = false;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default, true, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    //Carousel Item 2 Video Type Switcher
    $name = 'theme_maker/carouselitem2videoswitcher';
    $title = get_string('carouselitemvideoswitcher', 'theme_maker');
    $description = get_string('carouselitemvideoswitcherdesc', 'theme_maker');
    $default = '1';
    $choices = array(
        '1' => 'YouTube Video',
        '2' => 'Vimeo Video'
    );
    $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    
    //Carousel Item 2 Video ID
    $name = 'theme_maker/carouselitem2videoid';
    $title = get_string('carouselitemvideoid', 'theme_maker');
    $description = get_string('carouselitemvideoiddesc', 'theme_maker');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);    
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    /* Carousel Item 3 */    
    $name = 'theme_maker/carouselitem3info';
    $heading = get_string('carouselitem3info', 'theme_maker');
    $information = get_string('carouselitem3desc', 'theme_maker');
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);
    
	$name = 'theme_maker/carouselitem3';
    $title = get_string('carouselitemtitle', 'theme_maker');
    $description = get_string('carouselitemtitledesc', 'theme_maker');
    $default = 'Heading Three';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_maker/carouselitem3image';
    $title = get_string('carouselitemimage', 'theme_maker');
    $description = get_string('carouselitemimagedesc', 'theme_maker');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'carouselitem3image');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_maker/carouselitem3content';
    $title = get_string('carouselitemcontent', 'theme_maker');
    $description = get_string('carouselitemcontentdesc', 'theme_maker');
    $default = '<p>You can add up to 6 carousel items to promote your content or courses. You also have the option to add YouTube or Vimeo videos to each carousel item. It is a great way to catch your visitors\' attention and interest!</p>';
    $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_maker/carouselitem3buttontext';
    $title = get_string('carouselitembuttontext', 'theme_maker');
    $description = get_string('carouselitembuttontextdesc', 'theme_maker');
    $default = 'Find out more';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_maker/carouselitem3buttonurl';
    $title = get_string('carouselitembuttonurl', 'theme_maker');
    $description = get_string('carouselitembuttonurldesc', 'theme_maker');
    $default = '#link3';
    $setting = new admin_setting_configtext($name, $title, $description, '', PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // URL open in new window    
    $name = 'theme_maker/carouselitem3buttonurlopennew';
    $title = get_string('opennew', 'theme_maker');
    $description = get_string('opennewdesc', 'theme_maker');
    $default = false;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default, true, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    //Enable Carousel Item 3 Video
    $name = 'theme_maker/usecarouselitem3video';
    $title = get_string('usecarouselitemvideo', 'theme_maker');
    $description = get_string('usecarouselitemvideodesc', 'theme_maker');
    $default = false;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default, true, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    //Carousel Item 3 Video Type Switcher
    $name = 'theme_maker/carouselitem3videoswitcher';
    $title = get_string('carouselitemvideoswitcher', 'theme_maker');
    $description = get_string('carouselitemvideoswitcherdesc', 'theme_maker');
    $default = '1';
    $choices = array(
        '1' => 'YouTube Video',
        '2' => 'Vimeo Video'
    );
    $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    
    //Carousel Item 3 Video ID
    $name = 'theme_maker/carouselitem3videoid';
    $title = get_string('carouselitemvideoid', 'theme_maker');
    $description = get_string('carouselitemvideoiddesc', 'theme_maker');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);    
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
   
    
    /* Carousel Item 4 */    
     
    $name = 'theme_maker/carouselitem4info';
    $heading = get_string('carouselitem4info', 'theme_maker');
    $information = get_string('carouselitem4desc', 'theme_maker');
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);
    
	$name = 'theme_maker/carouselitem4';
    $title = get_string('carouselitemtitle', 'theme_maker');
    $description = get_string('carouselitemtitledesc', 'theme_maker');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_maker/carouselitem4image';
    $title = get_string('carouselitemimage', 'theme_maker');
    $description = get_string('carouselitemimagedesc', 'theme_maker');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'carouselitem4image');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_maker/carouselitem4content';
    $title = get_string('carouselitemcontent', 'theme_maker');
    $description = get_string('carouselitemcontentdesc', 'theme_maker');
    $default = '';
    $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_maker/carouselitem4buttontext';
    $title = get_string('carouselitembuttontext', 'theme_maker');
    $description = get_string('carouselitembuttontextdesc', 'theme_maker');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_maker/carouselitem4buttonurl';
    $title = get_string('carouselitembuttonurl', 'theme_maker');
    $description = get_string('carouselitembuttonurldesc', 'theme_maker');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, '', PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // URL open in new window    
    $name = 'theme_maker/carouselitem4buttonurlopennew';
    $title = get_string('opennew', 'theme_maker');
    $description = get_string('opennewdesc', 'theme_maker');
    $default = false;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default, true, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    //Enable Carousel Item 4 Video
    $name = 'theme_maker/usecarouselitem4video';
    $title = get_string('usecarouselitemvideo', 'theme_maker');
    $description = get_string('usecarouselitemvideodesc', 'theme_maker');
    $default = false;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default, true, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    //Carousel Item 4 Video Type Switcher
    $name = 'theme_maker/carouselitem4videoswitcher';
    $title = get_string('carouselitemvideoswitcher', 'theme_maker');
    $description = get_string('carouselitemvideoswitcherdesc', 'theme_maker');
    $default = '1';
    $choices = array(
        '1' => 'YouTube Video',
        '2' => 'Vimeo Video'
    );
    $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    
    //Carousel Item 4 Video ID
    $name = 'theme_maker/carouselitem4videoid';
    $title = get_string('carouselitemvideoid', 'theme_maker');
    $description = get_string('carouselitemvideoiddesc', 'theme_maker');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);    
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    /* Carousel Item 5 */    
    $name = 'theme_maker/carouselitem5info';
    $heading = get_string('carouselitem5info', 'theme_maker');
    $information = get_string('carouselitem5desc', 'theme_maker');
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);
    
	$name = 'theme_maker/carouselitem5';
    $title = get_string('carouselitemtitle', 'theme_maker');
    $description = get_string('carouselitemtitledesc', 'theme_maker');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_maker/carouselitem5image';
    $title = get_string('carouselitemimage', 'theme_maker');
    $description = get_string('carouselitemimagedesc', 'theme_maker');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'carouselitem5image');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_maker/carouselitem5content';
    $title = get_string('carouselitemcontent', 'theme_maker');
    $description = get_string('carouselitemcontentdesc', 'theme_maker');
    $default = '';
    $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_maker/carouselitem5buttontext';
    $title = get_string('carouselitembuttontext', 'theme_maker');
    $description = get_string('carouselitembuttontextdesc', 'theme_maker');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_maker/carouselitem5buttonurl';
    $title = get_string('carouselitembuttonurl', 'theme_maker');
    $description = get_string('carouselitembuttonurldesc', 'theme_maker');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, '', PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // URL open in new window    
    $name = 'theme_maker/carouselitem5buttonurlopennew';
    $title = get_string('opennew', 'theme_maker');
    $description = get_string('opennewdesc', 'theme_maker');
    $default = false;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default, true, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    //Enable Carousel Item 5 Video
    $name = 'theme_maker/usecarouselitem5video';
    $title = get_string('usecarouselitemvideo', 'theme_maker');
    $description = get_string('usecarouselitemvideodesc', 'theme_maker');
    $default = false;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default, true, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    //Carousel Item 5 Video Type Switcher
    $name = 'theme_maker/carouselitem5videoswitcher';
    $title = get_string('carouselitemvideoswitcher', 'theme_maker');
    $description = get_string('carouselitemvideoswitcherdesc', 'theme_maker');
    $default = '1';
    $choices = array(
        '1' => 'YouTube Video',
        '2' => 'Vimeo Video'
    );
    $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    

    
    //Carousel Item 5 Video ID
    $name = 'theme_maker/carouselitem5videoid';
    $title = get_string('carouselitemvideoid', 'theme_maker');
    $description = get_string('carouselitemvideoiddesc', 'theme_maker');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);    
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    /* Carousel Item 6 */    
    $name = 'theme_maker/carouselitem6info';
    $heading = get_string('carouselitem6info', 'theme_maker');
    $information = get_string('carouselitem6desc', 'theme_maker');
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);
    
	$name = 'theme_maker/carouselitem6';
    $title = get_string('carouselitemtitle', 'theme_maker');
    $description = get_string('carouselitemtitledesc', 'theme_maker');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_maker/carouselitem6image';
    $title = get_string('carouselitemimage', 'theme_maker');
    $description = get_string('carouselitemimagedesc', 'theme_maker');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'carouselitem6image');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_maker/carouselitem6content';
    $title = get_string('carouselitemcontent', 'theme_maker');
    $description = get_string('carouselitemcontentdesc', 'theme_maker');
    $default = '';
    $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_maker/carouselitem6buttontext';
    $title = get_string('carouselitembuttontext', 'theme_maker');
    $description = get_string('carouselitembuttontextdesc', 'theme_maker');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_maker/carouselitem6buttonurl';
    $title = get_string('carouselitembuttonurl', 'theme_maker');
    $description = get_string('carouselitembuttonurldesc', 'theme_maker');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, '', PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // URL open in new window    
    $name = 'theme_maker/carouselitem6buttonurlopennew';
    $title = get_string('opennew', 'theme_maker');
    $description = get_string('opennewdesc', 'theme_maker');
    $default = false;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default, true, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    //Enable Carousel Item 6 Video
    $name = 'theme_maker/usecarouselitem6video';
    $title = get_string('usecarouselitemvideo', 'theme_maker');
    $description = get_string('usecarouselitemvideodesc', 'theme_maker');
    $default = false;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default, true, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    //Carousel Item 6 Video Type Switcher
    $name = 'theme_maker/carouselitem6videoswitcher';
    $title = get_string('carouselitemvideoswitcher', 'theme_maker');
    $description = get_string('carouselitemvideoswitcherdesc', 'theme_maker');
    $default = '1';
    $choices = array(
        '1' => 'YouTube Video',
        '2' => 'Vimeo Video'
    );
    $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    
    //Carousel Item 6 Video ID
    $name = 'theme_maker/carouselitem6videoid';
    $title = get_string('carouselitemvideoid', 'theme_maker');
    $description = get_string('carouselitemvideoiddesc', 'theme_maker');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);    
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
	
	
	
	// Add the page
    $settings->add($page);