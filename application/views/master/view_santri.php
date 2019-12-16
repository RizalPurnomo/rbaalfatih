<?php $this->load->view('header'); ?>
  <!-- Left side column. contains the logo and sidebar -->
  <?php $this->load->view('sidebar'); ?>

  <script type="text/javascript">
  	function selectSantri(id) {
  		console.log(id);
  		var idSantri = $("#" + id + " td")[2].innerHTML;
          console.log(idSantri);
  		$.ajax({
  			success: function (html) {
  				var url = "<?php echo base_url(); ?>santri/edit/" + idSantri;
  				window.location.href = url;
  			}
  		});
  	}

    function deleteSantri(id) {
      var idSantri = $("#" + id + " td")[2].innerHTML;    
      var r = confirm("Apakah yakin data akan di hapus!");
      if (r == true) {
        $.ajax({
          type: "POST",
          url: "<?php echo base_url(); ?>santri/delete/" + idSantri,
          success: function (html) {
            console.log(html);
            var url = "<?php echo base_url(); ?>santri/";
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
  			Santri
  			<small>RBA Al Fatih</small>
  		</h1>
  		<ol class="breadcrumb">
  			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
  			<li class="active">Santri</li>
  		</ol>
  	</section>

  	<!-- Main content -->
  	<section class="content">
  		<!-- Small boxes (Stat box) -->
  		<div class="row">
  			<div class="col-sm-12">
  				<div class="box box-info">
                    
  					<div class="box-body">
                      <a class="btn btn-large btn-primary" href="<?php echo base_url('santri/add');?>">Tambah Santri</a>
                      <div class="box-body table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kelas</th>
                                        <th>Id Santri</th>
                                        <th>Nama</th>
                                        <th>Tempat Lahir</th>
                                        <th>Tanggal Lahir</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Telpon</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php  if(!empty($santri)){for($a=0; $a<count($santri); $a++){?>
                                <?php $idSantri = $santri[$a]['idSantri']; ?>
                                <tr id="santri<?php echo $idSantri; ?>">
                                    <td><?php echo $a+1 ?></td>
                                    <td><?php echo $santri[$a]['namaKelas'] ?></td>
                                    <td><?php echo $idSantri ?></td>
                                    <td><?php echo $santri[$a]['nama'] ?></td>
                                    <td><?php echo $santri[$a]['tmpLahir'] ?></td>
                                    <td><?php echo $santri[$a]['tglLahir'] ?></td>
                                    <td><?php echo $santri[$a]['jnsKel'] ?></td>
                                    <td><?php echo $santri[$a]['tlp'] ?></td>
                                    <td width="125px">
                                        <a class="btn btn-large btn-primary"
                                            href="javascript:selectSantri('santri<?php echo $santri[$a]['idSantri']; ?>')">Edit</a>
                                        | <a class="btn btn-large btn-primary"
                                            href="javascript:deleteSantri('santri<?php echo $santri[$a]['idSantri']; ?>')">Delete</a>
                                    </td>
                                </tr>
                                <?php }} ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Kelas</th>
                                        <th>Id Santri</th>
                                        <th>Nama</th>
                                        <th>Tempat Lahir</th>
                                        <th>Tanggal Lahir</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Telpon</th>
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


