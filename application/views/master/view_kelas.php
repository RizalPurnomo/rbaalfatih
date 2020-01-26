<?php $this->load->view('header'); ?>
  <!-- Left side column. contains the logo and sidebar -->
  <?php $this->load->view('sidebar'); ?>

  <script type="text/javascript">
  	function selectKelas(id) {
  		console.log(id);
  		var idKelas = $("#" + id + " td")[1].innerHTML;
          console.log(idKelas);
  		$.ajax({
  			success: function (html) {
  				var url = "<?php echo base_url(); ?>kelas/edit/" + idKelas;
  				window.location.href = url;
  			}
  		});
  	}

    function deleteKelas(id) {
      var idKelas = $("#" + id + " td")[1].innerHTML;    
      var r = confirm("Apakah yakin data akan di hapus!");
      if (r == true) {
        $.ajax({
          type: "POST",
          url: "<?php echo base_url(); ?>kelas/delete/" + idKelas,
          success: function (html) {
            console.log(html);
            var url = "<?php echo base_url(); ?>kelas/";
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
  			Kelas
  			<small>RBA Al Fatih</small>
  		</h1>
  		<ol class="breadcrumb">
  			<li><a href="<?php echo base_url('home/dashboard');?>"><i class="fa fa-dashboard"></i> Home</a></li>
  			<li class="active">Kelas</li>
  		</ol>
  	</section>

  	<!-- Main content -->
  	<section class="content">
  		<!-- Small boxes (Stat box) -->
  		<div class="row">
  			<div class="col-sm-12">
  				<div class="box box-info">
                    
  					<div class="box-body">
                      <a class="btn btn-large btn-primary" href="<?php echo base_url('kelas/add');?>">Tambah Kelas</a>
                      <div class="box-body table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Id Kelas</th>
                                        <th>Nama Kelas</th>
                                        <th>Pengajar</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php  if(!empty($kelas)){for($a=0; $a<count($kelas); $a++){?>
                                <?php $idKelas = $kelas[$a]['idKelas']; ?>
                                <tr id="kelas<?php echo $idKelas; ?>">
                                    <td><?php echo $a+1 ?></td>
                                    <td><?php echo $idKelas ?></td>
                                    <td><?php echo $kelas[$a]['namaKelas'] ?></td>
                                    <td><?php echo $kelas[$a]['realname'] ?></td>
                                    <td width="125px">
                                        <a class="btn btn-large btn-primary"
                                            href="javascript:selectKelas('kelas<?php echo $kelas[$a]['idKelas']; ?>')">Edit</a>
                                        | <a class="btn btn-large btn-primary"
                                            href="javascript:deleteKelas('kelas<?php echo $kelas[$a]['idKelas']; ?>')">Delete</a>
                                    </td>
                                </tr>
                                <?php }} ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                      <th>No</th>
                                      <th>Id Kelas</th>
                                      <th>Nama Kelas</th>
                                      <th>Pengajar</th>
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


