
<div class="row tab-content pt-3">
        <div id="grid-view" class="tab-pane fade col-lg-12 active show">
            <div class="row">
              @foreach ($users as $user)
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="card card-profile"> 
                        <div class="card-body pt-2">
                            <div class="text-center">
                            @if ($user->photo !="" || $user->photo !=null)
                            <div class="profile-photo pt-4">
                        <img src="{{asset($user->photo)}}" width="100" class="img-fluid rounded-circle" alt="" style="height:100px;">
                            </div>
                            @else
                           <div class="profile-photo pt-4">
                        <img src="{{asset('image/user.png')}}" width="100" class="img-fluid rounded-circle" alt="" style="height:100px;">
                            </div>
                            @endif
                                
                                <h3 class="mt-4 mb-1" style="font-family: montserrat;">{{ $user->nom }}</h3>
                                <p class="text-muted">{{ $user->prenom }}</p>
                                <ul class="list-group mb-3 list-group-flush">
                                    <li class="list-group-item px-0 d-flex justify-content-between" style="font-family: montserrat;">
                                    <span>Utilisateur N°</span><strong>0{{ $user->id }}</strong></li>
                                    <li class="list-group-item px-0 d-flex justify-content-between" style="font-family: montserrat;">
                                        <span class="mb-0"> Sexe :</span><strong>{{ $user->sexe }}</strong></li>
                                    <li class="list-group-item px-0 d-flex justify-content-between" style="font-family: montserrat;">
                                    <span class="mb-0">Telephone :</span><strong>{{ $user->telephone1 }}</strong></li>
                                    <li class="list-group-item px-0 d-flex justify-content-between" style="font-family: montserrat;">
                                        <span class="mb-0">Email:</span><strong>{{ $user->email }}</strong></li>
                                    <li class="list-group-item px-0 d-flex justify-content-between" style="font-family: montserrat;">
                                        <span class="mb-0">Piece d'identité :</span><strong>{{ $user->pieceIdentite }}</strong></li>
                                    <li class="list-group-item px-0 d-flex justify-content-between" style="font-family: montserrat;">
                                        <span class="mb-0">Numero piece d'identité:</span><strong>{{ $user->numeroPieceIdentite }}</strong></li>
                                </ul>
                                <a class="btn btn-outline-primary btn-rounded mt-3 px-4" href="" wire:click.prevent="goToListUser()">Vue de liste</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            </div>
        </div>
    </div>

    
