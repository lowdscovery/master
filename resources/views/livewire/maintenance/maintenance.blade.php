
@if($currentPage==DETAILLEMAINTENANCE)
@include("livewire.maintenance.detaille")
@elseif($currentPage==PAGELIST)
<div>
<div>
<div class="modal fade" id="addModal"tabindex="-1" role="dialog" aria-hidden="true" wire:ignore.self>
@include("livewire.maintenance.create")
</div> 

<div class="modal fade" id="pdfmodal"tabindex="-1" role="dialog" aria-hidden="true" wire:ignore.self>
<div class="modal-dialog  modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
           <form>   
            @if ($selectedDocument)
            <iframe src="{{ asset($selectedDocument->Rapport)}}" width="100%" height="600px"></iframe>
            @endif
   </form>
    </div>
  </div>
</div> 
</div>                        
        

<div class="row p-2">
    <div class="col-12">
    <div class="card shadow-lg border-0">
    <div class="card-header d-flex flex-column" style="background-color: #007bff; color: white; padding: 20px;">
        <!-- Titre principal -->
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h3 class="card-title m-0">
                <i class="nav-icon fas fa-cogs"></i> Gestion des Maintenances
            </h3>

            <!-- Boutons "Ajouter" et "Voire plus" -->
            <div class="d-flex">
                @can('employe')
                <button class="btn btn-light btn-sm mr-2" data-toggle="modal" data-target="#addModal" wire:click="cache()">
                    <i class="fa fa-plus-circle"></i> Ajouter
                </button>
                @endcan
                <button class="btn btn-light btn-sm" wire:click="detaille()">
                    <i class="fas fa-eye"></i> Voire plus
                </button>
            </div>
        </div>

        <!-- Filtres et paramètres -->
        <div class="d-flex justify-content-between align-items-center">
            <!-- Filtrer par page -->
            <div class="d-flex align-items-center">
                <label class="mr-2 mb-0" style="font-size: 16px;">Afficher par page :</label>
                <select class="form-control form-control-sm" wire:model.live="perPage" style="width: 80px;">
                    <option value="6">6</option>
                    <option value="10">10</option>
                    <option value="50">50</option>
                </select>
            </div>

            <!-- Filtrer par date -->
            <div class="d-flex align-items-center">
                <label class="mr-2 mb-0">Filtrer par date :</label>
                <input type="date" wire:model.debounce.250ms="datedebut" class="form-control form-control-sm mr-2" style="width: 160px;">
                <input type="date" wire:model.debounce.250ms="datefin" class="form-control form-control-sm" style="width: 160px;">
            </div>

            <!-- Recherche -->
            <div class="input-group" style="width: 250px;">
                <input type="text" wire:model.debounce.250ms="search" class="form-control form-control-sm" placeholder="Rechercher...">
                <div class="input-group-append">
                    <button class="btn btn-light btn-sm" type="submit">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>


            <!-- /.card-header -->
            <div class="card-body table-responsive p-0 table-striped" style="max-height: 450px;">
            @php
    $stopAlarmDisplayed = false; // Variable pour contrôler l'affichage du bouton
           @endphp

