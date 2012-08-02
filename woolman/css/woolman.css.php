/**<?php // Process color scheme

$domain = dcss('domain'); // home, semester camp, blog, etc.

$base_color = dcss('base-color');
$base_color = dcss('base-color');
$analog_a = dcss('analogA');
$analog_b = dcss('analogB');
$compliment = dcss('compliment');


//  $analog_a = dcss_color($base_color, '0', 'bg', NULL, 'analogic', '1');
//  $analog_b = dcss_color($base_color, '0', 'bg', NULL, 'analogic', '-1');
//  $compliment = dcss_color($base_color, '0', 'bg', NULL, 'compliment', '1');


$text_color = dcss_color($base_color, '-6');
$headings_color = dcss_color($analog_a, '-4');
$sidebar_text_color = dcss_color($text_color, '-7');
$sidebar_headings_color = dcss_color($analog_a, '-5');

$link_color = array(
  'home'    =>  '#599A1E',
  'semester'=>  '#B76917',
  'camp'    =>  '#05B855',
  'blog'    =>  '#9F5368',
);

// Failsafe:Reset domain to 'home' if it isn't one of those listed above.
if ( !array_key_exists($domain, $link_color) )
  $domain = 'home';

?>

/** body **/
body{
background:url(/sites/all/themes/woolman/images/background-light.jpg) repeat;
}

#page{
background:url(/sites/all/themes/woolman/images/background.jpg) repeat;
color:<?php print $text_color; ?>;
}

#top-links{
position:relative;
}

#current-user-links,
#search-box,
.views-field-addtoany-link{
float:right;
}

#current-user-links,
#top-links .block{
margin-right:.8em;
margin-top:2px;
}

#edit-search-theme-form-1.blur{
color:#79857A;
}

/* Header Links */

#top-links div#block-block-7{
position:absolute;
width:500px;
height:33px;
float:none;
left:0px;
top:-2px;
}

#headerlinks li{
display:block;
float:none;
position:absolute;
font-size:1.2em;
text-align:center;
margin:0px;
padding:0px;
height:33px;
top:0px;
opacity:.35;
background-image:url("/sites/all/themes/woolman/images/headerlinks.png");
background-repeat:no-repeat;
}

#headerlinks a,
#headerlinks a:visited{
display:block;
width:100%;
height:33px;
padding-top:7px;
text-decoration:none;
color:black;
}

#headerlinks a:hover,
#headerlinks a:focus{
color:<?php print $text_color; ?>;
opacity:.65;
}

li#<?php print $domain;?>link{  /*style current domain's link*/
opacity:1;
color:<?php print $text_color; ?>;
}

#headerlinks:hover li#<?php print $domain;?>link{
opacity:.77;
}

#headerlinks li:hover,
#headerlinks:hover li#<?php print $domain;?>link:hover{
opacity:1;
}

#homelink{
background-position:0px 0px;
width:82px;
left:18px;
}
#semesterlink{
background-position:-88px 0px;
width:111px;
left:94px;
}
#camplink{
background-position:-204px 0px;
width:91px;
left:200px;
}
#bloglink{
background-position:-300px 0px;
width:75px;
left:284px;
}
#alumnilink{
}
#storelink{
}
#headerlinks li#civicrm{
background-image:none;
left:368px;
}

/** header **/
#header{
height:200px;
position:relative;
background:url(/sites/all/themes/woolman/images/banner-<?php print $domain;?>.jpg) no-repeat;
}

/** links **/
a:link,
a:visited{
color:<?php print $link_color[$domain]; ?>;
font-weight:bold;
text-decoration:none;
}

a:hover,
a:focus{
color:<?php print dcss_color($link_color[$domain], '-4'); ?>;
text-decoration:underline;
}

a:active{
text-decoration:underline;
color:<?php print dcss_color($link_color[$domain], '+3'); ?>;
}


/** content **/

.view-id-embed_image.view-display-id-attachment_1,
.imagefield-field_page_image{
float:right;
max-width:55%;
margin-left:10px;
margin-bottom:5px;
}

