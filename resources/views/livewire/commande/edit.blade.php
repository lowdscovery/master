<div class="modal-dialog modal-xl">
    <div class="modal-content">

<div class="modal-header">
<h5 class="modal-title">Edit de commande</h5>
</div>
<div class="modal-body">
 <div class="container-fluid">                                
   <div class="row p-2 pt-3">
 
     <div class="col-md-6">
        <div class="card card-teal">
            <div class="card-body">
           <form wire:submit.prevent="updateCommande">
                    <div class="form-group">
                        <label >Date</label>
                        <input type="date"  class="form-control @error("editCommande.dateCommande") is-invalid 
                        @enderror" wire:model="editCommande.dateCommande" >  
                        @error("editCommande.dateCommande")
                          <span class="text-danger">{{$message}}</span>
                       @enderror
                    </div>
                    <div class="d-flex">
                     <div class="form-group flex-grow-1 mr-2">
                        <label >Motif</label>
                        <input type="text"  class="form-control @error("editCommande.motif") is-invalid 
                        @enderror" wire:model="editCommande.motif" placeholder="Heure">
                         @error("editCommande.motif")
                          <span class="text-danger">{{$message}}</span>
                       @enderror
                     </div>
                     <div class="form-group flex-grow-1">
                        <label >Article</label>
                        <input type="text"  class="form-control @error("editCommande.article") is-invalid 
                        @enderror" wire:model="editCommande.article" placeholder="Nature"> 
                        @error("editCommande.article")
                          <span class="text-danger">{{$message}}</span>
                       @enderror             
                     </div>
                    </div>
                    <div class="d-flex">
                     <div class="form-group flex-grow-1 mr-2">
                        <label >Reference</label>
                        <input type="text"  class="form-control @error("editCommande.reference") is-invalid 
                        @enderror" wire:model="editCommande.reference" placeholder="Heure">
                         @error("editCommande.reference")
                          <span class="text-danger">{{$message}}</span>
                       @enderror
                     </div>
                     <div class="form-group flex-grow-1">
                        <label >Quantité de commande</label>
                        <input type="text"  class="form-control @error("editCommande.quantiteCommande") is-invalid 
                        @enderror" wire:model="editCommande.quantiteCommande" placeholder="Nature"> 
                        @error("editCommande.quantiteCommande")
                          <span class="text-danger">{{$message}}</span>
                       @enderror             
                     </div>
                    </div>

                   <div class="form-group flex-grow-1">
                        <label >Numero DA</label>
                        <input type="text"  class="form-control @error("editCommande.numeroDA") is-invalid 
                        @enderror" wire:model="editCommande.numeroDA" placeholder="Nature"> 
                        @error("editCommande.numeroDA")
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

                    <div class="d-flex">
                     <div class="form-group flex-grow-1 mr-2">
                        <label >Situation</label>
                        <input type="text"  class="form-control @error("editCommande.Situation") is-invalid 
                        @enderror" wire:model="editCommande.Situation" placeholder="Heure">
                         @error("editCommande.Situation")
                          <span class="text-danger">{{$message}}</span>
                       @enderror
                     </div>
                     <div class="form-group flex-grow-1">
                        <label >Quantité de reception</label>
                        <input type="text"  class="form-control @error("editCommande.quantiteReception") is-invalid 
                        @enderror" wire:model="editCommande.quantiteReception" placeholder="Nature"> 
                        @error("editCommande.quantiteReception")
                          <span class="text-danger">{{$message}}</span>
                       @enderror             
                     </div>
                    </div>
                    <div class="form-group">
                        <label >Date de reception</label>
                        <input type="date"  class="form-control  @error("editCommande.dateReception") is-invalid 
                        @enderror" wire:model="editCommande.dateReception" placeholder="Resultat">
                        @error("editCommande.dateReception")
                        <span class="text-danger">{{$message}}</span>
                        @enderror   
                    </div>
                    <div class="form-group">
                        <label >Caracteristique</label>
                        <select class="form-control @error("editCommande.observation") is-invalid 
                        @enderror" wire:model="editCommande.observation">
                        @error("editCommande.observation")
                        <span class="text-danger">{{$message}}</span>
                        @enderror              
                        <option value="">---------</option>
                        @foreach ($caracteristiques as $caracteristique)
                          <option value="{{$caracteristique->marque}}   |   {{$caracteristique->numeroSerie}}">{{$caracteristique->marque}}   |   {{$caracteristique->numeroSerie}}</option>
                        @endforeach             
                        </select>
                    </div>
                    <div class="form-group">
                        <label >Observation</label>
                        <input type="text"  class="form-control  @error("editCommande.caracteristique") is-invalid 
                        @enderror" wire:model="editCommande.caracteristique" placeholder="Resultat">
                        @error("editCommande.caracteristique")
                        <span class="text-danger">{{$message}}</span>
                        @enderror
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