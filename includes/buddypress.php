<?php

  // Registered members
  function diahd2014_registered_members( $max = 8 ) {

    if ( bp_has_members( 'max=' . $max ) ) :

      echo '<div id="recently-members">';

      while ( bp_members() ) : bp_the_member();

        $format    = '<div class="item">
                        <div class="item-avatar">
                          <a href="%2$s">%1$s</a>
                        </div>
                      </div>';

        $avatar    = bp_get_member_avatar( 'type=full&width=200&height=200' );
        $permalink = bp_get_member_permalink();

        printf($format, $avatar, $permalink);

      endwhile;

      echo '</div>';

    else:

      echo '<div class="text-muted">';
      echo __( 'Sorry, no members were found.', 'buddypress' );
      echo '</div>';

    endif;

  }

  // Registered groups
  function diahd2014_registered_groups( $max = 6 ) {

    if ( bp_has_groups( 'max=' . $max ) ) :

      echo '<div id="recently-groups">';

      while ( bp_groups() ) : bp_the_group();

        $format    = '<div class="item">
                        <div class="item-avatar">
                          <a href="%4$s">%3$s</a>
                          <span class="item-members">%5$s</span>
                        </div>
                        <h4 class="item-name">
                          <a href="%4$s">%1$s</a>
                        </h4>
                        <p class="item-description">
                          %2$s
                        </p>
                      </div>';

        $name         = bp_get_group_name();
        $description  = bp_get_group_description_excerpt();
        $members      = bp_get_group_member_count();
        $avatar       = bp_get_group_avatar( 'type=full&width=150&height=150' );
        $permalink    = bp_get_group_permalink();

        printf(
          $format,
          $name,
          $description,
          $avatar,
          $permalink,
          $members
        );

      endwhile;

      echo '</div>';

    else:

      echo '<div class="text-muted">';
      echo __( 'There were no groups found.' , 'buddypress' );
      echo '</div>';

    endif;


  }

?>
