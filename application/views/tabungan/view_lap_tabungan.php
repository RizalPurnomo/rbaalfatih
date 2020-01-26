<?php $this->load->view('header'); ?>
  <!-- Left side column. contains the logo and sidebar -->
  <?php $this->load->view('sidebar'); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  	<section class="content-header">
  		<h1>
  			Laporan Tabungan
  			<small>RBA Al Fatih</small>
  		</h1>
  		<ol class="breadcrumb">
  			<li><a href="<?php echo base_url('home/dashboard');?>"><i class="fa fa-dashboard"></i> Home</a></li>
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
					  <!-- <a class="btn btn-large btn-primary" href="<?php echo base_url('tabungan/add');?>">Tambah Tabungan</a> -->
						<div class="box-body table-responsive">
							<table id="example1" class="table table-bordered table-striped">
									<thead>
										<tr>
											<td colspan=2>Detail Per Bulan =></td>
											<td><a href="<?php echo base_url('tabungan/lapPerBulan/'.'01'); ?>">Jan</a></td>
											<td><a href="<?php echo base_url('tabungan/lapPerBulan/'.'02'); ?>">Feb</td>
											<td><a href="<?php echo base_url('tabungan/lapPerBulan/'.'03'); ?>">Mar</td>
											<td><a href="<?php echo base_url('tabungan/lapPerBulan/'.'04'); ?>">Apr</td>
											<td><a href="<?php echo base_url('tabungan/lapPerBulan/'.'05'); ?>">Mei</td>
											<td><a href="<?php echo base_url('tabungan/lapPerBulan/'.'06'); ?>">Jun</td>
											<td><a href="<?php echo base_url('tabungan/lapPerBulan/'.'07'); ?>">Jul</td>
											<td><a href="<?php echo base_url('tabungan/lapPerBulan/'.'08'); ?>">Aug</td>
											<td><a href="<?php echo base_url('tabungan/lapPerBulan/'.'09'); ?>">Sep</td>
											<td><a href="<?php echo base_url('tabungan/lapPerBulan/'.'10'); ?>">Okt</td>
											<td><a href="<?php echo base_url('tabungan/lapPerBulan/'.'11'); ?>">Nov</td>
											<td><a href="<?php echo base_url('tabungan/lapPerBulan/'.'12'); ?>">Des</td>
											<td>Total</td>
										</tr>
										<tr>
											<th>No</th>
											<!-- <th>Id Santri</th> -->
											<th>Nama</th>
											<th>Jan</th>
											<th>Feb</th>
											<th>Mar</th>
											<th>Apr</th>
											<th>Mei</th>
											<th>Jun</th>
											<th>Jul</th>
											<th>Aug</th>
											<th>Sep</th>
											<th>Okt</th>
											<th>Nov</th>
											<th>Des</th>
											<th>Total</th>
										</tr>
									</thead>
									<tbody>
									<?php  if(!empty($lapPerBulan)){for($a=0; $a<count($lapPerBulan); $a++){?>
									<tr id="tabungan<?php echo $lapPerBulan[$a]['idSantri']; ?>">
										<td><?php echo $a+1; ?></td>
										<!-- <td><?php echo $lapPerBulan[$a]['idSantri']; ?></td> -->
										<td>
											<a href="<?php echo base_url('tabungan/lapPerSantri/'.$lapPerBulan[$a]['idSantri']); ?>">
												<?php echo $lapPerBulan[$a]['nama']; ?>
											</a>
										</td>
										<td align="right" class="uang"><?php echo $lapPerBulan[$a]['Jan']; ?></td>
										<td align="right"  class="uang"><?php echo $lapPerBulan[$a]['Feb']; ?></td>    
										<td align="right"  class="uang"><?php echo $lapPerBulan[$a]['Mar']; ?></td>    
										<td align="right" class="uang"><?php echo $lapPerBulan[$a]['Apr']; ?></td>    
										<td align="right" class="uang"><?php echo $lapPerBulan[$a]['Mei']; ?></td>    
										<td align="right" class="uang"><?php echo $lapPerBulan[$a]['Jun']; ?></td>    
										<td align="right" class="uang"><?php echo $lapPerBulan[$a]['Jul']; ?></td>    
										<td align="right" class="uang"><?php echo $lapPerBulan[$a]['Aug']; ?></td>    
										<td align="right" class="uang"><?php echo $lapPerBulan[$a]['Sep']; ?></td>    
										<td align="right" class="uang"><?php echo $lapPerBulan[$a]['Okt']; ?></td>    
										<td align="right" class="uang"><?php echo $lapPerBulan[$a]['Nov']; ?></td>    
										<td align="right" class="uang"><?php echo $lapPerBulan[$a]['Des']; ?></td>    
										<td align="right" class="uang"><?php echo $lapPerBulan[$a]['Total']; ?></td>    
									</tr>
									<?php }} ?>
									</tbody>
									<tfoot>
										<tr>
											<th>No</th>
											<!-- <th>Id Santri</th> -->
											<th>Nama</th>
											<th>Jan</th>
											<th>Feb</th>
											<th>Mar</th>
											<th>Apr</th>
											<th>Mei</th>
											<th>Jun</th>
											<th>Jul</th>
											<th>Aug</th>
											<th>Sep</th>
											<th>Okt</th>
											<th>Nov</th>
											<th>Des</th>
											<th>Total</th>
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


