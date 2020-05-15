<!-- <div class="login-box">
  <div class="login-logo">
    <a href="<?php echo site_url();?>"><h3><font color="white"><b>E-Surat v2.0</b></font></h3></a>
  </div>
  <div class="login-box-body">
    <p class="login-box-msg">Silahkan Login</p>
    <form name="flogin" id="flogin" action="<?php echo site_url('acl/login/');?>" method="POST">
      <div class="form-group has-feedback">
        <input class="form-control" placeholder="Username" type="text" name="user_name" id="user_name" tabindex="1" />
        <span class="fa fa-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input class="form-control" placeholder="Password" type="password" name="user_password" id="user_password" tabindex="2" />
        <span class="fa fa-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">

				
        </div>
        <div class="col-xs-4">
        	
          <button type="submit" class="btn btn-success btn-block btn-flat" tabindex="3">
						<i class="fa fa-power-off"></i>&nbsp;Login
					</button>
        </div>
      </div>
    </form>
  </div>
</div> -->
<body class="bg-gradient-login">
  <!-- Login Content -->
  <div class="container-login">
    <div class="row justify-content-center">
      <div class="col-xl-10 col-lg-12 col-md-9">
        <div class="card shadow-sm my-5">
          <div class="card-body p-0">
            <div class="row">
              <div class="col-lg-12">
                <div class="login-form">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Login</h1>
                  </div>
                  <form class="user" name="flogin" id="flogin" action="<?php echo site_url('acl/login/');?>" method="POST">
                    <div class="form-group">
                      <input  class="form-control" placeholder="Username" type="text" name="user_name" id="user_name">
                    </div>
                    <div class="form-group">
                      <input class="form-control" placeholder="Password" type="password" name="user_password" id="user_password">
                    </div>
                    <div class="form-group">
                      <button class="btn btn-primary btn-block" type="submit">Login</button>
                    </div>
                    <hr>
                  </form>
                  <div class="text-center">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Login Content -->
  <?php echo (isset($js)) ? $js : '';?>
</body>

</html>
<script>
$(document).ready(function(){
	$('#flogin').submit(function(e){
		var form_data = $(this).serialize();

		console.log(form_data);
    $.ajax({
			type: "POST",
			url: SITE_URL+'/acl/login/json_login/',
			data: form_data, 
			dataType :'JSON',
			success: function(data) {
				if(data.result){
					window.location.replace(SITE_URL+"dashboard/");
				}else{
					alert(data.msg); 
				}
			}
		});
		
		
		e.preventDefault();
	});
})
</script>