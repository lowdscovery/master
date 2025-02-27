<nav class="main-header navbar navbar-expand navbar-white navbar-light" wire:poll.6s>

   <!-- Right navbar links -->
   <ul class="navbar-nav ml-auto">
   
      <!-- Notifications Dropdown -->
      @can("employe")
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="false">
          <i class="far fa-bell"></i> <!-- Changement d'icône -->
          @if ($notificationCount > 0)
            <span class="badge badge-warning navbar-badge">{{ $notificationCount }}</span>
          @endif
        </a>
        <div id="notificationDropdown" class="dropdown-menu dropdown-menu-lg dropdown-menu-right" style="left: inherit; right: 0px;">
          @if ($notificationCount > 0)
            <span class="dropdown-item dropdown-header">{{ $notificationCount }} Notifications</span>
            <div class="dropdown-divider"></div>
            @foreach ($notifications as $notification)
              <a href="{{route('maintenance.maintenance')}}" class="dropdown-item" wire:click="markAsRead({{ $notification->id }})">
                <i class="fas fa-users mr-2"></i> {{ $notification->intervenant_id }}
                <span class="float-right text-muted text-sm">{{ $notification->created_at->diffForHumans() }}</span>
              </a>
            @endforeach
          @else
            <span class="dropdown-item dropdown-header">0 Notifications</span>
          @endif
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">Toutes les notifications</a>
        </div>
      </li>
      @endcan

      <!-- Fullscreen Button -->
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>

      <!-- User Profile Button -->
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-user"></i>
        </a>
      </li>
   </ul>
</nav>

<!-- JavaScript pour fermer la dropdown après 8 secondes -->
<script>
document.addEventListener('DOMContentLoaded', function() {
  const dropdownMenu = document.getElementById('notificationDropdown');

  // Ajoute un délai de 8 secondes après l'ouverture
  document.querySelectorAll('.nav-item.dropdown .nav-link').forEach((dropdownToggle) => {
    dropdownToggle.addEventListener('click', () => {
      setTimeout(() => {
        if (dropdownMenu.classList.contains('show')) {
          dropdownMenu.classList.remove('show');
        }
      }, 8000); // 8 secondes
    });
  });
});
</script>
