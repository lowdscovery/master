<div class="modal-dialog modal-xl">
    <div class="modal-content">

<div class="modal-header">
<h5 class="modal-title">ajout bis</h5>
</div>
<div class="modal-body">
 <div class="container-fluid">                                
   <div class="row p-2 pt-3">
 
     <div class="col-md-6">
           <form wire:submit.prevent="addBis">
                    <div class="form-group">
                        <label >Repere</label>
                        <input type="text"  class="form-control @error("addBis.repere") is-invalid 
                        @enderror" wire:model="addBis.repere" placeholder="Repere" required>  
                        @error("addBis.repere")
                          <span class="text-danger">{{$message}}</span>
                       @enderror
                    </div>
                    <div class="d-flex">
                     <div class="form-group flex-grow-1 mr-2">
                        <label >Designation</label>
                        <input type="text"  class="form-control @error("addBis.designation") is-invalid 
                        @enderror" wire:model="addBis.designation" placeholder="Designation" required>
                         @error("addBis.designation")
                          <span class="text-danger">{{$message}}</span>
                       @enderror
                     </div>
                     <div class="form-group flex-grow-1">
                        <label >Marque</label>
                        <input type="text"  class="form-control @error("addBis.marque") is-invalid 
                        @enderror" wire:model="addBis.marque" placeholder="Marque" required> 
                        @error("addBis.marque")
                          <span class="text-danger">{{$message}}</span>
                       @enderror             
                     </div>
                    </div>       
                     <div class="form-group">
                        <label >Modele</label>
                        <input type="text"  class="form-control @error("addBis.type") is-invalid 
                        @enderror" wire:model="addBis.type" placeholder="Modele" required>
                         @error("addBis.type")
                          <span class="text-danger">{{$message}}</span>
                       @enderror
                     </div>
                     <div class="form-group">
                        <label >Dn</label>
                        <input type="text"  class="form-control @error("addBis.Dn") is-invalid 
                        @enderror" wire:model="addBis.Dn" placeholder="Dn" required> 
                        @error("addBis.Dn")
                          <span class="text-danger">{{$message}}</span>
                       @enderror             
                     </div>  
        </div>
  <!-- separation -->     
        <div class="col-md-6">
          <div class="row ">       
            <div class="col-md-12">
                    
                     <div class="form-group flex-grow-1">
                        <label >Pn</label>
                        <input type="text"  class="form-control @error("addBis.Pn") is-invalid 
                        @enderror" wire:model="addBis.Pn" placeholder="Pn" required> 
                        @error("addBis.Pn")
                          <span class="text-danger">{{$message}}</span>
                       @enderror             
                     </div>

                     <div class="form-group">
                        <label >Date de Pose</label>
                        <input type="date"  class="form-control @error("addBis.dateDePose") is-invalid 
                        @enderror" wire:model="addBis.dateDePose" placeholder="Heure" required>
                         @error("addBis.dateDePose")
                          <span class="text-danger">{{$message}}</span>
                       @enderror
                     </div>
                     <div class="form-group">
                        <label >Tarage</label>
                        <input type="text"  class="form-control @error("addBis.tarage") is-invalid 
                        @enderror" wire:model="addBis.tarage" placeholder="Tarage" required> 
                        @error("addBis.tarage")
                          <span class="text-danger">{{$message}}</span>
                       @enderror             
                     </div>
                           
                      <div class="form-group>
                          <label for="forage">Forage</label>
                          <select id="forage" class="form-control @error('addBis.caracteristique') is-invalid @enderror" wire:model="addBis.caracteristique" required>
                              @error('addBis.caracteristique')
                                  <span class="text-danger">{{ $message }}</span>
                              @enderror
                              <option value="">---------</option>
                              @foreach ($forages as $forage)                          
                            <option value="{{$forage->ressources->nom}}">{{$forage->ressources->nom}}</option>
                              @endforeach
                          </select>
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