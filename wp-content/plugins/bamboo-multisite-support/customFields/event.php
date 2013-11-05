<?php 
/**
 *  Install Add-ons
 *  
 *  The following code will include all 4 premium Add-Ons in your theme.
 *  Please do not attempt to include a file which does not exist. This will produce an error.
 *  
 *  The following code assumes you have a folder 'add-ons' inside your theme.
 *
 *  IMPORTANT
 *  Add-ons may be included in a premium theme/plugin as outlined in the terms and conditions.
 *  For more information, please read:
 *  - http://www.advancedcustomfields.com/terms-conditions/
 *  - http://www.advancedcustomfields.com/resources/getting-started/including-lite-mode-in-a-plugin-theme/
 */ 

// Add-ons 
// include_once('add-ons/acf-repeater/acf-repeater.php');
// include_once('add-ons/acf-gallery/acf-gallery.php');
// include_once('add-ons/acf-flexible-content/acf-flexible-content.php');
// include_once( 'add-ons/acf-options-page/acf-options-page.php' );


/**
 *  Register Field Groups
 *
 *  The register_field_group function accepts 1 array which holds the relevant data to register a field group
 *  You may edit the array as you see fit. However, this may result in errors if the array is not compatible with ACF
 */

if(function_exists("register_field_group"))
{
	register_field_group(array (
		'id' => 'acf_events-custom-fields',
		'title' => 'Events Custom Fields',
		'fields' => array (
			array (
				'key' => 'field_52606bea2acc9',
				'label' => 'Date',
				'instructions' => 'If the Time is set to 12:00am, the event will be treated as an "All Day" event',
				'name' => 'date',
				'type' => 'date_time_picker',
				'show_date' => 'true',
				'date_format' => 'mm/dd/yy',
				'time_format' => 'hh:mmtt',
				'show_week_number' => 'false',
				'picker' => 'slider',
				'save_as_timestamp' => 'true',
				'get_as_timestamp' => 'true',
			),
			array (
				'key' => 'field_52606bea2acc8',
				'label' => 'End Date',
				'instructions' => 'If the Time is set to 12:00am, the event will be treated as an "All Day" event',
				'name' => 'end_date',
				'type' => 'date_time_picker',
				'show_date' => 'true',
				'date_format' => 'mm/dd/yy',
				'time_format' => 'hh:mmtt',
				'show_week_number' => 'false',
				'picker' => 'slider',
				'save_as_timestamp' => 'true',
				'get_as_timestamp' => 'true',
			),
			
			array (
				'key' => 'field_527036e1bed15',
				'label' => 'Badge Activation',
				'instructions' => 'To display the badge, this must be set to "Yes"',
				'name' => 'badge_custom_activation',
				'type' => 'radio',
				'choices' => array (
					'no' => 'No',
					'yes' => 'Yes',
				),
				'other_choice' => 0,
				'save_other_choice' => 0,
				'default_value' => '',
				'layout' => 'horizontal',
			),
			array (
				'key' => 'field_526ed25585732',
				'label' => 'Event Badge',
				'name' => 'event_badge',
				'type' => 'image',
				'save_format' => 'url',
				'preview_size' => 'thumbnail',
				'library' => 'all',
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_527036e1bed15',
							'operator' => '==',
							'value' => 'yes',
						),
					),
					'allorany' => 'all',
				),
			),
			array (
				'key' => 'field_5270374fbed16',
				'label' => 'Badge Activation Date',
				'name' => 'badge_activation_date',
				'type' => 'date_time_picker',
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_527036e1bed15',
							'operator' => '==',
							'value' => 'yes',
						),
					),
					'allorany' => 'all',
				),
				'show_date' => 'true',
				'date_format' => 'mm/dd/yy',
				'time_format' => 'hh:mmtt',
				'show_week_number' => 'false',
				'picker' => 'slider',
				'save_as_timestamp' => 'true',
				'get_as_timestamp' => 'true',
			),
			array (
				'key' => 'field_527035cc7aa23',
				'label' => 'Badge Deactive Date',
				'name' => 'badge_deactive_date',
				'type' => 'date_time_picker',
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_527036e1bed15',
							'operator' => '==',
							'value' => 'yes',
						),
					),
					'allorany' => 'all',
				),
				'show_date' => 'true',
				'date_format' => 'mm/dd/yy',
				'time_format' => 'hh:mmtt',
				'show_week_number' => 'false',
				'picker' => 'slider',
				'save_as_timestamp' => 'true',
				'get_as_timestamp' => 'true',
			),
			array (
				'key' => 'field_527829dc23b7f',
				'label' => 'Custom Location Name',
				'name' => 'custom_location_name',
				'type' => 'text',
				'instructions' => 'This location will display in the event listing.',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_525db080657c7',
				'label' => 'Location',
				'name' => 'location',
				'type' => 'location-field',
				'val' => 'address',
				'mapheight' => 200,
				'center' => '38.74957,-121.22526',
				'zoom' => 13,
				'scrollwheel' => 1,
				'mapTypeControl' => 0,
				'streetViewControl' => 0,
				'PointOfInterest' => 0,
			),
			array (
				'key' => 'field_52606b5b092fc',
				'label' => 'Is there a contact for this event?',
				'name' => 'contact?_',
				'type' => 'select',
				'choices' => array (
					'No' => 'No',
					'Yes' => 'Yes',
				),
				'default_value' => '',
				'allow_null' => 0,
				'multiple' => 0,
			),
			array (
				'key' => 'field_526068ee86eef',
				'label' => 'Contact Name',
				'name' => 'contact',
				'type' => 'text',
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_52606b5b092fc',
							'operator' => '==',
							'value' => 'Yes',
						),
					),
					'allorany' => 'all',
				),
				'default_value' => '',
				'placeholder' => 'John Doe',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_5260691386ef0',
				'label' => 'Contact Email Address',
				'name' => 'contact_email_address',
				'type' => 'text',
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_52606b5b092fc',
							'operator' => '==',
							'value' => 'Yes',
						),
					),
					'allorany' => 'all',
				),
				'default_value' => '',
				'placeholder' => 'email@address.com',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_52782bda829dd',
				'label' => 'Cost',
				'name' => 'cost',
				'type' => 'number',
				'instructions' => 'If left blank, Cost will be handled as Free.',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'min' => '',
				'max' => '',
				'step' => '',
			),
			array (
				'key' => 'field_526070d4c3094',
				'label' => 'Registration',
				'name' => 'registration',
				'type' => 'select',
				'choices' => array (
					'None' => 'None',
					'Custom URL' => 'Custom URL',
					'Form' => 'Form',
				),
				'default_value' => '',
				'allow_null' => 0,
				'multiple' => 0,
			),
			array (
				'key' => 'field_526070fdc3095',
				'label' => 'Registration Link',
				'name' => 'registration_link',
				'type' => 'text',
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_526070d4c3094',
							'operator' => '==',
							'value' => 'Custom URL',
						),
					),
					'allorany' => 'all',
				),
				'default_value' => '',
				'placeholder' => 'http://www.eventbrite.com/event/12345678',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_526071913eeeb',
				'label' => 'Registration Form',
				'name' => 'registration_form',
				'type' => 'gravity_forms_field',
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_526070d4c3094',
							'operator' => '==',
							'value' => 'Form',
						),
					),
					'allorany' => 'all',
				),
				'allow_null' => 0,
				'multiple' => 0,
			),
			array (
				'key' => 'field_525dbc9ebe7b2',
				'label' => 'Custom Details',
				'name' => 'custom_details',
				'type' => 'repeater',
				'sub_fields' => array (
					array (
						'key' => 'field_52606855b9f0e',
						'label' => 'Detail Name',
						'name' => 'detail_name',
						'type' => 'text',
						'column_width' => 30,
						'default_value' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'formatting' => 'html',
						'maxlength' => '',
					),
					array (
						'key' => 'field_52606862b9f0f',
						'label' => 'Detail',
						'name' => 'detail',
						'type' => 'text',
						'column_width' => 70,
						'default_value' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'formatting' => 'html',
						'maxlength' => '',
					),
				),
				'row_min' => 0,
				'row_limit' => '',
				'layout' => 'table',
				'button_label' => 'Add Row',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'event',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'acf_after_title',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
}

?>