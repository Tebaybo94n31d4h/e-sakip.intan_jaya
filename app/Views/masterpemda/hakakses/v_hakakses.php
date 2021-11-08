<?= $this->extend('template/default'); ?>

<?= $this->section('content'); ?>

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
        <form action="<?= base_url('master/formtambahHAkses'); ?>   " method="post">
            <button class="btn btn-primary">
                <i class="fas fa-plus"></i>
                <span>TAMBAH BARU</span>
            </button>
        </form>
    </div>
</div>


<div class="tab-content">
    <div class="tab-pane tabs-animation fade show active" role="tabpanel">
        <div class="row">
            <div class="col-lg">
                <div class="main-card mb-3 card">
                    <div class="card-body"><h5 class="card-title">
                    <ul class="body-tabs body-tabs-layout tabs-animated body-tabs-animated nav">
                            <a class="nav-link" style="margin-top: -23px; margin-bottom: -20px;" href="<?= base_url('master/formtambahHAkses'); ?>">
                                <span>Tambah Data Hak Akses</span>
                            </a>
                    </ul>
                    </h5>
                        <div class="table-responsive">
                            <table class="mb-0 table table-striped">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Kode</th>
                                    <th>Nama Hak Akses</th>
                                    <th>Created Date</th>
                                    <th>Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Table cell</td>
                                        <td>Table cell</td>
                                        <td>Table cell</td>
                                        <td>
                                            <a href="" class="btn btn-success">Edit</a>
                                            <a href="" class="btn btn-danger">Hapus</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="tab-pane tabs-animation fade" id="tab-content-1" role="tabpanel">
        <div class="row">
            <div class="col-sm">
                <div class="main-card mb-3 card">
                    <div class="card-body"><h5 class="card-title">Form Tambah Data Hak Akses</h5>
                        <form action="" method="POST" id="tab-content-1">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="position-relative form-group">
                                        <label for="exampleEmail">Email</label>
                                        <input name="email" id="exampleEmail" placeholder="with a placeholder" type="email" class="form-control">
                                        <div class="valid-feedback">
                                                Looks good!
                                        </div>
                                    </div>
                                    <div class="position-relative form-group">
                                        <label for="examplePassword">Password</label>
                                        <input name="password" id="examplePassword" placeholder="password placeholder" type="password" class="form-control">
                                        <div class="invalid-feedback">
                                                Please provide a valid city.
                                        </div>
                                    </div>
                                    <div class="position-relative form-group">
                                        <label for="exampleSelect">Select</label>
                                        <select name="select" id="exampleSelect" class="form-control">
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                        </select>
                                        <div class="valid-feedback">
                                                Looks good!
                                        </div>
                                    </div>
                                    <div class="position-relative form-group">
                                        <label for="exampleSelectMulti">Select Multiple</label>
                                        <select multiple="" name="selectMulti" id="exampleSelectMulti" class="form-control">
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                        </select>
                                        <div class="valid-feedback">
                                                Looks good!
                                        </div>
                                    </div>
                                    <div class="position-relative form-group">
                                        <label for="exampleText">Text Area</label>
                                        <textarea name="text" id="exampleText" class="form-control"></textarea>
                                        <div class="invalid-feedback">
                                                Please provide a valid city.
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="position-relative form-group">
                                        <img src="<?= base_url('assets/images/avatars/avatar.svg'); ?>" class="mb-3" width="150" alt=""> <br>
                                        <label for="exampleFile">Photo</label>
                                        <input name="file" id="exampleFile" type="file" class="form-control-file">
                                            <small class="form-text text-muted">
                                                Type gambar yang direkomendasikan ('JPG','JPEG','PNG')
                                            </small>
                                    </div>
                                    <button type="submit" class="mt-1 btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<?= $this->endSection() ;?>