<?php $this->load->view('header'); ?>
  <!-- Left side column. contains the logo and sidebar -->
  <?php $this->load->view('sidebar'); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  	<section class="content-header">
  		<h1>
  			Laporan Tabungan Per Siswa
  			<small>RBA Al Fatih</small>
  		</h1>
  		<ol class="breadcrumb">
  			<li><a href="<?php echo base_url('tabungan/laporan');?>"><i class="fa fa-dashboard"></i>Laporan</a></li>
  			<li class="active">Tabungan Per Siswa</li>
  		</ol>
  	</section>

  	<!-- Main content -->
  	<section class="content">
  		<!-- Small boxes (Stat box) -->
  		<div class="row">
  			<div class="col-sm-12">
  				<div class="box box-info">
  					<div class="box-body">
                      <h1><?php echo $lapPerSantri[0]['nama']; ?></h1>
					  <!-- <a class="btn btn-large btn-primary" href="<?php echo base_url('tabungan/add');?>">Tambah Tabungan</a> -->
						<div class="box-body table-responsive">
							<table id="example1" class="table table-bordered table-striped">
									<thead>
										<tr>
											<th>No</th>
											<th>Nama</th>
											<th>Tanggal</th>
											<th>Debet</th>
											<th>Kredit</th>
											<th>Saldo</th>
											<th>Keterangan</th>
										</tr>
									</thead>
									<tbody>
                                    <?php $saldo = 0; ?>                                    
									<?php  if(!empty($lapPerSantri)){for($a=0; $a<count($lapPerSantri); $a++){?>
									<tr id="tabungan<?php echo $lapPerSantri[$a]['idSantri']; ?>">
										<td><?php echo $a+1; ?></td>
										<td><?php echo $lapPerSantri[$a]['nama']; ?></td>
										<td><?php echo $lapPerSantri[$a]['tanggal']; ?></td>
										<td align="right" class="uang"><?php echo $lapPerSantri[$a]['debet']; ?></td>    
										<td align="right" class="uang"><?php echo $lapPerSantri[$a]['kredit']; ?></td>  
                                        <?php $saldo = $saldo + $lapPerSantri[$a]['debet'] - $lapPerSantri[$a]['kredit']?>  
										<td align="right" class="uang"><?php echo $saldo; ?></td>    
										<td><?php echo $lapPerSantri[$a]['ket']; ?></td>    
									</tr>
									<?php }} ?>
									</tbody>
									<tfoot>
										<tr>
                                            <th>No</th>
											<th>Nama</th>
											<th>Tanggal</th>
											<th>Debet</th>
											<th>Kredit</th>
											<th>Saldo</th>
											<th>Keterangan</th>

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


