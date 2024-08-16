<div class="pt-2">

<div class="modal fade" id="addModal"tabindex="-1" role="dialog" aria-hidden="true" wire:ignore.self>
<div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ajout maintenance</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
    <div>
        <canvas id="myChart"> </canvas>                                         
    </div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('livewire:load', function () {
        var ctx = document.getElementById('myChart').getContext('2d');
        var chart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: @json($data->pluck('Debit')),
                datasets: [{
                    label: 'Tension Moyenne',
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    data: @json($data->pluck('MoyenU'))
                },
                {
                    label: 'Intensite Moyenne',
                    backgroundColor: 'rgba(75, 12, 20, 0.2)',
                    borderColor: 'rgba(75, 12, 20, 1)',
                    data: @json($data->pluck('MoyenI'))
                },
                 {
                    label: 'Puissance',
                    backgroundColor: 'rgba(226, 7, 134, 0.2)',
                    borderColor: 'rgba(226, 7, 134, 1)',
                    data: @json($data->pluck('Puissance'))
            },
              {
                    label: 'Pression',
                    backgroundColor: 'rgba(226, 200, 14, 0.2)',
                    borderColor: 'rgba(226, 200, 14, 1)',
                    data: @json($data->pluck('Pression'))
            }
            ]
                
            },
            
            options: {}
        });

        Livewire.on('dataUpdated', function (data) {
            chart.data.labels = data.labels;
            chart.data.datasets[0].data = data.TensionMoyenne;
            chart.data.datasets[1].data = data.IntensiteMoyenne;
            chart.data.datasets[2].data = data.Puissance;
            chart.data.datasets[3].data = data.Pression;
            chart.update();
        });
    });
</script>
       
      </form>
    </div>
  </div>
</div>
</div>

    <div class="col-12">
        <div class="card">
            <div class="card-header bg-gradient-primary d-flex align-items-center">
                <h3 class="card-title flex-grow-1"><i class="fa fa-list fa-2x"></i> Bande d'essaie </h3>
                <button type="submit" class="btn btn-success mr-4 d-block" data-toggle="modal" data-target="#addModal"> <i class="fas fa-line-chart"></i> Graphe</button>
                 
