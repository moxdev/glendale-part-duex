<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package The_Glendale
 */

?>
        </div><!-- .content-wrapper -->

        <!-- // Displays the Features and Amenities sections if they exist -->
        <?php if (is_page_template( 'page-amenities.php' ) ) { ?>

            <div class="feature-amenities-wrapper">

                <?php if ( function_exists( 'glendale_apartment_features' ) ) {
                    glendale_apartment_features();
                }

                if ( function_exists( 'glendale_apartment_amenities' ) ) {
                    glendale_apartment_amenities();
                } ?>

            </div><!-- feature-amenities-wrapper -->

        <?php } ?>

        <!-- // Displays the Floor Plans sections if they exist-->
        <?php if (is_page_template( 'page-floorplans.php' ) && function_exists( 'glendale_floorplan_section' ) ) {
            glendale_floorplan_section();
        } ?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info">
            <div class="footer-wrapper">

                <div class="contact-section">

                    <div class="contact-wrapper">

                        <h2>Contact Us</h2>
                        <?php $street = get_field('address', 'option');
                            $city = get_field('city', 'option');
                            $state = get_field('state', 'option');
                            $zip = get_field('zip', 'option');
                            $leasing = get_field('leasing', 'option');
                            $phone = get_field('phone', 'option');
                            $fax = get_field('fax', 'option'); ?>

                        <div itemscope itemtype="http://schema.org/LocalBusiness">
                            <div itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">

                                <?php if( !empty($street) ) : ?>
                                    <span itemprop="streetAddress"><?php echo $street; ?><br></span>
                                <?php endif; ?>

                                <?php if( !empty($city) ) : ?>
                                    <span itemprop="addressLocality"><?php echo $city; ?></span>,
                                <?php endif; ?>

                                <?php if( !empty($state) ) : ?>
                                    <span itemprop="addressRegion"><?php echo $state; ?></span>
                                <?php endif; ?>

                                <?php if( !empty($zip) ) : ?>
                                    <span itemprop="postalCode"><?php echo $zip; ?></span>
                                <?php endif; ?>
                            </div><!-- itemprop="address" -->

                            <div class="contact-numbers">

                                <?php if( !empty($leasing) ) : ?>
                                    Leasing: <span itemprop="telephone"><a href="tel:<?php echo $leasing; ?>"><?php echo $leasing; ?></a><br></span>
                                <?php endif; ?>

                                <?php if( !empty($phone) ) : ?>
                                    Phone: <span itemprop="telephone"><a href="tel:<?php echo $phone; ?>"><?php echo $phone; ?></a><br></span>
                                <?php endif; ?>

                                <?php if( !empty($fax) ) : ?>
                                    Fax: <span itemprop="faxNumber"><?php echo $fax; ?><br></span>
                                <?php endif; ?>
                            </div><!-- contact-numbers -->

                        </div><!-- itemscope -->

                        <!-- <a class="resident-button" href="#"><button>for residents &raquo;</button></a> -->
                        <a class="resident-button" href="<?php echo esc_url( get_permalink( get_page_by_title( 'Residents Corner' ) ) ); ?>"><?php esc_html_e( 'For Residents &raquo;', 'textdomain' ); ?></a>

                    </div><!-- contact-wrapper-->

                    <?php if( have_rows( 'hours', 'option' ) ) : ?>

                        <div class="hours">
                            <h2>Hours of Operation</h2>

                            <?php while( have_rows('hours', 'option') ): the_row();
                                $day = get_sub_field('day', 'option');
                                $open = get_sub_field('open', 'option');
                                $close = get_sub_field('close', 'option'); ?>

                                <span><?php echo $day; ?>: <?php echo $open; ?> - <?php echo $close; ?><br></span>
                            <?php endwhile; ?>
                        </div><!-- hours -->

                    <?php endif; ?>
                </div><!-- contact-section -->

                <div class="icons-section">
                    <div class="social">
                        <h2>Let's Connect</h2>
                        <div class="icons">
                            <a href="https://www.facebook.com/The-Glendale-Apartments-96603797113/" target="_blank"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="28" height="27" viewBox="0 0 28 27"><title>Facebook Icon</title><g id="facebook-icon" data-name="facebook"><g id="social"><image width="28" height="27" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABwAAAAbCAYAAABvCO8sAAAACXBIWXMAAAsSAAALEgHS3X78AAAA0ElEQVRIS2P4////ZCD++5/2AGTHZIb/9LEMBv4yEFJBbTBkLTwDxKlAbADECkCsCGV3oCukhoVdQMz0H2IWOk5AV0yphXuAmPE/dstoYqHvf0xLOP5DghWES9A1UGqh8H9Uy8KB+Bc+DZRaiO67NfiVU9/CDfiVDwELVwBxAxJGtzACTf4kugGkWhjwH9MSfBgjTmlt4Tl0A2ht4Qd0A0i1kJQ4bMVmAKkWogN0C6meStHBqIUYYNRCQmBoWEhJu5RUC8HtUkpa3qRYCG55AwDtTjeiqYI47QAAAABJRU5ErkJggg=="/></g></g></svg></a>

                            <a href="https://plus.google.com/+Theglendaleapts" target="_blank"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="42" height="25" viewBox="0 0 42 25"><title>Google Plus Icon</title><g id="google-plus" data-name="google"><g id="social"><image width="42" height="25" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACoAAAAZCAYAAABHLbxYAAAACXBIWXMAAAsSAAALEgHS3X78AAAB4UlEQVRYR82XzStFQRjGr49IKVZslI+shKyUshLKjoWylCIWyp9g4U+wVBa4G4qNWPlYSJZslCgryobVLa48nrd7b2fMnXPfueece/PU7zZn5n1n3pk7c+Y9KQAphQGyTs7IKwJlyRM5IMukzaOvyJRqHCdX8NcX2SZd8Bi4XFyVLSSN6MqQVXgMXg52RQe5R3y9kU54BOCL+dBOHhFfsm974TF4ORQKNeQc4ZL9t0vmyBDpIcNkhVwadjJR+VfUgR3IlmvN02i3FwqLCJec9m7b0WICuYlGDVL4QKA1u11+GvD3tWNKDlWd7VQh1EBn4dYtcpPQBkgKNdAduDVpG1cYNdAHFOuF1NrGBkcOH02jCPw3yIXFt2H7aLeLUxbFOkTp2UcJdBox/FMh9Vv4h4FWa0WnEPiPkXmLjGGbttvFqVp7tA+lJ68epqRP/bGjL1mtesVPDTTJ9+gg+XH0derhqwaa1M0k/Vy7u8GCh/8dec5TZF8oxL3rJbs/CfGXlK9J8VcpFHyypz0E2VMX6SczZJO8h7tiCR6BaJgPSeWjpmSVZRHUQDTsiqQyfNENcjmmGoQPrsq430yifdIMjwB8KdVY7leoSE6ueVUmhmqA8O/6T+RuMKmXbGjEo6/I/AJ3vuTslnY1BwAAAABJRU5ErkJggg=="/></g></g></svg></a>

                            <!-- Twitter -->
                            <!-- <a href="#"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="33" height="26" viewBox="0 0 33 26"><title>Twitter Icon</title><g id="twitter-icon" data-name="twitter"><g id="social"><image width="33" height="26" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACEAAAAaCAYAAAA5WTUBAAAACXBIWXMAAAsSAAALEgHS3X78AAAB8UlEQVRIS72XyytFURTGr4mQgTKgzMgjiSSZmshclAkmUooR0+tRDAzIo2RgIAMlGYv/wDMRMpFkhMJE8vp8y7m7zj1n73P2uQ5f/eqee89a67v7nrXXvgkAiRipJsvkhnySV3JMRkmB5v5mkq0usskkybIopEPikuQLZj3AKVpKBsk+2SAJlaQtdeMiMjOSRHTdkRK4TMy5PlwnOQgvrKghH4imK9JFhsiESrTiuemU1CLcgLCEzHVOCnUrofRGpqF/oNxcaGJtJA9sEeB/JnR6JjOkHHoTj+ZQow5ILlI5VCLpjuugqJTkZ5oiHaSS5JPLwAi9froCHhNCC5ze/g+tQGNinPSTMfJujo1Nsif5TMwGhsSvHmhMtAZF/IGqoDEhu+ReUFSMkrmS1mHuiwpyb46NTbL3GE0IskxHxvB4JNt8oIlCUk9G4AyYuLUFjwEYTLyYMvxSMubrYGFCGDIk+a0WoDEAgwnplHl9nowlQy4PEUwo2smZJmFUyYCTzjPWCjKhkI7Z9Ga2lEzgJoTUCDPQSLa9mS11SxoQ/iV9JuRYJ4WHya4vrb12SDEsDCBlohPOIeNJly2iZEvuhkVhN+qFnHL6yKEvrZ1k1XrhHI5Ci3rRvVlGBsgaOUH68U3OnfL/QYbdKhzjpWFFwvgG74AJQ3WmVpIAAAAASUVORK5CYII="/></g></g></svg></a> -->
                        </div>
                    </div>
                    <div class="brand">
                        <a href="http://www.thedonaldsongroup.com/" target="_blank"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="115" height="32" viewBox="0 0 115 32"><title>Donaldson Logo</title><g id="donaldson-logo" data-name="Layer 2"><g id="Layer_1-2" data-name="Layer 1"><image width="115" height="32" xlink:href="data:image/png;base64,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"/></g></g></svg></a>

                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="72" height="29" viewBox="0 0 72 29"><title>Donaldson Tagline</title><g id="donaldson-tagline" data-name="Layer 2"><g id="Layer_1-2" data-name="Layer 1"><image width="72" height="29" xlink:href="data:image/png;base64,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"/></g></g></svg>

                        <a href="<?php echo esc_url( get_permalink( get_page_by_title( 'Equal Housing Opportunity Policy' ) ) ); ?>"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="23" height="26" viewBox="0 0 23 26"><title>Equal Housing Opportunity</title><g id="equal-housing-opportunity" data-name="Layer 2"><g id="Layer_1-2" data-name="Layer 1"><image width="23" height="26" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABcAAAAaCAYAAABctMd+AAAACXBIWXMAAAsSAAALEgHS3X78AAACNUlEQVRIS8XWy0tVURQG8JuP0JCSFASLHlJSSaGgQlRg5eCqkWmhYJSWJT7Q7ElFWpo0aaAURTQSmvYPNGmQ4MRBjaJhBA2c9JhJJJ/fumvd6257zrmKYht+nHv2Wfs7+2zPwxiA2DIU0Rv6Qg3LqE9IV5BBvfQT/7Z3VLaa8EqaQXj7S89oK0Iygjq30Aua98KmqZmmvP4f1EeZiAjfQOdp1hv8G7o0GU5dK3316j7SYQSE76f3WNreUrE7wJFLIzTnjXkNvfpE+BP64xV8o9MIWUtPKX3wxn+nxhiWtleUh/ShLlmye35QUHg5FgfFaSLCHqc23w+Szkn67PS54Y/8AV6rQXD4J5pMHphwDrjhd+lXhKMIDpdJxdKFV9BghO1YRfggolvYsvz/8M20K0IOVhh+zApXaqeTERq+Fm39wg/SmTW0zw2Pm0tUS9vshHHbJicgzlmNPPrV0Duqik7QIbpKB9zwK3bGI9QDvWPkRC+tX2puQS+3xdTYuId0kZ7TdToF+84mw+XgSRqjx9DHfsS2wl22m9CPxx3qpwHo7CV0nK7Zfip8E/Q1Ky/5Auh3MRv6KpV7Pdf2s61Wtvl2vND2s2ij9We54Y02g7N21lbb1kFnImvfBV3vYaqn3dRJJdQGvXr5ltZafSq8nfZCL2uIbljIZehMntrJjlMHdHnKLWyUHkCfWOnrtROkwqXoPnXbfvIfH5mZrK3cAXLpTdBZXrDQFvt9m3ZA/zYyNvENXQCkgu9zT0ksJAAAAABJRU5ErkJggg=="/></g></g></svg></a>

                    </div>
                    <div class="translate">
                        <div id="google_translate_element"></div><script type="text/javascript">
                        function googleTranslateElementInit() {
                          new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
                        }
                        </script><script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
                    </div>
                    <div class="mm4">
                        <a class="mm4" href="https://www.mm4solutions.com/" target="_blank" id="mms">Website by Millennium Marketing Solutions</a>
                    </div>
                </div>

            </div><!-- footer-wrapper -->
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
    <div class="footer-tagline">
        <h2><span class="lead">Rejuvenate...</span> Your Lifestyle</h2>
    </div>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
