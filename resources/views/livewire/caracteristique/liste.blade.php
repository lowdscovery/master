@if ($affiche == AFFICHAGE)
  @include("livewire.affichage.affichage")
@else
  @include("livewire.caracteristique.card")
<div>
 
@foreach ($caracteristiques as $caracteristique) 
  
  <div class="modal fade" id="electrique" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" wire:ignore.self>
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-body">
        @include("livewire.electrique.add")
      </div>
      @if ($showInputPompe)
      @else
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" wire.click="cancel()">Close</button>
      </div>
       @endif
    </div>
  </div>
</div>


 <div class="modal fade mt-2" id="exampleModa" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" wire:ignore.self>
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-body">
        @include("livewire.pompe.add")
      </div>
      @if ($showInputPompe)
      @else
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" wire.click="cancel()">Close</button>
      </div>
      @endif
    </div>
  </div>
</div>
  


<div class="modal fade" id="doseuse" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" wire:ignore.self>
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-body">
        @include("livewire.doseuse.add")
      </div>
      @if ($inputDoseuse)
      @else
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" wire.click="">Close</button>
      </div>
      @endif
    </div>
  </div>
</div>  

@endforeach





    

<div class="row p-4" >
 <div class="col-12">
     <div class="card">
  
         <div class="card-header bg-gradient-gray d-flex align-items-center">
          <h3 class="card-title flex-grow-1"><i class="nav-icon fas fa-cogs"></i> Caracteristiques des materiels</h3>

            <div class="card-tools d-flex align-items-center ">
            <a  class="btn btn-primary mr-4 d-block" wire:loading.attr="disabled" wire:click.prevent="goToaddCaracteristique()" style="background-color:#00F2D8;"><i class="nav-icon fas fa-cog"></i> Nouvel moteur</a>
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
                      <th style="width:15%;">District</th>
                      <th style="width:15%;">Site</th>
                      <th style="width:15%;">Forage</th>
                      <th style="width:15%;">Type</th>
                      <th style="width:20%;" >Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                             
                   @forelse ($caracteristiques as $caracteristique)    
                    <tr>
                      <td style="width:15%;">{{ $caracteristique->districts->nom }}</td>
                      <td style="width:15%;">{{ $caracteristique->sites->nom }}</td>
                      <td style="width:15%;">{{ $caracteristique->ressources->nom }}</td>  
                      <td style="width:15%;">{{ $caracteristique->forages->nom }}</td>    
                      <td style="width:20%;">
        
        <div class="btn-group open">
          <a class="btn btn-info dropdown-toggle" data-toggle="dropdown">
              <span class="fa fa-caret-down" title="Toggle dropdown menu"></span>
          </a>
          <ul class="dropdown-menu" style="padding:10px; z-index: 10;" >
          @if (($caracteristique->forages->nom)=="Forage")
        <li><button class="btn btn-link" wire:click="showModal({{$caracteristique->id}})"  data-toggle="modal" data-target="#electrique"> <i class="far fa-edit"></i>Moteur</button></li>
        <li><button class="btn btn-link" wire:click="showModal({{$caracteristique->id}})" data-toggle="modal" data-target="#exampleModa"> <i class="fa fa-plus-circle"></i>Pompe</button></li>
          @elseif(($caracteristique->ressources->nom)=="GEPD DN 400" || ($caracteristique->ressources->nom)=="GEPD DN 300" || 
          ($caracteristique->ressources->nom)=="GEPD DN 250" && ($caracteristique->forages->nom)=="Bassin")
        <li><button class="btn btn-link" wire:click="showModal({{$caracteristique->id}})"  data-toggle="modal" data-target="#electrique"> <i class="far fa-edit"></i>Moteur</button></li>
        <li><button class="btn btn-link" wire:click="showModal({{$caracteristique->id}})" data-toggle="modal" data-target="#doseuse"> <i class="fa fa-plus-circle"></i>Doseuse</button></li>
          @endif
          </ul>
        </div>  
          @if(count($caracteristique->pompes)== 0 AND count($caracteristique->moteurs)== 0 AND count($caracteristique->doseuses)== 0)          
          <button class="btn btn-link" wire:click="confirmDelete('{{$caracteristique->marque}}',{{$caracteristique->id}})"> <i class="far fa-trash-alt"></i> </button>  
          @else
           <button class="btn btn-link" wire:click="affichage({{$caracteristique->id}})"> <i class="fa fa-eye"></i> </button>
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
                @this.deleteModalMoteur(event.detail.message.data.moteur_pompe_id)
            }
             if(event.detail.message.data.moteur_electrique_id){
                @this.deleteModalPompe(event.detail.message.data.moteur_electrique_id)
            }
            if(event.detail.message.data.doseuse_id){
                @this.deleteModalDoseuse(event.detail.message.data.doseuse_id)
            }
        }
        })
    })

</script>
@endif


