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
        <form action="<?= htmlentities(base_url('master/bidangs/' . $dataopd['id'])); ?>" method="post">
            <button class="btn btn-primary">
                <i class="fas fa-arrow-left"></i> 
            </button>
        </form>
    </div>
</div>

<div class="section-body" style="font-size: 12px;">
    <div class="card">
        <form action="<?= htmlentities(base_url('master/proccesstambahbidangs/' . $dataopd['id'])); ?>" method="POST" id="tab-content-1">

            <div class="card-header">
                <h4 class="card-title">Form Tambah</h4>
            </div>

            <div class="col-sm-10 m-auto">

                <div class="mb-3 mt-3 card">
                    <div class="card-body">
                        <?= csrf_field(); ?>
                        <div class="row">
                            <div class="position-relative form-group col">
                                <label for="kode">Kode</label>
                                <input name="kode" id="kode" type="text" class="form-control <?= ($validation->hasError('kode')) ? 'is-invalid' : ''; ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('kode'); ?>
                                </div>
                            </div>
                            
                            <div class="position-relative form-group col">
                                <label for="type">Type Bidang</label>
                                <select class="form-select <?= ($validation->hasError('type')) ? 'is-invalid' : ''; ?>" name="type" id="type">
                                    <option value="">-- Pilih Type --</option>
                                    <?php foreach($selectTipebidang as $stb) : ?>
                                    <option value="<?= htmlentities($stb->id); ?>"><?= htmlentities($stb->tipe); ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('type'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="position-relative form-group">
                                <label for="nama_bidang">Nama Bidang</label>
                                <input name="nama_bidang" id="nama_bidang" type="text" class="form-control <?= ($validation->hasError('nama_bidang')) ? 'is-invalid' : ''; ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('nama_bidang'); ?>
                                </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="card-footer text-right">
                <button type="submit" class="btn btn-success"> <i class="fas fa-paper-plane"></i> Simpan</button>
                <a href="<?= htmlentities(base_url('master/bidangs/' . $dataopd['id'])); ?>" class="ml-1 btn btn-secondary">Batal</a>
            </div>

        </form>
    </div>
</div>

<?= $this->endSection() ;?>