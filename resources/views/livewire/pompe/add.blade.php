
<!-- xl ou lg modal-->

  <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Gestion des caracteristique de "stephan" </h5>
      </div>
      <div class="modal-body">
          <div class="d-flex my-4 bg-gray-light p-3">
              <div class="d-flex flex-grow-1 mr-2">
                  <div class="flex-grow-1 mr-2">
                      <input type="text" placeholder="Debit Nominal"  wire:model="newPropModel.nom" class="form-control @error("newPropModel.nom") is-invalid @enderror">
                      @error("newPropModel.nom")
                          <span class="text-danger">{{$message}}</span>
                      @enderror
                  </div>
                  <div class="flex-grow-1 mr-2">
                      <input type="text" placeholder="Hateur Manometrique"  wire:model="newPropModel.nom" class="form-control @error("newPropModel.nom") is-invalid @enderror">
                      @error("newPropModel.nom")
                          <span class="text-danger">{{$message}}</span>
                      @enderror
                  </div>
                  <div class="flex-grow-1 mr-2">
                      <input type="text" placeholder="Corps de Pompe"  wire:model="newPropModel.nom" class="form-control @error("newPropModel.nom") is-invalid @enderror">
                      @error("newPropModel.nom")
                          <span class="text-danger">{{$message}}</span>
                      @enderror
                  </div>
                  <div class="flex-grow-1 mr-2">
                      <input type="text" placeholder="Chemise d'arbre"  wire:model="newPropModel.nom" class="form-control @error("newPropModel.nom") is-invalid @enderror">
                      @error("newPropModel.nom")
                          <span class="text-danger">{{$message}}</span>
                      @enderror
                  </div>
              </div>
              <div>
              <button class="btn btn-success" wire:click="addProp()">Ajouter</button>
              </div>
              </div>
              <table class="table table-bordered">
            <thead class="bg-primary">
              <th>Debit nominal</th>
              <th>Hauteur manometrique</th>
              <th>Corps de pompe</th>
              <th>Chemise d'arbre</th>
              <th class="text-center">Action</th>
                  </thead>
                  <tbody>
  @forelse($pompes as $pompe) 
          <tr>
              <td>{{$pompe->debitNominal}}</td>
              <td>{{$pompe->hauteurManometrique}}</td>
              <td>{{$pompe->corpsDePompe}}</td>
              <td>{{$pompe->chemiseArbre}}</td>
              <td class="text-center">
                <button class="btn btn-warning"> <i class="far fa-edit"></i> </button>  
                <button class="btn btn-danger"> <i class="far fa-trash-alt"></i> </button>     
              </td>
          </tr>
      @empty
          <tr>
              <td colspan="3">
                  <span class="text-info">Vous n'avez pas encore des moteurs dfinies</span>
              </td>
          </tr>
    @endforelse

    </tbody>
  </table>


      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal" >Fermer</button>
      </div>
   </div>
 </div>
  
