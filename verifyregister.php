<?php   
    $connection = mysqli_connect('localhost','root','','cursos'); //Realizamos la conexion a la BD
        
    //Test connection
    if(!$connection){
        echo 'Error de conexion'.mysqli_connect_error();
        exit();
    }
    else{
        //Tomamos las variables que viene del POST del formulario "registrar.html".
        $iNombre = $_POST['txtNombre'];
        $iCorreo = $_POST['eCorreo'];
        $iPassw = MD5($_POST['pContrasenia']); //Se aplica la función MD5 a la contraseña.

        //Verifica si ya existe un correo en la tabla login.
        $query = "SELECT correo FROM login WHERE correo='$iCorreo'";
        $resultcorreo = mysqli_query($connection, $query);

        //Verificamos cuantas filas (row) trae la consulta 
        $num_rows = mysqli_num_rows($resultcorreo);

        if ($num_rows>=1)
        {
            echo "<script>alert('Este correo ya existe.')</script>";
            mysqli_close($connection); //Cierra la conexion a la BD
            header('Location: register.php?Error=Este correo ya existe.&Nombre='.$iNombre.'&Correo='.$iCorreo);
        }
        else
        {
            //La función: "mysqli_query" ejecuta cualquier instrucción SQL en la BD correspondiente que se encuentre en la conexión especificada.
            //En este caso, la consulta fue un INSERT-INTO
            $resultado = mysqli_query($connection, "INSERT INTO login(nombre, correo, contrasenia) VALUES('$iNombre','$iCorreo', '$iPassw')");
            
            if (!$resultado)
            {
                echo 'Error en el registro'.mysqli_connect_error();
                mysqli_close($connection); //Cierra la conexion a la BD
                //Podemos tambien redireccionarlo de nueva cuenta a la pagina de Formulario de Registro.
                header('Location: register.php');
            }
            else{
                echo 'Se realizó correctamente el registro';
                mysqli_close($connection); //Cierra la conexion a la BD
                //Una vez que se insertaron los datos en la tabla "login", cargamos la pagina: "loginvista.html" 
                header('Location: login.php');
            }
        }
    }
?>