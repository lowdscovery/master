<div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
		<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Comptable" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale1.0">
	<link rel="stylesheet" href="{{asset('css/information.css')}}">
</head>
<body>
	<div class="container">
		<div class="header">
		<div class="img-area">
			<img src="{{asset(optional($selectedId)->photo)}}" style="width:100%; height:100%;">
		</div>
		<h1>{{optional($selectedId)->nom}} {{optional($selectedId)->prenom}}</h1>
		<h3>{{optional($selectedId)->service}}</h3>
		</div>
		<h4>Information Personnel</h4>
		<div class="main">
		<div class="left">
        <p><strong>Nom :</strong> {{optional($selectedId)->nom}}</p>
        <p><strong>Prenom :</strong> {{optional($selectedId)->prenom}}</p>
        <p><strong>Service :</strong> {{optional($selectedId)->service}}</p>
        <p><strong>Matricule :</strong> {{optional($selectedId)->matricule}}</p>
    
		</div>
		<div class="right1">		
        	<p><strong>Sexe :</strong> {{optional($selectedId)->sexe}}</p>
        	<p><strong>Telephone :</strong> {{optional($selectedId)->telephone}}</p>
            <p><strong>Embauché :</strong> {{date('d-m-y',strtotime(optional($selectedId)->dateEmbauche))}}</p>
		</div>
		</div>
	</div>
</body>
</html>

    </div>
  </div>







