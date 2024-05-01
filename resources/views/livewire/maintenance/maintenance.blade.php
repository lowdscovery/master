<div>
  
<div>
<div class="modal fade" id="addModal"tabindex="-1" role="dialog" aria-hidden="true" wire:ignore.self>
<div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ajout maintenance</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form wire:submit.prevent="addMaintenance">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Date</label>
            <input type="Date" class="form-control  @error("addMaintenance.dateMaintenance") is-invalid @enderror" wire:model="addMaintenance.dateMaintenance">
            @error("addMaintenance.dateMaintenance")
                          <span class="text-danger">{{$message}}</span>
            @enderror
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Intervenant</label>
           <select class="form-control @error("addIntervenant.intervenant") is-invalid @enderror" wire:model="addMaintenance.intervenant">
                @error("addIntervenant.intervenant")
                          <span class="text-danger">{{$message}}</span>
                 @enderror 
                    <option value="">---------</option>
                @foreach ($inters as $inter)
                    <option value="{{$inter->nom}} {{$inter->prenom}}">{{$inter->nom}} {{$inter->prenom}}</option>
                @endforeach       
           </select>
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Caracteristique</label>
            <select class="form-control @error("addMaintenance.caracteristique") is-invalid @enderror" wire:model="addMaintenance.caracteristique">
                @error("addMaintenance.caracteristique")
                          <span class="text-danger">{{$message}}</span>
                 @enderror 
                    <option value="">---------</option>
                    @foreach ($caracteristiques as $caracteristique)
                          <option value="{{$caracteristique->id}}">{{$caracteristique->ressources->nom}}</option>
                    @endforeach      
           </select>
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Action d'entreprise</label>
            <textarea class="form-control @error("addMaintenance.actionEntreprise") is-invalid @enderror" wire:model="addMaintenance.actionEntreprise">
            @error("addMaintenance.actionEntreprise")
                          <span class="text-danger">{{$message}}</span>
            @enderror 
            </textarea>
          </div>
        
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Enregistrer</button>
      </div>
      </form>
    </div>
  </div>
</div> 

<div class="modal fade" id="editModal" style="z-index: 1900;" tabindex="-1" role="dialog" aria-hidden="true" wire:ignore.self>
@includeIf("livewire.maintenance.edite")
</div>

                          
        

<div class="row p-4" >
 <div class="col-12">
     <div class="card">
  
         <div class="card-header bg-gradient-cyan d-flex align-items-center">
          <h3 class="card-title flex-grow-1"><i class="nav-icon fas fa-cogs"></i>Maintenance</h3>

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
                      <th class="text-center"> Date </th>
                      <th class="text-center"> Action entreprise </th>
                      <th class="text-center"> Intervenant </th>
                      <th class="text-center"> Forage</th>
                      <th class="text-center"> Action</th>
                    </tr>
                  </thead>
                  <tbody>                             
                @forelse ($maintenances as $maintenance)          
                    <tr>
                      <td class="text-center">{{ date('d/m/Y',strtotime($maintenance->dateMaintenance))}}</td>
                      <td class="text-center">{{ $maintenance->actionEntreprise}}</td>
                      <td class="text-center">{{ $maintenance->intervenant}}</td>
                      <td class="text-center">{{ $caracteristique->ressources->nom}}</td>
                      <td class="text-center">       
                    <div class="btn-group open">
                    <a class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                        <span class="fa fa-caret-down" title="Toggle dropdown menu"></span>
                    </a>
                    <ul class="dropdown-menu" style="padding:10px; z-index: 10;" >
                        <li><button class="btn btn-link" data-toggle="modal" data-target="#addModal"> <i class="fa fa-plus-circle"></i> Ajouter</button></li>
                        <li><button class="btn btn-link" wire:click="editMaintenance({{$maintenance->id}})" data-toggle="modal" data-target="#editModal"> <i class="far fa-edit"></i> Edit</button></li>
                        <li><button class="btn btn-link" wire:click="confirmDelete({{$maintenance->id}})"> <i class="far fa-trash-alt"></i> Delete</button></li>
                    </ul>
                    </div>
                      </td>
                    </tr>
                    @empty
                          <tr>
                              <td colspan="4">
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
                    {{ $maintenances->links() }}
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



