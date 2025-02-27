<!DOCTYPE html>
<html lang="en" style="height: auto;">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Jirama</title>

    <link rel="stylesheet" href="{{ mix('css/app.css') }}" />
    @livewireStyles
    <style>
        body {
            background: linear-gradient(135deg, #0f2027, #2c5364);
            font-family: 'Lora', serif;
            color: #ffffff;
        }

        .lockscreen-wrapper {
            border-radius: 20px;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            padding: 40px;
            max-width: 500px;
            margin: auto;
            box-shadow: 0 0 40px rgba(255, 255, 255, 0.2);
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .lockscreen-name {
            font-size: 24px;
            font-weight: 700;
            text-align: center;
            color: #e0e0e0;
            margin-bottom: 20px;
        }

        .lockscreen-item {
            display: flex;
            align-items: center; /* Aligne l'image et le champ côte à côte */
            justify-content: center;
        }

        .lockscreen-image {
            margin-right: 20px; /* Espace entre l'image et le champ de mot de passe */
        }

        .lockscreen-image img {
            border-radius: 50%;
            width: 100px;
            height: 100px;
            border: 1px solid rgba(255, 255, 255, 0.3);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }

        .lockscreen-credentials {
            flex-grow: 1; /* Le champ de mot de passe occupe le reste de l'espace */
        }

        .input-group {
            width: 100%;
            display: flex;
        }

        .lockscreen-credentials .form-control {
            background-color: rgba(255, 255, 255, 0.1);
            border: none;
            /* color: #ffffff; */
            padding: 12px 20px;
            border-radius: 30px;
            box-shadow: inset 0 0 10px rgba(255, 255, 255, 0.1);
            font-size: 16px;
            flex: 1;
        }

        .lockscreen-credentials .btn {
            background-color: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            padding: 10px;
            color: #ffffff;
            margin-left: 10px;
        }

        .help-block {
            font-size: 14px;
            color: #d0d0d0;
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>

<body class="hold-transition lockscreen" style="padding: 150px;">

    <div class="lockscreen-wrapper">
        <!-- Nom de l'utilisateur -->
        <div class="lockscreen-name">{{$user->nom}} {{$user->prenom}}</div>

        <!-- Image utilisateur à côté du champ de mot de passe -->
        <div class="lockscreen-item">
            <!-- Image de l'utilisateur -->
            <div class="lockscreen-image">
                @if ($user->photo !=null)
                    <img src="{{asset($user->photo)}}" alt="User Image">
                @else
                    <img src="{{asset('image/user.png')}}" alt="User Image">
                @endif
            </div>

            <!-- Champ de mot de passe -->
            <form class="lockscreen-credentials" action="" method="POST">
                @csrf
                <div class="input-group">
                    <input type="password" class="form-control" name="password" placeholder="      Enter password">
                    <div class="input-group-append">
                        <button type="button" class="btn">
                            <i class="fas fa-arrow-right text-muted"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>

        <!-- Texte explicatif sous le champ de mot de passe -->
        <div class="help-block text-center">
            Enter your password to resume your session
        </div>
    </div>

    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
