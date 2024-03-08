<div class="row p-4 pt-1">

<div class="content-body">
            <!-- row -->
            <div class="container-fluid">
				<div class="row">
					<div class="col-xl-12 col-xxl-12 col-sm-12">
                        <div class="card card-cyan">
                            <div class="card-header">
								<h5 class="card-title"><i class="fas fa-user-plus fa-2x"></i> Formulaire de création de mesure</h5>
							</div>
							<div class="card-body">
                                <form role="form" wire:submit.prevent="addMesure()">
                                <div class="form-row">
                                    <div class="col">
                                    <label class="form-label">Date</label>
                                        <input type="date" wire:model="addMesure.Date" class="form-control @error('addMesure.Date') is-invalid @enderror" placeholder="Nom" required="required">
                                        @error("addMesure.Date")
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="col">
                                    <label class="form-label">IndexCh</label>
                                        <input type="text" wire:model="addMesure.IndexCH" class="form-control @error('addMesure.IndexCH') is-invalid @enderror" placeholder="IndexCh" required="required">
                                        @error("addMesure.IndexCH")
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
                                        <input type="text" wire:model="addMesure.U1" class="form-control @error('addMesure.U1') is-invalid @enderror" placeholder="U1" required="required">
                                        @error("addMesure.U1")
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="col">
                                    <label class="form-label"> Tension U2</label>
                                        <input type="text" wire:model="addMesure.U2" class="form-control @error('addMesure.U2') is-invalid @enderror" placeholder="U2" required="required">
                                        @error("addMesure.U2")
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    </div>
                                    <div class="form-row">
                                    <div class="col">
                                    <label class="form-label"> Tension U3</label>
                                        <input type="text" wire:model="addMesure.U3" class="form-control @error('addMesure.U3') is-invalid @enderror" placeholder="U3" required="required">
                                        @error("addMesure.U3")
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="col">
                                    <label class="form-label">Intensité I1</label>
                                        <input type="text" wire:model="addMesure.I1" class="form-control @error('addMesure.I1') is-invalid @enderror" placeholder="I1" required="required">
                                        @error("addMesure.I1")
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="col">
                                    <label class="form-label">Intensité I2</label>
                                        <input type="text" wire:model="addMesure.I2" class="form-control @error('addMesure.I2') is-invalid @enderror" placeholder="I2" required="required">
                                        @error("addMesure.I2")
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="col">
                                    <label class="form-label">Intensité I3</label>
                                        <input type="text" wire:model="addMesure.I3" class="form-control @error('addMesure.I3') is-invalid @enderror" placeholder="I3" required="required">
                                        @error("addMesure.I3")
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
                                        <input type="text" wire:model="addMesure.Cos" class="form-control @error('addMesure.Cos') is-invalid @enderror" placeholder="Cos" required="required">
                                        @error("addMesure.Cos")
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="col">
                                    <label class="form-label">Ph1/PH2</label>
                                        <input type="text" wire:model="addMesure.Ph1/PH2" class="form-control @error('addMesure.Ph1/PH2') is-invalid @enderror" placeholder="Ph1/PH2" required="required">
                                        @error("addMesure.Ph1/PH2")
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="col">
                                    <label class="form-label">Ph1/PH3</label>
                                        <input type="text" wire:model="addMesure.Ph1/PH3" class="form-control @error('addMesure.Ph1/PH3') is-invalid @enderror" placeholder="Ph1/PH3" required="required">
                                        @error("addMesure.Ph1/PH3")
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div><div class="col">
                                    <label class="form-label">Ph2/PH3</label>
                                        <input type="text" wire:model="addMesure.Ph2/PH3" class="form-control @error('addMesure.Ph2/PH3') is-invalid @enderror" placeholder="Ph2/PH3" required="required">
                                        @error("addMesure.Ph2/PH3")
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="col">
                                    <label class="form-label">Ph1/m</label>
                                        <input type="text" wire:model="addMesure.Ph1/m" class="form-control @error('addMesure.Ph1/m') is-invalid @enderror" placeholder="Ph1/m" required="required">
                                        @error("addMesure.Ph1/m")
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    </div>
                                    <div class="form-row">
                                    <div class="col">
                                    <label class="form-label">Ph2/m</label>
                                        <input type="text" wire:model="addMesure.Ph2/m" class="form-control @error('addMesure.Ph2/m') is-invalid @enderror" placeholder="Ph2/m" required="required">
                                        @error("addMesure.Ph2/m")
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div><div class="col">
                                    <label class="form-label">Ph3/m</label>
                                        <input type="text" wire:model="addMesure.Ph3/m" class="form-control @error('addMesure.Ph3/m') is-invalid @enderror" placeholder="Ph3/m" required="required">
                                        @error("addMesure.Ph3/m")
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="col">
                                    <label class="form-label">X1/X2</label>
                                        <input type="text" wire:model="addMesure.X1/X2" class="form-control @error('addMesure.X1/X2') is-invalid @enderror" placeholder="X1/X2" required="required">
                                        @error("addMesure.X1/X2")
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="col">
                                    <label class="form-label">Y1/Y2</label>
                                        <input type="text" wire:model="addMesure.Y1/Y2" class="form-control @error('addMesure.Y1/Y2') is-invalid @enderror" placeholder="Y1/Y2" required="required">
                                        @error("addMesure.Y1/Y2")
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div><div class="col">
                                    <label class="form-label">Z1/Z2</label>
                                        <input type="text" wire:model="addMesure.Z1/Z2" class="form-control @error('addMesure.Z1/Z2') is-invalid @enderror" placeholder="Z1/Z2" required="required">
                                        @error("addMesure.Z1/Z2")
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
                                        <input type="text" wire:model="addMesure.Vacuo" class="form-control @error('addMesure.Vacuo') is-invalid @enderror" placeholder="Vacuo" required="required">
                                        @error("addMesure.Vacuo")
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div><div class="col">
                                    <label class="form-label">Mano</label>
                                        <input type="text" wire:model="addMesure.Mano" class="form-control @error('addMesure.Mano') is-invalid @enderror" placeholder="Mano" required="required">
                                        @error("addMesure.Mano")
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="col">
                                    <label class="form-label">ND</label>
                                        <input type="number" id="ND" wire:model="ND" class="form-control @error('addMesure.ND') is-invalid @enderror" placeholder="ND" required="required" step="0.01">
                                        @error("addMesure.ND")
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="col">
                                    <label class="form-label">NS</label>
                                        <input type="number" id="NS" wire:model="NS" class="form-control @error('addMesure.NS') is-invalid @enderror" placeholder="NS" required="required" step="0.01">
                                        @error("addMesure.NS")
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    </div>
                                    <div class="form-row">
                                    <div class="col">
                                    <label class="form-label">Rab</label>
                                        <input type="number" wire:model="Rab"  class="form-control @error('Rab') is-invalid @enderror" placeholder="Rab" required="required" disabled>
                                        @error("Rab")
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>                                   
                                    <div class="col">
                                    <label class="form-label">Cs</label>
                                        <input type="number" wire:model="Cs" class="form-control @error('Cs') is-invalid @enderror" placeholder="Cs" required="required" disabled>
                                        @error("Cs")
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="col">
                                    <label class="form-label">Conspé</label>
                                        <input type="number" wire:model="Conspé" class="form-control @error('Conspé') is-invalid @enderror" placeholder="Conspé" required="required" disabled>
                                        @error("Conspé")
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="col">
                                    <label class="form-label">Agent</label>
                                        <input type="text" wire:model="addMesure.Agent" class="form-control @error('addMesure.Agent') is-invalid @enderror" placeholder="Agent" required="required">
                                        @error("addMesure.Agent")
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="col">
                                    <label class="form-label"> </label>
                                   <div class="col-lg-12 col-md-12 col-sm-12">
                                        <button type="submit" class="btn btn-primary">Enregistrer</button>
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
