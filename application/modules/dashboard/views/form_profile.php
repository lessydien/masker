<section class="content">

	<div id="alert-msg"></div>

	<div class="row">

		<div class="col-md-12">

		<div class="box box-info">

	<div class="box-header bg-blue">

		<h3 class="box-title">

			<i class="fa fa-user-circle-o"></i>&nbsp;Edit My Profiles

		</h3>

		<span class="pull-right">

			<span class="badge bg-black"><i class="fa fa-university"></i>&nbsp;<?php echo $this->session->userdata['user_org_name'];?></span>

			<span class="badge bg-black"><i class="fa fa-tags"></i>&nbsp;<?php echo $this->session->userdata['user_group_name'];?></span>

		</span>

	</div>

	<form role="form" id="frm-profile" name="frm-profile">

		<div class="box-body">

			<input type="hidden" name="profile_id" id="profile_id" value="<?php echo $this->ion_auth->user()->row()->user_id;?>" />

			<div class="row">

				<div class="col-md-6">

					<div class="form-group">

						<label>Nip</label>

						<input type="text" id="profile_username" name="profile_username" class="form-control" value="<?php echo $this->ion_auth->user()->row()->username;?>" disabled>

					</div>

					<div class="form-group">

						<label>Jabatan</label>

						<input type="text"  name="profile_first_name" id="profile_first_name" class="form-control" value="<?php echo $this->session->userdata['user_group_name'];?>" disabled>

					</div>


					<div class="form-group">

						<label>Nama Pegawai</label>

						<input type="text"  name="profile_first_name" id="profile_first_name" class="form-control" value="<?php echo $this->ion_auth->user()->row()->first_name;?>">

					</div>


					

				</div>

				<div class="col-md-6">

					<div class="form-group">

						<label>

							<input type="checkbox" name="profile_rst_pass" id="profile_rst_pass"> Ganti Password

						</label>				

						<input type="password" name="profile_password" id="profile_password" class="form-control" placeholder="Masukkan password baru" disabled>

					</div>

					<div class="form-group">

						<label>Konfirmasi Password</label>

						<input type="password" name="profile_confirmation_password" id="profile_confirmation_password" class="form-control" placeholder="Konfirmasi password baru" disabled>

					</div>

					<div class="form-group">

						<label>Email Address</label>

						<input type="email" name="profile_email" id="profile_email" value="<?php echo $this->ion_auth->user()->row()->email;?>" class="form-control">

					</div>

					<!-- <div class="form-group">

						<label>Phone Number</label>

						<input type="text" name="profile_phone" id="profile_phone" value="<?php echo $this->ion_auth->user()->row()->phone;?>" class="form-control">

					</div> -->

					

				</div>

			</div>

			

		</div>

		<div class="box-footer bg-gray">

			<button class="btn btn-primary btn-md pull-right" type="submit"><i class="fa fa-floppy-o"></i>&nbsp;Simpan</button>

		</div>

  </form>

</div>

		</div>

	</div>

</section>











<script>

	$(document).ready(function(){

		$('#ajax_img').hide();

		$(document).ajaxStart(function() {

			$('#ajax_img').show();

		});

		$(document).ajaxStop(function() {

			$('#ajax_img').hide();

		});

		

		$("#profile_rst_pass").change(function() {

			$("#profile_password").prop("disabled", !$(this).is(":checked"));
			$("#profile_confirmation_password").prop("disabled", !$(this).is(":checked"));

		});

		

		$('#frm-profile').submit(function(e){

			var form_data=$("#frm-profile").serialize();

			console.log(form_data);

			

			$.ajax({

					type: "POST",

					url: SITE_URL+"/dashboard/change_profile/",

					dataType: "json",

					data: form_data,

					success: function(data){

						if(data.resp){

							alert("Selamat,\n\r"+data.message);

							location.reload(); 

						}else{

							// alert("Ada kesalahan.\n\r"+data.message);

							$('#alert-msg').html('<div class="alert alert-danger disabled alert-dismissible">'+

								'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>'+

								'<h4><i class="icon fa fa-ban"></i> Ada Kesalahan!</h4>' + data.message +

							'</div');

						}

					}

			});

			

			e.preventDefault();

		});

		

	});

	

</script>