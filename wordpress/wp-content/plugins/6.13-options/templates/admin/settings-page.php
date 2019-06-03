<div class="wrap">
  <h1><?php esc_html_e( get_admin_page_title() ); ?></h1>
  <p><?php esc_html_e( 'Option:', 'wpplugin' ); ?></p>
  <p><?php esc_html_e( 'a' ); ?></p>
  <pre>
  <?php
    $options = get_option( 'wpplugin_option' );
    if ( isset($options) && count($options) > 3 ) {
      $animal = $options['a3'];
      var_dump($animal->getName());
    }
  ?>
  </pre>
</div>