<table class="table table-hover">
    <thead>
        @foreach ($maintenances as $maintenance) 
            @php
                $isToday = \Carbon\Carbon::parse($maintenance->dateMaintenance)->isToday();
            @endphp

            @if ($maintenance->DureeReel == null || $maintenance->Rapport == null)
                @if($isToday && !$stopAlarmDisplayed)
                @if($maintenance->status == 'en_cours')

                @else
                    @if($button)
                        <button onclick="stopSound()" class="btn btn-danger mr-4 d-block" wire:click="cacheButton()">Stop Alarme</button>
                        <audio id ="notificationSound" src="{{asset('/path/zaza.mp3')}}" autoplay loop></audio>
                    @else
                        <audio id ="notificationSound" src="{{asset('/path/zaza.mp3')}}" style="display:none;"></audio>
                    @endif
                    @php
                        $stopAlarmDisplayed = true; // Empêcher l'affichage du bouton après la première occurrence
                    @endphp
                @endif
                @endif
            @endif
        @endforeach
        <tr class="text-center bg-light">
            <th class="text-center">Intervenant</th>
            <th class="text-center">Type</th>
            <th class="text-center">N° de Serie</th>
            <th class="text-center">Date</th>
            <th class="text-center">Durée Intervention</th>
            <th class="text-center">Durée réel</th>
            <th class="text-center">Rapport</th>
            @can("employe")
            <th class="text-center">Action</th>
            @endcan
        </tr>
    </thead>
    <tbody>
        @if ($input)
            <tr>
                <td colspan="2">
                    <label class="col-form-label">Durée Réel</label>
                    <input type="number" wire:model="editMaintenance.DureeReel" class="form-control">
                </td>
                <td colspan="2">
                    <label class="col-form-label">Rapport de maintenance pdf</label>
                    <input type="file" class="form-control" id="editImage{{$resetValueInput}}" wire:model="editImage">
                </td>
                <td colspan="3">
                    <div style="padding-top:36px;">
                        <button class="btn btn-primary" wire:click="updateInput">Enregistrer</button>
                        <button class="btn btn-danger" wire:click="cacheInput">Annuler</button>
                    </div>
                </td>
            </tr>
        @endif

        @forelse ($maintenances as $maintenance)
            @php
                $isToday = \Carbon\Carbon::parse($maintenance->dateMaintenance)->isToday();
                $isPast = \Carbon\Carbon::parse($maintenance->dateMaintenance)->isPast();
            @endphp
            @if ($maintenance->DureeReel == null || $maintenance->Rapport == null)
                @if($isToday)
                        @if($maintenance->status == 'en_cours')
                        <tr>
                        @else
                        <tr class="bg-warning text-white">
                        @endif
                        <td class="text-center">{{ $maintenance->intervenant_id }}</td>
                        <td class="text-center">{{ $maintenance->type }}</td>
                        <td class="text-center">{{ $maintenance->caracteristique_moteurs_id }}</td>
                        <td class="text-center">{{ date('d/m/Y', strtotime($maintenance->dateMaintenance)) }}</td>
                        <td class="text-center">{{ $maintenance->DureeIntervention }}</td>
                        <td class="text-center">
                            @if($maintenance->status == 'en_cours')
                                <span class="badge badge-success">En cours</span>
                            @else
                                <span class="badge badge-danger">Programmer</span>
                            @endif
                        </td>
                        <td class="text-center">
                            @if($maintenance->status == 'en_cours')
                                <span class="badge badge-success">En cours</span>
                            @else
                            <span class="badge badge-danger">Programmer</span>
                            @endif
                        </td>
                        <td>
                            <div class="btn-group">
                            @can("employe")
                            <button class="btn btn-link" wire:click="editTransaction({{ $maintenance->id }})" data-toggle="modal" data-target="#addModal">
                                <i class="far fa-edit"></i> Modifier
                            </button>
                            @endcan
                            @can("admin")
                            <button class="btn btn-danger" wire:click="confirmDelete({{ $maintenance->id }})">
                                <i class="far fa-trash-alt"></i> Supprimer
                            </button>
                            @endcan
                            @if($maintenance->status == 'en_cours')
                            @can('create', $maintenance)
                            <button class="btn btn-info" wire:click="editInput({{ $maintenance->id }})">Rapport</button>
                            @endcan   
                            @else
                            @can("employe")
                            <button class="btn btn-info" wire:click="startMaintenance({{ $maintenance->id }})">Lancer</button>
                            @endcan
                            @endif
                        </div>
                        </td>
                    </tr>
                    @elseif($isPast)
                    <tr>
                        <td class="text-center">{{ $maintenance->intervenant_id }}</td>
                        <td class="text-center">{{ $maintenance->type }}</td>
                        <td class="text-center">{{ $maintenance->caracteristique_moteurs_id }}</td>
                        <td class="text-center">{{ date('d/m/Y', strtotime($maintenance->dateMaintenance)) }}</td>

                        <td class="text-center">{{ $maintenance->DureeIntervention }}</td>
                        <td class="text-center">
                            @if($maintenance->status == 'en_cours')
                                <span class="badge badge-success">En cours</span>
                            @else
                            <span class="badge badge-primary">À exécuter</span>
                            @endif
                        </td>
                        <td class="text-center">
                            @if($maintenance->status == 'en_cours')
                                <span class="badge badge-success">En cours</span>
                            @else
                               <span class="badge badge-primary">À exécuter</span>
                            @endif
                        </td>
                        <td>
                            <div class="btn-group">
                                @can("employe")
                                <button class="btn btn-link" wire:click="editTransaction({{ $maintenance->id }})" data-toggle="modal" data-target="#addModal">
                                    <i class="far fa-edit"></i> Modifier
                                </button>
                                @endcan
                                @can("admin")
                                <button class="btn btn-danger" wire:click="confirmDelete({{ $maintenance->id }})">
                                    <i class="far fa-trash-alt"></i> Supprimer
                                </button>
                                @endcan
                                @if($maintenance->status == 'en_cours')
                                @can('create', $maintenance)
                                <button class="btn btn-info" wire:click="editInput({{ $maintenance->id }})">Rapport</button>
                                @endcan   
                                @else
                                @can("employe")
                                <button class="btn btn-info" wire:click="startMaintenance({{ $maintenance->id }})">Lancer</button>
                                @endcan
                                @endif
                            </div>
                        </td>
                    </tr>
                @else
                    <tr>
                        <td class="text-center">{{ $maintenance->intervenant_id }}</td>
                        <td class="text-center">{{ $maintenance->type }}</td>
                        <td class="text-center">{{ $maintenance->caracteristique_moteurs_id }}</td>
                        <td class="text-center">{{ date('d/m/Y', strtotime($maintenance->dateMaintenance)) }}</td>

                        <td class="text-center">{{ $maintenance->DureeIntervention }}</td>
                        <td class="text-center"><span class="badge badge-danger">Programmer</span></td>
                        <td class="text-center"><span class="badge badge-danger">Programmer</span></td>
                        <td>
                       
                        <div class="btn-group">
                        @can("employe")
                        <button class="btn btn-link" wire:click="editTransaction({{ $maintenance->id }})" data-toggle="modal" data-target="#addModal">
                            <i class="far fa-edit"></i> Modifier
                        </button>
                        @endcan
                        @can("admin")
                        <button class="btn btn-danger" wire:click="confirmDelete({{ $maintenance->id }})">
                            <i class="far fa-trash-alt"></i> Supprimer
                        </button>
                        @endcan
                    </div>
                           
                        </td>
                    </tr>
                @endif
            @else
                <tr>
                    <td class="text-center">{{ $maintenance->intervenant_id }}</td>
                    <td class="text-center">{{ $maintenance->type }}</td>
                    <td class="text-center">{{ $maintenance->caracteristique_moteurs_id }}</td>
                    <td class="text-center">{{ date('d/m/Y', strtotime($maintenance->dateMaintenance)) }}</td>

                    <td class="text-center">{{ $maintenance->DureeIntervention }}</td>
                    <td class="text-center">{{ $maintenance->DureeReel }}</td>
                    <td class="text-center">
                        <button class="btn btn-link" wire:click="selectDocument({{ $maintenance->id }})" data-toggle="modal" data-target="#pdfmodal">
                            <i class="fa fa-file-pdf" style="color:red;font-size:25px;"></i>
                        </button>
                    </td>
                    <td>
                    <div class="btn-group">
                    @can("employe")
                        <button class="btn btn-info" wire:click="editTransaction({{ $maintenance->id }})" data-toggle="modal" data-target="#addModal">
                            <i class="far fa-edit"></i> Modifier
                        </button>
                    @endcan
                    @can("admin")
                        <button class="btn btn-danger" wire:click="confirmDelete({{ $maintenance->id }})">
                            <i class="far fa-trash-alt"></i> Supprimer
                        </button>
                    @endcan
                    </div>
                    </td>
                </tr>
            @endif
        @empty
            <tr>
                <td colspan="7" class="text-center">Aucune maintenance trouvée.</td>
            </tr>
        @endforelse
    </tbody>
