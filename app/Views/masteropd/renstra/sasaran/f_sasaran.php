<?= $this->extend('template/default'); ?>

<?= $this->section('content'); ?>

<div class="section-header">



    <h1> <?= $subtitle; ?></h1>

    <div class="section-header-breadcrumb pr-2">
        <div class="breadcrumb-item active"><a href="<?= base_url('admin/dashboardo'); ?>">Dashboard </a> </div>
        <div class="breadcrumb-item"><?= $subtitle; ?></div>
    </div>

    <div class="section-header-back">
        <form action="<?= base_url('renstra/sasarano'); ?>" method="post">
            <button class="btn btn-primary">
                <i class="fas fa-arrow-left"></i>
            </button>
        </form>
    </div>

</div>

<div class="section-body">
    <div class="card">
        <form action="<?= base_url('renstra/proccesstambahsasarano'); ?>" method="POST" id="tab-content-1">
            <div class="card-header">
                <h4 class="card-title">Form Tambah</h4>
            </div>
            <div class="col-sm-8 m-auto">
                <div class="mb-3 card">
                    <div class="card-body table-responsive">
                        <?= csrf_field(); ?>
                        <div class="row mb-3">
                            <div class="col-sm-3"><label for="tjn_opd_id">Tujuan Opd</label></div>
                            <div class="col-sm-9">
                                <select class="form-control <?= ($validation->hasError('tjn_opd_id')) ? 'is-invalid' : ''; ?>" name="tjn_opd_id" id="tjn_opd_id">
                                    <option value="">-- Pilih Tujuan Opd --</option>
                                    <?php foreach ($selecttujuan as $st) : ?>
                                        <option value="<?= $st->id; ?>"><?= $st->tujuan_opd; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('tjn_opd_id'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-3"><label for="ssrn_opd">Sasaran <strong class="text-danger"><sup>*</sup></strong> </label></div>
                            <div class="col sm-9">
                                <textarea name="ssrn_opd" id="ssrn_opd" rows="5" class="form-control <?= ($validation->hasError('ssrn_opd')) ? 'is-invalid' : ''; ?>"></textarea>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('ssrn_opd'); ?>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="card-footer text-right">
                <button type="submit" class="mt-1 ml-3 mr-1 btn btn-success"> <i class="fas fa-paper-plane"></i> Simpan</button>
                <a href="<?= base_url('renstra/sasarano'); ?>" class="mt-1 btn btn-secondary">Batal</a>
            </div>
        </form>
    </div>
</div>

<?= $this->endSection(); ?>