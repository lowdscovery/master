<div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">{{ $editId ? 'Modifier maintenance' : 'Ajout maintenance'}}</h5>
        <button type="button" class="close" data-dismiss="modal" wire:click="cancelEdit" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form wire:submit.prevent="{{ $editId ? 'updateTransaction' : 'addTransaction'}}">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Date</label>
            <input type="Date" class="form-control  @error("dateMaintenance") is-invalid @enderror" wire:model="dateMaintenance" required>
            @error("dateMaintenance")
                          <span class="text-danger">{{$message}}</span>
            @enderror
          </div>
          @if($cacheRapport)
          <div class="d-flex">
          <div class="form-group flex-grow-1 mr-2">
            <label for="recipient-name" class="col-form-label">Intervenant</label>
           <select class="form-control @error("intervenant_id") is-invalid @enderror" wire:model="intervenant_id" required>
                @error("intervenant_id")
                          <span class="text-danger">{{$message}}</span>
                 @enderror 
                    <option value="">---------</option>
                @foreach ($inters as $inter)
                    <option value="{{$inter->nom}} {{$inter->prenom}}">{{$inter->nom}} {{$inter->prenom}}</option>
                @endforeach       
           </select>
          </div>
          <div class="form-group flex-grow-1 mr-2">
            <label for="recipient-name" class="col-form-label">Duree Intervention</label>
            <input type="number" class="form-control  @error("DureeIntervention") is-invalid @enderror" wire:model="DureeIntervention" required>
            @error("DureeIntervention")
                          <span class="text-danger">{{$message}}</span>
            @enderror
          </div>
          </div>
          @else
          <div class="form-group flex-grow-1 mr-2">
            <label for="recipient-name" class="col-form-label">Intervenant</label>
           <select class="form-control @error("intervenant_id") is-invalid @enderror" wire:model="intervenant_id" required>
                @error("intervenant_id")
                          <span class="text-danger">{{$message}}</span>
                 @enderror 
                    <option value="">---------</option>
                @foreach ($inters as $inter)
                    <option value="{{$inter->nom}} {{$inter->prenom}}">{{$inter->nom}} {{$inter->prenom}}</option>
                @endforeach       
           </select>
          </div>
          <div class="form-group flex-grow-1 mr-2">
            <label for="recipient-name" class="col-form-label">Duree Intervention</label>
            <input type="number" class="form-control  @error("DureeIntervention") is-invalid @enderror" wire:model="DureeIntervention" required>
            @error("DureeIntervention")
                          <span class="text-danger">{{$message}}</span>
            @enderror
          </div>
          @endif
          <div class="d-flex">
    <div class="form-group flex-grow-1 mr-2">
        <label>Caracteristique</label>
        <select class="form-control" wire:model="selectedItem" required>
            <option value="">---------</option>
            <option value="Moteur">Moteur</option>
            <option value="Pompe">Pompe</option>
        </select>
    </div>

    @if($selectedItem === 'Moteur') 
    <div class="form-group flex-grow-1 mr-2" wire:key="moteur-select">
        <label for="moteur">Moteur</label>
        <select id="moteur" class="form-control @error('caracteristique_moteurs_id') is-invalid @enderror" wire:model="caracteristique_moteurs_id" required>
            @error('caracteristique_moteurs_id')
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
        <select id="pompe" class="form-control @error('caracteristique_moteurs_id') is-invalid @enderror" wire:model="caracteristique_moteurs_id" required>
            @error('caracteristique_moteurs_id')
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

    @if($cacheRapport)
    <div class="d-flex">
        <div class="form-group flex-grow-1 mr-2">
            <label class="col-form-label">Durée Réel</label>
            <input type="number" wire:model="DureeReel" class="form-control" >
            @error("DureeReel")
                <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="form-group flex-grow-1">
            <label class="col-form-label">Rapport de maintenance pdf</label>
            <input type="file" class="form-control"  wire:model="editImage">
            @error("editImage")
                <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
    </div>
    @endif 


          <div class="form-group">
            <label for="message-text" class="col-form-label">Action d'entreprise</label>
            <textarea class="form-control @error("actionEntreprise") is-invalid @enderror" wire:model="actionEntreprise" required>
            @error("actionEntreprise")
                          <span class="text-danger">{{$message}}</span>
            @enderror 
            </textarea>
          </div>
        
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">{{ $editId ? 'modifier Incident' : 'Ajout Incident'}}</button>
      </div>
      </form>
    </div>
  </div>