<?= $this->extend('template/default'); ?>

<?= $this->section('content'); ?>

<div id="berhasil" data-berhasil="<?= session()->getFlashdata('berhasil');  ?>"></div>
<div id="update" data-update="<?= session()->getFlashdata('update');  ?>"></div>
<div id="sudah_ada" data-sudah_ada="<?= session()->getFlashdata('sudah_ada');  ?>"></div>
<div id="gagal" data-gagal="<?= session()->getFlashdata('gagal');  ?>"></div>
<div id="hapus" data-hapus="<?= session()->getFlashdata('hapus');  ?>"></div>

<div class="section-header">
    <h1><?= $subtitle; ?></h1>
    
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="<?= base_url('/dashboards'); ?>">Dashboard</a></div>
        <!-- <div class="breadcrumb-item"><a href="#">Bootstrap Components</a></div> -->
        <div class="breadcrumb-item"><?= $subtitle; ?></div>
    </div>
    <div class="section-header-button">
        <!-- <form action="</?= base_url('master/f_users'); ?>" method="post">
            <button class="btn btn-primary">
                <i class="fas fa-plus"></i>
                <span>TAMBAH BARU</span>
            </button>
        </form> -->
<!-- Button trigger modal -->
        <button type="button" class="btn btn-primary btn-icon icon-left btn-tambah" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
            <i class="fas fa-plus"></i> Tambah Baru
        </button>
    </div>
</div>

