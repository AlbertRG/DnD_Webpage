<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="CSS/formulario.css">
        <link href="https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css" rel="stylesheet">
        <title>Login</title>
    </head>

    <body>
        <form action="verifylogin.php" method="post" class="formulario">
            <h1>Sign In</h1>
            <div class="contenedor">

                <div class="input-contenedor">
                    <i class="bx bx-envelope icon"></i>
                    <input type="email" name="txtCorreo" value="<?php if(isset($_GET['Correo'])) echo $_GET['Correo']; ?>" placeholder="Email" required />
                </div>

                <div class="input-contenedor">
                    <i class="bx bx-lock-alt icon"></i>
                    <input type="password" name="txtContra" placeholder="Password" required />
                </div>  
                            
                <?php if (isset($_GET['Error'])) echo $_GET['Error']; ?>
                <input type="submit" value="Login" class="button" />
                <p>By registering, you accept the terms of use and privacy.</p>
                <p> You do not have an account? <a href="register.php" class="link">Register Now</a> </p>
            </div>
        </form>       
    </body>
</html> 