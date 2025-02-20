<?= $this->extend('admin/template/struktur'); ?>

<?= $this->section('content'); ?>
<div class="page-content">
    <section class="row">
        <?php if (session()->getFlashdata('pesan')) : ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?= session()->getFlashdata('pesan'); ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert"
                    aria-label="Close"></button>
            </div>
        <?php endif ?>
        <div class="card">
            <div class="card-header">
                <h4>Data Materi</h4>
            </div>
            <div class="card-body">
                <a href="tambah_materi" class="btn btn-success btn-sm"><i class="bi bi-plus-circle-fill"></i> Tambah Data</a>
                <table class="table table-bordered" id="table1">
                    <thead>
                        <tr>
                            <th>Judul Materi</th>
                            <th>Deskripsi</th>
                            <th>Created_at</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($materi as $m) { ?>
                            <tr>
                                <td><?= $m['judul'] ?></td>
                                <td><?= $m['deskripsi'] ?></td>
                                <td><?= $m['updated_at'] ?></td>
                                <td>
                                    <a href="edit_materi/<?= $m['id_materi'] ?>" class="btn btn-warning btn-sm mb-2" title="Edit Materi"><i class="bi bi-pencil-fill"></i></a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- sub materi -->
        <div class="card">
            <div class="card-header">
                <h4>Sub Materi</h4>
            </div>
            <div class="card-body">
                <a href="tambah_sub" class="btn btn-success btn-sm mb-2"><i class="bi bi-plus-circle-fill"></i> Tambah Data</a>
                <table class="table table-bordered" id="table2">
                    <thead>
                        <tr>
                            <th>Sub Materi</th>
                            <th>Created_at</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($sub as $s) { ?>
                            <tr>
                                <td><?= $s['judul'] ?></td>
                                <td><?= $s['updated_at'] ?></td>
                                <td>
                                    <a href="edit_sub/<?= $s['id_bab'] ?>" class="btn btn-warning btn-sm mb-2" title="Edit Materi"><i class="bi bi-pencil-fill"></i></a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>
<?= $this->endSection(); ?>