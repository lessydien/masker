<header class="jumbotron bg-primary text-white" style="border-radius: unset;">
  <div class="container text-center">
    <h1>Data Pemantauan Pelanggaran Masker</h1>
    <p class="lead">tertib menggunakan masker Kota Banda Aceh </p>
    <div class="row mt-5">
      <div class="col-md-10">
        <div class="form-group">
          <input type="text" class="form-control form-control-lg" id="nik" placeholder="Cari dengan NIK">
        </div>
      </div>
      <div class="col-md-2">
        <button type="button" class="btn btn-success btn-lg btn-block" data-toggle="modal" data-target="#exampleModal" id="btn-search-nik">Search</button>

      </div>
    </div>
  </div>
</header>
<div class="container">
  <div class="row">
    <div class="col-xl-12 col-lg-12">
      <div class="card mb-4">
        <div class="card-header">
          Pilih Periode
        </div>
        <div class="card-body">

          <div class="row">
            <div class="col-md-5">
              <div class="input-group">
                <div class="input-group-append">
                  <button class="btn btn-primary" type="button">
                    <i class="fas fa-calendar"></i>
                  </button>
                </div>
                <input type="text" class="form-control bg-light small" id="datepicker" placeholder="Tanggal awal.." aria-label="Search" aria-describedby="basic-addon2">
              </div>
            </div>
            <div class="col-md-5">
              <div class="input-group">
                <div class="input-group-append">
                  <button class="btn btn-primary" type="button">
                    <i class="fas fa-calendar"></i>
                  </button>
                </div>
                <input type="text" class="form-control bg-light small" id="datepicker2" placeholder="Tanggal akhir.." aria-label="Search" aria-describedby="basic-addon2">
              </div>
            </div>

            <div class="col-md-2">
              <a href="#" class="btn btn-primary btn-block">
                <span class="icon text-white">
                  <i class="fas fa-search"></i>
                </span>
              </a>
            </div>
          </div>
          <br>
          <div class="row">
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1">Total Pelanggaran</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">3 Orang</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-users fa-2x text-info"></i>
                    </div>

                  </div>
                  <div class="mt-2 mb-0 text-muted text-xs">
                    <span>Since last month</span>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1">Pelanggaran 1 Kali</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">3 Orang</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-users fa-2x text-info"></i>
                    </div>

                  </div>
                  <div class="mt-2 mb-0 text-muted text-xs">
                    <span>Since last month</span>
                  </div>
                </div>
              </div>
            </div>
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1">Pelanggaran 2 Kali</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">3 Orang</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-users fa-2x text-info"></i>
                    </div>

                  </div>
                  <div class="mt-2 mb-0 text-muted text-xs">
                    <span>Since last month</span>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1">Pelanggaran 3 Kali</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">3 Orang</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-users fa-2x text-info"></i>
                    </div>

                  </div>
                  <div class="mt-2 mb-0 text-muted text-xs">
                    <span>Since last month</span>
                  </div>
                </div>
              </div>
            </div>


            <!-- Area Chart -->
            <div class="col-xl-12 col-lg-12">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Monthly Recap Report</h6>
                  <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                      <div class="dropdown-header">Dropdown Header:</div>
                      <a class="dropdown-item" href="#">Action</a>
                      <a class="dropdown-item" href="#">Another action</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <div class="chart-area">
                    <canvas id="myAreaChart"></canvas>
                  </div>
                </div>
              </div>
            </div>


          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row ">





    <!-- Perwal -->
    <div class="col-xl-12 col-lg-12">
      <div class="card mb-4">
        <div class="card-header pt-3 d-flex flex-row align-items-center text-xs font-weight-bold">
          <h6 class="m-0 font-weight-bold text-primary">Perwal no. xx Tahun 2020</h6>
        </div>
        <div class="card-body">
          <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla commodo elementum nisl quis cursus. Aenean sagittis sem in sagittis condimentum. Nam ut ligula quis erat laoreet condimentum non sed erat. Maecenas hendrerit, nibh sit amet mattis dignissim, diam tortor lacinia velit, ac tincidunt ligula nisi vitae massa. Sed cursus est eget commodo consectetur. Mauris ut venenatis lorem. Donec volutpat ullamcorper finibus. Vestibulum in magna facilisis, dapibus ex tristique, semper diam. In hac habitasse platea dictumst.

            Mauris malesuada risus vel nulla cursus pharetra. Vivamus euismod massa vel libero iaculis, sed consequat sapien tempus. Phasellus ut auctor mi. Etiam pulvinar dolor ac enim tincidunt ultrices. Sed ullamcorper, nulla nec commodo cursus, neque odio suscipit lorem, et placerat quam eros ut nisl. Sed in commodo libero. Nullam nec elementum nibh, ut consequat leo. Sed egestas tortor eu magna pellentesque sagittis eget in dui. Cras tincidunt vel enim id rutrum. Mauris tellus dolor, rutrum nec sapien sed, malesuada pulvinar velit. Vestibulum fermentum eros in nibh egestas, vel bibendum turpis bibendum. Nulla laoreet est et maximus porttitor. Quisque euismod at orci et lobortis. Integer condimentum massa vestibulum libero dictum, quis maximus elit dictum. Vestibulum pulvinar varius arcu a tempor. Cras imperdiet, erat sit amet molestie vulputate, diam ante feugiat turpis, non vestibulum dolor tellus nec urna.

            Aliquam faucibus ligula non est auctor, sit amet suscipit ligula mollis. Donec pellentesque mattis est a finibus. Morbi non tincidunt metus. Etiam aliquam maximus semper. Vestibulum pretium elementum tincidunt. Donec quis mi sit amet dolor laoreet ultricies sed nec tellus. Vestibulum suscipit vulputate sem quis tempor. Nulla placerat elit eget ipsum blandit, id porta urna congue. Donec tempus eros eget mauris luctus pharetra.

            Vestibulum euismod ornare nunc eget imperdiet. Nullam tempus rhoncus urna. Curabitur vitae ipsum rhoncus, ultrices diam nec, aliquam ipsum. Sed eu interdum nunc, in condimentum purus. Donec sit amet ullamcorper orci, non hendrerit erat. Aenean at libero leo. Sed cursus tortor quis ante feugiat, eu mollis eros mollis. Mauris ac sagittis tellus. Nunc sed efficitur dui.

            Vivamus faucibus suscipit congue. Nullam hendrerit fringilla pulvinar. Ut vitae est vitae sapien auctor aliquet. Etiam sagittis, mauris non gravida laoreet, ipsum metus fermentum nibh, at malesuada neque risus eu nisl. Vestibulum lacinia velit sit amet metus gravida scelerisque. Maecenas ultrices consequat scelerisque. Integer id finibus nibh. Vestibulum tempor velit quis diam vehicula, quis efficitur lectus fringilla.
          </p>
        </div>
      </div>
    </div>

  </div>



  <!-- Modal -->
  <div class="modal fade" id="modal-search-nik" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="title"></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body" id="jlh-pelanggaran">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  <script>
    $(document).ready(function(){

      $('#btn-search-nik').click(function(e){
        let nik = $('#nik').val();
        let url = SITE_URL + 'home/search_nik/' + nik;

        $.ajax({
          type: 'GET',
          url: url,
          dataType: 'json',
          success: function(data){
            if (!data.resp)
              $('#nik').addClass('is-invalid');

            $('#title').html(nik);
            $('#jlh-pelanggaran').html(data.msg);
            $('#modal-search-nik').modal('show');
          }
        });

        e.preventDefault();
      });

    })
  </script>