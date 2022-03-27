@extends('templates/adminlte/index')
@section('content')

<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Dashboard</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{url('admin.dashboard')}}">Dashboard</a></li>
        </ol>
      </div><!-- /.col -->
 
    </div><!-- /.row -->

    {{-- Notification --}}
    @if(Session::has('message'))
    <div class="row">
    <div class="col-sm-12">
      <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        {{ Session::get('message') }}
      </div>
    </div>
    </div>
    @endif

    @include('shared.msgbox', ['errors'=>$errors])



  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-6">
        <!-- Horizontal Form -->
        <div class="card card-info">
          <div class="card-header">
            <h3 class="card-title">Welcome</h3>
          </div>
          <div class="card-body p-0">
            <p>Welcome back, Mr./Mrs. <strong>{{ auth()->user()->name }}</strong></p>
          </div>
          <!-- /.card-body -->
        </div>
      </div>      
    </div>
    <!-- /.row -->

  </div><!-- /.container-fluid -->
</section>

@endsection