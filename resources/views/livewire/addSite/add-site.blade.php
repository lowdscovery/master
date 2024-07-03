<div class="pt-2">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex align-items-center" style="background-color:#004A8F;">
                <h3 class="card-title flex-grow-1" style="color:white;"><i class="fa fa-list fa-2x"></i> Site </h3>
@foreach ($sites as $site)
     
 @endforeach 
 @can('create', $site)
<a class="btn btn-link btn-db text-white mr-4 d-block" wire:click="selected"><i class="fa fa-plus-circle"></i> Ajouter Nouveau</a>
@endcan
                </div>
            </div>

            <!-- /.card-header -->
            <div class="card-body table-responsive p-0 table-striped">
     @if ($isSelected)
        <form wire:submit.prevent="AddSite">
            <div class="p-4">
                    <div>
                    <div class="form-row">

                <div class="col">
            <select class="form-control @error("district_id") is-invalid @enderror" wire:model="district_id" required="required" title="District">
                @error("district_id")
                        <span class="text-danger">{{$message}}</span>
                @enderror 
                    <option value="">---------</option>
                    @foreach ($districts as $district)                          
                    <option value="{{$district->id}}">{{$district->nom}}</option>
                    @endforeach
            </select>
                </div>

                    <div class="col">
     <input type="text" class="form-control @error('nom') is-invalid @enderror" wire:model="nom" placeholder="site" required="required" title="site">
                   @error("nom")
                    <span class="text-danger">{{$message}}</span>
                    @enderror
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
            <form wire:submit.prevent="updateSite">
              <div class="p-4">
                    <div>
                    <div class="form-row">
                    
                <div class="col">
            <select class="form-control @error("district_id") is-invalid @enderror" wire:model="district_id" required="required" title="District">
                @error("district_id")
                        <span class="text-danger">{{$message}}</span>
                @enderror 
                    <option value="">---------</option>
                    @foreach ($districts as $district)                          
                    <option value="{{$district->id}}">{{$district->nom}}</option>
                    @endforeach
            </select>
                </div>
                    <div class="col">
     <input type="text" class="form-control @error('nom') is-invalid @enderror" wire:model="nom" placeholder="site" required="required" title="site">
                   @error("nom")
                    <span class="text-danger">{{$message}}</span>
                    @enderror
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
                               <th class="text-center">District</th>
                                <th class="text-center">Site</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                       @forelse ($sites as $site)
                         <tr>
                         <td class="text-center">{{$site->dist->nom}}</td>
                            <td class="text-center">{{$site->nom}}</td>
                            <td class="text-center">
                                <button wire:click="editSite({{$site->id}})" class="btn btn-link"> <i class="far fa-edit"></i> </button>
                                @can('delete', $site)
                                <button class="btn btn-link" wire:click="confirmDelete({{$site->id}})"> <i class="far fa-trash-alt"></i> </button>
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
                 {{ $sites->links() }}
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
               @this.deleteSite(event.detail.message.data.site_id)
            }
        //    @this.resetPassword()
        }
        })
    })

</script>
