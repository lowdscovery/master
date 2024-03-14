<div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editModalLabel">Edit maintenance</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form wire:submit.prevent="updateMaintenance">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Date</label>
            <input type="Date" class="form-control  @error("editMaintenance.dateMaintenance") is-invalid @enderror" wire:model="editMaintenance.dateMaintenance">
            @error("editMaintenance.dateMaintenance")
                          <span class="text-danger">{{$message}}</span>
            @enderror
          </div>
           <div class="form-group">
            <label for="recipient-name" class="col-form-label">Intervenant</label>
           <select class="form-control @error("editMaintenance.intervenant") is-invalid @enderror" wire:model="editMaintenance.intervenant">
                @error("editMaintenance.intervenant")
                          <span class="text-danger">{{$message}}</span>
                 @enderror 
                    <option value="">---------</option>
                @foreach ($inters as $inter)
                    <option value="{{$inter->nom}} {{$inter->prenom}}">{{$inter->nom}} {{$inter->prenom}}</option>
                @endforeach       
           </select>
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Caracteristique</label>
            <select class="form-control @error("editMaintenance.caracteristique") is-invalid @enderror" wire:model="editMaintenance.caracteristique">
                @error("editMaintenance.caracteristique")
                          <span class="text-danger">{{$message}}</span>
                 @enderror 
                    <option value="">---------</option>
                    @foreach ($caracteristiques as $caracteristique)
                          <option value="{{$caracteristique->marque}}   |   {{$caracteristique->numeroSerie}}">{{$caracteristique->marque}}   |   {{$caracteristique->numeroSerie}}</option>
                    @endforeach      
           </select>
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Action d'entreprise</label>
            <textarea class="form-control @error("editMaintenance.actionEntreprise") is-invalid @enderror" wire:model="editMaintenance.actionEntreprise">
            @error("editMaintenance.actionEntreprise")
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