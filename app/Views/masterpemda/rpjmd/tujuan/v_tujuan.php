<?= $this->extend('template/default'); ?>

<?= $this->section('content'); ?>

<div id="berhasil" data-berhasil="<?= session()->getFlashdata('berhasil');  ?>"></div>
<div id="update" data-update="<?= session()->getFlashdata('update');  ?>"></div>
<div id="sudah_ada" data-sudah_ada="<?= session()->getFlashdata('sudah_ada');  ?>"></div>
<div id="gagal" data-gagal="<?= session()->getFlashdata('gagal');  ?>"></div>
<div id="hapus" data-hapus="<?= session()->getFlashdata('hapus');  ?>"></div>

<div class="section-header">
    <h1><?= htmlentities($subtitle); ?></h1>
    
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="<?= htmlentities(base_url('admin/dashboardp')); ?>">Dashboard</a></div>
        <!-- <div class="breadcrumb-item"><a href="#">Bootstrap Components</a></div> -->
        <div class="breadcrumb-item"><?= htmlentities($subtitle); ?></div>
    </div>
    <div class="section-header-button">
        <form action="<?= htmlentities(base_url('rpjmd/f_tujuanp')); ?>" method="post">
            <?= csrf_field() ;?>
            <button class="btn btn-primary">
                <i class="fas fa-plus"></i>
                <span>Tambah Baru</span>
            </button>
        </form>
    </div>
</div>

<div class="section-body">
    <h2 class="section-title">Data Tujuan</h2>
    <p class="section-lead">
        Informasi tentang data tujuan dihalaman ini.
    </p>
    <div class="col-12 col-sm-12 col-lg-12">
        <div class="card card-primary">
                <!-- <div class="card-header">
                    <h4></?= $subtitle2; ?></h4>
                </div> -->
                <div class="card-body table-responsive">
                    <table style="font-size: 12px;" class="table-striped table-sm table table-hover" id="table-1">
                        <thead style="background-color: rgba(90, 69, 250, 0.867); color: yellow;">
                            <tr>
                                <th rowspan="1" colspan="1" style="width: 1%;">No</th>
                                <th rowspan="1" colspan="1" style="width: 30%;">Visi</th>
                                <th rowspan="1" colspan="1">Misi</th>
                                <th rowspan="1" colspan="1">Tujuan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            <?php foreach($procedure as $p) : ?>
                            <tr>
                                <td style="width: 1%;"><?= htmlentities($no); ?></td>
                                <td>No. Urut <?= htmlentities($p->no_urut_visi); ?> : <?= htmlentities($p->visi); ?></td>
                                <td>No. Urut. <?= htmlentities($p->no_urut_misi); ?> : <?= htmlentities($p->misi); ?></td>
                                <td>No. Urut. <?= htmlentities($p->no_urut); ?> : <?= htmlentities($p->tujuan); ?></td>
                            </tr>
                            <?php $no++; ?>
                            <?php endforeach; ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th rowspan="1" colspan="1" style="width: 5%;">No</th>
                                <th rowspan="1" colspan="1" style="width: 30%;">Visi</th>
                                <th rowspan="1" colspan="1">Misi</th>
                                <th rowspan="1" colspan="1">Tujuan</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ;?>