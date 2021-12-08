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
        <div class="breadcrumb-item active"><a href="<?= base_url('admin/dashboard'); ?>">Dashboard</a></div>
        <!-- <div class="breadcrumb-item"><a href="#">Bootstrap Components</a></div> -->
        <div class="breadcrumb-item"><?= htmlentities($subtitle); ?> </div>
    </div>
    <div class="section-header-button">
        <form action="<?= htmlentities(base_url('master/f_opds')); ?>" method="post">
            <?= csrf_field(); ?>
            <button class="btn btn-primary btn-icon icon-left">
                <i class="fas fa-plus"></i>
                <span>Tambah baru</span>
            </button>
        </form>
    </div>
</div>

<div class="section-body" id="halaman-opd" style="font-size: 12px;">
    <h2 class="section-title">Data OPD</h2>
    <p class="section-lead">
        Informasi tentang data opd dihalaman ini.
    </p>
    <div class="col-12 col-sm-12 col-lg-12">

        <div class="card card-primary shadow">
            <!-- <div class="card-header">
                <h4></?= $subtitle2; ?></h4>
            </div> -->
            <div class="card-body table-responsive">
                <div class="table-responsive">
                    <table class="table table-striped table-sm table-hover" id="table-1">
                        <thead style="background-color: rgba(90, 69, 250, 0.867); color: yellow;">
                            <tr>
                                <th rowspan="1" colspan="1" style="width: 2%;" class="text-center">No</th>
                                <th rowspan="1" colspan="1">Kode</th>
                                <th rowspan="1" colspan="1">Nama OPD</th>
                                <th rowspan="1" colspan="1" style="width: 10%;">Form</th>
                                <th rowspan="1" colspan="1" style="width: 15%;"></th>
                                <th rowspan="1" colspan="1" style="width: 2%;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                                <?php $no= 1; ?>
                                <?php foreach($procedure as $p) : ?>
                            <tr>
                                <td><?= htmlentities($no); ?></td>
                                <td><?= htmlentities($p->kode); ?></td>
                                <td><?= htmlentities($p->nama_opd); ?></td>
                                <td >
                                    <form action="<?= htmlentities(base_url('master/bidangs/' . $p->id)); ?>" method="post">
                                        <?= csrf_field(); ?>
                                        <button style="cursor: pointer;" class="btn btn-sm btn-light" data-toggle="tooltip" title="Form bidang : <?= htmlentities($p->nama_opd); ?>">
                                            <i class="fas fa-folder"></i> Bidang
                                        </button>
                                    </form>
                                </td>
                                <td>
                                    <form action="<?= htmlentities(base_url('master/jabatans/' . $p->id)); ?>" method="post">
                                        <?= csrf_field(); ?>
                                        <button class="btn btn-sm btn-light" style="cursor: pointer;" data-toggle="tooltip" title="Form jabatan : <?= htmlentities($p->nama_opd); ?>">
                                            <i class="fas fa-folder"></i> Jabatan
                                        </button>
                                    </form>
                                </td>
                                <td >
                                    <form action="<?= htmlentities(base_url('master/f_editopds/' . $p->id)); ?>" method="post">
                                        <?= csrf_field(); ?>
                                        <input type="hidden" name="_method" value="PUT" />
                                        <button style="cursor: pointer;" class="btn btn-sm btn-success" data-toggle="tooltip" title="Edit opd : <?= htmlentities($p->nama_opd); ?>">
                                            <i class="fas fa-pencil-alt"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                                <?php $no++ ; ?>
                                <?php endforeach; ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th rowspan="1" colspan="1" style="width: 2%;" class="text-center">No</th>
                                <th rowspan="1" colspan="1">Kode</th>
                                <th rowspan="1" colspan="1">Nama OPD</th>
                                <th rowspan="1" colspan="1" style="width: 10%;">Form</th>
                                <th rowspan="1" colspan="1" style="width: 15%;"></th>
                                <th rowspan="1" colspan="1" style="width: 2%;">Aksi</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                    
            </div>
        </div>

    </div>
</div>

<script src="<?= base_url(); ?>/jquery/jquery-3.6.0.js"></script>


<?= $this->endSection() ;?>