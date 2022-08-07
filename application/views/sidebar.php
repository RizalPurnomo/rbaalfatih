  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="
            <?php
            if ($this->session->userdata('foto') == "") {
              echo base_url('assets/images/logo.png');
            } else {
              echo base_url('assets/images/') . $this->session->userdata('username') . '.jpg';
            }

            ?>
            " class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $this->session->userdata('realname'); ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>

      </div>

      <!-- sidebar menu: : style can be found in sidebar.less -->
      <!-- <?php $menu = $this->uri->segment(2); ?> <?php if ($menu == "dashboard") {
                                                      echo 'active';
                                                    } ?> -->


      <ul class="sidebar-menu">
        <!-- <div style="color: white">Tahun Ajaran :</div>
        <div style="color: white">Semester : </div>
        <div style="color: white">Terms : </div> -->
        <li class="header">MAIN NAVIGATION</li>

        <?php //if($this->session->userdata('level')=="Administrator" ){
        ?>
        <li class="treeview active">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Master</span>
            <span class="pull-right-container">
              <!--<span class="label label-primary pull-right">4</span> -->
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('santri'); ?>"><i class="fa fa-circle-o"></i>Santri</a></li>
            <li><a href="<?php echo base_url('user'); ?>"><i class="fa fa-circle-o"></i>Pengajar</a></li>
            <li><a href="<?php echo base_url('kelas'); ?>"><i class="fa fa-circle-o"></i>Kelas</a></li>
          </ul>
        </li>
        <?php //} 
        ?>

        <li class="treeview active">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Menu</span>
            <span class="pull-right-container">
              <!--<span class="label label-primary pull-right">4</span> -->
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('tabungan'); ?>"><i class="fa fa-circle-o"></i>Tabungan</a></li>
            <li><a href="<?php echo base_url('pembayaran'); ?>"><i class="fa fa-circle-o"></i>Pembayaran</a></li>
            <li><a href="<?php echo base_url('budgeting'); ?>"><i class="fa fa-circle-o"></i>Budgeting Event</a></li>
          </ul>
        </li>

        <li class="treeview active">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Laporan</span>
            <span class="pull-right-container">
              <!--<span class="label label-primary pull-right">4</span> -->
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('tabungan/laporan'); ?>"><i class="fa fa-circle-o"></i>Lap Tabungan</a></li>
          </ul>
        </li>

      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>