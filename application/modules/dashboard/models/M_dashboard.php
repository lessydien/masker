<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_dashboard extends CI_Model {
	
	function __construct(){
		parent::__construct();
		
    }

    function graph_surat()
    {
        $id_instansi = $this->session->userdata('user_org');

        for ($i=0; $i<12; $i++) {
            $month = $i+1;
            $sql_masuk = "SELECT COALESCE(COUNT(id),0) as jumlah FROM d_surat_masuk
                WHERE undangan='n' AND YEAR(tgl_terima)=".date('Y')." AND MONTH(tgl_terima)=".$month." AND instansi_tujuan=".$id_instansi;

            $sql_keluar = "SELECT COALESCE(COUNT(id),0) as jumlah FROM d_surat_keluar
                WHERE undangan='n' AND flag='terkirim' AND YEAR(tgl_kirim)=".date('Y')." AND MONTH(tgl_kirim)=".$month." AND instansi_pengirim=".$id_instansi;

            $result[$i]['month']  = date('M', mktime(0,0,0,($month), 1, date('Y')));
            $result[$i]['masuk']  = $this->db->query($sql_masuk)->row()->jumlah;
            $result[$i]['keluar']  = $this->db->query($sql_keluar)->row()->jumlah;
        }

        return $result;

    }

    function graph_undangan()
    {
        $id_instansi = $this->session->userdata('user_org');

        for ($i=0; $i<12; $i++) {
            $month = $i+1;
            $sql_masuk = "SELECT COALESCE(COUNT(id),0) as jumlah FROM d_surat_masuk
                WHERE undangan='y' AND YEAR(tgl_terima)=".date('Y')." AND MONTH(tgl_terima)=".$month." AND instansi_tujuan=".$id_instansi;

            $sql_keluar = "SELECT COALESCE(COUNT(id),0) as jumlah FROM d_surat_keluar
                WHERE undangan='y' AND flag='terkirim' AND YEAR(tgl_kirim)=".date('Y')." AND MONTH(tgl_kirim)=".$month." AND instansi_pengirim=".$id_instansi;

            $result[$i]['month']  = date('M', mktime(0,0,0,($month), 1, date('Y')));
            $result[$i]['masuk']  = $this->db->query($sql_masuk)->row()->jumlah;
            $result[$i]['keluar']  = $this->db->query($sql_keluar)->row()->jumlah;
        }

        return $result;
    }
    
}