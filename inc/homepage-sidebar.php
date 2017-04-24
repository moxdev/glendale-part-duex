<?php
/**
 * Homepage Sidebar Content
 *
 * @package The Glendale
 */

function glendale_homepage_sidebar() {

    if ( function_exists( 'get_field' ) ) {

        ?>

        <div class="sidebar-wrapper">

            <?php

            $sp_h2         = get_field('specials_heading', 'options');
            $sp_h3         = get_field('specials_subheading', 'options');
            $sp_disclaimer = get_field('specials_disclaimer', 'options');

            ?>

            <div class="sidebar-specials">

                <?php if( !empty($sp_h2) ): ?>
                    <h2 class="header"><?php echo esc_html( $sp_h2 ); ?></h2>
                <?php endif; ?>

                <?php if( !empty($sp_h3) ): ?>
                    <h3 class="subheader"><?php echo esc_html( $sp_h3 ); ?></h3>
                <?php endif; ?>

                <?php if( !empty($sp_disclaimer) ): ?>
                    <h4 class="disclaimer"><?php echo esc_html( $sp_disclaimer ); ?></h4>
                <?php endif; ?>

            </div>

            <?php if( have_rows('homepage_sidebar') ):

                while ( have_rows('homepage_sidebar') ) : the_row();

                    if( get_row_layout() == 'homepage_event' ):

                        $ev_h2   = get_sub_field('event_heading');
                        $ev_h3   = get_sub_field('event_subheading');
                        $ev_text = get_sub_field('event_information'); ?>

                        <div class="homepage-events">

                            <?php if( !empty($ev_h2 ) ): ?>
                                <h2 class="header"><?php echo esc_html( $ev_h2 ); ?></h2>
                            <?php endif; ?>

                            <?php if( !empty($ev_h3 ) ): ?>
                                <h3 class="sub-header"><?php echo esc_html( $ev_h3 ); ?></h3>
                            <?php endif; ?>

                            <?php if( !empty($ev_text ) ): ?>
                                <p><?php echo esc_html( $ev_text ); ?></p>
                            <?php endif; ?>

                        </div>

                    <?php elseif( get_row_layout() == 'homepage_announcement' ):

                        $an_h2    = get_sub_field('announcement_heading');
                        $an_image = get_sub_field('announcement_image');
                        $an_disc  = get_sub_field('announcement_disclaimer'); ?>

                        <div class="homepage-announcements">

                            <?php if( !empty($an_h2) ): ?>
                                <h2 class="header"><?php echo esc_html( $an_h2 ); ?></h2>
                            <?php endif; ?>

                            <?php if( !empty($an_image) ): ?>
                                <img src="<?php echo $an_image['sizes']['sidebar-image']; ?>" alt="<?php echo $an_image['alt']; ?>">
                            <?php endif; ?>

                        <?php if( !empty($an_disc) ) : ?>
                            <h4 class="disclaimer"><?php echo esc_html( $an_disc ); ?></h4>
                        <?php endif; ?>
                    </div>

                    <?php endif;

                endwhile; ?>

            <?php endif; ?>

        </div> <!-- .sidebar-wrapper -->

        <?php
    }
}








