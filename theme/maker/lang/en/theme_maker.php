<?php

defined('MOODLE_INTERNAL') || die();

/* Core */
$string['configtitle'] = 'Maker Settings';
$string['pluginname'] = 'Maker';
$string['privacy:metadata'] = 'The Maker theme does not store any personal data about any user.';
$string['choosereadme'] = '
<div class="clearfix">
<div class="well">
<h2>Moodle Theme Maker</h2>
<p><img src="maker/pix/screenshot.png" /></p>
</div>
<div class="well">
<h3>About Maker</h3>
<p>Maker is a responsive Moodle theme designed for online learning.</p>
<h3>Theme Parents</h3>
<p>This theme is based on the Moodle Boost theme.</p>
<h3>Theme Credits</h3>
<p>Author: 3rd Wave Media<br>
Contact: elearning@3rdwavemedia.com<br>
Website: <a href="http://elearning.3rdwavemedia.com/">elearning.3rdwavemedia.com</a>
</p>
<h3>Theme License</h3>
<p><a href="http://elearning.3rdwavemedia.com/licenses">License details</a></p>
</div></div>';
$string['region-side-pre'] = 'Right';
                                                          

// Theme Tabs    
$string['generalheading'] = 'General Settings';                                                                          
$string['headerheading'] = 'Header';                                                                                                                                                                                                                                                                      
$string['footerheading'] = 'Footer';  
$string['slideshowheading'] = 'Frontpage Slideshow';   
$string['benefitsheading'] = 'Frontpage Benefits';  
$string['homeblocksheading'] = 'Frontpage Featured';      
$string['promocarouselheading'] = 'Frontpage Promo';   
$string['logosheading'] = 'Frontpage Logos';    
$string['testimonialsheading'] = 'Frontpage Testimonials';   
$string['faqheading'] = 'Frontpage FAQ';    
$string['ctasectionheading'] = 'Frontpage CTA Section'; 
$string['courseheading'] = 'Course Settings'; 
$string['socialheading'] = 'Social Media';   
$string['loginheading'] = 'Login Page';     
$string['advancedheading'] = 'Advanced Settings';      

//URL open in new window

$string['opennew'] = 'Open link in a new window/tab';
$string['opennewdesc'] = 'Check this box to open the link in a new window/tab';

//General Settings
$string['generalheadingsub'] = 'General Settings';
$string['generalheadingdesc'] = 'Configure general site settings';
$string['logo'] = 'Site logo';  
$string['logodesc'] = 'Upload a logo image (max height 40px)';      
$string['preset'] = 'Theme colour scheme';                                                                                      
$string['preset_desc'] = 'Pick a preset to change the colour scheme of the theme.';  
$string['brandcolorprimary'] = 'Brand primary colour'; 
$string['brandcolorprimarydesc'] = 'Pick your main brand colour. This will override the theme preset colour.'; 
$string['brandcolorsecondary'] = 'Brand secondary colour'; 
$string['brandcolorsecondarydesc'] = 'Pick an additional brand colour. This is used as a highlight colour and will override the theme preset colour. (Tip: you can use the same colour as the primary colour if you do not have an additional colour.'; 
$string['pagefont'] = 'Page font'; 
$string['pagefontdesc'] = 'Choose a Google font for page text.'; 
$string['headingfont'] = 'Heading font'; 
$string['headingfontdesc'] = 'Choose a Google font for page headings.'; 
$string['usertl'] = 'RTL language mode'; 
$string['usertldesc'] = 'Activate theme RTL mode (note: do not check this box if your site is not using RTL language).'; 
                                                                       
 
//Header Settings
$string['headersocialheadingsub'] = 'Header Social Media';  
$string['headersocialdesc'] = 'Display social media links in the site header area.';  
$string['useheadersocial'] = 'Enable social media links'; 
$string['useheadersocialdesc'] = 'Check this box to show social media links in header.'; 

