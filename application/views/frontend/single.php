<?php include_once('head.php'); ?>

<!-- <body class="skin-blue sidebar-mini wysihtml5-supported">

	<div class="wrapper">

		<?php //include_once('nav.php');
    ?>

		<div class="content-wrapper" style="min-height: 916px;">

			<? php // echo (isset($content)) ? $content : '';
      ?>

		</div>

	<?php //include_once('foot.php');
  ?>

	</div>

</div>

</html> -->

<body id="page-top">
  <div id="wrapper">

    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">

        <?php include_once('top-bar.php'); ?>



        <?php echo (isset($content)) ? $content : ''; ?>


      </div>

      <?php include_once('foot.php'); ?>
</body>

</html>