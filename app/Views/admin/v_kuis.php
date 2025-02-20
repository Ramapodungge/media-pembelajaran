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
                <h4>Data Quis</h4>
            </div>
            <div class="card-body">
                <a href="<?= base_url('tambah_kuis') ?>" class="btn btn-success btn-sm"><i class="bi bi-plus-circle-fill"></i> Tambah Data</a>
                <table class="table table-bordered" id="table1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Judul Materi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($kuis as $dk):
                            $no = 1;
                        ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $dk['pertanyaan'] ?></td>
                                <td>
                                    <a href="edit_kuis/<?= $dk['id_soal'] ?>" class="btn btn-warning btn-sm mb-2" title="Edit Materi"><i class="bi bi-pencil-fill"></i></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>
<?= $this->endSection(); ?>