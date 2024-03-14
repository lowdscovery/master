<div class="modal-dialog modal-xl">
    <div class="modal-content">

<div class="modal-header">
<h5 class="modal-title">Ajout de commande</h5>
</div>
<div class="modal-body">
 <div class="container-fluid">                                
   <div class="row p-2 pt-3">
 
     <div class="col-md-6">
        <div class="card card-teal">
            <div class="card-body">
           <form wire:submit.prevent="addCommande">
                    <div class="form-group">
                        <label >Date</label>
                        <input type="date"  class="form-control @error("addCommande.dateCommande") is-invalid 
                        @enderror" wire:model="addCommande.dateCommande" >  
                        @error("addCommande.dateCommande")
                          <span class="text-danger">{{$message}}</span>
                       @enderror
                    </div>
                    <div class="d-flex">
                     <div class="form-group flex-grow-1 mr-2">
                        <label >Motif</label>
                        <input type="text"  class="form-control @error("addCommande.motif") is-invalid 
                        @enderror" wire:model="addCommande.motif" placeholder="Heure">
                         @error("addCommande.motif")
                          <span class="text-danger">{{$message}}</span>
                       @enderror
                     </div>
                     <div class="form-group flex-grow-1">
                        <label >Article</label>
                        <input type="text"  class="form-control @error("addCommande.article") is-invalid 
                        @enderror" wire:model="addCommande.article" placeholder="Nature"> 
                        @error("addCommande.article")
                          <span class="text-danger">{{$message}}</span>
                       @enderror             
                     </div>
                    </div>
                    <div class="d-flex">
                     <div class="form-group flex-grow-1 mr-2">
                        <label >Reference</label>
                        <input type="text"  class="form-control @error("addCommande.reference") is-invalid 
                        @enderror" wire:model="addCommande.reference" placeholder="Heure">
                         @error("addCommande.reference")
                          <span class="text-danger">{{$message}}</span>
                       @enderror
                     </div>
                     <div class="form-group flex-grow-1">
                        <label >Quantité de commande</label>
                        <input type="text"  class="form-control @error("addCommande.quantiteCommande") is-invalid 
                        @enderror" wire:model="addCommande.quantiteCommande" placeholder="Nature"> 
                        @error("addCommande.quantiteCommande")
                          <span class="text-danger">{{$message}}</span>
                       @enderror             
                     </div>
                    </div>

                   <div class="form-group flex-grow-1">
                        <label >Numero DA</label>
                        <input type="text"  class="form-control @error("addCommande.numeroDA") is-invalid 
                        @enderror" wire:model="addCommande.numeroDA" placeholder="Nature"> 
                        @error("addCommande.numeroDA")
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
                        <input type="text"  class="form-control @error("addCommande.Situation") is-invalid 
                        @enderror" wire:model="addCommande.Situation" placeholder="Heure">
                         @error("addCommande.Situation")
                          <span class="text-danger">{{$message}}</span>
                       @enderror
                     </div>
                     <div class="form-group flex-grow-1">
                        <label >Quantité de reception</label>
                        <input type="text"  class="form-control @error("addCommande.quantiteReception") is-invalid 
                        @enderror" wire:model="addCommande.quantiteReception" placeholder="Nature"> 
                        @error("addCommande.quantiteReception")
                          <span class="text-danger">{{$message}}</span>
                       @enderror             
                     </div>
                    </div>
                    <div class="form-group">
                        <label >Date de reception</label>
                        <input type="date"  class="form-control  @error("addCommande.dateReception") is-invalid 
                        @enderror" wire:model="addCommande.dateReception" placeholder="Resultat">
                        @error("addCommande.dateReception")
                        <span class="text-danger">{{$message}}</span>
                        @enderror   
                    </div>
                    <div class="form-group">
                        <label >Caracteristique</label>
                        <select class="form-control @error("addCommande.observation") is-invalid 
                        @enderror" wire:model="addCommande.observation">
                        @error("addCommande.observation")
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
                        <input type="text"  class="form-control  @error("addCommande.caracteristique") is-invalid 
                        @enderror" wire:model="addCommande.caracteristique" placeholder="Resultat">
                        @error("addCommande.caracteristique")
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