<div class="modal-dialog modal-xl">
    <div class="modal-content">

<div class="modal-header">
<h5 class="modal-title">Incident</h5>
</div>
<div class="modal-body">
 <div class="container-fluid">                                
   <div class="row p-2 pt-3">
     <div class="col-md-6">
        <div class="card card-teal">
            <div class="card-body">
           <form wire:submit.prevent="{{ $editId ? 'updateTransaction' : 'addTransaction'}}">
                    <div class="form-group">
                        <label >Date</label>
                        <input type="date"  class="form-control @error("dateIncident") is-invalid 
                        @enderror" wire:model="dateIncident" >  
                        @error("dateIncident")
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
                        <input type="text"  class="form-control @error("natureIncident") is-invalid 
                        @enderror" wire:model="natureIncident" placeholder="Nature"> 
                        @error("natureIncident")
                          <span class="text-danger">{{$message}}</span>
                       @enderror             
                     </div>
                    

                   <div class="form-group">
                    <label >Caracteristique</label>
                    <select class="form-control @error("caracteristique_moteur_id") is-invalid 
                            @enderror" wire:model="caracteristique_moteur_id">
                            @error("caracteristique_moteur_id")
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
          <div class="card card-teal">       
            <div class="card-body">  
                    <div class="form-group">
                        <label >Cause</label>
                        <input type="text"  class="form-control @error("cause") is-invalid 
                        @enderror" wire:model="cause" placeholder="Cause">
                        @error("cause")
                        <span class="text-danger">{{$message}}</span>
                        @enderror   
                    </div>
                    <div class="form-group">
                        <label >Action</label>
                        <input type="text"  class="form-control @error("action") is-invalid 
                        @enderror" wire:model="action" placeholder="Action">
                        @error("action")
                        <span class="text-danger">{{$message}}</span>
                        @enderror  
                    </div>
                    <div class="form-group">
                        <label >Resultat</label>
                        <input type="text"  class="form-control  @error("resultat") is-invalid 
                        @enderror" wire:model="resultat" placeholder="Resultat">
                        @error("resultat")
                        <span class="text-danger">{{$message}}</span>
                        @enderror   
                    </div>
                    <div class="form-group">
                        <label >Intervenant</label>
                        <select class="form-control @error("intervenant_id") is-invalid 
                        @enderror" wire:model="intervenant_id">
                        @error("intervenant_id")
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
        <div class="col-md-6">
      <button type="submit" class="btn btn-primary" style="margin-right: 10px;">{{ $editId ? 'modifier Incident' : 'Ajout Incident'}}</button>
      <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
      </div>
    </form>
    </div>  
    </div>
    </div>
  </div>
 </div>