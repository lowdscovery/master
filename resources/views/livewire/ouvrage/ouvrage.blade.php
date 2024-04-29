<div class="pt-4">
    <div class="col-12">
        <div class="card">
            <div class="card-header bg-gradient-primary d-flex align-items-center">
                <h3 class="card-title flex-grow-1"><i class="fa fa-list fa-2x"></i> Forage </h3>

                <div class="card-tools d-flex align-items-center ">
                    <a href="" class="btn btn-link text-white mr-4 d-block"><i class="fas fa-long-arrow-alt-left"></i> Retourner
                        vers la liste</a>

                    <a class="btn btn-link btn-db text-white mr-4 d-block" wire:click="selected"><i
                            class="fas fa-user-plus"></i> Nouveau Forage</a>

                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0 table-striped">
        @if ($isSelected)
       
            <div class="p-4">
                    <div>
                        <div class="form-row">
                        <div class="col">
     <input type="text" class="form-control @error('addOuvrage.annee') is-invalid @enderror" wire:model="addOuvrage.annee" placeholder="Annee">
                    @error("addOuvrage.annee")
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                        </div>
                        <div class="col">
     <input type="text" class="form-control @error('addOuvrage.debitExploite') is-invalid @enderror" wire:model="addOuvrage.debitExploite" placeholder="Debit exploiter">
                    @error("addOuvrage.debitExploite")
                   <span class="text-danger">{{$message}}</span>
                    @enderror
                        </div>
                        <div class="col">
     <input type="text" class="form-control @error('addOuvrage.profondeur') is-invalid @enderror" wire:model="addOuvrage.profondeur" placeholder="Profondeur">
                   @error("addOuvrage.profondeur")
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                        </div>
                        <div class="col">
     <input type="text" class="form-control @error('addOuvrage.type') is-invalid @enderror" wire:model="addOuvrage.type" placeholder="Type">
                   @error("addOuvrage.type")
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                        </div>
                        </div>
                        <div class="form-row">
                        <div class="col pt-3">
      <input type="text" class="form-control @error('addOuvrage.etatActuel') is-invalid @enderror" wire:model="addOuvrage.etatActuel" placeholder="Etat actuel">
                    @error("addOuvrage.etatActuel")
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                        </div>
                        <div class="col pt-3">
     <input type="text" class="form-control @error('addOuvrage.observation') is-invalid @enderror" wire:model="addOuvrage.observation" placeholder="Observation">
                    @error("addOuvrage.observation")
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                        </div>
                        <div class="col pt-3">
      <input class="form-control " type="file" wire:model="image" required="required"> 
                        </div>
                      <div class="col pt-3">
                    <select class="form-control @error("addOuvrage.ressource_id") is-invalid @enderror" wire:model="addOuvrage.ressource_id" required="required">
                        @error("addOuvrage.ressource_id")
                                <span class="text-danger">{{$message}}</span>
                        @enderror 
                            <option value="">---------</option>
                            @foreach ($ressources as $ressource)                          
                            <option value="{{$ressource->id}}">{{$ressource->nom}}</option>
                            @endforeach
                        </select>
                    </div>
                     </div>
                    </div>
                    <div>
                    @if ($isSelectededit == true)
    <button wire:click="updateOuvrage()" class="btn btn-link" > <i class="fa fa-check"></i>Edit</button>
                   @else
    <button wire:click="Ouvrage" class="btn btn-link" > <i class="fa fa-check"></i>Valider</button>
                    @endif
   <button class="btn btn-link" wire:click="cancel"> <i class="fa fa-times"></i> Annuler</button>
                    </div>
                </div>
               
        @endif             
                <div style="height:350px;">
                    <table class="table table-head-fixed">
                        <thead>
                            <tr>
                                <th></th>
                                <th class="text-center">Annee</th>
                                <th class="text-center">Debit Exploiter</th>
                                <th class="text-center">Profondeur</th>
                                <th class="text-center">Type</th>
                                <th class="text-center">Etat Actuel</th>
                                <th class="text-center">Observation</th>
                                <th class="text-center">Forages</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                       @forelse ($ouvrages as $ouvrage)
                         <tr>
                            <td><img src="{{asset($ouvrage->photo)}}" style="width:60px; height:60px;"></td>
                            <td class="text-center">{{$ouvrage->annee}}</td>
                            <td class="text-center">{{$ouvrage->debitExploite}}</td>
                            <td class="text-center">{{$ouvrage->profondeur}}</td>
                            <td class="text-center">{{$ouvrage->type}}</td>
                            <td class="text-center">{{$ouvrage->etatActuel}}</td>
                            <td class="text-center">{{$ouvrage->observation}}</td>
                            <td class="text-center">{{$ouvrage->ressource->nom}}</td>
                            <td class="text-center">
                                <button wire:click="editOuvrage({{$ouvrage->id}})" class="btn btn-link"> <i class="far fa-edit"></i> </button>
                                <button class="btn btn-link" wire:click="confirmDelete({{$ouvrage->id}})"> <i class="far fa-trash-alt"></i> </button>
                            </td>
                        </tr>
                       @empty
                         <tr>
                            <td colspan="9">
                                <div class="alert alert-info">

                                    <h5><i class="icon fas fa-ban"></i> Information!</h5>
                                    Cet article ne dispose pas encore de tarifs.
                                </div>
                            </td>
                        </tr>  
                       @endforelse    
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                <div class="float-right">
                 {{ $ouvrages->links() }}
                </div>
            </div>
            </div>

        </div>
        <!-- /.card -->
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
               @this.deleteOuvrage(event.detail.message.data.models_ouvrage_id)
            }
        //    @this.resetPassword()
        }
        })
    })

</script>