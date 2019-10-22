<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

defined('MOODLE_INTERNAL') || die();


/**
 * Serves any files associated with the theme settings.
 *
 * @param stdClass $course
 * @param stdClass $cm
 * @param context $context
 * @param string $filearea
 * @param array $args
 * @param bool $forcedownload
 * @param array $options
 * @return bool
 */

function theme_maker_pluginfile($course, $cm, $context, $filearea, $args, $forcedownload, array $options = array()) {
    static $theme;
    if (empty($theme)) {
        $theme = theme_config::load('maker');
    }
    if ($context->contextlevel == CONTEXT_SYSTEM && ($filearea === '')) {
        $theme = theme_config::load('maker');
        return $theme->setting_file_serve($filearea, $args, $forcedownload, $options);
    } else if ($filearea === 'logo') {
        return $theme->setting_file_serve('logo', $args, $forcedownload, $options);
    } else if ($filearea === 'slide1image') {
        return $theme->setting_file_serve('slide1image', $args, $forcedownload, $options);
    } else if ($filearea === 'slide2image') {
        return $theme->setting_file_serve('slide2image', $args, $forcedownload, $options);
    } else if ($filearea === 'slide3image') {
        return $theme->setting_file_serve('slide3image', $args, $forcedownload, $options);
    } else if ($filearea === 'slide4image') {
        return $theme->setting_file_serve('slide4image', $args, $forcedownload, $options);
    } else if ($filearea === 'homeblock1image') {
        return $theme->setting_file_serve('homeblock1image', $args, $forcedownload, $options);
    } else if ($filearea === 'homeblock2image') {
        return $theme->setting_file_serve('homeblock2image', $args, $forcedownload, $options);
    } else if ($filearea === 'homeblock3image') {
        return $theme->setting_file_serve('homeblock3image', $args, $forcedownload, $options);
    } else if ($filearea === 'homeblock4image') {
        return $theme->setting_file_serve('homeblock4image', $args, $forcedownload, $options);
    } else if ($filearea === 'homeblock5image') {
        return $theme->setting_file_serve('homeblock5image', $args, $forcedownload, $options);
    } else if ($filearea === 'homeblock6image') {
        return $theme->setting_file_serve('homeblock6image', $args, $forcedownload, $options);
    } else if ($filearea === 'homeblock7image') {
        return $theme->setting_file_serve('homeblock7image', $args, $forcedownload, $options);
    } else if ($filearea === 'homeblock8image') {
        return $theme->setting_file_serve('homeblock8image', $args, $forcedownload, $options);
    } else if ($filearea === 'homeblock9image') {
        return $theme->setting_file_serve('homeblock9image', $args, $forcedownload, $options);
    } else if ($filearea === 'homeblock10image') {
        return $theme->setting_file_serve('homeblock10image', $args, $forcedownload, $options);
    } else if ($filearea === 'homeblock11image') {
        return $theme->setting_file_serve('homeblock11image', $args, $forcedownload, $options);
    } else if ($filearea === 'homeblock12image') {
        return $theme->setting_file_serve('homeblock12image', $args, $forcedownload, $options);
    } else if ($filearea === 'carouselitem1image') {
        return $theme->setting_file_serve('carouselitem1image', $args, $forcedownload, $options);
    } else if ($filearea === 'carouselitem2image') {
        return $theme->setting_file_serve('carouselitem2image', $args, $forcedownload, $options);
    } else if ($filearea === 'carouselitem3image') {
        return $theme->setting_file_serve('carouselitem3image', $args, $forcedownload, $options);
    } else if ($filearea === 'carouselitem4image') {
        return $theme->setting_file_serve('carouselitem4image', $args, $forcedownload, $options);
    } else if ($filearea === 'carouselitem5image') {
	    return $theme->setting_file_serve('carouselitem5image', $args, $forcedownload, $options);
    } else if ($filearea === 'carouselitem6image') {
       return $theme->setting_file_serve('carouselitem6image', $args, $forcedownload, $options);
    } else if ($filearea === 'logo1image') {
        return $theme->setting_file_serve('logo1image', $args, $forcedownload, $options);
    } else if ($filearea === 'logo2image') {
        return $theme->setting_file_serve('logo2image', $args, $forcedownload, $options);
    } else if ($filearea === 'logo3image') {
        return $theme->setting_file_serve('logo3image', $args, $forcedownload, $options);
    } else if ($filearea === 'logo4image') {
        return $theme->setting_file_serve('logo4image', $args, $forcedownload, $options);
    } else if ($filearea === 'logo5image') {
        return $theme->setting_file_serve('logo5image', $args, $forcedownload, $options);
    } else if ($filearea === 'logo6image') {
        return $theme->setting_file_serve('logo6image', $args, $forcedownload, $options);
    } else if ($filearea === 'testimonial1image') {
        return $theme->setting_file_serve('testimonial1image', $args, $forcedownload, $options);
    } else if ($filearea === 'testimonial2image') {
        return $theme->setting_file_serve('testimonial2image', $args, $forcedownload, $options);
    } else if ($filearea === 'testimonial3image') {
        return $theme->setting_file_serve('testimonial3image', $args, $forcedownload, $options);
    } else if ($filearea === 'testimonial4image') {
        return $theme->setting_file_serve('testimonial4image', $args, $forcedownload, $options);
    } else if ($filearea === 'testimonial5image') {
        return $theme->setting_file_serve('testimonial5image', $args, $forcedownload, $options);
    } else if ($filearea === 'testimonial6image') {
	    return $theme->setting_file_serve('testimonial6image', $args, $forcedownload, $options);
    } else if ($filearea === 'loginbgimage') {
	    return $theme->setting_file_serve('loginbgimage', $args, $forcedownload, $options);
    }  else {
        send_file_not_found();
    }
}




