<?php  
  $page_title = 'Add Product';
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
                <h3>Products</h3>
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
                    <h1></h1>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

          <form action="process/product" method="post"  enctype="multipart/form-data" class="form form-horizontal" id="myform">
                  <div class="modal-body">
                    <div class="row form-group">
                        <label class="col-sm-3">Title: </label>
                        <div class="col-sm-9">
                          <input name="title" class="form-control" id="title" type="text" required=""/>
                        </div>
                    </div>

                    <div class="row form-group">
                          <label class="col-sm-3">Summary: </label>
                          <div class="col-sm-9">
                            <textarea name="summary" required="" class="form-control" id="summary" rows="5" style="resize: none;"></textarea>
                          </div>
                    </div>

                    <div class="row form-group">
                          <label class="col-sm-3">Description: </label>
                          <div class="col-sm-9">
                            <textarea name="description" class="form-control" id="description" type="text"rows="5" style="resize: none;" ></textarea>
                          </div>
                    </div>

                    <div class="row form-group">
                          <label class="col-sm-3">Category: </label>
                          <div class="col-sm-9">
                            <select class="form-control" id="cat_id" required="" name="cat_id">
                              <option value="" selected="" disabled="">---Select Any One---</option>
                              <?php 
                                $category = new Category();
                                $all_parents = $category->getAllparent();
                                if($all_parents){
                                  foreach($all_parents as $parent_cats){
                                    ?>
                                      <option value=" <?php echo $parent_cats->id ?> "><?php echo $parent_cats->name ?></option>
                                    <?php
                                  }
                                } 
                              ?>
                            </select>
                          </div>
                    </div>

                    <div class="row form-group" id="child_cat_div">
                          <label class="col-sm-3">Sub Category: </label>
                          <div class="col-sm-9">
                            <select class="form-control" id="child_cat_id"  name="child_cat_id">
                              <option value="" selected="" disabled="">---Select Any One---</option>
                              <option value="mobile">mobile</option>
                            </select>
                          </div>
                    </div>

                    <div class="row form-group">
                        <label class="col-sm-3">Price(NRP): </label>
                        <div class="col-sm-9">
                          <input name="price" class="form-control" id="price" type="number" required=""/>
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
                          <input name="brand" class="form-control" id="brand" type="text" required=""/>
                        </div>
                    </div>

                    <div class="row form-group">
                          <label class="col-sm-3">Meta Keywords: </label>
                          <div class="col-sm-9">
                            <textarea name="meta_keywords" class="form-control" id="meta_keywords" type="text"rows="5" style="resize: none;" ></textarea>
                          </div>
                    </div>

                    <div class="row form-group">
                          <label class="col-sm-3">Vendor: </label>
                          <div class="col-sm-9">
                            <select class="form-control" id="vendor_id" required="" name="vendor_id">
                              <option value="" selected="" >Self</option>
                              <?php  
                                $user = new User();
                                $args = array(
                                    'role' => 'Vendor',
                                    'status' => 'Active'
                                );
                                $vendors = $user->getUser($args);
                                if($vendors){
                                  foreach($vendors as $vendor){
                                    ?>
                                    <option value=" <?php echo $vendor->id ?> "> <?php echo $vendor->full_name ?> </option>
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
                              <option value="Available">Available</option>
                              <option value="Unavailable">Unavailable</option>
                            </select>
                          </div>
                    </div>

                    <div class="row form-group">
                      <label class="col-sm-3">Is Featured: </label>
                      <div class="col-sm-9">
                        <input type="checkbox" name="is_featured" id="is_featured" value="1" checked>Yes
                      </div>
                    </div>

                    <div class="row form-group">
                      <label class="col-sm-3">Is Trending: </label>
                      <div class="col-sm-9">
                        <input type="checkbox" name="is_trending" id="is_trending" value="1" checked>Yes
                      </div>
                    </div>

                    <div class="row form-group">
                          <label class="col-sm-3">Images: </label>
                          <div class="col-sm-4">
                            <input type="file" name="images[]" multiple id="image" accept="image/*" required="">
                          </div>
                          <!-- <div class="col-sm-4">
                            <img src="<?php echo CMS_IMG.'default-image.jpg'; ?>" class="img img-responsive img-thumbnail" id = "thumbnail">
                          </div> -->
                    </div>

                    <div class="modal-footer">
                      <!-- <input type="hidden" name="id" id="pages_id"/>
                      <input type="hidden" name="old_image" id="old_image"/> -->

                      <button type="reset" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-trash"></i> Cancel</button>
                      <button type="submit" class="btn btn-success"><i class="fa fa-paper-plane"></i> Save changes</button>
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

 <script src="<?php echo CMS_PLUGINS.'ckeditor/ckeditor.js';?>"></script>


 <script>
    ClassicEditor
    .create( document.querySelector( '#description' ) )
    .then( editor => {
             editor.ui.view.editable.editableElement.style.height = '150px';    
        //console.log( editor );
    } )
    .catch( error => {
        //console.error( error );
    } );
 </script>

<?php  
  require 'inc/footer.php';
?>
 

<!-- if(!$_SESSION['token']){
  $token = $_SESSION['token'];
  $user_info = $user->getUserByToken($token);
    debugger($user_info, true);
 } -->


 



    

