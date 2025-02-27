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
           <select class="form-control @error("editMaintenance.intervenant_id") is-invalid @enderror" wire:model="editMaintenance.intervenant_id">
                @error("editMaintenance.intervenant_id")
                          <span class="text-danger">{{$message}}</span>
                 @enderror 
                    <option value="">---------</option>
                @foreach ($inters as $inter)
                    <option value="{{$inter->nom}} {{$inter->prenom}}">{{$inter->nom}} {{$inter->prenom}}</option>
                @endforeach        
           </select>
          </div>
          <div class="form-group ">
            <label for="recipient-name" class="col-form-label">Duree Intervention</label>
            <input type="number" class="form-control  @error("editMaintenance.DureeIntervention") is-invalid @enderror" wire:model="editMaintenance.DureeIntervention">
            @error("editMaintenance.DureeIntervention")
                          <span class="text-danger">{{$message}}</span>
            @enderror
          </div>
          <div class="d-flex">
    <div class="form-group flex-grow-1 mr-2">
        <label>Caracteristique</label>
        <select class="form-control" wire:model="selectedItem">
            <option value="">---------</option>
            <option value="Moteur">Moteur</option>
            <option value="Pompe">Pompe</option>
        </select>
    </div>

    @if($selectedItem === 'Moteur') 
    <div class="form-group flex-grow-1 mr-2" wire:key="moteur-select">
        <label for="moteur">Moteur</label>
        <select id="moteur" class="form-control @error('editMaintenance.caracteristique_moteurs_id') is-invalid @enderror" wire:model="editMaintenance.caracteristique_moteurs_id">
            @error('editMaintenance.caracteristique_moteurs_id')
                <span class="text-danger">{{ $message }}</span>
            @enderror
            <option value="">---------</option>
            @foreach ($moteurs as $moteur)
                <option value="{{ $moteur->numeroSerie }}">{{ $moteur->numeroSerie }}</option>
            @endforeach
        </select>
    </div> 
    @endif

    @if($selectedItem === 'Pompe')
    <div class="form-group flex-grow-1" wire:key="pompe-select">
        <label for="pompe">Pompe</label>
        <select id="pompe" class="form-control @error('editMaintenance.caracteristique_moteurs_id') is-invalid @enderror" wire:model="editMaintenance.caracteristique_moteurs_id">
            @error('editMaintenance.caracteristique_moteurs_id')
                <span class="text-danger">{{ $message }}</span>
            @enderror
            <option value="">---------</option>
            @foreach ($pompes as $pompe)
                <option value="{{ $pompe->numeroSerie }}">{{ $pompe->numeroSerie }}</option>
            @endforeach
        </select>
    </div>
    @endif  
</div>
          <div class="d-flex">
                <div class="form-group flex-grow-1 mr-2">
                        <label >Durée Réel</label>
                        <input type="number" class="form-control @error("editMaintenance.DureeReel") is-invalid @enderror" wire:model="editMaintenance.DureeReel" placeholder="Durée Réel">
                        @error("editMaintenance.DureeReel")
                          <span class="text-danger">{{$message}}</span>
                      @enderror 
                       
                </div>

                <div class="form-group flex-grow-1">
                        <label >Rapport</label>
                        <input type="file" class="form-control" id="editImage{{$resetValueInput}}" wire:model="editImage">
                      @error("editImage")
                          <span class="text-danger">{{$message}}</span>
                      @enderror                 
                </div>
            </div>
  
           <div class="form-group ">
            <label for="recipient-name" class="col-form-label">Action d'entreprise</label>
            <input type="text" class="form-control  @error("editMaintenance.actionEntreprise") is-invalid @enderror" wire:model="editMaintenance.actionEntreprise">
            @error("editMaintenance.actionEntreprise")
                          <span class="text-danger">{{$message}}</span>
            @enderror
          </div>
       

      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Enregistrer</button>
      </div>
       </form>
    </div>
  </div>
</div>