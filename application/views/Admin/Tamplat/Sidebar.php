<body id="page-top">
<!-- Page Wrapper -->
  <div id="wrapper">
<!-- sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?=base_url('Admin')?>">
  <div class="sidebar-brand-icon rotate-n-15">
    <i class="fas fa-laugh-wink"></i>
  </div>
  <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- query menu -->
  <?php
    $role_id = $this->session->userdata('role_id');
    $queryMenu =" SELECT `admin_menu`.`id`, `menu`
                  FROM `admin_menu` JOIN `admin_access_menu`
                  ON `admin_menu`.`id` = `admin_access_menu`.`menu_id`
                  WHERE `admin_access_menu`.`role_id` = $role_id
                  ORDER BY `admin_access_menu`.`menu_id` ASC
                ";
    $menu = $this->db->query($queryMenu)->result_array();
   ?>

<!-- end query menu -->

<!-- looping menu -->
<?php foreach ($menu as $m) : ?>
  <div class="sidebar-heading">
    <?= $m['menu'];  ?>
  </div>

  <!-- sub menu -->
  <?php
  $menuId = $m['id'];
  $querySubMenu = " SELECT *
                    FROM `admin_sub_menu` JOIN `admin_menu`
                    ON `admin_sub_menu`.`menu_id` = `admin_menu`.`id`
                    WHERE `admin_sub_menu`.`menu_id` = $menuId
                    AND `admin_sub_menu`.`is_active` = 1
                  ";
  $subMenu = $this->db->query($querySubMenu)->result_array();
  ?>
  <!-- end sub menu -->
  <?php foreach ($subMenu as $sm) : ?>
    <?php if ($title == $sm['title']) : ?>
    <li class="nav-item active">
    <?php else : ?>
    <li class="nav-item">
    <?php endif; ?>
    <a class="nav-link pb-0" href="<?=base_url($sm['url'])?>">
      <i class="<?= $sm['icon']  ?>"></i>
      <span><?= $sm['title']  ?></span></a>
    </li>
  <?php endforeach; ?>
  <!-- Divider -->
  <hr class="sidebar-divider mt-3">
<?php endforeach; ?>
<!-- end looping menu -->

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
  <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

</ul>
<!-- andsidebar -->
