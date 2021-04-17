<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prueba PHP</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="crossorigin="anonymous"></script>
	<script src="<?= base_url() ?>public/jquery-validate/dist/jquery.validate.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
</head>

<body>
    <div class="container">
		<?php if(isset($user)): ?>
			<h1>Editar Usuario</h1>
			<?php $base =  base_url().'index.php/home/edit?id='.$user->id ?>
		<?php else: ?>
        	<h1>Crear Empleado</h1>
			<?php  base_url().'index.php/home/save' ?>
        <?php endif; ?>
			<div class="alert alert-info" role="alert">
            Los campos con asteriscos (*) son obligatorios
        </div>

        <form id="formulario" action="<?= $base ?>"  method="POST">
		<input type="hidden" value="<?= $user->id ?>" name="id">
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label"><strong>Nombre Completo *</strong></label>
                <div class="col-sm-10">
                    <input type="text" name="nombre_completo" class="form-control" value="<?= isset($user) ? $user->nombre:'' ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword" class="col-sm-2 col-form-label"><strong>Correo Electronico *</strong></label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" name="email" value="<?= isset($user) ? $user->email:'' ?>">
                </div>
            </div>

            <fieldset class="form-group">
                <div class="row">
                    <legend class="col-form-label col-sm-2 pt-0 text-right"><strong>Sexo *</strong></legend>
                    <div class="col-sm-10">
                        <div class="form-check">
                            <label class="form-check-label" for="masculino">
                            <input class="form-check-input" type="radio" value="M" name="sexo" id="masculino" >Masculino 
                            </label>
                            <br>
                            <label class="form-check-label" for="femenino">
                            <input class="form-check-input" type="radio" name="sexo" value="F" id="femenino" >Femenino
                            </label>
                        </div>
                    </div>
                </div>
            </fieldset>
            <div class="form-group row">
                <label for="inputPassword" class="col-sm-2 col-form-label text-right"><strong>Area *</strong></label>
                <div class="col-sm-10">
                    <select id="Select" class="form-control" name="area">
                        <option></option>
                        <?php foreach($area as $dat): ?>
                            <option value="<?= $dat->id ?>" ><?= $dat->nombre ?></option>
                        <?php endforeach; ?>    
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label text-right"><strong>Descripción *</strong></label>
                <div class="col-sm-10">
                    <textarea class="form-control" id="" rows="3" name="descripcion" value=""><?= $user->descripcion ?></textarea>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-10 ml-4">
                    <input class="form-check-input position-static" type="checkbox" id="blankCheckbox" value="1" name="boletin" style="margin-left: 168px;">
                    <label for="">Deseo recibir boletin informativo</label><br>
                </div>                
            </div>                

            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label text-right"><strong>Roles *</strong></label>
                <div class="col-sm-9 ml-4">
                    <br>
                    <?php foreach($roles as $rol): ?>
                        <input class="form-check-input position-static" type="checkbox" id="blankCheckbox" value="<?= $rol->id ?>" name="rol">
                        <label for="" ><?= $rol->nombre ?></label>
                        <br>
                    <?php endforeach ?>    
                </div>
            </div>
            <button type="submit" id="btnguardar" class="btn btn-primary">Guardar</button>
        </form>
 <br>
        <a class="btn btn-success"  href="<?= base_url() ?>index.php/Home/usuarios" role="button">Ver usuarios</a>
    </div>
</body>
</html>

<script type="text/javascript">
    $(document).ready(function(){
        $('#btnguardar').click(function(e){
            // e.preventDefault();

            $('#formulario').validate({
                rules:{
                    nombre_completo: {required: true},
                    email: {required: true, email: true, minlength: 8, maxlength: 80},
                    sexo: {required: true},
                    area: {required:true},
                    descripcion: {required: true, minlength: 10, maxlength: 100},
                    rol: {required: true}

                },
                messages:{
                    nombre_completo:{
                        required: '<div class="alert alert-danger" role="alert"> El campo es requerido</div>',
                    },
                    email: {
                        required: '<div class="alert alert-danger" role="alert"> El campo es requerido</div>', 
                        email: '<div class="alert alert-danger" role="alert"> El formato de email es incorrecto</div>',
                        maxlength: '<div class="alert alert-danger" role="alert"> El maximo permitido son 80 caracteres</div>'
                    },
                    sexo:{
                        required: '<div class="alert alert-danger" role="alert" > El campo es requerido</div>'
                    },
                    area:{
                        required: '<div class="alert alert-danger" role="alert" > El campo es requerido</div>'
                    },
                    descripcion:{
                        required: '<div class="alert alert-danger" role="alert"> El campo es requerido</div>', 
                        minlength: '<div class="alert alert-danger" role="alert"> El minimo permitido son 10 caracteres</div>',
                        maxlength: '<div class="alert alert-danger" role="alert"> El maximo permitido son 100 caracteres</div>'
                    },
                    rol: {
                        required: '<div class="alert alert-danger" role="alert"> El campo es requerido</div>'
                    }
                }
            })
        });
    });
</script>