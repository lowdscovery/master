
<!-- xl ou lg modal-->

  <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Gestion des caracteristique moteur "{{optional($selectedMoteur)->moteurs}}" </h5>
      </div>
      <div class="modal-body">
          <div class="d-flex my-4 bg-gray-light p-3">
              <div class="d-flex flex-grow-1 mr-2">
                  <div class="flex-grow-1 mr-2">
                      <input type="text" placeholder="Debit Nominal"  wire:model="editModal.debitNominal" class="form-control @error("editModal.debitNominal") is-invalid @enderror">
                      @error("editModal.debitNominal")
                          <span class="text-danger">{{$message}}</span>
                      @enderror
                  </div>
                  <div class="flex-grow-1 mr-2">
                      <input type="text" placeholder="Hateur Manometrique"  wire:model="editModal.hauteurManometrique" class="form-control @error("editModal.hauteurManometrique") is-invalid @enderror">
                      @error("editModal.hauteurManometrique")
                          <span class="text-danger">{{$message}}</span>
                      @enderror
                  </div>
                  <div class="flex-grow-1 mr-2">
                      <input type="text" placeholder="Corps de Pompe"  wire:model="editModal.corpsDePompe" class="form-control @error("editModal.corpsDePompe") is-invalid @enderror">
                      @error("editModal.corpsDePompe")
                          <span class="text-danger">{{$message}}</span>
                      @enderror
                  </div>
                  <div class="flex-grow-1 mr-2">
                      <input type="text" placeholder="Chemise d'arbre"  wire:model="editModal.chemiseArbre" class="form-control @error("editModal.chemiseArbre") is-invalid @enderror">
                      @error("editModal.chemiseArbre")
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
              <th>Debit nominal</th>
              <th>Hauteur manometrique</th>
              <th>Corps de pompe</th>
              <th>Chemise d'arbre</th>
              <th class="text-center">Action</th>
                  </thead>
                  <tbody>
  @forelse($pompes as $pompe) 
          <tr>
              <td>{{$pompe->debitNominal}}</td>
              <td>{{$pompe->hauteurManometrique}}</td>
              <td>{{$pompe->corpsDePompe}}</td>
              <td>{{$pompe->chemiseArbre}}</td>
              <td class="text-center">
                <button class="btn btn-warning" wire:click="EditModal({{$pompe->id}})" data-bs-toggle="modal" data-bs-target="#editModal"> <i class="far fa-edit"></i> </button>  
                <button class="btn btn-danger" wire:click="confirmDeleteModal({{$pompe->id}})"> <i class="far fa-trash-alt"></i> </button>     
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
  
