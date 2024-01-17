<?php
    if(isset($_POST["guardar"])){
        require("conexion.php");

        $user = htmlentities(addslashes($_POST["nombre_user"]));
        $pwd = htmlentities(addslashes($_POST["pwd"]));
        $contador =0;

        if ( !empty($user) && !empty($pwd) ) {

            $sql = "SELECT * FROM usuarios WHERE usuario = :user";
            $result = $conex->prepare($sql);
            $result->bindValue(":user", $user);
            $result->execute();
            $numero_registro = $result->rowCount();
    
            if ( $numero_registro > 0 ) {
                $row = $result->fetch(PDO::FETCH_ASSOC);
    
                if( $user === $row['usuario'] && password_verify($pwd, $row['contrasena']) ) {
                    $contador++;
                }
    
                if ( $contador > 0 ) {
                    $contador = 0;
    
                    session_start();
                    $_SESSION["usuario"] = $row['nombre'];
                    header("location: consulta.php");
    
                } else {
                    require("login.html");
                    echo("<script>alert('El usuario y/o contraseña son incorrectos Intente nuevamente!');</script>");
                }
    
                $result->closeCursor();
    
            } else {
                require("login.html");
                echo("<script>alert('El usuario y/o contraseña son incorrectos!');</script>");
            }
        } else {
            require("login.html");
            echo("<script>alert('Los campos estan vacios!');</script>");
        }
        echo"<meta http-equiv='Refresh' content='2;url=login.html'>";
    
        

    }else {
        header("location:login.html");
    }
?>