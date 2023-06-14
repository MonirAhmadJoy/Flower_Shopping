<?php
$id = base64_decode($_GET['id']);
?>
<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="videos.css">


    <link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.15.1/css/all.css"
      integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="css/styles.css">
    <!-- <link rel="stylesheet" href="navbar.scss" />
    <link rel="stylesheet" href="styles.scss" /> -->
    

    <title>My Flower</title>

    <style>
        .iframe-container {
            display: flex;
            justify-content: center;
        }

        .iframe-container iframe {
            width: 1300px;
            height: 500px;
        }
    </style>
</head>

<body>
    <div>
        
    </div>
    <?php
    if ($id == 1) { ?>



    <nav class="navbar">
    <div class="navbar__menu">
    <a href="index.php" class="navbar__menu--links" id="button">Home</a>
    </div>
      <div class="navbar__bars"><i class="fas fa-bars"></i></div>
      <div class="navbar__menu">
        <a href="videostulip.php?id=<?php echo base64_encode(3); ?>" class="navbar__menu--links" id="button">Rose</a>
        <a href="videostulip.php?id=<?php echo base64_encode(2); ?>" class="navbar__menu--links" id="button">Dandelion</a>
        <a href="videostulip.php?id=<?php echo base64_encode(5); ?>" class="navbar__menu--links" id="button">Tulip</a>
        <a href="videostulip.php?id=<?php echo base64_encode(4); ?>" class="navbar__menu--links" id="button">Sunflower</a>
      </div>
    </nav>


        <div class="iframe-container">
        <div class="hero">
      <div class="hero__container">
        
        <div class="hero__container--left">
            
          <h1>Daisy</h1>
          <h2>Lt: Bellis Perennis</h2>
          <button class="hero__container--btn"><a href="https://simple.wikipedia.org/wiki/Bellis_perennis">See Details</a></button>
          <button class="hero__container--btn"><a href="GsappAnim.php?id=<?php echo base64_encode(1); ?>">See Photo</a></button>
        </div>
        <div class="hero__container--right">
        
          </div>
      </div>
    </div>
            <iframe src="https://www.youtube.com/embed/k_c2F9jCvzE"></iframe>
              
        </div>

    <?php
    } elseif ($id == 2) { ?>
    <nav class="navbar">
    <div class="navbar__menu">
    <a href="index.php" class="navbar__menu--links" id="button">Home</a>
    </div>
      <div class="navbar__bars"><i class="fas fa-bars"></i></div>
      <div class="navbar__menu">
        <a href="videostulip.php?id=<?php echo base64_encode(3); ?>" class="navbar__menu--links" id="button">Rose</a>
        <a href="videostulip.php?id=<?php echo base64_encode(1); ?>" class="navbar__menu--links" id="button">Daisy</a>
        <a href="videostulip.php?id=<?php echo base64_encode(5); ?>" class="navbar__menu--links" id="button">Tulip</a>
        <a href="videostulip.php?id=<?php echo base64_encode(4); ?>" class="navbar__menu--links" id="button">Sunflower</a>
      </div>
    </nav>
        <div class="iframe-container">
        <div class="hero">
      <div class="hero__container">
        
        <div class="hero__container--left">
            
          <h1>Dandelion</h1>
          <h2>Lt: Taraxacum Officinale</h2>
          <button class="hero__container--btn"><a href="https://en.wikipedia.org/wiki/Taraxacum_officinale#:~:text=Taraxacum%20officinale%2C%20the%20dandelion%20or,Compositae).">See Details</a></button>
          <button class="hero__container--btn"><a href="GsappAnim.php?id=<?php echo base64_encode(2); ?>">See Photo</a></button>
        </div>
        <div class="hero__container--right">
        
          </div>
      </div>
    </div>
        <iframe src="https://www.youtube.com/embed/T6pjGwkK2po">
        </iframe>
        </div>
    <?php
    } elseif ($id == 3) { ?>
    <nav class="navbar">
    <div class="navbar__menu">
    <a href="index.php" class="navbar__menu--links" id="button">Home</a>
    </div>
      <div class="navbar__bars"><i class="fas fa-bars"></i></div>
      <div class="navbar__menu">
        <a href="videostulip.php?id=<?php echo base64_encode(1); ?>" class="navbar__menu--links" id="button">Daisy</a>
        <a href="videostulip.php?id=<?php echo base64_encode(2); ?>" class="navbar__menu--links" id="button">Dandelion</a>
        <a href="videostulip.php?id=<?php echo base64_encode(5); ?>" class="navbar__menu--links" id="button">Tulip</a>
        <a href="videostulip.php?id=<?php echo base64_encode(4); ?>" class="navbar__menu--links" id="button">Sunflower</a>
      </div>
    </nav>
    <div class="iframe-container">
        <div class="hero">
      <div class="hero__container">
        
        <div class="hero__container--left">
            
          <h1>Rose</h1>
          <h2>Lt: Rosa Rubiginosa</h2>
          <button class="hero__container--btn"><a href="https://en.wikipedia.org/wiki/Rose">See Details</a></button>
          <button class="hero__container--btn"><a href="GsappAnim.php?id=<?php echo base64_encode(3); ?>">See Photo</a></button>
        </div>
        <div class="hero__container--right">
        
          </div>
      </div>
    </div>
        <iframe src="https://www.youtube.com/embed/x0vwZg0-m5Q">
        </iframe>
    </div>
    <?php
    } elseif ($id == 4) { ?>
    <nav class="navbar">
    <div class="navbar__menu">
    <a href="index.php" class="navbar__menu--links" id="button">Home</a>
    </div>
      <div class="navbar__bars"><i class="fas fa-bars"></i></div>
      <div class="navbar__menu">
        <a href="videostulip.php?id=<?php echo base64_encode(3); ?>" class="navbar__menu--links" id="button">Rose</a>
        <a href="videostulip.php?id=<?php echo base64_encode(2); ?>" class="navbar__menu--links" id="button">Dandelion</a>
        <a href="videostulip.php?id=<?php echo base64_encode(5); ?>" class="navbar__menu--links" id="button">Tulip</a>
        <a href="videostulip.php?id=<?php echo base64_encode(1); ?>" class="navbar__menu--links" id="button">Daisy</a>
      </div>
    </nav>
    <div class="iframe-container">
        <div class="hero">
      <div class="hero__container">
        
        <div class="hero__container--left">
            
          <h1>Sunflower</h1>
          <h2>Lt: Helianthus Annuus</h2>
          <button class="hero__container--btn"><a href="https://en.wikipedia.org/wiki/Helianthus">See Details</a></button>
          <button class="hero__container--btn"><a href="GsappAnim.php?id=<?php echo base64_encode(4); ?>">See Photo</a></button>
        </div>
        <div class="hero__container--right">
        
          </div>
      </div>
    </div>
        <iframe src="https://www.youtube.com/embed/sS6dDJQ3CQo">
        </iframe>
    </div>
    <?php
    } else { ?>
    <nav class="navbar">
    <div class="navbar__menu">
    <a href="index.php" class="navbar__menu--links" id="button">Home</a>
    </div>
      <div class="navbar__bars"><i class="fas fa-bars"></i></div>
      <div class="navbar__menu">
        <a href="videostulip.php?id=<?php echo base64_encode(3); ?>" class="navbar__menu--links" id="button">Rose</a>
        <a href="videostulip.php?id=<?php echo base64_encode(2); ?>" class="navbar__menu--links" id="button">Dandelion</a>
        <a href="videostulip.php?id=<?php echo base64_encode(1); ?>" class="navbar__menu--links" id="button">Daisy</a>
        <a href="videostulip.php?id=<?php echo base64_encode(4); ?>" class="navbar__menu--links" id="button">Sunflower</a>
      </div>
    </nav>
    <div class="iframe-container">
        <div class="hero">
      <div class="hero__container">
        
        <div class="hero__container--left">
            
          <h1>Tulip</h1>
          <h2>Lt: Tulipa Gesneriana</h2>
          <button class="hero__container--btn"><a href="https://en.wikipedia.org/wiki/Tulipa_gesneriana#:~:text=Tulipa%20gesneriana%2C%20the%20Didier's%20tulip,of%20its%20large%2C%20showy%20flowers.">See Details</a></button>
          <button class="hero__container--btn"><a href="GsappAnim.php?id=<?php echo base64_encode(5); ?>">See Photo</a></button>
        </div>
        <div class="hero__container--right">
        
          </div>
      </div>
    </div>
        <iframe src="https://www.youtube.com/embed/abTfuux_5cY">
        </iframe>
    </div>
    <?php
    }
    ?>


</body>

</html>