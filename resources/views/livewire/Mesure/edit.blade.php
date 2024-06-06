<div class="row p-3">

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
                                    <div class="form-group">
                                    <label class="form-label">Date</label>
                                        <input type="date" wire:model="Date" class="form-control @error('Date') is-invalid @enderror" placeholder="Nom" required="required">
                                        @error("Date")
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    </div>
                                    <div class="col">
                                    <div class="form-group">
                                    <label class="form-label">IndexCh</label>
                                        <input type="text" wire:model="IndexCH" class="form-control @error('IndexCH') is-invalid @enderror" placeholder="IndexCh" required="required">
                                        @error("IndexCH")
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    </div>
                                    <div class="col">
                                    <div class="form-group">
                                    <label class="form-label">H</label>
                                        <input type="number" wire:model="H" class="form-control @error('H') is-invalid @enderror" placeholder="H" required="required">
                                        @error("H")
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    </div>
                                    <div class="col">
                                    <div class="form-group">
                                    <label class="form-label">Tension U1</label>
                                        <input type="text" wire:model="U1" class="form-control @error('U1') is-invalid @enderror" placeholder="U1" required="required">
                                        @error("U1")
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    </div>
                                    <div class="col">
                                    <div class="form-group">
                                    <label class="form-label"> Tension U2</label>
                                        <input type="text" wire:model="U2" class="form-control @error('U2') is-invalid @enderror" placeholder="U2" required="required">
                                        @error("U2")
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    </div>
                                    </div>
                                    <div class="form-row">
                                    <div class="col">
                                    <div class="form-group">
                                    <label class="form-label"> Tension U3</label>
                                        <input type="text" wire:model="U3" class="form-control @error('U3') is-invalid @enderror" placeholder="U3" required="required">
                                        @error("U3")
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    </div>
                                    <div class="col">
                                    <div class="form-group">
                                    <label class="form-label">Intensité I1</label>
                                        <input type="text" wire:model="I1" class="form-control @error('I1') is-invalid @enderror" placeholder="I1" required="required">
                                        @error("I1")
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    </div>
                                    <div class="col">
                                    <div class="form-group">
                                    <label class="form-label">Intensité I2</label>
                                        <input type="text" wire:model="I2" class="form-control @error('I2') is-invalid @enderror" placeholder="I2" required="required">
                                        @error("I2")
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    </div>
                                    <div class="col">
                                    <div class="form-group">
                                    <label class="form-label">Intensité I3</label>
                                        <input type="text" wire:model="I3" class="form-control @error('I3') is-invalid @enderror" placeholder="I3" required="required">
                                        @error("I3")
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    </div>
                                    <div class="col">
                                    <div class="form-group">
                                    <label class="form-label">Puissance</label>
                                        <input type="number" wire:model="Puissance" class="form-control @error('Puissance') is-invalid @enderror" placeholder="Puissance" required="required">
                                        @error("Puissance")
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    </div>
                                    </div>
                                    <div class="form-row">
                                    <div class="col">
                                    <div class="form-group">
                                    <label class="form-label">Cos</label>
                                        <input type="text" wire:model="Cos" class="form-control @error('Cos') is-invalid @enderror" placeholder="Cos" required="required">
                                        @error("Cos")
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    </div>
                                    <div class="col">
                                    <div class="form-group">
                                    <label class="form-label">Ph1/PH2</label>
                                        <input type="text" wire:model="Ph1_PH2" class="form-control @error('Ph1_PH2') is-invalid @enderror" placeholder="Ph1/PH2" required="required">
                                        @error("Ph1_PH2")
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    </div>
                                    <div class="col">
                                    <div class="form-group">
                                    <label class="form-label">Ph1/PH3</label>
                                        <input type="text" wire:model="Ph1_PH3" class="form-control @error('Ph1_PH3') is-invalid @enderror" placeholder="Ph1/PH3" required="required">
                                        @error("Ph1_PH3")
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    </div>
                                    <div class="col">
                                    <div class="form-group">
                                    <label class="form-label">Ph2/PH3</label>
                                        <input type="text" wire:model="Ph2_PH3" class="form-control @error('Ph2_PH3') is-invalid @enderror" placeholder="Ph2/PH3" required="required">
                                        @error("Ph2_PH3")
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    </div>
                                    <div class="col">
                                    <div class="form-group">
                                    <label class="form-label">Ph1/m</label>
                                        <input type="text" wire:model="Ph1_m" class="form-control @error('Ph1_m') is-invalid @enderror" placeholder="Ph1/m" required="required">
                                        @error("Ph1_m")
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    </div>
                                    </div>
                                    <div class="form-row">
                                    <div class="col">
                                    <div class="form-group">
                                    <label class="form-label">Ph2/m</label>
                                        <input type="text" wire:model="Ph2_m" class="form-control @error('Ph2_m') is-invalid @enderror" placeholder="Ph2/m" required="required">
                                        @error("Ph2_m")
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    </div>
                                    <div class="col">
                                    <div class="form-group">
                                    <label class="form-label">Ph3/m</label>
                                        <input type="text" wire:model="Ph3_m" class="form-control @error('Ph3_m') is-invalid @enderror" placeholder="Ph3/m" required="required">
                                        @error("Ph3_m")
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    </div>
                                    <div class="col">
                                    <div class="form-group">
                                    <label class="form-label">X1/X2</label>
                                        <input type="text" wire:model="X1_X2" class="form-control @error('X1_X2') is-invalid @enderror" placeholder="X1/X2" required="required">
                                        @error("X1_X2")
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    </div>
                                    <div class="col">
                                    <div class="form-group">
                                    <label class="form-label">Y1/Y2</label>
                                        <input type="text" wire:model="Y1_Y2" class="form-control @error('Y1_Y2') is-invalid @enderror" placeholder="Y1/Y2" required="required">
                                        @error("Y1_Y2")
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    </div>
                                    <div class="col">
                                    <div class="form-group">
                                    <label class="form-label">Z1/Z2</label>
                                        <input type="text" wire:model="Z1_Z2" class="form-control @error('Z1_Z2') is-invalid @enderror" placeholder="Z1/Z2" required="required">
                                        @error("Z1_Z2")
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    </div>
                                    </div>
                                    <div class="form-row">
                                    <div class="col">
                                    <div class="form-group">
                                    <label class="form-label">Debit</label>
                                        <input type="number" wire:model="Debit" class="form-control @error('Debit') is-invalid @enderror" placeholder="Debit" required="required">
                                        @error("Debit")
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    </div>
                                    <div class="col">
                                    <div class="form-group">
                                    <label class="form-label">Vacuo</label>
                                        <input type="text" wire:model="Vacuo" class="form-control @error('Vacuo') is-invalid @enderror" placeholder="Vacuo" required="required">
                                        @error("Vacuo")
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    </div>
                                    <div class="col">
                                    <div class="form-group">
                                    <label class="form-label">Mano</label>
                                        <input type="text" wire:model="Mano" class="form-control @error('Mano') is-invalid @enderror" placeholder="Mano" required="required">
                                        @error("Mano")
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    </div>
                                    <div class="col">
                                    <div class="form-group">
                                    <label class="form-label">ND</label>
                                        <input type="number" wire:model="ND" class="form-control @error('ND') is-invalid @enderror" placeholder="ND" required="required">
                                        @error("ND")
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    </div>
                                    <div class="col">
                                    <div class="form-group">
                                    <label class="form-label">NS</label>
                                        <input type="number" wire:model="NS" class="form-control @error('NS') is-invalid @enderror" placeholder="NS" required="required">
                                        @error("NS")
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    </div>
                                    </div>
                                    <div class="form-row">
                                    <div class="col">
                                    <div class="form-group">
                                    <label class="form-label">Agent</label>
                                        <input type="text" wire:model="Agent" class="form-control @error('Agent') is-invalid @enderror" placeholder="Agent" required="required">
                                        @error("Agent")
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="col">
                                    <div class="form-group">
                                    <label class="form-label"> </label>
                                   <div class="col-lg-12 col-md-12 col-sm-12">
                                        <button type="submit" class="btn btn-primary">Modifier</button>
                                        <button type="button" class="btn btn-info" wire:click="CacheInput()">Retour</button>
									</div>
                                    </div>
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
