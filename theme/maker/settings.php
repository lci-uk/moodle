<?php

defined('MOODLE_INTERNAL') || die();

if ($ADMIN->fulltree) {
    // New tabs layout for admin settings pages.
    $settings = new theme_boost_admin_settingspage_tabs('themesettingmaker', get_string('configtitle', 'theme_maker'));
    //General Settings
    require('settings/general_settings.php');
    //Header Settings
    require('settings/header_settings.php');
    //Footer Settings
    require('settings/footer_settings.php');
    //Frontpage Settings
    require('settings/fpslideshow_settings.php');
    require('settings/fpbenefits_settings.php');
    require('settings/fpfeatures_settings.php');
    require('settings/fppromo_settings.php');
    require('settings/fplogos_settings.php');
    require('settings/fptestimonials_settings.php');
    require('settings/fpfaq_settings.php');
    require('settings/fpctasection_settings.php');
    //Coruse Settings
    require('settings/course_settings.php');
    //Social Media Settings
    require('settings/socialmedia_settings.php');
    //Login page settings
    require('settings/login_settings.php');
    //Advanced Settings
    require('settings/advanced_settings.php');
}