#content-header{
position:relative;
}

.breadcrumb{
padding-bottom:0; /* Undo system.css */
}

.breadcrumb a, .breadcrumb a:link{
font-weight:normal;
color:<?php print $sidebar_text_color; ?>;
}

h1.title, /* The title of the page */
h2.title, /* Block title or the title of a piece of content when it is given in a list of content */
h3.title{ /* Comment title */
margin:0;
}

h1.title{
border-bottom:2px solid <?php print dcss_color($headings_color, '+2'); ?>;
}

h1, h2, h3, h4, h5, h6{
color:<?php print $headings_color; ?>;
}

.underline,
.view.gallery-view-covers h3{
border-bottom:1px solid <?php print $headings_color; ?>;
clear:both;
}


hr{
height:1px;
border:1px solid <?php print dcss_color($headings_color, '+4'); ?>;
}

/*  Floaty tabs for nodes and views */

body.node #content-header div.tabs,
body.section-gallery #content-header div.tabs{ /* See also the tabs.css file. */
position:absolute;
display:none;
right:5px;
bottom:-3px;
}

.view-blog .views-row{
position:relative;
}

.view ul.tabs{
position:absolute;
display:none;
right:5px;
top:.5em;
}

body.node #content-inner:hover div.tabs,
.view .views-row:hover ul.tabs,
body.section-gallery #content:hover div.tabs{
display:block;
}

body.node div.tabs li,
body.section-gallery div.tabs li{
opacity:.4;
}

body.node #content-header:hover div.tabs li,
body.section-gallery #content-header:hover div.tabs li,
.view ul.tabs li{
opacity:.7;
}

body.node #content-header:hover div.tabs li:hover,
body.section-gallery #content-header:hover div.tabs li:hover,
.view ul.tabs li:hover{
opacity:1;
}

.help{
margin:1em 0;
}

.more-help-link{
font-size:0.85em;
text-align:right;
}

ul.links /* List of links */{
margin:1em 0;
padding:0;
}

ul.links.inline{
margin:0;
display:block;
clear:both;
}

ul.links li{
display:inline;
list-style-type:none;
padding:0 0.5em;
}

.pager /* A list of page numbers when more than 1 page of content is available */{
clear:both;
margin:1em 0;
text-align:center;
}

.pager a, .pager strong.pager-current{
padding:0.5em;
}

.feed-icons /* The links to the RSS or Atom feeds for the current list of content */{
margin:1em 0;
}

.node-unpublished div.unpublished,
div.comment-unpublished div.unpublished{
height:0;
overflow:visible;
color:#d8d8d8;
font-size:75px;
line-height:1;
font-family:Impact, "Arial Narrow", Helvetica, sans-serif;
font-weight:bold;
text-transform:uppercase;
text-align:center;
word-wrap:break-word;
}

.marker{
color:#c00;
}

.node.node-unpublished .picture,
div.comment.comment-unpublished .picture{
position:relative; /* Otherwise floated pictures will appear below the "Unpublished" text. */
}

/*Better Select*/

.better-select div.form-checkboxes-scroll{
padding:5px;
border:1px solid #CCC;
max-height:150px;
overflow:auto;
}

.better-select .form-checkboxes .checkbox-depth-0,
.better-select .form-radios .form-item{
padding-right:25px;
float:left;
clear:none;
}

div.form-radios,
div.form-checkboxes{
clear:both;
}

.form-item .description{
clear:both;
}

#upload-attachments .checkbox-depth-0,
#better-select-edit-taxonomy-11 .checkbox-depth-0{
clear:both;
padding-top:5px;
float:none;
}

#upload-attachments .checkbox-depth-1,
#better-select-edit-taxonomy-11 .checkbox-depth-1{
float:left;
padding-left:22px;
}

#upload-attachments .checkbox-depth-0 label.option,
#better-select-edit-taxonomy-11 .checkbox-depth-0 label.option{
font-weight:bold;
}

