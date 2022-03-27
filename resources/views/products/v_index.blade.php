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
        <a href="<?=url('/products/create'); ?>" class="btn btn-sm btn-primary"><i class="material-icons">create</i> Create Product</a>
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
                <th>Image</th>
                <th>Name</th>
                <th>SKU</th>
                <th>Type</th>
                <th>Price</th>
                <th>Status</th>
                <th>Action</th>
              </thead>
              <tbody>
              @if(count($dtProducts) > 0)
                @foreach($dtProducts as $row)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td class="logo"><img src="<?='/images/noimage.jpg'; ?>" alt=""></td>
                  <td class="text-left">{{ $row->name }}</td>
                  <td>{{ $row->sku }}</td>
                  <td>{{ $row->type }}</td>
                  <td class="text-right">Dhs. {{ $row->price }}</td>
                  <td>{{ $row->status }}</td>
                  <td>
                    <a href="{{ url('products/'. $row->id .'/edit') }}" class="btn btn-warning btn-sm">edit</a>
                    <form action="<?= '/products/'.$row->id ?>" method='POST' style='display:inline-block'>
                      @csrf
                      {{method_field('DELETE')}}
                      <input type="submit" class="btn btn-danger btn-sm" id="btn_delete" name="btn_delete" value="Delete">
                    </form>
                  </td>
                </tr>
                @endforeach
              @else
                <tr>
                  <td colspan="8">Data not available</td>
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

{{-- @include('products.modal_create_product') --}}

@endsection