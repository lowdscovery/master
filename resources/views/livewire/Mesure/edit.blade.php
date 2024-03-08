<div class="row p-4 pt-1">

<div class="content-body">
            <!-- row -->
            <div class="container-fluid">
				<div class="row">
					<div class="col-xl-12 col-xxl-12 col-sm-12">
                        <div class="card card-cyan">
                            <div class="card-header">
								<h5 class="card-title"><i class="fas fa-user-plus fa-2x"></i> Formulaire d'edition mesure</h5>
							</div>
							<div class="card-body">
                                <form role="form" wire:submit.prevent="updateMesure()">
                                <div class="form-row">
                                    <div class="col">
                                    <label class="form-label">Date</label>
                                        <input type="date" wire:model="editMesure.Date" class="form-control @error('editMesure.Date') is-invalid @enderror" placeholder="Nom" required="required">
                                        @error("editMesure.Date")
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="col">
                                    <label class="form-label">IndexCh</label>
                                        <input type="text" wire:model="editMesure.IndexCH" class="form-control @error('editMesure.IndexCH') is-invalid @enderror" placeholder="IndexCh" required="required">
                                        @error("editMesure.IndexCH")
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="col">
                                    <label class="form-label">H</label>
                                        <input type="number" wire:model="H" class="form-control @error('H') is-invalid @enderror" placeholder="H" required="required">
                                        @error("H")
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="col">
                                    <label class="form-label">Tension U1</label>
                                        <input type="text" wire:model="editMesure.U1" class="form-control @error('editMesure.U1') is-invalid @enderror" placeholder="U1" required="required">
                                        @error("editMesure.U1")
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="col">
                                    <label class="form-label"> Tension U2</label>
                                        <input type="text" wire:model="editMesure.U2" class="form-control @error('editMesure.U2') is-invalid @enderror" placeholder="U2" required="required">
                                        @error("editMesure.U2")
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    </div>
                                    <div class="form-row">
                                    <div class="col">
                                    <label class="form-label"> Tension U3</label>
                                        <input type="text" wire:model="editMesure.U3" class="form-control @error('editMesure.U3') is-invalid @enderror" placeholder="U3" required="required">
                                        @error("editMesure.U3")
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="col">
                                    <label class="form-label">Intensité I1</label>
                                        <input type="text" wire:model="editMesure.I1" class="form-control @error('editMesure.I1') is-invalid @enderror" placeholder="I1" required="required">
                                        @error("editMesure.I1")
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="col">
                                    <label class="form-label">Intensité I2</label>
                                        <input type="text" wire:model="editMesure.I2" class="form-control @error('editMesure.I2') is-invalid @enderror" placeholder="I2" required="required">
                                        @error("editMesure.I2")
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="col">
                                    <label class="form-label">Intensité I3</label>
                                        <input type="text" wire:model="editMesure.I3" class="form-control @error('editMesure.I3') is-invalid @enderror" placeholder="I3" required="required">
                                        @error("editMesure.I3")
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="col">
                                    <label class="form-label">Puissance</label>
                                        <input type="number" wire:model="Puissance" class="form-control @error('Puissance') is-invalid @enderror" placeholder="Puissance" required="required">
                                        @error("Puissance")
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    </div>
                                    <div class="form-row">
                                    <div class="col">
                                    <label class="form-label">Cos</label>
                                        <input type="text" wire:model="editMesure.Cos" class="form-control @error('editMesure.Cos') is-invalid @enderror" placeholder="Cos" required="required">
                                        @error("editMesure.Cos")
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="col">
                                    <label class="form-label">Ph1/PH2</label>
                                        <input type="text" wire:model="editMesure.Ph1/PH2" class="form-control @error('editMesure.Ph1/PH2') is-invalid @enderror" placeholder="Ph1/PH2" required="required">
                                        @error("editMesure.Ph1/PH2")
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="col">
                                    <label class="form-label">Ph1/PH3</label>
                                        <input type="text" wire:model="editMesure.Ph1/PH3" class="form-control @error('editMesure.Ph1/PH3') is-invalid @enderror" placeholder="Ph1/PH3" required="required">
                                        @error("editMesure.Ph1/PH3")
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div><div class="col">
                                    <label class="form-label">Ph2/PH3</label>
                                        <input type="text" wire:model="editMesure.Ph2/PH3" class="form-control @error('editMesure.Ph2/PH3') is-invalid @enderror" placeholder="Ph2/PH3" required="required">
                                        @error("editMesure.Ph2/PH3")
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="col">
                                    <label class="form-label">Ph1/m</label>
                                        <input type="text" wire:model="editMesure.Ph1/m" class="form-control @error('editMesure.Ph1/m') is-invalid @enderror" placeholder="Ph1/m" required="required">
                                        @error("editMesure.Ph1/m")
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    </div>
                                    <div class="form-row">
                                    <div class="col">
                                    <label class="form-label">Ph2/m</label>
                                        <input type="text" wire:model="editMesure.Ph2/m" class="form-control @error('editMesure.Ph2/m') is-invalid @enderror" placeholder="Ph2/m" required="required">
                                        @error("editMesure.Ph2/m")
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div><div class="col">
                                    <label class="form-label">Ph3/m</label>
                                        <input type="text" wire:model="editMesure.Ph3/m" class="form-control @error('editMesure.Ph3/m') is-invalid @enderror" placeholder="Ph3/m" required="required">
                                        @error("editMesure.Ph3/m")
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="col">
                                    <label class="form-label">X1/X2</label>
                                        <input type="text" wire:model="editMesure.X1/X2" class="form-control @error('editMesure.X1/X2') is-invalid @enderror" placeholder="X1/X2" required="required">
                                        @error("editMesure.X1/X2")
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="col">
                                    <label class="form-label">Y1/Y2</label>
                                        <input type="text" wire:model="editMesure.Y1/Y2" class="form-control @error('editMesure.Y1/Y2') is-invalid @enderror" placeholder="Y1/Y2" required="required">
                                        @error("editMesure.Y1/Y2")
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div><div class="col">
                                    <label class="form-label">Z1/Z2</label>
                                        <input type="text" wire:model="editMesure.Z1/Z2" class="form-control @error('editMesure.Z1/Z2') is-invalid @enderror" placeholder="Z1/Z2" required="required">
                                        @error("editMesure.Z1/Z2")
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    </div>
                                    <div class="form-row">
                                    <div class="col">
                                    <label class="form-label">Debit</label>
                                        <input type="number" wire:model="Debit" class="form-control @error('Debit') is-invalid @enderror" placeholder="Debit" required="required">
                                        @error("Debit")
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="col">
                                    <label class="form-label">Vacuo</label>
                                        <input type="text" wire:model="editMesure.Vacuo" class="form-control @error('editMesure.Vacuo') is-invalid @enderror" placeholder="Vacuo" required="required">
                                        @error("editMesure.Vacuo")
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div><div class="col">
                                    <label class="form-label">Mano</label>
                                        <input type="text" wire:model="editMesure.Mano" class="form-control @error('editMesure.Mano') is-invalid @enderror" placeholder="Mano" required="required">
                                        @error("editMesure.Mano")
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="col">
                                    <label class="form-label">ND</label>
                                        <input type="number" wire:model="ND" class="form-control @error('ND') is-invalid @enderror" placeholder="ND" required="required">
                                        @error("editMesure.ND")
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="col">
                                    <label class="form-label">NS</label>
                                        <input type="number" wire:model="NS" class="form-control @error('NS') is-invalid @enderror" placeholder="NS" required="required">
                                        @error("editMesure.NS")
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    </div>
                                    <div class="form-row">
                                    <div class="col">
                                    <label class="form-label">Rab</label>
                                        <input type="number" wire:model="Rab" class="form-control @error('Rab') is-invalid @enderror" placeholder="Rab" required="required">
                                        @error("editMesure.Rab")
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>                                   
                                    <div class="col">
                                    <label class="form-label">Cs</label>
                                        <input type="number" wire:model="Cs" class="form-control @error('Cs') is-invalid @enderror" placeholder="Cs" required="required">
                                        @error("editMesure.Cs")
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="col">
                                    <label class="form-label">Conspé</label>
                                        <input type="number" wire:model="Conspé" class="form-control @error('Conspé') is-invalid @enderror" placeholder="Conspé" required="required">
                                        @error("Conspé")
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="col">
                                    <label class="form-label">Agent</label>
                                        <input type="text" wire:model="editMesure.Agent" class="form-control @error('editMesure.Agent') is-invalid @enderror" placeholder="Agent" required="required">
                                        @error("editMesure.Agent")
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="col">
                                    <label class="form-label"> </label>
                                   <div class="col-lg-12 col-md-12 col-sm-12">
                                        <button type="submit" class="btn btn-primary">Modifier</button>
                                        <button type="button" class="btn btn-info" wire:click="CacheInput()">Retour</button>
									</div>
                                    </div>
                                </div>
								</form>
                            </div>
                        </div>
                    </div>
				</div>
                
            </div>
        </div>

<script>
    window.addEventListener("showSuccessMessage", event=>{
        Swal.fire({
                position: 'top-end',
                icon: 'success',
                toast:true,
                title: event.detail.message || "Opération effectuée avec succès!",
                showConfirmButton: false,
                timer: 2000
                }
            )
    })
</script>
