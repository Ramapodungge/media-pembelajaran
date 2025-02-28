<?= $this->extend('template/struktur'); ?>

<?= $this->section('content-home'); ?>
<div class="container container-custom">
    <div class="top-bar">
        <img src="SVG/1x/logo.png" alt="Logo" class="logo" />
        <div class="top-buttons">
            <button class="btn"><img src="SVG/1x/music.png" width="50" alt="Music Icon"></button>
            <button class="btn"><img src="SVG/1x/profil.png" width="50" alt="Profile Icon"></button>
        </div>
    </div>

    <div class="pap-container-soal">
        <!-- Content inside pap-container-soal -->
        <div class="content-inside mt-5">
            <h2 class="text-black">Nama: <?= esc($nama) ?></h2>
            <h3 class="text-black">Skor Sementara: <?= session()->get('score') ?> poin</h3>
            <h2 class="content-title">Soal:</h2>
            <div class="content-body">
                <form action="submit" method="post">
                    <p><?= esc($pertanyaan['pertanyaan']) ?></p>
                    <div class="answer-buttons mt-5">
                        <button class="answer-btn" name="jawaban" value="A" type="submit"><?= esc($pertanyaan['pilihan_a']) ?></button>
                        <button class="answer-btn" name="jawaban" value="B" type="submit"><?= esc($pertanyaan['pilihan_b']) ?></button>
                        <button class="answer-btn" name="jawaban" value="C" type="submit"><?= esc($pertanyaan['pilihan_c']) ?></button>
                        <button class="answer-btn" name="jawaban" value="D" type="submit"><?= esc($pertanyaan['pilihan_d']) ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>