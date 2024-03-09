<div class="row p-4 pt-5">
            <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-gray">
              <div class="card-header">
                <h3 class="card-title"><i class="fas fa-user-plus fa-2x"></i> Formulaire d'edition d'un moteur </h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" wire:submit.prevent="updateCaract()" method="POST">
                <div class="card-body">

                    <div class="d-flex">
                        <div class="form-group flex-grow-1 mr-2">
                            <label >Marque</label>
                            <input type="text" placeholder="Marque" wire:model="editCaract.marque" class="form-control @error('editCaract.marque') is-invalid @enderror">

                            @error("editCaract.marque")
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group flex-grow-1">
                            <label >Type</label>
                            <input type="text" placeholder="Type" wire:model="editCaract.type" class="form-control @error('editCaract.type') is-invalid @enderror">

                            @error("editCaract.type")
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                    <label >Numero de serie</label>
                    <input type="text" placeholder="Numero de serie" class="form-control @error('editCaract.numeroSerie') is-invalid @enderror" wire:model="editCaract.numeroSerie">
                    @error("editCaract.numeroSerie")
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                  </div>

                  <div class="form-group">
                            <label >Numero de fabrication </label>
                            <input type="text" placeholder="Numero de fabrication" class="form-control @error('editCaract.numeroFabrication') is-invalid @enderror" wire:model="editCaract.numeroFabrication">
                            @error("editCaract.numeroFabrication")
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                    </div>

                    <div class="form-group">
                            <label >Vitesse </label>
                            <input type="text" placeholder="Vitesse" class="form-control @error('editCaract.vitesse') is-invalid @enderror" wire:model="editCaract.vitesse">
                            @error("editCaract.vitesse")
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                    </div>

                  <div class="form-group">
                    <label >Encombrement</label>
                    <input type="text" placeholder="Encombrement" class="form-control @error('editCaract.encombrement') is-invalid @enderror" wire:model="editCaract.encombrement">
                    @error("editCaract.encombrement")
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                  </div>

                  <div class="form-group">
                            <label >Année Fabrication </label>
                            <input type="date" class="form-control @error('editCaract.anneeFabrication') is-invalid @enderror" wire:model="editCaract.anneeFabrication">
                            @error("editCaract.anneeFabrication")
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                    </div>

                  <div class="form-group">
                            <label >Fournisseur</label>
                            <input type="text" placeholder="Fournisseur" class="form-control @error('editCaract.fournisseur') is-invalid @enderror" wire:model="editCaract.fournisseur">
                            @error("editCaract.fournisseur")
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                   <div class="form-group">
                            <label >Date d'Aquisition</label>
                            <input type="date" class="form-control @error('editCaract.dateAcquisition') is-invalid @enderror" wire:model="editCaract.dateAcquisition">
                            @error("editCaract.dateAcquisition")
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                    </div>

                     <div class="form-group">
                            <label >Date mise en services</label>
                            <input type="date" class="form-control @error('editCaract.dateMiseEnService') is-invalid @enderror" wire:model="editCaract.dateMiseEnService">
                            @error("editCaract.dateMiseEnService")
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                    </div>

                      <div class="form-group">
                    <label >Moteur</label>
                    <select class="form-control @error('editCaract.moteurs') is-invalid @enderror" wire:model="editCaract.moteurs">
                        <option value="">---------</option>
                        <option value="POMPE">POMPE</option>
                        <option value="ELECTRIQUE">ELECTRIQUE</option>
                    </select>
                    @error("editCaract.moteurs")
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>

                    <div class="form-group">
                            <label >Roulement</label>
                            <input type="text" placeholder="Roulement" class="form-control @error('editCaract.roulement') is-invalid @enderror" wire:model="editCaract.roulement">
                            @error("editCaract.roulement")
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                    </div>


                    <div class="form-group">
                            <label >Mise en service</label>
                            <input type="text" placeholder="Mise en service" class="form-control @error('editCaract.misesEnServices') is-invalid @enderror" wire:model="editCaract.misesEnServices">
                            @error("editCaract.misesEnServices")
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                    </div>

                    <div class="form-group">
                            <label >Observations</label>
                            <input type="text" placeholder="Observation" class="form-control @error('editCaract.observations') is-invalid @enderror" wire:model="editCaract.observations">
                            @error("editCaract.observations")
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                    </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Appliquer les modifications</button>
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