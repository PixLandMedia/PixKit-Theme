<?php
/**
 * PixKit theme options
 *
 * @package PixKit
 * @since PixKit 0.1.0
 */




/**
 * Define our settings sections
 *
 * @since PixKit 0.1.0
 *
 * array key=$id, array value=$title in: add_settings_section( $id, $title, $callback, $page );
 * @return array
 */
function pixkit_options_page_sections() {
	
	$sections = array();
	// $sections[$id] 				= __($title, 'pixkit_textdomain');
	$sections['txt_section'] 		= __('Text Form Fields', 'pixkit_textdomain');
	$sections['txtarea_section'] 	= __('Textarea Form Fields', 'pixkit_textdomain');
	$sections['select_section'] 	= __('Select Form Fields', 'pixkit_textdomain');
	$sections['checkbox_section'] 	= __('Checkbox Form Fields', 'pixkit_textdomain');
	
	return $sections;	
}

/**
 * Define our form fields (settings) 
 *
 * @since PixKit 0.1.0
 *
 * @return array
 */
function pixkit_options_page_fields() {
	// Text Form Fields section
	$options[] = array(
		"section" => "txt_section",
		"id"      => pixkit_SHORTNAME . "_txt_input",
		"title"   => __( 'Text Input - Some HTML OK!', 'pixkit_textdomain' ),
		"desc"    => __( 'A regular text input field. Some inline HTML (&lt;a&gt;, &lt;b&gt;, &lt;em&gt;, &lt;i&gt;, &lt;strong&gt;) is allowed.', 'pixkit_textdomain' ),
		"type"    => "text",
		"std"     => __('Some default value','pixkit_textdomain')
	);
	
	$options[] = array(
		"section" => "txt_section",
		"id"      => pixkit_SHORTNAME . "_nohtml_txt_input",
		"title"   => __( 'No HTML!', 'pixkit_textdomain' ),
		"desc"    => __( 'A text input field where no html input is allowed.', 'pixkit_textdomain' ),
		"type"    => "text",
		"std"     => __('Some default value','pixkit_textdomain'),
		"class"   => "nohtml"
	);
	
	$options[] = array(
		"section" => "txt_section",
		"id"      => pixkit_SHORTNAME . "_numeric_txt_input",
		"title"   => __( 'Numeric Input', 'pixkit_textdomain' ),
		"desc"    => __( 'A text input field where only numeric input is allowed.', 'pixkit_textdomain' ),
		"type"    => "text",
		"std"     => "123",
		"class"   => "numeric"
	);
	
	$options[] = array(
		"section" => "txt_section",
		"id"      => pixkit_SHORTNAME . "_multinumeric_txt_input",
		"title"   => __( 'Multinumeric Input', 'pixkit_textdomain' ),
		"desc"    => __( 'A text input field where only multible numeric input (i.e. comma separated numeric values) is allowed.', 'pixkit_textdomain' ),
		"type"    => "text",
		"std"     => "123,234,345",
		"class"   => "multinumeric"
	);
	
	$options[] = array(
		"section" => "txt_section",
		"id"      => pixkit_SHORTNAME . "_url_txt_input",
		"title"   => __( 'URL Input', 'pixkit_textdomain' ),
		"desc"    => __( 'A text input field which can be used for urls.', 'pixkit_textdomain' ),
		"type"    => "text",
		"std"     => "http://wp.tutsplus.com",
		"class"   => "url"
	);
	
	$options[] = array(
		"section" => "txt_section",
		"id"      => pixkit_SHORTNAME . "_email_txt_input",
		"title"   => __( 'Email Input', 'pixkit_textdomain' ),
		"desc"    => __( 'A text input field which can be used for email input.', 'pixkit_textdomain' ),
		"type"    => "text",
		"std"     => "email@email.com",
		"class"   => "email"
	);
	
	$options[] = array(
		"section" => "txt_section",
		"id"      => pixkit_SHORTNAME . "_multi_txt_input",
		"title"   => __( 'Multi-Text Inputs', 'pixkit_textdomain' ),
		"desc"    => __( 'A group of text input fields', 'pixkit_textdomain' ),
		"type"    => "multi-text",
		"choices" => array( __('Text input 1','pixkit_textdomain') . "|txt_input1", __('Text input 2','pixkit_textdomain') . "|txt_input2", __('Text input 3','pixkit_textdomain') . "|txt_input3", __('Text input 4','pixkit_textdomain') . "|txt_input4"),
		"std"     => ""
	);
	
	// Textarea Form Fields section
	$options[] = array(
		"section" => "txtarea_section",
		"id"      => pixkit_SHORTNAME . "_txtarea_input",
		"title"   => __( 'Textarea - HTML OK!', 'pixkit_textdomain' ),
		"desc"    => __( 'A textarea for a block of text. HTML tags allowed!', 'pixkit_textdomain' ),
		"type"    => "textarea",
		"std"     => __('Some default value','pixkit_textdomain')
	);

	$options[] = array(
		"section" => "txtarea_section",
		"id"      => pixkit_SHORTNAME . "_nohtml_txtarea_input",
		"title"   => __( 'No HTML!', 'pixkit_textdomain' ),
		"desc"    => __( 'A textarea for a block of text. No HTML!', 'pixkit_textdomain' ),
		"type"    => "textarea",
		"std"     => __('Some default value','pixkit_textdomain'),
		"class"   => "nohtml"
	);
	
	$options[] = array(
		"section" => "txtarea_section",
		"id"      => pixkit_SHORTNAME . "_allowlinebreaks_txtarea_input",
		"title"   => __( 'No HTML! Line breaks OK!', 'pixkit_textdomain' ),
		"desc"    => __( 'No HTML! Line breaks allowed!', 'pixkit_textdomain' ),
		"type"    => "textarea",
		"std"     => __('Some default value','pixkit_textdomain'),
		"class"   => "allowlinebreaks"
	);

	$options[] = array(
		"section" => "txtarea_section",
		"id"      => pixkit_SHORTNAME . "_inlinehtml_txtarea_input",
		"title"   => __( 'Some Inline HTML ONLY!', 'pixkit_textdomain' ),
		"desc"    => __( 'A textarea for a block of text. Only some inline HTML (&lt;a&gt;, &lt;b&gt;, &lt;em&gt;, &lt;strong&gt;, &lt;abbr&gt;, &lt;acronym&gt;, &lt;blockquote&gt;, &lt;cite&gt;, &lt;code&gt;, &lt;del&gt;, &lt;q&gt;, &lt;strike&gt;) is allowed!', 'pixkit_textdomain' ),
		"type"    => "textarea",
		"std"     => __('Some default value','pixkit_textdomain'),
		"class"   => "inlinehtml"
	);	
	
	// Select Form Fields section
	$options[] = array(
		"section" => "select_section",
		"id"      => pixkit_SHORTNAME . "_select_input",
		"title"   => __( 'Select (type one)', 'pixkit_textdomain' ),
		"desc"    => __( 'A regular select form field', 'pixkit_textdomain' ),
		"type"    => "select",
		"std"    => "3",
		"choices" => array( "1", "2", "3")
	);
	
	$options[] = array(
		"section" => "select_section",
		"id"      => pixkit_SHORTNAME . "_select2_input",
		"title"   => __( 'Select (type two)', 'pixkit_textdomain' ),
		"desc"    => __( 'A select field with a label for the option and a corresponding value.', 'pixkit_textdomain' ),
		"type"    => "select2",
		"std"    => "",
		"choices" => array( __('Option 1','pixkit_textdomain') . "|opt1", __('Option 2','pixkit_textdomain') . "|opt2", __('Option 3','pixkit_textdomain') . "|opt3", __('Option 4','pixkit_textdomain') . "|opt4")
	);
	
	// Checkbox Form Fields section
	$options[] = array(
		"section" => "checkbox_section",
		"id"      => pixkit_SHORTNAME . "_checkbox_input",
		"title"   => __( 'Checkbox', 'pixkit_textdomain' ),
		"desc"    => __( 'Some Description', 'pixkit_textdomain' ),
		"type"    => "checkbox",
		"std"     => 1 // 0 for off
	);
	
	$options[] = array(
		"section" => "checkbox_section",
		"id"      => pixkit_SHORTNAME . "_multicheckbox_inputs",
		"title"   => __( 'Multi-Checkbox', 'pixkit_textdomain' ),
		"desc"    => __( 'Some Description', 'pixkit_textdomain' ),
		"type"    => "multi-checkbox",
		"std"     => '',
		"choices" => array( __('Checkbox 1','pixkit_textdomain') . "|chckbx1", __('Checkbox 2','pixkit_textdomain') . "|chckbx2", __('Checkbox 3','pixkit_textdomain') . "|chckbx3", __('Checkbox 4','pixkit_textdomain') . "|chckbx4")	
	);
	
	return $options;	
}

/**
 * Contextual Help
 *
 * @since PixKit 0.1.0
 *
 * @return string
 */
function pixkit_options_page_contextual_help() {
	
	$text 	= "<h3>" . __('PixKit Settings - Contextual Help','pixkit_textdomain') . "</h3>";
	$text 	.= "<p>" . __('Contextual help goes here. You may want to use different html elements to format your text as you want.','pixkit_textdomain') . "</p>";
	
	// must return text! NOT echo
	return $text;
} 

?>