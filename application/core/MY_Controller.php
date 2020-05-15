<?php if (!defined('BASEPATH')) exit('No direct script access allowed');



class MY_Controller extends MX_Controller {

	var $data;

	var $CI;

	var $MYCFG;

	

  function __construct(){

		parent::__construct();

		$this->__set_timezone();

		

		$this->CI=get_instance();

		$query = $this->CI->db->get('m_config');

		foreach($query->result_array() as $k=>$v){

			$this->MYCFG[$v['config_group']][$v['config_var']] = $v['config_val'];

		}

		$this->data['MYCFG']=$this->MYCFG;



		$this->data['tpl']='single';

		$this->data['content']='';

	}



	public function __set_timezone() {

        date_default_timezone_set("Asia/Jakarta");

    }



	function __current_session_user(){

		if ($this->ion_auth->logged_in()){			

			$this->session->userdata['phone'] = $this->ion_auth->user()->row()->phone;

			$group = $this->__get_group_user($this->ion_auth->user()->row()->user_id);

			$this->group_user=$group[0];

			$this->session->userdata['user_group']=$group[0]['group_id'];

			$this->session->userdata['user_group_name']=$group[0]['name'];



			$this->session->userdata['user_data'] = $this->ion_auth->user()->row();

		}		

	}

	

	function display(){

		if($this->data['tpl']=='single'){

			$tpl='frontend/single';

		}else{

			$tpl='frontend/'.$this->data['tpl'];

		}

		$this->load->view($tpl,$this->data);

	}

	

	function __get_instansi_user($user_id=''){

		$CI =& get_instance();

		$CI->db->select('instansi.*');

		$CI->db->join('jabatan', 'jabatan.id = user_jabatan.id_jabatan');

		$CI->db->join('instansi', 'instansi.id = jabatan.id_instansi');

		$CI->db->where ('user_jabatan.closed_on IS NULL', null, false);

		$q = $CI->db->get_where('user_jabatan', array('id_user'=>$user_id));

		return $q->result_array();

	}



	function __get_group_user($user_id=''){

		$CI =& get_instance();

		$CI->db->join('groups', 'groups.id = users_groups.group_id');

		$q = $CI->db->get_where('users_groups',array('user_id'=>$user_id));

		return $q->result_array();

	}

	

}



class MY_Admin extends MY_Controller {

	var $data;

	

	function __construct(){

		parent::__construct();

		if (!$this->ion_auth->logged_in()) redirect('/acl/login/logout');

		$this->__current_session_user();

		// $this->data['notifikasi']=$this->__notifikasi();

	}

	

	function display(){

		$this->data['menus']=$this->__menu();
		//print_r($this->data['menus']);die;

		if($this->data['tpl']=='dashboard'){

			$tpl='backend/dashboard';

		}elseif($this->data['tpl']=='single'){

			$tpl='backend/single';

		}else{

			$tpl='backend/'.$this->data['tpl'];

		}

		$this->load->view($tpl,$this->data);

	}



	function __my_jabatan(){

        $id_user = $this->ion_auth->user()->row()->user_id;

        $jabatan = $this->db->select('j.*')

               ->join('user_jabatan as uj', 'u.id=uj.id_user', 'left')

               ->join('jabatan as j', 'j.id=uj.id_jabatan', 'left')

               ->where('u.id', $id_user)

               ->where('uj.closed_on is NULL', null, false)

               ->get('users as u')->row();



        return $jabatan->id;

    }



	function __notifikasi(){
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
		$data['ls_tolak'] = $this->db->order_by('entry_on', 'desc')->get_where('notif_tolak', array('id_pembuat'=>$id_jabatan,'entry_on >'=>time()-(2*2592000)))->result();

		return $data;

	}

	

