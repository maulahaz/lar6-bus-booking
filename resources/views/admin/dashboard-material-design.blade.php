@extends('templates/material_dashboard/v_admin')
@section('content')

<!-- CUSTOM STYLE -->
<!--================================================================-->
<style>
  .card-content{
    min-height: 500px;
    margin-top: 20px;
  }
</style>
<!-------------------------------------------------------------------->

<div class="container-fluid">
  <div class="row">

    <div class="col-md-12">

      @include('shared.msgbox', ['errors'=>$errors])

      <div class="card">
        <div class="card-body">
        <div class="card-header card-header-primary">
          <h4 class="card-title "><?=$pageTitle; ?></h4>
          <p class="card-category"> Here is a subtitle for this table</p>
        </div>
        <div class="card-content">
          <p>Welcome back, Mr./Mrs. <strong>{{ auth()->user()->name }}</strong></p>
        </div>
        </div>
      </div>
    </div>
  </div>
</div>


@endsection