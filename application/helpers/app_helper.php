<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');



function xdebug($var) {

    echo '<pre>' . print_r($var, 1) . '</pre>';

}



function the_user($id) {

    $ci =& get_instance();

    $ci->load->library('ion_auth');

    $r = $ci->ion_auth->user($id);

    return $r->row()->first_name.' '.$r->row()->last_name;

}



function the_username($id) {

    $ci =& get_instance();

    $ci->load->library('ion_auth');

    $r = $ci->ion_auth->user($id);

    return $r->row()->username;

}





function hide_phone($phone) {

    return substr($phone, 0, -4) . "****";

}



function the_user_phone($id,$is_hide=TRUE) {

    $ci =& get_instance();

    $ci->load->library('ion_auth');

    $r = $ci->ion_auth->user($id);

		if($is_hide){

			return '<a href="mailto:'.$r->row()->email.'">'.hide_phone($r->row()->phone).'</a>';

		}else{

			return '<a href="mailto:'.$r->row()->email.'">'.$r->row()->phone.'</a>';

		}

}



function the_user_email($id) {

    $ci =& get_instance();

    $ci->load->library('ion_auth');

    $r = $ci->ion_auth->user($id);

    return $r->row()->email;

}



function the_user_org_name($id){

    $ci =& get_instance();

		$ci->db->select('*');

		$ci->db->from('users_orgs');

		$ci->db->join('orgs', 'orgs.id = users_orgs.org_id');

		$ci->db->where('users_orgs.user_id',$id);

		$row = $ci->db->get()->result_array();

		return isset($row[0]['name']) ? $row[0]['name'] : '-';		

}



function the_user_group_name($id){

    $ci =& get_instance();

		$ci->db->select('*');

		$ci->db->from('users_groups');

		$ci->db->join('groups', 'groups.id = users_groups.group_id');

		$ci->db->where('users_groups.user_id',$id);

		$row = $ci->db->get()->result_array();

		return isset($row[0]['name']) ? $row[0]['name'] : '-';

}


function partition(Array $list, $p) {

    $listlen = count($list);

    $partlen = floor($listlen / $p);

    $partrem = $listlen % $p;

    $partition = array();

    $mark = 0;

    for($px = 0; $px < $p; $px ++) {

        $incr = ($px < $partrem) ? $partlen + 1 : $partlen;

        $partition[$px] = array_slice($list, $mark, $incr);

        $mark += $incr;

    }

    return $partition;

}

function humanTiming ($time) {

    $time = time() - $time; // to get the time since that moment
    $time = ($time<1)? 1 : $time;
    $tokens = array (
        31536000 => 'tahun',
        2592000 => 'bulan',
        604800 => 'minggu',
        86400 => 'hari',
        3600 => 'jam',
        60 => 'menit',
        1 => 'detik'
    );

    foreach ($tokens as $unit => $text) {
        if ($time < $unit) continue;
        $numberOfUnits = floor($time / $unit);
        return $numberOfUnits.' '.$text;
    }
}