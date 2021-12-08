<?= $this->extend('template/default'); ?>

<?= $this->section('content'); ?>

<div class="section-header">
    <h1><?= htmlentities($subtitle); ?></h1>
    
    <div class="section-header-breadcrumb pr-2">
        <div class="breadcrumb-item active"><a href="<?= htmlentities(base_url('admin/dashboard')); ?>">Dashboard</a></div>
        <!-- <div class="breadcrumb-item"><a href="#">Bootstrap Components</a></div> -->
        <div class="breadcrumb-item"><?= htmlentities($subtitle); ?></div>
    </div>
    <div class="section-header-back">
        <form action="<?= htmlentities(base_url('master/bidangs/'. $back)); ?>" method="post">
            <button class="btn btn-primary">
                <i class="fas fa-arrow-left"></i> 
            </button>
        </form>
    </div>
</div>

<div class="section-body" style="font-size: 12px;">
    <div class="card">
        <form action="<?= htmlentities(base_url('master/proccesseditbidangs')); ?>" method="POST" id="tab-content-1">

            <div class="card-header">
                <h4 class="card-title">Form Edit</h4>
            </div>

            <div class="col-sm-6 m-auto">

                <div class="mb-3 mt-3 card">
                    <div class="card-body">
                        <?= csrf_field(); ?>
                            <div class="position-relative form-group">
                                <label for="kode">Kode</label>
                                <input type="hidden" value="<?= htmlentities($edit->id); ?>" name="id" id="id">
                                <input name="kode" value="<?= htmlentities($edit->kode); ?>" id="kode" type="text" class="form-control <?= ($validation->hasError('kode')) ? 'is-invalid' : ''; ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('kode'); ?>
                                </div>
                            </div>
                            <div class="position-relative form-group">
                                    <label for="nama_bidang">Nama Bidang</label>
                                    <input name="nama_bidang" value="<?= htmlentities($edit->nama_bidang); ?>" id="nama_bidang" type="text" class="form-control <?= ($validation->hasError('nama_bidang')) ? 'is-invalid' : ''; ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('nama_bidang'); ?>
                                    </div>
                            </div>
                    </div>
                </div>

            </div>

            <div class="card-footer text-right">
                <button type="submit" class="btn btn-success"> <i class="fas fa-paper-plane"></i> Simpan</button>
                <a href="<?= htmlentities(base_url('master/bidangs/'. $back)); ?>" class="ml-1 btn btn-secondary">Batal</a>
            </div>

        </form>        
    </div>
</div>

<?= $this->endSection() ;?>