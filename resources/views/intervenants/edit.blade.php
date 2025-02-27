@extends("layouts.principal")

@section("contenu")
<form action="{{ route('intervenants.update', $intervenant->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT') <!-- Permet de gérer la méthode PUT pour la mise à jour -->

    <div class="card-body">
        <!-- Nom -->
        <div class="form-group">
            <label>Nom</label>
            <input type="text" name="nom" class="form-control" value="{{ old('nom', $intervenant->nom) }}" required pattern="[A-Z]+" title="Le nom doit être en majuscule">
        </div>

        <!-- Prénom -->
        <div class="form-group">
            <label>Prénom</label>
            <input type="text" name="prenom" class="form-control" value="{{ old('prenom', $intervenant->prenom) }}" required>
        </div>

        <!-- Service -->
        <div class="form-group">
            <label>Service</label>
            <input type="text" name="service" class="form-control" value="{{ old('service', $intervenant->service) }}" required>
        </div>

        <!-- Matricule -->
        <div class="form-group">
            <label>Matricule</label>
            <input type="text" name="matricule" class="form-control" value="{{ old('matricule', $intervenant->matricule) }}" required>
        </div>

        <!-- Sexe -->
        <div class="form-group">
            <label>Sexe</label>
            <select name="sexe" class="form-control" required>
                <option value="">---------</option>
                <option value="HOMME" {{ old('sexe', $intervenant->sexe) == 'HOMME' ? 'selected' : '' }}>Homme</option>
                <option value="FEMME" {{ old('sexe', $intervenant->sexe) == 'FEMME' ? 'selected' : '' }}>Femme</option>
            </select>
        </div>

        <!-- Téléphone -->
        <div class="form-group">
            <label>Téléphone</label>
            <input type="text" name="telephone" class="form-control" value="{{ old('telephone', $intervenant->telephone) }}" required pattern="\d{10}" title="Le numéro de téléphone doit être de 10 chiffres">
        </div>

        <!-- Date d'embauche -->
        <div class="form-group">
            <label>Date d'embauche</label>
            <input type="date" name="dateEmbauche" class="form-control" value="{{ old('dateEmbauche', $intervenant->dateEmbauche) }}" required>
        </div>

        <!-- Photo -->
        <div class="form-group">
            <label>Photo</label>
            <input type="file" name="photo" class="form-control">
            @if($intervenant->photo)
                <img src="{{ asset($intervenant->photo) }}" alt="photo" style="width: 200px; height: 200px;">
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Enregistrer</button>
    </div>
</form>
@endsection
