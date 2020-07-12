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
                         @if($session_user_id != $pertanyaan->user_id)
                          <div class="row justify-content-md-center">
                          <a href='/pertanyaanvoteup/{{ $pertanyaan->id }}' class="btn btn-primary btn-sm" style="width: 78px !important;"><i class="fa fa-caret-up"></i></a>
                          </div>
                          @endif
                       </div>
                       <div class="row justify-content-md-center">
                         <a href='#' class="btn btn-default">{{ number_format($pertanyaan->sum_vote) }}<br>votes</a>
                       </div>
                       <div class="row justify-content-md-center">
                          @if($session_user_id != $pertanyaan->user_id)
                          <div class="row justify-content-md-center">
                              <a href='/pertanyaanvotedown/{{ $pertanyaan->id }}' class="btn btn-danger btn-sm " style="width: 78px !important;"><i class="fa fa-caret-down"></i></a>
                          </div>
                          @endif
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
                       <div class="col-md-12 text-right"><small>Tanya : {{ $pertanyaan->created_at }}<br>Post by : <a href='#'>{{ $pertanyaan->user->name }} ( {{ number_format($pertanyaan->user->sum_reputation) }} )</a></small><br><a href="/komentarpertanyaan/{{ $pertanyaan->id }}" class="btn btn-sm btn-warning"><i class="fa fa-comment"></i> Tulis Komentar</a></div>
                       </div>
                       <hr>
                       @if(count($pertanyaan->komentarpertanyaan) > 0)
                        <ul>
                          @foreach($pertanyaan->komentarpertanyaan as $komentar)
                            <li><p><small>{!! $komentar->komentar !!}<br><b>Oleh : </b> <a href='#'>{{ $komentar->user->name}} ( {{ number_format($komentar->user->sum_reputation) }} )</a> | {{ $komentar->created_at}}</small></p></li>
                          @endforeach
                        </ul>
                       @else 
                       <p>Tidak ada Komentar</p>
                       @endif
                      
                      <a href='/jawaban/tambah/{{ $pertanyaan->slug }}' class="btn btn-primary btn-md"><i class='fa fa-edit'></i> Tulis Jawaban</a>
                        
                    </div>
                   </div>

                </div>
              </div>

              <a href='#' class="btn btn-success btn-md">Terdapat {{ $pertanyaan->jawaban_count }} Jawaban</a>
              <br>
              <br>

              @if($hasil_jawaban_ok)
                 <!-- Jawaban Membantu -->
                  <div class="card shadow mb-4">
                      <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-success"><i class='fas fa-check'></i> Jawaban Membantu</h6>
                      </div>
                      <div class="card-body">
                        <div class="row">
                          <div class="col-md-2">
                            @if($session_user_id != $hasil_jawaban_ok->user_id)
                            <div class="row justify-content-md-center">
                                <a href='/jawabanvoteup/{{ $hasil_jawaban_ok->id }}' class="btn btn-primary btn-sm" style="width: 78px !important;"><i class="fa fa-caret-up"></i></a>
                            </div>
                            @endif
                            <div class="row justify-content-md-center">
                            <a href='#' class="btn btn-default">{{ number_format($hasil_jawaban_ok->sum_vote) }}<br>votes</a>
                            </div>
                            @if($session_user_id != $hasil_jawaban_ok->user_id)
                            <div class="row justify-content-md-center">
                                <a href='/jawabanvotedown/{{ $hasil_jawaban_ok->id }}' class="btn btn-danger btn-sm " style="width: 78px !important;"><i class="fa fa-caret-down"></i></a>
                            </div>
                            @endif
                          </div>
                          <div class="col-md-10">
                            <div class="row">
                              <p>{!! $hasil_jawaban_ok->jawaban !!}</p>                       
                            </div>
                            <div class="row"> 
                            <div class="col-md-12 text-right"><small>Dijawab : {{ $hasil_jawaban_ok->created_at }}<br>Oleh : <a href='#'>{{ $hasil_jawaban_ok->user->name }} ( {{ number_format($hasil_jawaban_ok->user->sum_reputation) }} )</a></small><br><a href="/komentarjawaban/{{ $hasil_jawaban_ok->id }}" class="btn btn-sm btn-warning"><i class="fa fa-comment"></i> Tulis Komentar</a></div>
                            </div>
                            <hr>
                            @if($hasil_jawaban_ok->komentarjawaban)
                              <ul>
                                @foreach($hasil_jawaban_ok->komentarjawaban as $komentarj)
                                  <li><p><small>{{ $komentarj->komentar }}<br><b>Oleh : </b> <a href='#'>{{ $komentarj->user->name}} ( {{ number_format($komentarj->user->sum_reputation) }} )</a> | {{ $komentarj->created_at}}</small></p></li>
                                @endforeach
                              </ul>
                            @else 
                            <p>Tidak ada Komentar</p>
                            @endif
                            
      
                          </div>
                        </div>
      
                      </div>
                    </div>
              @endif
              
              @if($hasil_jawaban_lainnya_arr)
                  @foreach($hasil_jawaban_lainnya_arr as $hasil_jawaban_lainnya)
                  <!-- Jawaban selain Membantu -->
                  <div class="card shadow mb-4">
                      <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary"><i class='fas fa-comment-alt'></i> Jawaban Lainnya</h6>
                      </div>
                      <div class="card-body">
                        <div class="row">
                          <div class="col-md-2">
                            @if($session_user_id != $hasil_jawaban_lainnya->user_id)
                            <div class="row justify-content-md-center">
                                <a href='/jawabanvoteup/{{ $hasil_jawaban_lainnya->id }}' class="btn btn-primary btn-sm" style="width: 78px !important;"><i class="fa fa-caret-up"></i></a>
                            </div>
                            @endif
                            <div class="row justify-content-md-center">
                            <a href='#' class="btn btn-default">{{ number_format($hasil_jawaban_lainnya->sum_vote )}}<br>votes</a>
                            </div>
                            @if($session_user_id != $hasil_jawaban_lainnya->user_id)
                            <div class="row justify-content-md-center">
                                <a href='/jawabanvotedown/{{ $hasil_jawaban_lainnya->id }}' class="btn btn-danger btn-sm " style="width: 78px !important;"><i class="fa fa-caret-down"></i></a>
                            </div>
                            @endif
                          </div>
                          <div class="col-md-10">
                            <div class="row">
                            <p>{!! $hasil_jawaban_lainnya->jawaban !!}</p>                       
                            </div>
                            <div class="row"> 
                            <div class="col-md-12 text-right"><small>Dijawab : {{ $hasil_jawaban_lainnya->created_at }}<br>Oleh : <a href='#'>{{ $hasil_jawaban_lainnya->user->name }} ( {{ number_format($hasil_jawaban_lainnya->user->sum_reputation) }} )</a></small><br><a href="/komentarpertanyaan/{{ $pertanyaan->id }}" class="btn btn-sm btn-warning"><i class="fa fa-comment"></i> Tulis Komentar</a></div>
                            </div>
                            <hr>
                            @if($hasil_jawaban_lainnya->komentarjawaban_lainnya)
                              <ul>
                                @foreach($hasil_jawaban_lainnya->komentarjawaban_lainnya as $komentar_lain)
                                  <li><p><small>{{ $komentar_lain->komentar }}<br><b>Oleh : </b> <a href='#'>{{ $komentar_lain->user->name}} ( {{ number_format($komentar_lain->user->sum_reputation) }} )</a> | {{ $komentar_lain->created_at}}</small></p></li>
                                @endforeach
                              </ul>
                            @else 
                            <p>Tidak ada Komentar</p>
                            @endif
      
                          </div>
                        </div>
      
                      </div>
                  </div>
                  @endforeach
                    
              @else
                <p>Tidak ada Jawaban</p>
              @endif
              

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