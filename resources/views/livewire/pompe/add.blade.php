<!-- xl ou lg modal-->

        <div class="modal-header">
            <h5 class="modal-title">Gestion des caracteristique "{{optional($selectedMoteur)->moteurs}}" </h5>
      </div>
      <div class="modal-body">
          <div class="d-flex my-4 bg-gray-light p-2">
              <div class="d-flex flex-grow-1 mr-2">
                  <div class="flex-grow-1 mr-2">
                      <input type="number" placeholder="Debit Nominal"  wire:model="addModal.debitNominal" class="form-control @error("addModal.debitNominal") is-invalid @enderror">
                      @error("addModal.debitNominal")
                          <span class="text-danger">{{$message}}</span>
                      @enderror
                  </div>
                  <div class="flex-grow-1 mr-2">
                      <input type="text" placeholder="Hateur Manometrique"  wire:model="addModal.hauteurManometrique" class="form-control @error("addModal.hauteurManometrique") is-invalid @enderror">
                      @error("addModal.hauteurManometrique")
                          <span class="text-danger">{{$message}}</span>
                      @enderror
                  </div>
                  <div class="flex-grow-1 mr-2">
                      <input type="text" placeholder="Corps de Pompe"  wire:model="addModal.corpsDePompe" class="form-control @error("addModal.corpsDePompe") is-invalid @enderror">
                      @error("addModal.corpsDePompe")
                          <span class="text-danger">{{$message}}</span>
                      @enderror
                  </div>
                  <div class="flex-grow-1 mr-2">
                      <input type="text" placeholder="Chemise d'arbre"  wire:model="addModal.chemiseArbre" class="form-control @error("addModal.chemiseArbre") is-invalid @enderror">
                      @error("addModal.chemiseArbre")
                          <span class="text-danger">{{$message}}</span>
                      @enderror
                  </div>
              </div>
              <div>
              <button class="btn btn-success" wire:click="editModalPompe()">Ajouter</button>
              </div>
              </div>
             <table class="table table-head-fixed">
                    <thead style="color: orange;">
                    <tr>
                    <th class="text-center" style="width:15%;">Debit</th>
                    <th class="text-center" style="width:25%;">Hauteur</th>
                    <th class="text-center" style="width:25%;">Corps</th>
                    <th class="text-center" style="width:15%;">Chemise</th>
                    <th class="text-center" style="width:20%;">Action</th>
                    </tr>
                    </thead>
             <tbody>
        @forelse($pompes as $pompe) 
                <tr>
                    <td class="text-center" style="width:15%;">{{$pompe->debitNominal}}</td>
                    <td class="text-center" style="width:25%;">{{$pompe->hauteurManometrique}}</td>
                    <td class="text-center" style="width:25%;">{{$pompe->corpsDePompe}}</td>
                    <td class="text-center" style="width:15%;">{{$pompe->chemiseArbre}}</td>
                    <td class="text-center" style="width:20%;">
                        <button class="btn btn-link" wire:click="editModal({{$pompe->id}})" data-toggle="modal" data-target="#addModal"> <i class="far fa-edit"></i> </button>  
                        <button class="btn btn-link" wire:click="confirmDeleteModal({{$pompe->id}})"> <i class="far fa-trash-alt"></i> </button>     
                    </td>
                </tr>
                @empty
                    <tr>
                        <td colspan="5">
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

  
