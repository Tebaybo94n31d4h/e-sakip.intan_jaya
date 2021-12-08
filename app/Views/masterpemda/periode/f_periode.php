<?= $this->extend('template/default'); ?>

<?= $this->section('content'); ?>

<div class="section-header">
    
    

     <h1> <?= htmlentities($subtitle); ?></h1>

    <div class="section-header-breadcrumb pr-2">
        <div class="breadcrumb-item active"><a href="<?= htmlentities(base_url('admin/dashboardp')); ?>">Dashboard </a> </div>
        <div class="breadcrumb-item"><?= htmlentities($subtitle); ?></div>
    </div>

    <div class="section-header-back">
        <form action="<?= htmlentities(base_url('periode/periodep')); ?>" method="post">
            <?= csrf_field() ;?>
            <button class="btn mt-2 mb-2 btn-primary">
                <i class="fas fa-arrow-left"></i> 
            </button>
        </form>
    </div>
    
</div>

<div class="section-body">
    <div class="card">
        <form action="<?= htmlentities(base_url('periode/proccesstambahperiodep')); ?>" method="POST" id="tab-content-1">
            <div class="card-header">
                <h4 class="card-title">Form Tambah</h4>
            </div>
                <div class="col-12 col-sm-12 col-lg-6 m-auto">
                    <div class="mb-3 card">
                            <div class="card-body table-responsive">
                                    <?= csrf_field(); ?>
                                    <div class="row">
                                        <div class="position-relative form-group col-12 col-sm-6 col-lg-6">
                                            <label for="tahun_awal">Tahun Awal <strong class="text-danger"><sup>*</sup></strong> </label>
                                            <input name="tahun_awal" value="<?= old('tahun_awal') ?>" id="tahun_awal" type="text" class="form-control <?= ($validation->hasError('tahun_awal')) ? 'is-invalid' : ''; ?>" placeholder="Masukkan tahun awal">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('tahun_awal'); ?>
                                            </div>
                                        </div>
                                        <div class="position-relative form-group col-12 col-sm-6 col-lg-6">
                                            <label for="tahun_akhir">Tahun Akhir <strong class="text-danger"><sup>*</sup></strong></label>
                                            <input name="tahun_akhir" value="<?= old('tahun_akhir') ?>" id="tahun_akhir" type="text" class="form-control <?= ($validation->hasError('tahun_akhir')) ? 'is-invalid' : ''; ?>" placeholder="Masukkan tahun akhir">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('tahun_akhir'); ?>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                            
                    </div>
                </div>
            <div class="card-footer text-right">
                <button type="submit" class="mt-1 ml-3 mr-1 btn btn-success"> <i class="fas fa-paper-plane"></i> Simpan</button>
                <a href="<?= htmlentities(base_url('periode/periodep')); ?>" class="mt-1 btn btn-secondary">Batal</a>
            </div>
        </form>
    </div>
</div>

<?= $this->endSection() ;?>