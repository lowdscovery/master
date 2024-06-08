<aside class="control-sidebar control-sidebar-dark" style="display: none;">
<div class="bg-dark">
    <div class="card-body bg-dark box-profile">
    <div class="text-center">
        <img class="profile-user-img img-fluid img-circle" src="{{ asset('image/user.png') }}" alt="User profile picture">
    </div>

    <h3 class="profile-username text-center ellipsis" style="font-family: montserrat;">{{userFullName()}}</h3>

    <p class="text-muted text-center">{{getRolesName()}}</p>

    <ul class="list-group bg-dark mb-3">
       <li class="list-group-item">
        <a href="{{route('lockscreen')}}" class="d-flex align-items-center"><i class="fa fa-unlock-alt pr-2"></i><b >Lock profile</b> </a>
        </li>
        <li class="list-group-item">
        <a href="{{route('password')}}" class="d-flex align-items-center "><i class="fa fa-lock pr-2"></i><b >Mot de passe</b> </a>
        </li>
        <li class="list-group-item">
        <a href="{{route('profile')}}" class="d-flex align-items-center"><i class="fa fa-user pr-2"></i><b >Mon profile</b> </a>
        </li>
    </ul>

    <a class="btn btn-primary btn-block" href="{{ route('logout') }}"
        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
        Déconnexion
    </a>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>
    </div>
    <!-- /.card-body -->
</div>
</aside>