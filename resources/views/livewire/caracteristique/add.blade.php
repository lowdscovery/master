<div class="row p-4 pt-5">
            <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-gray">
              <div class="card-header">
                <h3 class="card-title"><i class="fas fa-user-plus fa-2x"></i> Formulaire d'ajout un moteur </h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" wire:submit.prevent="addCaract()">
                <div class="card-body">

                    <div class="d-flex">
                        <div class="form-group flex-grow-1 mr-2">
                            <label >Marque</label>
                            <input type="text" placeholder="Marque" wire:model="newCaract.marque" class="form-control @error('newCaract.marque') is-invalid @enderror">

                            @error("newCaract.marque")
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group flex-grow-1">
                            <label >Type</label>
                            <input type="text" placeholder="Type" wire:model="newCaract.type" class="form-control @error('newCaract.type') is-invalid @enderror">

                            @error("newCaract.type")
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                    <label >Numero de serie</label>
                    <input type="text" placeholder="Numero de serie" class="form-control @error('newCaract.numeroSerie') is-invalid @enderror" wire:model="newCaract.numeroSerie">
                    @error("newCaract.numeroSerie")
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                  </div>

                  <div class="form-group">
                            <label >Numero de fabrication </label>
                            <input type="text" placeholder="Numero de fabrication" class="form-control @error('newCaract.numeroFabrication') is-invalid @enderror" wire:model="newCaract.numeroFabrication">
                            @error("newCaract.numeroFabrication")
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                    </div>

                    <div class="form-group">
                            <label >Vitesse </label>
                            <input type="text" placeholder="Vitesse" class="form-control @error('newCaract.vitesse') is-invalid @enderror" wire:model="newCaract.vitesse">
                            @error("newCaract.vitesse")
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                    </div>

                  <div class="form-group">
                    <label >Encombrement</label>
                    <input type="text" placeholder="Encombrement" class="form-control @error('newCaract.encombrement') is-invalid @enderror" wire:model="newCaract.encombrement">
                    @error("newCaract.encombrement")
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                  </div>

                  <div class="form-group">
                            <label >Année Fabrication </label>
                            <input type="date" class="form-control @error('newCaract.anneeFabrication') is-invalid @enderror" wire:model="newCaract.anneeFabrication">
                            @error("newCaract.anneeFabrication")
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                    </div>

                  <div class="form-group">
                            <label >Fournisseur</label>
                            <input type="text" placeholder="Fournisseur" class="form-control @error('newCaract.fournisseur') is-invalid @enderror" wire:model="newCaract.fournisseur">
                            @error("newCaract.fournisseur")
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                   <div class="form-group">
                            <label >Date d'Aquisition</label>
                            <input type="date" class="form-control @error('newCaract.dateAcquisition') is-invalid @enderror" wire:model="newCaract.dateAcquisition">
                            @error("newCaract.dateAcquisition")
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                    </div>

                     <div class="form-group">
                            <label >Date mise en services</label>
                            <input type="date" class="form-control @error('newCaract.dateMiseEnService') is-invalid @enderror" wire:model="newCaract.dateMiseEnService">
                            @error("newCaract.dateMiseEnService")
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                    </div>

                      <div class="form-group">
                    <label >Moteur</label>
                    <select class="form-control @error('newCaract.moteurs') is-invalid @enderror" wire:model="newCaract.moteurs">
                        <option value="">---------</option>
                        <option value="POMPE">POMPE</option>
                        <option value="ELECTRIQUE">ELECTRIQUE</option>
                    </select>
                    @error("newCaract.moteurs")
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>

                    <div class="form-group">
                            <label >Roulement</label>
                            <input type="text" placeholder="Roulement" class="form-control @error('newCaract.roulement') is-invalid @enderror" wire:model="newCaract.roulement">
                            @error("newCaract.roulement")
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                    </div>


                    <div class="form-group">
                            <label >Mise en service</label>
                            <input type="text" placeholder="Mise en service" class="form-control @error('newCaract.misesEnServices') is-invalid @enderror" wire:model="newCaract.misesEnServices">
                            @error("newCaract.misesEnServices")
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                    </div>

                    <div class="form-group">
                            <label >Observations</label>
                            <input type="text" placeholder="Observation" class="form-control @error('newCaract.observations') is-invalid @enderror" wire:model="newCaract.observations">
                            @error("newCaract.observations")
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                    </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                <div wire:loading.delay wire:target="addCaract">
                   <span class="text-green">Sending...</span>
                </div>
                  <button type="submit" class="btn btn-primary" wire:loading.attr="disabled">Enregistrer</button>
                  <button type="button" wire:click="goToList()" class="btn btn-danger">Retour à la liste</button>
                </div>
              </form>
            </div>
            <!-- /.card -->

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