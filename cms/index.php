<?php  require 'inc/header.php'; ?>
<?php  
    if(isset($_SESSION['token']) || isset($_COOKIE['_auth_user'])){
       redirect('dashboard','success', 'You are already logged in.');
    }
?>


    <div>
      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <?php flash() ?>
            <form method="post" action="process/login">
              <h1>Login Form</h1>
              <div>
                <input type="text" name="username" class="form-control" placeholder="Username" required="" />
              </div>
              <div>
                <input type="password" name="password" class="form-control" placeholder="Password" required="" />
              </div>
              <div>
                <input type="checkbox" name="remember_me" value="1"> Remember me
              </div>
              <div>
                <button class="btn btn-success">Login</button>
                <a class="reset_pass" href="reset">Lost your password?</a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-paw"></i> Leafplus</h1>
                  <p>&copy; <?php echo date("Y"); ?> Powered by <a href="<?php echo SITE_URL; ?>"><b><?php echo SITE_NAME; ?></b></a></p>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>

<?php  
  require 'inc/footer.php';
?>