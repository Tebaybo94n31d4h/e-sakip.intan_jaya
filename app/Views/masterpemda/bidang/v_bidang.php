<?= $this->extend('template/default'); ?>

<?= $this->section('content'); ?>

<!-- Bootstrap CSS -->
<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous"> -->
<div id="berhasil" data-berhasil="<?= session()->getFlashdata('berhasil');  ?>"></div>
<div id="update" data-update="<?= session()->getFlashdata('update');  ?>"></div>
<div id="sudah_ada" data-sudah_ada="<?= session()->getFlashdata('sudah_ada');  ?>"></div>
<div id="gagal" data-gagal="<?= session()->getFlashdata('gagal');  ?>"></div>
<div id="hapus" data-hapus="<?= session()->getFlashdata('hapus');  ?>"></div>

<div class="section-header">
    
    <h1><?= $subtitle; ?></h1>
    
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="<?= base_url('admin/dashboardp'); ?>">Dashboard</a></div>
        <!-- <div class="breadcrumb-item"><a href="#">Bootstrap Components</a></div> -->
        <div class="breadcrumb-item"><?= $subtitle; ?></div>
    </div>
    
    <div class="section-header-button">
        <!-- <form action="</?= base_url('master/f_bidangp'); ?>" method="post">
            <button class="btn btn-primary">
                <i class="fas fa-plus"></i>
                <span>Tambah Baru</span>
            </button>
        </form> -->
        <button type="button" class="btn mt-2 mb-2 btn-primary btn-icon icon-left btn-tambah" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
            <i class="fas fa-plus"></i> Tambah Baru
        </button>
    </div>
    
</div>

<div class="section-body">
    <h2 class="section-title">Data Bidang</h2>
    <p class="section-lead">
        Informasi tentang data bidang dihalaman ini.
    </p>

    <div class="card card-primary">
        <!-- <div class="card-header">
            <h4 class="card-title">Data Bidang</h4>
        </div> -->
        <div class="card-body table-responsive">
            <table style="font-size: 12px;" class="table-striped table-sm table table-hover" id="table-1">
                <thead style="background-color: rgba(90, 69, 250, 0.867); color: yellow;">
                    <tr>
                        <th rowspan="1" colspan="1">No</th>
                        <th rowspan="1" colspan="1">Kode</th>
                        <th rowspan="1" colspan="1">Nama Bidang</th>
                        <th style="width: 15%;">FORM AKSES</th>
                        <th rowspan="1" colspan="1" style="width: 1%;">Aksi</th>
                        <th rowspan="1" colspan="1" style="width: 1%;"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1 ; ?>
                    <?php foreach($databidang as $db) : ?>
                    <tr>
                        <td><?= $no; ?></td>
                        <td><?= $db->kode; ?></td>
                        <td><?= $db->nama_bidang; ?></td>
                        <td>
                            <form action="<?= base_url('master/subbidangp/'. $db->id); ?>" method="post">
                                <button style="cursor: pointer;" class="btn btn-sm btn-light" data-toggle="tooltip" title="SUB BIDANG <?= $db->nama_bidang; ?>">
                                    <i class="fas fa-folder"></i>    
                                    Sub Bidang
                                </button>
                            </form>
                            
                        </td>
                        <td class="text-right">
                            <form action="<?= base_url('master/f_editbidangp/' . $db->id); ?>" method="post">
                                <button style="cursor: pointer;" class="btn btn-sm btn-success" data-toggle="tooltip" title="EDIT BIDANG <?= $db->nama_bidang; ?>">
                                    <i class="fas fa-pencil-alt"></i>
                                </button>
                            </form>
                        </td>
                        <td>
                            <a href="<?= base_url('master/hapusbidangp/'. $db->id); ?>" style="cursor: pointer;" class="btn btn-sm btn-danger btn-hapus" data-toggle="tooltip" title="DELETE BIDANG : <?= $db->nama_bidang; ?>">
                                <i class="fas fa-trash"></i>
                            </a>
                        </td>
                        
                    </tr>
                    <?php $no ++ ; ?>
                    <?php endforeach; ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th rowspan="1" colspan="1">No</th>
                        <th rowspan="1" colspan="1">Kode</th>
                        <th rowspan="1" colspan="1">Nama Bidang</th>
                        <th style="width: 15%;">FORM AKSES</th>
                        <th rowspan="1" colspan="1" style="width: 1%;">Aksi</th>
                        <th rowspan="1" colspan="1" style="width: 1%;"></th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
