<?= $this->extend('template/default'); ?>

<?= $this->section('content'); ?>

<div id="berhasil" data-berhasil="<?= session()->getFlashdata('berhasil');  ?>"></div>
<div id="update" data-update="<?= session()->getFlashdata('update');  ?>"></div>
<div id="sudah_ada" data-sudah_ada="<?= session()->getFlashdata('sudah_ada');  ?>"></div>
<div id="gagal" data-gagal="<?= session()->getFlashdata('gagal');  ?>"></div>
<div id="hapus" data-hapus="<?= session()->getFlashdata('hapus');  ?>"></div>


<div class="section-header">
    <div class="section-header-back">
        <form action="<?= base_url('master/opds'); ?>" method="post">
            <button class="btn btn-primary btn-icon icon-left">
                <i class="fas fa-arrow-left"></i> 
            </button>
        </form>
    </div>
    <h1><?= $subtitle; ?></h1>
    
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="<?= base_url('admin/dashboard'); ?>">Dashboard</a></div>
        <!-- <div class="breadcrumb-item"><a href="#">Bootstrap Components</a></div> -->
        <div class="breadcrumb-item"><?= $subtitle; ?></div>
    </div>
    
    <div class="section-header-button">
        <form action="<?= base_url('master/f_jabatans/' . $dataopd['id']); ?>" method="post">
            <button class="btn btn-primary btn-icon icon-left">
                <i class="fas fa-plus"></i>
                <span>Tambah Baru</span>
            </button>
        </form>
    </div>
</div>

<div class="section-body" style="font-size: 12px;">
    <h2 class="section-title">Data Jabatan</h2>
    <p class="section-lead">
        Informasi tentang data jabatan dihalaman ini.
    </p>
  <div class="col-xs|sm|md|lg|xl-1-12">
        <div class="card card-primary">
            <div class="card-header">
                <h4>Data OPD</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <table>
                        <tr>
                            <td>Kode OPD : <?= $dataopd['kode']; ?> </td>
                            <td>Nama OPD : <?= $dataopd['nama_opd']; ?></td>
                            <td>Kode Pos : <?= $dataopd['kode_pos']; ?></td>
                        </tr>
                        <tr>
                            <td>Nomor Unit Kerja : <?= $dataopd['nomor_unit_kerja']; ?> </td>
                            <td>Alamat : <?= $dataopd['alamat_opd']; ?></td>
                            <td>Telepon : <?= $dataopd['telepon']; ?></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>Email : <?= $dataopd['email']; ?></td>
                            <td>Fax : <?= $dataopd['fax']; ?></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
  </div>
  <div class="col-xs|sm|md|lg|xl-1-12">
        <div class="card card-primary">
                <!-- <div class="card-header">
                    <h4>Data Jabatan</h4>
                </div> -->
                <div class="card-body table-responsive">
                    <table style="font-size: 12px;" class="table-striped table-sm table table-hover" id="table-1">
                        <thead style="background-color: rgba(90, 69, 250, 0.867); color: yellow;">
                            <tr>
                                <th rowspan="1" colspan="1">No</th>
                                <th rowspan="1" colspan="1">Kode</th>
                                <th rowspan="1" colspan="1">Nama Jabatan</th>
                                <th rowspan="1" colspan="1">Nama Bidang</th>
                                <th rowspan="1" colspan="1">Nama Sub Bidang</th>
                                <th rowspan="1" colspan="1" style="width: 1%;">Aksi</th>
                                <th rowspan="1" colspan="1" style="width: 1%;"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            <?php foreach($datajabatan as $dj) : ?>
                            <tr>
                                <td><?= $no; ?></td>
                                <td><?= $dj->kode; ?></td>
                                <td><?= $dj->nama_jabatan; ?></td>
                                <td><?= $dj->nama_bidang; ?></td>
                                <td><?= $dj->nama_sub_bidang; ?></td>
                                <td class="text-right">
                                    <form action="<?= base_url('master/f_editjabatans/' . $dj->id . '/edit'); ?>" method="post">
                                        <button style="cursor: pointer;" class="btn btn-sm btn-success" data-toggle="tooltip" title="EDIT JABATAN : <?= $dj->nama_jabatan; ?>">
                                            <i class="fas fa-pencil-alt"></i>
                                        </button>
                                    </form>
                                </td>
                                <td>
                                    <a href="<?= base_url('master/hapusjabatans/' . $dj->id); ?>" style="cursor: pointer;" class="btn btn-sm btn-danger btn-hapus" data-toggle="tooltip" title="DELETE BIDANG : <?= $dj->nama_bidang; ?>">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                            <?php $no++; ?>
                            <?php endforeach; ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th rowspan="1" colspan="1">No</th>
                                <th rowspan="1" colspan="1">Kode</th>
                                <th rowspan="1" colspan="1">Nama Jabatan</th>
                                <th rowspan="1" colspan="1">Nama Bidang</th>
                                <th rowspan="1" colspan="1">Nama Sub Bidang</th>
                                <th rowspan="1" colspan="1" style="width: 1%;">Aksi</th>
                                <th rowspan="1" colspan="1" style="width: 1%;"></th>
                            </tr>
                        </tfoot>
                    </table>
            </div>
        </div>
</div>


<?= $this->endSection() ;?>