<?php
/**
 * @file
 * Contains the theme's functions to manipulate Drupal's default markup.
 *
 * Complete documentation for this file is available online.
 * @see https://drupal.org/node/1728096
 */


/**
 * Override or insert variables into the maintenance page template.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("maintenance_page" in this case.)
 */
/* -- Delete this line if you want to use this function
function ww1_preprocess_maintenance_page(&$variables, $hook) {
  // When a variable is manipulated or added in preprocess_html or
  // preprocess_page, that same work is probably needed for the maintenance page
  // as well, so we can just re-use those functions to do that work here.
  ww1_preprocess_html($variables, $hook);
  ww1_preprocess_page($variables, $hook);
}
// */

/**
 * Override or insert variables into the html templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("html" in this case.)

switch (current_path()) {
	case 'user/login':
	  $variables['head_title_array']['title'] = t('Login');
	  $head_title = $variables['head_title_array'];
	  $variables['head_title'] = implode(' | ', $head_title);
	  break;
	case 'user/register':
	  $variables['head_title_array']['title'] = t('Register');
	  $head_title = $variables['head_title_array'];
	  $variables['head_title'] = implode(' | ', $head_title);
	  break;
	case 'user/password':
	  $variables['head_title_array']['title'] = t('Reset password');
	  $head_title = $variables['head_title_array'];
	  $variables['head_title'] = implode(' | ', $head_title);
	  break;
	 
	default:
		break;
  } 
 
 
 
 */

function ww1_preprocess_html(&$variables, $hook) {
  
  
}

/**
 * Override or insert variables into the page templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("page" in this case.)
 */

function ww1_preprocess_page(&$variables, $hook) {
   // add layout ui
   // drupal_add_js(drupal_get_path('theme', 'ww1') . '/js/jquery.layout.js', array('group' => JS_THEME));
   // drupal_add_css(drupal_get_path('theme', 'ww1') . '/js/jquery-layout-default.css', array('group' => JS_THEME));
   drupal_add_library('system', 'ui.autocomplete');
   drupal_add_library('system', 'ui.resizable');
   
	switch (current_path()) {
	case 'user/login':
		$variables['title'] = t('Login');
		unset($variables['tabs']['#primary']);
		break;
	case 'user/register':
		$variables['title'] = t('Register');
		unset($variables['tabs']['#primary']);
		break;
	case 'user/password':
		$variables['title'] = t('Reset password');
		unset($variables['tabs']['#primary']);
		break;
 
	default:
		break;
  }
	
}

/**
 * Override or insert variables into the node templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("node" in this case.)
 */
/* -- Delete this line if you want to use this function --*/
function ww1_preprocess_node(&$variables, $hook) {
  // $variables['sample_variable'] = t('Lorem ipsum.');

  // Optionally, run node-type-specific preprocess functions, like
  // ww1_preprocess_node_page() or ww1_preprocess_node_story().
  // $function = __FUNCTION__ . '_' . $variables['node']->type;
  // if (function_exists($function)) {
  //  $function($variables, $hook);
  // }
  

 // drupal_set_title(htmlspecialchars_decode(drupal_get_title()), PASS_THROUGH);
  
}
// */

/**
 * Override or insert variables into the comment templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("comment" in this case.)
 */
/* -- Delete this line if you want to use this function
function ww1_preprocess_comment(&$variables, $hook) {
  $variables['sample_variable'] = t('Lorem ipsum.');
}
// */

/**
 * Override or insert variables into the region templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("region" in this case.)
 */
/* -- Delete this line if you want to use this function
function ww1_preprocess_region(&$variables, $hook) {
  // Don't use Zen's region--sidebar.tpl.php template for sidebars.
  //if (strpos($variables['region'], 'sidebar_') === 0) {
  //  $variables['theme_hook_suggestions'] = array_diff($variables['theme_hook_suggestions'], array('region__sidebar'));
  //}
}
// */

/**
 * Override or insert variables into the block templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("block" in this case.)
 */
/* -- Delete this line if you want to use this function
function ww1_preprocess_block(&$variables, $hook) {
  // Add a count to all the blocks in the region.
  // $variables['classes_array'][] = 'count-' . $variables['block_id'];

  // By default, Zen will use the block--no-wrapper.tpl.php for the main
  // content. This optional bit of code undoes that:
  //if ($variables['block_html_id'] == 'block-system-main') {
  //  $variables['theme_hook_suggestions'] = array_diff($variables['theme_hook_suggestions'], array('block__no_wrapper'));
  //}
}
// */

/*
 *  Remove labels and add HTML5 placeholder attribute to login form
 */
 
function ww1_form_alter(&$form, &$form_state, $form_id) {
  if ( TRUE === in_array( $form_id, array( 'user_login', 'user_login_block') ) ) {
    $form['name']['#attributes']['placeholder'] = t( 'Username' );
    $form['pass']['#attributes']['placeholder'] = t( 'Password' );
    $form['name']['#title_display'] = "invisible";
    $form['pass']['#title_display'] = "invisible";
  }
}

/*
 *  Remove login form descriptions
 */
function ww1_form_user_login_alter(&$form, &$form_state) {
    $form['name']['#description'] = t('');
    $form['pass']['#description'] = t('');
}

/*
 *  Alter register, login, password templates
 */


function ww1_theme() {
	$items = array();
	$items['user_login'] = array(
		'render element' => 'form',
		'path' => drupal_get_path('theme', 'ww1') . '/templates',
		'template' => 'user-login',
	 );
	 $items['user_register_form'] = array(
		'render element' => 'form',
		'path' => drupal_get_path('theme', 'ww1') . '/templates',
		'template' => 'user-register',
	 );
	 $items['user_pass'] = array(
		'render element' => 'form',
		'path' => drupal_get_path('theme', 'ww1') . '/templates',
		'template' => 'user-pass',
	 );
	  return $items;
	}




