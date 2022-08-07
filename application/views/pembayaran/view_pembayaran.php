<?php $this->load->view('header'); ?>
<!-- Left side column. contains the logo and sidebar -->
<?php $this->load->view('sidebar'); ?>

<script type="text/javascript">
    function selectPembayaran(id) {
        console.log(id);
        var idPembayaran = $("#" + id + " td")[1].innerHTML;
        console.log(idPembayaran);
        $.ajax({
            success: function(html) {
                var url = "<?php echo base_url(); ?>pembayaran/edit/" + idPembayaran;
                window.location.href = url;
            }
        });
    }

    function deletePembayaran(id) {
        var idPembayaran = $("#" + id + " td")[1].innerHTML;
        var r = confirm("Apakah yakin data akan di hapus!");
        if (r == true) {
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>pembayaran/delete/" + idPembayaran,
                success: function(html) {
                    console.log(html);
                    var url = "<?php echo base_url(); ?>pembayaran/";
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
            Pembayaran
            <small>RBA Al Fatih</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('home/dashboard'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Pembayaran</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-sm-12">
                <div class="box box-info">

                    <div class="box-body">
                        <a class="btn btn-large btn-primary" href="<?php echo base_url('pembayaran/add'); ?>">Tambah Pembayaran</a>
                        <div class="box-body table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Id Pembayaran</th>
                                        <th>Masa</th>
                                        <th>Tanggal</th>
                                        <th>Kelas</th>
                                        <th>Nama</th>
                                        <th>Pembayaran</th>
                                        <th>Infaq</th>
                                        <th>Ket</th>
                                        <th>Input By</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!empty($pembayaran)) {
                                        for ($a = 0; $a < count($pembayaran); $a++) { ?>
                                            <?php $idPembayaran = $pembayaran[$a]['idPembayaran']; ?>
                                            <tr id="pembayaran<?php echo $idPembayaran; ?>">
                                                <td><?php echo $a + 1; ?></td>
                                                <td><?php echo $idPembayaran; ?></td>
                                                <td><?php echo $pembayaran[$a]['masa']; ?></td>
                                                <td><?php echo $pembayaran[$a]['tanggalPembayaran']; ?></td>
                                                <td><?php echo $pembayaran[$a]['namaKelas']; ?></td>
                                                <td><?php echo $pembayaran[$a]['nama']; ?></td>
                                                <td align="right" class="uang"><?php echo $pembayaran[$a]['nilaiPembayaran']; ?></td>
                                                <td align="right" class="uang"><?php echo $pembayaran[$a]['nilaiInfaq']; ?></td>
                                                <td><?php echo $pembayaran[$a]['ket']; ?></td>
                                                <td><?php echo $pembayaran[$a]['realname']; ?></td>
                                                <td width="125px">
                                                    <a class="btn btn-large btn-primary" href="javascript:selectPembayaran('pembayaran<?php echo $pembayaran[$a]['idPembayaran']; ?>')">Edit</a>
                                                    | <a class="btn btn-large btn-primary" href="javascript:deletePembayaran('pembayaran<?php echo $pembayaran[$a]['idPembayaran']; ?>')">Delete</a>
                                                </td>
                                            </tr>
                                    <?php }
                                    } ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Id Pembayaran</th>
                                        <th>Masa</th>
                                        <th>Tanggal</th>
                                        <th>Kelas</th>
                                        <th>Nama</th>
                                        <th>Pembayaran</th>
                                        <th>Infaq</th>
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