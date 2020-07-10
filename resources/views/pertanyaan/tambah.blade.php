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
            <form action="" class="col-lg-12">
              {{ csrf_field() }}

              <div class="form-group">
                <label for="Judul">Judul : </label>
                <input type="text" name="judul" class="form-control" placeholder="Judul Pertanyaan .. ">

                @if ($errors->has('judul'))
                <div class="text-danger">
                  {{ $errors->first('judul') }}
                </div>
                @endif
              </div>

              <div class="form-group">
                <label for="Isi">Pertanyaan : </label>
                <textarea name="isi_tanya" class="form-control" placeholder="Isi Pertanyaan .. ">
                </textarea>

                @if ($errors->has('isi_tanya'))
                <div class="text-danger">
                  {{ $errors->first('isi_tanya') }}
                </div>
                @endif
              </div>

              <div class="form-group">
                <label for="Tags">Tags : </label>
                <input type="text" name="tags" class="form-control" placeholder="Isi Tags .. ">
              </div>

              <div class="form-group">
                <input type="submit" class="btn btn-success" value="Simpan">
              </div>
            </form>
          </div>

          <hr>

        </div>
      </div>



    </div>
  </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

@endsection