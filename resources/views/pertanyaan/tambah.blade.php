@extends('layout/master')

@section('title', 'Dashboard')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->

  <!-- Content Row -->



  <!-- Content Row -->
  <div class="row">

    <div class="col-lg-12 mb-4">

      <!-- Illustrations -->
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary"><i class='fas fa-fire'></i> New Issue</h6>
        </div>
        <div class="card-body">
          <div class="row">
            <form action="{{url('/pertanyaan/')}}" method="post" class="col-lg-12">
              {{ csrf_field() }}

              <div class="form-group">
                <label for="Judul">Judul : </label>
                <input type="text" name="judul" id="judul" class="form-control @error('judul') is-invalid @enderror" placeholder="Judul Pertanyaan">

                @error('judul')
                        <div class="text-danger">{{ $message }}</div>
                @enderror
              </div>

              <div class="form-group">
                <label for="Isi">Pertanyaan : </label>
                <textarea name="isi_tanya" id="isi_nanya" class="form-control @error('isi_tanya') is-invalid @enderror" placeholder="Isi Pertanyaan">
                </textarea>

               @error('isi_tanya')
                        <div class="text-danger">{{ $message }}</div>
              @enderror
              </div>

              <div class="form-group">
                <label for="Tags">Tags : </label>
                <input type="text" name="tags" id="tags" class="form-control" placeholder="Isi Tags">
              </div>

              
                <button type="submit" class="btn btn-success">Simpan</button>
            </form>
          </div>
        </div>
      </div>



    </div>
  </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

@endsection

  @push('ckEditor')
  <script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
  <script>
      CKEDITOR.replace( 'isi_tanya' );
  </script>
  @endpush