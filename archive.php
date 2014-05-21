<?php get_header(); ?>

<div class="container">

	<section id="primary" class="content-area">
		<div id="content" class="site-content" role="main">

			<?php if ( have_posts() ) : ?>

			<header class="archive-header">
				<h1 class="archive-title h3">
          <?php

            if ( is_category() || is_tag() ) :

              printf(
                __( 'You are currently browsing the archives for the %s category.' ),
                '<strong>' . single_cat_title( '', false ) . '</strong>'
              );

            elseif ( is_author() ) :

              printf(
                __( 'Posts by %s' ),
                '<strong>' . get_the_author_meta( 'display_name' ) . '</strong>'
              );

            elseif ( is_day() ) :

              printf(
                __( 'You are currently browsing the <a href="%1$s/">%2$s</a> blog archives for the day %3$s.' ),
                get_bloginfo('url'), get_bloginfo('name'),
                '<strong>' . get_the_time( 'l, F j, Y' ) . '</strong>'
              );

            elseif ( is_month() ) :

              printf(
                __( 'You are currently browsing the <a href="%1$s/">%2$s</a> blog archives for the day %3$s.' ),
                get_bloginfo('url'), get_bloginfo('name'),
                '<strong>' . get_the_time( 'F Y' ) . '</strong>'
              );

            elseif ( is_year() ) :

              printf(
                __( 'You are currently browsing the <a href="%1$s/">%2$s</a> blog archives for the year %3$s.' ),
                get_bloginfo('url'), get_bloginfo('name'),
                '<strong>' . get_the_time( 'Y' ) . '</strong>'
              );

            endif;

          ?>
        </h1>

				<?php

					$term_description = term_description();
					if ( ! empty( $term_description ) ) :
						printf( '<hr><small class="taxonomy-description text-muted">%s</small><hr>', $term_description );
					endif;

				?>
			</header>

			<?php



          $format = '<div class="media" id="post-%1$s" role="article">
                        %6$s
                        <div class="media-body">
                          <span class="label label-primary">%5$s</span>
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
