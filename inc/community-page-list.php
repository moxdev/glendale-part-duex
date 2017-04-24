<?php
/**
 * Portabello Theme custom community content for page-community-page.php.
 *
 * @package The Glendale
 */

/**
 * Dynamically adds a list of landmarks to the community page when its mobile.
 *
 */


function mm4_community_landmark_list() {
    $post_type = 'area_landmarks';
    $tax = 'landmark_types';
    $tax_terms = get_terms($tax);
    if ($tax_terms) { ?>
        <section class="wrapper" id="landmark-listing">
            <div class="landmark-inner-wrapper">
                <h2 class="screen-reader-text">Area Landmarks</h2>
                    <?php foreach ($tax_terms  as $tax_term) {
                        $args=array(
                            'post_type' => $post_type,
                            "$tax" => $tax_term->slug,
                            'post_status' => 'publish',
                            'posts_per_page' => -1,
                            'orderby' => 'title',
                            'order' => 'ASC'
                        );

                        $my_query = null;
                        $my_query = new WP_Query($args);
                        if( $my_query->have_posts() ) { ?>
                            <div class="community-listing-wrapper <?php echo $tax_term->slug; ?>">
                                <h2 class="community-listing-header"> <?php echo $tax_term->name; ?></h2>
                                <ul class="community-listing">
                                    <?php while ($my_query->have_posts()) : $my_query->the_post();
                                    $add = get_field('address');
                                    $city = get_field('city');
                                    $state = get_field('state');
                                    $zip = get_field('zip');
                                    $phone = get_field('phone');
                                    $url = get_field('website');
                                    $adtl_details = get_field('additional_details'); ?>
                                    <li>
                                        <span class="comm-name"><?php the_title(); ?></span><br>
                                        <?php if($add): echo '<span class="comm-add">' . $add . '</span><br>'; endif; ?>
                                        <?php if($city): echo '<span class="comm-city">' . $city . ',</span>'; endif; ?>
                                        <?php if($state): echo '<span class="comm-sta"> ' . $state . '</span>'; endif; ?>
                                        <?php if($zip): echo '<span class="comm-zip"> ' . $zip . '</span><br>'; endif; ?>
                                        <?php if($phone): echo '<span class="comm-details phone">' . $phone . '</span><br>'; endif; ?>
                                        <?php if($url): echo '<span class="comm-details url"><a target="_blank" href="' . $url . '">Visit Website &raquo;</a></span>'; endif; ?>
                                        <?php if($adtl_details): echo '<br>' . $adtl_details; endif; ?>
                                    </li>
                                <?php endwhile; ?>
                                </ul>
                            </div>
                            <?php }
                        }
                wp_reset_postdata(); ?>
            </div>
        </section>
    <?php }

}

