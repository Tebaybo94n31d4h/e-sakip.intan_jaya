<?= $this->extend('template/default'); ?>

<?= $this->section('content'); ?>


<div class="section-header">
    <h1><?= $subtitle; ?></h1>
    
    <div class="section-header-breadcrumb pr-2">
        <div class="breadcrumb-item active"><a href="<?= base_url('admin/dashboard'); ?>">Dashboard</a></div>
        <!-- <div class="breadcrumb-item"><a href="#">Bootstrap Components</a></div> -->
        <div class="breadcrumb-item"><?= $subtitle; ?></div>
    </div>
    <div class="section-header-back">
        <form action="<?= base_url('master/jabatans/'. $back); ?>" method="post">
            <button class="btn btn-primary">
                <i class="fas fa-arrow-left"></i> 
            </button>
        </form>
    </div>
</div>


<div class="section-body" style="font-size: 12px;">
    <div class="card">
        <form action="<?= base_url('master/proccesseditjabatans'); ?>" method="POST" id="tab-content-1">

            <div class="card-header">
                <h4 class="card-title">Form Edit</h4>
            </div>

            <div class="card-body">
                
                <div class="col-sm-12" style="margin: auto;">
                    <div class="main-card mb-3 card">
                        <div class="card-body">
                            <?= csrf_field(); ?>
                            <div class="card">
                                <div class="row">
                                    <div class="col">
                                        <p class="card-title text-primary" style="font-size: 16px; font-weight: bold;">Pilih Opsi</p>
                                        <div class="position-relative form-group">
                                            <input type="hidden" name="j_id" id="j_id" value="<?= $dataeditjabatan->id; ?>">
                                            <label for="level">Level</label>
                                            <select class="form-control" name="level" id="level">
                                                <option value="">-- Pilih Level --</option>
                                                <?php foreach($selectlevel as $sl) : ?>
                                                    <option value="<?= $sl->id; ?>"><?= $sl->notes; ?></option>                                            
                                                <?php endforeach; ?>
                                            </select>
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('level'); ?>
                                            </div>
                                        </div>
                                        <div class="position-relative form-group">
                                            <label for="bidang_id">Bidang</label>
                                            <select class="form-control" name="bidang_id" id="bidang_id">
                                                <option value="">-- Pilih Bidang --</option>
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
                                    <div class="col">
                                        <p class="card-title text-primary" style="font-size: 16px; font-weight: bold;">Biodata Jabatan</p>
                                        <div class="position-relative form-group">
                                            <label for="kode">KODE</label>
                                            <input name="kode" id="kode" type="text" class="form-control <?= ($validation->hasError('kode')) ? 'is-invalid' : ''; ?>">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('kode'); ?>
                                            </div>
                                        </div>
                                        <div class="position-relative form-group">
                                            <label for="nama_jabatan">NAMA JABATAN</label>
                                            <input name="nama_jabatan" value="" id="nama_jabatan" type="text" class="form-control <?= ($validation->hasError('nama_jabatan')) ? 'is-invalid' : ''; ?>">
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
                                        <div class="position-relative form-group col" id="bidangManipulasi">
                                            <label for="bidang_id">BIDANG</label>
                                            <select class="form-control" name="bidang_idManipulasi" id="bidang_idManipulasi">
                                                <option value="NULL"></option>
                                            </select>
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('bidang_id'); ?>
                                            </div>
                                        </div>
                                        <div class="position-relative form-group col" id="subbidangManipulasi">
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
                            <div class="card-footer text-right">
                                <button type="submit" class="btn btn-success"> <i class="fas fa-paper-plane"></i> Simpan</button>
                                <a href="<?= base_url('master/jabatans/'. $back); ?>" class="ml-1 btn btn-secondary">Batal</a>
                            </div>
                        </div>
                    </div>
                </div>

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
            var BidangID = "<?= $dataeditjabatan->bidang_id; ?>"
            console.log(BidangID);
           $.ajax({
               type: "POST",
               url: "<?= base_url(); ?>/master/getBidang",
               data: {
                    BidangID : BidangID,
               },
               dataType: "JSON",
               success: function (response) {
                   $("#bidang_id").html(response);
               }
           }); 
        });

        $("#bidang_id").change(function () {
            var bidang_id = "<?= $dataeditjabatan->bidang_id; ?>";
            var subbidang_id = "<?= $dataeditjabatan->sub_bidang_id; ?>";
            console.log(bidang_id, subbidang_id);
            $.ajax({
                type: "POST",
                url: "<?= base_url(); ?>/master/getDataSubbidang",
                data: {
                    bidang_id : bidang_id,
                    subbidang_id : subbidang_id
                },
                dataType: "JSON",
                success: function (response) {
                    console.log(response)
                    $("#sub_bidang_id").html(response);
                }
            });
        });
        
        

        var j_id = "<?= $dataeditjabatan->id; ?>"
        $.ajax({
            type: "GET",
            url: "<?= base_url(); ?>/master/f_editjabatans/" + j_id + "/json",
            dataType: "JSON",
            success: function (response) {
                console.log(response);
                $('[name="kode"]').val(response.kode);
                $('[name="nama_jabatan"]').val(response.nama_jabatan);
                $('[name="level"]').val(response.level).trigger('change');
                $('[name="bidang_id"]').val(response.bidang_id).trigger('change');
                $('[name="sub_bidang_id"]').val(response.sub_bidang_id).trigger('change');
            }
        });
    });
</script>

       
<?= $this->endSection() ;?>