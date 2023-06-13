<?php
session_start();
require_once './dbconn.php';
$user_id = 0;


if (isset($_SESSION['user_login'])) {
  $user_id = $_SESSION['user_login'];
  $take = mysqli_query($link, "SELECT * FROM `user` WHERE user_id='$user_id';");
  $taker = mysqli_fetch_assoc($take);
  $name = $taker['name'];
  $splitter = " ";
  $pieces = explode($splitter, $name);
  //SELECT * FROM `user_info` WHERE user_id='1';
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>No shop</title>
  <script src="https://kit.fontawesome.com/cc0fc94170.js" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css' />
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css' />

  <link rel="stylesheet" href="styles/indexSt.css">
  <link rel="stylesheet" href="styles/myCartSt.css">

  <style>
    #submit:disabled {
      background-color: red;
      opacity: 0.5;
    }

    .important {
      font-weight: bold;
      font-size: xx-large;
    }

    .blue {
      color: blue;
    }

    .green {
      color: green;
    }

    .checked {
      color: orange;
    }

    .center {
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .posfix1 {
      position: fixed;
      width: 100%;

    }

    .posfix2 {
      position: fixed;
      width: 100%;
    }

    /* CSS styles for the dropdown menu */
    .dropdown {
      position: relative;
      display: inline-block;
    }

    .dropdown-content {
      display: none;
      position: absolute;
      background-color: #f9f9f9;
      min-width: 160px;
      box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
      z-index: 1;
    }

    .dropdown:hover .dropdown-content {
      display: block;
    }
  </style>

</head>

<body>

  <!--Navbar START -->
  <!-- <div class="posfix1"> -->
  <div class="header-sec">
    <div class="row">
      <div class="col-md-9 col-sm-9 brand-logo">
        <p><span class="no-same no-shop">LO</span><span class="no-same logo-shop">GO</span></p>
      </div>

      <div class="col-md-2 col-sm-2" style="text-align: center;margin-top: 10px;margin-bottom: 10px;">
        <?php
        if ($user_id) {
          echo "Welcome ";
          echo $pieces[0];
        }
        ?>
      </div>
      <div class="col-md-1 col-sm-1">
        <div class="dropdown">

          <a class="dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <?php
            if ($user_id) {
              echo '<img src="images/user_on.png" alt="">';
            } else {
              echo '<img src="images/user_off.png" alt="">';
            }
            ?>
          </a>

          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">

            <?php
            if ($user_id > 0) { ?>
              <li><a class="dropdown-item" href="regiForm.php">Sign Up</a></li>
              <li><a class="dropdown-item" href="profile.php">Profile</a></li>
              <li><a class="dropdown-item" href="logout.php">Logout</a></li>
            <?php
            } else { ?>
              <li><a class="dropdown-item" href="login.php">Log in</a></li>
              <li><a class="dropdown-item" href="regiForm.php">Sign Up</a></li>

            <?php
            }
            ?>
          </ul>
        </div>
      </div>
    </div>
  </div>

  <nav class="navbar navbar-expand-lg navbar-dark navbar-bg">
    <div class="container-fluid">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <div class="d-flex myCartMenu me-2">
              <a class="" href="index.php">Home</a>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#newest">Newest Arrival</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#top">Top sale</a>
          </li>
          <li class="nav-item dropdown" id="message">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Category
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <?php
              $tb_pinfo = mysqli_query($link, "SELECT * FROM `categories`");
              while ($row3 = mysqli_fetch_assoc($tb_pinfo)) { ?>
                <li><a class="dropdown-item" href="#<?php echo ucwords($row3['cat_title']); ?>"><?php echo ucwords($row3['cat_title']); ?></a></li>
              <?php
              }
              ?>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#about-us">About us</a>
          </li>

        </ul>


        <?php
        if ($user_id > 0) { ?>
          <div id="myCartBtn" class="myCartMenu">
            <a href="mycart.php">
              <i class="fas fa-shopping-cart"></i>
              <span id="cart-item" class="badge badge-danger"></span>
            </a>
          </div>
        <?php
        } else { ?>
          <div id="myCartBtn" class="myCartMenu">
            <i class="fas fa-shopping-cart"></i>
            <span id="cart-item" class="badge badge-danger"></span>
          </div>
        <?php
        }
        ?>

      </div>

    </div>
  </nav>
  <!-- </div> -->
  <!--Navbar END -->
  <!-- slider Start Here -->

  <!-- slider end here -->
  <br><br>
  <!-- Newest start here  -->
  <section class="container product-card" id="newest">
    <div id="message"></div>
    <div class="cat1Heading d-flex justify-content-between">
      <h3>Newest Arrival</h3>
    </div>
    <div class="row row-cols-1 row-cols-md-3 g-4">
      <?php
      $new = mysqli_query($link, "SELECT * FROM `products` ORDER BY `product_id` DESC LIMIT 6;");
      $hw = mysqli_fetch_assoc($new);
      while ($hw) { ?>
        <div class="col-lg-4 col-md-6 col-sm-12">
          <div class="product-bg">
            <div class="card h-100 shadow p-3 mb-5 bg-body rounded">
              <img src="admin/images/<?php echo $hw['product_image'] ?>" class="card-img-top img-fluid" alt="...">
              <div class="card-body">
                <h5 class="card-title"><?php echo $hw['product_title']; ?></h5>
                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
              </div>
              <!-- <div class="card-footer p-1"> -->
              <form action="" class="form-submit">
                <input type="hidden" class="pqty" value="1">
                <input type="hidden" class="pid" value="<?= $hw['product_id'] ?>">
                <input type="hidden" class="uid" value="<?= $user_id ?>">
                <input type="hidden" class="pname" value="<?= $hw['product_title'] ?>">
                <input type="hidden" class="pprice" value="<?= $hw['product_price'] ?>">
                <input type="hidden" class="pimage" value="<?= $hw['product_image'] ?>">

                <div class="row">

                  <!-- <div class="d-flex justify-content-between pCardPrice"> -->
                  <h4 class="col-sm-8"><?php echo $hw['product_price']; ?></h4>
                  <?php if ($user_id > 0) {
                    $pid = $hw['product_id'];
                    $queryrat = mysqli_query($link, "SELECT * FROM feedback WHERE `userID`=$user_id AND`prdID`=$pid;");
                    if (mysqli_num_rows($queryrat) == 0) {
                      $pos = 0;
                    } else {
                      $qryrat = mysqli_fetch_assoc($queryrat);
                      $pos = $qryrat['rating'];
                    }
                  ?>
                    <div class="row col-sm-5 style=" text-align:right;">
                      <?php for ($x = 1; $x <= $pos; $x++) { ?>
                        <button class=<?php echo 'rating' . $x ?> style="float: left; width: 15%;padding:0; border: none;background: none; margin-right:3px;display: inline-block;"><i id=<?php echo 'rat' . $x . $hw['product_id'] ?> class="fa fa-star checked"></i></button>
                      <?php } ?>

                      <?php for ($x = $pos + 1; $x <= 5; $x++) { ?>
                        <button class=<?php echo 'rating' . $x ?> style="float: left; width: 15%;padding:0; border: none;background: none; margin-right:3px;"><i id=<?php echo 'rat' . $x . $hw['product_id'] ?> class="fa fa-star"></i></button>
                      <?php } ?>

                    </div>

                  <?php
                  }
                  ?>
                </div>

                <?php

                $pid = $hw['product_id'];

                if ($user_id > 0) {
                  $qrytotal = mysqli_query($link, "SELECT SUM(`likes`) AS tlikes,SUM(`Dislikes`) AS tdislikes FROM feedback WHERE `prdID`=$pid;");
                  $qryr = mysqli_fetch_assoc($qrytotal);
                  $Tlikenum = $qryr['tlikes'];
                  $Tdislikenum = $qryr['tdislikes'];
                  $query = mysqli_query($link, "SELECT * FROM `feedback` WHERE `userID`=$user_id AND `prdID`=$pid;");
                  if (mysqli_num_rows($query) == 0) { ?>
                    <div class="row">
                      <div class="col-sm-2" style="margin-right: 0px;">
                        <button class="addItemlike" style="padding:0; border: none;background: none"><i id=<?php echo 'btnL' . $hw['product_id'] ?> class="fa fa-thumbs-o-up blue" style="font-size:34px"></i></button>
                      </div>

                      <div class="col-sm-4" style="font-weight: bold;">
                        <span id=<?php echo 'cntL' . $hw['product_id'] ?>> <?php echo "Likes: " . $Tlikenum; ?> </span>
                      </div>

                      <div class="col-sm-4" style="font-weight: bold;">
                        <span id=<?php echo 'cntD' . $hw['product_id'] ?>><?php echo "Dislikes: " . $Tdislikenum; ?> </span>
                      </div>

                      <div class="col-sm-2">
                        <button class="addItemdlike" style="padding:0; border: none;background: none"><i id=<?php echo 'btnD' . $hw['product_id'] ?> class="fa fa-thumbs-o-down blue" style="font-size:34px"></i></button>
                      </div>
                    </div>
                    <?php
                  } else {
                    $cs = 0;
                    $qr = mysqli_query($link, "SELECT * FROM `feedback` WHERE `userID`=$user_id AND `prdID`=$pid;");
                    $r = mysqli_fetch_assoc($qr);
                    $likenum = $r['likes'];
                    $dislikenum = $r['Dislikes'];
                    if ($likenum == 0 && $dislikenum == 0) { ?>
                      <div class="row">
                        <div class="col-sm-2" style="margin-right: 0px;">
                          <button class="addItemlike" style="padding:0; border: none;background: none"><i id=<?php echo 'btnL' . $hw['product_id'] ?> class="fa fa-thumbs-o-up blue" style="font-size:34px"></i></button>
                        </div>

                        <div class="col-sm-4" style="font-weight: bold;">
                          <span id=<?php echo 'cntL' . $hw['product_id'] ?>> <?php echo "Likes: " . $Tlikenum; ?> </span>
                        </div>

                        <div class="col-sm-4" style="font-weight: bold;">
                          <span id=<?php echo 'cntD' . $hw['product_id'] ?>><?php echo "Dislikes: " . $Tdislikenum; ?> </span>
                        </div>

                        <div class="col-sm-2">
                          <button class="addItemdlike" style="padding:0; border: none;background: none"><i id=<?php echo 'btnD' . $hw['product_id'] ?> class="fa fa-thumbs-o-down blue" style="font-size:34px"></i></button>
                        </div>
                      </div>
                    <?php } else if ($likenum == 1 && $dislikenum == 0) { ?>
                      <div class="row">
                        <div class="col-sm-2" style="margin-right: 0px;">
                          <button class="addItemlike" style="padding:0; border: none;background: none"><i id=<?php echo 'btnL' . $hw['product_id'] ?> class="fa fa-thumbs-up blue" style="font-size:34px"></i></button>
                        </div>

                        <div class="col-sm-4" style="font-weight: bold;">
                          <span id=<?php echo 'cntL' . $hw['product_id'] ?>> <?php echo "Likes: " . $Tlikenum; ?> </span>
                        </div>

                        <div class="col-sm-4" style="font-weight: bold;">
                          <span id=<?php echo 'cntD' . $hw['product_id'] ?>><?php echo "Dislikes: " . $Tdislikenum; ?> </span>
                        </div>

                        <div class="col-sm-2">
                          <button class="addItemdlike" style="padding:0; border: none;background: none"><i id=<?php echo 'btnD' . $hw['product_id'] ?> class="fa fa-thumbs-o-down blue" style="font-size:34px"></i></button>
                        </div>
                      </div>
                    <?php } else { ?>
                      <div class="row">
                        <div class="col-sm-2" style="margin-right: 0px;">
                          <button class="addItemlike" style="padding:0; border: none;background: none"><i id=<?php echo 'btnL' . $hw['product_id'] ?> class="fa fa-thumbs-o-up blue" style="font-size:34px"></i></button>
                        </div>

                        <div class="col-sm-4" style="font-weight: bold;">
                          <span id=<?php echo 'cntL' . $hw['product_id'] ?>> <?php echo "Likes: " . $Tlikenum; ?> </span>
                        </div>

                        <div class="col-sm-4" style="font-weight: bold;">
                          <span id=<?php echo 'cntD' . $hw['product_id'] ?>><?php echo "Dislikes: " . $Tdislikenum; ?> </span>
                        </div>

                        <div class="col-sm-2">
                          <button class="addItemdlike" style="padding:0; border: none;background: none"><i id=<?php echo 'btnD' . $hw['product_id'] ?> class="fa fa-thumbs-down blue" style="font-size:34px"></i></button>
                        </div>
                      </div>
                  <?php
                    }
                  }
                  ?>
                  <!-- <div class="center"> -->

                  <button class="btn btn-info addItemBtn" style="float: center;"><i class="fas fa-cart-plus"></i>&nbsp;&nbsp;Add to
                    cart</button>
                  <a href="review.php?id=<?php echo base64_encode($pid); ?>" class="btn btn-primary" style="float: right;">Review</a> <br><br>
                  <!-- </div> -->


                <?php
                } else { ?>
                  <button class="btn btn-info btn-block addItemBtn disabled"><i class="fas fa-cart-plus"></i>&nbsp;&nbsp;Add to
                    cart</button>
                <?php
                }
                ?>

              </form>
              <!-- </div> -->
            </div>
          </div>
        </div>

      <?php
        $hw = mysqli_fetch_assoc($new);
      }
      ?>
    </div>

  </section>
  <!-- Newest end here -->

  <!-- Top start here -->
  <section class="container product-card" id="top">
    <div class="cat1Heading d-flex justify-content-between">
      <h3>Top Sale</h3>
    </div>
    <div class="row row-cols-1 row-cols-md-3 g-4">
      <?php

      $nw = mysqli_query($link, "SELECT products.product_id,`product_title`,`product_price`,`product_image` FROM products INNER JOIN
              (SELECT `p_id`,SUM(qty) as sm FROM `orders` GROUP BY `p_id`
              ORDER BY sm DESC
              LIMIT 3)as dt
              on products.product_id=dt.p_id
              ;");

// $numRows = mysqli_num_rows($nw);

// // Display the number of rows
// echo "Number of rows fetched: " . $numRows;
      $hww = mysqli_fetch_assoc($nw);
      while ($hww) { ?>
        <div class="col-lg-4 col-md-6 col-sm-12">
          <div class="product-bg">
            <div class="card h-100 shadow p-3 mb-5 bg-body rounded">
              <img src="admin/images/<?php echo $hww['product_image'] ?>" class="card-img-top img-fluid" alt="...">
              <div class="card-body">
                <h5 class="card-title"><?php echo $hww['product_title']; ?></h5>
                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
              </div>
              <!-- <div class="card-footer p-1"> -->
              <form action="" class="form-submit">
                <input type="hidden" class="pqty" value="1">
                <input type="hidden" class="pid" value="<?= $hww['product_id'] ?>">
                <input type="hidden" class="uid" value="<?= $user_id ?>">
                <input type="hidden" class="pname" value="<?= $hww['product_title'] ?>">
                <input type="hidden" class="pprice" value="<?= $hww['product_price'] ?>">
                <input type="hidden" class="pimage" value="<?= $hww['product_image'] ?>">

                <div class="row">

                  <!-- <div class="d-flex justify-content-between pCardPrice"> -->
                  <h4 class="col-sm-8"><?php echo $hww['product_price']; ?></h4>
                  <?php if ($user_id > 0) {
                    $pid = $hww['product_id'];
                    $queryrat = mysqli_query($link, "SELECT * FROM feedback WHERE `userID`=$user_id AND`prdID`=$pid;");
                    if (mysqli_num_rows($queryrat) == 0) {
                      $pos = 0;
                    } else {
                      $qryrat = mysqli_fetch_assoc($queryrat);
                      $pos = $qryrat['rating'];
                    }
                  ?>
                    <div class="row col-sm-5 style=" text-align:right;">
                      <?php for ($x = 1; $x <= $pos; $x++) { ?>
                        <button class=<?php echo 'rating' . $x ?> style="float: left; width: 15%;padding:0; border: none;background: none; margin-right:3px;display: inline-block;"><i id=<?php echo 'rat' . $x . $hww['product_id'] ?> class="fa fa-star checked"></i></button>
                      <?php } ?>

                      <?php for ($x = $pos + 1; $x <= 5; $x++) { ?>
                        <button class=<?php echo 'rating' . $x ?> style="float: left; width: 15%;padding:0; border: none;background: none; margin-right:3px;"><i id=<?php echo 'rat' . $x . $hww['product_id'] ?> class="fa fa-star"></i></button>
                      <?php } ?>

                    </div>

                  <?php
                  }
                  ?>
                </div>

                <?php

                $pid = $hww['product_id'];

                if ($user_id > 0) {
                  $qrytotal = mysqli_query($link, "SELECT SUM(`likes`) AS tlikes,SUM(`Dislikes`) AS tdislikes FROM feedback WHERE `prdID`=$pid;");
                  $qryr = mysqli_fetch_assoc($qrytotal);
                  $Tlikenum = $qryr['tlikes'];
                  $Tdislikenum = $qryr['tdislikes'];
                  $query = mysqli_query($link, "SELECT * FROM `feedback` WHERE `userID`=$user_id AND `prdID`=$pid;");
                  if (mysqli_num_rows($query) == 0) { ?>
                    <div class="row">
                      <div class="col-sm-2" style="margin-right: 0px;">
                        <button class="addItemlike" style="padding:0; border: none;background: none"><i id=<?php echo 'btnL' . $hww['product_id'] ?> class="fa fa-thumbs-o-up blue" style="font-size:34px"></i></button>
                      </div>

                      <div class="col-sm-4" style="font-weight: bold;">
                        <span id=<?php echo 'cntL' . $hww['product_id'] ?>> <?php echo "Likes: " . $Tlikenum; ?> </span>
                      </div>

                      <div class="col-sm-4" style="font-weight: bold;">
                        <span id=<?php echo 'cntD' . $hww['product_id'] ?>><?php echo "Dislikes: " . $Tdislikenum; ?> </span>
                      </div>

                      <div class="col-sm-2">
                        <button class="addItemdlike" style="padding:0; border: none;background: none"><i id=<?php echo 'btnD' . $hww['product_id'] ?> class="fa fa-thumbs-o-down blue" style="font-size:34px"></i></button>
                      </div>
                    </div>
                    <?php
                  } else {
                    $cs = 0;



                    $qr = mysqli_query($link, "SELECT * FROM `feedback` WHERE `userID`=$user_id AND `prdID`=$pid;");
                    $r = mysqli_fetch_assoc($qr);
                    $likenum = $r['likes'];
                    $dislikenum = $r['Dislikes'];
                    if ($likenum == 0 && $dislikenum == 0) { ?>
                      <div class="row">
                        <div class="col-sm-2" style="margin-right: 0px;">
                          <button class="addItemlike" style="padding:0; border: none;background: none"><i id=<?php echo 'btnL' . $hww['product_id'] ?> class="fa fa-thumbs-o-up blue" style="font-size:34px"></i></button>
                        </div>

                        <div class="col-sm-4" style="font-weight: bold;">
                          <span id=<?php echo 'cntL' . $hww['product_id'] ?>> <?php echo "Likes: " . $Tlikenum; ?> </span>
                        </div>

                        <div class="col-sm-4" style="font-weight: bold;">
                          <span id=<?php echo 'cntD' . $hww['product_id'] ?>><?php echo "Dislikes: " . $Tdislikenum; ?> </span>
                        </div>

                        <div class="col-sm-2">
                          <button class="addItemdlike" style="padding:0; border: none;background: none"><i id=<?php echo 'btnD' . $hww['product_id'] ?> class="fa fa-thumbs-o-down blue" style="font-size:34px"></i></button>
                        </div>
                      </div>
                    <?php } else if ($likenum == 1 && $dislikenum == 0) { ?>
                      <div class="row">
                        <div class="col-sm-2" style="margin-right: 0px;">
                          <button class="addItemlike" style="padding:0; border: none;background: none"><i id=<?php echo 'btnL' . $hww['product_id'] ?> class="fa fa-thumbs-up blue" style="font-size:34px"></i></button>
                        </div>

                        <div class="col-sm-4" style="font-weight: bold;">
                          <span id=<?php echo 'cntL' . $hww['product_id'] ?>> <?php echo "Likes: " . $Tlikenum; ?> </span>
                        </div>

                        <div class="col-sm-4" style="font-weight: bold;">
                          <span id=<?php echo 'cntD' . $hww['product_id'] ?>><?php echo "Dislikes: " . $Tdislikenum; ?> </span>
                        </div>

                        <div class="col-sm-2">
                          <button class="addItemdlike" style="padding:0; border: none;background: none"><i id=<?php echo 'btnD' . $hww['product_id'] ?> class="fa fa-thumbs-o-down blue" style="font-size:34px"></i></button>
                        </div>
                      </div>
                    <?php } else { ?>
                      <div class="row">
                        <div class="col-sm-2" style="margin-right: 0px;">
                          <button class="addItemlike" style="padding:0; border: none;background: none"><i id=<?php echo 'btnL' . $hww['product_id'] ?> class="fa fa-thumbs-o-up blue" style="font-size:34px"></i></button>
                        </div>

                        <div class="col-sm-4" style="font-weight: bold;">
                          <span id=<?php echo 'cntL' . $hww['product_id'] ?>> <?php echo "Likes: " . $Tlikenum; ?> </span>
                        </div>

                        <div class="col-sm-4" style="font-weight: bold;">
                          <span id=<?php echo 'cntD' . $hww['product_id'] ?>><?php echo "Dislikes: " . $Tdislikenum; ?> </span>
                        </div>

                        <div class="col-sm-2">
                          <button class="addItemdlike" style="padding:0; border: none;background: none"><i id=<?php echo 'btnD' . $hww['product_id'] ?> class="fa fa-thumbs-down blue" style="font-size:34px"></i></button>
                        </div>
                      </div>
                  <?php
                    }
                  }
                  ?>
                  <!-- <div class="center"> -->

                  <button class="btn btn-info addItemBtn" style="float: center;"><i class="fas fa-cart-plus"></i>&nbsp;&nbsp;Add to
                    cart</button>
                  <a href="review.php?id=<?php echo base64_encode($pid); ?>" class="btn btn-primary" style="float: right;">Review</a> <br><br>
                  <!-- </div> -->


                <?php
                } else { ?>
                  <button class="btn btn-info btn-block addItemBtn disabled"><i class="fas fa-cart-plus"></i>&nbsp;&nbsp;Add to
                    cart</button>
                <?php
                }
                ?>

              </form>
              <!-- </div> -->
            </div>
          </div>
        </div>

      <?php
        $hww = mysqli_fetch_assoc($nw);
      }
      ?>


    </div>

  </section>
  <!-- Newest end here -->


  <?php
  $info = mysqli_query($link, "SELECT * FROM `categories`;");
  $total_categories = mysqli_num_rows($info);
  $row1 = mysqli_fetch_assoc($info);
  $category_name = $row1['cat_title'];
  $vid = 0;
  while ($row1) {
    $vid++; ?>

    <!-- Laptop START Here-->
    <section class="container product-card" id="<?php echo ucwords($row1['cat_title']); ?>">
      <div class="cat1Heading d-flex justify-content-between">
        <h3><a href="videostulip.php?id=<?php echo base64_encode($vid); ?>"><?php echo ucwords($row1['cat_title']); ?></a></h3>

        <!-- <h3><?php echo ucwords($row1['cat_title']); ?></h3> -->

      </div>
      <div class="row row-cols-1 row-cols-md-3 g-4">
        <?php

        // $qr = mysqli_query($link, "SELECT * FROM `feedback` WHERE userID='$user_id';");
        // $r = mysqli_fetch_assoc($qr);
        // $likenum = $r['likes'];
        // $dislikenum = $r['Dislikes'];
        // $curPID = '1';


        $category_id = $row1['cat_id'];

        $tb_pinfo = mysqli_query($link, "SELECT * FROM `products` where `cat_id`='$category_id'");
        $total_products = mysqli_num_rows($tb_pinfo);
        $i = 1;

        $row = mysqli_fetch_assoc($tb_pinfo);
        $cat_id = $row['cat_id'];
        while ($row and $i < 4) { ?>
          <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="product-bg">
              <div class="card h-100 shadow p-3 mb-5 bg-body rounded">
                <img src="admin/images/<?php echo $row['product_image'] ?>" class="card-img-top img-fluid" alt="...">
                <div class="card-body">
                  <h5 class="card-title"><?php echo $row['product_title']; ?></h5>
                  <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                </div>
                <!-- <div class="card-footer p-1"> -->
                <form action="" class="form-submit">
                  <input type="hidden" class="pqty" value="1">
                  <input type="hidden" class="pid" value="<?= $row['product_id'] ?>">
                  <input type="hidden" class="uid" value="<?= $user_id ?>">
                  <input type="hidden" class="pname" value="<?= $row['product_title'] ?>">
                  <input type="hidden" class="pprice" value="<?= $row['product_price'] ?>">
                  <input type="hidden" class="pimage" value="<?= $row['product_image'] ?>">

                  <div class="row">

                    <!-- <div class="d-flex justify-content-between pCardPrice"> -->
                    <h4 class="col-sm-8"><?php echo $row['product_price']; ?></h4>
                    <?php if ($user_id > 0) {
                      $pid = $row['product_id'];
                      $queryrat = mysqli_query($link, "SELECT * FROM feedback WHERE `userID`=$user_id AND`prdID`=$pid;");
                      if (mysqli_num_rows($queryrat) == 0) {
                        $pos = 0;
                      } else {
                        $qryrat = mysqli_fetch_assoc($queryrat);
                        $pos = $qryrat['rating'];
                      }
                    ?>
                      <div class="row col-sm-5 style=" text-align:right;">
                        <?php for ($x = 1; $x <= $pos; $x++) { ?>
                          <button class=<?php echo 'rating' . $x ?> style="float: left; width: 15%;padding:0; border: none;background: none; margin-right:3px;display: inline-block;"><i id=<?php echo 'rat' . $x . $row['product_id'] ?> class="fa fa-star checked"></i></button>
                        <?php } ?>

                        <?php for ($x = $pos + 1; $x <= 5; $x++) { ?>
                          <button class=<?php echo 'rating' . $x ?> style="float: left; width: 15%;padding:0; border: none;background: none; margin-right:3px;"><i id=<?php echo 'rat' . $x . $row['product_id'] ?> class="fa fa-star"></i></button>
                        <?php } ?>

                      </div>

                    <?php
                    }
                    ?>
                  </div>

                  <?php

                  $pid = $row['product_id'];

                  if ($user_id > 0) {
                    $qrytotal = mysqli_query($link, "SELECT SUM(`likes`) AS tlikes,SUM(`Dislikes`) AS tdislikes FROM feedback WHERE `prdID`=$pid;");
                    $qryr = mysqli_fetch_assoc($qrytotal);
                    $Tlikenum = $qryr['tlikes'];
                    $Tdislikenum = $qryr['tdislikes'];
                    $query = mysqli_query($link, "SELECT * FROM `feedback` WHERE `userID`=$user_id AND `prdID`=$pid;");
                    if (mysqli_num_rows($query) == 0) { ?>
                      <div class="row">
                        <div class="col-sm-2" style="margin-right: 0px;">
                          <button class="addItemlike" style="padding:0; border: none;background: none"><i id=<?php echo 'btnL' . $row['product_id'] ?> class="fa fa-thumbs-o-up blue" style="font-size:34px"></i></button>
                        </div>

                        <div class="col-sm-4" style="font-weight: bold;">
                          <span id=<?php echo 'cntL' . $row['product_id'] ?>> <?php echo "Likes: " . $Tlikenum; ?> </span>
                        </div>

                        <div class="col-sm-4" style="font-weight: bold;">
                          <span id=<?php echo 'cntD' . $row['product_id'] ?>><?php echo "Dislikes: " . $Tdislikenum; ?> </span>
                        </div>

                        <div class="col-sm-2">
                          <button class="addItemdlike" style="padding:0; border: none;background: none"><i id=<?php echo 'btnD' . $row['product_id'] ?> class="fa fa-thumbs-o-down blue" style="font-size:34px"></i></button>
                        </div>
                      </div>
                      <?php
                    } else {
                      $cs = 0;



                      $qr = mysqli_query($link, "SELECT * FROM `feedback` WHERE `userID`=$user_id AND `prdID`=$pid;");
                      $r = mysqli_fetch_assoc($qr);
                      $likenum = $r['likes'];
                      $dislikenum = $r['Dislikes'];
                      if ($likenum == 0 && $dislikenum == 0) { ?>
                        <div class="row">
                          <div class="col-sm-2" style="margin-right: 0px;">
                            <button class="addItemlike" style="padding:0; border: none;background: none"><i id=<?php echo 'btnL' . $row['product_id'] ?> class="fa fa-thumbs-o-up blue" style="font-size:34px"></i></button>
                          </div>

                          <div class="col-sm-4" style="font-weight: bold;">
                            <span id=<?php echo 'cntL' . $row['product_id'] ?>> <?php echo "Likes: " . $Tlikenum; ?> </span>
                          </div>

                          <div class="col-sm-4" style="font-weight: bold;">
                            <span id=<?php echo 'cntD' . $row['product_id'] ?>><?php echo "Dislikes: " . $Tdislikenum; ?> </span>
                          </div>

                          <div class="col-sm-2">
                            <button class="addItemdlike" style="padding:0; border: none;background: none"><i id=<?php echo 'btnD' . $row['product_id'] ?> class="fa fa-thumbs-o-down blue" style="font-size:34px"></i></button>
                          </div>
                        </div>
                      <?php } else if ($likenum == 1 && $dislikenum == 0) { ?>
                        <div class="row">
                          <div class="col-sm-2" style="margin-right: 0px;">
                            <button class="addItemlike" style="padding:0; border: none;background: none"><i id=<?php echo 'btnL' . $row['product_id'] ?> class="fa fa-thumbs-up blue" style="font-size:34px"></i></button>
                          </div>

                          <div class="col-sm-4" style="font-weight: bold;">
                            <span id=<?php echo 'cntL' . $row['product_id'] ?>> <?php echo "Likes: " . $Tlikenum; ?> </span>
                          </div>

                          <div class="col-sm-4" style="font-weight: bold;">
                            <span id=<?php echo 'cntD' . $row['product_id'] ?>><?php echo "Dislikes: " . $Tdislikenum; ?> </span>
                          </div>

                          <div class="col-sm-2">
                            <button class="addItemdlike" style="padding:0; border: none;background: none"><i id=<?php echo 'btnD' . $row['product_id'] ?> class="fa fa-thumbs-o-down blue" style="font-size:34px"></i></button>
                          </div>
                        </div>
                      <?php } else { ?>
                        <div class="row">
                          <div class="col-sm-2" style="margin-right: 0px;">
                            <button class="addItemlike" style="padding:0; border: none;background: none"><i id=<?php echo 'btnL' . $row['product_id'] ?> class="fa fa-thumbs-o-up blue" style="font-size:34px"></i></button>
                          </div>

                          <div class="col-sm-4" style="font-weight: bold;">
                            <span id=<?php echo 'cntL' . $row['product_id'] ?>> <?php echo "Likes: " . $Tlikenum; ?> </span>
                          </div>

                          <div class="col-sm-4" style="font-weight: bold;">
                            <span id=<?php echo 'cntD' . $row['product_id'] ?>><?php echo "Dislikes: " . $Tdislikenum; ?> </span>
                          </div>

                          <div class="col-sm-2">
                            <button class="addItemdlike" style="padding:0; border: none;background: none"><i id=<?php echo 'btnD' . $row['product_id'] ?> class="fa fa-thumbs-down blue" style="font-size:34px"></i></button>
                          </div>
                        </div>
                    <?php
                      }
                    }
                    ?>
                    <!-- <div class="center"> -->

                    <button class="btn btn-info addItemBtn" style="float: center;"><i class="fas fa-cart-plus"></i>&nbsp;&nbsp;Add to
                      cart</button>
                    <a href="review.php?id=<?php echo base64_encode($pid); ?>" class="btn btn-primary" style="float: right;">Review</a> <br><br>
                    <!-- </div> -->


                  <?php
                  } else { ?>
                    <button class="btn btn-info btn-block addItemBtn disabled"><i class="fas fa-cart-plus"></i>&nbsp;&nbsp;Add to
                      cart</button>
                  <?php
                  }
                  ?>

                </form>
                <!-- </div> -->
              </div>
            </div>
          </div>

        <?php
          $row = mysqli_fetch_assoc($tb_pinfo);
          $i++;
        }
        ?>


      </div>
      <?php
      if ($user_id > 0) { ?>
        <a href="categories1.php?id=<?php echo base64_encode($category_id); ?>" class="btn btn-primary btn-sm float-right">SEE MORE</a> <br><br>
        <!-- <div>
          <a href="categories.php?id=<?php echo base64_encode($category_id); ?>" class="cat1Heading d-flex justify-content-between"><i class=""></i>see more</a>
        </div> -->
      <?php
      }
      ?>
    </section>

  <?php
    $row1 = mysqli_fetch_assoc($info);
  }
  ?>

  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js'></script>

  <script type="text/javascript">
    $(document).ready(function() {

      $(".addItemlike").click(function(e) {
        e.preventDefault();
        var ld = 1;
        var $form = $(this).closest(".form-submit");
        var pid = $form.find(".pid").val();
        var uid = $form.find(".uid").val();

        $.ajax({
          url: 'man.php',
          method: 'post',
          data: {
            Strl: ld,
            pid: pid,
            uid: uid,
          },
          success: function(response) {
            $("#cntD" + pid).html(response);
          }
        });

      });

      $(".addItemdlike").click(function(e) {
        e.preventDefault();
        var ld = 2;
        var $form = $(this).closest(".form-submit");
        var pid = $form.find(".pid").val();
        var uid = $form.find(".uid").val();
        $.ajax({
          url: 'man.php',
          method: 'post',
          data: {
            Strd: ld,
            pid: pid,
            uid: uid,
          },
          success: function(response) {
            $("#cntD" + pid).html(response);
          }
        });
      });

      $(".rating1").click(function(e) {
        e.preventDefault();
        var $form = $(this).closest(".form-submit");
        var pid = $form.find(".pid").val();
        var uid = $form.find(".uid").val();
        var pos = 1;
        var st = 1;
        $.ajax({
          url: 'man.php',
          method: 'post',
          data: {
            Strrat: st,
            pos: pos,
            pid: pid,
            uid: uid,

          },
          success: function(response) {
            $("#rat" + pos + pid).html(response);
          }
        });
      });

      $(".rating2").click(function(e) {
        e.preventDefault();
        var $form = $(this).closest(".form-submit");
        var pid = $form.find(".pid").val();
        var uid = $form.find(".uid").val();

        var pos = 2;
        var st = 1;
        $.ajax({
          url: 'man.php',
          method: 'post',
          data: {
            Strrat: st,
            pos: pos,
            pid: pid,
            uid: uid,

          },
          success: function(response) {
            $("#rat" + pos + pid).html(response);
          }
        });
      });
      $(".rating3").click(function(e) {
        e.preventDefault();
        var $form = $(this).closest(".form-submit");
        var pid = $form.find(".pid").val();
        var uid = $form.find(".uid").val();

        var pos = 3;
        var st = 3;
        $.ajax({
          url: 'man.php',
          method: 'post',
          data: {
            Strrat: st,
            pos: pos,
            pid: pid,
            uid: uid,

          },
          success: function(response) {
            $("#rat" + pos + pid).html(response);
          }
        });
      });
      $(".rating4").click(function(e) {
        e.preventDefault();
        var $form = $(this).closest(".form-submit");
        var pid = $form.find(".pid").val();
        var uid = $form.find(".uid").val();

        var pos = 4;
        var st = 4;
        $.ajax({
          url: 'man.php',
          method: 'post',
          data: {
            Strrat: st,
            pos: pos,
            pid: pid,
            uid: uid,

          },
          success: function(response) {
            $("#rat" + pos + pid).html(response);
          }
        });
      });
      $(".rating5").click(function(e) {
        e.preventDefault();
        var $form = $(this).closest(".form-submit");
        var pid = $form.find(".pid").val();
        var uid = $form.find(".uid").val();

        var pos = 5;
        var st = 5;
        $.ajax({
          url: 'man.php',
          method: 'post',
          data: {
            Strrat: st,
            pos: pos,
            pid: pid,
            uid: uid,

          },
          success: function(response) {
            $("#rat" + pos + pid).html(response);
          }
        });
      });

      // Send product details in the server
      $(".addItemBtn").click(function(e) {

        e.preventDefault();
        var $form = $(this).closest(".form-submit");
        var pid = $form.find(".pid").val();
        var pname = $form.find(".pname").val();
        var pprice = $form.find(".pprice").val();
        var pimage = $form.find(".pimage").val();
        //var pcode = $form.find(".pcode").val();

        var pqty = $form.find(".pqty").val();

        $.ajax({
          url: 'action.php',
          method: 'post',
          data: {
            pid: pid,
            pname: pname,
            pprice: pprice,
            pqty: pqty,
            pimage: pimage,
            //pcode: pcode
          },
          success: function(response) {
            $("#message").html(response);
            //window.scrollTo(0, 0);
            load_cart_item_number();
          }
        });
      });

      // Load total no.of items added in the cart and display in the navbar
      load_cart_item_number();

      function load_cart_item_number() {
        $.ajax({
          url: 'action.php',
          method: 'get',
          data: {
            cartItem: "cart_item"
          },
          success: function(response) {
            $("#cart-item").html(response);
          }
        });
      }
    });
  </script>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>