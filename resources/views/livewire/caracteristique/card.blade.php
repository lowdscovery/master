<div class="container-fluid px-4">
<h1 class="mt-4">Dashboard</h1>
<ol class="breadcrumb mb-4">
<li class="breadcrumb-item active"> </li>
 </ol>
  <div class="row">

    <div class="col-xl-3 col-md-6">
      <div class="card bg-primary text-white mb-4">
        <div class="card-body">District</div>
          <div class="card-footer d-flex align-items-center justify-content-between">
          @if ($card)
            <select class="form-control" wire:model="selectedDistrict">
            <option value="">---------</option>
            @foreach ($districts as $district)
                <option value="{{$district->id}}">{{$district->nom}}</option>
            @endforeach                          
            </select>
          @else
          <a class="small text-white stretched-link" href="" wire:click.prevent="card()">Stephan</a>
          <div class="small text-white"> <i class="fas fa-angle-right"> </i> </div>
        @endif
		  
        </div>
      </div>
    </div>

	<div class="col-xl-3 col-md-6">
      <div class="card bg-info text-white mb-4">
        <div class="card-body">Site</div>
          <div class="card-footer d-flex align-items-center justify-content-between">

            @if (count($sites) > 0)          
                <select class="form-control" wire:model="selectedSite">
                 <option value="">---------</option>
                    @foreach ($sites as $site)
                        <option value="{{$site->id}}">{{$site->nom}}</option>
                    @endforeach                          
                </select>
            @else
            <a class="small text-white stretched-link" href="" wire:click.prevent="card()">Stephan</a>
            <div class="small text-white"> <i class="fas fa-angle-right"> </i> </div>
        @endif
		  
        </div>
      </div>
    </div>

    <div class="col-xl-3 col-md-6">
      <div class="card bg-success text-white mb-4">
        <div class="card-body">Ressource</div>
          <div class="card-footer d-flex align-items-center justify-content-between">
		 
          @if (count($ressources) > 0)          
                <select class="form-control" wire:model="selectedressource">
                 <option value="">---------</option>
                    @foreach ($ressources as $ressource)
                        <option value="{{$ressource->id}}">{{$ressource->nom}}</option>
                    @endforeach                          
                </select>
            @else
            <a class="small text-white stretched-link" href="" wire:click.prevent="card()">Stephan</a>
            <div class="small text-white"> <i class="fas fa-angle-right"> </i> </div>
        @endif

        </div>
      </div>
    </div>

    <div class="col-xl-3 col-md-6">
      <div class="card bg-warning text-white mb-4">
        <div class="card-body">Forage</div>
          <div class="card-footer d-flex align-items-center justify-content-between">
		  
          @if (count($forages) > 0)          
                <select class="form-control" wire:model="selectedForage">
                 <option value="">---------</option>
                    @foreach ($forages as $forage)
                        <option value="{{$forage->id}}">{{$forage->nom}}</option>
                    @endforeach                          
                </select>
            @else
            <a class="small text-white stretched-link" href="" wire:click.prevent="card()">Stephan</a>
            <div class="small text-white"> <i class="fas fa-angle-right"> </i> </div>
        @endif

        </div>
      </div>
    </div>

  </div>
</div>
<div>
