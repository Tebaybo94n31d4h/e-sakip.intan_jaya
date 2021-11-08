<?= $this->extend('template/default'); ?>

<?= $this->section('content'); ?>

<div class="section-header">
    
    

     <h1> <?= $subtitle; ?></h1>

    <div class="section-header-breadcrumb pr-2">
        <div class="breadcrumb-item active"><a href="<?= base_url('admin/dashboardp'); ?>">Dashboard </a> </div>
        <div class="breadcrumb-item"><?= $subtitle; ?></div>
    </div>

    <div class="section-header-back">
        <form action="<?= base_url('rpjmd/visip'); ?>" method="post">
            <button class="btn btn-primary">
                <i class="fas fa-arrow-left"></i> 
            </button>
        </form>
    </div>
    
</div>

<div class="section-body">
    <div class="card">
        <form action="<?= base_url('rpjmd/proccesstambahvisip'); ?>" method="POST" id="tab-content-1">
            <div class="card-header">
                <h4 class="card-title">Form Tambah</h4>
            </div>
            <div class="col-sm-10 m-auto">
                <div class="mb-3 card">
                    <div class="card-body table-responsive">
                        <?= csrf_field(); ?>
                        <div class="row mb-3">
                            <div class="col-sm-2"><label for="periode_id">Periode</label></div>
                            <div class="col-sm-10">
                                <select class="form-control <?= ($validation->hasError('periode_id')) ? 'is-invalid' : ''; ?>" name="periode_id" id="periode_id">
                                    <option value="">-- Pilih Periode --</option>
                                    <?php foreach($selectperiode as $sp) : ?>
                                        <option value="<?= $sp->id; ?>"><?= $sp->kode; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('periode_id'); ?>
                                </div>
                            </div>  
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-2"><label for="no_urut">Nomor Urut <strong class="text-danger"><sup>*</sup></strong> </label></div>
                            <div class="col sm-10">
                                <input name="no_urut" id="no_urut" type="text" class="form-control <?= ($validation->hasError('no_urut')) ? 'is-invalid' : ''; ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('no_urut'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <div class="col-sm-2"><label for="visi">Visi <strong class="text-danger"><sup>*</sup></strong></label></div>
                            <div class="col-sm-10">
                            <!-- <div class="col-sm-12 col-md-7"> -->
                                <textarea class="summernote-simple <?= ($validation->hasError('visi')) ? 'is-invalid' : ''; ?>""></textarea>
                            <!-- </div> -->
                                <!-- <textarea name="visi" id="floatingTextarea2" style="height: 100px" class="form-control </?= ($validation->hasError('visi')) ? 'is-invalid' : ''; ?>"></textarea> -->
                                <div class="invalid-feedback">
                                    <?= $validation->getError('visi'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                
                </div>
            </div>
            <div class="card-footer text-right">
                <button type="submit" class="mt-1 ml-3 mr-1 btn btn-success"> <i class="fas fa-paper-plane"></i> Simpan</button>
                <a href="<?= base_url('rpjmd/visip'); ?>" class="mt-1 btn btn-secondary">Batal</a>
            </div>
        </form>
    </div>
</div>

<?= $this->endSection() ;?>