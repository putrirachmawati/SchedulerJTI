<div class="register-box">
  <div class="register-logo">
    <a href="../../index2.html" class="text-white"><b>Scheduler</b>JTI</a>
  </div>

  <div class="card">
    <div class="card-body register-card-body">
      <p class="login-box-msg">Create an Account!</p>

      <!-- Form -->
      <form method="post" action="<?= base_url('Auth/register'); ?>">

        <!-- Message Full Name -->
        <?= form_error('name', '<small class="text-danger">', '</small>'); ?>
        <!-- Full Name -->
        <div class="input-group mb-3">
          <input type="text" class="form-control" id="name" name="name" value="<?= set_value('name'); ?>" placeholder="Full name">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>

        <!-- Message Email -->
        <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
        <!-- Email -->
        <div class=" input-group mb-3">
          <input type="text" class="form-control" id="email" name="email" value="<?= set_value('email'); ?>" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>

        <!-- Message Password -->
        <?= form_error('password1', '<small class="text-danger">', '</small>'); ?>
        <!-- Password -->
        <div class="input-group mb-3">
          <input type="password" class="form-control" id="password1" name="password1" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" id="password2" name="password2" placeholder="Retype password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>

        <div class="row">
          <!-- /.col -->
          <div class="col">
            <button type="submit" class="btn btn-primary btn-block">Register Account</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <div class="text-center">
        <a href="<?= base_url('Auth'); ?>">I already have an account</a>
      </div>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->