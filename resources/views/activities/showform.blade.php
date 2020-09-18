@extends('layouts.index')

@section('title','PRINTG')

@section('content')
<h2 style="padding-top:10px;">Registrasi Penggunaan Alat</h2>
<p> Silakan klik tombol <strong>Registrasi</strong> untuk melakukan registrasi penggunaan alat.</p>
<div class="row">
  <div class="col-lg-6">
    <!-- <div class="card" > -->
      <!-- <div class="card-body"> -->
        <table id="table" class="table table-striped table-hover table-bordered text-sm" style="width:100%"></table>
      <!-- </div> -->
    <!-- </div> -->
<!--   </div>
  <div class="col-lg-8">
    <div class="card" >
      <div class="card-body text-sm">
        <div id='calendar'></div></br>
      </div>
    </div> -->
  </div>
</div>
@endsection

@push('scripts')
<script>
  $('#table').DataTable({
    responsive: true,
    serverSide: true,
    searching: false,
    paging: false,
    info: false,
    ajax: "{{ route('activities.dataform') }}",
    columns: [
      {title: 'Nama', data: 'name', name: 'name', orderable:false, width: '75%', className: 'dt-head-center'},
      {title: 'Action', data: 'register', name: 'register', orderable:false, width: '25%', className: 'dt-center'}
    ],
  });
</script>
@endpush