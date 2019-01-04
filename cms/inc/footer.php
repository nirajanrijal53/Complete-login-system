<?php  
require $_SERVER['DOCUMENT_ROOT'].'config/init.php';

    if (getCurrentPage() != 'index') {
?>

    <!-- Bootstrap -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="assets/js/fastclick.js"></script>
    <!-- NProgress -->
    <script src="assets/js/nprogress.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="assets/js/custom.min.js"></script> 
<?php       
    }

?>



  </body>
</html>