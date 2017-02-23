<nav class="uk-navbar uk-navbar-attached">
	<ul class="uk-navbar-nav">
		<li><a href="<?php echo site_url(); ?>">Beranda</a></li>

		<?php foreach ($parent_menu as $parent): ?>
			<li class="uk-parent" data-uk-dropdown="data-uk-dropdown">
				<a href=""><?php echo ucfirst($parent); ?></a>

				<div class="uk-dropdown uk-dropdown-navbar">
					<ul class="uk-nav uk-nav-navbar">
						<?php foreach ($panel_menu as $key => $item): ?>
							<?php if ($item['parent'] == $parent): ?>
								<li><a href="<?php echo $item['url']; ?>"><?php echo ucfirst($item['label']); ?></a></li>
							<?php endif; ?>
						<?php endforeach; ?>
					</ul>
				</div>
			</li>
		<?php endforeach; ?>
	</ul>

	<div class="uk-navbar-flip">
		<a class="uk-navbar-brand" href="<?php echo site_url(); ?>">
			<img class="uk-responsive-height" src="<?php echo base_url('asset/images/logo-dashboard-64.png'); ?>" alt="<?php echo ucfirst($site_name); ?>" title="<?php echo ucwords($site_name); ?>" />
		</a>
	</div>
</nav>
