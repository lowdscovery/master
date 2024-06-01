<!-- xl ou lg modal-->

        <div class="modal-header">
            <h5 class="modal-title">Caracteristique des <strong>POMPE</strong> </h5>
      </div>
      <div class="modal-body">
      @if ($showInputPompe)
          <div class="d-flex my-4 bg-gray-light p-2">
              <div class="d-flex flex-grow-1 mr-2">
                  <div class="flex-grow-1 mr-2">
                      <input type="text" placeholder="Marque"  wire:model="addModal.marque" class="form-control @error("addModal.marque") is-invalid @enderror" title="marque">
                      @error("addModal.marque")
                          <span class="text-danger">{{$message}}</span>
                      @enderror
                  </div>
                  <div class="flex-grow-1 mr-2">
                      <input type="text" placeholder="Type"  wire:model="addModal.type" class="form-control @error("addModal.type") is-invalid @enderror" title="type">
                      @error("addModal.type")
                          <span class="text-danger">{{$message}}</span>
                      @enderror
                  </div>
                  <div class="flex-grow-1 mr-2">
                      <input type="text" placeholder="Numero serie"  wire:model="addModal.numeroSerie" class="form-control @error("addModal.numeroSerie") is-invalid @enderror" title="numero de serie">
                      @error("addModal.numeroSerie")
                          <span class="text-danger">{{$message}}</span>
                      @enderror
                  </div>
                  <div class="flex-grow-1 mr-2">
                      <input type="text" placeholder="Numero Fabrication"  wire:model="addModal.numeroFabrication" class="form-control @error("addModal.numeroFabrication") is-invalid @enderror" title="numero de fabrication">
                      @error("addModal.numeroFabrication")
                          <span class="text-danger">{{$message}}</span>
                      @enderror
                  </div>
                  <div class="flex-grow-1 mr-2">
                      <input type="number" placeholder="Vitesse"  wire:model="addModal.vitesse" class="form-control @error("addModal.vitesse") is-invalid @enderror" title="vitesse">
                      @error("addModal.vitesse")
                          <span class="text-danger">{{$message}}</span>
                      @enderror
                  </div>
              </div>
              </div>

      <div class="d-flex my-4 bg-gray-light p-2">
              <div class="d-flex flex-grow-1 mr-2">
                  <div class="flex-grow-1 mr-2">
                      <input type="text" placeholder="Encombrement"  wire:model="addModal.encombrement" class="form-control @error("addModal.encombrement") is-invalid @enderror" title="encombrement">
                      @error("addModal.encombrement")
                          <span class="text-danger">{{$message}}</span>
                      @enderror
                  </div>
                  <div class="flex-grow-1 mr-2">
                      <input type="date" placeholder="Annee Fabrication"  wire:model="addModal.anneeFabrication" class="form-control @error("addModal.anneeFabrication") is-invalid @enderror" title="année de fabrication">
                      @error("addModal.anneeFabrication")
                          <span class="text-danger">{{$message}}</span>
                      @enderror
                  </div>
                  <div class="flex-grow-1 mr-2">
                      <input type="text" placeholder="Fournisseur"  wire:model="addModal.fournisseur" class="form-control @error("addModal.fournisseur") is-invalid @enderror" title="fournisseur">
                      @error("addModal.fournisseur")
                          <span class="text-danger">{{$message}}</span>
                      @enderror
                  </div>
                  <div class="flex-grow-1 mr-2">
                      <input type="date" placeholder="Date Acquisition"  wire:model="addModal.dateAcquisition" class="form-control @error("addModal.dateAcquisition") is-invalid @enderror" title="date d'acquisition">
                      @error("addModal.dateAcquisition")
                          <span class="text-danger">{{$message}}</span>
                      @enderror
                  </div>
                  <div class="flex-grow-1 mr-2">
                      <input type="date" placeholder="Date Mise En Service"  wire:model="addModal.dateMiseEnService" class="form-control @error("addModal.dateMiseEnService") is-invalid @enderror" title="date mise en service">
                      @error("addModal.dateMiseEnService")
                          <span class="text-danger">{{$message}}</span>
                      @enderror
                  </div>
              </div>
              </div>
          
          <div class="d-flex my-4 bg-gray-light p-2">
              <div class="d-flex flex-grow-1 mr-2">
                  <div class="flex-grow-1 mr-2">          
                <select class="form-control @error("addModal.roulement") is-invalid @enderror" wire:model="addModal.roulement" required="required" title="roulement">
                @error("addModal.roulement")
                          <span class="text-danger">{{$message}}</span>
                 @enderror 
                    <option value="">--------------------------</option>
                    <option value="CA">CA</option>
                    <option value="COA">COA</option>
                </select>
                  </div>
                  <div class="flex-grow-1 mr-2">
                      <input type="text" placeholder="Mise en service"  wire:model="addModal.misesEnServices" class="form-control @error("addModal.misesEnServices") is-invalid @enderror" title="mise en services">
                      @error("addModal.misesEnServices")
                          <span class="text-danger">{{$message}}</span>
                      @enderror
                  </div>
                  <div class="flex-grow-1 mr-2">
                      <input type="text" placeholder="Observation"  wire:model="addModal.observations" class="form-control @error("addModal.observations") is-invalid @enderror" title="observations">
                      @error("addModal.observations")
                          <span class="text-danger">{{$message}}</span>
                      @enderror
                  </div>
                  <div class="flex-grow-1 mr-2">
                      <input type="number" placeholder="Debit Nominal"  wire:model="addModal.debitNominal" class="form-control @error("addModal.debitNominal") is-invalid @enderror" title="debit nominal">
                      @error("addModal.debitNominal")
                          <span class="text-danger">{{$message}}</span>
                      @enderror
                  </div>
                  <div class="flex-grow-1 mr-2">
                      <input type="number" placeholder="Hauteur Manometrique"  wire:model="addModal.hauteurManometrique" class="form-control @error("addModal.hauteurManometrique") is-invalid @enderror" title="hauteur manometrique">
                      @error("addModal.hauteurManometrique")
                          <span class="text-danger">{{$message}}</span>
                      @enderror
                  </div>
              </div>
              </div>

          <div class="d-flex my-4 bg-gray-light p-2">
              <div class="d-flex flex-grow-1 mr-2">
                  <div class="flex-grow-1 mr-2">
                      <input type="text" placeholder="Corps de pompe"  wire:model="addModal.corpsDePompe" class="form-control @error("addModal.corpsDePompe") is-invalid @enderror" title="corps de pompe">
                      @error("addModal.corpsDePompe")
                          <span class="text-danger">{{$message}}</span>
                      @enderror
                  </div>
                  <div class="flex-grow-1 mr-2">
                      <input type="text" placeholder="Chemise d'arbre"  wire:model="addModal.chemiseArbre" class="form-control @error("addModal.chemiseArbre") is-invalid @enderror" title="chemise d'arbre">
                      @error("addModal.chemiseArbre")
                          <span class="text-danger">{{$message}}</span>
                      @enderror
                  </div>            
               </div>
              </div>
               <div class="p-2">
              <button class="btn btn-success" wire:click="editModalPompe()">Ajouter</button>
              <button type="button" class="btn btn-secondary" data-dismiss="modal" wire.click="">Close</button>
               </div>
      @else
      <button class="btn btn-success" wire:click="showInput()">Ajout</button> 
             <table class="table table-head-fixed">
                    <thead style="color: orange;">
                    <tr>
                    <th class="text-center" style="width:12%;">Marque</th>
                    <th class="text-center" style="width:12%;">Type</th>
                    <th class="text-center" style="width:17%;">Numero de Serie</th>
                    <th class="text-center" style="width:7%;">Debit</th>
                    <th class="text-center" style="width:7%;">Hauteur</th>
                    <th class="text-center" style="width:10%;">Corps</th>
                    <th class="text-center" style="width:15%;">Chemise</th>
                    <th class="text-center" style="width:20%;">Action</th>
                    </tr>
                    </thead>
             <tbody>
        @forelse($pompes as $pompe) 
                <tr>
                    <td class="text-center" style="width:12%;">{{$pompe->marque}}</td>
                    <td class="text-center" style="width:12%;">{{$pompe->type}}</td>
                    <td class="text-center" style="width:17%;">{{$pompe->numeroSerie}}</td>
                    <td class="text-center" style="width:7%;">{{$pompe->debitNominal}}</td>
                    <td class="text-center" style="width:7%;">{{$pompe->hauteurManometrique}}</td>
                    <td class="text-center" style="width:10%;">{{$pompe->corpsDePompe}}</td>
                    <td class="text-center" style="width:15%;">{{$pompe->chemiseArbre}}</td>
                    <td class="text-center" style="width:20%;">
                        <button class="btn btn-link" wire:click="editModal({{$pompe->id}})" data-toggle="modal" data-target="#addModal"> <i class="far fa-edit"></i> </button>  
                        <button class="btn btn-link" wire:click="confirmDeleteModal({{$pompe->id}})"> <i class="far fa-trash-alt"></i> </button>     
                    </td>
                </tr>
                @empty
                    <tr>
                        <td colspan="8">
                        <div class="alert alert-info">                  
                        <h5><i class="icon fas fa-ban"></i> Information!</h5>
                        Vous n'avez pas encore des données définies.
                        </div>
                        </td>
                    </tr>
            @endforelse
          </tbody>
        </table>
      @endif
      </div>

  
