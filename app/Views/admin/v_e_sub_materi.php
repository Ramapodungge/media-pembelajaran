<?= $this->extend('admin/template/struktur'); ?>

<?= $this->section('content'); ?>
<div class="page-content">
    <section class="row">
        <div class="card">
            <div class="card-header">
                <h4>Tambah Sub Materi</h4>
            </div>
            <div class="card-body">
                <form action="<?= base_url('act_simpan_e_sub') ?>" method="post" enctype="multipart/form-data">
                    <?= csrf_field(); ?>
                    <?php foreach ($sub as $s) { ?>
                        <input type="hidden" name="materi" value="<?= $s['id_materi'] ?>">
                        <input type="hidden" name="id" value="<?= $s['id'] ?>">
                        <input type="hidden" name="fl" value="<?= $s['gambar'] ?>">
                        <div class="row">
                            <div class="form-group col-6">
                                <input type="text" name="sub" id="helperText" class="form-control" value="<?= $s['judul'] ?>" required>
                            </div>
                            <div class="form-group col-6">
                                <input type="file" name="foto" class="form-control">
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <textarea name="konten" id="summernote" cols="30" rows="10"><?= $s['konten'] ?></textarea>
                        </div>
                        <input type="hidden" name="id_bab" value="<?= $s['id_bab'] ?>">

                    <?php } ?>
                    <!-- <div id="summernote"></div> -->
                    <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                </form>
            </div>
        </div>
    </section>
</div>
<?= $this->endSection(); ?>