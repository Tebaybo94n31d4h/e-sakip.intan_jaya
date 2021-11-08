<?= $this->extend('template/default'); ?>

<?= $this->section('content'); ?>

<div id="sudah_ada" data-sudah_ada="<?= session()->getFlashdata('sudah_ada');  ?>"></div>

<div class="section-header">
    <h1><?= $subtitle; ?></h1>
    
    <div class="section-header-breadcrumb pr-2">
        <div class="breadcrumb-item active"><a href="<?= base_url('admin/dashboardp'); ?>">Dashboard</a></div>
        <!-- <div class="breadcrumb-item"><a href="#">Bootstrap Components</a></div> -->
        <div class="breadcrumb-item"><?= $subtitle; ?></div>
    </div>
    <div class="section-header-back">
        <form action="<?= base_url('master/jabatanp'); ?>" method="post">
            <button class="btn mt-2 mb-2 btn-primary">
                <i class="fas fa-arrow-left"></i> 
            </button>
        </form>
    </div>
</div>


<div class="section-body">
    <div class="card">
        <form action="<?= base_url('master/proccesstambahjabatanp'); ?>" method="POST" id="tab-content-1">

            <div class="card-header">
                <h4 class="card-title">Form Tambah</h4>
            </div>

            <div class="col-sm-10" style="margin: auto;">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <?= csrf_field(); ?>
                        <div class="card">
                            <div class="row">
                                <div class="col">
                                    <div class="position-relative form-group">
                                        <p class="card-title text-primary" style="font-size: 16px; font-weight: bold;">Data Jabatan</p>
                                        <label for="nama_jabatan">Nama Jabatan</label>
                                        <input name="nama_jabatan" id="nama_jabatan" type="text" class="form-control <?= ($validation->hasError('nama_jabatan')) ? 'is-invalid' : ''; ?>">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('nama_jabatan'); ?>
                                        </div>
                                    </div>
                                    <div class="position-relative form-group">
                                        <label for="kd">Kode</label>
                                        <input name="kd" id="kd" type="text" class="form-control <?= ($validation->hasError('kd')) ? 'is-invalid' : ''; ?>">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('kd'); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <p class="card-title text-primary" style="font-size: 16px; font-weight: bold;">Pilih Opsi</p>
                                    <div class="position-relative form-group col">
                                        <label for="lvl">Level</label>
                                        <select class="form-control <?= ($validation->hasError('lvl')) ? 'is-invalid' : ''; ?>" name="lvl" id="lvl">
                                            <option value="">-- Pilih Level --</option>
                                            <?php foreach($selectlevel as $sl) : ?>
                                                <option value="<?= $sl->id; ?>"><?= $sl->notes; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('lvl'); ?>
                                        </div>
                                    </div>
                                    <!-- >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>><<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<< -->
                                        <!-- Manipulasi Data Bidang dan Sub Bidang -->
                                        <?php foreach ($selectlevel as $lvl) : ?>
                                            <?php if ($lvl->id == 1) : ?>
                                                <div class="position-relative form-group col" id="bidangManipulasi">
                                                    <label for="b_idManipulasi">Bidang</label>
                                                    <select class="form-control" name="b_idManipulasi" id="b_idManipulasi">
                                                        <option value="NULL"></option>
                                                    </select>
                                                    <div class="invalid-feedback">
                                                        <?= $validation->getError('b_idManipulasi'); ?>
                                                    </div>
                                                </div>
                                                <div class="position-relative form-group col" id="subbidangManipulasi">
                                                    <label for="">Sub Bidang</label>
                                                    <select class="form-control" name="sb_idManipulasi" id="sb_idManipulasi">
                                                        <option value="NULL"></option>
                                                    </select>
                                                    <div class="invalid-feedback">
                                                        <?= $validation->getError('sb_idManipulasi'); ?>
                                                    </div>
                                                </div>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    <!-- >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>><<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<< -->

                                    <div class="position-relative form-group col" id="bidang">
                                        <label for="b_id">Bidang</label>
                                        <select class="form-control" name="b_id" id="b_id">
                                            <option value="">-- Pilih Bidang --</option>
                                            <?php foreach($selectbidang as $value) : ?>
                                            <option value="<?= $value->id; ?>"><?= $value->nama_bidang; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('b_id'); ?>
                                        </div>
                                    </div>

                                    <div class="position-relative form-group col" id="subbidang">
                                        <label for="">Sub Bidang</label>
                                        <select class="form-control" name="sb_id" id="sb_id">
                                            <option>-- Pilih Sub Bidang --</option>
                                        </select>
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('sb_id'); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-footer text-right">
                <button type="submit" class="btn btn-success"> <i class="fas fa-paper-plane"></i> Simpan</button>
                <a href="<?= base_url('master/jabatanp'); ?>" class="ml-1 btn btn-secondary">Batal</a>
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
        $("#lvl").change(function() {
            var getLevel = $("#lvl").val();
            
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

        $("#lvl").change(function () {
           $.ajax({
               type: "POST",
               url: "<?= base_url(); ?>/master/getBidangpemda",
               dataType: "JSON",
               success: function (response) {
                   var bidang = $("#b_id").html(response)
                   console.log(bidang);
               }
           }); 
        });


    $(document).ready(function () {
        $("#b_id").change(function () {
            var b_id = $("#b_id").val();
            console.log(b_id);
            $.ajax({
                type: "POST",
                url: "<?= base_url(); ?>/master/getDataSubbidangpemda",
                data: {
                    b_id : b_id
                },
                dataType: "JSON",
                success: function (response) {
                    console.log(response)
                    $("#sb_id").html(response);
                    
                    $("#sb_id").change(function () {
                        var sb_id = $("#sb_id").val();
                        console.log(sb_id);

                    });
                }
            });
        }); 
    });
</script>
       
<?= $this->endSection() ;?>