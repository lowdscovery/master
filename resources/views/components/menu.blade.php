<nav class="mt-2">
<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

<!-- Le can est relié avec le  Gate-->

  <li class="nav-item">
            <a href="{{route('home')}}" class="nav-link {{setMenuActive('home')}}">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Accueil
         </p>
     </a>
</li>


@can("manager")
<li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Tableau de bord
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link active">
                  <i class="nav-icon fas fa-chart-line"></i>
                  <p>Vue globale</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-swatchbook"></i>
                  <p>Locations</p>
                </a>
            </li>
     </ul>
</li>

<li class="nav-item {{setMenuClass('manager.habilitations.', 'menu-open')}}">
            <a href="#" class="nav-link {{setMenuClass('manager.habilitations.', 'active')}}">
              <i class=" nav-icon fas fa-user-shield"></i>
              <p>
                Habilitations
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item ">
                <a href="{{route('manager.habilitations.users.index')}}" class="nav-link {{setMenuActive('manager.habilitations.users.index')}}">
                  <i class=" nav-icon fas fa-users-cog"></i>
                  <p>Utilisateurs</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-fingerprint"></i>
                  <p>Roles et permissions</p>
                </a>
              </li>
            </ul>
        </li>

        <li class="nav-item {{setMenuClass('manager.caracteristiques.', 'menu-open')}}">
            <a href="#" class="nav-link {{setMenuClass('manager.caracteristiques.', 'active')}}">
                <i class="nav-icon fas fa-cogs"></i>
                <p>
                Caracteristiques
                <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{route('manager.caracteristiques.caracteristique.caracteristique')}}"
                        class="nav-link {{setMenuActive('manager.caracteristiques.caracteristique.caracteristique')}}">
                    <i class="nav-icon far fa-circle"></i>
                    <p>Moteurs</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="" class="nav-link ">
                    <i class="nav-icon fas fa-list-ul"></i>
                    <p>Articles</p>
                    </a>
                </li>
                
            </ul>
        </li>

         <li class="nav-header">LOCATION</li>
        <li class="nav-item">
            <a href="" class="nav-link ">
                <i class="nav-icon fas fa-users"></i>
                <p>
                Gestion des clients
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-exchange-alt"></i>
                <p>
                Gestion des locations
                </p>
            </a>
        </li>

        <li class="nav-header">CAISSE</li>
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-coins"></i>
                <p>
                Gestion des paiements
                </p>
            </a>
        </li>
  @endcan
</ul>
</nav>