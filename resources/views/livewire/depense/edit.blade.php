<div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modifier depense</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form wire:submit.prevent="updateDepense">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Date</label>
            <input type="Date" class="form-control  @error("editDepense.Date") is-invalid @enderror" wire:model="editDepense.Date">
            @error("editDepense.Date")
                          <span class="text-danger">{{$message}}</span>
            @enderror
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Motif</label>
          <input type="text" class="form-control  @error("editDepense.Motif") is-invalid @enderror" wire:model="editDepense.Motif" placeholder="Motif">
            @error("editDepense.Motif")
                          <span class="text-danger">{{$message}}</span>
            @enderror
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Designation</label>
            <input type="text" class="form-control  @error("editDepense.Designation") is-invalid @enderror" wire:model="editDepense.Designation" placeholder="Designation">
            @error("editDepense.Designation")
                          <span class="text-danger">{{$message}}</span>
            @enderror
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Unité</label>
            <input type="text" class="form-control  @error("editDepense.Unite") is-invalid @enderror" wire:model="editDepense.Unite" placeholder="Unité">
            @error("editDepense.Unite")
                          <span class="text-danger">{{$message}}</span>
            @enderror
          </div>
          <div class="d-flex">
          <div class="form-group flex-grow-1 mr-2">
            <label for="message-text" class="col-form-label">Prix Unitaire</label>
            <input type="text" class="form-control  @error("editDepense.PrixUnitaire") is-invalid @enderror" wire:model="editDepense.PrixUnitaire" placeholder="Prix Unitaire">
            @error("editDepense.PrixUnitaire")
                          <span class="text-danger">{{$message}}</span>
            @enderror
          </div>
          <div class="form-group flex-grow-1">
            <label for="message-text" class="col-form-label">Quantite</label>
            <input type="text" class="form-control  @error("editDepense.Quantite") is-invalid @enderror" wire:model="editDepense.Quantite" placeholder="Quantité">
            @error("editDepense.Quantite")
                          <span class="text-danger">{{$message}}</span>
            @enderror
          </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Enregistrer</button>
      </div>
      </form>
    </div>
  </div>