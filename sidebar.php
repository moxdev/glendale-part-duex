<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package The_Glendale
 */

?>

<aside id="secondary" class="widget-area" role="complementary">
        <?php if ( function_exists( 'glendale_specials_sidebar' ) ) {
            glendale_specials_sidebar();
        } ?>
</aside><!-- #secondary -->