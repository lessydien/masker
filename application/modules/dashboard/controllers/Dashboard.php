<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Dashboard extends MY_Admin
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_dashboard');
        $this->data['tpl'] = 'single';
    }
    function index()
    {
        $this->data['css'] = css_asset('style.min.css', '');
        $this->data['css'] .= css_asset('all.min.css', 'fontawesome-free');
        $this->data['css'] .= css_asset('bootstrap.min.css', 'bootstrap');

        $this->data['js'] = js_asset('bootstrap.bundle.min.js', 'bootstrap');
		$this->data['js'] .= js_asset('jquery.easing.min.js', 'jquery-easing');
		$this->data['js'] .= js_asset('script.min.js', '');
		$this->data['js'] .= js_asset('Chart.min.js', 'chart.js');
		$this->data['js'] .= js_asset('demo/chart-area-demo.js', '');
		
        // $id_instansi = $this->session->userdata('user_org');
        // $this->data['chart_surat'] = $this->M_dashboard->graph_surat();
        // $this->data['chart_undangan'] = $this->M_dashboard->graph_undangan();

		$this->data['content'] = $this->load->view('dashboard', $this->data, true);
        $this->display($this->data);
    }
    
    function profile()
    {
        $meta                    = $this->meta('dashboard/profile/', TRUE);
        $this->data['auth_meta'] = $meta['act'];
        $this->data['icon']      = $meta['icon'];
        $this->data['title']     = $meta['title'];
        $this->data['content']   = $this->load->view('form_profile', $this->data, TRUE);
        $this->display();
    }

    function notifikasi(){
        header('Content-Type: application/json');
		$data = array();
		$id_jabatan = $this->__my_jabatan();

		$query = $this->db->select("count(id_sm) as total")
						  ->join("d_surat_masuk as sm", "status_sm.id_sm=sm.id")
						  ->where("status_sm.flag", "belum dibaca")
						  ->where("sm.undangan", "n")
						  ->where("id_jabatan", $id_jabatan)
						  ->get("status_sm");

		$sm = $query->row();
		$data['sm'] = $sm->total;

		$query = $this->db->select("count(id_sm) as total")
						  ->join("d_surat_masuk as sm", "status_sm.id_sm=sm.id")
						  ->where("status_sm.flag", "belum dibaca")
						  ->where("sm.undangan", "y")
						  ->where("id_jabatan", $id_jabatan)
						  ->get("status_sm");
		$um = $query->row();
		$data['um'] = $um->total;

		$query = $this->db->select("count(id) as total")
						  ->where("flag", "belum dibaca")
						  ->where("teruskan", "n")
						  ->where("tujuan", $id_jabatan)
						  ->get("disposisi");

		$disposisi = $query->row();
		$data['disposisi'] = $disposisi->total;

		$query = "SELECT COUNT(a1.id) as total FROM
                    (SELECT sv.id FROM status_verifikasi as sv
                    JOIN d_surat_keluar as sk ON sk.id = sv.id_surat_keluar
                    WHERE sk.undangan='n' AND sv.status='draft' AND id_jabatan=".$id_jabatan.") a1";

		$sk =  $this->db->query($query)->row();
		$data['sk'] = $sk->total;
		

		$query = "SELECT COUNT(a1.id) as total FROM
                    (SELECT sv.id FROM status_verifikasi as sv
                    JOIN d_surat_keluar as sk ON sk.id = sv.id_surat_keluar
                    WHERE sk.undangan='y' AND sv.status='draft' AND id_jabatan=".$id_jabatan.") a1";

		$uk = $this->db->query($query)->row();
		$data['uk'] = $uk->total;

		$query = $this->db->select("count(id) as total")
						->where("entry_on >", time()-(2*86400))
						->where("id_pembuat", $id_jabatan)
						->get("notif_tolak");

		$tolak = $query->row();
		$data['tolak'] = $tolak->total;
        $data['ls_tolak'] = $this->db->select('notif_tolak.*, jabatan.nama_jabatan as jabatan_penolak')
                                    ->join("jabatan", "jabatan.id=notif_tolak.id_penolak")
                                    ->order_by('entry_on', 'desc')
                                    ->get_where('notif_tolak', array('id_pembuat'=>$id_jabatan,'entry_on >'=>time()-(2*2592000)))
                                    ->result();

		echo json_encode($data);

	}

    function change_profile()
    {
        $result = array(
            'resp' => false,
            'message' => 'Ada yang salah pada saat mengedit profil anda.'
        );
        if (isset($_POST['profile_id'])) {
            $id_user = $_POST['profile_id'];
            //ion auth edit user
            $data    = array(
                'first_name' => $_POST['profile_first_name'],
                // 'last_name' => $_POST['profile_last_name'],
                'email' => $_POST['profile_email']
                // 'phone' => $_POST['profile_phone']
            );
            //ion auth edit password user
            if (isset($_POST['profile_rst_pass'])) {
                $this->load->library('form_validation');
                $this->form_validation->set_rules('profile_password', 'Password', 'trim|required|min_length[6]|max_length[50]');
                $this->form_validation->set_rules('profile_confirmation_password', 'Konfirmasi Password', 'trim|required|matches[profile_password]');
                if ($this->form_validation->run() == FALSE) {
                    $msg_passwd = "\n\r" . validation_errors();
                    $res        = false;
                } else {
                    $data['password'] = $_POST['profile_password'];
                    $msg_passwd       = "Ganti Password berhasil.\n\rSilahkan logout untuk menguji data anda.";
                    $res              = $this->ion_auth->update($id_user, $data);
                }
            } else {
                $msg_passwd = '';
                $res        = $this->ion_auth->update($id_user, $data);
            }
            if ($res) {
                $result = array(
                    'resp' => TRUE,
                    'message' => "Edit profil berhasil.\n\r" . $msg_passwd
                );
            } else {
                $result = array(
                    'resp' => FALSE,
                    'message' => "<p>Edit profil gagal. Silahkan ulangi" . $msg_passwd
                );
            }
        } else {
            $result = array(
                'resp' => false,
                'message' => "Ada yang salah pada saat mengedit profil anda."
            );
        }
        echo json_encode($result);
    }

} 