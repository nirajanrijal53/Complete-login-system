<?php  
  $page_title = 'Dashboard';
  require 'inc/header.php';
  // require $_SERVER['DOCUMENT_ROOT'].'config/init.php';
?>

<?php require 'inc/checklogin.php'; ?>

    <div class="container body">
      <div class="main_container">
        
        <?php require 'inc/sidebar.php'; ?>

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
            <?php flash();?>
              <div class="title_left">
                <h3>Dashboard</h3>
              </div>

              <!-- <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    
                  </div>
                </div>
              </div> -->
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Change Password</h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <form action="process/password-change" method="POST" class="form form-horizontal">
                        <div class=" row form-group">
                          <label for="" class="col-sm-3">Old Password:</label>
                          <div class="col-sm-6">
                            <input type="password" name="old_password" id="old_password" class="form-control" required="" />
                          </div>  
                        </div>

                        <div class=" row form-group">
                          <label for="" class="col-sm-3">New Password:</label>
                          <div class="col-sm-6">
                            <input type="password" name="new_password" id="password" class="form-control" required="" />
                          </div>  
                        </div>

                        <div class=" row form-group">
                          <label for="" class="col-sm-3">Re Password:</label>
                          <div class="col-sm-6">
                            <input type="password" name="re_password" id="re_password" class="form-control" required="" />
                            <span class="hidden" id="err_pass"></span>
                          </div>  
                        </div>

                        <div class=" row form-group">
                          <label for="" class="col-sm-3"></label>
                          <div class="col-sm-6">
                            <a href="dashboard" class="btn btn-danger">
                              <i class="fa fa-trash"></i>Cancel
                            </a>
                            <button class="btn btn-success" id="submit">
                              <i class="fa fa-send"></i>Submit
                            </button>
                          </div>  
                        </div>

                      </form> 

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            <a href="http://leafplus.com.np/">Leafplus</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

<?php  
  require 'inc/footer.php';
?>
<script type="text/javascript" src="<?php echo CMS_JS.'main.js';?>"> </script> 
 

<!-- if(!$_SESSION['token']){
  $token = $_SESSION['token'];
  $user_info = $user->getUserByToken($token);
    debugger($user_info, true);
 } -->


 



    

