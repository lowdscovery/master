   
    <div wire:ignore.self>

    @if ($info == INFORMATION)
     @include("livewire.Intervenant.information")
    @elseif ($info == UPDATEINTERVENANT)
    @include("livewire.Intervenant.update")
    @else
    <div class="row p-2 pt-3">
    <div class="col-md-5">
       
        <div class="card card-primary">
            <div class="card-header">
            <h3 class="card-title"><i class="fas fa-user-plus fa-2x"></i> Formulaire d'ajout intervenants</h3>
            </div>
            
            <form wire:submit.prevent="AjoutIntervenant">
            <div class="card-body">               
                    <div class="form-group">
                        <label >Nom</label>
                        <input type="text"  class="form-control @error("addIntervenant.nom") is-invalid @enderror" wire:model="addIntervenant.nom" required="required"> 
                      @error("addIntervenant.nom")
                          <span class="text-danger">{{$message}}</span>
                      @enderror   
                    </div>
                    <div class="form-group">
                        <label >Prenom</label>
                        <input type="text"  class="form-control @error("addIntervenant.prenom") is-invalid @enderror" wire:model="addIntervenant.prenom" required="required">
                        @error("addIntervenant.prenom")
                          <span class="text-danger">{{$message}}</span>
                      @enderror    
                    </div>
                
                 <div class="d-flex">
                    <div class="form-group flex-grow-1 mr-2">
                        <label >Service</label>
                        <input type="text"  class="form-control @error("addIntervenant.service") is-invalid @enderror" wire:model="addIntervenant.service" required="required">
                        @error("addIntervenant.service")
                          <span class="text-danger">{{$message}}</span>
                      @enderror 
                    </div>
                    <div class="form-group flex-grow-1">
                        <label >Matricule</label>
                        <input type="text"  class="form-control @error("addIntervenant.matricule") is-invalid @enderror" wire:model="addIntervenant.matricule" required="required">
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
                        <input type="text" class="form-control @error("addIntervenant.telephone") is-invalid @enderror" wire:model="addIntervenant.telephone" required="required">
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
               <input type="file" wire:model="image" id="image{{$resetValueInput}}" wire:loading.attr="disabled" required="required">                   
            </div>
             <div style="border: 1px solid #d0d1d3; border-radius: 20px; height: 200px; width:200px; overflow:hidden;">
            @if ($image)

                <img src="{{ $image->temporaryUrl() }}" style="height:200px; width:200px;">
            @endif
    </div>
             </div>
            <!-- /.card-body -->

            <div class="card-footer">
            <div wire:loading.delay wire:target="AjoutIntervenant">
                   <span class="text-green">Sending...</span>
            </div>
                <button type="submit" class="btn btn-primary" wire:loading.attr="disabled">Enregistrer</button>
            </div>
            </form>
        </div>
        
    </div>


   
         
       <div class="col-md-7">
        <div class="row ">       
            <div class="col-md-12">
                <div class="card card-primary" style=".card:blue;">
                    <div class="card-header d-flex align-items-center">
                    <h3 class="card-title flex-grow-1"><i class="fa fa-user-circle fa-2x"></i> Liste d'intervenant</h3>
                    <button class="btn bg-gradient-success" ><i class="fas fa-check"></i> Appliquer les modifications</button>
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
                              @foreach ($intervenants as $intervenant)
                              <tr>
                            <td style="width:10%;">
                            <img src="{{asset('storage/'.$intervenant->photo)}}" style="width:60px; height:60px;">
                            </td>
                             <td class="text-center" style="width:60%;">{{$intervenant->nom}} {{$intervenant->prenom}}</td>
                            <td class="text-center" style="width:30%;">
                               <button class="btn btn-link" wire:click="updateIntervenant()"> <i class="far fa-edit"></i> </button>
                            <button class="btn btn-link" wire:click="confirmDelete({{$intervenant->id}})"> <i class="far fa-trash-alt"></i> </button>
                            
                            <button class="btn btn-link" wire:click="showInformation({{$intervenant->id}})"> <i class="fa fa-eye"></i> </button>
                            
                            </td>
                            </tr>
                                  @endforeach
                            </tbody>
                        </table>
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
