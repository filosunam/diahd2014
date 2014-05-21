<?php get_header(); ?>

<!-- Last posts -->
<div id="featured-posts">
<?php

  $sticky = get_option( 'sticky_posts' );

  // Found sticky posts
  if ( $sticky ) {

    // Sort descending
    rsort( $sticky );

    $args = array(
      'post__in' => array_slice( $sticky, 0, 3 ),
      'meta_key' => '_thumbnail_id',
      'ignore_sticky_posts' => 1
    );

  // Show last entries if not found sticky posts
  } else {

    $args = array(
      'posts_per_page' => 3,
      'meta_key' => '_thumbnail_id',
      'ignore_sticky_posts' => 0
    );

  }

  // Get posts
  query_posts( $args );

  if ( have_posts() ) :

    echo '<div class="container">';
    echo '<div class="row">';

    while ( have_posts() ) : the_post();

      $format = '<div class="col-xs-4">
                  <a href="%2$s">
                    <img class="img-responsive" alt="%1$s" src="%3$s">
                  </a>
                  <h3 class="h4">
                    <a href="%2$s">%1$s</a>
                  </h3>
                </div>';

      $title     = get_the_title();
      $permalink = get_the_permalink();
      $thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large');

      printf($format, $title, $permalink, $thumbnail[0]);

    endwhile;

    echo '</div>';
    echo '</div>';

  endif;

?>
</div>

<!-- Last active users -->
<div class="jumbotron jumbotron-default">
  <div class="container">
    <h2>Últimos usuarios activos</h2>
    <?php diahd2014_registered_members(); ?>
  </div>
</div>

<!-- Last active groups -->
<div class="container">
  <h2>Últimos grupos activos</h2>
  <?php diahd2014_registered_groups(); ?>
</div>

<?php get_footer(); ?>
