<?= $this->extend('admin/template/struktur'); ?>

<?= $this->section('content'); ?>
<div class="page-content">
    <section class="row">
        <div class="card">
            <div class="card-header">
                <h4>Tambah Sub Materi</h4>
            </div>
            <div class="card-body">
                <form action="<?= base_url('act_simpan_sub') ?>" method="post" enctype="multipart/form-data">
                    <?= csrf_field(); ?>
                    <?php foreach ($materi as $m) { ?>
                        <input type="hidden" name="materi" value="<?= $m['id_materi'] ?>">
                    <?php } ?>
                    <div class="row">
                        <div class="form-group col-6">
                            <input type="text" name="sub" id="helperText" class="form-control" placeholder="Sub Materi" required>
                        </div>
                        <div class="form-group col-6">
                            <input type="file" name="foto" class="form-control">
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <textarea name="konten" id="summernote" cols="30" rows="10"></textarea>
                    </div>
                    <!-- <div id="summernote"></div> -->
                    <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                </form>
            </div>
        </div>
    </section>
</div>
<?= $this->endSection(); ?>