<?php
/*
Plugin Name: MM4 You Contact Form
Description: Contact form plugin
Version: 3.0
Author: Chris Stielper
License: GPL
*/

// Setup the options page for our plugin.
add_action('admin_menu', 'mm4_you_add_gcf_interface');

function mm4_you_add_gcf_interface() {
	add_menu_page( 'Contact Form Page', 'Contact Form', 'manage_options', 'mm4_you_cf_options', 'mm4_you_cf_options' );
}

function mm4_you_cf_options() {?>
    <form method="post" action="options.php">
    <?php wp_nonce_field('update-options') ?>
    	<h1>Contact Form Settings</h1>
		<p>Enter the page ID of the contact form "Thank You" page. This is the page users will see after the form is submitted.<br>
		<input type="text" name="mm4-you-cf-page-id" size="5" value="<?php echo get_option('mm4-you-cf-page-id'); ?>"></p>

		<p>Enter the email address(es) that you would like the contact form to submit to. (Separate multiple email addresses with a comma and replace the "@" symbol with "_AT_").<br>
		<input type="text" name="mm4-you-cf-email-add" size="25" value="<?php echo get_option('mm4-you-cf-email-add'); ?>"></p>

		<input type="hidden" name="action" value="update">
		<input type="hidden" name="page_options" value="mm4-you-cf-page-id, mm4-you-cf-email-add">

		<p><input type="submit" name="Submit" value="Update Options"></p>

	</form>
<?php }

// Grab the settings from our options page
// Include the JS validation
// Markup our form
function mm4_you_contact_form() {
	$ty_page = get_option('mm4-you-cf-page-id');
	$action = get_permalink($ty_page);

	wp_enqueue_script('mm4-you-validate', get_template_directory_uri() . '/plugins/mm4-you-contact-form/js/min/mm4-you-validate-min.js', array(), NULL, TRUE ); ?>

	<form name="contact-form" method="POST" action="<?php echo $action; ?>" novalidate>
		<?php $recipients = get_option('mm4-you-cf-email-add'); ?>
		<input type="hidden" value="<?php echo $recipients; ?>" name="recipients" id="recipients">
		<input type="hidden" value="Online Contact Form for <?php echo bloginfo('name'); ?>" name="subject" id="subject">
		<label for="first-name">
			<input type="text" name="first-name" id="first-name" class="required" data-error-label="First Name" placeholder="NAME">
		</label>
		<label for="email-address">
			<input type="email" name="email-address" id="email-address" class="required" data-error-label="Email" placeholder="EMAIL">
		</label>
		<label for="primary-phone">
			<input type="tel" name="primary-phone" id="primary-phone" class="required" data-error-label="Primary Phone" placeholder="PHONE">
		</label>
		<label for="comments">
			<textarea name="comments" id="comments" rows="6" placeholder="MESSAGE"></textarea>
		</label>
		<label for="spam" class="honey">What is 1 plus two + 4?
			<input name="spam" type="text" size="4" id="spam" maxlength="4" class="honey">
		</label>
		<div class="msg-box"></div>
		<input type="submit" value="contact the leasing office">
	</form>
<?php }

// Add our server-side mail processing script to the "thank you" page
function mm4_you_cf_thank_you_page() {
	global $post;
	$ID = $post->ID;
	$ty_page = get_option('mm4-you-cf-page-id');
	if( $ID == $ty_page ) {
		require ('inc/contact.php');
	}
}
add_action('wp_head', 'mm4_you_cf_thank_you_page');
?>