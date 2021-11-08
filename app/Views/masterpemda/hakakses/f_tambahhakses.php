<?= $this->extend('layout/default'); ?>

<?= $this->section('content'); ?>


<div class="tab-content">
    <div class="tab-pane tabs-animation fade show active" role="tabpanel">
        <div class="row">
            <div class="col-lg">
                <div class="main-card mb-3 card">
                    <div class="card-body"><h5 class="card-title">
                    <ul class="body-tabs body-tabs-layout tabs-animated body-tabs-animated nav">
                            <a class="nav-link" style="margin-top: -23px; margin-bottom: -20px;" href="<?= base_url('/master/tambahHAkses'); ?>">
                                <span>Tambah Data Hak Akses</span>
                            </a>
                    </ul>
                    </h5>
                        <div class="table-responsive">
                            <table class="mb-0 table table-striped">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Table heading</th>
                                    <th>Table heading</th>
                                    <th>Table heading</th>
                                    <th>Table heading</th>
                                    <th>Table heading</th>
                                    <th>Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>Table cell</td>
                                        <td>Table cell</td>
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
       
    </div>
</div>



<?= $this->endSection() ;?>