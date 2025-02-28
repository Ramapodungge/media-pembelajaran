<?= $this->extend('template/struktur'); ?>

<?= $this->section('content-home'); ?>
<div class="container container-custom animate__animated animate__fadeInUp">
    <div class="top-bar animate__animated animate__fadeInDown animate__delay-1s">
        <img src="SVG/1x/logo.png" alt="Logo" class="logo" />
        <div class="top-buttons">
            <button class="btn"><img src="SVG/1x/music.png" width="50" alt=""></button>
            <button class="btn"><img src="SVG/1x/profil.png" width="50" alt=""></button>
        </div>
    </div>
    <h1 class="title animate__animated animate__zoomIn animate__delay-2s mt-5">MATERI</h1>
    <div class="card-container">
        <?php foreach ($materi as $dm) { ?>
            <a href="sub_materi/<?= $dm['id_materi'] ?>">
                <div class="card">
                    <img src="thum_materi/<?= $dm['gambar_thum'] ?>" alt="Materi">
                    <div class="card-content">
                        <h3><?= $dm['judul_materi'] ?></h3>
                        <p><?= $dm['deskripsi'] ?></p>
                    </div>
                </div>
            </a>
        <?php } ?>
        <a href="kuis_name">
            <div class="card">
                <img src="kuis.jpg" alt="Materi">
                <div class="card-content">
                    <h3>Quiz</h3>
                    <p>Menu Untuk Mengasah Kemampuan anda.</p>
                </div>
            </div>
        </a>
    </div>
    <?= $this->endSection(); ?>