/** Comments **/

#comments /* Wrapper for the list of comments and its title */{
margin:1em 0;
}

.new /* "New" marker for comments that are new for the current user */{
color:#c00;
float:right;
}

div.comment ul.links{
margin:.5em 0 0;
text-align:right;
}

div.comment ul.links li:hover{
background-image:url(/sites/all/themes/woolman/images/background.jpg);
-webkit-border-radius:4px;
-moz-border-radius:4px;
border-radius:4px;
}

div.comment{
background:url(/sites/all/themes/woolman/images/background-dark.jpg);
padding:1em;
-webkit-border-radius:4px;
-moz-border-radius:4px;
border-radius:4px;
margin:0px 2% 1.2em;
font-size:.88em;
}

div.comment .name-date{
font-size:1.05em;
font-weight:bold;
font-style:italic;
border-bottom:2px solid <?php print dcss_color($base_color, '-2');?>;
}

/*
* Rollover edit links for blocks
*/

div.block.with-block-editing{
position:relative;
}

div.block.with-block-editing div.edit{
display:none;
position:absolute;
right:0;
top:0;
z-index:40;
border:1px solid #eee;
padding:0 2px;
font-size:0.75em;
background-color:#fff;
opacity:.4;
}

div.block.with-block-editing:hover div.edit{
display:block;
}

div.block.with-block-editing div.edit:hover{
opacity:.88;
}

/** Sidebar blocks **/
.block{
margin-bottom:1em;
}

div.region-sidebars div.block{
margin-top:1em;
color:<?php print $sidebar_text_color;?>;
}

div.region-sidebars div.block-inner{
background:url(/sites/all/themes/woolman/images/sidebar-<?php print $domain; ?>.jpg) no-repeat;
margin:0;
padding:5px 1em 1em;
}

div.region-sidebars div.block-bottom{
height:4px;
background:url(/sites/all/themes/woolman/images/sidebar-<?php print $domain; ?>.jpg) no-repeat 0px -989px;
}

div.region-sidebars .block h2{
padding:0;
margin:0px 0px 15px 0px;
}

div.region-sidebars div.imagecache,
div.region-sidebars div.views-field-field-journal-image-fid,
div.region-sidebars div.views-field-field-staff-headshot-fid{
float:right;
margin-left:.6em;
margin-bottom:.4em;
}

div.region-sidebars .separator{
margin:.4em auto .2em;
width:64px;
}

div.region-sidebars .views-row-last .separator{
display:none;
}

div.region-sidebars a:link,
div.region-sidebars a:visited{
color:<?php print dcss_color($link_color[$domain], '-2'); ?>
}

div.region-sidebars a:hover,
div.region-sidebars a:focus{
color:<?php print dcss_color($link_color[$domain], '-5'); ?>;
}

div.region-sidebars a:active{
color:<?php print dcss_color($link_color[$domain], '+1'); ?>;
}

div.block-views div.view div.views-admin-links{
display:none;
}

div.region-sidebars .views-field-title{
margin-top:.5em;
margin-bottom:.1em;
font-weight:bold;
}

div.region-sidebars .view-header{
font-style:italic;
margin-bottom:.5em;
}

.region-sidebars h1, .region-sidebars h2, .region-sidebars h3, .region-sidebars h4, .region-sidebars h5, .region-sidebars h6, div.region-sidebars .title a{
color:<?php print $sidebar_headings_color; ?>;
}

.region-sidebars .underline{
border-bottom:1px solid <?php print $sidebar_headings_color; ?>;
}

#block-views-blog-block_2 .view-content{
font-size:.88em;
}

#block-block-18 .block-inner,
#block-block-22 .block-inner{ /*facebook*/
padding-left:7px;
}

#block-block-18 .title,
#block-block-22 .title{ /*facebook*/
padding-left:4px;
}

/* Query block */

.view-comment-view.view-display-id-attachment_2{
font-size:.9em;
}

.view-comment-view.view-display-id-attachment_2 .views-field-phpcode{
text-align:right;
}

