<?php

namespace theme_maker\output;

use coding_exception;
use html_writer;
use tabobject;
use tabtree;
use custom_menu_item;
use custom_menu;
use block_contents;
use navigation_node;
use action_link;
use stdClass;
use moodle_url;
use preferences_groups;
use action_menu;
use help_icon;
use single_button;
use single_select;
use paging_bar;
use url_select;
use context_course;
use pix_icon;
use theme_config;

defined('MOODLE_INTERNAL') || die;

require_once ($CFG->dirroot . "/course/renderer.php");
require_once ($CFG->libdir . '/coursecatlib.php');


class core_renderer extends \theme_boost\output\core_renderer {
    
    
    
    
    public function image_url($imagename, $component = 'moodle') {
        // Strip -24, -64, -256  etc from the end of filetype icons so we
        // only need to provide one SVG, see MDL-47082.
        $imagename = \preg_replace('/-\d\d\d?$/', '', $imagename);
        return $this->page->theme->image_url($imagename, $component);
    }

    
    public function headingfont() {
        global $PAGE;
        $setting = $PAGE->theme->settings->headingfont;
        return $setting != '' ? $setting : '';
    }

    public function pagefont() {
        global $PAGE;
        $setting = $PAGE->theme->settings->pagefont;
        return $setting != '' ? $setting : '';
    }
    
    
    public function site_logo() {
	     
        global $PAGE;
        
        $setting = $PAGE->theme->setting_file_url('logo', 'logo');
        
        return $setting != '' ? $setting : '';
        
    }

    
    public function login_background() {
        global $PAGE;
        
        $setting = $PAGE->theme->setting_file_url('loginbgimage', 'loginbgimage');
        
        return $setting != '' ? $setting : '';
    }
    
    public function login_bgmask() {
        global $PAGE;
        
        $useloginbgmask = $PAGE->theme->settings->useloginbgmask == 1;
        
        return $useloginbgmask;
        
    }
    
    public function google_analyticsid() {
        global $PAGE;
        
        $setting = $PAGE->theme->settings->analyticsid;
        
        return $setting != '' ? $setting : '';
        
    }
    
    public function ios_homescreen_icons() {
        global $PAGE;

        
        //iPhone icon
        $iphoneicon = (empty($PAGE->theme->setting_file_url('iphoneicon', 'iphoneicon'))) ? false : $PAGE->theme->setting_file_url('iphoneicon', 'iphoneicon');

        
        //iPhone Retina icon
        $iphoneretinaicon = (empty($PAGE->theme->setting_file_url('iphoneretinaicon', 'iphoneretinaicon'))) ? false : $PAGE->theme->setting_file_url('iphoneretinaicon', 'iphoneretinaicon');
        
         //iPad icon
        $ipadicon = (empty($PAGE->theme->setting_file_url('ipadicon', 'ipadicon'))) ? false : $PAGE->theme->setting_file_url('ipadicon', 'ipadicon');
        
        //ipad Retina icon
        $ipadretinaicon = (empty($PAGE->theme->setting_file_url('ipadretinaicon', 'ipadretinaicon'))) ? false : $PAGE->theme->setting_file_url('ipadretinaicon', 'ipadretinaicon');


        $ios_homescreen_icons = [
        
            'iphoneicon' => $iphoneicon, 
            'iphoneretinaicon' => $iphoneretinaicon, 
            'ipadicon' => $ipadicon, 
            'ipadretinaicon' => $ipadretinaicon, 

        
        ];

        return $this->render_from_template('theme_maker/ios_homescreen_icons', $ios_homescreen_icons);
    }
    
    public function header_alert() {
        global $PAGE;
        
        $usealert = $PAGE->theme->settings->usealert== 1;
        $alertcontent = (empty($PAGE->theme->settings->alertcontent)) ? false : format_text($PAGE->theme->settings->alertcontent);
        $alertbgcolor = (empty($PAGE->theme->settings->alertbgcolor)) ? false : $PAGE->theme->settings->alertbgcolor;


        $header_alert = [
        
            'hasalert' => $usealert, 
            'alertcontent' => $alertcontent, 
            'alertbgcolor' => $alertbgcolor,


        ];

        return $this->render_from_template('theme_maker/header_alert', $header_alert);
    }

        

    public function header_socialmedia() {
        global $PAGE;
        
        $useheadersocial = $PAGE->theme->settings->useheadersocial == 1;
      
        $haswebsite = (empty($PAGE->theme->settings->website)) ? false : $PAGE->theme->settings->website;
        $hastwitter = (empty($PAGE->theme->settings->twitter)) ? false : $PAGE->theme->settings->twitter;
        $hasfacebook = (empty($PAGE->theme->settings->facebook)) ? false : $PAGE->theme->settings->facebook;
        $hasgoogleplus = (empty($PAGE->theme->settings->googleplus)) ? false : $PAGE->theme->settings->googleplus;
        $haslinkedin = (empty($PAGE->theme->settings->linkedin)) ? false : $PAGE->theme->settings->linkedin;
        $hasyoutube = (empty($PAGE->theme->settings->youtube)) ? false : $PAGE->theme->settings->youtube;
        $hasvimeo = (empty($PAGE->theme->settings->vimeo)) ? false : $PAGE->theme->settings->vimeo;
        $hasinstagram = (empty($PAGE->theme->settings->instagram)) ? false : $PAGE->theme->settings->instagram;
        $haspinterest = (empty($PAGE->theme->settings->pinterest)) ? false : $PAGE->theme->settings->pinterest;
        $hasflickr = (empty($PAGE->theme->settings->flickr)) ? false : $PAGE->theme->settings->flickr;
        $hastumblr = (empty($PAGE->theme->settings->tumblr)) ? false : $PAGE->theme->settings->tumblr;
        $hasslideshare = (empty($PAGE->theme->settings->slideshare)) ? false : $PAGE->theme->settings->slideshare;
        $hasskype = (empty($PAGE->theme->settings->skype)) ? false : $PAGE->theme->settings->skype;
        $haswhatsapp = (empty($PAGE->theme->settings->whatsapp)) ? false : $PAGE->theme->settings->whatsapp;
        $hassnapchat = (empty($PAGE->theme->settings->snapchat)) ? false : $PAGE->theme->settings->snapchat;
        $hasweixin = (empty($PAGE->theme->settings->weixin)) ? false : $PAGE->theme->settings->weixin;
        $hasweibo = (empty($PAGE->theme->settings->weibo)) ? false : $PAGE->theme->settings->weibo;
        $hasrss = (empty($PAGE->theme->settings->rss)) ? false : $PAGE->theme->settings->rss;

        $hassocial1 = (empty($PAGE->theme->settings->social1)) ? false : $PAGE->theme->settings->social1;
        $social1icon = (empty($PAGE->theme->settings->socialicon1)) ? '' : $PAGE->theme->settings->socialicon1;
        $hassocial2 = (empty($PAGE->theme->settings->social2)) ? false : $PAGE->theme->settings->social2;
        $social2icon = (empty($PAGE->theme->settings->socialicon2)) ? '' : $PAGE->theme->settings->socialicon2;
        $hassocial3 = (empty($PAGE->theme->settings->social3)) ? false : $PAGE->theme->settings->social3;
        $social3icon = (empty($PAGE->theme->settings->socialicon3)) ? '' : $PAGE->theme->settings->socialicon3;

        $socialcontext = [

        'useheadersocial' => $useheadersocial,


        'socialmedia' => array(
	        
	        array(
                'haslink' => $haswebsite,
                'linkicon' => 'globe'
            ) ,
           
            array(
                'haslink' => $hastwitter,
                'linkicon' => 'twitter'
            ) ,
            array(
                'haslink' => $hasfacebook,
                'linkicon' => 'facebook'
            ) ,
            array(
                'haslink' => $hasgoogleplus,
                'linkicon' => 'google-plus'
            ) ,
            array(
                'haslink' => $haslinkedin,
                'linkicon' => 'linkedin'
            ) ,
            array(
                'haslink' => $hasyoutube,
                'linkicon' => 'youtube'
            ) ,
            array(
                'haslink' => $hasvimeo,
                'linkicon' => 'vimeo'
            ) ,
            array(
                'haslink' => $hasinstagram,
                'linkicon' => 'instagram'
            ) ,
            array(
                'haslink' => $haspinterest,
                'linkicon' => 'pinterest'
            ) ,
            array(
                'haslink' => $hasflickr,
                'linkicon' => 'flickr'
            ) ,
            array(
                'haslink' => $hastumblr,
                'linkicon' => 'tumblr'
            ) ,
            array(
                'haslink' => $hasslideshare,
                'linkicon' => 'slideshare'
            ) ,
            array(
                'haslink' => $hasskype,
                'linkicon' => 'skype'
            ) ,
            array(
                'haslink' => $haswhatsapp,
                'linkicon' => 'whatsapp'
            ) ,
            array(
                'haslink' => $hassnapchat,
                'linkicon' => 'snapchat'
            ) ,
            array(
                'haslink' => $hasweixin,
                'linkicon' => 'weixin'
            ) ,
            array(
                'haslink' => $hasweibo,
                'linkicon' => 'weibo'
            ) ,
            array(
                'haslink' => $hasrss,
                'linkicon' => 'rss'
            ) ,
            array(
                'haslink' => $hassocial1,
                'linkicon' => $social1icon
            ) ,
            array(
                'haslink' => $hassocial2,
                'linkicon' => $social2icon
            ) ,
            array(
                'haslink' => $hassocial3,
                'linkicon' => $social3icon
            ) ,
        ) ];

        return $this->render_from_template('theme_maker/header_socialmedia', $socialcontext);
    }
    
