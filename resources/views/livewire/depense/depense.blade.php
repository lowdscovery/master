<div>
<div>
<div class="modal fade" id="addModal"tabindex="-1" role="dialog" aria-hidden="true" wire:ignore.self>
<div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ajout depense</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form wire:submit.prevent="addDepense">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Date</label>
            <input type="Date" class="form-control  @error("addDepense.Date") is-invalid @enderror" wire:model="addDepense.Date" required="required">
            @error("addDepense.Date")
                          <span class="text-danger">{{$message}}</span>
            @enderror
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Motif</label>
          <input type="text" class="form-control  @error("addDepense.Motif") is-invalid @enderror" wire:model="addDepense.Motif" placeholder="Motif" required="required">
            @error("addDepense.Motif")
                          <span class="text-danger">{{$message}}</span>
            @enderror
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Designation</label>
            <input type="text" class="form-control  @error("addDepense.Designation") is-invalid @enderror" wire:model="addDepense.Designation" placeholder="Designation" required="required">
            @error("addDepense.Designation")
                          <span class="text-danger">{{$message}}</span>
            @enderror
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Unité</label>
            <input type="text" class="form-control  @error("addDepense.Unite") is-invalid @enderror" wire:model="addDepense.Unite" placeholder="Unité" required="required">
            @error("addDepense.Unite")
                          <span class="text-danger">{{$message}}</span>
            @enderror
          </div>
          <div class="d-flex">
          <div class="form-group flex-grow-1 mr-2">
            <label for="message-text" class="col-form-label">Prix Unitaire</label>
            <input type="number" class="form-control  @error("addDepense.PrixUnitaire") is-invalid @enderror" wire:model="addDepense.PrixUnitaire" placeholder="Prix Unitaire" required="required">
            @error("addDepense.PrixUnitaire")
                          <span class="text-danger">{{$message}}</span>
            @enderror
          </div>
          <div class="form-group flex-grow-1">
            <label for="message-text" class="col-form-label">Quantite</label>
            <input type="number" class="form-control  @error("addDepense.Quantite") is-invalid @enderror" wire:model="addDepense.Quantite" placeholder="Quantité" required="required">
            @error("addDepense.Quantite")
                          <span class="text-danger">{{$message}}</span>
            @enderror
          </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Enregistrer</button>
      </div>
      </form>
    </div>
  </div>
</div> 

<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-hidden="true" wire:ignore.self>
@include("livewire.depense.edit")
</div>        

@if ($impression)
 @include("livewire.depense.impression") 
@else
  
<div class="row p-2" >
 <div class="col-12">
     <div class="card">
        
         <div class="card-header d-flex align-items-center" style="background-color:#785DF0;">
          <h3 class="card-title flex-grow-1" style="color:white;"><i class="nav-icon fas fa-cogs"></i>Depense</h3>
            <div class="card-tools d-flex align-items-center ">
      <a wire:click.prevent="showImpression()" class="btn btn-default mr-4 d-block" rel="noopener" target="_blank"><i class="fas fa-print"></i> Imprimer</a>
      <label for="filtreType" class="mr-2 d-block" style="color:white;">Filtrer par date </label>
                <div class="input-group input-group-md" style="width: 250px;">
            <input type="date" name="table_search" wire:model.debounce.250ms="datedebut" class="form-control float-right mr-4 d-block" placeholder="Search">
                 </div>
            <div class="input-group-append">
            <input type="date" wire:model.debounce.250ms="datefin" class="form-control float-right">
                    </div>
                 
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0 table-striped" style="max-height: 400px;">
                <table class="table table-head-fixed">
                  <thead>
                    <tr>
                      <th class="text-center"> Date</th>
                      <th class="text-center"> Motif</th>
                      <th class="text-center"> Designation</th>
                      <th class="text-center"> Unite</th>
                      <th class="text-center"> PrixUnitaire</th>
                      <th class="text-center"> Quantite</th>
                       <th class="text-center"> Total</th>
                      <th class="text-center"> Action</th>
                    </tr>
                  </thead>
                  <tbody>               
                @forelse ($depenses as $depense)      
                    <tr>
                        <td class="text-center">{{date('d-m-Y',strtotime($depense->Date))}}</td>
                        <td class="text-center">{{ $depense->Motif}}</td>
                        <td class="text-center">{{ $depense->Designation}}</td>
                        <td class="text-center">{{ $depense->Unite}}</td>
                        <td class="text-center">{{ $depense->PrixUnitaire}}</td>
                        <td class="text-center">{{ $depense->Quantite}}</td>
                        <td class="text-center">{{ $depense->Total}}</td>
                        <td>       
                        <div class="btn-group open">
                        <a class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                            <span class="fa fa-caret-down" title="Toggle dropdown menu"></span>
                        </a>
                        <ul class="dropdown-menu" style="padding:10px; z-index: 10;" >
                        @can('create', $depense)
                            <li><button class="btn btn-link" data-toggle="modal" data-target="#addModal"> <i class="fa fa-plus-circle"></i> Ajouter</button></li>
                         @endcan
                            <li><button class="btn btn-link" wire:click="editDepense({{$depense->id}})" data-toggle="modal" data-target="#editModal"> <i class="far fa-edit"></i> Edit</button></li>
                            @can('delete', $depense)
                            <li><button class="btn btn-link" wire:click="confirmDelete({{$depense->id}})"> <i class="far fa-trash-alt"></i> Delete</button></li>
                            @endcan
                        </ul>
                        </div>
                          </td>
                    </tr>
                  
                    @empty
                          <tr>
                              <td colspan="7">
                                  <div class="alert alert-danger">
                                      <h5><i class="icon fas fa-ban"></i> Information!</h5>
                                      Aucune donnée trouvée par rapport aux éléments de recherche entrés.
                                    </div>
                              </td>
                      <td>
                        <div class="btn-group open">
                        <a class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                            <span class="fa fa-caret-down" title="Toggle dropdown menu"></span>
                        </a>
                        <ul class="dropdown-menu" style="padding:10px; z-index: 10;" >
                            <li><button class="btn btn-link" data-toggle="modal" data-target="#addModal"> <i class="fa fa-plus-circle"></i> Ajouter</button></li>
                        </ul>
                        </div>
                    </td>
                          </tr>
                  @endforelse
               </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <div class="float-right">
                   
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
               @this.deleteDepense(event.detail.message.data.models_depense_id)
            }
        //    @this.resetPassword()
        }
        })
    })

</script>



