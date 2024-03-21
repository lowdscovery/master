
<div class="pt-4">
    <div class="col-12">


        <div class="card">
            <div class="card-header bg-gradient-primary d-flex align-items-center">
                <h3 class="card-title flex-grow-1"><i class="fa fa-list fa-2x"></i> Bande d'essaie </h3>


                    <a class="btn btn-link btn-db text-white mr-4 d-block" wire:click="selected"><i
                            class="fas fa-user-plus"></i> Ajouter Nouveau</a>

                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0 table-striped">
            <form wire:submit.prevent="Bande">
        @if ($isSelected)
            <div class="p-4">
                    <div>
                    <div class="form-row">
                    <div class="col">
     <input type="text" class="form-control @error('addBande.U1') is-invalid @enderror" wire:model="addBande.U1" placeholder=" Tension U1" required="required" title="Tension U1">
                    @error("addBande.U1")
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                     </div>

                    <div class="col">
     <input type="text" class="form-control @error('addBande.U2') is-invalid @enderror" wire:model="addBande.U2" placeholder=" Tension U2" required="required" title="Tension U2">
                   @error("addBande.U2")
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                    </div>

                    <div class="col">
     <input type="text" class="form-control @error('addBande.U3') is-invalid @enderror" wire:model="addBande.U3" placeholder="Tension U3" required="required" title="Tension U3">
                   @error("addBande.U3")
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                    </div>

                    <div class="col">
     <input type="text" class="form-control @error('addBande.I1') is-invalid @enderror" wire:model="addBande.I1" placeholder="Intensité I1" required="required" title="Intensité I1">
                   @error("addBande.I1")
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                  </div>
                </div>

                <div class="form-row pt-3">
                    <div class="col">
     <input type="text" class="form-control @error('addBande.I2') is-invalid @enderror" wire:model="addBande.I2" placeholder="Intensité I2" required="required" title="Intensité I2">
                    @error("addBande.I2")
                   <span class="text-danger">{{$message}}</span>
                    @enderror
                    </div>

                    <div class="col">
     <input type="text" class="form-control @error('addBande.I3') is-invalid @enderror" wire:model="addBande.I3" placeholder="Intensité I3" required="required" title="Intensité I3">
                    @error("addBande.I3")
                   <span class="text-danger">{{$message}}</span>
                    @enderror
                    </div>

                    <div class="col">
     <input type="text" class="form-control @error('addBande.Puissance') is-invalid @enderror" wire:model="addBande.Puissance" placeholder="Puissance" required="required" title="Puissance">
                   @error("addBande.Puissance")
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                    </div>

                    <div class="col">
     <input type="text" class="form-control @error('addBande.Debit') is-invalid @enderror" wire:model="addBande.Debit" placeholder="Debit" required="required" title="Debit">
                   @error("addBande.Debit")
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                    </div>                   
                </div>

                <div class="form-row">
                  <div class="col pt-3">
      <input type="text" class="form-control @error('addBande.Pression') is-invalid @enderror" wire:model="addBande.Pression" placeholder="Pression" required="required" title="Pression">
                    @error("addBande.Pression")
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                    </div>
                                        
                  </div>      
                    </div>
                    
                    <div class="pt-3">        
                   @if ($isSelectededit == true)    
    <button wire:click="updateBande()" class="btn btn-success" > <i class="fa fa-check"></i> Edit</button>
                   @else        
    <button type="submit" class="btn btn-primary" > <i class="fa fa-check"></i> Valider</button>
                    @endif
   <button type="button" wire:click="cancel" class="btn btn-warning"> <i class="fa fa-times"></i> Annuler</button>
                    </div>
                </div>
                
        @endif  
        </form>       
                <div style="height:350px;">
                    <table class="table table-head-fixed">
                        <thead>
                            <tr>
                                <th class="text-center">U1</th>
                                <th class="text-center">U2</th>
                                <th class="text-center">U3</th>
                                <th class="text-center">I1</th>
                                <th class="text-center">I2</th>
                                <th class="text-center">I3</th>
                                <th class="text-center">Puissance</th>
                                <th class="text-center">Debit</th>
                                <th class="text-center">Pression</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                       @forelse ($bandes as $bande)
                         <tr>
                            <td class="text-center">{{$bande->U1}}</td>
                            <td class="text-center">{{$bande->U2}}</td>
                            <td class="text-center">{{$bande->U3}}</td>
                            <td class="text-center">{{$bande->I1}}</td>
                            <td class="text-center">{{$bande->I2}}</td>
                            <td class="text-center">{{$bande->I3}}</td>
                            <td class="text-center">{{$bande->Puissance}}</td>
                            <td class="text-center">{{$bande->Debit}}</td>
                            <td class="text-center">{{$bande->Pression}}</td>
                            <td class="text-center">
                                <button wire:click="editBande({{$bande->id}})" class="btn btn-link"> <i class="far fa-edit"></i> </button>
                                <button class="btn btn-link" wire:click="confirmDelete({{$bande->id}})"> <i class="far fa-trash-alt"></i> </button>
                            </td>
                        </tr>
                       @empty
                         <tr>
                            <td colspan="10">
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
                 {{ $bandes->links() }}
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
               @this.deleteBande(event.detail.message.data.models_bande_id)
            }
        //    @this.resetPassword()
        }
        })
    })

</script>