</div>
<!-- Modal Tambah -->
<!-- <form action="</?= base_url('master/proccesstambahbidangs/' . $dataopd['id']); ?>" method="POST" id="tab-content-1"> -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header" style="background-color: rgba(90, 69, 250, 0.867);">
                    <h5 class="modal-title mb-3" id="staticBackdropLabel" style="color: yellow;">Form Tambah</h5>
                    <button type="button" class="btn-close mb-3 tombolTutup" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <!-- alert error -->
                    <div class="alert alert-danger error" role="alert" style="display: none;"></div>
                    <!-- alert sukses -->
                    <div class="alert alert-primary sukses" role="alert" style="display: none;"></div>

                    <?= csrf_field(); ?>
                    <div class="row">
                        <div class="col">
                            <p class="card-title text-primary" style="font-size: 16px; font-weight: bold;">Data Bidang</p>
                            <div class="position-relative form-group">
                                <label for="kd">Kode</label>
                                <input name="kd" id="kd" type="text" class="form-control <?= ($validation->hasError('kd')) ? 'is-invalid' : ''; ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('kd'); ?>
                                </div>
                            </div>
                            <div class="position-relative form-group">
                                <label for="nama_bidang">Nama Bidang</label>
                                <input name="nama_bidang" id="nama_bidang" type="text" class="form-control <?= ($validation->hasError('nama_bidang')) ? 'is-invalid' : ''; ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('nama_bidang'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <p class="card-title text-primary" style="font-size: 16px; font-weight: bold;">Pilih Opsi</p>
                            <div class="position-relative form-group">
                                <label for="typeBidang">Type Bidang</label>
                                <select class="form-select <?= ($validation->hasError('typeBidang')) ? 'is-invalid' : ''; ?>" name="typeBidang" id="typeBidang">
                                    <option value="">-- Pilih Bidang --</option>
                                    <option value="1">Sekretariat</option>
                                    <option value="2">Umum</option>
                                    <option value="100">Lainnya</option>
                                </select>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('typeBidang'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary tombolTutup" data-bs-dismiss="modal">Tutup</button>
                <button type="submit" id="tombolSimpan" class="btn btn-success"> <i class="fas fa-paper-plane"></i> Simpan</button>
            </div>
            </div>
        </div>
    </div>
<!-- </form> -->

<!-- Modal Edit -->
    <div class="modal fade" id="staticBackdropEdit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #02072b;">
                    <h5 class="modal-title mb-3" style="font-size: 16px; color: white;" id="staticBackdropLabel">Edit</h5>
                    <button type="button" class="btn-close mb-3 btn-secondary tombolTutup" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <!-- alert error -->
                    <div class="alert alert-danger error" role="alert" style="display: none;"></div>
                    <!-- alert sukses -->
                    <div class="alert alert-primary sukses" role="alert" style="display: none;"></div>

                    <?= csrf_field(); ?>
                    <input type="hidden" name="id" id="id" class="id">
                    <div class="row">
                        <div class="position-relative form-group col">
                            <label for="kdd">Kode</label>
                            <input name="kdd" id="kdd" type="text" class="form-control <?= ($validation->hasError('kdd')) ? 'is-invalid' : ''; ?> kdd">
                            <div class="invalid-feedback">
                                <?= $validation->getError('kdd'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="position-relative form-group col">
                            <label for="nama_bidangg">Nama Bidang</label>
                            <input name="nama_bidangg" id="nama_bidangg" type="text" class="form-control <?= ($validation->hasError('nama_bidangg')) ? 'is-invalid' : ''; ?> nama_bidangg">
                            <div class="invalid-feedback">
                                <?= $validation->getError('nama_bidangg'); ?>
                            </div>
                        </div>
                    </div>
                </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary tombolTutup" data-bs-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-success" id="tombolEdit"> <i class="fas fa-paper-plane"></i> Simpan</button>
            </div>
            </div>
        </div>
    </div>

    <script src="<?= base_url(); ?>/jquery/jquery-3.6.0.js"></script>

    <script>
    // $(document).ready(function () {

        // fungsi edit diambil dari button edit di onclick
        function f_editbidangs($id){
            $.ajax({
                url: "<?= base_url("master/f_editbidangp") ?>/" + $id,
                type: "get",
                // data: "data",
                // dataType: "dataType",
                success: function (hasil) {
                    var $data = $.parseJSON(hasil);
                    if ($data.id != '') {
                        $('#id').val($data.id);
                        $('#kdd').val($data.kode);
                        $('#nama_bidangg').val($data.nama_bidang);
                    }
                }
            });
        }

        $('#tombolEdit').on('click', function () {
            // buat variabel data yg akan dikirim, yang datanya diambil dari id inputan pada modal
            var $id = $('#id').val();
            var $kd = $('#kdd').val();
            var $nama_bidang = $('#nama_bidangg').val();

            // ajax
            $.ajax({
                type: "POST",
                url: "<?= base_url('master/proccesseditbidangs'); ?>",
                data: {
                    id: $id,
                    kd: $kd,
                    nama_bidang: $nama_bidang
                },
                // dataType: "dataType",
                success: function (hasil) {
                    // alert(hasil);
                    var $data = $.parseJSON(hasil);
                    if ($data.sukses == false) {
                        $('.sukses').hide();
                        $('.error').show();
                        $('.error').html($data.error);
                    } else {
                        $('.error').hide();
                        $('.sukses').show();
                        $('.sukses').html($data.sukses);
                    }
                }
            });
        })

        // bersihkan form tambah data
        function bersihkan(){
            $('#kd').val();
            $('#typeBidang').val();
            $('#nama_bidang').val();
        }

        // tutup modal sekaligus mengrifress halaman yang saat ini berada
        $('.tombolTutup').on('click', function () {
           if ($('.sukses').is(":visible")) {
               window.location.href = "<?php current_url()."?".$_SERVER['QUERY_STRING'] ?>";
           }
           $('.alert').hide();
           bersihkan(); 
        });

        $('#tombolSimpan').on('click', function() {

            // buat variabel data yg akan dikirim, yang datanya diambil dari id inputan pada modal
            var $kd = $('#kd').val();
            var $typeBidang = $('#typeBidang').val();
            var $nama_bidang = $('#nama_bidang').val();

            // ajax
            $.ajax({
                type: "POST",
                url: "<?= base_url('master/proccesstambahbidangp'); ?>",
                data: {
                    kd: $kd,
                    typeBidang: $typeBidang,
                    nama_bidang: $nama_bidang
                },
                // dataType: "dataType",
                success: function (hasil) {
                    var $data = $.parseJSON(hasil);
                    if ($data.sukses == false) {
                        $('.sukses').hide();
                        $('.error').show();
                        $('.error').html($data.error);
                    } else {
                        $('.error').hide();
                        $('.sukses').show();
                        $('.sukses').html($data.sukses);
                    }
                }
            });

            bersihkan();

        }); 
</script>

<?= $this->endSection() ;?>