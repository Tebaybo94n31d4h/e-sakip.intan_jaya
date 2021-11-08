<?= $this->extend('template/default'); ?>

<?= $this->section('content'); ?>

<div id="no_jabatan" data-no_jabatan="<?= session()->getFlashdata('no_jabatan');  ?>"></div>

<div class="section-header">

     <h1> <?= $subtitle; ?></h1>

    <div class="section-header-breadcrumb pr-2">
        <div class="breadcrumb-item active"><a href="<?= base_url('admin/dashboardp'); ?>">Dashboard </a> </div>
        <!-- <div class="breadcrumb-item"><a href="#">Bootstrap Components</a></div> -->
        <div class="breadcrumb-item"><?= $subtitle; ?></div>
    </div>

    <div class="section-header-back">
        <form action="<?= base_url('master/pegawaip'); ?>" method="post">
            <button class="btn mt-2 mb-2 btn-primary">
                <i class="fas fa-arrow-left"></i> 
            </button>
        </form>
    </div>
    
</div>

<div class="section-body">
    <div class="card">
        <form action="<?= base_url('master/proccesstambahpegawaip'); ?>" method="POST" id="tab-content-1">

            <div class="card-header">
                <h4 class="card-title">Form Tambah</h4>
            </div>

                <div class="mb-3 card">
                    <div class="card-body table-responsive">
                            <?= csrf_field(); ?>
                            <div class="card">
                                <div class="row">
                                    <div class="col">
                                    <p class="card-title text-primary" style="font-size: 16px; font-weight: bold;">Biodata</p>
                                        <div class="position-relative form-group">
                                            <label for="nip">NIP <strong class="text-danger"><sup>*</sup></strong> </label>
                                            <input name="nip" id="nip" type="text" class="form-control <?= ($validation->hasError('nip')) ? 'is-invalid' : ''; ?>">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('nip'); ?>
                                            </div>
                                        </div>
                                        <div class="position-relative form-group">
                                            <label for="nik">NIK <strong class="text-danger"><sup>*</sup></strong></label>
                                            <input name="nik" id="nik" type="text" class="form-control <?= ($validation->hasError('nik')) ? 'is-invalid' : ''; ?>">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('nik'); ?>
                                            </div>
                                        </div>
                                        <div class="position-relative form-group">
                                            <label for="nama_pegawai">NAMA LENGKAP <strong class="text-danger"><sup>*</sup></strong></label>
                                            <input name="nama_pegawai" id="nama_pegawai" type="text" class="form-control <?= ($validation->hasError('nama_pegawai')) ? 'is-invalid' : ''; ?>">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('nama_pegawai'); ?>
                                            </div>
                                        </div>
                                        <div class="position-relative form-group">
                                            <label for="jk">JENIS KELAMIN <strong class="text-danger"><sup>*</sup></strong></label>
                                            <select class="form-control <?= ($validation->hasError('jk')) ? 'is-invalid' : ''; ?>" name="jk" id="jk">
                                                <option value="">-- PILIH JENIS KELAMIN --</option>
                                                <option value="1">LAKI-LAKI</option>
                                                <option value="2">PEREMPUAN</option>
                                            </select>
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('jk'); ?>
                                            </div>
                                        </div>
                                        <div class="position-relative form-group">
                                            <label for="no_hp">NO. HANDPHONE</label>
                                            <input name="no_hp" id="no_hp" type="text" class="form-control <?= ($validation->hasError('no_hp')) ? 'is-invalid' : ''; ?>">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('no_hp'); ?>
                                            </div>
                                        </div>
                                        <div class="position-relative form-group">
                                            <label for="email">EMAIL</label>
                                            <input name="email" id="email" type="email" class="form-control <?= ($validation->hasError('email')) ? 'is-invalid' : ''; ?>">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('email'); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <p class="card-title text-primary" style="font-size: 16px; font-weight: bold;">Pilih Opsi</p>
                                        <div class="position-relative form-group">
                                            <label for="jabatan_id">JABATAN <strong class="text-danger"><sup>*</sup></strong></label>
                                            <select class="form-control <?= ($validation->hasError('jabatan_id')) ? 'is-invalid' : ''; ?>" name="jabatan_id" id="jabatan_id">
                                                <option value="">---PILIH JABATAN---</option>
                                                <?php foreach($selectjabatansuper as $sj) : ?> -->
                                                    <option value="<?= $sj->id; ?>"><?= $sj->nama_jabatan; ?></option>
                                                <?php endforeach ; ?>
                                            </select>
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('jabatan_id'); ?>
                                            </div>
                                        </div>
                                        <div class="position-relative form-group">
                                            <label for="golongan">GOLONGAN <strong class="text-danger"><sup>*</sup></strong></label>
                                            <select class="form-control <?= ($validation->hasError('golongan')) ? 'is-invalid' : ''; ?>" name="golongan" id="golongan">
                                                <option value="">-- PILIH GOLONGAN --</option>
                                                <?php foreach($selectgolongansuper as $gs) : ?> -->
                                                    <option value="<?= $gs->id; ?>"><?= $gs->nama_golongan; ?></option>
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
            <!-- </div> -->
            <div class="card-footer text-right">
                <button type="submit" class="mt-1 ml-3 mr-1 btn btn-success"> <i class="fas fa-paper-plane"></i> Simpan</button>
                <a href="<?= base_url('master/pegawaip'); ?>" class="mt-1 btn btn-secondary">Batal</a>
            </div>
        <!-- </div> -->
        </form>
    </div>
</div>
<script src="<?= base_url(); ?>/jquery/jquery-3.6.0.js"></script>

<script>
    $(document).ready(function () {

        loadpegawai();

        function loadpegawai () {
            $("#opdid_pegawai").change(function () {
                var opdIDPegawai = $("#opdid_pegawai").val();
                console.log(opdIDPegawai);
                $.ajax({
                    type: "POST",
                    url: "<?= base_url(); ?>/master/getJabatanPegawai",
                    data: {
                        opdIDPegawai :opdIDPegawai
                    },
                    dataType: "JSON",
                    success: function (response) {
                        var JabatanPegawai = $("#jabatan_id").html(response)
                        console.log(JabatanPegawai);
                    }
                }); 
            });
        }

        
    });
</script>
<?= $this->endSection() ;?>