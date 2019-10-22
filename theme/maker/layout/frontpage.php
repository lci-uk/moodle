<?php
	

defined('MOODLE_INTERNAL') || die();

user_preference_allow_ajax_update('drawer-open-nav', PARAM_ALPHA);
require_once($CFG->libdir . '/behat/lib.php');

if ( isloggedin()&&(!isguestuser()) ) {
	
    //$navdraweropen = (get_user_preferences('drawer-open-nav', 'true') == 'true');
    $navdraweropen = false;
    
    
    $extraclasses = [];
	if ($navdraweropen) {
	    $extraclasses[] = 'drawer-open-left';
	}
	$bodyattributes = $OUTPUT->body_attributes($extraclasses);
	$blockshtml = $OUTPUT->blocks('side-pre');
	$hasblocks = strpos($blockshtml, 'data-block=') !== false;
	$regionmainsettingsmenu = $OUTPUT->region_main_settings_menu();
	$templatecontext = [
	    'sitename' => format_string($SITE->shortname, true, ['context' => context_course::instance(SITEID), "escape" => false]),
	    'output' => $OUTPUT,
	    'sidepreblocks' => $blockshtml,
	    'hasblocks' => $hasblocks,
	    'bodyattributes' => $bodyattributes,
	    'navdraweropen' => $navdraweropen,
	    'regionmainsettingsmenu' => $regionmainsettingsmenu,
	    'hasregionmainsettingsmenu' => !empty($regionmainsettingsmenu)
	    
	];
	
	$PAGE->requires->jquery ();
	$PAGE->requires->js('/theme/maker/plugins/flexslider/jquery.flexslider-min.js');
	$PAGE->requires->js('/theme/maker/plugins/owlcarousel/owl.carousel.min.js');
	$PAGE->requires->js('/theme/maker/plugins/back-to-top.js');
	//$PAGE->requires->js('/theme/maker/javascript/home.js');
	
	$templatecontext['flatnavigation'] = $PAGE->flatnav;
	echo $OUTPUT->render_from_template('theme_maker/frontpage', $templatecontext);
    
    
    
    
} else {
    $navdraweropen = false;
    
    $extraclasses = [];
	if ($navdraweropen) {
	    $extraclasses[] = 'drawer-open-left';
	}
	$bodyattributes = $OUTPUT->body_attributes($extraclasses);
	$blockshtml = $OUTPUT->blocks('side-pre');
	$hasblocks = strpos($blockshtml, 'data-block=') !== false;
	$regionmainsettingsmenu = $OUTPUT->region_main_settings_menu();
	$templatecontext = [
	    'sitename' => format_string($SITE->shortname, true, ['context' => context_course::instance(SITEID), "escape" => false]),
	    'output' => $OUTPUT,
	    'sidepreblocks' => $blockshtml,
	    'hasblocks' => $hasblocks,
	    'bodyattributes' => $bodyattributes,
	    'navdraweropen' => $navdraweropen,
	    'regionmainsettingsmenu' => $regionmainsettingsmenu,
	    'hasregionmainsettingsmenu' => !empty($regionmainsettingsmenu)
	    
	];
	
	$PAGE->requires->jquery ();
	$PAGE->requires->js('/theme/maker/plugins/flexslider/jquery.flexslider-min.js');
	$PAGE->requires->js('/theme/maker/plugins/owlcarousel/owl.carousel.min.js');
	$PAGE->requires->js('/theme/maker/plugins/back-to-top.js');
	//$PAGE->requires->js('/theme/maker/javascript/home.js');
	
	$templatecontext['flatnavigation'] = $PAGE->flatnav;
	echo $OUTPUT->render_from_template('theme_maker/frontpage_guest', $templatecontext);
    
    
    
}


