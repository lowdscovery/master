<nav class="mt-2">
<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false" style="font-family: montserrat;">

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
                    <p>Materiels</p>
                    </a>
                </li>     
            </ul>
             <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{route('manager.caracteristiques.ouvrage.ouvrage')}}"
                        class="nav-link {{setMenuActive('manager.caracteristiques.ouvrage.ouvrage')}}">
                    <i class="nav-icon far fa-circle"></i>
                    <p>Forages</p>
                    </a>
                </li>     
            </ul>
        </li>

         <li class="nav-header">LOCATION</li>
        <li class="nav-item">
            <a href="{{route('Intervenant.intervenant')}}" class="nav-link {{setMenuActive('Intervenant.intervenant')}}">
                <i class="nav-icon fas fa-users"></i>
                <p>
                Intervenant
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{route('Incident.incident')}}" class="nav-link {{setMenuActive('Incident.incident')}}">
                <i class="nav-icon fas fa-exchange-alt"></i>
                <p>
                Incident
                </p>
            </a>
        </li>
       <li class="nav-item">
            <a href="{{route('maintenance.maintenance')}}" class="nav-link {{setMenuActive('maintenance.maintenance')}}">
                <i class="fa fa-cog fa-fw"></i>
                <p>
                Maintenance
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{route('commande.commande')}}" class="nav-link {{setMenuActive('commande.commande')}}">
                <i class="fa fa-cog fa-fw"></i>
                <p>
                Commande
                </p>
            </a>
        </li>
         <li class="nav-item">
            <a href="{{route('bis.bis')}}" class="nav-link {{setMenuActive('bis.bis')}}">
                <i class="fa fa-cog fa-fw"></i>
                <p>
                Bis List
                </p>
            </a>
        </li>
        
  @endcan
</ul>
</nav>