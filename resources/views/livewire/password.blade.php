
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
<ul class="list-group list-group-unbordered mb-3">
</ul>
<input type="file" id="photo" wire:model="photo">
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
<li class="nav-item"><a class="nav-link active" href="#settings" data-toggle="tab">Changer mot de passe</a></li>
</ul>
</div>
<div class="card-body">


<div class="tab-pane active" id="settings">
    <form wire:submit.prevent="updateProfile">
        <div class="form-group row">
        <label for="password" class="col-sm-2 col-form-label">Mot de passe</label>
        <div class="col-sm-10">
        <input type="password" class="form-control" id="password" placeholder="password" wire:model.lazy="password">
        @error('password') <span style="color: red;">{{ $message }}</span> @enderror
        </div>
        </div>
        <div class="form-group row">
        <label for="confirm" class="col-sm-2 col-form-label">Confirmez le mot de passe</label>
        <div class="col-sm-10">
        <input type="password" class="form-control" id="confirm" placeholder="confirm password" wire:model.lazy="password_confirmation">
        </div>
        </div>

        <div class="form-group row">
        <div class="offset-sm-2 col-sm-10">
        <button type="submit" class="btn btn-danger">Confirmer</button>
        </div>
        </div>
    </form>
</div>



</div>
</div>

</div>

</div>

</div>
</section>

</div>