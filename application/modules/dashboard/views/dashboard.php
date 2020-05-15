<div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
            </ol>
          </div>

          <div class="row mb-3">
           <?php include_once("stat_pelanggar.php"); ?>
           <?php include_once("cek_pelanggar.php"); ?>
           <?php include_once("chart_pelanggar.php"); ?>
          </div>
          <!--Row-->