/**
 * Post process the CSS tree.
 *
 * @param string $tree The CSS tree.
 * @param theme_config $theme The theme config object.
 */
function theme_maker_css_tree_post_processor($tree, $theme) {
    $prefixer = new theme_boost\autoprefixer($tree);
    $prefixer->prefix();
}

/**
 * Returns the main SCSS content.
 *
 * @param theme_config $theme The theme config object.
 * @return string
 */

function theme_maker_get_main_scss_content($theme) {
    global $CFG;

    $scss = '';
    $filename = !empty($theme->settings->preset) ? $theme->settings->preset : null;
    $fs = get_file_storage();

    $context = context_system::instance();
    
    // Use Boost theme's default styling as the base
    //$scss .= file_get_contents($CFG->dirroot . '/theme/boost/scss/preset/default.scss');
    
    if ($filename == 'theme-1.scss') {
        $scss .= file_get_contents($CFG->dirroot . '/theme/maker/scss/preset/theme-1.scss');
    } else if ($filename == 'theme-2.scss') {
        $scss .= file_get_contents($CFG->dirroot . '/theme/maker/scss/preset/theme-2.scss');
    } else if ($filename == 'theme-3.scss') {
        $scss .= file_get_contents($CFG->dirroot . '/theme/maker/scss/preset/theme-3.scss');
    } else if ($filename == 'theme-4.scss') {
        $scss .= file_get_contents($CFG->dirroot . '/theme/maker/scss/preset/theme-4.scss');
    } else if ($filename == 'theme-5.scss') {
        $scss .= file_get_contents($CFG->dirroot . '/theme/maker/scss/preset/theme-5.scss');
    } else if ($filename == 'theme-6.scss') {
        $scss .= file_get_contents($CFG->dirroot . '/theme/maker/scss/preset/theme-6.scss');
    } else if ($filename && ($presetfile = $fs->get_file($context->id, 'theme_maker', 'preset', 0, '/', $filename))) {
        $scss .= $presetfile->get_content();
    } else {
        // Safety fallback - maybe new installs etc.
        $scss .= file_get_contents($CFG->dirroot . '/theme/maker/scss/preset/theme-1.scss');
    }

    return $scss;
}


/**
 * Get SCSS to prepend.
 *
 * @param theme_config $theme The theme config object.
 * @return array
 */
