<?= $this->extend('template/struktur'); ?>

<?= $this->section('content-home'); ?>
<div class="container container-custom">
    <div class="top-bar">
        <img src="<?= base_url('') ?>SVG/1x/logo.png" alt="Logo" class="logo" />
        <div class="top-buttons">
            <button class="btn"><img src="<?= base_url('') ?>SVG/1x/music.png" width="50" alt="Music Icon"></button>
            <button class="btn"><img src="<?= base_url('') ?>SVG/1x/profil.png" width="50" alt="Profile Icon"></button>
        </div>
    </div>

    <div class="pap-container animate__animated animate__fadeInleft">
        <?php if ($page > 1): ?>
            <a href="<?= site_url('isi_materi/' . $id . '?page=' . ($page - 1)) ?>">
                <button class="prev-btn">
                    <img src="<?= base_url('') ?>prev.png" alt="Previous" />
                </button>
            </a>
        <?php endif; ?>

        <!-- Content inside pap-container -->
        <div class="content-inside">
            <h2 class="content-title"><?= $judul ?></h2>
            <div class="content-body">
                <p><?= esc($konten, 'raw') ?></p>
            </div>
        </div>

        <?php if ($page < $totalHalaman): ?>
            <a href="<?= site_url('isi_materi/' . $id . '?page=' . ($page + 1)) ?>">
                <button class="next-btn">
                    <img src="<?= base_url('') ?>next.png" alt="Next" />
                </button>
            </a>
        <?php endif; ?>
    </div>
</div>
</div>
<?= $this->endSection(); ?>