#block-views-query_view-block_1 .views-row .separator{
display:block;
margin:.6em auto;
}

/*upcoming events block*/


#block-views-events_and_schedules-block_1 .woolman-semester .event-name a:link,
#block-views-events_and_schedules-block_1 .woolman-semester .event-name a:visited
{color:<?php print dcss_color($link_color['semester'], '-2')?>}

#block-views-events_and_schedules-block_1 .woolman-semester .event-name a:hover,
#block-views-events_and_schedules-block_1 .woolman-semester .event-name a:focus
{color:<?php print dcss_color($link_color['semester'], '-5'); ?>}

#block-views-events_and_schedules-block_1 .woolman-semester .event-name a:focus
{color:<?php print dcss_color($link_color['semester'], '+1'); ?>}

#block-views-events_and_schedules-block_1 .sierra-friends-camp .event-name a:link,
#block-views-events_and_schedules-block_1 .sierra-friends-camp .event-name a:visited
{color:<?php print dcss_color($link_color['camp'], '-2'); ?>}

#block-views-events_and_schedules-block_1 .sierra-friends-camp .event-name a:hover,
#block-views-events_and_schedules-block_1 .sierra-friends-camp .event-name a:focus
{color:<?php print dcss_color($link_color['camp'], '-5'); ?>}

#block-views-events_and_schedules-block_1 .sierra-friends-camp .event-name a:active
{color:<?php print dcss_color($link_color['camp'], '+1'); ?>}

.block .view-events-and-schedules .event-type{font-size:85%}

#block-views-events_and_schedules-block_1 h4{
margin:.4em auto .2em;
line-height:1em;
}

/* Semester Calendar */

.view-semester-calendar.view-display-id-attachment_3 .editview-field .date-clear-block .form-item .form-item+.form-item,
.node-type-semester-calendar .node-form .date-clear-block .form-item .form-item+.form-item{
display:none;
}

<?php if($domain=='camp'):?>
/* Camp Pages */

a.camp-sign{
display:block;
width:259px;
height:63px;
background-image:url(/sites/all/themes/woolman/images/camp_landing_page.jpg);
background-repeat:no-repeat;
margin-bottom:5px;
}

#sfc-link{
background-position:-1px 0px;
margin-left:70px;
}
#sfc-link:hover, #sfc-link:active{
background-position:-260px 0px;
}

#tlc-link{
background-position:-1px -64px;
margin-left:76px;
}
#tlc-link:hover, #tlc-link:active{
background-position:-260px -64px;
}

#staff-link{
background-position:-1px -128px;
margin-left:75px;
}
#staff-link:hover, #parent-link:active{
background-position:-260px -128px;
}

#parent-link{
background-position:-1px -191px;
margin-left:70px;
}
#parent-link:hover, #staff-link:active{
background-position:-260px -191px;
}

/* Camp gallery sidebar */
#block-views-gallery_lists-block_1 img{
margin:1em 0 0 7px;
}

#block-views-gallery_lists-block_1 .block-inner{
padding-left:0;
padding-right:0;
}

#block-views-gallery_lists-block_1 .block-inner h2{
margin-left:1em;
}
<?php endif?>

/* Views Tables */

.view table tr.odd{
background-image:url(/sites/all/themes/woolman/images/background-light.jpg);
}
.view table tr.even{
background-image:url(/sites/all/themes/woolman/images/background-dark.jpg);
}
body.section-admin .view table tr{
background-image:none;
}
body.section-admin .view table tr.odd{
background-color: #E0E0E0;
}
.view table td{
padding:.8em;
}
.view td.active{
background:transparent;
}

/* Styled Bullets */
ul.styled{
margin-left: 0;
padding-left: 0;
list-style: none;
}

ul.styled li{
padding-left: 14px;
background-repeat: no-repeat;
background-position: 0 3px;
}

ul.styled.heart li{
background-image: url(/sites/all/themes/woolman/images/bullets/heart-bullet.png);
}

