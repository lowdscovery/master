<div class="row p-4 pt-1">

<div class="content-body">
            <!-- row -->
            <div class="container-fluid">
				<div class="row">
					<div class="col-xl-12 col-xxl-12 col-sm-12">
                        <div class="card card-cyan">
                            <div class="card-header">
								<h5 class="card-title"><i class="fas fa-user-plus fa-2x"></i> Formulaire d'edition forage - puits</h5>
							</div>
							<div class="card-body">
                                <form role="form" wire:submit.prevent="updateOuvrage">
									<div class="row">
										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<input type="text" class="form-control @error('editOuvrage.annee') is-invalid @enderror" wire:model="editOuvrage.annee" placeholder="Annee" required="required" title="L'année doit être en 4 chiffre" pattern="\d{4}">
												@error("editOuvrage.annee")
												<span class="text-danger">{{$message}}</span>
												@enderror
											</div>
										</div>
										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<input type="text" class="form-control @error('editOuvrage.type') is-invalid @enderror" wire:model="editOuvrage.type" placeholder="Type" required="required" title="Saisissez le type">
													@error("editOuvrage.type")
													<span class="text-danger">{{$message}}</span>
													@enderror
											</div>
										</div>
										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<input type="text" class="form-control @error('editOuvrage.debitNominale') is-invalid @enderror" wire:model="editOuvrage.debitNominale" placeholder="Debit Nominale" required="required" title="Saisissez le debit nominal">
												@error("editOuvrage.debitNominale")
													<span class="text-danger">{{$message}}</span>
													@enderror
											</div>
										</div>
										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<input type="text" class="form-control @error('editOuvrage.profondeur') is-invalid @enderror" wire:model="editOuvrage.profondeur" placeholder="Profondeur" required="required" title="Saisissez le profondeur">
												@error("editOuvrage.profondeur")
													<span class="text-danger">{{$message}}</span>
													@enderror
											</div>
										</div>
										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<input type="text" class="form-control @error('editOuvrage.debitConseiller') is-invalid @enderror" wire:model="editOuvrage.debitConseiller" placeholder="Debit Conseiller" required="required" title="Saisissez le debit conseiller">
													@error("editOuvrage.debitConseiller")
												<span class="text-danger">{{$message}}</span>
													@enderror
											</div>
										</div>
										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<input type="text" class="form-control @error('editOuvrage.debitExploite') is-invalid @enderror" wire:model="editOuvrage.debitExploite" placeholder="Debit exploiter" required="required" title="Saisissez le debit exploiter">
													@error("editOuvrage.debitExploite")
												<span class="text-danger">{{$message}}</span>
													@enderror
											</div>
										</div>
										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<input type="text" class="form-control @error('editOuvrage.diametre') is-invalid @enderror" wire:model="editOuvrage.diametre" placeholder="Diametre" required="required" title="Saisissez le diamètre">
												@error("editOuvrage.diametre")
													<span class="text-danger">{{$message}}</span>
													@enderror
											</div>
										</div>
										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<input type="text" class="form-control @error('editOuvrage.nombreExhaur') is-invalid @enderror" wire:model="editOuvrage.nombreExhaur" placeholder="Nombre Exhaure" required="required" title="Saisissez le nombre exhaure">
												@error("editOuvrage.nombreExhaur")
													<span class="text-danger">{{$message}}</span>
													@enderror
											</div>
										</div>
										
										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<input type="text" class="form-control @error('editOuvrage.sondeBas') is-invalid @enderror" wire:model="editOuvrage.sondeBas" placeholder="Sonde Bas" required="required" title="Saisissez le sonde bas">
												@error("editOuvrage.sondeBas")
												<span class="text-danger">{{$message}}</span>
												@enderror
											</div>
										</div>
										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<input type="text" class="form-control @error('editOuvrage.sondeHaut') is-invalid @enderror" wire:model="editOuvrage.sondeHaut" placeholder="Sond Haut" required="required" title="Saisissez le sond haut">
												@error("editOuvrage.sondeHaut")
												<span class="text-danger">{{$message}}</span>
												@enderror
											</div>
										</div>
										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<input class="form-control " type="file" wire:model="image" wire:loading.attr="disabled" id="image{{$resetValueInput}}" title="Selectionner l'image">
											</div>
										</div>
										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<input class="form-control " type="file" wire:model="fichier" wire:loading.attr="disabled" id="fichier{{$resetValueInput}}" title="Selectionner le pdf">
											</div>
										</div>
										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<select class="form-control @error("editOuvrage.ressource_id") is-invalid @enderror" wire:model="editOuvrage.ressource_id" required="required" required="required" title="Choisissez le type de forage ou puits">
												@error("editOuvrage.ressource_id")
														<span class="text-danger">{{$message}}</span>
												@enderror 
													<option value="">---------</option>
													@foreach ($ressources as $ressource)                          
													<option value="{{$ressource->id}}">{{$ressource->nom}}</option>
													@endforeach
												</select>
											</div>
										</div>
										<div class="col-lg-12 col-md-12 col-sm-12">
										<div wire:loading.delay wire:target="updateOuvrage">
											<span class="text-green">Encours...</span>
										</div>
											<button type="submit" class="btn btn-primary" wire:loading.attr="disabled">Modifier</button>
											<button type="button" class="btn btn-info" wire:click="selectede()" >Retouner à la liste</button>
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