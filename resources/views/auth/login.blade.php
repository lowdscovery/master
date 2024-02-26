@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="transform: translateY(100px);">
                <div class="card-header bg-dark" style="text-align:center;">{{ __('Login') }}</div>

                <div class="card-body bg-dark">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="input-group mb-3">
    <input id="email" type="email" placeholder="Email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                         <div class="input-group-append">
                            <div class="input-group-text">
                             <span class="fas fa-envelope"></span>
                         </div>
                        </div>                         
                        </div>
                         

                        <div class="input-group mb-3">
                                <input id="password" type="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                <div class="input-group-append">
                                <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                                </div>
                            </div>
                            </div>
                    

                        <div class="row">
                            <div class="col">
                                <button type="submit" class="btn btn-primary btn-block">
                                    {{ __('Seconnecter') }}
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
