<?= $this->extend('template/default'); ?>

<?= $this->section('content'); ?>

<div id="berhasil" data-berhasil="<?= session()->getFlashdata('berhasil');  ?>"></div>
<div id="update" data-update="<?= session()->getFlashdata('update');  ?>"></div>
<div id="sudah_ada" data-sudah_ada="<?= session()->getFlashdata('sudah_ada');  ?>"></div>
<div id="gagal" data-gagal="<?= session()->getFlashdata('gagal');  ?>"></div>
<div id="hapus" data-hapus="<?= session()->getFlashdata('hapus');  ?>"></div>

<div class="section-header">
    <h1><?= $subtitle; ?></h1>
    
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="<?= base_url('admin/dashboardo'); ?>">Dashboard</a></div>
        <!-- <div class="breadcrumb-item"><a href="#">Bootstrap Components</a></div> -->
        <div class="breadcrumb-item"><?= $subtitle; ?></div>
    </div>
    <div class="section-header-button">
        
    </div>
</div>

<div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h4><?= $subtitle2; ?></h4>
                    <div class="card-header-action">
                        <form action="<?= base_url('renstra/f_indikatorprogramo'); ?>" method="post">
                            <button class="btn btn-primary">
                                <i class="fas fa-plus"></i>
                                <span>TAMBAH BARU</span>
                            </button>
                        </form>
                    </div>
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-hover" id="table-1">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>PROGRAM OPD</th>
                                <th>INDIKATOR PROGRAM</th>
                                <th>TARGET</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            <?php foreach($procedureIT as $pit) : ?>
                            <tr>
                                <td><?= $no; ?></td>
                                <td><?= $pit->indikator_tujuan; ?></td>
                                <td><?= $pit->indikator_tujuan; ?></td>
                                <td></td>
                            </tr>
                            <?php $no++; ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="card">
                    <div class="card-header">
                        <h4><?= $subtitle3; ?></h4>
                        <div class="card-header-action">
                            <form action="<?= base_url('renstra/f_indikatorsasarano'); ?>" method="post">
                                <button class="btn btn-primary">
                                    <i class="fas fa-plus"></i>
                                    <span>TAMBAH BARU</span>
                                </button>
                            </form>
                        </div>
                    </div>
                    <div class="card-body table-responsive">
                        <table class="table table-hover" id="table-2">
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>SASARAN OPD</th>
                                    <th>INDIKATOR SASARAN</th>
                                    <th>TARGET</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach($procedureIS as $pis) : ?>
                                <tr>
                                    <td><?= $no; ?></td>
                                    <td><?= $pis->sasaran; ?></td>
                                    <td><?= $pis->indikator_sasaran; ?></td>
                                    <td><?= $pis->target; ?></td>
                                </tr>
                                <?php $no++; ?>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
</div>

<?= $this->endSection() ;?>