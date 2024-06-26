 <div class="row p-4 pt-5">
          <div class="col-12">
                
              <ul class="nav nav-pills mb-3">
                <li class="nav-item"><a href="" wire:click.prevent="goToGrille()" data-toggle="tab" class="nav-link btn-primary show active">Vue de la grille</a></li>
              </ul>         
            <div class="card">
              <div class="card-header bg-gradient-cyan d-flex align-items-center">
                <h3 class="card-title flex-grow-1"><i class="fas fa-users fa-2x"></i> Liste des utilisateurs</h3>

                <div class="card-tools d-flex align-items-center ">
                <div wire:loading.delay wire:target="goToAddUser">
											<span class="text-white">Encours...</span>
								</div>
                <a wire:loading.attr="disabled" wire:click.prevent="goToAddUser()" class="btn btn-primary mr-4 d-block" style="background-color:#00F2D8;"><i class="fas fa-user-plus"></i> Nouvel utilisateur</a>
                  <div class="input-group input-group-md" style="width: 250px;">
                    <input type="text" name="table_search" wire:model.debounce.250ms="search" class="form-control float-right" placeholder="Search">

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
                      <th style="width:5%;"></th>
                      <th style="width:25%;">Utilisateurs</th>
                      <th style="width:20%;" >Roles</th>
                      <th style="width:38%;" class="text-center">Ajouté</th>
                      <th style="width:12%;" class="text-center"> Actions </th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse($users as $user)
                    @if ($user->allRoleNames =="" || $user->allRoleNames ==null)
                     <tr>
                     <td>
                      @if ($user->photo !="" || $user->photo !=null)
                        <img class="rounded-circle" width="40" height="40" src="{{asset($user->photo)}}">
                      @else
                        <img class="rounded-circle" width="40" height="40" src="{{asset('image/user.png')}}">
                      @endif
                      </td>
                      <td style="color:green;">{{ $user->nom }} {{ $user->prenom }}</td>
                      <td style="color:green;"> {{$user->allRoleNames}}</td>
                      <td class="text-center" style="color:green;"><span class="tag tag-success">{{ $user->created_at->diffForHumans() }}</span></td>
                      <td style="color:green;">
                        <button class="btn btn-link" wire:click="goToEditUser({{$user->id}})" style="color:green;"> <i class="far fa-edit"></i> </button>
                         @if(count($user->roles) == 0)
                         <button class="btn btn-link" wire:click="confirmDelete('{{ $user->prenom }} {{ $user->nom }}', {{$user->id}})" style="color:green;"> <i class="far fa-trash-alt"></i> </button>
                         @endif
                      </td>
                    </tr>

                    @else
                      <tr>
                      <td>
                      @if ($user->photo !="" || $user->photo !=null)
                        <img class="rounded-circle" width="40" height="40" src="{{asset($user->photo)}}">
                      @else
                        <img class="rounded-circle" width="40" height="40" src="{{asset('image/user.png')}}">
                      @endif
                      </td>
                      <td>{{ $user->nom }} {{ $user->prenom }}</td>
                      <td> {{$user->allRoleNames}}</td>
                      <td class="text-center"><span class="tag tag-success">{{ $user->created_at->diffForHumans() }}</span></td>
                      <td class="">
                        <button class="btn btn-link" wire:click="goToEditUser({{$user->id}})"> <i class="far fa-edit"></i> </button>
                         @if(count($user->roles) == 0)
                         <button class="btn btn-link" wire:click="confirmDelete('{{ $user->prenom }} {{ $user->nom }}', {{$user->id}})"> <i class="far fa-trash-alt"></i> </button>
                         @endif
                      </td>
                    </tr>
                    @endif
                     @empty
                          <tr>
                            <td colspan="6">
                                <div class="alert alert-danger">
                                     <h5><i class="icon fas fa-ban"></i> Information!</h5>
                                            Aucune donnée trouvée par rapport aux éléments de recherche entrés.
                                            </div>
                                    </td>
                                </tr>
                    @endforelse
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <div class="float-right">
                     {{ $users->links() }}
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