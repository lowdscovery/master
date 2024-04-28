
  <!-- xl ou lg modal-->

        <div class="modal-header">
            <h5 class="modal-title">Gestion des caracteristique "{{optional($selectedMoteur)->moteurs}}" </h5>
      </div>
      <div class="modal-body">
          <div class="d-flex my-4 bg-gray-light p-2">
              <div class="d-flex flex-grow-1 mr-2">
                 <div class="col">
                    <input type="text" wire:model="addDoseuse.pressionMaxAspiration" class="form-control @error("addDoseuse.pressionMaxAspiration") is-invalid @enderror" placeholder="Pression Max Aspiration">
                    @error("addDoseuse.pressionMaxAspiration")
                          <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                  <div class="col">
                    <input type="text" wire:model="addDoseuse.pressionMaxRefoulement" class="form-control @error("addDoseuse.pressionMaxRefoulement") is-invalid @enderror" placeholder="Pression Max Refoulement">
                    @error("addDoseuse.pressionMaxRefoulement")
                          <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                  
                  <div class="col">
                    <input type="text" wire:model="addDoseuse.hauteurAspirationMax" class="form-control  @error("addDoseuse.hauteurAspirationMax") is-invalid @enderror" placeholder="Hauteur Aspiration Max">
                    @error("addDoseuse.hauteurAspirationMax")
                          <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                  <div class="col">
                    <input type="text" wire:model="addDoseuse.cadence" class="form-control  @error("addDoseuse.cadence") is-invalid @enderror" placeholder="Cadence">
                    @error("addDoseuse.cadence")
                          <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <div class="col">
                    <input type="text" wire:model="addDoseuse.rapportReduction" class="form-control  @error("addDoseuse.rapportReduction") is-invalid @enderror" placeholder="Rapport Reduction">
                    @error("addDoseuse.rapportReduction")
                          <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

              </div>
              </div>

               <div class="d-flex my-4 bg-gray-light p-2">
              <div class="d-flex flex-grow-1 mr-2">
                 <div class="col">
                    <input type="text" wire:model="addDoseuse.course" class="form-control  @error("addDoseuse.course") is-invalid @enderror" placeholder="Course">
                    @error("addDoseuse.course")
                          <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                  <div class="col">
                    <input type="text" wire:model="addDoseuse.ballonAmortisseur" class="form-control  @error("addDoseuse.ballonAmortisseur") is-invalid @enderror" placeholder="Ballon Amortisseur">
                    @error("addDoseuse.ballonAmortisseur")
                          <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                  
                  <div class="col">
                    <input type="text" wire:model="addDoseuse.ballonAmortisseurRefoulement" class="form-control  @error("addDoseuse.ballonAmortisseurRefoulement") is-invalid @enderror" placeholder="Ballon Amortisseur R">
                    @error("addDoseuse.ballonAmortisseurRefoulement")
                          <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                  <div class="col">
                    <input type="text" wire:model="addDoseuse.corpsDoseur" class="form-control  @error("addDoseuse.corpsDoseur") is-invalid @enderror" placeholder="Corps Doseur">
                    @error("addDoseuse.corpsDoseur")
                          <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <div class="col">
                    <input type="text" wire:model="addDoseuse.membrane"class="form-control  @error("addDoseuse.membrane") is-invalid @enderror" placeholder="Membrane">
                    @error("addDoseuse.membrane")
                          <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

              </div>
              </div>
         

              <div class="d-flex my-4 bg-gray-light p-2">
              <div class="d-flex flex-grow-1 mr-2">
                  
                  <div class="col">
                    <input type="text" wire:model="addDoseuse.arbre" class="form-control  @error("addDoseuse.arbre") is-invalid @enderror" placeholder="Arbre">
                    @error("addDoseuse.arbre")
                          <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                 <div class="col">
                    <input type="text" wire:model="addDoseuse.calpetAspiration" class="form-control  @error("addDoseuse.calpetAspiration") is-invalid @enderror" placeholder="Clapet Aspiration">
                    @error("addDoseuse.calpetAspiration")
                          <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <div class="col">
                    <input type="text" wire:model="addDoseuse.calpetRefoulement" class="form-control  @error("addDoseuse.calpetRefoulement") is-invalid @enderror" placeholder="Clapet Refoulement">
                    @error("addDoseuse.calpetRefoulement")
                          <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                 <div class="col">
                    <input type="text" wire:model="addDoseuse.tarage" class="form-control  @error("addDoseuse.tarage") is-invalid @enderror" placeholder="Tarage">
                    @error("addDoseuse.tarage")
                          <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <div class="col">
                    <input type="text" wire:model="addDoseuse.debitMax" class="form-control  @error("addDoseuse.debitMax") is-invalid @enderror" placeholder="Debit Max">
                    @error("addDoseuse.debitMax")
                          <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

              </div>
              
              </div>
                           
              <div class="p-2">
              <button class="btn btn-success" wire:click="addDoseuses()">Ajouter</button>
               </div> 
              

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
      </div>

  