$string['alertheadingsub'] = 'Header Alert (Frontpage Only)'; 
$string['alertdesc'] = 'Add an alert section to the frontpage header area.';
$string['usealert'] = 'Enable alert'; 
$string['usealertdesc'] = 'Check this box to show the alert section.'; 
$string['alertcontent'] = 'Alert content'; 
$string['alertcontentdesc'] = 'Enter content.'; 
$string['alertbgcolor'] = 'Alert colour'; 
$string['alertbgcolordesc'] = 'Alert section background colour.'; 

//Footer Settings
$string['footersocialheadingsub'] = 'Footer Social Media';
$string['footersocialdesc'] = 'Display social media links in the site footer area.';
$string['usefootersocial'] = 'Enable social media links';
$string['usefootersocialdesc'] = 'Check this box to show social media links in footer.';
$string['socialsectiontitle'] = 'Social media heading';
$string['socialsectiontitledesc'] = 'Enter a heading.';

$string['footerblocksheadingsub'] = 'Footer Content Blocks';
$string['footerblocksdesc'] = 'This allows you to add 4 content blocks in the site footer area.';
$string['usefooterblocks'] = 'Enable footer content blocks';
$string['usefooterblocksdesc'] = 'Check this box to show footer content blocks.';
$string['footerblock1'] = 'Footer Block 1';
$string['footerblock2'] = 'Footer Block 2';
$string['footerblock3'] = 'Footer Block 3';
$string['footerblock4'] = 'Footer Block 4';
$string['footerblock1desc'] = 'Enter content';
$string['footerblock2desc'] = 'Enter content';
$string['footerblock3desc'] = 'Enter content';
$string['footerblock4desc'] = 'Enter content';

$string['footerwidgetheadingsub'] = 'Footer Widget Area';
$string['footerwidgetdesc'] = 'This allows you to add extra content which will be displayed in the site footer area.';
$string['usefooterwidget'] = 'Enable footer widget';
$string['usefooterwidgetdesc'] = 'Check this box to show footer widget area.';
$string['footerwidgettitle'] = 'Title';
$string['footerwidgettitledesc'] = 'Enter a title';
$string['footerwidget'] = 'Content';
$string['footerwidgetdesc'] = 'Enter content';




$string['footerwidgedesc'] = 'This allows you to add extra content in the site footer area.';
$string['copyright'] = 'Copyright';
$string['copyrightdesc'] = 'Enter copyright info';
 
//Frontpage Slideshow
$string['slideshowheadingsub'] = 'Frontpage Hero Slideshow';
$string['slideshowheadingsubdesc'] = 'Configure hero slideshow.';

$string['useheroslideshow'] = 'Enable hero slideshow';
$string['useheroslideshowdesc'] = 'Check this box to show the hero slideshow section on the frontpage.';
$string['usesearch'] = 'Course search box';
$string['usesearchdesc'] = 'Check this box to show a course search box under the slideshow.';


$string['slideshowheight'] = 'Slideshow height';
$string['slideshowheightdesc'] = 'Adjust the height of the slideshow section';

$string['heroheadline'] = 'Site headline';
$string['heroheadlinedesc'] = 'Enter a site headline.';
$string['herosummary'] = 'Site summary';
$string['herosummarydesc'] = 'Enter a site summary.';
$string['herocta'] = 'CTA button text';
$string['heroctadesc'] = 'Enter the text for the CTA button.';


$string['useherovideo'] = 'Enable video link';
$string['useherovideodesc'] = 'Check this box to add a video modal link.';
$string['herovideo'] = 'Video link text';
$string['herovideodesc'] = 'Enter link text.';
$string['herovideoswitcher'] = 'Video type switcher';
$string['herovideoswitcherdesc'] = 'Select the video type.';
$string['herovideoid'] = 'Video ID';
$string['herovideoiddesc'] = 'Enter YouTube or Vimeo video ID. (eg. 3ORsUGVNxGs or 32424882)';



