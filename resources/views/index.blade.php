@extends('layout/master')

@section('title', 'Dashboard')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->

  <!-- Content Row -->
  <div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Partisipan</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $total_participant ?? '' }}</div>
            </div>
            <div class="col-auto">
              <i class="fas fa-users fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Pertanyaan</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $total_pertanyaan ?? '' }}</div>
            </div>
            <div class="col-auto">
              <i class="fas fa-question fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-info shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Vote</div>
              <div class="row no-gutters align-items-center">
                <div class="col-auto">
                  <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ $total_vote ?? '' }}</div>
                </div>
              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Pending Requests Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Total Komentar</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $total_komentar ?? '' }}</div>
            </div>
            <div class="col-auto">
              <i class="fas fa-comments fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


  <!-- Content Row -->
  <div class="row">

    <div class="col-lg-6 mb-4">

      <!-- Illustrations -->
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary"><i class='fas fa-fire'></i> Hot Issue</h6>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-2">
              <div class="row">
                <a href='#' class="btn btn-default">{{ number_format($hot_issue->sum_vote) }}<br>votes</a>
              </div>
              <div class="row">
              <a href='#' class="btn btn-success">{{ $hot_issue->jawaban_count }}<br>answer</a>
              </div>
            </div>
            <div class="col-md-10">
              <div class="row">
                <p><a href='/jawaban/{{ $hot_issue->id }}'>{{ $hot_issue->judul }}</a>
                  <p>
                    <p>{{ $hot_issue->isi }}</p>
              </div>
              <div class="row">
                <span class="badge badge-primary">Laravel</span>&nbsp;
                <span class="badge badge-primary">PHP</span>&nbsp;
                <span class="badge badge-primary">Framework</span>&nbsp;
                <span class="badge badge-primary">Artisan</span>
              </div>
              <div class="row">
                <div class="col-md-12 text-right"><small>Tanya : {{ $hot_issue->created_at }}<br>Post by : <a href='#'>{{ $new_issue->user->name}}</a></small></div>
              </div>


            </div>
          </div>

        </div>
      </div>

      <!-- Approach -->
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary"><i class='fas fa-question-circle'></i> New Issue</h6>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-2">
              <div class="row">
              <a href='#' class="btn btn-default">{{ number_format($new_issue->sum_vote) }}<br>votes</a>
              </div>
              <div class="row">
                <a href='#' class="btn btn-success">{{ $new_issue->jawaban_count}}<br>answer</a>
              </div>
            </div>
            <div class="col-md-10">
              <div class="row">
                <p><a href='/jawaban/{{ $new_issue->id }}'>{{ $new_issue->judul}}</a>
                  <p>
                    <p>{{ $new_issue->isi}}</p>
              </div>
              <div class="row">
                <span class="badge badge-primary">Laravel</span>&nbsp;
                <span class="badge badge-primary">PHP</span>&nbsp;
                <span class="badge badge-primary">Framework</span>&nbsp;
                <span class="badge badge-primary">Artisan</span>
              </div>
              <div class="row">
                <div class="col-md-12 text-right"><small>Tanya : {{ $new_issue->created_at}}<br>Post by : <a href='#'>{{ $new_issue->user->name}}</a></small></div>
              </div>

            </div>
          </div>
        </div>
      </div>

    </div>

    <!-- Content Column -->
    <div class="col-lg-6 mb-4">

      <!-- Project Card Example -->
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary"><i class='fas fa-tags'></i> Top Tags</h6>
        </div>
        <div class="card-body">
          <h4 class="small font-weight-bold">Laravel <span class="float-right">20%</span></h4>
          <div class="progress mb-4">
            <div class="progress-bar bg-danger" role="progressbar" style="width: 20%" aria-valuenow="20"
              aria-valuemin="0" aria-valuemax="100"></div>
          </div>
          <h4 class="small font-weight-bold">PHP<span class="float-right">40%</span></h4>
          <div class="progress mb-4">
            <div class="progress-bar bg-warning" role="progressbar" style="width: 40%" aria-valuenow="40"
              aria-valuemin="0" aria-valuemax="100"></div>
          </div>
          <h4 class="small font-weight-bold">Java <span class="float-right">60%</span></h4>
          <div class="progress mb-4">
            <div class="progress-bar" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0"
              aria-valuemax="100"></div>
          </div>
          <h4 class="small font-weight-bold">Express JS<span class="float-right">80%</span></h4>
          <div class="progress mb-4">
            <div class="progress-bar bg-info" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0"
              aria-valuemax="100"></div>
          </div>
          <h4 class="small font-weight-bold">Node JS<span class="float-right">Complete!</span></h4>
          <div class="progress">
            <div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="100"
              aria-valuemin="0" aria-valuemax="100"></div>
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