<?= $this->extend('layouts/app') ?>

<?= $this->section('content') ?>

<main id="main" class="main">

<div class="pagetitle">
  <h1>Profile</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item active">Profile</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section profile">
  <div class="row">
    <div class="col-xl-12"> 
      <div class="card">
        <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
        <img src="<?= base_url(); ?>assets/img/foto_def.png" alt="Profile" class="rounded-circle">
                <form action="<?= base_url('profile_admin/' . $user->id . '/update')?>" method="post" enctype="multipart/form-data">
                <input type="hidden" name="_method" value="PUT">
                <?= csrf_field() ?>
                    
                        <div class="card-body p-4">
                            <h4>Edit Profile</h4>
                            <hr class="mt-0 mb-4" />
                            <div class="row pt-1">                          
                                <div class="col-7 mb-3">
                                    <h6>username</h6>
                                    <input type="text" class="form-control <?= session('error') && array_key_exists('username', session('error')) ? 'is-invalid' : '' ?>" id="inputName5" name="username" value="<?= $user->username?>">
                                    <?php if (session('error') && array_key_exists('username', session('error'))) : ?>
                                        <div class="invalid-feedback">
                                            <?= session('error')['username']; ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div class="col-7 mb-3">
                                    <h6>email</h6>
                                    <input type="text" class="form-control <?= session('error') && array_key_exists('email', session('error')) ? 'is-invalid' : '' ?>" id="inputName5" name="email" value="<?=$user->email?>">
                                    <?php if (session('error') && array_key_exists('email', session('error'))) : ?>
                                        <div class="invalid-feedback">
                                            <?= session('error')['email']; ?>
                                        </div>
                                    <?php endif; ?>
                                </div>                                                                   
                            </div>
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <button class="btn btn-primary">Update</button>
                                <a href="<?= base_url('/profile') ?>" class="btn btn-warning">Back</a>
                            </div>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
  </section>
  </main><!-- End #main -->
<?= $this->endSection() ?>