$string['herourl'] = 'CTA button link';
$string['herourldesc'] = 'Enter the URL of the CTA button.';

$string['slide1'] = 'Slide 1';
$string['slide2'] = 'Slide 2';
$string['slide3'] = 'Slide 3';
$string['slide4'] = 'Slide 4';
$string['slideinfodesc'] = 'Add slide image.';
$string['slideimage'] = 'Slide image';
$string['slideimagedesc'] = 'Upload an image. Recommended image size: 1200 x 570px';

//Frontpage Benefits 

$string['benefitsheadingsub'] = 'Frontpage Benefits Section';
$string['benefitsheadingsubdesc'] = 'Configure benefits section.';

$string['usebenefits'] = 'Enable benefits section';
$string['usebenefitsdesc'] = 'Check this box to show the benefits section on the frontpage.';

$string['benefit1info'] = 'Benefit 1';
$string['benefit2info'] = 'Benefit 2';
$string['benefit3info'] = 'Benefit 3';
$string['benefit4info'] = 'Benefit 4';
$string['benefit5info'] = 'Benefit 5';
$string['benefit6info'] = 'Benefit 6';

$string['benefit1icon'] = 'Icon';
$string['benefit2icon'] = 'Icon';
$string['benefit3icon'] = 'Icon';
$string['benefit4icon'] = 'Icon';
$string['benefit5icon'] = 'Icon';
$string['benefit6icon'] = 'Icon';


$string['benefit1icondesc'] = 'Enter Google material icon code (<a href="https://material.io/icons/" target="_blank">reference</a>).';
$string['benefit2icondesc'] = 'Enter Google material icon code (<a href="https://material.io/icons/" target="_blank">reference</a>).';
$string['benefit3icondesc'] = 'Enter Google material icon code (<a href="https://material.io/icons/" target="_blank">reference</a>).';
$string['benefit4icondesc'] = 'Enter Google material icon code (<a href="https://material.io/icons/" target="_blank">reference</a>).';
$string['benefit5icondesc'] = 'Enter Google material icon code (<a href="https://material.io/icons/" target="_blank">reference</a>).';
$string['benefit6icondesc'] = 'Enter Google material icon code (<a href="https://material.io/icons/" target="_blank">reference</a>).';
 
$string['benefit1title'] = 'Title';
$string['benefit2title'] = 'Title';
$string['benefit3title'] = 'Title';
$string['benefit4title'] = 'Title';
$string['benefit5title'] = 'Title';
$string['benefit6title'] = 'Title';


$string['benefit1titledesc'] = 'Enter title.';
$string['benefit2titledesc'] = 'Enter title.';
$string['benefit3titledesc'] = 'Enter title.';
$string['benefit4titledesc'] = 'Enter title.';
$string['benefit5titledesc'] = 'Enter title.';
$string['benefit6titledesc'] = 'Enter title.';


$string['benefit1copy'] = 'Content';
$string['benefit2copy'] = 'Content';
$string['benefit3copy'] = 'Content';
$string['benefit4copy'] = 'Content';
$string['benefit5copy'] = 'Content';
$string['benefit6copy'] = 'Content';


$string['benefit1contentdesc'] = 'Enter content.';
$string['benefit2contentdesc'] = 'Enter content.';
$string['benefit3contentdesc'] = 'Enter content.';
$string['benefit4contentdesc'] = 'Enter content.';
$string['benefit5contentdesc'] = 'Enter content.';
$string['benefit6contentdesc'] = 'Enter content.';



$string['benefit1desc'] = 'Enter the settings for benefit 1.';
$string['benefit2desc'] = 'Enter the settings for benefit 2.';
$string['benefit3desc'] = 'Enter the settings for benefit 3.';
$string['benefit4desc'] = 'Enter the settings for benefit 4.';
$string['benefit5desc'] = 'Enter the settings for benefit 5.';
$string['benefit6desc'] = 'Enter the settings for benefit 6.';

