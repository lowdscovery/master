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
        <form wire:submit.prevent="ajoutMaintenance">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Date</label>
            <input type="Date" class="form-control  @error("addMaintenance.dateMaintenance") is-invalid @enderror" wire:model="addMaintenance.dateMaintenance">
            @error("addMaintenance.dateMaintenance")
                          <span class="text-danger">{{$message}}</span>
            @enderror
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Intervenant</label>
           <select class="form-control @error("addIntervenant.intervenant_id") is-invalid @enderror" wire:model="addMaintenance.intervenant_id">
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
            <label for="recipient-name" class="col-form-label">Duree Intervention</label>
            <input type="number" class="form-control  @error("addMaintenance.DureeIntervention") is-invalid @enderror" wire:model="addMaintenance.DureeIntervention">
            @error("addMaintenance.DureeIntervention")
                          <span class="text-danger">{{$message}}</span>
            @enderror
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Caracteristique</label>
            <select class="form-control @error("addMaintenance.caracteristique_moteurs_id") is-invalid @enderror" wire:model="addMaintenance.caracteristique_moteurs_id">
                @error("addMaintenance.caracteristique_moteurs_id")
                          <span class="text-danger">{{$message}}</span>
                 @enderror 
                    <option value="">---------</option>
                    @foreach ($caracteristiques as $caracteristique)
                          <option value="{{$caracteristique->ressources->nom}}">{{$caracteristique->ressources->nom}}</option>
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

<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-hidden="true" wire:ignore.self>
@includeIf("livewire.maintenance.edite")
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
        

<div class="row p-2" >
 <div class="col-12">
 
 <div class="content py-2">
