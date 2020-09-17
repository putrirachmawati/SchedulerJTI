<!-- Login Box -->
<div class="login-box">
  <div class="login-logo">
    <a href="../../index2.html" class="text-white"><b>Scheduler</b>JTI</a>
  </div>
  <div class="card card-outline card-info">

    <!-- Login-card-body -->
    <div class="card-header login-card-body" style="margin-top: 20px;">
      <img src="<?= base_url('assets/img/logo/Polije.png'); ?>" alt="eror" class="mx-auto d-block" width="100px">

      <!-- Form -->
      <form action="<?= base_url('Auth'); ?>" method="post">
        <p class="login-box-msg" style="margin-top: 30px; height: 30px;">Login to start your session</p>

        <!-- Flashdata Sukses daftar  -->
        <?= $this->session->flashdata('message'); ?>

        <!-- Message Email -->
        <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
        <!-- Email -->
        <div class="input-group mb-3">
          <input type="text" class="form-control" id="email" name="email" value="<?= set_value('email'); ?>" placeholder="Enter Email Address...">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>

        <!-- Message Password -->
        <?= form_error('password', '<small class="text-danger">', '</small>'); ?>
        <!-- Password -->
        <div class="input-group mb-3">
          <input type="password" class="form-control" id="password" name="password" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>

        <!-- Tombol Login -->
        <div class="col-13 mb-2" style="margin-top: 10px;">
          <button type="submit" class="btn btn-primary btn-block">Login</button>
        </div>
      </form>
      <!-- Akhir Form -->

      <p class="mb-0 text-center">
        <a href="<?= base_url('Auth/forgot_password'); ?>">I forgot my password</a>
      </p>
      <p class="mb-1 text-center">
        <a href="<?= base_url('Auth/register'); ?>">Create an Account</a>
      </p>
    </div>
    <!-- Akhir login-card-body -->

  </div>
</div>
<!-- Akhir login-box -->