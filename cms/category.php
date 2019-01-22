<?php  
  $page_title = 'Dashboard';
  require 'inc/header.php';
  $category = new Category();
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
                <h3>Category List</h3>
              </div>
              <div class="title_right">
                <a href="javascript:0;" class="btn btn-success pull-right" onclick="showAddForm()">
                  <i class="fa fa-plus"></i>Add Category
                </a>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>All Categorys</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <table id="datatable" class="table table-bordered table-hover jambo_table">
                        <thead>
                          <th>S.N</th>
                          <th>Name</th>
                          <th>Thumbnail</th>
                          <th>Is parent</th>
                          <th>Parent</th>
                          <th>Show in Menu</th>
                          <th>Status</th>
                          <th>Action</th>
                        </thead>
                        <tbody>
                          <?php 
                            $all_categories = $category->getAllCategory();
                            if($all_categories){
                              foreach ($all_categories as $key => $category_data) {
                          ?>
                          <tr>
                            <td><?php echo $key+1; ?></td>
                            <td><?php echo $category_data->name; ?></td>
                            <td>
                              <img src="<?php echo UPLOAD_URL.'category/'.$category_data->image; ?>" class="img img-responsive img-thumbnail" style= "max-width:200px; max-height: 200px" ;"  >
                            </td>
                            <td>
                              <?php echo ($category_data->is_parent == 1) ? 'Yes' : 'No' ?>
                            </td>
                            <td>
                              <?php echo ($category_data->parent_cat) ? $category_data->parent_cat : '-' ?>
                            </td>
                            <td>
                              <?php echo ($category_data->show_in_menu == 1) ? 'Yes' : 'No' ?>
                            </td>
                            <td><?php echo $category_data->status; ?></td>
                            <td>
                              <a href="javascript:;" onclick="editCategory(this);" data-category_data='<?php echo json_encode($category_data); ?>' class="btn btn-primary"><i class="fa fa-pencil"></i></a> /  
                              <?php  
                                $act = substr(md5("delete-category-".$category_data->id."-".$_SESSION['token']),3,15);
                              ?>
                              <a onclick="return confirm('Are you sure you want to delete this category?')" href="process/category?id=<?php echo $category_data->id;?>&amp;act=<?php echo $act; ?>" class="btn btn-danger" >
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
            <h4 class="modal-title" id="myModalLabel">Add Category</h4>
          </div>
          <form action="process/category"  method="post" novalidate enctype="multipart/form-data" class="form form-horizontal" id="myform">
            <div class="modal-body">
              <div class="row form-group">
                  <label class="col-sm-3">Category Title: </label>
                  <div class="col-sm-9">
                    <input name="name" class="form-control" id="name" type="text" required=""></input>
                  </div>
              </div>

              <div class="row form-group">
                    <label class="col-sm-3">Summary: </label>
                    <div class="col-sm-9">
                      <textarea name="summary" required="" class="form-control" id="summary" rows="5" style="resize: none;"></textarea>
                    </div>
              </div>

              <div class="row form-group">
                    <label class="col-sm-3">Show In Menu: </label>
                    <div class="col-sm-9">
                      <input type="checkbox" name="show_in_menu" id="show_in_menu" value="1">Yes
                    </div>
              </div>

              <div class="row form-group">
                    <label class="col-sm-3">Is Parent: </label>
                    <div class="col-sm-9">
                      <input type="checkbox" name="is_parent" id="is_parent" value="1" checked>Yes
                    </div>
              </div>
              <div class="row form-group hidden"id="parent_cat_div" >
                    <label class="col-sm-3">Parent Categories: </label>
                    <div class="col-sm-9">
                      <select class="form-control" id="parent_id" required="" name="parent_id">
                        <option value="" disabled selected>--Select Any one--</option>
                        <?php  
                          $parent_cats = $category->getAllparent();
                          if($parent_cats){
                            foreach($parent_cats as $parent_cat){
                              ?>
                                <option value=" <?php echo $parent_cat->id; ?> "><?php echo $parent_cat->name; ?></option>   
                              <?php 
                            }
                          }
                        ?>
                      </select>
                    </div>
              </div>

              <div class="row form-group">
                    <label class="col-sm-3">Status: </label>
                    <div class="col-sm-9">
                      <select class="form-control" id="status" required="" name="status">
                        <option value="Active">Active</option>
                        <option value="Inactive">Inactive</option>
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
                <input type="hidden" name="id" id="category_id"/>
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
    function showAddForm(){
      $('#myform')[0].reset();
      $('.modal').modal('show');
      $('#myModalLabel').html('Add Category');
      $('#thumbnail').attr('src', '<?php echo CMS_IMG.'default-image.jpg'; ?>');
      $('#image').attr('required');


    }

    function editCategory(elem){
      var category_info = $(elem).data('category_data');
      if(typeof(category_info) != 'object'){
        category_info = $.parseJSON(category_info);
      }

      $('#myModalLabel').html('Update Category');
      $('#name').val(category_info.name);
      $('#summary').val(category_info.summary);
      $('#status').val(category_info.status);
      if(category_info.image != null){
      $('#thumbnail').attr('src', '<?php echo UPLOAD_URL; ?>category/'+category_info.image);
      }
      $('#image').removeAttr('required');
      // if(category_info.show_in_menu == 0){
      // $("#show_in_menu").attr('checked', true);
      // }
      $('#category_id').val(category_info.id);
      $('#old_image').val(category_info.image);
      $('.modal').modal('show');
    }

    

    $('#is_parent').click( function(){
    if ( $('#parent_cat_div').hasClass('hidden') ) {
        $('#parent_cat_div').removeClass('hidden');
    } else {
        $('#parent_cat_div').removeClass('hidden');
        $('#parent_cat_div').addClass('hidden');    
    }
});


    
</script>

 



    

