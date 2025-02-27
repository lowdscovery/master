
<div class="container-fluid">
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
@foreach($ouvrages->where('id',optional($selectedId)->id) as $ouvrage)


<div class="col-md-4 pt-2">
<div class="card card-widget">
<div class="card-header">
<div class="user-block">
<img class="img-circle" src="{{ asset($ouvrage->photo) }}" alt="User Image">
<span class="username"><a href="#"  wire:click="detaille">{{$ouvrage->type}}</a> {{$ouvrage->ressource->nom}}


@foreach($ressources->where('id', $ouvrage->ressource_id) as $ressource)

@foreach($sites->where('id',$ressource->site->id) as $sitee)
<span class="description"> District : {{$sitee->dist->nom}}</span>
@endforeach
<span class="description"> Site : {{$ressource->site->nom}}</span>

@endforeach
</span>
<span class="description">Ajout - {{$ouvrage->created_at->diffForHumans()}}
<button class="btn btn-link" wire:click="selectDocument({{$ouvrage->id}})" data-toggle="modal" data-target="#addModal"> <i class="fa fa-file-pdf" style="color:#96BC00;font-size:18px;"></i></button>
</span> 

</div>

<div class="card-tools">
<button type="button" class="btn btn-tool" data-card-widget="collapse">
<i class="fas fa-minus"></i>
</button>
<button type="button" class="btn btn-tool"  wire:click="detaille">
<i class="fas fa-times"></i>
</button>
</div>

</div>

<div class="card-body" style="display: block;">
<img class="img-fluid pad" src="{{ asset($ouvrage->photo) }}" alt="Photo" style="width:400px; height:225px;">
</div>

<div class="card-footer">

<span class="username">
<span style="font-weight: bold;">Annee</span> : {{$ouvrage->annee}}, <span style="font-weight: bold;">Debit Nominal </span>: {{$ouvrage->debitNominale}} <br>
</span>
<span style="font-weight: bold;">Profondeur</span> : {{$ouvrage->profondeur}}, <span style="font-weight: bold;">Debit conseiller</span> : {{$ouvrage->debitConseiller}}<br>
<span style="font-weight: bold;">Debit Exploite</span> : {{$ouvrage->debitExploite}}, <span style="font-weight: bold;">Nombre Exhaur</span> : {{$ouvrage->nombreExhaur}}<br>
<span style="font-weight: bold;">Diametre</span> : {{$ouvrage->diametre}}, <span style="font-weight: bold;">Sonde Bas</span> : {{$ouvrage->sondeBas}}, <span style="font-weight: bold;">Sonde Haut</span> : {{$ouvrage->sondeHaut}}

</div>
</div>
</div>
@endforeach


@foreach($mote as $moteur)
@if (optional($selectedId)->id == $moteur->ouvrage_id)
<div class="col-md-4 pt-2">
  <div class="card card-widget" style="border: 1px solid #ddd; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
    
    <!-- Titre Moteur centré en haut -->
    <div class="card-header" style="background-color: #2c3e50; color: #ecf0f1; text-align: center; padding: 15px;">
      <span class="username" style="font-size: 1.5rem; font-weight: bold;">
        Moteur
      </span>
    </div>

    <!-- Contenu avec Type et Marque alignés en parallèle -->
    <div class="card-body" style="padding: 15px; background-color: #f9f9f9;">
      <div style="display: flex; justify-content: space-between;">
        <div style="flex: 1; text-align: left;">
          <strong style="color: #1976d2;">Marque :</strong> {{$moteur->marque}}
        </div>
        <div style="flex: 1; text-align: right;">
          <strong style="color: #1976d2;">Type :</strong> {{$moteur->type}}
        </div>
      </div>
    </div>

    <!-- Footer avec les autres informations -->
    <div class="card-footer" style="background-color: #fff; color: #333; padding: 15px; line-height: 1.8;">
      
      <!-- Informations principales -->
      <div>
        <strong style="color: #1976d2;">N° de série :</strong> {{$moteur->numeroSerie}}  
        <strong style="color: #1976d2;">N° de fabrication :</strong> {{$moteur->numeroFabrication}}
      </div>

      <!-- Vitesse et année de fabrication -->
      <div>
        <strong style="color: #1976d2;">Vitesse :</strong> {{$moteur->vitesse}} 
        <strong style="color: #1976d2;">Année de fabrication :</strong> {{date('Y',strtotime($moteur->anneeFabrication))}}
      </div>

      <!-- Fournisseur et date d'acquisition -->
      <div>
        <strong style="color: #1976d2;">Fournisseur :</strong> {{$moteur->fournisseur}} 
        <strong style="color: #1976d2;">Date d'acquisition :</strong> {{date('d-m-y',strtotime($moteur->dateAcquisition))}}
      </div>

      <!-- Date de mise en service et roulement -->
      <div>
        <strong style="color: #1976d2;">Date de mise en service :</strong> {{date('d-m-y',strtotime($moteur->dateMiseEnService))}} <br> 
        <strong style="color: #1976d2;">Roulement :</strong> {{$moteur->roulement}}
        <strong style="color: #1976d2;">Puissance :</strong> {{$moteur->puissance}} kW  
        <strong style="color: #1976d2;">Cosphi :</strong> {{$moteur->cosphi}}  
      </div>

      <!-- Observation et caractéristiques -->
      <div>
        <strong style="color: #1976d2;">Observation :</strong> {{$moteur->observations}} 
        <strong style="color: #1976d2;">Tension :</strong> {{$moteur->tension}} V
      </div>

      <!-- Informations techniques supplémentaires -->
      <div>
        <strong style="color: #1976d2;">Intensité :</strong> {{$moteur->intensite}} A 
        <strong style="color: #1976d2;">Section câble :</strong> {{$moteur->sectionCable}} mm²
      </div>

      <!-- Indice de protection et démarrage -->
      <div>
        <strong style="color: #1976d2;">Indice de protection :</strong> {{$moteur->indiceDeProtection}}  
        <strong style="color: #1976d2;">Classe d'isolant :</strong> {{$moteur->classeIsolant}}  
        <strong style="color: #1976d2;">Type de démarrage :</strong> {{$moteur->typeDeDemarrage}}
      </div>

      <!-- Dimensions -->
      <div>
        <strong style="color: #1976d2;">Dimensions :</strong> 
        Longueur - {{$moteur->longueur}} cm, Largeur - {{$moteur->largeur}} cm, 
        Hauteur - {{$moteur->hauteur}} cm, Masse - {{$moteur->masse}} kg
      </div>
    </div>
  </div>
