<?php include_once("head.php"); ?>

<body id="page-top">
  <div id="wrapper">

  <?php include_once("nav.php"); ?>

    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        
      <?php include_once("top-bar.php"); ?>

        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <?php echo (isset($content)) ? $content : ''; ?>
        </div>
        <!---Container Fluid-->
      </div>
      
      <?php include_once("foot.php"); ?>
</body>

</html>