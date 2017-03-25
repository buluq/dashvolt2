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
<nav class="uk-navbar uk-navbar-attached">
	<ul class="uk-navbar-nav uk-hidden-small">
		<li><a href="<?php echo site_url(); ?>">Beranda</a></li>

		<?php foreach ($parent_menu as $parent): ?>
			<li class="uk-parent" data-uk-dropdown="data-uk-dropdown">
				<a href=""><?php echo ucfirst($parent); ?></a>

				<div class="uk-dropdown uk-dropdown-navbar">
					<ul class="uk-nav uk-nav-navbar">
						<?php foreach ($panel_menu as $key => $item): ?>
							<?php if ($item['parent'] == $parent): ?>
								<li><a href="<?php echo $item['url']; ?>"><span class="<?php echo $item['icon']; ?>"></span> <?php echo ucfirst($item['label']); ?></a></li>
							<?php endif; ?>
						<?php endforeach; ?>
					</ul>
				</div>
			</li>
		<?php endforeach; ?>
	</ul>

	<a class="uk-navbar-toggle uk-visible-small" href="#navpanel" data-uk-offcanvas="data-uk-offcanvas"></a>

	<div class="uk-navbar-flip">
		<a class="uk-navbar-brand" href="<?php echo site_url(); ?>">
			<img class="uk-responsive-height" src="<?php echo base_url('asset/images/logo-dashboard-64.png'); ?>" alt="<?php echo ucfirst($site_name); ?>" title="<?php echo ucwords($site_name); ?>" />
		</a>
	</div>

	<div class="uk-offcanvas" id="navpanel">
		<div class="uk-offcanvas-bar">
			<ul class="uk-nav uk-nav-offcanvas" data-uk-nav="data-uk-nav">
				<?php foreach ($panel_menu as $key => $item): ?>
					<li><a href="<?php echo $item['url']; ?>"><span class="<?php echo $item['icon']; ?>"></span> <?php echo ucfirst($item['label']); ?></a></li>
				<?php endforeach; ?>
			</ul>
		</div>
	</div>
</nav>
