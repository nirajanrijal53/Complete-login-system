<?php  
  $page_title = 'Dashboard';
  require 'inc/header.php';
  $page = new Pages();
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
                <h3>Pages List</h3>
              </div>
              <div class="title_right">
                <a href="javascript:0;" class="btn btn-success pull-right" onclick="showAddForm()">
                  <i class="fa fa-plus"></i>Add Pages
                </a>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>All Pages</h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <table id="datatable" class="table table-bordered table-hover jambo_table">
                        <thead>
                          <th>S.N</th>
                          <th>Title</th>
                          <th>Summary</th>
                          <th>Thumbnail</th>
                          <th>Status</th>
                          <th>Action</th>
                        </thead>
                        <tbody>
                          <?php 
                            $all_pages = $page->getAllPages();
                            if($all_pages){
                              foreach ($all_pages as $key => $page_data) {
                          ?>
                          <tr>
                            <td><?php echo $key+1; ?></td>
                            <td><?php echo $page_data->title; ?></td>
                            <td>
                              <?php echo $page_data->summary; ?>
                            </td>
                            <td>
                              <?php 
                                $thumb = CMS_IMG.'default-image.jpg';
                                if(!empty($page_data->image) && file_exists(UPLOAD_DIR.'pages/'.$page_data->image)){
                                    $thumb = UPLOAD_URL.'pages/'.$page_data->image;
                                }
                              ?>
                              <img src="<?php echo $thumb; ?>" class="img img-responsive img-thumbnail" style= "max-width:100px; max-height: 100px" ;"  >
                            </td>
                            <td><?php echo $page_data->status; ?></td>
                            <td>
                              <a href="javascript:;" onclick="editPages(this);" data-pages_data='<?php echo json_encode($page_data); ?>' class="btn btn-primary"><i class="fa fa-pencil"></i></a>
                              <?php  
                                // $act = substr(md5("delete-banner-".$page_data->id."-".$_SESSION['token']),3,15);
                              ?>
                              <!-- <a onclick="return confirm('Are you sure you want to delete this banner?')" href="process/banner?id=<?php echo $page_data->id;?>&amp;act=<?php echo $act; ?>" class="btn btn-danger" > -->
                                <!-- <i class="fa fa-trash"></i> -->
                              <!-- </a> -->
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
            <h4 class="modal-title" id="myModalLabel">Add Pages</h4>
          </div>
          <form action="process/pages" method="post" enctype="multipart/form-data" class="form form-horizontal" id="myform">
            <div class="modal-body">
              <div class="row form-group">
                  <label class="col-sm-3">Pages Title: </label>
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
                    <label class="col-sm-3">Description: </label>
                    <div class="col-sm-9">
                      <textarea name="description" class="form-control" id="description" type="text"></textarea>
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
                <input type="hidden" name="id" id="pages_id"/>
                <input type="hidden" name="old_image" id="old_image"/>

                <button type="reset" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-trash"></i> Cancel</button>
                <button type="submit" class="btn btn-success"><i class="fa fa-paper-plane"></i> Save changes</button>
              </div>
          </form>

        </div>
      </div>
    </div>

 <script src="<?php echo CMS_JS.'datatables.min.js';?> "></script>
 <script src="<?php echo CMS_PLUGINS.'ckeditor/ckeditor.js';?>"></script>
<?php  
  require 'inc/footer.php';
?>
<script>
  let ceditor;

  $( document ).ready(function() {
      ckEditor('');
  });
    function showForm(data = null){
      //$('#myform')[0].reset();
      $('.modal').modal('show');
      ceditor.setData(data);
      //$('#myModalLabel').html('Add Pages');
      // $('#thumbnail').attr('src', '<?php //echo CMS_IMG.'default-image.jpg'; ?>');
     // $('#image').attr('required');

    }

    function ckEditor(data = null){
        ClassicEditor
          .create( document.querySelector( '#description' ),{
              ckfinder: {
              uploadUrl: '<?php echo CMS_PLUGINS.'/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files&responseType=json';?>',
                }
              }  )
          .then(editor => {
                ceditor = editor;
                editor.ui.view.editable.editableElement.style.height = '150px';
                editor.setData(data);
                //console.log( editor );
              } )
            .catch( error => {
              //console.error( error );
        } );
    }

    function editPages(elem){
      var pages_info = $(elem).data('pages_data');
      if(typeof(pages_info) != 'object'){
        pages_info = $.parseJSON(pages_info);
      }

      $('#myModalLabel').html('Update Pages');
      $('#title').val(pages_info.title);
      $('#summary').val(pages_info.summary);
      //CKEDITOR.instances['#description'].setData(pages_info.description)
     // $('#description').val(pages_info.description);
      $('#status').val(pages_info.status);
      if(pages_info.image != null){
      $('#thumbnail').attr('src', '<?php echo UPLOAD_URL; ?>pages/'+pages_info.image);
      }
      $('#image').removeAttr('required');
      $('#pages_id').val(pages_info.id);
      $('#old_image').val(pages_info.image);
     // $('.modal').modal('show');
     showForm(pages_info.description);
    }

    function showAddForm(){
      // $('#myform')[0].reset();
      $('.modal').modal('show');
      $('#myModalLabel').html('Add Page');
      $('#thumbnail').attr('src', '<?php echo CMS_IMG.'default-image.jpg'; ?>');
      $('#image').attr('required');


    }
</script>

 



    