function theme_maker_get_pre_scss($theme) {
    global $CFG, $PAGE;

    $prescss = '';
    
    $configurable = [
    // Config key => variableName,
    'brandcolorprimary' => ['theme-color-primary'],
    'brandcolorsecondary' => ['theme-color-secondary'],
    'pagefont' => ['pagefont'],
    'headingfont' => ['headingfont'],
    'slideshowheight' => ['fp-hero-height'],
    'homeblockheight' => ['fp-block-height'],
    'carouselitemheight' => ['fp-promo-height'],
    'testimonialitemheight' => ['fp-testimonial-height'],
    'courseheaderimageheight' => ['course-header-image-height'],
    
    
    ];

    // Add settings variables.
    foreach ($configurable as $configkey => $targets) {
        $value = $theme->settings->{$configkey};
        if (empty($value)) {
            continue;
        }
        array_map(function ($target) use (&$prescss, $value) {
            $prescss .= '$' . $target . ': ' . $value . ";\n";
        }
        , (array)$targets);
    }
    

    // Prepend pre-scss.
    if (!empty($theme->settings->scsspre)) {
        $prescss .= $theme->settings->scsspre;
    }
    
    
    /* Frontpage Slideshow Hero Images */

    // Slideshow slide 1
    $slide1image = $theme->setting_file_url('slide1image', 'slide1image');
    if (isset($slide1image)) {
        
        $prescss .= '.slide-1 {background-image: url("' . $slide1image . '"); -webkit-background-size:cover; -moz-background-size:cover; -o-background-size:cover; background-size:cover; background-repeat: no-repeat; background-position:center top;}';
        

    }

    // Slideshow slide 2
    $slide2image = $theme->setting_file_url('slide2image', 'slide2image');
    if (isset($slide2image)) {
        
        $prescss .= '.slide-2 {background-image: url("' . $slide2image . '"); -webkit-background-size:cover; -moz-background-size:cover; -o-background-size:cover; background-size:cover; background-repeat: no-repeat; background-position:center top;}';
    }

    // Slideshow slide 3
    $slide3image = $theme->setting_file_url('slide3image', 'slide3image');
    if (isset($slide3image)) {
        
        $prescss .= '.slide-3 {background-image: url("' . $slide3image . '"); -webkit-background-size:cover; -moz-background-size:cover; -o-background-size:cover; background-size:cover; background-repeat: no-repeat; background-position: center top;}';
    }
    
    // Slideshow slide 4
    $slide4image = $theme->setting_file_url('slide4image', 'slide4image');
    if (isset($slide4image)) {
        
        $prescss .= '.slide-4 {background-image: url("' . $slide4image . '"); -webkit-background-size:cover; -moz-background-size:cover; -o-background-size:cover; background-size:cover; background-repeat: no-repeat; background-position: center top;}';
    }
    
    
    /* Frontpage Featured Blocks Images */
    
    //Block 1
    $homeblock1image = $theme->setting_file_url('homeblock1image', 'homeblock1image');
    if (isset($homeblock1image)) {
        
        $prescss .= '.featured-carousel .item-1 .thumb-holder-inner {background-image: url("' . $homeblock1image . '"); -webkit-background-size:cover; -moz-background-size:cover; -o-background-size:cover; background-size:cover; background-repeat: no-repeat; background-position:center top;}';
    }
    
    //Block 2
    $homeblock2image = $theme->setting_file_url('homeblock2image', 'homeblock2image');
    if (isset($homeblock2image)) {
        
        $prescss .= '.featured-carousel .item-2 .thumb-holder-inner {background-image: url("' . $homeblock2image . '"); -webkit-background-size:cover; -moz-background-size:cover; -o-background-size:cover; background-size:cover; background-repeat: no-repeat; background-position:center top;}';
    }
    
    //Block 3
    $homeblock3image = $theme->setting_file_url('homeblock3image', 'homeblock3image');
    if (isset($homeblock3image)) {
        
        $prescss .= '.featured-carousel .item-3 .thumb-holder-inner {background-image: url("' . $homeblock3image . '"); -webkit-background-size:cover; -moz-background-size:cover; -o-background-size:cover; background-size:cover; background-repeat: no-repeat; background-position:center top;}';
    }
    
    //Block 4
    $homeblock4image = $theme->setting_file_url('homeblock4image', 'homeblock4image');
    if (isset($homeblock4image)) {
        
        $prescss .= '.featured-carousel .item-4 .thumb-holder-inner {background-image: url("' . $homeblock4image . '"); -webkit-background-size:cover; -moz-background-size:cover; -o-background-size:cover; background-size:cover; background-repeat: no-repeat; background-position:center top;}';
    }
    
    //Block 5
    $homeblock5image = $theme->setting_file_url('homeblock5image', 'homeblock5image');
    if (isset($homeblock5image)) {
        
    $prescss .= '.featured-carousel .item-5 .thumb-holder-inner {background-image: url("' . $homeblock5image . '"); -webkit-background-size:cover; -moz-background-size:cover; -o-background-size:cover; background-size:cover; background-repeat: no-repeat; background-position:center top;}';
    }
    
    //Block 6
$homeblock6image = $theme->setting_file_url('homeblock6image', 'homeblock6image');
    if (isset($homeblock6image)) {
        
        $prescss .= '.featured-carousel .item-6 .thumb-holder-inner {background-image: url("' . $homeblock6image . '"); -webkit-background-size:cover; -moz-background-size:cover; -o-background-size:cover; background-size:cover; background-repeat: no-repeat; background-position:center top;}';
    }
    
    //Block 7
    $homeblock7image = $theme->setting_file_url('homeblock7image', 'homeblock7image');
    if (isset($homeblock7image)) {
        
        $prescss .= '.featured-carousel .item-7 .thumb-holder-inner {background-image: url("' . $homeblock7image . '"); -webkit-background-size:cover; -moz-background-size:cover; -o-background-size:cover; background-size:cover; background-repeat: no-repeat; background-position:center top;}';
    }
    
    //Block 8
    $homeblock8image = $theme->setting_file_url('homeblock8image', 'homeblock8image');
    if (isset($homeblock8image)) {
        
        $prescss .= '.featured-carousel .item-8 .thumb-holder-inner {background-image: url("' . $homeblock8image . '"); -webkit-background-size:cover; -moz-background-size:cover; -o-background-size:cover; background-size:cover; background-repeat: no-repeat; background-position:center top;}';
    }
    
    //Block 9
    $homeblock9image = $theme->setting_file_url('homeblock9image', 'homeblock9image');
    if (isset($homeblock9image)) {
        
        $prescss .= '.featured-carousel .item-9 .thumb-holder-inner {background-image: url("' . $homeblock9image . '"); -webkit-background-size:cover; -moz-background-size:cover; -o-background-size:cover; background-size:cover; background-repeat: no-repeat; background-position:center top;}';
    }
    
    //Block 10
    $homeblock10image = $theme->setting_file_url('homeblock10image', 'homeblock10image');
    if (isset($homeblock10image)) {
        
        $prescss .= '.featured-carousel .item-10 .thumb-holder-inner {background-image: url("' . $homeblock10image . '"); -webkit-background-size:cover; -moz-background-size:cover; -o-background-size:cover; background-size:cover; background-repeat: no-repeat; background-position:center top;}';
    }
    
    //Block 11
    $homeblock11image = $theme->setting_file_url('homeblock11image', 'homeblock11image');
    if (isset($homeblock11image)) {
        
        $prescss .= '.featured-carousel .item-11 .thumb-holder-inner {background-image: url("' . $homeblock11image . '"); -webkit-background-size:cover; -moz-background-size:cover; -o-background-size:cover; background-size:cover; background-repeat: no-repeat; background-position:center top;}';
    }
    
    //Block 12
    $homeblock12image = $theme->setting_file_url('homeblock12image', 'homeblock12image');
    if (isset($homeblock12image)) {
        
        $prescss .= '.featured-carousel .item-12 .thumb-holder-inner {background-image: url("' . $homeblock12image . '"); -webkit-background-size:cover; -moz-background-size:cover; -o-background-size:cover; background-size:cover; background-repeat: no-repeat; background-position:center top;}';
    }
    
    
    // Promo slide 1
    $carouselitem1image = $theme->setting_file_url('carouselitem1image', 'carouselitem1image');
    if (isset($slide1image)) {
        
        $prescss .= '.promo-carousel .item-1 .item-figure-holder {background-image: url("' . $carouselitem1image . '"); -webkit-background-size:cover; -moz-background-size:cover; -o-background-size:cover; background-size:cover; background-repeat: no-repeat; background-position:center top;}';
        

    }
    
    // Promo slide 2
    $carouselitem2image = $theme->setting_file_url('carouselitem2image', 'carouselitem2image');
    if (isset($slide1image)) {
        
        $prescss .= '.promo-carousel .item-2 .item-figure-holder {background-image: url("' . $carouselitem2image . '"); -webkit-background-size:cover; -moz-background-size:cover; -o-background-size:cover; background-size:cover; background-repeat: no-repeat; background-position:center top;}';
        

    }
    
    // Promo slide 3
    $carouselitem3image = $theme->setting_file_url('carouselitem3image', 'carouselitem3image');
    if (isset($slide1image)) {
        
        $prescss .= '.promo-carousel .item-3 .item-figure-holder {background-image: url("' . $carouselitem3image . '"); -webkit-background-size:cover; -moz-background-size:cover; -o-background-size:cover; background-size:cover; background-repeat: no-repeat; background-position:center top;}';
        

    }
    
    // Promo slide 4
    $carouselitem4image = $theme->setting_file_url('carouselitem4image', 'carouselitem4image');
    if (isset($slide1image)) {
        
        $prescss .= '.promo-carousel .item-4 .item-figure-holder {background-image: url("' . $carouselitem4image . '"); -webkit-background-size:cover; -moz-background-size:cover; -o-background-size:cover; background-size:cover; background-repeat: no-repeat; background-position:center top;}';
        

    }
    
    // Promo slide 5
    $carouselitem5image = $theme->setting_file_url('carouselitem5image', 'carouselitem5image');
    if (isset($slide1image)) {
        
        $prescss .= '.promo-carousel .item-5 .item-figure-holder {background-image: url("' . $carouselitem5image . '"); -webkit-background-size:cover; -moz-background-size:cover; -o-background-size:cover; background-size:cover; background-repeat: no-repeat; background-position:center top;}';
        

    }
    
    // Promo slide 6
    $carouselitem6image = $theme->setting_file_url('carouselitem6image', 'carouselitem6image');
    if (isset($slide1image)) {
        
        $prescss .= '.promo-carousel .item-6 .item-figure-holder {background-image: url("' . $carouselitem6image . '"); -webkit-background-size:cover; -moz-background-size:cover; -o-background-size:cover; background-size:cover; background-repeat: no-repeat; background-position:center top;}';
        

    }
    
    
    
    /* Login Page */
    
    // Page Background Image
    
    $loginbgimage = $theme->setting_file_url('loginbgimage', 'loginbgimage');
    if (isset($loginbgimage)) {
        
        $prescss .= '.page-wrapper.has-bg-image {background-image: url("' . $loginbgimage . '"); -webkit-background-size:cover; -moz-background-size:cover; -o-background-size:cover; background-size:cover; background-repeat: no-repeat; background-position:center top;}';
        

    }
    
    // Login Page Logo Image
    
    $sitelogo = $theme->setting_file_url('logo', 'logo');
    if (isset($sitelogo)) {
        
        $prescss .= '.has-logo .login-sitename a {text-indent: -99999px; display: block; height: 60px; background-image: url("' . $sitelogo . '"); background-repeat: no-repeat; background-position: center center;}';
        

    }

    return $prescss;
}