<button type="button" class="btn btn-primary mr-4 d-block" wire:click="selected"><i class="fa fa-plus-square"></i> Ajouter Nouveau</button>
             <label for="filtreType" class="mr-2 d-block" style="color:white;">Filtrer par date </label>
                <div class="input-group input-group-md" style="width: 250px;">
            <input type="date" name="table_search" wire:model.debounce.250ms="startDate" class="form-control float-right mr-4 d-block" placeholder="Search">
                 </div>
            <div class="input-group-append">
            <input type="date" wire:model.debounce.250ms="endDate" class="form-control float-right">
                    </div>
                
                </div>
            </div>

            <!-- /.card-header -->
            <div class="card-body table-responsive p-0 table-striped">
     @if ($isSelected)
        <form wire:submit.prevent="Bande">
            <div class="p-4">
                    <div>
                    <div class="form-row">

                    <div class="col">
     <input type="number" class="form-control @error('U1') is-invalid @enderror" wire:model="U1" placeholder=" Tension U1" required="required" title="Tension U1">
                    @error("U1")
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                     </div>

                    <div class="col">
     <input type="number" class="form-control @error('U2') is-invalid @enderror" wire:model="U2" placeholder=" Tension U2" required="required" title="Tension U2">
                   @error("U2")
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                    </div>

                    <div class="col">
     <input type="number" class="form-control @error('U3') is-invalid @enderror" wire:model="U3" placeholder="Tension U3" required="required" title="Tension U3">
                   @error("U3")
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                    </div>

                    <div class="col">
      <input type="number" class="form-control @error('Pression') is-invalid @enderror" wire:model="Pression" placeholder="Pression" required="required" title="Pression">
                    @error("Pression")
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                    </div>

                </div>

                <div class="form-row pt-3">
                <div class="col">
     <input type="number" class="form-control @error('I1') is-invalid @enderror" wire:model="I1" placeholder="Intensité I1" required="required" title="Intensité I1">
                   @error("I1")
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                  </div>

                    <div class="col">
     <input type="number" class="form-control @error('I2') is-invalid @enderror" wire:model="I2" placeholder="Intensité I2" required="required" title="Intensité I2">
                    @error("I2")
                   <span class="text-danger">{{$message}}</span>
                    @enderror
                    </div>

                    <div class="col">
     <input type="number" class="form-control @error('I3') is-invalid @enderror" wire:model="I3" placeholder="Intensité I3" required="required" title="Intensité I3">
                    @error("I3")
                   <span class="text-danger">{{$message}}</span>
                    @enderror
                    </div>
                    <div class="col">
     <input type="number" class="form-control @error('Debit') is-invalid @enderror" wire:model="Debit" placeholder="Debit" required="required" title="Debit">
                   @error("Debit")
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                    </div>                   
                </div>
     
                    </div>
                    
                    <div class="pt-3">
                    <div class="form-group">
    <input type="date" class="form-control @error('Date') is-invalid @enderror" wire:model="Date" required="required" title="Date">
                    @error("Date")
                     <span class="text-danger">{{$message}}</span>
                    @enderror                  
                    </div>
   <button type="submit" class="btn btn-primary" > <i class="fa fa-check"></i> Valider</button>
   <button type="button" wire:click="cancel" class="btn btn-warning"> <i class="fa fa-times"></i> Annuler</button>
                    </div>
                </div>  
        </form>
        @endif 

             @if ($isSelectededit)
            @if($dataId)
            <form wire:submit.prevent="updateBande">
            <div class="p-4">
                    <div>
                    <div class="form-row">
                    
                    <div class="col">
     <input type="number" class="form-control @error('U1') is-invalid @enderror" wire:model="U1" placeholder=" Tension U1" required="required" title="Tension U1">
                    @error("U1")
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                     </div>

                    <div class="col">
     <input type="number" class="form-control @error('U2') is-invalid @enderror" wire:model="U2" placeholder=" Tension U2" required="required" title="Tension U2">
                   @error("U2")
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                    </div>

                    <div class="col">
     <input type="number" class="form-control @error('U3') is-invalid @enderror" wire:model="U3" placeholder="Tension U3" required="required" title="Tension U3">
                   @error("U3")
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                    </div>

                    <div class="col">
      <input type="number" class="form-control @error('Pression') is-invalid @enderror" wire:model="Pression" placeholder="Pression" required="required" title="Pression">
                    @error("Pression")
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                    </div>

                </div>

                <div class="form-row pt-3">
                <div class="col">
     <input type="number" class="form-control @error('I1') is-invalid @enderror" wire:model="I1" placeholder="Intensité I1" required="required" title="Intensité I1">
                   @error("I1")
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                  </div>

                    <div class="col">
     <input type="number" class="form-control @error('I2') is-invalid @enderror" wire:model="I2" placeholder="Intensité I2" required="required" title="Intensité I2">
                    @error("I2")
                   <span class="text-danger">{{$message}}</span>
                    @enderror
                    </div>

                    <div class="col">
     <input type="number" class="form-control @error('I3') is-invalid @enderror" wire:model="I3" placeholder="Intensité I3" required="required" title="Intensité I3">
                    @error("I3")
                   <span class="text-danger">{{$message}}</span>
                    @enderror
                    </div>
                    <div class="col">
     <input type="number" class="form-control @error('Debit') is-invalid @enderror" wire:model="Debit" placeholder="Debit" required="required" title="Debit">
                   @error("Debit")
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                    </div>                   
                </div>
     
                    </div>
                    
                    <div class="pt-3">
                    <div class="form-group">
    <input type="date" class="form-control @error('Date') is-invalid @enderror" wire:model="Date" required="required" title="Date">
                    @error("Date")
                     <span class="text-danger">{{$message}}</span>
                    @enderror                  
                    </div>            
    <button type="submit" class="btn btn-success" > <i class="fa fa-check"></i> Edit</button>
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
                                <th class="text-center">Date</th>
                                <th class="text-center">U1</th>
                                <th class="text-center">U2</th>
                                <th class="text-center">U3</th>
                                <th class="text-center">Moyenne U</th>
                                <th class="text-center">I1</th>
                                <th class="text-center">I2</th>
                                <th class="text-center">I3</th>
                                <th class="text-center">Moyenne I</th>
                                <th class="text-center">Puissance</th>
                                <th class="text-center">Debit</th>
                                <th class="text-center">Pression</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                       @forelse ($data as $bande)
                         <tr>
                            <td class="text-center">{{date('d-m-Y',strtotime($bande->Date))}}</td>
                            <td class="text-center">{{$bande->U1}}</td>
                            <td class="text-center">{{$bande->U2}}</td>
                            <td class="text-center">{{$bande->U3}}</td>
                            <td class="text-center">{{$bande->MoyenU}}</td>
                            <td class="text-center">{{$bande->I1}}</td>
                            <td class="text-center">{{$bande->I2}}</td>
                            <td class="text-center">{{$bande->I3}}</td>
                            <td class="text-center">{{$bande->MoyenI}}</td>
                            <td class="text-center">{{$bande->Puissance}}</td>
                            <td class="text-center">{{$bande->Debit}}</td>
                            <td class="text-center">{{$bande->Pression}}</td>
                            <td class="text-center">
                                <button wire:click="editBande({{$bande->id}})" class="btn btn-link"> <i class="far fa-edit"></i> </button>
                                @can('delete', $bande)
                                <button class="btn btn-link" wire:click="confirmDelete({{$bande->id}})"> <i class="far fa-trash-alt"></i> </button>
                                @endcan
                            </td>
                        </tr>
                       @empty
                         <tr>
                            <td colspan="14">
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
                 
                </div>
            </div>
            </div>

        </div>
        <!-- /.card -->
    </div>
</div>

<script>
    document.addEventListener('livewire:load', function () {
        Livewire.on('userProfileUpdated', function () {
            location.reload();
        });
    });
</script>

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