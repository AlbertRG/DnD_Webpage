<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0" />
    <link rel="stylesheet" href="CSS/style.css" />
    <link rel="stylesheet" href="CSS/table.css" />
    <link href="https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css" rel="stylesheet" />
    <title> DnD 5e Compendium </title>
  </head>

  <body>
    <header class ="herotable">
      <nav class ="nav_hero">
        <div class ="container nav_container">
          <div>
            <a href ="index.html"> <img src = "Pictures/logobig.png" alt = "" class  =logo_img> </a>
          </div>
          <div class ="logo">
            <a class ="logo_name">Spell Compendium<span class="point">.</span> </a>
          </div>
          <div class ="links">
            <a href ="#" class="link">Rules</a>
            <a href ="#" class="link">Class</a>
            <a href ="spells.php" class="link">Spells</a>
            <a href ="#" class="link">Items</a>
            <a href="login.php" class="link link--active"> Sign in </a>
            <a href="register.php" class="link link--active"> Free Sign Up </a>
          </div>
        </div>
      </nav>

      <section class="container hero_table">
        <h1 class="title_table">Spells</h1>
        <div class = table>

          <?php

            $connection = mysqli_connect('localhost', 'root', 'toor', 'dnd'); //Realizamos la conexion a la BD: "dnd"

            //Testing conecction
            if(!$connection) 
            {
              echo 'Error de conexion a la BD...'. mysqli_connect_error();
              exit();
            }
            else
            {

              //Consultamos los registros de la table spells
              $resultado = mysqli_query($connection, "SELECT * FROM spells ORDER BY level");

              if (!$resultado)
                  echo 'Error en la Consulta.'.mysqli_connect_error();

              else
              {              
                echo '<table>'; //Crea tabla
                echo '<tr>'; //Crea fila
                echo '<th>Level</th> <th>Name</th> <th>Casting Time</th> <th>Range</th> <th>Clases</th> <th>Description</th> <th>Source</th> ';
                echo '</tr>'; //Cierra fila
                while($row = mysqli_fetch_array($resultado))
                {
                  $cName = $row['name'];
                  $cLevel = $row['level'];
                  $cSource = $row['source'];
                  $cDescription = $row['description']; 
                  $cClasses = $row['classes'];
                  $cCasting = $row['casting'];
                  $cRange = $row['range'];
                  
                  echo '<tr>'; //Crea fila
                  echo '<td>'.$cLevel.'</td> <td>'.$cName.'</td> <td>'.$cCasting.'</td> <td>'.$cRange.'</td> <td>'.$cClasses.'</td> <td>'.$cDescription.'</td> <td>'.$cSource.'</td>'; 
                  echo '</tr>'; //Cierra fila
                }   
                echo '</table>'; 
                mysqli_close($connection); //Cierra la conexion a la BD 
              }                                                              
            }             
          ?>

        </div>
      </section>
    </header>

    <footer class="footer">
      <div class="container footer_caption">
        <div class="download">
          <h3 class="title_footer">Download our App</h3>
          <div class="download_app">

            <div class="download_item">
              <i class='bx bxl-apple download_logo'></i>
              <h4 class="download_title">App Store</h4>
            </div>

            <div class="download_item">
              <i class='bx bxl-play-store download_logo'></i>
              <h4 class="download_title">Play Store</h4>
            </div>

          </div>
        </div>

        <div class="get-mail">
          <div class="socialmedia">
            <p class="socialmedia_legend">Siguenos en: </p>
            <i class='socialmedia_icon bx bxl-facebook-circle'></i>
            <i class='socialmedia_icon bx bxl-twitter'></i>
            <i class='socialmedia_icon bx bxl-instagram'></i>
            <i class='socialmedia_icon bx bxl-discord'></i>
            <i class='socialmedia_icon bx bxl-github'></i>
          </div>
        </div>
      </div>
      
      <div class="contact" id="contacto">

        <div class="item_contact">
          <i class='bx bx-copyright contact_icon'></i>
          <h3 class="contact_title">
          <a href="#" class="politica_privacidad politica_privacidad--margin">Privacy Policy</a>
          <a href="#" class="politica_privacidad">Terms of Service</a></h3>
        </div>

        <div class="item_contact">
          <i class='bx bx-mail-send contact_icon'></i>
          <h3 class="contact_title">spellcompendium@dnd.mx</h3>
        </div>

        <div class="item_contact">
          <i class='bx bxs-edit-location contact_icon'></i>
          <h3 class="contact_title">Guadalajara, Mexico</h3>
        </div>

        <div class="item_contact item_contact--gold">
          <i class='bx bxs-chat contact_icon contact_icon-modifier'></i>
          <h3 class="contact_title">Support</h3>
        </div>

      </div>
    </footer>
  </body>
</html>