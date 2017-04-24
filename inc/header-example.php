<?php



function flats_at_shady_grove_page_titles() {
    if(function_exists('get_field')) {
        $on_page_title = get_field('on_page_title');
        if(is_page_template('page-floor-plans.php')) {
            if($on_page_title) { ?>
                <header class="page-header-floor-plans">
                    <h1 class="entry-title"><?php echo $on_page_title; ?></h1>
                </header><!-- .entry-header -->
            <?php } else { ?>
                <header class="page-header-floor-plans">
                    <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
                </header><!-- .entry-header -->
            <?php }
        } else if(is_front_page()) {
            $feature_img = get_the_post_thumbnail();
            if($on_page_title) { ?>

                <header class="page-header-front-page <?php if(has_post_thumbnail()): echo 'has-thumb'; endif; ?>" <?php if(has_post_thumbnail()): ?>style="background-image:url(<?php echo the_post_thumbnail_url( 'home-feature' ); ?>)"<?php endif; ?>>
                    <h1 class="entry-title wrapper"><?php echo $on_page_title; ?></h1>
                    <?php if(has_post_thumbnail()) { ?>
                        <div class="screen-reader-text">
                            <?php the_post_thumbnail('home-feature' ); ?>
                        </div>
                    <?php } ?>
                </header><!-- .entry-header -->

            <?php } else { ?>
                <header class="page-header-front-page <?php if(has_post_thumbnail()): echo 'has-thumb'; endif; ?>" <?php if(has_post_thumbnail()): ?>style="background-image:url(<?php echo the_post_thumbnail_url( 'home-feature' ); ?>)"<?php endif; ?>>
                    <?php the_title( '<h1 class="entry-title wrapper">', '</h1>' ); ?>
                    <?php if(has_post_thumbnail()) {
                        the_post_thumbnail('home-feature', array( 'class' => 'screen-reader-text' ) );
                    } ?>
                </header><!-- .entry-header -->
            <?php }
        } else {
            if($on_page_title) { ?>
                <header class="page-header">
                    <div class="wrapper">
                        <h1 class="entry-title"><?php echo $on_page_title; ?></h1>
                        <?php if( function_exists('flats_at_shady_grove_specials') ) {
                            flats_at_shady_grove_specials();
                        } ?>
                    </div>
                </header><!-- .entry-header -->
            <?php } else { ?>
                <header class="page-header">
                    <div class="wrapper">
                        <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
                        <?php if( function_exists('flats_at_shady_grove_specials') ) {
                            flats_at_shady_grove_specials();
                        } ?>
                    </div>
                </header><!-- .entry-header -->
            <?php }
        }
    }
}