    public function footer_socialmedia() {
        global $PAGE;
        
        $usefootersocial = $PAGE->theme->settings->usefootersocial == 1;
      
        $haswebsite = (empty($PAGE->theme->settings->website)) ? false : $PAGE->theme->settings->website;
        $hastwitter = (empty($PAGE->theme->settings->twitter)) ? false : $PAGE->theme->settings->twitter;
        $hasfacebook = (empty($PAGE->theme->settings->facebook)) ? false : $PAGE->theme->settings->facebook;
        $hasgoogleplus = (empty($PAGE->theme->settings->googleplus)) ? false : $PAGE->theme->settings->googleplus;
        $haslinkedin = (empty($PAGE->theme->settings->linkedin)) ? false : $PAGE->theme->settings->linkedin;
        $hasyoutube = (empty($PAGE->theme->settings->youtube)) ? false : $PAGE->theme->settings->youtube;
        $hasvimeo = (empty($PAGE->theme->settings->vimeo)) ? false : $PAGE->theme->settings->vimeo;
        $hasinstagram = (empty($PAGE->theme->settings->instagram)) ? false : $PAGE->theme->settings->instagram;
        $haspinterest = (empty($PAGE->theme->settings->pinterest)) ? false : $PAGE->theme->settings->pinterest;
        $hasflickr = (empty($PAGE->theme->settings->flickr)) ? false : $PAGE->theme->settings->flickr;
        $hastumblr = (empty($PAGE->theme->settings->tumblr)) ? false : $PAGE->theme->settings->tumblr;
        $hasslideshare = (empty($PAGE->theme->settings->slideshare)) ? false : $PAGE->theme->settings->slideshare;
        $hasskype = (empty($PAGE->theme->settings->skype)) ? false : $PAGE->theme->settings->skype;
        $haswhatsapp = (empty($PAGE->theme->settings->whatsapp)) ? false : $PAGE->theme->settings->whatsapp;
        $hassnapchat = (empty($PAGE->theme->settings->snapchat)) ? false : $PAGE->theme->settings->snapchat;
        $hasweixin = (empty($PAGE->theme->settings->weixin)) ? false : $PAGE->theme->settings->weixin;
        $hasweibo = (empty($PAGE->theme->settings->weibo)) ? false : $PAGE->theme->settings->weibo;
        $hasrss = (empty($PAGE->theme->settings->rss)) ? false : $PAGE->theme->settings->rss;

        $hassocial1 = (empty($PAGE->theme->settings->social1)) ? false : $PAGE->theme->settings->social1;
        $social1icon = (empty($PAGE->theme->settings->socialicon1)) ? '' : $PAGE->theme->settings->socialicon1;
        $hassocial2 = (empty($PAGE->theme->settings->social2)) ? false : $PAGE->theme->settings->social2;
        $social2icon = (empty($PAGE->theme->settings->socialicon2)) ? '' : $PAGE->theme->settings->socialicon2;
        $hassocial3 = (empty($PAGE->theme->settings->social3)) ? false : $PAGE->theme->settings->social3;
        $social3icon = (empty($PAGE->theme->settings->socialicon3)) ? '' : $PAGE->theme->settings->socialicon3;

        $socialcontext = [

        'usefootersocial' => $usefootersocial,


        'socialmedia' => array(
	        
	        array(
                'haslink' => $haswebsite,
                'linkicon' => 'globe'
            ) ,
           
            array(
                'haslink' => $hastwitter,
                'linkicon' => 'twitter'
            ) ,
            array(
                'haslink' => $hasfacebook,
                'linkicon' => 'facebook'
            ) ,
            array(
                'haslink' => $hasgoogleplus,
                'linkicon' => 'google-plus'
            ) ,
            array(
                'haslink' => $haslinkedin,
                'linkicon' => 'linkedin'
            ) ,
            array(
                'haslink' => $hasyoutube,
                'linkicon' => 'youtube'
            ) ,
            array(
                'haslink' => $hasvimeo,
                'linkicon' => 'vimeo'
            ) ,
            array(
                'haslink' => $hasinstagram,
                'linkicon' => 'instagram'
            ) ,
            array(
                'haslink' => $haspinterest,
                'linkicon' => 'pinterest'
            ) ,
            array(
                'haslink' => $hasflickr,
                'linkicon' => 'flickr'
            ) ,
            array(
                'haslink' => $hastumblr,
                'linkicon' => 'tumblr'
            ) ,
            array(
                'haslink' => $hasslideshare,
                'linkicon' => 'slideshare'
            ) ,
            array(
                'haslink' => $hasskype,
                'linkicon' => 'skype'
            ) ,
            array(
                'haslink' => $haswhatsapp,
                'linkicon' => 'whatsapp'
            ) ,
            array(
                'haslink' => $hassnapchat,
                'linkicon' => 'snapchat'
            ) ,
            array(
                'haslink' => $hasweixin,
                'linkicon' => 'weixin'
            ) ,
            array(
                'haslink' => $hasweibo,
                'linkicon' => 'weibo'
            ) ,
            array(
                'haslink' => $hasrss,
                'linkicon' => 'rss'
            ) ,
            array(
                'haslink' => $hassocial1,
                'linkicon' => $social1icon
            ) ,
            array(
                'haslink' => $hassocial2,
                'linkicon' => $social2icon
            ) ,
            array(
                'haslink' => $hassocial3,
                'linkicon' => $social3icon
            ) ,
        ) ];

        return $this->render_from_template('theme_maker/footer_socialmedia', $socialcontext);
    }
    
    
   public function fp_slideshow() {
        global $PAGE, $OUTPUT;

        $useheroslideshow = $PAGE->theme->settings->useheroslideshow == 1;

        $hasslide1 = (empty($PAGE->theme->setting_file_url('slide1image', 'slide1image'))) ? false : $PAGE->theme->setting_file_url('slide1image', 'slide1image');
        $hasslide2 = (empty($PAGE->theme->setting_file_url('slide2image', 'slide2image'))) ? false : $PAGE->theme->setting_file_url('slide2image', 'slide2image');
        $hasslide3 = (empty($PAGE->theme->setting_file_url('slide3image', 'slide3image'))) ? false : $PAGE->theme->setting_file_url('slide3image', 'slide3image');
        $hasslide4 = (empty($PAGE->theme->setting_file_url('slide4image', 'slide4image'))) ? false : $PAGE->theme->setting_file_url('slide4image', 'slide4image');
        
        $heroheadline = (empty($PAGE->theme->settings->heroheadline)) ? false : format_text($PAGE->theme->settings->heroheadline);
        $herosummary = (empty($PAGE->theme->settings->herosummary)) ? false : format_text($PAGE->theme->settings->herosummary);
        $herocta = (empty($PAGE->theme->settings->herocta)) ? false : format_text($PAGE->theme->settings->herocta);
        $herourl = (empty($PAGE->theme->settings->herourl)) ? false : $PAGE->theme->settings->herourl;
        $herourlopennew = $PAGE->theme->settings->herourlopennew== 1;
        
        

        $useherovideo = $PAGE->theme->settings->useherovideo == 1;
        $videoplayicon = $OUTPUT->image_url('play-icon', 'theme');
        $herovideo = (empty($PAGE->theme->settings->herovideo)) ? false : format_text($PAGE->theme->settings->herovideo);        
        $herovideoswitcher = $PAGE->theme->settings->herovideoswitcher;       
        $herovideoid = (empty($PAGE->theme->settings->herovideoid)) ? false : $PAGE->theme->settings->herovideoid;
        
        


        $fp_slideshow = [

        'useheroslideshow' => $useheroslideshow,
         
         
        'hasslide1' => $hasslide1, 
        'hasslide2' => $hasslide2, 
        'hasslide3' => $hasslide3,
        'hasslide4' => $hasslide4,

        'hasheroheadline' => $heroheadline ? true : false, 
        'hasherosummary' => $heroheadline ? true : false, 

        
        'heroheadline' => $heroheadline,
        'herosummary' => $herosummary,
        
        'hasheroctabtn' => ($herocta && $herourl) ? true: false,       
        'herocta' => $herocta,
	    'herourl' => $herourl,
	    'urlopennew' => $herourlopennew,
        
        
        'useherovideo' => $useherovideo,
        'videoplayicon' => $videoplayicon,
        'herovideo' => $herovideo,
        'useyoutubevideo' => $herovideoswitcher == 1,
        'usevimeovideo' => $herovideoswitcher == 2,
        'herovideoid' => $herovideoid,


        ];

        return $this->render_from_template('theme_maker/fp_slideshow', $fp_slideshow);
    }
    
    
    public function fp_searchcourses() {
        global $PAGE;
        
        $usesearch = $PAGE->theme->settings->usesearch== 1;


        $fp_searchcourses = [
        
            'hassearch' => $usesearch, 

        ];

        return $this->render_from_template('theme_maker/fp_searchcourses', $fp_searchcourses);
    }
    
    
    public function fp_benefits() {
        global $PAGE;

        $usebenefits = $PAGE->theme->settings->usebenefits == 1;

        
        $benefit1icon = (empty($PAGE->theme->settings->benefit1icon)) ? false : $PAGE->theme->settings->benefit1icon;
        $benefit1title = (empty($PAGE->theme->settings->benefit1title)) ? false : format_text($PAGE->theme->settings->benefit1title);
        $benefit1content = (empty($PAGE->theme->settings->benefit1content)) ? false : format_text($PAGE->theme->settings->benefit1content);
        
        
        $benefit2icon = (empty($PAGE->theme->settings->benefit2icon)) ? false : $PAGE->theme->settings->benefit2icon;
        $benefit2title = (empty($PAGE->theme->settings->benefit2title)) ? false : format_text($PAGE->theme->settings->benefit2title);
        $benefit2content = (empty($PAGE->theme->settings->benefit2content)) ? false : format_text($PAGE->theme->settings->benefit2content);
        
        $benefit3icon = (empty($PAGE->theme->settings->benefit3icon)) ? false : $PAGE->theme->settings->benefit3icon;
        $benefit3title = (empty($PAGE->theme->settings->benefit3title)) ? false : format_text($PAGE->theme->settings->benefit3title);
        $benefit3content = (empty($PAGE->theme->settings->benefit3content)) ? false : format_text($PAGE->theme->settings->benefit3content);
        
        $benefit4icon = (empty($PAGE->theme->settings->benefit4icon)) ? false : $PAGE->theme->settings->benefit4icon;
        $benefit4title = (empty($PAGE->theme->settings->benefit4title)) ? false : format_text($PAGE->theme->settings->benefit4title);
        $benefit4content = (empty($PAGE->theme->settings->benefit4content)) ? false : format_text($PAGE->theme->settings->benefit4content);
        
        $benefit5icon = (empty($PAGE->theme->settings->benefit5icon)) ? false : $PAGE->theme->settings->benefit5icon;
        $benefit5title = (empty($PAGE->theme->settings->benefit5title)) ? false : format_text($PAGE->theme->settings->benefit5title);
        $benefit5content = (empty($PAGE->theme->settings->benefit5content)) ? false : format_text($PAGE->theme->settings->benefit5content);
        
        $benefit6icon = (empty($PAGE->theme->settings->benefit6icon)) ? false : $PAGE->theme->settings->benefit6icon;
        $benefit6title = (empty($PAGE->theme->settings->benefit6title)) ? false : format_text($PAGE->theme->settings->benefit6title);
        $benefit6content = (empty($PAGE->theme->settings->benefit6content)) ? false : format_text($PAGE->theme->settings->benefit6content);


        $fp_benefits = [

        'usebenefits' => $usebenefits,
        
        'benefits' => array(
	        
            array(
                'hasbenefit' => $benefit1title,
                'benefiticon' => $benefit1icon,
                'benefittitle' => $benefit1title,
                'benefitcontent' => $benefit1content,
            ) ,
            
            array(
                'hasbenefit' => $benefit2title,
                'benefiticon' => $benefit2icon,
                'benefittitle' => $benefit2title,
                'benefitcontent' => $benefit2content,
            ) ,
            
            array(
                'hasbenefit' => $benefit3title,
                'benefiticon' => $benefit3icon,
                'benefittitle' => $benefit3title,
                'benefitcontent' => $benefit3content,
            ) ,
            
            array(
                'hasbenefit' => $benefit4title,
                'benefiticon' => $benefit4icon,
                'benefittitle' => $benefit4title,
                'benefitcontent' => $benefit4content,
            ) ,
            
            array(
                'hasbenefit' => $benefit5title,
                'benefiticon' => $benefit5icon,
                'benefittitle' => $benefit5title,
                'benefitcontent' => $benefit5content,
            ) ,
            
            array(
                'hasbenefit' => $benefit6title,
                'benefiticon' => $benefit6icon,
                'benefittitle' => $benefit6title,
                'benefitcontent' => $benefit6content,
            ) ,
            
        ),

        ];

        return $this->render_from_template('theme_maker/fp_benefits', $fp_benefits);
    }

    
    public function fp_features() {
        global $PAGE;
        
        $usehomeblocks = $PAGE->theme->settings->usehomeblocks == 1;
        
        $featuredsectiontitle = (empty($PAGE->theme->settings->featuredsectiontitle)) ? false : format_text($PAGE->theme->settings->featuredsectiontitle);
        

        $homeblock1title = (empty($PAGE->theme->settings->homeblock1title)) ? false : format_text($PAGE->theme->settings->homeblock1title);
        $homeblock1content = (empty($PAGE->theme->settings->homeblock1content)) ? false : format_text($PAGE->theme->settings->homeblock1content);
        $homeblock1url = (empty($PAGE->theme->settings->homeblock1url)) ? false : $PAGE->theme->settings->homeblock1url;
        $homeblock1image = (empty($PAGE->theme->setting_file_url('homeblock1image', 'homeblock1image'))) ? false : $PAGE->theme->setting_file_url('homeblock1image', 'homeblock1image');
        $homeblock1label = (empty($PAGE->theme->settings->homeblock1label)) ? false : format_text($PAGE->theme->settings->homeblock1label);
        

        $homeblock2title = (empty($PAGE->theme->settings->homeblock2title)) ? false : format_text($PAGE->theme->settings->homeblock2title);
        $homeblock2content = (empty($PAGE->theme->settings->homeblock2content)) ? false : format_text($PAGE->theme->settings->homeblock2content);
        $homeblock2url = (empty($PAGE->theme->settings->homeblock2url)) ? false : $PAGE->theme->settings->homeblock2url;
        $homeblock2image = (empty($PAGE->theme->setting_file_url('homeblock2image', 'homeblock2image'))) ? false : $PAGE->theme->setting_file_url('homeblock2image', 'homeblock2image');
        $homeblock2label = (empty($PAGE->theme->settings->homeblock2label)) ? false : format_text($PAGE->theme->settings->homeblock2label);
        
        $homeblock3title = (empty($PAGE->theme->settings->homeblock3title)) ? false : format_text($PAGE->theme->settings->homeblock3title);
        $homeblock3content = (empty($PAGE->theme->settings->homeblock3content)) ? false : format_text($PAGE->theme->settings->homeblock3content);
        $homeblock3url = (empty($PAGE->theme->settings->homeblock3url)) ? false : $PAGE->theme->settings->homeblock3url;
        $homeblock3image = (empty($PAGE->theme->setting_file_url('homeblock3image', 'homeblock3image'))) ? false : $PAGE->theme->setting_file_url('homeblock3image', 'homeblock3image');
        $homeblock3label = (empty($PAGE->theme->settings->homeblock3label)) ? false : format_text($PAGE->theme->settings->homeblock3label);
        
        $homeblock4title = (empty($PAGE->theme->settings->homeblock4title)) ? false : format_text($PAGE->theme->settings->homeblock4title);
        $homeblock4content = (empty($PAGE->theme->settings->homeblock4content)) ? false : format_text($PAGE->theme->settings->homeblock4content);
        $homeblock4url = (empty($PAGE->theme->settings->homeblock4url)) ? false : $PAGE->theme->settings->homeblock4url;
        $homeblock4image = (empty($PAGE->theme->setting_file_url('homeblock4image', 'homeblock4image'))) ? false : $PAGE->theme->setting_file_url('homeblock4image', 'homeblock4image');
        $homeblock4label = (empty($PAGE->theme->settings->homeblock4label)) ? false : format_text($PAGE->theme->settings->homeblock4label);
        
        $homeblock5title = (empty($PAGE->theme->settings->homeblock5title)) ? false : format_text($PAGE->theme->settings->homeblock5title);
        $homeblock5content = (empty($PAGE->theme->settings->homeblock5content)) ? false : format_text($PAGE->theme->settings->homeblock5content);
        $homeblock5url = (empty($PAGE->theme->settings->homeblock5url)) ? false : $PAGE->theme->settings->homeblock5url;
        $homeblock5image = (empty($PAGE->theme->setting_file_url('homeblock5image', 'homeblock5image'))) ? false : $PAGE->theme->setting_file_url('homeblock5image', 'homeblock5image');
        $homeblock5label = (empty($PAGE->theme->settings->homeblock5label)) ? false : format_text($PAGE->theme->settings->homeblock5label);
        
        $homeblock6title = (empty($PAGE->theme->settings->homeblock6title)) ? false : format_text($PAGE->theme->settings->homeblock6title);
        $homeblock6content = (empty($PAGE->theme->settings->homeblock6content)) ? false : format_text($PAGE->theme->settings->homeblock6content);
        $homeblock6url = (empty($PAGE->theme->settings->homeblock6url)) ? false : $PAGE->theme->settings->homeblock6url;
        $homeblock6image = (empty($PAGE->theme->setting_file_url('homeblock6image', 'homeblock6image'))) ? false : $PAGE->theme->setting_file_url('homeblock6image', 'homeblock6image');
        $homeblock6label = (empty($PAGE->theme->settings->homeblock6label)) ? false : format_text($PAGE->theme->settings->homeblock6label);
        
        $homeblock7title = (empty($PAGE->theme->settings->homeblock7title)) ? false : format_text($PAGE->theme->settings->homeblock7title);
        $homeblock7content = (empty($PAGE->theme->settings->homeblock7content)) ? false : format_text($PAGE->theme->settings->homeblock7content);
        $homeblock7url = (empty($PAGE->theme->settings->homeblock7url)) ? false : $PAGE->theme->settings->homeblock7url;
        $homeblock7image = (empty($PAGE->theme->setting_file_url('homeblock7image', 'homeblock7image'))) ? false : $PAGE->theme->setting_file_url('homeblock7image', 'homeblock7image');
        $homeblock7label = (empty($PAGE->theme->settings->homeblock7label)) ? false : format_text($PAGE->theme->settings->homeblock7label);
        
        $homeblock8title = (empty($PAGE->theme->settings->homeblock8title)) ? false : format_text($PAGE->theme->settings->homeblock8title);
        $homeblock8content = (empty($PAGE->theme->settings->homeblock8content)) ? false : format_text($PAGE->theme->settings->homeblock8content);
        $homeblock8url = (empty($PAGE->theme->settings->homeblock8url)) ? false : $PAGE->theme->settings->homeblock8url;
        $homeblock8image = (empty($PAGE->theme->setting_file_url('homeblock8image', 'homeblock8image'))) ? false : $PAGE->theme->setting_file_url('homeblock8image', 'homeblock8image');
        $homeblock8label = (empty($PAGE->theme->settings->homeblock8label)) ? false : format_text($PAGE->theme->settings->homeblock8label);
        
        $homeblock9title = (empty($PAGE->theme->settings->homeblock9title)) ? false : format_text($PAGE->theme->settings->homeblock9title);
        $homeblock9content = (empty($PAGE->theme->settings->homeblock9content)) ? false : format_text($PAGE->theme->settings->homeblock9content);
        $homeblock9url = (empty($PAGE->theme->settings->homeblock9url)) ? false : $PAGE->theme->settings->homeblock9url;
        $homeblock9image = (empty($PAGE->theme->setting_file_url('homeblock9image', 'homeblock9image'))) ? false : $PAGE->theme->setting_file_url('homeblock9image', 'homeblock9image');
        $homeblock9label = (empty($PAGE->theme->settings->homeblock9label)) ? false : format_text($PAGE->theme->settings->homeblock9label);
        
        $homeblock10title = (empty($PAGE->theme->settings->homeblock10title)) ? false : format_text($PAGE->theme->settings->homeblock10title);
        $homeblock10content = (empty($PAGE->theme->settings->homeblock10content)) ? false : format_text($PAGE->theme->settings->homeblock10content);
        $homeblock10url = (empty($PAGE->theme->settings->homeblock10url)) ? false : $PAGE->theme->settings->homeblock10url;
        $homeblock10image = (empty($PAGE->theme->setting_file_url('homeblock10image', 'homeblock10image'))) ? false : $PAGE->theme->setting_file_url('homeblock10image', 'homeblock10image');
        $homeblock10label = (empty($PAGE->theme->settings->homeblock10label)) ? false : format_text($PAGE->theme->settings->homeblock10label);
        
        $homeblock11title = (empty($PAGE->theme->settings->homeblock11title)) ? false : format_text($PAGE->theme->settings->homeblock11title);
        $homeblock11content = (empty($PAGE->theme->settings->homeblock11content)) ? false : format_text($PAGE->theme->settings->homeblock11content);
        $homeblock11url = (empty($PAGE->theme->settings->homeblock11url)) ? false : $PAGE->theme->settings->homeblock11url;
        $homeblock11image = (empty($PAGE->theme->setting_file_url('homeblock11image', 'homeblock11image'))) ? false : $PAGE->theme->setting_file_url('homeblock11image', 'homeblock11image');
        $homeblock11label = (empty($PAGE->theme->settings->homeblock11label)) ? false : format_text($PAGE->theme->settings->homeblock11label);
        
        $homeblock12title = (empty($PAGE->theme->settings->homeblock12title)) ? false : format_text($PAGE->theme->settings->homeblock12title);
        $homeblock12content = (empty($PAGE->theme->settings->homeblock12content)) ? false : format_text($PAGE->theme->settings->homeblock12content);
        $homeblock12url = (empty($PAGE->theme->settings->homeblock12url)) ? false : $PAGE->theme->settings->homeblock12url;
        $homeblock12image = (empty($PAGE->theme->setting_file_url('homeblock12image', 'homeblock12image'))) ? false : $PAGE->theme->setting_file_url('homeblock12image', 'homeblock12image');
        $homeblock12label = (empty($PAGE->theme->settings->homeblock12label)) ? false : format_text($PAGE->theme->settings->homeblock12label);


        $fp_features = [

        'usefeaturedblocks' => $usehomeblocks,
        'featuredsectiontitle' => $featuredsectiontitle,

        'featuredblocks' => array(
	        
            array(
	            'blockcount'=> '1',
                'hasblock' => $homeblock1title,
                'blockimage' => $homeblock1image,
                'blocktitle' => $homeblock1title,
                'blockcontent' => $homeblock1content,
                'blockurl' => $homeblock1url,
                'blocklabel'=> $homeblock1label,
            ) ,
            
           
            array(
	            'blockcount'=> '2',
                'hasblock' => $homeblock2title,
                'blockimage' => $homeblock2image,
                'blocktitle' => $homeblock2title,
                'blockcontent' => $homeblock2content,
                'blockurl' => $homeblock2url,
                'blocklabel'=> $homeblock2label,
            ) ,
            
            
            array(
	            'blockcount'=> '3',
                'hasblock' => $homeblock3title,
                'blockimage' => $homeblock3image,
                'blocktitle' => $homeblock3title,
                'blockcontent' => $homeblock3content,
                'blockurl' => $homeblock3url,
                'blocklabel'=> $homeblock3label,
            ) ,
            
            array(
	            'blockcount'=> '4',
                'hasblock' => $homeblock4title,
                'blockimage' => $homeblock4image,
                'blocktitle' => $homeblock4title,
                'blockcontent' => $homeblock4content,
                'blockurl' => $homeblock4url,
                'blocklabel'=> $homeblock4label,
            ) ,
            
            array(
	            'blockcount'=> '5',
                'hasblock' => $homeblock5title,
                'blockimage' => $homeblock5image,
                'blocktitle' => $homeblock5title,
                'blockcontent' => $homeblock5content,
                'blockurl' => $homeblock5url,
                'blocklabel'=> $homeblock5label,
            ) ,
            
            array(
	            'blockcount'=> '6',
                'hasblock' => $homeblock6title,
                'blockimage' => $homeblock6image,
                'blocktitle' => $homeblock6title,
                'blockcontent' => $homeblock6content,
                'blockurl' => $homeblock6url,
                'blocklabel'=> $homeblock6label,
            ) ,
            
            array(
	            'blockcount'=> '7',
                'hasblock' => $homeblock7title,
                'blockimage' => $homeblock7image,
                'blocktitle' => $homeblock7title,
                'blockcontent' => $homeblock7content,
                'blockurl' => $homeblock7url,
                'blocklabel'=> $homeblock7label,
            ) ,
            
            array(
	            'blockcount'=> '8',
                'hasblock' => $homeblock8title,
                'blockimage' => $homeblock8image,
                'blocktitle' => $homeblock8title,
                'blockcontent' => $homeblock8content,
                'blockurl' => $homeblock8url,
                'blocklabel'=> $homeblock8label,
            ) ,
            
            array(
	            'blockcount'=> '9',
                'hasblock' => $homeblock9title,
                'blockimage' => $homeblock9image,
                'blocktitle' => $homeblock9title,
                'blockcontent' => $homeblock9content,
                'blockurl' => $homeblock9url,
                'blocklabel'=> $homeblock9label,
            ) ,
            
            array(
	            'blockcount'=> '10',
                'hasblock' => $homeblock10title,
                'blockimage' => $homeblock10image,
                'blocktitle' => $homeblock10title,
                'blockcontent' => $homeblock10content,
                'blockurl' => $homeblock10url,
                'blocklabel'=> $homeblock10label,
            ) ,
            
            array(
	            'blockcount'=> '11',
                'hasblock' => $homeblock11title,
                'blockimage' => $homeblock11image,
                'blocktitle' => $homeblock11title,
                'blockcontent' => $homeblock11content,
                'blockurl' => $homeblock11url,
                'blocklabel'=> $homeblock11label,
            ) ,
            
            array(
	            'blockcount'=> '12',
                'hasblock' => $homeblock12title,
                'blockimage' => $homeblock12image,
                'blocktitle' => $homeblock12title,
                'blockcontent' => $homeblock12content,
                'blockurl' => $homeblock12url,
                'blocklabel'=> $homeblock12label,
            ) ,
            
            
        ) , 
        
        ];

        return $this->render_from_template('theme_maker/fp_features', $fp_features);
    }
    
    
    public function fp_promo() {
        global $PAGE;

        $usepromocarousel = $PAGE->theme->settings->usepromocarousel == 1;
        
        //Item 1
        $carouselitem1 = (empty($PAGE->theme->settings->carouselitem1)) ? false : format_text($PAGE->theme->settings->carouselitem1);
        $carouselitem1image = (empty($PAGE->theme->setting_file_url('carouselitem1image', 'carouselitem1image'))) ? false : $PAGE->theme->setting_file_url('carouselitem1image', 'carouselitem1image');        
        $carouselitem1content = (empty($PAGE->theme->settings->carouselitem1content)) ? false : format_text($PAGE->theme->settings->carouselitem1content);
        $carouselitem1buttontext = (empty($PAGE->theme->settings->carouselitem1buttontext)) ? false : format_text($PAGE->theme->settings->carouselitem1buttontext);
        $carouselitem1buttonurl = (empty($PAGE->theme->settings->carouselitem1buttonurl)) ? false : $PAGE->theme->settings->carouselitem1buttonurl;
        $carouselitem1buttonurlopennew = $PAGE->theme->settings->carouselitem1buttonurlopennew== 1;
        
        
        $usecarouselitem1video = $PAGE->theme->settings->usecarouselitem1video== 1;
        
        $carouselitem1videoswitcher = $PAGE->theme->settings->carouselitem1videoswitcher; 
        $carouselitem1videoid = (empty($PAGE->theme->settings->carouselitem1videoid)) ? false : $PAGE->theme->settings->carouselitem1videoid;
        
        
        //Item 2
        $carouselitem2 = (empty($PAGE->theme->settings->carouselitem2)) ? false : format_text($PAGE->theme->settings->carouselitem2);
        $carouselitem2image = (empty($PAGE->theme->setting_file_url('carouselitem2image', 'carouselitem2image'))) ? false : $PAGE->theme->setting_file_url('carouselitem2image', 'carouselitem2image');    
        $carouselitem2content = (empty($PAGE->theme->settings->carouselitem2content)) ? false : format_text($PAGE->theme->settings->carouselitem2content);
        $carouselitem2buttontext = (empty($PAGE->theme->settings->carouselitem2buttontext)) ? false : format_text($PAGE->theme->settings->carouselitem2buttontext);
        $carouselitem2buttonurl = (empty($PAGE->theme->settings->carouselitem2buttonurl)) ? false : $PAGE->theme->settings->carouselitem2buttonurl;
        $carouselitem2buttonurlopennew = $PAGE->theme->settings->carouselitem2buttonurlopennew== 1;
        
        
        $usecarouselitem2video = $PAGE->theme->settings->usecarouselitem2video== 1;
        
        $carouselitem2videoswitcher = $PAGE->theme->settings->carouselitem2videoswitcher; 
        $carouselitem2videoid = (empty($PAGE->theme->settings->carouselitem2videoid)) ? false : $PAGE->theme->settings->carouselitem2videoid;
        
        
        //Item 3
        $carouselitem3 = (empty($PAGE->theme->settings->carouselitem3)) ? false : format_text($PAGE->theme->settings->carouselitem3);
        $carouselitem3image = (empty($PAGE->theme->setting_file_url('carouselitem3image', 'carouselitem3image'))) ? false : $PAGE->theme->setting_file_url('carouselitem3image', 'carouselitem3image');    
        $carouselitem3content = (empty($PAGE->theme->settings->carouselitem3content)) ? false : format_text($PAGE->theme->settings->carouselitem3content);
        $carouselitem3buttontext = (empty($PAGE->theme->settings->carouselitem3buttontext)) ? false : format_text($PAGE->theme->settings->carouselitem3buttontext);
        $carouselitem3buttonurl = (empty($PAGE->theme->settings->carouselitem3buttonurl)) ? false : $PAGE->theme->settings->carouselitem3buttonurl;
        $carouselitem3buttonurlopennew = $PAGE->theme->settings->carouselitem3buttonurlopennew== 1;
        
        
        $usecarouselitem3video = $PAGE->theme->settings->usecarouselitem3video== 1;
        
        $carouselitem3videoswitcher = $PAGE->theme->settings->carouselitem3videoswitcher; 
        $carouselitem3videoid = (empty($PAGE->theme->settings->carouselitem3videoid)) ? false : $PAGE->theme->settings->carouselitem3videoid;
        
        
        //Item 4
        $carouselitem4 = (empty($PAGE->theme->settings->carouselitem4)) ? false : format_text($PAGE->theme->settings->carouselitem4);
        $carouselitem4image = (empty($PAGE->theme->setting_file_url('carouselitem4image', 'carouselitem4image'))) ? false : $PAGE->theme->setting_file_url('carouselitem4image', 'carouselitem4image');    
        $carouselitem4content = (empty($PAGE->theme->settings->carouselitem4content)) ? false : format_text($PAGE->theme->settings->carouselitem4content);
        $carouselitem4buttontext = (empty($PAGE->theme->settings->carouselitem4buttontext)) ? false : format_text($PAGE->theme->settings->carouselitem4buttontext);
        $carouselitem4buttonurl = (empty($PAGE->theme->settings->carouselitem4buttonurl)) ? false : $PAGE->theme->settings->carouselitem4buttonurl;
        $carouselitem4buttonurlopennew = $PAGE->theme->settings->carouselitem4buttonurlopennew== 1;
        
        
        $usecarouselitem4video = $PAGE->theme->settings->usecarouselitem4video== 1;
        
        $carouselitem4videoswitcher = $PAGE->theme->settings->carouselitem4videoswitcher; 
        $carouselitem4videoid = (empty($PAGE->theme->settings->carouselitem4videoid)) ? false : $PAGE->theme->settings->carouselitem4videoid;
        
        //Item 5
        $carouselitem5 = (empty($PAGE->theme->settings->carouselitem5)) ? false : format_text($PAGE->theme->settings->carouselitem5);
        $carouselitem5image = (empty($PAGE->theme->setting_file_url('carouselitem5image', 'carouselitem5image'))) ? false : $PAGE->theme->setting_file_url('carouselitem5image', 'carouselitem5image');    
        $carouselitem5content = (empty($PAGE->theme->settings->carouselitem5content)) ? false : format_text($PAGE->theme->settings->carouselitem5content);
        $carouselitem5buttontext = (empty($PAGE->theme->settings->carouselitem5buttontext)) ? false : format_text($PAGE->theme->settings->carouselitem5buttontext);
        $carouselitem5buttonurl = (empty($PAGE->theme->settings->carouselitem5buttonurl)) ? false : $PAGE->theme->settings->carouselitem5buttonurl;
        $carouselitem5buttonurlopennew = $PAGE->theme->settings->carouselitem5buttonurlopennew== 1;
        
        
        $usecarouselitem5video = $PAGE->theme->settings->usecarouselitem5video== 1;
        
        $carouselitem5videoswitcher = $PAGE->theme->settings->carouselitem5videoswitcher; 
        $carouselitem5videoid = (empty($PAGE->theme->settings->carouselitem5videoid)) ? false : $PAGE->theme->settings->carouselitem5videoid;
        
        //Item 6
        $carouselitem6 = (empty($PAGE->theme->settings->carouselitem6)) ? false : format_text($PAGE->theme->settings->carouselitem6);
        $carouselitem6image = (empty($PAGE->theme->setting_file_url('carouselitem6image', 'carouselitem6image'))) ? false : $PAGE->theme->setting_file_url('carouselitem6image', 'carouselitem6image');    
        $carouselitem6content = (empty($PAGE->theme->settings->carouselitem6content)) ? false : format_text($PAGE->theme->settings->carouselitem6content);
        $carouselitem6buttontext = (empty($PAGE->theme->settings->carouselitem6buttontext)) ? false : format_text($PAGE->theme->settings->carouselitem6buttontext);
        $carouselitem6buttonurl = (empty($PAGE->theme->settings->carouselitem6buttonurl)) ? false : $PAGE->theme->settings->carouselitem6buttonurl;
        $carouselitem6buttonurlopennew = $PAGE->theme->settings->carouselitem6buttonurlopennew== 1;
        
        
        $usecarouselitem6video = $PAGE->theme->settings->usecarouselitem6video== 1;
        
        $carouselitem6videoswitcher = $PAGE->theme->settings->carouselitem6videoswitcher; 
        $carouselitem6videoid = (empty($PAGE->theme->settings->carouselitem6videoid)) ? false : $PAGE->theme->settings->carouselitem6videoid;
        

        $fp_promo = [

        'usepromocarousel' => $usepromocarousel,
        
        'promocarousel' => array(
	        
            array(
	            'itemcount'=> "1",
                'hasitem' => $carouselitem1,
                'carouselimage' => $carouselitem1image,
                'carouseltitle' => $carouselitem1,
                'carouselcontent' => $carouselitem1content,
                'carouselbtn' => $carouselitem1buttontext,
                'carouselurl' => $carouselitem1buttonurl,
                'hasvideo'=> $usecarouselitem1video,
                'useyoutube' => $carouselitem1videoswitcher== 1,
                'usevimeo' => $carouselitem1videoswitcher== 2,
                'videoid' => $carouselitem1videoid,
                'urlopennew' => $carouselitem1buttonurlopennew,
            ) ,
            
            array(
	            'itemcount'=> "2",
                'hasitem' => $carouselitem2,
                'carouselimage' => $carouselitem2image,
                'carouseltitle' => $carouselitem2,
                'carouselcontent' => $carouselitem2content,
                'carouselbtn' => $carouselitem2buttontext,
                'carouselurl' => $carouselitem2buttonurl,
                'hasvideo'=> $usecarouselitem2video,
                'useyoutube' => $carouselitem2videoswitcher== 1,
                'usevimeo' => $carouselitem2videoswitcher== 2,
                'videoid' => $carouselitem2videoid,
                'urlopennew' => $carouselitem2buttonurlopennew,
            ) , 
            
            array(
	            'itemcount'=> "3",
                'hasitem' => $carouselitem3,
                'carouselimage' => $carouselitem3image,
                'carouseltitle' => $carouselitem3,
                'carouselcontent' => $carouselitem3content,
                'carouselbtn' => $carouselitem3buttontext,
                'carouselurl' => $carouselitem3buttonurl,
                'hasvideo'=> $usecarouselitem3video,
                'useyoutube' => $carouselitem3videoswitcher== 1,
                'usevimeo' => $carouselitem3videoswitcher== 2,
                'videoid' => $carouselitem3videoid,
                'urlopennew' => $carouselitem3buttonurlopennew,
            ) , 
            
            array(
	            'itemcount'=> "4",
                'hasitem' => $carouselitem4,
                'carouselimage' => $carouselitem4image,
                'carouseltitle' => $carouselitem4,
                'carouselcontent' => $carouselitem4content,
                'carouselbtn' => $carouselitem4buttontext,
                'carouselurl' => $carouselitem4buttonurl,
                'hasvideo'=> $usecarouselitem4video,
                'useyoutube' => $carouselitem4videoswitcher== 1,
                'usevimeo' => $carouselitem4videoswitcher== 2,
                'videoid' => $carouselitem4videoid,
                'urlopennew' => $carouselitem4buttonurlopennew,
            ) , 
            
            array(
	            'itemcount'=> "5",
                'hasitem' => $carouselitem5,
                'carouselimage' => $carouselitem5image,
                'carouseltitle' => $carouselitem5,
                'carouselcontent' => $carouselitem5content,
                'carouselbtn' => $carouselitem5buttontext,
                'carouselurl' => $carouselitem5buttonurl,
                'hasvideo'=> $usecarouselitem5video,
                'useyoutube' => $carouselitem5videoswitcher== 1,
                'usevimeo' => $carouselitem5videoswitcher== 2,
                'videoid' => $carouselitem5videoid,
                'urlopennew' => $carouselitem5buttonurlopennew,
            ) , 
            
            array(
	            'itemcount'=> "6",
                'hasitem' => $carouselitem6,
                'carouselimage' => $carouselitem6image,
                'carouseltitle' => $carouselitem6,
                'carouselcontent' => $carouselitem6content,
                'carouselbtn' => $carouselitem6buttontext,
                'carouselurl' => $carouselitem6buttonurl,
                'hasvideo'=> $usecarouselitem6video,
                'useyoutube' => $carouselitem6videoswitcher== 1,
                'usevimeo' => $carouselitem6videoswitcher== 2,
                'videoid' => $carouselitem6videoid,
                'urlopennew' => $carouselitem6buttonurlopennew,
            ) , 
            
            
            
        ),

        ];

        return $this->render_from_template('theme_maker/fp_promo', $fp_promo);
    }
    
    
    public function fp_logos() {
        global $PAGE;

        $uselogos = $PAGE->theme->settings->uselogos == 1;
        $logossectiontitle = (empty($PAGE->theme->settings->logossectiontitle)) ? false : $PAGE->theme->settings->logossectiontitle;

        
        //Logo 1
        $logo1image = (empty($PAGE->theme->setting_file_url('logo1image', 'logo1image'))) ? false : $PAGE->theme->setting_file_url('logo1image', 'logo1image');
        $logo1alttext = (empty($PAGE->theme->settings->logo1alttext)) ? false : $PAGE->theme->settings->logo1alttext;
        $logo1url = (empty($PAGE->theme->settings->logo1url)) ? false : $PAGE->theme->settings->logo1url;

        //Logo 2
        $logo2image = (empty($PAGE->theme->setting_file_url('logo2image', 'logo2image'))) ? false : $PAGE->theme->setting_file_url('logo2image', 'logo2image');
        $logo2alttext = (empty($PAGE->theme->settings->logo2alttext)) ? false : $PAGE->theme->settings->logo2alttext;
        $logo2url = (empty($PAGE->theme->settings->logo2url)) ? false : $PAGE->theme->settings->logo2url;
        
        //Logo 3
        $logo3image = (empty($PAGE->theme->setting_file_url('logo3image', 'logo3image'))) ? false : $PAGE->theme->setting_file_url('logo3image', 'logo3image');
        $logo3alttext = (empty($PAGE->theme->settings->logo3alttext)) ? false : $PAGE->theme->settings->logo3alttext;
        $logo3url = (empty($PAGE->theme->settings->logo3url)) ? false : $PAGE->theme->settings->logo3url;
        
        //Logo 4
        $logo4image = (empty($PAGE->theme->setting_file_url('logo4image', 'logo4image'))) ? false : $PAGE->theme->setting_file_url('logo4image', 'logo4image');
        $logo4alttext = (empty($PAGE->theme->settings->logo4alttext)) ? false : $PAGE->theme->settings->logo4alttext;
        $logo4url = (empty($PAGE->theme->settings->logo4url)) ? false : $PAGE->theme->settings->logo4url;
        
        //Logo 5
        $logo5image = (empty($PAGE->theme->setting_file_url('logo5image', 'logo5image'))) ? false : $PAGE->theme->setting_file_url('logo5image', 'logo5image');
        $logo5alttext = (empty($PAGE->theme->settings->logo5alttext)) ? false : $PAGE->theme->settings->logo5alttext;
        $logo5url = (empty($PAGE->theme->settings->logo5url)) ? false : $PAGE->theme->settings->logo5url;
        
        //Logo 6
        $logo6image = (empty($PAGE->theme->setting_file_url('logo6image', 'logo6image'))) ? false : $PAGE->theme->setting_file_url('logo6image', 'logo6image');
        $logo6alttext = (empty($PAGE->theme->settings->logo6alttext)) ? false : $PAGE->theme->settings->logo6alttext;
        $logo6url = (empty($PAGE->theme->settings->logo6url)) ? false : $PAGE->theme->settings->logo6url;


        $fp_logos = [

        'uselogos' => $uselogos,
        'logossectiontitle'=> $logossectiontitle,
        
        'logos' => array(
	        
            array(
                'haslogo' => $logo1image,
                'logoimage' => $logo1image,
                'logoalt' => $logo1alttext,
                'logourl' => $logo1url,
            ),     
            array(
                'haslogo' => $logo2image,
                'logoimage' => $logo2image,
                'logoalt' => $logo2alttext,
                'logourl' => $logo2url,
            ),   
            array(
                'haslogo' => $logo3image,
                'logoimage' => $logo3image,
                'logoalt' => $logo3alttext,
                'logourl' => $logo3url,
            ),   
            array(
                'haslogo' => $logo4image,
                'logoimage' => $logo4image,
                'logoalt' => $logo4alttext,
                'logourl' => $logo4url,
            ),
            array(
                'haslogo' => $logo5image,
                'logoimage' => $logo5image,
                'logoalt' => $logo5alttext,
                'logourl' => $logo5url,
            ),    
            array(
                'haslogo' => $logo6image,
                'logoimage' => $logo6image,
                'logoalt' => $logo6alttext,
                'logourl' => $logo6url,
            ),       
        ),

        ];

        return $this->render_from_template('theme_maker/fp_logos', $fp_logos);
    }
    
    
    
