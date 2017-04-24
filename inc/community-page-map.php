<?php
/**
 * Portabello Theme custom community content for page-community-page.php.
 *
 * @package The Glendale
 */

/**
 * Dynamically adds the community content to the community page.
 *
 */

function mm4_area_map() { ?>
    <div id="map-container">
        <div id="map-wrapper">
            <div id="map-canvas"></div>
            <button id="reset-map">Reset</button>
        </div>
    </div>

    <?php wp_enqueue_script( 'landmark-map', get_template_directory_uri() . '/js/area-map.js' , array(), '20151215', true);
}
