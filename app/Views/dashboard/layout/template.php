<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title><?= $title; ?> &mdash; Pemahaman Seminar</title>
    <link rel="shortcut icon" href="<?= base_url(); ?>/assets/img/logo.png" type="image/x-icon">

    <!-- General CSS Files -->
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/fontawesome/css/all.min.css">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/select2/dist/css/select2.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/select2-bootstrap4.css" />
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/css/buttons.bootstrap4.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/bootstrap-switch.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/tempusdominus-bootstrap-4.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/fullcalendar/main.css">

    <!-- Template CSS -->
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/style.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/components.css">

    <!-- JQuery -->
    <script src="<?= base_url(); ?>/assets/js/jquery.min.js"></script>
</head>
<body style="background: #e2e8f0">
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg bg-primary"></div>
            <nav class="navbar navbar-expand-lg main-navbar bg-primary">
                <form class="form-inline mr-auto">
                    <ul class="navbar-nav mr-3">
                        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
                    </ul>
                    <img src="/assets/img/logo.png" alt="logo" width="50" style="height:auto">
                    <span class="text-white ml-2 font-weight-bold d-none d-md-block">IKMAL BANTEN</span>
                </form>
                <ul class="navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                            <img alt="image" src="<?= base_url().'/assets/img/users/'.$profile->image; ?>" class="rounded-circle mr-1" id="pp-top">
                            <div class="d-sm-none d-lg-inline-block">Hai, <span id="top-fullname"><?= ucwords($profile->fullname); ?></span></div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a href="<?= base_url('logout'); ?>" style="cursor: pointer" class="dropdown-item has-icon text-danger">
                                <i class="fas fa-sign-out-alt"></i> Logout
                            </a>
                        </div>
                    </li>
                </ul>
            </nav>
            <div class="main-sidebar sidebar-style-2">
                <aside id="sidebar-wrapper">
                    <div class="sidebar-brand">
                        <a href="<?= (in_groups('admin')) ? base_url('admin/dashboard') : base_url('student/dashboard') ?>">Pemahaman Seminar</a>
                    </div>
                    <div class="sidebar-brand sidebar-brand-sm">
                        <a href="<?= (in_groups('admin')) ? base_url('admin/dashboard') : base_url('student/dashboard') ?>" class="bg-warning text-white" style="font-size:10pt;padding:5px;border-radius:3px;">Sem</a>
                    </div>
                    <ul class="sidebar-menu">
                        <li class="menu-header">MAIN MENU</li>
                        <li class="<?= ($title == 'Dasbor') ? 'active' : ''; ?>">
                            <a class="nav-link" href="<?= (in_groups('admin')) ? base_url('admin/dashboard') : base_url('student/dashboard') ?>">
                                <i class="fas fa-tachometer-alt"></i> <span>Dasbor</span>
                            </a>
                        </li>
                        <?php if(in_groups('admin')) {  ?>
                        <li class="dropdown <?= ($title == 'Seminar' || $title == 'Bidang Seminar') ? 'active' : ''; ?>">
                            <a href="#" class="nav-link has-dropdown"><i class="fas fa-brain"></i><span>Seminar</span></a>
                        
                            <ul class="dropdown-menu">
                                <li class="<?= ($title == 'Bidang Seminar') ? 'active' : '' ?>">
                                    <a href="<?= base_url('admin/dashboard/field_seminar') ?>" class="nav-link">
                                        <i class="fas fa-graduation-cap"></i> <span>Bidang Seminar <span class="badge-side bg-primary text-white"><?= count($fields) ?></span></span>
                                    </a>
                                </li>
                                <li class="<?= ($title == 'Seminar') ? 'active' : ''; ?>">
                                    <a href="<?= base_url('admin/dashboard/seminar') ?>" class="nav-link">
                                        <i class="fas fa-brain"></i> <span>Seminar <span class="badge-side bg-primary text-white"><?= count($seminars) ?></span></span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="<?= ($title == 'Kriteria') ? 'active' : '' ?>">
                            <a href="<?= base_url('admin/dashboard/criteria') ?>" class="nav-link">
                                <i class="fas fa-sort-numeric-down"></i> <span>Kriteria <span class="badge-side bg-primary text-white"><?= count($criterias) ?></span></span>
                            </a>
                        </li>
                        <li class="<?= ($title == 'Daftar Akun') ? 'active' : '' ?>">
                            <a href="<?= base_url('admin/dashboard/accounts') ?>" class="nav-link">
                                <i class="fas fa-users"></i> <span>Daftar Akun <span class="badge-side bg-primary text-white"><?= count($users) ?></span></span>
                            </a>
                        </li>
                        <li class="<?= ($title == 'Tingkat Pemahaman') ? 'active' : '' ?>">
                            <a href="<?= base_url('admin/dashboard/comprehension') ?>" class="nav-link">
                                <i class="fas fa-sort-numeric-up"></i> <span>Tingkat Pemahaman</span>
                            </a>
                        </li>
                        <?php } else { ?>
                        <li class="dropdown <?= ($title == 'Keikutsertaan Seminar' || $title == 'Pemahaman Seminar') ? 'active' : '' ?>">
                            <a href="#" class="nav-link has-dropdown"><i class="fas fa-graduation-cap"></i><span>Seminar</span></a>
                        
                            <ul class="dropdown-menu">
                                <li class="<?= ($title == 'Keikutsertaan Seminar') ? 'active' : '' ?>">
                                    <a href="<?= base_url('student/dashboard/participant') ?>" class="nav-link">
                                        <i class="fas fa-clipboard-list"></i> <span>Keikutsertaan <span class="badge-side bg-primary text-white"><?= count($participants) ?></span></span>
                                    </a>
                                </li>
                                <li class="<?= ($title == 'Pemahaman Seminar') ? 'active' : '' ?>">
                                    <a href="<?= base_url('student/dashboard/comprehension') ?>" class="nav-link">
                                        <i class="fas fa-list-ol"></i> <span>Pemahaman</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <?php } ?>
                        
                        <li class="menu-header">PENGATURAN</li>
                        <li class="<?= ($title == 'Akun') ? 'active' : '' ?>">
                            <a href="<?= (in_groups('admin')) ? base_url('admin/dashboard/profile') : base_url('student/dashboard/profile') ?>" class="nav-link">
                                <i class="fas fa-user"></i> <span>Akun</span>
                            </a>
                        </li>
                    </ul>
                </aside>
            </div>

            <!-- Main Content -->
            <?= $this->renderSection('content'); ?>

            <footer class="main-footer bg-primary text-white">
                <div class="footer-left">
                    Hak Cipta &copy; 2022 <div class="bullet"></div> IKMAL BANTEN
                </div>
            </footer>
        </div>
    </div>

    <!-- General JS Scripts -->
    <script src="<?= base_url(); ?>/assets/js/popper.js"></script>
    <script src="<?= base_url(); ?>/assets/js/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?= base_url(); ?>/assets/js/nicescroll/jquery.nicescroll.min.js"></script>
    <script src="<?= base_url(); ?>/assets/js/stisla.js"></script>
    <script src="<?= base_url(); ?>/assets/css/select2/dist/js/select2.full.min.js"></script>

    <!-- JS Libraies -->
    <script src="<?= base_url(); ?>/assets/js/jquery.dataTables.min.js"></script>
    <script src="<?= base_url(); ?>/assets/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?= base_url(); ?>/assets/js/dataTables.responsive.min.js"></script>
    <script src="<?= base_url(); ?>/assets/js/responsive.bootstrap4.min.js"></script>
    <script src="<?= base_url('assets/js/dataTables.buttons.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/buttons.bootstrap4.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/jszip.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/buttons.html5.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/buttons.print.min.js') ?>"></script>
    <script src="<?= base_url(); ?>/assets/js/sweetalert2.all.min.js"></script>
    <script src="<?= base_url(); ?>/assets/js/bootstrap-switch.min.js"></script>
    <script src="<?= base_url(); ?>/assets/js/moment-with-locales.min.js"></script>
    <script src="<?= base_url(); ?>/assets/js/tempusdominus-bootstrap-4.js"></script>
    <script src="<?= base_url(); ?>/assets/js/fullcalendar/main.min.js"></script>
    <script src="<?= base_url(); ?>/assets/js/fullcalendar/locales-all.min.js"></script>

    <!-- Template JS File -->
    <script src="<?= base_url(); ?>/assets/js/scripts.js"></script>
    <script src="<?= base_url(); ?>/assets/js/custom.js"></script>

    <!-- Page Specific JS File -->
    <?php if($title !== "Dasbor" && $title !== 'Tingkat Pemahaman') { ?>
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
            
            var table = $('#example2').DataTable({
                lengthChange: false,
                buttons: [
                    {extend: 'excel', className: 'btn btn-success', text: '<i class="fas fa-file-excel"></i> Excel'}
                ]
            });
            
            table.buttons().container()
                .appendTo('#example2_wrapper .col-md-6:eq(0)');
        });
    </script>
    <?php } else if($title == 'Dasbor') { ?>
    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                "paging": false,
                "ordering": false,
                "info": false,
                "searching": false
            });
        });
    </script>
    <?php } else if($title == 'Tingkat Pemahaman') { ?>
    <script>
        $(document).ready(function() {
            var table1 = $('#table1').DataTable({
                lengthChange: false,
                buttons: [
                    {extend: 'excel', className: 'btn btn-success', text: '<i class="fas fa-file-excel"></i> Excel'}
                ],
                bDestroy: true
            });
            var table2 = $('#table2').DataTable({
                lengthChange: false,
                buttons: [
                    {extend: 'excel', className: 'btn btn-success', text: '<i class="fas fa-file-excel"></i> Excel'}
                ],
                bDestroy: true
            });
            var table3 = $('#table3').DataTable({
                lengthChange: false,
                buttons: [
                    {extend: 'excel', className: 'btn btn-success', text: '<i class="fas fa-file-excel"></i> Excel'}
                ],
                bDestroy: true
            });
            var table4 = $('#table4').DataTable({
                lengthChange: false,
                buttons: [
                    {extend: 'excel', className: 'btn btn-success', text: '<i class="fas fa-file-excel"></i> Excel'}
                ],
                bDestroy: true
            });

            table1.buttons().container()
                .appendTo('#table1_wrapper .col-md-6:eq(0)');
            table2.buttons().container()
                .appendTo('#table2_wrapper .col-md-6:eq(0)');
            table3.buttons().container()
                .appendTo('#table3_wrapper .col-md-6:eq(0)');
            table4.buttons().container()
                .appendTo('#table4_wrapper .col-md-6:eq(0)');
        });
    </script>
    <?php } ?>
    <?php if($title == 'Akun'){ ?>
    <script>
        $(".custom-file-input").on("change", function() {
            var image = document.getElementById("user_image");
            
            if(image.value.trim() !== "") {
                var fileName = $(this).val().split("\\").pop();
                $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
                $("#btn-image").removeAttr("disabled");
            } else {
                $("#user_image").val("");
                $(".custom-file-label").text("Pilih File");
                $("#btn-image").attr("disabled","disabled");
            }
        });
    </script>
    <?php } ?>
    <?php if($title == 'Seminar'){echo view('dashboard/scripts/seminar.php'); } ?>
    <?php if($title == 'Keikutsertaan Seminar'){echo view('dashboard/scripts/participant.php'); } ?>
    <?php if($title == 'Pemahaman Seminar'){echo view('dashboard/scripts/comprehension.php'); } ?>
    <?php if($title == 'Tingkat Pemahaman'){echo view('dashboard/scripts/comprehension.php'); } ?>
    <?php if (session()->getFlashdata('success')) { ?>
    <script>
        var message = "<?= session()->getFlashdata('success'); ?>";

        const Toast = Swal.mixin({
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            timer: 2000,
            timerProgressBar: true
        })

        Toast.fire({
            icon: "success",
            title: message
        })
    </script>
    <?php } elseif(session()->getFlashdata('failed')) { ?>
    <script>
        var title = "<?= session()->getFlashdata('failed'); ?>";

        Swal.fire({
            icon: 'error',
            title: title,
            text: 'Cek kembali isian form...'
        });
    </script>
    <?php } ?>
</body>

</html>