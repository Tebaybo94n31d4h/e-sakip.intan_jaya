<?= $this->extend('template/default'); ?>

<?= $this->section('content'); ?>

<div id="no_jabatan" data-no_jabatan="<?= session()->getFlashdata('no_jabatan');  ?>"></div>

<div class="section-header">

     <h1> <?= $subtitle; ?></h1>

    <div class="section-header-breadcrumb pr-2">
        <div class="breadcrumb-item active"><a href="<?= base_url('admin/dashboard'); ?>">Dashboard </a> </div>
        <!-- <div class="breadcrumb-item"><a href="#">Bootstrap Components</a></div> -->
        <div class="breadcrumb-item"><?= $subtitle; ?></div>
    </div>

    <div class="section-header-back">
        <form action="<?= base_url('master/pegawais'); ?>" method="post">
            <button class="btn btn-primary">
                <i class="fas fa-arrow-left"></i> 
            </button>
        </form>
    </div>
    
</div>

<div class="section-body">
    <div class="card">
        <form action="<?= base_url('master/proccesseditpegawais'); ?>" method="POST" id="tab-content-1">

            <div class="card-header">
                <h4 class="card-title">Form Edit</h4>
            </div>
            <div class="mb-3 mt-3 card">
                <div class="card-body table-responsive">
                    <?= csrf_field(); ?>
                    <div class="card">
                        <div class="row">
                            <div class="position-relative form-group">
                                <input type="hidden" name="p_id" id="p_id" value="<?= $dataeditjabatan->id; ?>">

                                <label for="nip">Nip <strong class="text-danger"><sup>*</sup></strong> </label>
                                <input name="nip" id="nip" type="text" class="form-control <?= ($validation->hasError('nip')) ? 'is-invalid' : ''; ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('nip'); ?>
                                </div>
                            </div>
                            <div class="position-relative form-group">
                                <label for="nik">Nik <strong class="text-danger"><sup>*</sup></strong></label>
                                <input name="nik" id="nik" type="text" class="form-control <?= ($validation->hasError('nik')) ? 'is-invalid' : ''; ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('nik'); ?>
                                </div>
                            </div>
                            <div class="col">
                                <p class="card-title text-primary" style="font-size: 16px; font-weight: bold;">Biodata Pegawai</p>
                                <div class="position-relative form-group">
                                    <label for="nama_pegawai">Nama Lengkap <strong class="text-danger"><sup>*</sup></strong></label>
                                    <input name="nama_pegawai" id="nama_pegawai" type="text" class="form-control <?= ($validation->hasError('nama_pegawai')) ? 'is-invalid' : ''; ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('nama_pegawai'); ?>
                                    </div>
                                </div>
                                <div class="position-relative form-group">
                                    <label for="jk">Jenis Kelamin <strong class="text-danger"><sup>*</sup></strong></label>
                                    <select class="form-control <?= ($validation->hasError('jk')) ? 'is-invalid' : ''; ?>" name="jk" id="jk">
                                        <option value="">-- Pilih Jenis Kelamin --</option>
                                        <?php if($dataeditjabatan->jenis_kelamin_code == 1) : ?>
                                            <option value="1" selected>Laki-Laki</option>
                                            <option value="2">Perempuan</option>
                                        <?php else : ?>
                                            <option value="1">Laki-Laki</option>
                                            <option value="2" selected>Perempuan</option>
                                        <?php endif; ?>
                                    </select>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('jk'); ?>
                                    </div>
                                </div>
                                <div class="position-relative form-group">
                                    <label for="jabatan">Jabatan</label>
                                    <?php foreach($jabatan as $j) : ?>
                                        <?php if ($dataPegawai->jabatan_id == $j->id) :?>
                                            <input name="jabatan" id="jabatan" value="<?= $j->nama_jabatan; ?>" type="text" class="form-control <?= ($validation->hasError('jabatan')) ? 'is-invalid' : ''; ?>">
                                        <?php endif; ?>
                                    <?php endforeach ; ?>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('jabatan'); ?>
                                    </div>
                                </div>
                                <div class="position-relative form-group">
                                    <label for="no_hp">No. Telp/Hp</label>
                                    <input name="no_hp" id="no_hp" type="text" class="form-control <?= ($validation->hasError('no_hp')) ? 'is-invalid' : ''; ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('no_hp'); ?>
                                    </div>
                                </div>
                                <div class="position-relative form-group">
                                    <label for="email">Email</label>
                                    <input name="email" id="email" type="email" class="form-control <?= ($validation->hasError('email')) ? 'is-invalid' : ''; ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('email'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="position-relative form-group">
                                    <div class="bg-primary text-white p-1">
                                        <p class="m-2" style="color: maroon; font-weight: bold;">PERHATIAN</p>
                                        <p class="m-2" style="color: white;">Silahkan pilih opd, untuk mendapatkan jabatan sesuai opd yang dipilih</p>
                                    </div>
                                </div>
                                <p class="card-title text-primary" style="font-size: 16px; font-weight: bold;">Pilih Opsi</p>
                                <div class="position-relative form-group">
                                    <label for="opdid_pegawai">Nama OPD <strong class="text-danger"><sup>*</sup></strong></label>
                                    <select class="form-control <?= ($validation->hasError('opdid_pegawai')) ? 'is-invalid' : ''; ?>" name="opdid_pegawai" id="opdid_pegawai">
                                        <option value="">-- Pilih OPD --</option>
                                        <?php foreach($selectopdsuper as $p) : ?>
                                            <option value="<?= $p->id; ?>"  ><?= $p->nama_opd; ?></option>
                                        <?php endforeach ; ?>
                                    </select>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('opdid_pegawai'); ?>
                                    </div>
                                </div>
                                <div class="position-relative form-group jabatan">
                                    <label for="jabatan_id">Jabatan <strong class="text-danger"><sup>*</sup></strong></label>
                                    <select class="form-control <?= ($validation->hasError('jabatan_id')) ? 'is-invalid' : ''; ?>" name="jabatan_id" id="jabatan_id">
                                        <option value="">---Pilih Jabatan---</option>
                                        <?php foreach($selectjabatansuper as $p) : ?>
                                            <option value="<?= $p->id; ?>" selected><?= $p->nama_jabatan; ?></option>
                                        <?php endforeach ; ?>
                                    </select>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('jabatan_id'); ?>
                                    </div>
                                </div>
                                <div class="position-relative form-group">
                                    <label for="golongan">Golongan <strong class="text-danger"><sup>*</sup></strong></label>
                                    <select class="form-control <?= ($validation->hasError('golongan')) ? 'is-invalid' : ''; ?>" name="golongan" id="golongan">
                                        <option value="">-- Pilih Golongan --</option>
                                        <?php foreach($selectgolongansuper as $gs) : ?>
                                            <?php if($gs->id == $dataeditjabatan->golongan_pegawai_id) : ?>
                                                <option value="<?= $gs->id; ?>" selected><?= $gs->nama_golongan; ?></option>
                                            <?php else : ?>
                                                <option value="<?= $gs->id; ?>"><?= $gs->nama_golongan; ?></option>
                                            <?php endif; ?>
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
                <a href="<?= base_url('master/pegawais'); ?>" class="mt-1 btn btn-secondary">Batal</a>
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
                var jabatan_id = "<?= $dataeditjabatan->jabatan_id ?>";
                console.log(opdIDPegawai,jabatan_id);
                $.ajax({
                    type: "POST",
                    url: "<?= base_url(); ?>/master/getJabatanPegawai",
                    data: {
                        opdIDPegawai :opdIDPegawai,
                        jabatan_id : jabatan_id
                    },
                    dataType: "JSON",
                    success: function (response) {
                        var JabatanPegawai = $("#jabatan_id").html(response)
                        console.log(JabatanPegawai);
                    }
                });
                 
            });
        }

        // $("#opdid_pegawai").change(function () {
        //     var opdIDPegawai = </?= $dataeditjabatan->jabatan_id ?>;
        //     console.log(opdIDPegawai);
        //    $.ajax({
        //        type: "POST",
        //        url: "</?= base_url(); ?>/master/getOpdIDPegawai",
        //        data: {
        //             opdIDPegawai : opdIDPegawai,
        //        },
        //        dataType: "JSON",
        //        success: function (response) {
        //            console.log(response);
        //            $("#opdid_pegawai").html(response);
        //        }
        //    }); 
        // });

        var p_id = "<?= $dataeditjabatan->id; ?>"
        console.log(p_id);
            $.ajax({
                type: "GET",
                url: "<?= base_url(); ?>/master/f_editpegawais/" + p_id + "/json",
                dataType: "JSON",
                success: function (response) {
                    console.log(response);
                    $('[name="nip"]').val(response.nip);
                    $('[name="nik"]').val(response.nik);
                    $('[name="nama_pegawai"]').val(response.nama_pegawai);
                    $('[name="no_hp"]').val(response.no_hp);
                    $('[name="email"]').val(response.email);
                    $('[name="opdid_pegawai"]').val(response.opdid_pegawai).trigger('change');
                    $('[name="jabatan_id"]').val(response.jabatan_id).trigger('change');
                }
            });

        
    });
</script>
<?= $this->endSection() ;?>