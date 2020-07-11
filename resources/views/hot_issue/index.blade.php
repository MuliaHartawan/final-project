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
              <a href='/pertanyaan/create' class="btn btn-md btn-primary"><i class="fa fa-plus"></i> Pertanyaan</a>
              <Br>
              <Br>
              <!-- Illustrations -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary"><i class='fas fa-fire'></i> Hot Issue</h6>
                </div>
                <div class="card-body">
                   
                     @if (count($pertanyaanHot) > 0)
                        @foreach ($pertanyaanHot as $pertanyaan)
                          <div class="row">
                              <div class="col-md-2">
                                <div class="row justify-content-md-center">
                                <a href='#' class="btn btn-default">{{ number_format($pertanyaan->sum_vote) }}<br>votes</a>
                                </div>
                                <div class="row justify-content-md-center">
                                  <a href='#' class="btn btn-success">{{ $pertanyaan->jawaban_count }}<br>answer</a>
                                </div>
                              </div>
                              <div class="col-md-10">
                              <div class="row">
                              <p><a href='/jawaban/{{ $pertanyaan->id }}'>{{ $pertanyaan->judul }}</a><p>
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
                                  <div class="col-md-12 text-right"><small>Tanya : {{ $pertanyaan->created_at }}<br>Post by : <a href='#'>{{ $pertanyaan->user->name }}</a></small></div>
                                </div>
                                
        
                              </div>
                            </div>
       
                          <hr>
                        @endforeach
                     @else
                        </p> Belum ada Pertanyaan</p>
                     @endif

                   
                   


                </div>
              </div>

              

            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

@endsection