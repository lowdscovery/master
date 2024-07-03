<div class="pt-2">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex align-items-center" style="background-color:#004A8F;">
                <h3 class="card-title flex-grow-1" style="color:white;"><i class="fa fa-list fa-2x"></i> Bassin </h3>
    @foreach ($bassins as $bassin)

    @endforeach
    @can('create', $bassin)
<a class="btn btn-link btn-db text-white mr-4 d-block" wire:click="selected"><i class="fa fa-plus-circle"></i> Ajouter Nouveau</a>
    @endcan
                </div>
            </div>

            <!-- /.card-header -->
            <div class="card-body table-responsive p-0 table-striped">
     @if ($isSelected)
        <form wire:submit.prevent="Bassin">
            <div class="p-4">
                    <div>
                    <div class="form-row">
                    <div class="col">
     <input type="number" class="form-control @error('Longueur') is-invalid @enderror" wire:model="Longueur" placeholder="Longueur" required="required" title="Longueur">
                   @error("Longueur")
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                    </div>

                    <div class="col">
     <input type="number" class="form-control @error('Largeur') is-invalid @enderror" wire:model="Largeur" placeholder="Largeur" required="required" title="Largeur">
                    @error("Largeur")
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                     </div>

                    <div class="col">
     <input type="number" class="form-control @error('Hauteur') is-invalid @enderror" wire:model="Hauteur" placeholder="Hauteur" required="required" title="Hauteur">
                   @error("Hauteur")
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                    </div>

                    <div class="col">
     <input type="number" class="form-control @error('HauteurAspiration') is-invalid @enderror" wire:model="HauteurAspiration" placeholder="Hauteur Aspiration" required="required" title="Hauteur Aspiration">
                   @error("HauteurAspiration")
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                    </div>

                <div class="col">
              <select class="form-control @error("ressource_id") is-invalid @enderror" wire:model="ressource_id" required="required" title="Bassin">
                    @error("ressource_id")
                            <span class="text-danger">{{$message}}</span>
                    @enderror 
                        <option value="">---------</option>
                        @foreach ($bass as $basse)                          
                        <option value="{{$basse->ressources->id}}">{{$basse->ressources->nom}}</option>
                        @endforeach
                </select>
                  </div>
                </div>
      
            </div>
                    
                    <div class="pt-3">                  
   <button type="submit" class="btn btn-primary" > <i class="fa fa-check"></i> Valider</button>
   <button type="button" wire:click="cancel" class="btn btn-warning"> <i class="fa fa-times"></i> Annuler</button>
                    </div>
                </div>  
        </form>
        @endif 

             @if ($isSelectededit)
            @if($dataId)
            <form wire:submit.prevent="updateBassin">
              <div class="p-4">
                    <div>
                    <div class="form-row">
                    <div class="col">
     <input type="number" class="form-control @error('Longueur') is-invalid @enderror" wire:model="Longueur" placeholder="Longueur" required="required" title="Longueur">
                   @error("Longueur")
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                    </div>

                    <div class="col">
     <input type="number" class="form-control @error('Largeur') is-invalid @enderror" wire:model="Largeur" placeholder="Largeur" required="required" title="Largeur">
                    @error("Largeur")
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                     </div>

                    <div class="col">
     <input type="number" class="form-control @error('Hauteur') is-invalid @enderror" wire:model="Hauteur" placeholder="Hauteur" required="required" title="Hauteur">
                   @error("Hauteur")
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                    </div>

                    <div class="col">
     <input type="number" class="form-control @error('HauteurAspiration') is-invalid @enderror" wire:model="HauteurAspiration" placeholder="Hauteur Aspiration" required="required" title="Hauteur Aspiration">
                   @error("HauteurAspiration")
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                    </div>

                <div class="col">
              <select class="form-control @error("ressource_id") is-invalid @enderror" wire:model="ressource_id" required="required" title="Bassin">
                    @error("ressource_id")
                            <span class="text-danger">{{$message}}</span>
                    @enderror 
                        <option value="">---------</option>
                        @foreach ($bass as $basse)                   
                        <option value="{{$basse->ressources->id}}">{{$basse->ressources->nom}}</option>
                        @endforeach
                </select>
                  </div>
                </div>
      
            </div>
                    
                    <div class="pt-3">                  
   <button type="submit" class="btn btn-primary" > <i class="fa fa-check"></i> Modifier</button>
   <button type="button" wire:click="cancel" class="btn btn-warning"> <i class="fa fa-times"></i> Annuler</button>
                    </div>
                </div>
        </form>
         @endif  
        @endif       
                <div style="height:350px;">
                    <table class="table table-head-fixed">
                        <thead>
                            <tr>
                                <th class="text-center">Longueur</th>
                                <th class="text-center">Largeur</th>
                                <th class="text-center">Hauteur</th>
                                <th class="text-center">Volume</th>
                                <th class="text-center">Hauteur Aspiration</th>
                                <th class="text-center">Volume Aspiration</th>
                                <th class="text-center">Volume Total</th>
                                <th class="text-center">Bassin</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                       @forelse ($bassins as $bassin)
                         <tr>
                            <td class="text-center">{{$bassin->Longueur}}</td>
                            <td class="text-center">{{$bassin->Largeur}}</td>
                            <td class="text-center">{{$bassin->Hauteur}}</td>
                            <td class="text-center">{{$bassin->Volume}}</td>
                            <td class="text-center">{{$bassin->HauteurAspiration}}</td>
                            <td class="text-center">{{$bassin->VolumeAspiration}}</td>
                            <td class="text-center">{{$bassin->Total}}</td>
                            <td class="text-center">{{$bassin->ressource->nom}}</td>
                            <td class="text-center">
                                <button wire:click="editBassin({{$bassin->id}})" class="btn btn-link"> <i class="far fa-edit"></i> </button>
                                @can('delete' , $bassin)
                                <button class="btn btn-link" wire:click="confirmDelete({{$bassin->id}})"> <i class="far fa-trash-alt"></i> </button>
                                @endcan
                            </td>
                        </tr>
                       @empty
                         <tr>
                            <td colspan="13">
                                <div class="alert alert-info">

                                    <h5><i class="icon fas fa-ban"></i> Information!</h5>
                                    Le tableau est vide.
                                </div>
                            </td>
                        </tr>  
                       @endforelse    
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                <div class="float-right">
                 {{ $bassins->links() }}
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
               @this.deleteBassin(event.detail.message.data.models_bassin_id)
            }
        //    @this.resetPassword()
        }
        })
    })

</script>