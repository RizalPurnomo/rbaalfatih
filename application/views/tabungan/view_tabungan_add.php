<?php $this->load->view('header'); ?>
  <!-- Left side column. contains the logo and sidebar -->
  <?php $this->load->view('sidebar'); ?>

  <script type="text/javascript">
      $(document).ready(function(){
        $('#nama').autocomplete({
                source: "<?php echo site_url('santri/get_autocomplete');?>",
     
                select: function (event, ui) {
                    $(this).val(ui.item.label);
                }
        });

    });
  </script>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  	<section class="content-header">
  		<h1>
  			Tabungan
  			<small>RBA Al Fatih</small>
  		</h1>
  		<ol class="breadcrumb">
  			<li><a href="#"><i class="fa fa-dashboard"></i> Tabungan</a></li>
  			<li class="active">Add</li>
  		</ol>
  	</section>

  	<!-- Main content -->
  	<section class="content">
  		<!-- Small boxes (Stat box) -->
  		<div class="row">
  			<div class="col-md-12">
  				<!-- Horizontal Form -->
  				<div class="box box-info">
  					<div class="box-header with-border">
  						<h3 class="box-title">Input Data Tabungan</h3>
  					</div>

  					<form class="form-horizontal">
  						<div class="box-body">
  							<div class="col-sm-12">
  								<div class="form-group">
  									<label for="idTabungan" class="col-sm-2 control-label">ID Tabungan</label>
  									<div class="col-sm-10">
  										<input type="text" class="form-control" id="idTabungan" placeholder="ID Tabungan" value="<?php //echo $idUser; ?>" disabled>
  									</div>
  								</div>

  								<div class="form-group">                                
  									<label for="idSantri" class="col-sm-2 control-label">Santri</label>
  									<div class="col-sm-8">
  										<input type="text" class="form-control" id="idSantri" placeholder="Nama Santri">
  									</div>
  									<div class="col-sm-2">
  										<input type="text" class="form-control" id="user" placeholder="Username">
  									</div>
  								</div>

  								<div class="form-group">
  									<label for="tmpLahir" class="col-sm-2 control-label">Tanggal Tabungan</label>
  									<div class="col-sm-10">
  										<div class="input-group date">
  											<div class="input-group-addon">
  												<i class="fa fa-calendar"></i>
  											</div>
  											<input type="text" class="form-control pull-right" id="datepicker"
  												value="<?php echo date('m-d-Y'); ?>">
  										</div>
  									</div>
  								</div>                                  

  								<div class="form-group">
  									<label for="debet" class="col-sm-2 control-label">Debet</label>
  									<div class="col-sm-10">
  										<input type="text" class="form-control" id="debet" placeholder="Debet">
  									</div>
  								</div>                                  

  								<div class="form-group">
  									<label for="kredit" class="col-sm-2 control-label">Kredit</label>
  									<div class="col-sm-10">
  										<input type="text" class="form-control" id="kredit" placeholder="Kredit">
  									</div>
  								</div>        

  								<div class="form-group">
  									<label for="ket" class="col-sm-2 control-label">Keterangan</label>
  									<div class="col-sm-10">
  										<input type="text" class="form-control" id="ket" placeholder="Keterangan">
  									</div>
  								</div>                                                               
                             

  							</div>
  						</div>
  					</form>
  					<!-- /.box-body -->
  					<div class="box-footer">
  						<button type="submit" class="btn btn-info pull-right" onclick="saveUser()">Simpan</button>
  					</div>
  					<!-- /.box-footer -->
  				</div>
  			</div>
      </div>
  			<!-- /.row -->

  	</section>

  </div>

  <?php $this->load->view('footer'); ?>