/**
 * Inject additional SCSS.
 *
 * @param theme_config $theme The theme config object.
 * @return string
 */
function theme_maker_get_extra_scss($theme) {
    // Adapted from Boost to allow other changes or settings if required.
    $extrascss = '';
    if (!empty($theme->settings->scss)) {
        $extrascss .= $theme->settings->scss;
    }

    return $extrascss;
}



function theme_maker_get_course_activities() {
    GLOBAL $CFG, $PAGE, $OUTPUT;
    // A copy of block_activity_modules.
    $course = $PAGE->course;
    $content = new stdClass();
    $modinfo = get_fast_modinfo($course);
    $modfullnames = array();

    $archetypes = array();

    foreach ($modinfo->cms as $cm) {
        // Exclude activities which are not visible or have no link (=label).
        if (!$cm->uservisible or !$cm->has_view()) {
            continue;
        }
        if (array_key_exists($cm->modname, $modfullnames)) {
            continue;
        }
        if (!array_key_exists($cm->modname, $archetypes)) {
            $archetypes[$cm->modname] = plugin_supports('mod', $cm->modname, FEATURE_MOD_ARCHETYPE, MOD_ARCHETYPE_OTHER);
        }
        if ($archetypes[$cm->modname] == MOD_ARCHETYPE_RESOURCE) {
            if (!array_key_exists('resources', $modfullnames)) {
                $modfullnames['resources'] = get_string('resources');
            }
        } else {
            $modfullnames[$cm->modname] = $cm->modplural;
        }
    }
    core_collator::asort($modfullnames);

    return $modfullnames;
}

