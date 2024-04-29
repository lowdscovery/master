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




