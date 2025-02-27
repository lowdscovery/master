<nav class="mt-2">
<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false" style="font-family: montserrat;">

<!-- Le can est relié avec le  Gate-->

  <li class="nav-item">
            <a href="{{route('home')}}" class="nav-link {{setMenuActive('home')}}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Tableau de bord
         </p>
     </a>
</li>


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
@canany(['manager', 'employe'])
<li class="nav-item {{setMenuClass('tableau.', 'menu-open')}}">
            <a href="#" class="nav-link {{setMenuClass('tableau.', 'active')}}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Depense & Bancs
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('tableau.depense.depense')}}" class="nav-link {{setMenuActive('tableau.depense.depense')}}">
                  <i class="nav-icon fas fa-chart-line"></i>
                  <p>Depense</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('tableau.bande.bande')}}" class="nav-link {{setMenuActive('tableau.bande.bande')}}">
                  <i class="nav-icon fas fa-swatchbook"></i>
                  <p>Bancs d'essai</p>
                </a>
            </li>
     </ul>
</li>
 <li class="nav-item {{setMenuClass('localisations.', 'menu-open')}}">
            <a href="#" class="nav-link {{setMenuClass('localisations.', 'active')}}">
                <i class="nav-icon fas fa-cogs"></i>
                <p>
                Localisation
                <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{route('localisations.addDistricts.add-districts')}}"
                        class="nav-link {{setMenuActive('localisations.addDistricts.add-districts')}}">
                    <i class="nav-icon far fa-circle"></i>
                    <p>District</p>
                    </a>
                </li>     
            </ul>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{route('localisations.addSite.add-site')}}"
                        class="nav-link {{setMenuActive('localisations.addSite.add-site')}}">
                    <i class="nav-icon far fa-circle"></i>
                    <p>Site</p>
                    </a>
                </li>     
            </ul>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{route('localisations.addForage.add-forage')}}"
                        class="nav-link {{setMenuActive('localisations.addForage.add-forage')}}">
                    <i class="nav-icon far fa-circle"></i>
                    <p>Ressources</p>
                    </a>
                </li>     
            </ul>
          
        </li>

        <li class="nav-item {{setMenuClass('caracteristiques.', 'menu-open')}}">
            <a href="#" class="nav-link {{setMenuClass('caracteristiques.', 'active')}}">
                <i class="nav-icon fas fa-cogs"></i>
                <p>
                Caracteristiques
                <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{route('caracteristiques.ouvrage.ouvrage')}}"
                        class="nav-link {{setMenuActive('caracteristiques.ouvrage.ouvrage')}}">
                    <i class="nav-icon fa fa-university"></i>
                    <p>Forages</p>
                    </a>
                </li>     
            </ul>
           
        </li>
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
            <a href="{{route('rapport.rapport')}}" class="nav-link {{setMenuActive('rapport.rapport')}}">
                <i class="fa fa-file"></i>
                <p>
                Rapport de mission
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{route('commande.commande')}}" class="nav-link {{setMenuActive('commande.commande')}}">
                <i class="fa fa-credit-card"></i>
                <p>
                Commande
                </p>
            </a>
        </li>
         <li class="nav-item">
            <a href="{{route('bis.bis')}}" class="nav-link {{setMenuActive('bis.bis')}}">
                <i class="fa fa-magic"></i>
                <p>
                Bis List
                </p>
            </a>
        </li>
        <!--
        <li class="nav-item">
            <a href="{{route('mesure.mesure')}}" class="nav-link {{setMenuActive('mesure.mesure')}}">
                <i class="fa fa-podcast"></i>
                <p>
                Mesure
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{route('armoire.armoire')}}" class="nav-link {{setMenuActive('armoire.armoire')}}">
                <i class="fa fa-certificate"></i>
                <p>
                Armoire de commande
                </p>
            </a>
        </li> 
-->
@endcanany
</ul>
</nav>