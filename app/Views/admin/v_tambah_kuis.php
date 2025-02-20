<?= $this->extend('admin/template/struktur'); ?>

<?= $this->section('content'); ?>
<div class="page-content">
    <section class="row">
        <div class="card">
            <div class="card-header">
                <h4>Tambah Kuis</h4>
            </div>
            <div class="card-body">
                <form action="<?= base_url('act_simpan_kuis') ?>" method="post">
                    <?= csrf_field(); ?>
                    <div class="form-group mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Pertanyaan</label>
                        <textarea name="pertanyaan" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>

                    <label class="mb-2">Pilihan Jawaban <small class="text-danger">*(centang jawaban yang benar)</small></label>
                    <div class="row">
                        <div class="input-group mb-3">
                            <div class="input-group-text">
                                <input class="form-check-input jawaban" type="checkbox" value="A">
                            </div>
                            <input type="text" name="pilihan_a" class="form-control" placeholder="Pilihan A">
                            <span>&nbsp;&nbsp;&nbsp;</span>
                            <div class="input-group-text">
                                <input class="form-check-input jawaban" type="checkbox" value="B">
                            </div>
                            <input type="text" name="pilihan_b" class="form-control" placeholder="Pilihan B">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-text">
                                <input class="form-check-input jawaban" type="checkbox" value="C">
                            </div>
                            <input type="text" name="pilihan_c" class="form-control" placeholder="Pilihan C">
                            <span>&nbsp;&nbsp;&nbsp;</span>
                            <div class="input-group-text">
                                <input class="form-check-input jawaban" type="checkbox" value="D">
                            </div>
                            <input type="text" name="pilihan_d" class="form-control" placeholder="Pilihan D">
                        </div>
                    </div>

                    <!-- Input untuk menampung jawaban benar -->
                    <input type="hidden" id="jawaban_benar" name="jawaban_benar" class="form-control" placeholder="Jawaban benar">

                    <button type="submit" class="btn btn-primary btn-sm mt-3">Simpan</button>
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