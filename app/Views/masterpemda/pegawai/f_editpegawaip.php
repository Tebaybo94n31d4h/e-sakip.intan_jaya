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
        <form action="<?= base_url('master/proccesseditpegawaip'); ?>" method="POST" id="tab-content-1">

            <div class="card-header">
                <h4 class="card-title">Form Edit</h4>
            </div>
            <div class="mb-3 card">
                <div class="card-body table-responsive">
                    <?= csrf_field(); ?>
                    <div class="card">
                        <div class="row">
                            <div class="col">
                                <p class="card-title text-primary" style="font-size: 16px; font-weight: bold;">Biodata</p>
                                <div class="position-relative form-group">
                                    <input type="hidden" name="pegawai_id" id="pegawai_id" value="<?= $datapegawai->id; ?>">

                                    <label for="nip">Nip <strong class="text-danger"><sup>*</sup></strong> </label>
                                    <input name="nip" id="nip" value="<?= $datapegawai->nip ;?>" type="text" class="form-control <?= ($validation->hasError('nip')) ? 'is-invalid' : ''; ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('nip'); ?>
                                    </div>
                                </div>
                                <div class="position-relative form-group">
                                    <label for="nik">Nik <strong class="text-danger"><sup>*</sup></strong></label>
                                    <input name="nik" value="<?= $datapegawai->nik ;?>" id="nik" type="text" class="form-control <?= ($validation->hasError('nik')) ? 'is-invalid' : ''; ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('nik'); ?>
                                    </div>
                                </div>
                                <div class="position-relative form-group">
                                    <label for="nama_pegawai">Nama Lengkap <strong class="text-danger"><sup>*</sup></strong></label>
                                    <input name="nama_pegawai" value="<?= $datapegawai->nama_pegawai ;?>" id="nama_pegawai" type="text" class="form-control <?= ($validation->hasError('nama_pegawai')) ? 'is-invalid' : ''; ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('nama_pegawai'); ?>
                                    </div>
                                </div>
                                <div class="position-relative form-group">
                                    <label for="jk">Jenis Kelamin <strong class="text-danger"><sup>*</sup></strong></label>
                                    <select class="form-control <?= ($validation->hasError('jk')) ? 'is-invalid' : ''; ?>" name="jk" id="jk">
                                        <option value="">-- Pilih Jenis Kelamin --</option>
                                        <!-- </?php if($dataeditjabatan->jenis_kelamin_code == 1) : ?> -->
                                            <option value="1" selected>Laki-Laki</option>
                                            <option value="2">Perempuan</option>
                                        <!-- </?php else : ?> -->
                                            <option value="1">Laki_laki</option>
                                            <option value="2" selected>Perempuan</option>
                                        <!-- </?php endif; ?> -->
                                    </select>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('jk'); ?>
                                    </div>
                                </div>
                                <div class="position-relative form-group">
                                    <label for="no_hp">No. Telp</label>
                                    <input name="no_hp" value="<?= $datapegawai->no_hp ;?>" id="no_hp" type="text" class="form-control <?= ($validation->hasError('no_hp')) ? 'is-invalid' : ''; ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('no_hp'); ?>
                                    </div>
                                </div>
                                <div class="position-relative form-group">
                                    <label for="email">Email</label>
                                    <input name="email" value="<?= $datapegawai->email ;?>" id="email" type="email" class="form-control <?= ($validation->hasError('email')) ? 'is-invalid' : ''; ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('email'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <p class="card-title text-primary" style="font-size: 16px; font-weight: bold;">Pilih Opsi</p>
                                <div class="position-relative form-group">
                                    <label for="jabatan_id">Jabatan <strong class="text-danger"><sup>*</sup></strong></label>
                                    <select class="form-control <?= ($validation->hasError('jabatan_id')) ? 'is-invalid' : ''; ?>" name="jabatan_id" id="jabatan_id">
                                        <option value="">---Pilih Jabatan---</option>
                                        <?php foreach($selectjabatansuper as $sj) : ?>
                                            <?php if($sj->id == $datapegawai->jabatan_id) : ?>
                                                <option value="<?= $sj->id; ?>" selected><?= $sj->nama_jabatan; ?></option>
                                            <?php else : ?>
                                                <option value="<?= $sj->id; ?>"><?= $sj->nama_jabatan; ?></option>
                                            <?php endif; ?>
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
                                            <?php if($gs->id == $datapegawai->golongan_pegawai_id) : ?>
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
                <a href="<?= base_url('master/pegawaip'); ?>" class="mt-1 btn btn-secondary">Batal</a>
            </div>
        <!-- </div> -->
        </form>
    </div>
</div>

<script src="<?= base_url(); ?>/jquery/jquery-3.6.0.js"></script>


<?= $this->endSection() ;?>