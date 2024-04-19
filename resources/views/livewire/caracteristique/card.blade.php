 
<div class="container-fluid px-4">
<h1 class="mt-4" style="font-family: montserrat; color:#A69DE2;">Gestion de la production eau de la jirama</h1>
<form role="form" wire:submit.prevent="addCaract()">
<ol class="breadcrumb mb-4">
<li class="breadcrumb-item active"> Home</li>
 @if (count($forages) > 0) 
<li class="breadcrumb-item active"> <button type="submit" class="btn btn-primary" >Enregistrer</button></li>
 @endif
 </ol>
  <div class="row">

    <div class="col-xl-3 col-md-6">
      <div class="card bg-primary text-white mb-4">
        <div class="card-body">Districts</div>
          <div class="card-footer d-flex align-items-center justify-content-between">
          @if ($card)
            <select class="form-control" wire:model="selectedDistrict.district_id" required="required">
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
        <div class="card-body">Sites</div>
          <div class="card-footer d-flex align-items-center justify-content-between">

            @if (count($sites) > 0)          
                <select class="form-control" wire:model="selectedSite.site_id" required="required">
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
        <div class="card-body">Ressources</div>
          <div class="card-footer d-flex align-items-center justify-content-between">
		 
          @if (count($ressources) > 0)          
                <select class="form-control" wire:model="selectedressource.ressource_id" required="required">
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
                <select class="form-control" wire:model="selectedForage.forage_id" required="required">
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
 </form>
<div>

