
<div>
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-hidden="true" wire:ignore.self>
@include("livewire.commande.create")
</div>
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-hidden="true" wire:ignore.self>
@include("livewire.commande.edit")
</div> 
                          
        
@if($currentPage==DETAILLEMAINTENANCE)
@include("livewire.commande.detaille")
@elseif($currentPage==PAGELIST)
<div class="row p-3 pt-2">
    @can("employe")
    <button class="btn btn-success ml-3 mb-3" wire:click="cancel" data-toggle="modal" data-target="#addModal">
        <i class="fa fa-plus-circle"></i> Nouveau
    </button>
    @endcan

    <button class="btn btn-primary ml-3 mb-3" wire:click="detaille()">
        <i class="fa fa-info-circle"></i> Voir plus
    </button>

    <div class="col-12">
        <div class="card shadow-lg rounded border-0">
            <div class="card-header bg-info text-white d-flex align-items-center">
                <h3 class="card-title flex-grow-1"><i class="nav-icon fas fa-list"></i> Commande</h3>

                <div class="card-tools d-flex align-items-center">
                    <div class="input-group input-group-md" style="width: 250px;">
                        <input type="text" name="table_search" wire:model.debounce.250ms="search" class="form-control float-right" placeholder="Rechercher...">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-secondary"><i class="fas fa-search"></i></button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-body p-0">
                <table class="table table-hover table-striped table-bordered rounded" style="border-radius: 10px;">
                    <thead class="thead-light">
                        <tr>
                            <th class="text-center">Date Commande</th>
                            <th class="text-center">Motif</th>
                            <th class="text-center">Article</th>
                            <th class="text-center">Référence</th>
                            <th class="text-center">Type</th>
                            <th class="text-center">N° de Série</th>
                            @can("employe")
                            <th class="text-center">Action</th>
                            @endcan
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($commandes as $commande)
                        <tr class="table-light">
                            <td class="text-center">{{ date('d/m/Y', strtotime($commande->dateCommande)) }}</td>
                            <td class="text-center">{{ $commande->motif }}</td>
                            <td class="text-center">{{ $commande->article }}</td>
                            <td class="text-center">{{ $commande->reference }}</td>
                            <td class="text-center">{{ $commande->type }}</td>
                            <td class="text-center">{{ $commande->caracteristique }}</td>
                            @can("employe")
                            <td class="text-center">
                                <div class="btn-group">
                                    <a class="btn btn-warning dropdown-toggle" data-toggle="dropdown">
                                        <span class="fa fa-caret-down" title="Options"></span>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-right">
                                        <li><button class="btn btn-link text-dark" wire:click="editCommande({{ $commande->id }})" data-toggle="modal" data-target="#editModal">
                                            <i class="far fa-edit"></i> Modifier
                                        </button></li>
                                        @can('delete', $commande)
                                        <li><button class="btn btn-link text-danger" wire:click="confirmDelete({{ $commande->id }})">
                                            <i class="far fa-trash-alt"></i> Supprimer
                                        </button></li>
                                        @endcan
                                    </ul>
                                </div>
                            </td>
                            @endcan
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center">
                                <div class="alert alert-warning">
                                    <i class="icon fas fa-exclamation-triangle"></i> Aucune donnée trouvée
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="card-footer bg-light d-flex justify-content-end">
                {{ $commandes->links() }}
            </div>
        </div>
    </div>
</div>

@endif
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
               @this.deleteCommande(event.detail.message.data.models_commande_id)
            }
        //    @this.resetPassword()
        }
        })
    })

</script>



