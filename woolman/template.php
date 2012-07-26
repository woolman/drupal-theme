<?php
// $Id: template.php,v 1.17.2.1 2009/02/13 06:47:44 johnalbin Exp $

/**
 * @file
 * Contains theme override functions and preprocess functions for the theme.
 *
 * ABOUT THE TEMPLATE.PHP FILE
 *
 *   The template.php file is one of the most useful files when creating or
 *   modifying Drupal themes. You can add new regions for block content, modify
 *   or override Drupal's theme functions, intercept or make additional
 *   variables available to your theme, and create custom PHP logic. For more
 *   information, please visit the Theme Developer's Guide on Drupal.org:
 *   http://drupal.org/theme-guide
 *
 * OVERRIDING THEME FUNCTIONS
 *
 *   The Drupal theme system uses special theme functions to generate HTML
 *   output automatically. Often we wish to customize this HTML output. To do
 *   this, we have to override the theme function. You have to first find the
 *   theme function that generates the output, and then "catch" it and modify it
 *   here. The easiest way to do it is to copy the original function in its
 *   entirety and paste it here, changing the prefix from theme_ to woolman_.
 *   For example:
 *
 *     original: theme_breadcrumb()
 *     theme override: woolman_breadcrumb()
 *
 *   where woolman is the name of your sub-theme. For example, the
 *   zen_classic theme would define a zen_classic_breadcrumb() function.
 *
 *   If you would like to override any of the theme functions used in Zen core,
 *   you should first look at how Zen core implements those functions:
 *     theme_breadcrumbs()      in zen/template.php
 *     theme_menu_item_link()   in zen/template.php
 *     theme_menu_local_tasks() in zen/template.php
 *
 *   For more information, please visit the Theme Developer's Guide on
 *   Drupal.org: http://drupal.org/node/173880
 *
 * CREATE OR MODIFY VARIABLES FOR YOUR THEME
 *
 *   Each tpl.php template file has several variables which hold various pieces
 *   of content. You can modify those variables (or add new ones) before they
 *   are used in the template files by using preprocess functions.
 *
 *   This makes THEME_preprocess_HOOK() functions the most powerful functions
 *   available to themers.
 *
 *   It works by having one preprocess function for each template file or its
 *   derivatives (called template suggestions). For example:
 *     THEME_preprocess_page    alters the variables for page.tpl.php
 *     THEME_preprocess_node    alters the variables for node.tpl.php or
 *                              for node-forum.tpl.php
 *     THEME_preprocess_comment alters the variables for comment.tpl.php
 *     THEME_preprocess_block   alters the variables for block.tpl.php
 *
 *   For more information on preprocess functions and template suggestions,
 *   please visit the Theme Developer's Guide on Drupal.org:
 *   http://drupal.org/node/223440
 *   and http://drupal.org/node/190815#template-suggestions
 */


/**
 * Add any conditional stylesheets you will need for this sub-theme.
 *
 * To add stylesheets that ALWAYS need to be included, you should add them to
 * your .info file instead. Only use this section if you are including
 * stylesheets based on certain conditions.
 */
/* -- Delete this line if you want to use and modify this code
// Example: optionally add a fixed width CSS file.
if (theme_get_setting('woolman_fixed')) {
  drupal_add_css(path_to_theme() . '/layout-fixed.css', 'theme', 'all');
}
// */


if (arg(0)=='node' && arg(1)==5 && !arg(2)) {
  drupal_add_js('sites/all/themes/woolman/js/camp_slideshow.js');
}
/**
 * Override or insert variables into the page templates.
 *
 * Set DCSS variables based on path alias
 *
 * @param $vars
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("page" in this case.)
 */
