@extends('templates/material_dashboard/v_admin')
@section('content')

<div class="container-fluid">
  <div class="row">

    <div class="col-md-12">

      @include('shared.msgbox', ['errors'=>$errors])

      <div class="card">

        <div class="card-header card-header-primary">
          <h4 class="card-title ">{{ $pageTitle }}</h4>
          <p class="card-category"> Here is a subtitle for this table</p>
        </div>
        <div class="card-body">
            {{-- @if (!empty($dtProducts)) --}}
            @if (isset($dtProducts))

            <form action="{{ url('products', [$updateID]) }}" class="form-horizontal" id="frm_update" name="frm_update" method="POST">
            <input type="hidden" name="_method" value="PUT">
            {{-- <input type="hidden" id="id" name="id" value="{{ $updateID }}"> --}}

            @else

            <form id="frm_create" name="frm_create" action="{{ route('products.store') }}" method="POST" class="form-horizontal"> 

            @endif

            @csrf

            <div class="col-md-6">
              <div class="form-group">
                <input type="text" id="sku" name="sku"  class="form-control" value="{{ !empty($dtProducts) ? $dtProducts->sku : null }}" placeholder="SKU">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <input type="text" id="name" name="name"  class="form-control" value="{{ !empty($dtProducts) ? $dtProducts->name : null }}" placeholder="Name">
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <input type="text" id="short_description" name="short_description"  class="form-control" value="{{ !empty($dtProducts) ? $dtProducts->short_description : null }}" placeholder="Short Description">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <input type="text" id="type" name="type"  class="form-control" value="{{ !empty($dtProducts) ? $dtProducts->type : null }}" placeholder="Type">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <input type="number" min=0 id="price" name="price"  class="form-control" value="{{ !empty($dtProducts) ? $dtProducts->price : null }}" placeholder="Price">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <input type="text" id="status" name="status"  class="form-control" value="{{ !empty($dtProducts) ? $dtProducts->status : null }}" placeholder="Status">
              </div>
            </div>

            @if ($dtProducts)
                @if ($dtProducts->type == 'configurable')
                    @include('products.configurable')
                @else
                    @include('products.simple')                            
                @endif

                <div class="col-md-6">
                  <div class="form-group">
                    <input type="text" id="name" name="name"  class="form-control" value="{{ !empty($dtProducts) ? $dtProducts->name : null }}" placeholder="Name">
                  </div>
                </div>

            @endif

            <div class="form-footer pt-5 border-top">
                <a href="{{ url('products') }}" class="btn btn-default btn-sm">Back</a>
                <button type="submit" class="btn btn-primary btn-sm" id="btn_submit" name="btn_submit" value="Save">Save</button>
            </div>

            </form>
        </div>
      </div>

    </div>
  </div>
</div>

@endsection