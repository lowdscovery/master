<nav class="main-header navbar navbar-expand navbar-white navbar-light">

   <ul class="navbar-nav">
    <li class="nav-item">
    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>
    </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">


      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
           @if ($notificationCount > 0)
          <span class="badge badge-warning navbar-badge">{{ $notificationCount }}</span>
           @endif
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        
          <span class="dropdown-header"> </span>
       
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            
             
             @if (count($notifications) > 0)
             @foreach ($notifications as $notification)
      <a class="ml-3" href="#" style="color:grey;"><i class="fas fa-envelope mr-1" style="color:purple;"></i>{{ $notification }}
               @endforeach
            <span class="text-muted text-sm"></span>
            @else
             <span class="text-muted text-sm">Aucune notification pour le moment.</span>
           @endif
            </a><br>
              

          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-user"></i>
        </a>
      </li>
    </ul>
  </nav>

