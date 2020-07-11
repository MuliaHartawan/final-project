@extends('layout/master')

@section('title', 'Dashboard')

@section('content')
<table class="table table-bordered table-hover table-striped">
  <thead>
    <tr>
      <th>Judul</th>
      <th>Isi</th>
      <th>Opsi</th>
    </tr>
  </thead>
  <tbody>
    @foreach($pertanyaan as $p)
    <tr>
      <td>{{ $p->judul }}</td>
      <td>{{ $p->isi }}</td>
      <td>
        <a href="/pertanyaan/edit/{{ $p->id }}" class="btn btn-warning">Edit</a>
        <a href="/pertanyaan/hapus/{{ $p->id }}" class="btn btn-danger">Hapus</a>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection