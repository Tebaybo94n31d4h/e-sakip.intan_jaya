<?= $this->extend('template/default'); ?>

<?= $this->section('content'); ?>

<div class="section-header">
    <h1> <?= $subtitle; ?></h1>

    <div class="section-header-breadcrumb pr-2">
        <div class="breadcrumb-item active"><a href="<?= base_url('admin/dashboard'); ?>">Dashboard </a> </div>
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
        <div class="card-header">
            <h4 class="card-title">Form Tambah</h4>
        </div>
    <form action="<?= base_url('master/proccesstambahbidangp'); ?>" method="POST" id="tab-content-1">
    
        <div class="card-body">
            <div class="col-sm-10 m-auto">
                <div class="mb-3 card">
                    <div class="card-body">
                        <div class="card">
                            <div class="row">
                                <div class="col">
                                    <p class="card-title text-primary" style="font-size: 16px; font-weight: bold;">Data Bidang</p>
                                    <div class="position-relative form-group">
                                        <label for="kd">Kode</label>
                                        <input name="kd" id="kd" type="text" class="form-control <?= ($validation->hasError('kd')) ? 'is-invalid' : ''; ?>">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('kd'); ?>
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
                                <div class="col">
                                    <p class="card-title text-primary" style="font-size: 16px; font-weight: bold;">Pilih Opsi</p>
                                    <div class="position-relative form-group">
                                        <label for="typeBidang">Type Bidang</label>
                                        <select class="form-control <?= ($validation->hasError('kd')) ? 'is-invalid' : ''; ?>" name="typeBidang" id="typeBidang">
                                            <option value="">-- Pilih Bidang --</option>
                                            <option value="1">Sekretariat</option>
                                            <option value="2">Umum</option>
                                            <option value="100">Lainnya</option>
                                        </select>
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('typeBidang'); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer text-right">
            <button type="submit" class="mt-1 btn btn-success"> <i class="fas fa-paper-plane"></i> Simpan</button>
            <a href="<?= base_url('master/bidangp'); ?>" class="mt-1 btn btn-secondary">Batal</a>
        </div>
    </form>

    </div>
</div>


<?= $this->endSection() ;?>