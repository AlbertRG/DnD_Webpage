<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="CSS/formulario.css">
        <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
        <title>Register</title>
    </head>

    <body>
        <form action="verifyregister.php" method="post" class="formulario">
            <h1>Register</h1>
            <div class="contenedor">

                <div class="input-contenedor">
                    <i class='bx bxs-user icon'></i>
                    <input type="text" name="txtNombre" value="<?php if(isset($_GET['Nombre'])) echo $_GET['Nombre']; ?>"  placeholder="Username" required>
                </div>

                    <?php if (isset($_GET['Error'])) echo $_GET['Error']; ?>   

                <div class="input-contenedor">
                    <i class='bx bx-envelope icon'></i>
                    <input type="email" name="eCorreo" value="<?php if(isset($_GET['Correo'])) echo $_GET['Correo']; ?>" placeholder="Email" required>            
                </div>

                <div class="input-contenedor">
                    <i class='bx bx-lock-alt icon'></i>
                    <input type="password" name="pContrasenia" placeholder="Password" required>
                </div>

                <input type="submit" value="Sign Up" class="button">               
                <p>By registering, you accept the terms of use and privacy.</p>
                <p>Do you already have an account?<a href="login.php" class="link"> Sign In</a></p>
            </div>
        </form>
    </body>
</html>