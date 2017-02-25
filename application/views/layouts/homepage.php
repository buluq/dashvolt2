<div class="uk-container uk-container-center uk-margin-top uk-margin-large-bottom">
	<div class="uk-grid">
		<h1 class="uk-align-center"><?php echo ucwords($site_name); ?></h1>
	</div>

	<ul class="uk-grid uk-grid-width-small-1-1 uk-grid-width-medium-1-3 uk-grid-match" data-uk-grid-margin="data-uk-grid-margin" data-uk-grid-match="{target:'.uk-panel'}">
		<?php foreach ($panel_menu as $key => $item): ?>
			<?php if ($item['panel'] == 'active'): ?>
				<li>
					<div class="uk-panel uk-panel-hover uk-panel-space">
						<h3 class="uk-panel-title"><span class="<?php echo $item['icon']; ?>"></span> <?php echo strtoupper($item['label']); ?></h3>

						<a class="uk-button uk-button-primary uk-width-1-1" href="<?php echo $item['url']; ?>"><?php echo ucfirst($item['action'] . ' ' . $item['label']); ?></a>
					</div>
				</li>
			<?php endif; ?>
		<?php endforeach; ?>
	</div>
</div>
