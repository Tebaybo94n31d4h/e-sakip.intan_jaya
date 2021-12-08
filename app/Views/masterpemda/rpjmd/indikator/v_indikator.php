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
        
    </div>
</div>

<div class="section-body">
    <h2 class="section-title">Data Indikator</h2>
    <p class="section-lead">
        Informasi tentang data indikator tujuan dan sasaran dihalaman ini.
    </p>
        <div class="col-12 col-sm-12 col-lg-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h4><?= htmlentities($subtitle2); ?></h4>
                    <div class="card-header-action">
                        <form action="<?= htmlentities(base_url('rpjmd/f_indikatortujuanp')); ?>" method="post">
                            <?= csrf_field() ;?>
                            <button class="btn btn-primary">
                                <i class="fas fa-plus"></i>
                                <span>Tambah Baru</span>
                            </button>
                        </form>
                    </div>
                </div>
                <div class="card-body table-responsive">
                    <table class="table-striped table-sm table table-hover" id="table-1">
                        <thead style="background-color: rgba(90, 69, 250, 0.867); color: yellow;">
                            <tr>
                                <th rowspan="1" colspan="1" class="text-center">No</th>
                                <th rowspan="1" colspan="1">Tujuan</th>
                                <th rowspan="1" colspan="1">Indikator</th>
                                <th rowspan="1" colspan="1">Target</th>
                                <th rowspan="1" colspan="1">Satuan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            <?php foreach($procedureIT as $pit) : ?>
                            <tr>
                                <td class="text-center"><?= htmlentities($no); ?></td>
                                <td>NO. URUT. <?= htmlentities($pit->no_urut_tujuan); ?> : <?= htmlentities($pit->tujuan); ?> </td>
                                <td><?= htmlentities($pit->indikator_tujuan); ?></td>
                                <td><?= htmlentities($pit->target); ?></td>
                                <td><?= htmlentities($pit->satuan); ?></td>
                            </tr>
                            <?php $no++; ?>
                            <?php endforeach; ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th rowspan="1" colspan="1" class="text-center">No</th>
                                <th rowspan="1" colspan="1">Tujuan</th>
                                <th rowspan="1" colspan="1">Indikator</th>
                                <th rowspan="1" colspan="1">Target</th>
                                <th rowspan="1" colspan="1">Satuan</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-12 col-lg-12">
            <div class="card card-primary">
                    <div class="card-header">
                        <h4><?= htmlentities($subtitle3); ?></h4>
                        <div class="card-header-action">
                            <form action="<?= htmlentities(base_url('rpjmd/f_indikatorsasaranp')); ?>" method="post">
                                <?= csrf_field() ;?>
                                <button class="btn btn-primary">
                                    <i class="fas fa-plus"></i>
                                    <span>Tambah Baru</span>
                                </button>
                            </form>
                        </div>
                    </div>
                    <div class="card-body table-responsive">
                        <table class="table table-striped table-sm table-hover" id="table-2">
                            <thead style="background-color: rgba(90, 69, 250, 0.867); color: yellow;">
                                <tr>
                                    <th rowspan="1" colspan="1" class="text-center">No</th>
                                    <th rowspan="1" colspan="1">Sasaran</th>
                                    <th rowspan="1" colspan="1">Indikator</th>
                                    <th rowspan="1" colspan="1">Target</th>
                                    <th rowspan="1" colspan="1">Satuan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach($procedureIS as $pis) : ?>
                                <tr>
                                    <td class="text-center"><?= htmlentities($no); ?></td>
                                    <td><?= htmlentities($pis->sasaran); ?></td>
                                    <td><?= htmlentities($pis->indikator_sasaran); ?></td>
                                    <td><?= htmlentities($pis->target); ?></td>
                                    <td><?= htmlentities($pis->satuan); ?></td>
                                </tr>
                                <?php $no++; ?>
                                <?php endforeach; ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th rowspan="1" colspan="1" class="text-center">No</th>
                                    <th rowspan="1" colspan="1">Sasaran</th>
                                    <th rowspan="1" colspan="1">Indikator</th>
                                    <th rowspan="1" colspan="1">Target</th>
                                    <th rowspan="1" colspan="1">Satuan</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
</div>

<?= $this->endSection() ;?>