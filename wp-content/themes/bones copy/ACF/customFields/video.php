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
		'id' => 'acf_video',
		'title' => 'Video',
		'fields' => array (
			array (
				'key' => 'field_5261b58677565',
				'label' => 'Video ID',
				'name' => 'video_id',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => 'aMfSGt6rHos',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_5261b5a077566',
				'label' => 'Video Vendor',
				'name' => 'video_vendor',
				'type' => 'select',
				'choices' => array (
					'YouTube' => 'YouTube',
					'Vimeo' => 'Vimeo',
				),
				'default_value' => '',
				'allow_null' => 0,
				'multiple' => 0,
			),
			array (
				'key' => 'field_5261b5fe77567',
				'label' => 'Service Date',
				'name' => 'service_date',
				'type' => 'date_picker',
				'instructions' => '(Sunday)',
				'date_format' => '@',
				'display_format' => 'mm/dd/yy',
				'first_day' => 0,
			),
			array (
				'key' => 'field_5261b8b42e2b3',
				'label' => 'Speaker',
				'name' => 'speaker',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => 'Ray Johnston',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_5261c0eb3cab8',
				'label' => 'Message notes',
				'name' => 'message_notes',
				'type' => 'file',
				'save_format' => 'url',
				'library' => 'all',
			),
			array (
				'key' => 'field_5261c468a24b9',
				'label' => 'Custom Downloads',
				'name' => 'custom_downloads',
				'type' => 'repeater',
				'sub_fields' => array (
					array (
						'key' => 'field_5261c4aba24ba',
						'label' => 'Download Name',
						'name' => 'download_name',
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
						'key' => 'field_5261c4c6a24bb',
						'label' => 'Download Type',
						'name' => 'download_type',
						'type' => 'select',
						'column_width' => '',
						'choices' => array (
							'Other' => 'Other',
							'Audio' => 'Audio',
							'Video' => 'Video',
							'File' => 'File',
						),
						'default_value' => '',
						'allow_null' => 0,
						'multiple' => 0,
					),
					array (
						'key' => 'field_5261c5b6a24bd',
						'label' => 'Download',
						'name' => 'download_link',
						'type' => 'file',
						'column_width' => '',
						'save_format' => 'object',
						'library' => 'all',
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
					'value' => 'video',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
}

?>