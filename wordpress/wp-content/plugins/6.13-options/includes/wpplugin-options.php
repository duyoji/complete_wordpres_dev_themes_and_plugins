<?php


class Animal {
  function __construct(string $name) {
    $this->name = $name;
  }

  function getName() {
    return $this->name;
  }
}

// Function for learning how to add options
// SQL Query: SELECT * FROM wp_options WHERE option_name = "wpplugin_option";
function wpplugin_options() {
  $option_key = 'wpplugin_option';

  // add_option( 'wpplugin_option', 'My NEW Plugin Options' );
  // update_option( 'wpplugin_option', 'My Updated Plugin Options' );
  // delete_option( 'wpplugin_option' );

  $options = get_option( $option_key );
  if ( empty($options) )  {
    $options = [
      'value1' => 'a',
      'value2' => 'b',
      'value3' => 'c',
    ];
    add_option( $option_key, $options );
  } else {
    $animal = new Animal('a' . count($options));

    $options['a' . count($options) ] = $animal->getName();
    update_option( $option_key, $options );
  }

  // delete_option( 'wpplugin_option' );
}
add_action( 'admin_init', 'wpplugin_options' );
