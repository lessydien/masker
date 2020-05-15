<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MY_Controller {
	
	function __construct(){
		parent::__construct();
		$this->data['tpl']='login';

		$this->data['css'] = css_asset('style.min.css', '');
        $this->data['css'] .= css_asset('all.min.css', 'fontawesome-free');
        $this->data['css'] .= css_asset('bootstrap.min.css', 'bootstrap');

        $this->data['js'] = js_asset('bootstrap.bundle.min.js', 'bootstrap');
		$this->data['js'] .= js_asset('jquery.easing.min.js', 'jquery-easing');
		$this->data['js'] .= js_asset('script.min.js', '');
	}
	
	function index() {
		if(!$this->ion_auth->logged_in()){
			$this->data['content']=$this->load->view('form_login', $this->data ,true);
			$this->display();
		}else{
			redirect(site_url('/dashboard/'));
		}
	}
	
	function json_login($is_return=false){
		$res = array();
		if($this->ion_auth->logged_in()){
			$res=array('result'=>true);
		}else{
			if((isset($_POST['user_name'])) && (isset($_POST['user_password']))){
				$ok = $this->ion_auth->login($_POST['user_name'], $_POST['user_password']);
				if($ok){
					$res=array('result'=>true,'msg'=>"Login Berhasil.\r\nSilahkan mengelola aplikasi ini melalui menu Dashboard.");
				}else{
					$res=array(
						'result'=>false,
						'msg'=>"Login Gagal.\r\nUsername/Password Salah.\n\rSilahkan ulangi lagi."
						);
				}
			}else{			
				$res=array(
					'result'=>false,
					'msg'=>"Login Gagal.\r\nUsername/Password belum terisi.\n\rSilahkan ulangi lagi."
				);
			}
		}
		if($is_return){
			return json_encode($res);
		}else{
			echo json_encode($res);		
		}
	}
	
	function logout(){
		
		if($this->ion_auth->logged_in())
		{
			$this->ion_auth->logout();
			// $this->ion_auth->logout();
			// $this->session->sess_destroy();
		}
		redirect(site_url("login"), 'refresh');
	}
	
	
}