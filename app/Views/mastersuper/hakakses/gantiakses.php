<?= $this->extend('template/default'); ?>

<?= $this->section('content'); ?>

<div class="section-header">

     <h1> <?= $subtitle; ?></h1>

    <div class="section-header-breadcrumb pr-2">
        <div class="breadcrumb-item active"><a href="<?= base_url('admin/dashboards'); ?>">Dashboard </a> </div>
        <!-- <div class="breadcrumb-item"><a href="#">Bootstrap Components</a></div> -->
        <div class="breadcrumb-item"><?= $subtitle; ?></div>
    </div>

    <div class="section-header-back">
        <form action="<?= base_url('master/hakakses'); ?>" method="post">
            <button class="btn btn-primary">
                <i class="fas fa-arrow-left"></i> 
            </button>
        </form>
    </div>
    
</div>

<div class="section" style="font-size: 12px;">
    <div class="card">
        <div class="card-header">
            <h4>Form Ganti Akses</h4>
        </div>
        <div class="card-body">
            <table class="table table-striped table-sm table-hover" id="table-1">
                <thead>
                    <tr>
                        <th colspan="1" rowspan="1" style="width: 3%;">No</th>
                        <th colspan="1" rowspan="1">Nama modul</th>
                        <th colspan="1" rowspan="1">is active</th>
                        <th colspan="1" rowspan="1" class="text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1 ;?>
                    <?php foreach($modul as $modul) :?>
                    <tr>
                        <td><?= $no ;?></td>
                        <td><?= $modul->nama_modul ;?></td>
                        <td>
                                <?php if ($modul->is_active == 1) :?>
                                    <input onclick="getClick(this.value)" type="checkbox" data-id="<?= $modul->id ;?>" value="<?= $modul->is_active ;?>" class="form-check-input" checked>
                                <?php else :?>
                                    <input onclick="getClick(this.value)" type="checkbox" data-id="<?= $modul->id ;?>" value="<?= $modul->is_active ;?>" class="form-check-input">
                                <?php endif ;?>
                        </td>
                        <td class="text-right">
                            <button class="btn btn-success btn-sm"> <i class="fas fa-save"></i> </button>
                        </td>
                    </tr>
                    <?php $no++ ;?>
                    <?php endforeach ;?>
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="1" rowspan="1" style="width: 3%;">No</th>
                        <th colspan="1" rowspan="1">Nama_modul</th>
                        <th colspan="1" rowspan="1">is_active</th>
                        <th colspan="1" rowspan="1" class="text-right">Aksi</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
<script src="<?= base_url(); ?>/jquery/jquery-3.6.0.js"></script>
<script type="text/javascript">
    function getClick(is_active) {
        var id = "<?= $modul->modul_id ;?>";
        var is_active = is_active;
        console.log(id,is_active);

    }
</script>

<?= $this->endSection() ;?>