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

  	function editKelas() {
		//getKelas();
		var today = new Date(),
              curr_hour = today.getHours(),
              curr_min  = today.getMinutes(),
              curr_sec  = today.getSeconds();		  

		
  		var idKelas     = $("#idKelas").val();
  		var namaKelas   = $("#nama").val();
  		var pengajar    = $("#pengajar").val();

  		var dataArray = {
  			"kelas": {
  				"idKelas"      : idKelas,
  				"namaKelas"    : namaKelas,
                "idUser"       : pengajar
  			}
  		}

        console.log(dataArray);
        $.ajax({
        type:"POST",
        data : dataArray,
        url:'<?php echo base_url('kelas/editKelas/'); ?>' + idKelas,
        success:function(result){
            alert("Data Berhasil Disimpan");
            console.log(result);
            window.location = "<?php echo base_url(); ?>kelas";
        }
    })  		

  	}

	// function getKelas(){    
	// 	$.ajax({
	// 		type:"GET",
	// 		url:"<?php echo base_url(); ?>kelas/getMaxKelas/",
	// 		success:function(html){
	// 			$("#idKelas").val(html);
	// 		}
	// 	})
	// }	  

  </script>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  	<!-- Content Header (Page header) -->
  	<section class="content-header">
  		<h1>
  			Kelas
  			<small>RBA Al-Fatih</small>
  		</h1>
  		<ol class="breadcrumb">
  			<li><a href="#"><i class="fa fa-dashboard"></i> Kelas</a></li>
  			<li class="active">edit</li>
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
  						<h3 class="box-title">Edit Data Kelas</h3>
  					</div>

  					<form class="form-horizontal">
  						<div class="box-body">
  							<div class="col-sm-12">
  								<div class="form-group">
  									<label for="idSantri" class="col-sm-4 control-label">ID Kelas</label>
  									<div class="col-sm-8">
  										<input type="text" class="form-control" id="idKelas" placeholder="ID Kelas" value="<?php echo $kelas[0]['idKelas']; ?>" disabled>
  									</div>
  								</div>

  								<div class="form-group">
  									<label for="nama" class="col-sm-4 control-label">Nama Kelas</label>
  									<div class="col-sm-8">
  										<input type="text" class="form-control" id="nama" placeholder="Nama Kelas" value="<?php echo $kelas[0]['namaKelas']; ?>">
  									</div>
  								</div>
                                
  								<div class="form-group">
  									<label for="pengajar" class="col-sm-4 control-label">Pengajar</label>
  									<div class="col-sm-8">
  										<select class="form-control" id="pengajar">
                                            <option value="">-- Pilih Pengajar --</option>
                                            <?php for($a=0; $a<count($user); $a++){  ?>
  											    <option value="<?php echo $user[$a]['iduser'] ?>"  <?php if($user[$a]['iduser']==$kelas[0]['idUser']){ echo "selected";} ?>  >
                                                    <?php echo $user[$a]['realname'] ?>
                                                </option>
                                            <?php } ?>
  										</select>
  									</div>
  								</div>                               
  							</div>

  						</div>
  					</form>
  					<!-- /.box-body -->
  					<div class="box-footer">
  						<button type="submit" class="btn btn-info pull-right" onclick="editKelas()">Simpan</button>
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
