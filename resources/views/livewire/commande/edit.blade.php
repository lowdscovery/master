<div class="modal-dialog modal-xl">
    <div class="modal-content">

<div class="modal-header">
<h5 class="modal-title">Edit de commande</h5>
</div>
<div class="modal-body">
 <div class="container-fluid">                                
   <div class="row p-2 pt-3">
 
     <div class="col-md-6">
           <form wire:submit.prevent="updateCommande">
                    <div class="form-group">
                        <label >Date</label>
                        <input type="date"  class="form-control @error("editCommande.dateCommande") is-invalid 
                        @enderror" wire:model="editCommande.dateCommande" required>  
                        @error("editCommande.dateCommande")
                          <span class="text-danger">{{$message}}</span>
                       @enderror
                    </div>
                    <div class="d-flex">
                     <div class="form-group flex-grow-1 mr-2">
                        <label >Motif</label>
                        <input type="text"  class="form-control @error("editCommande.motif") is-invalid 
                        @enderror" wire:model="editCommande.motif" placeholder="Motif" required>
                         @error("editCommande.motif")
                          <span class="text-danger">{{$message}}</span>
                       @enderror
                     </div>
                     <div class="form-group flex-grow-1">
                        <label >Article</label>
                        <input type="text"  class="form-control @error("editCommande.article") is-invalid 
                        @enderror" wire:model="editCommande.article" placeholder="Article" required> 
                        @error("editCommande.article")
                          <span class="text-danger">{{$message}}</span>
                       @enderror             
                     </div>
                    </div>
                    <div class="d-flex">
                     <div class="form-group flex-grow-1 mr-2">
                        <label >Reference</label>
                        <input type="text"  class="form-control @error("editCommande.reference") is-invalid 
                        @enderror" wire:model="editCommande.reference" placeholder="Reference" required>
                         @error("editCommande.reference")
                          <span class="text-danger">{{$message}}</span>
                       @enderror
                     </div>
                     <div class="form-group flex-grow-1">
                        <label >Quantité de commande</label>
                        <input type="text"  class="form-control @error("editCommande.quantiteCommande") is-invalid 
                        @enderror" wire:model="editCommande.quantiteCommande" placeholder="Quantité de commande" required> 
                        @error("editCommande.quantiteCommande")
                          <span class="text-danger">{{$message}}</span>
                       @enderror             
                     </div>
                    </div>

                   <div class="form-group flex-grow-1">
                        <label >Numero DA</label>
                        <input type="text"  class="form-control @error("editCommande.numeroDA") is-invalid 
                        @enderror" wire:model="editCommande.numeroDA" placeholder="Numero DA" required> 
                        @error("editCommande.numeroDA")
                          <span class="text-danger">{{$message}}</span>
                       @enderror             
                     </div>  
    </div>
  <!-- separation -->     
        <div class="col-md-6">
          <div class="row ">       
            <div class="col-md-12">
            
                    <div class="d-flex">
                     <div class="form-group flex-grow-1 mr-2">
                        <label >Situation</label>
                <select class="form-control @error("editCommande.Situation") is-invalid @enderror" wire:model="editCommande.Situation" required="required">
                @error("editCommande.Situation")
                          <span class="text-danger">{{$message}}</span>
                 @enderror 
                    <option value="">---------</option>
                    <option value="LOCAL">LOCAL</option>
                    <option value="DIR">DIR</option>
                    <option value="TANA">TANA</option>
                    <option value="IMPORT">IMPORT</option>
                </select>
                     </div>
                     <div class="form-group flex-grow-1">
                        <label >Quantité de reception</label>
                        <input type="text"  class="form-control @error("editCommande.quantiteReception") is-invalid 
                        @enderror" wire:model="editCommande.quantiteReception" placeholder="Nature" required> 
                        @error("editCommande.quantiteReception")
                          <span class="text-danger">{{$message}}</span>
                       @enderror             
                     </div>
                    </div>
                    <div class="form-group">
                        <label >Date de reception</label>
                        <input type="date"  class="form-control  @error("editCommande.dateReception") is-invalid 
                        @enderror" wire:model="editCommande.dateReception" placeholder="Resultat" required>
                        @error("editCommande.dateReception")
                        <span class="text-danger">{{$message}}</span>
                        @enderror   
                    </div>
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
                          <select id="moteur" class="form-control @error('editCommande.caracteristique') is-invalid @enderror" wire:model="editCommande.caracteristique" required>
                              @error('editCommande.caracteristique')
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
                          <select id="pompe" class="form-control @error('editCommande.caracteristique') is-invalid @enderror" wire:model="editCommande.caracteristique" required>
                              @error('editCommande.caracteristique')
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
                    <div class="form-group">
                        <label >Observation</label>
                        <input type="text"  class="form-control  @error("editCommande.observation") is-invalid 
                        @enderror" wire:model="editCommande.observation" placeholder="Observation" required>
                        @error("editCommande.observation")
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
            </div>         
          </div>
        </div>
      <div class="col-md-6">
      <button type="submit" class="btn btn-primary">Enregistrer</button>
      <button type="button" class="btn btn-secondary" data-dismiss="modal" wire:click="cancel">Fermer</button>
      </div>
    </form>
    </div>  
    </div>
    </div>
  </div>
 </div>