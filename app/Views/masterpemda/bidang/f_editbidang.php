<?= $this->extend('template/default'); ?>

<?= $this->section('content'); ?>

<div class="section-header">
    <h1><?= $subtitle; ?></h1>
    
    <div class="section-header-breadcrumb pr-2">
        <div class="breadcrumb-item active"><a href="<?= base_url('admin/dashboardp'); ?>">Dashboard</a></div>
        <!-- <div class="breadcrumb-item"><a href="#">Bootstrap Components</a></div> -->
        <div class="breadcrumb-item"><?= $subtitle; ?></div>
    </div>
    <div class="section-header-back">
        <form action="<?= base_url('master/bidangp'); ?>" method="post">
            <button class="btn btn-primary">
                <i class="fas fa-arrow-left"></i> 
            </button>
        </form>
    </div>
</div>

<div class="section-body">
    <div class="card">
        <form action="<?= base_url('master/proccesseditbidangp'); ?>" method="POST" id="tab-content-1">

            <div class="card-header">
                <h4 class="card-title">Form Edit</h4>
            </div>

            <div class="col-sm-6 m-auto">

                <div class="mb-3 card">
                    <div class="card-body">
                        <?= csrf_field(); ?>
                        <!-- <div class="row"> -->
                            <div class="position-relative form-group">
                                <label for="kode">Kode</label>
                                <input type="hidden" value="<?= $edit->id; ?>" name="id" id="id">
                                <input name="kode" value="<?= $edit->kode; ?>" id="kode" type="text" class="form-control <?= ($validation->hasError('kode')) ? 'is-invalid' : ''; ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('kode'); ?>
                                </div>
                            </div>
                        <!-- </div> -->
                            <div class="position-relative form-group">
                                    <label for="nama_bidang">Nama Bidang</label>
                                    <input name="nama_bidang" value="<?= $edit->nama_bidang; ?>" id="nama_bidang" type="text" class="form-control <?= ($validation->hasError('nama_bidang')) ? 'is-invalid' : ''; ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('nama_bidang'); ?>
                                    </div>
                            </div>
                    </div>
                </div>

            </div>

            <div class="card-footer text-right">
                <button type="submit" class="btn btn-success"> <i class="fas fa-paper-plane"></i> Simpan</button>
                <a href="<?= base_url('master/bidangp'); ?>" class="ml-1 btn btn-secondary">Batal</a>
            </div>

        </form>        
    </div>
</div>

<?= $this->endSection() ;?>