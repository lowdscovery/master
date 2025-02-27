
<div class="content pt-2" style="min-height: 2646.44px;">

<section class="content">

<div class="card card-solid">
<div class="card-body pb-0">
<div class="row">
@foreach ($users as $user)
<div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
<div class="card bg-light d-flex flex-fill">
<div class="card-header border-bottom-0">
Utilisateur
</div>
<div class="card-body pt-0">
<div class="row">
<div class="col-7">
<h4 class="lead" style="color:blue;"><b>{{ $user->nom }} {{ $user->prenom }}</b></h4>
<p class="text-muted text-sm"><b><i class="fas fa-lg fa-mars"></i> Sexe: </b><b><span style="color:dark;">{{ $user->sexe }}</span></b></p>
<ul class="ml-4 mb-0 fa-ul">
<li class="average"><span class="fa-li"><i class="fas fa-lg fa-id-card"></i></span> N° CIN : <b><span style="color:dark;"> {{ $user->numeroPieceIdentite }}</span></b></li>
<li class="average"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Phone #: <b><span style="color:dark;">{{ $user->telephone1 }}</span></b></li>
<li class="average"><span class="fa-li"><i class="fas fa-lg fa-envelope"></i></span> Mail: <b><span style="color:dark;">{{ $user->email }}</span></b></li>
</ul>
</div>
<div class="col-5 text-center">
@if ($user->photo !="" || $user->photo !=null)
    <div class="profile-photo pt-3">
        <img src="{{asset($user->photo)}}" width="120" class="img-fluid rounded-circle" alt="" style="height:120px;border: 3px groove #FF5100;">
    </div>
@else
    <div class="profile-photo pt-3">
        <img src="{{asset('image/user.png')}}" width="120" class="img-fluid rounded-circle" alt="user-avatar" style="height:120px;border: 3px groove #FF5100;">
    </div>
@endif

</div>
</div>
</div>
<div class="card-footer">
<div class="text-right">
<a href="#" class="btn btn-sm btn-danger" wire:click="goToListUser()" data-toggle="modal" data-target="#addModal" style="background-color:#FF5100;">
<i class="fa fa-arrow-left"></i> Retour
</a>

</div>
</div>
</div>
</div>
 @endforeach
</div>
</div>

<div class="card-footer">
<nav aria-label="Contacts Page Navigation">
<ul class="pagination justify-content-center m-0">
   {{ $users->links() }}
</ul>
</nav>
</div>

</div>

</section>

</div>

    
