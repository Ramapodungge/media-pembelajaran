<?= $this->extend('admin/template/struktur'); ?>

<?= $this->section('content'); ?>
<div class="page-content">
    <section class="row">
        <div class="card">
            <div class="card-header">
                <h4>Tambah Materi</h4>
            </div>
            <div class="card-body">
                <form action="<?= base_url('act_simpan') ?>" method="post">
                    <?= csrf_field(); ?>
                    <div class="form-group">
                        <input type="text" name="judul" id="helperText" class="form-control" placeholder="Judul" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Deskripsi</label>
                        <textarea name="desk" class="form-control" id="exampleFormControlTextarea1"
                            rows="3"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                </form>
            </div>
        </div>
    </section>
</div>
<?= $this->endSection(); ?>