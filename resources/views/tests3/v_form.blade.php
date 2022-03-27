@extends('templates/material_dashboard/v_admin')
@section('content')

<div class="container-fluid">
  <div class="row">

    <div class="col-md-12">

      @include('shared.msgbox', ['errors'=>$errors])

      <div class="card">

        <div class="card-header card-header-primary">
          <h4 class="card-title "><?=$pageTitle; ?></h4>
          <p class="card-category"> Here is a subtitle for this table</p>
        </div>
        <div class="card-body">
            <form id="frm_create" name="frm_create" action="{{ route('tests3.store') }}" method="post" class=" form-horizontal">  
            {{ csrf_field() }}
            <div class="col-md-6">
              <div class="form-group">
                <input type="text" id="categ_name" name="categ_name"  class="form-control" placeholder="Category Name">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <input type="text" id="parent_id" name="parent_id"  class="form-control" placeholder="Parent Category">
              </div>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-default btn-sm" id="btn_close" name="btn_submit" value="Cancel">Close</button>
              <button type="submit" class="btn btn-primary btn-sm" id="btn_save" name="btn_submit" value="Save">Save</button>
            </div>

            </form>
        </div>
      </div>

    </div>
  </div>
</div>

@endsection