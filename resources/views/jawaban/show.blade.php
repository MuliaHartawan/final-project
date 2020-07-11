@extends('layout/master')

@section('title', 'Lihat Pertanyaan')

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
                  <h6 class="m-0 font-weight-bold text-primary"><i class='fas fa-fire'></i> Pertanyaan</h6>
                </div>
                <div class="card-body">
                   <div class="row">
                     <div class="col-md-2">
                       <div class="row justify-content-md-center">
                          <a href='#' class="btn btn-primary btn-sm" style="width: 78px !important;"><i class="fa fa-caret-up"></i></a>
                       </div>
                       <div class="row justify-content-md-center">
                         <a href='#' class="btn btn-default">{{ number_format($pertanyaan->sum_vote) }}<br>votes</a>
                       </div>
                       <div class="row justify-content-md-center">
                          <a href='#' class="btn btn-danger btn-sm " style="width: 78px !important;"><i class="fa fa-caret-down"></i></a>
                       </div>
                     </div>
                     <div class="col-md-10">
                      <div class="row">
                        <p><a href='#'>{{ $pertanyaan->judul }}</a><p>
                         <p>{{ $pertanyaan->isi }}</p>                       
                       </div>
                       @if($pertanyaan->tags)
                          @php
                          $tags_explode_hot = explode(",", $pertanyaan->tags);
                          @endphp
                          <div class="row">
                          @foreach( $tags_explode_hot as $value)
                            <span class="badge badge-primary">{{ $value }}</span>&nbsp;
                          @endforeach
                          </div>
                        @endif
                       <div class="row"> 
                          <div class="col-md-12 text-right"><small>Tanya : {{ $pertanyaan->created_at }}<br>Post by : <a href='#'>{{ $pertanyaan->user->name }}</a></small><br><a href="#" class="btn btn-sm btn-warning"><i class="fa fa-comment"></i> Tulis Komentar</a></div>
                       </div>
                       <hr>
                       <ul>
                         <li><p><small>Komentar Bla bla bla bla bal bla bla<br>oleh : <a href='#'>People Sanbercode</a> | 2020-06-06 17:00:00</small></p></li>
                         <li><p><small>Komentar Bla bla bla bla bal bla bla<br>oleh : <a href='#'>People Sanbercode</a> | 2020-06-06 17:00:00</small></p></li>
                         <li><p><small>Komentar Bla bla bla bla bal bla bla<br>oleh : <a href='#'>People Sanbercode</a> | 2020-06-06 17:00:00</small></p></li>
                         <li><p><small>Komentar Bla bla bla bla bal bla bla<br>oleh : <a href='#'>People Sanbercode</a> | 2020-06-06 17:00:00</small></p></li>
                       </ul>
                        <a href='/jawaban/create' class="btn btn-primary btn-md"><i class='fa fa-edit'></i> Tulis Jawaban</a>
                     </div>
                   </div>

                </div>
              </div>

              <a href='#' class="btn btn-success btn-md">Terdapat {{ $pertanyaan->jawaban_count }} Jawaban</a>
              <br>
              <br>

               <!-- Illustrations -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-success"><i class='fas fa-check'></i> Jawaban No 1</h6>
                </div>
                <div class="card-body">
                   <div class="row">
                     <div class="col-md-2">
                       <div class="row justify-content-md-center">
                          <a href='#' class="btn btn-primary btn-sm" style="width: 78px !important;"><i class="fa fa-caret-up"></i></a>
                       </div>
                       <div class="row justify-content-md-center">
                         <a href='#' class="btn btn-default">825<br>votes</a>
                       </div>
                       <div class="row justify-content-md-center">
                          <a href='#' class="btn btn-danger btn-sm " style="width: 78px !important;"><i class="fa fa-caret-down"></i></a>
                       </div>
                     </div>
                     <div class="col-md-10">
                      <div class="row">
                         <p>SB Admin 2 makes extensive use of Bootstrap 4 utility classes in order to reduce CSS bloat and poor page performance. Custom CSS classes are used to create custom components and custom utility classes.</p>                       
                       </div>
                       <div class="row"> 
                          <div class="col-md-12 text-right"><small>Dijawab : 2020-06-01 17:00:00<br>Oleh : <a href='#'>People Sanbercode</a></small><br><a href="#" class="btn btn-sm btn-warning"><i class="fa fa-comment"></i> Tulis Komentar</a></div>
                       </div>
                       <hr>
                       <ul>
                         <li><p><small>Komentar Bla bla bla bla bal bla bla<br>oleh : <a href='#'>People Sanbercode</a> | 2020-06-06 17:00:00</small></p></li>
                         <li><p><small>Komentar Bla bla bla bla bal bla bla<br>oleh : <a href='#'>People Sanbercode</a> | 2020-06-06 17:00:00</small></p></li>
                         <li><p><small>Komentar Bla bla bla bla bal bla bla<br>oleh : <a href='#'>People Sanbercode</a> | 2020-06-06 17:00:00</small></p></li>
                         <li><p><small>Komentar Bla bla bla bla bal bla bla<br>oleh : <a href='#'>People Sanbercode</a> | 2020-06-06 17:00:00</small></p></li>
                       </ul>
                       

                     </div>
                   </div>

                </div>
              </div>

              <!-- Illustrations -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary"><i class='fas fa-comment-alt'></i> Jawaban No 2</h6>
                </div>
                <div class="card-body">
                   <div class="row">
                     <div class="col-md-2">
                       <div class="row justify-content-md-center">
                          <a href='#' class="btn btn-primary btn-sm" style="width: 78px !important;"><i class="fa fa-caret-up"></i></a>
                       </div>
                       <div class="row justify-content-md-center">
                         <a href='#' class="btn btn-default">825<br>votes</a>
                       </div>
                       <div class="row justify-content-md-center">
                          <a href='#' class="btn btn-danger btn-sm " style="width: 78px !important;"><i class="fa fa-caret-down"></i></a>
                       </div>
                     </div>
                     <div class="col-md-10">
                      <div class="row">
                         <p>SB Admin 2 makes extensive use of Bootstrap 4 utility classes in order to reduce CSS bloat and poor page performance. Custom CSS classes are used to create custom components and custom utility classes.</p>                       
                       </div>
                       <div class="row"> 
                          <div class="col-md-12 text-right"><small>Dijawab : 2020-06-01 17:00:00<br>Oleh : <a href='#'>People Sanbercode</a></small><br><a href="#" class="btn btn-sm btn-warning"><i class="fa fa-comment"></i> Tulis Komentar</a></div>
                       </div>
                       <hr>
                       <ul>
                         <li><p><small>Komentar Bla bla bla bla bal bla bla<br>oleh : <a href='#'>People Sanbercode</a> | 2020-06-06 17:00:00</small></p></li>
                         <li><p><small>Komentar Bla bla bla bla bal bla bla<br>oleh : <a href='#'>People Sanbercode</a> | 2020-06-06 17:00:00</small></p></li>
                         <li><p><small>Komentar Bla bla bla bla bal bla bla<br>oleh : <a href='#'>People Sanbercode</a> | 2020-06-06 17:00:00</small></p></li>
                         <li><p><small>Komentar Bla bla bla bla bal bla bla<br>oleh : <a href='#'>People Sanbercode</a> | 2020-06-06 17:00:00</small></p></li>
                       </ul>

                     </div>
                   </div>

                </div>
              </div>

              <!-- div class="card shadow mb-4" id='anchor-jawaban'>
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-warning"><i class='fas fa-edit'></i> Tulis Jawaban Anda</h6>
                </div>
                <div class="card-body">
                   
                </div>
              </div -->


              

            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

@endsection