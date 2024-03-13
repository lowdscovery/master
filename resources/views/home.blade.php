@extends("layouts.principal")

@section("contenu")
  <div class="row">
    <div class="col-12 p-3">
        <div class="jumbotron">
                <h1 class="display-5">Bienvenu, <strong>{{userFullName()}} </strong></h1>
               
                <p class="lead">Jirama est la société nationale d'eau et d'électricité à Madagascar. Créer en 1975,
                 son nom est l'acronyme de "Jiro sy Rano Malagasy", qui signifie "Electricité et Eau Malgache" en malgache.
                 La Jirama est responsable de la production, de la distribution et de la gestion de l'approvisionnement en 
                 électricité et en eau potable dans le pays.
                 <img src="{{asset('image/sar.jpg')}}" style="width:32%; height:300px;">
                 <img src="{{asset('image/sary.jpg')}}" style="width:32%; height:300px;">
                 <img src="{{asset('image/sary.jpg')}}" style="width:32%; height:300px;">
                 </p>

                <hr class="my-4">
                <p class="display-6" style="arial">Cependant, la Jirama a souvent été critiquée pour divers problèmes,notamment les coupures fréquentes
                d'électricité, les pénuries d'eau, la vétusté des infrastructures, et des défis financiers importants. Ces
                problèmes ont un impact direct sur la vie quotidienne des Malgaches et sur le développement économique du pays.</p>
                <p>Des efforts sont en cours pour réformer et améliorer les services de la Jirama, avec l'appui de partenaires
                internationaux et de projets d'investissement pour moderniser les infrastructures et améliorer la gestion</p>
                <a class="btn btn-primary btn-lg" href="#" role="button">En savoir plus</a>
        </div>
    </div>
</div>
@endsection