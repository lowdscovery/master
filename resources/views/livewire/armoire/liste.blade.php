  @if($currentPage == PAGECREATEFORM)
         @include("livewire.armoire.create")
    @endif

    @if($currentPage == PAGEEDITFORM)
        @include("livewire.armoire.edit")
    @endif

    @if($currentPage == PAGELIST)
<div class="row p-4" >
 <div class="col-12">
     <div class="card">
        
         <div class="card-header bg-gradient-cyan d-flex align-items-center">
          <h3 class="card-title flex-grow-1"><i class="nav-icon fas fa-cogs"></i>Armoire de commande</h3>
            <div class="card-tools d-flex align-items-center ">
                      
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
                      <th class="text-center"> Repere</th>
                      <th class="text-center"> Designation</th>
                      <th class="text-center"> Marque</th>
                      <th class="text-center"> Type</th>
                      <th class="text-center"> Reglage</th>
                      <th class="text-center"> Date de Pose</th>
                      <th class="text-center"> Action</th>
                    </tr>
                  </thead>
                  <tbody>                             
                @forelse ($armoires as $armoire)          
                    <tr>
                      <td class="text-center">{{ $armoire->repere}}</td>
                      <td class="text-center">{{ $armoire->designation}}</td>
                      <td class="text-center">{{ $armoire->marque}}</td>
                      <td class="text-center">{{ $armoire->type}}</td>
                      <td class="text-center">{{ $armoire->reglage}}</td>
                      <td class="text-center">{{ $armoire->datePose}}</td>
                      <td class="text-center">       
                    <div class="btn-group open">
                    <a class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                        <span class="fa fa-caret-down" title="Toggle dropdown menu"></span>
                    </a>
                    <ul class="dropdown-menu" style="padding:10px; z-index: 10;" >
                        <li><button class="btn btn-link" wire:click="goToAddArmoire"> <i class="fa fa-plus-circle"></i> Ajouter</button></li>
                        <li><button class="btn btn-link" wire:click="showupdateArmoire({{$armoire->id}})" data-toggle="modal" data-target="#editModal"> <i class="far fa-edit"></i> Edit</button></li>
                        <li><button class="btn btn-link" wire:click="confirmDelete({{$armoire->id}})"> <i class="far fa-trash-alt"></i> Delete</button></li>
                    </ul>
                    </div>
                      </td>
                    </tr>
                    @empty
                          <tr>
                              <td colspan="6">
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
                            <li><button class="btn btn-link" wire:click="goToAddArmoire"> <i class="fa fa-plus-circle"></i> Ajouter</button></li>
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
                    {{ $armoires->links() }}
                </div>
            </div>
</div>
 <!-- /.card -->
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
               @this.deleteArmoire(event.detail.message.data.models_armoire_id)
            }
        //    @this.resetPassword()
        }
        })
    })

</script>



