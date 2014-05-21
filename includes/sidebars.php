<?php

  function diahd2014_register_sidebars() {

    // Register main sidebar
    register_sidebar(array(
      'id'            => 'sidebar-main',
      'name'          => 'Barra principal',
      'description'   => 'Barra lateral principal',
      'before_widget' => '<div id="%1$s" class="widget %2$s">',
      'after_widget'  => '</div>',
      'before_title'  => '<h4 class="widget-title">',
      'after_title'   => '</h4>'
    ));

  }

?>
