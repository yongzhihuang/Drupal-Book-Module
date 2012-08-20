<?php
// $Id$
/**
* @file
* Administration page callbacks for the annotate module.
*/
/**
* Form builder. Configure annotations.
*
* @ingroup forms
* @see system_settings_form().
*/

//Drupal forms are represented as nested array structure
//Each form property is denoted by #

function annotate_admin_settings() {


//-------------------------------CheckBoxes----------------//

// Get an array of node types with internal names as keys and
// "friendly names" as values. E.g.,
// array('page' => 'Page', 'story' => 'Story')
$options = node_get_types('names'); //returns key array of node types that are currently available in current drupal installation


$form['annotate_node_types'] = array(
'#type' => 'checkboxes',	//type of element
'#title' => t('Users may annotate these content types'), //short description of what it's about
'#options' => $options,
'#default_value' => variable_get('annotate_node_types', array('page')),  //set default value
'#description' => t('A text field will be available on these content types to
make user-specific notes.'),//pop up tooltip when mouseover
);

//-------------------------------Annotate Delete----------------//
$form['annotate_deletion'] = array(
'#type' => 'radios',
'#title' => t('Annotations will be deleted'),
'#description' => t('Select a method for deleting annotations.'),
'#options' => array(
t('Never'),
t('Randomly'),
t('After 30 days')
),
'#default_value' => variable_get('annotate_deletion', 0) // Default to Never
);

//-------------------------------Annotate Limit----------------//
$form['annotate_limit_per_node'] = array(
'#type' => 'textfield',
'#title' => t('Annotations per node'),
'#description' => t('Enter the maximum number of annotations allowed per
node (0 for no limit).'),

//variable_get($key,$default) , if no value for $key is found use $default
//variable_set($key,$value)
'#default_value' => variable_get('annotate_limit_per_node', 1),
'#size' => 3
);

//-------------------------------Validation Function-------------//
/**
* Validate the annotation configuration form.
*/

//When drupal processes the form, it will call back to this function for validation , we check the annotate_limit_per_node to see if it's a number
function annotate_admin_settings_validate($form, $form_state) {
$limit = $form_state['values']['annotate_limit_per_node'];
if (!is_numeric($limit)) {
form_set_error('annotate_limit_per_node', t('Please enter a number.'));
}
}

//-------------------------------Radio Buttons----------------//
$frequency = array(
	t('Every Hour'),
	t('Every Day'),
	t('Twice a day'),
	);

$form['annotate_frequency_cap'] = array(
'#type' => 'radios',	//type of element
'#title' => t('Set the frequency for the ads to be displayed'), //short description of what it's about
'#options' => $frequency,
'#default_value' => variable_get('annotate_frequency_cap',1), //default value
'#description' => t('Choose how often to show the welcome ad'),
);
return system_settings_form($form);
}