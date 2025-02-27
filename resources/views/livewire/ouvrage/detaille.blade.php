<div class="row">

<div class="modal fade" id="addModal"tabindex="-1" role="dialog" aria-hidden="true" wire:ignore.self>
<div class="modal-dialog  modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
           <form>
          @if ($cachebutton)  
            @if ($selectedDocument)
            <iframe src="{{ asset($selectedDocument->filePdf)}}" width="100%" height="600px"></iframe>
            @endif
        @endif
   </form>
    </div>
  </div>
</div> 
</div>
@foreach($ouvrages as $ouvrage)
<div class="col-md-4 pt-2">
<div class="card card-widget">
<div class="card-header">
<div class="user-block">
<img class="img-circle" src="{{ asset($ouvrage->photo) }}" alt="User Image">
<span class="username"><a href="#" wire:click="unique({{$ouvrage->id}})">{{$ouvrage->type}}</a> {{$ouvrage->ressource->nom}}</span>
<span class="description">Ajout - {{$ouvrage->created_at->diffForHumans()}}
<button class="btn btn-link" wire:click="selectDocument({{$ouvrage->id}})" data-toggle="modal" data-target="#addModal"> <i class="fa fa-file-pdf" style="color:#96BC00;font-size:18px;"></i></button>
</span> 

</div>

<div class="card-tools">
<button type="button" class="btn btn-tool" data-card-widget="collapse">
<i class="fas fa-minus"></i>
</button>
<button type="button" class="btn btn-tool" wire:click="showDetaille">
<i class="fas fa-times"></i>
</button>
</div>

</div>

<div class="card-body" style="display: block;">
<img class="img-fluid pad" src="{{ asset($ouvrage->photo) }}" alt="Photo" style="width:400px; height:225px;">
</div>

<div class="card-footer">

<span class="username">
<span style="font-weight: bold;">Annee</span> : {{$ouvrage->annee}}, <span style="font-weight: bold;">Debit Nominal </span>: {{$ouvrage->debitNominale}} m3/h <br>
</span>
<span style="font-weight: bold;">Profondeur</span> : {{$ouvrage->profondeur}} m, <span style="font-weight: bold;">Debit conseiller</span> : {{$ouvrage->debitConseiller}} m3/h<br>
<span style="font-weight: bold;">Debit Exploite</span> : {{$ouvrage->debitExploite}} m3/h, <span style="font-weight: bold;">Nombre Exhaur</span> : {{$ouvrage->nombreExhaur}} U<br>
<span style="font-weight: bold;">Diametre</span> : {{$ouvrage->diametre}} mm, <span style="font-weight: bold;">Sonde Bas</span> : {{$ouvrage->sondeBas}} m, <span style="font-weight: bold;">Sonde Haut</span> : {{$ouvrage->sondeHaut}} m

</div>
</div>
</div>
@endforeach
</div>
