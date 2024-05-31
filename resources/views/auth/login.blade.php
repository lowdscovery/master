@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4" style="transform: translateY(50px);">
             <div class="image" style="text-align:center;">
                   <img src="image/jiro.jpg"  width="90" height="90" style="border-radius: 50%;">
             </div>
            <div class="card" style="transform: translateY(10px);">
                <div class="card-body">
                 <div style="text-align:center; font-size:2em">{{ __('Login') }}</div>
                 <p style="text-align:center;font-family: montserrat;"> Accéder à notre tableau de bord </p>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <label>Adresse mail</label>
                        <div class="input-group mb-3">
    <input id="email" type="email" placeholder="Email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus
    title="Saisir votre email">
                         <div class="input-group-append">
                            <div class="input-group-text">
                             <span class="fas fa-envelope"></span>
                         </div>
                        </div>                         
                        </div>
                         
                        <label>Mot de passe</label>
                        <div class="input-group mb-3">
                                <input id="password" type="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password"
    title="Saisir votre mot de passe">
                                <div class="input-group-append">
                                <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                                </div>
                            </div>
                            </div>
                             <div class="pb-3"> 
                              <input type="checkbox" id="togglePassword"> <label> Afficher le mot de passe </label>
                                <script>
                                    const passwordInput = document.getElementById('password');
                                    const togglePassword = document.getElementById('togglePassword');

                                    togglePassword.addEventListener('change', function () {
                                        if (this.checked) {
                                            passwordInput.type = 'text';
                                        } else {
                                            passwordInput.type = 'password';
                                        }
                                    });
                                </script>
                             </div>
                            
                        <div class="row">
                            <div class="col">
                                <button type="submit" class="btn btn-primary btn-block">
                                    {{ __('Seconnecter') }}
                                </button>
                            </div>
                        </div>
                        <label> </label>
                        <div>
                          <p style="text-align:center;"> Avez-vous déjà un compte?<a class="nav-link" href="{{ route('register') }}" style="font-size:1.2em">{{ __('Registre') }}</a> </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
