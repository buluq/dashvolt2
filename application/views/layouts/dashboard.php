<div class="uk-container uk-container-center uk-margin-top uk-margin-large-bottom">
	<div class="uk-grid">
		<div class="uk-width-small-1-1 uk-width-medium-4-5">
			<div id="iframe-container" class="uk-panel uk-panel-box uk-panel-box-primary">
				<iframe id="file_embed" src="<?php echo $file; ?>" frameborder="0"></iframe>

				<script type="text/javascript">
					var embededPage = document.querySelector("#file_embed");
					embededPage.style.display = "block";
					embededPage.style.width = "100%";
					embededPage.style.minHeight = "80vh";
				</script>
			</div>
		</div>

		<div class="uk-width-small-1-1 uk-width-medium-1-5">
			<?php echo $note; ?>
		</div>
	</div>
</div>
