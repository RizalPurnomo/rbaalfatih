<?php $this->load->view('header'); ?>
  <!-- Left side column. contains the logo and sidebar -->
  <?php $this->load->view('sidebar'); ?>

  <script type="text/javascript">
  	function selectTabungan(id) {
  		console.log(id);
  		var idTabungan = $("#" + id + " td")[1].innerHTML;
          console.log(idTabungan);
  		$.ajax({
  			success: function (html) {
  				var url = "<?php echo base_url(); ?>tabungan/edit/" + idTabungan;
  				window.location.href = url;
  			}
  		});
  	}

    function deleteTabungan(id) {
      var idTabungan = $("#" + id + " td")[1].innerHTML;    
      var r = confirm("Apakah yakin data akan di hapus!");
      if (r == true) {
        $.ajax({
          type: "POST",
          url: "<?php echo base_url(); ?>tabungan/delete/" + idTabungan,
          success: function (html) {
            console.log(html);
            var url = "<?php echo base_url(); ?>tabungan/";
            window.location.href = url;
          }
        })
      } else {
        return;
      }
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
  			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
  			<li class="active">Tabungan</li>
  		</ol>
  	</section>

  	<!-- Main content -->
  	<section class="content">
  		<!-- Small boxes (Stat box) -->
  		<div class="row">
  			<div class="col-sm-12">
  				<div class="box box-info">
                    
  					<div class="box-body">
                      <a class="btn btn-large btn-primary" href="<?php echo base_url('tabungan/add');?>">Tambah Tabungan</a>
                      <div class="box-body table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Id Tabungan</th>
                                        <th>Kelas</th>
                                        <th>Nama</th>
                                        <th>Tanggal</th>
                                        <th>Tabung</th>
                                        <th>Ambil</th>
                                        <th>Ket</th>
                                        <th>Input By</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php  if(!empty($tabungan)){for($a=0; $a<count($tabungan); $a++){?>
                                <?php $idTabungan = $tabungan[$a]['idTabungan']; ?>
                                <tr id="tabungan<?php echo $idTabungan; ?>">
                                    <td><?php echo $a+1; ?></td>
                                    <td><?php echo $idTabungan; ?></td>
                                    <td><?php echo $tabungan[$a]['namaKelas']; ?></td>
                                    <td><?php echo $tabungan[$a]['nama']; ?></td>
                                    <td><?php echo $tabungan[$a]['tanggal']; ?></td>
                                    <td class="uang"><?php echo $tabungan[$a]['debet']; ?></td>
                                    <td class="uang"><?php echo $tabungan[$a]['kredit']; ?></td>    
                                    <td><?php echo $tabungan[$a]['ket']; ?></td>
                                    <td><?php echo $tabungan[$a]['realname']; ?></td>
                                    <td width="125px">
                                        <a class="btn btn-large btn-primary"
                                            href="javascript:selectTabungan('tabungan<?php echo $tabungan[$a]['idTabungan']; ?>')">Edit</a>
                                        | <a class="btn btn-large btn-primary"
                                            href="javascript:deleteTabungan('tabungan<?php echo $tabungan[$a]['idTabungan']; ?>')">Delete</a>
                                    </td>
                                </tr>
                                <?php }} ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Id Tabungan</th>
                                        <th>Kelas</th>
                                        <th>Nama</th>
                                        <th>Tanggal</th>
                                        <th>Tabung</th>
                                        <th>Ambil</th>
                                        <th>Ket</th>
                                        <th>Input By</th>
                                        <th>Aksi</th>
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


