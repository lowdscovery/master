<div class="row p-2 pt-3">
    <div class="col-md-5">
       
        <div class="card card-primary">
            <div class="card-header">
            <h3 class="card-title"><i class="fas fa-user-plus fa-2x"></i> Formulaire d'edition intervenants</h3>
            </div>
            
            <form wire:submit.prevent="AjoutIntervenant">
            <div class="card-body">               
                    <div class="form-group">
                        <label >Nom</label>
                        <input type="text"  class="form-control @error("editIntervenant.nom") is-invalid @enderror" wire:model="editIntervenant.nom" required="required"> 
                      @error("editIntervenant.nom")
                          <span class="text-danger">{{$message}}</span>
                      @enderror   
                    </div>
                    <div class="form-group">
                        <label >Prenom</label>
                        <input type="text"  class="form-control @error("editIntervenant.prenom") is-invalid @enderror" wire:model="editIntervenant.prenom" required="required">
                        @error("editIntervenant.prenom")
                          <span class="text-danger">{{$message}}</span>
                      @enderror    
                    </div>
                
                 <div class="d-flex">
                    <div class="form-group flex-grow-1 mr-2">
                        <label >Service</label>
                        <input type="text"  class="form-control @error("editIntervenant.service") is-invalid @enderror" wire:model="editIntervenant.service" required="required">
                        @error("editIntervenant.service")
                          <span class="text-danger">{{$message}}</span>
                      @enderror 
                    </div>
                    <div class="form-group flex-grow-1">
                        <label >Matricule</label>
                        <input type="text"  class="form-control @error("editIntervenant.matricule") is-invalid @enderror" wire:model="editIntervenant.matricule" required="required">
                        @error("editIntervenant.matricule")
                          <span class="text-danger">{{$message}}</span>
                      @enderror                
                    </div>
                </div>

                <div class="form-group">
                <label >Sexe</label>
                <select class="form-control @error("editIntervenant.sexe") is-invalid @enderror" wire:model="editIntervenant.sexe" required="required">
                @error("editIntervenant.sexe")
                          <span class="text-danger">{{$message}}</span>
                 @enderror 
                    <option value="">---------</option>
                    <option value="HOMME">Homme</option>
                    <option value="FEMME">Femme</option>
                </select>
                </div>

            <div class="d-flex">
                <div class="form-group flex-grow-1 mr-2">
                        <label >Telephone </label>
                        <input type="text" class="form-control @error("editIntervenant.telephone") is-invalid @enderror" wire:model="editIntervenant.telephone" required="required">
                        @error("editIntervenant.telephone")
                          <span class="text-danger">{{$message}}</span>
                      @enderror 
                       
                </div>

                <div class="form-group flex-grow-1">
                        <label >Date d'embauche</label>
                        <input type="date" class="form-control @error("editIntervenant.dateEmbauche") is-invalid @enderror" wire:model="editIntervenant.dateEmbauche" required="required">
                      @error("editIntervenant.dateEmbauche")
                          <span class="text-danger">{{$message}}</span>
                      @enderror                 
                </div>
            </div>
            <div class="form-group flex-grow-1">
               <input type="file" wire:model="image" id="image{{$resetValueInput}}" wire:loading.attr="disabled" required="required">                   
            </div>
             <div style="border: 1px solid #d0d1d3; border-radius: 20px; height: 200px; width:200px; overflow:hidden;">
            @if ($image)

                <img src="{{ $image->temporaryUrl() }}" style="height:200px; width:200px;">
            @endif
    </div>
             </div>
            <!-- /.card-body -->

            <div class="card-footer">
            <div wire:loading.delay wire:target="AjoutIntervenant">
                   <span class="text-green">Sending...</span>
            </div>
                <button type="submit" class="btn btn-primary" wire:loading.attr="disabled">Enregistrer</button>
            </div>
            </form>
        </div>
        
    </div>


   
    </div>
    </div>
    </div>