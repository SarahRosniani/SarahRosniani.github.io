<?= $this->extend('layouts/app') ?>

<?= $this->section('content') ?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Data Aturan</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item">Tables</li>
          <li class="breadcrumb-item active">Data Aturan</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
            <div class="card-title">
              <h5 class="card-title">Data Aturan</h5>
                            <button
                              type="button"
                              class="btn btn-primary"
                              data-bs-toggle="modal"
                              data-bs-target="#addTask"
                              ><i class="bi bi-plus-circle me-1"></i>
                              Add Aturan
                            </button>
                        </div>

              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Gejala</th>
                    <th scope="col">Nama Penyakit</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                <?php $i = 1; ?>
                    <?php foreach ($data_aturan as $aturan)  : ?>
                    
                        <tr>
                            <th scope="row"><?= $i++; ?></th>
                            <td><?php echo $aturan['nama_gejala']; ?></td>
                            <td><?php echo $aturan['nama_penyakit']; ?></td>
                            <td>
                                <div class="d-flex">
                                    <button type="button" class="btn btn-outline-primary btn-icon-split me-2" data-bs-toggle="modal" data-bs-target="#editTask<?php echo $aturan['id']; ?>">
                                        <i class="bi bi-pencil-square"></i>
                                    </button>

                                    <form action="<?= base_url('/aturan/' . $aturan['id'] ) ?>" method="POST">
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
                id="editTask<?php echo $aturan['id']; ?>" 
                tabindex="-1" 
                aria-labelledby="exampleModalLabel" 
                aria-hidden="true">
                <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit aturan</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('/aturan/' . $aturan['id'])?>" method="post">
                     <input type="hidden" name="_method" value="PUT">
                     <?= csrf_field() ?>
                        <div class="mb-3">
                            <label for="id_penyakit" class="form-label">Kelas</label>
                            <select class="form-control" name="id_penyakit" id="id_penyakit">
                                <?php foreach ($data_penyakit as $cl): ?>
                                    <option value="<?= $cl['id'] ?>"><?= $cl['nama_penyakit'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="id_gejala" class="form-label">keterangan</label>
                            <select class="form-control" name="id_gejala" id="id_gejala">
                                <?php foreach ($data_gejala as $ts): ?>
                                    <option value="<?= $ts['id'] ?>"><?= $ts['nama_gejala'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Update aturan</button>
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
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Add aturan</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="<?= base_url('create_aturan' )?>" method="post">
                            <div class="mb-3">
                                <label for="id_penyakit" class="form-label">Kelas</label>
                                <select class="form-control" name="id_penyakit" id="id_penyakit">
                                    <?php foreach ($data_penyakit as $cl): ?>
                                        <option value="<?= $cl['id'] ?>"><?= $cl['nama_penyakit'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="id_gejala" class="form-label">keterangan</label>
                                <select class="form-control" name="id_gejala" id="id_gejala">
                                    <?php foreach ($data_gejala as $ts): ?>
                                        <option value="<?= $ts['id'] ?>"><?= $ts['nama_gejala'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-primary">Save aturan</button>
                        </form>
                    </div>
                    </div>
                </div>
            </div>

        </div>

      </div>
    </section>

  </main><!-- End #main -->

  <?= $this->endSection() ?>