//Frontpage Featured Blocks
$string['homeblocksheadingsub'] = 'Frontpage Featured Section';
$string['homeblocksheadingsubdesc'] = 'Configure featured section.';
$string['usehomeblocks'] = 'Enable featured section';
$string['usehomeblocksdesc'] = 'Check this box to show the featured content blocks section on the frontpage.';
$string['featuredsectiontitle'] = 'Featured section title';
$string['featuredsectiontitledesc'] = 'Enter section title';


$string['homeblockheight'] = 'Block height';
$string['homeblockheightdesc'] = 'Adjust the height to have equal height blocks';


$string['homeblock1info'] = 'Block 1';
$string['homeblock2info'] = 'Block 2';
$string['homeblock3info'] = 'Block 3';
$string['homeblock4info'] = 'Block 4';
$string['homeblock5info'] = 'Block 5';
$string['homeblock6info'] = 'Block 6';
$string['homeblock7info'] = 'Block 7';
$string['homeblock8info'] = 'Block 8';
$string['homeblock9info'] = 'Block 9';
$string['homeblock10info'] = 'Block 10';
$string['homeblock11info'] = 'Block 11';
$string['homeblock12info'] = 'Block 12';


$string['homeblock1desc'] = 'Enter the settings for block 1.';
$string['homeblock2desc'] = 'Enter the settings for block 2.';
$string['homeblock3desc'] = 'Enter the settings for block 3.';
$string['homeblock4desc'] = 'Enter the settings for block 4.';
$string['homeblock5desc'] = 'Enter the settings for block 5.';
$string['homeblock6desc'] = 'Enter the settings for block 6.';
$string['homeblock7desc'] = 'Enter the settings for block 7.';
$string['homeblock8desc'] = 'Enter the settings for block 8.';
$string['homeblock9desc'] = 'Enter the settings for block 9.';
$string['homeblock10desc'] = 'Enter the settings for block 10.';
$string['homeblock11desc'] = 'Enter the settings for block 11.';
$string['homeblock12desc'] = 'Enter the settings for block 12.';


$string['homeblocktitle'] = 'Title';
$string['homeblocktitledesc'] = 'Enter the title for this block.';
$string['homeblockimage'] = 'Image';
$string['homeblockimagedesc'] = 'Upload an image for this block. Recommended size: 320 x 190px';
$string['homeblockcontent'] = 'Content';
$string['homeblockcontentdesc'] = 'Add text content for this block.';
$string['homeblockurl'] = 'Target URL';
$string['homeblockbuttonurldesc'] = 'Enter the target URL of the block.';
$string['homeblocklabel'] = 'Label';
$string['homeblocklabeldesc'] = 'Enter label text.';


//Frontpage Promo Carousel
$string['promocarouselheadingsub'] = 'Frontpage Promo Carousel Section';
$string['promocarouselheadingsubdesc'] = 'Configure promo carousel section.';

$string['usepromocarousel'] = 'Enable promo carousel section';
$string['usepromocarouseldesc'] = 'Check this box to show the promo carousel section on the frontpage.';

$string['carouselitemheight'] = 'Carousel item height';
$string['carouselitemheightdesc'] = 'Adjust carousel item height';


$string['carouselitemtitle'] = 'Title';
$string['carouselitemtitledesc'] = 'Enter the title for this item.';
$string['carouselitemimage'] = 'Image';
$string['carouselitemimagedesc'] = 'Upload an image. Image size: 800 x 534px';
$string['carouselitemcontent'] = 'Content';
$string['carouselitemcontentdesc'] = 'Enter content for this block.';
$string['carouselitembuttontext'] = 'CTA button text';
$string['carouselitembuttontextdesc'] = 'Enter the text for the CTA button';
$string['carouselitembuttonurl'] = 'CTA button link';
$string['carouselitembuttonurldesc'] = 'Enter the URL of the CTA button.';

