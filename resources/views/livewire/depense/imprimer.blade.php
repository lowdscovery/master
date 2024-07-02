<div class="content pt-2">

<div class="container-fluid">
<div class="row">
<div class="col-12">

<div class="invoice p-3 mb-3">

<div class="row">
<div class="col-12">
<h4>
<img src="{{asset("image/jiro.jpg")}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="height:50px;opacity:1;" width="50"> <span style="color:#FF4900;">JI</span>RO SY <span style="color:#FF4900;">RA</span>NO <span style="color:#FF4900;">MA</span>LAGASY
<small class="float-right">Date: {{date('d-m-Y',strtotime($today))}}</small>
</h4>
</div>

</div>

<div class="row invoice-info">
<div class="col-sm-4 invoice-col">
<h5><strong>J</strong>irama <strong>M</strong>ahajanga</h5>
<address>
Water Production And Distribution<br>
Water Production<br>
</address>
</div>

<div class="col-sm-4 invoice-col">
<address>
<br>
<h3><strong>DEPENSE ENGAGE</strong><br></h3>
</div>
</div>


<div class="row">
<div class="col-12 table-responsive">
<table class="table table-striped">
<thead>
<tr>
<th class="text-center"> Date</th>
<th class="text-center"> Motif</th>
<th class="text-center"> Designation</th>
<th class="text-center"> Unite</th>
<th class="text-center"> Prix Unitaire</th>
<th class="text-center"> Quantite</th>
<th class="text-center"> Total</th>
</tr>
</thead>
<tbody>
@foreach ($depenses as $depense)      
<tr>
    <td class="text-center">{{date('d-m-Y',strtotime($depense->Date))}}</td>
    <td class="text-center">{{ $depense->Motif}}</td>
    <td class="text-center">{{ $depense->Designation}}</td>
    <td class="text-center">{{ $depense->Unite}}</td>
    <td class="text-center">{{ $depense->PrixUnitaire}}</td>
    <td class="text-center">{{ $depense->Quantite}}</td>
    <td class="text-center">{{ $depense->Total}}</td>
</tr>
@endforeach
</tbody>
</table>
</div>

</div>

<div class="row">

<div class="col-6">
<p class="lead"> </p>
<img src="{{asset("image/jiro.jpg")}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="height:50px;opacity:1;" width="50"> <span style="color:#FF4900;">JI</span>RO SY <span style="color:#FF4900;">RA</span>NO <span style="color:#FF4900;">MA</span>LAGASY
</div>

<div class="col-6">
<p class="lead"> </p>
<div class="table-responsive">
<table class="table">
<tbody>
<tr>
<th class="text-center"> </th>
<td class="text-center"> </td>
<th class="text-center"> </th>
<td class="text-center"> </td>
<th class="text-center">Total:</th>
<td class="text-center" style="width:22%;">{{$totalSum}}</td>
</tr>
</tbody></table>
</div>
</div>

</div>


<div class="row no-print">
<div class="col-12">
<a href="" rel="noopener" target="_blank" class="btn btn-default" wire:click.prevent="cacheImpression()"><i class="fas fa-print"></i> Retour vers la liste</a>
</div>
</div>
</div>

</div>
</div>
</div>

</div>
<script>
  window.addEventListener("load", window.print());
</script>
