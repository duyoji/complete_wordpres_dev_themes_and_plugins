<?php

function wpplugin_settings() {

  // If plugin settings don't exist, then create them
  if( !get_option( 'wpplugin_settings' ) ) {
      add_option( 'wpplugin_settings' );
  }

  // Define (at least) one section for our fields
  add_settings_section(
    // Unique identifier for the section
    'wpplugin_settings_section',
    // Section Title
    __( 'プラグイン Settings Section', 'wpplugin' ),
    // Callback for an optional description
    'wpplugin_settings_section_callback',
    // Admin page to add section to
    'wpplugin'
  );

  add_settings_field(
    // Unique identifier for field
    'wpplugin_settings_custom_text',
    // Field Title
    __( 'カスタムテキスト', 'wpplugin'),
    // Callback for field markup
    'wpplugin_settings_custom_text_callback',
    // Page to go on
    'wpplugin',
    // Section to go in
    'wpplugin_settings_section'
  );

  add_settings_field(
    // Unique identifier for field
    'wpplugin_settings_custom_text2',
    // Field Title
    __( 'カスタムテキスト2', 'wpplugin'),
    // Callback for field markup
    'wpplugin_settings_custom_text_callback2',
    // Page to go on
    'wpplugin',
    // Section to go in
    'wpplugin_settings_section'
  );

  register_setting(
    'wpplugin_settings',
    'wpplugin_settings'
  );

}
add_action( 'admin_init', 'wpplugin_settings' );

function wpplugin_settings_section_callback() {

  esc_html_e( 'Plugin settings section 詳細', 'wpplugin' );

}

function wpplugin_settings_custom_text_callback() {

  $options = get_option( 'wpplugin_settings' );

	$custom_text = '';
	if( isset( $options[ 'custom_text' ] ) ) {
		$custom_text = esc_html( $options['custom_text'] );
	}

  echo '<input type="text" id="wpplugin_customtext" name="wpplugin_settings[custom_text]" value="' . $custom_text . '" />';

}

function wpplugin_settings_custom_text_callback2() {

  $options = get_option( 'wpplugin_settings' );

	$custom_text = '';
	if( isset( $options[ 'custom_text_2' ] ) ) {
		$custom_text = esc_html( $options['custom_text_2'] );
	}

  echo '<input type="text" id="wpplugin_customtext_2" name="wpplugin_settings[custom_text_2]" value="' . $custom_text . '" />';

}
