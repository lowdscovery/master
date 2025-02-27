
<div style="min-height: 1604.8px;">

<section class="content pt-3">
<div class="container-fluid">
<div class="row">
<div class="col-md-3">

<div class="card card-primary card-outline">
<div class="card-body box-profile">
<div class="text-center">
 @if ($photo)
    <img src="{{ $photo->temporaryUrl() }}" width="120" class="img-fluid rounded-circle" style="height:120px;border: 6px groove #38E884;">
@else
@if (Auth::user()->photo !=null)
    <img class="img-fluid rounded-circle" style="height:120px;border: 6px groove #38E884;" width="120" src="{{Auth::user()->photo}}">
@else
   <img src="{{asset("image/user.png")}}" class="img-fluid rounded-circle" style="height:120px;border: 6px groove #38E884;" width="120">
@endif
@endif

</div>
<p class="text-center pt-2 ellipsis" style="font-size:18px;">{{Auth::user()->nom}} {{Auth::user()->prenom}}</p>
<p class="text-muted text-center">{{getRolesName()}}</p>
<input type="file" class="form-control" id="photo" wire:model="photo" title="Selectionner le profile">
<div class="pt-2">
<button type="submit" class="btn btn-primary btn-block" wire:click="updateProfile()"><b>Change picture</b></button>
</div>
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
        <input type="text" class="form-control" id="nom" placeholder="Nom" wire:model.lazy="nom" required="required" title="Le nom doit être en majuscule" pattern="[A-Z]+">
        @error('nom') <span style="color: red;">{{ $message }}</span> @enderror
        </div>
        </div>
        <div class="form-group row">
        <label for="prenom" class="col-sm-2 col-form-label">Prenom</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" id="prenom" placeholder="Prenom" wire:model.lazy="prenom" required="required">
        @error('prenom') <span style="color: red;">{{ $message }}</span> @enderror
        </div>
        </div>
        <div class="form-group row">
        <label for="sexe" class="col-sm-2 col-form-label">Sexe</label>
        <div class="col-sm-10">
        <select class="form-control" wire:model.lazy="sexe" required="required">
            <option value=""> </option>
            <option value="Homme">Homme</option>
            <option value="Femme">Femme</option>
        </select>
        @error('sex') <span style="color: red;">{{ $message }}</span> @enderror
        </div>
        </div>
        <div class="form-group row">
        <label for="numero" class="col-sm-2 col-form-label">Numero Identite</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" id="numero" placeholder="Numero piece d'identite" wire:model.lazy="numeroPieceIdentite" required="required" title="Le numero de piece d'identité doit être 12 chiffre" pattern="\d{12}">
        @error('numeroPieceIdentite') <span style="color: red;">{{ $message }}</span> @enderror
        </div>
        </div>
        <div class="form-group row">
        <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" id="inputEmail" placeholder="Email" wire:model.lazy="email" required="required">
        @error('email') <span style="color: red;">{{ $message }}</span> @enderror
        </div>
        </div>

        <div class="form-group row">
        <label for="telephone" class="col-sm-2 col-form-label">Telephone</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" id="telephone" placeholder="Telephone" wire:model.lazy="telephone1" required="required" title="Le numero de telephone doit être 10 chiffre" pattern="\d{10}">
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

<script>
    window.addEventListener("showSuccessMessage", event=>{
        Swal.fire({
                position: 'top-end',
                icon: 'success',
                toast:true,
                title: event.detail.message || "Profile mis à jour avec succès!",
                showConfirmButton: false,
                timer: 3000
                }
            )
    })
</script>