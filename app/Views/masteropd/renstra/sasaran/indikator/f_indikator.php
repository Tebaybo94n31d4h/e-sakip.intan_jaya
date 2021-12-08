<?= $this->extend('template/default'); ?>

<?= $this->section('content'); ?>

<div class="section-header">



    <h1> <?= htmlentities($subtitle); ?></h1>

    <div class="section-header-breadcrumb pr-2">
        <div class="breadcrumb-item active"><a href="<?= htmlentities(base_url('admin/dashboardo')); ?>">Dashboard </a> </div>
        <div class="breadcrumb-item"><?= htmlentities($subtitle); ?></div>
    </div>

    <div class="section-header-back">
        <form action="<?= htmlentities(base_url('renstra/indikatorsasaranopd')); ?>" method="post">
            <?= csrf_field() ;?>
            <button class="btn btn-primary">
                <i class="fas fa-arrow-left"></i>
            </button>
        </form>
    </div>

</div>

<div class="section-body">
    <div class="card">
        <form action="<?= htmlentities(base_url('renstra/proccesstambahindikatorsasaran')); ?>" method="POST" id="tab-content-1">
            <div class="card-header">
                <h4 class="card-title">Form Tambah</h4>
            </div>
            <div class="col-12 col-sm-12 col-lg-12 m-auto">
                <div class="mb-3 card">
                    <div class="card-body table-responsive">
                        <?= csrf_field(); ?>
                        <div class="row mb-3">
                            <div class="col-sm-3"><label for="ssrn_opd_id">Sasaran <strong class="text-danger"><sup>*</sup></strong> </label></div>
                            <div class="col-sm-9">
                                <select class="form-control <?= ($validation->hasError('ssrn_opd_id')) ? 'is-invalid' : ''; ?>" name="ssrn_opd_id" id="ssrn_opd_id">
                                    <option value="">-- Pilih Sasaran --</option>
                                    <?php foreach ($selectsasaranopd as $sso) : ?>
                                        <option value="<?= $sso->id; ?>">
                                            <?= $sso->sasaran_opd; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('ssrn_opd_id'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-3"><label for="indktr_ssrn_opd">Indikator Sasaran <strong class="text-danger"><sup>*</sup></strong> </label></div>
                            <div class="col sm-9">
                                <textarea name="indktr_ssrn_opd" id="indktr_ssrn_opd" class="form-control <?= ($validation->hasError('indktr_ssrn_opd')) ? 'is-invalid' : ''; ?>"></textarea>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('indktr_ssrn_opd'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-3"><label for="indktr_ssrn_opd">Tercapai </label></div>
                            <div class="col sm-9 form-check custom-control">
                                <input class="form-check-input" name="aktif" id="klik-capai" type="checkbox">
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class=" card-footer text-right">
                <button type="submit" class="mt-1 ml-3 mr-1 btn btn-success"> <i class="fas fa-paper-plane"></i> Simpan</button>
                <a href="<?= base_url('renstra/indikatorsasaranopd'); ?>" class="mt-1 btn btn-secondary">Batal</a>
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