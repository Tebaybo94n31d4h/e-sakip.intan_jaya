<?= $this->extend('template/default'); ?>

<?= $this->section('content'); ?>

<div id="berhasil" data-berhasil="<?= session()->getFlashdata('berhasil');  ?>"></div>
<div id="update" data-update="<?= session()->getFlashdata('update');  ?>"></div>
<div id="sudah_ada" data-sudah_ada="<?= session()->getFlashdata('sudah_ada');  ?>"></div>
<div id="gagal" data-gagal="<?= session()->getFlashdata('gagal');  ?>"></div>
<div id="hapus" data-hapus="<?= session()->getFlashdata('hapus');  ?>"></div>

<div class="section-header">
    <h1><?= htmlentities($subtitle); ?></h1>
    
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="<?= htmlentities(base_url('/dashboards')); ?>">Dashboard</a></div>
        <!-- <div class="breadcrumb-item"><a href="#">Bootstrap Components</a></div> -->
        <div class="breadcrumb-item"><?= htmlentities($subtitle); ?></div>
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
    <div class="col-12 col-sm-12 col-lg-12">

        <!-- <div class="alert alert-danger" role="alert">
            <ul>
                <//?= $validation->listErrors() ?>
            </ul>
        </div> -->
        
        <div class="alert alert-danger" role="alert" style="display: none;"></div>
        
        <div class="card card-primary shadow">

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
                                <td><?= htmlentities($no); ?></td>
                                <td><?= htmlentities($user->nama_user); ?></td>
                                <td><?= htmlentities($user->username); ?></td>
                                <td><?= htmlentities($user->nama_hak_akses); ?></td>
                                <td><?= $user->opd_hdr_kode; ?></td>
                                <td class="text-center">
                                    <?php if ($user->is_active == 1) : ?>
                                        <div class="badge badge-sm badge-success">Aktif</div>
                                    <?php else: ?>
                                        <div class="badge badge-sm badge-danger">Tidak aktif</div>
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
<form action="<?= htmlentities(base_url('master/proccesstambahusers')); ?>" method="POST" id="tab-content-1" autocomplete="off">
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
                            <option value="<?= htmlentities($shu->id); ?>"><?= htmlentities($shu->nama_hak_akses); ?></option>
                            <?php endforeach; ?>
                        </select>
                        <div class="invalid-feedback">
                            <?= $validation->getError('hah_id'); ?>
                        </div>
                    </div>
                </div>
            <div class="row">
                <div class="card col-12 col-sm-12 col-lg-6">
                    <h6 class="text-primary">Data User</h6>
                    <div class="position-relative form-group">
                        <label for="opd_id">Nama OPD</label>
                        <select value="<?= old('opd_id') ?>" class="form-select <?= ($validation->hasError('opd_id')) ? 'is-invalid' : ''; ?>" name="opd_id" id="opd_id">
                            <option value="">-- Pilih OPD --</option>
                            <?php foreach($selectopduser as $sou) : ?>
                            <option value="<?= htmlentities($sou->id); ?>"><?= htmlentities($sou->nama_opd); ?></option>
                            <?php endforeach; ?>
                        </select>
                        <div class="invalid-feedback">
                            <?= $validation->getError('opd_id'); ?>
                        </div>
                    </div>
                    <div class="position-relative form-group">
                        <label for="p_id">Pegawai</label>1
                        <select value="<?= old('p_id') ?>" class="form-select <?= ($validation->hasError('p_id')) ? 'is-invalid' : ''; ?>" name="p_id" id="p_id">
                            <option value="">-- Pilih Pegawai --</option>
                            <?php foreach($selectpegawaiuser as $spu) : ?>
                            <option value="<?= htmlentities($spu->id); ?>">
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <th>Nip :</th>
                                                <td><?= htmlentities($spu->nip); ?></td>
                                            </tr>
                                            -
                                            <tr>
                                                <th>Nama : </th>
                                                <td><?= htmlentities($spu->nama_pegawai); ?></td>
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
                        <input name="nama_usr" id="nama_usr" value="<?= old('nama_usr') ?>" type="text" class="form-control <?= ($validation->hasError('nama_usr')) ? 'is-invalid' : ''; ?>" placeholder="Masukkan nama lengkap user">
                        <div class="invalid-feedback">
                            <?= $validation->getError('nama_usr'); ?>
                        </div>
                    </div>
                </div>
                <div class="card col-12 col-sm-12 col-lg-6">
                    <h6 class="text-primary">Data Akun</h6>
                    <div class="row">
                        <div class="position-relative form-group col-12 col-sm-12 col-lg-12">
                            <label for="usr">Username</label>
                            <input name="usr" id="usr" type="text" value="<?= old('usr') ?>" class="form-control <?= ($validation->hasError('usr')) ? 'is-invalid' : ''; ?>" placeholder="Masukkan username">
                            <div class="invalid-feedback">
                                <?= $validation->getError('usr'); ?>
                            </div>
                        </div>
                        <div class="card">
                            <div class="row">
                                <div class="position-relative form-group col-12 col-sm-12 col-lg-6">
                                    <label for="psswd">Password</label>
                                    <input name="psswd" id="psswd" type="password" class="form-control <?= ($validation->hasError('psswd')) ? 'is-invalid' : ''; ?>" placeholder="Masukkan password">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('psswd'); ?>
                                    </div>
                                </div>
                                <div class="position-relative form-group col-12 col-sm-12 col-lg-6">
                                    <label for="psswd2">Konfirmasi Password</label>
                                    <input name="psswd2" id="psswd2" type="password" class="form-control <?= ($validation->hasError('psswd2')) ? 'is-invalid' : ''; ?>" placeholder="Masukkan konfirmasi password">
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
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
        <button type="submit" class="btn btn-success"> <i class="fas fa-paper-plane"></i> Simpan</button>
      </div>
    </div>
  </div>
</div>
</form>
<script src="<?= base_url(); ?>/jquery/jquery-3.6.0.js"></script>

<?= $this->endSection() ;?>