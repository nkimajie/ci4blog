<div class="container">
  <div class="row">
      <div class="col-lg-6 m-auto">
        <div class="card my-8">
        <div class="card-header">
          <h2>Register User</h2>
        </div>
        <div class="card-body">
            <form method="post" action="/register" class="form-check">
                <div class="form-group">
                    <label for="firstname">First Name</label>
                    <input id="firstname" class="form-control "  type="text" name="firstname" value="<?= set_value('firstname'); ?>">
                </div>
                <div class="form-group">
                    <label for="lastname">Last Name</label>
                    <input id="lastname" class="form-control" style="" type="text" name="lastname" value="<?= set_value('lastname');  ?>">
                </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="text" class="form-control " name="email" id="exampleInputEmail1" value="<?= set_value('lastname'); ?>">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control " id="exampleInputPassword1" name="password">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword2">Confirm Password</label>
                <input type="password" class="form-control " id="exampleInputPassword2" name="cpassword">
              </div>
              <p>Already have an account ?<a href="/login">Login</a></p>
              <?php if(isset($validation)): ?>
              <div class="alert alert-warning" role="alert"><?= $validation->listErrors() ?></div>
              <?php endif; ?>
        </div>
        <div class="card-footer">
              <button type="submit" class="btn btn-primary">Register</button>
            </form>
        </div>
      </div>
      </div>
  </div>
</div>