<?= $this->extend('admin/template/struktur'); ?>

<?= $this->section('content'); ?>
<div class="page-content">
    <section class="row">
        <div class="card">
            <div class="card-header">
                <h4>Tambah Kuis</h4>
            </div>
            <div class="card-body">
                <form action="<?= base_url('act_edit_kuis') ?>" method="post">
                    <?= csrf_field(); ?>
                    <?php foreach ($kuis as $dk): ?>
                        <div class="form-group mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Pertanyaan</label>
                            <textarea name="pertanyaan" class="form-control" id="exampleFormControlTextarea1" rows="3"><?= $dk['pertanyaan'] ?></textarea>
                        </div>

                        <label class="mb-2">Pilihan Jawaban <small class="text-danger">*(centang jawaban yang benar)</small></label>
                        <div class="row">
                            <div class="input-group mb-3">
                                <div class="input-group-text">
                                    <input class="form-check-input jawaban" type="checkbox" value="A" <?= $dk['jawaban_benar'] === 'A' ? 'checked' : '' ?>>
                                </div>
                                <input type="text" name="pilihan_a" class="form-control" value="<?= $dk['pilihan_a'] ?>">
                                <span>&nbsp;&nbsp;&nbsp;</span>
                                <div class="input-group-text">
                                    <input class="form-check-input jawaban" type="checkbox" value="B" <?= $dk['jawaban_benar'] === 'B' ? 'checked' : '' ?>>
                                </div>
                                <input type="text" name="pilihan_b" class="form-control" value="<?= $dk['pilihan_b'] ?>">
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-text">
                                    <input class="form-check-input jawaban" type="checkbox" value="C" <?= $dk['jawaban_benar'] === 'C' ? 'checked' : '' ?>>
                                </div>
                                <input type="text" name="pilihan_c" class="form-control" value="<?= $dk['pilihan_c'] ?>">
                                <span>&nbsp;&nbsp;&nbsp;</span>
                                <div class="input-group-text">
                                    <input class="form-check-input jawaban" type="checkbox" value="D" <?= $dk['jawaban_benar'] === 'D' ? 'checked' : '' ?>>
                                </div>
                                <input type="text" name="pilihan_d" class="form-control" value="<?= $dk['pilihan_d'] ?>">
                            </div>
                        </div>
                        <!-- Input untuk menampung jawaban benar -->
                        <input type="hidden" id="jawaban_benar" name="jawaban_benar" value="<?= $dk['jawaban_benar'] ?>" class="form-control" placeholder="Jawaban benar">
                        <input type="hidden" name="id_soal" value="<?= $dk['id_soal'] ?>">

                        <button type="submit" class="btn btn-primary btn-sm mt-3">Simpan</button>
                    <?php endforeach ?>
                </form>
            </div>
        </div>
    </section>
</div>
<!-- Script jQuery untuk menangani input checkbox -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $(".jawaban").change(function() {
            $(".jawaban").prop("checked", false); // Uncheck semua checkbox
            $(this).prop("checked", true); // Centang checkbox yang dipilih
            $("#jawaban_benar").val($(this).val()); // Masukkan nilai ke input text jawaban_benar
        });
    });
</script>
<?= $this->endSection(); ?>