function woolman_preprocess_page(&$vars, $arg) {

  global $user;
  if (arg(0) == 'node' && arg(1)) {
    $alias = drupal_get_path_alias(arg(0).'/'.arg(1));
  }
  else {
    $alias = drupal_get_path_alias(empty($_GET['q']) ? '' : $_GET['q']);
  }
  $aliasarray = explode('/', $alias);

  // add domain to body classes, and also add first arg of drupal path
  if ($aliasarray[0][0] == '~') {
    $domain = substr($aliasarray[0], 1);
    $vars['body_classes_array'][] = 'section-'.$aliasarray[1];
  }
  else {
    $domain = 'home';
    $vars['body_classes_array'][] = 'section-'.$aliasarray[0];
  }

  $vars['body_classes_array'][] = arg(0);
  $vars['body_classes_array'][] = 'site-'.$domain;
  $vars['body_classes'] = implode (' ', $vars['body_classes_array']);

  //store value for use by page template and dcss
  $vars['current_domain'] = $domain;
  dcss_set('domain', $domain);

  // is this a live server or test server?
  global $base_url;
  $suffix = substr($base_url, -3);
  $testserver = ($suffix == 'dev' || $suffix == 'new' || $suffix == 'ost' || $suffix == 'box');

  // Subdomain-specific settings
  list($page_title, $site_title) = explode(' | ',$vars['head_title']);
  switch($domain) {

    case 'semester':
      $site_title = 'Semester School &amp; Gap Year Program for Peace, Justice &amp; Sustainability';
      dcss_set('base-color', '#B99636');
      dcss_set('analogA', '#B9AB36');
      dcss_set('analogB', '#B97E36');
      dcss_set('compliment', '#323880');
      $piwik_id = 2;
      break;

    case 'camp':
      $site_title = 'Friends Overnight Summer Camp in Northern California';
      dcss_set('base-color', '#44B161');
      dcss_set('analogA', '#3B8293');
      dcss_set('analogB', '#A5DA54');
      dcss_set('compliment', '#ED6C5B');
      $piwik_id = 3;
      break;

    case 'blog':
      $site_title = 'Woolman Blog: Peace, Justice &amp; Sustainability Education';
      dcss_set('base-color', '#A37E6E');
      dcss_set('analogA', '#A38D6E');
      dcss_set('analogB', '#936371');
      dcss_set('compliment', '#4B6F60');
      $piwik_id = 4;
      break;

    case 'alumni':
      $site_title = 'Woolman Alumni';
      dcss_set('base-color', '#78AA54');
      break;

    case 'store':
      $site_title = 'The Woolman Store';
      dcss_set('base-color', '#78AA54');
      break;

    default: //main domain
      $site_title = 'Educational Community for Peace, Justice &amp; Sustainability';
      dcss_set('base-color', '#8EC065');
      dcss_set('analogA', '#4E9476');
      dcss_set('analogB', '#BFD06E');
      dcss_set('compliment', '#C16581');
      $piwik_id = 1;
      break;

  } // end switch

  //set title for user pages
  if (arg(0) == 'user' && is_numeric(arg(1))) {
    $page_title = $vars['title'] = woolman_name('full', arg(1), 'user');
  }

  $vars['head_title'] = $page_title.' | '.$site_title;

  // Camp landing page no get title
  if (arg(0)=='node' && arg(1)==5 && arg(2)) {
    $vars['title'] = NULL;
  }

  $redirect = array('query' => drupal_get_destination(), 'alias' => TRUE);

  $vars['user_links'] = 'Welcome, ' . woolman_name('nick') . ' | ';

  if (!empty($vars['user']->uid)) {
    $vars['user_links'] .= l('My Profile', 'user/'.$vars['user']->uid, array('alias' => TRUE)).' | '.l('Logout', 'logout', $redirect);
  }
  else {
    $vars['user_links'] .= l('Register', 'user/register', $redirect).' | '.l('Log In', 'user', $redirect);
  }

  // embed piwik code
  if (!$testserver && !in_array('staff', $user->roles) && !in_array('administrator', $user->roles) && !in_array('contributor', $user->roles)) {
    $vars['piwik'] = '<!-- Piwik -->
<script type="text/javascript">
var pkBaseURL = (("https:" == document.location.protocol) ? "https://stats.woolman.org/" : "http://stats.woolman.org/");
document.write(unescape("%3Cscript src=\'" + pkBaseURL + "piwik.js\' type=\'text/javascript\'%3E%3C/script%3E"));
</script><script type="text/javascript">
try {
var piwikTracker = Piwik.getTracker(pkBaseURL + "piwik.php", '.$piwik_id.');
piwikTracker.trackPageView();
piwikTracker.enableLinkTracking();
} catch(err) {}
</script><noscript><p><img src="http://woolman.org/piwik/piwik.php?idsite='.$piwik_id.'" style="border:0" alt="" /></p></noscript>
<!-- End Piwik Tag -->';
  }

  // special tabs for gallery views
  if ((arg(0) == '~semester' || arg(0) == '~camp') && arg(1) == 'gallery' && user_access('create node_gallery_image content')) {
    $vars['tabs'] = '<ul class="tabs primary clear-block">
        <li class="active">' . l('<span class="tab">View All</span>', arg(0).'/gallery', array('html' => TRUE)) . '</li>
        <li>' . l('<span class="tab">New Album</span>', 'node/add/'.substr(arg(0), 1).'-node-gallery', array('html' => TRUE)) . '</li></ul>';
  }
  if (arg(0) == 'gallery' && user_access('create node_gallery_image content')) {
    $vars['tabs'] = '<ul class="tabs primary clear-block">
        <li class="active">' . l('<span class="tab">View All</span>', 'gallery', array('html' => TRUE)) . '</li>
        <li>' . l('<span class="tab">New Album</span>', 'node/add/woolman-node-gallery', array('html' => TRUE)) . '</li></ul>';
  }

  $vars['test_server'] = $testserver ? '<div style="position:absolute; top:0.8em; right:0.5em; font-size:3em; color:red; font-weight:bold">Test Server</div>' : '';
}

