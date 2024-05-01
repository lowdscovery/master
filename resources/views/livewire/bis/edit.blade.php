<div class="modal-dialog modal-xl">
<div class="modal-content">

<div class="modal-header">
<h5 class="modal-title">Edit bis</h5>
</div>
<div class="modal-body">
 <div class="container-fluid">                                
   <div class="row p-2 pt-3">
 
     <div class="col-md-6">
        <div class="card card-teal">
            <div class="card-body">
           <form wire:submit.prevent="updateCommande">
                    <div class="form-group">
                        <label >Repere</label>
                        <input type="text"  class="form-control @error("editBis.repere") is-invalid 
                        @enderror" wire:model="editBis.repere" >  
                        @error("editBis.repere")
                          <span class="text-danger">{{$message}}</span>
                       @enderror
                    </div>
                    <div class="d-flex">
                     <div class="form-group flex-grow-1 mr-2">
                        <label >Designation</label>
                        <input type="text"  class="form-control @error("editBis.designation") is-invalid 
                        @enderror" wire:model="editBis.designation" placeholder="Heure">
                         @error("editBis.designation")
                          <span class="text-danger">{{$message}}</span>
                       @enderror
                     </div>
                     <div class="form-group flex-grow-1">
                        <label >Marque</label>
                        <input type="text"  class="form-control @error("editBis.marque") is-invalid 
                        @enderror" wire:model="editBis.marque" placeholder="Nature"> 
                        @error("editBis.marque")
                          <span class="text-danger">{{$message}}</span>
                       @enderror             
                     </div>
                    </div>
                     <div class="form-group">
                        <label >Type</label>
                        <input type="text"  class="form-control @error("editBis.type") is-invalid 
                        @enderror" wire:model="editBis.type" placeholder="Heure">
                         @error("editBis.type")
                          <span class="text-danger">{{$message}}</span>
                       @enderror
                     </div>
                     <div class="form-group">
                        <label >Dn</label>
                        <input type="text"  class="form-control @error("editBis.Dn") is-invalid 
                        @enderror" wire:model="editBis.Dn" placeholder="Nature"> 
                        @error("editBis.Dn")
                          <span class="text-danger">{{$message}}</span>
                       @enderror             
                     </div>

             </div>    
        </div>  
    </div>
  <!-- separation -->     
        <div class="col-md-6">
          <div class="row ">       
            <div class="col-md-12">
             <div class="card card-info" style=".card:blue;">
               <div class="p-3 table-striped">

                   <div class="form-group">
                        <label >Pn</label>
                        <input type="text"  class="form-control @error("editBis.Pn") is-invalid 
                        @enderror" wire:model="editBis.Pn" placeholder="Nature"> 
                        @error("editBis.Pn")
                          <span class="text-danger">{{$message}}</span>
                       @enderror             
                     </div>
                    
                     <div class="form-group">
                        <label >Date de Pose</label>
                        <input type="Date"  class="form-control @error("editBis.dateDePose") is-invalid 
                        @enderror" wire:model="editBis.dateDePose" placeholder="Heure">
                         @error("editBis.dateDePose")
                          <span class="text-danger">{{$message}}</span>
                       @enderror
                     </div>
                     <div class="form-group">
                        <label >Tarage</label>
                        <input type="text"  class="form-control @error("editBis.tarage") is-invalid 
                        @enderror" wire:model="editBis.tarage" placeholder="Nature"> 
                        @error("editBis.tarage")
                          <span class="text-danger">{{$message}}</span>
                       @enderror             
                     </div>
                   
                    <div class="form-group">
                        <label >Caracteristique</label>
                        <select class="form-control @error("editBis.caracteristique") is-invalid 
                        @enderror" wire:model="editBis.caracteristique">
                        @error("editBis.caracteristique")
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