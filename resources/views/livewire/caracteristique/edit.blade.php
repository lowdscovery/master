<div class="row p-4 pt-1">

<div class="content-body">
            <!-- row -->
            <div class="container-fluid">
				<div class="row">
					<div class="col-xl-12 col-xxl-12 col-sm-12">
                        <div class="card card-cyan">
                            <div class="card-header">
								<h5 class="card-title"><i class="fas fa-user-plus fa-2x"></i>Formulaire d'edition d'un moteur</h5>
							</div>
							<div class="card-body">
                                <form role="form" wire:submit.prevent="updateCaract()" method="POST">
									<div class="row">
										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<label class="form-label">Marque</label>
												<input type="text" wire:model="editCaract.marque" class="form-control @error('editCaract.marque') is-invalid @enderror" placeholder="Marque" required="required">

                                                @error("editCaract.marque")
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
											</div>
										</div>
										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<label class="form-label">Type</label>
												<input type="text" wire:model="editCaract.type" class="form-control @error('editCaract.type') is-invalid @enderror" placeholder="Type" required="required">

                                                @error("editCaract.type")
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
											</div>
										</div>
										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<label class="form-label">Numero de serie</label>
												<input type="text" wire:model="editCaract.numeroSerie" class="form-control @error('editCaract.numeroSerie') is-invalid @enderror" placeholder="Numero de serie" required="required">
                                                    @error("editCaract.numeroSerie")
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
											</div>
										</div>
										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<label class="form-label">Numero de fabrication</label>
												<input type="text" class="form-control @error('editCaract.numeroFabrication') is-invalid @enderror" wire:model="editCaract.numeroFabrication" placeholder="Numero de fabrication" required="required">
                                                @error("editCaract.numeroFabrication")
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
											</div>
										</div>
										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<label class="form-label">Vitesse</label>
												<input type="text" class="form-control @error('editCaract.vitesse') is-invalid @enderror" wire:model="editCaract.vitesse" placeholder="Vitesse" required="required">
                                                @error("editCaract.vitesse")
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
											</div>
										</div>
										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<label class="form-label">Encombrement</label>
												<input type="text" class="form-control @error('editCaract.encombrement') is-invalid @enderror" wire:model="editCaract.encombrement" placeholder="Encombrement" required="required">
                                                @error("editCaract.encombrement")
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
											</div>
										</div>
										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<label class="form-label">Année de Fabrication</label>
												<input type="date" class="form-control @error('editCaract.anneeFabrication') is-invalid @enderror" wire:model="editCaract.anneeFabrication" required="required">
                                                @error("editCaract.anneeFabrication")
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
											</div>
										</div>
										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<label class="form-label">Fournisseur</label>
												<input type="text" class="form-control @error('editCaract.fournisseur') is-invalid @enderror" wire:model="editCaract.fournisseur" placeholder="Fournisseur" required="required">
                                                @error("editCaract.fournisseur")
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
											</div>
										</div>
										
										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<label class="form-label">Date d'Aquisition</label>
												<input type="date" class="form-control @error('editCaract.dateAcquisition') is-invalid @enderror" wire:model="editCaract.dateAcquisition" required="required">
                                                @error("editCaract.dateAcquisition")
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
											</div>
										</div>
                                        <div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<label class="form-label">Date mise en service</label>
												<input type="date" class="form-control @error('editCaract.dateMiseEnService') is-invalid @enderror" wire:model="editCaract.dateMiseEnService" required="required">
                                                @error("editCaract.dateMiseEnService")
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
											</div>
										</div>
                                        <div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<label >Moteur</label>
                                                <select class="form-control @error('editCaract.moteurs') is-invalid @enderror" wire:model="editCaract.moteurs">
                                                    <option value="">---------</option>
                                                    <option value="POMPE">POMPE</option>
                                                    <option value="POMPE DOSEUSE">POMPE DOSEUSE</option>
                                                </select>
                                                @error("editCaract.moteurs")
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
											</div>
										</div>
                                        <div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<label >Roulement</label>
                            <input type="text" placeholder="Roulement" class="form-control @error('editCaract.roulement') is-invalid @enderror" wire:model="editCaract.roulement">
                                                @error("editCaract.roulement")
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
											</div>
										</div>
                                        <div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<label >Mise en service</label>
                            <input type="text" placeholder="Mise en service" class="form-control @error('editCaract.misesEnServices') is-invalid @enderror" wire:model="editCaract.misesEnServices">
                                                @error("editCaract.misesEnServices")
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
											</div>
										</div>
                                        <div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<label class="form-label">Observation</label>
												<input type="text" class="form-control @error('editCaract.observations') is-invalid @enderror" wire:model="editCaract.observations" placeholder="Fournisseur" required="required">
                                                @error("editCaract.observations")
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
											</div>
										</div>                                     
										<div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="card-footer">
                                    <div wire:loading.delay wire:target="updateCaract">
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