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
                        <input type="text"  class="form-control @error("indexCH") is-invalid 
                        @enderror" wire:model="indexCH" placeholder="Index"> 
                      @error("indexCH")
                          <span class="text-danger">{{$message}}</span>
                       @enderror
                    </div>                     
                     <div class="form-group">
                        <label >Nature d'indice</label>
                        <input type="text"  class="form-control @error("editIncident.natureIncident") is-invalid 
                        @enderror" wire:model="editIncident.natureIncident" placeholder="Nature"> 
                        @error("editIncident.natureIncident")
                          <span class="text-danger">{{$message}}</span>
                       @enderror             
                     </div>
                   
                   <div class="form-group">
                    <label >Caracteristique</label>
                    <select class="form-control @error("editIncident.caracteristique_moteur_id") is-invalid 
                            @enderror" wire:model="editIncident.caracteristique_moteur_id">
                            @error("editIncident.caracteristique_moteur_id")
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
                        <select class="form-control @error("editIncident.intervenant_id") is-invalid 
                        @enderror" wire:model="editIncident.intervenant_id">
                        @error("editIncident.intervenant_id")
                        <span class="text-danger">{{$message}}</span>
                        @enderror              
                        <option value="">---------</option>
                        @foreach ($inters as $inter)
                        <option value="{{$inter->id}}">{{$inter->nom}} {{$inter->prenom}}</option>
                        @endforeach
                        </select>
                    </div>                 
                </div>
              </div>
            </div>         
          </div>
        </div>
        <div class="col-md-6">
            <button type="submit" class="btn btn-primary">Modifier</button>                  
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
         </div>
    </form>
    </div>  
    </div>
    </div>
  </div>
 </div>