/**
 * Implementation of HOOK_username().
 */
function woolman_username($object) {

  if (!empty($object->uid)) {

    $name = woolman_name('full', $object->uid, 'user');

    // 20 characters is too short, let's set it to 30.
    if (drupal_strlen($name) > 30)
      $name = drupal_substr($name, 0, 28) .'...';

    if (user_access('access user profiles')) {
      $output = l($name, 'user/' . $object->uid,
        array('attributes' => array('title' => 'View ' . woolman_name('nick', $object->uid, 'user') . '\'s profile.')));
    }
    else {
      $output = $name;
    }
  }
  elseif (!empty($object->name)) {

    if (!empty($object->homepage)) {
      $output = l($object->name, $object->homepage, array('attributes' => array('rel' => 'nofollow')));
    }
    else {
      $output = check_plain($object->name);
    }

  }
  else {
    $output = 'Visitor';
  }

  return $output;
}


/**
 * Override or insert variables into all templates.
 *
 * @param $vars
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered (name of the .tpl.php file.)
 */
/* -- Delete this line if you want to use this function
function woolman_preprocess(&$vars, $hook) {
  $vars['sample_variable'] = t('Lorem ipsum.');
}
// */



/**
 * Override or insert variables into the node templates.
 *
 * @param $vars
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("node" in this case.)
 */

function woolman_preprocess_node(&$vars, $hook) {
  // Embed image view -- now deprecated
  if (($vars['type'] == 'page' || $vars['type'] == 'job-posting') && arg(1)!=5) {
    if ($img = $vars['field_page_image'][0]) {
      $vars['embedded_image'] = '<img class="imagefield-field_page_image" src="/'.$img['filepath'].'" alt="'.$img['data']['alt'].'" />';
    }
    else {
      global $user;
      if (in_array('administrator', $user->roles) && 1==2)
        $vars['embedded_image'] = '<div class="imagefield-field_page_image" style="width:300px; height:200px; border:3px dashed gray; background-color:#E4E4E4; text-align:center; font-size:1.1em; font-weight:bold"><div style="margin-top:4.4em;">No Image<br />Please '.l("Add One", "node/".$vars['nid'].'/edit', array('fragment' => 'edit-title-wrapper')).'</div></div>';
      elseif ($vars['field_embed_image'][0]['value'] && !$vars['field_page_image'][0]['view']) {
        while(list($key, $value) = each($vars['field_embed_image_category'])) {   //go through multi-dimensional taxonomy array
          $taxargs[] = $value['value'];            //store value in single-dimensional array
        }
        $taxarg = implode('+',$taxargs);          //convert to string for views argument
        $vars['embedded_image'] = views_embed_view(embed_image, $vars['field_embed_image'][0]['value'], $taxarg, $vars['field_embed_image_rank'][0]['value']);
      }
    }
  }
}

