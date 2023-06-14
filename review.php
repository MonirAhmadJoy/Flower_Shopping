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
else{
  header('location:index.php');
}

$id = base64_decode($_GET['id']);
$tb = mysqli_query($link, "SELECT * FROM `products` WHERE `product_id`='$id'");
$row = mysqli_fetch_assoc($tb);
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
            <a class="nav-link" href="index.php#newest">Newest Arrival</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php#top">Top sale</a>
          </li>
          <li class="nav-item dropdown" id="message">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Category
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <?php
              $tb_pinfo = mysqli_query($link, "SELECT * FROM `categories`");
              while ($row3 = mysqli_fetch_assoc($tb_pinfo)) { ?>
                <li><a class="dropdown-item" href="index.php#<?php echo ucwords($row3['cat_title']); ?>"><?php echo ucwords($row3['cat_title']); ?></a></li>
              <?php
              }
              ?>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="insex.php#about-us">About us</a>
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
  <div class="row" id="figcont" style="margin-left: 20px;">
    <div class="col-md-4">
      <div class="product-bg">
        <div class="card h-100 shadow p-3 mb-5 bg-body rounded">
          <img src="admin/images/<?php echo $row['product_image'] ?>" class="img-fluid" alt="..." width="250" height="250">
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
              <div class="col-sm-8">
                <h4><?php echo $row['product_price']; ?><i class="fa-solid fa-bangladeshi-taka-sign"></i></h4>
              </div>
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
                <div class="row col-sm-4" style="float: right;">
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

              <div class="center">
                <button class="btn btn-info addItemBtn" style="float: center;"><i class="fas fa-cart-plus"></i>&nbsp;&nbsp;Add to
                  cart</button>
              </div>
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
    $tb = mysqli_query($link, "SELECT TRUNCATE(AVG(`rating`),2) AS avgRat FROM `feedback`WHERE `prdID`=$id AND `rating`!=0; ");
    $rowpd = mysqli_fetch_assoc($tb);
    $avgrat = $rowpd['avgRat'];

    $tb = mysqli_query($link, "SELECT COUNT(*) AS count FROM `feedback` WHERE `prdID`=$id AND `rating`=1; ");
    $rowpd = mysqli_fetch_assoc($tb);
    $onerat = $rowpd['count'];

    $tb = mysqli_query($link, "SELECT COUNT(*) AS count FROM `feedback` WHERE `prdID`=$id AND `rating`=2;");
    $rowpd = mysqli_fetch_assoc($tb);
    $tworat = $rowpd['count'];

    $tb = mysqli_query($link, "SELECT COUNT(*) AS count FROM `feedback` WHERE `prdID`=$id AND `rating`=3; ");
    $rowpd = mysqli_fetch_assoc($tb);
    $threerat = $rowpd['count'];

    $tb = mysqli_query($link, "SELECT COUNT(*) AS count FROM `feedback` WHERE `prdID`=$id AND `rating`=4;");
    $rowpd = mysqli_fetch_assoc($tb);
    $fourrat = $rowpd['count'];

    $tb = mysqli_query($link, "SELECT COUNT(*) AS count FROM `feedback` WHERE `prdID`=$id AND `rating`=5;");
    $rowpd = mysqli_fetch_assoc($tb);
    $fiverat = $rowpd['count'];
    ?>
    <div class="col-md-8">
      <h1 style="margin-right: 5%;display: inline;">Community Reviews</h1>
      <h3 id="avgrat" style="display: inline;"><?php echo $avgrat ?></h3><br><br>
      <?php
      setRating(1);
      ?>
      <h5 id="onerat" style="margin-left: 5%;display: inline;"><?php echo $onerat ?></h5>
      <br>
      <?php
      setRating(2);
      ?>
      <h5 id="tworat" style="margin-left: 5%;display: inline;"><?php echo $tworat ?></h5>
      <br>
      <?php
      setRating(3);
      ?>
      <h5 id="threerat" style="margin-left: 5%;display: inline;"><?php echo $threerat ?></h5>
      <br>
      <?php
      setRating(4);
      ?>
      <h5 id="fourrat" style="margin-left: 5%;display: inline;"><?php echo $fourrat ?></h5>
      <br>
      <?php
      setRating(5);
      ?>
      <h5 id="fiverat" style="margin-left: 5%;display: inline;"><?php echo $fiverat ?></h5>
      <br>

      <h4>What do you think?</h4>
      <form action="" id="myform" class="form-submit">
        <input type="hidden" class="pid" value="<?= $row['product_id'] ?>">
        <input type="hidden" class="uid" value="<?= $user_id ?>">
        <textarea class="message" id="msg" style="width:600px; height:150px;" placeholder="Write here..."></textarea>
        <br>
        <button class="btn btn-primary addCommentBtn"></i>Submit</button>
      </form>
    </div>

  </div>
  <div id="comcont">
    <?php
    $tb = mysqli_query($link, "SELECT * FROM `feedback` WHERE `prdID`=$id AND `comment`!='' order by comment_date desc ;");
    $tcom = mysqli_num_rows($tb);
    $rowcom = mysqli_fetch_assoc($tb);
    $i = 1;
    while ($rowcom) {
      $comment = $rowcom['comment'];
      $userid = $rowcom['userID'];
      $commentdate = $rowcom['comment_date'];

      $tbuser = mysqli_query($link, "SELECT * FROM `user` WHERE `user_id`=$userid;");
      $rowuser = mysqli_fetch_assoc($tbuser);
    ?>
      <hr>
      <div class="row" style="padding-left: 5%;">
        <div class="col-md-2">
          <img src="images/user_off.png" width="50" height="45" alt=""><br>
          <h5><?php echo $rowuser['name']; ?></h5>
        </div>
        <div class="col-md-8">
          <h5 style="text-align:right;float:right;"><?php echo $commentdate; ?></h5><br>
          <p><?php echo $comment; ?></p>
        </div>
      </div>
    <?php
      $rowcom = mysqli_fetch_assoc($tb);
    }
    ?>

  </div>
  <?php
  function setRating($rat)
  {
    for ($i = 1; $i <= $rat; $i++) { ?>
      <p style="width: 2%;padding:0; border: none;background: none; margin-right:3px;display: inline-block;"><i class="fa fa-star checked"></i></p>
    <?php
    }
    for ($i = $rat + 1; $i <= 5; $i++) { ?>
      <p style="width: 2%;padding:0; border: none;background: none; margin-right:3px;display: inline-block;"><i class="fa fa-star"></i></p>
  <?php
    }  // echo "$fname Refsnes.<br>";
  }
  ?>


  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js'></script>

  <script type="text/javascript">
    
    $(".addCommentBtn").click(function(e) {
        e.preventDefault();
        var ld = 2;
        var $form = $(this).closest(".form-submit");
        var pid = $form.find(".pid").val();
        var uid = $form.find(".uid").val();
        var message = $form.find(".message").val();
        if(message!=''){
        $.ajax({
          url: 'man.php',
          method: 'post',
          data: {
            Strcom: ld,
            pid: pid,
            uid: uid,
            message: message,
          },
          success: function(response) {
            $("#comcont").html(response);
            $('#myform').children('#msg').val('')
            // $("#myform")[0].reset();
          }
        });
      }
      });

   

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
        var st = 2;
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
        var st = 2;
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
        var st = 2;
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
        var st = 2;
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
        var st = 2;
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