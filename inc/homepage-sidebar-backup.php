<?php
/**
 * Homepage Sidebar Content
 *
 * @package The Glendale
 */

function glendale_homepage_sidebar() {
    // check if the flexible content field has rows of data
    if( have_rows('homepage_sidebar') ): ?>
        <div class="sidebar-wrapper">
            <?php while ( have_rows('homepage_sidebar') ) : the_row();

                if( get_row_layout() == 'sidebar_specials' ):

                    $sp_h2 = get_sub_field('specials_heading');
                    $sp_h3 = get_sub_field('specials_subheading');
                    $sp_disclaimer = get_sub_field('specials_disclaimer'); ?>

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
                            <p><?php echo $ev_text; ?></p>
                        <?php endif; ?>
                    </div>

                <?php elseif( get_row_layout() == 'sidebar_pet_friendly' ):

                    $pf_h2 = get_sub_field('pet_friendly_heading');
                    $pf_image = get_sub_field('pet_friendly_image'); ?>

                    <div class="sidebar-pets">
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