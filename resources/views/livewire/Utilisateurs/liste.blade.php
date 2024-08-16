 <div class="row p-3 pt-2">
          <div class="col-12">
                
              <div class="card-header d-flex align-items-center" style="background:#6811C4;">
                 <a href="" wire:click.prevent="goToGrille()" data-toggle="tab" class="nav-link btn-primary show active mr-4 d-block">Vue de la grille</a>            
                 <label class="mr-1" style="color:white;font-size:20px;">Par page</label>
                <div class="card-tools d-flex align-items-center ">
                  <div class="float-right">         
                    <select class="form-control" wire:model.live="perPage"> 
                     <option value="6">6</option>
                     <option value="10">10</option>
                     <option value="50">50</option>
                   </select>
                  </div>
                </div> 
              </div>
                    
            <div class="card">
              <div class="card-header bg-gradient-primary d-flex align-items-center">
                <h3 class="card-title flex-grow-1"><i class="fas fa-users fa-2x"></i> Liste des utilisateurs</h3>

                <div class="card-tools d-flex align-items-center ">
                <div wire:loading.delay wire:target="goToAddUser">
											<span class="text-white">Encours...</span>
								</div>
                <a wire:loading.attr="disabled" wire:click.prevent="goToAddUser()" class="btn btn-primary mr-4 d-block" style="background-color:#0000FF;border-radius:20px;"><i class="fas fa-user-plus"></i> Nouvel utilisateur</a>
                  <div class="input-group input-group-md" style="width: 250px;">
                    <input type="text" name="table_search" wire:model.debounce.250ms="search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0 table-striped" style="max-height: 500px;">
                <table class="table table-head-fixed">
                  <thead>
                    <tr>
                      <th style="width:5%;"></th>
                      <th style="width:30%;" wire:click="doSort('Nom')">
                        <x-userAsc :sortColumn="$sortColumn" :sortDirection="$sortDirection" columnName="Nom" />
                      </th>
                      <th style="width:20%;" wire:click="doSort('Email')">
                        <x-userAsc :sortColumn="$sortColumn" :sortDirection="$sortDirection" columnName="Email" />
                      </th>
                      <th style="width:15%;">Roles</th>
                      <th style="width:15%;" class="text-center" wire:click="doSort('created_at')"> Ajouté</th>
                      <th style="width:15%;" class="text-center"> Actions </th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse($users as $user)
                    @if ($user->allRoleNames =="" || $user->allRoleNames ==null)
                     <tr>
                     <td style="width:5%;">
                      @if ($user->photo !="" || $user->photo !=null)
                        <img class="rounded-circle" width="40" height="40" src="{{asset($user->photo)}}">
                      @else
                        <img class="rounded-circle" width="40" height="40" src="{{asset('image/user.png')}}">
                      @endif
                      </td>
                      <td style="color:green;width:30%;">{{ $user->nom }} {{ $user->prenom }}</td>
                      <td style="color:green;width:20%;">{{ $user->email}}</td>
                      <td style="color:green;width:15%;"> {{$user->allRoleNames}}</td>
                      <td class="text-center" style="color:green;width:15%;"><span class="tag tag-success">{{ $user->created_at->diffForHumans() }}</span></td>
                      <td style="color:green;width:15%;">
                        <button class="btn btn-link" wire:click="goToEditUser({{$user->id}})" style="color:green;"> <i class="far fa-edit"></i> </button>
                         @if(count($user->roles) == 0)
                         <button class="btn btn-link" wire:click="confirmDelete('{{ $user->prenom }} {{ $user->nom }}', {{$user->id}})" style="color:red;"> <i class="far fa-trash-alt"></i> </button>
                         @endif
                      </td>
                    </tr>

                    @else
                      <tr>
                      <td style="width:5%;">
                      @if ($user->photo !="" || $user->photo !=null)
                        <img class="rounded-circle" width="40" height="40" src="{{asset($user->photo)}}">
                      @else
                        <img class="rounded-circle" width="40" height="40" src="{{asset('image/user.png')}}">
                      @endif
                      </td>
                      <td style="width:30%;">{{ $user->nom }} {{ $user->prenom }}</td>
                      <td style="width:20%;">{{ $user->email}}</td>
                      <td style="width:15%;"> {{$user->allRoleNames}}</td>
                      <td class="text-center" style="width:15%;"><span class="tag tag-success">{{ $user->created_at->diffForHumans() }}</span></td>
                      <td class="" style="width:15%;">
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