<?php $this->load->view('header'); ?>
  <!-- Left side column. contains the logo and sidebar -->
  <?php $this->load->view('sidebar'); ?>

  <script type="text/javascript">
  	function selectUser(id) {
  		console.log(id);
  		var idUser = $("#" + id + " td")[1].innerHTML;
          console.log(idUser);
  		$.ajax({
  			success: function (html) {
  				var url = "<?php echo base_url(); ?>user/edit/" + idUser;
  				window.location.href = url;
  			}
  		});
  	}

    function deleteUser(id) {
      var idSiswa = $("#" + id + " td")[1].innerHTML;    
      var r = confirm("Apakah yakin data akan di hapus!");
      if (r == true) {
        $.ajax({
          type: "POST",
          url: "<?php echo base_url(); ?>user/delete/" + idSiswa,
          success: function (html) {
            console.log(html);
            var url = "<?php echo base_url(); ?>user/";
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
  			Pengajar
  			<small>RBA Al Fatih</small>
  		</h1>
  		<ol class="breadcrumb">
  			<li><a href="<?php echo base_url('home/dashboard');?>"><i class="fa fa-dashboard"></i> Home</a></li>
  			<li class="active">Pengajar</li>
  		</ol>
  	</section>

  	<!-- Main content -->
  	<section class="content">
  		<!-- Small boxes (Stat box) -->
  		<div class="row">
  			<div class="col-sm-12">
  				<div class="box box-info">
                    
  					<div class="box-body">
                      <a class="btn btn-large btn-primary" href="<?php echo base_url('user/add');?>">Tambah Pengajar</a>
                      <div class="box-body table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Id User</th>
                                        <th>Username</th>
                                        <th>Realname</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Level</th>
                                        <th>Foto</th>
                                        <th>Las Login</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php  if(!empty($user)){for($a=0; $a<count($user); $a++){?>
                                <?php $idUser = $user[$a]['iduser']; ?>
                                <tr id="user<?php echo $idUser; ?>">
                                    <td><?php echo $a+1 ?></td>
                                    <td><?php echo $idUser ?></td>
                                    <td><?php echo $user[$a]['user'] ?></td>
                                    <td><?php echo $user[$a]['realname'] ?></td>
                                    <td><?php echo $user[$a]['jnsKel'] ?></td>
                                    <td><?php echo $user[$a]['level'] ?></td>
                                    <td><?php echo $user[$a]['foto'] ?></td>
                                    <td><?php echo $user[$a]['lastLogin'] ?></td>
                                    <td width="125px">
                                        <a class="btn btn-large btn-primary"
                                            href="javascript:selectUser('user<?php echo $user[$a]['iduser']; ?>')">Edit</a>
                                        | <a class="btn btn-large btn-primary"
                                            href="javascript:deleteUser('user<?php echo $user[$a]['iduser']; ?>')">Delete</a>
                                    </td>
                                </tr>
                                <?php }} ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Id User</th>
                                        <th>Username</th>
                                        <th>Realname</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Level</th>
                                        <th>Foto</th>
                                        <th>Las Login</th>
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