ul.styled.star li{
background-image: url(/sites/all/themes/woolman/images/bullets/star-bullet.png);
}

ul.styled.bad li{
background-image: url(/sites/all/themes/woolman/images/bullets/bad-bullet.png);
}

/* CiviCRM & Drupal Admin Sections */

body.section-admin #page{
background:white;
max-width:2000px;
}

/*add space for civi menu*/
#civicrm-menu + #page{
margin-top:24px;  
position:relative;
}

body.section-admin #header{
height:60px;
background:<?php print dcss_color($base_color, '-3');?> url(/sites/all/themes/woolman/images/woolman_pjs_sm.png) no-repeat 10px 10px;
}

body.section-admin div.region-sidebars div.block-inner{
background:<?php print dcss_color($base_color, '+8');?>;
border:0px solid <?php print dcss_color($base_color, '-3');?>;
-webkit-border-radius:7px;
-moz-border-radius:7px;
border-radius:7px;
}

body.section-admin div.block-bottom{
display:none;
}

/* CIVICRM */
.crm-create-new-list-inner{
background-color:#ECF7F6;
}

.block #crm-create-new-link{
margin-top:-15px;
}

#crm-create-new-list{
top:4px;
}

#caseSummary{
margin-bottom:.5em;
}

#caseSummary div{
padding:10px 10px 9px;
background-color:#F6F6F6;
border:1px solid #999999;
float:left;
margin-bottom:12px;
margin-right:5px;
}

#caseSummary #semester-pref{
padding-top:9px;
margin-bottom:11px;
}

#caseSummary div div{
padding:0;
border:0 none;
float:none;
margin:0;
display:inline;
}

#caseSummary label{
margin-right:.3em;
}

#caseSummary span.edit-icon{
margin-left:.3em;
}

#crm-container .crm-case-caseview-form-block-activity_type_id td+td{
padding-top:16px;
}

#caseSummary #latest-note{
clear:both;
}

#caseSummary #latest-note div{
display:block;
}

/* Admissions */

.view-contact-admissions .views-row{
float:left;
margin:0 4% 1em;
}

/* Blog */

.view-blog span.views-field-field-journal-date-value,
.view-blog span.views-field-tid,
.view-blog span.views-field-tid-1{
font-size:.8em;
margin-right:1em;
}

div.view-blog.view-display-id-page_1 div.views-field-title h2,
div.view-blog.view-display-id-page_2 div.views-field-title h2,
div.view-blog.view-display-id-page_3 div.views-field-title h2,
div.view-blog.view-display-id-page_4 div.views-field-title h2{
padding-bottom:.1em;
margin-bottom:.1em;
border-bottom:1px solid <?php print $base_color;?> ;
}

div.view-blog.view-display-id-page_4 div.views-field-field-journal-author-value,
#blog-author{
margin-top:.9em;
margin-bottom:.9em;
}

#blog-date-tags span{
margin-right:1em;
font-size:.92em;
}

#blog-date-tags .view-blog,
#blog-date-tags .view-content,
#blog-date-tags .views-row{
display:inline;
}

.view-blog .views-field-body img{
max-width:100%;
}

/* Misc Woolman Elements */

div.field-field-staff-headshot,
div.imagefield-field_journal_image, div.views-field-field-journal-image-fid{
float:right;
padding-left:10px;
padding-bottom:10px;
}

#footer{
margin:1em 0;
text-align:center;
}

#footer .block span{
margin:0 1.5%;
}

li h3,
li h4,
li h5,
li h6{ /* keep list headings together with their contents */
margin-bottom:.2em;
}

/* iWitness */

.node-type-iwitness table{
margin:0 auto;
padding:0;
border-collapse:separate;
}

/*image gallery*/
.gallery-images-list .item-list li{
list-style-type:none;
padding:4px;
margin:7px;
float:left;
background:url(/sites/all/themes/woolman/images/background-light.jpg) repeat;
text-align:center;
width:100px;
height:130px;
font-size:.8em;
overflow:hidden;
line-height:1.25em;
}

