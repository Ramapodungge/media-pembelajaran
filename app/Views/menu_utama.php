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
    <h1 class="title animate__animated animate__zoomIn animate__delay-2s">MEDIA PEMBELAJARAN</h1>
    <p class="subtitle animate__animated animate__fadeInUp animate__delay-3s "> Mata Pelajaran Sistem Komputer - SMA N 7 GORONTALO</p>
    <button class="btn animate__animated animate__pulse animate__infinite"><a href="<?= base_url('menu_materi') ?>"><img width="120" src="SVG/1x/play.png" alt=""></a></button>
    <div class="image-container animate__animated animate__fadeInUp animate__delay-4s">
        <img src="SVG/Asset 92.svg" width="580" alt="Ilustrasi" />
    </div>

    <!-- Floating Icons -->
    <img src="image1.png" class="floating-icon icon1" alt="Floating Icon 1">
    <img src="image2.png" class="floating-icon icon2" alt="Floating Icon 2">
    <img src="image3.png" class="floating-icon icon3" alt="Floating Icon 3">
    <img src="image4.png" class="floating-icon icon4" alt="Floating Icon 4">
    <img src="image5.png" class="floating-icon icon5" alt="Floating Icon 5">
</div>
<?= $this->endSection(); ?>