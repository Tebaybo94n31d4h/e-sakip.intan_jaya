<?= $this->extend('template/default'); ?>

<?= $this->section('content'); ?>

<div class="section-header">
    
    

     <h1> <?= htmlentities($subtitle); ?></h1>

    <div class="section-header-breadcrumb pr-2">
        <div class="breadcrumb-item active"><a href="<?= htmlentities(base_url('admin/dashboardp')); ?>">Dashboard </a> </div>
        <div class="breadcrumb-item"><?= htmlentities($subtitle); ?></div>
    </div>

    <div class="section-header-back">
        <form action="<?= htmlentities(base_url('rpjmd/tujuanp')); ?>" method="post">
            <?= csrf_field() ;?>
            <button class="btn btn-primary">
                <i class="fas fa-arrow-left"></i> 
            </button>
        </form>
    </div>
    
</div>

<div class="section-body">
    <div class="card">
        <form action="<?= htmlentities(base_url('rpjmd/proccesstambahtujuanp')); ?>" method="POST" id="tab-content-1">
            <div class="card-header">
                <h4 class="card-title">Form Tambah</h4>
            </div>
            <div class="col-12 col-sm-12 col-lg-12 m-auto">
                <div class="mb-3 card">
                    <div class="card-body table-responsive">
                        <?= csrf_field(); ?>
                        <div class="row mb-3">
                            <div class="col-sm-2"><label for="ms_id">Misi</label></div>
                            <div class="col-sm-10">
                                <select class="form-control <?= ($validation->hasError('ms_id')) ? 'is-invalid' : ''; ?>" name="ms_id" id="ms_id">
                                    <option value="">-- Pilih Misi --</option>
                                    <?php foreach($selectmisi as $sm) : ?>
                                        <option value="<?= htmlentities($sm->id); ?>"><?= htmlentities($sm->no_urut); ?> <?= $sm->misi; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('ms_id'); ?>
                                </div>
                            </div>  
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-2"><label for="n_urut">Nomor Urut <strong class="text-danger"><sup>*</sup></strong> </label></div>
                            <div class="col sm-10">
                                <input name="n_urut" value="<?= old('n_urut') ;?>" id="n_urut" type="number" class="form-control <?= ($validation->hasError('n_urut')) ? 'is-invalid' : ''; ?>" placeholder="Masukkan nomor urut">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('n_urut'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <div class="col-sm-2"><label for="tj">Tujuan <strong class="text-danger"><sup>*</sup></strong></label></div>
                            <div class="col-sm-10">
                            <textarea class="form-control <?= ($validation->hasError('tj')) ? 'is-invalid' : ''; ?>" placeholder="Masukkan tujuan"></textarea>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('tj'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                
                </div>
            </div>
            <div class="card-footer text-right">
                <button type="submit" class="mt-1 ml-3 mr-1 btn btn-success"> <i class="fas fa-paper-plane"></i> Simpan</button>
                <a href="<?= htmlentities(base_url('rpjmd/tujuanp')); ?>" class="mt-1 btn btn-secondary">Batal</a>
            </div>
        </form>
    </div>
</div>

<?= $this->endSection() ;?>