<div class="section-body" style="font-size: 12px;">
    <h2 class="section-title">Data User</h2>
    <p class="section-lead">
        Informasi tentang data user dihalaman ini.
    </p>
    <div class="col-sm-12">
        <div class="card card-primary shadow">
                <!-- <div class="card-header">
                    <h4>Data User</h4>
                </div> -->
                <div class="card-body table-responsive">

                    <table class="table table-striped table-sm table-hover" id="table-1">
                        <thead style="background-color: rgba(90, 69, 250, 0.867); color: yellow;">
                            <tr>
                                <th rowspan="1" colspan="1" style="width: 2%;">No</th>
                                <th rowspan="1" colspan="1" style="width: 30%;">Nama User</th>
                                <th rowspan="1" colspan="1">Username</th>
                                <th rowspan="1" colspan="1">Hak Akses</th>
                                <th rowspan="1" colspan="1">Nama OPD</th>
                                <th rowspan="1" colspan="1" class="text-center">Is Active</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            <?php foreach ($procedure as $user) :  ?>
                            <tr class="odd">
                                <td><?= $no; ?></td>
                                <td><?= $user->nama_user; ?></td>
                                <td><?= $user->username; ?></td>
                                <td><?= $user->nama_hak_akses; ?></td>
                                <td><?= $user->opd_hdr_kode; ?></td>
                                <td class="text-center">
                                    <?php if ($user->is_active == 1) : ?>
                                        <span style="font-size: 12px; padding: 0 8px; color: whitesmoke;" class="bg-success">Aktif</span>
                                    <?php else: ?>
                                        <span style="font-size: 12px; padding: 0 8px; color: whitesmoke;" class="bg-danger">Tidak aktif</span>
                                    <?php endif; ?>
                                </td>
                            </tr>
                            <?php $no++; ?>
                            <?php endforeach; ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th rowspan="1" colspan="1" style="width: 2%;">No</th>
                                <th rowspan="1" colspan="1" style="width: 30%;">Nama User</th>
                                <th rowspan="1" colspan="1">Username</th>
                                <th rowspan="1" colspan="1">Hak Akses</th>
                                <th rowspan="1" colspan="1">Nama OPD</th>
                                <th rowspan="1" colspan="1" class="text-center">Is Active</th>
                            </tr>
                        </tfoot>
                    </table>
                    
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Modal Tambah -->
<!-- <form action="</?= base_url('master/proccesstambahusers'); ?>" method="POST" id="tab-content-1"> -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header" style="background-color: rgba(90, 69, 250, 0.867);">
        <h5 style="font-size: 16px; color: yellow;" class="modal-title mb-3" id="staticBackdropLabel">Form Tambah</h5>
        <button type="button" class="btn-close mb-3 tombolTutup" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <!-- alert error -->
        <div class="alert alert-danger error" role="alert" style="display: none;"></div>
        <!-- alert sukses -->
        <div class="alert alert-primary sukses" role="alert" style="display: none;"></div>

            <?= csrf_field(); ?>
                <div class="card">
                    <h6 class="text-primary">Hak Akses</h6>
                    <div class="position-relative form-group">
                        <label for="hah_id">Hak Akses</label>
                        <select value="<?= old('hah_id') ?>" class="form-select <?= ($validation->hasError('hah_id')) ? 'is-invalid' : ''; ?>" name="hah_id" id="hah_id">
                            <option value="">-- Pilih Hak Akses --</option>
                            <?php foreach($selecthakaksesuser as $shu) : ?>
                            <option value="<?= $shu->id; ?>"><?= $shu->nama_hak_akses; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <div class="invalid-feedback">
                            <?= $validation->getError('hah_id'); ?>
                        </div>
                    </div>
                </div>
            <div class="row">
                <div class="card col">
                    <h6 class="text-primary">Data User</h6>
                    <div class="position-relative form-group">
                        <label for="opd_id">Nama OPD</label>
                        <select value="<?= old('opd_id') ?>" class="form-select <?= ($validation->hasError('opd_id')) ? 'is-invalid' : ''; ?>" name="opd_id" id="opd_id">
                            <option value="">-- Pilih OPD --</option>
                            <?php foreach($selectopduser as $sou) : ?>
                            <option value="<?= $sou->id; ?>"><?= $sou->nama_opd; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <div class="invalid-feedback">
                            <?= $validation->getError('opd_id'); ?>
                        </div>
                    </div>
                    <div class="position-relative form-group">
                        <label for="p_id">Pegawai</label>
                        <select value="<?= old('p_id') ?>" class="form-select <?= ($validation->hasError('p_id')) ? 'is-invalid' : ''; ?>" name="p_id" id="p_id">
                            <option value="">-- Pilih Pegawai --</option>
                            <?php foreach($selectpegawaiuser as $spu) : ?>
                            <option value="<?= $spu->id; ?>">
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <th>Nip :</th>
                                                <td><?= $spu->nip; ?></td>
                                            </tr>
                                            -
                                            <tr>
                                                <th>Nama : </th>
                                                <td><?= $spu->nama_pegawai; ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                            <?php endforeach; ?>
                        </select>
                        <div class="invalid-feedback">
                            <?= $validation->getError('p_id'); ?>
                        </div>
                    </div>
                    <div class="position-relative form-group">
                        <label for="nama_usr">Nama Lengkap User</label>
                        <input name="nama_usr" id="nama_usr" value="<?= old('nama_usr') ?>" type="text" class="form-control <?= ($validation->hasError('nama_usr')) ? 'is-invalid' : ''; ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('nama_usr'); ?>
                        </div>
                    </div>
                </div>
                <div class="card col">
                    <h6 class="text-primary">Data Akun</h6>
                    <div class="row">
                        <div class="position-relative form-group col">
                            <label for="usr">Username</label>
                            <input name="usr" id="usr" type="text" value="<?= old('usr') ?>" class="form-control <?= ($validation->hasError('usr')) ? 'is-invalid' : ''; ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('usr'); ?>
                            </div>
                        </div>
                        <div class="card">
                            <div class="row">
                                <div class="position-relative form-group col">
                                    <label for="psswd">Password</label>
                                    <input name="psswd" id="psswd" type="password" class="form-control <?= ($validation->hasError('psswd')) ? 'is-invalid' : ''; ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('psswd'); ?>
                                    </div>
                                </div>
                                <div class="position-relative form-group col">
                                    <label for="psswd2">Konfirmasi Password</label>
                                    <input name="psswd2" id="psswd2" type="password" class="form-control <?= ($validation->hasError('psswd2')) ? 'is-invalid' : ''; ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('psswd2'); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary tombolTutup" data-bs-dismiss="modal">Tutup</button>
        <button type="submit" class="btn btn-success" id="tombolSimpan"> <i class="fas fa-paper-plane"></i> Simpan</button>
      </div>
    </div>
  </div>
</div>
<!-- </form> -->
<script src="<?= base_url(); ?>/jquery/jquery-3.6.0.js"></script>

<script>
        // bersihkan form tambah data
        function bersihkan(){
            $('#nama_usr').val();
            $('#usr').val();
            $('#psswd').val();
            $('#psswd2').val();
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
            var $hah_id = $('#hah_id').val();
            var $opd_id = $('#opd_id').val();
            var $p_id = $('#p_id').val();
            var $nama_usr = $('#nama_usr').val();
            var $usr = $('#usr').val();
            var $psswd = $('#psswd').val();
            var $psswd2 = $('#psswd2').val();

            // ajax
            $.ajax({
                type: "POST",
                url: "<?= base_url('master/proccesstambahusers'); ?>",
                data: {
                    hah_id: $hah_id,
                    opd_id: $opd_id,
                    p_id: $p_id,
                    nama_usr: $nama_usr,
                    usr: $usr,
                    psswd: $psswd,
                    psswd2: $psswd2
                },
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