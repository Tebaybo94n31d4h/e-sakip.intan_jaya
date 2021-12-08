<?= $this->extend('template/default'); ?>

<?= $this->section('content'); ?>

<div class="section-header">

<div id="gagal" data-gagal="<?= session()->getFlashdata('gagal');  ?>"></div>

     <h1> <?= htmlentities($subtitle); ?></h1>

    <div class="section-header-breadcrumb pr-2">
        <div class="breadcrumb-item active"><a href="<?= htmlentities(base_url('admin/dashboards')); ?>">Dashboard </a> </div>
        <!-- <div class="breadcrumb-item"><a href="#">Bootstrap Components</a></div> -->
        <div class="breadcrumb-item"><?= htmlentities($subtitle); ?></div>
    </div>

    <div class="section-header-back">
        <form action="<?= htmlentities(base_url('master/hakakses')); ?>" method="post">
            <?= csrf_field(); ?>
            <button class="btn btn-primary">
                <i class="fas fa-arrow-left"></i> 
            </button>
        </form>
    </div>
    
</div>

<div class="section" style="font-size: 12px;">
    <div class="card">
    <form action="<?= htmlentities(base_url('master/proccesstambahhakakses')); ?>" method="POST" id="tab-content-1">
        <?= csrf_field(); ?>
        <div class="card-header">
            <h4>Form Tambah</h4>
        </div>
        <div class="mb-3 card">
            <div class="col-12 col-sm-12 col-lg-6" style="margin: auto;">
                <div class="card-body">
                    <div class="position-relative form-group">
                        <label for="kd">Kode</label>
                        <input name="kd" id="kd" type="text" value="<?= old('kd') ?>" class="form-control <?= ($validation->hasError('kd')) ? 'is-invalid' : ''; ?>" placeholder="Masukkan kode hak akses">
                        <div class="invalid-feedback">
                            <?= $validation->getError('kd'); ?>
                        </div>
                    </div>
                    <div class="position-relative form-group">
                        <label for="nama_hah">Nama Hak Akses</label>
                        <input name="nama_hah" id="nama_hah" value="<?= old('nama_hah') ?>" type="text" class="form-control <?= ($validation->hasError('nama_hah')) ? 'is-invalid' : ''; ?>" placeholder="Masukkan nama hak akses">
                        <div class="invalid-feedback">
                            <?= $validation->getError('nama_hah'); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer text-right">
            <button type="submit" class="mt-1 ml-3 mr-1 btn btn-success"> <i class="fas fa-paper-plane"></i> Simpan</button>
            <a href="<?= htmlentities(base_url('master/hakakses')); ?>" class="mt-1 btn btn-secondary">Batal</a>
        </div>
    </form>
    </div>
</div>



<?= $this->endSection() ;?>