<?= $this->extend('template/default'); ?>

<?= $this->section('content'); ?>

<div class="section-header">
    
    

     <h1> <?= $subtitle; ?></h1>

    <div class="section-header-breadcrumb pr-2">
        <div class="breadcrumb-item active"><a href="<?= base_url('admin/dashboardp'); ?>">Dashboard </a> </div>
        <div class="breadcrumb-item"><?= $subtitle; ?></div>
    </div>

    <div class="section-header-back">
        <form action="<?= base_url('rpjmd/misip'); ?>" method="post">
            <button class="btn btn-primary">
                <i class="fas fa-arrow-left"></i> 
            </button>
        </form>
    </div>
    
</div>

<div class="section-body">
    <div class="card">
        <form action="<?= base_url('rpjmd/proccesstambahmisip'); ?>" method="POST" id="tab-content-1">
            <div class="card-header">
                <h4 class="card-title">Form Tambah</h4>
            </div>
            <div class="col-sm-10 m-auto">
                <div class="mb-3 card">
                    <div class="card-body table-responsive">
                        <?= csrf_field(); ?>
                        <div class="row mb-3">
                            <div class="col-sm-2"><label for="vs_id">Visi</label></div>
                            <div class="col-sm-10">
                                <select class="form-control <?= ($validation->hasError('vs_id')) ? 'is-invalid' : ''; ?>" name="vs_id" id="vs_id">
                                    <option value="">-- Pilih Visi --</option>
                                    <?php foreach($selectvisi as $sv) : ?>
                                        <option value="<?= $sv->id; ?>"><?= $sv->no_urut; ?> <?= $sv->visi; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('vs_id'); ?>
                                </div>
                            </div>  
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-2"><label for="n_urut">Nomor Urut <strong class="text-danger"><sup>*</sup></strong> </label></div>
                            <div class="col sm-10">
                                <input name="n_urut" id="n_urut" type="text" class="form-control <?= ($validation->hasError('n_urut')) ? 'is-invalid' : ''; ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('n_urut'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <div class="col-sm-2"><label for="ms">Misi <strong class="text-danger"><sup>*</sup></strong></label></div>
                            <div class="col-sm-10">
                            <textarea class="summernote-simple <?= ($validation->hasError('ms')) ? 'is-invalid' : ''; ?>""></textarea>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('ms'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                
                </div>
            </div>
            <div class="card-footer text-right">
                <button type="submit" class="mt-1 ml-3 mr-1 btn btn-success"> <i class="fas fa-paper-plane"></i> Simpan</button>
                <a href="<?= base_url('rpjmd/misip'); ?>" class="mt-1 btn btn-secondary">Batal</a>
            </div>
        </form>
    </div>
</div>

<?= $this->endSection() ;?>