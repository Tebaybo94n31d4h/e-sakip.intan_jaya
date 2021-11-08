<?= $this->extend('template/default'); ?>

<?= $this->section('content'); ?>

<div class="section-header">
    
    

     <h1> <?= $subtitle; ?></h1>

    <div class="section-header-breadcrumb pr-2">
        <div class="breadcrumb-item active"><a href="<?= base_url('admin/dashboardp'); ?>">Dashboard </a> </div>
        <div class="breadcrumb-item"><?= $subtitle; ?></div>
    </div>

    <div class="section-header-back">
        <form action="<?= base_url('rpjmd/sasaranp'); ?>" method="post">
            <button class="btn btn-primary">
                <i class="fas fa-arrow-left"></i> 
            </button>
        </form>
    </div>
    
</div>

<div class="section-body">
    <div class="card">
        <form action="<?= base_url('rpjmd/proccesstambahsasaranp'); ?>" method="POST" id="tab-content-1">
            <div class="card-header">
                <h4 class="card-title">Form Tambah</h4>
            </div>
            <div class="col-sm-8 m-auto">
                <div class="mb-3 card">
                    <div class="card-body table-responsive">
                        <?= csrf_field(); ?>
                        <div class="row mb-3">
                            <div class="col-sm-3"><label for="tj_id">Tujuan</label></div>
                            <div class="col-sm-9">
                                <select class="form-control <?= ($validation->hasError('tj_id')) ? 'is-invalid' : ''; ?>" name="tj_id" id="tj_id">
                                    <option value="">-- Pilih Tujuan --</option>
                                    <?php foreach($selecttujuan as $st) : ?>
                                        <option value="<?= $st->id; ?>">No. Urut : <?= $st->no_urut; ?> | <?= $st->tujuan; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('tj_id'); ?>
                                </div>
                            </div>  
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-3"><label for="ssrn">Sasaran <strong class="text-danger"><sup>*</sup></strong> </label></div>
                            <div class="col sm-9">
                            <textarea class="summernote-simple <?= ($validation->hasError('ssrn')) ? 'is-invalid' : ''; ?>""></textarea>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('ssrn'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                
                </div>
            </div>
            <div class="card-footer text-right">
                <button type="submit" class="mt-1 ml-3 mr-1 btn btn-success"> <i class="fas fa-paper-plane"></i> Simpan</button>
                <a href="<?= base_url('rpjmd/sasaranp'); ?>" class="mt-1 btn btn-secondary">Batal</a>
            </div>
        </form>
    </div>
</div>

<?= $this->endSection() ;?>