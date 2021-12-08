<?= $this->extend('template/default'); ?>

<?= $this->section('content'); ?>

<div class="section-header">
    
    

     <h1> <?= $subtitle; ?></h1>

    <div class="section-header-breadcrumb pr-2">
        <div class="breadcrumb-item active"><a href="<?= base_url('master/dashboards'); ?>">Dashboard </a> </div>
        <!-- <div class="breadcrumb-item"><a href="#">Bootstrap Components</a></div> -->
        <div class="breadcrumb-item"><?= $subtitle; ?></div>
    </div>

    <div class="section-header-back">
        <form action="<?= base_url('master/users'); ?>" method="post">
            <button class="btn btn-primary">
                <i class="fas fa-arrow-left"></i> 
            </button>
        </form>
    </div>
    
</div>

<div class="section-body">
    <div class="card">
    <form action="<?= base_url('master/proccesstambahusers'); ?>" method="POST" id="tab-content-1">
        <div class="card-header">
            <h4>TAMBAH DATA</h4>
        </div>
        <div class="mb-3 card">
            <div class="card-body">
                <?= csrf_field(); ?>
                <div class="row">
                    <div class="position-relative form-group col">
                        <label for="opd_id">NAMA OPD</label>
                        <select class="form-control <?= ($validation->hasError('opd_id')) ? 'is-invalid' : ''; ?>" name="opd_id" id="opd_id">
                            <option value="">-- PILIH OPD --</option>
                            <?php foreach($selectopduser as $sou) : ?>
                            <option value="<?= $sou->id; ?>"><?= $sou->nama_opd; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <div class="invalid-feedback">
                            <?= $validation->getError('opd_id'); ?>
                        </div>
                    </div>
                    <div class="position-relative form-group col">
                        <label for="p_id">PEGAWAI</label>
                        <select class="form-control <?= ($validation->hasError('p_id')) ? 'is-invalid' : ''; ?>" name="p_id" id="p_id">
                            <option value="">-- PILIH PEGAWAI --</option>
                            <?php foreach($selectpegawaiuser as $spu) : ?>
                            <option value="<?= $spu->id; ?>">NIP. <?= $spu->nip; ?> : <?= $spu->nama_pegawai; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <div class="invalid-feedback">
                            <?= $validation->getError('p_id'); ?>
                        </div>
                    </div>
                </div>
                    <div class="position-relative form-group">
                        <label for="nama_usr">NAMA USER</label>
                        <input name="nama_usr" value="<?= old('nama_usr') ?>" id="nama_usr" type="text" class="form-control <?= ($validation->hasError('nama_usr')) ? 'is-invalid' : ''; ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('nama_usr'); ?>
                        </div>
                    </div>
                    <div class="position-relative form-group">
                        <label for="hah_id">HAK AKSES</label>
                        <select class="form-control <?= ($validation->hasError('hah_id')) ? 'is-invalid' : ''; ?>" name="hah_id" id="hah_id">
                            <option value="">-- PILIH HAK AKSES --</option>
                            <?php foreach($selecthakaksesuser as $shu) : ?>
                            <option value="<?= $shu->id; ?>"><?= $shu->nama_hak_akses; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <div class="invalid-feedback">
                            <?= $validation->getError('hah_id'); ?>
                        </div>
                    </div>
                    <div class="position-relative form-group">
                        <label for="usr">USERNAME</label>
                        <input name="usr" id="usr" value="<?= old('usr') ?>" type="text" class="form-control <?= ($validation->hasError('usr')) ? 'is-invalid' : ''; ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('usr'); ?>
                        </div>
                    </div>
                <div class="row">
                    <div class="position-relative form-group col">
                        <label for="psswd">PASSWORD</label>
                        <input name="psswd" id="psswd" type="password" class="form-control <?= ($validation->hasError('psswd')) ? 'is-invalid' : ''; ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('psswd'); ?>
                        </div>
                    </div>
                    <div class="position-relative form-group col">
                        <label for="psswd2">KONFIRMASI PASSWORD</label>
                        <input name="psswd2" id="psswd2" type="password" class="form-control <?= ($validation->hasError('psswd2')) ? 'is-invalid' : ''; ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('psswd2'); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer text-right">
            <button type="submit" class="mt-1 ml-3 mr-1 btn btn-success"> <i class="fas fa-paper-plane"></i> Simpan</button>
            <a href="<?= base_url('master/users'); ?>" class="mt-1 btn btn-secondary">Batal</a>
        </div>
    </form>
    </div>
</div>


<?= $this->endSection() ;?>