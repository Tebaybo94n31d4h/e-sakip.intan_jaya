<?= $this->extend('template/default'); ?>

<?= $this->section('content'); ?>

<div class="section-header">
    
    

     <h1> <?= $subtitle; ?></h1>

    <div class="section-header-breadcrumb pr-2">
        <div class="breadcrumb-item active"><a href="<?= base_url('admin/dashboardp'); ?>">Dashboard </a> </div>
        <div class="breadcrumb-item"><?= $subtitle; ?></div>
    </div>

    <div class="section-header-back">
        <form action="<?= base_url('master/satuanp'); ?>" method="post">
            <button class="btn btn-primary">
                <i class="fas fa-arrow-left"></i> 
            </button>
        </form>
    </div>
    
</div>

<div class="section-body">
    <div class="card">
        <form action="<?= base_url('master/proccesstambahsatuanp'); ?>" method="POST" id="tab-content-1">
            <div class="card-header">
                <h4 class="card-title">Form Tambah</h4>
            </div>
            <div class="col-sm-8 m-auto">
                <div class="mb-3 card">
                    <div class="card-body table-responsive">
                        <?= csrf_field(); ?>
                        <div class="row mb-3">
                            <div class="col-sm-3"><label for="opd_id">OPD</label></div>
                            <div class="col-sm-9">
                                <select class="form-control <?= ($validation->hasError('opd_id')) ? 'is-invalid' : ''; ?>" name="opd_id" id="opd_id">
                                    <option value="">-- Pilih OPD --</option>
                                    <?php foreach($selectopd as $so) : ?>
                                        <option value="<?= $so->id; ?>"><?= $so->nama_opd; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('opd_id'); ?>
                                </div>
                            </div>  
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-3"><label for="stn">Satuan <strong class="text-danger"><sup>*</sup></strong> </label></div>
                            <div class="col sm-9">
                                <input name="stn" id="stn" type="text" class="form-control <?= ($validation->hasError('stn')) ? 'is-invalid' : ''; ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('stn'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                
                </div>
            </div>
            <div class="card-footer text-right">
                <button type="submit" class="mt-1 ml-3 mr-1 btn btn-success"> <i class="fas fa-paper-plane"></i> Simpan</button>
                <a href="<?= base_url('master/satuanp'); ?>" class="mt-1 btn btn-secondary">Batal</a>
            </div>
        </form>
    </div>
</div>

<?= $this->endSection() ;?>