$string['usecarouselitemvideo'] = 'Enable video for this carousel item';
$string['usecarouselitemvideodesc'] = 'Check this box to add a video modal link.';
$string['carouselitemvideoswitcher'] = 'Video type switcher';
$string['carouselitemvideoswitcherdesc'] = 'Select the video type.';
$string['carouselitemvideoid'] = 'Video ID';
$string['carouselitemvideoiddesc'] = 'Enter YouTube or Vimeo video ID. (eg. 3ORsUGVNxGs or 32424882)';


$string['carouselitem1info'] = 'Item 1';
$string['carouselitem2info'] = 'Item 2';
$string['carouselitem3info'] = 'Item 3';
$string['carouselitem4info'] = 'Item 4';
$string['carouselitem5info'] = 'Item 5';
$string['carouselitem6info'] = 'Item 6';


$string['carouselitem1desc'] = 'Enter the settings for item 1.';
$string['carouselitem2desc'] = 'Enter the settings for item 2.';
$string['carouselitem3desc'] = 'Enter the settings for item 3.';
$string['carouselitem4desc'] = 'Enter the settings for item 4.';
$string['carouselitem5desc'] = 'Enter the settings for item 5.';
$string['carouselitem6desc'] = 'Enter the settings for item 6.';

//Frontpage logo section
$string['logosheadingsub'] = 'Frontpage Logos Section';
$string['logosheadingsubdesc'] = 'Configure logos section.';
$string['logosdesc'] = 'This allows you to add up to 6 logo images on the frontpage.';
$string['uselogos'] = 'Enable logos section';
$string['uselogosdesc'] = 'Check this box to show the logos section on the frontpage.';
$string['logossectiontitle'] = 'Logos section title';
$string['logossectiontitledesc'] = 'Enter section title';



$string['logo1'] = 'logo 1';
$string['logo2'] = 'logo 2';
$string['logo3'] = 'logo 3';
$string['logo4'] = 'logo 4';
$string['logo5'] = 'logo 5';
$string['logo6'] = 'logo 6';
$string['logo1desc'] = 'Add content for this logo.';
$string['logo2desc'] = 'Add content for this logo.';
$string['logo3desc'] = 'Add content for this logo.';
$string['logo4desc'] = 'Add content for this logo.';
$string['logo5desc'] = 'Add content for this logo.';
$string['logo6desc'] = 'Add content for this logo.';
$string['logoimage'] = 'Image';
$string['logoimagedesc'] = 'Upload the logo image. Image Size: 200 x 76px';
$string['logoalttext'] = 'Alternative text';
$string['logoalttextdesc'] = 'Alternative text for the logo image.';
$string['logourl'] = 'Logo link';
$string['logourldesc'] = 'Enter the URL of the logo image.';

//Frontpage testimonials
$string['testimonialsheadingsub'] = 'Frontpage Testimonials Section';
$string['testimonialsheadingsubdesc'] = 'Configure testimonials section.';
$string['usetestimonials'] = 'Enable testimonials';
$string['usetestimonialsdesc'] = 'Check this box to show the testimonials section on the frontpage.';
$string['testimonialsectiontitle'] = 'Testimonials section title';
$string['testimonialsectiontitledesc'] = 'Enter section title';
$string['testimonialitemheight'] = 'Testimonial item height';
$string['testimonialitemheightdesc'] = 'Adjust the height to have equal height testimonial blocks';


