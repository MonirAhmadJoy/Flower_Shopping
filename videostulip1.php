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
    <title>My Flower</title>

    <style>
        .iframe-container {
            display: flex;
            justify-content: center;
        }

        .iframe-container iframe {
            width: 1000px;
            height: 500px;
        }
    </style>
</head>

<body>
    <div>
        <h1>My Flowers Shop</h1>
        <h2>See Flower Video and refresh your mind</h1>
    </div>
    <?php
    if ($id == 1) { ?>
        <div class="iframe-container">
            <iframe src="https://www.youtube.com/embed/k_c2F9jCvzE"></iframe>
        </div>
    <?php
    } elseif ($id == 2) { ?>
        <div class="iframe-container">
        <iframe src="https://www.youtube.com/embed/T6pjGwkK2po">
        </iframe>
        </div>
    <?php
    } elseif ($id == 3) { ?>
    <div class="iframe-container">
        <iframe src="https://www.youtube.com/embed/x0vwZg0-m5Q">
        </iframe>
    </div>
    <?php
    } elseif ($id == 4) { ?>
    <div class="iframe-container">
        <iframe src="https://www.youtube.com/embed/sS6dDJQ3CQo">
        </iframe>
    </div>
    <?php
    } else { ?>
    <div class="iframe-container">
        <iframe src="https://www.youtube.com/embed/abTfuux_5cY">
        </iframe>
    </div>
    <?php
    }
    ?>
</body>

</html>