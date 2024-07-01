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
                        @enderror" wire:model="addBis.repere" placeholder="Repere">  
                        @error("addBis.repere")
                          <span class="text-danger">{{$message}}</span>
                       @enderror
                    </div>
                    <div class="d-flex">
                     <div class="form-group flex-grow-1 mr-2">
                        <label >Designation</label>
                        <input type="text"  class="form-control @error("addBis.designation") is-invalid 
                        @enderror" wire:model="addBis.designation" placeholder="Designation">
                         @error("addBis.designation")
                          <span class="text-danger">{{$message}}</span>
                       @enderror
                     </div>
                     <div class="form-group flex-grow-1">
                        <label >Marque</label>
                        <input type="text"  class="form-control @error("addBis.marque") is-invalid 
                        @enderror" wire:model="addBis.marque" placeholder="Marque"> 
                        @error("addBis.marque")
                          <span class="text-danger">{{$message}}</span>
                       @enderror             
                     </div>
                    </div>       
                     <div class="form-group">
                        <label >Type</label>
                        <input type="text"  class="form-control @error("addBis.type") is-invalid 
                        @enderror" wire:model="addBis.type" placeholder="Type">
                         @error("addBis.type")
                          <span class="text-danger">{{$message}}</span>
                       @enderror
                     </div>
                     <div class="form-group">
                        <label >Dn</label>
                        <input type="text"  class="form-control @error("addBis.Dn") is-invalid 
                        @enderror" wire:model="addBis.Dn" placeholder="Nature"> 
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
                        @enderror" wire:model="addBis.Pn" placeholder="Nature"> 
                        @error("addBis.Pn")
                          <span class="text-danger">{{$message}}</span>
                       @enderror             
                     </div>

                     <div class="form-group">
                        <label >Date de Pose</label>
                        <input type="date"  class="form-control @error("addBis.dateDePose") is-invalid 
                        @enderror" wire:model="addBis.dateDePose" placeholder="Heure">
                         @error("addBis.dateDePose")
                          <span class="text-danger">{{$message}}</span>
                       @enderror
                     </div>
                     <div class="form-group">
                        <label >Tarage</label>
                        <input type="text"  class="form-control @error("addBis.tarage") is-invalid 
                        @enderror" wire:model="addBis.tarage" placeholder="Nature"> 
                        @error("addBis.tarage")
                          <span class="text-danger">{{$message}}</span>
                       @enderror             
                     </div>
                           
                    <div class="form-group">
                        <label >Caracteristique</label>
                        <select class="form-control @error("addBis.caracteristique") is-invalid 
                        @enderror" wire:model="addBis.caracteristique">
                        @error("addBis.caracteristique")
                        <span class="text-danger">{{$message}}</span>
                        @enderror              
                        <option value="">---------</option>
                        @foreach ($caracteristiques as $caracteristique)
                          <option value="{{$caracteristique->id}}">{{$caracteristique->ressources->nom}}</option>
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