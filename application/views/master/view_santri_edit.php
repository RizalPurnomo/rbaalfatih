<?php $this->load->view('header'); ?>
  <!-- Left side column. contains the logo and sidebar -->
  <?php $this->load->view('sidebar'); ?>

  <script src="<?php echo base_url()?>assets/jquery-2.1.1.min.js"></script>

  <script type="text/javascript">

	function getDateTime($tgl) {
		if ($tgl=="now") {
		var now     = new Date();  
		}else{
		var now     = $tgl;
		}
		var year    = now.getFullYear();
		var month   = now.getMonth()+1; 
		var day     = now.getDate();
		var hour    = now.getHours();
		var minute  = now.getMinutes();
		var second  = now.getSeconds(); 
		if(month.toString().length == 1) {
			var month = '0'+month;
		}
		if(day.toString().length == 1) {
			var day = '0'+day;
		}   
		if(hour.toString().length == 1) {
			var hour = '0'+hour;
		}
		if(minute.toString().length == 1) {
			var minute = '0'+minute;
		}
		if(second.toString().length == 1) {
			var second = '0'+second;
		}   
		var dateTime = year+'/'+month+'/'+day+' '+hour+':'+minute+':'+second;   
		return dateTime;
    }

  	function editSantri() {
		var today = new Date(),
              curr_hour = today.getHours(),
              curr_min  = today.getMinutes(),
              curr_sec  = today.getSeconds();		  

		
  		var idSantri    = $("#idSantri").val();
  		var nama        = $("#nama").val();
  		var panggilan   = $("#panggilan").val();
        var tmpLahir    = $("#tmpLahir").val();
  		var datepicker  = getDateTime(new Date($("#datepicker").val() + " " + curr_hour + ":" + curr_min + ":" + curr_sec));
  		var jenisKelamin = $("#jenisKelamin").val();
  		var tlp         = $("#tlp").val();
  		var alamat      = $("#alamat").val();
		var namaAyah    = $("#namaAyah").val();
        var namaIbu     = $("#namaIbu").val();
  		var email       = $("#email").val();

  		var dataArray = {
  			"santri": {
  				"idSantri"      : idSantri,
  				"nama"          : nama,
                "panggilan"     : panggilan,
  				"tmpLahir"      : tmpLahir,
  				"tglLahir"      : datepicker,
  				"jnsKel"        : jenisKelamin,
  				"tlp"           : tlp,
  				"alamat"        : alamat,
				"namaAyah"      : namaAyah,
                "namaIbu"       : namaIbu,
  				"email"         : email
  			}
  		}

        console.log(dataArray);
        $.ajax({
            type:"POST",
            data : dataArray,
            url:'<?php echo base_url('santri/editSantri/'); ?>' + idSantri,
            success:function(result){
                alert("Data Berhasil Diedit");
                console.log(result);
                window.location = "<?php echo base_url(); ?>santri";
            }
        })  		

  	}
  

  </script>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  	<!-- Content Header (Page header) -->
  	<section class="content-header">
  		<h1>
  			Santri
  			<small>RBA Al-Fatih</small>
  		</h1>
  		<ol class="breadcrumb">
  			<li><a href="#"><i class="fa fa-dashboard"></i> Santri</a></li>
  			<li class="active">add</li>
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
  						<h3 class="box-title">Input Data Santri</h3>
  					</div>

  					<form class="form-horizontal">
  						<div class="box-body">
  							<div class="col-sm-6">
  								<div class="form-group">
  									<label for="idSantri" class="col-sm-4 control-label">ID Santri</label>
  									<div class="col-sm-8">
  										<input type="text" class="form-control" id="idSantri" placeholder="ID Santri" value="<?php echo $santri[0]['idSantri']; ?>" disabled>
  									</div>
  								</div>

  								<div class="form-group">
  									<label for="nama" class="col-sm-4 control-label">Nama Lengkap</label>
  									<div class="col-sm-8">
  										<input type="text" class="form-control" id="nama" placeholder="Nama Lengkap" value="<?php echo $santri[0]['nama']; ?>">
  									</div>
  								</div>

  								<div class="form-group">
  									<label for="panggilan" class="col-sm-4 control-label">Nama Panggilan</label>
  									<div class="col-sm-8">
  										<input type="text" class="form-control" id="panggilan" placeholder="Nama Panggilan" value="<?php echo $santri[0]['panggilan']; ?>">
  									</div>
  								</div>                                  

  								<div class="form-group">
  									<label for="tmpLahir" class="col-sm-4 control-label">Tempat / Tanggal Lahir</label>
  									<div class="col-sm-4">
  										<input type="text" class="form-control" id="tmpLahir" placeholder="Tempat Lahir" value="<?php echo $santri[0]['tmpLahir']; ?>">
  									</div>
  									<div class="col-sm-4">
  										<div class="input-group date">
  											<div class="input-group-addon">
  												<i class="fa fa-calendar"></i>
  											</div>
  											<input type="text" class="form-control pull-right" id="datepicker"
                                              value="<?php echo $santri[0]['tglLahir']; ?>">
  										</div>
  									</div>
  								</div>

  								<div class="form-group">
  									<label for="jenisKelamin" class="col-sm-4 control-label">Jenis Kelamin</label>
  									<div class="col-sm-8">
  										<select class="form-control" id="jenisKelamin">
  											<option value="L" <?php if($santri[0]['jnsKel']=="L"){echo "selected";} ?>>Laki Laki</option>
  											<option value="P" <?php if($santri[0]['jnsKel']=="P"){echo "selected";} ?>>Perempuan</option>
  										</select>
  									</div>
  								</div>

  								<div class="form-group">
  									<label for="tlp" class="col-sm-4 control-label">Telpon</label>
  									<div class="col-sm-8">
  										<input type="text" class="form-control" id="tlp" placeholder="Telpon" value="<?php echo $santri[0]['tlp']; ?>">
  									</div>
  								</div>                                  

  							</div>
  							<div class="col-sm-6">

                                <div class="form-group">
  									<label for="alamat" class="col-sm-4 control-label">Alamat</label>
  									<div class="col-sm-8">
  										<textarea class="form-control" id="alamat" placeholder="Alamat" rows="3"><?php echo $santri[0]['alamat']; ?></textarea>
  									</div>
  								</div>

  								<div class="form-group">
  									<label for="namaAyah" class="col-sm-4 control-label">Nama Ayah</label>
  									<div class="col-sm-8">
  										<input type="text" class="form-control" id="namaAyah" placeholder="Nama Ayah" value="<?php echo $santri[0]['namaAyah']; ?>">
  									</div>
  								</div>

  								<div class="form-group">
  									<label for="namaIbu" class="col-sm-4 control-label">Nama Ibu</label>
  									<div class="col-sm-8">
  										<input type="text" class="form-control" id="namaIbu" placeholder="Nama Ibu" value="<?php echo $santri[0]['namaIbu']; ?>">
  									</div>
  								</div>

  								<div class="form-group">
  									<label for="email" class="col-sm-4 control-label">Email</label>
  									<div class="col-sm-8">
  										<input type="text" class="form-control" id="email" placeholder="Email" value="<?php echo $santri[0]['email']; ?>">
  									</div>
  								</div>

  							</div>

  						</div>
  					</form>
  					<!-- /.box-body -->
  					<div class="box-footer">
  						<button type="submit" class="btn btn-info pull-right" onclick="editSantri()">Simpan</button>
  					</div>
  					<!-- /.box-footer -->
  				</div>
  			</div>
      </div>
  			<!-- /.row -->

  	</section>
  	<!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php $this->load->view('footer'); ?>
