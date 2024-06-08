@if ($imprimer)
 @include("livewire.depense.imprimer") 
@else
  
<div class="content pt-2" style="min-height: 1604.8px;">
<section class="content">
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
149
<address>
Rue Rainandriamampandry<br>
BP : 200<br>
NIF 1 000 000 704<br>
Statique N° 36003 11 1957 0 1005<br>
RCS 2004 B 00 553
</address>
</div>

<div class="col-sm-4 invoice-col">
To
<address>
<strong>John Doe</strong><br>
795 Folsom Ave, Suite 600<br>
Commune : Mahajanga<br>
Phone: 555 539-1037<br>
Email: jirama@gmail.com
</address>
</div>

<div class="col-sm-4 invoice-col">
<b>Invoice #007612</b><br>
<br>
<b>Order ID:</b> 4F3S8J<br>
<b>Payment Due:</b> 2/22/2014<br>
<b>Account:</b> 968-34567
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
<p class="lead"></p>
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
<a href="" rel="noopener" target="_blank" class="btn btn-default" wire:click.prevent="showImprimer()"><i class="fas fa-print"></i> Imprimer</a>
</div>
</div>
</div>

</div>
</div>
</div>
</section>
</div>
@endif