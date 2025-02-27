<div class="modal-dialog modal-xl">
    <div class="modal-content">

<div class="modal-header">
<h5 class="modal-title">Ajout de commande</h5>
</div>
<div class="modal-body">
 <div class="container-fluid">                                
   <div class="row p-2 pt-3">
 
     <div class="col-md-6">
      
           <form wire:submit.prevent="addCommande">
                    <div class="form-group">
                        <label >Date</label>
                        <input type="date"  class="form-control @error("addCommande.dateCommande") is-invalid 
                        @enderror" wire:model="addCommande.dateCommande" required>  
                        @error("addCommande.dateCommande")
                          <span class="text-danger">{{$message}}</span>
                       @enderror
                    </div>
                    <div class="d-flex">
                     <div class="form-group flex-grow-1 mr-2">
                        <label >Motif</label>
                        <input type="text"  class="form-control @error("addCommande.motif") is-invalid 
                        @enderror" wire:model="addCommande.motif" placeholder="Motif" required>
                         @error("addCommande.motif")
                          <span class="text-danger">{{$message}}</span>
                       @enderror
                     </div>
                     <div class="form-group flex-grow-1">
                        <label >Article</label>
                        <input type="text"  class="form-control @error("addCommande.article") is-invalid 
                        @enderror" wire:model="addCommande.article" placeholder="Article" required> 
                        @error("addCommande.article")
                          <span class="text-danger">{{$message}}</span>
                       @enderror             
                     </div>
                    </div>
                    <div class="d-flex">
                     <div class="form-group flex-grow-1 mr-2">
                        <label >Reference</label>
                        <input type="text"  class="form-control @error("addCommande.reference") is-invalid 
                        @enderror" wire:model="addCommande.reference" placeholder="Reference" required>
                         @error("addCommande.reference")
                          <span class="text-danger">{{$message}}</span>
                       @enderror
                     </div>
                     <div class="form-group flex-grow-1">
                        <label >Quantité de commande</label>
                        <input type="text"  class="form-control @error("addCommande.quantiteCommande") is-invalid 
                        @enderror" wire:model="addCommande.quantiteCommande" placeholder="Quantité de commande" required> 
                        @error("addCommande.quantiteCommande")
                          <span class="text-danger">{{$message}}</span>
                       @enderror             
                     </div>
                    </div>

                   <div class="form-group flex-grow-1">
                        <label >Numero DA</label>
                        <input type="text"  class="form-control @error("addCommande.numeroDA") is-invalid 
                        @enderror" wire:model="addCommande.numeroDA" placeholder="Numero DA" required> 
                        @error("addCommande.numeroDA")
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
               <select class="form-control @error("addCommande.Situation") is-invalid @enderror" wire:model="addCommande.Situation" required="required">
                @error("addCommande.Situation")
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
                        <input type="text"  class="form-control @error("addCommande.quantiteReception") is-invalid 
                        @enderror" wire:model="addCommande.quantiteReception" placeholder="Quantité reception" required> 
                        @error("addCommande.quantiteReception")
                          <span class="text-danger">{{$message}}</span>
                       @enderror             
                     </div>
                    </div>
                    <div class="form-group">
                        <label >Date de reception</label>
                        <input type="date"  class="form-control  @error("addCommande.dateReception") is-invalid 
                        @enderror" wire:model="addCommande.dateReception" placeholder="Resultat" required>
                        @error("addCommande.dateReception")
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
                          <select id="moteur" class="form-control @error('addCommande.caracteristique') is-invalid @enderror" wire:model="addCommande.caracteristique" required>
                              @error('addCommande.caracteristique')
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
                          <select id="pompe" class="form-control @error('addCommande.caracteristique') is-invalid @enderror" wire:model="addCommande.caracteristique" required>
                              @error('addCommande.caracteristique')
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
                        <input type="text"  class="form-control  @error("addCommande.observation") is-invalid 
                        @enderror" wire:model="addCommande.observation" placeholder="Observation" required>
                        @error("addCommande.observation")
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

            </div>         
          </div>
        </div>
      <div class="col-md-6">
      <button type="submit" class="btn btn-primary">Enregistrer</button>
      <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
      </div>
    </form>
    </div>  
    </div>
    </div>
  </div>
 </div>