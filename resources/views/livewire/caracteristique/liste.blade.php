<div>
<div class="modal fade" id="modalProp" tabindex="-1" role="dialog" wire:ignore.self>
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Gestion des caracteristique </h5>

                </div>
                <div class="modal-body">
                   <div class="d-flex my-4 bg-gray-light p-3">
                        <div class="d-flex flex-grow-1 mr-2">
                            <div class="flex-grow-1 mr-2">
                                <input type="text" placeholder="Nom" class="form-control">
                                
                            </div>
                            <div class="flex-grow-1">
                                
                               
                            </div>
                        </div>
                        <div>
                        <button class="btn btn-success" >Ajouter</button>
                        </div>
                   </div>
                   <table class="table table-bordered">
                        <thead class="bg-primary">
                            <th>Nom</th>
                            <th>Est obligatoire</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            
                                <tr>
                                    <td>Nom</td>
                                    <td>OUI</td>
                                    <td>
                                        <button class="btn btn-link" > <i class="far fa-edit"></i> </button>

                                       
                                        <button class="btn btn-link" > <i class="far fa-trash-alt"></i> </button>
                                        
                                    </td>
                                </tr>
                          
                                <tr>
                                    <td colspan="3">
                                        <span class="text-info">Vous n'avez pas encore des propriétés définies pour ce type d'article</span>
                                    </td>
                                </tr>
                           
                        </tbody>
                   </table>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" wire:click="closeModal">Fermer</button>
                </div>
            </div>
        </div>
    </div>





<div class="row p-4 pt-5">
          <div class="col-12">
          <div class="bg-success col-2" style="border-radius: 5%;">
    <button class="btn btn-link" wire:loading.attr="disabled" wire:click.prevent="goToaddCaracteristique()" > <span class="brand-text font-weight-bold" style="color:white">Nouvel moteur</span></button>
        </div>
        <div wire:loading.delay wire:target="goToaddCaracteristique">
          <span class="text-green">Veuillez patienter...</span>
        </div>
          <br>
            <div class="card">
  
              <div class="card-header bg-gradient-gray d-flex align-items-center">
                <h3 class="card-title flex-grow-1"><i class="nav-icon fas fa-cogs"></i> Caracteristiques des moteurs</h3>

                <div class="card-tools d-flex align-items-center ">
                  <div class="input-group input-group-md" style="width: 250px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

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
                      <th style="width:20%;">Marque</th>
                      <th style="width:20%;" >Type</th>
                      <th style="width:20%;" class="text-center">Numero de serie</th>
                      <th style="width:20%;" class="text-center">Moteur</th>
                      <th style="width:20%;" class="text-center">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                   @foreach ($caracteristiques as $caracteristique)
              
                    <tr>
                      <td style="width:20%;">{{$caracteristique->marque}}</td>
                      <td style="width:20%;"> {{$caracteristique->type}}</td>
                      <td style="width:20%;" class="text-center"> {{$caracteristique->numeroSerie}}</td>
                      @if ($caracteristique->moteurs=="POMPE")
                         <td style="width:20%;" class="text-center"><span class="badge badge-success">Pompe</span></td>
                      @else
                         <td style="width:20%;" class="text-center"><span class="badge badge-warning">Electrique</span></td>
                      @endif

                      <td style="width:20%;" class="text-center">
                        <button class="btn btn-link" wire:click="goToEditCaract({{$caracteristique->id}})"> <i class="far fa-edit"></i> </button>                 
                        <button class="btn btn-link" wire:click="confirmDelete('{{ $caracteristique->marque }}', {{$caracteristique->id}})"> <i class="far fa-trash-alt"></i> </button>
                        <button class="btn btn-link" wire:click="showModal({{$caracteristique->id}})"> <i class="nav-icon fas fa-list-ul"></i> </button>

                       
                      </td>
                    </tr>
                @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <div class="float-right">
                  {{ $caracteristiques->links() }}
                </div>
              </div>
            </div>
            <!-- /.card -->
          </div>
        </div>
</div>
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
            //appel fuction livewire @  
                @this.deleteCaract(event.detail.message.data.caracteristique_moteur_id)
        }
        })

        
    })

    window.addEventListener("showSuccessMessage", event=>{
        Swal.fire({
                position: 'top-end',
                icon: 'success',
                toast:true,
                title: event.detail.message || "Opération effectuée avec succès!",
                showConfirmButton: false,
                timer: 2000
                }
            )
    })

</script>

<script>
    window.addEventListener("showModal", event=>{
       $('#modalProp').modal({
           "show": true,
           "backdrop": "static"
       })
    })
    window.addEventListener("closeModal", event=>{
       $("#modalProp").modal("hide")
    })s
</script>
