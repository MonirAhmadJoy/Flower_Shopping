<?php
session_start();
require_once './dbconn.php';
// require './review.php';
date_default_timezone_set('asia/dhaka');

if (isset($_POST['Strrat'])) {
    $pos = $_POST['pos'];
    $pid = $_POST['pid'];
    $uid = $_POST['uid'];
    $query = mysqli_query($link, "SELECT * FROM `feedback` WHERE `userID`=$uid AND `prdID`=$pid;");
    if (mysqli_num_rows($query) == 0) {
        $query = mysqli_query($link, "INSERT INTO `feedback`(`userID`, `prdID`, `likes`, `Dislikes`,`rating`) VALUES ('$uid','$pid',0,0,$pos);");
    } else {
        $query = mysqli_query($link, "UPDATE `feedback` SET `rating`=$pos WHERE `userID`=$uid AND`prdID`=$pid;");
    }

    for ($x = 1; $x <= $pos; $x++) {
        echo '<script> 
        $("#rat' . $x . $pid . '").removeClass();
        $("#rat' . $x . $pid . '").addClass("fa fa-star checked");
        </script>';
    }

    for ($x = $pos + 1; $x <= 5; $x++) {
        echo '<script> 
        $("#rat' . $x . $pid . '").removeClass();
        $("#rat' . $x . $pid . '").addClass("fa fa-star");
        </script>';
    }

    $tb = mysqli_query($link, "SELECT TRUNCATE(AVG(`rating`),2) AS avgRat FROM `feedback`WHERE `prdID`=$pid AND `rating`!=0; ");
    $rowpd = mysqli_fetch_assoc($tb);
    $avgrat = $rowpd['avgRat'];

    $tb = mysqli_query($link, "SELECT COUNT(*) AS count FROM `feedback` WHERE `prdID`=$pid AND `rating`=1; ");
    $rowpd = mysqli_fetch_assoc($tb);
    $onerat = $rowpd['count'];

    $tb = mysqli_query($link, "SELECT COUNT(*) AS count FROM `feedback` WHERE `prdID`=$pid AND `rating`=2;");
    $rowpd = mysqli_fetch_assoc($tb);
    $tworat = $rowpd['count'];

    $tb = mysqli_query($link, "SELECT COUNT(*) AS count FROM `feedback` WHERE `prdID`=$pid AND `rating`=3; ");
    $rowpd = mysqli_fetch_assoc($tb);
    $threerat = $rowpd['count'];

    $tb = mysqli_query($link, "SELECT COUNT(*) AS count FROM `feedback` WHERE `prdID`=$pid AND `rating`=4;");
    $rowpd = mysqli_fetch_assoc($tb);
    $fourrat = $rowpd['count'];

    $tb = mysqli_query($link, "SELECT COUNT(*) AS count FROM `feedback` WHERE `prdID`=$pid AND `rating`=5;");
    $rowpd = mysqli_fetch_assoc($tb);
    $fiverat = $rowpd['count'];

    $ratavg = "avgrat";
    $ratone = "onerat";
    $rattwo = "tworat";
    $ratthree = "threerat";
    $ratfour = "fourrat";
    $ratfive = "fiverat";

    echo '<script> 
    $("#' . $ratavg . '").text("' . $avgrat . '");
    $("#' . $ratone . '").text("' . $onerat . '");
    $("#' . $rattwo . '").text("' . $tworat . '");
    $("#' . $ratthree . '").text("' . $threerat . '");
    $("#' . $ratfour . '").text("' . $fourrat . '");
    $("#' . $ratfive . '").text("' . $fiverat . '");
    </script>';
}
if (isset($_POST['Strl'])) {
    $Str = $_POST['Strl'];
    $pid = $_POST['pid'];
    $uid = $_POST['uid'];
    $cs = 0;
    $query = mysqli_query($link, "SELECT * FROM `feedback` WHERE `userID`=$uid AND `prdID`=$pid;");
    if (mysqli_num_rows($query) == 0) {
        $query = mysqli_query($link, "INSERT INTO `feedback`(`userID`, `prdID`, `likes`, `Dislikes`,`rating`) VALUES ('$uid','$pid',1,0,0);");
    } else {
        $qr = mysqli_query($link, "SELECT * FROM `feedback` WHERE `userID`=$uid AND`prdID`=$pid;");
        $r = mysqli_fetch_assoc($qr);
        $likenum = $r['likes'];
        $dislikenum = $r['Dislikes'];
        if ($likenum == 1 && $dislikenum == 0) {
            $query = mysqli_query($link, "UPDATE `feedback` SET `likes`=0,`Dislikes`=0 WHERE `userID`=$uid AND`prdID`=$pid;");
            $cs = 1;
        } else {
            $query = mysqli_query($link, "UPDATE `feedback` SET `likes`=1,`Dislikes`=0 WHERE `userID`=$uid AND`prdID`=$pid;");
        }
    }
    $qrytotal = mysqli_query($link, "SELECT SUM(`likes`) AS tlikes,SUM(`Dislikes`) AS tdislikes FROM feedback WHERE `prdID`=$pid;");
    $qryr = mysqli_fetch_assoc($qrytotal);
    $Tlikenum = $qryr['tlikes'];
    $Tdislikenum = $qryr['tdislikes'];
    $lkcntID = "cntL" . $pid;
    $dlkcntID = "cntD" . $pid;
    $btnlkID = "btnL" . $pid;
    $btndlkID = "btnD" . $pid;

    // echo "Total likes: ".$likenum;
    // echo "<script>$('p').prop('color','green');</script>";
    if ($cs == 0) {
        echo '<script> 
            $("#' . $lkcntID . '").text("Likes: ' . $Tlikenum . '");
            $("#' . $dlkcntID . '").text("Dislikes: ' . $Tdislikenum . '"); 
            $("#' . $btnlkID . '").removeClass();
            $("#' . $btnlkID . '").addClass("fa fa-thumbs-up blue");
            $("#' . $btndlkID . '").removeClass();
            $("#' . $btndlkID . '").addClass("fa fa-thumbs-o-down blue");
            </script>';
    } else {
        echo '<script> 
            $("#' . $lkcntID . '").text("Likes: ' . $Tlikenum . '");
            $("#' . $dlkcntID . '").text("Dislikes: ' . $Tdislikenum . '"); 
            $("#' . $btnlkID . '").removeClass();
            $("#' . $btnlkID . '").addClass("fa fa-thumbs-o-up blue");
            $("#' . $btndlkID . '").removeClass();
            $("#' . $btndlkID . '").addClass("fa fa-thumbs-o-down blue");
            </script>';
    }
    // echo '<script> $("#count1").text("Total Dislikes: '.$dislikenum.'"); </script>';
    // echo '<script> $("#addItemlike").css({ "background-color": "yellow"}); </script>';
    // $("#addItemlike").css({ "color": "yellow"});

    // echo "<script>$('#submit').prop('disabled',false);</script>";

}

