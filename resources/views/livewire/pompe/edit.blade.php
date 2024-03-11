
<!-- xl ou lg modal-->

  <div class="modal-dialog modal-lg" style="top:100px;">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Edition</h5>
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
              <button class="btn btn-success" wire:click="updateModal()">Valider</button>
              </div>
     </div>
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal" >Fermer</button>
      </div>
   </div>
 </div>
  
