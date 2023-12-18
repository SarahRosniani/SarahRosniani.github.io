<?= $this->extend('layouts/app') ?>
<?= $this->section('content') ?>
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Data Penyakit</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?=base_url('/')?>">Home</a></li>
          <li class="breadcrumb-item">Tables</li>
          <li class="breadcrumb-item active">Data Penyakit</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row"> 
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
            <div class="card-title">
              <h5 class="card-title">Data Penyakit</h5>
            </div>

              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Penyakit</th>
                    <th scope="col">Info</th>
                    <th scope="col">Solusi</th>
                
                  </tr>
                </thead>
                <tbody>
                <?php $i = 1; ?>
                    <?php foreach ($data_penyakit as $Penyakit)  : ?>
                    
                        <tr>
                            <th scope="row"><?= $i++; ?></th>
                            <td><?php echo $Penyakit['penyakit']; ?></td>
                            <td><?php echo $Penyakit['info']; ?></td>
                            <td><?php echo $Penyakit['solusi']; ?></td>
                        </tr>   
             </div>
                <?php endforeach; ?>
                </tbody>
            </table>
          </div>
        </div>

      </div>
    </section>

  </main><!-- End #main -->


  <?= $this->endSection() ?>

