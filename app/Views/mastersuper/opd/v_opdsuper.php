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
        <div class="breadcrumb-item active"><a href="<?= base_url('admin/dashboard'); ?>">Dashboard</a></div>
        <!-- <div class="breadcrumb-item"><a href="#">Bootstrap Components</a></div> -->
        <div class="breadcrumb-item"><?= $subtitle; ?> </div>
    </div>
    <div class="section-header-button" id="tombol-tambah">
        <!-- <form action="</?= base_url('master/f_opds'); ?>" method="post"> -->
            <button onclick="tambahopd()" class="btn btn-primary btn-icon icon-left">
                <i class="fas fa-plus"></i>
                <span>Tambah Baru</span>
            </button>
        <!-- </form> -->
    </div>
    <div class="section-header-back" id="tombol-kembali">
        <!-- <form action="</?= base_url('master/opds'); ?>" method="post"> -->
            <button onclick="kembaliopd()" class="btn btn-primary btn-icon icon-left ml-4">
                <i class="fas fa-arrow-left"></i> 
            </button>
        <!-- </form> -->
    </div>
</div>

<div class="section-body" id="halaman-opd" style="font-size: 12px;">
    <h2 class="section-title">Data OPD</h2>
    <p class="section-lead">
        Informasi tentang data opd dihalaman ini.
    </p>
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
                            <td><?= $no; ?></td>
                            <td><?= $p->kode; ?></td>
                            <td><?= $p->nama_opd; ?></td>
                            <td >
                                <form action="<?= base_url('master/bidangs/' . $p->id); ?>" method="post">
                                    <button style="cursor: pointer;" class="btn btn-sm btn-light" data-toggle="tooltip" title="FORM BIDANG DENGAN OPD : <?= $p->nama_opd; ?>">
                                        <i class="fas fa-folder"></i> Bidang
                                    </button>
                                </form>
                            </td>
                            <td>
                                <form action="<?= base_url('master/jabatans/' . $p->id); ?>" method="post">
                                    <button class="btn btn-sm btn-light" style="cursor: pointer;" data-toggle="tooltip" title="FORM JABATAN DENGAN OPD : <?= $p->nama_opd; ?>">
                                        <i class="fas fa-folder"></i> Jabatan
                                    </button>
                                </form>
                            </td>
                            <td >
                                <form action="<?= base_url('master/f_editopds/' . $p->id); ?>" method="post">
                                    <button style="cursor: pointer;" class="btn btn-sm btn-success" data-toggle="tooltip" title="EDIT OPD : <?= $p->nama_opd; ?>">
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

