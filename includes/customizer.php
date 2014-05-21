<?php

function diahd2014_customize_register( $wp_customize ) {

	// Featured Content Section
  $wp_customize->add_section( 'featured_content', array(
		'title'       => 'Contenido destacado',
		'priority'    => 130,
	) );

  // Featured content lead
	$wp_customize->add_setting( 'featured_content_lead' );
	$wp_customize->add_control( 'featured_content_lead', array(
		'label'   => 'Texto en la portada',
		'section' => 'featured_content',
		'type'    => 'text'
	) );

}

add_action( 'customize_register', 'diahd2014_customize_register' );

?>
