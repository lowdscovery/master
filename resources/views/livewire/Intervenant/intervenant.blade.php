   
    <div wire:ignore.self>

   

     
    @if ($info == UPDATEINTERVENANT)
    @include("livewire.Intervenant.update")
    @elseif($card==CARDINTERVENANT)
    @include("livewire.Intervenant.card")
    @else

    <div class="modal fade" id="addModal"tabindex="-1" role="dialog" aria-hidden="true" wire:ignore.self>
        @include("livewire.Intervenant.information")
    </div>
    </div>
    <div class="row p-2 pt-3">
    <div class="col-md-5">
       
        <div class="card">
            <div class="card-header" style="background-color:#05B2FF;">
            <h1 class="card-title" style="color:white;"><i class="fas fa-user-plus fa-2x"></i> Formulaire d'ajout intervenants</h1>
            </div>
            
            <form wire:submit.prevent="AjoutIntervenant">
            <div class="card-body">               
                    <div class="form-group">
                        <label >Nom</label>
                        <input type="text"  class="form-control @error("addIntervenant.nom") is-invalid @enderror" wire:model="addIntervenant.nom" required="required" placeholder="Nom" pattern="[A-Z]+" title="Le nom doit être en majuscule"> 
                      @error("addIntervenant.nom")
                          <span class="text-danger">{{$message}}</span>
                      @enderror   
                    </div>
                    <div class="form-group">
                        <label >Prenom</label>
                        <input type="text"  class="form-control @error("addIntervenant.prenom") is-invalid @enderror" wire:model="addIntervenant.prenom" required="required" placeholder="Prenom">
                        @error("addIntervenant.prenom")
                          <span class="text-danger">{{$message}}</span>
                      @enderror    
                    </div>
                
                 <div class="d-flex">
                    <div class="form-group flex-grow-1 mr-2">
                        <label >Service</label>
                        <input type="text"  class="form-control @error("addIntervenant.service") is-invalid @enderror" wire:model="addIntervenant.service" required="required" placeholder="Service">
                        @error("addIntervenant.service")
                          <span class="text-danger">{{$message}}</span>
                      @enderror 
                    </div>
                    <div class="form-group flex-grow-1">
                        <label >Matricule</label>
                        <input type="text"  class="form-control @error("addIntervenant.matricule") is-invalid @enderror" wire:model="addIntervenant.matricule" required="required" placeholder="Matricule">
                        @error("addIntervenant.matricule")
                          <span class="text-danger">{{$message}}</span>
                      @enderror                
                    </div>
                </div>

                <div class="form-group">
                <label >Sexe</label>
                <select class="form-control @error("addIntervenant.sexe") is-invalid @enderror" wire:model="addIntervenant.sexe" required="required">
                @error("addIntervenant.sexe")
                          <span class="text-danger">{{$message}}</span>
                 @enderror 
                    <option value="">---------</option>
                    <option value="HOMME">Homme</option>
                    <option value="FEMME">Femme</option>
                </select>
                </div>

            <div class="d-flex">
                <div class="form-group flex-grow-1 mr-2">
                        <label >Telephone </label>
                        <input type="text" class="form-control @error("addIntervenant.telephone") is-invalid @enderror" wire:model="addIntervenant.telephone" required="required" placeholder="Telephone" pattern="\d{10}" title="Le numero de telepehone doit être 10 chiffre">
                        @error("addIntervenant.telephone")
                          <span class="text-danger">{{$message}}</span>
                      @enderror 
                       
                </div>

                <div class="form-group flex-grow-1">
                        <label >Date d'embauche</label>
                        <input type="date" class="form-control @error("addIntervenant.dateEmbauche") is-invalid @enderror" wire:model="addIntervenant.dateEmbauche" required="required">
                      @error("addIntervenant.dateEmbauche")
                          <span class="text-danger">{{$message}}</span>
                      @enderror                 
                </div>
            </div>
            <div class="form-group flex-grow-1">
               <input class="form-control" type="file" wire:model="image" id="image{{$resetValueInput}}" wire:loading.attr="disabled" required="required" title="Choisir le photo">                   
            </div>
         <!-- <div style="border: 1px solid #d0d1d3; border-radius: 20px; height: 200px; width:200px; overflow:hidden;">
            @if ($image)

                <img src="{{ $image->temporaryUrl() }}" style="height:200px; width:200px;">
            @endif
             </div> -->
             </div>
            <!-- /.card-body -->

            <div class="card-footer">
            <div wire:loading.delay wire:target="AjoutIntervenant">
                   <span class="text-green">Encours...</span>
            </div>
            @can("employe")
                <button type="submit" class="btn btn-primary" wire:loading.attr="disabled">Enregistrer</button>
            @endcan
            </div>
            </form>
        </div>
        
    </div>


   
         
       <div class="col-md-7">
        <div class="row ">       
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex align-items-center" style="background-color:#A52DFF;">
                    <h1 class="card-title flex-grow-1" style="color:white;"><i class="fa fa-user-circle fa-2x"></i> Liste d'intervenant</h1>
                    <a href="" wire:click.prevent="showCard()" data-toggle="tab" class="nav-link btn-primary show active mr-4 d-block" style="border-radius:30px;">Plus details</a>    
                    <div class="input-group input-group-md" style="width: 250px;">
                    <input type="text" name="table_search" wire:model.debounce.250ms="search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                    </div>
                  </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="p-3 table-striped">
                        <table class="table table-head-fixed">
                            <thead>
                               <th style="width:10%;"></th>
                                <th class="text-center" style="width:60%;">Nom</th>
                                <th class="text-center" style="width:30%;">Action</th>
                            </thead>
                            <tbody>
                              @forelse ($intervenants as $intervenant)
                              <tr>
                            <td style="width:10%;">
                          <!--  <img src="{{asset('storage/'.$intervenant->photo)}}" style="width:60px; height:60px;"> -->
                            <img src="{{asset($intervenant->photo)}}" style="width:60px; height:60px;">
                            </td>
                             <td class="text-center" style="width:60%;">{{$intervenant->nom}} {{$intervenant->prenom}}</td>
                            <td class="text-center" style="width:30%;">
                            @can("employe")
                               <button class="btn btn-link" wire:click="editIntervenant({{$intervenant->id}})"> <i class="far fa-edit"></i> </button>
                            @endcan
                            @can('delete', $intervenant)
                            <button class="btn btn-link" wire:click="confirmDelete({{$intervenant->id}})" style="color:red;"> <i class="far fa-trash-alt"></i> </button>
                            @endcan
                            <button class="btn btn-link" wire:click="showInformation({{$intervenant->id}})" data-toggle="modal" data-target="#addModal"> <i class="fa fa-eye"></i> </button>
                            
                            </td>
                            </tr>
                            @empty
                         <tr>
                            <td colspan="3">
                                <span class="text-info">Aucune donnée trouvée par rapport aux éléments</span>
                                
                            </td>
                         </tr>
                             @endforelse
                            </tbody>
                        </table>
                    </div>
            <div class="card-footer">
                <div class="float-right">
                 {{ $intervenants->links() }}
                </div>
            </div>
                </div>
            </div>         

     </div>
    

 
    </div>
    </div>
    </div>
    @endif
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
               @this.deleteIntervenant(event.detail.message.data.models_intervenant_id)
            }
        //    @this.resetPassword()
        }
        })
    })

</script>

