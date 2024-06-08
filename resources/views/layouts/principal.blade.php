
<?php
  if(Auth::check())
  {
    if(Auth::user()->screen_lock == 1)
    {
         echo '<script>window.location="'.url('/lockscreen').'";</script>';
    }
  }
?>

<!DOCTYPE html>

<html lang="en" style="height: auto;"><head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token()}}">
<title>Jirama</title>


 <link rel="stylesheet" href="{{mix("css/app.css")}}" />
 @livewireStyles


</head>
<body class="sidebar-mini" style="height: auto;">
<div class="wrapper">

<!-- Les topnav sont dans le dossier components -->
<x-topnav />

<aside class="main-sidebar sidebar-dark-primary elevation-4">

<a href="#" class="brand-link">
<img src="{{asset("image/jiro.jpg")}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: 1;">
<span class="brand-text font-weight-bold" style="font-size: 1.3em;font-family: montserrat;"><b>JIRAMA</b></span>
</a>

<div class="sidebar">

<div class="user-panel mt-3 pb-3 mb-3 d-flex">
<div class="rounded-circle" >
 @if (auth()->user()->photo !="" || auth()->user()->photo !=null)
   <img src="{{asset(auth()->user()->photo)}}" class="rounded-circle" width="100" style="height:40px;">
   @else
   <img class="rounded-circle" width="40" height="40" src="{{asset('image/user.png')}}">
   @endif
</div>
<div class="info">
<a href="#" class="d-block ellipsis"  style="font-family: montserrat;">{{ userfullName()}}</a>
</div>
</div>

<!-- Les menus sont dans le dossier components -->
<x-menu />

</div>

</aside>

<div class="content-wrapper" style="min-height: 244.8px;">

<div class="content">
<div class="container-fluid">
   @yield("contenu")
</div>
</div>

</div>
<!-- Les sidebar sont dans le dossier components -->
<x-sidebar/>

<footer class="main-footer">

<div class="float-right d-none d-sm-inline">
Anything you want
</div>

<strong>Copyright © 2024 <a href="https://Jirama">Jirama</a>.</strong> All rights reserved.
</footer>
<div id="sidebar-overlay"></div></div>

<script src="plugins/jquery/jquery.min.js"></script>
<script src="{{mix("js/app.js")}}"></script>
@livewireScripts
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="{{asset("js/chart.js")}}"></script>

</body></html>