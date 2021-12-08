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
        <form action="<?= htmlentities(base_url('periode/f_periodep')); ?>" method="post">
            <?= csrf_field() ;?>
            <button class="btn mt-2 mb-2 btn-primary">
                <i class="fas fa-plus"></i>
                <span>Tambah Baru</span>
            </button>
        </form>

        <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModalPeriode">
            Launch demo modal
        </button> -->
    </div>
</div>

<div class="section-body">
    <h2 class="section-title">Data Periode</h2>
    <p class="section-lead">
        Informasi tentang data periode dihalaman ini.
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
                                    <th rowspan="1" colspan="1" style="width: 10%;" class="text-center">No</th>
                                    <th rowspan="1" colspan="1" style="width: 15%;">Periode</th>
                                    <th rowspan="1" colspan="1">Sup Periode</th>
                                    <th rowspan="1" colspan="1" style="width: 1%;">Aksi</th>
                                    <th rowspan="1" colspan="1" style="width: 1%;"></th>
                                    <!-- <th style="width: 1%;"></th> -->
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no= 1; ?>
                                <?php foreach ($procedure as $p) : ?>
                                <tr>
                                    <td class="text-center"><?= htmlentities($no); ?></td>
                                    <td><?= htmlentities($p->kode); ?></td>
                                    <td><?= htmlentities($p->tahun); ?></td>
                                    <td style="width: 1%;" class="text-right"> 
                                        <form action="<?= htmlentities(base_url('/master/f_editperiodep/' .$p->id)); ?>" method="post">
                                            <?= csrf_field() ;?>
                                            <button style="cursor: pointer;" class="btn btn-sm btn-success" data-toggle="tooltip" title="Edit periode : <?= htmlentities($p->kode); ?>">
                                                <i class="fas fa-pencil-alt"></i>
                                            </button>
                                        </form>
                                    </td>
                                    <td style="width: 1%;" class="text-right">
                                        <a href="" data-id="" style="cursor: pointer;" class="btn btn-sm btn-danger btn-hapus" data-toggle="tooltip" title="Hapus periode : <?= htmlentities($p->kode) ;?> ">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                                <?php $no++ ; ?>
                                <?php endforeach; ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th rowspan="1" colspan="1" style="width: 10%;" class="text-center">No</th>
                                    <th rowspan="1" colspan="1" style="width: 15%;">Periode</th>
                                    <th rowspan="1" colspan="1">Sup Periode</th>
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

<!-- Modal Tambah -->
<div class="modal fade" id="exampleModalPeriode" tabindex="-1" aria-labelledby="exampleModalLabelPeriode" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabelPeriode">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<?= $this->endSection() ;?>