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
                        @enderror" wire:model="addCommande.dateCommande" >  
                        @error("addCommande.dateCommande")
                          <span class="text-danger">{{$message}}</span>
                       @enderror
                    </div>
                    <div class="d-flex">
                     <div class="form-group flex-grow-1 mr-2">
                        <label >Motif</label>
                        <input type="text"  class="form-control @error("addCommande.motif") is-invalid 
                        @enderror" wire:model="addCommande.motif" placeholder="Motif">
                         @error("addCommande.motif")
                          <span class="text-danger">{{$message}}</span>
                       @enderror
                     </div>
                     <div class="form-group flex-grow-1">
                        <label >Article</label>
                        <input type="text"  class="form-control @error("addCommande.article") is-invalid 
                        @enderror" wire:model="addCommande.article" placeholder="Article"> 
                        @error("addCommande.article")
                          <span class="text-danger">{{$message}}</span>
                       @enderror             
                     </div>
                    </div>
                    <div class="d-flex">
                     <div class="form-group flex-grow-1 mr-2">
                        <label >Reference</label>
                        <input type="text"  class="form-control @error("addCommande.reference") is-invalid 
                        @enderror" wire:model="addCommande.reference" placeholder="Reference">
                         @error("addCommande.reference")
                          <span class="text-danger">{{$message}}</span>
                       @enderror
                     </div>
                     <div class="form-group flex-grow-1">
                        <label >Quantité de commande</label>
                        <input type="text"  class="form-control @error("addCommande.quantiteCommande") is-invalid 
                        @enderror" wire:model="addCommande.quantiteCommande" placeholder="Quantité de commande"> 
                        @error("addCommande.quantiteCommande")
                          <span class="text-danger">{{$message}}</span>
                       @enderror             
                     </div>
                    </div>

                   <div class="form-group flex-grow-1">
                        <label >Numero DA</label>
                        <input type="text"  class="form-control @error("addCommande.numeroDA") is-invalid 
                        @enderror" wire:model="addCommande.numeroDA" placeholder="Numero DA"> 
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
                        @enderror" wire:model="addCommande.quantiteReception" placeholder="Quantité reception"> 
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
                        <select class="form-control @error("addCommande.caracteristique") is-invalid 
                        @enderror" wire:model="addCommande.caracteristique">
                        @error("addCommande.caracteristique")
                        <span class="text-danger">{{$message}}</span>
                        @enderror              
                        <option value="">---------</option>
                        @foreach ($caracteristiques as $caracteristique)
                          <option value="{{$caracteristique->id}}">{{$caracteristique->ressources->nom}}</option>
                        @endforeach             
                        </select>
                    </div>
                    <div class="form-group">
                        <label >Observation</label>
                        <input type="text"  class="form-control  @error("addCommande.observation") is-invalid 
                        @enderror" wire:model="addCommande.observation" placeholder="Observation">
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