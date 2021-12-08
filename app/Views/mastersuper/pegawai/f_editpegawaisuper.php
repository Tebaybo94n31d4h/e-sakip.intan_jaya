<?= $this->extend('template/default'); ?>

<?= $this->section('content'); ?>

<div id="no_jabatan" data-no_jabatan="<?= session()->getFlashdata('no_jabatan');  ?>"></div>
<div id="berhasil" data-berhasil="<?= session()->getFlashdata('berhasil');  ?>"></div>

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

<div class="section-body">
    <div class="card">
        <form action="<?= htmlentities(base_url('master/proccesseditpegawais')); ?>" method="POST" id="tab-content-1">

            <div class="card-header">
                <h4 class="card-title">Form Edit</h4>
            </div>
            <div class="mb-3 mt-3 card">
                <div class="card-body table-responsive">
                    <?= csrf_field(); ?>
                    <input type="hidden" name="_method" value="PUT" />
                    <div class="card">
                        <div class="row">
                            <div class="position-relative form-group">
                                <input type="hidden" name="p_id" id="p_id" value="<?=  htmlentities($dataPegawai->id); ?>">

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
                            <div class="col-12 col-sm-12 col-lg-12">
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
                            </div>
                            
                            <div class="col-12 col-sm-12 col-lg-9">
                                <p class="card-title text-primary" style="font-size: 16px; font-weight: bold;">Pilih Opsi</p>
                                <div class="position-relative form-group opd">
                                    <label>Nama OPD <strong class="text-danger"><sup>*</sup></strong></label>
                                        
                                        <?php foreach($selectopdsuper as $p) : ?>
                                            
                                            <?php if($p->id == $pegawai_opd_id->opd_id) : ?>
                                                <input id="opd_id" name="opd_id" type="text" class="form-control" value="<?= htmlentities($p->nama_opd) ;?>" readonly>
                                            <?php endif; ?>

                                        <?php endforeach ; ?>
                                </div>
                                 <div class="position-relative form-group jabatan">
                                   <label for="jabatan_id">Jabatan <strong class="text-danger"><sup>*</sup></strong></label>
                                   <select class="form-control <?= ($validation->hasError('jabatan_id')) ? 'is-invalid' : ''; ?>" name="jabatan_id" id="jabatan_id">
                                       <option value="">---Pilih Jabatan---</option>
                                       
                                   </select>
                                   <div class="invalid-feedback">
                                       <?= $validation->getError('jabatan_id'); ?>
                                   </div>
                               </div>           
                            </div>
                            <div  class="col-12 col-sm-12 col-lg-3">
                                <div class="row">
                                    <p class="card-title text-primary pb-4" style="font-size: 16px; font-weight: bold;">Pilih Mutasi</p>
                                    <div class="input-group mb-4">
                                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop" type="button">Mutasi</button>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-12 col-sm-12 col-lg-12">
                                <div class="position-relative form-group">
                                    <label for="golongan">Golongan <strong class="text-danger"><sup>*</sup></strong></label>
                                    <select class="form-control <?= ($validation->hasError('golongan')) ? 'is-invalid' : ''; ?>" name="golongan" id="golongan">
                                        <option value="">-- Pilih Golongan --</option>
                                        <?php foreach($selectgolongansuper as $gs) : ?>
                                            <?php if($gs->id == $dataeditjabatan->golongan_id) : ?>
                                                <option value="<?= htmlentities($gs->id); ?>" selected><?= htmlentities($gs->nama_golongan); ?> - <?= htmlentities($gs->kode); ?> </option>
                                            <?php else : ?>
                                                <option value="<?= htmlentities($gs->id); ?>"><?= htmlentities($gs->nama_golongan); ?> - <?= htmlentities($gs->kode); ?> </option>
                                            <?php endif; ?>
                                        <?php endforeach ; ?>
                                    </select>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('golongan'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="position-relative form-group col-12 col-sm-12 col-lg-6">
                                <label for="no_hp">No. Telp/Hp</label>
                                <input name="no_hp" id="no_hp" type="text" class="form-control <?= ($validation->hasError('no_hp')) ? 'is-invalid' : ''; ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('no_hp'); ?>
                                </div>
                            </div>
                            <div class="position-relative form-group col-12 col-sm-12 col-lg-6">
                                <label for="email">Email</label>
                                <input name="email" id="email" type="email" class="form-control <?= ($validation->hasError('email')) ? 'is-invalid' : ''; ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('email'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- </div> -->
            <div class="card-footer text-right">
                <button type="submit" class="mt-1 ml-3 mr-1 btn btn-success"> <i class="fas fa-paper-plane"></i> Simpan</button>
                <a href="<?= htmlentities(base_url('master/pegawais')); ?>" class="mt-1 btn btn-secondary">Batal</a>
            </div>
        <!-- </div> -->
        </form>
    </div>
</div>
</div>

<!-- Modal Ubah Jabatan berdasarkan OPD-->
<form action="<?= base_url('master/editjabatanMutasi') ;?>" method="post">
<?= csrf_field() ;?>
<input type="hidden" name="_method" value="PUT" />
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Mutasi Jabatan</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
            <div class="col-12 col-sm-12 col-lg-12">
                <div class="row" id="data-hidden">
                    <div class="position-relative form-group">
                        <input type="hidden" name="p_id" id="p_id" value="<?=  htmlentities($dataPegawai->id); ?>">

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
                    <div class="col-12 col-sm-12 col-lg-12">
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
                    </div>
                    
                    <div class="col-12 col-sm-12 col-lg-12">
                        <div class="position-relative form-group">
                            <label for="golongan">Golongan <strong class="text-danger"><sup>*</sup></strong></label>
                            <select class="form-control <?= ($validation->hasError('golongan')) ? 'is-invalid' : ''; ?>" name="golongan" id="golongan">
                                <option value="">-- Pilih Golongan --</option>
                                <?php foreach($selectgolongansuper as $gs) : ?>
                                    <?php if($gs->id == $dataeditjabatan->golongan_id) : ?>
                                        <option value="<?= htmlentities($gs->id); ?>" selected><?= htmlentities($gs->nama_golongan); ?> - <?= htmlentities($gs->kode); ?> </option>
                                    <?php else : ?>
                                        <option value="<?= htmlentities($gs->id); ?>"><?= htmlentities($gs->nama_golongan); ?> - <?= htmlentities($gs->kode); ?> </option>
                                    <?php endif; ?>
                                <?php endforeach ; ?>
                            </select>
                            <div class="invalid-feedback">
                                <?= $validation->getError('golongan'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="position-relative form-group col-12 col-sm-12 col-lg-6">
                        <label for="no_hp">No. Telp/Hp</label>
                        <input name="no_hp" id="no_hp" type="text" class="form-control <?= ($validation->hasError('no_hp')) ? 'is-invalid' : ''; ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('no_hp'); ?>
                        </div>
                    </div>
                    <div class="position-relative form-group col-12 col-sm-12 col-lg-6">
                        <label for="email">Email</label>
                        <input name="email" id="email" type="email" class="form-control <?= ($validation->hasError('email')) ? 'is-invalid' : ''; ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('email'); ?>
                        </div>
                    </div>
                </div>
                <div class="position-relative form-group">
                    <label for="id_opdMutasi">Nama OPD <strong class="text-danger"><sup>*</sup></strong></label>
                    <select class="form-control <?= ($validation->hasError('id_opdMutasi')) ? 'is-invalid' : ''; ?>" name="id_opdMutasi" id="id_opdMutasi">
                        <option value="">-- Pilih OPD --</option>
                        
                        <?php foreach($selectopdsuper as $p) : ?>
                            
                                <option value="<?= htmlentities($p->id); ?>"  ><?= htmlentities($p->nama_opd); ?></option>
                     
                        <?php endforeach ; ?>

                    </select>
                    <div class="invalid-feedback">
                        <?= $validation->getError('id_opdMutasi'); ?>
                    </div>
                </div>
                <div class="position-relative form-group jabatan">
                    <label for="jabatan_idMutasi">Jabatan <strong class="text-danger"><sup>*</sup></strong></label>
                    <select class="form-control <?= ($validation->hasError('jabatan_idMutasi')) ? 'is-invalid' : ''; ?>" name="jabatan_idMutasi" id="jabatan_idMutasi">
                        <option value="">---Pilih Jabatan---</option>
                        
                    </select>
                    <div class="invalid-feedback">
                        <?= $validation->getError('jabatan_idMutasi'); ?>
                    </div>
                </div>
                                
            </div>
      </div>
      <div class="modal-footer">
          <button type="submit" class="btn btn-primary">SImpan Mutasi</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
      </div>
    </div>
  </div>
</div>
</form>

<script src="<?= base_url(); ?>/jquery/jquery-3.6.0.js"></script>

<script>
    $(document).ready(function () {
        $('.opd').hide()
        $('#data-hidden').hide()
        loadjabatanMutasi();
        loadjabatan();

        function loadjabatan () {
            $("#opd_id").change(function () {
                var opdIDPegawai = <?= $pegawai_opd_id->opd_id ?>;
                var jabatan_id = <?= $dataPegawai->jabatan_id?>;
                console.log(opdIDPegawai);
                $.ajax({
                    type: "GET",
                    url: "<?= htmlentities(base_url('/master/getJabatanPegawai')); ?>/" + opdIDPegawai + '/' + jabatan_id,
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

        function loadjabatanMutasi () {
            $("#id_opdMutasi").change(function () {
                var id_opdMutasi = $("#id_opdMutasi").val();
                console.log(id_opdMutasi);
                $.ajax({
                    type: "GET",
                    url: "<?= htmlentities(base_url('/master/getJabatanPegawai')); ?>/" + id_opdMutasi,
                    // data: {
                    //     opdIDPegawai :opdIDPegawai
                    // },
                    dataType: "JSON",
                    success: function (response) {
                         var jabatan = $("#jabatan_idMutasi").html(response)
                        console.log(jabatan);
                    }
                }); 
            });
        }

        var p_id = "<?= $dataeditjabatan->id; ?>";
        console.log(p_id);
            $.ajax({
                type: "GET",
                url: "<?= base_url('/master/f_editpegawais'); ?>/" + p_id + "/json",
                dataType: "JSON",
                success: function (response) {
                    console.log(response);
                    $('[name="nip"]').val(response.nip);
                    $('[name="nik"]').val(response.nik);
                    $('[name="nama_pegawai"]').val(response.nama_pegawai);
                    $('[name="no_hp"]').val(response.no_hp);
                    $('[name="email"]').val(response.email);
                    $('[name="opd_id"]').val(response.opdid_pegawai).trigger('change');
                    $('[name="jabatan_id"]').val(response.jabatan_id).trigger('change');
                }
            });

        
    });
</script>
<?= $this->endSection() ;?>