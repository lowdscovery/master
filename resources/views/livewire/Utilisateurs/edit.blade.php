<div class="row p-4 pt-1">
    <div class="col-md-6">
        <!-- general form elements -->
        <div class="card card-cyan">
            <div class="card-header">
            <h3 class="card-title"><i class="fas fa-user-plus fa-2x"></i> Formulaire d'édition utilisateur</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" wire:submit.prevent="updateUser()" method="POST">
            <div class="card-body">

                @if ($errors->any())
                    <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <div class="d-flex">
                    <div class="form-group flex-grow-1 mr-2">
                        <label >Nom</label>
                        <input type="text" wire:model="editUser.nom" class="form-control @error('editUser.nom') is-invalid @enderror" title="Le nom doit être en majuscule" pattern="[A-Z]+">

                        @error("editUser.nom")
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group flex-grow-1">
                        <label >Prenom</label>
                        <input type="text" wire:model="editUser.prenom" class="form-control @error('editUser.prenom') is-invalid @enderror" title="Saisir votre prenom">

                        @error("editUser.prenom")
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                <label >Sexe</label>
                <select class="form-control @error('editUser.sexe') is-invalid @enderror" wire:model="editUser.sexe"
                 title="Choisir votre sexe">
                    <option value="">---------</option>
                    <option value="Homme">Homme</option>
                    <option value="Femme">Femme</option>
                </select>
                @error("editUser.sexe")
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                </div>

                <div class="form-group">
                <label >Adresse e-mail</label>
                <input type="text" class="form-control @error('editUser.email') is-invalid @enderror" wire:model="editUser.email" title="Saisir votre addresse email">
                @error("editUser.email")
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                </div>

                <div class="form-group">
                        <label >Telephone </label>
                        <input type="text" class="form-control @error('editUser.telephone1') is-invalid @enderror" wire:model="editUser.telephone1" title="Le numero de telephone doit être 10 chiffre" pattern="\d{10}">
                        @error("editUser.telephone1")
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                </div>

            <div class="form-group">
                <label >Piece d'identité</label>
                <select class="form-control @error('editUser.pieceIdentite') is-invalid @enderror" wire:model="editUser.pieceIdentite" title="Choisir votre piece d'identité">
                    <option value="">---------</option>
                    <option value="CIN">CIN</option>
                    <option value="PASSPORT">PASSPORT</option>
                    <option value="PERMIS DE CONDUIRE">PERMIS DE CONDUIRE</option>
                </select>
                @error("editUser.pieceIdentite")
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                </div>

                <div class="form-group">
                        <label >Numero de piece d'identité</label>
                        <input type="text" class="form-control @error('editUser.numeroPieceIdentite') is-invalid @enderror" wire:model="editUser.numeroPieceIdentite" title="Le numero de piece d'identité doit être 12 chiffre" pattern="\d{12}">
                        @error("editUser.numeroPieceIdentite")
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                </div>

                <div class="form-group flex-grow-1">
                   <input type="file" wire:model="editImage" id="editImage{{$resetValueInput}}" wire:loading.attr="disabled" title="Selectionner votre photo">                   
                </div>
                <div style="border: 1px solid #d0d1d3; border-radius: 20px; height: 200px; width:200px; overflow:hidden;">
                    @if (isset($editImage))
                        <img src="{{ $editImage->temporaryUrl() }}" style="height:200px; width:200px;">
                    @elseif ($editUser["photo"] !="" || $editUser["photo"] !=null)
                    <img src="{{asset($editUser["photo"])}}" style="height:200px; width:200px;">
                    @else
                    <img src="{{asset('image/imageplaceholder.png')}}"  style="height:200px; width:200px;">
                    @endif
               </div>
                    @isset($editImage)
               <div>
                    <button type="button" class="btn btn-success btn-sm mt-2" wire:click="$set('editImage', null)">Réinitialiser</button>    
                </div> 
                  @endisset
             

            </div>
            <!-- /.card-body -->

            <div class="card-footer">
            <div wire:loading.delay wire:target="updateUser">
                <span class="text-green">Encours...</span>
            </div>
                <button type="submit" class="btn btn-primary" wire:loading.attr="disabled">Appliquer les modifications</button>
                <button type="button" wire:click="goToListUser()" class="btn btn-danger">Retour à la liste</button>
            </div>
            </form>
        </div>
        <!-- /.card -->

    </div>



<!-- /.partie reinitialisation -->
       <div class="col-md-6">
        <div class="row ">
            <div class="col-md-12">
                <div class="card card-cyan">
                    <div class="card-header">
                    <h3 class="card-title"><i class="fas fa-key fa-2x"></i> Réinitialisation de mot de passe</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <ul>
                            <li>
                                <a href="#" class="btn btn-link" wire:click.prevent="confirmPwdReset()">Réinitialiser le mot de passe</a>
                                <span>(par défaut: "password") </span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="col-md-12 mt-4">
                <div class="card card-cyan">
                    <div class="card-header d-flex align-items-center">
                    <h3 class="card-title flex-grow-1"><i class="fas fa-fingerprint fa-2x"></i> Roles</h3>
                    <button class="btn bg-gradient-success" wire:click="updateRoleAndPermissions"><i class="fas fa-check"></i> Appliquer les modifications</button>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                            <div id="accordion">
                                    @foreach($rolePermissions["roles"] as $role)
                                    <div class="card">
                                        <div class="card-header d-flex justify-content-between">
                                            <h4 class="card-title flex-grow-1">
                                            <a  data-parent="#accordion" href="#"  aria-expanded="true">
                                                {{$role["role_nom"]}}
                                            </a>
                                            </h4>
                                            <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">

                                                <input type="checkbox" class="custom-control-input" wire:model.lazy="rolePermissions.roles.{{$loop->index}}.active"
                                                    @if($role["active"]) checked @endif
                                                    id="customSwitch{{$role['role_id']}}">
                                                <label class="custom-control-label" for="customSwitch{{$role['role_id']}}"> {{ $role["active"]? "Activé" : "Desactivé" }}</label>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                            </div>
                    </div>
                </div>
            </div>
        </div>
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
                @this.deleteUser(event.detail.message.data.user_id)
            }

            @this.resetPassword()

        }
        })
    })

</script>