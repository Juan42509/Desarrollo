<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous"><link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <br><br><br>

    <a name="" id="" class="btn btn-primary" href="<?= base_url() ?>" role="button">Crear Nuevo Usuario</a>
    <br><br>
<table class="table table-ligth">
    <thead>
    <tr>
            <th><i class="fas fa-user"></i> Nombre</th>
            <th><i class="fas fa-envelope-square"></i> Email</th>
            <th><i class="fas fa-genderless"></i> Sexo</th>
            <th><i class="fas fa-briefcase"></i> Area</th>
            <th><i class="fas fa-file-spreadsheet"></i> Boletin</th>
            <th>Modificar</th>
            <th>Eliminar</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($users as $us): ?>
            <tr>
                <td><?= $us->nombre ?></td>  
                <td><?= $us->email ?></td>
                <td><?= $us->sexo == 'F' ? 'Femenino':'Masculino' ?></td>
                <td><?= $us->area ?></td>
                <td><?= $us->boletin == 1 ? 'Si': 'No' ?></td>
                <td><a href="<?= base_url() ?>?id=<?= $us->id ?>"><i class="fas fa-edit"></i></a></td>
                <td><a href="<?= base_url() ?>index.php/home/delete?id=<?= $us->id ?>"><i class="fas fa-trash-alt"></i></a></td>
            </tr>
        <?php endforeach ?>
    
    </tbody>
</table>
    
</div>
</body>
</html>