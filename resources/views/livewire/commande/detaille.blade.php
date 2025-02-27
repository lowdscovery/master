<div class="row">
@foreach($commandes as $commande)
    <div class="col-md-4 pt-3">
        <div class="card card-widget" style="border-radius: 15px; box-shadow: 0px 5px 20px rgba(0, 0, 0, 0.2); transition: transform 0.3s ease; border: 1px solid #e0e0e0;">
            <div class="card-header" style="background: linear-gradient(45deg, #6a5acd, #00bfff); color: #fff; border-radius: 15px 15px 0 0; padding: 20px;">
                <div class="user-block">
                    <span><a href="#" style="color: #fff; font-weight: bold; font-size: 1.1rem;">Type : </a></span>{{$commande->type}} - 
                    <span style="font-size: 1.2rem; color: #FFD700;">Numero de serie :</span> {{$commande->caracteristique}}
                </div>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" style="color: #fff;">
                        <i class="fas fa-minus"></i>
                    </button>
                    <a href="{{route('commande.commande')}}" class="btn btn-tool" style="color: #fff;">
                        <i class="fas fa-times"></i>
                    </a>
                </div>
            </div>
            <div class="card-footer" style="background-color: #f9f9f9; padding: 15px; border-top: 1px solid #e0e0e0;">
                <span class="username">
                    <span style="font-weight: bold; color: #333;">Date</span> : {{date('d-m-Y', strtotime($commande->dateCommande))}} 
                    <span style="font-weight: bold; color: #333;">Date de reception</span> : {{date('d-m-Y', strtotime($commande->dateReception))}}
                </span>   
                <span style="font-weight: bold; color: #333;">Article</span> : {{$commande->article}}           
                <span style="font-weight: bold; color: #333;">Reference</span> : {{ $commande->reference }}<br>
                <span style="font-weight: bold; color: #333;">Quantite de commande</span> : {{$commande->quantiteCommande}}<br>
                <span style="font-weight: bold; color: #333;">Numero DA</span> : {{$commande->numeroDA}} 
                <span style="font-weight: bold; color: #333;">Situation</span> : {{$commande->Situation}}<br>
                <span style="font-weight: bold; color: #333;">Quantite de reception</span> : {{$commande->quantiteReception}}<br>
                <span style="font-weight: bold; color: #333;">Motif</span> : {{$commande->motif}}<br>
                <span style="font-weight: bold; color: #333;">Observation</span> : {{$commande->observation}}
            </div>
        </div>
    </div>
@endforeach
</div>
