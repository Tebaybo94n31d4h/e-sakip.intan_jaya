<?= $this->extend('template/default'); ?>

<?= $this->section('content'); ?>

<div class="section-header">
    
    

     <h1> <?= $subtitle; ?></h1>

    <div class="section-header-breadcrumb pr-2">
        <div class="breadcrumb-item active"><a href="<?= base_url('admin/dashboardo'); ?>">Dashboard </a> </div>
        <div class="breadcrumb-item"><?= $subtitle; ?></div>
    </div>

    <div class="section-header-back">
        <form action="<?= base_url('renstra/tujuano'); ?>" method="post">
            <button class="btn btn-primary">
                <i class="fas fa-arrow-left"></i> 
            </button>
        </form>
    </div>
    
</div>

<div class="section-body">
    <div class="card">
        <form action="<?= base_url('renstra/proccesstambahtujuano'); ?>" method="POST" id="tab-content-1">
            <div class="card-header">
                <h4 class="card-title">Form Tambah</h4>
            </div>
            <div class="col-sm-10 m-auto">
                <div class="mb-3 card">
                    <div class="card-body table-responsive">
                        <?= csrf_field(); ?>
                        <div class="row mb-3">
                            <div class="col-sm-2"><label for="opd_id">OPD</label></div>
                            <div class="col-sm-10">
                                <select class="form-control <?= ($validation->hasError('opd_id')) ? 'is-invalid' : ''; ?>" name="opd_id" id="opd_id">
                                    <option value="">-- Pilih OPD --</option>
                                    <?php foreach($selectOpd as $so) : ?>
                                        <option value="<?= $so->id; ?>"><?= $so->nama_opd; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('opd_id'); ?>
                                </div>
                            </div>  
                        </div>
                        <div class="mb-3 row">
                            <div class="col-sm-2"><label for="tj_opd">TUJUAN <strong class="text-danger"><sup>*</sup></strong></label></div>
                            <div class="col-sm-10">
                                <textarea name="tj_opd" id="tj_opd" cols="105" rows="5" class="form-control <?= ($validation->hasError('tj_opd')) ? 'is-invalid' : ''; ?>"></textarea>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('tj_opd'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                
                </div>
            </div>
            <div class="card-footer text-right">
                <button type="submit" class="mt-1 ml-3 mr-1 btn btn-success"> <i class="fas fa-paper-plane"></i> Simpan</button>
                <a href="<?= base_url('renstra/tujuano'); ?>" class="mt-1 btn btn-secondary">Batal</a>
            </div>
        </form>
    </div>
</div>

<?= $this->endSection() ;?>