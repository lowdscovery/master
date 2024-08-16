<div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
<section class="content">
<div class="card card-solid">
<div class="card-body pb-0">
<div class="row">
<div class="col-12 d-flex align-items-stretch flex-column">
<div class="card bg-light d-flex flex-fill">
<div class="card-header text-muted border-bottom-0" style="color:blue;">
Date d'embauche : {{date('d-m-y',strtotime(optional($selectedId)->dateEmbauche))}}
</div>
<div class="card-body pt-0">
<div class="row">
<div class="col-7">
<h4 class="lead"><b>{{optional($selectedId)->nom}} {{optional($selectedId)->prenom}}</b></h4>
<p class="text-muted text-avg"><b>Service: </b>{{optional($selectedId)->service}}</p>
<ul class="ml-4 mb-0 fa-ul text-muted">
<li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span><b> Matricule :</b>  {{optional($selectedId)->matricule}} </li>
<li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> <b>Phone #:</b>{{optional($selectedId)->telephone}}</li>
<li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> <b>Sexe :</b>{{optional($selectedId)->sexe}}</li>
</ul>
</div>
<div class="col-5 text-center">
<img src="{{asset(optional($selectedId)->photo)}}" width="120" alt="user-avatar" class="img-circle img-fluid" style="height:120px;border: 5px groove #38E884;">
</div>
</div>
</div>

</div>
</div>
</div>
</div>

</div>
</section>


    </div>
  </div>

    






