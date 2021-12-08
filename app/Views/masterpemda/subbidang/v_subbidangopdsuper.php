<?= $this->extend('template/default'); ?>

<?= $this->section('content'); ?>

<div id="berhasil" data-berhasil="<?= session()->getFlashdata('berhasil');  ?>"></div>
<div id="update" data-update="<?= session()->getFlashdata('update');  ?>"></div>
<div id="sudah_ada" data-sudah_ada="<?= session()->getFlashdata('sudah_ada');  ?>"></div>
<div id="gagal" data-gagal="<?= session()->getFlashdata('gagal');  ?>"></div>
<div id="hapus" data-hapus="<?= session()->getFlashdata('hapus');  ?>"></div>

<div class="section-header">
    <div class="section-header-back">
        <form action="<?= htmlentities(base_url('master/bidangp')); ?>" method="post">
            <?= csrf_field() ;?>
            <button class="btn mt-2 mb-2 btn-primary btn-icon icon-left">
                <i class="fas fa-arrow-left"></i> 
            </button>
        </form>
    </div>
    <h1><?= htmlentities($subtitle); ?></h1>
    
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="<?= htmlentities(base_url('admin/dashboard')); ?>">Dashboard</a></div>
        <!-- <div class="breadcrumb-item"><a href="#">Bootstrap Components</a></div> -->
        <div class="breadcrumb-item"><?= htmlentities($subtitle); ?></div>
    </div>
    
    <div class="section-header-button">
        <!-- <form action="</?= base_url('master/f_subbidangs/' . $databidang->id); ?>" method="post">
            <button class="btn btn-primary">
                <i class="fas fa-plus"></i>
                <span>Tambah Baru</span>
            </button>
        </form> -->
        <button type="button" class="btn btn-primary btn-icon icon-left btn-tambah mt-2 mb-2" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
            <i class="fas fa-plus"></i> Tambah Baru
        </button>
    </div>
</div>

