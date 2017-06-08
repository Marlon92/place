<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/index.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.14.0/jquery.validate.min.js"></script>
<link rel="stylesheet" href="css/amaran.min.css">

<!-- <script type="text/javascript" src="assets/OTROS/bootstrap/bootstrap.min.js"></script> -->
<title>Formulario Registro</title>
<meta name="viewport" content="initial-scale=1.0">
<meta charset="utf-8">
<style>
  html, body {
    height: 100%;
    margin: 0;
    padding: 0;
  }
  /*#map {
    height: 100%;
  }
  */#coords{width: 500px;}
</style>
</head>

<body>
<header>
</header>
<div style=" width: 50%; padding: 25px; float: left">@yield('formulario')</div>

<!-- <input type="text" id="coords"/> -->
<!--  <input type="button" onclick="initMap()" value="Mostrar Mapa"> -->
<div id="map" style="width:500px; height:500px; "></div>


<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDiebDltiyguWhRnmCXzX78pYQIEmUvaPc&callback=initMap" async defer></script>
<script>
  var marker;          //variable del marcador
var coords = {};    //coordenadas obtenidas con la geolocalización
//Funcion principal
initMap = function () 
{
     navigator.geolocation.getCurrentPosition(
      function (position){
        coords =  {
          //lng: -91.68333,
          //lat: 14.53333,
          lat: position.coords.latitude,
          lng: position.coords.longitude,
        };
        setMapa(coords);  //pasamos las coordenadas al metodo para crear el mapa
      },function(error){console.log(error);});
}
function setMapa (coords)
{   //Se crea una nueva instancia del objeto mapa
  var map = new google.maps.Map(document.getElementById('map'),
  {
    zoom: 13,
    center: new google.maps.LatLng(coords.lat,coords.lng),
  });
  //Creamos el marcador en el mapa con sus propiedades
  //para nuestro obetivo tenemos que poner el atributo draggable en true
  //position pondremos las mismas coordenas que obtuvimos en la geolocalización
  marker = new google.maps.Marker({
    map: map,
    draggable: true,
    animation: google.maps.Animation.DROP,
    position: new google.maps.LatLng(coords.lat,coords.lng),
  });
  //agregamos un evento al marcador junto con la funcion callback al igual que el evento dragend que indica 
  //cuando el usuario a soltado el marcador
  marker.addListener('click', toggleBounce);
  marker.addListener( 'dragend', function (event)
  {//escribimos las coordenadas de la posicion actual del marcador dentro del input #coords
    //$('#lat').html(this.getPosition().lat());
          document.getElementById("lat").value = this.getPosition().lat();
          document.getElementById("long").value = this.getPosition().lng();

    //document.getElementById("coords").value = this.getPosition().lat()+","+ this.getPosition().lng();
  });
} //callback al hacer clic en el marcador lo que hace es quitar y poner la animacion BOUNC
function toggleBounce() {
if (marker.getAnimation() !== null) {
marker.setAnimation(null);
} else {
marker.setAnimation(google.maps.Animation.BOUNCE);
}
}</script>
  <!--   <script src="js/validar_registro.js"></script> -->


</body>
</html>