/**
 * This function creates the dynamic HTML needed for some
 * settings and then passes it back in an object so it can
 * be echo'd to the page.
 *
 */

function theme_maker_get_setting($setting, $format = false) {
    global $CFG;
    require_once($CFG->dirroot . '/lib/weblib.php');
    static $theme;
    if (empty($theme)) {
        $theme = theme_config::load('maker');
    }
    if (empty($theme->settings->$setting)) {
        return false;
    } else if (!$format) {
        return $theme->settings->$setting;
    } else if ($format === 'format_text') {
        return format_text($theme->settings->$setting, FORMAT_PLAIN);
    } else if ($format === 'format_html') {
        return format_text($theme->settings->$setting, FORMAT_HTML, array('trusted' => true, 'noclean' => true));
    } else {
        return format_string($theme->settings->$setting);
    }
}

/* Remove HTML tags  (used in course_render.php) */

function theme_maker_strip_html_tags( $text ) {
    $text = preg_replace(
        array(
            // Remove invisible content.
            '@<head[^>]*?>.*?</head>@siu',
            '@<style[^>]*?>.*?</style>@siu',
            '@<script[^>]*?.*?</script>@siu',
            '@<object[^>]*?.*?</object>@siu',
            '@<embed[^>]*?.*?</embed>@siu',
            '@<applet[^>]*?.*?</applet>@siu',
            '@<noframes[^>]*?.*?</noframes>@siu',
            '@<noscript[^>]*?.*?</noscript>@siu',
            '@<noembed[^>]*?.*?</noembed>@siu',
            // Add line breaks before and after blocks.
            '@</?((address)|(blockquote)|(center)|(del))@iu',
            '@</?((div)|(h[1-9])|(ins)|(isindex)|(p)|(pre))@iu',
            '@</?((dir)|(dl)|(dt)|(dd)|(li)|(menu)|(ol)|(ul))@iu',
            '@</?((table)|(th)|(td)|(caption))@iu',
            '@</?((form)|(button)|(fieldset)|(legend)|(input))@iu',
            '@</?((label)|(select)|(optgroup)|(option)|(textarea))@iu',
            '@</?((frameset)|(frame)|(iframe))@iu',
            ),
        array(
            ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ',
            "\n\$0", "\n\$0", "\n\$0", "\n\$0", "\n\$0", "\n\$0",
            "\n\$0", "\n\$0",
            ),
        $text
        );
return strip_tags( $text );
}


/* Truncate the course content with ellipsis (used in course_render.php) */

function theme_maker_course_trim_char($str, $n = 200, $endchar = '&#8230;') {
    if (strlen($str) < $n) {
        return $str;
    }

    $str = preg_replace("/\s+/", ' ', str_replace(array("\r\n", "\r", "\n"), ' ', $str));
    if (strlen($str) <= $n) {
        return $str;
    }

    $out = "";
    $small = mb_substr($str, 0, $n); //Use mb_substr instead of substr Ref: https://stackoverflow.com/questions/6007999/cutting-a-string-with-accents
    $out = $small.$endchar;
    return $out;
}


