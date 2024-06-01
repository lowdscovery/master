
  <!-- xl ou lg modal-->

        <div class="modal-header">
            <h5 class="modal-title">Caracteristique des <strong>POMPE DOSEUSES</strong> </h5>
      </div>
      <div class="modal-body">
      @if ($inputDoseuse)
       <div class="d-flex my-4 bg-gray-light p-2">
              <div class="d-flex flex-grow-1 mr-2">
                 <div class="col">
                    <input type="text" wire:model="addDoseuse.marque" class="form-control @error("addDoseuse.marque") is-invalid @enderror" placeholder="Marque" title="marque">
                    @error("addDoseuse.marque")
                          <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                  <div class="col">
                    <input type="text" wire:model="addDoseuse.type" class="form-control @error("addDoseuse.type") is-invalid @enderror" placeholder="Type" title="type">
                    @error("addDoseuse.type")
                          <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                  
                  <div class="col">
                    <input type="text" wire:model="addDoseuse.numeroSerie" class="form-control  @error("addDoseuse.numeroSerie") is-invalid @enderror" placeholder="Numero de serie" title="numero de serie">
                    @error("addDoseuse.numeroSerie")
                          <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                  <div class="col">
                    <input type="text" wire:model="addDoseuse.numeroFabrication" class="form-control  @error("addDoseuse.numeroFabrication") is-invalid @enderror" placeholder="Numero de fabrication" title="numero de fabrication">
                    @error("addDoseuse.numeroFabrication")
                          <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <div class="col">
                    <input type="text" wire:model="addDoseuse.vitesse" class="form-control  @error("addDoseuse.vitesse") is-invalid @enderror" placeholder="Vitesse" title="vitesse">
                    @error("addDoseuse.vitesse")
                          <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

              </div>
              </div>

              <div class="d-flex my-4 bg-gray-light p-2">
              <div class="d-flex flex-grow-1 mr-2">
                 <div class="col">
                    <input type="text" wire:model="addDoseuse.encombrement" class="form-control @error("addDoseuse.encombrement") is-invalid @enderror" placeholder="Encombrement" title="encombrement">
                    @error("addDoseuse.encombrement")
                          <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                  <div class="col">
                    <input type="date" wire:model="addDoseuse.anneeFabrication" class="form-control @error("addDoseuse.anneeFabrication") is-invalid @enderror" title="année de fabrication">
                    @error("addDoseuse.anneeFabrication")
                          <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                  
                  <div class="col">
                    <input type="text" wire:model="addDoseuse.fournisseur" class="form-control  @error("addDoseuse.fournisseur") is-invalid @enderror" placeholder="Fournisseur" title="fournisseur">
                    @error("addDoseuse.fournisseur")
                          <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                  <div class="col">
                    <input type="date" wire:model="addDoseuse.dateAcquisition" class="form-control  @error("addDoseuse.dateAcquisition") is-invalid @enderror" title="date d'acquisition">
                    @error("addDoseuse.dateAcquisition")
                          <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <div class="col">
                    <input type="date" wire:model="addDoseuse.dateMiseEnService" class="form-control  @error("addDoseuse.dateMiseEnService") is-invalid @enderror" placeholder="Rapport Reduction" title="date mise en service">
                    @error("addDoseuse.dateMiseEnService")
                          <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

              </div>
              </div>

              <div class="d-flex my-4 bg-gray-light p-2">
              <div class="d-flex flex-grow-1 mr-2">
                 <div class="col">
               <select class="form-control @error("addDoseuse.roulement") is-invalid @enderror" wire:model="addDoseuse.roulement" required="required" title="roulement">
                @error("addDoseuse.roulement")
                          <span class="text-danger">{{$message}}</span>
                 @enderror 
                    <option value="">--------------------------</option>
                    <option value="CA">CA</option>
                    <option value="COA">COA</option>
                </select>
                </div>

                  <div class="col">
                    <input type="text" wire:model="addDoseuse.misesEnServices" class="form-control @error("addDoseuse.misesEnServices") is-invalid @enderror" placeholder="Mise en service" title="mise en services">
                    @error("addDoseuse.misesEnServices")
                          <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                  
                  <div class="col">
                    <input type="text" wire:model="addDoseuse.observations" class="form-control  @error("addDoseuse.observations") is-invalid @enderror" placeholder="Observations" title="observations">
                    @error("addDoseuse.observations")
                          <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
              </div>
              </div>
          <div class="d-flex my-4 bg-gray-light p-2">
              <div class="d-flex flex-grow-1 mr-2">
                 <div class="col">
                    <input type="number" wire:model="addDoseuse.pressionMaxAspiration" class="form-control @error("addDoseuse.pressionMaxAspiration") is-invalid @enderror" placeholder="Pression Max Aspiration" title="pression max Aspiration">
                    @error("addDoseuse.pressionMaxAspiration")
                          <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                  <div class="col">
                    <input type="number" wire:model="addDoseuse.pressionMaxRefoulement" class="form-control @error("addDoseuse.pressionMaxRefoulement") is-invalid @enderror" placeholder="Pression Max Refoulement" title="pression max refoulement">
                    @error("addDoseuse.pressionMaxRefoulement")
                          <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                  
                  <div class="col">
                    <input type="number" wire:model="addDoseuse.hauteurAspirationMax" class="form-control  @error("addDoseuse.hauteurAspirationMax") is-invalid @enderror" placeholder="Hauteur Aspiration Max" title="hauteur aspiration max">
                    @error("addDoseuse.hauteurAspirationMax")
                          <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                  <div class="col">
                    <input type="number" wire:model="addDoseuse.cadence" class="form-control  @error("addDoseuse.cadence") is-invalid @enderror" placeholder="Cadence" title="cadence">
                    @error("addDoseuse.cadence")
                          <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <div class="col">
                    <input type="text" wire:model="addDoseuse.rapportReduction" class="form-control  @error("addDoseuse.rapportReduction") is-invalid @enderror" placeholder="Rapport Reduction" title="rapport reduction">
                    @error("addDoseuse.rapportReduction")
                          <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

              </div>
              </div>

               <div class="d-flex my-4 bg-gray-light p-2">
              <div class="d-flex flex-grow-1 mr-2">
                 <div class="col">
                    <input type="number" wire:model="addDoseuse.course" class="form-control  @error("addDoseuse.course") is-invalid @enderror" placeholder="Course" title="course">
                    @error("addDoseuse.course")
                          <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                  <div class="col">
                    <input type="number" wire:model="addDoseuse.ballonAmortisseur" class="form-control  @error("addDoseuse.ballonAmortisseur") is-invalid @enderror" placeholder="Ballon Amortisseur" title="ballon amortisseur">
                    @error("addDoseuse.ballonAmortisseur")
                          <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                  
                  <div class="col">
                    <input type="number" wire:model="addDoseuse.ballonAmortisseurRefoulement" class="form-control  @error("addDoseuse.ballonAmortisseurRefoulement") is-invalid @enderror" placeholder="Ballon Amortisseur R" title="ballon amortisseur refoulement">
                    @error("addDoseuse.ballonAmortisseurRefoulement")
                          <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                  <div class="col">
                    <input type="text" wire:model="addDoseuse.corpsDoseur" class="form-control  @error("addDoseuse.corpsDoseur") is-invalid @enderror" placeholder="Corps Doseur" title="corps doseur">
                    @error("addDoseuse.corpsDoseur")
                          <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <div class="col">
                    <input type="text" wire:model="addDoseuse.membrane"class="form-control  @error("addDoseuse.membrane") is-invalid @enderror" placeholder="Membrane" title="membrane">
                    @error("addDoseuse.membrane")
                          <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

              </div>
              </div>
         

              <div class="d-flex my-4 bg-gray-light p-2">
              <div class="d-flex flex-grow-1 mr-2">
                  
                  <div class="col">
                    <input type="text" wire:model="addDoseuse.arbre" class="form-control  @error("addDoseuse.arbre") is-invalid @enderror" placeholder="Arbre" title="arbre">
                    @error("addDoseuse.arbre")
                          <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                 <div class="col">
                    <input type="text" wire:model="addDoseuse.calpetAspiration" class="form-control  @error("addDoseuse.calpetAspiration") is-invalid @enderror" placeholder="Clapet Aspiration" title="clapet Aspiration">
                    @error("addDoseuse.calpetAspiration")
                          <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <div class="col">
                    <input type="text" wire:model="addDoseuse.calpetRefoulement" class="form-control  @error("addDoseuse.calpetRefoulement") is-invalid @enderror" placeholder="Clapet Refoulement" title="clapet refoulemnt">
                    @error("addDoseuse.calpetRefoulement")
                          <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                 <div class="col">
                    <input type="number" wire:model="addDoseuse.tarage" class="form-control  @error("addDoseuse.tarage") is-invalid @enderror" placeholder="Tarage" title="tarage">
                    @error("addDoseuse.tarage")
                          <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <div class="col">
                    <input type="number" wire:model="addDoseuse.debitMax" class="form-control  @error("addDoseuse.debitMax") is-invalid @enderror" placeholder="Debit Max" title="debit max">
                    @error("addDoseuse.debitMax")
                          <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

              </div>
              
              </div>
                           
              <div class="p-2">
              <button class="btn btn-success" wire:click="addDoseuses()">Ajouter</button>
              <button type="button" class="btn btn-secondary" data-dismiss="modal" wire.click="">Close</button>
               </div> 
      @else
      <button class="btn btn-success" wire:click="shoInputDoseuse()">Ajout</button>
            <table class="table table-head-fixed">
                    <thead style="color: orange;">
                    <tr>
                    <th style="width:7%;">Puissance</th>
                    <th style="width:7%;">Tension</th>
                    <th style="width:10%;">Cosphi</th>
                    <th style="width:5%;">Intensite</th>
                    <th style="width:15%;">Cablage</th>
                    <th style="width:6%;">Indice</th>
                    <th style="width:15%;">Classe isolant</th>
                    <th style="width:15%;">Type demarrage</th>
                    <th class="text-center" style="width:20%;">Action</th>
                    </tr>
                    </thead>
             <tbody>
        @forelse  ($doseuses as $doseuse)
            <tr>
                <td style="width:7%;">{{$doseuse->pressionMaxAspiration}}</td>
                <td style="width:7%;">{{$doseuse->pressionMaxRefoulement}}</td>
                <td style="width:10%;">{{$doseuse->hauteurAspirationMax}}</td>
                <td style="width:5%;">{{$doseuse->cadence}}</td>
                <td style="width:15%;">{{$doseuse->rapportReduction}}</td>
                <td style="width:6%;">{{$doseuse->course}}</td>
                <td style="width:15%;">{{$doseuse->ballonAmortisseur}}</td>
                <td style="width:15%;">{{$doseuse->ballonAmortisseurRefoulement}}</td>
                <td class="text-center" style="width:20%;">
                    <button class="btn btn-link" wire:click="editDoseuse({{$doseuse->id}})"> <i class="far fa-edit"></i> </button>  
                    <button class="btn btn-link" wire:click="confirmDeleteDoseuese({{$doseuse->id}})"> <i class="far fa-trash-alt"></i> </button>     
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="9">
                <div class="alert alert-info">                  
                <h5><i class="icon fas fa-ban"></i> Information!</h5>
                Vous n'avez pas encore des données définies.
                </div>
                </td>
            </tr>
        @endforelse
  
          </tbody>
        </table>
      @endif
      
              

             
      </div>

  

