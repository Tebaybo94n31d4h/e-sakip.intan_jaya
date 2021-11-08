<?= $this->extend('template/default'); ?>

<?= $this->section('content'); ?>

<div class="section-header">



    <h1> <?= $subtitle; ?></h1>

    <div class="section-header-breadcrumb pr-2">
        <div class="breadcrumb-item active"><a href="<?= base_url('admin/dashboardo'); ?>">Dashboard </a> </div>
        <div class="breadcrumb-item"><?= $subtitle; ?></div>
    </div>

    <div class="section-header-back">
        <form action="<?= base_url('renstra/targetindikatorsasaran'); ?>" method="post">
            <button class="btn btn-primary">
                <i class="fas fa-arrow-left"></i>
            </button>
        </form>
    </div>

</div>

<div class="section-body">
    <div class="card">
        <form action="<?= base_url('renstra/proccesstambahtargetindikatorsasaranopdo'); ?>" method="POST" id="tab-content-1">
            <div class="card-header">
                <h4 class="card-title">Form Tambah</h4>
            </div>
            <div class="col-sm-8 m-auto">
                <div class="mb-3 card">
                    <div class="card-body table-responsive">
                        <?= csrf_field(); ?>
                        <div class="row mb-3">
                            <div class="col-sm-3"><label for="indktr_ssrn_opd_id">Indikator Sasaran Opd</label></div>
                            <div class="col-sm-9">
                                <select class="form-control <?= ($validation->hasError('indktr_ssrn_opd_id')) ? 'is-invalid' : ''; ?>" name="indktr_ssrn_opd_id" id="indktr_ssrn_opd_id">
                                    <option value="">-- Pilih Indikator Sasaran Opd --</option>
                                    <?php foreach ($selectindikatorsasaranopd as $siso) : ?>
                                        <option value="<?= $siso->id; ?>">
                                            <?= $siso->indikator_sasaran_opd; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('indktr_ssrn_opd_id'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-3"><label for="stn_id">Satuan</label></div>
                            <div class="col-sm-9">
                                <select class="form-control <?= ($validation->hasError('stn_id')) ? 'is-invalid' : ''; ?>" name="stn_id" id="stn_id">
                                    <option value="">-- Pilih Satuan --</option>
                                    <?php foreach ($selectsatuanopd as $sso) : ?>
                                        <option value="<?= $sso->id; ?>">
                                            <?= $sso->satuan; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('stn_id'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-3"><label for="sb_prd">Sub Periode</label></div>
                            <div class="col-sm-9">
                                <select class="form-control <?= ($validation->hasError('sb_prd')) ? 'is-invalid' : ''; ?>" name="sb_prd" id="sb_prd">
                                    <option value="">-- Pilih Sub Periode --</option>
                                    <?php foreach ($selectsubperiodeopd as $sspo) : ?>
                                        <option value="<?= $sspo->id; ?>">
                                            <?= $sspo->tahun; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('sb_prd'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-3"><label for="trgt">Target<strong class="text-danger"><sup>*</sup></strong> </label></div>
                            <div class="col sm-9">
                                <textarea name="trgt" id="trgt" rows="5" class="form-control <?= ($validation->hasError('trgt')) ? 'is-invalid' : ''; ?>"></textarea>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('trgt'); ?>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class=" card-footer text-right">
                <button type="submit" class="mt-1 ml-3 mr-1 btn btn-success"> <i class="fas fa-paper-plane"></i> Simpan</button>
                <a href="<?= base_url('renstra/targetindikatorsasaran'); ?>" class="mt-1 btn btn-secondary">Batal</a>
            </div>
        </form>
    </div>
</div>
<script src="<?= base_url(); ?>/jquery/jquery-3.6.0.js"></script>
<script>
    $(document).ready(function() {
        // $('#kilk-capai').on('click', function() {
        var chk = $('input[type="checkbox"]');
        console.log(chk);
        chk.each(function() {
            var v = $(this).attr('checked') == 'checked' ? 1 : 0;
            console.log(v);
            var aktif;
            var data = $(this).after('<input type="hidden" name="' + aktif + '" value="' + v + '" />');
            console.log(data);
        });

        chk.change(function() {
            var v = $(this).is(':checked') ? 1 : 0;
            console.log(v);
            var data2 = $(this).next('<input type="hidden" name="' + aktif + '" value="' + v + '" />');
            console.log(data2);
        });
    });
</script>

<?= $this->endSection(); ?>