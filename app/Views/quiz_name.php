<?= $this->extend('template/struktur'); ?>

<?= $this->section('content-home'); ?>
<div class="container container-custom3 animate__animated animate__fadeInUp">
    <div class="top-bar animate__animated animate__fadeInDown animate__delay-1s">
        <img src="SVG/1x/logo.png" alt="Logo" class="logo" />
        <div class="top-buttons">
            <button class="btn"><img src="SVG/1x/music.png" width="50" alt=""></button>
            <button class="btn"><img src="SVG/1x/profil.png" width="50" alt=""></button>
        </div>
    </div>
    <h1 class="title animate__animated animate__zoomIn animate__delay-2s">Quizz</h1>

    <div class="content-container">


        <div class="question-card mt-5">
            <div class="question-icon">
                <span><img src="quis.png" width="80" alt=""></span>
            </div>
            <div class="question-text">
                <h3>Masukan Namamu</h3>
                <form action="waktunya_quiz" method="get">
                    <input type="text" name="nama" class="form-control" placeholder="Nama" />
                    <button class="mt-3 btn"><img src="SVG/1x/play.png" width="80" alt=""></button> <!-- Added button block -->
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>