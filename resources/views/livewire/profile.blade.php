
<div style="min-height: 1604.8px;">
    @if (session()->has('message'))
        <div style="color: green;">
            {{ session('message') }}
        </div>
    @endif
<section class="content pt-3">
<div class="container-fluid">
<div class="row">
<div class="col-md-3">

<div class="card card-primary card-outline">
<div class="card-body box-profile">
<div class="text-center">
 @if ($photo)
    <img src="{{ $photo->temporaryUrl() }}" alt="Image de profil" class="profile-user-img img-fluid img-circle">
@else
<img class="profile-user-img img-fluid img-circle" src="{{Auth::user()->photo}}" alt="Image de profil">
@endif
</div>
<h3 class="profile-username text-center ellipsis">{{Auth::user()->nom}} {{Auth::user()->prenom}}</h3>
<p class="text-muted text-center">{{getRolesName()}}</p>
<input type="file" id="photo" wire:model="photo">
<a href="#" class="btn btn-primary btn-block" wire:click="updateProfile()"><b>Change picture</b></a>
</div>
</div>


<div class="card card-primary">


</div>

</div>

<div class="col-md-9">
<div class="card">
<div class="card-header p-2">
<ul class="nav nav-pills">
<li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Information Personnel</a></li>
</ul>
</div>
<div class="card-body">

<div class="tab-pane active" id="activity">
<div class="post">
<div class="user-block">

    <form wire:submit.prevent="updateProfile">
        <div class="form-group row">
        <label for="nom" class="col-sm-2 col-form-label">Nom</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" id="nom" placeholder="Nom" wire:model.lazy="nom">
        @error('nom') <span style="color: red;">{{ $message }}</span> @enderror
        </div>
        </div>
        <div class="form-group row">
        <label for="prenom" class="col-sm-2 col-form-label">Prenom</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" id="prenom" placeholder="Prenom" wire:model.lazy="prenom">
        @error('prenom') <span style="color: red;">{{ $message }}</span> @enderror
        </div>
        </div>
        <div class="form-group row">
        <label for="sexe" class="col-sm-2 col-form-label">Sexe</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" id="sexe" placeholder="sexe" wire:model.lazy="sexe">
        @error('sex') <span style="color: red;">{{ $message }}</span> @enderror
        </div>
        </div>
        <div class="form-group row">
        <label for="piece" class="col-sm-2 col-form-label">Piece d'identité</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" id="piece" placeholder="Piece d'identite" wire:model.lazy="pieceIdentite">
        @error('pieceIdentite') <span style="color: red;">{{ $message }}</span> @enderror
        </div>
        </div>
        <div class="form-group row">
        <label for="numero" class="col-sm-2 col-form-label">Numero Identite</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" id="numero" placeholder="Numero piece d'identite" wire:model.lazy="numeroPieceIdentite">
        @error('numeroPieceIdentite') <span style="color: red;">{{ $message }}</span> @enderror
        </div>
        </div>
        <div class="form-group row">
        <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" id="inputEmail" placeholder="Email" wire:model.lazy="email">
        @error('email') <span style="color: red;">{{ $message }}</span> @enderror
        </div>
        </div>

        <div class="form-group row">
        <label for="telephone" class="col-sm-2 col-form-label">Telephone</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" id="telephone" placeholder="Telephone" wire:model.lazy="telephone1">
        @error('telephone1') <span style="color: red;">{{ $message }}</span> @enderror
        </div>
        </div>

        <div class="form-group row">
        <div class="offset-sm-2 col-sm-10">
        <button type="submit" class="btn btn-danger">Enregistrer</button>
        </div>
        </div>
    </form>

</div>
</div>
</div>

</div>
</div>

</div>

</div>

</div>
</section>

</div>