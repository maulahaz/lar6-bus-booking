@extends('templates/material_dashboard/v_admin')
@section('content')
<!-- CUSTOM STYLE -->
<!--================================================================-->
<style>
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
        <a href="#" data-toggle="modal" data-target="#modal_create_operator" 
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
                <th>ID</th>
                <th>Logo</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Action</th>
              </thead>
              <tbody>
                @foreach($dtOperators as $row)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td class="logo"><img src="{{ url('operator_images').'/'.$row->operator_logo }}" alt=""></td>
                  <td>{{ $row->operator_name }}</td>
                  <td>{{ $row->operator_email }}</td>
                  <td>{{ $row->operator_phone }}</td>
                  <td>{{ $row->operator_address }}</td>
                  <td>
                    <a href="/operator/edit/{{ $row->operator_id }}" class="btn btn-warning btn-sm">Edit</a>
                    |
                    <a href="/operator/destroy/{{ $row->operator_id }}" class="btn btn-danger btn-sm">Delete</a>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@include('operators.modal_create_operator')

@endsection