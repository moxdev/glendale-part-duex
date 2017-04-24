<?php
/**
 * Sidebar Content
 * - Displays the Specials sidebar on all pages except for the homepage and contact page
 *
 * @package The Glendale
 */

function glendale_specials_sidebar() {
    if( have_rows('specials_sidebar', 'options') ): ?>

        <div class="sidebar-wrapper">

        <?php while ( have_rows('specials_sidebar', 'options') ) : the_row();

            if( get_row_layout() == 'sidebar_specials'):

                $sp_h2 = get_sub_field('specials_heading', 'options');
                $sp_h3 = get_sub_field('specials_subheading', 'options');
                $sp_disclaimer = get_sub_field('specials_disclaimer', 'options'); ?>

                <div class="sidebar-specials">

                    <?php if( !empty($sp_h2) ): ?>
                        <h2 class="header"><?php echo $sp_h2; ?></h2>
                    <?php endif; ?>

                    <?php if( !empty($sp_h3) ): ?>
                        <h3 class="subheader"><?php echo $sp_h3; ?></h3>
                    <?php endif; ?>

                    <?php if( !empty($sp_disclaimer) ): ?>
                        <h4 class="disclaimer"><?php echo $sp_disclaimer; ?></h4>
                    <?php endif; ?>

                </div>

            <?php elseif( get_row_layout() == 'sidebar_event' ):

                $ev_h2 = get_sub_field('event_heading');
                $ev_h3 = get_sub_field('event_subheading');
                $ev_text = get_sub_field('event_information'); ?>

                <div class="sidebar-events">

                    <?php if( !empty($ev_h2 ) ): ?>
                        <h2 class="header"><?php echo $ev_h2; ?></h2>
                    <?php endif; ?>

                    <?php if( !empty($ev_h3 ) ): ?>
                        <h3 class="sub-header"><?php echo $ev_h3; ?></h3>
                    <?php endif; ?>

                    <?php if( !empty($ev_text ) ): ?>
                        <p class="header"><?php echo $ev_text; ?></p>
                    <?php endif; ?>

                </div>

            <?php elseif( get_row_layout() == 'sidebar_announcement' ):

                $pf_h2 = get_sub_field('announcement_heading');
                $pf_image = get_sub_field('announcement_image'); ?>

                <div class="sidebar-announcements">

                    <?php if( !empty($pf_h2) ): ?>
                        <h2 class="header"><?php echo $pf_h2; ?></h2>
                    <?php endif; ?>

                    <?php if( !empty($pf_image) ): ?>
                        <img src="<?php echo $pf_image['sizes']['sidebar-image']; ?>" alt="<?php echo $pf_image['alt']; ?>">
                    <?php endif; ?>

                    </div>

            <?php endif;

        endwhile; ?>

        </div> <!-- .sidebar-wrapper -->

    <?php endif;
}