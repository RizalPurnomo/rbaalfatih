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

  	function saveSantri() {
		getSantri();
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
		var kelas       = $("#kelas").val();

		if(kelas==""){
			alert("Harap Pilih Kelas");
			return;
		} 

  		var dataArray = {
  			"santri": {
  				"idSantri"      : idSantri,
				"idKelas"       : kelas,
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
        url:'<?php echo base_url('santri/saveSantri'); ?>',
        success:function(result){
            alert("Data Berhasil Disimpan");
            console.log(result);
            window.location = "<?php echo base_url(); ?>santri";
        }
    })  		

  	}

	function getSantri(){    
		$.ajax({
			type:"GET",
			url:"<?php echo base_url(); ?>santri/getMaxSantri/",
			success:function(html){
				$("#noRekamMedis").val(html);
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
  			<li><a href="<?php echo base_url('santri');?>"><i class="fa fa-dashboard"></i> Santri</a></li>
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
  										<input type="text" class="form-control" id="idSantri" placeholder="ID Santri" value="<?php echo $idSantri; ?>" disabled>
  									</div>
  								</div>

  								<div class="form-group">
  									<label for="nama" class="col-sm-4 control-label">Nama Lengkap</label>
  									<div class="col-sm-8">
  										<input type="text" class="form-control" id="nama" placeholder="Nama Lengkap">
  									</div>
  								</div>

  								<div class="form-group">
  									<label for="panggilan" class="col-sm-4 control-label">Nama Panggilan</label>
  									<div class="col-sm-8">
  										<input type="text" class="form-control" id="panggilan" placeholder="Nama Panggilan">
  									</div>
  								</div>                                  

  								<div class="form-group">
  									<label for="tmpLahir" class="col-sm-4 control-label">Tempat / Tanggal Lahir</label>
  									<div class="col-sm-4">
  										<input type="text" class="form-control" id="tmpLahir" placeholder="Tempat Lahir">
  									</div>
  									<div class="col-sm-4">
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
  									<label for="jenisKelamin" class="col-sm-4 control-label">Jenis Kelamin</label>
  									<div class="col-sm-8">
  										<select class="form-control" id="jenisKelamin">
  											<option value="L">Laki Laki</option>
  											<option value="P">Perempuan</option>
  										</select>
  									</div>
  								</div>

  								<div class="form-group">
  									<label for="tlp" class="col-sm-4 control-label">Telpon</label>
  									<div class="col-sm-8">
  										<input type="text" class="form-control" id="tlp" placeholder="Telpon">
  									</div>
  								</div>                                  

  							</div>
  							<div class="col-sm-6">

                                <div class="form-group">
  									<label for="alamat" class="col-sm-4 control-label">Alamat</label>
  									<div class="col-sm-8">
  										<textarea class="form-control" id="alamat" placeholder="Alamat" rows="3"></textarea>
  									</div>
  								</div>

  								<div class="form-group">
  									<label for="namaAyah" class="col-sm-4 control-label">Nama Ayah</label>
  									<div class="col-sm-8">
  										<input type="text" class="form-control" id="namaAyah" placeholder="Nama Ayah">
  									</div>
  								</div>

  								<div class="form-group">
  									<label for="namaIbu" class="col-sm-4 control-label">Nama Ibu</label>
  									<div class="col-sm-8">
  										<input type="text" class="form-control" id="namaIbu" placeholder="Nama Ibu">
  									</div>
  								</div>

  								<div class="form-group">
  									<label for="email" class="col-sm-4 control-label">Email</label>
  									<div class="col-sm-8">
  										<input type="text" class="form-control" id="email" placeholder="Email">
  									</div>
  								</div>

  							</div>

  						</div>
  					</form>

					  <div class="col-md-12">
	  					<div class="box-body">
							<div class="form-group">
								<label for="kelas" class="col-sm-4 control-label">Kelas</label>
								<div class="col-sm-8">
									<select class="form-control" id="kelas">
										<option value="">-- Pilih Kelas --</option>
										<?php for($a=0; $a<count($kelas); $a++){  ?>
											<option value="<?php echo $kelas[$a]['idKelas'] ?>" >
												<?php echo $kelas[$a]['namaKelas'] ." - " . $kelas[$a]['realname'] ?>
											</option>
										<?php } ?>
									</select>
								</div>
							</div>  
						</div>
					</div>						  
  					<!-- /.box-body -->
  					<div class="box-footer">
  						<button type="submit" class="btn btn-info pull-right" onclick="saveSantri()">Simpan</button>
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
