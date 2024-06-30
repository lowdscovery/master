
<div>
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-hidden="true" wire:ignore.self>
@include("livewire.Incident.create")
</div> 
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-hidden="true" wire:ignore.self>
@include("livewire.Incident.edit")
</div>

                          
        

<div class="row p-3 pt-2" >
 <div class="col-12">
     <div class="card">
  
         <div class="card-header d-flex align-items-center" style="background-color:#009BFF;">
          <h3 class="card-title flex-grow-1" style="color:white;"><i class="nav-icon fas fa-cogs"></i>Liste d'incident</h3>

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
                      <th class="text-center">Date</th>
                      <th class="text-center">Index CH</th>
                      <th class="text-center">Heure</th>
                      <th class="text-center">Nature</th>
                      <th class="text-center"> Cause </th>
                      <th class="text-center"> Action </th>
                      <th class="text-center"> Resultat </th>
                      <th class="text-center"> Action2 </th>
                    </tr>
                  </thead>
                  <tbody>                             
                 @forelse ($transactions as $incident)
                    <tr>
                      <td class="text-center">{{date('d-m-Y',strtotime($incident->dateIncident))}}</td>
                      <td class="text-center">{{$incident->indexCH}}</td>
                      <td class="text-center">{{$incident->heure}} </td>
                      <td class="text-center">{{$incident->natureIncident}} </td>
                      <td class="text-center">{{$incident->cause}} </td>
                      <td class="text-center"> {{$incident->action}}</td>
                      <td class="text-center"> {{$incident->resultat}}</td>    
                      <td class="text-center">
                      
                    <div class="btn-group open">
                    <a class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                        <span class="fa fa-caret-down" title="Toggle dropdown menu"></span>
                    </a>
                    <ul class="dropdown-menu" style="padding:10px; z-index: 10;" >
                        <li><button class="btn btn-link" data-toggle="modal" data-target="#addModal"> <i class="fa fa-plus-circle"></i> Ajouter</button></li>
                        <li><button class="btn btn-link" wire:click="editTransaction({{$incident->id}})" data-toggle="modal" data-target="#addModal"> <i class="far fa-edit"></i> Edit</button></li>
                        <li><button class="btn btn-link" wire:click="confirmDelete({{$incident->id}})"> <i class="far fa-trash-alt"></i> Delete</button></li>
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
                            <td class="text-center">
                                
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
                 {{ $transactions->links() }}
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

