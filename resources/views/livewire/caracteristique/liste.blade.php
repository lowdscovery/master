<div class="row p-4 pt-5">
          <div class="col-12">
          <div class="bg-success col-2" style="border-radius: 5%;">
    <button class="btn btn-link" wire:click.prevent="goToaddCaracteristique()" > <span class="brand-text font-weight-bold" style="color:white">Nouvel moteur</span></button>
          </div>
          <br>
            <div class="card">
  
              <div class="card-header bg-gradient-gray d-flex align-items-center">
                <h3 class="card-title flex-grow-1"><i class="nav-icon fas fa-cogs"></i> Caracteristiques des moteurs</h3>

                <div class="card-tools d-flex align-items-center ">
                  <div class="input-group input-group-md" style="width: 250px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

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
                      <th style="width:20%;" >Type</th>
                      <th style="width:20%;" class="text-center">Numero de serie</th>
                      <th style="width:20%;" class="text-center">Moteur</th>
                      <th style="width:20%;" class="text-center">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                   @foreach ($caracteristiques as $caracteristique)
              
                    <tr>
                      <td style="width:20%;">{{$caracteristique->marque}}</td>
                      <td style="width:20%;"> {{$caracteristique->type}}</td>
                      <td style="width:20%;" class="text-center"> {{$caracteristique->numeroSerie}}</td>
                      @if ($caracteristique->moteurs=="POMPE")
                         <td style="width:20%;" class="text-center"><span class="badge badge-success">Pompe</span></td>
                      @else
                         <td style="width:20%;" class="text-center"><span class="badge badge-warning">Electrique</span></td>
                      @endif

                      <td style="width:20%;" class="text-center">
                        <button class="btn btn-link" wire:click="goToEditCaract({{$caracteristique->id}})"> <i class="far fa-edit"></i> </button>                 
                        <button class="btn btn-link" > <i class="far fa-trash-alt"></i> </button>
                       
                      </td>
                    </tr>
                @endforeach
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
            //appel fuction livewire @  
                @this.deleteUser(event.detail.message.data.user_id)
        }
        })

        
    })

    window.addEventListener("showSuccessMessage", event=>{
        Swal.fire({
                position: 'top-end',
                icon: 'success',
                toast:true,
                title: event.detail.message || "Opération effectuée avec succès!",
                showConfirmButton: false,
                timer: 2000
                }
            )
    })

</script>