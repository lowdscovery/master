<div class="content-body" style="min-height: 836px;">

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
            @if ($selectedDocument)
            <iframe src="{{ asset($selectedDocument->filePdf)}}" width="100%" height="600px"></iframe>
            @endif
   </form>
    </div>
  </div>
</div> 
</div>

            <div class="container-fluid">             
                <div class="row">
				<a href="" class="btn btn-link text-blue" wire:click="goToList()" ><i class="fas fa-long-arrow-alt-left"></i> 
				Retourner vers la liste</a>
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header" style="background-color:#FF8700;font-size: 1.3em;font-family: montserrat;"> <strong> District : </strong>  {{optional($selectedId)->districts->nom}} 
							 <span class="float-right">
                                    <strong>Site :</strong> {{optional($selectedId)->sites->nom}}</span> </div>
                            <div class="card-body">
                                <div class="row mb-5">
                                    <div class="mt-1 col-xl-6 col-lg-6 col-md-6 col-sm-12">
									
                                    @foreach ($ouvrages as $ouvrage)
                                        @if (optional($selectedId)->ressource_id == $ouvrage->ressource_id)
                                        <div>
                                            <img class="img-fluid" style="height: 58vh;border-radius:10%;" src="{{asset($ouvrage->photo)}}" alt="">
                                        </div>
										
									<button class="btn btn-link" wire:click="selectDocument({{$ouvrage->id}})" data-toggle="modal" data-target="#addModal" style="color:#6021FF;font-size:20px;"> <i class="fa fa-file-pdf"> Caracteristique de forage</i></button>
                                        @endif
                                    @endforeach
                                    </div>
                                <div class="mt-1 col-xl-6 col-lg-6 col-md-6 col-sm-12">   
								<div class="card">
									<div class="card-header" style="background-color:#FFAD00;font-size: 1.3em;font-family: montserrat;">
										<h2 class="card-title">{{optional($selectedId)->forages->nom}} : {{optional($selectedId)->ressources->nom}}</h2>
									</div>
									<div class="card-body pb-0">
										<ul class="list-group list-group-flush">
										<li class="list-group-item d-flex px-0 justify-content-between">
												<strong>Debit nominale</strong>
												<span class="mb-0">{{$ouvrage->debitNominale}}</span>
											</li>
											<li class="list-group-item d-flex px-0 justify-content-between">
												<strong>Debit d'exploitation</strong>
												<span class="mb-0">{{$ouvrage->debitExploite}}</span>
											</li>
											<li class="list-group-item d-flex px-0 justify-content-between">
												<strong>Debit conseiller</strong>
												<span class="mb-0">{{$ouvrage->debitConseiller}}</span>
											</li>
											<li class="list-group-item d-flex px-0 justify-content-between">
												<strong>Type</strong>
												<span class="mb-0">{{$ouvrage->type}}</span>
											</li>
											<li class="list-group-item d-flex px-0 justify-content-between">
												<strong>Diametre</strong>
												<span class="mb-0">{{$ouvrage->diametre}}</span>
											</li>
											<li class="list-group-item d-flex px-0 justify-content-between">
												<strong>Nombre Exhaure</strong>
												<span class="mb-0">{{$ouvrage->nombreExhaur}}</span>
											</li>
											
										</ul>
									</div>
									<div class="card-footer pt-0 pb-0 text-center">
										<div class="row">
											<div class="col-3 pt-3 pb-3 border-right">
												<h3 class="mb-1 text-primary">{{$ouvrage->annee}}</h3>
												<span>Année</span>
											</div>
											<div class="col-3 pt-3 pb-3 border-right">
												<h3 class="mb-1 text-primary">{{$ouvrage->sondeBas}}</h3>
												<span>Sonde Bas</span>
											</div>
											<div class="col-3 pt-3 pb-3 border-right">
												<h3 class="mb-1 text-primary">{{$ouvrage->sondeHaut}}</h3>
												<span>Sonde Haut</span>
											</div>	
											<div class="col-3 pt-3 pb-3">
												<h3 class="mb-1 text-primary">{{$ouvrage->profondeur}}</h3>
												<span>Profondeur</span>
											</div>
										</div>			
									</div>
								</div>
                               </div>
 <div class="mt-4 col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                    @foreach ($pomp as $caracteristique)
                                        @if (optional($selectedId)->id == $caracteristique->caracteristique_moteur_id)
                                <div class="card">
									<div class="card-header" style="background-color:#FFAD00;font-size: 1.3em;font-family: montserrat;">
										<h2 class="card-title">POMPE</h2>
									</div>
								<div class="card-body pb-0">
										<ul class="list-group list-group-flush">
											<li class="list-group-item d-flex px-0 justify-content-between">
												<strong>Marque</strong>
												<span class="mb-0">{{$caracteristique->marque}}</span>
											</li>
											<li class="list-group-item d-flex px-0 justify-content-between">
												<strong>Type</strong>
												<span class="mb-0">{{$caracteristique->type}}</span>
											</li>
											<li class="list-group-item d-flex px-0 justify-content-between">
												<strong>Numero de serie</strong>
												<span class="mb-0">{{$caracteristique->numeroSerie}}</span>
											</li>
                                            <li class="list-group-item d-flex px-0 justify-content-between">
												<strong>Numero de fabrication</strong>
												<span class="mb-0">{{$caracteristique->numeroFabrication}}</span>
											</li>
											<li class="list-group-item d-flex px-0 justify-content-between">
												<strong>Vitesse</strong>
                                                 @if ($cardselect)
                                                @else
                                                   <button type="button" wire:click="cardtrue()" class="btn btn-success">Voir plus</button> 
                                                @endif
												<span class="mb-0">{{$caracteristique->vitesse}} <strong>tr/mn</strong></span>
											</li>
                                            @if  ($cardselect)
                                            <li class="list-group-item d-flex px-0 justify-content-between">
												<strong>Année de fabrication</strong>
												<span class="mb-0">{{date('d-m-Y',strtotime($caracteristique->anneeFabrication))}}</span>
											</li>
                                            <li class="list-group-item d-flex px-0 justify-content-between">
												<strong>Fournisseur</strong>
												<span class="mb-0">{{$caracteristique->fournisseur}}</span>
											</li>
                                            <li class="list-group-item d-flex px-0 justify-content-between">
												<strong>Date d'acquisition</strong>
												<span class="mb-0">{{date('d-m-Y',strtotime($caracteristique->dateAcquisition))}}</span>
											</li>
                                            <li class="list-group-item d-flex px-0 justify-content-between">
												<strong>Date mise en service</strong>
												<span class="mb-0">{{date('d-m-Y',strtotime($caracteristique->dateMiseEnService))}}</span>
											</li>
                                            <li class="list-group-item d-flex px-0 justify-content-between">
												<strong>Roulement</strong>
												<span class="mb-0">{{$caracteristique->roulement}}</span>
											</li>
                                            <li class="list-group-item d-flex px-0 justify-content-between">
												<strong>Mise en service</strong>
												<span class="mb-0">{{$caracteristique->misesEnServices}}</span>
											</li>
                                            <li class="list-group-item d-flex px-0 justify-content-between">
												<strong>Observation</strong>
												<span class="mb-0">{{$caracteristique->observations}}</span>
											</li>
                                            <li class="list-group-item d-flex px-0 justify-content-between">
												<strong>Debit Nominal</strong>
												<span class="mb-0">{{$caracteristique->debitNominal}} <strong>m3/h</strong></span>
											</li>
                                            <li class="list-group-item d-flex px-0 justify-content-between">
												<strong>Hauteur manometrique</strong>
												<span class="mb-0">{{$caracteristique->hauteurManometrique}} <strong>m</strong></span>
											</li>
                                            <li class="list-group-item d-flex px-0 justify-content-between">
												<strong>Corps de pompe</strong>
												<span class="mb-0">{{$caracteristique->corpsDePompe}}</span>
											</li>
                                            <li class="list-group-item d-flex px-0 justify-content-between">
												<strong>Chemise d'arbre</strong>
												<span class="mb-0">{{$caracteristique->chemiseArbre}}</span>
											</li>
											<li class="list-group-item d-flex px-0 justify-content-between">
												<strong>Longueur</strong>
												<span class="mb-0">{{$caracteristique->longueur}}</span>
											</li>
											<li class="list-group-item d-flex px-0 justify-content-between">
												<strong>Largeur</strong>
												<span class="mb-0">{{$caracteristique->largeur}}</span>
											</li>
											<li class="list-group-item d-flex px-0 justify-content-between">
												<strong>Hauteur</strong>
												<span class="mb-0">{{$caracteristique->hauteur}}</span>
											</li>
											<li class="list-group-item d-flex px-0 justify-content-between">
												<strong>Masse</strong>
                                                <button type="button" wire:click="cardfalsee()" class="btn btn-info">Voir plus</button>
												<span class="mb-0">{{$caracteristique->masse}}</span>
											</li>
                                         @endif  
										</ul>
									</div>
								</div>                                     
                                        @endif     
                                     @endforeach 
		    </div>           
                            
                            <div class="mt-4 col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                    @foreach ($electriq as $caracteristique)
                                        @if (optional($selectedId)->id == $caracteristique->caracteristique_moteur_id)
                                        <div class="card">
									<div class="card-header" style="background-color:#FFAD00;font-size: 1.3em;font-family: montserrat;">
										<h2 class="card-title">MOTEUR</h2>
									</div>
									<div class="card-body pb-0">
										<ul class="list-group list-group-flush">
											<li class="list-group-item d-flex px-0 justify-content-between">
												<strong>Marque</strong>
												<span class="mb-0">{{$caracteristique->marque}}</span>
											</li>
											<li class="list-group-item d-flex px-0 justify-content-between">
												<strong>Type</strong>
												<span class="mb-0">{{$caracteristique->type}}</span>
											</li>
											<li class="list-group-item d-flex px-0 justify-content-between">
												<strong>Numero de serie</strong>
												<span class="mb-0">{{$caracteristique->numeroSerie}}</span>
											</li>
                                            <li class="list-group-item d-flex px-0 justify-content-between">
												<strong>Numero de fabrication</strong>
												<span class="mb-0">{{$caracteristique->numeroFabrication}}</span>
											</li>
											<li class="list-group-item d-flex px-0 justify-content-between">
												<strong>Vitesse</strong>
                                                 @if ($card)
                                                @else
                                                   <button type="button" wire:click="card()" class="btn btn-success">Voir plus</button> 
                                                @endif
												<span class="mb-0">{{$caracteristique->vitesse}} <strong>tr/mn</strong></span>
											</li>
                                             @if ($card)
                                            <li class="list-group-item d-flex px-0 justify-content-between">
												<strong>Année de fabrication</strong>
												<span class="mb-0">{{date('d-m-Y',strtotime($caracteristique->anneeFabrication))}}</span>
											</li>
                                            <li class="list-group-item d-flex px-0 justify-content-between">
												<strong>Fournisseur</strong>
												<span class="mb-0">{{$caracteristique->fournisseur}}</span>
											</li>
                                            <li class="list-group-item d-flex px-0 justify-content-between">
												<strong>Date d'acquisition</strong>
												<span class="mb-0">{{date('d-m-Y',strtotime($caracteristique->dateAcquisition))}}</span>
											</li>
                                            <li class="list-group-item d-flex px-0 justify-content-between">
												<strong>Date mise en service</strong>
												<span class="mb-0">{{date('d-m-Y',strtotime($caracteristique->dateMiseEnService))}}</span>
											</li>
                                            <li class="list-group-item d-flex px-0 justify-content-between">
												<strong>Roulement</strong>
												<span class="mb-0">{{$caracteristique->roulement}}</span>
											</li>
                                            <li class="list-group-item d-flex px-0 justify-content-between">
												<strong>Mise en service</strong>
												<span class="mb-0">{{$caracteristique->misesEnServices}}</span>
											</li>
                                            <li class="list-group-item d-flex px-0 justify-content-between">
												<strong>Observation</strong>
												<span class="mb-0">{{$caracteristique->observations}}</span>
											</li>
                                            <li class="list-group-item d-flex px-0 justify-content-between">
												<strong>Puissance</strong>
												<span class="mb-0">{{$caracteristique->puissance}} <strong>kw</strong></span>
											</li>
                                            <li class="list-group-item d-flex px-0 justify-content-between">
												<strong>Tension</strong>
												<span class="mb-0">{{$caracteristique->tension}} <strong>V</strong></span>
											</li>
                                            <li class="list-group-item d-flex px-0 justify-content-between">
												<strong>Cosphi</strong>
												<span class="mb-0">{{$caracteristique->cosphi}}</span>
											</li>
                                            <li class="list-group-item d-flex px-0 justify-content-between">
												<strong>Intensite</strong>                          
												<span class="mb-0">{{$caracteristique->intensite}} <strong>A</strong></span>
											</li>
                                                <li class="list-group-item d-flex px-0 justify-content-between">
												<strong>Section Cablage</strong>
												<span class="mb-0">{{$caracteristique->sectionCable}}</span>
											</li>
                                            <li class="list-group-item d-flex px-0 justify-content-between">
												<strong>Indice de protection</strong>
												<span class="mb-0">{{$caracteristique->indiceDeProtection}}</span>
											</li>
                                            <li class="list-group-item d-flex px-0 justify-content-between">
												<strong>Classe isolant</strong>
												<span class="mb-0">{{$caracteristique->classeIsolant}}</span>
											</li>
                                            <li class="list-group-item d-flex px-0 justify-content-between">
												<strong>Type de demarrage</strong>
												<span class="mb-0">{{$caracteristique->typeDeDemarrage}}</span>
											</li>
										    <li class="list-group-item d-flex px-0 justify-content-between">
												<strong>Longueur</strong>
												<span class="mb-0">{{$caracteristique->longueur}}</span>
											</li>
											<li class="list-group-item d-flex px-0 justify-content-between">
												<strong>Largeur</strong>
												<span class="mb-0">{{$caracteristique->largeur}}</span>
											</li>
											<li class="list-group-item d-flex px-0 justify-content-between">
												<strong>Hauteur</strong>
												<span class="mb-0">{{$caracteristique->hauteur}}</span>
											</li>
											<li class="list-group-item d-flex px-0 justify-content-between">
												<strong>Masse</strong>
                                                <button type="button" wire:click="cardfalse()" class="btn btn-info">Voir plus</button>
												<span class="mb-0">{{$caracteristique->masse}}</span>
											</li>
                                            @endif   
										</ul>
									</div>
								</div>                                     
                                        @endif     
                                     @endforeach 
                                    </div>
                                </div>                 
                        </div>
                    </div>
                </div>
            </div>
        </div>

					
				


