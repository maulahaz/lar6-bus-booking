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
        <a href="{{ route('tickets.create') }}" class="btn btn-sm btn-primary"><i class="material-icons">create</i> Create Ticket</a>
      </span>

      <div class="card">

        <div class="card-header card-header-primary">
          <h4 class="card-title "><?=$pageTitle; ?></h4>
          <p class="card-category"> Here is a subtitle for this table</p>
        </div>
        <div class="card-body">

          <div class="table-responsive">
            <table id="my_table" class="table">
              <thead class=" text-primary">
                <th>No.</th>
                <th>Ticket</th>
                <th>Type</th>
                <th>Category</th>
                <th>Total</th>
                <th>Price</th>
                <th>Action</th>
              </thead>
              <tbody>
              <?= $sn = 1; ?>  
              @if(count($dtTickets) > 0)
                @foreach($dtTickets as $row)
                <tr>
                  <td><?= $sn++ ?></td>
                  <td class="text-left">{{ $row->name }}</td>
                  <td>{{ $row->type }}</td>
                  <td>{{ $row->category->name }}</td>
                  <td>{{ $row->total_ticket }}</td>
                  <td>{{ $row->price }}</td>
                  <td>
                    <a href="{{ route('tickets.edit', $row->id) }}" class="btn btn-warning btn-sm">Edit</a>

                    <form action="{{ route('tickets.destroy', $row->id) }}" method="POST" style="display:inline-block">
                      @csrf
                      {{ method_field('DELETE') }}
                      <input type="submit" class="btn btn-danger btn-sm" value="Delete"/>
                    </form>
                  </td>
                </tr>
                @endforeach
              @else
                <tr>
                  <td colspan="7">Data not available</td>
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

{{-- @include('tickets.modal_create_ticket') --}}

@endsection

@push('scripts')
  <script>
    // $('#my_table').DataTable();
  </script>
@endpush