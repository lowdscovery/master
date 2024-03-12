<!DOCTYPE html>

<html lang="en" style="height: auto;"><head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Jirama</title>

 <link rel="stylesheet" href="{{mix("css/app.css")}}" />
 
 @livewireStyles


<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
 <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</head>
<body class="sidebar-mini" style="height: auto;">
<div class="wrapper">

<!-- Les topnav sont dans le dossier components -->
<x-topnav />

<aside class="main-sidebar sidebar-dark-primary elevation-4">

<a href="#" class="brand-link">
<span class="brand-text font-weight-bold" style="font-size: 1.3em"><b>JIRAMA</b></span>
</a>

<div class="sidebar">

<div class="user-panel mt-3 pb-3 mb-3 d-flex">
<div class="image">
<img src="{{asset("image/user2-160x160.jpg")}}" class="img-circle elevation-2" alt="User Image">
</div>
<div class="info">
<a href="#" class="d-block">{{ userfullName()}}</a>
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


<script src="{{mix("js/app.js")}}"></script>
@livewireScripts


</body></html>