<?php $this->load->view('header'); ?>
  <!-- Left side column. contains the logo and sidebar -->
  <?php $this->load->view('sidebar'); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  	<section class="content-header">
  		<h1>
  			Laporan Tabungan Per Bulan
  			<small>RBA Al Fatih</small>
  		</h1>
  		<ol class="breadcrumb">
  			<li><a href="<?php echo base_url('tabungan/laporan');?>"><i class="fa fa-dashboard"></i>Laporan</a></li>
  			<li class="active">Tabungan Per Bulan</li>
  		</ol>
  	</section>

  	<!-- Main content -->
  	<section class="content">
  		<!-- Small boxes (Stat box) -->
  		<div class="row">
  			<div class="col-sm-12">
  				<div class="box box-info">
  					<div class="box-body">
                      <h1>Laporan Tabungan Bulan <?php echo $bln['bln'] . " " . $bln['thn']; ?></h1>
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
									<?php  if(!empty($lapPerBulan)){for($a=0; $a<count($lapPerBulan); $a++){?>
									<tr id="tabungan<?php echo $lapPerBulan[$a]['idSantri']; ?>">
										<td><?php echo $a+1; ?></td>
										<td><?php echo $lapPerBulan[$a]['nama']; ?></td>
										<td><?php echo $lapPerBulan[$a]['tanggal']; ?></td>
										<td align="right" class="uang"><?php echo $lapPerBulan[$a]['debet']; ?></td>    
										<td align="right" class="uang"><?php echo $lapPerBulan[$a]['kredit']; ?></td>  
                                        <?php $saldo = $saldo + $lapPerBulan[$a]['debet'] - $lapPerBulan[$a]['kredit']?>  
										<td align="right" class="uang"><?php echo $saldo; ?></td>    
										<td><?php echo $lapPerBulan[$a]['ket']; ?></td>    
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


