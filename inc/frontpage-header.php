<?php
/**
 * Displays Featured Image header on the Homepage
 *
 * @package The Glendale
 */

function glendale_home_page_featured_image() {

    if ( function_exists( 'get_field' ) ) {
        $on_page_title = get_field('on_page_title');

        if( is_front_page() ) {
            $featured_img = get_the_post_thumbnail();

            if( !empty($on_page_title) ) : ?>

                <header class="page-header-front-page <?php if(has_post_thumbnail()): echo 'has-thumb'; endif; ?>" <?php if(has_post_thumbnail()): ?>style="background-image:url(<?php echo the_post_thumbnail_url( 'home-feature' ); ?>)"<?php endif; ?>>

                    <h1><?php echo $on_page_title; ?></h1>

                    <?php if(has_post_thumbnail()) { ?>

                        <div class="screen-reader-text">
                            <?php the_post_thumbnail('home-feature' ); ?>
                        </div>

                    <?php } ?>

                </header><!-- .entry-header -->

            <?php endif;

        }
    }
}