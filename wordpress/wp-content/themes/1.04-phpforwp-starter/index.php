<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>PHP for WordPress</title>
  <link href="https://fonts.googleapis.com/css?family=Open+Sans|Varela+Round" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/style.css">
</head>
<body>

  <header id="masthead">
    <h1><a href="#">PHP for WordPress</a></h1>
  </header>

  <div id="content">


    <?php

      // Create an array of post objects using the create_post function
      $posts = [
        'title1',
        'title2',
        'title3',
      ];


      // Loop through array of posts and display each one on the page
      foreach($posts as $post) {
        // Call the display_post function and pass it the $post
        display_post(__($post . '!!'));
      }




      /**
       * Custom function for displaying the title and content for a post
       *
       * @param string $title The title to be displayed
       */
      function display_post( $title ) {

        // Echo an <h3> tag with the $title inside
        echo "<h3>$title</h3>";

      }

    ?>

  </div>

</body>
</html>