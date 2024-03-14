<div class="row p-4 pt-1">

<div class="content-body">
            <!-- row -->
            <div class="container-fluid">
				<div class="row">
					<div class="col-xl-12 col-xxl-12 col-sm-12">
                        <div class="card card-cyan">
                            <div class="card-header">
								<h5 class="card-title"><i class="fas fa-user-plus fa-2x"></i> Formulaire d'edition armoire de commande</h5>
							</div>
							<div class="card-body">
                                <form role="form" wire:submit.prevent="updateArmoire()">
									<div class="row">
										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<label class="form-label">Repere</label>
												<input type="text" wire:model="editArmoire.repere" class="form-control @error('editArmoire.repere') is-invalid @enderror" placeholder="Repere" required="required" 
												title="Saisissez le repere">

                                                @error("editArmoire.repere")
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
											</div>
										</div>
										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<label class="form-label">Designation</label>
												<input type="text" wire:model="editArmoire.designation" class="form-control @error('editArmoire.designation') is-invalid @enderror" placeholder="Designation" required="required"
												title="Saisir le designation">

                                                @error("editArmoire.designation")
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
											</div>
										</div>
										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<label class="form-label">Marque</label>
												<input type="text" wire:model="editArmoire.marque" class="form-control @error('editArmoire.marque') is-invalid @enderror" placeholder="Marque" required="required"
												title="Saisir le marque">

                                                @error("editArmoire.marque")
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
											</div>
										</div>
										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<label class="form-label"> Type</label>
												<input type="text" class="form-control @error('editArmoire.type') is-invalid @enderror" wire:model="editArmoire.type" placeholder="Type" required="required" title="Saisir le type">
                                                @error("editArmoire.type")
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
											</div>
										</div>
										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<label class="form-label">Reglage</label>
												<input type="text" class="form-control @error('editArmoire.reglage') is-invalid @enderror" wire:model="editArmoire.reglage" placeholder="Reglage" required="required"
												title="Saisissez le reglage">
                                                @error("editArmoire.reglage")
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
											</div>
										</div>
										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<label class="form-label">Date de pose</label>
												<input type="date" class="form-control @error('editArmoire.datePose') is-invalid @enderror" wire:model="editArmoire.datePose" required="required"
												title="Date de pose">
                                                @error("editArmoire.datePose")
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
											</div>
										</div>	
										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<label class="form-label">Image Face</label>
												<input type="file" class="form-control" wire:model="editImage" id="editImage{{$resetValueInput}}" placeholder="password" title="Selectionner l'image face">
											</div>
										</div>
										
										<div class="col-lg-6 col-md-12 col-sm-12">
											<div class="form-group">
											<label class="form-label">Image Derriere</label>
												<input type="file" class="form-control" wire:model="editPhoto" id="editPhoto{{$resetValueInput}}"  wire:loading.attr="disabled" title="Selectionner l'image dérriere">
											</div>
										</div>
										<div class="col-lg-12 col-md-12 col-sm-12">
										<div wire:loading.delay wire:target="updateArmoire()">
											<span class="text-green">Encours...</span>
										</div>
											<button type="submit" class="btn btn-primary" wire:loading.attr="disabled">Enregistrer</button>
											<button type="button" class="btn btn-info" wire:click="goToListArmoire()" >Retouner à la liste des armoires</button>
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