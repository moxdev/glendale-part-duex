<?php
/**
 * Content Tagline shows at the bottom of the content on all pages.
 *
 * @package The Glendale
 */

function glendale_content_tagline() {
    if ( function_exists( 'get_field' ) ) {
        $tagline = get_field( 'content_tagline' );

        if( !empty($tagline) ) : ?>
            <p class="content-tagline"><?php echo $tagline; ?></p>
        <?php endif;
    }
}