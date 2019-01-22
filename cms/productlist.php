<?php  
  $page_title = 'Dashboard';
  require 'inc/header.php';
  $productlist = new Productlist();
  // $products = new Products();
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
                <h3>Product List</h3>
              </div>
              <div class="title_right">
                <a href="product-add" class="btn btn-success pull-right" >
                  <i class="fa fa-plus"></i>Add Productlist
                </a>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>All Products</h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <table id="datatable" class="table table-bordered table-hover jambo_table">
                        <thead>
                          <th>S.N</th>
                          <th>Title</th>
                          <th>Summary</th>
                          <th>Thumbnail</th>
                          <th>Price</th>
                          <th>Brand</th>
                          <th>Status</th>
                          <th>Action</th>
                        </thead>
                        <tbody>
                          <?php 
                            $all_productlists = $productlist->getAllProductlist();
                            if($all_productlists){
                              foreach ($all_productlists as $key => $productlist_data) {
                          ?>
                          <tr>
                            <td><?php echo $key+1; ?></td>
                            <td><?php echo $productlist_data->title; ?></td>
                            <td><?php echo $productlist_data->summary; ?></td>
                            <td>-</td>
                            <!-- <td>
                              <img src="<?php echo UPLOAD_URL.'productlist/'.$productlist_data->image; ?>" class="img img-responsive img-thumbnail" style= "max-width:200px; max-height: 200px" ;"  >
                            </td> -->
                            <td><?php echo $productlist_data->price; ?></td>
                            <td><?php echo $productlist_data->brand; ?></td>
                            <td><?php echo $productlist_data->status; ?></td>
                            <td>
                              <a href="javascript:;" onclick="editProductlist(this);" data-productlist_data='<?php echo json_encode($productlist_data); ?>' class="btn btn-primary"><i class="fa fa-pencil"></i></a> /  
                              <?php  
                                $act = substr(md5("delete-productlist-".$productlist_data->id."-".$_SESSION['token']),3,15);
                              ?>
                              <a onclick="return confirm('Are you sure you want to delete this productlist?')" href="process/productlist?id=<?php echo $productlist_data->id;?>&amp;act=<?php echo $act; ?>" class="btn btn-danger" >
                                <i class="fa fa-trash"></i>
                              </a>
                            </td>
                          </tr>
                          <?php 
                              }
                            }
                          ?>
                        </tbody>
                      </table>

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

    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">

          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
            </button>
            <h4 class="modal-title" id="myModalLabel">Add Product</h4>
          </div>
          <form action="process/productlist" method="post" enctype="multipart/form-data" class="form form-horizontal" id="myform">
            <div class="modal-body">
              <div class="row form-group">
                  <label class="col-sm-3">Product Title: </label>
                  <div class="col-sm-9">
                    <input name="title" class="form-control" id="title" type="text" required=""></input>
                  </div>
              </div>

              <div class="row form-group">
                    <label class="col-sm-3">Summary: </label>
                    <div class="col-sm-9">
                      <textarea name="summary" required="" class="form-control" id="summary" rows="5" style="resize: none;"></textarea>
                    </div>
              </div>

              <div class="row form-group">
                    <label class="col-sm-3">Price: </label>
                    <div class="col-sm-9">
                      <input name="price" class="form-control" id="price" type="number"></input>
                    </div>
              </div>

              <div class="row form-group">
                        <label class="col-sm-3">Discount %: </label>
                        <div class="col-sm-9">
                          <input name="discount" class="form-control" id="discount" type="number" required=""/>
                        </div>
                    </div>

              <div class="row form-group">
                  <label class="col-sm-3">Brand: </label>
                  <div class="col-sm-9">
                    <input name="brand" class="form-control" id="brand" type="text" required=""></input>
                  </div>
              </div>

              <div class="row form-group">
                    <label class="col-sm-3">Status: </label>
                    <div class="col-sm-9">
                      <select class="form-control" id="status" required="" name="status">
                        <option value="Available">Available</option>
                        <option value="Unavailable">Unavailable</option>
                      </select>
                    </div>
              </div>

              <div class="row form-group">
                    <label class="col-sm-3">Images: </label>
                    <div class="col-sm-4">
                      <input type="file" name="image" onchange="showThumbnail(this)" id="image" accept="image/*" required="">
                    </div>
                    <div class="col-sm-4">
                      <img src="<?php echo CMS_IMG.'default-image.jpg'; ?>" class="img img-responsive img-thumbnail" id = "thumbnail">
                    </div>
              </div>

              <div class="modal-footer">
              <input type="hidden" name="id" id="productlist_id"/>
              <input type="hidden" name="old_image" id="old_image"/>

              <button type="reset" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-trash"></i> Cancel</button>
              <button type="submit" class="btn btn-success"><i class="fa fa-paper-plane"></i> Save changes</button>
            </div>
          </form>

        </div>
      </div>
    </div>

 <script src="<?php echo CMS_JS.'datatables.min.js';?> "></script>
<!-- <script>
  $('#datatable').DataTable();
</script> -->
<?php  
  require 'inc/footer.php';
?>
<script>
    // function showAddForm(){
    //   $('#myform')[0].reset();
    //   $('.modal').modal('show');
    //   $('#myModalLabel').html('Add Productlist');
    //   $('#thumbnail').attr('src', '<?php echo CMS_IMG.'default-image.jpg'; ?>');
    //   $('#image').attr('required');


    // }

    function editProductlist(elem){
      var productlist_info = $(elem).data('productlist_data');
      if(typeof(productlist_info) != 'object'){
        productlist_info = $.parseJSON(productlist_info);
      }

      $('#myModalLabel').html('Update Productlist');
      $('#title').val(productlist_info.title);
      $('#summary').val(productlist_info.summary);
      $('#price').val(productlist_info.price);
      $('#discount').val(productlist_info.discount);
      $('#brand').val(productlist_info.brand);
      $('#status').val(productlist_info.status);
      if(productlist_info.image != null){
      $('#thumbnail').attr('src', '<?php echo UPLOAD_URL; ?>productlist/'+productlist_info.image);
      }
      $('#image').removeAttr('required');
      $('#productlist_id').val(productlist_info.id);
      $('#old_image').val(productlist_info.image);
      $('.modal').modal('show');
    }

    
</script>

 



    

