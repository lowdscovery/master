@extends("layouts.principal")

@section("contenu")
  <div class="row">
    <div class="col-12 p-3">
        <div class="jumbotron">
                 <div class="pb-2" style="margin-top:-20px;">        
                 <img src="{{asset('image/couleur2.jpg')}}" style="width:30%; height:300px; border-radius:20px;margin-right:20px;">
                 <img src="{{asset('image/images.jfif')}}" style="width:30%; height:300px; border-radius:20px;margin-right:20px;">
                 <img src="{{asset('image/eferalgant.jpg')}}" style="width:30%; height:300px; border-radius:20px;">
                 </div>
                 <img src="{{asset('image/docteur1.jpeg')}}" style="width:30%; height:300px; border-radius:20px;margin-right:20px;">
                 <img src="{{asset('image/docteur2.jpg')}}" style="width:30%; height:300px; border-radius:20px;margin-right:20px;">
                 <img src="{{asset('image/docteur3.png')}}" style="width:30%; height:300px; border-radius:20px;">
          
        </div>
    </div>
</div>
@endsection