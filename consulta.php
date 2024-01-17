<?php include("seguridad.php"); ?>
<?php
    include_once("conexion.php");
    
    $sql = "SELECT * FROM usuarios ORDER BY nombre ASC";
    $result = $conex->prepare($sql);
    $result->execute();
    $row = $result->fetchAll();
    $tot_registros = $result->rowCount();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/menu.css">
    <title>Panel de Control</title>
</head>
<body>
    <header>
        <h2>UES San José del Rincón</h2>
        <input type="search" placeholder="¿A quién buscaremos hoy? ">
        <h3>Bienvenido Octavio Cruz Ramirez</h3>
    </header>

    <ul>
        <li><a href="#"><i class="fa fa-bars" aria-hidden="true"></i>1</a></li>
        <li><a href="#"><i class="fa fa-home" aria-hidden="true"></i>2</a></li>
        <li><a href="#"><i class="fa fa-plus" aria-hidden="true"></i>3</a></li>
        <li><a href="#"><i class="fa fa-users" aria-hidden="true"></i>4</a></li>
        <li><a href="logout.php"><i class="fa fa-power-off" aria-hidden="true"></i></a></li>
       
    </ul>


    <div class="contenedor">
        <h2>Usuarios Registrados</h2>
        <br>
        <h5>Total:<?php echo $tot_registros;?></h5>
        <h4><a href="alta_usuario.php">+ Nuevo Usuario</a></h4>
        <br>

        <table>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Genero</th>
                    <th>Domicilio</th>
                    <th>Nombre del Usuario</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach($row as $fila): ?>
                <tr>
                    <td><?php echo $fila['id_usuario'];?></td>
                    <td><?php echo $fila['nombre'];?></td>
                    <td><?php echo $fila['apellidos'];?></td>
                    <td><?php if ($fila['genero']=="M"){echo ("Masculino");}else{echo("Femenino");}?></td>
                    <td><?php echo $fila['domicilio'];?></td>
                    <td><?php echo $fila['usuario'];?></td>

                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>


 



    
</body>
</html>
