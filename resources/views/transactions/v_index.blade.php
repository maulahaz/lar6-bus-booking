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
        <a href="{{ route('transactions.store') }}" class="btn btn-sm btn-primary"><i class="material-icons">create</i> Create Transaction</a>
      </span>

      <div class="card">

        <div class="card-header card-header-primary">
          <h4 class="card-title "><?=$pageTitle; ?></h4>
          <p class="card-category"> Here is a subtitle for this table</p>
        </div>
        <div class="card-body">
          <form id="frm_create" name="frm_create" action="{{ route('transactions.store') }}" method="POST" class="form-horizontal"> 
          @csrf
          <h3>Form Transaksi</h3>
          <table class="table table-bordered">
              <tr>
                <td>
                  <div class="col-md-12">
                    <input list="tiket" name="nama_tiket" placeholder="masukan nama tiket" class="form-control">
                  </div>
                </td>
              </tr>
              <tr>
                <td>
                  <div class="col-md-12">
                    <input type="text" name="qty" placeholder="QTY" class="form-control">
                  </div>
                </td>
              </tr>
              <tr>
                <td>
                  <button type="submit" name="submit" class="btn btn-success">Simpan</button>
                  <a href="#" class="btn btn-danger">Selesai</a>
                </td>
              </tr>
          </table>
          </form>

          <div class="table-responsive">
            <table id="my_table" class="table">
              <thead class=" text-primary">
                <th>No.</th>
                <th>Ticket Name</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Subtotal</th>
                <th>Action</th>
              </thead>
              <tbody>
              <?= $sn = 1; ?>  
              @if(count($dtTransactions) > 0)
                @foreach($dtTransactions as $row)
                <tr>
                  <td><?= $sn++ ?></td>
                  <td class="text-left">{{ $row->ticket->name }}</td>
                  <td>{{ $row->qty }}</td>
                  <td>{{ $row->price }}</td>
                  <td>121</td>
                  <td>
                    <a href="{{ route('transactions.edit', $row->id) }}" class="btn btn-warning btn-sm">Cancel</a>
                  </td>
                </tr>
                @endforeach
              @else
                <tr>
                  <td colspan="6">Data not available</td>
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

{{-- @include('transactions.modal_create_ticket') --}}

@endsection

@push('scripts')
  <script>
    // $('#my_table').DataTable();
  </script>
@endpush