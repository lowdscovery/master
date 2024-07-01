<div class="content-body" style="min-height: 836px;">
@foreach ($bassins as $bassin)
                        
@endforeach
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
                                <div class="mt-1 col-xl-4 col-lg-4 col-md-4 col-sm-12">   
								<div class="card">
									<div class="card-header" style="background-color:#FFAD00;font-size: 1.3em;font-family: montserrat;">
										<h2 class="card-title">Bassin : {{optional($selectedId)->ressources->nom}}</h2>
									</div>
									<div class="card-body pb-0">
										<ul class="list-group list-group-flush">
										<li class="list-group-item d-flex px-0 justify-content-between">
												<strong>Longueur</strong>
												<span class="mb-0">{{$bassin->Longueur}}</span>
											</li>
											<li class="list-group-item d-flex px-0 justify-content-between">
												<strong>Largeur</strong>
												<span class="mb-0">{{$bassin->Largeur}}</span>
											</li>
											<li class="list-group-item d-flex px-0 justify-content-between">
												<strong>Hauteur</strong>
												<span class="mb-0">{{$bassin->Hauteur}}</span>
											</li>
											<li class="list-group-item d-flex px-0 justify-content-between">
												<strong>Volume</strong>
												<span class="mb-0">{{$bassin->Volume}}</span>
											</li>
											<li class="list-group-item d-flex px-0 justify-content-between">
												<strong>Hauteur d'aspiration</strong>
												<span class="mb-0">{{$bassin->HauteurAspiration}}</span>
											</li>
											<li class="list-group-item d-flex px-0 justify-content-between">
												<strong>Volume d'aspiration</strong>
												<span class="mb-0">{{$bassin->VolumeAspiration}}</span>
											</li>
                                            <li class="list-group-item d-flex px-0 justify-content-between">
												<strong>Total</strong>
												<span class="mb-0">{{$bassin->Total}}</span>
											</li>
											
										</ul>
									</div>
								</div>
                               </div>
 <div class="mt-1 col-xl-4 col-lg-4 col-md-4 col-sm-12">
                                  @foreach ($doseus as $dose)
                                        @if (optional($selectedId)->id == $dose->caracteristique_moteur_id)
                                <div class="card">
									<div class="card-header" style="background-color:#FFAD00;font-size: 1.3em;font-family: montserrat;">
										<h2 class="card-title">POMPE DOSEUSE</h2>
									</div>
									<div class="card-body pb-0">
										<ul class="list-group list-group-flush">
											<li class="list-group-item d-flex px-0 justify-content-between">
												<strong>Marque</strong>
												<span class="mb-0">{{$dose->marque}}</span>
											</li>
											<li class="list-group-item d-flex px-0 justify-content-between">
												<strong>Type</strong>
												<span class="mb-0">{{$dose->type}}</span>
											</li>
											<li class="list-group-item d-flex px-0 justify-content-between">
												<strong>Numero de serie</strong>
												<span class="mb-0">{{$dose->numeroSerie}}</span>
											</li>
                                            <li class="list-group-item d-flex px-0 justify-content-between">
												<strong>Numero de fabrication</strong>
												<span class="mb-0">{{$dose->numeroFabrication}}</span>
											</li>
											<li class="list-group-item d-flex px-0 justify-content-between">
												<strong>Vitesse</strong>     
												<span class="mb-0">{{$dose->vitesse}}</span>
											</li>     
                                            <li class="list-group-item d-flex px-0 justify-content-between">
												<strong>Année de fabrication</strong>
												<span class="mb-0">{{$dose->anneeFabrication}}</span>
											</li>  
                                            <li class="list-group-item d-flex px-0 justify-content-between">
												<strong>Fournisseur</strong>
                                                 @if ($cardselect)
                                                @else
                                                   <button type="button" wire:click="cardtrue()" class="btn btn-success">Voir plus</button> 
                                                @endif
												<span class="mb-0">{{$dose->fournisseur}}</span>
											</li>
                                             @if  ($cardselect)
                                            <li class="list-group-item d-flex px-0 justify-content-between">
												<strong>Date d'acquisition</strong>
												<span class="mb-0">{{$dose->dateAcquisition}}</span>
											</li>
                                            <li class="list-group-item d-flex px-0 justify-content-between">
												<strong>Date mise en service</strong>
												<span class="mb-0">{{$dose->dateMiseEnService}}</span>
											</li>
                                            <li class="list-group-item d-flex px-0 justify-content-between">
												<strong>Roulement</strong>
												<span class="mb-0">{{$dose->roulement}}</span>
											</li>
                                            <li class="list-group-item d-flex px-0 justify-content-between">
												<strong>Mise en service</strong>
												<span class="mb-0">{{$dose->misesEnServices}}</span>
											</li>
                                            <li class="list-group-item d-flex px-0 justify-content-between">
												<strong>Observation</strong>
												<span class="mb-0">{{$dose->observations}}</span>
											</li>
                                            <li class="list-group-item d-flex px-0 justify-content-between">
												<strong>Pression Max Aspiration</strong>
												<span class="mb-0">{{$dose->pressionMaxAspiration}} <strong>bars</strong></span>
											</li>
                                            <li class="list-group-item d-flex px-0 justify-content-between">
												<strong>Pression Max Refoulement </strong>
												<span class="mb-0">{{$dose->pressionMaxRefoulement}} <strong>bars</strong></span>
											</li>
                                            <li class="list-group-item d-flex px-0 justify-content-between">
												<strong>Hauteur Aspiration Max</strong>
												<span class="mb-0">{{$dose->hauteurAspirationMax}} <strong>mCE</strong></span>
											</li>
                                            <li class="list-group-item d-flex px-0 justify-content-between">
												<strong>Cadence</strong>
												<span class="mb-0">{{$dose->cadence}} <strong>coups/mn</strong></span>
											</li>
											<li class="list-group-item d-flex px-0 justify-content-between">
												<strong>Rapport Reduction</strong>
												<span class="mb-0">{{$dose->rapportReduction}}</span>
											</li>
											<li class="list-group-item d-flex px-0 justify-content-between">
												<strong>Course</strong>
												<span class="mb-0">{{$dose->course}} <strong>mm</strong></span>
											</li>
											<li class="list-group-item d-flex px-0 justify-content-between">
												<strong>Ballon Amortisseur</strong>
												<span class="mb-0">{{$dose->ballonAmortisseur}}</span>
											</li>
											<li class="list-group-item d-flex px-0 justify-content-between">
												<strong>Ballon Amortisseur Refoulement</strong>
												<span class="mb-0">{{$dose->ballonAmortisseurRefoulement}}</span>
											</li>
											<li class="list-group-item d-flex px-0 justify-content-between">
												<strong>Corps Doseur</strong>
												<span class="mb-0">{{$dose->corpsDoseur}}</span>
											</li>
											<li class="list-group-item d-flex px-0 justify-content-between">
												<strong>Membrane</strong>
												<span class="mb-0">{{$dose->membrane}}</span>
											</li>
											<li class="list-group-item d-flex px-0 justify-content-between">
												<strong>Arbre</strong>
												<span class="mb-0">{{$dose->arbre}}</span>
											</li>
											<li class="list-group-item d-flex px-0 justify-content-between">
												<strong>Calpet Aspiration</strong>
												<span class="mb-0">{{$dose->calpetAspiration}}</span>
											</li>
											<li class="list-group-item d-flex px-0 justify-content-between">
												<strong>Calpet Refoulement</strong>
												<span class="mb-0">{{$dose->calpetRefoulement}}</span>
											</li>
											<li class="list-group-item d-flex px-0 justify-content-between">
												<strong>Tarage</strong>
												<span class="mb-0">{{$dose->tarage}}</span>
											</li>
											<li class="list-group-item d-flex px-0 justify-content-between">
												<strong>Debit Max</strong>
												<span class="mb-0">{{$dose->debitMax}} <strong>l/h</strong></span>
											</li>
                                            <li class="list-group-item d-flex px-0 justify-content-between">
												<strong>Longueur</strong>
												<span class="mb-0">{{$dose->longueur}}</span>
											</li>
											<li class="list-group-item d-flex px-0 justify-content-between">
												<strong>Largeur</strong>
												<span class="mb-0">{{$dose->largeur}}</span>
											</li>
											<li class="list-group-item d-flex px-0 justify-content-between">
												<strong>Hauteur</strong>
												<span class="mb-0">{{$dose->hauteur}}</span>
											</li>
											<li class="list-group-item d-flex px-0 justify-content-between">
												<strong>Masse</strong>
                                                <button type="button" wire:click="cardfalsee()" class="btn btn-info">Voir plus</button>
												<span class="mb-0">{{$dose->masse}}</span>
											</li>
                                         @endif  
										</ul>
									</div>
								</div>                                     
								  @endif     
								@endforeach 
		    </div>           
                            
                            <div class="mt-1 col-xl-4 col-lg-4 col-md-4 col-sm-12">
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
                                                
												<span class="mb-0">{{$caracteristique->vitesse}} <strong>tr/mn</strong></span>
											</li>
                                            <li class="list-group-item d-flex px-0 justify-content-between">
												<strong>Année de fabrication</strong>
												<span class="mb-0">{{$caracteristique->anneeFabrication}}</span>
											</li>
                                            <li class="list-group-item d-flex px-0 justify-content-between">
												<strong>Fournisseur</strong>
                                                 @if ($card)
                                                @else
                                                   <button type="button" wire:click="card()" class="btn btn-success">Voir plus</button> 
                                                @endif
												<span class="mb-0">{{$caracteristique->fournisseur}}</span>
											</li>
                                            @if ($card)
                                            <li class="list-group-item d-flex px-0 justify-content-between">
												<strong>Date d'acquisition</strong>
												<span class="mb-0">{{$caracteristique->dateAcquisition}}</span>
											</li>
                                            <li class="list-group-item d-flex px-0 justify-content-between">
												<strong>Date mise en service</strong>
												<span class="mb-0">{{$caracteristique->dateMiseEnService}}</span>
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

					
				


