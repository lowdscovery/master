
<div>
<div class="modal fade" id="editModal" style="z-index: 1900;" tabindex="-1" role="dialog" aria-hidden="true" wire:ignore.self>
@include("livewire.pompe.edit")
</div> 
@foreach ($caracteristiques as $caracteristique) 
  
@if($caracteristique->moteurs=="POMPE")
 <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-hidden="true" wire:ignore.self>
@include("livewire.pompe.add")
</div>  
@else
<div class="modal fade" id="electriqueModal" tabindex="-1" role="dialog" aria-hidden="true" wire:ignore.self>
@include("livewire.electrique.add")
</div>           
@endif
@endforeach
    


                          
        

<div class="row p-4" >
 <div class="col-12">
     <div class="card">
  
         <div class="card-header bg-gradient-gray d-flex align-items-center">
          <h3 class="card-title flex-grow-1"><i class="nav-icon fas fa-cogs"></i> Caracteristiques des moteurs</h3>

            <div class="card-tools d-flex align-items-center ">
            <a class="btn btn-link text-white mr-4 d-block" wire:loading.attr="disabled" wire:click.prevent="goToaddCaracteristique()"><i class="nav-icon fas fa-cog"></i> Nouvel moteur</a>
            <div wire:loading.delay="" wire:target="goToaddCaracteristique">
               <span class="text-warning">Veuillez patienter...</span>
            </div>
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
                      <th style="width:20%;">Marque</th>
                      <th style="width:20%;">Type</th>
                      <th style="width:20%;" class="text-center">Numero de serie</th>
                      <th style="width:20%;" class="text-center">Moteur</th>
                      <th style="width:20%;" >Action</th>
                    </tr>
                  </thead>
                  <tbody>
                             
                   @forelse ($caracteristiques as $caracteristique)    
                    <tr>
                      <td style="width:20%;">{{ $caracteristique->marque }}</td>
                      <td style="width:20%;">{{ $caracteristique->type }}</td>
                      <td style="width:20%;" class="text-center"> {{ $caracteristique->numeroSerie }}</td>
                       @if($caracteristique->moteurs=="POMPE")
          <td style="width:20%;" class="text-center"><span class="badge badge-warning">POMPE</span></td>
                        @else
          <td style="width:20%;" class="text-center"><span class="badge badge-success">ELECTRIQUE</span></td>
                        @endif
                      
                      <td style="width:20%;">
          <button class="btn btn-link" wire:click="goToEditCaract({{$caracteristique->id}})"> <i class="far fa-edit"></i> </button>   
          @if($caracteristique->moteurs=="POMPE")
        <button class="btn btn-link" wire:click="showModal({{$caracteristique->id}})" data-bs-toggle="modal" data-bs-target="#exampleModal"> <i class="nav-icon fas fa-list-ul"></i> </button>     
          @else
        <button class="btn btn-link" wire:click="showModal({{$caracteristique->id}})" data-bs-toggle="modal" data-bs-target="#electriqueModal"> <i class="nav-icon fas fa-list-ul"></i> </button>      
          @endif    
          
          @if(count($caracteristique->pompes) == 0)         
          <button class="btn btn-link" wire:click="confirmDelete('{{$caracteristique->marque}}',{{$caracteristique->id}})"> <i class="far fa-trash-alt"></i> </button> 
          @endif              
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
                          </tr>
               @endforelse
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

</div>
 

</div>
</div>

<script>
    window.addEventListener("showSuccessMessage", event=>{
        Swal.fire({
                position: 'top-end',
                icon: 'success',
                toast:true,
                title: event.detail.message || "Caracteristique mis à jour avec succès!",
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
       if(event.detail.message.data.caracteristique_moteur_id){
               //appelle fonction livewire
                @this.deleteCaract(event.detail.message.data.caracteristique_moteur_id)
            }
            if(event.detail.message.data.moteur_pompe_id){
                @this.deleteModalPompe(event.detail.message.data.moteur_pompe_id)
            }
        }
        })
    })

</script>
