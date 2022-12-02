<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0" />
    <link rel="stylesheet" href="../CSS/style.css" />
    <link rel="stylesheet" href="../CSS/table.css" />
    <link href="https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css" rel="stylesheet" />
    <title> DnD 5e Compendium </title>
  </head>

  <?php
    if (!isset($_SESSION['ID']))
      header('Location: ../index.html');
  ?>

  <script>
    function editar(idsp)
    {
      window.location="spells.php?editspell="+idsp;
    }

    function borrar(idsp)
    {
      window.location="spells.php?deletespell="+idsp;
    }

    function insertar()
    {
      window.location="spells.php?insertspell=1";
    }
  </script>

  <body>
    <header class ="herotable">
      <nav class ="nav_hero">
        <div class ="container nav_container">
          <div>
            <a href ="index.php"> <img src = "../Pictures/logobig.png" alt = "" class  =logo_img> </a>
          </div>
          <div class ="logo">
            <a class ="logo_name">Spell Compendium<span class="point">.</span> </a>
          </div>
          <?php echo "Welcome: ".$_SESSION['Nombre']; ?>
          <div class ="links">
            <a href ="#" class="link">Rules</a>
            <a href ="#" class="link">Class</a>
            <a href ="spells.php" class="link">Spells</a>
            <a href ="#" class="link">Items</a>
            <a href ="../PHP/logout.php" class="link link--active"> Sign out </a>
          </div>
        </div>
      </nav>

      <section class="container hero_table">
        <h1 class="title_table">Spells</h1>
        <div class = table>

          <?php

            $connection = mysqli_connect('localhost', 'root', '', 'cursos'); //Realizamos la conexion a la BD: "cursos"

            //Testing conecction
            if(!$connection) 
            {
              echo 'Error de conexion a la BD...'. mysqli_connect_error();
              exit();
            }
            else
            {
              if(isset($_GET['deletespell']))
              {
                $sqldelete="DELETE FROM spells WHERE idspell=".$_GET['deletespell'];
                
                if (mysqli_query($connection, $sqldelete))   
                {
                  echo "Record deleted successfully";
                  header('Location: spells.php');
                }                      
                else 
                  echo "Error deleting record: ".mysqli_error($connection);
              }

              else if(isset($_GET['insertspell']))
              {

                $insertspell=$_GET['insertspell'];

          ?>                
                <h3>Insertar Spell</h3>
                <form action="spells.php" method="post">
                  <label for="spell">Spell: </label><br />
                  <input type="text" name="spell" value="" /><br /><br />
            
                  <label for="level">Level: </label><br />
                  <input type="text" name="level" value="" /><br /><br />
            
                  <label for="description">Description: </label><br />
                  <input type="text" name="description" value="" /><br /><br />
            
                  <input class="card_button2" type="submit" name="insertar" value="Insertar" /><br /><br />
                  <a class="btn" href="spells.php"><< Volver</a>
                  <input type="hidden" name="insertspell" value="<?php if(isset($insertspell)) echo $insertspell; ?>" />
                  <input type="hidden" name="sk" value="2" />
                </form>
          <?php
              }

              else if(isset($_GET['editspell']))
              {
                $editspell=$_GET['editspell'];
                $sqledit = "SELECT * FROM spells WHERE idspell=".$editspell;

                if($result = mysqli_query($connection, $sqledit))
                { 
                  while($spell = mysqli_fetch_assoc($result))
                  { 
                  $espell = $spell['spell']; 
                  $elevel = $spell['level'];
                  $edescription = $spell['description'];
                  }
                }                
          ?>                
                <h3>Editar Spell</h3>
                <form action="spells.php" method="post">
                  <label for="spell">Spell: </label><br />
                  <input type="text" name="spell" value="<?php if(isset($espell)) echo $espell; ?>" /><br /><br />
            
                  <label for="level">Level: </label><br />
                  <input type="text" name="level" value="<?php if(isset($elevel)) echo $elevel; ?>" /><br /><br />
            
                  <label for="description">Description: </label><br />
                  <input type="text" name="description" value="<?php if(isset($edescription)) echo $edescription; ?>" /><br /><br />
            
                  <input class="card_button2" type="submit" name="actualizar" value="Actualizar" /><br /><br />
                  <a class="btn" href="spells.php"><< Volver</a>
                  <input type="hidden" name="editspell" value="<?php if(isset($editspell)) echo $editspell; ?>" />
                  <input type="hidden" name="sw" value="1" />
                </form>
          <?php 
              }

              else if(isset($_POST['sw']) == 1)
              {
                $sqlupdate = "UPDATE spells SET spell='".$_POST['spell']."', level='".$_POST['level']."', description='".$_POST['description']."' WHERE idspell=".$_POST['editspell'];

                if(mysqli_query($connection, $sqlupdate))
                { 
                  echo "La informacion se actualizo con exito"; 
                  header('Location: spells.php');
                }else
                  echo "Ocurrio un error al intentar actualizar";
              }

              else if(isset($_POST['sk']) == 2)
              {
                $sqlinsert = "INSERT INTO spells (spell, level, description) VALUES ('".$_POST['spell']."','".$_POST['level']."','".$_POST['description']."')";

                if(mysqli_query($connection, $sqlinsert))
                { 
                  echo "La informacion se inserto con exito"; 
                  header('Location: spells.php');
                }else
                  echo "Ocurrio un error al intentar insertar";
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
                  echo '<th>Spell</th> <th>Level</th> <th>Description</th> 
                  <th>   Edit   </th> <th>   Delete   </th>';
                  echo '</tr>'; //Cierra fila
                  while($row = mysqli_fetch_array($resultado))
                  {
                    $cIdspell = $row['idspell'];
                    $cSpell = $row['spell'];
                    $cLevel = $row['level'];
                    $cDescription = $row['description']; 
                    
                    echo '<tr>'; //Crea fila
                    echo '<td>'.$cSpell.'</td> <td>'.$cLevel.'</td> <td>'.$cDescription.'</td>'; 
                    echo '<td> <input type="button" onclick="editar('.$cIdspell.')"; class="card_button" value="Update"> </td>';
                    echo '<td> <input type="button" onclick="borrar('.$cIdspell.')"; class="card_button" value="Delete"> </td>';
                    echo '</tr>'; //Cierra fila
                  }   
                  echo '</table>'; 

                  echo '<td> <input type="button" onclick="insertar()"; class="card_button" value="Insert"> </td>';

                  mysqli_close($connection); //Cierra la conexion a la BD 
                }                                                              
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