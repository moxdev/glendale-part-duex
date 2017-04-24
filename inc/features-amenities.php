<?php
/**
 * Displays the Features and Amentites for 'page-amenities.php'
 *
 * @package The Glendale
 */

function glendale_features_amenities() {

    if( is_page_template( 'page-amenities.php' ) ) {

        $f_disclaimer = get_field( 'features_disclaimer' );
        $a_disclaimer = get_field( 'amenities_disclaimer' );

        // FEATURES SECTION
        if( have_rows('features') ): ?>

            <div id="features-section">
                <header class="section-header">
                    <h2>Apartment Features</h2>
                </header>
                <div class="features-wrapper">

                    <?php while( have_rows('features') ): the_row();

                        $img = get_sub_field('image');
                        $title = get_sub_field('title');

                        if(!empty($img) ) { ?>

                            <div class="highlight has-img">
                                <div class="highlight-inner">

                                    <img src="<?php echo $img['sizes']['gallery-image']; ?>" alt="<?php echo $img['alt']; ?>" description="<?php echo $img['description']; ?>">

                                    <?php if( !empty($title) ) : ?>
                                        <span class="title"><?php echo $title; ?></span>
                                    <?php endif; ?>

                                    <button class="view">View</button>
                                    <button class="close">X</button>
                                </div>
                            </div><!-- highlight -->

                        <?php

                        } else { ?>

                            <div class="highlight">
                                <div class="highlight-inner">

                                    <?php if( !empty($title) ) : ?>
                                        <span class="title"><?php echo $title; ?></span>
                                    <?php endif; ?>

                                    <button class="hide-btn">button</button>
                                </div>
                            </div><!-- highlight -->

                        <?php }

                    endwhile; ?>

                </div><!-- features-wrapper -->
                <div class="disclaimer"><?php echo $f_disclaimer; ?></div>
            </div><!-- features-section -->

        <?php endif;

        // AMENITIES SECTION =================================================
        if( have_rows('amenities') ): ?>

            <div id="amenities-section">

                <header class="section-header">
                    <h2>Community Amenities</h2>
                </header>

                <div class="amenities-wrapper">

                    <?php while( have_rows('amenities') ): the_row();

                        $img = get_sub_field('image');
                        $title = get_sub_field('title');

                        if(!empty($img) ) { ?>

                            <div class="highlight has-img">
                                <div class="highlight-inner">

                                    <img src="<?php echo $img['sizes']['gallery-image']; ?>" alt="<?php echo $img['alt']; ?>" description="<?php echo $img['description']; ?>">

                                    <?php if( !empty($title) ) : ?>
                                        <span class="title"><?php echo $title; ?></span>
                                    <?php endif; ?>

                                    <button class="view">View</button>
                                    <button class="close">X</button>
                                </div>
                            </div><!-- highlight -->

                        <?php

                        } else { ?>

                            <div class="highlight">
                                <div class="highlight-inner">

                                    <?php if( !empty($title) ) : ?>
                                        <span class="title"><?php echo $title; ?></span>
                                    <?php endif; ?>

                                    <button class="hide-btn">button</button>
                                </div>
                            </div><!-- highlight -->

                        <?php }

                    endwhile; ?>

                </div><!-- features-wrapper -->
                <p class="disclaimer"><?php echo $a_disclaimer; ?></p>

            </div><!-- amenities-section -->

        <?php endif;
    }
}