if (isset($_POST['Strd'])) {
    $Str = $_POST['Strd'];
    $pid = $_POST['pid'];
    $uid = $_POST['uid'];
    $cs = 0;
    $query = mysqli_query($link, "SELECT * FROM `feedback` WHERE `userID`=$uid AND `prdID`=$pid;");
    if (mysqli_num_rows($query) == 0) {
        $query = mysqli_query($link, "INSERT INTO `feedback`(`userID`, `prdID`, `likes`, `Dislikes`,`rating`) VALUES ('$uid','$pid',0,1,0);");
    } else {
        $qr = mysqli_query($link, "SELECT * FROM `feedback` WHERE `userID`=$uid AND`prdID`=$pid;");
        $r = mysqli_fetch_assoc($qr);
        $likenum = $r['likes'];
        $dislikenum = $r['Dislikes'];
        if ($likenum == 0 && $dislikenum == 1) {
            $query = mysqli_query($link, "UPDATE `feedback` SET `likes`=0,`Dislikes`=0 WHERE `userID`=$uid AND`prdID`=$pid;");
            $cs = 1;
        } else {
            $query = mysqli_query($link, "UPDATE `feedback` SET `likes`=0,`Dislikes`=1 WHERE `userID`=$uid AND`prdID`=$pid;");
        }
    }
    $qrytotal = mysqli_query($link, "SELECT SUM(`likes`) AS tlikes,SUM(`Dislikes`) AS tdislikes FROM feedback WHERE `prdID`=$pid;");
    $qryr = mysqli_fetch_assoc($qrytotal);
    $Tlikenum = $qryr['tlikes'];
    $Tdislikenum = $qryr['tdislikes'];
    $lkcntID = "cntL" . $pid;
    $dlkcntID = "cntD" . $pid;
    $btnlkID = "btnL" . $pid;
    $btndlkID = "btnD" . $pid;

    // echo "Total likes: ".$likenum;
    // echo "<script>$('p').prop('color','green');</script>";
    if ($cs == 0) {
        echo '<script> 
            $("#' . $lkcntID . '").text("Likes: ' . $Tlikenum . '");
            $("#' . $dlkcntID . '").text("Dislikes: ' . $Tdislikenum . '"); 
            $("#' . $btnlkID . '").removeClass();
            $("#' . $btnlkID . '").addClass("fa fa-thumbs-o-up blue");
            $("#' . $btndlkID . '").removeClass();
            $("#' . $btndlkID . '").addClass("fa fa-thumbs-down blue");
            </script>';
    } else {
        echo '<script> 
            $("#' . $lkcntID . '").text("Likes: ' . $Tlikenum . '");
            $("#' . $dlkcntID . '").text("Dislikes: ' . $Tdislikenum . '"); 
            $("#' . $btnlkID . '").removeClass();
            $("#' . $btnlkID . '").addClass("fa fa-thumbs-o-up blue");
            $("#' . $btndlkID . '").removeClass();
            $("#' . $btndlkID . '").addClass("fa fa-thumbs-o-down blue");
            </script>';
    }
}

