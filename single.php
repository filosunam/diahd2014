<?php get_header(); ?>

<div class="container">

  <div class="row">

    <div class="col-md-8" role="main">
      <?php if ( have_posts() ) : ?>

        <?php while ( have_posts() ) : the_post(); ?>

          <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

            <header class="entry-header">
              <?php the_post_thumbnail( 'large', array( 'class' => 'img-responsive' ) ); ?>
              <h1 class="entry-title h2"><?php the_title(); ?></h1>
              <div class="entry-meta">
                <?php
                  printf( '<span class="entry-date"><a href="%1$s" rel="bookmark"><time class="entry-date" datetime="%2$s">%3$s</time></a></span>',
                		esc_url( get_permalink() ),
                		esc_attr( get_the_date( 'c' ) ),
                		esc_html( get_the_date() )
                	);
                ?>, Publicado en
                <span class="cat-links"><?php echo get_the_category_list( ', ' ); ?></span>
              </div>
            </header>

            <br>

            <div class="entry-content">
              <?php the_content(); ?>
            </div>

            <footer class="entry-meta">
              <?php the_tags( '<hr><span class="tags text-muted">Etiquetas: ', ', ', '</span><hr>' ); ?>
            </footer>

          </article>

          <?php
            if ( comments_open() || get_comments_number() ) {
  						comments_template();
  					}
          ?>

        <?php endwhile; ?>

      <?php endif; ?>
    </div>

    <div class="col-md-4">
      <?php

        // Main sidebar
        get_sidebar( 'main' );

      ?>
    </div>

  </div>

</div>

<?php get_footer(); ?>