    public function fp_testimonials() {
        global $PAGE, $OUTPUT;

        $usetestimonials = $PAGE->theme->settings->usetestimonials == 1;
        
        $testimonialsectiontitle = (empty($PAGE->theme->settings->testimonialsectiontitle)) ? false : format_text($PAGE->theme->settings->testimonialsectiontitle);
        
        $defaultimage = $OUTPUT->image_url('default-profile', 'theme');
        
        //Testimonial 1
        $testimonial1content = (empty($PAGE->theme->settings->testimonial1content)) ? false : format_text($PAGE->theme->settings->testimonial1content);
        $testimonial1image = (empty($PAGE->theme->setting_file_url('testimonial1image', 'testimonial1image'))) ? false : $PAGE->theme->setting_file_url('testimonial1image', 'testimonial1image');
        $testimonial1name = (empty($PAGE->theme->settings->testimonial1name)) ? false : format_text($PAGE->theme->settings->testimonial1name);
        $testimonial1meta = (empty($PAGE->theme->settings->testimonial1meta)) ? false : format_text($PAGE->theme->settings->testimonial1meta);
        
        //Testimonial 2
        $testimonial2content = (empty($PAGE->theme->settings->testimonial2content)) ? false : format_text($PAGE->theme->settings->testimonial2content);
        $testimonial2image = (empty($PAGE->theme->setting_file_url('testimonial2image', 'testimonial2image'))) ? false : $PAGE->theme->setting_file_url('testimonial2image', 'testimonial2image');
        $testimonial2name = (empty($PAGE->theme->settings->testimonial2name)) ? false : format_text($PAGE->theme->settings->testimonial2name);
        $testimonial2meta = (empty($PAGE->theme->settings->testimonial2meta)) ? false : format_text($PAGE->theme->settings->testimonial2meta);
        
        //Testimonial 3
        $testimonial3content = (empty($PAGE->theme->settings->testimonial3content)) ? false : format_text($PAGE->theme->settings->testimonial3content);
        $testimonial3image = (empty($PAGE->theme->setting_file_url('testimonial3image', 'testimonial3image'))) ? false : $PAGE->theme->setting_file_url('testimonial3image', 'testimonial3image');
        $testimonial3name = (empty($PAGE->theme->settings->testimonial3name)) ? false : format_text($PAGE->theme->settings->testimonial3name);
        $testimonial3meta = (empty($PAGE->theme->settings->testimonial3meta)) ? false : format_text($PAGE->theme->settings->testimonial3meta);
        
        //Testimonial 4
        $testimonial4content = (empty($PAGE->theme->settings->testimonial4content)) ? false : format_text($PAGE->theme->settings->testimonial4content);
        $testimonial4image = (empty($PAGE->theme->setting_file_url('testimonial4image', 'testimonial4image'))) ? false : $PAGE->theme->setting_file_url('testimonial4image', 'testimonial4image');
        $testimonial4name = (empty($PAGE->theme->settings->testimonial4name)) ? false : format_text($PAGE->theme->settings->testimonial4name);
        $testimonial4meta = (empty($PAGE->theme->settings->testimonial4meta)) ? false : format_text($PAGE->theme->settings->testimonial4meta);
        
        //Testimonial 5
        $testimonial5content = (empty($PAGE->theme->settings->testimonial5content)) ? false : format_text($PAGE->theme->settings->testimonial5content);
        $testimonial5image = (empty($PAGE->theme->setting_file_url('testimonial5image', 'testimonial5image'))) ? false : $PAGE->theme->setting_file_url('testimonial5image', 'testimonial5image');
        $testimonial5name = (empty($PAGE->theme->settings->testimonial5name)) ? false : format_text($PAGE->theme->settings->testimonial5name);
        $testimonial5meta = (empty($PAGE->theme->settings->testimonial5meta)) ? false : format_text($PAGE->theme->settings->testimonial5meta);
        
        //Testimonial 6
        $testimonial6content = (empty($PAGE->theme->settings->testimonial6content)) ? false : format_text($PAGE->theme->settings->testimonial6content);
        $testimonial6image = (empty($PAGE->theme->setting_file_url('testimonial6image', 'testimonial6image'))) ? false : $PAGE->theme->setting_file_url('testimonial6image', 'testimonial6image');
        $testimonial6name = (empty($PAGE->theme->settings->testimonial6name)) ? false : format_text($PAGE->theme->settings->testimonial6name);
        $testimonial6meta = (empty($PAGE->theme->settings->testimonial6meta)) ? false : format_text($PAGE->theme->settings->testimonial6meta);
       
        $fp_testimonials = [

        'usetestimonials' => $usetestimonials,
        'testimonialsectiontitle' => $testimonialsectiontitle,
        'defaultimage' => $defaultimage,
        
        'testimonials' => array(
	        
            array(
                'hastestimonial' => $testimonial1content,
                'testimonial' => $testimonial1content,
                'testimonialimage' => $testimonial1image,
                'testimonialname' => $testimonial1name,
                'testimonialmeta' => $testimonial1meta,
            ),    
            
            array(
                'hastestimonial' => $testimonial2content,
                'testimonial' => $testimonial2content,
                'testimonialimage' => $testimonial2image,
                'testimonialname' => $testimonial2name,
                'testimonialmeta' => $testimonial2meta,
            ),   
            
            array(
                'hastestimonial' => $testimonial3content,
                'testimonial' => $testimonial3content,
                'testimonialimage' => $testimonial3image,
                'testimonialname' => $testimonial3name,
                'testimonialmeta' => $testimonial3meta,
            ),  
            
            array(
                'hastestimonial' => $testimonial4content,
                'testimonial' => $testimonial4content,
                'testimonialimage' => $testimonial4image,
                'testimonialname' => $testimonial4name,
                'testimonialmeta' => $testimonial4meta,
            ),  
            
            array(
                'hastestimonial' => $testimonial5content,
                'testimonial' => $testimonial5content,
                'testimonialimage' => $testimonial5image,
                'testimonialname' => $testimonial5name,
                'testimonialmeta' => $testimonial5meta,
            ),  
            
            array(
                'hastestimonial' => $testimonial6content,
                'testimonial' => $testimonial6content,
                'testimonialimage' => $testimonial6image,
                'testimonialname' => $testimonial6name,
                'testimonialmeta' => $testimonial6meta,
            ),  
              
        ),

        ];

        return $this->render_from_template('theme_maker/fp_testimonials', $fp_testimonials);
    }
    
    
    public function fp_faq() {
        global $PAGE;

        $usefaq = $PAGE->theme->settings->usefaq == 1;
        
        $faqsectiontitle = (empty($PAGE->theme->settings->faqsectiontitle)) ? false : format_text($PAGE->theme->settings->faqsectiontitle);


        $faq1title = (empty($PAGE->theme->settings->faq1title)) ? false : format_text($PAGE->theme->settings->faq1title);
        $faq1content = (empty($PAGE->theme->settings->faq1content)) ? false : format_text($PAGE->theme->settings->faq1content);
        
        
        $faq2title = (empty($PAGE->theme->settings->faq2title)) ? false : format_text($PAGE->theme->settings->faq2title);
        $faq2content = (empty($PAGE->theme->settings->faq2content)) ? false : format_text($PAGE->theme->settings->faq2content);
        
        $faq3title = (empty($PAGE->theme->settings->faq3title)) ? false : format_text($PAGE->theme->settings->faq3title);
        $faq3content = (empty($PAGE->theme->settings->faq3content)) ? false : format_text($PAGE->theme->settings->faq3content);
        
        $faq4title = (empty($PAGE->theme->settings->faq4title)) ? false : format_text($PAGE->theme->settings->faq4title);
        $faq4content = (empty($PAGE->theme->settings->faq4content)) ? false : format_text($PAGE->theme->settings->faq4content);
        
        $faq5title = (empty($PAGE->theme->settings->faq5title)) ? false : format_text($PAGE->theme->settings->faq5title);
        $faq5content = (empty($PAGE->theme->settings->faq5content)) ? false : format_text($PAGE->theme->settings->faq5content);
        
        $faq6title = (empty($PAGE->theme->settings->faq6title)) ? false : format_text($PAGE->theme->settings->faq6title);
        $faq6content = (empty($PAGE->theme->settings->faq6content)) ? false : format_text($PAGE->theme->settings->faq6content);
        
        $faq7title = (empty($PAGE->theme->settings->faq7title)) ? false : format_text($PAGE->theme->settings->faq7title);
        $faq7content = (empty($PAGE->theme->settings->faq7content)) ? false : format_text($PAGE->theme->settings->faq7content);
        
        $faq8title = (empty($PAGE->theme->settings->faq8title)) ? false : format_text($PAGE->theme->settings->faq8title);
        $faq8content = (empty($PAGE->theme->settings->faq8content)) ? false : format_text($PAGE->theme->settings->faq8content);
        
        $faq9title = (empty($PAGE->theme->settings->faq9title)) ? false : format_text($PAGE->theme->settings->faq9title);
        $faq9content = (empty($PAGE->theme->settings->faq9content)) ? false : format_text($PAGE->theme->settings->faq9content);
        
        $faq10title = (empty($PAGE->theme->settings->faq10title)) ? false : format_text($PAGE->theme->settings->faq10title);
        $faq10content = (empty($PAGE->theme->settings->faq10content)) ? false : format_text($PAGE->theme->settings->faq10content);
        
        $faqsectionbuttontext = (empty($PAGE->theme->settings->faqsectionbuttontext)) ? false : format_text($PAGE->theme->settings->faqsectionbuttontext);
        $faqsectionbuttonurl = (empty($PAGE->theme->settings->faqsectionbuttonurl)) ? false : $PAGE->theme->settings->faqsectionbuttonurl;
        $faqsectionbuttonurlopennew = $PAGE->theme->settings->faqsectionbuttonurlopennew== 1;


        $fp_faq = [

        'usefaq' => $usefaq,
        'faqsectiontitle' => $faqsectiontitle,
        
        'faq1title' => $faq1title,
        'faq2title' => $faq2title,
        'faq3title' => $faq3title,
        'faq4title' => $faq4title,
        'faq5title' => $faq5title,
        'faq6title' => $faq6title,
        'faq7title' => $faq7title,
        'faq8title' => $faq8title,
        'faq9title' => $faq9title,
        'faq10title' => $faq10title,
        
        'faq1content' => $faq1content,
        'faq2content' => $faq2content,
        'faq3content' => $faq3content,
        'faq4content' => $faq4content,
        'faq5content' => $faq5content,
        'faq6content' => $faq6content,
        'faq7content' => $faq7content,
        'faq8content' => $faq8content,
        'faq9content' => $faq9content,
        'faq10content' => $faq10content,
        
        'hasfaqcta' => $faqsectionbuttontext && $faqsectionbuttonurl,
        'faqbutton' => $faqsectionbuttontext,
        'faqurl'=> $faqsectionbuttonurl,
        'urlopennew' => $faqsectionbuttonurlopennew,


        ];

        return $this->render_from_template('theme_maker/fp_faq', $fp_faq);
    }
    
