<!DOCTYPE html>

<html lang="en" style="height: auto;"><head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token()}}">
<title>Jirama</title>


 <link rel="stylesheet" href="{{mix("css/app.css")}}" />
 @livewireStyles


</head>

<body class="hold-transition lockscreen bg-black" style="padding:150px;">

<div class="lockscreen-wrapper">

<div class="lockscreen-name">{{$user->nom}} {{$user->prenom}}</div>

<div class="lockscreen-item">

<div class="lockscreen-image">
@if ($user->photo !=null)
 <img src="{{asset($user->photo)}}" alt="User Image">
@else
 <img src="{{asset("image/user.png")}}" alt="User Image">
@endif

</div>


<form class="lockscreen-credentials" action="" method="POST">
@csrf
<div class="input-group">
<input type="password" class="form-control" name="password" placeholder="password">
<div class="input-group-append">
<button type="button" class="btn">
<i class="fas fa-arrow-right text-muted"></i>
</button>
</div>
</div>
</form>

</div>

<div class="help-block text-center">
Entrer votre mot de passe pour récupérer votre session
</div>
</div>

<script src="{{mix("js/app.js")}}"></script>
</body></html>