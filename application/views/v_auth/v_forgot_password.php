<div class="login-box">
  <div class="login-logo">
    <a href="../../index2.html" class="text-white"><b>Scheduler</b>JTI</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body text-center">
      <p class="login-box-msg">You forgot your password? Here you can easily retrieve a new password.</p>

      <form action="recover-password.html" method="post">
        <div class="input-group mb-3">
          <input type="email" class="form-control" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Request new password</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <hr class="mt-4 mb-3">

      <p class="mb-0">
        <a href="<?= base_url('auth'); ?>">Login</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->