if (isset($_POST['Strcom'])) {

    $pid = $_POST['pid'];
    $uid = $_POST['uid'];
    $message = $_POST['message'];
    $date = date('Y-m-d H:i:s');
    $query = mysqli_query($link, "UPDATE `feedback` SET `comment`='$message', `comment_date`= '$date' WHERE `userID`=$uid AND`prdID`=$pid;");

    $tb = mysqli_query($link, "SELECT * FROM `feedback` WHERE `prdID`=$pid AND `comment`!='' order by comment_date desc ;");
    $tcom = mysqli_num_rows($tb);
    $rowcom = mysqli_fetch_assoc($tb);
    $i = 1;
    $data = '';
    while ($rowcom) {
        $comment = $rowcom['comment'];
        $userid = $rowcom['userID'];
        $commentdate = $rowcom['comment_date'];

        $tbuser = mysqli_query($link, "SELECT * FROM `user` WHERE `user_id`=$userid;");
        $rowuser = mysqli_fetch_assoc($tbuser);
        $username = $rowuser['name'];

        $data .= '<hr> <div class="row comment_div" style="padding-left: 5%;">
            <div class="col-md-2">
                <img src="images/user_off.png" width="50" height="45" alt=""><br>
                <h5 class="username">' . $username . '</h5>
            </div>
            <div class="col-md-8">
                <h5 class="time" style="text-align:right;float:right;">' . $commentdate . '</h5><br>
                <p class="comment">' . $comment . '</p>
            </div>
        </div>';

        $rowcom = mysqli_fetch_assoc($tb);
    }

    echo $data;
}
if (isset($_GET['level1Value'])) {
    // perform database query or any data source operations to get options for level 2
    $geted=$_GET['level1Value'];
    if($geted=="Chittagong")
    $queryd = mysqli_query($link, "SELECT * FROM `subdistrict` WHERE `d_id`=1;");
    else if($geted=="Cox's Bazar")
    $queryd = mysqli_query($link, "SELECT * FROM `subdistrict` WHERE `d_id`=2;");
    else
    $queryd = mysqli_query($link, "SELECT * FROM `subdistrict` WHERE `d_id`=3;");

    $rows=mysqli_fetch_assoc($queryd);

    $output = "<option value='' selected disabled>Select Your Subdistrict</option>";
    while($rows){
        $output .= "<option value='" . $rows['name'] . "'>" . $rows['name'] . "</option>";
        $rows=mysqli_fetch_assoc($queryd);
    }
    // foreach ($options as $option) {
    //     $output .= "<option value='" . $option . "'>" . $option . "</option>";
    // }
    echo $output;
}

if (isset($_GET['level2Value'])) {
    $geted=$_GET['level2Value'];
    if($geted=="Chittagong Sadar")
    $queryd = mysqli_query($link, "SELECT * FROM `city` WHERE `s_id`=1;");
    else if($geted=="Hathazari")
    $queryd = mysqli_query($link, "SELECT * FROM `city` WHERE `s_id`=2;");
    else if($geted=="Sitakunda")
    $queryd = mysqli_query($link, "SELECT * FROM `city` WHERE `s_id`=3;");
    else if($geted=="Sadar")
    $queryd = mysqli_query($link, "SELECT * FROM `city` WHERE `s_id`=4;");
    else if($geted=="Ramu")
    $queryd = mysqli_query($link, "SELECT * FROM `city` WHERE `s_id`=5;");
    else if($geted=="Teknaf")
    $queryd = mysqli_query($link, "SELECT * FROM `city` WHERE `s_id`=6;");
    else if($geted=="Ukhia")
    $queryd = mysqli_query($link, "SELECT * FROM `city` WHERE `s_id`=7;");
    else if($geted=="Rangamati Sadar")
    $queryd = mysqli_query($link, "SELECT * FROM `city` WHERE `s_id`=8;");
    else if($geted=="Kaptai")
    $queryd = mysqli_query($link, "SELECT * FROM `city` WHERE `s_id`=9;");
    else
    $queryd = mysqli_query($link, "SELECT * FROM `city` WHERE `s_id`=10;");

    $rows=mysqli_fetch_assoc($queryd);

    $output = "<option value='' selected disabled>Select Your City</option>";
    while($rows){
        $output .= "<option value='" . $rows['name'] . "'>" . $rows['name'] . "</option>";
        $rows=mysqli_fetch_assoc($queryd);
    }
    // foreach ($options as $option) {
    //     $output .= "<option value='" . $option . "'>" . $option . "</option>";
    // }
    echo $output;
}
?>

<!DOCTYPE html>
<html>

<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body>

</body>

</html>