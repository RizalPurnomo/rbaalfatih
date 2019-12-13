  <?php $this->load->view('header'); ?>
  <!-- Left side column. contains the logo and sidebar -->
  <?php $this->load->view('sidebar'); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  	<section class="content-header">
  		<h1>
  			Dashboard
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
  						<h1>Selamat Datang <?php echo $this->session->userdata('realname'); ?></h1>
  						<div class="col-lg-3 col-xs-4">
  							<!-- small box -->
  							<div class="small-box bg-green">
  								<div class="inner">
  									<h3><?php echo $santri[0]['id'] ?></h3>
  									<p>SANTRI </p>
  								</div>
  								<div class="icon">
  									<i class="ion ion-person"></i>
  								</div>
  								<a href="#" class="small-box-footer">Ikhwan : <?php echo $santri[0]['L'] ?>  ||  Akhwat : <?php echo $santri[0]['P'] ?> </i></a>
  							</div>
  						</div>

  						<div class="col-lg-3 col-xs-4">
  							<!-- small box -->
  							<div class="small-box bg-yellow">
  								<div class="inner">
  									<h3><?php echo $user[0]['id'] ?></h3>
  									<p>PENGAJAR </p>
  								</div>
  								<div class="icon">
  									<i class="ion ion-person"></i>
  								</div>
  								<a href="#" class="small-box-footer">Ikhwan : <?php echo $user[0]['L'] ?>  ||  Akhwat : <?php echo $user[0]['P'] ?> </i></a>
  							</div>
  						</div>						  

  					</div>
  				</div>
  			</div>
  		</div>
  	</section>

  </div>

  <?php $this->load->view('footer'); ?>


