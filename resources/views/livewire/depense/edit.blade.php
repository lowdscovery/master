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
            <input type="Date" class="form-control  @error("Date") is-invalid @enderror" wire:model="Date">
            @error("Date")
                          <span class="text-danger">{{$message}}</span>
            @enderror
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Motif</label>
          <input type="text" class="form-control  @error("Motif") is-invalid @enderror" wire:model="Motif" placeholder="Motif">
            @error("Motif")
                          <span class="text-danger">{{$message}}</span>
            @enderror
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Designation</label>
            <input type="text" class="form-control  @error("Designation") is-invalid @enderror" wire:model="Designation" placeholder="Designation">
            @error("Designation")
                          <span class="text-danger">{{$message}}</span>
            @enderror
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Unité</label>
            <input type="text" class="form-control  @error("Unite") is-invalid @enderror" wire:model="Unite" placeholder="Unité">
            @error("Unite")
                          <span class="text-danger">{{$message}}</span>
            @enderror
          </div>
          <div class="d-flex">
          <div class="form-group flex-grow-1 mr-2">
            <label for="message-text" class="col-form-label">Prix Unitaire</label>
            <input type="text" class="form-control  @error("PrixUnitaire") is-invalid @enderror" wire:model="PrixUnitaire" placeholder="Prix Unitaire">
            @error("PrixUnitaire")
                          <span class="text-danger">{{$message}}</span>
            @enderror
          </div>
          <div class="form-group flex-grow-1">
            <label for="message-text" class="col-form-label">Quantite</label>
            <input type="text" class="form-control  @error("Quantite") is-invalid @enderror" wire:model="Quantite" placeholder="Quantité">
            @error("Quantite")
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