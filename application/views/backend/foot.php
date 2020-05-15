<!-- Footer -->
<footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-2">
		  	<b><?php echo $MYCFG['GENERAL']['APP_NAME'];?></b> <?php echo $MYCFG['GENERAL']['VERSION'];?><br>
		  </div>
		  <div class="copyright text-center my-auto">
            <span>copyright &copy; <script> document.write(new Date().getFullYear()); </script> - developed by
              <b><a href="<?php echo $MYCFG['OFFICE']['URL'];?>" target="_blank"><?php echo $MYCFG['OFFICE']['NAME'].' '.$MYCFG['OFFICE']['CITY'];?></a></b>
            </span>
          </div>
        </div>
      </footer>
      <!-- Footer -->
    </div>
  </div>

  <!-- Scroll to top -->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <?php echo (isset($js)) ? $js : '';?>
