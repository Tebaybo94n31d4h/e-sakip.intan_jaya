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
    <form action="<?= htmlentities(base_url('master/proccessedithakakses')); ?>" method="POST" id="tab-content-1">
        <div class="card-header">
            <h4>Form Edit</h4>
        </div>
        <div class="mb-3 card">
            <div class="col-12 col-sm-12 col-lg-6" style="margin: auto;">
                <div class="card-body">
                    <?= csrf_field(); ?>
                    <input type="hidden" name="_method" value="PUT" />
                    <?php foreach ($edit as $e) :?>
                    <div class="position-relative form-group">
                        <input name="hah_id" id="hah_id" value="<?= htmlentities($e->id); ?>" type="hidden">
                        <label for="kd">Kode</label>
                        <input name="kd" id="kd" value="<?= htmlentities($e->kode); ?>" type="text" class="form-control <?= ($validation->hasError('kd')) ? 'is-invalid' : ''; ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('kd'); ?>
                        </div>
                    </div>
                    <div class="position-relative form-group">
                        <label for="nama_hah">Nama Hak Akses</label>
                        <input name="nama_hah" value="<?= htmlentities($e->nama_hak_akses); ?>" id="nama_hah" type="text" class="form-control <?= ($validation->hasError('nama_hah')) ? 'is-invalid' : ''; ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('nama_hah'); ?>
                        </div>
                    </div>
                    <?php endforeach; ?>
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