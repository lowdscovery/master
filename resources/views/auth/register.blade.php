@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card" style="transform: translateY(100px);">
                <div class="card-body">
                <div style="text-align:center; font-size:2em;transform: translateY(-10px);">{{ __('Registre') }}</div>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="input-group mb-3">
                                <input id="nom" type="text" class="form-control @error('nom') is-invalid @enderror" name="nom" placeholder="Nom" value="{{ old('nom') }}" required autocomplete="nom" autofocus
                                title="Le nom doit être en majuscule" pattern="[A-Z]+">
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
                                <input id="prenom" type="text" class="form-control @error('prenom') is-invalid @enderror" name="prenom" placeholder="Prenom" value="{{ old('prenom') }}" required autocomplete="prenom" autofocus
                                title="Saisir votre prenom">
                                <div class="input-group-append">
                               <div class="input-group-text">
                             <span class="fa fa-user-circle"></span>
                           </div>
                         </div>   
                                @error('prenom')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror                          
                        </div>

                         <div class="input-group mb-3">
                                <input id="telephone1" type="text" class="form-control @error('telephone1') is-invalid @enderror" name="telephone1" placeholder="Telephone" value="{{ old('telephone1') }}" required autocomplete="prtelephone1" autofocus
                                title="Le numero de telephone doit être en 10 chiffre" pattern="\d{10}">
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
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Email" value="{{ old('email') }}" required autocomplete="email"
                    title="Saisir votre email">
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
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password" required autocomplete="new-password"
                    title="Saisir votre mot de passe">
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
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm-password" required autocomplete="new-password"
                                title="Resaisir votre mot de passe">
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
                         <label> </label>
                        <div>
                          <p style="text-align:center;"> Avez-vous déjà un compte?<a class="nav-link" href="{{ route('login') }}" style="font-size:1.2em">{{ __('Login') }}</a> </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
