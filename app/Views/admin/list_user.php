<?= $this->extend('layouts/app') ?>
<?= $this->section('content') ?>
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Manage Users</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?=base_url('/')?>">Home</a></li>
          <li class="breadcrumb-item">Tables</li>
          <li class="breadcrumb-item active">Data Users</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row"> 
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
            <div class="card-title">
              <h5 class="card-title">Data Users</h5>
            </div>
            <?php if (session()->getFlashdata('error')) : ?>
                        <div class="alert alert-danger" role="alert">
                            <?= session()->getFlashdata('error') ?>
                        </div>
                    <?php endif; ?>

                    <?php if (session()->getFlashdata('success')) : ?>
                        <div class="alert alert-success" role="alert">
                            <?= session()->getFlashdata('success') ?>
                        </div>
                    <?php endif; ?>
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Email</th>
                    <th scope="col">Username</th>
                    <th scope="col">Role</th>
                    <th scope="col">Aksi</th>                
                  </tr>
                </thead>
                <tbody>
                <?php $no =1;
                foreach($result as $user):?>
                <tr> 
                    <td> <?= $no++ ?></td>
                    <td><?= $user->email?></td>
                    <td><?= $user->username?></td>
                    <td><?= $user->name?></td>
                    <td class="center">
                        <form action="<?= base_url('/users/reset/'. $user->id) ?>" method="post" class="d-inline">
                            <?= csrf_field() ?>                    
                            <button type="submit" class="btn btn-warning" role="button" onclick="return confirm('Apakah anda yakin?')">
                            Reset</button>
                        </form>

                        <form action="<?= base_url('/users/delete/' . $user->id) ?>" method="post" class="d-inline">
                            <?= csrf_field() ?>
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" class="btn btn-danger" role="button" onclick="return confirm('Apakah anda yakin?')">
                            Hapus</button>
                        </form>
                   </td> 
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