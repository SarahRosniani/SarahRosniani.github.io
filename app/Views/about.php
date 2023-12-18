<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <title>Home</title>
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
                            <a href="#" class="nav-item nav-link active">Home</a>
                            <a href="<?php echo base_url('/diagnosa/penyakit'); ?>" class="nav-item nav-link">Diagnosa</a>
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
                <h1 class="display-2 text-white mb-4 animated slideInDown">Home</h1>
                <h class="display-2 text-white mb-4 animated slideInDown">Selamat Datang di Web Diagnosa Penyakit Malaria!!!</h>
            </div>
        </div>
        <div class="row gx-0 mb-4 mb-lg-5 align-items-center">
                    <div class="col-xl-4 col-lg-5">
                        <div class="featured-text text-center text-lg-left">
                            <p class="text-white-75 mb-4">
                            Malaria dan demam berdarah (dengue) merupakan dua penyakit menular yang umumnya ditularkan melalui gigitan nyamuk. Malaria, disebabkan oleh parasit Plasmodium yang ditularkan oleh nyamuk Anopheles, dapat menimbulkan gejala seperti demam tinggi, menggigil, sakit kepala, dan pada kasus parah dapat menyebabkan komplikasi serius. Sementara itu, demam berdarah, yang disebabkan oleh virus dengue yang dibawa oleh nyamuk Aedes, dapat mengakibatkan demam mendadak, nyeri otot, sakit kepala, dan dalam situasi yang lebih serius dapat menyebabkan perdarahan internal. Keduanya merupakan masalah kesehatan global yang memerlukan pengelolaan yang cermat, termasuk langkah-langkah pencegahan seperti pengendalian populasi nyamuk dan pendidikan masyarakat tentang tanda dan gejala penyakit tersebut.
                            </p>
                        </div>
                    </div>
                    <!-- Video Youtube -->
                    <!-- <div class="col-xl-8 col-lg-6">
                    
                    </div> -->
                    <div class="col-xl-8 col-lg-6">
                    <?php
                        $API_KEY = "AIzaSyCKVGN2xLYLlNprgaKemXUbz299zwUCCDg";
                        $Channel_ID = "UCujz-K-S5ia6DxNY2yZ_vFQ";
                        $Max_Result = 1;

                        $apiData = @file_get_contents('https://www.googleapis.com/youtube/v3/search?order=date&part=snippet&channelId='.$Channel_ID.'&maxResults='.$Max_Result.'&key='.$API_KEY.'');
                        
                    if($apiData){ 
                        $videoList = json_decode($apiData);
                        // dd($videoList);
                    }
                    else{
                        echo "<div class=\"text-center\">
                             <b>Terjadi Kesalahan Teknis Saat Memuat Video !</b>
                             </div>";
                    }

                    if(!empty($videoList->items)){
                        echo "<div class=\"text-center\">";
                            foreach ($videoList->items as $item) {
                                
                                echo "<b>". $item->snippet->title."</b>"."<br>";
                                $vid = $item->id->videoId;
                                echo "<iframe width='100%' height='400' src='https://www.youtube.com/embed/$vid' frameborder='1' allowfullscreen></iframe>";
                            }
                        echo "</div>";
                    }else{
                        echo $apiError;
                    }
                    ?>
                    </div>
                </div>
        <!-- Page Header End -->



        <!-- Back to Top -->
        <a href="#" class="btn btn-secondary btn-square rounded-circle back-to-top"><i class="fa fa-arrow-up text-white"></i></a>

        
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