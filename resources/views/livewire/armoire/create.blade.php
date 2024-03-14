<div class="row p-4 pt-1">

<div class="content-body">
            <!-- row -->
            <div class="container-fluid">
				<div class="row">
					<div class="col-xl-12 col-xxl-12 col-sm-12">
                        <div class="card card-cyan">
                            <div class="card-header">
								<h5 class="card-title"><i class="fas fa-user-plus fa-2x"></i> Formulaire de création armoire de commande</h5>
							</div>
							<div class="card-body">
                                <form role="form" wire:submit.prevent="addArmoire()">
									<div class="row">
										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<label class="form-label">Repere</label>
												<input type="text" wire:model="addArmoire.repere" class="form-control @error('addArmoire.repere') is-invalid @enderror" placeholder="Repere" required="required" 
												title="Saisissez le repere">

                                                @error("addArmoire.repere")
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
											</div>
										</div>
										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<label class="form-label">Designation</label>
												<input type="text" wire:model="addArmoire.designation" class="form-control @error('addArmoire.designation') is-invalid @enderror" placeholder="Designation" required="required"
												title="Saisir le designation">

                                                @error("addArmoire.designation")
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
											</div>
										</div>
										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<label class="form-label">Marque</label>
												<input type="text" wire:model="addArmoire.marque" class="form-control @error('addArmoire.marque') is-invalid @enderror" placeholder="Marque" required="required"
												title="Saisir le marque">

                                                @error("addArmoire.marque")
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
											</div>
										</div>
										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<label class="form-label"> Type</label>
												<input type="text" class="form-control @error('addArmoire.type') is-invalid @enderror" wire:model="addArmoire.type" placeholder="Type" required="required" title="Saisir le type">
                                                @error("addArmoire.type")
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
											</div>
										</div>
										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<label class="form-label">Reglage</label>
												<input type="text" class="form-control @error('addArmoire.reglage') is-invalid @enderror" wire:model="addArmoire.reglage" placeholder="Reglage" required="required"
												title="Saisissez le reglage">
                                                @error("addArmoire.reglage")
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
											</div>
										</div>
										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<label class="form-label">Date de pose</label>
												<input type="date" class="form-control @error('addArmoire.datePose') is-invalid @enderror" wire:model="addArmoire.datePose" required="required"
												title="Date de pose">
                                                @error("addArmoire.datePose")
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
											</div>
										</div>	
										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<label class="form-label">Image Face</label>
												<input type="file" class="form-control" wire:model="image" id="image{{$resetValueInput}}" placeholder="password" required="required" title="Selectionner l'image face">
											</div>
										</div>
										
										<div class="col-lg-6 col-md-12 col-sm-12">
											<div class="form-group">
											<label class="form-label">Image Derriere</label>
												<input type="file" class="form-control" wire:model="photo" id="photo{{$resetValueInput}}"  wire:loading.attr="disabled" required="required" title="Selectionner l'image dérriere">
											</div>
										</div>
										<div class="col-lg-12 col-md-12 col-sm-12">
										<div wire:loading.delay wire:target="addArmoire()">
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