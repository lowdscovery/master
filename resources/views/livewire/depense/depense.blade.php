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
            <input type="Date" class="form-control  @error("addDepense.Date") is-invalid @enderror" wire:model="addDepense.Date">
            @error("addDepense.Date")
                          <span class="text-danger">{{$message}}</span>
            @enderror
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Motif</label>
          <input type="text" class="form-control  @error("addDepense.Motif") is-invalid @enderror" wire:model="addDepense.Motif" placeholder="Motif">
            @error("addDepense.Motif")
                          <span class="text-danger">{{$message}}</span>
            @enderror
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Designation</label>
            <input type="text" class="form-control  @error("addDepense.Designation") is-invalid @enderror" wire:model="addDepense.Designation" placeholder="Designation">
            @error("addDepense.Designation")
                          <span class="text-danger">{{$message}}</span>
            @enderror
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Unité</label>
            <input type="text" class="form-control  @error("addDepense.Unite") is-invalid @enderror" wire:model="addDepense.Unite" placeholder="Unité">
            @error("addDepense.Unite")
                          <span class="text-danger">{{$message}}</span>
            @enderror
          </div>
          <div class="d-flex">
          <div class="form-group flex-grow-1 mr-2">
            <label for="message-text" class="col-form-label">Prix Unitaire</label>
            <input type="text" class="form-control  @error("addDepense.PrixUnitaire") is-invalid @enderror" wire:model="addDepense.PrixUnitaire" placeholder="Prix Unitaire">
            @error("addDepense.PrixUnitaire")
                          <span class="text-danger">{{$message}}</span>
            @enderror
          </div>
          <div class="form-group flex-grow-1">
            <label for="message-text" class="col-form-label">Quantite</label>
            <input type="text" class="form-control  @error("addDepense.Quantite") is-invalid @enderror" wire:model="addDepense.Quantite" placeholder="Quantité">
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
 @include("livewire.depense.imprimer") 
@else
  
<div class="row p-4" >
 <div class="col-12">
     <div class="card">
        
         <div class="card-header bg-gradient-cyan d-flex align-items-center">
          <h3 class="card-title flex-grow-1"><i class="nav-icon fas fa-cogs"></i>Depense</h3>
            <div class="card-tools d-flex align-items-center ">
      <a wire:loading.attr="disabled" wire:click.prevent="showImpression()" class="btn btn-primary mr-4 d-block" style="background-color:#00F2D8;"><i class="fas fa-user-plus"></i> Imprimer</a>
                <div class="input-group input-group-md" style="width: 250px;">
            <input type="text" name="table_search" wire:model.debounce.250ms="search" class="form-control float-right" placeholder="Search">

            <div class="input-group-append">
             <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                    </div>
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
                        <td class="text-center">{{ $depense->Date}}</td>
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
                            <li><button class="btn btn-link" data-toggle="modal" data-target="#addModal"> <i class="fa fa-plus-circle"></i> Ajouter</button></li>
                            <li><button class="btn btn-link" wire:click="editDepense({{$depense->id}})" data-toggle="modal" data-target="#editModal"> <i class="far fa-edit"></i> Edit</button></li>
                            <li><button class="btn btn-link" wire:click="confirmDelete({{$depense->id}})"> <i class="far fa-trash-alt"></i> Delete</button></li>
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
                    {{ $depenses->links() }}
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



