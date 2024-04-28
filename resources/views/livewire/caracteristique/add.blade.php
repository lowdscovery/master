<div class="row p-4 pt-1">

<div class="content-body">
            <!-- row -->
            <div class="container-fluid">
				<div class="row">
					<div class="col-xl-12 col-xxl-12 col-sm-12">
                        <div class="card card-cyan">
                            <div class="card-header">
								<h5 class="card-title"><i class="fas fa-user-plus fa-2x"></i>Formulaire d'ajout un moteur</h5>
							</div>
							<div class="card-body">
                                <form role="form" wire:submit.prevent="">
									<div class="row">
										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<label class="form-label">Marque</label>
												<input type="text" wire:model="newCaract.marque" class="form-control @error('newCaract.marque') is-invalid @enderror" placeholder="Marque" required="required">

                                                @error("newCaract.marque")
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
											</div>
										</div>
										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<label class="form-label">Type</label>
												<input type="text" wire:model="newCaract.type" class="form-control @error('newCaract.type') is-invalid @enderror" placeholder="Type" required="required">

                                                @error("newCaract.type")
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
											</div>
										</div>
										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<label class="form-label">Numero de serie</label>
												<input type="text" wire:model="newCaract.numeroSerie" class="form-control @error('newCaract.numeroSerie') is-invalid @enderror" placeholder="Numero de serie" required="required">
                                                    @error("newCaract.numeroSerie")
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
											</div>
										</div>
										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<label class="form-label">Numero de fabrication</label>
												<input type="text" class="form-control @error('newCaract.numeroFabrication') is-invalid @enderror" wire:model="newCaract.numeroFabrication" placeholder="Numero de fabrication" required="required">
                                                @error("newCaract.numeroFabrication")
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
											</div>
										</div>
										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<label class="form-label">Vitesse</label>
												<input type="text" class="form-control @error('newCaract.vitesse') is-invalid @enderror" wire:model="newCaract.vitesse" placeholder="Vitesse" required="required">
                                                @error("newCaract.vitesse")
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
											</div>
										</div>
										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<label class="form-label">Encombrement</label>
												<input type="text" class="form-control @error('newCaract.encombrement') is-invalid @enderror" wire:model="newCaract.encombrement" placeholder="Encombrement" required="required">
                                                @error("newCaract.encombrement")
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
											</div>
										</div>
										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<label class="form-label">Année de Fabrication</label>
												<input type="date" class="form-control @error('newCaract.anneeFabrication') is-invalid @enderror" wire:model="newCaract.anneeFabrication" required="required">
                                                @error("newCaract.anneeFabrication")
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
											</div>
										</div>
										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<label class="form-label">Fournisseur</label>
												<input type="text" class="form-control @error('newCaract.fournisseur') is-invalid @enderror" wire:model="newCaract.fournisseur" placeholder="Fournisseur" required="required">
                                                @error("newCaract.fournisseur")
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
											</div>
										</div>
										
										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<label class="form-label">Date d'Aquisition</label>
												<input type="date" class="form-control @error('newCaract.dateAcquisition') is-invalid @enderror" wire:model="newCaract.dateAcquisition" required="required">
                                                @error("newCaract.dateAcquisition")
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
											</div>
										</div>
                                        <div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<label class="form-label">Date mise en service</label>
												<input type="date" class="form-control @error('newCaract.dateMiseEnService') is-invalid @enderror" wire:model="newCaract.dateMiseEnService" required="required">
                                                @error("newCaract.dateMiseEnService")
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
											</div>
										</div>
                                        <div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<label >Moteur</label>
                                                <select class="form-control @error('newCaract.moteurs') is-invalid @enderror" wire:model="newCaract.moteurs">
                                                    <option value="">---------</option>
                                                    <option value="POMPE">POMPE</option>
                                                    <option value="POMPE DOSEUSE">POMPE DOSEUSE</option>
                                                </select>
                                                @error("newCaract.moteurs")
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
											</div>
										</div>
                                        <div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<label >Roulement</label>
                            <input type="text" placeholder="Roulement" class="form-control @error('newCaract.roulement') is-invalid @enderror" wire:model="newCaract.roulement">
                                                @error("newCaract.roulement")
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
											</div>
										</div>
                                        <div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<label >Mise en service</label>
                            <input type="text" placeholder="Mise en service" class="form-control @error('newCaract.misesEnServices') is-invalid @enderror" wire:model="newCaract.misesEnServices">
                                                @error("newCaract.misesEnServices")
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
											</div>
										</div>
                                        <div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<label class="form-label">Observation</label>
												<input type="text" class="form-control @error('newCaract.observations') is-invalid @enderror" wire:model="newCaract.observations" placeholder="Fournisseur" required="required">
                                                @error("newCaract.observations")
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
											</div>
										</div>                                     
										<div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="card-footer">
                                    <div wire:loading.delay wire:target="addCaract">
                                    <span class="text-green">Sending...</span>
                                    </div>
                  <button type="submit" class="btn btn-primary" wire:loading.attr="disabled">Enregistrer</button>
                  <button type="button" wire:click="goToList()" class="btn btn-danger">Retour à la liste</button>
										</div>
									</div>
								</form>
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
                title: event.detail.message || "Opération effectuée avec succès!",
                showConfirmButton: false,
                timer: 2000
                }
            )
    })
</script>