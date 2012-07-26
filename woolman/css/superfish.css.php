/* $Id: superfish.css,v 1.3 2010/03/27 09:18:40 mehrpadin Exp $ */
/*** ESSENTIAL STYLES ***/

.sf-menu, .sf-menu * {
  margin: 0;
  padding: 0;
  list-style: none;
}
.sf-menu {
  line-height: 1.0;
  z-index: 99;
}
.sf-menu ul {
  padding-left: 0 !important;
  position: absolute;
  top: -999em;
  width: 12em; /* left offset of submenus need to match (see below) */
}
.sf-menu ul li {
  width: 100%;
}
.sf-menu li:hover {
  visibility: inherit; /* fixes IE7 'sticky bug' */
}
.sf-menu li {
  float: left;
  position: relative;
}
.sf-menu a,
.sf-menu span.nolink{
  display: block;
/* 	padding-top: .5em; */
  position: relative;
}
.sf-menu span.nolink{
cursor:default;
font-weight:bold;
}
.sf-menu li.first:hover ul,
.sf-menu li.first.sfHover ul,
.sf-menu li.middle:hover ul,
.sf-menu li.middle.sfHover ul{
  left: 0;
  top: 31px; /* match top ul list item height */
  z-index: 99;
}
.sf-menu li.last:hover ul,
.sf-menu li.last.sfHover ul {
	right: 0;
  top: 31px; /* match top ul list item height */
  z-index: 99;
	}
ul.sf-menu li:hover li ul,
ul.sf-menu li.sfHover li ul {
  top: -999em;
}
ul.sf-menu li li:hover ul,
ul.sf-menu li li.sfHover ul {
  left: 12em; /* match ul width */
  top: 0;
}
ul.sf-menu li li:hover li ul,
ul.sf-menu li li.sfHover li ul {
  top: -999em;
}
ul.sf-menu li li li:hover ul,
ul.sf-menu li li li.sfHover ul {
  left: 12em; /* match ul width */
  top: 0;
}
/*** LAYOUT ***/


#menus .block-superfish {
margin:0;
padding:0;
}

#menus ul {
margin: 0;
padding: 0;
float: right;
/* font-size:1.06em; /* size menu text */ 
}

.sf-menu {
  float: left;
  margin-bottom: 0;
}

/*** SKIN ***/

<?php // Process color scheme
	$domain = dcss('domain'); // home, semester camp, blog, etc.
	$base_color = dcss('base-color');
	$analog_a = dcss('analogA');
	$analog_b = dcss('analogB');
	$compliment = dcss('compliment');
	
	$text_color = dcss_color($base_color, '-9');
	$bar_color = dcss_color($base_color, '+4');
	$menu_hover = dcss_color($analog_a, '+7');
	$item_color = dcss_color($base_color, '+3');
	
	
?>


.sf-menu a{
  border-left: 1px solid <?php print $menu_hover;?>;
  border-top: 1px solid <?php print dcss_color($bar_color, '+2');?>;
  padding: .5em 1em;
  text-decoration: none;
}

.sf-menu span.nolink{
	border-left: 1px solid <?php print $menu_hover;?>;
  border-top: 1px solid <?php print dcss_color($bar_color, '+2');?>;
  padding: 8px 1em 0;
	height:22px;
}

.sf-menu a, .sf-menu a:visited, .sf-menu span.nolink  { /* visited pseudo selector so IE6 applies text color*/
  color: <?php print $text_color;?>;
}
.sf-menu li {
  background: <?php print $bar_color;?>;
	opacity: .82;
}
.sf-menu li li {
	background: <?php print $item_color;?>;
}

.sf-menu li:hover, .sf-menu li.sfHover,
.sf-menu a:focus, .sf-menu a:hover, .sf-menu a:active {
  background: <?php print $menu_hover;?>;
  outline: 0;
	opacity: 1;
	color: <?php print dcss_color($base_color, '-7');?>;
}

/*** arrows **/
.sf-menu a.sf-with-ul {
  padding-right: 2.25em;
  min-width: 1px; /* trigger IE7 hasLayout so spans position accurately */
}
.sf-sub-indicator {
  position: absolute;
  display: block;
  right: .75em;
  top: 1.05em; /* IE6 only */
  width: 10px;
  height: 10px;
  text-indent: -999em;
  overflow: hidden;
  background: url('../images/arrows-ffffff.png') no-repeat -10px -100px;
}
a > .sf-sub-indicator {  /* give all except IE6 the correct values */
  top: .8em;
  background-position: 0 -100px; /* use translucent arrow for modern browsers*/
}
/* apply hovers to modern browsers */
a:focus > .sf-sub-indicator,
a:hover > .sf-sub-indicator,
a:active > .sf-sub-indicator,
li:hover > a > .sf-sub-indicator,
li.sfHover > a > .sf-sub-indicator {
  background-position: -10px -100px; /* arrow hovers for modern browsers*/
}

/* point right for anchors in subs */
.sf-menu ul .sf-sub-indicator {
  background-position: -10px 0;
}
.sf-menu ul a > .sf-sub-indicator {
  background-position: 0 0;
}
/* apply hovers to modern browsers */
.sf-menu ul a:focus > .sf-sub-indicator,
.sf-menu ul a:hover > .sf-sub-indicator,
.sf-menu ul a:active > .sf-sub-indicator,
.sf-menu ul li:hover > a > .sf-sub-indicator,
.sf-menu ul li.sfHover > a > .sf-sub-indicator {
  background-position: -10px 0; /* arrow hovers for modern browsers*/
}

/*** shadows for all but IE6 ***/
.sf-shadow ul {
  background: url('../images/shadow.png') no-repeat bottom right;
  padding: 0 8px 9px 0;
  -moz-border-radius-bottomleft: 17px;
  -moz-border-radius-topright: 17px;
  -webkit-border-top-right-radius: 17px;
  -webkit-border-bottom-left-radius: 17px;
}
.sf-shadow ul.sf-shadow-off {
  background: transparent;
}
