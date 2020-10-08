<div class="container">
  <div class="row">
    <div class="col-lg-6 m-auto">
      <div class="card m-5">
            <div class="card-header">
              <h2>Login</h2>
            </div>
            <div class="card-body">
            <form method="post" action="/login" class="form-check">
            <?php if(session()->get('success')): ?>
                <div class="alert alert-success" role="alert">Registration Successful Please Login</div>
            <?php endif; ?>

            <?php if(isset($validation)): ?>
                <div class="alert alert-warning" role="alert"><?= $validation->listErrors() ?></div>
            <?php endif; ?>
                
              <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" name="email" id="exampleInputEmail1" value="<?= set_value('email'); ?>">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" name="password">
              </div>
              <p>Don't have an account ?<a href="/register">Register</a></p>
            </div>
            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Login</button>
            </form>
            </div>
      </div>
    </div>
  </div>
</div>