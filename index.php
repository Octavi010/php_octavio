<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/estilos_formulario.css">
</head>
<body>
    
    <?php

    $nombreErr ="";
    $nombre = "";
    $apellidosErr ="";
    $apellidos ="";
    $domicilioErr ="";
    $domicilio ="";
    $usuarioErr ="";
    $usuario ="";
    $contrasenaErr ="";
    $contrasena ="";

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if(empty($_POST["nombre"])){
            $nombreErr = "El campo nombre es requerido";
        }else{
            $nombre = test_input($_POST["nombre"]);
            
            if(!preg_match("/^[a-zA-Z-' ]*$/", $nombre)) {
                $nombreErr = "Solo se aceptan letras y espacios";
            }
        }
    }
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if(empty($_POST["apellidos"])){
            $apellidosErr = "El campo apellidos es requerido";
        }else{
            $apellidos = test_input($_POST["apellidos"]);
            
            if(!preg_match("/^[A-Z][a-zA-Záéíóú]+ [A-Z][a-zA-Záéíóúìàèòù]+$/", $apellidos)) {
                $apellidosErr = "Solo se aceptan letras y espacios";
            }
        }
    }
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if(empty($_POST["domicilio"])){
            $domicilioErr = "El campo domicilio es requerido";
        }else{
            $domicilio = test_input($_POST["domicilio"]);
            
            if(!preg_match("/^[0-9a-zA-Z-' ,]*$/", $domicilio)) {
                $domicilioErr = "Solo se aceptan letras y espacios";
            }
        }
    }
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if(empty($_POST["usuario"])){
            $usuarioErr = "El campo usuario es requerido";
        }else{
            $usuario = test_input($_POST["usuario"]);
            
            if(!preg_match("/^[a-z0-9]*$/", $usuario)) {
                $usuarioErr = "Esta mal el nombre del usuario";
            }
        }
    }
    
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if(empty($_POST["contrasena"])){
            $contrasenaErr = "El campo usuario es requerido";
        }else{
            $contrasena = test_input($_POST["contrasena"]);
            
            if(!preg_match("/^[a-z0-9]*$/", $contrasena)) {
                $contrasenaErr = "La contraseña no es segura";
            }
        }
    }

    function test_input($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlentities($data);
        return $data;
    }
    ?>

    <div class="contenedor">
        <label for="titulo" class="titulo">Registro de Usuarios</label> 
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"  class="formulario"  name="formulario" method="post" >
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" id="nombre" value="<?php echo $nombre;?>" placeholder="Escribe tu nombre" class="form-control" >
            <p style="color:red;"><?php echo $nombreErr;?></p>

            <label for="apellidos">Apellidos:</label>
            <input type="text" name="apellidos" id="apellidos" value="<?php echo $apellidos;?>" placeholder="Escribe tus apellidos" class="form-control">
            <p style="color:red;"><?php echo $apellidosErr;?></p>

            <label for="genero">Seleccione su género:</label>
            <div class="radio">
                <input type="radio" name="genero" id="H" value="M">
                <label for="H" id="mas">Masculino</label>
                <input type="radio" name="genero" id="M" value="F">
                <label for="M" id="fem" >Femenino</label>
            </div>
            <span class="error-message" id="generoError">Selecciona un género.</span>

            <label for="domicilio">Domicilio</label>
            <input type="text" name="domicilio" id="domicilio" value="<?php echo $domicilio;?>" placeholder="Escribe el nombre de tu domicilio"x">
            <p style="color:red;"><?php echo $domicilioErr;?></p>

            <label for="domicilio">Usuario</label>
            <input type="text" name="usuario" id="usuario" value="<?php echo $usuario;?>" placeholder="Escribe el nombre del usuario"x">
            <p style="color:red;"><?php echo $usuarioErr;?></p>

            <label for="domicilio">Contraseña</label>
            <input type="text" name="contrasena" id="contrasena" value="<?php echo $contrasena;?>" placeholder="Escribe la contraseña"x">
            <p style="color:red;"><?php echo $contrasenaErr;?></p>

            <div class="checkbox">
                <input type="checkbox" name="checkbox" id="checkbox" class="form-control">
                <label for="checkbox">Acepto terminos y condiciones</label>
                <span class="error-message" id="terminosError">Acepta los términos y condiciones.</span>
            </div>

            <div class="btn-group">
                <input type="reset" value="Cancelar" class="cancelar">
                <input type="submit" value="Registrar" class="guardar">
                
            </div>
        </form>
    </div>
</body>
</html>