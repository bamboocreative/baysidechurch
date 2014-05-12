<?php 

if(function_exists("register_field_group"))
{
	register_field_group(array (
		'id' => 'acf_ministry-repository',
		'title' => 'Ministry Repository',
		'fields' => array (
			array (
				'key' => 'field_52f0293cc2387',
				'label' => 'Ministry Items',
				'name' => 'ministry_items',
				'type' => 'repeater',
				'instructions' => 'Use these fields to link miscellaneous files you may need. Compatible with JPG, PNG, PDF, MP3, etc.',
				'sub_fields' => array (
					array (
						'key' => 'field_52f0294ac2388',
						'label' => 'Repo Item Name',
						'name' => 'repo_item_name',
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
						'key' => 'field_52f02967c2389',
						'label' => 'Repo File',
						'name' => 'repo_file',
						'type' => 'file',
						'instructions' => 'This file will be linked under the "download" button.',
						'column_width' => '',
						'save_format' => 'url',
						'library' => 'all',
					),
					array (
						'key' => 'field_52f029fcd87f0',
						'label' => 'Item Expiration Date',
						'name' => 'item_expiration_date',
						'type' => 'date_time_picker',
						'instructions' => 'This item will not display if the current date is after the "expiration date". If left blank, this item will appear forever.',
						'column_width' => '',
						'show_date' => 'true',
						'date_format' => 'm/d/y',
						'time_format' => 'h:mm tt',
						'show_week_number' => 'false',
						'picker' => 'slider',
						'save_as_timestamp' => 'true',
						'get_as_timestamp' => 'true',
					),
				),
				'row_min' => '',
				'row_limit' => '',
				'layout' => 'table',
				'button_label' => 'Add Item',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'page_template',
					'operator' => '==',
					'value' => 'default',
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