<?php $this->load->view('header'); ?>
  <!-- Left side column. contains the logo and sidebar -->
  <?php $this->load->view('sidebar'); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  	<section class="content-header">
  		<h1>
  			Tambah Santri
  			<small>RBA Al Fatih</small>
  		</h1>
  		<ol class="breadcrumb">
  			<li><a href="#"><i class="fa fa-dashboard"></i> Santri</a></li>
  			<li class="active">Tambah</li>
  		</ol>
  	</section>

  	<!-- Main content -->
  	<section class="content">
  		<!-- Small boxes (Stat box) -->
  		<div class="row">
  			<div class="col-sm-12">
  				<div class="box box-info">
  					<div class="box-body">
                      <div class="col-md-6">
                            <!--ID Santri-->
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <label for="idSantri" class="col-sm-2 control-label">ID Santri</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="idSantri" placeholder="ID Santri" >
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <label for="nama" class="col-sm-2 control-label">Nama</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="nama" placeholder="Nama" >
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <label for="nama" class="col-sm-2 control-label">Nama</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="nama" placeholder="Nama" >
                                    </div>
                                </div>
                            </div>       

                            <!--Nama-->
                            <div class="form-group">
                            </div>    

                            <!--Panggilan-->
                            <div class="form-group">
                            </div>      

                            <!--Tempat Lahir-->
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <label for="tptLahir" class="col-sm-2 control-label">Tempat Lahir</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="tptLahir" placeholder="Tempat Lahir" >
                                    </div>
                                </div>
                            </div>                                              

                            <!--Tanggal Lahir-->
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <label for="tglLahir" class="col-sm-2 control-label">Tanggal Lahir</label>
                                    <div class="col-sm-10">
                                        <div class="input-group date">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input type="text" class="form-control pull-right" id="datepicker" value="<?php echo date('m-d-Y'); ?>">
                                        </div>                                    
                                    </div>
                                </div>
                            </div>    
                            <br>                             

                      </div>

                      <div class="col-md-6">
                      lk;lk;l
                      </div>

  					</div>
  				</div>
  			</div>
  		</div>
  	</section>

  </div>

  <?php $this->load->view('footer'); ?>


