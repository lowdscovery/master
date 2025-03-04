<div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editModalLabel">Edit rapport de mission</h5>
        <button type="button" class="close" wire:click="cache()" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form wire:submit.prevent="updateRapport">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Date debut</label>
            <input type="Date" class="form-control  @error("editRapport.dateDebut") is-invalid @enderror" wire:model="editRapport.dateDebut">
            @error("editRapport.dateDebut")
                          <span class="text-danger">{{$message}}</span>
            @enderror
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Intervenant</label>
           <select class="form-control @error("addIntervenant.intervenant_id") is-invalid @enderror" wire:model="editRapport.intervenant_id">
                @error("addIntervenant.intervenant_id")
                          <span class="text-danger">{{$message}}</span>
                 @enderror 
                    <option value="">---------</option>
               @foreach ($inters as $inter)
                    <option value="{{$inter->nom}} {{$inter->prenom}}">{{$inter->nom}} {{$inter->prenom}}</option>
                @endforeach      
           </select>
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Lieu</label>
            <input type="text" class="form-control  @error("editRapport.lieu") is-invalid @enderror" wire:model="editRapport.lieu" placeholder="Lieu">
            @error("editRapport.lieu")
                          <span class="text-danger">{{$message}}</span>
            @enderror
          </div>
          @if($cacheRapport)
           <div class="d-flex">
          <div class="form-group flex-grow-1 mr-2">
            <label class="col-form-label">Date Fin</label>
            <input type="date" wire:model="editRapport.dateFin" class="form-control">
            @error("editRapport.dateFin")
                          <span class="text-danger">{{$message}}</span>
            @enderror
          </div>
          <div class="form-group flex-grow-1">
            <label class="col-form-label">Rapport de mission</label>
                            <input type="file" class="form-control" id="editImage{{$resetValueInput}}" wire:model="editImage">
            @error("editImage")
                          <span class="text-danger">{{$message}}</span>
            @enderror
          </div>
          </div>
          @endif

          <div class="form-group">
            <label for="message-text" class="col-form-label">Motif</label>
            <textarea class="form-control @error("editRapport.motif") is-invalid @enderror" wire:model="editRapport.motif" placeholder="Rapport">
            @error("editRapport.motif")
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