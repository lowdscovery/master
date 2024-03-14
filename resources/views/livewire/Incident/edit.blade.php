<div class="modal-dialog modal-xl">
    <div class="modal-content">

<div class="modal-header">
<h5 class="modal-title">Edit d'incident</h5>
</div>
<div class="modal-body">
 <div class="container-fluid">                                
   <div class="row p-2 pt-3">
 
     <div class="col-md-6">
        <div class="card card-teal">
            <div class="card-body">
           <form wire:submit.prevent="updateIncident">
                    <div class="form-group">
                        <label >Date</label>
                        <input type="date"  class="form-control @error("editIncident.dateIncident") is-invalid 
                        @enderror" wire:model="editIncident.dateIncident" >  
                        @error("editIncident.dateIncident")
                          <span class="text-danger">{{$message}}</span>
                       @enderror
                    </div>
                    <div class="form-group">
                        <label >Index CH</label>
                        <input type="text"  class="form-control @error("editIncident.indexCH") is-invalid 
                        @enderror" wire:model="editIncident.indexCH" placeholder="Index"> 
                      @error("editIncident.indexCH")
                          <span class="text-danger">{{$message}}</span>
                       @enderror
                    </div>
                    <div class="d-flex">
                     <div class="form-group flex-grow-1 mr-2">
                        <label >Heure</label>
                        <input type="text"  class="form-control @error("editIncident.heure") is-invalid 
                        @enderror" wire:model="editIncident.heure" placeholder="Heure">
                         @error("editIncident.heure")
                          <span class="text-danger">{{$message}}</span>
                       @enderror
                     </div>
                     <div class="form-group flex-grow-1">
                        <label >Nature d'indice</label>
                        <input type="text"  class="form-control @error("editIncident.natureIncident") is-invalid 
                        @enderror" wire:model="editIncident.natureIncident" placeholder="Nature"> 
                        @error("editIncident.natureIncident")
                          <span class="text-danger">{{$message}}</span>
                       @enderror             
                     </div>
                    </div>

                   <div class="form-group">
                    <label >Caracteristique</label>
                    <select class="form-control @error("editIncident.marque|numero") is-invalid 
                            @enderror" wire:model="editIncident.marque|numero">
                            @error("editIncident.marque|numero")
                                    <span class="text-danger">{{$message}}</span>
                            @enderror               
                     <option value="">---------</option>
                     @foreach ($caracteristiques as $caracteristique)
                     <option value="{{$caracteristique->marque}}   |   {{$caracteristique->numeroSerie}}">{{$caracteristique->marque}}   |   {{$caracteristique->numeroSerie}}</option>
                     @endforeach
                    </select>
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
                        <label >Cause</label>
                        <input type="text"  class="form-control @error("editIncident.cause") is-invalid 
                        @enderror" wire:model="editIncident.cause" placeholder="Cause">
                        @error("editIncident.cause")
                        <span class="text-danger">{{$message}}</span>
                        @enderror   
                    </div>
                    <div class="form-group">
                        <label >Action</label>
                        <input type="text"  class="form-control @error("editIncident.action") is-invalid 
                        @enderror" wire:model="editIncident.action" placeholder="Action">
                        @error("editIncident.action")
                        <span class="text-danger">{{$message}}</span>
                        @enderror  
                    </div>
                    <div class="form-group">
                        <label >Resultat</label>
                        <input type="text"  class="form-control  @error("editIncident.resultat") is-invalid 
                        @enderror" wire:model="editIncident.resultat" placeholder="Resultat">
                        @error("editIncident.resultat")
                        <span class="text-danger">{{$message}}</span>
                        @enderror   
                    </div>
                    <div class="form-group">
                        <label >Intervenant</label>
                        <select class="form-control @error("editIncident.intervenant") is-invalid 
                        @enderror" wire:model="editIncident.intervenant">
                        @error("editIncident.intervenant")
                        <span class="text-danger">{{$message}}</span>
                        @enderror              
                        <option value="">---------</option>
                        @foreach ($inters as $inter)
                        <option value="{{$inter->nom}} {{$inter->prenom}}">{{$inter->nom}} {{$inter->prenom}}</option>
                        @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Enregistrer</button>                  
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                </div>
              </div>
            </div>         
          </div>
        </div>
    </form>
    </div>  
    </div>
    </div>
  </div>
 </div>