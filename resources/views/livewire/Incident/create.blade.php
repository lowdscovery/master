<div class="modal-dialog modal-xl">
    <div class="modal-content">

<div class="modal-header">
<h5 class="modal-title">Ajout d'incident</h5>
</div>
<div class="modal-body">

 <div class="container-fluid">   
 <div style="text-align:center;">
  @if (session()->has('message'))
      <div class="alert alert-success"> 
        {{session('message')}}
      </div>
  @endif
 </div>                             
   <div class="row p-2 pt-3">
     <div class="col-md-6">
        <div class="card card-teal">
            <div class="card-body">
           <form wire:submit.prevent="addIncident">
                    <div class="form-group">
                        <label >Date</label>
                        <input type="date"  class="form-control @error("addIncident.dateIncident") is-invalid 
                        @enderror" wire:model="addIncident.dateIncident" >  
                        @error("addIncident.dateIncident")
                          <span class="text-danger">{{$message}}</span>
                       @enderror
                    </div>
                    <div class="form-group">
                        <label >Index CH</label>
                        <input type="text"  class="form-control @error("addIncident.indexCH") is-invalid 
                        @enderror" wire:model="addIncident.indexCH" placeholder="Index"> 
                      @error("addIncident.indexCH")
                          <span class="text-danger">{{$message}}</span>
                       @enderror
                    </div>
                    <div class="d-flex">
                     <div class="form-group flex-grow-1 mr-2">
                        <label >Heure</label>
                        <input type="text"  class="form-control @error("addIncident.heure") is-invalid 
                        @enderror" wire:model="addIncident.heure" placeholder="Heure">
                         @error("addIncident.heure")
                          <span class="text-danger">{{$message}}</span>
                       @enderror
                     </div>
                     <div class="form-group flex-grow-1">
                        <label >Nature d'indice</label>
                        <input type="text"  class="form-control @error("addIncident.natureIncident") is-invalid 
                        @enderror" wire:model="addIncident.natureIncident" placeholder="Nature"> 
                        @error("addIncident.natureIncident")
                          <span class="text-danger">{{$message}}</span>
                       @enderror             
                     </div>
                    </div>

                   <div class="form-group">
                    <label >Caracteristique</label>
                    <select class="form-control @error("addIncident.marque|numero") is-invalid 
                            @enderror" wire:model="addIncident.marque|numero">
                            @error("addIncident.marque|numero")
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
          <div class="card card-teal">       
            <div class="card-body">  
                    <div class="form-group">
                        <label >Cause</label>
                        <input type="text"  class="form-control @error("addIncident.cause") is-invalid 
                        @enderror" wire:model="addIncident.cause" placeholder="Cause">
                        @error("addIncident.cause")
                        <span class="text-danger">{{$message}}</span>
                        @enderror   
                    </div>
                    <div class="form-group">
                        <label >Action</label>
                        <input type="text"  class="form-control @error("addIncident.action") is-invalid 
                        @enderror" wire:model="addIncident.action" placeholder="Action">
                        @error("addIncident.action")
                        <span class="text-danger">{{$message}}</span>
                        @enderror  
                    </div>
                    <div class="form-group">
                        <label >Resultat</label>
                        <input type="text"  class="form-control  @error("addIncident.resultat") is-invalid 
                        @enderror" wire:model="addIncident.resultat" placeholder="Resultat">
                        @error("addIncident.resultat")
                        <span class="text-danger">{{$message}}</span>
                        @enderror   
                    </div>
                    <div class="form-group">
                        <label >Intervenant</label>
                        <select class="form-control @error("addIncident.intervenant") is-invalid 
                        @enderror" wire:model="addIncident.intervenant">
                        @error("addIncident.intervenant")
                        <span class="text-danger">{{$message}}</span>
                        @enderror              
                        <option value="">---------</option>
                        @foreach ($inters as $inter)
                        <option value="{{$inter->nom}} {{$inter->prenom}}">{{$inter->nom}} {{$inter->prenom}}</option>
                        @endforeach
                        </select>
                    </div>
            </div>         
          </div>        
        </div>
        <div class="col-md-6">
      <button type="submit" class="btn btn-primary" style="margin-right: 10px;">Enregistrer</button>
      <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
      </div>
      </form>
    </div>  
    </div>
    </div>
  </div>
 </div>