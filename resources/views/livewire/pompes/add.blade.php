<div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addModalLabel">Ajout maintenance</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form wire:submit.prevent="">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Date</label>
            <input type="Date" class="form-control  @error("addMaintenance.dateMaintenance") is-invalid @enderror" wire:model="">
            @error("addMaintenance.dateMaintenance")
                          <span class="text-danger">{{$message}}</span>
            @enderror
          </div>
           <div class="form-group">
            <label for="recipient-name" class="col-form-label">Intervenant</label>
           <select class="form-control @error("addIntervenant.intervenant") is-invalid @enderror" wire:model="">
                @error("addIntervenant.intervenant")
                          <span class="text-danger">{{$message}}</span>
                 @enderror 
                    <option value="">---------</option>
                      
           </select>
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Caracteristique</label>
            <select class="form-control @error("addMaintenance.caracteristique") is-invalid @enderror" wire:model="">
                @error("addMaintenance.caracteristique")
                          <span class="text-danger">{{$message}}</span>
                 @enderror 
                    <option value="">---------</option>
                   
           </select>
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Action d'entreprise</label>
            <textarea class="form-control @error("addMaintenance.actionEntreprise") is-invalid @enderror" wire:model="">
            @error("addMaintenance.actionEntreprise")
                          <span class="text-danger">{{$message}}</span>
            @enderror 
            </textarea>
          </div>
       

      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Enregistrer</button>
      </div>
       </form>
    </div>
  </div>
</div>