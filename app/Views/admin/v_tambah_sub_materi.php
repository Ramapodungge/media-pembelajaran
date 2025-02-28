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
                    <div class="row">
                        <div class="form-group col-4">
                            <select name="materi" id="" class="form-control">
                                <?php foreach ($materi as $m) { ?>
                                    <option value="<?= $m['id_materi'] ?>"><?= $m['judul_materi'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group col-5">
                            <input type="text" name="sub" id="helperText" class="form-control" placeholder="Sub Materi" required>
                        </div>
                        <div class="form-group col-3">
                            <input type="file" name="foto" class="form-control">
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <textarea name="konten" id="mytextarea" cols="30" rows="10"></textarea>
                    </div>
                    <!-- <div id="summernote"></div> -->
                    <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                </form>
            </div>
        </div>
    </section>
</div>
<?= $this->endSection(); ?>