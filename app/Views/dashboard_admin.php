<?= $this->extend('layouts/app') ?>

<?= $this->section('content') ?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <div class="col-xxl-4 col-md-6">
          <div class="card info-card customers-card">

            <div class="card-body">
              <h5 class="card-title">Gejala</h5>

              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <i class="bi bi-ticket-detailed-fill"></i>
                </div>
                <div class="ps-3">
                  <h6><?= $gejala_count ?></h6>
                </div>
              </div>

            </div>
            </div>

            </div><!-- End Customers Card -->

                <!-- Revenue Card -->
                <div class="col-xxl-4 col-md-6">
                <div class="card info-card customers-card">

                <div class="card-body">
                  <h5 class="card-title">Penyakit</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-ticket-detailed-fill"></i>
                    </div>
                    <div class="ps-3">
                    <h6><?= $penyakit_count ?></h6>
                    </div>
                  </div>

                </div>
                </div>

            </div><!-- End Customers Card -->

          </div>
        </div>

  </main><!-- End #main -->
  <?= $this->endSection() ?>