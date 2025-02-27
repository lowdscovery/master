<div class="modal-dialog modal-xl">
    <div class="modal-content">

<div class="modal-header">
<h5 class="modal-title">{{ $editId ? 'Modifier incident' : 'Ajout incident'}}</h5>
</div>
<div class="modal-body">
 <div class="container-fluid">                                
   <div class="row p-2 pt-3">
     <div class="col-md-6">   
           <form wire:submit.prevent="{{ $editId ? 'updateTransaction' : 'addTransaction'}}">
                    <div class="form-group">
                        <label >Date</label>
                        <input type="date"  class="form-control @error("dateIncident") is-invalid 
                        @enderror" wire:model="dateIncident" required>  
                        @error("dateIncident")
                          <span class="text-danger">{{$message}}</span>
                       @enderror
                    </div>
                    <div class="form-group">
                        <label >Index CH</label>
                        <input type="text"  class="form-control @error("indexCH") is-invalid 
                        @enderror" wire:model="indexCH" placeholder="Index" required> 
                      @error("indexCH")
                          <span class="text-danger">{{$message}}</span>
                       @enderror
                    </div>
                    
                     <div class="form-group">
                        <label >Nature de l'incident</label>
                        <input type="text"  class="form-control @error("natureIncident") is-invalid 
                        @enderror" wire:model="natureIncident" placeholder="Nature" required> 
                        @error("natureIncident")
                          <span class="text-danger">{{$message}}</span>
                       @enderror             
                     </div>
                    
                  <div class="d-flex">
                   <div class="form-group flex-grow-1 mr-2">
                    <label >Caracteristique</label>
                    <select class="form-control" wire:model="selectedItem" required>              
                     <option value="">---------</option>
                     <option value="Moteur">Moteur</option>
                     <option value="Pompe">Pompe</option>
                    </select>
                   </div>
                   @if($selectedItem === 'Moteur') 
                   <div class="form-group flex-grow-1 mr-2" wire:key="moteur-select">
                    <label for="moteur">Moteur</label>
                    <select id="moteur" class="form-control @error("caracteristique_moteur_id") is-invalid 
                            @enderror" wire:model="caracteristique_moteur_id" required>
                            @error("caracteristique_moteur_id")
                                    <span class="text-danger">{{$message}}</span>
                            @enderror               
                     <option value="">---------</option>
                     @foreach ($moteurs as $moteur)
                     <option value="{{$moteur->numeroSerie}}">{{$moteur->numeroSerie}}</option>
                     @endforeach
                    </select>
                   </div> 
                   @endif
                   @if($selectedItem === 'Pompe')
                   <div class="form-group flex-grow-1" wire:key="pompe-select">
                    <label for="pompe">Pompe</label>
                    <select id="pompe" class="form-control @error("caracteristique_moteur_id") is-invalid 
                            @enderror" wire:model="caracteristique_moteur_id" required>
                            @error("caracteristique_moteur_id")
                                    <span class="text-danger">{{$message}}</span>
                            @enderror               
                     <option value="">---------</option>
                     @foreach ($pompes as $pompe)
                     <option value="{{$pompe->numeroSerie}}">{{$pompe->numeroSerie}}</option>
                     @endforeach
                    </select>
                   </div>
                   @endif  
                </div>
        </div>  
  <!-- separation -->     
        <div class="col-md-6">            
                    <div class="form-group">
                        <label >Cause</label>
                        <input type="text"  class="form-control @error("cause") is-invalid 
                        @enderror" wire:model="cause" placeholder="Cause" required>
                        @error("cause")
                        <span class="text-danger">{{$message}}</span>
                        @enderror   
                    </div>
                    <div class="form-group">
                        <label >Action</label>
                        <input type="text"  class="form-control @error("action") is-invalid 
                        @enderror" wire:model="action" placeholder="Action" required>
                        @error("action")
                        <span class="text-danger">{{$message}}</span>
                        @enderror  
                    </div>
                    <div class="form-group">
                        <label >Resultat</label>
                        <input type="text"  class="form-control  @error("resultat") is-invalid 
                        @enderror" wire:model="resultat" placeholder="Resultat" required>
                        @error("resultat")
                        <span class="text-danger">{{$message}}</span>
                        @enderror   
                    </div>
                    <div class="form-group">
                        <label >Intervenant</label>
                        <select class="form-control @error("intervenant_id") is-invalid 
                        @enderror" wire:model="intervenant_id" required>
                        @error("intervenant_id")
                        <span class="text-danger">{{$message}}</span>
                        @enderror              
                        <option value="">---------</option>
                        @foreach ($inters as $inter)
                        <option value="{{$inter->nom}} {{$inter->prenom}}">{{$inter->nom}} {{$inter->prenom}}</option>
                        @endforeach
                        </select>
                    </div>         
        </div>
        <div class="col-md-6">
      <button type="submit" class="btn btn-primary" style="margin-right: 10px;">{{ $editId ? 'modifier Incident' : 'Ajout Incident'}}</button>
      <button type="button" class="btn btn-secondary" wire:click="cancelEdit" data-dismiss="modal">Fermer</button>
      </div>
    </form>
    </div>  
    </div>
    </div>
  </div>
 </div>