</table>

            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                {{ $maintenances->links() }}
            </div>
        </div>
    </div>
</div>

<!-- Modal pour ajouter une maintenance -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalLabel">Ajouter une Maintenance</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Contenu du formulaire pour ajouter une maintenance -->
                <form>
                    <!-- Ajoutez les champs nécessaires ici -->
                    <div class="form-group">
                        <label for="actionEntreprise">Action entreprise</label>
                        <input type="text" class="form-control" id="actionEntreprise" wire:model="newMaintenance.actionEntreprise" required>
                    </div>
                    <div class="form-group">
                        <label for="intervenant">Intervenant</label>
                        <input type="text" class="form-control" id="intervenant" wire:model="newMaintenance.intervenant" required>
                    </div>
                    <div class="form-group">
                        <label for="dureeIntervention">Durée intervention</label>
                        <input type="number" class="form-control" id="dureeIntervention" wire:model="newMaintenance.dureeIntervention" required>
                    </div>
                    <!-- Ajoutez d'autres champs selon vos besoins -->
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                <button type="button" class="btn btn-primary" wire:click="storeNewMaintenance">Ajouter Maintenance</button>
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
</div>
</div>
@endif
<script>
    function stopSound(){
      var sound = document.getElementById('notificationSound');
      sound.pause();
      sound.currentTime = 0;
    }
</script>

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
               @this.deleteMaintenance(event.detail.message.data.models_maintenance_id)
            }
        //    @this.resetPassword()
        }
        })
    })

</script>