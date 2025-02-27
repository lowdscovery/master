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
                @if ($selectedDocument)
                <iframe src="{{ asset($selectedDocument->Rapport)}}" width="100%" height="600px"></iframe>
                @endif
    </form>
        </div>
    </div>
    </div> 
    </div>

    @foreach($maintenances as $maintenance)
    <div class="col-md-4 pt-3">
        <div class="card card-widget" style="border-radius: 15px; box-shadow: 0px 5px 20px rgba(0, 0, 0, 0.1); transition: transform 0.3s ease;">
            <div class="card-header" style="background: linear-gradient(45deg, #0052cc, #00d2ff); color: #fff; border-radius: 15px 15px 0 0; padding: 20px;">
                <div class="user-block">
                    <span><a href="#" style="color: #fff; font-weight: bold; font-size: 1.1rem;">{{$maintenance->intervenant_id}}</a></span>
                    <span class="description" style="font-size: 1.2rem; color: #FFD700;">{{$maintenance->type}}</span> <!-- Augmentation de la taille et couleur dorée pour le type -->
                </div>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" style="color: #fff;">
                        <i class="fas fa-minus"></i>
                    </button>
                    <a href="{{route('maintenance.maintenance')}}" class="btn btn-tool" style="color: #fff;">
                        <i class="fas fa-times"></i>
                    </a>
                </div>
            </div>
            <div class="card-footer" style="background-color: #f8f9fa; padding: 15px;">
                <span class="username">
                    <span style="font-weight: bold; color: #333;">Date</span> : {{date('d-m-Y', strtotime($maintenance->dateMaintenance))}}<br>
                </span>
                <span style="font-weight: bold; color: #333;">Durée Intervention</span> : {{$maintenance->DureeIntervention}}H 
                <span style="font-weight: bold; color: #333;">N° de série</span> : {{$maintenance->caracteristique_moteurs_id}}<br>

                @php
                    $isToday = \Carbon\Carbon::parse($maintenance->dateMaintenance)->isToday();
                    $isPast = \Carbon\Carbon::parse($maintenance->dateMaintenance)->isPast();
                @endphp

                @if ($maintenance->DureeReel == null || $maintenance->Rapport == null)
                    @if($isToday)
                        <span style="font-weight: bold; color: #333;">Durée Réelle</span> : 
                        @if($maintenance->status == 'en_cours')
                            <span class="badge badge-success">En cours</span>
                        @else
                            <span class="badge badge-danger">Programmer</span>
                        @endif
                        <span style="font-weight: bold; color: #333;">Rapport</span> : 
                        @if($maintenance->status == 'en_cours')
                            <span class="badge badge-success">En cours</span>
                        @else
                            <span class="badge badge-danger">Programmer</span>
                        @endif
                    @elseif($isPast)
                        <span style="font-weight: bold; color: #333;">Durée Réelle</span> : 
                        @if($maintenance->status == 'en_cours')
                            <span class="badge badge-success">En cours</span>
                        @else
                            <span class="badge badge-warning">À exécuter</span>
                        @endif
                        <span style="font-weight: bold; color: #333;">Rapport</span> : 
                        @if($maintenance->status == 'en_cours')
                            <span class="badge badge-success">En cours</span>
                        @else
                            <span class="badge badge-warning">À exécuter</span>
                        @endif
                    @else
                        <span style="font-weight: bold; color: #333;">Durée Réelle</span> : 
                        <span class="badge badge-danger">Programmer</span>
                        <span style="font-weight: bold; color: #333;">Rapport</span> : 
                        <span class="badge badge-danger">Programmer</span>
                    @endif
                @else
                    <span style="font-weight: bold; color: #333;">Durée Réelle</span> : {{ $maintenance->DureeReel }}H
                    <span style="font-weight: bold; color: #333;">Rapport</span> : 
                    <button class="btn btn-link" wire:click="selectDocument({{$maintenance->id}})" data-toggle="modal" data-target="#addModal">
                        <i class="fa fa-file-pdf" style="color:#96BC00; font-size:18px;"></i>
                    </button><br>
                @endif
                <span style="font-weight: bold; color: #333;">Action Entreprise</span> : {{$maintenance->actionEntreprise}}
            </div>
        </div>
    </div>
    @endforeach
</div>
