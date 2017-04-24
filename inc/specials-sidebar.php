<?php
/**
 * Sidebar Content
 * - Displays the Specials sidebar on all pages except for the homepage and contact page
 *
 * @package The Glendale
 */

function glendale_specials_sidebar() {
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
        </div>

        <?php
    }
}