/**
 * Override breadcrumb trail.
 *
 * @param $breadcrumb
 *   An array containing the breadcrumb links.
 * @return
 *   A string containing the breadcrumb output.
 */
function woolman_breadcrumb($breadcrumb) {

  if (drupal_is_front_page()) {
    return '';
  }

  // Build breadcrumb trail based on path
  if (arg(0) != 'admin' && arg(0) != 'civicrm') {
    if ((arg(0)=='node' || arg(0)=='user') && is_numeric(arg(1)) && arg(2)) {
      $path = explode('/', drupal_get_path_alias(arg(0).'/'.arg(1)));
      $count = count($path);
    }
    else {
      $path = explode('/', drupal_get_path_alias(empty($_GET['q']) ? '' : $_GET['q']));
      $count = count($path) - 1;
    }
    $i = 0;
    $crumbs = array('titles' => array(), 'paths' => array());
    $breadcrumb = array();

    while ($i < $count) {
      if ($i == 0) {
        $crumbs['paths'][$i] = $path[0];
        $path[0] = str_replace('~', '', $path[0]);
      }
      else {
        $crumbs['paths'][$i] = $crumbs['paths'][$i-1].'/'.$path[$i];
      }
      $crumbs['titles'][$i] = ucwords(str_replace(array('-','_'), ' ', $path[$i]));

      $breadcrumb[] = l($crumbs['titles'][$i], $crumbs['paths'][$i]);
      $i++;
    }
    array_unshift($breadcrumb, l('Woolman', '<front>'));
  }
  else {
    $breadcrumb[0] = l('Woolman', '<front>');
  }

    // Return the breadcrumb with separators.
    if (!empty($breadcrumb)) {
      $breadcrumb_separator = theme_get_setting('zen_breadcrumb_separator');

      return '<div class="breadcrumb">Back to: ' . implode($breadcrumb_separator, $breadcrumb) . '</div>';
    }
  return '';
}


/**
 * Override messages output
 */
function woolman_status_messages($display = NULL) {
  $output = '';
  foreach (drupal_get_messages($display) as $type => $messages) {
    $output .= "<div class=\"messages $type\"><div class=\"message-dismiss\">x</div>\n";
    if (count($messages) > 1) {
      $output .= " <ul>\n";
      foreach ($messages as $message) {
        $output .= '  <li>' . $message . "</li>\n";
      }
      $output .= " </ul>\n";
    }
    else {
      $output .= $messages[0];
    }
    $output .= "</div>\n";
  }
  return $output;
}


/**
 * Override form element template
 * 
 * CUSTOM BEHAVIORS:
 * 
 * * Don't add trailing ":" if title already ends in punctuation
 * 
 * * Add required mark if #req or #mark_req are true (allows form elements to be conditionally required
 *   via custom validation and still get a red * on the form)
 */
function woolman_form_element($element, $value) {
  $output = '<div class="form-item"';
  if (!empty($element['#id'])) {
    $output .= ' id="' . $element['#id'] . '-wrapper"';
  }
  $output .= ">\n";
  $required = !empty($element['#required']) || !empty($element['#req']) || !empty($element['#mark_req']) ? ' <span class="form-required" title="This field is required.">*</span>' : '';

  if (!empty($element['#title'])) {
    $title = $element['#title'];
    if (!in_array(substr($title, -1), array('.', '-', '=', ',', '?', '!', ':'))) {
      $title .= ':';
    }
    if (!empty($element['#id'])) {
      $output .= ' <label for="' . $element['#id'] . '">' . filter_xss_admin($title) . $required . "</label>\n";
    }
    else {
      $output .= ' <label>' . filter_xss_admin($title) . $required . "</label>\n";
    }
  }

  $output .= " $value\n";

  if (!empty($element['#description'])) {
    $output .= ' <div class="description">' . $element['#description'] . "</div>\n";
  }

  $output .= "</div>\n";

  return $output;
}
