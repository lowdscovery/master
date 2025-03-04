
  <!-- xl ou lg modal-->

        <div class="modal-header">
            <h4 class="modal-title">Caracteristique des <strong>MOTEURS</strong> </h4>
      </div>
      <div class="modal-body">
      
      @if ($showInputPompe)
            <div class="d-flex my-4 bg-gray-light p-2">
                <div class="d-flex flex-grow-1 mr-2">
                  <div class="flex-grow-1 mr-2">
                      <input type="text" placeholder="Marque"  wire:model="addMoteur.marque" class="form-control @error("addMoteur.marque") is-invalid @enderror" title="marque">
                      @error("addMoteur.marque")
                          <span class="text-danger">{{$message}}</span>
                      @enderror
                  </div>
                  <div class="flex-grow-1 mr-2">
                      <input type="text" placeholder="Type"  wire:model="addMoteur.type" class="form-control @error("addMoteur.type") is-invalid @enderror" title="type">
                      @error("addMoteur.type")
                          <span class="text-danger">{{$message}}</span>
                      @enderror
                  </div>
                  <div class="flex-grow-1 mr-2">
                      <input type="text" placeholder="Numero Serie"  wire:model="addMoteur.numeroSerie" class="form-control @error("addMoteur.numeroSerie") is-invalid @enderror" title="numero de serie">
                      @error("addMoteur.numeroSerie")
                          <span class="text-danger">{{$message}}</span>
                      @enderror
                  </div>
                  <div class="flex-grow-1 mr-2">
                       <input type="text" placeholder="Numero Fabrication"  wire:model="addMoteur.numeroFabrication" class="form-control @error("addMoteur.numeroFabrication") is-invalid @enderror" title="numero de fabrication">
                      @error("addMoteur.numeroFabrication")
                          <span class="text-danger">{{$message}}</span>
                      @enderror
                  </div>
                  <div class="flex-grow-1 mr-2">
                      <input type="number" placeholder="Vitesse"  wire:model="addMoteur.vitesse" class="form-control @error("addMoteur.vitesse") is-invalid @enderror" title="vitesse">
                      @error("addMoteur.vitesse")
                          <span class="text-danger">{{$message}}</span>
                      @enderror
                  </div>
                </div>
            </div>


              <div class="d-flex my-4 bg-gray-light p-2">
              <div class="d-flex flex-grow-1 mr-2">
                
                 <div class="flex-grow-1 mr-2">
                      <input type="number" placeholder="Intensite"  wire:model="addMoteur.intensite" class="form-control @error("addMoteur.intensite") is-invalid @enderror" title="intensité">
                      @error("addMoteur.intensite")
                          <span class="text-danger">{{$message}}</span>
                      @enderror
                  </div>
                  <div class="flex-grow-1 mr-2">
                       <input type="text" placeholder="Section Cablage"  wire:model="addMoteur.sectionCable" class="form-control @error("addMoteur.sectionCable") is-invalid @enderror" title="section Cablage">
                      @error("addMoteur.sectionCable")
                          <span class="text-danger">{{$message}}</span>
                      @enderror
                  </div>

                  <div class="flex-grow-1 mr-2">
                       <input type="text" placeholder="Cosphi"  wire:model="addMoteur.cosphi" class="form-control @error("addMoteur.cosphi") is-invalid @enderror" title="cosphi">
                      @error("addMoteur.cosphi")
                          <span class="text-danger">{{$message}}</span>
                      @enderror
                  </div>

                   <div class="flex-grow-1 mr-2">
                      <input type="text" placeholder="Type de marrage"  wire:model="addMoteur.typeDeDemarrage" class="form-control @error("addMoteur.typeDeDemarrage") is-invalid @enderror" title="type de demarrage">
                      @error("addMoteur.typeDeDemarrage")
                          <span class="text-danger">{{$message}}</span>
                      @enderror
                  </div>
                  <div class="flex-grow-1 mr-2">
                      <input type="text" placeholder="Indice de protection"  wire:model="addMoteur.indiceDeProtection" class="form-control @error("addMoteur.indiceDeProtection") is-invalid @enderror" title="indice de protection">
                      @error("addMoteur.indiceDeProtection")
                          <span class="text-danger">{{$message}}</span>
                      @enderror
                  </div>
              </div>
              </div>

              
          <div class="d-flex my-4 bg-gray-light p-2">
            <div class="d-flex flex-grow-1 mr-2">
                  <div class="flex-grow-1 mr-2">
                <select class="form-control @error("addMoteur.roulement") is-invalid @enderror" wire:model="addMoteur.roulement" required="required" title="roulement">
                @error("addMoteur.roulement")
                          <span class="text-danger">{{$message}}</span>
                 @enderror 
                    <option value="">--------------------------</option>
                    <option value="CA">CA</option>
                    <option value="COA">COA</option>
                </select>
                  </div>
                  <div class="flex-grow-1 mr-2">
                      <input type="text" placeholder="Mise en service"  wire:model="addMoteur.misesEnServices" class="form-control @error("addMoteur.misesEnServices") is-invalid @enderror" title="mise en services">
                      @error("addMoteur.misesEnServices")
                          <span class="text-danger">{{$message}}</span>
                      @enderror
                  </div>
                  <div class="flex-grow-1 mr-2">
                      <input type="text" placeholder="Observations"  wire:model="addMoteur.observations" class="form-control @error("addMoteur.observations") is-invalid @enderror" title="observations">
                      @error("addMoteur.observations")
                          <span class="text-danger">{{$message}}</span>
                      @enderror
                  </div>
                  <div class="flex-grow-1 mr-2">
                       <input type="number" placeholder="Puissance"  wire:model="addMoteur.puissance" class="form-control @error("addMoteur.puissance") is-invalid @enderror" title="puissance">
                      @error("addMoteur.puissance")
                          <span class="text-danger">{{$message}}</span>
                      @enderror
                  </div>
                  <div class="flex-grow-1 mr-2">
                      <input type="number" placeholder="Tension"  wire:model="addMoteur.tension" class="form-control @error("addMoteur.tension") is-invalid @enderror" title="tension">
                      @error("addMoteur.tension")
                          <span class="text-danger">{{$message}}</span>
                      @enderror
                  </div>
              </div>
              </div>
         

              <div class="d-flex my-4 bg-gray-light p-2">
              <div class="d-flex flex-grow-1 mr-2">

                 <div class="flex-grow-1 mr-2">
                      <input type="date" placeholder="Annee Fabrication"  wire:model="addMoteur.anneeFabrication" class="form-control @error("addMoteur.anneeFabrication") is-invalid @enderror" title="année de fabrication">
                      @error("addMoteur.anneeFabrication")
                          <span class="text-danger">{{$message}}</span>
                      @enderror
                   </div>
                  <div class="flex-grow-1 mr-2">
                      <input type="text" placeholder="Fournisseur"  wire:model="addMoteur.fournisseur" class="form-control @error("addMoteur.fournisseur") is-invalid @enderror" title="fournisseur">
                      @error("addMoteur.fournisseur")
                          <span class="text-danger">{{$message}}</span>
                      @enderror
                  </div>
                  <div class="flex-grow-1 mr-2">
                       <input type="Date" placeholder="Date Acquisition"  wire:model="addMoteur.dateAcquisition" class="form-control @error("addMoteur.dateAcquisition") is-invalid @enderror" title="date d'acquisition">
                      @error("addMoteur.dateAcquisition")
                          <span class="text-danger">{{$message}}</span>
                      @enderror
                  </div>
                  <div class="flex-grow-1 mr-2">
                      <input type="date" placeholder="Date Mise en service"  wire:model="addMoteur.dateMiseEnService" class="form-control @error("addMoteur.dateMiseEnService") is-invalid @enderror" title="date mise en services">
                      @error("addMoteur.dateMiseEnService")
                          <span class="text-danger">{{$message}}</span>
                      @enderror
                  </div>
                   <div class="flex-grow-1 mr-2">
                      <input type="text" placeholder="Classe isolant"  wire:model="addMoteur.classeIsolant" class="form-control @error("addMoteur.classeIsolant") is-invalid @enderror" title="classe isolant">
                      @error("addMoteur.classeIsolant")
                          <span class="text-danger">{{$message}}</span>
                      @enderror
                  </div>
              </div>
              </div>

              <div class="d-flex my-4 bg-gray-light p-2">
              <div class="d-flex flex-grow-1 mr-2">

                 <div class="flex-grow-1 mr-2">
                      <input type="text" placeholder="Longueur"  wire:model="addMoteur.longueur" class="form-control @error("addMoteur.longueur") is-invalid @enderror" title="Longueur">
                      @error("addMoteur.longueur")
                          <span class="text-danger">{{$message}}</span>
                      @enderror
                  </div>
                  <div class="flex-grow-1 mr-2">
                      <input type="text" placeholder="Largeur"  wire:model="addMoteur.largeur" class="form-control @error("addMoteur.largeur") is-invalid @enderror" title="Largeur">
                      @error("addMoteur.largeur")
                          <span class="text-danger">{{$message}}</span>
                      @enderror
                  </div>
                  <div class="flex-grow-1 mr-2">
                       <input type="text" placeholder="Hauteur"  wire:model="addMoteur.hauteur" class="form-control @error("addMoteur.hauteur") is-invalid @enderror" title="Hauteur">
                      @error("addMoteur.hauteur")
                          <span class="text-danger">{{$message}}</span>
                      @enderror
                  </div>
                  <div class="flex-grow-1 mr-2">
                      <input type="text" placeholder="Masse"  wire:model="addMoteur.masse" class="form-control @error("addMoteur.masse") is-invalid @enderror" title="Masse">
                      @error("addMoteur.masse")
                          <span class="text-danger">{{$message}}</span>
                      @enderror
                  </div>
              </div>
              </div>

              
        
              <div class="p-2">
              <button class="btn btn-success" wire:click="editModalMoteur()">Ajouter</button>
              <button type="button" class="btn btn-secondary" data-dismiss="modal" wire.click="">Close</button>
               </div> 
      @else
     
        <button class="btn btn-success" wire:click="showInput()">Ajout</button> 
        
        
   <table class="table table-head-fixed">
                    <thead style="color: orange;">
                    <tr>
                    <th style="width:7%;">Puissance</th>
                    <th style="width:7%;">Tension</th>
                    <th style="width:10%;">Cosphi</th>
                    <th style="width:5%;">Intensite</th>
                    <th style="width:15%;">Cablage</th>
                    <th style="width:6%;">Indice</th>
                    <th style="width:15%;">Classe isolant</th>
                    <th style="width:15%;">Type demarrage</th>
                    <th class="text-center" style="width:20%;">Action</th>
                    </tr>
                    </thead>
             <tbody>
        @forelse($electriques as $electrique) 
                <tr>
                <td style="width:7%;">{{$electrique->puissance}}</td>
                <td style="width:7%;">{{$electrique->tension}}</td>
                <td style="width:10%;">{{$electrique->cosphi}}</td>
                <td style="width:5%;">{{$electrique->intensite}}</td>
                <td style="width:15%;">{{$electrique->sectionCable}}</td>
                <td style="width:6%;">{{$electrique->indiceDeProtection}}</td>
                <td style="width:15%;">{{$electrique->classeIsolant}}</td>
                <td style="width:15%;">{{$electrique->typeDeDemarrage}}</td>
                <td class="text-center" style="width:20%;">
                    <button class="btn btn-link" wire:click="editMoteur({{$electrique->id}})"> <i class="far fa-edit"></i> </button>  
                    @can('delete', $electrique)
                    <button class="btn btn-link" wire:click="confirmDeleteMoteur({{$electrique->id}})"> <i class="far fa-trash-alt"></i> </button>     
                    @endcan
                </td>
                </tr>
                @empty
                    <tr>
                        <td colspan="9">
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


  

