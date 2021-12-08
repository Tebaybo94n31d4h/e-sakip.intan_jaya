<?= $this->extend('template/default'); ?>

<?= $this->section('content'); ?>

<div id="sudah_ada" data-sudah_ada="<?= session()->getFlashdata('sudah_ada');  ?>"></div>

<div class="section-header">
    <h1><?= htmlentities($subtitle); ?></h1>
    
    <div class="section-header-breadcrumb pr-2">
        <div class="breadcrumb-item active"><a href="<?= htmlentities(base_url('admin/dashboard')); ?>">Dashboard</a></div>
        <!-- <div class="breadcrumb-item"><a href="#">Bootstrap Components</a></div> -->
        <div class="breadcrumb-item"><?= htmlentities($subtitle); ?></div>
    </div>
    <div class="section-header-back">
        <form action="<?= htmlentities(base_url('master/jabatans/' . $dataopd['id'])); ?>" method="post">
            <?= csrf_field() ;?>
            <button class="btn btn-primary">
                <i class="fas fa-arrow-left"></i> 
            </button>
        </form>
    </div>
</div>


<div class="section-body" style="font-size: 12px;">
    <div class="card">
        <form action="<?= htmlentities(base_url('master/proccesstambahjabatans/' . $dataopd['id'])); ?>" method="POST" id="tab-content-1">

            <div class="card-header">
                <h4 class="card-title">Form Tambah</h4>
            </div>

            <div class="col-12 col-sm-12 col-lg-12" style="margin: auto;">
                <div class="mb-3 mt-3 card">
                    <div class="card-body">
                        <?= csrf_field(); ?>
                        <div class="card">
                            <div class="row">
                                <div class="col-12 col-sm-12 col-lg-6">
                                    <p class="card-title text-primary" style="font-size: 16px; font-weight: bold;">Pilih Opsi</p>
                                    <div class="position-relative form-group">
                                        <label for="level">Level</label>
                                        <select class="form-control <?= ($validation->hasError('level')) ? 'is-invalid' : ''; ?>" name="level" id="level">
                                            <option value="">-- Pilih Level --</option>
                                            <?php foreach($selectlevel as $sl) : ?>
                                                <option value="<?= htmlentities($sl->id); ?>"><?= htmlentities($sl->notes); ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('level'); ?>
                                        </div>
                                    </div>
                                    <div class="position-relative form-group" id="bidang">
                                        <label for="bidang_id">Bidang</label>
                                        <select class="form-control" name="bidang_id" id="bidang_id">
                                            <option value="">-- Pilih Bidang --</option>
                                            <!-- </?php foreach($selectbidang as $value) : ?>
                                            <option value="</?= $value->id; ?>"></?= $value->nama_bidang; ?></option>
                                            </?php endforeach; ?> -->
                                        </select>
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('bidang_id'); ?>
                                        </div>
                                    </div>
                                    <div class="position-relative form-group" id="subbidang">
                                        <label for="">Sub Bidang</label>
                                        <select class="form-control" name="sub_bidang_id" id="sub_bidang_id">
                                            <option>-- Pilih Sub Bidang --</option>
                                        </select>
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('sub_bidang_id'); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-12 col-lg-6">
                                    <p class="card-title text-primary" style="font-size: 16px; font-weight: bold;">Biodata Jabatan</p>
                                    <div class="position-relative form-group">
                                        <label for="kode">Kode</label>
                                        <input name="kode" id="kode" type="text" class="form-control <?= ($validation->hasError('kode')) ? 'is-invalid' : ''; ?>" placeholder="Masukkan kode jabatan">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('kode'); ?>
                                        </div>
                                    </div>
                                    <div class="position-relative form-group">
                                        <label for="nama_jabatan">Nama Jabtan</label>
                                        <input name="nama_jabatan" id="nama_jabatan" type="text" class="form-control <?= ($validation->hasError('nama_jabatan')) ? 'is-invalid' : ''; ?>" placeholder="Masukkan nama jabatan">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('nama_jabatan'); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <!-- >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>><<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<< -->
                            <!-- Manipulasi Data Bidang dan Sub Bidang -->
                            <?php foreach ($selectlevel as $lvl) : ?>
                                <?php if ($lvl->id == 1) : ?>
                                    <div class="position-relative form-group col-12 col-sm-5 col-lg-6" id="bidangManipulasi">
                                        <label for="bidang_id">BIDANG</label>
                                        <select class="form-control" name="bidang_idManipulasi" id="bidang_idManipulasi">
                                            <option value="NULL"></option>
                                        </select>
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('bidang_id'); ?>
                                        </div>
                                    </div>
                                    <div class="position-relative form-group col-12 col-sm-5 col-lg-6" id="subbidangManipulasi">
                                        <label for="">SUB BIDANG</label>
                                        <select class="form-control" name="sub_bidang_idManipulasi" id="sub_bidang_idManipulasi">
                                            <option value="NULL"></option>
                                        </select>
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('sub_bidang_id'); ?>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            <?php endforeach; ?>
                            <!-- >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>><<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<< -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer text-right">
                <button type="submit" class="btn btn-success"> <i class="fas fa-paper-plane"></i> Simpan</button>
                <a href="<?= htmlentities(base_url('master/jabatans/' . $dataopd['id'])); ?>" class="ml-1 btn btn-secondary">Batal</a>
            </div>
        </form>
    </div>
</div>

<script src="<?= base_url(); ?>/jquery/jquery-3.6.0.js"></script>
                                    
<script>
    $(document).ready(function () {
        $("#bidangManipulasi").hide();
        $("#subbidangManipulasi").hide();
        $("#bidang").hide(); 
        $("#subbidang").hide(); 

        loadLevel();
    });

    function loadLevel () {
        $("#level").change(function() {
            var getLevel = $("#level").val();
            
            console.log(getLevel);
            if (getLevel == 1) {
                $("#bidangManipulasi").hide();
                $("#subbidangManipulasi").hide();
                $("#bidang").hide();
                $("#subbidang").hide();
            } 
            
            if(getLevel == 2){
                $("#bidang").show();
                $("#subbidang").hide();
            }
            
            if(getLevel == 3){
                $("#bidang").show();
                $("#subbidang").show();
            }
            
            if(getLevel == 4){
                $("#bidang").show();
                $("#subbidang").show();
            }          
        });
    }

</script>

<script>
    $(document).ready(function () {

        $("#level").change(function () {
           $.ajax({
               type: "GET",
               url: "<?= base_url('/master/getBidang'); ?>",
               dataType: "JSON",
               success: function (response) {
                   var bidang = $("#bidang_id").html(response)
                   console.log(bidang);
               }
           }); 
        });

        $("#bidang_id").change(function () {
            var bidang_id = $("#bidang_id").val();
            console.log(bidang_id);
            $.ajax({
                type: "GET",
                url: "<?= base_url('/master/getDataSubbidang'); ?>",
                data: {
                    bidang_id : bidang_id
                },
                dataType: "JSON",
                success: function (response) {
                    console.log(response)
                    $("#sub_bidang_id").html(response);
                    
                    $("#sub_bidang_id").change(function () {
                        
                        var sub_bidang_id = $("#sub_bidang_id").val();
                        console.log(sub_bidang_id);

                    });
                }
            });
        }); 
    });
</script>
       
<?= $this->endSection() ;?>