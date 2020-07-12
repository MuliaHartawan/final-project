@extends('layout/master')
@push('script-head')
<!-- Custom styles for this page -->
<link href="{{ asset('admin/vendor/datatables/dataTables.bootstrap4.min.css') }} " rel="stylesheet"> 
@endpush

@section('title', 'Pertanyaan-ku')

@section('content')

<div class="container-fluid">
    <div class="row">
      <div class="col-lg-12 mb-4">
          <a href='/pertanyaan/create' class="btn btn-md btn-primary"><i class="fa fa-plus"></i> Pertanyaan</a>
          <Br>
          <Br>
          <div class="card shadow mb-4">
              <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary"><i class='fas fa-question-circle'></i> Pertanyaan-ku</h6>
              </div>
              <div class="card-body">
                  <div class="table-responsive">
                      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                          <thead>
                              <tr>
                                <th>Judul</th>
                                <th>Isi</th>
                                <th>Vote</th>
                                <th>Dijawab</th>
                                <th width='10%'>Aksi</th>
                              </tr>
                            </thead>
                            <tbody>
                              @if(count($pertanyaan) > 0)
                                @foreach($pertanyaan as $p)
                                <tr>
                                  <td>{{ $p->judul }}</td>
                                  <td>{{ $p->isi }}</td>
                                  <td width='5%' class="text-center">{{ number_format($p->sum_vote) }}</td>
                                  <td width='5%' class="text-center"><a href="/jawaban/{{ $p->slug }}" class="btn btn-sm btn-success" data-toggle="tooltip" title="Klik untuk melihat Jawaban">{{ $p->jawaban_count }}</a></td>
                                  <td width='10%' class="text-center">
                                    <a href="/pertanyaan/edit/{{ $p->id }}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                                    <a href="/pertanyaan/hapus/{{ $p->id }}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                  </td>
                                </tr>
                                @endforeach
                              @else
                              <tr><td colspan="4">Anda belum mengajukan pertanyaan</td></tr>
                              @endif
                               
                            </tbody>

                      </table>
                  </div>
              </div>
          </div>
      </div>
    </div>
</div>

@endsection
@push('scripts')
  <!-- Page level plugins -->
  <script src="{{ asset('admin/vendor/datatables/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('admin/vendor/datatables/dataTables.bootstrap4.min.js') }} "></script>
  <script>
      $('#dataTable').DataTable( {
          responsive: true
      } );
  </script>
  @endpush