	function __menu($user_group=0){

		//grab data from menus;

		

		$data=array();

		// get users groups :

		if($user_group) {

			$user_group_id=$user_group;

		}else{

			$user_group = $this->ion_auth->get_users_groups()->result();

			$user_group_id = $user_group[0]->id;

		}

		//print_r($user_group_id);die('inside __menu');

		$sql = 'select 

			gm.id,

			gm.group_id,

			gm.menu_id,

			m.path,

			m.name,

			m.icon,

			m.remark,

			gm.akses,

			gm.tambah,

			gm.ubah,

			gm.hapus

			from groups_menus gm , menus m 

			where

			m.id=gm.menu_id and 

			gm.group_id="'.$user_group_id.'" and m.parent_id=0 order by list_order asc;';

		$query = $this->db->query($sql);

		$res = $query->result_array();



		foreach($res as $k=>$v){

			$data[$k]['id']=$v['menu_id'];

			$data[$k]['text']=$v['name'];

			$data[$k]['iconCls']=$v['icon'];

			$data[$k]['url']=$v['path'];

			$data[$k]['remark']=$v['remark'];

			

			$child = $this->__child_menu($user_group_id,$v['menu_id']);

			if(count($child)>0){

				$mychild = array();

				foreach($child as $key=>$val){

					$mychild[$key]['id']=$val['id'];

					$mychild[$key]['text']=$val['name'];

					$mychild[$key]['iconCls']=$val['icon'];

					if(!substr_count($val['path'],'#')){

						$mychild[$key]['url']=$val['path'];

					}

					$mychild[$key]['remark']=$val['remark'];

					//grandchild

					//$grand = $this->__child_menu($this->guest_id,$val['id']);

					$grand = $this->__child_menu($user_group_id,$val['id']);

					if(count($grand)>0){

						$mygrandc=array();

						foreach($grand as $gkey=>$gval){

							$mygrandc[$gkey]['id']=$gval['id'];

							$mygrandc[$gkey]['text']=$gval['text'];

							$mygrandc[$gkey]['iconCls']=$gval['icon'];

							if(!substr_count($gval['path'],'#')){

								$mygrandc[$gkey]['url']=$gval['path'];

							}

							$mygrandc[$gkey]['remark']=$gval['remark'];						

						}

						$mychild[$key]['children']=$mygrandc;

					}

				}

				$data[$k]['children'] = $mychild;

			}

		}

		return $data;

	}

	

	function __child_menu($group_id,$parent_id){

		$array= array();

		$sql = '

			select 

				m.*

				from groups_menus gm , menus m 

				where

				m.flag="publish" and

				m.id=gm.menu_id and 

				gm.group_id="'.$group_id.'" and

				m.parent_id="'.$parent_id.'"  

			ORDER by m.list_order asc;';

		$query= $this->db->query($sql);

		$res = $query->result_array();

		return $res;

	}	

	

	function the_org_child_tree($org_id){

		$child = array();

		$ci =& get_instance();

		$query=$ci->db->query('select id from instansi where parent_id='.$org_id)->result_array();

		if(count($query)){

			foreach($query as $k=>$v){

				$child[]=$v['id'];

				// recursion!! hurrah

				$gchild = $this->the_org_child_tree($v['id']);

				// merge the grand children into the children array

				if( !empty($gchild) ) {

					$child = array_merge($child, $gchild);

				}

			}

			return $child;

		}else{

			return null;

		}

	}

	

	function meta($path_url='',$is_return=false){

		if (!$this->ion_auth->logged_in()) redirect('dashboard/logout');

		

		/*

		$fields = $this->db->field_data($table_name);



		foreach($fields as $k=>$v){

			$array['fields'][$k] = array('primary_key'=>$v->primary_key,'field'=> $v->name,'title'=>strtoupper($v->name),'type'=>$v->type);

		}

		*/

		//check roles groups

		//$user_group = $this->ion_auth->get_users_groups()->result();

		//$id_group_user = $user_group[0]->id;

		$id_group_user = $this->session->userdata['user_group'];

		//print_r($user_group);die;

		$sql = 'select 

gm.id,

gm.group_id,

gm.menu_id,

m.path,

m.name,

m.icon,

gm.akses,

gm.tambah,

gm.ubah,

gm.hapus

from groups_menus gm left join menus m on m.id=gm.menu_id

where

gm.group_id='.$id_group_user.' AND 

m.path ="'.$path_url.'";';

	//print_r($sql);die;

		$query = $this->db->query($sql);

		$hasil = $query->result_array();

		if($hasil){

			$array['icon']=$hasil[0]['icon'];

			$array['title']=$hasil[0]['name'];

			$array['act']['access']=($hasil[0]['akses']) ? 1 : 0;

			$array['act']['add']=($hasil[0]['tambah']) ? array('id'=>'btn-add','text'=>'Add','iconCls'=>'mycls-doc-add','action'=>'add;') : 0;

			$array['act']['edit']=($hasil[0]['ubah']) ? array('id'=>'btn-save','text'=>'Edit','iconCls'=>'icon-edit','action'=>'edit;') : 0;

			$array['act']['del']=($hasil[0]['hapus']) ? array('id'=>'btn-del','text'=>'Del','iconCls'=>'mycls-doc-del','action'=>'del;') : 0;

		}else{

			die('you didnt had right to acccess this modules.');

		}

		if($is_return){

			return $array;

		}else{

			echo json_encode($array);

		}

	}

	

}