    public function fp_ctasection() {
        global $PAGE;
        
        $usectasection = $PAGE->theme->settings->usectasection== 1;
        $ctasectiontitle = (empty($PAGE->theme->settings->ctasectiontitle)) ? false : format_text($PAGE->theme->settings->ctasectiontitle);
        $ctasectioncontent = (empty($PAGE->theme->settings->ctasectioncontent)) ? false : format_text($PAGE->theme->settings->ctasectioncontent);
        $ctasectionbuttontext = (empty($PAGE->theme->settings->ctasectionbuttontext)) ? false : format_text($PAGE->theme->settings->ctasectionbuttontext);
        $ctasectionbuttonurl = (empty($PAGE->theme->settings->ctasectionbuttonurl)) ? false : $PAGE->theme->settings->ctasectionbuttonurl;
        $ctasectionbuttonurlopennew = $PAGE->theme->settings->ctasectionbuttonurlopennew== 1;
        


        $fp_ctasection = [
        
            'hasctasection' => $usectasection, 
            'ctatitle' => $ctasectiontitle, 
            'ctacontent' => $ctasectioncontent, 
            'hasctabutton' => ($ctasectionbuttontext && $ctasectionbuttonurl) ? true : false,
            'ctabutton' => $ctasectionbuttontext,
            'ctaurl' => $ctasectionbuttonurl,
            'urlopennew' => $ctasectionbuttonurlopennew,


        ];

        return $this->render_from_template('theme_maker/fp_ctasection', $fp_ctasection);
    }
    
    
    public function footer_blocks() {
        global $PAGE;

        $usefooterblocks = $PAGE->theme->settings->usefooterblocks == 1;

        
        //Blocks
        $footerblock1 = (empty($PAGE->theme->settings->footerblock1)) ? false : format_text($PAGE->theme->settings->footerblock1);
        $footerblock2 = (empty($PAGE->theme->settings->footerblock2)) ? false : format_text($PAGE->theme->settings->footerblock2);
        $footerblock3 = (empty($PAGE->theme->settings->footerblock3)) ? false : format_text($PAGE->theme->settings->footerblock3);
        $footerblock4 = (empty($PAGE->theme->settings->footerblock4)) ? false : format_text($PAGE->theme->settings->footerblock4);
        
        
              
        $footer_blocks = [

        'usefooterblocks' => $usefooterblocks,
        
        'footerblocks' => array(
	        
            array(
                'hasblock' => $footerblock1,
                'blockcontent' => $footerblock1,
            ), 
            array(
                'hasblock' => $footerblock2,
                'blockcontent' => $footerblock2,
            ),    
            
            array(
                'hasblock' => $footerblock3,
                'blockcontent' => $footerblock3,
            ),    
            
            array(
                'hasblock' => $footerblock4,
                'blockcontent' => $footerblock4,
            ),    

        ),

        ];

        return $this->render_from_template('theme_maker/footer_blocks', $footer_blocks);
    }
    
    
    public function footer_widget() {
        global $PAGE;
        
        $usefooterwidget = $PAGE->theme->settings->usefooterwidget == 1;
        
        $footerwidgettitle = (empty($PAGE->theme->settings->footerwidgettitle)) ? false : format_text($PAGE->theme->settings->footerwidgettitle);
        $footerwidget = (empty($PAGE->theme->settings->footerwidget)) ? false : format_text($PAGE->theme->settings->footerwidget);
        
        $footer_widget = [
	        'usefooterwidget' => $usefooterwidget,
	        'footerwidgettitle' => $footerwidgettitle,
	        'footerwidgetcontent' => $footerwidget,
	        
        ];
        
        
        return $this->render_from_template('theme_maker/footer_widget', $footer_widget);
    }
    
    
     public function footer_copyright() {
	     
        global $PAGE;
        
        $setting = $PAGE->theme->settings->copyright;
        
        return $setting != '' ? $setting : '';
        
    }
    
