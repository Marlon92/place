<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script src="js/jquery.amaran.min.js"></script>
<!-- <script src="js/validar_registro.js"></script>  -->
<!-- <script type="text/javascript" src="assets/OTROS/bootstrap/bootstrap.min.js"></script> -->
@extends('template.masterRegister')
@section('formulario')
<form id="form_register" class="form-horizontal" novalidate>

    <div class="form-group">
    <div class="alert alert-danger text-center" style="display:none;" id="error">
        <strong>Adventencia: </strong>Debe completar todos los campos
    </div>
    <div class="alert alert-success text-center" style="display:none;" id="exito">
        <strong>Felicidades: </strong>Su registro ha sido guardado
    </div>  
        <label class="control-label col-xs-3">Nombre Empresa:</label>
        <div class="col-xs-9">
            <input type="text" class="form-control" placeholder="Nombre Empresa" id="empresa" required>
            <span class="help-block"></span>
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-xs-3">Email:</label>
        <div class="col-xs-9">
            <input type="email" class="form-control"  placeholder="Email" id="email" required>
            <span class="help-block"></span>
        </div>
    </div>
     <div class="form-group">
        <label class="control-label col-xs-3">Contraseña:</label>
        <div class="col-xs-9">
            <input type="password" class="form-control"  placeholder="Contraseña" id="password" required>
             <span class="help-block"></span>

         <div class="col-xs-9">
            <br><label>Seguridad de la contraseña</label>
            <ul class="strength">
               <li class="1"></li>
               <li class="2"></li>
               <li class="3"></li>
               <li class="4"></li>
               <li class="5"></li>
           </ul>
           <div id="comment"></div>
       </div>
        </div>

    </div>
 <div class="form-group">
        <label class="control-label col-xs-3">Confirmar Contraseña:</label>
        <div class="col-xs-9">
            <input type="password" class="form-control" placeholder="Confirmar Contraseña" id="confirmpassword" required>
            <span class="help-block"></span>
        </div>
    </div>

       <div class="form-group">
        <label class="control-label col-xs-3" >Dirección:</label>
        <div class="col-xs-9">
            <input type="text" class="form-control" placeholder="Dirección" id="direccion" required>
             <span class="help-block"></span>
        </div>
    </div>
    
    <div class="form-group">
        <label class="control-label col-xs-3" >Teléfono 1:</label>
        <div class="col-xs-9">
            <input type="number" class="form-control" placeholder="Teléfono 1" id="tel1" required>
            <span class="help-block"></span>
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-xs-3" >Teléfono 2:</label>
        <div class="col-xs-9">
            <input type="number" class="form-control" placeholder="Teléfono 2" id="tel2">
            <span class="help-block"></span>
        </div>
    </div>

<div class="form-group">
        <label class="control-label col-xs-3" >Sitio Web:</label>
        <div class="col-xs-9">
            <input type="url" class="form-control" placeholder="Sitio Web" id="sitioweb">
            <span class="help-block"></span>
        </div>
    </div>

<div class="form-group">
        <label class="control-label col-xs-3" >Descripción de la empresa:</label>
        <div class="col-xs-9">
            <textarea class="form-control" rows="3" placeholder="Descripción de la empresa" id="descripcion" required></textarea>  
            <span class="help-block"></span>
        </div>
    </div>

<div class="form-group">
        <label class="control-label col-xs-3">Municipio:</label>
      
        <div class="col-xs-9">
          <select class="form-control" id="municipio" required>
            <option value="">Seleccione uno</option>
            <option value="1">Retalhuleu</option>
            <option value="2">San Sebastian</option>
            <option value="3">El Asintal</option>
            <option value="4">Santa Cruz Mulua</option>
            <option value="5">San Felipe</option>
            <option value="6">San Martin Zapotitlan</option>
            <option value="7">San Andres Villa Seca</option>
            <option value="8">Champerico</option>
            <option value="9">Nuevo San Carlos</option>
          </select>
        </div>
    </div>


