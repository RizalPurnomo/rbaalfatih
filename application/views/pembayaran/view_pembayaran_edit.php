<?php $this->load->view('header'); ?>
<!-- Left side column. contains the logo and sidebar -->
<?php $this->load->view('sidebar'); ?>

<script type="text/javascript">
    function getDateTime($tgl) {
        if ($tgl == "now") {
            var now = new Date();
        } else {
            var now = $tgl;
        }
        var year = now.getFullYear();
        var month = now.getMonth() + 1;
        var day = now.getDate();
        var hour = now.getHours();
        var minute = now.getMinutes();
        var second = now.getSeconds();
        if (month.toString().length == 1) {
            var month = '0' + month;
        }
        if (day.toString().length == 1) {
            var day = '0' + day;
        }
        if (hour.toString().length == 1) {
            var hour = '0' + hour;
        }
        if (minute.toString().length == 1) {
            var minute = '0' + minute;
        }
        if (second.toString().length == 1) {
            var second = '0' + second;
        }
        var dateTime = year + '/' + month + '/' + day + ' ' + hour + ':' + minute + ':' + second;
        return dateTime;
    }

    function savePembayaran() {
        getIdPembayaran();
        var today = new Date(),
            curr_hour = today.getHours(),
            curr_min = today.getMinutes(),
            curr_sec = today.getSeconds();


        var idPembayaran = $("#idPembayaran").val();
        var idSantri = $("#idSantri").val();
        var masa = $("#masa").val();
        var datepicker = getDateTime(new Date($("#datepicker").val() + " " + curr_hour + ":" + curr_min + ":" + curr_sec));
        var nilaiPembayaran = $("#nilaiPembayaran").val();
        var nilaiInfaq = $("#nilaiInfaq").val();
        var createdBy = "<?php echo $this->session->userdata('iduser') ?>";
        var ket = $("#ket").val();

        var dataArray = {
            "pembayaran": {
                "idPembayaran": idPembayaran,
                "idSantri": idSantri,
                "masa": masa,
                "tanggalPembayaran": datepicker,
                "nilaiPembayaran": nilaiPembayaran.replace(/\D/g, ""),
                "nilaiInfaq": nilaiInfaq.replace(/\D/g, ""),
                "ket": ket,
                "createdBy": createdBy,
            }
        }

        console.log(dataArray);
        $.ajax({
            type: "POST",
            data: dataArray,
            url: '<?php echo base_url('pembayaran/savePembayaran'); ?>',
            success: function(result) {
                alert("Data Berhasil Disimpan");
                console.log(result);
                window.location = "<?php echo base_url(); ?>pembayaran";
            }
        })

    }

    function getIdPembayaran() {
        $.ajax({
            type: "GET",
            url: "<?php echo base_url(); ?>pembayaran/getMaxPembayaran/",
            success: function(html) {
                $("#idPembayaran").val(html);
            }
        })
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
            <li><a href="<?php echo base_url('pembayaran'); ?>"><i class="fa fa-dashboard"></i> Pembayaran</a></li>
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
                        <h3 class="box-title">Input Data Pembayaran</h3>
                    </div>

                    <form class="form-horizontal">
                        <div class="box-body">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="idPembayaran" class="col-sm-2 control-label">ID Pembayaran</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="idPembayaran" placeholder="ID Pembayaran" value="<?php echo $pembayaran[0]['idPembayaran']; ?>" disabled>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="idSantri" class="col-sm-2 control-label">Santri</label>
                                    <div class="col-sm-10">
                                        <!-- <input type="text" class="form-control" id="idSantri" placeholder="Nama Santri"> -->
                                        <select name="idSantri" class="form-control  input-lg select2" id="idSantri" required>
                                            <option value="">--Pilih Santri--</option>
                                            <?php for ($a = 0; $a < count($santri); $a++) { ?>
                                                <option value="<?php echo $santri[$a]['idSantri']; ?>" <?php echo $santri[$a]['idSantri'] == $pembayaran[0]['idSantri'] ? 'selected' : '' ?>><?php echo $santri[$a]['nama']; ?></option>
                                            <?php } ?>

                                        </select>

                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="masa" class="col-sm-2 control-label">Masa</label>
                                    <div class="col-sm-10">
                                        <!-- <input type="text" class="form-control" id="idSantri" placeholder="Nama Santri"> -->
                                        <select name="masa" class="form-control  input-lg select2" id="masa" required>
                                            <option value="">--Pilih Bulan--</option>
                                            <option value="01-2022" <?php echo $pembayaran[0]['masa'] == '01-2022' ? 'selected' : '' ?>>Januari - 2022</option>
                                            <option value="02-2022" <?php echo $pembayaran[0]['masa'] == '02-2022' ? 'selected' : '' ?>>Februari - 2022</option>
                                            <option value="03-2022" <?php echo $pembayaran[0]['masa'] == '03-2022' ? 'selected' : '' ?>>Maret - 2022</option>
                                            <option value="04-2022" <?php echo $pembayaran[0]['masa'] == '04-2022' ? 'selected' : '' ?>>April - 2022</option>
                                            <option value="05-2022" <?php echo $pembayaran[0]['masa'] == '05-2022' ? 'selected' : '' ?>>Mei - 2022</option>
                                            <option value="06-2022" <?php echo $pembayaran[0]['masa'] == '06-2022' ? 'selected' : '' ?>>Juni - 2022</option>
                                            <option value="07-2022" <?php echo $pembayaran[0]['masa'] == '07-2022' ? 'selected' : '' ?>>Juli - 2022</option>
                                            <option value="08-2022" <?php echo $pembayaran[0]['masa'] == '08-2022' ? 'selected' : '' ?>>Agustus - 2022</option>
                                            <option value="09-2022" <?php echo $pembayaran[0]['masa'] == '09-2022' ? 'selected' : '' ?>>September - 2022</option>
                                            <option value="10-2022" <?php echo $pembayaran[0]['masa'] == '10-2022' ? 'selected' : '' ?>>Oktober - 2022</option>
                                            <option value="11-2022" <?php echo $pembayaran[0]['masa'] == '11-2022' ? 'selected' : '' ?>>November - 2022</option>
                                            <option value="12-2022" <?php echo $pembayaran[0]['masa'] == '12-2022' ? 'selected' : '' ?>>Desember - 2022</option>

                                        </select>

                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Tanggal Pembayaran</label>
                                    <div class="col-sm-10">
                                        <div class="input-group date">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input type="text" class="form-control pull-right" id="datepicker" value="<?php echo date('m-d-Y', strtotime($pembayaran[0]['tanggalPembayaran'])); ?>">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="debet" class="col-sm-2 control-label">Pembayaran</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control uang" id="nilaiPembayaran" placeholder="Pembayaran">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="kredit" class="col-sm-2 control-label">Infaq</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control uang" id="nilaiInfaq" placeholder="Infaq">
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
                        <button type="submit" class="btn btn-info pull-right" onclick="savePembayaran()">Simpan</button>
                    </div>
                    <!-- /.box-footer -->
                </div>
            </div>
        </div>
        <!-- /.row -->

    </section>

</div>

<?php $this->load->view('footer'); ?>