$string['testimonial1'] = 'Testimonial 1';
$string['testimonial2'] = 'Testimonial 2';
$string['testimonial3'] = 'Testimonial 3';
$string['testimonial4'] = 'Testimonial 4';
$string['testimonial5'] = 'Testimonial 5';
$string['testimonial6'] = 'Testimonial 6';
$string['testimonial1desc'] = 'Add content for this testimonial.';
$string['testimonial2desc'] = 'Add content for this testimonial.';
$string['testimonial3desc'] = 'Add content for this testimonial.';
$string['testimonial4desc'] = 'Add content for this testimonial.';
$string['testimonial5desc'] = 'Add content for this testimonial.';
$string['testimonial6desc'] = 'Add content for this testimonial.';
$string['testimonialimage'] = 'Image';
$string['testimonialimagedesc'] = 'Upload a testimonial profile image. Image size: 80 x 80px';
$string['testimonialname'] = 'Source name';
$string['testimonialnamedesc'] = 'Testimonial source name.';
$string['testimonialmeta'] = 'Source meta data';
$string['testimonialmetadesc'] = 'Testimonial source additional info.';
$string['testimonialcontent'] = 'Testimonial quote';
$string['testimonialcontentdesc'] = 'Enter the testimonial quote.';

//Frontpage FAQ 

$string['faqheadingsub'] = 'Frontpage FAQ Section';
$string['faqheadingsubdesc'] = 'Configure FAQ section.';

$string['usefaq'] = 'Enable FAQ section';
$string['usefaqdesc'] = 'Check this box to show the FAQ section on the frontpage.';

$string['faqsectiontitle'] = 'FAQ section title';
$string['faqsectiontitledesc'] = 'Enter section title';

$string['faq1info'] = 'Q1';
$string['faq2info'] = 'Q2';
$string['faq3info'] = 'Q3';
$string['faq4info'] = 'Q4';
$string['faq5info'] = 'Q5';
$string['faq6info'] = 'Q6';
$string['faq7info'] = 'Q7';
$string['faq8info'] = 'Q8';
$string['faq9info'] = 'Q9';
$string['faq10info'] = 'Q10';

 
$string['faq1title'] = 'Question';
$string['faq2title'] = 'Question';
$string['faq3title'] = 'Question';
$string['faq4title'] = 'Question';
$string['faq5title'] = 'Question';
$string['faq6title'] = 'Question';
$string['faq7title'] = 'Question';
$string['faq8title'] = 'Question';
$string['faq9title'] = 'Question';
$string['faq10title'] = 'Question';

$string['faq1titledesc'] = 'Enter question.';
$string['faq2titledesc'] = 'Enter question.';
$string['faq3titledesc'] = 'Enter question.';
$string['faq4titledesc'] = 'Enter question.';
$string['faq5titledesc'] = 'Enter question.';
$string['faq6titledesc'] = 'Enter question.';
$string['faq7titledesc'] = 'Enter question.';
$string['faq8titledesc'] = 'Enter question.';
$string['faq9titledesc'] = 'Enter question.';
$string['faq10titledesc'] = 'Enter question.';


$string['faq1content'] = 'Answer';
$string['faq2content'] = 'Answer';
$string['faq3content'] = 'Answer';
$string['faq4content'] = 'Answer';
$string['faq5content'] = 'Answer';
$string['faq6content'] = 'Answer';
$string['faq7content'] = 'Answer';
$string['faq8content'] = 'Answer';
$string['faq9content'] = 'Answer';
$string['faq10content'] = 'Answer';


$string['faq1contentdesc'] = 'Enter content.';
$string['faq2contentdesc'] = 'Enter content.';
$string['faq3contentdesc'] = 'Enter content.';
$string['faq4contentdesc'] = 'Enter content.';
$string['faq5contentdesc'] = 'Enter content.';
$string['faq6contentdesc'] = 'Enter content.';
$string['faq7contentdesc'] = 'Enter content.';
$string['faq8contentdesc'] = 'Enter content.';
$string['faq9contentdesc'] = 'Enter content.';
$string['faq10contentdesc'] = 'Enter content.';



$string['faq1desc'] = 'Enter the settings for Q1.';
$string['faq2desc'] = 'Enter the settings for Q2.';
$string['faq3desc'] = 'Enter the settings for Q3.';
$string['faq4desc'] = 'Enter the settings for Q4.';
$string['faq5desc'] = 'Enter the settings for Q5.';
$string['faq6desc'] = 'Enter the settings for Q6.';
$string['faq7desc'] = 'Enter the settings for Q7.';
$string['faq8desc'] = 'Enter the settings for Q8.';
$string['faq9desc'] = 'Enter the settings for Q9.';
$string['faq10desc'] = 'Enter the settings for Q10.';

