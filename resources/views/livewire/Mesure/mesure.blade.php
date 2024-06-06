
@if($currentPage == PAGECREATEFORM)
        @include('livewire.Mesure.create')
    @endif
@if($currentPage == PAGEEDITFORM)
        @include('livewire.Mesure.edit')
    @endif
@if($currentPage == PAGELIST)

<div class="pt-4">
    <div class="col-12">
        <div class="card">
            <div class="card-header bg-gradient-primary d-flex align-items-center">
                <h3 class="card-title flex-grow-1"><i class="fa fa-list fa-2x"></i> Mesure </h3>
                <div class="card-tools d-flex align-items-center ">

                    <a class="btn btn-link btn-db text-white mr-4 d-block" wire:click="showInput()"><i
                            class="fas fa-user-plus"></i> Nouveau Mesure</a>

                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0 table-striped">            
                <div style="height:350px;">
                    <table class="table table-head-fixed">
                        <thead>
                            <tr>
                                <th class="text-center">Date</th>
                                <th class="text-center">IndexCH</th>
                                <th class="text-center">Puissance</th>
                                <th class="text-center">Debit</th>
                                <th class="text-center">Vacuo</th>
                                <th class="text-center">Mano</th>
                                <th class="text-center">Agent</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                     @forelse ($mesures as $mesure)                
                         <tr>
                            <td class="text-center">{{$mesure->Date}}</td>
                            <td class="text-center">{{$mesure->IndexCH}}</td>
                            <td class="text-center">{{$mesure->Puissance}}</td>
                            <td class="text-center">{{$mesure->Debit}}</td>
                            <td class="text-center">{{$mesure->Vacuo}}</td>
                            <td class="text-center">{{$mesure->Mano}}</td>
                            <td class="text-center">{{$mesure->Agent}}</td>
                            <td class="text-center">
                                <button wire:click="editMesures({{$mesure->id}})" class="btn btn-link"> <i class="far fa-edit"></i> </button>
                                <button class="btn btn-link" wire:click="confirmDelete({{$mesure->id}})"> <i class="far fa-trash-alt"></i> </button>
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
               @this.deleteCommande(event.detail.message.data.models_mesure_id)
            }
        //    @this.resetPassword()
        }
        })
    })

</script>

@endif