<?php
/**
 * Displays the Features Section for page-amenities.php'
 *
 * @package The Glendale
 */

function glendale_apartment_features() {

    if ( function_exists( 'get_field' ) ) {

        $f_disclaimer = get_field( 'features_disclaimer' );

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

                                    <img src="<?php echo $img['sizes']['gallery-image']; ?>" alt="<?php echo esc_attr( $img['alt'] ); ?>" description="<?php echo esc_attr( $img['description'] ); ?>">

                                    <?php if( !empty($title) ) : ?>
                                        <span class="title"><?php echo esc_html( $title ); ?></span>
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
                                        <span class="title"><?php echo esc_html( $title ); ?></span>
                                    <?php endif; ?>

                                </div>
                            </div><!-- highlight -->

                        <?php }

                    endwhile; ?>

                </div><!-- features-wrapper -->
                <div class="disclaimer"><?php echo esc_html( $f_disclaimer ); ?></div>
            </div><!-- features-section -->

        <?php endif;
    }
}