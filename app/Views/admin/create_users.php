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

         <!-- Form Data -->
         <form action="<?= base_url('/users/create') ?>" method="POST">
                <?= csrf_field() ?>
                <div class="mb-3 row">
                    <label for="email" class="col-sm-2 col-for m-label">Email</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control <?= session('validation') && session('validation')->hasError('email') ? 'is-invalid' : '' ?>" name="email"  value="<?= old('email') ?>">
                        <?php if (session('validation') && session('validation')->hasError('email')) : ?>
                            <div class="invalid-feedback">
                            <?= session('validation')->getError('email'); ?>
                    </div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="username" class="col-sm-2 col-for m-label">Username</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control  <?= session('validation') && session('validation')->hasError('username') ? 'is-invalid' : '' ?>" name="username"  value="<?= old('username') ?>">
                        <?php if (session('validation') && session('validation')->hasError('username')) : ?>
                            <div class="invalid-feedback">
                            <?= session('validation')->getError('username'); ?>
                    </div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="role" class="col-sm-2 col-for m-label">Role</label>
                    <div class="col-sm-4">
                        <select name="role" class="form-control">
                            <option value="admin">admin</option>
                            <option value="user">user</option>
                        </select>
                    </div>
                </div>
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <button class="btn btn-primary me-md-2" type="submit">Simpan</button>
                    <a class="btn btn-danger" href="<?= base_url('/users')?>">Batal</a>
                </div>
            </form>
         

         </div>
      </div>
    </div>

  </div>
</section>

</main><!-- End #main -->

<?= $this->endSection() ?>