<div>
<div>
<div class="modal fade" id="addModal"tabindex="-1" role="dialog" aria-hidden="true" wire:ignore.self>
<div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ajout rapport de mission</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form wire:submit.prevent="addRapport">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Date debut</label>
            <input type="Date" class="form-control  @error("addRapport.dateDebut") is-invalid @enderror" wire:model="addRapport.dateDebut">
            @error("addRapport.dateDebut")
                          <span class="text-danger">{{$message}}</span>
            @enderror
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Intervenant</label>
           <select class="form-control @error("addIntervenant.intervenant_id") is-invalid @enderror" wire:model="addRapport.intervenant_id">
                @error("addIntervenant.intervenant_id")
                          <span class="text-danger">{{$message}}</span>
                 @enderror 
                    <option value="">---------</option>
               @foreach ($inters as $inter)
                    <option value="{{$inter->nom}} {{$inter->prenom}}">{{$inter->nom}} {{$inter->prenom}}</option>
                @endforeach      
           </select>
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Lieu</label>
            <input type="text" class="form-control  @error("addRapport.lieu") is-invalid @enderror" wire:model="addRapport.lieu" placeholder="Lieu">
            @error("addRapport.lieu")
                          <span class="text-danger">{{$message}}</span>
            @enderror
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Motif</label>
            <textarea class="form-control @error("addRapport.motif") is-invalid @enderror" wire:model="addRapport.motif" placeholder="Rapport">
            @error("addRapport.motif")
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

<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-hidden="true" wire:ignore.self>
@include("livewire.rapport.edite")
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
            <iframe src="{{ asset($selectedDocument->rapport)}}" width="100%" height="600px"></iframe>
            @endif
   </form>
    </div>
  </div>
</div> 
</div>
                          
        

<div class="row p-3" >
 <div class="col-12">
     <div class="card">
        
         <div class="card-header d-flex align-items-center" style="background-color:#E54400;">
          <h3 class="card-title flex-grow-1" style="color:white;"><i class="nav-icon fas fa-cogs"></i>Rapport de mission</h3>
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
                      <th class="text-center"> Date debut</th>
                      <th class="text-center"> Date fin</th>
                      <th class="text-center"> Intervenants</th>
                      <th class="text-center"> Lieu</th>
                      <th class="text-center"> Motifs</th>
                      <th class="text-center"> Rapports</th>
                      <th class="text-center"> Action</th>
                    </tr>
                  </thead>
                  <tbody>
                   @if ($input)
                        <tr>
                          <td colspan="2">
                          <label class="col-form-label">Date Fin</label>
                            <input type="date" wire:model="editRapport.dateFin" class="form-control" required>
                          </td>
                          <td colspan="3">
                          <label class="col-form-label">Rapport de mission</label>
                            <input type="file" class="form-control" id="editImage{{$resetValueInput}}" required wire:model="editImage">
                          </td>
                          <td colspan="2">
                             <div style="padding-top:36px;">
                            <button class="btn btn-primary" wire:click="updateInput">Enregistrer</button>
                             <button class="btn btn-danger" wire:click="cacheInput">Annuler</button>
                             </div>
                          </td>
                        </tr>
                      @endif                             
                @forelse ($rapports as $rapport)      
                @if ($rapport->dateFin==null || $rapport->rapport==null)
                    <tr style="color:red;">
                        <td class="text-center">{{ date('d-m-Y',strtotime($rapport->dateDebut))}}</td>
                        <td class="text-center" style="color:black;"><i class="fa fa-spinner fa-2x fa-fw"></i></td>
                        <td class="text-center">{{ $rapport->intervenant_id}}</td>
                        <td class="text-center">{{ $rapport->lieu}}</td>
                        <td class="text-center">{{ $rapport->motif}}</td>
                        <td class="text-center" style="color:black;"><i class="fa fa-spinner fa-2x fa-fw"></i></td>
                        <td>       
                        <div class="btn-group open">
                        <a class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                            <span class="fa fa-caret-down" title="Toggle dropdown menu"></span>
                        </a>
                        <ul class="dropdown-menu" style="padding:10px; z-index: 10;" >
                            @can('create',$rapport)
                            <li><button class="btn btn-link" data-toggle="modal" data-target="#addModal"> <i class="fa fa-plus-circle"></i> Ajouter</button></li>
                            @endcan
                            <li><button class="btn btn-link" wire:click="editRapport({{$rapport->id}})" data-toggle="modal" data-target="#editModal"> <i class="far fa-edit"></i> Edit</button></li>
                            @can('delete',$rapport)
                            <li><button class="btn btn-link" wire:click="confirmDelete({{$rapport->id}})"> <i class="far fa-trash-alt"></i> Delete</button></li>
                            @endcan
                        </ul>
                        </div>
                        @can('create',$rapport)
                        <button class="btn btn-success" wire:click="editInput({{$rapport->id}})"> Rapport</button>
                        @endcan
                          </td>
                    </tr>
                 @else
                    <tr>
                      <td class="text-center">{{  date('d-m-Y',strtotime($rapport->dateDebut))}}</td>
                      <td class="text-center">{{  date('d-m-Y',strtotime($rapport->dateFin))}}</td>
                      <td class="text-center">{{ $rapport->intervenant_id}}</td>
                      <td class="text-center">{{ $rapport->lieu}}</td>
                      <td class="text-center">{{ $rapport->motif}}</td>
                      <td class="text-center">
                      <button class="btn btn-link" wire:click="selectDocument({{$rapport->id}})" data-toggle="modal" data-target="#pdfmodal"> <i class="fa fa-file-pdf"  style="color:red;font-size:25px;"></i></button>
                      </td>
                      <td>       
                    <div class="btn-group open">
                    <a class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                        <span class="fa fa-caret-down" title="Toggle dropdown menu"></span>
                    </a>
                    <ul class="dropdown-menu" style="padding:10px; z-index: 10;" >
                        @can('create',$rapport)
                        <li><button class="btn btn-link" data-toggle="modal" data-target="#addModal"> <i class="fa fa-plus-circle"></i> Ajouter</button></li>
                        @endcan
                        <li><button class="btn btn-link" wire:click="editRapport({{$rapport->id}})" data-toggle="modal" data-target="#editModal"> <i class="far fa-edit"></i> Edit</button></li>
                        @can('delete',$rapport)
                        <li><button class="btn btn-link" wire:click="confirmDelete({{$rapport->id}})"> <i class="far fa-trash-alt"></i> Delete</button></li>
                        @endcan
                    </ul>
                    </div>
                      </td>
                    </tr>
                  @endif    
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
                    {{ $rapports->links() }}
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
               @this.deleteRapport(event.detail.message.data.models_rapport_id)
            }
        //    @this.resetPassword()
        }
        })
    })

</script>



