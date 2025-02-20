<?= $this->extend('admin/template/struktur'); ?>

<?= $this->section('content'); ?>
<div class="page-content">
    <section class="row">
        <div class="card">
            <div class="card-header">
                <h4>Tambah Materi</h4>
            </div>
            <div class="card-body">
                <form action="<?= base_url('act_edit') ?>" method="post">
                    <?= csrf_field(); ?>
                    <?php foreach ($materi as $m) { ?>
                        <div class="form-group">
                            <input type="text" name="judul" id="helperText" class="form-control" value="<?= $m['judul'] ?>" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label"></label>
                            <textarea name="desk" class="form-control" id="exampleFormControlTextarea1"
                                rows="3"><?= $m['deskripsi'] ?></textarea>
                        </div>
                        <input type="hidden" name="id_materi" value="<?= $m['id_materi'] ?>">
                        <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                    <?php } ?>
                </form>
            </div>
        </div>
    </section>
</div>
<?= $this->endSection(); ?>