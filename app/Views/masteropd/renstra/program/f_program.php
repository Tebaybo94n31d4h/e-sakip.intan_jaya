<?= $this->extend('template/default'); ?>

<?= $this->section('content'); ?>

<div class="section-header">



    <h1> <?= $subtitle; ?></h1>

    <div class="section-header-breadcrumb pr-2">
        <div class="breadcrumb-item active"><a href="<?= base_url('admin/dashboardo'); ?>">Dashboard </a> </div>
        <div class="breadcrumb-item"><?= $subtitle; ?></div>
    </div>

    <div class="section-header-back">
        <form action="<?= base_url('renstra/programo'); ?>" method="post">
            <?= csrf_field() ;?>
            <button class="btn btn-primary">
                <i class="fas fa-arrow-left"></i>
            </button>
        </form>
    </div>

</div>

<div class="section-body">
    <div class="card">
        <form action="<?= base_url('renstra/proccesstambahprogramopdo'); ?>" method="POST" id="tab-content-1">
            <div class="card-header">
                <h4 class="card-title">Form Tambah</h4>
            </div>
            <div class="col-12 col-sm-12 col-lg-8 m-auto">
                <div class="mb-3 card">
                    <div class="card-body table-responsive">
                        <?= csrf_field(); ?>
                        <div class="row mb-3">
                            <div class="col-sm-3"><label for="indktr_ssrn_opd_id">Indikator Sasaran <strong class="text-danger"><sup>*</sup></strong> </label></div>
                            <div class="col-sm-9">
                                <select class="form-control <?= ($validation->hasError('indktr_ssrn_opd_id')) ? 'is-invalid' : ''; ?>" name="indktr_ssrn_opd_id" id="indktr_ssrn_opd_id">
                                    <option value="">-- Pilih Indikator Sasaran --</option>
                                    <?php foreach ($selectindikatorsasaranopd as $sis) : ?>
                                        <option value="<?= $sis->id; ?>"><?= $sis->indikator_sasaran_opd; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('indktr_ssrn_opd_id'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-3"><label for="nm_prgrm_opd">Nama Program <strong class="text-danger"><sup>*</sup></strong> </label></div>
                            <div class="col sm-9">
                                <textarea name="nm_prgrm_opd" id="nm_prgrm_opd" class="form-control <?= ($validation->hasError('nm_prgrm_opd')) ? 'is-invalid' : ''; ?>"></textarea>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('nm_prgrm_opd'); ?>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="card-footer text-right">
                <button type="submit" class="mt-1 ml-3 mr-1 btn btn-success"> <i class="fas fa-paper-plane"></i> Simpan</button>
                <a href="<?= base_url('renstra/programo'); ?>" class="mt-1 btn btn-secondary">Batal</a>
            </div>
        </form>
    </div>
</div>

<?= $this->endSection(); ?>