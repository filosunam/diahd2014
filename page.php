<?php get_header(); ?>

<div class="container" role="main">

  <?php if ( have_posts() ) : ?>

    <?php while ( have_posts() ) : the_post(); ?>

      <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

        <header class="entry-header">
          <?php the_post_thumbnail( 'large', array( 'class' => 'img-responsive' ) ); ?>
        </header>

        <div class="entry-content">
          <?php the_content(); ?>
        </div>

      </article>

    <?php endwhile; ?>

  <?php endif; ?>

</div>

<?php get_footer(); ?>
