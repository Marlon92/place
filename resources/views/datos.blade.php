<!DOCTYPE html>
<html lang="es">
<head>
<meta name="csrf_token" content="{ csrf_token() }" />
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, client-scalable=no, initial-scale=1, maximum-scale=1">
	<title>Martech's</title>
	<meta name="description" content="" />
	<link href='https://fonts.googleapis.com/css?family=Roboto:400,400italic,300italic,300,100italic,100,500,500italic,900italic,900,700' rel='stylesheet' type='text/css'>
	{{ Html::style('css/index.css') }}
	{{ Html::style('css/media.css') }}
	{{ Html::style('css/bootstrap.css')}}
	{{ Html::style('css/globals.css') }}
	{{ Html::script('js/jquery-3.1.1.js') }}
	<!--<link rel="stylesheet" href="public/bower_components/normalize.css/normalize.css" />
	<link rel="stylesheet" href="../public/css/modals.css" />
	<link rel="stylesheet" href="../public/css/globals.css" />
	<link rel="stylesheet" href="css/index.css" />
	<link rel="stylesheet" href="css/media.css" />
	<link rel="stylesheet" href="css/materialize.css" />
	<link rel="stylesheet" href="css/materialize.min.css" />
	<script src="js/materialize.js"></script>
	 <script src="js/materialize.min.js"></script>


	<!-- End Google Analytics -->
</head>
<body id="container">
<div id="app">
	<div class="relative">
		<header id="header">
			<div id="container-header-top">
				<div id="layout-header" class="relative">
					<div id="container-logo" class="inline-block-middle">
						<figure class="no-margin">
							<a href="{{ URL::to('/')}}">
								<img src="img/logom2.png" style="max-width: 40%;" alt="">
							</a>
						</figure>
					</div>
					<div class="inline-block-middle" id="icon-menu"><label class="icon-menu"></label></div>
						
					 </div>					
		</header>
		
<section id="sectionClients" style="margin: 0% 0% 22%">
		<h1>Lista de clientes</h1>
</script>

			  <div class="form-group">

			  		 <select class="form-control">
			  		 	@foreach($towns as $town)
			  		 	<option>{{$town->description}}</option>
			  		 	@endforeach		
			  		 </select>

			  		 <select class="form-control">
			  		 	@foreach($categories as $category)
			  		 	<option>{{$category->description}}</option>
			  		 	@endforeach		
			  		 </select>

              </div>
                  
<div class="container">
<div class="row">
<br>
				
		
	  </div>
  </div>

</section>	

		
	</div>
	</div>	
</body>
</html>
