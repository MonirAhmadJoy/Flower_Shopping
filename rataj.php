<?php
session_start();
require_once './dbconn.php';

if (isset($_POST['Str'])) {
    $pos=$_POST['pos'];
    $pid=$_POST['pid'];

    $query = mysqli_query($link, "UPDATE `rating` SET `num`=$pos;");


    for ($x = 1; $x <= $pos; $x++){
        echo '<script> 
        $("#rat' . $x .$pid. '").removeClass();
        $("#rat' . $x .$pid. '").addClass("fa fa-star checked");
        </script>';
    }
    for ($x = $pos+1; $x <= 5; $x++){
        echo '<script> 
        $("#rat' . $x .$pid. '").removeClass();
        $("#rat' . $x .$pid. '").addClass("fa fa-star");
        </script>';
    }

}

?>