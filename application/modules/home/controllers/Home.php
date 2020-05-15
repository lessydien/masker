<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Home extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_home');
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
        $this->data['js'] .= js_asset('demo/chart-pie-demo.js', '');
        $this->data['js'] .= js_asset('bootstrap-datepicker.js', 'datepicker');


        $this->data['content'] = $this->load->view('home', $this->data, true);
        $this->display($this->data);
    }

    public function search_nik($nik=null)
    {
        $data = $this->db->select('jml_pelanggaran')
                        ->where('nik', $nik)
                        ->get('pelanggar')
                        ->row();

        if (empty($nik) || strlen($nik) != 16 || preg_match('/[^0-9]/', $nik)) {
            $result['resp'] = FALSE;
            $result['msg']  = 'Mohon masukkan NIK dengan benar (16 digit)';
        } elseif (! empty($data)) {
            $result['resp'] = TRUE;
            $result['msg']  = 'Anda Sudah Melanggar '.$data->jml_pelanggaran.' Kali';
        } else {
            $result['resp'] = TRUE;
            $result['msg']  = 'Anda Belum Pernah Melanggar';
        }

        header('Content-Type: application/json');
        echo json_encode($result);
    }
}
