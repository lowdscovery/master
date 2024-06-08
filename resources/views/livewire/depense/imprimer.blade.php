<html lang="en"><head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="{{mix("css/app.css")}}" />

<script defer="" referrerpolicy="origin" src="/cdn-cgi/zaraz/s.js?z=JTdCJTIyZXhlY3V0ZWQlMjIlM0ElNUIlNUQlMkMlMjJ0JTIyJTNBJTIyQWRtaW5MVEUlMjAzJTIwJTdDJTIwSW52b2ljZSUyMFByaW50JTIyJTJDJTIyeCUyMiUzQTAuMjU0MDc2MjA2NTEwNDI4MDYlMkMlMjJ3JTIyJTNBMTI4MCUyQyUyMmglMjIlM0E4MDAlMkMlMjJqJTIyJTNBNjc1JTJDJTIyZSUyMiUzQTEyODAlMkMlMjJsJTIyJTNBJTIyaHR0cHMlM0ElMkYlMkZhZG1pbmx0ZS5pbyUyRnRoZW1lcyUyRnYzJTJGcGFnZXMlMkZleGFtcGxlcyUyRmludm9pY2UtcHJpbnQuaHRtbCUyMiUyQyUyMnIlMjIlM0ElMjJodHRwcyUzQSUyRiUyRmFkbWlubHRlLmlvJTJGdGhlbWVzJTJGdjMlMkZwYWdlcyUyRmV4YW1wbGVzJTJGaW52b2ljZS5odG1sJTIyJTJDJTIyayUyMiUzQTI0JTJDJTIybiUyMiUzQSUyMlVURi04JTIyJTJDJTIybyUyMiUzQS0xMjAlMkMlMjJxJTIyJTNBJTVCJTVEJTdE"></script><script nonce="033d82fa-748f-4de2-a13d-b8ce40b8d76c">try{(function(w,d){!function(kL,kM,kN,kO){kL[kN]=kL[kN]||{};kL[kN].executed=[];kL.zaraz={deferred:[],listeners:[]};kL.zaraz.q=[];kL.zaraz._f=function(kP){return async function(){var kQ=Array.prototype.slice.call(arguments);kL.zaraz.q.push({m:kP,a:kQ})}};for(const kR of["track","set","debug"])kL.zaraz[kR]=kL.zaraz._f(kR);kL.zaraz.init=()=>{var kS=kM.getElementsByTagName(kO)[0],kT=kM.createElement(kO),kU=kM.getElementsByTagName("title")[0];kU&&(kL[kN].t=kM.getElementsByTagName("title")[0].text);kL[kN].x=Math.random();kL[kN].w=kL.screen.width;kL[kN].h=kL.screen.height;kL[kN].j=kL.innerHeight;kL[kN].e=kL.innerWidth;kL[kN].l=kL.location.href;kL[kN].r=kM.referrer;kL[kN].k=kL.screen.colorDepth;kL[kN].n=kM.characterSet;kL[kN].o=(new Date).getTimezoneOffset();if(kL.dataLayer)for(const kY of Object.entries(Object.entries(dataLayer).reduce(((kZ,k$)=>({...kZ[1],...k$[1]})),{})))zaraz.set(kY[0],kY[1],{scope:"page"});kL[kN].q=[];for(;kL.zaraz.q.length;){const la=kL.zaraz.q.shift();kL[kN].q.push(la)}kT.defer=!0;for(const lb of[localStorage,sessionStorage])Object.keys(lb||{}).filter((ld=>ld.startsWith("_zaraz_"))).forEach((lc=>{try{kL[kN]["z_"+lc.slice(7)]=JSON.parse(lb.getItem(lc))}catch{kL[kN]["z_"+lc.slice(7)]=lb.getItem(lc)}}));kT.referrerPolicy="origin";kT.src="/cdn-cgi/zaraz/s.js?z="+btoa(encodeURIComponent(JSON.stringify(kL[kN])));kS.parentNode.insertBefore(kT,kS)};["complete","interactive"].includes(kM.readyState)?zaraz.init():kL.addEventListener("DOMContentLoaded",zaraz.init)}(w,d,"zarazData","script");})(window,document)}catch(e){throw fetch("/cdn-cgi/zaraz/t"),e;};</script></head>
<body>
<div class="wrapper">

<section class="invoice">

<div class="row">
<div class="col-12">
<h2 class="page-header">
<button type="button" wire:click.prevent="cacheImpression()"><i class="fas fa-print"></i></button> JIRAMA
@foreach ($depenses as $depense) 
<small class="float-right">Date:{{ $depense->Date}}</small>
@endforeach
</h2>
</div>
</div>

<div class="row invoice-info">
<div class="col-sm-4 invoice-col">
From
<address>
<strong>Admin, Inc.</strong><br>
795 Folsom Ave, Suite 600<br>
San Francisco, CA 94107<br>
Phone: (804) 123-5432<br>
Email: info@almasaeedstudio.com
</address>
</div>

<div class="col-sm-4 invoice-col">
To
<address>
<strong>John Doe</strong><br>
795 Folsom Ave, Suite 600<br>
San Francisco, CA 94107<br>
Phone: (555) 539-1037<br>
Email: john.doe@example.com
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
    <td class="text-center">{{ $depense->Date}}</td>
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
<p class="lead">Payment Methods:</p>
<img src="../../dist/img/credit/visa.png" alt="Visa">
<img src="../../dist/img/credit/mastercard.png" alt="Mastercard">
<img src="../../dist/img/credit/american-express.png" alt="American Express">
<img src="../../dist/img/credit/paypal2.png" alt="Paypal">
<p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya handango imeem plugg dopplr
jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.
</p>
</div>

<div class="col-6">
<p class="lead">Amount Due 2/22/2014</p>
<div class="table-responsive">
<table class="table">
<tbody><tr>
<th style="width:50%">Subtotal:</th>
<td>$250.30</td>
</tr>
<tr>
<th>Tax (9.3%)</th>
<td>$10.34</td>
</tr>
<tr>
<th>Total:</th>
<td>$265.24</td>
</tr>
</tbody></table>
</div>
</div>

</div>

</section>

</div>


<script>
  window.addEventListener("load", window.print());
</script>


</body></html>