<div class="form-group">
        <label class="control-label col-xs-3">Categoria:</label>

        <div class="col-xs-2">
            <label class="checkbox-inline";">
                <input type="checkbox" name="categorias" value="1" id="chkHotel" class="chkcategoria" data-valor="1" > Hotel
            </label>
        </div>

        <div class="col-xs-2">
            <label class="checkbox-inline">
                <input type="checkbox" name="categorias" value="2" id="chkRestaurante" class="chkcategoria" data-valor="2"> Restaurante
            </label>
        </div>

        <div class="col-xs-2">
            <label class="checkbox-inline" >
                <input type="checkbox" name="categorias" value="3" id="chkSitioTuristico" class="chkcategoria" data-valor="3"> Sitio Turistico
            </label>
        </div>

        <span class="help-block"></span> 

    </div>

    <div class="form-group">
        <label class="control-label col-xs-3">Latitud:</label>
        <div class="col-xs-9">
            <input type="number" class="form-control" placeholder="Latitud"  id="lat" required>
                    <span class="help-block"></span> 
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-3">Longitud:</label>
        <div class="col-xs-9">
            <input type="number" class="form-control" placeholder="Longitud" id="long" required>
                    <span class="help-block"></span> 
        </div>
    </div> 
    <div class="form-group"> 
        <label class="control-label col-xs-3">Foto:</label> <!-- ME HACE FALTA VALIDAR ESTE-->
        <div class="col-xs-9">
             <input id="photo" type="file" name="photo" class="form-control" required>
        </div>
    </div> 
 <div class="form-group">
        <div class="col-xs-offset-3 col-xs-9">
            <label class="checkbox-inline">
                <input type="checkbox" value="agree"  id="chkTerminos" required >  Acepto <a href="#">Terminos y condiciones</a>.
            </label>
        </div>
    </div> 
    <br>
    <div id="form">
          </div>
    <div class="form-group">
        <div class="col-xs-offset-3 col-xs-9">
            <input type="button" type="submit" class="btn btn-primary"  value="Enviar"  id="enviar">
            <input type="reset" class="btn btn-default" value="Limpiar">
        </div>
    </div>
</form>
@stop

