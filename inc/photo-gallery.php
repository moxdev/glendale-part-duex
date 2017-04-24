<?php
/**
 * Photo Gallery
 *
 *
 * @package The Glendale
 */

function glendale_photo_gallery() {
    if( is_page_template('page-photo-gallery.php') ) {
        if( function_exists('get_field') ) {
            $images = get_field('photo_gallery');

            if( !empty( $images ) ): ?>

            <div class="photo-gallery-section">
                <div class="gallery-wrapper">
                    <ul>

                    <?php foreach( $images as $image ): ?>

                         <li>
                            <div class="image-wrapper">

                                <?php if( $image ): ?>
                                    <a href="<?php echo $image['url']; ?>" class="fp-trigger" data-imagelightbox="c"><img src="<?php echo $image['sizes']['gallery-image']; ?>" alt="<?php echo $img['alt']; ?>" description="<?php echo $image['description']; ?>"></a>
                                <?php endif; ?>

                            </div>

                        </li>
                    <?php endforeach; ?>

                    </ul>

            <?php endif; ?>

                </div><!-- gallery-wrapper -->
            </div><!-- photo-gallery-section -->
        <?php }
    }
}