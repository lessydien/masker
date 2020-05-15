<?php  
    $userdata = $this->session->userdata("user_data");
    $id_user = $this->ion_auth->user()->row()->user_id;
    // $jabatan = $this->db->select('j.*')->join('user_jabatan as uj', 'u.id=uj.id_user', 'left')->join('jabatan as j', 'j.id=uj.id_jabatan', 'left')->where('u.id', $id_user)->where('uj.closed_on is NULL', null, false)->get('users as u')->row();
?>
<!-- Sidebar -->
<ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon">
          <img src="<?= base_url("assets/img/logo/logo-bna.png") ?>">
        </div>
        <div class="sidebar-brand-text mx-2"><?php echo $MYCFG['GENERAL']['APP_NAME'];?></div>
      </a>
      <hr class="sidebar-divider">
      <div class="sidebar-heading">
        Main Navigation
      </div>
      <hr class="sidebar-divider">

      <?php 
      $i = 1;
      foreach($menus as $k=>$v):?>
        <?php if(isset($v['children'])) : ?>
          <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#menu-<?= $i ?>" aria-expanded="true"
              aria-controls="collapsePage">
              <i class="<?= $v['iconCls'];?>"></i>
              <span><?= $v['text'];?></span>
            </a>
            <div id="menu-<?= $i ?>" class="collapse" aria-labelledby="headingPage" data-parent="#accordionSidebar">
              <div class="bg-white py-2 collapse-inner rounded">

              <?php foreach($v['children'] as $key=>$val): ?>
                <a class="collapse-item" href="<?= site_url($val['url']);?>" data-html="true" data-toggle="tooltip" data-placement="right" title="<?= $val['remark'];?>">
                  <i class="<?= $val['iconCls'];?>"></i>&nbsp;<?= $val['text'];?>
                </a> 
              <?php endforeach;?>	
              </div>
            </div>
          </li>
        <?php 
          $i++;
          else:?>
          <li class="nav-item">
          <a class="nav-link" href="<?= ($v['url']=='#') ? '#': site_url($v['url']) ?>" data-html="true" data-toggle="tooltip" data-placement="right" title="<?= $v['remark'];?>">
            <i class="<?= $v['iconCls'];?>"></i>
            <span><?= $v['text'] ?></span>
          </a>
        </li>
        <?php endif; ?>
      <?php endforeach;?>
      

      <hr class="sidebar-divider">
      <div class="version" id="version-ruangadmin"></div>
    </ul>
	<!-- Sidebar -->