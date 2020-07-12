@extends('layout/master')

@push('script-head')
  <script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>    
@endpush

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
          <h6 class="m-0 font-weight-bold text-primary"><i class='fas fa-comment'></i> Berikan Jawaban</h6>
        </div>
        <div class="card-body">
          <div class="row">
            <form action="{{url('/jawaban/')}}" method="post" class="col-lg-12">
              {{ csrf_field() }}
              <div class="form-group">
                    <label for="Judul"><b>Judul : </b></label>
              <p>{{ $pertanyaan->judul }}</p>
              </div>
              <div class="form-group">
                <label for="Pertanyaan"><b>Pertanyaan : </b></label>
                <p>{!! $pertanyaan->isi !!}</p>
              </div>

              <div class="form-group">
                <label for="Isi"><b>Jawaban : </b></label>
                <textarea name="jawaban" id="jawaban" class="form-control @error('jawaban') is-invalid @enderror">
                </textarea>

               @error('jawaban')
                        <div class="text-danger">{{ $message }}</div>
              @enderror
              </div>
              <input type="hidden" name='pertanyaan_id' value="{{ $pertanyaan->id }}" />
                <input type="hidden" name='slug' value="{{ $pertanyaan->slug }}" />
                <button type="submit" class="btn btn-success">Simpan</button>
            <a href='/jawaban/{{ $pertanyaan->slug }} ' class="btn btn-danger">Kembali</a>
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
      CKEDITOR.replace( 'jawaban' );
  </script>
  @endpush