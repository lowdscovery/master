<div>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Comptable" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale1.0">
	<title>Inforamtion</title>
	<link rel="stylesheet" href="{{asset('css/information.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/print.css')}}">
</head>
<body>
	<div class="container">
		<div class="header">
		<div class="img-area">
			<img src="{{asset('storage/'.optional($selectedId)->photo)}}" style="width:100%; height:100%;">
		</div>
		<h1>{{optional($selectedId)->nom}} {{optional($selectedId)->prenom}}</h1>
		<h3>{{optional($selectedId)->service}}</h3>
		</div>
		<h2>Information Personnel</h2>
		<div class="main">
		<div class="left">
        <p><strong>Nom :</strong> {{optional($selectedId)->nom}}</p>
        <p><strong>Prenom :</strong> {{optional($selectedId)->prenom}}</p>
        <p><strong>Service :</strong> {{optional($selectedId)->service}}</p>
        <p><strong>Matricule :</strong> {{optional($selectedId)->matricule}}</p>
    
        
        <button onclick="window.print();" class="enregistrer" >Imprimer</button>
		</div>
		<div class="right">		
        	<p><strong>Sexe :</strong> {{optional($selectedId)->sexe}}</p>
        	<p><strong>Telephone :</strong> {{optional($selectedId)->telephone}}</p>
            <p><strong>Date d'embauche :</strong> {{optional($selectedId)->dateEmbauche}}</p>
		</div>
		</div>
	</div>
</body>
</html>

</div>