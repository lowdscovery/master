<div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addModalLabel">Ajout maintenance</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form wire:submit.prevent="addMaintenance">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Date</label>
            <input type="Date" class="form-control  @error("addMaintenance.dateMaintenance") is-invalid @enderror" wire:model="addMaintenance.dateMaintenance">
            @error("addMaintenance.dateMaintenance")
                          <span class="text-danger">{{$message}}</span>
            @enderror
          </div>
           <div class="form-group">
            <label for="recipient-name" class="col-form-label">Intervenant</label>
           <select class="form-control @error("addIntervenant.intervenant") is-invalid @enderror" wire:model="addMaintenance.intervenant">
                @error("addIntervenant.intervenant")
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
            <select class="form-control @error("addMaintenance.caracteristique") is-invalid @enderror" wire:model="addMaintenance.caracteristique">
                @error("addMaintenance.caracteristique")
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
            <textarea class="form-control @error("addMaintenance.actionEntreprise") is-invalid @enderror" wire:model="addMaintenance.actionEntreprise">
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