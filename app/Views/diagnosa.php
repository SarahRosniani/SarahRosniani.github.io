<head>
        <meta charset="utf-8">
        <title>Diagnosa</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="" name="keywords">
        <meta content="" name="description">

        <!-- Google Web Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Saira:wght@500;600;700&display=swap" rel="stylesheet"> 

        <!-- Icon Font Stylesheet -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

        <!-- Libraries Stylesheet -->
        <link href="<?= base_url(); ?>/assets2/lib/animate/animate.min.css" rel="stylesheet">
        <link href="<?= base_url(); ?>/assets2/lib/owlcarousel/assets2/owl.carousel.min.css" rel="stylesheet">

        <!-- Customized Bootstrap Stylesheet -->
        <link href="<?= base_url(); ?>/assets2/css/bootstrap.min.css" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="<?= base_url(); ?>/assets2/css/style.css" rel="stylesheet">
    </head>

    <body>
        <!-- Spinner Start -->
        <div id="spinner" class="show position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-grow text-primary" role="status"></div>
        </div>
        <!-- Spinner End -->


        <!-- Navbar Start -->
        <div class="container-fluid bg-primary">
            <div class="container">
                <nav class="navbar navbar-dark navbar-expand-lg py-0">
                    <a href="index.html" class="navbar-brand">
                        <h1 class="text-white fw-bold d-block">Diagnosa<span class="text-secondary">Penyakit</span> </h1>
                    </a>
                    <button type="button" class="navbar-toggler me-0" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse bg-transparent" id="navbarCollapse">
                        <div class="navbar-nav ms-auto mx-xl-auto p-0">
                            <a href="<?php echo base_url('dashboard_user'); ?>" class="nav-item nav-link ">Home</a>
                            <a href="<?php echo base_url('/diagnosa/penyakit'); ?>" class="nav-item nav-link active">Diagnosa</a>
                            <a href="<?php echo base_url('logout'); ?>" class="nav-item nav-link">Logout</a>
                            
                        </div>
                    </div>
                </nav>
            </div>
        </div>
        <!-- Navbar End -->

        
        <!-- Page Header Start -->
        <div class="container-fluid page-header py-5">
            <div class="container text-center py-5">
                <h1 class="display-2 text-white mb-4 animated slideInDown">Diagnosa</h1>
            </div>
        </div>
        <!-- Page Header End -->

        <div class="container-fluid px-4">
    <h1 class="mt-4">Telusuri Penyakit Anda</h1>
    <ol class="breadcrum mb-4">
        <!-- Add breadcrumb items if needed -->
    </ol>
    <center>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            <p>Silahkan pilih gejala apa saja yang anda alami</p>
        </div>
        <div class="card-body">
            <form class="col-6" action="<?= base_url('/diagnosa/penyakit') ?>" method="POST">
                <div class="scrollable-form">
                    <?php foreach ($gejala as $gj) : ?>
                        <div class="mb-3">
                            <div class="input-group">
                                <div class="input-group-text">
                                    <input type="checkbox" aria-label="Checkbox for following text input" value="<?= $gj['kode'] ?>" name="<?= $gj['id'] ?>">
                                </div>
                                <input type="text" class="form-control" aria-label="Text input with checkbox" readonly value="<?= $gj['gejala'] ?>">
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
            </form>
        </div>
    </div>
    </center>
</div>
        <!-- JavaScript Libraries -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="<?= base_url(); ?>/assets2/lib/wow/wow.min.js"></script>
        <script src="<?= base_url(); ?>/assets2/lib/easing/easing.min.js"></script>
        <script src="<?= base_url(); ?>/assets2/lib/waypoints/waypoints.min.js"></script>
        <script src="<?= base_url(); ?>/assets2/lib/owlcarousel/owl.carousel.min.js"></script>

        <!-- Template Javascript -->
        <script src="<?= base_url(); ?>/assets2/js/main.js"></script>
    </body>

</html>