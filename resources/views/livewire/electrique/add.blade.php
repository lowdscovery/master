
<!-- xl ou lg modal-->

  <div class="modal-dialog modal-xl">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Gestion des caracteristique moteur "{{optional($selectedMoteur)->moteurs}}" </h5>
      </div>
      <div class="modal-body">
          <div class="d-flex my-4 bg-gray-light p-3">
              <div class="d-flex flex-grow-1 mr-2">
                  <div class="flex-grow-1 mr-2">
                      <input type="text" placeholder="Puissance"  wire:model="editModal.puissance" class="form-control @error("editModal.puissance") is-invalid @enderror">
                      @error("editModal.puissance")
                          <span class="text-danger">{{$message}}</span>
                      @enderror
                  </div>
                  <div class="flex-grow-1 mr-2">
                      <input type="text" placeholder="Tension"  wire:model="editModal.tension" class="form-control @error("editModal.tension") is-invalid @enderror">
                      @error("editModal.tension")
                          <span class="text-danger">{{$message}}</span>
                      @enderror
                  </div>
                  <div class="flex-grow-1 mr-2">
                      <input type="text" placeholder="Cosphi"  wire:model="editModal.cosphi" class="form-control @error("editModal.cosphi") is-invalid @enderror">
                      @error("editModal.cosphi")
                          <span class="text-danger">{{$message}}</span>
                      @enderror
                  </div>
                  <div class="flex-grow-1 mr-2">
                      <input type="text" placeholder="Intensite"  wire:model="editModal.intensite" class="form-control @error("editModal.intensite") is-invalid @enderror">
                      @error("editModal.intensite")
                          <span class="text-danger">{{$message}}</span>
                      @enderror
                  </div>
                  <div class="flex-grow-1 mr-2">
                      <input type="text" placeholder="Section Cablage"  wire:model="editModal.sectionCable" class="form-control @error("editModal.sectionCable") is-invalid @enderror">
                      @error("editModal.sectionCable")
                          <span class="text-danger">{{$message}}</span>
                      @enderror
                  </div>
                  <div class="flex-grow-1 mr-2">
                      <input type="text" placeholder="Indice de protection"  wire:model="editModal.indiceDeProtection" class="form-control @error("editModal.indiceDeProtection") is-invalid @enderror">
                      @error("editModal.indiceDeProtection")
                          <span class="text-danger">{{$message}}</span>
                      @enderror
                  </div>
                  <div class="flex-grow-1 mr-2">
                      <input type="text" placeholder="Classe Isolant"  wire:model="editModal.classeIsolant" class="form-control @error("editModal.classeIsolant") is-invalid @enderror">
                      @error("editModal.classeIsolant")
                          <span class="text-danger">{{$message}}</span>
                      @enderror
                  </div>
                  <div class="flex-grow-1 mr-2">
                      <input type="text" placeholder="Type de Demarrage"  wire:model="editModal.typeDeDemarrage" class="form-control @error("editModal.typeDeDemarrage") is-invalid @enderror">
                      @error("editModal.typeDeDemarrage")
                          <span class="text-danger">{{$message}}</span>
                      @enderror
                  </div>
              </div>
              <div>
              <button class="btn btn-success" wire:click="editModalPompe()">Ajouter</button>
              </div>
              </div>
              <table class="table table-bordered">
            <thead class="bg-primary">
              <th>Puissance</th>
              <th>Tension</th>
              <th>Cosphi</th>
              <th>Intensite</th>
              <th>Section cablage</th>
              <th>Indice de protection</th>
              <th>Classe isolant</th>
              <th>Type de demarrage</th>
              <th class="text-center">Action</th>
                  </thead>
                  <tbody>
  @forelse($electriques as $electrique) 
          <tr>
              <td>{{$electrique->puissance}}</td>
              <td>{{$electrique->tension}}</td>
              <td>{{$electrique->cosphi}}</td>
              <td>{{$electrique->intensite}}</td>
              <td>{{$electrique->sectionCable}}</td>
              <td>{{$electrique->indiceDeProtection}}</td>
              <td>{{$electrique->classeIsolant}}</td>
              <td>{{$electrique->typeDeDemarrage}}</td>
              <td class="text-center">
                <button class="btn btn-warning" wire:click="EditModal({{$electrique->id}})" data-bs-toggle="modal" data-bs-target="#editModal"> <i class="far fa-edit"></i> </button>  
                <button class="btn btn-danger" wire:click="confirmDeleteModal({{$electrique->id}})"> <i class="far fa-trash-alt"></i> </button>     
              </td>
          </tr>
      @empty
          <tr>
              <td colspan="3">
                  <span class="text-info">Vous n'avez pas encore des moteurs définies</span>
              </td>
          </tr>
    @endforelse

    </tbody>
  </table>


      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal" >Fermer</button>
      </div>
   </div>
 </div>
  
