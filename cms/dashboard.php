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
                    <h2>Dashboard Page</h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      Add content to the page ...
      
                      <!-- <?php
                        ?> -->
                       <!-- echo $_SESSION['user_id'];
                       echo "<br>";
                       echo  $_SESSION['full_name'];
                       echo "<br>";

                       echo  $_SESSION['full_name'];
                       echo "<br>";

                       echo  $_SESSION['email'];
                       echo "<br>";

                       echo  $_SESSION['role'];
                       echo "<br>";

                       echo  $_SESSION['token']; -->


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
 

<!-- if(!$_SESSION['token']){
  $token = $_SESSION['token'];
  $user_info = $user->getUserByToken($token);
    debugger($user_info, true);
 } -->


 



    