$string['faqsectionbuttontext'] = 'CTA button text';
$string['faqsectionbuttontextdesc'] = 'Enter the text for the CTA button.';
$string['faqsectionbuttonurl'] = 'CTA Button link';
$string['faqsectionbuttonurldesc'] = 'Enter the URL of the CTA button.';



//Frontpage CTA section
$string['ctasectionheadingsub'] = 'Frontpage Call-To-Action Section';
$string['ctasectionheadingsubdesc'] = 'Configure CTA section.';
$string['usectasection'] = 'Enable CTA section';
$string['usectasectiondesc'] = 'Check this box to show the CTA section on the frontpage.';

$string['ctasectiontitle'] = 'CTA section title';
$string['ctasectiontitledesc'] = 'Enter section title.';
$string['ctasectioncontent'] = 'CTA section content';
$string['ctasectioncontentdesc'] = 'Enter section content.';
$string['ctasectionbuttontext'] = 'CTA button text';
$string['ctasectionbuttontextdesc'] = 'Enter the text for the CTA button.';
$string['ctasectionbuttonurl'] = 'CTA Button link';
$string['ctasectionbuttonurldesc'] = 'Enter the URL of the CTA button.';


//Course Settings
$string['courseheadingsub'] = 'Configure course related settings';
$string['coursedisplaystyle'] = 'Course list layout style';
$string['coursedisplaystyledesc'] = 'Choose the layout style. Please note: the Masonry layout orders course items from top to bottom then left to right.';
$string['usecoursesummarytrim'] = 'Truncate the course summary';
$string['usecoursesummarytrimdesc'] = "Check this box to truncate the course summary. It's recommended to keep this box checked when using the default or cards course list layout. You can adjust the truncation length by defining the Course summary max characters below.";
$string['coursesummarylength'] = 'Course summary max characters';
$string['coursesummarylengthdesc'] = 'Number of visible characters before truncation. The default value is recommended for best design results when using the default course list layout';
$string['courseheadingsub'] = 'Course Settings';
$string['courseheadingsubdesc'] = 'Configure course page.';
$string['usecourseheaderimage'] = 'Show course header image';
$string['usecourseheaderimagedesc'] = 'Check this box to show the course header image (if there is one). Teachers can upload a course header image via the course settings page';
$string['courseheaderimageheight'] = 'Header image height';
$string['courseheaderimageheightdesc'] = 'Adjust header image height';


//Social Media Links
$string['socialmediaheadingsub'] = 'Social Media Links';
$string['socialmediaheadingsubdesc'] = 'Configure social media links.';

$string['website'] = 'Website URL';
$string['websitedesc'] = 'Enter the URL of your main website.';

$string['twitter'] = 'Twitter URL';
$string['twitterdesc'] = 'Enter the URL of your Twitter homepage.';

$string['facebook'] = 'Facebook URL';
$string['facebookdesc'] = 'Enter the URL of your Facebook page.';

$string['googleplus'] = 'Google+ URL';
$string['googleplusdesc'] = 'Enter the URL of your Google+ profile.';

$string['linkedin'] = 'LinkedIn URL';
$string['linkedindesc'] = 'Enter the URL of your LinkedIn profile.';

$string['youtube'] = 'YouTube URL';
$string['youtubedesc'] = 'Enter the URL of your YouTube channel.';

$string['vimeo'] = 'Vimeo URL';
$string['vimeodesc'] = 'Enter the URL of your Vimeo channel.';

$string['instagram'] = 'Instagram URL';
$string['instagramdesc'] = 'Enter the URL of your Instagram page.';

