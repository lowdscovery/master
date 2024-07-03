
<div class="pt-2">
    <div class="col-12">



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



        <div class="card">
            <div class="card-header bg-gradient-primary d-flex align-items-center">
                <h3 class="card-title flex-grow-1"><i class="fa fa-list fa-2x"></i> Forage -Puits </h3>
                    @foreach ($ouvrages as $ouvrage)
                    @endforeach
                    @can('create',$ouvrage)
                    <a class="btn btn-link btn-db text-white mr-4 d-block" wire:click="selected"><i
                            class="fas fa-plus"></i> Ajouter Nouveau</a>
                    @endcan
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0 table-striped">
         @if ($isSelected)
            <form wire:submit.prevent="Ouvrage">
            <div class="p-4">
                    <div>
                    <div class="form-row">
                    <div class="col">
     <input type="text" class="form-control @error('addOuvrage.annee') is-invalid @enderror" wire:model="addOuvrage.annee" placeholder="Annee" required="required" title="L'année doit être en 4 chiffre" pattern="\d{4}">
                    @error("addOuvrage.annee")
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                     </div>

                    <div class="col">
     <input type="text" class="form-control @error('addOuvrage.type') is-invalid @enderror" wire:model="addOuvrage.type" placeholder="Type" required="required" title="Saisissez le type">
                   @error("addOuvrage.type")
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                    </div>

                    <div class="col">
     <input type="text" class="form-control @error('addOuvrage.debitNominale') is-invalid @enderror" wire:model="addOuvrage.debitNominale" placeholder="Debit Nominale" required="required" title="Saisissez le debit nominal">
                   @error("addOuvrage.debitNominale")
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                    </div>

                    <div class="col">
     <input type="text" class="form-control @error('addOuvrage.profondeur') is-invalid @enderror" wire:model="addOuvrage.profondeur" placeholder="Profondeur" required="required" title="Saisissez le profondeur">
                   @error("addOuvrage.profondeur")
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                  </div>
                </div>

                <div class="form-row pt-3">
                    <div class="col">
     <input type="text" class="form-control @error('addOuvrage.debitConseiller') is-invalid @enderror" wire:model="addOuvrage.debitConseiller" placeholder="Debit Conseiller" required="required" title="Saisissez le debit conseiller">
                    @error("addOuvrage.debitConseiller")
                   <span class="text-danger">{{$message}}</span>
                    @enderror
                    </div>

                    <div class="col">
     <input type="text" class="form-control @error('addOuvrage.debitExploite') is-invalid @enderror" wire:model="addOuvrage.debitExploite" placeholder="Debit exploiter" required="required" title="Saisissez le debit exploiter">
                    @error("addOuvrage.debitExploite")
                   <span class="text-danger">{{$message}}</span>
                    @enderror
                    </div>

                    <div class="col">
     <input type="text" class="form-control @error('addOuvrage.diametre') is-invalid @enderror" wire:model="addOuvrage.diametre" placeholder="Diametre" required="required" title="Saisissez le diamètre">
                   @error("addOuvrage.diametre")
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                    </div>

                    <div class="col">
     <input type="text" class="form-control @error('addOuvrage.nombreExhaur') is-invalid @enderror" wire:model="addOuvrage.nombreExhaur" placeholder="Nombre Exhaure" required="required" title="Saisissez le nombre exhaure">
                   @error("addOuvrage.nombreExhaur")
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                    </div>                   
                </div>

                <div class="form-row">
                  <div class="col pt-3">
      <input type="text" class="form-control @error('addOuvrage.sondeBas') is-invalid @enderror" wire:model="addOuvrage.sondeBas" placeholder="Sonde Bas" required="required" title="Saisissez le sonde bas">
                    @error("addOuvrage.sondeBas")
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                    </div>

                    <div class="col pt-3">
     <input type="text" class="form-control @error('addOuvrage.sondeHaut') is-invalid @enderror" wire:model="addOuvrage.sondeHaut" placeholder="Sond Haut" required="required" title="Saisissez le sond haut">
                    @error("addOuvrage.sondeHaut")
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                    </div>

                    <div class="col pt-3">
      <input class="form-control " type="file" wire:model="image" wire:loading.attr="disabled" id="image{{$resetValueInput}}" title="Selectionner l'image"> 
                        </div>
                        <div class="col pt-3">
      <input class="form-control " type="file" wire:model="fichier" wire:loading.attr="disabled" id="fichier{{$resetValueInput}}" title="Selectionner le pdf"> 
                        </div>

                      <div class="col pt-3">
                    <select class="form-control @error("addOuvrage.ressource_id") is-invalid @enderror" wire:model="addOuvrage.ressource_id" required="required" title="Choisissez le type de forage ou puits">
                        @error("addOuvrage.ressource_id")
                                <span class="text-danger">{{$message}}</span>
                        @enderror 
                            <option value="">---------</option>
                            @foreach ($forages as $forage)                          
                            <option value="{{$forage->ressources->id}}">{{$forage->ressources->nom}}</option>
                            @endforeach
                        </select>
                    </div>                  
                  </div>      
                    </div>
                    
                    <div class="pt-3">                    
   <button type="submit" class="btn btn-primary" > <i class="fa fa-check"></i> Valider</button>
   <button type="button" wire:click="cancel" class="btn btn-warning"> <i class="fa fa-times"></i> Annuler</button>
                    </div>
                    
                </div>
        </form>   
         @endif 

         @if ($isSelectededit)
            <form wire:submit.prevent="updateOuvrage">
            <div class="p-4">
                    <div>
                    <div class="form-row">
                    <div class="col">
     <input type="text" class="form-control @error('addOuvrage.annee') is-invalid @enderror" wire:model="addOuvrage.annee" placeholder="Annee" required="required" title="L'année doit être en 4 chiffre" pattern="\d{4}">
                    @error("addOuvrage.annee")
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                     </div>

                    <div class="col">
     <input type="text" class="form-control @error('addOuvrage.type') is-invalid @enderror" wire:model="addOuvrage.type" placeholder="Type" required="required" title="Saisissez le type">
                   @error("addOuvrage.type")
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                    </div>

                    <div class="col">
     <input type="text" class="form-control @error('addOuvrage.debitNominale') is-invalid @enderror" wire:model="addOuvrage.debitNominale" placeholder="Debit Nominale" required="required" title="Saisissez le debit nominal">
                   @error("addOuvrage.debitNominale")
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                    </div>

                    <div class="col">
     <input type="text" class="form-control @error('addOuvrage.profondeur') is-invalid @enderror" wire:model="addOuvrage.profondeur" placeholder="Profondeur" required="required" title="Saisissez le profondeur">
                   @error("addOuvrage.profondeur")
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                  </div>
                </div>

                <div class="form-row pt-3">
                    <div class="col">
     <input type="text" class="form-control @error('addOuvrage.debitConseiller') is-invalid @enderror" wire:model="addOuvrage.debitConseiller" placeholder="Debit Conseiller" required="required" title="Saisissez le debit conseiller">
                    @error("addOuvrage.debitConseiller")
                   <span class="text-danger">{{$message}}</span>
                    @enderror
                    </div>

                    <div class="col">
     <input type="text" class="form-control @error('addOuvrage.debitExploite') is-invalid @enderror" wire:model="addOuvrage.debitExploite" placeholder="Debit exploiter" required="required" title="Saisissez le debit exploiter">
                    @error("addOuvrage.debitExploite")
                   <span class="text-danger">{{$message}}</span>
                    @enderror
                    </div>

                    <div class="col">
     <input type="text" class="form-control @error('addOuvrage.diametre') is-invalid @enderror" wire:model="addOuvrage.diametre" placeholder="Diametre" required="required" title="Saisissez le diamètre">
                   @error("addOuvrage.diametre")
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                    </div>

                    <div class="col">
     <input type="text" class="form-control @error('addOuvrage.nombreExhaur') is-invalid @enderror" wire:model="addOuvrage.nombreExhaur" placeholder="Nombre Exhaure" required="required" title="Saisissez le nombre exhaure">
                   @error("addOuvrage.nombreExhaur")
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                    </div>                   
                </div>

                <div class="form-row">
                  <div class="col pt-3">
      <input type="text" class="form-control @error('addOuvrage.sondeBas') is-invalid @enderror" wire:model="addOuvrage.sondeBas" placeholder="Sonde Bas" required="required" title="Saisissez le sonde bas">
                    @error("addOuvrage.sondeBas")
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                    </div>

                    <div class="col pt-3">
     <input type="text" class="form-control @error('addOuvrage.sondeHaut') is-invalid @enderror" wire:model="addOuvrage.sondeHaut" placeholder="Sond Haut" required="required" title="Saisissez le sond haut">
                    @error("addOuvrage.sondeHaut")
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                    </div>

                    <div class="col pt-3">
      <input class="form-control " type="file" wire:model="image" wire:loading.attr="disabled" id="image{{$resetValueInput}}" title="Selectionner l'image"> 
                        </div>
                        <div class="col pt-3">
      <input class="form-control " type="file" wire:model="fichier" wire:loading.attr="disabled" id="fichier{{$resetValueInput}}" title="Selectionner le pdf"> 
                        </div>

                      <div class="col pt-3">
                    <select class="form-control @error("addOuvrage.ressource_id") is-invalid @enderror" wire:model="addOuvrage.ressource_id" required="required" title="Choisissez le type de forage ou puits">
                        @error("addOuvrage.ressource_id")
                                <span class="text-danger">{{$message}}</span>
                        @enderror 
                            <option value="">---------</option>
                            @foreach ($forages as $forage)                          
                            <option value="{{$forage->ressources->id}}">{{$forage->ressources->nom}}</option>
                            @endforeach
                        </select>
                    </div>                  
                  </div>      
                    </div>
                    
                    <div class="pt-3">  
   <button type="submit" class="btn btn-success" > <i class="fa fa-check"></i> Edit</button>
   <button type="button" wire:click="cancel" class="btn btn-warning"> <i class="fa fa-times"></i> Annuler</button>
                    </div>
                    
                </div>
        </form>   
        @endif  
        
                <div style="height:470px;">
                    <table class="table table-head-fixed">
                        <thead>
                            <tr>
                                <th></th>
                                <th class="text-center">Annee</th>
                                <th class="text-center">Debit Exploiter</th>
                                <th class="text-center">Profondeur</th>
                                <th class="text-center">Type</th>
                                <th class="text-center">Forages</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                       @forelse ($ouvrages as $ouvrage)
                         <tr>
                            <td><img src="{{asset($ouvrage->photo)}}" style="width:60px; height:60px;"></td>
                            <td class="text-center">{{$ouvrage->annee}}</td>
                            <td class="text-center">{{$ouvrage->debitExploite}}</td>
                            <td class="text-center">{{$ouvrage->profondeur}}</td>
                            <td class="text-center">{{$ouvrage->type}}</td>
                            <td class="text-center">{{$ouvrage->ressource->nom}}</td>
                            <td class="text-center">
                                <button wire:click="editOuvrage({{$ouvrage->id}})" class="btn btn-link"> <i class="far fa-edit"></i> </button>
                                @can('delete', $ouvrage)
                                <button class="btn btn-link" wire:click="confirmDelete({{$ouvrage->id}})"> <i class="far fa-trash-alt"></i> </button>
                                @endcan
                                <button class="btn btn-link" wire:click="selectDocument({{$ouvrage->id}})" data-toggle="modal" data-target="#addModal"> <i class="fa fa-file-pdf" style="color:#96BC00;font-size:18px;"></i></button>
                            </td>
                        </tr>
                       @empty
                         <tr>
                            <td colspan="9">
                                <div class="alert alert-info">

                                    <h5><i class="icon fas fa-ban"></i> Information!</h5>
                                    Cet article ne dispose pas encore de tarifs.
                                </div>
                            </td>
                        </tr>  
                       @endforelse    
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                <div class="float-right">
                 {{ $ouvrages->links() }}
                </div>
            </div>
            </div>

        </div>
        <!-- /.card -->
    </div>
</div>
  


<script>
    window.addEventListener("showSuccessMessage", event=>{
        Swal.fire({
                position: 'top-end',
                icon: 'success',
                toast:true,
                title: event.detail.message || "Utilisateur mis à jour avec succès!",
                showConfirmButton: false,
                timer: 3000
                }
            )
    })
</script>
<script>
    window.addEventListener("showConfirmMessage", event=>{
       Swal.fire({
        title: event.detail.message.title,
        text: event.detail.message.text,
        icon: event.detail.message.type,
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Continuer',
        cancelButtonText: 'Annuler'
        }).then((result) => {
        if (result.isConfirmed) {
            if(event.detail.message.data){
               @this.deleteOuvrage(event.detail.message.data.models_ouvrage_id)
            }
        //    @this.resetPassword()
        }
        })
    })

</script>