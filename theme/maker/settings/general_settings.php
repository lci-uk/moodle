<?php 
	
	
	defined('MOODLE_INTERNAL') || die();
	
	
	/* General Settings */
	$page = new admin_settingpage('theme_maker_general', get_string('generalheading', 'theme_maker'));
	
	/* Header Social Media Links */
	$page->add(new admin_setting_heading('theme_maker_general', get_string('generalheadingsub', 'theme_maker'),
            format_text(get_string('generalheadingdesc' , 'theme_maker'), FORMAT_MARKDOWN)));
	
	
	// Logo file setting.   
    $name = 'theme_maker/logo';
    $title = get_string('logo','theme_maker');
    $description = get_string('logodesc', 'theme_maker');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'logo');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);  
    
    
    // Theme Color Switcher (Preset SCSS)

    $name = 'theme_maker/preset';
    $title = get_string('preset', 'theme_maker');
    $description = get_string('preset_desc', 'theme_maker');
    $default = 'theme-1.scss';

    $context = context_system::instance();
    $fs = get_file_storage();
    $files = $fs->get_area_files($context->id, 'theme_maker', 'preset', 0, 'itemid, filepath, filename', false);

    $choices = [];
    foreach ($files as $file) {
        $choices[$file->get_filename()] = $file->get_filename();
    }
    // These are the built in presets.
    $choices['theme-1.scss'] = 'theme-1.scss';
    $choices['theme-2.scss'] = 'theme-2.scss';
    $choices['theme-3.scss'] = 'theme-3.scss';
    $choices['theme-4.scss'] = 'theme-4.scss';
    $choices['theme-5.scss'] = 'theme-5.scss';
    $choices['theme-6.scss'] = 'theme-6.scss';


    $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    
    // Variable $theme-color-primary
    // We use an empty default value because the default colour should come from the preset.
    $name = 'theme_maker/brandcolorprimary';
    $title = get_string('brandcolorprimary', 'theme_maker');
    $description = get_string('brandcolorprimarydesc', 'theme_maker');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // Variable $theme-color-secondary
    // We use an empty default value because the default colour should come from the preset.
    $name = 'theme_maker/brandcolorsecondary';
    $title = get_string('brandcolorsecondary', 'theme_maker');
    $description = get_string('brandcolorsecondarydesc', 'theme_maker');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    
    // Page fonts.
	$name = 'theme_maker/pagefont';
	$title = get_string('pagefont', 'theme_maker');
	$description = get_string('pagefontdesc', 'theme_maker');;
	$default = 'Roboto';
	$choices = array(
	        'Roboto' => 'Roboto',
	        'Roboto Slab' => 'Roboto Slab',
	        'Open Sans' => 'Open Sans',
	        'Source+Sans Pro' => 'Source Sans Pro',
	        'PT Sans' => 'PT Sans',
	        'Oswald' => 'Oswald',
	    );
	$setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
	$setting->set_updatedcallback('theme_reset_all_caches');
	$page->add($setting);
    
    // Heading fonts.
	$name = 'theme_maker/headingfont';
	$title = get_string('headingfont', 'theme_maker');
	$description = get_string('headingfontdesc', 'theme_maker');;
	$default = 'Roboto';
	$choices = array(
	        'Roboto' => 'Roboto',
	        'Roboto Slab' => 'Roboto Slab',
	        'Open Sans' => 'Open Sans',
	        'Source Sans Pro' => 'Source Sans Pro',
	        'PT Sans' => 'PT Sans',
	        'Oswald' => 'Oswald',

	    );
	$setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
	$setting->set_updatedcallback('theme_reset_all_caches');
	$page->add($setting);
	
	// Enable Course Header Image
    $name = 'theme_maker/usecourseheaderimage';
    $title = get_string('usecourseheaderimage', 'theme_maker');
    $description = get_string('usecourseheaderimagedesc', 'theme_maker');
    $default = true;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default, true, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    //Course Header Image Height
    $name = 'theme_maker/courseheaderimageheight';
	$title = get_string('courseheaderimageheight', 'theme_maker');
	$description = get_string('courseheaderimageheightdesc', 'theme_maker');;
	$default = '360px';
	$choices = array(
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
	
	// Enable Theme RTL Support   
    $name = 'theme_maker/usertl';
    $title = get_string('usertl', 'theme_maker');
    $description = get_string('usertldesc', 'theme_maker');
    $default = false;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default, true, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
	
    
    $settings->add($page);
