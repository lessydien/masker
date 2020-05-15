<!-- <!DOCTYPE html>

<html>

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta http-equiv="cache-control" content="no-cache">

    <meta http-equiv="expires" content="0">

    <meta http-equiv="pragma" content="no-cache">

  <meta name="viewport" content="width=device-width, initial-scale=1">

  <meta name="description" content="">

  <meta name="author" content="">  

  <title>

		E-surat - Aplikasi Persuratan Kota Banda Aceh

	</title>

		

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />

	

	<link rel="stylesheet" href="<?php echo base_url('assets/modules/adminlte/css/'); ?>AdminLTE.min.css" />

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.3.11/css/skins/_all-skins.min.css" />	

	<style>

	.content-wrapper {

    min-height: 70% !important;	

	}

	

	</style>

	

	<meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>

	<meta name="viewport" content="width=device-width, initial-scale=1">

	

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

	<script type="text/javascript">

		var BASE_URL = '<?php echo base_url() ?>';

		var SITE_URL = '<?php echo site_url() ?>';

		$(document).ready(function(){

			$('[data-toggle="tooltip"]').tooltip();

		});

	</script>

	<script src="<?php echo base_url('assets/js/myloader.js'); ?>"></script>

	<script src="<?php echo base_url('assets/css/style.css'); ?>"></script>

	

</head> -->
<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<link rel="apple-touch-icon" sizes="180x180" href="<?= base_url("assets/img/logo/favicon/apple-touch-icon.png") ?>">
	<link rel="icon" type="image/png" sizes="32x32" href="<?= base_url("assets/img/logo/favicon/favicon-32x32.png") ?>">
	<link rel="icon" type="image/png" sizes="16x16" href="<?= base_url("assets/img/logo/favicon/favicon-16x16.png") ?> ">
	<link rel="manifest" href="<?= base_url("assets/img/logo/favicon/site.webmanifest") ?> ">
	<link rel="mask-icon" href="<?= base_url("assets/img/logo/favicon/safari-pinned-tab.svg") ?> " color="#5bbad5">
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="<?= base_url("assets/img/logo/favicon/ms-icon-144x144.png") ?> ">
	<meta name="theme-color" content="#ffffff">

	<title><?php echo $MYCFG['GENERAL']['APP_NAME']; ?></title>

	<?php echo (isset($css)) ? $css : ''; ?>

	<script src="<?php echo base_url('assets/modules/jquery/jquery.min.js'); ?>"></script>
	<link rel="stylesheet" href="<?php echo base_url('/assets/modules/datepicker/datepicker3.css'); ?>">

	<script type="text/javascript">
		var BASE_URL = '<?php echo base_url() ?>';
		var SITE_URL = '<?php echo site_url() ?>';

		$(document).ready(function() {
			$('[data-toggle="tooltip"]').tooltip();
		});
	</script>
</head>