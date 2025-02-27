
<div>
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-hidden="true" wire:ignore.self>
@include("livewire.Incident.create")
</div> 

                          
        
<div class="row p-3 pt-2">
@can("employe")
<button class="btn btn-success ml-3 mb-3" data-toggle="modal" data-target="#addModal">
    <i class="fa fa-plus-circle"></i> Ajouter Incidents
</button>
@endcan
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex align-items-center bg-primary text-white">
                <h3 class="card-title flex-grow-1"><i class="fa fa-fire"></i> Liste d'incidents</h3>
                <div class="d-flex ml-auto">
                    <label for="filtreType" class="mr-2 d-block">Filtrer par date</label>
                    <div class="input-group input-group-md mr-2" style="width: 250px;">
                        <input type="date" wire:model.debounce.250ms="datedebut" class="form-control" placeholder="Date début">
                    </div>
                    <div class="input-group input-group-md mr-2" style="width: 250px;">
                        <input type="date" wire:model.debounce.250ms="datefin" class="form-control" placeholder="Date fin">
                    </div>
                </div>
                <div class="card-tools d-flex align-items-center">
                    <div class="input-group input-group-md" style="width: 250px;">
                        <input type="text" wire:model.debounce.250ms="search" class="form-control" placeholder="Recherche par type">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0" style="max-height: 400px;">
                <table class="table table-head-fixed table-hover text-center">
                    <thead class="thead-light">
                        <tr>
                            <th>Intervenant</th>
                            <th>Type</th>
                            <th>N° de Série</th>
                            <th>Date</th>
                            <th>Index CH</th>
                            <th>Heure</th>
                            <th>Nature</th>
                            <th>Cause</th>
                            <th>Action</th>
                            <th>Résultat</th>
                            @can("employe")
                            <th>Options</th>
                            @endcan
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($transactions as $incident)
                        <tr>
                            <td>{{ $incident->intervenant_id }}</td>
                            <td>{{ $incident->type }}</td>
                            <td>{{ $incident->caracteristique_moteur_id }}</td>
                            <td>{{ date('d-m-Y', strtotime($incident->dateIncident)) }}</td>
                            <td>{{ $incident->indexCH }}</td>
                            <td>{{ $incident->heure }}</td>
                            <td>{{ $incident->natureIncident }}</td>
                            <td>{{ $incident->cause }}</td>
                            <td>{{ $incident->action }}</td>
                            <td>{{ $incident->resultat }}</td>
                            @can("employe")
                            <td>
                                <div class="btn-group">
                                    <button class="btn btn-warning dropdown-toggle" data-toggle="dropdown">
                                        <i class="fa fa-cog"></i>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><button class="dropdown-item" wire:click="editTransaction({{ $incident->id }})" data-toggle="modal" data-target="#addModal">Éditer</button></li>
                                        @can('delete', $incident)
                                        <li><button class="dropdown-item" wire:click="confirmDelete({{ $incident->id }})">Supprimer</button></li>
                                        @endcan
                                    </ul>
                                </div>
                            </td>
                            @endcan
                        </tr>
                        @empty
                        <tr>
                            <td colspan="11" class="text-center">
                                <div class="alert alert-danger">
                                    <h5><i class="icon fas fa-ban"></i> Aucune donnée trouvée !</h5>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
            <div class="card-footer clearfix">
                <div class="float-right">
                    {{ $transactions->links() }}
                </div>
            </div>
        </div>
    </div>
</div>

 <!-- /.card -->

</div>
</div>

</div>
 

</div>
</div>

<script>
    window.addEventListener("showSuccessMessage", event=>{
        Swal.fire({
                position: 'top-end',
                icon: 'success',
                toast:true,
                title: event.detail.message || "Utilisateur mis à jour avec succès!",
                showConfirmButton: false,
                timer: 3000
                }
            )
    })
</script>

<script>
    window.addEventListener("showConfirmMessage", event=>{
       Swal.fire({
        title: event.detail.message.title,
        text: event.detail.message.text,
        icon: event.detail.message.type,
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Continuer',
        cancelButtonText: 'Annuler'
        }).then((result) => {
        if (result.isConfirmed) {
            if(event.detail.message.data){
               @this.deleteIncident(event.detail.message.data.models_incident_id)
            }
        //    @this.resetPassword()
        }
        })
    })

</script>

