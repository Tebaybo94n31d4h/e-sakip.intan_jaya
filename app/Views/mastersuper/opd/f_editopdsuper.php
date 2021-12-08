<?= $this->extend('template/default'); ?>

<?= $this->section('content'); ?>

<div id="sudah_ada" data-sudah_ada="<?= session()->getFlashdata('sudah_ada');  ?>"></div>
<div id="gagal" data-gagal="<?= session()->getFlashdata('gagal');  ?>"></div>

<div class="section-header">
    
     <h1> <?= $subtitle; ?></h1>

    <div class="section-header-breadcrumb pr-2">
        <div class="breadcrumb-item active"><a href="<?= base_url('admin/dashboard'); ?>">Dashboard</a></div>
        <!-- <div class="breadcrumb-item"><a href="#">Bootstrap Components</a></div> -->
        <div class="breadcrumb-item"><?= $subtitle; ?></div>
    </div>

    <div class="section-header-back">
        <form action="<?= base_url('master/opds'); ?>" method="post">
            <?= csrf_field() ;?>
            <button class="btn btn-primary">
                <i class="fas fa-arrow-left"></i> 
            </button>
        </form>
    </div>
    
</div>

<div class="section-body">
    <div class="card">
        <form action="<?= base_url('master/proccesseditopds'); ?>" method="POST" id="tab-content-1">

            <div class="card-header">
                <h4 class="card-title">Form Edit</h4>
            </div>

            <div class="mb-3 mt-3 card">
                <div class="card-body table-responsive">
                    <?= csrf_field(); ?>
                    <input type="hidden" name="_method" value="PUT" />
                    <div class="card">
                        <div class="row">
                            <div class="col-12 col-sm-6 col-lg-6">
                                <div class="position-relative form-group">
                                    <input type="hidden" name="id_opd" value="<?= $dataopd['id']; ?>">
                                    <label for="kode">Kode</label>
                                    <input name="kode" id="kode" value="<?= $dataopd['kode']; ?>" type="text" readonly class="form-control <?= ($validation->hasError('kode')) ? 'is-invalid' : ''; ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('kode'); ?>
                                    </div>
                                </div>
                                <div class="position-relative form-group">
                                    <label for="no_unit_kerja">Nomor Unit Kerja</label>
                                    <input name="no_unit_kerja" value="<?= $dataopd['nomor_unit_kerja']; ?>" id="no_unit_kerja" type="text" class="form-control <?= ($validation->hasError('no_unit_kerja')) ? 'is-invalid' : ''; ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('no_unit_kerja'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-lg-6">
                                <p class="card-title text-primary" style="font-size: 16px; font-weight: bold;">Pilih Opsi</p>
                                <div class="position-relative form-group">
                                    <label for="lvl_opd_id">Level</label>
                                    <select class="form-select" name="lvl_opd_id" id="lvl_opd_id">
                                        <?php foreach($levelopd as $lo) : ?>
                                            <?php if ($lo->id == $dataopd['level']) :?>
                                                <option value="<?= $lo->id; ?>" selected><?= $lo->nama_level; ?></option>
                                            <?php else: ?>
                                                <option value="<?= $lo->id; ?>"><?= $lo->nama_level; ?></option>
                                            <?php endif; ?>
                                        <?php endforeach ; ?>
                                    </select>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('lvl_opd_id'); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-3 card">
                        <p class="card-title text-primary" style="font-size: 16px; font-weight: bold;">Biodata OPD</p>
                        <div class="position-relative form-group">
                            <label for="nama_opd">Nama OPD</label>
                            <input name="nama_opd" value="<?= $dataopd['nama_opd']; ?>" id="nama_opd" type="text" class="form-control <?= ($validation->hasError('nama_opd')) ? 'is-invalid' : ''; ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('nama_opd'); ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-sm-6 col-lg-6">
                                <div class="position-relative form-group">
                                    <label for="alamat">Alamat</label>
                                    <input name="alamat" id="alamat" value="<?= $dataopd['alamat_opd']; ?>" type="text" class="form-control <?= ($validation->hasError('alamat')) ? 'is-invalid' : ''; ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('alamat'); ?>
                                    </div>
                                </div>
                                <div class="position-relative form-group">
                                    <label for="kode_pos">Kode POS</label>
                                    <input name="kode_pos" id="kode_pos" value="<?= $dataopd['kode_pos']; ?>" type="text" class="form-control <?= ($validation->hasError('kode_pos')) ? 'is-invalid' : ''; ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('kode_pos'); ?>
                                    </div>
                                </div>
                                <div class="position-relative form-group">
                                    <label for="telepon">Telepon</label>
                                    <input name="telepon" value="<?= $dataopd['telepon']; ?>" id="telepon" type="text" class="form-control <?= ($validation->hasError('telepon')) ? 'is-invalid' : ''; ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('telepon'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-lg-6">
                                <div class="position-relative form-group">
                                    <label for="email">Email</label>
                                    <input name="email" id="email" value="<?= $dataopd['email']; ?>" type="text" class="form-control <?= ($validation->hasError('email')) ? 'is-invalid' : ''; ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('email'); ?>
                                    </div>
                                </div>
                                <div class="position-relative form-group">
                                    <label for="website">Website</label>
                                    <input name="website" id="website" value="<?= $dataopd['website']; ?>" type="text" class="form-control <?= ($validation->hasError('website')) ? 'is-invalid' : ''; ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('website'); ?>
                                    </div>
                                </div>
                                <div class="position-relative form-group">
                                    <label for="fax">FAX</label>
                                    <input name="fax" id="fax" value="<?= $dataopd['fax']; ?>" type="text" class="form-control <?= ($validation->hasError('fax')) ? 'is-invalid' : ''; ?>">
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
                <a href="<?= base_url('master/opds'); ?>" class="mt-1 btn btn-secondary">Batal</a>
            </div>

        </form>        
    </div>
</div>

        <div class="row">
            <div class="col-sm" style="margin: auto;">
                
            </div>
        </div>

<?= $this->endSection() ;?>