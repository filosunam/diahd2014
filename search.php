<?php get_header(); ?>

<div class="container">

	<section id="primary" class="content-area">
		<div id="content" class="site-content" role="main">


			<header class="archive-header">
				<h1 class="archive-title h3">
          <?php printf( __( 'Search Results %1$s %2$s' ), '<em>' . get_search_query() . '</em>', '' ); ?>
        </h1>
			</header>

			<?php

        if ( have_posts() ) :

          $format = '<div class="media" id="post-%1$s" role="article">
                        %6$s
                        <div class="media-body">
                          <span class="label label-success">%5$s</span>
                          <h4 class="media-heading">
                            <a href="%3$s" rel="bookmark" title="%2$s">%2$s</a>
                          </h4>
                          <p>%4$s</p>
                        </div>
                    </div><hr>';

					while ( have_posts() ) : the_post();

            printf(
              $format,
              get_the_ID(),
              get_the_title(),
              get_the_permalink(),
              get_the_excerpt(),
              sprintf( '<span class="entry-date"><time class="entry-date" datetime="%2$s">%3$s</time></span>',
                esc_url( get_permalink() ),
                esc_attr( get_the_date( 'c' ) ),
                esc_html( get_the_date() )
              ),
              has_post_thumbnail() ? sprintf(
                '<div class="media-object img-thumbnail pull-left">
                  <a href="%1$s" title="%2$s">%3$s</a>
                </div>',
                get_the_permalink(),
                get_the_title(),
                get_the_post_thumbnail( get_the_ID(), 'thumbnail' )
              ) : ''
            );

					endwhile;

			  endif;
			?>
		</div>
	</section>

  <?php diahd2014_pagination(); ?>

</div>

<?php get_footer(); ?>
