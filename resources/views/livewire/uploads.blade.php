<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>





<div>
    <div class="container" style="padding-top: 60px;">
        <div class="row">
           <div class="col-md-6 offset-md-3">

           @if (session()->has('message'))
                <div class="alert alert-success"> 
                  {{session('message')}}
                </div>
           @endif
               <div class="card">
                  <div class="card-header">
                      <h3>File Upload</h3>
                </div>
                <div class="card-body">
                    <form wire:submit.prevent="fileUpload" id="form-upload" enctype="multipart/form-data">
                      <div class="form-group">
                      <label for="title">Title</label>
                      <input type="text" name="title" class="form-control" wire:model="title">
                      @error('title')<span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                      <label for="filename">File</label>
                      <input type="file" name="filename"  class="form-control" wire:model="filename">
                      @error('filename')<span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div>
                    <div wire:loading.delay wire:target="fileUpload">
                   <span class="text-green">Sending...</span>
                   </div>
                    <button type="submit" class="btn btn-success float-right" wire:loading.attr="disabled">Upload</button>
                    </div>
                    </form>
                </div>
              </div>
       </div>
     </div>
   </div>
</div>








    <div class="col-7">
        <div class="card">
            <div class="card-header bg-gradient-primary d-flex align-items-center">
                <h3 class="card-title flex-grow-1"><i class="fa fa-list fa-2x"></i> Tarification -</h3>

                <div class="card-tools d-flex align-items-center ">
                    <a href="" class="btn btn-link text-white mr-4 d-block"><i class="fas fa-long-arrow-alt-left"></i> Retourner
                        vers la liste des articles</a>

                    <a class="btn btn-link btn-db text-white mr-4 d-block" wire:click="nouveauTarif"><i
                            class="fas fa-user-plus"></i> Nouveau tarif</a>

                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0 table-striped">
             
                <div class="p-4">
                    <div>
                        <div class="form-group">
                            <select wire:model="newTarif.duree_location_id"
                                class="form-control @error('newTarif.duree_location_id')is-invalid @enderror">
                                <option value="" selected>Choisissez une durée de location</option>
                               
                                    <option value=""> </option>
                               
                            </select>
                            @error('newTarif.duree_location_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="number" class="form-control @error('newTarif.prix') is-invalid @enderror"
                               >
                            @error('newTarif.prix')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div>
                        <button class="btn btn-link" wire:click="saveTarif"> <i class="fa fa-check"></i>
                            Valider</button>
                        <button class="btn btn-link" wire:click="cancel"> <i
                                class="far fa-trash-alt"></i> Annuler</button>
                    </div>
                </div>
              
                <div style="height:350px;">
                    <table class="table table-head-fixed">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Durée location</th>
                                <th class="text-center">Prix</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                       
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td class="text-center"></td>
                                    <td class="text-center">
                                        <button wire:click="" class="btn btn-link"> <i class="far fa-edit"></i> </button>
                                    </td>
                                </tr>
                           

                                <tr>
                                    <td colspan="4">
                                        <div class="alert alert-info">

                                            <h5><i class="icon fas fa-ban"></i> Information!</h5>
                                            Cet article ne dispose pas encore de tarifs.
                                        </div>
                                    </td>
                                </tr>
                           
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
        <!-- /.card -->
    </div>

