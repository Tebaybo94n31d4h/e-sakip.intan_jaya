<?= $this->extend('template/default'); ?>

<?= $this->section('content'); ?>

<div id="no_jabatan" data-no_jabatan="<?= session()->getFlashdata('no_jabatan');  ?>"></div>

<div class="section-header">

     <h1> <?= htmlentities($subtitle); ?></h1>

    <div class="section-header-breadcrumb pr-2">
        <div class="breadcrumb-item active"><a href="<?= htmlentities(base_url('admin/dashboard')); ?>">Dashboard </a> </div>
        <!-- <div class="breadcrumb-item"><a href="#">Bootstrap Components</a></div> -->
        <div class="breadcrumb-item"><?= htmlentities($subtitle); ?></div>
    </div>

    <div class="section-header-back">
        <form action="<?= htmlentities(base_url('master/pegawais')); ?>" method="post">
            <?= csrf_field(); ?>
            <button class="btn btn-primary">
                <i class="fas fa-arrow-left"></i> 
            </button>
        </form>
    </div>
    
</div>

<div class="section-body" style="font-size: 12px;">
    <div class="card">
        <form action="<?= htmlentities(base_url('master/proccesstambahpegawais')); ?>" method="POST" id="tab-content-1">

            <div class="card-header">
                <h4 class="card-title">Form Tambah</h4>
            </div>
            <div class="mb-3 mt-3 card">
                <div class="card-body table-responsive">
                <?= csrf_field(); ?>
                    <div class="card">
                        <div class="row">
                            <div class="position-relative form-group">
                                <label for="nik">Nik <strong class="text-danger"><sup>*</sup></strong></label>
                                <input name="nik" value="<?= old('nik') ?>" id="nik" type="text" class="form-control <?= ($validation->hasError('nik')) ? 'is-invalid' : ''; ?>" placeholder="Masukkan nik">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('nik'); ?>
                                </div>
                            </div>
                            <div class="position-relative form-group">
                                <label for="nip">Nip <strong class="text-danger"><sup>*</sup></strong> </label>
                                <input name="nip" value="<?= old('nip') ?>" id="nip" type="text" class="form-control <?= ($validation->hasError('nip')) ? 'is-invalid' : ''; ?>" placeholder="Masukkan nip">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('nip'); ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-sm-12 col-lg-6">
                                    <p class="card-title text-primary" style="font-size: 16px; font-weight: bold;">Biodata Pegawai</p>
                                    <div class="position-relative form-group">
                                        <label for="nama_pegawai">Nama Lengkap <strong class="text-danger"><sup>*</sup></strong></label>
                                        <input name="nama_pegawai" value="<?= old('nama_pegawai') ?>" id="nama_pegawai" type="text" class="form-control <?= ($validation->hasError('nama_pegawai')) ? 'is-invalid' : ''; ?>" placeholder="Masukkan nama lengkap">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('nama_pegawai'); ?>
                                        </div>
                                    </div>
                                    <div class="position-relative form-group">
                                        <label for="jk">Jenis Kelamin <strong class="text-danger"><sup>*</sup></strong></label>
                                        <select class="form-control <?= ($validation->hasError('jk')) ? 'is-invalid' : ''; ?>" name="jk" id="jk">
                                            <option value="">-- Pilih Jenis Kelamin --</option>
                                            <option value="1">Laki-Laki</option>
                                            <option value="2">Perempuan</option>
                                        </select>
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('jk'); ?>
                                        </div>
                                    </div>
                                    <div class="position-relative form-group">
                                        <label for="no_hp">No. Telp/Hp</label>
                                        <input name="no_hp" value="<?= old('no_hp') ?>" id="no_hp" type="text" class="form-control <?= ($validation->hasError('no_hp')) ? 'is-invalid' : ''; ?>" placeholder="0852xxxxxxxx">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('no_hp'); ?>
                                        </div>
                                    </div>
                                    <div class="position-relative form-group">
                                        <label for="email">Email</label>
                                        <input name="email" value="<?= old('email') ?>" id="email" type="email" class="form-control <?= ($validation->hasError('email')) ? 'is-invalid' : ''; ?>" placeholder="jhon@gmail.com">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('email'); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-12 col-lg-6">
                                    <div class="position-relative form-group">
                                        <div class="bg-warning text-white p-1 shadow">
                                            <p class="m-2" style="color: maroon; font-weight: bold;">PERHATIAN</p>
                                            <p class="m-2" style="color: black;">"Silahkan pilih opd, untuk mendapatkan jabatan sesuai opd yang dipilih"</p>
                                        </div>
                                    </div>
                                    <p class="card-title text-primary" style="font-size: 16px; font-weight: bold;">Pilih Opsi</p>
                                    <div class="position-relative form-group">
                                        <label for="opdid_pegawai">Nama OPD <strong class="text-danger"><sup>*</sup></strong></label>
                                        <select class="form-control <?= ($validation->hasError('opdid_pegawai')) ? 'is-invalid' : ''; ?>" name="opdid_pegawai" id="opdid_pegawai">
                                            <option value="">-- Pilih OPD --</option>
                                            <?php foreach($selectopdsuper as $os) : ?>
                                                <option value="<?= htmlentities($os->id); ?>"><?= htmlentities($os->nama_opd); ?></option>
                                            <?php endforeach ; ?>
                                        </select>
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('opdid_pegawai'); ?>
                                        </div>
                                    </div>
                                    <div class="position-relative form-group">
                                        <label for="jabatan_id">Jabtan <strong class="text-danger"><sup>*</sup></strong></label>
                                        <select class="form-control <?= ($validation->hasError('jabatan_id')) ? 'is-invalid' : ''; ?>" name="jabatan_id" id="jabatan_id">
                                            <option value="">---Pilih Jabatan---</option>
                                        </select>
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('jabatan_id'); ?>
                                        </div>
                                    </div>
                                    <div class="position-relative form-group">
                                        <label for="golongan">Golongan <strong class="text-danger"><sup>*</sup></strong></label>
                                        <select class="form-control <?= ($validation->hasError('golongan')) ? 'is-invalid' : ''; ?>" name="golongan" id="golongan">
                                            <option value="">-- Pilih Golongan --</option>
                                            <?php foreach($selectgolongansuper as $gs) : ?> -->
                                                <option value="<?= htmlentities($gs->id); ?>"><?= htmlentities($gs->nama_golongan); ?> - <?= $gs->kode; ?> </option>
                                            <?php endforeach ; ?>
                                        </select>
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('golongan'); ?>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                            
                        </div>
                    </div>    
                </div>
            </div>
            <div class="card-footer text-right">
                <button type="submit" class="mt-1 ml-3 mr-1 btn btn-success"> <i class="fas fa-paper-plane"></i> Simpan</button>
                <a href="<?= htmlentities(base_url('master/pegawais')); ?>" class="mt-1 btn btn-secondary">Batal</a>
            </div>
        <!-- </div> -->
        </form>
    </div>
</div>
<script src="<?= base_url(); ?>/jquery/jquery-3.6.0.js"></script>

<script>
    $(document).ready(function () {

        loadjabatan();

        function loadjabatan () {
            $("#opdid_pegawai").change(function () {
                var opdIDPegawai = $("#opdid_pegawai").val();
                console.log(opdIDPegawai);
                $.ajax({
                    type: "GET",
                    url: "<?= htmlentities(base_url('/master/getJabatanPegawai')); ?>/" + opdIDPegawai,
                    // data: {
                    //     opdIDPegawai :opdIDPegawai
                    // },
                    dataType: "JSON",
                    success: function (response) {
                         var jabatan = $("#jabatan_id").html(response)
                        console.log(jabatan);
                    }
                }); 
            });
        }

        
    });
</script>
<?= $this->endSection() ;?>