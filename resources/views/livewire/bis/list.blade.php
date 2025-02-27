
<div>
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-hidden="true" wire:ignore.self>
@include("livewire.bis.create")
</div> 
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-hidden="true" wire:ignore.self>
@include("livewire.bis.edit")
</div>


                          
        

<div class="row p-2">
  @can("employe")
  <button class="btn btn-success ml-3 mb-3" wire:click="cancel" data-toggle="modal" data-target="#addModal" style="transition: 0.3s; box-shadow: 0px 4px 6px rgba(0,0,0,0.1);">
    <i class="fa fa-plus-circle"></i> Nouveau
  </button>
  @endcan

  <div class="col-12">
    <div class="card">
      <div class="card-header d-flex align-items-center" style="background-color:#3347EF; border-bottom: 3px solid #1C305D;">
        <h3 class="card-title flex-grow-1" style="color:white; font-weight: 600;"><i class="nav-icon fas fa-wrench"></i> Liste bis</h3>
        <div class="card-tools d-flex align-items-center">
          <div class="input-group input-group-md" style="width: 250px;">
            <input type="text" name="table_search" wire:model.debounce.250ms="search" class="form-control float-right" placeholder="Recherche..." style="border-radius: 30px;">
            <div class="input-group-append">
              <button type="submit" class="btn btn-default" style="border-radius: 30px; box-shadow: 0px 4px 6px rgba(0,0,0,0.1);"><i class="fas fa-search"></i></button>
            </div>
          </div>
        </div>
      </div>
      <!-- /.card-header -->
      <div class="card-body table-responsive p-0 table-striped" style="max-height: 400px; box-shadow: 0px 4px 10px rgba(0,0,0,0.05);">
        <table class="table table-head-fixed text-nowrap">
          <thead style="background-color: #F7F8FB;">
            <tr>
              <th class="text-center">Date de pose</th>
              <th class="text-center">Forage</th>
              <th class="text-center">Repère</th>
              <th class="text-center">Désignation</th>
              <th class="text-center">Marque</th>
              <th class="text-center">Modèle</th>
              <th class="text-center">DN</th>
              <th class="text-center">PN</th>
              <th class="text-center">Tarage</th>
              @can("employe")
              <th class="text-center">Action</th>
              @endcan
            </tr>
          </thead>
          <tbody>
            @forelse ($biss as $bis)
            <tr>
              <td class="text-center">{{date('d/m/Y', strtotime($bis->dateDePose))}}</td>
              <td class="text-center">{{$bis->caracteristique}}</td>
              <td class="text-center">{{$bis->repere}}</td>
              <td class="text-center">{{$bis->designation}}</td>
              <td class="text-center">{{$bis->marque}}</td>
              <td class="text-center">{{$bis->type}}</td>
              <td class="text-center">{{$bis->Dn}}</td>
              <td class="text-center">{{$bis->Pn}}</td>
              <td class="text-center">{{$bis->tarage}}</td>
              @can("employe")
              <td class="text-center">
                <div class="btn-group open">
                  <a class="btn btn-info dropdown-toggle" data-toggle="dropdown" style="transition: 0.3s;">
                    <span class="fa fa-caret-down" title="Toggle dropdown menu"></span>
                  </a>
                  <ul class="dropdown-menu" style="padding: 10px; z-index: 10;">
                    <li><button class="btn btn-link" wire:click="editBis({{$bis->id}})" data-toggle="modal" data-target="#editModal"><i class="far fa-edit"></i> Modifier</button></li>
                    @can('delete', $bis)
                    <li><button class="btn btn-link" wire:click="confirmDelete({{$bis->id}})"><i class="far fa-trash-alt"></i> Supprimer</button></li>
                    @endcan
                  </ul>
                </div>
              </td>
              @endcan
            </tr>
            @empty
            <tr>
              <td colspan="11">
                <div class="alert alert-danger text-center">
                  <h5><i class="icon fas fa-ban"></i> Information!</h5>
                  Aucune donnée trouvée pour la recherche effectuée.
                </div>
              </td>
            </tr>
            @endforelse
          </tbody>
        </table>
      </div>
      <!-- /.card-body -->
      <div class="card-footer d-flex justify-content-between align-items-center">
        <small class="text-muted">Affichage dynamique des résultats</small>
        <div class="float-right">
          {{$biss->links()}}
        </div>
      </div>
    </div>
    <!-- /.card -->
  </div>
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
               @this.deleteBis(event.detail.message.data.bis_id)
            }
        //    @this.resetPassword()
        }
        })
    })

</script>

