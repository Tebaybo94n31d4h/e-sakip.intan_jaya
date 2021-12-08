<?= $this->extend('template/default'); ?>

<?= $this->section('content'); ?>

<div id="berhasil" data-berhasil="<?= session()->getFlashdata('berhasil');  ?>"></div>
<div id="update" data-update="<?= session()->getFlashdata('update');  ?>"></div>
<div id="sudah_ada" data-sudah_ada="<?= session()->getFlashdata('sudah_ada');  ?>"></div>
<div id="gagal" data-gagal="<?= session()->getFlashdata('gagal');  ?>"></div>
<div id="hapus" data-hapus="<?= session()->getFlashdata('hapus');  ?>"></div>

<div class="section-header">
    <h1> <?= $subtitle; ?></h4>

    <div class="section-header-breadcrumb pr-2">
        <div class="breadcrumb-item active"><a href="<?= base_url('admin/dashboard'); ?>">Dashboard </a> </div>
        <!-- <div class="breadcrumb-item"><a href="#">Bootstrap Components</a></div> -->
        <div class="breadcrumb-item"><?= $subtitle; ?></div>
    </div>

    <div class="section-header-back">
        <form action="<?= htmlentities(base_url('master/opds')); ?>" method="post">
            <?= csrf_field(); ?>
            <button class="btn btn-primary">
                <i class="fas fa-arrow-left"></i> 
            </button>
        </form>
    </div>
    
</div>

<div class="section-body">
    <div class="card">
        
        <form action="<?= htmlentities(base_url('master/proccesstambahopds')); ?>" method="POST" id="tab-content-1">

            <div class="card-header">
                <h4 class="card-title">Form Tambah</h4>
            </div>
            <div class="mb-3 mt-3 card">
                <div class="card-body table-responsive">
                    <?= csrf_field(); ?>
                    
                    <div class="card">
                        <div class="row">
                            <div class="col-12 col-sm-6 col-lg-6">
                                <div class="position-relative form-group">
                                    <label for="kode">Kode <strong class="text-danger"><sup>*</sup></strong> </label>
                                    <input name="kode" id="kode" value="<?= old('kode') ?>" type="text" class="form-control <?= ($validation->hasError('kode')) ? 'is-invalid' : ''; ?>" placeholder="Masukkan kode opd">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('kode'); ?>
                                    </div>
                                </div>
                                <div class="position-relative form-group">
                                    <label for="no_unit_kerja">Nomor Unit Kerja <strong class="text-danger"><sup>*</sup></strong></label>
                                    <input name="no_unit_kerja" value="<?= old('no_unit_kerja') ?>" id="no_unit_kerja" type="text" class="form-control <?= ($validation->hasError('no_unit_kerja')) ? 'is-invalid' : ''; ?>" placeholder="Masukkan nomor unit kerja">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('no_unit_kerja'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-lg-6">
                                <p class="card-title text-primary" style="font-size: 16px; font-weight: bold;">Pilih Opsi</p>
                                <div class="position-relative form-group col">
                                    <label for="type">Type OPD <strong class="text-danger"><sup>*</sup></strong></label>
                                    <select class="form-select <?= ($validation->hasError('type')) ? 'is-invalid' : ''; ?>" name="type" id="type">
                                        <option value="">-- PILIH KATEGORI --</option>
                                        <?php foreach($selectTipeOpd as $st) : ?>
                                        <option value="<?= htmlentities($st->id); ?>"><?= htmlentities($st->tipe); ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('type'); ?>
                                    </div>
                                </div>
                                <div class="position-relative form-group col">
                                    <label for="lvl_opd_id">Level <strong class="text-danger"><sup>*</sup></strong></label>
                                    <select class="form-select <?= ($validation->hasError('lvl_opd_id')) ? 'is-invalid' : ''; ?>" name="lvl_opd_id" id="lvl_opd_id">
                                        <option value="">-- PILIH LEVEL --</option>
                                        <?php foreach($levelopd as $lo) : ?>
                                            <option value="<?= htmlentities($lo->id); ?>"><?= htmlentities($lo->nama_level); ?></option>
                                        <?php endforeach ; ?>
                                    </select>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('lvl_opd_id'); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class=" mt-3 card">
                        <p class="card-title text-primary" style="font-size: 16px; font-weight: bold;">Biodata OPD</p>
                        <div class="position-relative form-group">
                            <label for="nama_opd">Nama OPD <strong class="text-danger"><sup>*</sup></strong></label>
                            <input name="nama_opd" value="<?= old('nama_opd') ?>" id="nama_opd" type="text" class="form-control <?= ($validation->hasError('nama_opd')) ? 'is-invalid' : ''; ?>" placeholder="Masukkan nama opd baru">
                            <div class="invalid-feedback">
                                <?= $validation->getError('nama_opd'); ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-sm-6 col-lg-6">
                                <div class="position-relative form-group">
                                    <label for="alamat">Alamat</label>
                                    <input name="alamat" value="<?= old('alamat') ?>" id="alamat" type="text" class="form-control <?= ($validation->hasError('alamat')) ? 'is-invalid' : ''; ?>" placeholder="Masukkan alamat opd">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('alamat'); ?>
                                    </div>
                                </div>
                                <div class="position-relative form-group">
                                    <label for="kode_pos">Kode POS</label>
                                    <input name="kode_pos" value="<?= old('kode_pos') ?>" id="kode_pos" type="text" class="form-control <?= ($validation->hasError('kode_pos')) ? 'is-invalid' : ''; ?>" placeholder="98816">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('kode_pos'); ?>
                                    </div>
                                </div>
                                <div class="position-relative form-group">
                                    <label for="telepon">Telepon</label>
                                    <input name="telepon" value="<?= old('telepon') ?>" id="telepon" type="text" class="form-control <?= ($validation->hasError('telepon')) ? 'is-invalid' : ''; ?>" placeholder="0852xxxxxxxx">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('telepon'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="position-relative form-group">
                                    <label for="email">Email</label>
                                    <input name="email" value="<?= old('email') ?>" id="email" type="email" class="form-control <?= ($validation->hasError('email')) ? 'is-invalid' : ''; ?>" placeholder="Jhon@gmail.com">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('email'); ?>
                                    </div>
                                </div>
                                <div class="position-relative form-group">
                                    <label for="website">Website</label>
                                    <input name="website" value="<?= old('website') ?>" id="website" type="text" class="form-control <?= ($validation->hasError('website')) ? 'is-invalid' : ''; ?>" placeholder="https://www.contoh.co.id">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('website'); ?>
                                    </div>
                                </div>
                                <div class="position-relative form-group">
                                    <label for="fax">FAX</label>
                                    <input name="fax" value="<?= old('fax') ?>" id="fax" type="text" class="form-control <?= ($validation->hasError('fax')) ? 'is-invalid' : ''; ?>" placeholder="021-xxx xxxx">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('fax'); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer text-right">
                <button type="submit" class="mt-1 ml-3 mr-1 btn btn-success"> <i class="fas fa-paper-plane"></i> Simpan</button>
                <a href="<?= htmlentities(base_url('master/opds')); ?>" class="mt-1 btn btn-secondary">Batal</a>
            </div>
        </form>
    </div>
</div>

<?= $this->endSection() ;?>