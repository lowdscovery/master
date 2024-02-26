<!DOCTYPE html>

<html lang="en" style="height: auto;"><head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
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