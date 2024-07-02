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
<li class="nav-item {{setMenuClass('admin.tableau.', 'menu-open')}}">
            <a href="#" class="nav-link {{setMenuClass('admin.tableau.', 'active')}}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Tableau de bord
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('admin.tableau.depense.depense')}}" class="nav-link {{setMenuActive('admin.tableau.depense.depense')}}">
                  <i class="nav-icon fas fa-chart-line"></i>
                  <p>Depense</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('admin.tableau.bande.bande')}}" class="nav-link {{setMenuActive('admin.tableau.bande.bande')}}">
                  <i class="nav-icon fas fa-swatchbook"></i>
                  <p>Bande d'essai</p>
                </a>
            </li>
     </ul>
</li>
@endcan
@can("admin")
<li class="nav-item {{setMenuClass('admin.habilitations.', 'menu-open')}}">
            <a href="#" class="nav-link {{setMenuClass('admin.habilitations.', 'active')}}">
              <i class=" nav-icon fas fa-user-shield"></i>
              <p>
                Habilitations
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item ">
                <a href="{{route('admin.habilitations.users.index')}}" class="nav-link {{setMenuActive('admin.habilitations.users.index')}}">
                  <i class=" nav-icon fas fa-users-cog"></i>
                  <p>Utilisateurs</p>
                </a>
              </li>
            </ul>
        </li>
 @endcan
 @can("manager")
 <li class="nav-item {{setMenuClass('admin.localisations.', 'menu-open')}}">
            <a href="#" class="nav-link {{setMenuClass('admin.localisations.', 'active')}}">
                <i class="nav-icon fas fa-cogs"></i>
                <p>
                Localisation
                <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{route('admin.localisations.addDistricts.add-districts')}}"
                        class="nav-link {{setMenuActive('admin.localisations.addDistricts.add-districts')}}">
                    <i class="nav-icon far fa-circle"></i>
                    <p>District</p>
                    </a>
                </li>     
            </ul>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{route('admin.localisations.addSite.add-site')}}"
                        class="nav-link {{setMenuActive('admin.localisations.addSite.add-site')}}">
                    <i class="nav-icon far fa-circle"></i>
                    <p>Site</p>
                    </a>
                </li>     
            </ul>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{route('admin.localisations.addForage.add-forage')}}"
                        class="nav-link {{setMenuActive('admin.localisations.addForage.add-forage')}}">
                    <i class="nav-icon far fa-circle"></i>
                    <p>Ressources</p>
                    </a>
                </li>     
            </ul>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{route('admin.localisations.addType.add-type')}}"
                        class="nav-link {{setMenuActive('admin.localisations.addType.add-type')}}">
                    <i class="nav-icon far fa-circle"></i>
                    <p>Type</p>
                    </a>
                </li>     
            </ul>
        </li>

        <li class="nav-item {{setMenuClass('admin.caracteristiques.', 'menu-open')}}">
            <a href="#" class="nav-link {{setMenuClass('admin.caracteristiques.', 'active')}}">
                <i class="nav-icon fas fa-cogs"></i>
                <p>
                Caracteristiques
                <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{route('admin.caracteristiques.caracteristique.caracteristique')}}"
                        class="nav-link {{setMenuActive('admin.caracteristiques.caracteristique.caracteristique')}}">
                    <i class="nav-icon far fa-circle"></i>
                    <p>Materiels</p>
                    </a>
                </li>     
            </ul>
             <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{route('admin.caracteristiques.ouvrage.ouvrage')}}"
                        class="nav-link {{setMenuActive('admin.caracteristiques.ouvrage.ouvrage')}}">
                    <i class="nav-icon fa fa-university"></i>
                    <p>Forages</p>
                    </a>
                </li>     
            </ul>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{route('admin.caracteristiques.bassin.bassin')}}"
                        class="nav-link {{setMenuActive('admin.caracteristiques.bassin.bassin')}}">
                    <i class="nav-icon fa fa-filter"></i>
                    <p>Bassin</p>
                    </a>
                </li>     
            </ul>
        </li>
        @endcan
         <li class="nav-header">LOCATION</li>
        @can("admin")
        <li class="nav-item">
            <a href="{{route('Intervenant.intervenant')}}" class="nav-link {{setMenuActive('Intervenant.intervenant')}}">
                <i class="nav-icon fas fa-users"></i>
                <p>
                Intervenant
                </p>
            </a>
        </li>
        @endcan
        @can("employe")
        <li class="nav-item">
            <a href="{{route('Incident.incident')}}" class="nav-link {{setMenuActive('Incident.incident')}}">
                <i class="nav-icon fas fa-exchange-alt"></i>
                <p>
                Incident
                </p>
            </a>
        </li>
        @endcan
      @can("admin")
       <li class="nav-item">
            <a href="{{route('maintenance.maintenance')}}" class="nav-link {{setMenuActive('maintenance.maintenance')}}">
                <i class="fa fa-cog fa-fw"></i>
                <p>
                Maintenance
                </p>
            </a>
        </li>
        @endcan
        @can("manager")
        <li class="nav-item">
            <a href="{{route('commande.commande')}}" class="nav-link {{setMenuActive('commande.commande')}}">
                <i class="fa fa-credit-card"></i>
                <p>
                Commande
                </p>
            </a>
        </li>
        @endcan
        @can("employe")
         <li class="nav-item">
            <a href="{{route('bis.bis')}}" class="nav-link {{setMenuActive('bis.bis')}}">
                <i class="fa fa-magic"></i>
                <p>
                Bis List
                </p>
            </a>
        </li>
        @endcan
        @can("manager")
        <li class="nav-item">
            <a href="{{route('mesure.mesure')}}" class="nav-link {{setMenuActive('mesure.mesure')}}">
                <i class="fa fa-podcast"></i>
                <p>
                Mesure
                </p>
            </a>
        </li>
        @endcan
        @can("employe")
        <li class="nav-item">
            <a href="{{route('rapport.rapport')}}" class="nav-link {{setMenuActive('rapport.rapport')}}">
                <i class="fa fa-file"></i>
                <p>
                Rapport de mission
                </p>
            </a>
        </li>
        @endcan
        @can("employe")
        <li class="nav-item">
            <a href="{{route('armoire.armoire')}}" class="nav-link {{setMenuActive('armoire.armoire')}}">
                <i class="fa fa-certificate"></i>
                <p>
                Armoire de commande
                </p>
            </a>
        </li>
        @endcan
    
</ul>
</nav>