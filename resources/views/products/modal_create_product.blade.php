
<!-- Modal -->
<div class="modal fade" id="modal_create_product" tabindex="-1" role="dialog" 
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h2 class="modal-title" id="exampleModalLongTitle" align="center">
          <i class="glyphicon glyphicon-log-in">Add New Product</i></h2>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <div class="modal-body">
      <form method="post" action="{{ route('operators.store') }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <fieldset>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <input name="operator_name"  class="form-control" aria-describedby="emailHelp" placeholder="Enter Product Name" type="text">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <!-- <label for="exampleInputEmail1">Bus Name</label> -->
                <input name="operator_email"  class="form-control" aria-describedby="emailHelp" placeholder="Enter Email" type="email">
              </div>
            </div>
          </div>
          <div class="form-group">
            <!-- <label for="exampleInputEmail1">Bus Name</label> -->
            <input name="operator_phone"  class="form-control" aria-describedby="emailHelp" placeholder="Enter Mobile Number" type="text">
          </div>
          <div class="form-group">
            <!-- <label for="exampleInputPassword1">Seat No</label> -->
            <textarea name="operator_address" rows="2" cols="20" class="form-control" placeholder="Enter Product Address" type="text"></textarea>
          </div>

          <div class="col-md-3">
            <div class="form-group">
              <input name="status" type="checkbox">
              <label for="exampleInputEmail1">Active</label>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <label class="control-label">Image</label>
              <input type="file" name="operator_logo">
            </div>
          </div>
        </fieldset>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save</button>
        </div>        
      </form>
    </div>

    </div>
  </div>
</div>