<div class="content pt-2" style="min-height: 2646.44px;">
<section class="content">
<div class="card card-solid">
<div class="card-body pb-0">
<div class="row">
@foreach ($intervenants as $intervenant)
<div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
<div class="card bg-light d-flex flex-fill">
<div class="card-header text-muted border-bottom-0" style="color:blue;">
Date d'embauche : {{date('d-m-Y',strtotime($intervenant->dateEmbauche))}}
</div>
<div class="card-body pt-0">
<div class="row">
<div class="col-7">
<h4 class="lead"><b>{{$intervenant->nom}} {{$intervenant->prenom}}</b></h4>
<p class="text-muted text-avg"><b>Service: </b>{{$intervenant->service}}</p>
<ul class="ml-4 mb-0 fa-ul text-muted">
<li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span><b> Matricule :</b>  {{$intervenant->matricule}} </li>
<li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> <b>Phone #:</b>{{$intervenant->telephone}}</li>
<li class="small"><span class="fa-li"><i class="fas fa-lg fa-mars"></i></span> <b>Sexe :</b>{{$intervenant->sexe}}</li>
</ul>
</div>
<div class="col-5 text-center">
<img src="{{asset($intervenant->photo)}}" width="120" alt="user-avatar" class="img-circle img-fluid" style="height:120px;border: 5px groove #38E884;">
</div>
</div>
</div>

<div class="card-footer">
<div class="text-right">
<a href="#" class="btn btn-sm bg-teal" wire:click.prevent="cacheCard()">
<i class="fa fa-arrow-left"> Retour</i>
</a>

</div>
</div>
</div>
</div>
@endforeach
</div>
</div>

<div class="card-footer">
<nav aria-label="Contacts Page Navigation">
<ul class="pagination justify-content-center m-0">
{{ $intervenants->links() }}
</ul>
</nav>
</div>

</div>
</section>
</div>