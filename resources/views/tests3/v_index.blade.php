@extends('templates/material_dashboard/v_admin')
@section('content')
<!-- CUSTOM STYLE -->
<!--================================================================-->
<style>
  th, td{ text-align: center; }
  .logo {
    width: 100px;
  }
  .logo img{ width: 100%;}
</style>
<!-------------------------------------------------------------------->

<div class="container-fluid">
  <div class="row">

    <div class="col-md-12">

      @include('shared.msgbox', ['errors'=>$errors])

      <span class="pull-center">
        <a href="<?=url('/categories/create'); ?>" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i>Create Category</a>
      </span>

      <span class="pull-center">
        <a href="#" data-toggle="modal" data-target="#modal_create_category" 
        data-toggle="tooltip" type="button" class="btn btn-sm btn-primary">
        <i class="glyphicon glyphicon-plus"></i> Create Operator</a>
      </span>

      <div class="card">

        <div class="card-header card-header-primary">
          <h4 class="card-title "><?=$pageTitle; ?></h4>
          <p class="card-category"> Here is a subtitle for this table</p>
        </div>
        <div class="card-body">

          <div class="table-responsive">
            <table class="table">
              <thead class=" text-primary">
                <th>No.</th>
                <th>Name</th>
                <th>Parent ID</th>
                <th>Action</th>
              </thead>
              <tbody>
              @if(count($dtCategories) > 0)
                @foreach($dtCategories as $row)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td class="text-left">{{ $row->name }}</td>
                  <td>{{ $row->parent_id }}</td>
                  <td>
                    <form action="<?= '/categories/'.$row->id ?>" method='POST'>
                      {{ csrf_field() }}
                      {{method_field('DELETE')}}
                      <input type="submit" class="btn btn-warning btn-sm" id="btn_update" name="submit" value="Edit">
                      <input type="submit" class="btn btn-danger btn-sm" id="btn_delete" name="submit" value="Delete">
                    </form>
                  </td>
                </tr>
                @endforeach
              @else
                <tr>
                  <td colspan="4">Data not available</td>
                </tr>
              @endif
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@include('categories.modal_create_category')

@endsection