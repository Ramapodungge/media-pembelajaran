<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/vendors/summernote/summernote-lite.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/vendors/simple-datatables/style.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/vendors/iconly/bold.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/vendors/perfect-scrollbar/perfect-scrollbar.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/vendors/bootstrap-icons/bootstrap-icons.css') ?>">
    <link rel="stylesheet" href="<?= base_url(' assets/css/app.css') ?>">
    <link rel="shortcut icon" href="<?= base_url('assets/images/favicon.svg" type="image/x-icon') ?>">
</head>

<body>
    <div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header">
                    <div class="d-flex justify-content-between">
                        <div class="logo">
                            <h2 class="text-center">
                                <i class="bi bi-stack"></i> EduTechZone
                            </h2>

                        </div>
                        <div class="toggler">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">
                        <li class="sidebar-title">Menu</li>

                        <li class="sidebar-item <?= $title === "Halaman Dashboard"  ? 'active' : '' ?> ">
                            <a href="<?= base_url('dashboard') ?>" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>

                        <li class="sidebar-item <?= $title === "Halaman Materi" ? 'active' : '' ?>">
                            <a href="<?= base_url('materi') ?>" class='sidebar-link'>
                                <i class="bi bi-book-fill"></i>
                                <span>Materi</span>
                            </a>
                        </li>

                        <li class="sidebar-item <?= $title === "Halaman Kuis" ? 'active' : '' ?>">
                            <a href="<?= base_url('kuis') ?>" class='sidebar-link'>
                                <i class="bi bi-collection-fill"></i>
                                <span>Quiz</span>
                            </a>
                        </li>
                        <li class="sidebar-item <?= $title === "Halaman Pengguna" ? 'active' : '' ?>">
                            <a href="<?= base_url('pengguna') ?>" class='sidebar-link'>
                                <i class="bi bi-grid-1x2-fill"></i>
                                <span>Pengguna</span>
                            </a>
                        </li>
                        <?php if ($title != "Halaman Dashboard") { ?>
                            <li class="sidebar-item">
                                <a href="logout" class="btn btn-danger btn-sm col-12 mt-3">Logout</a>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>
            <div class="page-heading d-flex justify-content-between">
                <h3><?= $judul ?></h3>
                <p><?= $page ?>
                </p>
            </div>
            <!-- ini tampa konten -->
            <?= $this->renderSection('content'); ?>

            <footer>
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-start">
                        <p>2025 &copy; summertime.id</p>
                    </div>
                    <div class="float-end">
                        <p>Crafted with <span class="text-danger"><i class="bi bi-heart"></i></span> by <a
                                href="#">developper</a></p>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="<?= base_url('assets/vendors/jquery/jquery.min.js') ?>"></script>
    <script src="<?= base_url('assets/vendors/tinymce/tinymce.min.js') ?>"></script>
    <script src="<?= base_url('assets/vendors/tinymce/plugins/code/plugin.min.js') ?>"></script>
    <script src="<?= base_url('assets/vendors/simple-datatables/simple-datatables.js') ?>"></script>
    <script src="<?= base_url('assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/bootstrap.bundle.min.js') ?>"></script>
    <script src="<?= base_url('assets/vendors/summernote/summernote-lite.min.js') ?>"></script>
    <script src="<?= base_url('assets/vendors/apexcharts/apexcharts.js') ?>"></script>
    <script src="<?= base_url('assets/js/pages/dashboard.js') ?>"></script>

    <script src="<?= base_url('assets/js/main.js') ?>"></script>
    <script>
        // Simple Datatable
        let table1 = document.querySelector('#table1');
        let dataTable = new simpleDatatables.DataTable(table1);

        let table2 = document.querySelector('#table2');
        let dataTable2 = new simpleDatatables.DataTable(table2);
    </script>
    <script>
        $('#summernote').summernote({
            tabsize: 2,
            height: 120,
        })
        $("#hint").summernote({
            height: 100,
            toolbar: false,
            placeholder: 'type with apple, orange, watermelon and lemon',
            hint: {
                words: ['apple', 'orange', 'watermelon', 'lemon'],
                match: /\b(\w{1,})$/,
                search: function(keyword, callback) {
                    callback($.grep(this.words, function(item) {
                        return item.indexOf(keyword) === 0;
                    }));
                }
            }
        });
    </script>

</body>

</html>