<div class="section-body" id="form-tambah">
    <div class="card">
        <!-- <form action="</?= base_url('master/proccesstambahopds'); ?>" method="POST" id="tab-content-1"> -->

            <div class="card-header">
                <h4 class="card-title">Form Tambah</h4>
            </div>
            <div class="mb-3 mt-3 card">
                <div class="card-body table-responsive">
                    <?= csrf_field(); ?>

                    <!-- alert error -->
                    <div class="alert alert-danger error" role="alert" style="display: none;"></div>
                    <!-- alert sukses -->
                    <div class="alert alert-primary sukses" role="alert" style="display: none;"></div>

                    <div class="card">
                        <div class="row">
                            <div class="col">
                                <div class="position-relative form-group">
                                    <label for="kode">Kode <strong class="text-danger"><sup>*</sup></strong> </label>
                                    <input name="kode" id="kode" type="text" class="form-control <?= ($validation->hasError('kode')) ? 'is-invalid' : ''; ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('kode'); ?>
                                    </div>
                                </div>
                                <div class="position-relative form-group">
                                    <label for="no_unit_kerja">Nomor Unit Kerja <strong class="text-danger"><sup>*</sup></strong></label>
                                    <input name="no_unit_kerja" id="no_unit_kerja" type="text" class="form-control <?= ($validation->hasError('no_unit_kerja')) ? 'is-invalid' : ''; ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('no_unit_kerja'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <p class="card-title text-primary" style="font-size: 16px; font-weight: bold;">Pilih Opsi</p>
                                <div class="position-relative form-group col">
                                    <label for="type">Type OPD <strong class="text-danger"><sup>*</sup></strong></label>
                                    <select class="form-select <?= ($validation->hasError('type')) ? 'is-invalid' : ''; ?>" name="type" id="type">
                                        <option value="">-- PILIH KATEGORI --</option>
                                        <?php foreach($selectTipeOpd as $st) : ?>
                                        <option value="<?= $st->id; ?>"><?= $st->tipe; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('type'); ?>
                                    </div>
                                </div>
                                <div class="position-relative form-group col">
                                    <label for="lvl_opd_id">Level <strong class="text-danger"><sup>*</sup></strong></label>
                                    <select class="form-select <?= ($validation->hasError('lvl_opd_id')) ? 'is-invalid' : ''; ?>" name="lvl_opd_id" id="lvl_opd_id">
                                        <option value="">-- PILIH LEVEL --</option>
                                        <?php foreach($levelopd as $lo) : ?>
                                            <option value="<?= $lo->id; ?>"><?= $lo->nama_level; ?></option>
                                        <?php endforeach ; ?>
                                    </select>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('lvl_opd_id'); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class=" mt-3 card">
                        <p class="card-title text-primary" style="font-size: 16px; font-weight: bold;">Biodata OPD</p>
                        <div class="position-relative form-group">
                            <label for="nama_opd">Nama OPD <strong class="text-danger"><sup>*</sup></strong></label>
                            <input name="nama_opd" id="nama_opd" type="text" class="form-control <?= ($validation->hasError('nama_opd')) ? 'is-invalid' : ''; ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('nama_opd'); ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="position-relative form-group">
                                    <label for="alamat">Alamat</label>
                                    <input name="alamat" id="alamat" type="text" class="form-control <?= ($validation->hasError('alamat')) ? 'is-invalid' : ''; ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('alamat'); ?>
                                    </div>
                                </div>
                                <div class="position-relative form-group">
                                    <label for="kode_pos">Kode POS</label>
                                    <input name="kode_pos" id="kode_pos" type="text" class="form-control <?= ($validation->hasError('kode_pos')) ? 'is-invalid' : ''; ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('kode_pos'); ?>
                                    </div>
                                </div>
                                <div class="position-relative form-group">
                                    <label for="telepon">Telepon</label>
                                    <input name="telepon" id="telepon" type="text" class="form-control <?= ($validation->hasError('telepon')) ? 'is-invalid' : ''; ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('telepon'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="position-relative form-group">
                                    <label for="email">Email</label>
                                    <input name="email" id="email" type="email" class="form-control <?= ($validation->hasError('email')) ? 'is-invalid' : ''; ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('email'); ?>
                                    </div>
                                </div>
                                <div class="position-relative form-group">
                                    <label for="website">Website</label>
                                    <input name="website" id="website" type="text" class="form-control <?= ($validation->hasError('website')) ? 'is-invalid' : ''; ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('website'); ?>
                                    </div>
                                </div>
                                <div class="position-relative form-group">
                                    <label for="fax">FAX</label>
                                    <input name="fax" id="fax" type="text" class="form-control <?= ($validation->hasError('fax')) ? 'is-invalid' : ''; ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('fax'); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer text-right">
                <button type="submit" onclick="simpan()" class="mt-1 ml-3 mr-1 btn btn-success"> <i class="fas fa-paper-plane"></i> Simpan</button>
                <button type="button" onclick="kembaliopd()" class="mt-1 btn btn-secondary">Batal</button>
            </div>
        <!-- </form> -->
    </div>
</div>

<script src="<?= base_url(); ?>/jquery/jquery-3.6.0.js"></script>

<script>
    $(document).ready(function () {
       $("#form-tambah").hide(); 
       $("#tombol-kembali").hide(); 
    });

    function tambahopd() {
        $("#halaman-opd").hide(1000);
        $("#tombol-tambah").hide(1000);
        $("#form-tambah").show(1000);
        $("#tombol-kembali").show(1000);
    }
    function kembaliopd() {
        if ($('.sukses').is(":visible")) {
            window.location.href = "<?php current_url()."?".$_SERVER['QUERY_STRING'] ?>";
        }
        $('.alert').hide();
        // bersihkan(); 

        $("#halaman-opd").show(1000);
        $("#tombol-tambah").show(1000);
        $("#form-tambah").hide(1000);
        $("#tombol-kembali").hide(1000);
    }

    function simpan() {
        var kode = $("#kode").val();
        var no_unit_kerja = $("#no_unit_kerja").val();
        var type = $("#type").val();
        var lvl_opd_id = $("#lvl_opd_id").val();
        var nama_opd = $("#nama_opd").val();
        var alamat = $("#alamat").val();
        var kode_pos = $("#kode_pos").val();
        var telepon = $("#telepon").val();
        var email = $("#email").val();
        var website = $("#website").val();
        var fax = $("#fax").val();

        $.ajax({
            type: "post",
            url: "<?= base_url('master/proccesstambahopds'); ?>",
            data: {
                kode: kode,
                no_unit_kerja: no_unit_kerja,
                type: type,
                lvl_opd_id: lvl_opd_id,
                nama_opd: nama_opd,
                alamat: alamat,
                kode_pos: kode_pos,
                telepon: telepon,
                email: email,
                website: website,
                fax: fax
            },
            success: function (hasil) {
                var $data = $.parseJSON(hasil);
                if ($data.sukses == false) {
                    $('.sukses').hide(1000);
                    $('.error').show(1000);
                    $('.error').html($data.error);
                } else {
                    $('.error').hide(1000);
                    $('.sukses').show(1000);
                    $('.sukses').html($data.sukses);
                }
            }
        });

    }
</script>

<?= $this->endSection() ;?>