<div class="row">
  <div class="col-12">
    <nav class="navbar navbar-dark bg-dark">
      <div class="container-fluid">
        <a href="index.php" class="navbar-brand"><i class="fa fa-home text-light"></i></a>
        <div class="d-flex">
          <?php
          if (isset($_SESSION['mysession']) != "") {
          ?>
            <a href="mailer.php" class="btn btn-outline-success mx-3"><i class="fa fa-envelope"></i> Contact</a>
            <a href="profile.php" class="btn btn-outline-success"><i class="fa fa-user-alt"></i> Profile</a>
            <a href="logout.php" class="btn btn-outline-success mx-3"><i class="fa fa-sign-out"></i> logOut</a>
          <?php } else {
          ?>

            <button class="btn btn-outline-success" type="submit" name="login" data-bs-toggle="modal" data-bs-target="#exampleModal">SignIn</button>
            <div class="modal fade mt-5" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 style="color:blueviolet;" class="modal-title text-center display-5" id="exampleModalLabel">Sign In</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">

                    <form class="my-5" action="signin.php" method="POST">
                      <div class="input-group">
                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-envelope"></i></span>
                        <input type="text" class="form-control" placeholder="Email Address" name="email" required>
                      </div>
                      <div class="input-group mt-4">
                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-lock"></i></span>
                        <input type="password" class="form-control" placeholder="Password" name="pwd" required>
                      </div>
                      <input type="submit" value="Log In" name="login" class="btn btn-succes btn-success w-100 mt-3"><a href="fpass.php">Forget password</a>


                    </form>
                    <hr>
                    <h5 class="my-3">Don't have an account!<a class="text-decoration-none" href="signup.php"> Sign Up Here</a></h5>
                  </div>

                </div>
              </div>
            </div>

            <a href="signup.php" class="btn btn-outline-success mx-3">signUp</a>

          <?php } ?>
        </div>
      </div>
    </nav>
  </div>
</div>