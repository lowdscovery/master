
<div class="container-fluid px-4">
<h1 class="mt-4">Dashboard</h1>
<ol class="breadcrumb mb-4">
<li class="breadcrumb-item active"> </li>
 </ol>
  <div class="row">

    <div class="col-xl-3 col-md-6">
      <div class="card bg-primary text-white mb-4">
        <div class="card-body">Georges</div>
          <div class="card-footer d-flex align-items-center justify-content-between">
		  <select class="form-control">
				<option value="Stephan">Stephan</option>
				<option value="Stephan">Georges</option>                         
		</select>
        </div>
      </div>
    </div>

	<div class="col-xl-3 col-md-6">
      <div class="card bg-info text-white mb-4">
        <div class="card-body">Georges</div>
          <div class="card-footer d-flex align-items-center justify-content-between">
		  <a class="small text-white stretched-link" href="#">Stephan</a>
            <div class="small text-white"> <i class="fas fa-angle-right"> </i> </div>
        </div>
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




         