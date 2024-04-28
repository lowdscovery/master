
  <!-- xl ou lg modal-->

        <div class="modal-header">
            <h5 class="modal-title">Gestion des caracteristique "MOTEUR" </h5>
      </div>
      <div class="modal-body">
          <div class="d-flex my-4 bg-gray-light p-2">
              <div class="d-flex flex-grow-1 mr-2">
                  <div class="flex-grow-1 mr-2">
                      <input type="text" placeholder="Puissance"  wire:model="addMoteur.puissance" class="form-control @error("addMoteur.puissance") is-invalid @enderror">
                      @error("addMoteur.puissance")
                          <span class="text-danger">{{$message}}</span>
                      @enderror
                  </div>
                  <div class="flex-grow-1 mr-2">
                      <input type="text" placeholder="Tension"  wire:model="addMoteur.tension" class="form-control @error("addMoteur.tension") is-invalid @enderror">
                      @error("addMoteur.tension")
                          <span class="text-danger">{{$message}}</span>
                      @enderror
                  </div>
                  <div class="flex-grow-1 mr-2">
                       <input type="text" placeholder="Cosphi"  wire:model="addMoteur.cosphi" class="form-control @error("addMoteur.cosphi") is-invalid @enderror">
                      @error("addMoteur.cosphi")
                          <span class="text-danger">{{$message}}</span>
                      @enderror
                  </div>
                  <div class="flex-grow-1 mr-2">
                      <input type="text" placeholder="Intensite"  wire:model="addMoteur.intensite" class="form-control @error("addMoteur.intensite") is-invalid @enderror">
                      @error("addMoteur.intensite")
                          <span class="text-danger">{{$message}}</span>
                      @enderror
                  </div>
              </div>
              </div>
         

              <div class="d-flex my-4 bg-gray-light p-2">
              <div class="d-flex flex-grow-1 mr-2">
                  <div class="flex-grow-1 mr-2">
                       <input type="text" placeholder="Section Cablage"  wire:model="addMoteur.sectionCable" class="form-control @error("addMoteur.sectionCable") is-invalid @enderror">
                      @error("addMoteur.sectionCable")
                          <span class="text-danger">{{$message}}</span>
                      @enderror
                  </div>
                  <div class="flex-grow-1 mr-2">
                      <input type="text" placeholder="Indice de protection"  wire:model="addMoteur.indiceDeProtection" class="form-control @error("addMoteur.indiceDeProtection") is-invalid @enderror">
                      @error("addMoteur.indiceDeProtection")
                          <span class="text-danger">{{$message}}</span>
                      @enderror
                  </div>
                  <div class="flex-grow-1 mr-2">
                       <input type="text" placeholder="Classe Isolant"  wire:model="addMoteur.classeIsolant" class="form-control @error("addMoteur.classeIsolant") is-invalid @enderror">
                      @error("addMoteur.classeIsolant")
                          <span class="text-danger">{{$message}}</span>
                      @enderror
                  </div>
                  <div class="flex-grow-1 mr-2">
                      <input type="text" placeholder="Type de Demarrage"  wire:model="addMoteur.typeDeDemarrage" class="form-control @error("addMoteur.typeDeDemarrage") is-invalid @enderror">
                      @error("addMoteur.typeDeDemarrage")
                          <span class="text-danger">{{$message}}</span>
                      @enderror
                  </div>
              </div>
              <div>
              <button class="btn btn-success" wire:click="editModalMoteur()">Ajouter</button>
              </div>
              </div>

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
                    <button class="btn btn-link" wire:click="confirmDeleteModal({{$electrique->id}})"> <i class="far fa-trash-alt"></i> </button>     
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
      </div>

  

