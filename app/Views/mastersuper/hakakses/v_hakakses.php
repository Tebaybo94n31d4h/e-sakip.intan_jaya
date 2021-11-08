<?= $this->extend('template/default'); ?>

<?= $this->section('content'); ?>

<!-- animasi style sweet alert -->
<link rel="stylesheet" href="<?= base_url(); ?>/switalert/animate.min.css">
  <link rel="stylesheet" href="<?= base_url(); ?>/switalert/sweetalert2.min.css">

<div id="berhasil" data-berhasil="<?= session()->getFlashdata('berhasil');  ?>"></div>
<div id="update" data-update="<?= session()->getFlashdata('update');  ?>"></div>
<div id="sudah_ada" data-sudah_ada="<?= session()->getFlashdata('sudah_ada');  ?>"></div>
<div id="gagal" data-gagal="<?= session()->getFlashdata('gagal');  ?>"></div>
<div id="hapus" data-hapus="<?= session()->getFlashdata('hapus');  ?>"></div>

<div class="section-header">
    <h1><?= $subtitle; ?></h1>
    
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="<?= base_url('/dashboard'); ?>">Dashboard</a></div>
        <!-- <div class="breadcrumb-item"><a href="#">Bootstrap Components</a></div> -->
        <div class="breadcrumb-item"><?= $subtitle; ?></div>
    </div>
    <div class="section-header-button">
        <form action="<?= base_url('master/f_hakakses'); ?>   " method="post">
            <button class="btn btn-primary btn-icon icon-left m-2">
                <i class="fas fa-plus"></i>
                <span>Tambah Baru</span>
            </button>
        </form>
    </div>
</div>

<div class="section-body" style="font-size: 12px;">
    <h2 class="section-title">Data Hak Akses</h2>
    <p class="section-lead">
        Informasi tentang data hak akses dihalaman ini.
    </p>
    <div class="row">
        <div class="col-sm-5">
            <div class="card card-primary shadow">
                <!-- <div class="card-header">
                    <h4>Data Hak Akses</h4>
                </div> -->
                <div class="card-body table-responsive col">
                    <table class="mb-0 table-sm">
                        <thead>
                            <tr>
                                <th rowspan="1" colspan="1" style="width: 3%;">No</th>
                                <th rowspan="1" colspan="1">Nama Hak Akses</th>
                                <!-- <th rowspan="1" colspan="1">Aksi</th> -->
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no =1; ?>
                            <?php foreach($HakAkses as $ha) : ?>
                            <tr>
                                <td><?= $no; ?></td>
                                <td>
                                    <style>
                                        .nama_hak_akses{
                                            padding: 5px;
                                            background-color: white;
                                            text-decoration: none;
                                            border: none;
                                        }
                                        .nama_hak_akses:hover{
                                            background-color: rgba(90, 69, 250, 0.867);
                                            color: yellow;
                                        }
                                    </style>
                                    <button type="button" style="cursor: pointer;" onclick="ambildata(<?= $ha->id ;?>)" class="nama_hak_akses">
                                        <?= $ha->nama_hak_akses; ?>
                                    </button>
                                </td>
                                <td>
                                    <a href="<?= base_url('master/f_edithakakses/' . $ha->id) ?>" class="btn btn-success btn-sm" data-toggle="tooltip" title="Edit hak akses : <?= $ha->nama_hak_akses; ?>"> <i class="fas fa-pencil-alt"></i> Edit</a>
                                    <!-- <a href="</?= base_url('master/hapushakakses/' . $ha->id) ?>" class="btn btn-danger btn-sm"> <i class="fas fa-trash"></i></a> -->
                                </td>
                            </tr>
                            <?php $no++; ?>
                            <?php endforeach; ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th rowspan="1" colspan="1">No</th>
                                <th rowspan="1" colspan="1">Nama Hak Akses</th>
                                <!-- <th rowspan="1" colspan="1">Aksi</th> -->
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <div class="card-footer">
                    <p class="bg-primary p-2 pl-2" style="color: white;">Klik nama hak akses, untuk control menu sidebar</p>
                </div>
            </div>
        </div>
        <div class="col" id="modul-tampil">
            <div class="card card-primary">
                <!-- <div class="card-header">
                    <h4>Data Hak Akses</h4>
                </div> -->
                <div class="card-body table-responsive">
                    <table class="mb-0 table table-striped table-sm table-hover">
                        <thead style="background-color: rgba(90, 69, 250, 0.867); color: yellow;">
                            <tr>
                                <!-- <th rowspan="1" colspan="1" style="width: 3%;">No</th> -->
                                <th rowspan="1" colspan="1">Modul</th>
                                <th rowspan="1" colspan="1" style="width: 15%;">Active</th>
                                <th rowspan="1" colspan="1" style="width: 15%;">View</th>
                                <th rowspan="1" colspan="1" style="width: 15%;">Insert</th>
                                <th rowspan="1" colspan="1" style="width: 15%;">Update</th>
                                <th rowspan="1" colspan="1" style="width: 15%;">Delete</th>
                            </tr>
                        </thead>
                        <tbody id="dataModulHakAkses">
                            
                        </tbody>
                        <tfoot>
                            <tr>
                                <!-- <th rowspan="1" colspan="1">No</th> -->
                                <th rowspan="1" colspan="1">Modul</th>
                                <th rowspan="1" colspan="1" style="width: 15%;">Active</th>
                                <th rowspan="1" colspan="1" style="width: 15%;">View</th>
                                <th rowspan="1" colspan="1" style="width: 15%;">Insert</th>
                                <th rowspan="1" colspan="1" style="width: 15%;">Update</th>
                                <th rowspan="1" colspan="1" style="width: 15%;">Delete</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="<?= base_url(); ?>/jquery/jquery-3.6.0.js"></script>
