<?php

  // Main sidebar
  if ( is_active_sidebar( 'sidebar-main' ) ) {

    // Hide sidebar to small and extremely small screen devices
    echo '<div class="sidebar sidebar-main">';
      dynamic_sidebar( 'sidebar-main' );
    echo '</div>';

  }

?>
