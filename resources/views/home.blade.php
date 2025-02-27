@extends("layouts.principal")

@section("contenu")
<section class="content pt-4">
<div class="container-fluid">

<div class="row">
<div class="col-lg-3 col-6">

<div class="small-box bg-info">
<div class="inner">
<h3>{{ $count }}</h3>
<p style="font-weight: bold;font-size:20px;">Utilisateurs</p>
</div>
<div class="icon">
<i class="ion ion-bag"></i>
</div>
@canany(['manager', 'employe'])
<a href="#" class="small-box-footer">Plus d'infos <i class="fas fa-arrow-circle-right"></i></a>
@endcanany
</div>
</div>

<div class="col-lg-3 col-6">

<div class="small-box bg-success">
<div class="inner">
<h3>{{ $count1 }}</h3>
<p style="font-weight: bold;font-size:20px;">Intervenants</p>
</div>
<div class="icon">
<i class="ion ion-stats-bars"></i>
</div>
@canany(['manager', 'employe'])
<a href="{{route('Intervenant.intervenant')}}" class="small-box-footer">Plus d'infos <i class="fas fa-arrow-circle-right"></i></a>
@endcanany
</div>
</div>

<div class="col-lg-3 col-6">

<div class="small-box bg-warning">
<div class="inner">
<h3>{{ $count2 }}</h3>
<p style="font-weight: bold;font-size:20px;">Maintenance</p>
</div>
<div class="icon">
<i class="ion ion-person-add"></i>
</div>
@canany(['manager', 'employe'])
<a href="{{route('maintenance.maintenance')}}" class="small-box-footer">Plus d'infos <i class="fas fa-arrow-circle-right"></i></a>
@endcanany
</div>
</div>

<div class="col-lg-3 col-6">

<div class="small-box bg-danger">
<div class="inner">
<h3>{{ $count3 }}</h3>
<p style="font-weight: bold;font-size:20px;">Incidents</p>
</div>
<div class="icon">
<i class="ion ion-pie-graph"></i>
</div>
@canany(['manager', 'employe'])
<a href="{{route('Incident.incident')}}" class="small-box-footer">Plus d'infos <i class="fas fa-arrow-circle-right"></i></a>
@endcanany
</div>
</div>
</div>
</div>
</section>


<script>
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.getElementById('search');
            const resultContainer = document.getElementById('intervenants-list');

            searchInput.addEventListener('input', function() {
                const searchQuery = searchInput.value;

                fetch(`/?search=${encodeURIComponent(searchQuery)}`, {
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                })
                .then(response => response.text())
                .then(html => {
                    resultContainer.innerHTML = html;
                });
            });
        });
    </script>
    
<section class="content pt-2">
<div class="row">
<div class="col-12">
<div class="card">
<div class="card-header">
<h3 class="card-title">Liste Intervenant</h3>
<div class="card-tools">
<form action="/" method="GET">
<div class="input-group input-group-sm" style="width: 150px;">
<input type="text" name="search" class="form-control float-right" placeholder="Search" value="{{ request()->get('search') }}">
<div class="input-group-append">
<button type="submit" class="btn btn-default">
<i class="fas fa-search"></i>
</button>
</div>
</form>
</div>
</div>
</div>

<div class="card-body table-responsive p-0" style="height: 300px;">
<table class="table table-head-fixed text-nowrap">
    <thead>
        <tr>
            <th></th>
            <th>Nom</th>
            <th>Service</th>
            <th>Matricule</th>
            <th>Sexe</th>
            <th>Telephone</th>
            <th class="text-center">Date d'embauche</th>
            @can("admin")
            <th class="text-center">Action</th>
            @endcan
        </tr>
    </thead>
    <tbody>
        @foreach ($count4 as $inter)
        <tr>
            <td><img src="{{asset($inter->photo)}}" style="width:60px; height:60px;"></td>
            <td>{{ $inter->nom }} {{ $inter->prenom }}</td>
            <td>{{ $inter->service }}</td>
            <td>{{ $inter->matricule }}</td>
            <td>{{ $inter->sexe }}</td>
            <td>{{ $inter->telephone }}</td>
            <td class="text-center">{{ date('d-m-Y',strtotime($inter->dateEmbauche)) }}</td>
            @can("admin")
            <td class="text-center">
          <!--  <a href="{{ route('intervenants.edit', $inter->id) }}" class="btn btn-link">
                <i class="far fa-edit"></i>
            </a> -->
                <a href="javascript:void(0)" class="btn btn-danger btn-delete" onclick="confirmDelete({{ $inter->id }})">
                    <i class="far fa-trash-alt"></i>
                </a>
            </td>
            @endcan
        </tr>
        @endforeach
    </tbody>
</table>

<script>
    function confirmDelete(id) {
        // Utiliser SweetAlert2 pour afficher un message de confirmation stylisé
        Swal.fire({
            title: 'Êtes-vous sûr?',
            text: "Vous ne pourrez pas annuler cette action!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Oui, supprimer!',
            cancelButtonText: 'Annuler'
        }).then((result) => {
            if (result.isConfirmed) {
                // Si l'utilisateur confirme, rediriger vers l'URL de suppression
                window.location.href = "{{ url('delete') }}/" + id;
            }
        });
    }
</script>

<script>
    // Vérifier si un événement 'intervenant-deleted' est dispatché par le backend
    @if (session('dispatch-event') == 'intervenant-deleted')
        window.addEventListener('DOMContentLoaded', (event) => {
            // Utiliser SweetAlert pour afficher un message de succès
            Swal.fire({
                title: 'Suppression réussie!',
                text: 'L\'intervenant a été supprimé avec succès.',
                icon: 'success',
                confirmButtonText: 'OK'
            });
        });
    @endif
</script>

@can('employe')
<script>
    // Vérifier si une alarme est présente
    document.addEventListener('DOMContentLoaded', function() {
        @if($alarme)
            // Jouer un son d'alarme
            let audio = new Audio('/path/zaza.mp3');  // Chemin vers un fichier son d'alarme
            audio.loop = true;
            audio.play();

            // Afficher une notification visuelle
            Swal.fire({
                title: 'Alerte Maintenance!',
                text: 'Une maintenance est programmée pour aujourd\'hui.',
                icon: 'warning',
                confirmButtonText: 'Arrêter l\'alarme'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Arrêter l'alarme lorsque l'utilisateur clique sur "Arrêter"
                    audio.pause();
                }
            });
        @endif
    });
</script>
@endcan
</div>

</div>

</div>
</div>
</section>
@endsection