<?= $this->extend('template/struktur'); ?>

<?= $this->section('content-home'); ?>
<div class="container container-custom2 animate__animated animate__fadeInUp">
    <div class="top-bar animate__animated animate__fadeInDown animate__delay-1s">
        <img src="<?= base_url('SVG/1x/logo.png') ?>" alt="Logo" class="logo" />
        <div class="top-buttons">
            <button class="btn"><img src="<?= base_url('SVG/1x/music.png') ?>" width="50" alt=""></button>
            <button class="btn"><img src="<?= base_url('SVG/1x/profil.png') ?>" width="50" alt=""></button>
        </div>
    </div>
    <h1 class="title animate__animated animate__zoomIn animate__delay-2s">Materi</h1>
    <div class="list-container">
        <?php foreach ($list as $lm) { ?>
            <a href="<?= base_url('') ?>isi_materi/<?= $lm['id_bab'] ?>" class="list-item">
                <img src="<?= base_url('') ?>gambar_materi/<?= $lm['gambar'] ?>" alt="Materi 2">
                <div>
                    <h3><?= $lm['judul'] ?></h3>
                    <p><?= substr(strip_tags($lm['konten']), 0, 50) ?>....</p>
                </div>
            </a>
        <?php } ?>
    </div>
</div>
<?= $this->endSection(); ?>