<!DOCTYPE html>
<html>
<?php $this->load->view('head'); ?>
<body class="hold-transition skin-blue sidebar-mini" ><!-- onload="load_status() -->
<div class="wrapper">
  
  <header class="main-header">
    <!-- Logo -->
    <a href="<?php echo base_url('home/dashboard'); ?>" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>RB</b>A</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>RBA </b>Al-Fatih</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="
                <?php 
                  if ($this->session->userdata('foto')=="") {
                    echo base_url('assets/images/logo.png'); 
                  }else{
                    echo base_url('assets/images/').$this->session->userdata('foto'); 
                  }
                ?>
                " class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $this->session->userdata('realname'); ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="
                <?php 
                  if ($this->session->userdata('foto')=="") {
                    echo base_url('assets/images/logo.png'); 
                  }else{
                    echo base_url('assets/images/').$this->session->userdata('foto'); 
                  }
                ?>
                " class="user-image" alt="User Image">

                <p>
                  <label id="id" value="<?php echo $this->session->userdata('id'); ?>"><?php echo $this->session->userdata('realname'); ?></label>
                  
                  <small><?php echo $this->session->userdata('level'); ?></small>
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
<!--                 <div class="row">
                  <div class="col-xs-4 text-center">
                    <a href="#">Followers</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Sales</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Friends</a>
                  </div>
                </div>
                  --> 
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="<?php echo base_url('index.php/home/logout'); ?>" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>