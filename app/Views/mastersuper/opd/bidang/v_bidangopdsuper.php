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
    <div class="section-header-back">
        <form action="<?= base_url('master/opds'); ?>" method="post">
            <button class="btn btn-primary btn-icon icon-left">
                <i class="fas fa-arrow-left"></i> 
            </button>
        </form>
    </div>
    <h1><?= $subtitle; ?></h1>
    
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="<?= base_url('admin/dashboard'); ?>">Dashboard</a></div>
        <!-- <div class="breadcrumb-item"><a href="#">Bootstrap Components</a></div> -->
        <div class="breadcrumb-item"><?= $subtitle; ?></div>
    </div>
    
    <div class="section-header-button">
        <!-- <form action="</?= base_url('master/f_bidangs/' . $dataopd['id']); ?>" method="post">
            <button class="btn btn-primary">
                <i class="fas fa-plus"></i>
                <span>Tambah Baru</span>
            </button>
        </form> -->
        <button type="button" class="btn btn-primary btn-icon icon-left btn-tambah" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
            <i class="fas fa-plus"></i> Tambah Baru
        </button>
    </div>
    
</div>

<div class="section-body" style="font-size: 12px;">
    <h2 class="section-title">Data Bidang</h2>
    <p class="section-lead">
        Informasi tentang data bidang dihalaman ini.
    </p>
    <div class="col-xs|sm|md|lg|xl-1-12">
        <div class="card card-primary">
            <div class="card-header">
                <h4>Data OPD</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <table>
                        <tr>
                            <td>Kode OPD : <?= $dataopd['kode']; ?> </td>
                            <td>Nama OPD : <?= $dataopd['nama_opd']; ?></td>
                            <td>Kode Pos : <?= $dataopd['kode_pos']; ?></td>
                        </tr>
                        <tr>
                            <td>Nomor Unit Kerja : <?= $dataopd['nomor_unit_kerja']; ?> </td>
                            <td>Alamat : <?= $dataopd['alamat_opd']; ?></td>
                            <td>Telepon : <?= $dataopd['telepon']; ?></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>Email : <?= $dataopd['email']; ?></td>
                            <td>Fax : <?= $dataopd['fax']; ?></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xs|sm|md|lg|xl-1-12">
        <div class="card card-primary shadow">
            <!-- <div class="card-header">
                <h4>Data Bidang</h4>
            </div> -->
            <div class="card-body table-responsive">
                <table style="font-size: 12px;" class="table table-sm table-striped table-hover" id="table-1" role="grid" aria-describedby="example1_info">
                    <thead style="background-color: rgba(90, 69, 250, 0.867); color: yellow;">
                        <tr>
                            <th rowspan="1" colspan="1" style="width: 2%;">No</th>
                            <th rowspan="1" colspan="1" style="width: 15%;">Kode</th>
                            <th rowspan="1" colspan="1">Nama Bidang</th>
                            <th rowspan="1" colspan="1" style="width: 16%;">Form</th>
                            <th rowspan="1" colspan="1" style="width: 1px;">Aksi</th>
                            <th rowspan="1" colspan="1" style="width: 1px;"></th>
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
                                <form action="<?= base_url('master/subbidangs/'. $db->id); ?>" method="post">
                                    <button style="cursor: pointer;" class="btn btn-sm btn-light" data-toggle="tooltip" title="FORM SUB BIDANG DENGAN BIDANG : <?= $db->nama_bidang; ?>">
                                        <i class="fas fa-folder"></i>    
                                        Sub Bidang
                                    </button>
                                </form>
                            </td>
                            <td class="text-right">
                                <button type="button" onclick="f_editbidangs(<?= $db->id ;?>)" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#staticBackdropEdit" data-toggle="tooltip" title="EDIT BIDANG : <?= $db->nama_bidang; ?>">
                                    <i class="fas fa-pencil-alt"></i>
                                </button>
                            </td>
                            <td>
                                <a href="<?= base_url('master/hapusbidangs/'. $db->id); ?>" style="cursor: pointer;" class="btn btn-sm btn-danger btn-hapus" data-toggle="tooltip" title="DELETE BIDANG : <?= $db->nama_bidang; ?>">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                        <?php $no ++ ; ?>
                        <?php endforeach; ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th rowspan="1" colspan="1" style="width: 2%;">No</th>
                            <th rowspan="1" colspan="1" style="width: 15%;">Kode</th>
                            <th rowspan="1" colspan="1">Nama Bidang</th>
                            <th rowspan="1" colspan="1" style="width: 16%;">Form</th>
                            <th rowspan="1" colspan="1" style="width: 1px;">Aksi</th>
                            <th rowspan="1" colspan="1" style="width: 1px;"></th>
                        </tr>
                    </tfoot>
                </table>
            </div>
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
                    <h5 class="modal-title mb-3" style="font-size: 16px; color: yellow;" id="staticBackdropLabel">Form Tambah</h5>
                    <button type="button" class="btn-close mb-3 tombolTutup" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <!-- alert error -->
                    <div class="alert alert-danger error" role="alert" style="display: none;"></div>
                    <!-- alert sukses -->
                    <div class="alert alert-primary sukses" role="alert" style="display: none;"></div>

                    <?= csrf_field(); ?>
                    <div class="row">
                        <input type="hidden" name="id" id="id">
                        <div class="position-relative form-group col">
                            <label for="kode">Kode</label>
                            <input name="kode" id="kode" type="text" class="form-control <?= ($validation->hasError('kode')) ? 'is-invalid' : ''; ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('kode'); ?>
                            </div>
                        </div>
                        <div class="position-relative form-group col">
                            <label for="type">Type Bidang</label>
                            <select class="form-select <?= ($validation->hasError('type')) ? 'is-invalid' : ''; ?>" name="type" id="type">
                                <option value="">-- Pilih Type Bidang --</option>
                                <?php foreach($selectTipebidang as $stb) : ?>
                                <option value="<?= $stb->id; ?>"><?= $stb->tipe; ?></option>
                                <?php endforeach; ?>
                            </select>
                            <div class="invalid-feedback">
                                <?= $validation->getError('type'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="position-relative form-group col">
                            <label for="nama_bidang">Nama Bidang</label>
                            <input name="nama_bidang" id="nama_bidang" type="text" class="form-control <?= ($validation->hasError('nama_bidang')) ? 'is-invalid' : ''; ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('nama_bidang'); ?>
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
                <div class="modal-header" style="background-color: rgba(90, 69, 250, 0.867); ">
                    <h5 class="modal-title mb-3" style="font-size: 16px; color: yellow;" id="staticBackdropLabel">Edit</h5>
                    <button type="button" class="btn-close mb-3 tombolTutup" data-bs-dismiss="modal" aria-label="Close"></button>
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
                            <label for="kodee">Kode</label>
                            <input name="kodee" id="kodee" type="text" class="form-control <?= ($validation->hasError('kodee')) ? 'is-invalid' : ''; ?> kodee">
                            <div class="invalid-feedback">
                                <?= $validation->getError('kodee'); ?>
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
                url: "<?= base_url("master/f_editbidangs") ?>/" + $id,
                type: "get",
                // data: "data",
                // dataType: "dataType",
                success: function (hasil) {
                    var $data = $.parseJSON(hasil);
                    if ($data.id != '') {
                        $('#id').val($data.id);
                        $('#kodee').val($data.kode);
                        $('#nama_bidangg').val($data.nama_bidang);
                    }
                }
            });
        }

        $('#tombolEdit').on('click', function () {
            // buat variabel data yg akan dikirim, yang datanya diambil dari id inputan pada modal
            var $id = $('#id').val();
            var $kode = $('#kodee').val();
            var $nama_bidang = $('#nama_bidangg').val();

            // ajax
            $.ajax({
                type: "POST",
                url: "<?= base_url('master/proccesseditbidangs'); ?>",
                data: {
                    id: $id,
                    kode: $kode,
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
            $('#kode').val();
            $('#type').val();
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
            var $kode = $('#kode').val();
            var $type = $('#type').val();
            var $nama_bidang = $('#nama_bidang').val();

            // ajax
            $.ajax({
                type: "POST",
                url: "<?= base_url('master/proccesstambahbidangs/' . $dataopd['id']); ?>",
                data: {
                    kode: $kode,
                    type: $type,
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