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

  	function saveUser() {
		getUser();
		var today = new Date(),
              curr_hour = today.getHours(),
              curr_min  = today.getMinutes(),
              curr_sec  = today.getSeconds();		  

		
  		var idUser      = $("#idUser").val();
  		var user        = $("#user").val();
  		var realname    = $("#realname").val();
        var password    = $("#password").val();
  		var jnsKel      = $("#jenisKelamin").val();
  		var level       = $("#level").val();
  		var foto        = $("#foto").val();

  		var dataArray = {
  			"user": {
  				"iduser"        : idUser,
  				"user"          : user,
                "realname"      : realname,
  				"password"      : password,
  				"jnsKel"        : jnsKel,
  				"level"         : level,
  				"foto"          : foto,
  			}
  		}

        console.log(dataArray);
        $.ajax({
			type:"POST",
			data : dataArray,
			url:'<?php echo base_url('user/saveUser'); ?>',
			success:function(result){
				alert("Data Berhasil Disimpan");
				console.log(result);
				window.location = "<?php echo base_url(); ?>user";
        	}
    	})  		

  	}

	function getUser(){    
		$.ajax({
			type:"GET",
			url:"<?php echo base_url(); ?>user/getMaxUser/",
			success:function(html){
				$("#idUser").val(html);
			}
		})
	}	  

  </script>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  	<!-- Content Header (Page header) -->
  	<section class="content-header">
  		<h1>
  			Pengajar
  			<small>RBA Al-Fatih</small>
  		</h1>
  		<ol class="breadcrumb">
  			<li><a href="#"><i class="fa fa-dashboard"></i> Pengajar</a></li>
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
  						<h3 class="box-title">Input Data Pengajar</h3>
  					</div>

  					<form class="form-horizontal">
  						<div class="box-body">
  							<div class="col-sm-12">
  								<div class="form-group">
  									<label for="idUser" class="col-sm-2 control-label">ID Pengajar</label>
  									<div class="col-sm-10">
  										<input type="text" class="form-control" id="idUser" placeholder="ID Pengajar" value="<?php echo $idUser; ?>" disabled>
  									</div>
  								</div>

  								<div class="form-group">
  									<label for="user" class="col-sm-2 control-label">Username</label>
  									<div class="col-sm-10">
  										<input type="text" class="form-control" id="user" placeholder="Username">
  									</div>
  								</div>

  								<div class="form-group">
  									<label for="realname" class="col-sm-2 control-label">Realname</label>
  									<div class="col-sm-10">
  										<input type="text" class="form-control" id="realname" placeholder="Realname">
  									</div>
  								</div>                                  

  								<div class="form-group">
  									<label for="password" class="col-sm-2 control-label">Password</label>
  									<div class="col-sm-10">
  										<input type="password" class="form-control" id="password" placeholder="Password">
  									</div>
  								</div>                                  

  								<div class="form-group">
  									<label for="jenisKelamin" class="col-sm-2 control-label">Jenis Kelamin</label>
  									<div class="col-sm-10">
  										<select class="form-control" id="jenisKelamin">
  											<option value="L">Laki Laki</option>
  											<option value="P">Perempuan</option>
  										</select>
  									</div>
  								</div>

  								<div class="form-group">
  									<label for="level" class="col-sm-2 control-label">Level</label>
  									<div class="col-sm-10">
  										<select class="form-control" id="level" disabled>
  											<option value="Administrator">Administrator</option>
  											<option value="Pengajar" selected>Pengajar</option>
  										</select>
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
  	<!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php $this->load->view('footer'); ?>
