<?php $this->load->view('header'); ?>
  <!-- Left side column. contains the logo and sidebar -->
  <?php $this->load->view('sidebar'); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  	<section class="content-header">
  		<h1>
  			Santri
  			<small>RBA Al Fatih</small>
  		</h1>
  		<ol class="breadcrumb">
  			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
  			<li class="active">Dashboard</li>
  		</ol>
  	</section>

  	<!-- Main content -->
  	<section class="content">
  		<!-- Small boxes (Stat box) -->
  		<div class="row">
  			<div class="col-sm-12">
  				<div class="box box-info">
                    
  					<div class="box-body">
                      <a class="btn btn-large btn-primary" href="<?php echo base_url('santri/add');?>">Tambah Santri</a>
                      <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Id Santri</th>
                                        <th>Nama</th>
                                        <th>Panggilan</th>
                                        <th>Tempat Lahir</th>
                                        <th>Tanggal Lahir</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Telpon</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php  if(!empty($santri)){for($a=0; $a<count($santri); $a++){?>
                                <?php $idSantri = $santri[$a]['idSantri']; ?>
                                <tr id="pasien<?php echo $idSantri; ?>">
                                    <td><?php echo $a+1 ?></td>
                                    <td><?php echo $idSantri ?></td>
                                    <td><?php echo $santri[$a]['nama'] ?></td>
                                    <td><?php echo $santri[$a]['panggilan'] ?></td>
                                    <td><?php echo $santri[$a]['tmpLahir'] ?></td>
                                    <td><?php echo $santri[$a]['tglLahir'] ?></td>
                                    <td><?php echo $santri[$a]['jnsKel'] ?></td>
                                    <td><?php echo $santri[$a]['tlp'] ?></td>
                                    <td width="125px">
                                        <a class="btn btn-large btn-primary"
                                            href="javascript:selectSantri('santri<?php echo $santri[$a]['idSantri']; ?>')">Edit</a>
                                        | <a class="btn btn-large btn-primary"
                                            href="javascript:deletesantri('santri<?php echo $santri[$a]['idSantri']; ?>')">Delete</a>
                                    </td>
                                </tr>
                                <?php }} ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Id Santri</th>
                                        <th>Nama</th>
                                        <th>Panggilan</th>
                                        <th>Tempat Lahir</th>
                                        <th>Tanggal Lahir</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Telpon</th>
                                    </tr>
                                </tfoot>
                            </table>
                      </div>
  					</div>
  				</div>
  			</div>
  		</div>
  	</section>

  </div>

  <?php $this->load->view('footer'); ?>


