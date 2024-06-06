<div>
    @if (session()->has('message'))
        <div style="color: green;">
            {{ session('message') }}
        </div>
    @endif

    <form wire:submit.prevent="updateProfile">
        <div>
            <label for="nom">Nom</label>
            <input type="text" id="nom" wire:model.lazy="nom">
            @error('nom') <span style="color: red;">{{ $message }}</span> @enderror
        </div>

        <div>
            <label for="password">Mot de passe</label>
            <input type="password" id="password" wire:model.lazy="password">
            @error('password') <span style="color: red;">{{ $message }}</span> @enderror
        </div>

        <div>
            <label for="password_confirmation">Confirmez le mot de passe</label>
            <input type="password" id="password_confirmation" wire:model.lazy="password_confirmation">
        </div>

        <div>
            <label for="photo">Image de profil</label>
            <input type="file" id="photo" wire:model="photo">
            @error('photo') <span style="color: red;">{{ $message }}</span> @enderror

            @if ($photo)
                <img src="{{ $photo->temporaryUrl() }}" alt="Image de profil" style="max-width: 200px; margin-top: 10px;">
            @endif
        </div>

        <button type="submit">Mettre à jour le profil</button>
    </form>
</div>





<div style="min-height: 1604.8px;">

<section class="content pt-3">
<div class="container-fluid">
<div class="row">
<div class="col-md-3">

<div class="card card-primary card-outline">
<div class="card-body box-profile">
<div class="text-center">
<img class="profile-user-img img-fluid img-circle" src="{{Auth::user()->photo}}" alt="User profile picture">
</div>
<h3 class="profile-username text-center ellipsis">{{Auth::user()->nom}} {{Auth::user()->prenom}}</h3>
<p class="text-muted text-center">{{getRolesName()}}</p>
<ul class="list-group list-group-unbordered mb-3">
</ul>
<a href="#" class="btn btn-primary btn-block"><b>Change picture</b></a>
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
<li class="nav-item"><a class="nav-link " href="#settings" data-toggle="tab">Changer mot de passe</a></li>
</ul>
</div>
<div class="card-body">
<div class="tab-content">

<div class="tab-pane active" id="activity">
<div class="post">
<div class="user-block">

<form class="form-horizontal">
<div class="form-group row">
<label for="inputName" class="col-sm-2 col-form-label">Nom</label>
<div class="col-sm-10">
<input type="text" class="form-control" id="inputName" placeholder="Nom" value="{{Auth::user()->nom}}">
</div>
</div>
<div class="form-group row">
<label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
<div class="col-sm-10">
<input type="text" class="form-control" id="inputEmail" placeholder="Email" value="{{Auth::user()->email}}">
</div>
</div>

<div class="form-group row">
<label for="telephone" class="col-sm-2 col-form-label">Telephone</label>
<div class="col-sm-10">
<input type="text" class="form-control" id="telephone" placeholder="Telephone" value="{{Auth::user()->telephone1}}">
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

<div class="tab-pane" id="settings">
<form class="form-horizontal">
<div class="form-group row">
<label for="inputName" class="col-sm-2 col-form-label">Old password</label>
<div class="col-sm-10">
<input type="email" class="form-control" id="inputName" placeholder="Name">
</div>
</div>

<div class="form-group row">
<label for="inputName2" class="col-sm-2 col-form-label">New password</label>
<div class="col-sm-10">
<input type="text" class="form-control" id="inputName2" placeholder="Name">
</div>
</div>
<div class="form-group row">
<label for="inputSkills" class="col-sm-2 col-form-label">Confirm new password</label>
<div class="col-sm-10">
<input type="text" class="form-control" id="inputSkills" placeholder="Skills">
</div>
</div>

<div class="form-group row">
<div class="offset-sm-2 col-sm-10">
<button type="submit" class="btn btn-danger">Submit</button>
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
</section>

</div>