    public function course_image() {
        global $CFG, $COURSE, $PAGE, $OUTPUT;
        // Get course overview files.
        if (empty($CFG->courseoverviewfileslimit)) {
            return '';
        }
        require_once ($CFG->libdir . '/filestorage/file_storage.php');
        require_once ($CFG->dirroot . '/course/lib.php');
        $fs = get_file_storage();
        $context = context_course::instance($COURSE->id);
        $files = $fs->get_area_files($context->id, 'course', 'overviewfiles', false, 'filename', false);
        if (count($files)) {
            $overviewfilesoptions = course_overviewfiles_options($COURSE->id);
            $acceptedtypes = $overviewfilesoptions['accepted_types'];
            if ($acceptedtypes !== '*') {
                // Filter only files with allowed extensions.
                require_once ($CFG->libdir . '/filelib.php');
                foreach ($files as $key => $file) {
                    if (!file_extension_in_typegroup($file->get_filename() , $acceptedtypes)) {
                        unset($files[$key]);
                    }
                }
            }
            if (count($files) > $CFG->courseoverviewfileslimit) {
                // Return no more than $CFG->courseoverviewfileslimit files.
                $files = array_slice($files, 0, $CFG->courseoverviewfileslimit, true);
            }
        }

        // Get course overview files as images - set $courseimage.
        // The loop means that the LAST stored image will be the one displayed if >1 image file.
        $courseimage = '';
        foreach ($files as $file) {
            $isimage = $file->is_valid_image();
            if ($isimage) {
                $courseimage = file_encode_url("$CFG->wwwroot/pluginfile.php", '/' . $file->get_contextid() . '/' . $file->get_component() . '/' . $file->get_filearea() . $file->get_filepath() . $file->get_filename() , !$isimage);
            }
        }
        
        
        // Create html for header.
        
        $html = "";

        if (theme_maker_get_setting('usecourseheaderimage') && $courseimage) {
	        
	        $html = html_writer::start_div('course-header-bg');
	        
            $html .= html_writer::start_div('course-header-image', array(
                'style' => 'background-image: url("' . $courseimage . '"); -webkit-background-size:cover; -moz-background-size:cover; -o-background-size:cover; background-size:cover; background-repeat: no-repeat;  background-position: center; width:100%; height: 100%;'
            ));
            $html .= html_writer::end_div(); // End has-course-image inline style div.
            
            $html .= html_writer::start_div('mask');
            
            $html .= html_writer::end_div(); //End mask div
            
            $html .= html_writer::end_div();
            
        } 

        return $html;

    }
    
    
    public function has_course_image() {
        global $CFG, $COURSE, $PAGE, $OUTPUT;
        // Get course overview files.
        if (empty($CFG->courseoverviewfileslimit)) {
            return '';
        }
        require_once ($CFG->libdir . '/filestorage/file_storage.php');
        require_once ($CFG->dirroot . '/course/lib.php');
        $fs = get_file_storage();
        $context = context_course::instance($COURSE->id);
        $files = $fs->get_area_files($context->id, 'course', 'overviewfiles', false, 'filename', false);
        if (count($files)) {
            $overviewfilesoptions = course_overviewfiles_options($COURSE->id);
            $acceptedtypes = $overviewfilesoptions['accepted_types'];
            if ($acceptedtypes !== '*') {
                // Filter only files with allowed extensions.
                require_once ($CFG->libdir . '/filelib.php');
                foreach ($files as $key => $file) {
                    if (!file_extension_in_typegroup($file->get_filename() , $acceptedtypes)) {
                        unset($files[$key]);
                    }
                }
            }
            if (count($files) > $CFG->courseoverviewfileslimit) {
                // Return no more than $CFG->courseoverviewfileslimit files.
                $files = array_slice($files, 0, $CFG->courseoverviewfileslimit, true);
            }
        }

        // Get course overview files as images - set $courseimage.
        // The loop means that the LAST stored image will be the one displayed if >1 image file.
        $courseimage = '';
        foreach ($files as $file) {
            $isimage = $file->is_valid_image();
            if ($isimage) {
                $courseimage = file_encode_url("$CFG->wwwroot/pluginfile.php", '/' . $file->get_contextid() . '/' . $file->get_component() . '/' . $file->get_filearea() . $file->get_filepath() . $file->get_filename() , !$isimage);
            }
        }


        if (theme_maker_get_setting('usecourseheaderimage') && $courseimage) {
	        
	        return "has-course-header-image";
            
        } 
 

    }
    
    public function fp_javascript() {
        global $PAGE;
        
        $usertl = $PAGE->theme->settings->usertl == 1;       
        
        $fp_javascript = [
	        'usertl' => $usertl
        ];

        
        return $this->render_from_template('theme_maker/fp_javascript', $fp_javascript);
    }
    


   


}
