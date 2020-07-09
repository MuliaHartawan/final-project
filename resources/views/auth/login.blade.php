@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
             <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                  </div>
                  <form class="user" method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group">
                      <input type="email" class="form-control form-control-user @error('email') is-invalid @enderror"
                        id="email" aria-describedby="emailHelp" name="email" value="{{ old('email') }}" required
                        autocomplete="email" autofocus placeholder="Enter Email Address...">

                      @error('email')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                    <div class="form-group">
                      <input type="password"
                        class="form-control form-control-user @error('password') is-invalid @enderror" id="password"
                        placeholder="Password" name="password" required autocomplete="current-password">

                      @error('password')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                    <div class="form-group">
                      <div class="custom-control custom-checkbox small">
                        <input type="checkbox" class="custom-control-input" id="remember" name="remember"
                          {{ old('remember') ? 'checked' : '' }}>
                        <label class="custom-control-label" for="customCheck">Remember Me</label>
                      </div>
                    </div>
                    <button class="btn btn-primary btn-user btn-block" type="submit">
                      {{ __('Login') }}
                    </button>
                    <hr>
                    <div class="text-center">
                      @if (Route::has('password.request'))
                      <a class="btn btn-link small" href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                      </a>
                      @endif
                    </div>
                    <div class="text-center">
                      <a class="small" href="{{ route('register') }}">Create an Account!</a>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        </div>
    </div>
</div>
@endsection
