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
            @if (!empty($dtTickets))

            {{-- <form id="frm_update" name="frm_update" action="{{ url('tickets/update/'.$updateID) }}" method="POST" class="form-horizontal"> --}}
            <form action="{{ route('tickets.update', $dtTickets->id) }}" class="form-horizontal" id="frm_update" name="frm_update" method="POST">
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" id="id" name="id" value="{{ $dtTickets->id }}">

            @else

            <form id="frm_create" name="frm_create" action="{{ route('tickets.store') }}" method="POST" class="form-horizontal">  
                
            @endif

            {{ csrf_field() }}
            <div class="col-md-6">
              <div class="form-group">
                <input type="text" id="ticket_name" name="ticket_name"  class="form-control" value="{{ !empty($dtTickets) ? $dtTickets->name : null }}" placeholder="Ticket Name">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <input type="text" id="type" name="type"  class="form-control" value="{{ !empty($dtTickets) ? $dtTickets->type : null }}" placeholder="Type">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <input type="text" id="category" name="category"  class="form-control" value="{{ !empty($dtTickets) ? $dtTickets->category_id : null }}" placeholder="Ticket Category">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <input type="text" id="total" name="total"  class="form-control" value="{{ !empty($dtTickets) ? $dtTickets->total_ticket : null }}" placeholder="Total Ticket">
              </div>
            </div>
            
            <div class="col-md-6">
              <div class="form-group">
                <input type="text" id="price" name="price"  class="form-control" value="{{ !empty($dtTickets) ? $dtTickets->price : null }}" placeholder="Ticket Price">
              </div>
            </div>
            <div class="modal-footer">
              <a href="{{ url('tickets') }}" class="btn btn-default btn-sm">Back</a>
              <button type="submit" class="btn btn-primary btn-sm" id="btn_save" name="btn_submit" value="Save">Save</button>
            </div>

            </form>
        </div>
      </div>

    </div>
  </div>
</div>

@endsection