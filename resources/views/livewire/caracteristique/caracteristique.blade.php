 
 @if ($isBtnAddClicked)
   @include("livewire.caracteristique.create")
 @else
   
 @endif
 <div class="row p-4 pt-5">
          <div class="col-12">
            <div class="card">
              <div class="card-header bg-gradient-primary d-flex align-items-center">
                <h3 class="card-title flex-grow-1"><i class="nav-icon fas fa-cogs"></i> Caracteristiques des moteurs</h3>

                <div class="card-tools d-flex align-items-center ">
                <a class="btn btn-link text-white mr-4 d-block" wire:click.prevent="goToaddCaracteristique()"><i class="nav-icon fas fa-cog"></i> Nouvel moteur</a>
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
                      <td style="width:20%;" class="text-center"><span class="tag tag-success">Moteur</span></td>
                      <td style="width:20%;" class="text-center">
                        <button class="btn btn-link"> <i class="far fa-edit"></i> </button>                 
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