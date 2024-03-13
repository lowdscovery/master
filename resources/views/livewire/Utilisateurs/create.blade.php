<div class="row p-4 pt-1">

<div class="content-body">
            <!-- row -->
            <div class="container-fluid">
				<div class="row">
					<div class="col-xl-12 col-xxl-12 col-sm-12">
                        <div class="card card-cyan">
                            <div class="card-header">
								<h5 class="card-title"><i class="fas fa-user-plus fa-2x"></i> Formulaire de création d'un nouvel utilisateur</h5>
							</div>
							<div class="card-body">
                                <form role="form" wire:submit.prevent="addUser()">
									<div class="row">
										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<label class="form-label">Nom</label>
												<input type="text" wire:model="newUser.nom" class="form-control @error('newUser.nom') is-invalid @enderror" placeholder="Nom" required="required" 
												title="Le nom doit être en majuscule" pattern="[A-Z]+">

                                                @error("newUser.nom")
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
											</div>
										</div>
										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<label class="form-label">Prenom</label>
												<input type="text" wire:model="newUser.prenom" class="form-control @error('newUser.prenom') is-invalid @enderror" placeholder="Prenom" required="required"
												title="Saisir votre prenom">

                                                @error("newUser.prenom")
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
											</div>
										</div>
										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<label class="form-label">Sexe</label>
												<select class="form-control @error('newUser.sexe') is-invalid @enderror" wire:model="newUser.sexe" required="required" title="Choisir votre sexe">
                                                    <option value="">---------</option>
                                                    <option value="Homme">Homme</option>
                                                    <option value="Femme">Femme</option>
                                                </select>
                                                    @error("newUser.sexe")
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
											</div>
										</div>
										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<label class="form-label"> Adresse e-mail</label>
												<input type="text" class="form-control @error('newUser.email') is-invalid @enderror" wire:model="newUser.email" placeholder="Email" required="required" title="Saisir votre addresse email">
                                                @error("newUser.email")
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
											</div>
										</div>
										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<label class="form-label">Telephone</label>
												<input type="text" class="form-control @error('newUser.telephone1') is-invalid @enderror" wire:model="newUser.telephone1" placeholder="Telephone" required="required"
												title="Le numero de telephone doit être 10 chiffre" pattern="\d{10}">
                                                @error("newUser.telephone1")
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
											</div>
										</div>
										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<label class="form-label">Piece d'identité</label>
												<select class="form-control @error('newUser.pieceIdentite') is-invalid @enderror" wire:model="newUser.pieceIdentite" required="required" title="Choisir votre piece d'identité">
                                                    <option value="">---------</option>
                                                    <option value="CIN">CIN</option>
                                                    <option value="PASSPORT">PASSPORT</option>
                                                    <option value="PERMIS DE CONDUIRE">PERMIS DE CONDUIRE</option>
                                                </select>
                                                @error("newUser.pieceIdentite")
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
											</div>
										</div>
										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<label class="form-label">Numero de piece d'identité</label>
												<input type="text" class="form-control @error('newUser.numeroPieceIdentite') is-invalid @enderror" wire:model="newUser.numeroPieceIdentite" placeholder="Numero de piece d'identité" required="required"
												title="Le numero de piece d'identité doit être 12 chiffre" pattern="\d{12}">
                                                @error("newUser.numeroPieceIdentite")
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
											</div>
										</div>
										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<label class="form-label">Mot de passe</label>
												<input type="password" class="form-control @error('newUser.password') is-invalid @enderror" wire:model="newUser.password" placeholder="password" required="required" title="Saisir votre mot de passe">
                                                @error("newUser.password")
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
											</div>
										</div>
										
										<div class="col-lg-12 col-md-12 col-sm-12">
											<div class="form-group fallback w-100">
												<input type="file" class="form-control" wire:loading.attr="disabled" wire:model="image" id="image{{$resetValueInput}}" wire:loading.attr="disabled" required="required" title="Selectionner votre photo">
											</div>
										</div>
										<div class="col-lg-12 col-md-12 col-sm-12">
										<div wire:loading.delay wire:target="addUser">
											<span class="text-green">Encours...</span>
										</div>
											<button type="submit" class="btn btn-primary" wire:loading.attr="disabled">Enregistrer</button>
											<button type="button" class="btn btn-info" wire:click="goToListUser()" >Retouner à la liste des utilisateurs</button>
										</div>
									</div>
								</form>
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
                title: event.detail.message || "Opération effectuée avec succès!",
                showConfirmButton: false,
                timer: 2000
                }
            )
    })
</script>