

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

  <title><?php echo $MYCFG['GENERAL']['APP_NAME'];?> - <?php echo $MYCFG['GENERAL']['APP_NAME_LONG'];?></title>

  <?php echo (isset($css)) ? $css : '';?>

  <script src="<?php echo base_url('assets/modules/jquery/jquery.min.js');?>"></script>
  <script type="text/javascript">

		var BASE_URL = '<?php echo base_url()?>';
		var SITE_URL = '<?php echo site_url()?>';

		$(document).ready(function(){
			$('[data-toggle="tooltip"]').tooltip();

			$('.nav-item').each(function(e){
			var current_loc = window.location.href;
			var current_pmenu = $(this);

			var ch = $(this).find('a').attr('href');
			if(current_loc==ch){
				current_pmenu.addClass('active');
			}

			$(this).find('li').each(function(li_item){

				var current_cmenu = $(this);
				var ch = $(this).find('a').attr('href');

				if(current_loc==ch){
					current_pmenu.addClass('active');
					current_cmenu.addClass('active');
				}

			});

			});
		});


	</script>

</head>

