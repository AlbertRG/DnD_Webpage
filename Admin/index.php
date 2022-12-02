<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0" />
    <link rel="stylesheet" href="../CSS/style.css" />
    <link href="https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css" rel="stylesheet" />
    <title> DnD 5e Compendium </title>
  </head>

  <?php
    if (!isset($_SESSION['ID']))
      header('Location: ../index.html');
  ?>

  <body>
    <header class="hero">
      <nav class="nav_hero">
        <div class="container nav_container">
          <div>
            <a href="index.php"> <img src="../Pictures/logobig.png" alt="" class=logo_img> </a>
          </div>
          <div class="logo">
            <a class="logo_name">Spell Compendium<span class="point">.</span> </a>
          </div>
          <?php echo "Welcome: ".$_SESSION['Nombre']; ?>
          <div class="links">
            <a href="#" class="link">Rules</a>
            <a href="#" class="link">Class</a>
            <a href="spells.php" class="link">Spells</a>
            <a href="#" class="link">Items</a>
            <a href="../PHP/logout.php" class="link link--active"> Sign out </a>
          </div>
        </div>
      </nav>
      
      <section class="container hero_main">
        <div class="hero_textos">
          <h1 class="title"> The best 5e<span class="title_active"> Experience </span> </h1>
          <p class="copy"> All the information you need <span class="copy_active"> for your campaigns </span> </p>
        </div>
      </section>
    </header>

    <main>
      <section class="courses" id="cursos">
        <div class="container">
          <h2 class="subtitle"> Total Compendium for dnd 5e <span class="point">.</span></h2>
          <p class="copy_section">Classes, monsters, spells, items and much more...</p>
          <article class="container-cards">

            <div class="card">
              <img src="../Pictures/dndclasses.jpg" alt="" class="card_img">
              <div class="card_text">               
                <h3 class="card_title">Classes<span class="point">.</span></h3>
                <p class="card_copy">Create your character with the latest classes available.</p>
                <a href="#" class="card_button">View Details</a>
              </div>
            </div>

            <div class="card">
              <img src="../Pictures/dndspells.jpg" alt="" class="card_img">
              <div class="card_text">
                <h3 class="card_title">Spells<span class="point">.</span></h3>
                <p class="card_copy">Find the perfect spell for your campaign, in our impressive database</p>
                <a href="#" class="card_button">View Details</a>
              </div>
            </div>

            <div class="card">
              <img src="../Pictures/dnditems.jpg" alt="" class="card_img">
              <div class="card_text">
                <h3 class="card_title">Items<span class="point">.</span></h3>
                <p class="card_copy">Select items and save them to your character with just one click</p>
                <a href="#" class="card_button">View Details</a>
              </div>
            </div>

          </article>
        </div>
      </section>

      <section class="projects container" id="proyectos">
        <h2 class="subtitle">Join an Incredible Adventure Today<span class="point">.</span></h2>
        <p class="copy_section">Our next campaigns</p>
        <article class="container-bg">

          <div class="minicard">
            <div class="card_text">
              <h3 class="card_title">Call of the Netherdeep<span class="point">.</span></h3>
              <p class="card_date">December 12, 2021</p>
              <p class="minicard_copy">Tuesday 8:00 PM PDT</p>
              <a href="#" class="card_button">View Details</a>
            </div>
          </div>
          <div class="background">
            <img src="../Pictures/callnetherdeep.jpg" class="background_img">
            <div class="background_text">
              <h3 class="background_title">Critical Role: Call of the Netherdeep</h3>
              <p class="background_copy">Can You Change Fate?</p>
            </div>
          </div>

          <div class="minicard">
            <div class="card_text">
              <h3 class="card_title">The Wild Beyond The Witchlight<span class="point">.</span></h3>
              <p class="card_date">January 8, 2021</p>
              <p class="minicard_copy">Friday 7:00 PM PDT</p>
              <a href="#" class="card_button">View Details</a>
            </div>
          </div>
          <div class="background">
            <img src="../Pictures/wildbeyond.jpg" class="background_img">
            <div class="background_text">
              <h3 class="background_title">The Wild Beyond The Witchlight</h3>
              <p class="background_copy">Something Wicked This Way Comes</p>
            </div>
          </div>

          <div class="minicard">
            <div class="card_text">
              <h3 class="card_title">Rime of the Frostmaiden<span class="point">.</span></h3>
              <p class="card_date">January 5, 2021</p>
              <p class="minicard_copy">Saturday 9:00 PM PDT</p>
              <a href="#" class="card_button">View Details</a>
            </div>
          </div>
          <div class="background">
            <img src="../Pictures/rimeofthefrostmaiden.jpg" class="background_img">
            <div class="background_text">
              <h3 class="background_title">Icewind Dale: Rime of the Frostmaiden</h3>
              <p class="background_copy">Some Secrets are Worth Dying For</p>
            </div>
          </div>

        </article>
      </section>

      <section class="testimony">
        <div class="container">
          <h2 class="subtitle">Future Updates<span class="point">.</span></h2>
          <p class="copy_section">We keep working to give you the best</p>
          <div class="testimony-container">

            <div class="testimony_card">
              <img src="../Pictures/encounter.jpg" class="testimony_img">
              <div class="testimony_copy">
                <div class="testimony_info">
                  <h3 class="testimony_name">Encounter Maker</h3>
                </div>
              </div>
            </div>

            <div class="testimony_card">
              <img src="../Pictures/homebrew.png" class="testimony_img">
              <div class="testimony_copy">
                <div class="testimony_info">
                  <h3 class="testimony_name">Homebrew Creation</h3>
                </div>
              </div>
            </div>

            <div class="testimony_card">
              <img src="../Pictures/dm.jpg" class="testimony_img">
              <div class="testimony_copy">
                <div class="testimony_info">
                  <h3 class="testimony_name">Foundry VTT Connection</h3>
                </div>
              </div>
            </div>          

          </div>
        </div>
      </section>

      <section class="email container container--modifier">
        <h2 class="subtitle subtitle--modifier">Register and Start Living Great Adventures with our Community<span class="point">.</span> </h2>

        <div class="check">

          <div class="check_item">
            <i class='bx bx-check'></i>
            <div class="check_numbers">
              <p class="check_number">+20000</p>
              <p class="check_copy">Registered Users</p>
            </div>
          </div>

          <div class="check_item">
            <i class='bx bx-check'></i>
            <div class="check_numbers">
              <p class="check_number">+300</p>
              <p class="check_copy">Spells</p>
            </div>
          </div>

          <div class="check_item">
            <i class='bx bx-check'></i>
            <div class="check_numbers">
              <p class="check_number">+200</p>
              <p class="check_copy">Magic Items</p>
            </div>
          </div>

        </div>
      </section>

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

    </main>
  </body>
</html>