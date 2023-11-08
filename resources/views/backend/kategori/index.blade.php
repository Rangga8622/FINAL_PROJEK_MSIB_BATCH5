@extends('backend.index')
@section('content')
@php
$ar_judul=['No', 'Nama', 'Action'];
$no = 1;
@endphp

<div class="content-wrapper">
  <div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Tabel Kategori</h4>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  @foreach($ar_judul as $jdl)
                    <th>{{$jdl}}</th>
                  @endforeach
                </tr>
              </thead>
              <tfoot>
                <tr>
                  @foreach($ar_judul as $jdl)
                  <th>{{$jdl}}</th>
                  @endforeach
                </tr>
              </tfoot>
              <tbody>
                @foreach($ar_kategori as $k)
                <tr>
                  <td>{{$no++}}</td>
                  <td>{{ $k->nama }}</td>
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

@endsection