<section class="content">
<div class="container-fluid">
<div class="row">
<div class="col-md-8 offset-md-2">
<form action="simple-results.html">
<div class="input-group">
<input type="text" class="form-control form-control-lg" wire:model.debounce.250ms="search" placeholder="Recherche">
<div class="input-group-append">
<button type="submit" class="btn btn-lg btn-default">
<i class="fa fa-search"></i>
</button>
</div>
</div>
</form>
</div>
</div>
</div>
</section>
</div>

     <div class="card">
        
         <div class="card-header d-flex align-items-center" style="background-color:#009BFF;">
          <h3 class="card-title flex-grow-1" style="color:white;"><i class="nav-icon fas fa-cogs"></i>Maintenance</h3>
            <div class="card-tools d-flex align-items-center ">

                <div class="input-group input-group-md" style="width: 250px;">

                  <label class="mr-1" style="color:white;font-size:20px;">Par page</label>
                <div class="card-tools d-flex align-items-center ">
                  <div class="float-right">         
                    <select class="form-control" wire:model.live="perPage"> 
                     <option value="5">5</option>
                     <option value="10">10</option>
                     <option value="50">50</option>
                   </select>
                  </div>
                </div>

                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0 table-striped" style="max-height: 450px;">
                <table class="table table-head-fixed">
                  <thead>
                    <tr>
                      <th class="text-center" style="width:10%;"> Date </th>
                      <th class="text-center" style="width:20%;"> Action entreprise </th>
                      <th class="text-center" style="width:20%;"> Intervenant </th>
                      <th class="text-center" style="width:10%;"> Duree intervention </th>
                      <th class="text-center" style="width:10%;"> Duree reel </th>
                      <th class="text-center" style="width:5%;"> Rapport </th>
                      <th class="text-center" style="width:5%;"> Forage</th>
                      <th class="text-center" style="width:20%;"> Action</th>
                    </tr>
                  </thead>
                  <tbody>

                      @if ($input)
                        <tr>
                          <td colspan="3">
                          <label class="col-form-label">Durée Réel</label>
                            <input type="number" wire:model="editMaintenance.DureeReel" class="form-control" required>
                          </td>
                          <td colspan="3">
                          <label class="col-form-label">Rapport de maintenance pdf</label>
                            <input type="file" class="form-control" id="editImage{{$resetValueInput}}" required wire:model="editImage">
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
                            @endphp
                            @if ($maintenance->DureeReel==null || $maintenance->Rapport==null)
                             @if($isToday)
                               <tr class="bg-success text-white">
                                  @if($button)
                                  <button onclick="stopSound()" class="btn btn-danger mr-4 d-block" wire:click="cacheButton()">Stop Alarme</button>
                                  <audio id ="notificationSound" src="{{asset('/path/zaza.mp3')}}" autoplay loop></audio>
                                  @else
                                  <audio id ="notificationSound" src="{{asset('/path/zaza.mp3')}}" style="display:none;"></audio>
                                  @endif
                                  <td class="text-center" style="width:10%;">{{ date('d/m/Y',strtotime($maintenance->dateMaintenance))}}</td>
                                  <td class="text-center" style="width:20%;">{{ $maintenance->actionEntreprise}}</td>
                                  <td class="text-center" style="width:20%;">{{ $maintenance->intervenant_id}}</td>
                                  <td class="text-center" style="width:10%;">{{ $maintenance->DureeIntervention}}</td>
                                  <td class="text-center" style="color:black;width:10%;"><i class="fa fa-spinner fa-2x fa-fw"></i></td>
                                  <td class="text-center" style="color:black;width:5%;"><i class="fa fa-spinner fa-2x fa-fw"></i></td>                        
                                  <td class="text-center" style="width:5%;">{{ $maintenance->caracteristique_moteurs_id}}</td>
                                  <td style="width:20%;">       
                                <div class="btn-group open">
                                <a class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                                    <span class="fa fa-caret-down" title="Toggle dropdown menu"></span>
                                </a>
                                <ul class="dropdown-menu" style="padding:10px; z-index: 10;" >
                                    @can('create',$maintenance)
                                    <li><button class="btn btn-link" data-toggle="modal" data-target="#addModal"> <i class="fa fa-plus-circle"></i> Ajouter</button></li>
                                    @endcan
                                    <li><button class="btn btn-link" wire:click="editMaintenance({{$maintenance->id}})" data-toggle="modal" data-target="#editModal"> <i class="far fa-edit"></i> Edit</button></li>
                                    @can('delete',$maintenance)
                                    <li><button class="btn btn-link" wire:click="confirmDelete({{$maintenance->id}})"> <i class="far fa-trash-alt"></i> Delete</button></li>
                                    @endcan
                                </ul>
                                </div>
                                @can('create',$maintenance)
                                <button class="btn btn-warning" wire:click="editInput({{$maintenance->id}})"> Rapport</button>
                                @endcan
                                </td>
                              </tr>
                             @else
                              <tr style="color:red;">
                                  <td class="text-center" style="width:10%;">{{ date('d/m/Y',strtotime($maintenance->dateMaintenance))}}</td>
                                  <td class="text-center" style="width:20%;">{{ $maintenance->actionEntreprise}}</td>
                                  <td class="text-center" style="width:20%;">{{ $maintenance->intervenant_id}}</td>
                                  <td class="text-center" style="width:10%;">{{ $maintenance->DureeIntervention}}</td>
                                  <td class="text-center" style="color:black;width:10%;"><i class="fa fa-spinner fa-2x fa-fw"></i></td>
                                  <td class="text-center" style="color:black;width:5%;"><i class="fa fa-spinner fa-2x fa-fw"></i></td>                        
                                  <td class="text-center" style="width:5%;">{{ $maintenance->caracteristique_moteurs_id}}</td>
                                  <td style="width:20%;">       
                                <div class="btn-group open">
                                <a class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                                    <span class="fa fa-caret-down" title="Toggle dropdown menu"></span>
                                </a>
                                <ul class="dropdown-menu" style="padding:10px; z-index: 10;" >
                                   @can('create',$maintenance)
                                    <li><button class="btn btn-link" data-toggle="modal" data-target="#addModal"> <i class="fa fa-plus-circle"></i> Ajouter</button></li>
                                    @endcan
                                    <li><button class="btn btn-link" wire:click="editMaintenance({{$maintenance->id}})" data-toggle="modal" data-target="#editModal"> <i class="far fa-edit"></i> Edit</button></li>
                                    @can('delete',$maintenance)
                                    <li><button class="btn btn-link" wire:click="confirmDelete({{$maintenance->id}})"> <i class="far fa-trash-alt"></i> Delete</button></li>
                                    @endcan
                                </ul>
                                </div>
                                @can('create',$maintenance)
                                <button class="btn btn-warning" wire:click="editInput({{$maintenance->id}})"> Rapport</button>
                                @endcan
                                </td>
                              </tr>
                              @endif
                            @else
                              <tr>
                                    <td class="text-center" style="width:10%;">{{ date('d/m/Y',strtotime($maintenance->dateMaintenance))}}</td>
                                      <td class="text-center" style="width:20%;">{{ $maintenance->actionEntreprise}}</td>
                                      <td class="text-center" style="width:20%;">{{ $maintenance->intervenant_id}}</td>
                                      <td class="text-center" style="width:10%;">{{ $maintenance->DureeIntervention}}</td>
                                      <td class="text-center" style="width:10%;">{{ $maintenance->DureeReel}}</td>
                                      <td class="text-center" style="width:5%;">
                                      <button class="btn btn-link" wire:click="selectDocument({{$maintenance->id}})" data-toggle="modal" data-target="#pdfmodal"> <i class="fa fa-file-pdf"  style="color:red;font-size:25px;"></i></button>        
                                      </td>
                                      <td class="text-center" style="width:5%;">{{ $maintenance->caracteristique_moteurs_id}}</td>  
                                    <td style="width:20%;">       
                                    <div class="btn-group open">
                                    <a class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                                      <span class="fa fa-caret-down" title="Toggle dropdown menu"></span>
                                    </a>
                                    <ul class="dropdown-menu" style="padding:10px; z-index: 10;" >
                                    @can('create',$maintenance)
                                        <li><button class="btn btn-link" data-toggle="modal" data-target="#addModal"> <i class="fa fa-plus-circle"></i> Ajouter</button></li>
                                      @endcan
                                        <li><button class="btn btn-link" wire:click="editMaintenance({{$maintenance->id}})" data-toggle="modal" data-target="#editModal"> <i class="far fa-edit"></i> Edit</button></li>
                                        @can('delete',$maintenance)
                                        <li><button class="btn btn-link" wire:click="confirmDelete({{$maintenance->id}})"> <i class="far fa-trash-alt"></i> Delete</button></li>
                                        @endcan
                                    </ul>
                                    </div>
                                    </td>
                                </tr>
                            @endif
                            
                      @empty
                        <tr>
                            <td colspan="7">
                                <div class="alert alert-danger">
                                    <h5><i class="icon fas fa-ban"></i> Information!</h5>
                                    Aucune donnée trouvée par rapport aux éléments de recherche entrés.
                                  </div>
                            </td>
                            <td class="text-center" style="width:20%;">
                           
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
              <!-- /.card-body   -->
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



