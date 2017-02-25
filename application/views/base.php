<!doctype html>
<html class="uk-height-1-1">
	<head>
		<meta charset="utf-8" />
		<meta http-equiv="x-ua-compatible" content="ie=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<title><?php echo ucwords($site_name); ?></title>
		<link rel="shortcut icon" type="image/png" href="<?php echo base_url('asset/images/logo-dashboard-64.png'); ?>" />
		<link rel="apple-touch-icon" href="<?php echo base_url('asset/images/logo-dashboard-64.png'); ?>" />
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/uikit/2.27.2/css/uikit.almost-flat.min.css" />
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Ubuntu" />
		<style>
			html {
				font-family: 'Ubuntu', sans-serif;
			}
		</style>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/2.27.2/js/uikit.min.js"></script>
	</head>

	<body class="uk-height-1-1">
		<!--[if lt IE 8]>
			<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
		<![endif]-->

		<?php echo $page_navbar; ?>

		<?php echo $page_layout; ?>
	</body>
</html>