</div>



@endif
@endforeach


@foreach($pomp as $pompe)
@if (optional($selectedId)->id == $pompe->ouvrage_id)
<div class="col-md-4 pt-2">
  <div class="card card-widget" style="border: 1px solid #ccc; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
    
    <!-- Titre Pompe centré en haut -->
    <div class="card-header" style="background-color: #4caf50; color: #fff; text-align: center; padding: 15px;">
      <span class="username" style="font-size: 1.5rem; font-weight: bold;">
        Pompe
      </span>
    </div>

    <!-- Contenu avec Type et Marque alignés en parallèle -->
    <div class="card-body" style="padding: 15px; background-color: #f1f1f1;">
      <div style="display: flex; justify-content: space-between;">
        <div style="flex: 1; text-align: left;">
          <strong style="color: #c2185b;">Marque :</strong> {{$pompe->marque}}
        </div>
        <div style="flex: 1; text-align: right;">
          <strong style="color: #c2185b;">Type :</strong> {{$pompe->type}}
        </div>
      </div>
    </div>

    <!-- Footer avec les autres informations -->
    <div class="card-footer" style="background-color: #fff; color: #333; padding: 15px; line-height: 1.8;">
      
      <!-- Informations principales -->
      <div>
        <strong style="color: #c2185b;">N° de série :</strong> {{$pompe->numeroSerie}}  
        <strong style="color: #c2185b;">N° de fabrication :</strong> {{$pompe->numeroFabrication}}
      </div>

      <!-- Vitesse et année de fabrication -->
      <div>
        <strong style="color: #c2185b;">Vitesse :</strong> {{$pompe->vitesse}}  
        <strong style="color: #c2185b;">Année de fabrication :</strong> {{date('Y',strtotime($pompe->anneeFabrication))}}
      </div>

      <!-- Fournisseur et date d'acquisition -->
      <div>
        <strong style="color: #c2185b;">Fournisseur :</strong> {{$pompe->fournisseur}} 
        <strong style="color: #c2185b;">Date d'acquisition :</strong> {{date('d-m-y',strtotime($pompe->dateAcquisition))}}
      </div>

      <!-- Date de mise en service et roulement -->
      <div>
        <strong style="color: #c2185b;">Date de mise en service :</strong> {{date('d-m-y',strtotime($pompe->dateMiseEnService))}} <br> 
        <strong style="color: #c2185b;">Roulement :</strong> {{$pompe->roulement}}
      </div>

      <!-- Observation et caractéristiques -->
      <div>
        <strong style="color: #c2185b;">Observation :</strong> {{$pompe->observations}} 
        <strong style="color: #c2185b;">Débit Nominal :</strong> {{$pompe->debitNominal}} m³/h  
        <strong style="color: #c2185b;">Hauteur Manométrique :</strong> {{$pompe->hauteurManometrique}} m
      </div>

      <!-- Informations techniques supplémentaires -->
      <div>
        <strong style="color: #c2185b;">Corps de Pompe :</strong> {{$pompe->corpsDePompe}} 
        <strong style="color: #c2185b;">Chemise Arbre :</strong> {{$pompe->chemiseArbre}}
      </div>

      <!-- Dimensions -->
      <div>
        <strong style="color: #c2185b;">Dimensions :</strong> 
        Longueur - {{$pompe->longueur}} cm, Largeur - {{$pompe->largeur}} cm, 
        Hauteur - {{$pompe->hauteur}} cm, Masse - {{$pompe->masse}} kg
      </div>
    </div>
  </div>
</div>


@endif
@endforeach
</div>

</div>




