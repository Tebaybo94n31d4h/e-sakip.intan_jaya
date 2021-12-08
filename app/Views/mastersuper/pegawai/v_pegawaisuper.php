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
        <div class="breadcrumb-item active"><a href="<?= htmlentities(base_url('admin/dashboards')); ?>">Dashboard</a></div>
        <!-- <div class="breadcrumb-item"><a href="#">Bootstrap Components</a></div> -->
        <div class="breadcrumb-item"><?= htmlentities($subtitle); ?></div>
    </div>
    <div class="section-header-button">
        <form action="<?= htmlentities(base_url('master/f_pegawais')); ?>" method="post">
            <?= csrf_field(); ?>
            <button class="btn btn-primary btn-icon icon-left">
                <i class="fas fa-plus"></i>
                <span>Tambah baru</span>
            </button>
        </form>
    </div>
</div>

<div class="section-body">
    <h2 class="section-title">Data Pegawai</h2>
    <p class="section-lead">
        Informasi tentang data pegawai dihalaman ini.
    </p>
    <div class="col-xs|sm|md|lg|xl-1-12">
        <div class="card card-primary shadow">
                <!-- <div class="card-header">
                    <h4></?= $subtitle2; ?></h4>
                </div> -->
                <div class="card-body table-responsive">

                        <table style="font-size: 12px;" class="table-sm table-striped table table-hover" id="table-1">
                            <thead style="background-color: rgba(90, 69, 250, 0.867); color: yellow;">
                                <tr>
                                    <th rowspan="1" colspan="1" style="width: 2%;" class="text-center">No</th>
                                    <th rowspan="1" colspan="1" style="width: 13%;">Nip</th>
                                    <th rowspan="1" colspan="1">Nama Pegawai</th>
                                    <!-- <th>JABATAN</th> -->
                                    <th rowspan="1" colspan="1" style="width: 1%;">Aksi</th>
                                    <th rowspan="1" colspan="1" style="width: 1%;"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no= 1; ?>
                                <?php foreach ($procedure as $p) : ?>
                                <tr>
                                    <td><?= htmlentities($no); ?></td>
                                    <td><?= htmlentities($p->nip); ?></td>
                                    <td><?= htmlentities($p->nama_pegawai); ?></td>
                                    <!-- <td>
                                        <form action="</?= base_url('/master/f_detailpegawais/' . $p->id); ?>" method="post">
                                            <button style="cursor: pointer;" class="btn btn-sm btn-info" data-toggle="tooltip" title="DETAIL PEGAWAI : <?= htmlentities($p->nama_pegawai); ?>">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                        </form>
                                    </td> -->
                                    <td class="text-right">
                                        <form action="<?= htmlentities(base_url('/master/f_editpegawais/' . $p->id. '/edit')); ?>" method="post">
                                        <?= csrf_field() ;?>
                                            <button style="cursor: pointer;" class="btn btn-sm btn-success" data-toggle="tooltip" title="Edit pegawai : <?= htmlentities($p->nama_pegawai); ?>">
                                                <i class="fas fa-pencil-alt"></i>
                                            </button>
                                        </form>
                                    </td>
                                    <td>
                                        <a href="" data-id="<?= htmlentities($p->id); ?>" style="cursor: pointer;" class="btn btn-sm btn-danger btn-hapus" data-toggle="tooltip" title="Hapus pegawai : <?= htmlentities($p->nama_pegawai); ?>">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                                <?php $no++ ; ?>
                                <?php endforeach; ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th rowspan="1" colspan="1" style="width: 2%;" class="text-center">No</th>
                                    <th rowspan="1" colspan="1" style="width: 13%;">Nip</th>
                                    <th rowspan="1" colspan="1">Nama Pegawai</th>
                                    <!-- <th>JABATAN</th> -->
                                    <th rowspan="1" colspan="1" style="width: 1%;">Aksi</th>
                                    <th rowspan="1" colspan="1" style="width: 1%;"></th>
                                </tr>
                            </tfoot>
                        </table>
                    
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ;?>