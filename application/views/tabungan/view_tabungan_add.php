<?php $this->load->view('header'); ?>
  <!-- Left side column. contains the logo and sidebar -->
  <?php $this->load->view('sidebar'); ?>

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

  	function saveTabungan(){
		getTabungan();
		var today = new Date(),
              curr_hour = today.getHours(),
              curr_min  = today.getMinutes(),
              curr_sec  = today.getSeconds();		  

		
  		var idTabungan      = $("#idTabungan").val();
  		var idSantri        = $("#idSantri").val();
		var idUser        	= "<?php echo $this->session->userdata('iduser') ?>";
		var datepicker  	= getDateTime(new Date($("#datepicker").val() + " " + curr_hour + ":" + curr_min + ":" + curr_sec));
        var debet    		= $("#debet").val();
  		var kredit      	= $("#kredit").val();
  		var ket       		= $("#ket").val();

  		var dataArray = {
  			"tabungan": {
  				"idTabungan"        : idTabungan,
  				"idSantri"          : idSantri,
                "idUser"      		: idUser,
  				"tanggal"      		: datepicker,
  				"debet"        		: debet.replace(/\D/g, ""),
  				"kredit"         	: kredit.replace(/\D/g, ""),
  				"ket"          		: ket,
  			}
  		}

        console.log(dataArray);
        $.ajax({
			type:"POST",
			data : dataArray,
			url:'<?php echo base_url('tabungan/saveTabungan'); ?>',
			success:function(result){
				alert("Data Berhasil Disimpan");
				console.log(result);
				window.location = "<?php echo base_url(); ?>tabungan";
        	}
    	})  		

  	}

	function getTabungan(){    
		$.ajax({
			type:"GET",
			url:"<?php echo base_url(); ?>tabungan/getMaxTabungan/",
			success:function(html){
				$("#idTabungan").val(html);
			}
		})
	}
  </script>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  	<section class="content-header">
  		<h1>
  			Tabungan
  			<small>RBA Al Fatih</small>
  		</h1>
  		<ol class="breadcrumb">
  			<li><a href="<?php echo base_url('tabungan');?>"><i class="fa fa-dashboard"></i> Tabungan</a></li>
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
  										<input type="text" class="form-control" id="idTabungan" placeholder="ID Tabungan" value="<?php echo $idTabungan; ?>" disabled>
  									</div>
  								</div>

  								<div class="form-group">                                
  									<label for="idSantri" class="col-sm-2 control-label">Santri</label>
  									<div class="col-sm-10">
  										<!-- <input type="text" class="form-control" id="idSantri" placeholder="Nama Santri"> -->
										  <select name="video" class="form-control  input-lg select2" id="idSantri" required>
                                			<option></option>
											<?php for($a=0; $a<count($santri); $a++){ ?>
												<option value="<?php echo $santri[$a]['idSantri']; ?>"><?php echo $santri[$a]['nama']; ?></option>
											<?php } ?>
											
										</select>									  

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
  									<label for="debet" class="col-sm-2 control-label">Tabung(Debet)</label>
  									<div class="col-sm-10">
  										<input type="text" class="form-control uang" id="debet" placeholder="Debet">
  									</div>
  								</div>                                  

  								<div class="form-group">
  									<label for="kredit" class="col-sm-2 control-label">Ambil(Kredit)</label>
  									<div class="col-sm-10">
  										<input type="text" class="form-control uang" id="kredit" placeholder="Kredit">
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
  						<button type="submit" class="btn btn-info pull-right" onclick="saveTabungan()">Simpan</button>
  					</div>
  					<!-- /.box-footer -->
  				</div>
  			</div>
      </div>
  			<!-- /.row -->

  	</section>

  </div>

  <?php $this->load->view('footer'); ?>


