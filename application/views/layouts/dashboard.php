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
<div class="uk-container uk-container-center uk-margin-top uk-margin-large-bottom">
	<div class="uk-grid" data-uk-grid-margin="data-uk-grid-margin">
		<div class="uk-width-small-1-1 uk-width-medium-3-4">
			<div id="iframe-container">
				<iframe id="file_embed" src="<?php echo $file; ?>" frameborder="0"></iframe>

				<script type="text/javascript">
					var embededPage = document.querySelector("#file_embed");
					embededPage.style.display = "block";
					embededPage.style.width = "100%";
					embededPage.style.minHeight = "80vh";
				</script>
			</div>
		</div>

		<div class="uk-width-small-1-1 uk-width-medium-1-4">
			<div class="uk-panel uk-panel-box uk-panel-box-primary">
				<?php echo $note; ?>
			</div>
		</div>
	</div>
</div>
