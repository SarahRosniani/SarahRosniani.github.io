<?= $this->extend('layouts/app') ?>

<?= $this->section('content') ?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Data Gejala</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Tables</li>
          <li class="breadcrumb-item active">Data Gejala</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
            <div class="card-title">
              <h5 class="card-title">Data Gejala</h5>
                        <button
                              type="button"
                              class="btn btn-primary"
                              data-bs-toggle="modal"
                              data-bs-target="#addTask"
                              ><i class="bi bi-plus-circle me-1"></i>
                              Add Gejala
                            </button>
                        </div>

              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Kode Gejala</th>
                    <th scope="col">Nama Gejala</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                <?php $i = 1; ?>
                    <?php foreach ($data_gejala as $gejala)  : ?>
                    
                        <tr>
                            <th scope="row"><?= $i++; ?></th>
                            <td><?php echo $gejala['kode']; ?></td>
                            <td><?php echo $gejala['gejala']; ?></td>
                            <td>
                                <div class="d-flex">
                                    <button type="button" class="btn btn-outline-primary btn-icon-split me-2" data-bs-toggle="modal" data-bs-target="#editTask<?php echo $gejala['id']; ?>">
                                        <i class="bi bi-pencil-square"></i>
                                    </button>

                                    <form action="<?= base_url('/gejala/' . $gejala['id'] ) ?>" method="POST">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="taskid" value="">
                                        <?= csrf_field() ?>
                                        <button class="btn btn-outline-danger"><i class="bi bi-trash3"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>   
             </div>             
             <div 
                class="modal fade" 
                id="editTask<?php echo $gejala['id']; ?>" 
                tabindex="-1" 
                aria-labelledby="exampleModalLabel" 
                aria-hidden="true">
                <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Gejala</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('/gejala/' . $gejala['id'])?>" method="post">
                     <input type="hidden" name="_method" value="PUT">
                     <?= csrf_field() ?>
                     <div class="mb-3">
                            <label for="kode" class="col-form-label">Kode Gejala</label>
                            <textarea class="form-control" name="kode" value=""><?php echo $gejala['kode']; ?></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="gejala" class="col-form-label">Nama Gejala</label>
                            <textarea class="form-control" name="gejala" value=""><?php echo $gejala['gejala']; ?></textarea>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Update Gejala</button>
                    </form>
                        </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
                </tbody>
            </table>
          </div>

          <div 
            class="modal fade" 
            id="addTask" 
            tabindex="-1" 
            aria-labelledby="exampleModalLabel" 
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Add Gejala</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="<?= base_url('create_gejala' )?>" method="post">
                          <div class="mb-3">
                              <label for="kode" class="col-form-label">Kode Gejala</label>
                              <textarea class="form-control" name="kode" value=""></textarea>
                          </div>
                           <div class="mb-3">
                                <label for="gejala" class="col-form-label">Nama Gejala</label>
                                <textarea class="form-control" name="gejala"></textarea>
                            </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-primary">Save Gejala</button>
                        </form>
                    </div>
                    </div>
                </div>
            </div>

        </div>
        </div>

      </div>
    </section>

  </main><!-- End #main -->
  <?= $this->endSection() ?>