<div class="section-body" style="font-size: 12px;">
    <h2 class="section-title">Data Sub Bidang</h2>
    <p class="section-lead">
        Informasi tentang data sub bidang dihalaman ini.
    </p>
  <div class="col-xs|sm|md|lg|xl-1-12">
    <div class="card card-primary">
        <div class="card-header">
            <h4>Data Bidang</h4>
        </div>
        <div class="card-body table-responsive">
            <div class="row">
                <table>
                    <tr>
                        <td>Kode Bidang : <?= htmlentities($databidang->kode); ?></td>
                    </tr>
                    <tr>
                        <td>Nama Bidang : <?= htmlentities($databidang->nama_bidang); ?></td>
                    </tr>
                    <tr>
                        
                            <?php if($tampil->aktif = 1) : ?>
                                <td>Is Active : Aktif</td>
                            <?php else : ?>
                                <td>Is Active : Tidak Aktif</td>
                            <?php endif; ?>
                      
                    </tr>
                </table>
            </div>
        </div>
    </div>
  </div>
  <div class="col-xs|sm|md|lg|xl-1-12">
        <div class="card card-primary">
            <div class="card-body table-responsive">
                <table style="font-size: 12px;" class="table table-sm table-striped table-hover" id="table-1">
                    <thead style="background-color: rgba(90, 69, 250, 0.867); color: yellow;">
                        <tr>
                            <th rowspan="1" colspan="1" style="width: 2%;">No</th>
                            <th rowspan="1" colspan="1" style="width: 15%;">Kode</th>
                            <th rowspan="1" colspan="1">Nama Sub Bidang</th>
                            <th rowspan="1" colspan="1" style="width: 1%;">Aksi</th>
                            <th rowspan="1" colspan="1" style="width: 1%;"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1 ; ?>
                        <?php foreach($datasubbidang as $dsb) : ?>
                        <tr>
                            <td><?= htmlentities($no); ?></td>
                            <td><?= htmlentities($dsb->kode); ?></td>
                            <td><?= htmlentities($dsb->nama_sub_bidang); ?></td>
                            <td class="text-right">
                                <button type="button" onclick="f_editsubbidangp(<?= htmlentities($dsb->id) ;?>)" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#staticBackdropEdit" data-toggle="tooltip" title="Edit sub bidang : <?= htmlentities($dsb->nama_sub_bidang); ?>">
                                    <i class="fas fa-pencil-alt"></i>
                                </button>
                            </td>
                            <td class="text-right">
                                <a href="<?= htmlentities(base_url('master/hapussubbidangp/' . $dsb->id)); ?>" style="cursor: pointer;" class="btn btn-sm btn-danger btn-hapus" data-toggle="tooltip" title="Hapus sub bidang : <?= htmlentities($dsb->nama_sub_bidang); ?>">
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
                            <th rowspan="1" colspan="1">Nama Sub Bidang</th>
                            <th rowspan="1" colspan="1" style="width: 1%;">Aksi</th>
                            <th rowspan="1" colspan="1" style="width: 1%;"></th>
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
        <div class="modal-dialog">
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

                    <div class="card-body">
                        <?= csrf_field(); ?>
                        <div class="row">
                            <div class="position-relative form-group col-12 col-sm-12 col-lg-12">
                                <label for="kode">Kode</label>
                                <input name="kode" id="kode" type="text" class="form-control <?= ($validation->hasError('kode')) ? 'is-invalid' : ''; ?>" placeholder="Masukkan kode sub bidang">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('kode'); ?>
                                </div>
                            </div>
                            <div class="position-relative form-group col-12 col-sm-12 col-lg-12">
                                <label for="nama_sub_bidang">Nama Sub Bidang</label>
                                <input name="nama_sub_bidang" id="nama_sub_bidang" type="text" class="form-control <?= ($validation->hasError('nama_sub_bidang')) ? 'is-invalid' : ''; ?>" placeholder="Masukkan nama sub bidang">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('nama_sub_bidang'); ?>
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
                <div class="modal-header" style="background-color: rgba(90, 69, 250, 0.867);">
                    <h5 class="modal-title mb-3" id="staticBackdropLabel" style="color: yellow;">Form Edit</h5>
                    <button type="button" class="btn-close mb-3 tombolTutup" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <!-- alert error -->
                    <div class="alert alert-danger error" role="alert" style="display: none;"></div>
                    <!-- alert sukses -->
                    <div class="alert alert-primary sukses" role="alert" style="display: none;"></div>

                    <div class="card-body">
                        <?= csrf_field(); ?>
                        <input type="hidden" name="_method" value="PUT" />
                        <input type="hidden" name="id" id="id" class="id">
                        <div class="row">
                            <div class="position-relative form-group col-12 col-sm-12 col-lg-12">
                                <label for="kodee">Kode</label>
                                <input name="kodee" id="kodee" type="text" class="form-control <?= ($validation->hasError('kodee')) ? 'is-invalid' : ''; ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('kodee'); ?>
                                </div>
                            </div>
                            <div class="position-relative form-group col-12 col-sm-12 col-lg-12">
                                <label for="nama_sub_bidangg">Nama Sub Bidang</label>
                                <input name="nama_sub_bidangg" id="nama_sub_bidangg" type="text" class="form-control <?= ($validation->hasError('nama_sub_bidangg')) ? 'is-invalid' : ''; ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('nama_sub_bidangg'); ?>
                                </div>
                            </div>  
                        </div>
                    </div>
                </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary tombolTutup" data-bs-dismiss="modal">Tutup</button>
                <button type="submit" id="tombolEdit" class="btn btn-success"> <i class="fas fa-paper-plane"></i> Simpan</button>
            </div>
            </div>
        </div>
    </div>

<script src="<?= base_url(); ?>/jquery/jquery-3.6.0.js"></script>
<script>
    // $(document).ready(function () {

        // fungsi edit diambil dari button edit di onclick
        function f_editsubbidangp($id){
            $.ajax({
                url: "<?= htmlentities(base_url("master/f_editsubbidangp")) ?>/" + $id,
                type: "GET",
                success: function (hasil) {
                    var $data = $.parseJSON(hasil);
                    if ($data.id != '') {
                        $('#id').val($data.id);
                        $('#kodee').val($data.kode);
                        $('#nama_sub_bidangg').val($data.nama_sub_bidang);
                    }
                }
            });
        }

        $('#tombolEdit').on('click', function () {
            // buat variabel data yg akan dikirim, yang datanya diambil dari id inputan pada modal
            var $id = $('#id').val();
            var $id_bidang = <?= $databidang->id; ?>;
            var $kode = $('#kodee').val();
            var $nama_sub_bidang = $('#nama_sub_bidangg').val();

            // ajax
            $.ajax({
                type: "GET",
                url: "<?= htmlentities(base_url('master/proccesseditsubbidangp')); ?>",
                data: {
                    id: $id,
                    id_bidang: $id_bidang,
                    kode: $kode,
                    nama_sub_bidang: $nama_sub_bidang
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
            $('#nama_sub_bidang').val();
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
            var $nama_sub_bidang = $('#nama_sub_bidang').val();

            // ajax
            $.ajax({
                type: "GET",
                url: "<?= htmlentities(base_url('master/proccesstambahsubbidangp/' . $databidang->id)); ?>",
                data: {
                    kode: $kode,
                    nama_sub_bidang: $nama_sub_bidang
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