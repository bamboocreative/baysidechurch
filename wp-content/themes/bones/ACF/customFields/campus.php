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
		'id' => 'acf_campus-homepage-fields',
		'title' => 'Campus Homepage Fields',
		'fields' => array (
			array (
				'key' => 'field_5266b0ca76e9d',
				'label' => 'Campus Name',
				'name' => 'campus_name',
				'type' => 'text',
				'instructions' => 'If left blank, page will pull the "Site Name".',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_5266b14676e9e',
				'label' => 'Campus Photo',
				'name' => 'campus_photo',
				'type' => 'image',
				'instructions' => 'Acts as a background for the Campus Logo',
				'save_format' => 'url',
				'preview_size' => 'thumbnail',
				'library' => 'all',
			),
			array (
				'key' => 'field_5266b1a076e9f',
				'label' => 'Campus Logo',
				'name' => 'campus_logo',
				'type' => 'image',
				'instructions' => 'If left blank, the Campus Location text will be displayed.',
				'save_format' => 'url',
				'preview_size' => 'thumbnail',
				'library' => 'all',
			),
			array (
				'key' => 'field_5266b44dcbc6f',
				'label' => 'Service Times',
				'name' => 'service_times',
				'type' => 'repeater',
				'sub_fields' => array (
					array (
						'key' => 'field_5266b5e3cbc72',
						'label' => 'Service Day',
						'name' => 'service_day',
						'type' => 'text',
						'column_width' => '',
						'default_value' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'formatting' => 'html',
						'maxlength' => '',
					),
					array (
						'key' => 'field_5266b61bcbc73',
						'label' => 'Services',
						'name' => 'services',
						'type' => 'repeater',
						'column_width' => 70,
						'sub_fields' => array (
							array (
								'key' => 'field_5266b638cbc74',
								'label' => 'Service Time',
								'name' => 'service_time',
								'type' => 'date_time_picker',
								'column_width' => '',
								'show_date' => 'false',
								'date_format' => 'm/d/y',
								'time_format' => 'h:mm tt',
								'show_week_number' => 'false',
								'picker' => 'slider',
								'save_as_timestamp' => 'true',
								'get_as_timestamp' => 'false',
							),
							array (
								'key' => 'field_5266b661cbc75',
								'label' => 'Service Features',
								'name' => 'service_features',
								'type' => 'text',
								'column_width' => '',
								'default_value' => '',
								'placeholder' => 'kids, special needs',
								'prepend' => '',
								'append' => '',
								'formatting' => 'html',
								'maxlength' => '',
							),
						),
						'row_min' => 0,
						'row_limit' => '',
						'layout' => 'table',
						'button_label' => 'Add Service Time',
					),
				),
				'row_min' => 0,
				'row_limit' => '',
				'layout' => 'table',
				'button_label' => 'Add Day',
			),
			array (
				'key' => 'field_5266b6f022a6b',
				'label' => 'About Campus',
				'name' => 'about_campus',
				'type' => 'wysiwyg',
				'default_value' => '',
				'toolbar' => 'full',
				'media_upload' => 'yes',
			),
			array (
				'key' => 'field_5266ae1a76e9c',
				'label' => 'Campus Location',
				'name' => 'campus_location',
				'type' => 'location-field',
				'val' => 'address',
				'mapheight' => 200,
				'center' => '48.856614,2.3522219000000177',
				'zoom' => 10,
				'scrollwheel' => 1,
				'mapTypeControl' => 1,
				'streetViewControl' => 1,
				'PointOfInterest' => 1,
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'page_template',
					'operator' => '==',
					'value' => 'page-campus.php',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'no_box',
			'hide_on_screen' => array (
				0 => 'the_content',
			),
		),
		'menu_order' => 0,
	));
}

?>