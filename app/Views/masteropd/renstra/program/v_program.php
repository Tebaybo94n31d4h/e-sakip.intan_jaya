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
        <form action="<?= base_url('renstra/f_programo'); ?>" method="post">
            <button class="btn btn-primary">
                <i class="fas fa-plus"></i>
                <span>Tambah Baru</span>
            </button>
        </form>
    </div>
</div>

<div class="section-body">
    <h2 class="section-title">Data Program</h2>
    <p class="section-lead">
        Informasi tentang data program dihalaman ini.
    </p>
    <div class="col-sm-12">
        <div class="card card-primary">
            <!-- <div class="card-header">
                <h4></?= $subtitle2; ?></h4>
            </div> -->
            <div class="card-body table-responsive">
                <table style="font-size: 12px;" class="table table-sm table-striped table-hover" id="table-1">
                    <thead style="background-color: rgba(90, 69, 250, 0.867); color: yellow;">
                        <tr>
                            <th colspan="1" rowspan="1" class="text-center" style="width: 10%;">No</th>
                            <th  colspan="1" rowspan="1">Indikator Sasaran Opd</th>
                            <th  colspan="1" rowspan="1">Nama Program Opd</th>
                            <!-- <th>Form Aksi</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        <?php foreach ($procedure as $p) : ?>
                            <tr>
                                <td class="text-center"><?= $no; ?></td>
                                <td><?= $p->indikator_sasaran_opd; ?></td>
                                <td><?= $p->nama_program_opd; ?></td>
                                <!-- <th>
                                    <a class="btn btn-light" href="</   ?= base_url('renstra/indikatorprogramopd/' . $p->id); ?>"> <i class="fas fa-folder"></i> Indikator Program</a>
                                </th> -->
                            </tr>
                            <?php $no++; ?>
                        <?php endforeach; ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="1" rowspan="1" class="text-center" style="width: 10%;">No</th>
                            <th  colspan="1" rowspan="1">Indikator Sasaran Opd</th>
                            <th  colspan="1" rowspan="1">Nama Program Opd</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
</div>

<?= $this->endSection(); ?>