<?php

/* Author: Sunu Haeriadi
 * License: Creative Commons Attribution 4.0 International License
 * Machine-readability: No
 *
 * (c) 2017 by Sunu Haeriadi
 * Except where otherwise noted, this work is licensed under
 * the Creative Commons Attribution 4.0 International License. To view a copy
 * of this license, visit http://creativecommons.org/licenses/by/4.0/
 * or send a letter to Creative Commons, PO Box 1866, Mountain View, CA 94042, USA.
 */

/* Assures that the framework is properly booted up and server is not running
 * a single php file.
 */
defined('BASEPATH') OR exit('No direct script access allowed');

?>
<div class="uk-vertical-align uk-text-center uk-height-1-1">
	<div class="uk-vertical-align-middle">
		<form class="uk-panel uk-panel-box uk-form" action="<?php echo site_url('/user/login'); ?>" method="post">
			<div class="uk-form-row">
				<input class="uk-width-1-1 uk-form-large" type="email" name="username" placeholder="Email">
			</div>

			<div class="uk-form-row">
				<input class="uk-width-1-1 uk-form-large" type="password" name="password" placeholder="Password">
			</div>

			<div class="uk-form-row">
				<button class="uk-width-1-1 uk-button uk-button-primary uk-button-large">Masuk</button>
			</div>

			<?php /* <div class="uk-form-row uk-text-small">
				<label class="uk-float-left"><input type="checkbox"> Remember Me</label>
				<a class="uk-float-right uk-link uk-link-muted" href="#">Forgot Password?</a>
			</div> */ ?>
		</form>
	</div>
</div>

<script>
	$("document").ready(function () {
		$("nav").attr("hidden", "hidden");
	});
</script>