<script src="<?= base_url(); ?>/switalert/sweetalert2.min.js"></script>
<script>
    function ambildata($id) {
        $("#modul-tampil").hide(500);
        $("#modul-tampil").show(1500);
            $.ajax({
                url: "<?= base_url("master/ambildataModul") ?>/" + $id,
                type: "get",
                async: true,
                dataType: 'json',
                success: function (data) {
                    // alert(data);
                    var html = '';

                    for (var i = 0; i < data.length; i++) {
                        var is_active = (data[i].is_active == 1) ? "checked" : "";
                        var is_view = (data[i].is_view == 1) ? "checked" : "";
                        var is_insert = (data[i].is_insert == 1) ? "checked" : "";
                        var is_update = (data[i].is_update == 1) ? "checked" : "";
                        var is_delete = (data[i].is_delete == 1) ? "checked" : "";

                        html += '<tr>' +
                            '<td>' + data[i].nama_modul + '</td>' +
                            '<td><input type = "checkbox" class="active' + data[i].id + '" id="' + data[i].id + '"  name="is_active"  value ="' + data[i].is_active + '"  ' + is_active + '></td>' +
                            '<td><input type = "checkbox" class="view' + data[i].id + '" id="' + data[i].id + '"  name="is_view"  value ="' + data[i].is_view + '"  ' + is_view + '></td>' +
                            '<td><input type = "checkbox" class="insert' + data[i].id + '" id="' + data[i].id + '"  name="is_insert"  value ="' + data[i].is_insert + '"  ' + is_insert + '></td>' +
                            '<td><input type = "checkbox" class="update' + data[i].id + '" id="' + data[i].id + '"  name="is_update"  value ="' + data[i].is_update + '"  ' + is_update + '></td>' +
                            '<td><input type = "checkbox" class="delete' + data[i].id + '" id="' + data[i].id + '"  name="is_delete"  value ="' + data[i].is_delete + '"  ' + is_delete + '></td>' +
                            '</tr>';
                    }
                    $('#dataModulHakAkses').html(html);
                    $("#modul-tampil").show(1500);
                    crudActive(data);
                    crudView(data);
                    crudInsert(data);
                    crudUpdate(data);
                    crudDelete(data);
                    
                }
            });
        }
    $(document).ready(function () {
       
        $("#modul-tampil").hide();

    });
    
</script>

<script>
    
    function crudActive(data) {

        for (let i = 0; i < data.length; i++) {
            $('.active' + data[i].id).click(function() {
                var id = $(this).attr('id');
                var name = $(this).attr('name');
                var value = $(this).attr('value');
                //console.log('Posting the following View: ', id, name, value);

                $.ajax({
                    type: 'GET',
                    url: "<?= base_url("master/updateIsModul") ?>",
                    dataType: 'json',
                    data: {
                        'id': id,
                        'name': name,
                        'value': value,
                    },
                    success: function () {
                        $("#modul-tampil").hide(500);
                        $("#modul-tampil").show(1500);
                    }
                });

            });

        }
    }

    function crudView(data) {

        for (let i = 0; i < data.length; i++) {
            $('.view' + data[i].id).click(function() {
                var id = $(this).attr('id');
                var name = $(this).attr('name');
                var value = $(this).attr('value');
                //console.log('Posting the following View: ', id, name, value);

                $.ajax({
                    type: 'GET',
                    url: "<?= base_url("master/updateIsModul") ?>",
                    dataType: 'json',
                    data: {
                        'id': id,
                        'name': name,
                        'value': value,
                    },
                    success: function () {
                        $("#modul-tampil").hide(500);
                        $("#modul-tampil").show(1500);
                    }
                });

            });

        }
    }


    function crudInsert(data) {

        for (let i = 0; i < data.length; i++) {
            $('.insert' + data[i].id).click(function() {
                var id = $(this).attr('id');
                var name = $(this).attr('name');
                var value = $(this).attr('value');
                //console.log('Posting the following Insert: ', id, name, value);

                $.ajax({
                    type: 'GET',
                    url: "<?= base_url("master/updateIsModul") ?>",
                    dataType: 'json',
                    data: {
                        'id': id,
                        'name': name,
                        'value': value,
                    },
                });

            });

        }
    }

    function crudUpdate(data) {

        for (let i = 0; i < data.length; i++) {
            $('.update' + data[i].id).click(function() {
                var id = $(this).attr('id');
                var name = $(this).attr('name');
                var value = $(this).attr('value');
                //console.log('Posting the following Insert: ', id, name, value);

                $.ajax({
                    type: 'GET',
                    url: "<?= base_url("master/updateIsModul") ?>",
                    dataType: 'json',
                    data: {
                        'id': id,
                        'name': name,
                        'value': value,
                    },
                });

            });

        }
    }

    function crudDelete(data) {

        for (let i = 0; i < data.length; i++) {
            $('.delete' + data[i].id).click(function() {
                var id = $(this).attr('id');
                var name = $(this).attr('name');
                var value = $(this).attr('value');
                //console.log('Posting the following Insert: ', id, name, value);

                $.ajax({
                    type: 'GET',
                    url: "<?= base_url("master/updateIsModul") ?>",
                    dataType: 'json',
                    data: {
                        'id': id,
                        'name': name,
                        'value': value,
                    },
                });

            });

        }
    }
</script>

<?= $this->endSection() ;?>