$string['pinterest'] = 'Pinterest URL';
$string['pinterestdesc'] = 'Enter the URL of your Pinterest page.';

$string['flickr'] = 'Flickr URL';
$string['flickrdesc'] = 'Enter the URL of your Flickr page.';

$string['tumblr'] = 'Tumblr URL';
$string['tumblrdesc'] = 'Enter the URL of your Tumblr page.';

$string['slideshare'] = 'SlideShare URL';
$string['slidesharedesc'] = 'Enter the URL of your SlideShare page.';

$string['skype'] = 'Skype Account';
$string['skypedesc'] = 'Enter your Skype username';


$string['weibo'] = 'Weibo Page';
$string['weibodesc'] = 'Enter the URL of your Weibo page.';

$string['rss'] = 'RSS Feed URL';
$string['rssdesc'] = 'Enter the URL of your RSS feed.';

$string['customsocialheadingsub'] = 'Custom Links';
$string['customsocialdesc'] = 'This allows you to add up to 3 custom social media links';

$string['sociallink'] = "Link Name";
$string['sociallinkdesc'] = "Enter a URL for the link";
$string['sociallinkicon'] = "Link Icon";
$string['sociallinkicondesc'] = "Enter the FontAwesome name of the icon (<a href='https://fontawesome.com/v4.7.0/icons/' target='_blank'>Reference</a>).";


//Login Page
$string['loginheadingsub'] = 'Login Page';
$string['loginheadingsubdesc'] = 'Configure login page.';
$string['loginbgimage'] = "Page background image";
$string['loginbgimagedesc'] = "Upload an image";
$string['useloginbgmask'] = "Enable background image overlay";
$string['useloginbgmaskdesc'] = "Check this box to darken the background image.";

//Advanced Settings

$string['customcssheadingsub'] = "Custom SCSS/CSS";
$string['customcssdesc'] = "This allows you to customise the theme styling to suit your own branding needs.";                                                                                                                                                                                                                                                                       
$string['rawscss'] = 'Raw SCSS';                                                                                                                                                                                                       
$string['rawscss_desc'] = 'Use this field to provide SCSS or CSS code which will be injected at the end of the style sheet.';                                                                                                            
$string['rawscsspre'] = 'Raw initial SCSS';                                                                                                                                                                                     
$string['rawscsspre_desc'] = 'In this field you can provide initialising SCSS code, it will be injected before everything else. Most of the time you will use this setting to define variables.';     
$string['analyticsheadingsub'] = 'Google Analytics';
$string['analyticsdesc'] = 'Here you can enable Google Analytics for your site. If you do not have one, you will need to sign up for a free account at the Google Analytics site (<a href="http://analytics.google.com" target="_blank">http://analytics.google.com</a>)';
$string['analyticsid'] = 'Your Tracking ID';
$string['analyticsiddesc'] = 'Enter your Tracking ID for this site from Google Analytics. Typically formatted like UA-XXXXXXXX-X';


$string['iosicon'] = 'iOS Homescreen Icons';
$string['iosicondesc'] = 'Upload your icons for iOS homescreens.';

$string['iphoneicon'] = 'iPhone Icon';
$string['iphoneicondesc'] = 'Image Name: apple-touch-icon.png | Image Format: PNG | Image Size: 120 x 120px';

$string['iphoneretinaicon'] = 'iPhone Retina Icon';
$string['iphoneretinaicondesc'] = 'Image Name: apple-touch-icon-180x180.png | Image Format: PNG | Image Size: 180 x 180px';

$string['ipadicon'] = 'iPad Icon';
$string['ipadicondesc'] = 'Image Name: apple-touch-icon-152x152.png | Image Format: PNG | Image Size: 152 x 152px';

$string['ipadretinaicon'] = 'iPad Retina Icon';
$string['ipadretinaicondesc'] = 'Image Name: apple-touch-icon-167x167.png | Image Format: PNG | Image Size: 167 x 167px';                                                                   

