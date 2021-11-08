<?= $this->extend('template/default'); ?>

<?= $this->section('content'); ?>

<div class="section-header">
    
    

     <h1> <?= $subtitle; ?></h1>

    <div class="section-header-breadcrumb pr-2">
        <div class="breadcrumb-item active"><a href="<?= base_url('admin/dashboardo'); ?>">Dashboard </a> </div>
        <div class="breadcrumb-item"><?= $subtitle; ?></div>
    </div>

    <div class="section-header-back">
        <form action="<?= base_url('renstra/indikatoro'); ?>" method="post">
            <button class="btn btn-primary">
                <i class="fas fa-arrow-left"></i> 
            </button>
        </form>
    </div>
    
</div>

<div class="section-body">
    <div class="card">
        <form action="<?= base_url('renstra/proccesstambahindikatorsasarano'); ?>" method="POST" id="tab-content-1">
            <div class="card-header">
                <h4 class="card-title">Form Tambah</h4>
            </div>
            <div class="col-sm-12 m-auto">
                <div class="mb-3 card">
                    <div class="card-body table-responsive">
                        <?= csrf_field(); ?>
                        <div class="row mb-3">
                            <div class="col-sm-2"><label for="ssrn_id">SASARAN</label></div>
                            <div class="col-sm-10">
                                <select class="form-control <?= ($validation->hasError('ssrn_id')) ? 'is-invalid' : ''; ?>" name="ssrn_id" id="ssrn_id">
                                    <option value="">-- PILIH SASARAN --</option>
                                    <?php foreach($selectsasaran as $ss) : ?>
                                        <option value="<?= $ss->id; ?>"><?= $ss->sasaran; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('ssrn_id'); ?>
                                </div>
                            </div>  
                        </div>
                        <div class="mb-3 row">
                            <div class="col-sm-2"><label for="indktr_ssrn">INDIKATOR SASARAN <strong class="text-danger"><sup>*</sup></strong></label></div>
                            <div class="col-sm-10">
                                <textarea name="indktr_ssrn" id="indktr_ssrn" cols="105" rows="5" class="form-control <?= ($validation->hasError('indktr_ssrn')) ? 'is-invalid' : ''; ?>"></textarea>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('indktr_ssrn'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                
                </div>
            </div>
            <div class="card-footer text-right">
                <button type="submit" class="mt-1 ml-3 mr-1 btn btn-success"> <i class="fas fa-paper-plane"></i> Simpan</button>
                <a href="<?= base_url('renstra/indikatoro'); ?>" class="mt-1 btn btn-secondary">Batal</a>
            </div>
        </form>
    </div>
</div>

<?= $this->endSection() ;?>