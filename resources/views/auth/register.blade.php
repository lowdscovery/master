@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card bg-dark" style="transform: translateY(100px);">
                <div class="card-header" style="text-align:center; font-size:2em">{{ __('Registre') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="input-group mb-3">
                                <input id="nom" type="text" class="form-control @error('nom') is-invalid @enderror" name="nom" placeholder="Nom" value="{{ old('nom') }}" required autocomplete="nom" autofocus>
                                <div class="input-group-append">
                               <div class="input-group-text">
                             <span class="fas fa-user"></span>
                           </div>
                         </div>   
                                @error('nom')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror                          
                        </div>

                        <div class="input-group mb-3">
                                <input id="prenom" type="text" class="form-control @error('prenom') is-invalid @enderror" name="prenom" placeholder="Prenom" value="{{ old('prenom') }}" required autocomplete="prenom" autofocus>
                                <div class="input-group-append">
                               <div class="input-group-text">
                             <span class="fas fa-user"></span>
                           </div>
                         </div>   
                                @error('prenom')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror                          
                        </div>

                         <div class="input-group mb-3">
                                <input id="telephone1" type="text" class="form-control @error('telephone1') is-invalid @enderror" name="telephone1" placeholder="Telephone" value="{{ old('telephone1') }}" required autocomplete="prtelephone1" autofocus>
                                <div class="input-group-append">
                               <div class="input-group-text">
                             <span class="fas fa-phone"></span>
                           </div>
                         </div>   
                                @error('telephone1')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror                          
                        </div>

                        
                    <div class="input-group mb-3">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Email" value="{{ old('email') }}" required autocomplete="email">
                      <div class="input-group-append">
                         <div class="input-group-text">
                             <span class="fas fa-envelope"></span>
                           </div>
                           </div>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            
                        </div>

                        
                <div class="input-group mb-3">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password" required autocomplete="new-password">
                      <div class="input-group-append">
                         <div class="input-group-text">
                             <span class="fas fa-lock"></span>
                            </div>
                           </div>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        
                            <div class="input-group mb-3">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm-password" required autocomplete="new-password">
                            <div class="input-group-append">
                         <div class="input-group-text">
                             <span class="fas fa-lock"></span>
                            </div>
                           </div>
                        </div>

                        <div class="row ">
                            <div class="col">
                                <button type="submit" class="btn btn-primary btn-block">
                                    {{ __('Register') }}
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
