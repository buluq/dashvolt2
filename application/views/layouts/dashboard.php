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
