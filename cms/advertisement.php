<?php  
  $page_title = 'Dashboard';
  require 'inc/header.php';
  $advertisement = new Advertisement();
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
                <h3>Advertisement List</h3>
              </div>
              <div class="title_right">
                <a href="javascript:0;" class="btn btn-success pull-right" onclick="showAddForm()">
                  <i class="fa fa-plus"></i>Add Advertisement
                </a>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>All Advertisements</h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <table id="datatable" class="table table-bordered table-hover jambo_table">
                        <thead>
                          <th>S.N</th>
                          <th>Title</th>
                          <th>Link</th>
                          <th>Thumbnail</th>
                          <th>Status</th>
                          <th>Action</th>
                        </thead>
                        <tbody>
                          <?php 
                            $all_advertisements = $advertisement->getAllAdvertisement();
                            if($all_advertisements){
                              foreach ($all_advertisements as $key => $advertisement_data) {
                          ?>
                          <tr>
                            <td><?php echo $key+1; ?></td>
                            <td><?php echo $advertisement_data->title; ?></td>
                            <td>
                              <a target="_blank" href="<?php echo $advertisement_data->link; ?>" ><?php echo $advertisement_data->link; ?></a>
                            </td>
                            <td>
                              <img src="<?php echo UPLOAD_URL.'advertisement/'.$advertisement_data->image; ?>" class="img img-responsive img-thumbnail" style= "max-width:200px; max-height: 200px" ;"  >
                            </td>
                            <td><?php echo $advertisement_data->status; ?></td>
                            <td>
                              <a href="javascript:;" onclick="editAdvertisement(this);" data-advertisement_data='<?php echo json_encode($advertisement_data); ?>' class="btn btn-primary"><i class="fa fa-pencil"></i></a> /  
                              <?php  
                                $act = substr(md5("delete-advertisement-".$advertisement_data->id."-".$_SESSION['token']),3,15);
                              ?>
                              <a onclick="return confirm('Are you sure you want to delete this advertisement?')" href="process/advertisement?id=<?php echo $advertisement_data->id;?>&amp;act=<?php echo $act; ?>" class="btn btn-danger" >
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
            <h4 class="modal-title" id="myModalLabel">Add Advertisement</h4>
          </div>
          <form action="process/advertisement" method="post" enctype="multipart/form-data" class="form form-horizontal" id="myform">
            <div class="modal-body">
              <div class="row form-group">
                  <label class="col-sm-3">Advertisement Title: </label>
                  <div class="col-sm-9">
                    <input name="title" class="form-control" id="title" type="text" required=""></input>
                  </div>
              </div>

              <div class="row form-group">
                    <label class="col-sm-3">Link: </label>
                    <div class="col-sm-9">
                      <input name="link" class="form-control" id="link" type="url"></input>
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
              <input type="hidden" name="id" id="advertisement_id"/>
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
      $('#myModalLabel').html('Add Advertisement');
      $('#thumbnail').attr('src', '<?php echo CMS_IMG.'default-image.jpg'; ?>');
      $('#image').attr('required');


    }

    function editAdvertisement(elem){
      var advertisement_info = $(elem).data('advertisement_data');
      if(typeof(advertisement_info) != 'object'){
        advertisement_info = $.parseJSON(advertisement_info);
      }

      $('#myModalLabel').html('Update Advertisement');
      $('#title').val(advertisement_info.title);
      $('#link').val(advertisement_info.link);
      $('#status').val(advertisement_info.status);
      if(advertisement_info.image != null){
      $('#thumbnail').attr('src', '<?php echo UPLOAD_URL; ?>advertisement/'+advertisement_info.image);
      }
      $('#image').removeAttr('required');
      $('#advertisement_id').val(advertisement_info.id);
      $('#old_image').val(advertisement_info.image);
      $('.modal').modal('show');
    }

    
</script>

 



    

