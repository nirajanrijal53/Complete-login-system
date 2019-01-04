<?php  require 'inc/header.php'; ?>

    <div>
      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <?php flash() ?>
            <form method="post" action="process/reset-password">
              <h1>Reset Form</h1>
              <div>
                <label for=" ">Please provide your valid email address to send reset link.</label>
                <input type="text" name="username" class="form-control" placeholder="Username" required="" />
              </div>
              <div>
                <button class="btn btn-success">Send Verification</button>
                <a class="login" href="index">Login?</a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <div class="clearfix"></div>
                <br/>

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