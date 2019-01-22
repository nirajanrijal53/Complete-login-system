<!-- Image caurosel -->

<meta name="viewport" content="width=device-width, initial-scale=1">
<meta content="text/html; charset=iso-8859-2" http-equiv="Content-Type">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<style>
.mySlides {display:none;}
</style>

<!-- Image caurosel -->

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
                <!-- <h3>Dashboard</h3> -->
              </div>


              <!-- <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    
                  </div>
                </div>
              </div> -->
            </div>

            <div class="clearfix">
              <!-- <img class="" src="<?php echo CMS_IMG.'celeb2.jpg'; ?>" style="width:100%"> -->
            </div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <!-- <div class="x_title">
                    
                    
                    <div class="clearfix"></div>
                  </div> -->
                  <div class="x_content">
                    <div class="w3-content w3-section" style="max-width:100%">
                      <img class="mySlides" src="<?php echo CMS_IMG.'celeb2.jpg'; ?>" style="width:100%">
                      <img class="mySlides" src="<?php echo CMS_IMG.'achal.jpg'; ?>" style="width:100%">
                      <img class="mySlides" src="<?php echo CMS_IMG.'taylor.jpg'; ?>" style="width:100%">
                    </div>
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


<!-- Image caurosel -->

<script type="text/javascript">

  var myIndex = 0;
  carousel();

  function carousel() {
  var i;
  var x = document.getElementsByClassName("mySlides");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";  
  }
  myIndex++;
  if (myIndex > x.length) {myIndex = 1}    
  x[myIndex-1].style.display = "block";  
  setTimeout(carousel, 2000); // Change image every 2 seconds
}
</script>
</script>
<!-- Image caurosel -->
 

<!-- if(!$_SESSION['token']){
  $token = $_SESSION['token'];
  $user_info = $user->getUserByToken($token);
    debugger($user_info, true);
 } -->


 



    