<STYLE type="text/css">
ul.strength { list-style: none; padding: 0;}
ul.strength li { width: 20px; height: 5px; background: #ddd; float: left; margin: 0 2px;}
</STYLE>

<script type="text/javascript">
    $(document).ready(function () {
       $("#password").keyup(function () {
           var input = $(this).val();
           var res = strongCheck(input);


           if (res <= 0) {
                $("#comment").html("Demasiado corta!");
                $("ul.strength li").css("background-color", "#ddd");
            }
            else if (res == 1) {
                $("#comment").html("Muy Débil!");
                $("ul.strength li").css("background-color", "#ddd");
                $("ul.strength li.1").css("background-color", "#F22");
            }
            else if (res == 2) {
                $("#comment").html("Débil!");
                $("ul.strength li").css("background-color", "#ddd");
                for(var i=1; i<=res; i++){
                    $("ul.strength li."+i).css("background-color", "#FF6922");
                }
            }
            else if (res == 3) {
                $("#comment").html("Buena!");
                $("ul.strength li").css("background-color", "#ddd");
                for(var i=1; i<=res; i++){
                    $("ul.strength li."+i).css("background-color", "#FFE422");
                }
            }
            else if (res == 4) {
                $("ul.strength li").css("background-color", "#ddd");
                $("#comment").html("Fuerte!");
                for(var i=1; i<=res; i++){
                    $("ul.strength li."+i).css("background-color", "#A7E623");
                }
            }
            else{
                $("ul.strength li").css("background-color", "#ddd");
                $("#comment").html("Muy Fuerte!");
                for(var i=1; i<=res; i++){
                    $("ul.strength li."+i).css("background-color", "#21A300");
                }
            }
       });

    });
    function strongCheck (password) {
        
        var strength = 0;
        //if the password length is less than 6, return message.
        if (password.length < 6) { 
           return 0;
        }
        else{
           strength += 1;
            
           //if password contains both lower and uppercase characters, increase strength value
           if (password.match(/([a-z].*[A-Z])|([A-Z].*[a-z])/))  strength += 1;
    
           //if it has numbers and characters, increase strength value
           if (password.match(/([a-zA-Z])/) && password.match(/([0-9])/))  strength += 1 ;
                
           //if it has one special character, increase strength value
           if (password.match(/([!,%,&,@,#,$,^,*,?,_,~])/))  strength += 1;
        
           //if it has two special characters, increase strength value
           if (password.match(/(.*[!,%,&,@,#,$,^,*,?,_,~].*[!,%,&,@,#,$,^,*,?,_,~])/)) strength += 1;
           return strength;
        }
}
</script>

<script>
    $(document).ready(function($)
    {    
        // $('#enviar').on('click', crearDetalleRegistro);
     /*$("#form_register").validate({
      rules: {
        name: "required",
        email: {
          required: true,
          email: true
        }
      }, 
     submitHandler: function(form) {

        console.log("aasdfasdfasdfas");

         var idcategoria=new Array();
          $('input.chkcategoria:checkbox:checked').each(function (index, value) {
          idcategoria.push($(this).data('valor'));
         });
                datos = {
                  'name':        $('#empresa').val(),
                  'password':    $('#password').val(),
                  'address':     $('#direccion').val(),
                  'website':     $('#sitioweb').val(),
                  'description': $('#descripcion').val(),
                  'idtown':      $('#municipio').val(), //'1', 
                  'lat':         $('#lat').val(),
                  'lon':         $('#long').val(),
                  'cel1':        $('#tel1').val(),
                  'cel2':        $('#tel2').val(),
                  'email':       $('#email').val()
                };

                data=JSON.stringify(datos);
                idcategorias=JSON.stringify(idcategoria);

                var formData= new FormData(); 
                formData.append("photo",$("#photo")[0].files[0]);
                formData.append("data",data);
                formData.append("idcategory", idcategorias);

                console.log($("#photo")[0].files[0]);
               $.ajax(
                {
                    type: "POST",
                    url: "ws/places",
                    data: formData,
                    contentType: false,
                    processData: false,
                    
                    success: function( json )
                    {
                        if( json.result )
                        {
                          console.log("guardado")
                          $.amaran({'message':'Guardado!'});c
                        }
                        else
                        {
                          console.log("no guardado")
                          console.log(json.message);
                          console.log(json.records); 
                        }
                        
                        
                    },
                    error: function( data )
                    {   
                        console.log(data.records);
                    }   
                });

                jQuery.extend(jQuery.validator.messages, {
                  required: "Este campo es obligatorio.",
                  email: "Por favor ingrese un email válido",
                  number: "Por favor ingrese un numero valido.",
                  digits: "Por favor ingrese solo numeros",
                });
          }

      });*/


      $('#enviar').on('click', function(){
        

         var idcategoria=new Array();
          $('input.chkcategoria:checkbox:checked').each(function (index, value) {
          idcategoria.push($(this).data('valor'));
         });
                datos = {
                  'name':        $('#empresa').val(),
                  'password':    $('#password').val(),
                  'address':     $('#direccion').val(),
                  'website':     $('#sitioweb').val(),
                  'description': $('#descripcion').val(),
                  'idtown':      $('#municipio').val(), //'1', 
                  'lat':         $('#lat').val(),
                  'lon':         $('#long').val(),
                  'cel1':        $('#tel1').val(),
                  'cel2':        $('#tel2').val(),
                  'email':       $('#email').val()
                };

                data=JSON.stringify(datos);
                idcategorias=JSON.stringify(idcategoria);

                var formData= new FormData(); 
                formData.append("photo",$("#photo")[0].files[0]);
                formData.append("data",data);
                formData.append("idcategory", idcategorias);

                console.log($("#photo")[0].files[0]);
               $.ajax(
                {
                    type: "POST",
                    url: "ws/places",
                    data: formData,
                    contentType: false,
                    processData: false,
                    
                    success: function( json )
                    {
                        if( json.result )
                        {
                          console.log("guardado")
                          $.amaran({'message':'El registro se guardó correctamente!'});
                        }
                        else
                        {
                          console.log("no guardado")
                          $.amaran({'message':'El registro no se pudo guardar!'});
                        }
                        
                        
                    },
                    error: function( data )
                    {   
                        console.log(data.records);
                        $.amaran({'message':'Lo sentimos, ocurrió un error'});
                    }   
                });

          });
      

        $("#form_register").on('submit', function(e){  
              e.preventDefault();
        });



   });

</script>