.gallery-images-list .item-list div.image-thumbnail a{
padding:0px;
margin:0px;
}

.view.gallery-view-covers .views-row{
background:url(/sites/all/themes/woolman/images/background-light.jpg) repeat;
float:left;
margin:0.5em;
padding:10px;
width:300px;
}

/** Miscellaneous Drupal styles **/

.more-link{ /* Aggregator, blog, and forum more link */
text-align:right;
}

#user-login-form{/* Drupal's default login form */
text-align:left;
}

li a.active{ /* The active item in a Drupal menu */
color:#000;
}

/* Social Icons */
a.social-link{
display:inline-block;
width:48px;
height:48px;
background-image:url(/sites/all/themes/woolman/images/social.png);
background-repeat:no-repeat;
}

a#rss-link{
background-position:left top;
}

a#rss-link:hover{
background-position:left bottom;
}

a#fb-link{
background-position:center top;
margin:0px 12px;
}

a#fb-link:hover{
background-position:center bottom;
}

a#twitter-link{
background-position:right top;
}

a#twitter-link:hover{
background-position:right bottom;
}

/* Feeds */
.node-type-civicrm-event .links.inline{
display:none;
}

/** Forms **/

fieldset,
body.section-user #crm-container fieldset{
background:url(/sites/all/themes/woolman/images/background-light.jpg) repeat;
}

fieldset.collapsed{
background:transparent;
}

div.fieldset{
background-color:#F4F2D9;
border:1px solid #AAAAAA;
padding:0 0.5em;
}

.form-item, /* Wrapper for a form element (or group of form elements) and its label */
.form-checkboxes,
.form-radios{
margin:1em 0;
}

.form-item input.error, /* Highlight the form elements that caused a form submission error */
.form-item textarea.error,
.form-item select.error{
border:2px solid #c00;
}

.form-item label /* The label for a form element */{
display:block;
font-weight:bold;
}

.form-item label.option /* The label for a radio button or checkbox */{
display:inline;
font-weight:normal;
}

.form-required /* The part of the label that indicates a required field */{
color:#c00;
}

.form-item .description /* The descriptive help text (separate from the label) */{
font-size:0.85em;
}

.form-checkboxes .form-item, /* Pack groups of checkboxes and radio buttons closer together */
.form-radios .form-item{
margin:0.4em 0;
}

.container-inline div, .container-inline label /* Inline labels and form divs */{
display:inline;
}

.tips /* Tips for Drupal's input formats */{
margin:0;
padding:0;
font-size:0.9em;
}

/* This is how we do Field Groupings 'round these parts */

.subset div.form-item{
float:left;
margin-right:1em;
margin-top:0;
}

.subset div.form-item.last{
margin-right:0;
}

.subset,
.subset+div{
clear:both;
}

.subset .form-radios{
margin:0;
}

/* For 2 side-by-side fieldsets */
fieldset.two-up.num-1{
float:left;
width:48%;
}
fieldset.two-up.num-2{
float:right;
width:48%;
}
div a.button-style {
border: 4px outset;
padding: 2px 4px;
text-decoration: none;
background: url("/sites/all/themes/woolman/images/background-light.jpg") repeat scroll 0 0 transparent;
text-decoration: none !important;
border-radius: 6px;
-moz-border-radius: 6px;
-webkit-border-radius: 6px;
}

div a.button-style:active,
div a.button-style:hover, {
border: 4px inset;
background: url("/sites/all/themes/woolman/images/background.jpg") repeat scroll 0 0 transparent;
}

/** Drupal admin tables **/
/* We overrode these styles in html-elements.css, but restore them for the
* forms on the site.
*/
form tbody{
border-top:1px solid #ccc;
}

form th{
text-align:left;
padding-right:1em;
border-bottom:3px solid #ccc;
}

form tbody th{
border-bottom:1px solid #ccc;
}

form thead th{
text-align:left;
padding-right:1em;
border-bottom:3px solid #ccc;
}
