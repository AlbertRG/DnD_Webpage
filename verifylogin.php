<?php
    session_start(); //Crea la sesion
    $connection = mysqli_connect('localhost', 'root', '', 'cursos'); //Realizamos la conexion a la BD: "cursos"

    //Testing conecction
    if(!$connection) 
    {
        echo 'Error de conexion a la BD...'. mysqli_connect_error();
        exit();
    }
    else
    {
        
        //Tomamos las variables que viene del POST del formulario "loginvista.html".
        $cCorreo = $_POST['txtCorreo'];
        $cPassw = MD5($_POST['txtContra']); //Se aplica la función MD5 a la contraseña.

        //La función: "mysqli_query" ejecuta cualquier instrucción SQL en la BD correspondiente que se encuentre en la conexión especificada.
        //En este caso, la consulta fue un SELECT-FROM-WHERE
        $resultado = mysqli_query($connection, "SELECT * FROM login WHERE correo='$cCorreo' AND contrasenia='$cPassw'");
        
        if (!$resultado)
        {
            echo 'Error en la Consulta.'.mysqli_connect_error();
            mysqli_close($connection); //Cierra la conexion a la BD 
            header('Location: login.php'); //Podemos tambien redireccionarlo de nueva cuenta a la pagina de formulario de "loginvista.html"
        }
        else
        {       
            $num_rows = mysqli_num_rows($resultado); //Verificamos cuantas filas trae la consulta

            //Una vez que fue correcta la consulta y que existe el usuario en la tabla "login", cargamos la pagina: "index.php"
            if($num_rows == 0)

                header('Location: login.php?Error=Este correo o contraseña son incorrectos.&Correo='.$cCorreo);

            else
            {              
                $row = mysqli_fetch_array($resultado);

                $_SESSION['ID'] = $row['idlogin'];
                $_SESSION['Nombre'] = $row['nombre'];
                $_SESSION['eMail'] = $row['correo'];

                mysqli_close($connection); //Cierra la conexion a la BD

                //Se genera la sesion  para el usuario y se manda a llamar al index.php de la carpeta: Admin
                header('Location: Admin/index.php');
            }            
        }   
    }
?>